<?php

	$last_five= isset($_COOKIE['last_five']) ? $_COOKIE['last_five'] : '';

	$l = explode(",", $last_five);

	foreach ($l as &$value) {

    	print("$value</br></br>");
    }
?>