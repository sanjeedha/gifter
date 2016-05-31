r<?php
if(isset($_COOKIE["username"]))
{
	 $username = $_COOKIE["username"];
	 echo $username;
}

?>

<?php

	$last_five= isset($_COOKIE['last_five']) ? $_COOKIE['last_five'] : '';
    if($last_five == "") {
    	$last_five = 'Gents watch';
    }
    else
    {
    	$l = explode(",", $last_five);
    	$c = count($l);
    	if (in_array("Gents watch", $l) && $c > 1&& $c < 5) {
			$index = array_search('Gents watch', $l);
			unset($l[$index]);
    		$last_five = implode(",", $l) . ',Gents watch';
    	}
    	elseif (!in_array("Gents watch", $l)&& $c < 5)
    	{
    		$last_five .= ',Gents watch';
    	}
    }
	setcookie("last_five", $last_five, time() + 60 * 60 * 24 * 5);


	//Last Five Pages
    $last_five_pages= isset($_COOKIE['last_five_pages']) ? $_COOKIE['last_five_pages'] : '';

	$lp = explode(",", $last_five_pages);

	$array_count_pages = count($lp);

	if ($last_five_pages == "") {
		$last_five_pages .= "gentswatch.php";
	} elseif ($array_count_pages == 5) {
		$last_five_pages = implode(",", array_slice($lp, 1)) . ",gentswatch.php";
	} else {
		$last_five_pages .= ",gentswatch.php";
	}

	setcookie("last_five_pages", $last_five_pages, time() + 60 * 60 * 24 * 5);

	// Most Five
	$most_five = isset($_COOKIE['most_five']) ? $_COOKIE['most_five'] : '';
	if ($most_five == "")
	{
		$most_five = "gentswatch.php:1";
		
	}
	else
    {
    	$l = explode(",", $most_five);
		$element_index = -1;

    	for ($i=0; $i < count($l); $i++) { 
    		$ex = explode(":", $l[$i]);
    		$element_name = $ex[0];
    		$element_count = intval($ex[1]);
			
			if ($element_name == "gentswatch.php") {
				$element_count = $element_count + 1;
				$element_index = $i;
			}
    		
    	}

    	// echo "<script type='text/javascript'>alert('$element_name');</script>";
		
		if ($element_index == -1) {
			$most_five .= ',gentswatch.php:1';
		}
		else {
			$l[$element_index] = $element_name . ":" . $element_count;
			$tmp = $l[$element_index];
			$most_five = implode(",", $l);
		}
    }
	setcookie("most_five", $most_five, time() + 60 * 60 * 24 * 5);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>watch</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php

mysql_connect("mysql","sanjeedha","Sanju28021991") or die("Could not connect: " . mysql_error());
      mysql_select_db("phpmyadmin");
      $query = "INSERT INTO `event` (`user`, `event_name`, `timestamp`) 
               VALUES ('abc', 'http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]', now())";
      $result = mysql_query($query);

      $query1 = "INSERT INTO visits (`product`,`count`, `link`) VALUES ('cufflink', 1, 'http://www.sanjeedhasjsu.com/gentswatch.php') ON DUPLICATE KEY UPDATE count = count+1 ";
      $result1 = mysql_query($query1);

?>
    <div class="b-content">
     <div id="content_8" class="fr-test">
		<div id="content_7" class="fr-widget fr-container fr_content_7">

            <div id="hd7_image" class="fr-widget fr-container fr_hd7_image">
            	<img src="images/gentswatch.jpg"/>
            	
            </div>
	        <div id="hd7_name" class="fr-widget fr-text fr-wf fr_h4_black fr_hd7_name">
	            <div class="fr-text">SILVER&nbsp;GENT'S WATCH</div>
	            <?php

	mysql_connect("mysql","sanjeedha","Sanju28021991") or die("Could not connect: " . mysql_error());
	mysql_select_db("phpmyadmin");
	$query = "SELECT ROUND(AVG(rating)) AS rating FROM reviews WHERE prod_id=1";         
	$result = mysql_query($query);
	if ($result)
	{
		while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$tmp = $r["rating"];
		echo "<img src= 'images/" . $tmp . "star.png' width=100px>";	
	}
	echo "</table>";
	
	}
	else {
	    die('Invalid query: ' . mysql_error());
	}
?>
	        </div>
	        <div id="hd7_description" class="fr-widget fr-text fr-wf fr_paragraph_center_black fr_hd7_description">
	            <div class="fr-text">$150</div><a href="https://twitter.com/share" class="twitter-share-button" data-hashtags="marketplace">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	        </div>
	        <div id="hd7_paragraph" class="fr-widget fr-text fr-wf fr_paragraph_center_grey fr_hd7_paragraph">
	            <div class="fr-text">
	            	<p>
	            		<span>Men's aqua rider chronograph diving watch</span>
	                </p>
	                <p>
	                	<span>Stainless steel with sapphire crystal, water-resistant to 200 M, unidirectional rotating bezel</span>
	                </p>
	                <p>
	                	<span>Swiss-quartz Movement</span>
	                </p>
	                <p>
	                	<span>Case Diameter: 44mm</span>
	                </p>
	                <p>
	                	<span>Water Resistant To 660 Feet</span>
	                </p>
	                </div>
	          </div>
          </div>
<form class="review_form" action="reviews.php" method="post" accept-charset="utf-8">
    <fieldset>
    	<legend>Review This Product</legend>	
    	<label for="email">Email</label>
    	<input type="text" name="email_id" value=""/>
    	<label for="rating">Rating</label>
    	<br>
		<input type="radio" name="rating" value="5" /> 5 
		<input type="radio" name="rating" value="4" /> 4
  		<input type="radio" name="rating" value="3" /> 3 
  		<input type="radio" name="rating" value="2" /> 2 
  		<input type="radio" name="rating" value="1" /> 1
    	<br><br>
    	<label for="review">Review</label>
    	<textarea name="review" rows="8" cols="40"></textarea>
	    <input type="submit" value="Submit Review">
	    <input type="hidden" name="prod_id" value="1" id="product_id">
	</fieldset>
</form>
<?php

	mysql_connect("mysql","sanjeedha","Sanju28021991") or die("Could not connect: " . mysql_error());
	mysql_select_db("phpmyadmin");
	$query = "SELECT * FROM reviews WHERE prod_id=1";         
	$result = mysql_query($query);
	if ($result)
	{
		echo "<br><br><table class='reviewtable' border=0 cellpadding=0 cellspacing=0 width=100%>";
		while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo "<tr>";
		$tmp = $r["email_id"];
		echo "<td>$tmp</td>";
		$tmp = $r["rating"];
		echo "<td><img src= 'images/" . $tmp . "star.png' width=100px></td>";
		$tmp = $r["review"];
		echo "<td>$tmp</td>";
		echo "</tr>";
	}
	echo "</table>";
	}
	else {
	    die('Invalid query: ' . mysql_error());
	}
?>

                </div>
     
</body>

</html>
