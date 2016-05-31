<?php

	$last_five_pages= isset($_COOKIE['last_five_pages']) ? $_COOKIE['last_five_pages'] : '';

	$l = explode(",", $last_five_pages);

	foreach ($l as &$value) {
    	print("<a href='$value'>$value</a></br></br>");
    }
?>