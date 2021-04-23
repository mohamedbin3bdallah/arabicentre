<?php
session_start();
if(!isset($_SESSION['userid']))
{
	$lang = 'en';
	$_SERVER['HTTP_PRAGMA'] = 'no-cache';
	$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
	include('loginfront.php');
?>
<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--[if lt IE 9]> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
<title><?php if(isset($thispage['title'])) echo $thispage['title']; ?></title>
<meta name="description" content="<?php if(isset($thispage['description'])) echo $thispage['description']; ?>">
<meta name="keywords" content="<?php if(isset($thispage['keywords'])) echo $thispage['keywords']; ?>" />
<meta name="author" content="WebThemez">
<link rel="shortcut icon" href="<?php if(isset($system['logo']) && $system['logo'] != '') echo 'uploads/'.$system['logo']; ?>">
<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!--[if lte IE 8]>
		<script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="css/new.css" />

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<link href="css/animate.css" rel="stylesheet" media="screen">
<!-- Owl Carousel Assets -->
<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" href="css/styles.css" />
<!-- Font Awesome -->
<link href="font/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
<header class="header">
  <div class="container">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="#" class="navbar-brand scroll-top logo  animated bounceInLeft"><b><i><img src="<?php if(isset($system['logo']) && $system['logo'] != '') echo 'uploads/'.$system['logo']; ?>" /></i></b></a> </div>
      <!--/.navbar-header-->
      <div id="main-nav" class="collapse navbar-collapse">
        <ul class="nav navbar-nav" id="mainNav">
          <li class="active" id="firstLink"><a href="index.php" class="scroll-link">Home</a></li>
          <li><a href="index.php#Features" class="scroll-link">Features</a></li>
          <li><a href="index.php#aboutUs" class="scroll-link">About Us</a></li>
          <li><a href="index.php#work" class="scroll-link">Courses</a></li>
		  <li><a href="index.php#plans" class="scroll-link">Plans</a></li>
		  <li><a href="blog.php" class="scroll-link">Blog</a></li>
		  <?php if(!empty($genders)) { ?>
          <li class = "dropdown"><a href="#" class="scroll-link dropdown-toggle" data-toggle = "dropdown">Categories<b class = "caret"></b></a>
			<ul class = "dropdown-menu" style="border-radius:5px; background-color:rgba(0, 0, 0, 0.75);">
				<?php for($gd=0;$gd<count($genders);$gd++) { ?>
					<li><center><a href="category.php?id=<?php echo $genders[$gd]['id']; ?>" style="color:#fff;"><?php echo $genders[$gd]['title']; ?></a></center></li>
				<?php } ?>
			</ul>
		  </li>
		  <?php } ?>
          <li><a href="index.php#team" class="scroll-link">Testimonials</a></li>
		  <?php if(isset($_SESSION['userid'])) { ?>
			<li><a href="orders.php" class="scroll-link">Orders</a></li>          
			<li><a href="logout.php" class="scroll-link">Logout</a></li>
		  <?php } else { ?>
			<li><a href="register.php" class="scroll-link">Register</a></li>
			<li><a href="login.php" class="scroll-link">Login</a></li>
		  <?php } ?>
          <li><a href="index.php#contactUs" class="scroll-link">Contact Us</a></li>
          
          
           
        </ul>
      </div>
      <!--/.navbar-collapse--> 
    </nav>
    <!--/.navbar--> 
  </div>
  <!--/.container--> 
</header>
<!--/.header-->
<div id="#top"></div>

<section style="height: 175px;" >
</section>

<section id="" class="contact-parlex">
	<div class="parlex-back">
		<div class="container">
			<div class="row" style="margin-bottom:25px; text-align:center;">
				<h3>Login</h3>
			</div>
			
			<div class="row" style="margin-bottom:25px; text-align:center; color:red;">
				<div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
					<?php
						if(isset($_GET['message']) && $_GET['message'] == 1) echo 'All Inputs are Required';
						elseif(isset($_GET['message']) && $_GET['message'] == 2) echo 'Wrong Username or Password';
						elseif(isset($_GET['message']) && $_GET['message'] == 3) echo 'Account Not Active';
					?>
				</div>
			</div>
				
			<div class="row">
			<div class="col-sm-8 col-md-8 col-sm-offset-3 col-md-offset-3">
				<form class="form-horizontal" action="login.php" method="POST" enctype="multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label for="username" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label">Username</label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="text" class="form-control" name="username" id="username" maxlength="100" placeholder="Username" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label">Password</label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<input type="submit" class="btn btn-info" name="submit" id="submit" value="Login" />
					</div>
				</div>
				</form>
			</div>
			</div>
			
		</div>
	</div>
</section>

<footer>
<div class="container">
        <div class="row">
            <div class="col-md-6">
            	<div class="col">
                   <h4>Contact us</h4>
                   <ul>
                        <li><?php echo $contact['address']; ?></li>
                        <li>Phone: <?php echo $contact['phone']; ?> </li>
						<li>Mobile: <?php echo $contact['mobile']; ?> </li>
                        <li>Email: <a href="mailto:<?php echo $contact['email']; ?>" title="Email Us"><?php echo $contact['email']; ?></a></li>
                    </ul>
                 </div>
            </div>
            
            <!--<div class="col-md-3">
            	<div class="col">
                    <h4>Mailing list</h4>
                    <p>Lorem ipsum dolor sit amet, ea eum labitur scsstie percipitoleat.</p>
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Your email address...">
                            <span class="input-group-btn">
                                <button class="btn" type="button">Go!</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>-->
            
            <div class="col-md-6">
            	<div class="col col-social-icons">
                    <h4>Follow us</h4>
                    <?php if(isset($contact['facebook']) && $contact['facebook'] != '') { ?><a href="<?php echo $contact['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php } ?>
                    <?php if(isset($contact['googleplus']) && $contact['googleplus'] != '') { ?><a href="<?php echo $contact['googleplus']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php } ?>
                    <?php if(isset($contact['youtube']) && $contact['youtube'] != '') { ?><a href="<?php echo $contact['youtube']; ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php } ?>
                    <?php if(isset($contact['flickr']) && $contact['flickr'] != '') { ?><a href="<?php echo $contact['flickr']; ?>" target="_blank"><i class="fa fa-flickr"></i></a><?php } ?>
                    <?php if(isset($contact['linkedin']) && $contact['linkedin'] != '') { ?><a href="<?php echo $contact['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php } ?>
                    <?php if(isset($contact['linkedin']) && $contact['linkedin'] != '') { ?><a href="<?php echo $contact['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php } ?>
                    <?php if(isset($contact['skype']) && $contact['skype'] != '') { ?><a href="<?php echo $contact['skype']; ?>" target="_blank"><i class="fa fa-skype"></i></a><?php } ?>
                    <?php if(isset($contact['pinterest']) && $contact['pinterest'] != '') { ?><a href="<?php echo $contact['pinterest']; ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php } ?>
                </div>
            </div>

             <!--<div class="col-md-3">
             	<div class="col">
                    <h4>Latest News</h4>
                    <p>
                    Lorem ipsum dolor labitur scsstie per sit amet, ea eum labitur scsstie percipitoleat.
                    <br><br>
                    <a href="#" class="btn">Get Mores!</a>
                    </p>
                </div>
            </div>-->
        </div>
         
    </div>
    
</footer>
<!--/.page-section-->
<section class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center"> Copyright 2016 | All Rights Reserved -- Designed by -  <a href="http://onetrusted.com"> onetrusted</a> </div>
    </div>
    <!-- / .row --> 
  </div>
</section>
<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a> 

<!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]--> 
<script src="js/modernizr-latest.js"></script> 
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script> 
<script src="js/jquery.isotope.min.js" type="text/javascript"></script> 
<script src="js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script> 
<script src="js/jquery.nav.js" type="text/javascript"></script> 
<script src="js/jquery.fittext.js"></script>
<script src="js/waypoints.js"></script> 
 <script src="contact/jqBootstrapValidation.js"></script>
<script src="js/custom.js" type="text/javascript"></script> 
<script src="js/owl-carousel/owl.carousel.js"></script>
</body>
</html>
<?php } else header('Location: orders.php'); ?>