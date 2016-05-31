<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="css/user.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
    <?php

        mysql_connect("mysql","sanjeedha","Sanju28021991") or die("Could not connect: " . mysql_error());
        mysql_select_db("phpmyadmin");
        $query = "SELECT product.prod_name, product.image_link, ROUND(AVG(reviews.rating),1) AS rating FROM reviews JOIN product ON product.prod_id = reviews.prod_id GROUP BY reviews.prod_id ORDER BY ROUND(AVG(reviews.rating)) DESC limit 5 ;";         
        $result = mysql_query($query);
        if ($result)
        {
            echo "<br><br><table class='utable' border=0 cellpadding=0 cellspacing=0 width=100%><tr class='theader'><td>products</td><td>rating</td><td>image link</td></tr>";
            while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
            echo "<tr>";
            $tmp = $r["prod_name"];
            echo "<td>$tmp</td>";
            $tmp = $r["rating"];
            echo "<td>$tmp</td>";
            $tmp = $r["image_link"];
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
    