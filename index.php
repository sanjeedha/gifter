<!DOCTYPE html>
<?php
$cookie_value = $_POST['username'];
setcookie("history",$cookie_value);
$user = $_POST['username'];
?>

  <head>
    <title>GIFTER</title>
    <meta name="description" content="" />
    <meta name="author" content="templatemo">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/templatemo_misc.css">
   	<link type="text/css" rel="stylesheet" href="css/easy-responsive-tabs.css" />
    <link href="css/templatemo_style.css" rel="stylesheet"> 
    <link rel="icon" type="image/png" href="images/gift.png">
        
	<script src="js/jquery-1.10.2.min.js"></script> 
	<script src="js/jquery.lightbox.js"></script>
	<script src="js/templatemo_custom.js"></script>
    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>  
     <script>
    function showhide()
    {
        var div = document.getElementById("post");
		if (div.style.display !== "none") 
		{
			div.style.display = "none";
		}
		else 
		{
			div.style.display = "block";
		}
    }
  </script>
  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <?php
    include "front.html";
    if(!empty($_POST)) {
      if(isset($_POST["username"])) {
        $username = $_POST["username"];
        echo '<scriipt type="text/javascript">alert("'.$username.'");</script>';
      }
    }
  ?>
    	<!-- logo start -->
    <div class="logocontainer">
    	<div class="row">
        	<h1><a href="#">GIFTER</a></h1>
            <div class="clear"></div>
            <br>
       </div>
    </div>
    <!-- logo end -->    
   <div id="menu-container" class="main_menu">
   <!-- homepage start -->
    <div class="content homepage" id="menu-1">
    <div class="container">
          	<div class="col-md-3 col-sm-6 templatemo_leftgap">
            	<div class="templatemo_mainservice templatemo_botgap templatemo_opacity">
                	<div class="templatemo_link"><a class="show-2 templatemo_page2" href="#">News</a></div>
                	
                </div>
                <div class="templatemo_mainimg"><img src="http://www.eflorist.co.uk/Products/Flowers/Bouquets/600x700/MD11VASPR01R.jpg" alt="home img 01"></div>
            </div>
            <div class="col-md-3 col-sm-6 templatemo_leftgap">
            	<div class="templatemo_mainimg templatemo_botgap templatemo_portfotopgap"><img src="http://www.shirleysnellsflorist.co.uk/sites/shirleysnellsflorist.co.uk/files/F_VD12BXHT06R.jpg" alt="home img 02"></div>
                <div class="templatemo_mainportfolio templatemo_opacity">
                      <div class="templatemo_link"><a class="show-3 templatemo_page3" href="#">Contacts</a></div>
                	                   
                </div>
            </div>
            <div class="col-md-3 col-sm-6 templatemo_leftgap">
            	<div class="templatemo_maintesti templatemo_botgap templatemo_topgap templatemo_opacity">
                	<div class="templatemo_link"><a class="show-4 templatemo_page4" href="#">Products</a></div>
                </div>
                <div class="templatemo_mainimg"><img src="http://camillestyles.com/wp-content/uploads/2011/07/4U.jpg" alt="home img 03"></div>
            </div>
            <div class="col-md-3 col-sm-6 templatemo_leftgap">
            	<div class="templatemo_mainimg templatemo_botgap templatemo_topgap">
             	   <img src="http://a.dilcdn.com/bl/wp-content/uploads/sites/8/2014/01/Gift-Packaging-Storyboard.jpg" alt="home img 04">
                </div>
                <div class="templatemo_mainabout templatemo_botgap templatemo_opacity">
                	<div class="templatemo_link"><a class="show-5 templatemo_page5" href="#">About Us</a></div>
                </div>
                <div class="templatemo_maincontact templatemo_opacity">
                	<div class="templatemo_link"><a class="show-6 templatemo_page6" href="#">Reach Us</a></div>
                </div>
            </div>
    </div>
    
   </div>
    <!-- homepage end -->
    <!--services start -->
   <div class="content services" id="menu-2">
		<div class="container">
        	<div class="row templatemo_bordergapborder">
            	<div class="col-md-3 col-sm-12 templatemo_leftgap">
                	<div class="templatemo_mainimg templatemo_botgap"><img src="http://teslathemes.com/demo/wp/blogojoy/wp-content/uploads/2014/12/post-3.jpg" alt="service image"></div>
                    <div class="templatemo_mainservice templatemo_botgap templatemo_opacity">
                	<div class="templatemo_linkservice"><a class="show-1 templatemo_homeservice" href="#">Go Back</a></div>
                </div>
                </div>
                
                <div class="templatemo_col37 col-sm-12 templatemo_leftgap">
                	<div class="templatemo_graybg">
                    <div class="templatemo_frame">
                	<h2>News</h2>
                    <div class="clear"></div>
                    <p>
                    <ul>
                      <li><a href="news1/index.html">New Customer enjoys 15% discount</a><br>
                      <p>New customers are an asset to us and we reward them with an additional 15% discount....  </p>
                      </li>
                      <li><a href="news2/index.html">Gifter now does international gifting</a><br>
                      <p>Not only do we do local shipping around the nation,We also have started international gifting services. Give us any location....</p>
                      </li>
                      <li><a href="news3/index.html">Gifter offers suggestions for gifts depending on the occasion</a><br>
                      <p>Are you confused about selecting the right gifts for a special occasion. No worries. We have our team of experts who will help you to select.....</p>
                      </li>
                      <li><a href="news4/index.html">Planning to celebrate your loved one's Birthday with a midnight cake and a surprise gift!</a><br>
                      <p>Are you planning for a Birthday surprise for a special one? The one simple thing you can do is visit us and tell about your specifications. We help you celebrate..</p>
                      </li>

                    </ul>
                      
                    </p>
                    </div>
               	  </div>
              </div >               
              <div class="templatemo_col37 col-sm-12 templatemo_leftgap templatemo_topgap">
                	<div class="templatemo_mainimg templatemo_botgap"><img src="images/Cute-Candy-Color-Macaron-Mini-Cosmetic-Jewelry-Storage-Box-Jewelry-Box-Pill-Case-Birthday-Gift-Display.jpg" alt="service image"></div>
                </div>
            </div>
        </div>
     </div>
	    
    <!-- services end -->	

	<!-- portfilio start -->
    <div class="portfolio" id="menu-3" style="display: none;" >
    	<div class="container">
          	<div class="col-md-3 col-sm-6 templatemo_leftgap">
       	      <div class="templatemo_insideportfolio templatemo_botgap">
               	  <div class="templatemo_portfoliotext">
                	<h2>Contacts</h2>
                    <div class="clear"></div>
                    We are free to hear your comments,compliments or drop any question for us to answer and we swear that we would reply really quick because you are our valued cutomers. Drop your mail at Gifter@gmail.com! We hope that you enjoy our service ! </div>
              </div>
            	<div class="templatemo_portfolioback">
                	<div class="templatemo_link"><a class="show-1 templatemo_homeportfolio" href="#">Go Back</a></div>
                </div>
                
            </div>
            <div class="col-md-3 col-sm-6 templatemo_leftgap">
                        <div class="templatemo_botgap templatemo_portfotopgap gallery-item">
							<img src="images/portfolio/a04.png"  alt="gallery 1">
              <p class="contact-text"><?php echo nl2br( file_get_contents('data/1.txt') ); ?></p>
							<div class="overlay">
								<a href="images/portfolio/a04.png" data-rel="lightbox" class="fa fa-arrows-alt"></a>
							</div>
						</div>				
                <div class="templatemo_botgap templatemo_topgap gallery-item">
             	   <img src="images/portfolio/fd01.png" alt="gallery 2">
<p class="contact-text"><?php echo nl2br( file_get_contents('data/2.txt') ); ?></p>
                   <div class="overlay">
								<a href="images/portfolio/fd01.png" data-rel="lightbox" class="fa fa-arrows-alt"></a>
							</div>
                </div>
                <div class="templatemo_botgap templatemo_topgap gallery-item">
             	   <img src="images/portfolio/fd02.png" alt="gallery 3">
                   <p class="contact-text"><?php echo nl2br( file_get_contents('data/3.txt') ); ?></p>
                   <div class="overlay">
								<a href="images/portfolio/fd02.png" data-rel="lightbox" class="fa fa-arrows-alt"></a>
							</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 templatemo_leftgap">
				<div class="templatemo_botgap templatemo_topgap gallery-item">
             	  	 <img src="images/portfolio/fh01.png" alt="gallery 4">
                         <p class="contact-text"><?php echo nl2br( file_get_contents('data/4.txt') ); ?></p>
                     <div class="overlay">
								<a href="images/portfolio/fh01.png" data-rel="lightbox" class="fa fa-arrows-alt"></a>
							</div>
                </div>
                <div class="templatemo_botgap templatemo_topgap gallery-item">
             	   <img src="images/portfolio/fh04.png" alt="gallery 5">
                   <p class="contact-text"><?php echo nl2br( file_get_contents('data/5.txt') ); ?></p>
                   <div class="overlay">
								<a href="images/portfolio/fh04.png" data-rel="lightbox" class="fa fa-arrows-alt"></a>
							</div>
                </div>
                <div class="templatemo_botgap templatemo_topgap gallery-item">
             	   <img src="images/portfolio/fh05.png" alt="gallery 6">
                   <p class="contact-text"><?php echo nl2br( file_get_contents('data/6.txt') ); ?></p>
                   <div class="overlay">
								<a href="images/portfolio/fh05.png" data-rel="lightbox" class="fa fa-arrows-alt"></a>
							</div>
                </div>
            </div>
    </div>
    </div>
	 <!-- portfolio end -->
	<!-- testimonial start -->
    <div class="content testimonial" id="menu-4">
    		<div class="container">
        	<div class="row templatemo_bordergapborder">
            <!--vertical Tabs-->
      		<div id="cmt">
            <div class="col-md-3 col-sm-12 templatemo_leftgap_about">
            <ul class="resp-tabs-list templatemo_testitab">
                <li>Gifts for Him</li>
                <li>Gifts for Her</li>
                <li>Gifts for kids</li>
            </ul>
            <div class="templatemo_aboutlinkwrapper">
     		<div class="templatemo_link"><a class="show-1 templatemo_hometestimonial" href="index.html">Go Back</a></div>
            </div>
            </div>
            <div class="resp-tabs-container templatemo_testicontainer">
                <div>
                	<div class="templatemo_col50 templatemo_rightgap_about">
                    	<div class="templatemo_graybg templatemo_botgap">
                         <div class="templatemo_frame">
                    	     <div class="templatemo_botgap templatemo_portfotopgap gallery-item">
                              <a href="gentswatch.php">
                                <img src="images/gentswatch.jpg"  alt="gallery 1">
                                <p class="contact-text">Gents watch<br>$150</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                               <a href="cufflink.php">
                                 <img src="images/cufflink.jpg" alt="gallery 2">
                                 <p class="contact-text">Gents Coat Cufflinks<br>$50</p>
                               </a>
                            </div> 
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="gentstie.php">
                              <img src="images/gifts/him/tie.jpg" alt="gallery 3">
                              <p class="contact-text">Gents tie<br>$30</p>
                              </a>
                                 </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="laptop.php">
                              <img src="images/gifts/him/bag.jpg" alt="gallery 2">
                              <p class="contact-text">Gents Laptop Bag<br>$300</p>
                              </a>
                            </div>

                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="fitbit.php">
                              <img src="images/gifts/him/fitbit.jpg" alt="gallery 2">
                              <p class="contact-text">Fitbit Flex<br>$120</p>
                              </a>
                              </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="nike.php">
                              <img src="images/gifts/him/shoe.jpg" alt="gallery 2">
                              <p class="contact-text">Nike Shoes<br>$150</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="sunglass.php">
                              <img src="images/gifts/him/cool.jpeg" alt="gallery 2">
                              <p class="contact-text">SunGlasses<br>$60</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="polo.php">
                              <img src="images/gifts/him/polo.jpg" alt="gallery 2">
                              <p class="contact-text">Polo Shirts<br>$50</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="wallet.php">
                              <img src="images/gifts/him/wallet.jpg" alt="gallery 2">
                              <p class="contact-text">Gents Wallet<br>$30</p>
                              </a>
                              </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="pen.php">
                              <img src="images/gifts/him/print.jpg" alt="gallery 2">
                              <p class="contact-text">3D print pen<br>$110</p>
                              </a>
                             </div>
                          </div>
                        </div>
                      </div>
                    <div class="templatemo_col50 templatemo_leftgap templatemo_botgap"><img src="images/him.jpg" alt="testimonial image"></div>
                </div>
                <div>
                	<div class="templatemo_col50 templatemo_rightgap_about">
                      <div class="templatemo_graybg templatemo_botgap">
                         <div class="templatemo_frame">
                           <div class="templatemo_botgap templatemo_portfotopgap gallery-item">
                           <a href="ring.php">
                              <img src="images/ladiesring.jpg"  alt="gallery 1">
                              <p class="contact-text">Gold plated ladies Ring<br>$150</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="watch.php">
                              <img src="images/ladieswatch.jpg" alt="gallery 2">
                              <p class="contact-text">Ladies Watch<br>$150</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="bag.php">
                              <img src="images/gifts/her/bag.jpg" alt="gallery 2">
                              <p class="contact-text">Ladies Bag<br>$50</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="bracelet.php">
                              <img src="images/gifts/her/charm.jpg" alt="gallery 2">
                              <p class="contact-text">Plated Bracelet<br>$100</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="earring.php">
                              <img src="images/gifts/her/ear.jpg" alt="gallery 2">
                              <p class="contact-text">Pearl Earrings<br>$1500</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="chain.php">
                              <img src="images/gifts/her/necklace.jpeg" alt="gallery 2">
                              <p class="contact-text">Plated Chain<br>$100</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="perfume.php">
                              <img src="images/gifts/her/perfume.jpg" alt="gallery 2">
                              <p class="contact-text">Versace Perfume<br>$60</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="scarf.php">
                              <img src="images/gifts/her/scarf.jpg" alt="gallery 2">
                              <p class="contact-text">Maths Scarf<br>$20</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="top.php">
                              <img src="images/gifts/her/tank.jpg" alt="gallery 2">
                              <p class="contact-text">Tank Top<br>$60</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="belt.php">
                              <img src="images/gifts/kids/belt.jpeg" alt="gallery 2">
                              <p class="contact-text">Leather Belt<br>$50</p>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="templatemo_col50 templatemo_leftgap templatemo_botgap"><img src="images/her.jpg" alt="testimonial image"></div>
                </div>
                <div>
                	<div class="templatemo_col50 templatemo_rightgap_about">
                      <div class="templatemo_graybg templatemo_botgap">
                         <div class="templatemo_frame">
                           <div class="templatemo_botgap templatemo_portfotopgap gallery-item">
                           <a href="kidbag.php">
                              <img src="images/Kids-school-bag.jpg"  alt="gallery 1">
                              <p class="contact-text">Hello Kitty Bag<br>$50</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="lego.php">
                              <img src="images/legokid.jpg" alt="gallery 2">
                              <p class="contact-text">LEGO Blocks<br>$50</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="barbie.php">
                              <img src="images/gifts/kids/barbie.jpg" alt="gallery 2">
                              <p class="contact-text">Barbie Doll<br>$60</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="car.php">
                              <img src="images/gifts/kids/car.jpg" alt="gallery 2">
                              <p class="contact-text">Toy Car<br>$200</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="clay.php">
                              <img src="images/gifts/kids/clay.jpg" alt="gallery 2">
                              <p class="contact-text">Clay Set<br>$30</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="cook.php">
                              <img src="images/gifts/kids/cook.jpg" alt="gallery 2">
                              <p class="contact-text">Cooking Set<br>$40</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="lunch.php">
                              <img src="images/gifts/kids/lunch.jpg" alt="gallery 2">
                              <p class="contact-text">Lunch Boxes<br>$30</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="teddy.php">
                              <img src="images/gifts/kids/teddy.jpeg" alt="gallery 2">
                              <p class="contact-text">Teddy Bear<br>$60</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="tee.php">
                              <img src="images/gifts/kids/tee.jpg" alt="gallery 2">
                              <p class="contact-text">Kids Tee<br>$20</p>
                              </a>
                            </div>
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                            <a href="disney.php">
                              <img src="images/gifts/kids/watch.jpg" alt="gallery 2">
                              <p class="contact-text">Disney Watch<br>$30</p>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="templatemo_col50 templatemo_leftgap templatemo_botgap"><img src="images/child.jpg" alt="testimonial image"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 templatemo_leftgap templatemo_aboutlinkwrapper1">
                	<div class="templatemo_aboutback templatemo_botgap">
                	<div class="templatemo_link"><a class="show-1 templatemo_hometestimonial" href="#">Go Back</a></div>
                </div>
                </div>
    </div>
            </div>
<div>
        <ul class="visited">
            <li>
              <a href="lastfive.php">Last Five Visited Products</a>
            </li>
            <li>
              <a href="lastfivepages.php">Last Five Visited Pages</a>
            </li>
            <li>
              <a href="mostvisit.php">Most Visits</a>
            </li>
        </ul>
    </div>
    </div>
	 <!-- testimonial end -->
     <!-- about start -->
    <div class="content about" id="menu-5">
    	<div class="container">
        	<div class="row templatemo_bordergapborder">
            <!--vertical Tabs-->
      		<div id="ab">
            <div class="col-md-3 col-sm-12 templatemo_leftgap_about">
            <ul class="resp-tabs-list templatemo_tab">
                <li>Our Team</li>
                <li>Our History</li>
                <li>Our Vision</li>
            </ul>
            <div class="templatemo_aboutlinkwrapper">
     		<div class="templatemo_link"><a class="show-1 templatemo_homeabout" href="#">Go Back</a></div>
            </div>
            </div>
            <div class="resp-tabs-container templatemo_aboutcontainer">
                <div>
                	<div class="templatemo_col50 templatemo_rightgap_about">
                    	<div class="templatemo_graybg templatemo_botgap">
                         <div class="templatemo_frame">
                    	<h2>Our Team</h2>
                    	<p>Each one of our team is dedicated to serve you.Our approach is to maintain client satisfaction and foster long term relationships. We take care in sending your gifts to your loved one and making them happy. </p>
                        </div>
                        </div>
                    </div>
                    <div class="templatemo_col50 templatemo_leftgap templatemo_botgap"><img src="images/templatemo_about.jpg" alt="about image"></div>
                </div>
                <div>
                	<div class="templatemo_col50 templatemo_rightgap_about">
                    	<div class="templatemo_graybg templatemo_botgap">
                        <div class="templatemo_frame">
                    	<h2>Our History</h2>
                    	<p> Since 2005,we are proudly carrying your love and care by the way of delivering gifts to your dear ones. From assorted chocolates to teddybears and from personalized to random selection,We have been satisfying customers and will continue doing so in all days to come. We are set to create more history. </p>
                        </div>
                        </div>
                    </div>
                    <div class="templatemo_col50 templatemo_leftgap templatemo_botgap"><img src="images/templatemo_team.jpg" alt="history image"></div>
                </div>
                <div>
                	<div class="templatemo_col50 templatemo_rightgap_about">
                    	<div class="templatemo_graybg templatemo_botgap">
                        <div class="templatemo_frame">
                    	<h2>Our Vision</h2>
                    	<p> We intend to exceed client expectations for a faster and efficient gifting service. Our success is measured by our valued customer satisfaction, growth of our client base internationally and our capacity to sustain excellence in the products and services we offer.</p>
                        </div>
                        </div>
                    </div>
                    <div class="templatemo_col50 templatemo_leftgap templatemo_botgap"><img src="images/templatemo_vision.jpg" alt="vision image"></div>
                </div>
            </div>
        </div>
			<div class="col-sm-12 templatemo_leftgap templatemo_aboutlinkwrapper1">
                	<div class="templatemo_aboutback templatemo_botgap">
                	<div class="templatemo_link"><a class="show-1 templatemo_homeabout" href="#">Go Back</a></div>
                </div>
                </div>
    </div>
            </div>
    </div>
    <!-- about end -->
    <!-- contact start -->
    <div class="content contact" id="menu-6">
    	<div class="container">
        	<div class="row templatemo_bordergapborder">
            	<div class="col-md-3 col-sm-12 templatemo_leftgap">
                	<div class="templatemo_mainimg templatemo_botgap"><img src="images/templatemo_contact1.jpg" alt="contact image"></div>
                    <div class="templatemo_maincontact templatemo_botgap templatemo_opacity">
                	<div class="templatemo_linkcontact"><a class="show-1 templatemo_homecontact" href="#">Go Back</a></div>
                </div>
                </div>
                
                <div class="templatemo_col37 col-sm-12 templatemo_leftgap">
                	<div class="templatemo_graybg templatemo_paddinggap">
                	<h2>Review Us</h2>
                    <div class="clear"></div>
                    	
                      <form role="form" action="sitereview.php" method="post" accept-charset="utf-8">
                          
                          <div class="templatemo_form">
                            <input name="email" type="text" class="form-control" id="email" placeholder="Your Email" maxlength="40">
                          </div>
                           
                          <div class="templatemo_form">
                              <textarea name="review" class="form-control" id="review" placeholder="Your Message..."></textarea>
                          </div>
                          <div class="templatemo_form"><input type="submit" value="Submit Review"></div>

            			</form>
               	  </div>
              </div>
                <div class="templatemo_col37 col-sm-12 templatemo_leftgap templatemo_topgap">
                	<div class="templatemo_graybg templatemo_paddinggap">
                    	<h2>Reviews</h2>
                        <div class="clear"></div>
                        
                        <?php

                            mysql_connect("mysql","sanjeedha","Sanju28021991") or die("Could not connect: " . mysql_error());
                            mysql_select_db("phpmyadmin");
                            $query = "SELECT * FROM site"; 
                            $result = mysql_query($query);
                            if ($result)
                            {
                              echo "<br><br><table border=0 cellpadding=0 cellspacing=0 width=100%>";
                              while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
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
                        ?>

            
        		        </div>
                        <div class="templatemo_address">
                         	San Jose State University<br>
                       	    Tel: 123675849 Email: Gifter@gmail.com
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
        <!-- contact end --> 
    
    </div>
    

    	<!-- logo start -->
    <div class="logocontainer">
    	<div class="row">

            <div class="templatemo_footer">Copyright © 2015 GIFTER</div>
       </div>
    </div>
    <!-- logo end -->  
   <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
				
            }
        });

        $('#ab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true,
        });
		

		$('#cmt').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true,
        });
    });
</script>
<!-- templatemo 405 matrix -->
  </body>
</html>