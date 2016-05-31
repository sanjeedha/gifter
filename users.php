<!DOCTYPE html>
<html>
<head>
<title>User Section</title>
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
<div class="banner">
	<div class="container">
		<div class="banner-info">
			<div  id="top" class="callbacks_container">
				<div class="banner-text">
					<h3>USER SECTION</h3>
					<a href="create-user.php" class="hvr-rectangle-out button">CREATE NEW USER</a>
					<a href="search-user.php" class="hvr-rectangle-out button">SEARCH USER</a>
					<a href="list-user.php" class="hvr-rectangle-out button">GIFTER USERS</a>
					<a href="all-user.php" class="hvr-rectangle-in button">GIFTER AND DANCE ACADEMY USERS</a>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>