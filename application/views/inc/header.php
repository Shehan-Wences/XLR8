<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Australia/Melbourne');
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />

    <title>XLR8 - <?php echo "$title" ?></title>

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="assets/css/style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="assets/css/responsive.css" rel="stylesheet">
	<!--=== Jquery Min Js ===-->
	 <link rel="stylesheet" type="text/css" href="assets/css/jquery.datetimepicker.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	 <script src="assets/js/jquery.datetimepicker.full.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==	-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="JSOFT">
            </div>
        </div>
    </div>

    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
      
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="index.html" class="logo">
                            <img src="assets/img/logo.png" alt="JSOFT">
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li class="<?php if ($title == "Home") {echo "active";} ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
								<!--<li class="<?php if ($title == "Search") {echo "active";} ?>"><a href="<?php echo base_url("/search"); ?>">Search</a></li>-->
                                <li class="<?php if ($title == "Contact us") {echo "active";} ?>"><a href="<?php echo base_url("/contact"); ?>">Contact Us</a></li>
								<?php   
								if(isset($username)){
								?>
								<li class="active"><a href="<?php echo base_url("/"); ?>"><?php echo $username; ?></a>
                                    <ul>
										<li><a href="<?php echo base_url("/profile"); ?>">Profile</a></li>
										<li><a href="<?php echo base_url("/mybookings"); ?>">Bookings</a></li>
										<li><a href="<?php echo base_url("/passwordchange"); ?>">Change Password</a></li>
										<li><a href="<?php echo base_url("/deactivate"); ?>">Deactivate</a></li>
                                        <li><a href="<?php echo base_url("/signout"); ?>">Sign Out</a></li>
																			
                                        
                                    </ul>
                                </li>
								<?php 
								}else if(isset($admin)){
								?>
								<li class="active"><a href="<?php echo base_url("/"); ?>"><?php echo $admin; ?></a>
                                    <ul>
										<li><a href="<?php echo base_url("/addcar"); ?>">Add Car</a></li>

                                        <li><a href="<?php echo base_url("/customerDetails"); ?>">Customer Details</a></li>
										<li><a href="<?php echo base_url("/allbookings"); ?>">View All Bookings</a></li>
                                        <li><a href="<?php echo base_url("/changecar"); ?>">Change Car Details</a></li>
										<li><a href="<?php echo base_url("/reports"); ?>">Reports</a></li>
	
                                        <li><a href="<?php echo base_url("/signout"); ?>">Sign Out</a></li>
                                        
                                    </ul>
                                </li>
								<?php 
								
								
								}else{
								?>
								<li class="<?php if ($title == "Sign in") {echo "active";} ?>"><a href="<?php echo base_url("/signin"); ?>"><i class="fa fa-user" aria-hidden="true"></i> Sign in</a></li>
								<?php } ?>
								<?php   
								if(isset($cart)){
								?>
								<li ><a style="padding-top: 15px;" href="<?php echo base_url("/payment"); ?>"><i style="font-size:20px;color: yellow;"  class="fa fa-cart-plus"></i></a></li>
								<?php   
								}
								?>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->