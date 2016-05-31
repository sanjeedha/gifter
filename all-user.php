<!DOCTYPE html>

<html>
<head>
<title>List User</title>
<link href="css/user.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<?php

mysql_connect("mysql","sanjeedha","Sanju28021991") or die("Could not connect: " . mysql_error());
      mysql_select_db("phpmyadmin");
      $query = "INSERT INTO `event` (`user`, `event_name`, `timestamp`) 
               VALUES ('abc', 'http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]', now())";
      $result = mysql_query($query);

?>
<?php

	mysql_connect("mysql","sanjeedha","Sanju28021991") or die("Could not connect: " . mysql_error());
	mysql_select_db("phpmyadmin");
	$query = "SELECT * FROM users";         
	$result = mysql_query($query);
	if ($result)
	{
		echo "<p class='tablep'>GIFTER USERS</p>";
		echo "<br><br><table class='utable' border=0 cellpadding=0 cellspacing=0 width=100%><tr class='theader'><td>First Name</td><td>Last Name</td><td>E-Mail</td><td>Address</td><td>Home Phone</td><td>Cell Phone</td></tr>";
		while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo "<tr>";
		$tmp = $r["fname"];
		echo "<td>$tmp</td>";
		$tmp = $r["lname"];
		echo "<td>$tmp</td>";
		$tmp = $r["email"];
		echo "<td>$tmp</td>";
		$tmp = $r["address"];
		echo "<td>$tmp</td>";
		$tmp = $r["hphone"];
		echo "<td>$tmp</td>";
		$tmp = $r["cphone"];
		echo "<td>$tmp</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<p class='tablep'>DANCE ACADEMY USERS</p>";
		echo "<br><br><table class='utable' border=0 cellpadding=0 cellspacing=0 width=100%><tr class='theader'><td>First Name</td><td>Last Name</td><td>E-Mail</td><td>Address</td><td>Home Phone</td><td>Cell Phone</td></tr>";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://nivedithajh.com/jmp/index.php/users?id=32");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$contents = curl_exec ($ch);
	//echo $contents;
	curl_close ($ch);
	$document = new DOMDocument();
	@$document->loadHTML($contents);
	foreach($document->getElementsByTagName('tr') as $tablerow) {
		echo "<tr>";
		foreach($tablerow->getElementsByTagName('td') as $table){
			echo "<td>";
			echo $table->nodeValue;
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	}
	else {
	    die('Invalid query: ' . mysql_error());
	}
	
		
		
	

	?>
</body>
</html>


