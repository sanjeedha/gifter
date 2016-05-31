<?php

	$most_five= isset($_COOKIE['most_five']) ? $_COOKIE['most_five'] : '';

	$l = explode(",", $most_five);

	$most_five_array = array();

	for ($i=0; $i < count($l); $i++) { 
		$ex = explode(":", $l[$i]);
		$element_name = $ex[0];
		$element_count = intval($ex[1]);
		
		$most_five_array[$element_name] = $element_count;
	}

	arsort($most_five_array);

	$most_five_final = array_slice($most_five_array, 0, 5);

	foreach ($most_five_final as $key => $value) {
		print("<a href='$key'>$key</a> was visited $value times.</br></br>");
	}
?>