<!DOCTYPE html>

<html>
<head>
<title>List User</title>
<link href="css/user.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<?php

	mysql_connect("127.0.0.1","root","") or die("Could not connect: " . mysql_error());
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
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://nivedithajh.com/jmp/index.php/users?id=32");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$contents = curl_exec ($ch);
	curl_close ($ch);
	$dom = new DOMDocument();
	@$dom->loadHTML($contents);

	foreach($dom->getElementsByTagName('tr') as $buffer) {
		echo "<tr>";
		foreach ($buffer->getElementsByTagName('td') as $td) {
			$tmp = $td->nodeValue;
			echo "<td>$tmp</td>"; 
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