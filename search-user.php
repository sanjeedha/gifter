<!DOCTYPE html>

<html>
<head>
<title>Search User</title>
<link href="css/user.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<div class="user">
	<div class="container">
		<div class="user-header">
			<h3 class="title">Search User</h3>
		</div>
		<div class="user-gds">
			<div class="col-md-6 user-top">
				<form method="POST" action = "">
					<div class="con-text">
					 	<span>First Name </span>		
						<input name="fname" type="text" value="" >						
					</div>
					<div class="con-text">
						<span>Last Name </span>		
						<input name="lname" type="text" value="" >						
					</div>
					<div class="con-text">
					  <span>Email </span>		
					  <input name="email" type="text" value="" >						
					</div>
					<div class="con-text">
					  <span>Home Phone </span>		
					  <input name="hphone" type="text" value="" >						
					</div>
					<div class="con-text">
					  <span>Cell Phone </span>		
					  <input name="cphone" type="text" value="" >						
					</div>
					<input type="submit" value="SEARCH" >
				</form>
			</div>
		</div>
	</div>
</div>
</body>
<?php
	if(!empty($_POST))
	{
	$fname = "";
	$lname = "";
	$email = "";
	$hphone = "";
	$cphone = "";

	if(isset($_POST["fname"])) {
		$fname = $_POST["fname"];
		if($fname)
		{
			if(!preg_match("/^[a-z_]+$/i", $fname))
			{
				echo "<p class='errormsg'> Invalid First Name!</p>";
				die();
			}
		}
	}

	if(isset($_POST["lname"])) {
		$lname = $_POST["lname"];
		if($lname)
		{
			if(!preg_match("/^[a-z_]+$/i", $lname))
			{
				echo "<p class='errormsg'> Invalid Last Name!</p>";
				die();
			}
		}
	}

	if(isset($_POST["email"])) {
		$email = $_POST["email"];
		if($email){
			$reg = '/^([\w\.-]+)@([\w\.-]+)\.([a-z\.]{2,6})$/';

			if (!preg_match($reg, $email))
			{
				echo "<p class='errormsg'> Invalid E-mail Address!</p>";
				die();
			}
		}
		
	}

	if(isset($_POST["hphone"])) {
		$hphone = $_POST["hphone"];
		if($hphone) {
			$reg = '/^(?:\+?1[-. ]?)?\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';
		
			if (!preg_match($reg, $hphone))
			{
				echo "<p class='errormsg'> Invalid Home-phone Number!</p>";
				die();
			}
			$hphone = str_replace("-", "", $hphone);
			$hphone = str_replace(".", "", $hphone);
			$hphone = str_replace("(", "", $hphone);
			$hphone = str_replace(")", "", $hphone);
			$hphone = str_replace(" ", "", $hphone);
		}
	}

	if(isset($_POST["cphone"])) {
		$cphone = $_POST["cphone"];
		if($cphone) {
			$reg = '/^(?:\+?1[-. ]?)?\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';
			
			if (!preg_match($reg, $cphone))
			{
				echo "<p class='errormsg'> Invalid Cell-phone Number!</p>";
				die();
			}
			$cphone = str_replace("-", "", $cphone);
			$cphone = str_replace(".", "", $cphone);
			$cphone = str_replace("(", "", $cphone);
			$cphone = str_replace(")", "", $cphone);
			$cphone = str_replace(" ", "", $cphone);
		}
	}
      
	if (!$fname and !$lname and !$email and !$hphone and !$cphone) {
		echo "<p class='errormsg'> Please enter at least one search criteria !</p>";
	}
	else {
		mysql_connect("127.0.0.1","root","") or die("Could not connect: " . mysql_error());
	    mysql_select_db("phpmyadmin");
	    $query = "SELECT * FROM users WHERE (`fname`='$fname' AND `fname`!='') OR (`lname`='$lname' AND `lname`!='') OR (`email`='$email' AND `email`!='') OR (`hphone`='$hphone' AND `hphone`!='') OR (`cphone`='$cphone' AND `cphone`!='')";         
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
      }
	 }   
?>
</html>
