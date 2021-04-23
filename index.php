<?php
	session_start();
	$_SERVER['HTTP_PRAGMA'] = 'no-cache';
	$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
	include('develops/index.php');
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
          <li class="active" id="firstLink"><a href="#top" class="scroll-link">Home</a></li>
          <li><a href="#Features" class="scroll-link">Features</a></li>
          <li><a href="#aboutUs" class="scroll-link">About Us</a></li>
          <li><a href="#work" class="scroll-link">Courses</a></li>
		  <li><a href="#plans" class="scroll-link">Plans</a></li>
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
          <li><a href="#team" class="scroll-link">Testimonials</a></li>
		  <?php if(isset($_SESSION['userid'])) { ?>
			<li><a href="orders.php" class="scroll-link">Orders</a></li>          
			<li><a href="logout.php" class="scroll-link">Logout</a></li>
		  <?php } else { ?>
			<li><a href="register.php" class="scroll-link">Register</a></li>
			<li><a href="login.php" class="scroll-link">Login</a></li>
		  <?php } ?>
          <li><a href="#contactUs" class="scroll-link">Contact Us</a></li>
          
          
           
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

<?php $slides = array_diff(scandir('uploads/slides'), array('.','..')); ?>
<?php if(!empty($slides)) { ?>
  <div class="banner-container"> 
  	<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
  <?php for($sl=2;$sl<count($slides)+2;$sl++) { ?>
    <li data-target="#carousel" data-slide-to="<?php echo $sl; ?>" class="<?php if($sl == 2) echo 'active'; ?>"></li>
  <?php } ?>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
	<?php for($sl=2;$sl<count($slides)+2;$sl++) { ?>
		<div class="<?php if($sl == 2) echo 'active'; ?> item"><img width="100%" src="<?php echo 'uploads/slides/'.$slides[$sl]; ?>" alt="<?php if(isset($system['website']) && $system['website'] != '') echo $system['website'].'banner'; ?>" /></div>
	<?php } ?>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
</div>
  </div>  
<?php } ?>
  
  <div class="container hero-text2">        
		<div class="col-md-9">
		<h2>Why arabic centre?</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed bibendum orci eget nulla mattis, quis viverra tellus porta. Donec vitae neque ut velit eleifend commodo. Maecenas turpis odio, placerat eu lorem ut, suscipit commodo augue.  </p>   
		</div>  
		<div class="col-md-3">
			<a class="btn btn-apply" href="#"><i class="fa fa-play-circle"></i>sign up</a>  
		</div>
  </div>
</section>
<section id="Features" class="page-section colord">
  <div class="container">
    <div class="row"> 
      <!-- item -->
      <div class="col-md-3 text-center"> 
	  <div class="box-item">
	  <i class="circle"><img src="images/5.png" alt="" /></i>
        <h3>Courses</h3>
        <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer elit imperdiet congue.</p>
      </div>
	   </div>
      <!-- end: --> 
      
      <!-- item -->
      <div class="col-md-3 text-center">
	  <div class="box-item">
	  <i class="circle"> <img src="images/1.png" alt="" /></i>
        <h3>Knowledge</h3>
        <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer elit imperdiet congue.</p>
      </div>
	   </div>
      <!-- end: --> 
      
      <!-- item -->
      <div class="col-md-3 text-center">
	  <div class="box-item">
	  <i class="circle"> <img src="images/2.png" alt="" /></i>
        <h3>Reading</h3>
        <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer ultricies sed elit impe.</p>
      </div>
	   </div>
      <!-- end: --> 
      
      <!-- item -->
      <div class="col-md-3 text-center">
	  <div class="box-item">
	  <i class="circle"> <img src="images/3.png" alt="" /></i>
        <h3>Latest News</h3>
        <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer elit imperdiet conempus.</p>
      </div>
      <!-- end:-->
	   </div>
    </div>
  </div>
  <!--/.container--> 
</section>
<section id="aboutUs">
  <div class="container">
    <div class="heading text-center"> 
      <!-- Heading -->
      <h2>About Us</h2>
      <p>At lorem Ipsum available, but the majority have suffered alteration in some form by injected humour.</p>
    </div>
    <div class="row feature design">
      <div class="area1 columns left">
        <h3>Our Design tells about quality</h3>
        <p>Lorem ipsum dolor sit amet, ea eum labitur scsstie percipitoleat fabulas complectitur deterruisset at pro. Odio quaeque reformidans est eu, expetendis intellegebat has ut, viderer invenire ut his. Has molestie percipit an. Falli volumus efficiantur sed id, ad vel noster propriae. Ius ut etiam vivendo, graeci iudicabit constituto at mea. No soleat fabulas prodesset vel, ut quo solum dicunt.
          Nec et jority have suffered alteration. </p>
        <p>Odio quaeque reformidans est eu, expetendis intellegebat has ut, viderer invenire ut his. Has molestie percipit an. Falli volumus efficiantur sed id, ad vel noster propriae. Ius ut etiam vivendo, graeci iudicabit constituto at mea. No soleat fabulas prodesset vel, ut quo solum dicunt.
          Nec et amet vidisse mentitumsstie percipitoleat fabulas. </p>
          <a href="#" class="btn">Request Quote</a>
      </div>
      <div class="area2 columns feature-media right"> <img src="images/about-img.jpg" alt="" width="100%"> </div>
    </div>
    <div class="row dataTxt">	
						<div class="col-md-4 col-sm-6">
							<h3>Our Education</h3>
							<p>Lorem ipsum dolor consectetursit amet, consectetur adipiscing elit consectetur euismod </p>
                            <p>Lorem ipsum dolor sit amet, ea eum labitur scsstie percipitoleat fabulas complectitur deterruisset at pro. Odio quaeque reformidans est eu, expetendis intellegebat has ut, viderer invenire ut his. Has molestie percipit an. Falli volumus efficiantur sed id, ad vel noster propriae. Ius ut etiam vivendo, graeci iudicabit constituto at mea.</p>
							
							<br>
						</div>
						
                        
                        <style>
                 
                         iframe{
                            
                            -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                            -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                            border-radius: 4px;
                            height: 250px;
                            
                         }
                         
                         
                         </style>
                         
						<div class="col-md-4 col-sm-6">
							
                            <h3>Our Education</h3>
                            
                            <iframe src="https://player.vimeo.com/video/36676601" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							
							<!-- Accordion starts -->
						</div>
						
						<div class="col-md-4 col-sm-6">
							
							<h3>Latest News</h3>
							<p>Lorem ipsum dolor consectetursit amet, consectetur adipiscing elit consectetur euismod </p>
                            <ul  class="list3">
								<li>Lorem ipsum dolor consectetursit</li>
								<li>Has molestie percipit an Falli</li>
								<li>Falli volumus efficiantur sed id</li>
								<li>Lorem ipsum dolor consectetu</li> 
							</ul>
                            
							<!-- Accordion starts -->
							</div>
						
					</div>
  </div>
</section>

<?php if(!empty($lastcourses)) { ?>
<section id="work" class="page-section page">
  <div class="container text-center">
    <div class="heading">
      <h2>Courses for All Ages</h2>
      <p>Description Courses for All Ages Description Courses for All Ages Courses for All Ages Courses for All Ages</p>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="portfolio">
          <ul class="items list-unstyled clearfix animated fadeInRight showing" data-animation="fadeInRight" style="position: relative; height: 438px;">
			<?php for($lc=0;$lc<count($lastcourses);$lc++) { ?>
			<li class="item branding" style="position: absolute; left: 0px; top: 0px;"> 
				<figure class="effect-bubba">
					<img src="<?php echo 'uploads/courses/'.$lastcourses[$lc]['picture']; ?>" alt="<?php echo $lastcourses[$lc]['title']; ?>"/>
					<figcaption>
						<h2><?php echo $lastcourses[$lc]['title']; ?></h2> 
						<a href="<?php echo 'course.php?id='.$lastcourses[$lc]['id']; ?>" class="fancybox">View more</a> 
					</figcaption>			
				</figure>
			</li>
			<?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<?php if(!empty($plans)) { ?>
<section id="plans" class="page-section">
  <div class="container">
    <div class="heading text-center"> 
      <!-- Heading -->
      <h2>Plans & Pricing</h2>
      <p>Description all pricing plans learning Description all pricing plans learning </p>
    </div>
    <div class="row flat">
	<?php for($pl=0;$pl<count($plans);$pl++) { ?>
      <div class="<?php if(count($plans) == 1) echo 'col-lg-12 col-md-12'; elseif(count($plans) == 2) echo 'col-lg-6 col-md-6'; elseif(count($plans) == 3) echo 'col-lg-4 col-md-4'; else echo 'col-lg-3 col-md-3'; ?> col-sm-6 col-xs-12">
        <ul class="plan plan1 <?php if($plans[$pl]['featured'] == 1) echo 'featured'; ?>">
          <li class="plan-name"><?php echo $plans[$pl]['title']; ?></li>
          <li class="plan-price"><?php echo $plans[$pl]['description']; ?></li>
          <li class="plan-action">
			<?php if(isset($_SESSION['userid'])) { ?><a href="plans.php?id=<?php echo $plans[$pl]['id']; ?>" class="btn btn-danger btn-lg">I WANT THIS PLAN</a>
			<!--<div class="dropdown">
				<a href="#" class="btn btn-danger btn-lg" class="btn btn-default dropdown-toggle" data-toggle="dropdown">I WANT THIS PLAN
					<span class="caret"></span>
				</a>			
				<ul class="dropdown-menu">
					<li><a href="?c=getbalance&pay=delivery">Bank account</a></li>
					<li><a href="?c=getbalance&pay=paypal">Paypal</a></li>
				</ul>
			</div>-->
			<?php } else { ?><a href="login.php" class="btn btn-danger btn-lg">I WANT THIS PLAN</a><?php } ?>
		  </li>
        </ul>
      </div>
	<?php } ?>
    </div>
  </div>
</section>
<?php } ?>

<?php if(!empty($testimonials)) { ?>
<section id="team" class="page-section" style="background-color: rgb(255, 223, 0); padding: 0px;">
  <div class="container">
  <section id="carousel">    				
	<div class="container" style="text-align: center;">
    <div class="heading" style="text-align: center;">
      <h2>Student feedback</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, alias enim placeat earum quos ab.</p>
        </div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
				<div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
				  
				  <!-- Carousel indicators -->
                  <ol class="carousel-indicators">
					<?php for($tm=0;$tm<count($testimonials);$tm++) { ?>						
						<li data-target="#fade-quote-carousel" data-slide-to="<?php echo $tm; ?>" class="<?php if($tm == 0) echo 'active'; ?>"></li>
					<?php } ?>
				  </ol>
				  
				  <!-- Carousel items -->
				  <div class="carousel-inner">
				  <?php for($tm=0;$tm<count($testimonials);$tm++) { ?>
				    <div class="<?php if($tm == 0) echo 'active'; ?> item">
                        <div class="profile-circle" style="background-color: rgba(0,0,0,.2);"><img style="height: 100px; width: 100px;" class="img-circle" src="<?php echo 'uploads/testimonials/'.$testimonials[$tm]['picture']; ?>" /></div>
						<?php echo $testimonials[$tm]['title']; ?>
				    	<blockquote>
				    		<p><?php echo $testimonials[$tm]['description']; ?>.</p>
				    	</blockquote>	
				    </div>
				  <?php } ?>
				   
				  </div>
				</div>
			</div>	
            
            
            
            						
		</div>
        <div class="clearfix"></div>
        <!--<a href="#"><button class="btn btn-dark">See More</button></a>-->
	</div>
</section>  
  </div>
  <!--/.container--> 
</section>
<?php } ?>

<section id="contactUs" class="contact-parlex">
  <div class="parlex-back">
    <div class="container">
      <div class="row">
        <div class="heading text-center"> 
          <!-- Heading -->
          <h2>Contact Us</h2>
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered.</p>
        </div>
      </div>
      <div class="row mrgn30">
       	<!--NOTE: Update your email Id in "contact_me.php" file in order to receive emails from your contact form-->
		<form name="sentMessage" id="contactForm"  novalidate>
		<h3>Contact Form</h3>
		<div class="control-group">
		<div class="controls">
		<input type="text" class="form-control" 
		placeholder="Full Name" id="name" required
		data-validation-required-message="Please enter your name" />
		<p class="help-block"></p>
		</div>
		</div> 	
		<div class="control-group">
		<div class="controls">
		<input type="email" class="form-control" placeholder="Email" 
		id="email" required
		data-validation-required-message="Please enter your email" />
		</div>
		</div> 	

		<div class="control-group">
		<div class="controls">
		<textarea rows="10" cols="100" class="form-control" 
		placeholder="Message" id="message" required
		data-validation-required-message="Please enter your message" minlength="5" 
		data-validation-minlength-message="Min 5 characters" 
		maxlength="999" style="resize:none"></textarea>
		</div>
		</div> 		 
		<div id="success"> </div> <!-- For success/fail messages -->
		<button type="submit" class="btn btn-primary pull-right">Send</button><br />
		</form>
      </div>
    </div>
    <!--/.container--> 
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
 <script src="contact/contact_me.js"></script>
<script src="js/custom.js" type="text/javascript"></script> 
<script src="js/owl-carousel/owl.carousel.js"></script>
</body>
</html>
