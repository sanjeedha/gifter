
<?php
if(!empty($_POST))
	{
	
	$email= "";
	$review = "";
	
	if(isset($_POST["email"])) {
		$email= $_POST["email"];
		
	}

	if(isset($_POST["review"])) {
		$review = $_POST["review"];
		
	}
	
	
	if ($email and $review) {
		mysql_connect("mysql","sanjeedha","Sanju28021991") or die("Could not connect: " . mysql_error());
	    mysql_select_db("phpmyadmin");

	    $query = "INSERT INTO `site` (`email`, `review`) 
	             VALUES ('$email', '$review')";
	    $result = mysql_query($query);
	    if ($result) {
	    	
                            $query1 = "SELECT * FROM site ORDER BY time DESC limit 1"; 
                            $result1 = mysql_query($query1);
                            if ($result1)
                            {
                              echo "<br><br><table border=0 cellpadding=0 cellspacing=0 width=100%>";
                              while ($r = mysql_fetch_array($result1, MYSQL_ASSOC)) {
                                echo "<tr>";
                                $tmp = $r["email"];
                                echo "<td style='display: block;'>$tmp</td>";
                                $tmp = $r["review"];
                                echo "<td style='display: block;'>$tmp</td>";
                                echo "</tr>";
                              }
                            echo "</table>";
                            }
                            else {
                                die('Invalid query: ' . mysql_error());
                            }
                         
	    }
	    	else {
	    die('Invalid query: ' . mysql_error());
	}
}
}
?>

