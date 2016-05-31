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
	$query = "SELECT * FROM users";         
	$result = mysql_query($query);
	if ($result)
	{
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
	}
	else {
	    die('Invalid query: ' . mysql_error());
	}
?>
</body>
</html>