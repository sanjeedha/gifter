<?php

///////////////////

/*
   Copyright (c) 2003, 2005, 2007 - Danilo Segan <danilo@kvota.net>.

   This file is part of FAlbum.  Extened from PHP-gettext

   FAlbum / PHP-gettext is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

   PHP-gettext is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with PHP-gettext; if not, write to the Free Software
   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/


// Simple class to wrap file streams, string streams, etc.
// seek is essential, and it should be byte stream
class FAlbum_StreamReader {
  // should return a string [FIXME: perhaps return array of bytes?]
  function read($bytes) {
    return false;
  }
  
  // should return new position
  function seekto($position) {
    return false;
  }
  
  // returns current position
  function currentpos() {
    return false;
  }
  
  // returns length of entire stream (limit for seekto()s)
  function length() {
    return false;
  }
}

class FAlbum_StringReader {
  var $_pos;
  var $_str;

  function FAlbum_StringReader($str='') {
    $this->_str = $str;
    $this->_pos = 0;
  }

  function read($bytes) {
    $data = substr($this->_str, $this->_pos, $bytes);
    $this->_pos += $bytes;
    if (strlen($this->_str)<$this->_pos)
      $this->_pos = strlen($this->_str);

    return $data;
  }

  function seekto($pos) {
    $this->_pos = $pos;
    if (strlen($this->_str)<$this->_pos)
      $this->_pos = strlen($this->_str);
    return $this->_pos;
  }

  function currentpos() {
    return $this->_pos;
  }

  function length() {
    return strlen($this->_str);
  }

}


class FAlbum_FileReader {
  var $_pos;
  var $_fd;
  var $_length;

  function FAlbum_FileReader($filename) {
    if (file_exists($filename)) {

      $this->_length=filesize($filename);
      $this->_pos = 0;
      $this->_fd = fopen($filename,'rb');
      if (!$this->_fd) {
	$this->error = 3; // Cannot read file, probably permissions
	return false;
      }
    } else {
      $this->error = 2; // File doesn't exist
      return false;
    }
  }

  function read($bytes) {
    if ($bytes) {
      fseek($this->_fd, $this->_pos);
      $data = fread($this->_fd, $bytes);
      $this->_pos = ftell($this->_fd);
      
      return $data;
    } else return '';
  }

  function seekto($pos) {
    fseek($this->_fd, $pos);
    $this->_pos = ftell($this->_fd);
    return $this->_pos;
  }

  function currentpos() {
    return $this->_pos;
  }

  function length() {
    return $this->_length;
  }

  function close() {
    fclose($this->_fd);
  }

}

// Preloads entire file in memory first, then creates a StringReader 
// over it (it assumes knowledge of StringReader internals)
class FAlbum_CachedFileReader extends FAlbum_StringReader {
  function FAlbum_CachedFileReader($filename) {
    if (file_exists($filename)) {

      $length=filesize($filename);
      $fd = fopen($filename,'rb');

      if (!$fd) {
	$this->error = 3; // Cannot read file, probably permissions
	return false;
      }
      $this->_str = fread($fd, $length);
      fclose($fd);

    } else {
      $this->error = 2; // File doesn't exist
      return false;
    }
  }
}



/////


/*
   Copyright (c) 2003 Danilo Segan <danilo@kvota.net>.
   Copyright (c) 2005 Nico Kaiser <nico@siriux.net>
   
   This file is part of PHP-gettext.

   PHP-gettext is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

   PHP-gettext is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with PHP-gettext; if not, write to the Free Software
   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/
 
/**
 * Provides a simple gettext replacement that works independently from
 * the system's gettext abilities.
 * It can read MO files and use them for translating strings.
 * The files are passed to gettext_reader as a Stream (see streams.php)
 * 
 * This version has the ability to cache all strings and translations to
 * speed up the string lookup.
 * While the cache is enabled by default, it can be switched off with the
 * second parameter in the constructor (e.g. whenusing very large MO files
 * that you don't want to keep in memory)
 */
class FAlbum_gettext_reader {
  //public:
   var $error = 0; // public variable that holds error code (0 if no error)
   
   //private:
  var $BYTEORDER = 0;        // 0: low endian, 1: big endian
  var $STREAM = NULL;
  var $short_circuit = false;
  var $enable_cache = false;
  var $originals = NULL;      // offset of original table
  var $translations = NULL;    // offset of translation table
  var $pluralheader = NULL;    // cache header field for plural forms
  var $total = 0;          // total string count
  var $table_originals = NULL;  // table for original strings (offsets)
  var $table_translations = NULL;  // table for translated strings (offsets)
  var $cache_translations = NULL;  // original -> translation mapping


  /* Methods */
  
    
  /**
   * Reads a 32bit Integer from the Stream
   * 
   * @access private
   * @return Integer from the Stream
   */
  function readint() {
      $stream = $this->STREAM->read(4);
      if ($this->BYTEORDER == 0) {
        // low endian
        $unpacked = unpack('V',$stream);
        return array_shift($unpacked);
      } else {
        // big endian
        $unpacked = unpack('N',$stream);
        return array_shift($unpacked);
      }
    }

  /**
   * Reads an array of Integers from the Stream
   * 
   * @param int count How many elements should be read
   * @return Array of Integers
   */
  function readintarray($count) {
    if ($this->BYTEORDER == 0) {
        // low endian
        return unpack('V'.$count, $this->STREAM->read(4 * $count));
      } else {
        // big endian
        return unpack('N'.$count, $this->STREAM->read(4 * $count));
      }
  }
  
  /**
   * Constructor
   * 
   * @param object Reader the StreamReader object
   * @param boolean enable_cache Enable or disable caching of strings (default on)
   */
  function FAlbum_gettext_reader($Reader, $enable_cache = true) {
    // If there isn't a StreamReader, turn on short circuit mode.
    if (! $Reader) {
      $this->short_circuit = true;
      return;
    }
    
    // Caching can be turned off
    $this->enable_cache = $enable_cache;

    // $MAGIC1 = (int)0x950412de; //bug in PHP 5
    $MAGIC1 = (int) - 1794895138;
    // $MAGIC2 = (int)0xde120495; //bug
    $MAGIC2 = (int) - 569244523;

    $this->STREAM = $Reader;
    $magic = $this->readint();
    if ($magic == $MAGIC1) {
      $this->BYTEORDER = 0;
    } elseif ($magic == $MAGIC2) {
      $this->BYTEORDER = 1;
    } else {
      $this->error = 1; // not MO file
      return false;
    }
    
    // FIXME: Do we care about revision? We should.
    $revision = $this->readint();
    
    $this->total = $this->readint();
    $this->originals = $this->readint();
    $this->translations = $this->readint();
  }
  
  /**
   * Loads the translation tables from the MO file into the cache
   * If caching is enabled, also loads all strings into a cache
   * to speed up translation lookups
   * 
   * @access private
   */
  function load_tables() {
    if (is_array($this->cache_translations) &&
      is_array($this->table_originals) &&
      is_array($this->table_translations))
      return;
    
    /* get original and translations tables */
    $this->STREAM->seekto($this->originals);
    $this->table_originals = $this->readintarray($this->total * 2);
    $this->STREAM->seekto($this->translations);
    $this->table_translations = $this->readintarray($this->total * 2);
    
    if ($this->enable_cache) {
      $this->cache_translations = array ();
      /* read all strings in the cache */
      for ($i = 0; $i < $this->total; $i++) {
        $this->STREAM->seekto($this->table_originals[$i * 2 + 2]);
        $original = $this->STREAM->read($this->table_originals[$i * 2 + 1]);
        $this->STREAM->seekto($this->table_translations[$i * 2 + 2]);
        $translation = $this->STREAM->read($this->table_translations[$i * 2 + 1]);
        $this->cache_translations[$original] = $translation;
      }
    }
  }
  
  /**
   * Returns a string from the "originals" table
   * 
   * @access private
   * @param int num Offset number of original string
   * @return string Requested string if found, otherwise ''
   */
  function get_original_string($num) {
    $length = $this->table_originals[$num * 2 + 1];
    $offset = $this->table_originals[$num * 2 + 2];
    if (! $length)
      return '';
    $this->STREAM->seekto($offset);
    $data = $this->STREAM->read($length);
    return (string)$data;
  }
  
  /**
   * Returns a string from the "translations" table
   * 
   * @access private
   * @param int num Offset number of original string
   * @return string Requested string if found, otherwise ''
   */
  function get_translation_string($num) {
    $length = $this->table_translations[$num * 2 + 1];
    $offset = $this->table_translations[$num * 2 + 2];
    if (! $length)
      return '';
    $this->STREAM->seekto($offset);
    $data = $this->STREAM->read($length);
    return (string)$data;
  }
  
  /**
   * Binary search for string
   * 
   * @access private
   * @param string string
   * @param int start (internally used in recursive function)
   * @param int end (internally used in recursive function)
   * @return int string number (offset in originals table)
   */
  function find_string($string, $start = -1, $end = -1) {
    if (($start == -1) or ($end == -1)) {
      // find_string is called with only one parameter, set start end end
      $start = 0;
      $end = $this->total;
    }
    if (abs($start - $end) <= 1) {
      // We're done, now we either found the string, or it doesn't exist
      $txt = $this->get_original_string($start);
      if ($string == $txt)
        return $start;
      else
        return -1;
    } else if ($start > $end) {
      // start > end -> turn around and start over
      return $this->find_string($string, $end, $start);
    } else {
      // Divide table in two parts
      $half = (int)(($start + $end) / 2);
      $cmp = strcmp($string, $this->get_original_string($half));
      if ($cmp == 0)
        // string is exactly in the middle => return it
        return $half;
      else if ($cmp < 0)
        // The string is in the upper half
        return $this->find_string($string, $start, $half);
      else
        // The string is in the lower half
        return $this->find_string($string, $half, $end);
    }
  }
  
  /**
   * Translates a string
   * 
   * @access public
   * @param string string to be translated
   * @return string translated string (or original, if not found)
   */
  function translate($string) {
    if ($this->short_circuit)
      return $string;
    $this->load_tables();     
    
    if ($this->enable_cache) {
      // Caching enabled, get translated string from cache
      if (array_key_exists($string, $this->cache_translations))
        return $this->cache_translations[$string];
      else
        return $string;
    } else {
      // Caching not enabled, try to find string
      $num = $this->find_string($string);
      if ($num == -1)
        return $string;
      else
        return $this->get_translation_string($num);
    }
  }

  /**
   * Get possible plural forms from MO header
   * 
   * @access private
   * @return string plural form header
   */
  function get_plural_forms() {
    // lets assume message number 0 is header  
    // this is true, right?
    $this->load_tables();
    
    // cache header field for plural forms
    if (! is_string($this->pluralheader)) {
      if ($this->enable_cache) {
        $header = $this->cache_translations[""];
      } else {
        $header = $this->get_translation_string(0);
      }
      if (eregi("plural-forms: (.*)\n", $header, $regs))
        $expr = $regs[1];
      else
        $expr = "nplurals=2; plural=n == 1 ? 0 : 1;";
      $this->pluralheader = $expr;
    }
    return $this->pluralheader;
  }

  /**
   * Detects which plural form to take
   * 
   * @access private
   * @param n count
   * @return int array index of the right plural form
   */
  function select_string($n) {
    $string = $this->get_plural_forms();
    $string = str_replace('nplurals',"\$total",$string);
    $string = str_replace("n",$n,$string);
    $string = str_replace('plural',"\$plural",$string);
    
    $total = 0;
    $plural = 0;

    eval("$string");
    if ($plural >= $total) $plural = 0;
    return $plural;
  }

  /**
   * Plural version of gettext
   * 
   * @access public
   * @param string single
   * @param string plural
   * @param string number
   * @return translated plural form
   */
  function ngettext($single, $plural, $number) {
    if ($this->short_circuit) {
      if ($number != 1)
        return $plural;
      else
        return $single;
    }

    // find out the appropriate form
    $select = $this->select_string($number); 
    
    // this should contains all strings separated by NULLs
    $key = $single.chr(0).$plural;
    
    
    if ($this->enable_cache) {
      if (! array_key_exists($key, $this->cache_translations)) {
        return ($number != 1) ? $plural : $single;
      } else {
        $result = $this->cache_translations[$key];
        $list = explode(chr(0), $result);
        return $list[$select];
      }
    } else {
      $num = $this->find_string($key);
      if ($num == -1) {
        return ($number != 1) ? $plural : $single;
      } else {
        $result = $this->get_translation_string($num);
        $list = explode(chr(0), $result);
        return $list[$select];
      }
    }
  }

}


global $falbum_lang;	

if (isset($falbum_lang))
	return;	
	
if (defined('FALBUM_LANG')) {	
	$falbum_locale = FALBUM_LANG;
}

if (empty($falbum_locale)) {
	$falbum_locale = 'en_US';			
}

$mofile = FALBUM_PATH . "/lang/falbum-$falbum_locale.mo";

if ( is_readable($mofile)) {
	$input = new FAlbum_CachedFileReader($mofile);
}else{
	return;
}

$falbum_lang = new FAlbum_gettext_reader($input);
		
		
function fa__($text) {
    global $falbum_lang;
	
	if (isset($falbum_lang)) {
		return $falbum_lang->translate($text);		
	} else {
		return $text;
	}
}

function fa_e($text) {
	global $falbum_lang;
	
	if (isset($falbum_lang)) {
		echo $falbum_lang->translate($text);		
	} else {
		echo $text;
	}
}


?>
