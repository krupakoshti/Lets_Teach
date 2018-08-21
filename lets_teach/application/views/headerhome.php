<?php
	$url=base_url('/resources/user/assets/');
?>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from ecologytheme.com/theme/eduread/index-03.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Apr 2018 19:46:48 GMT -->
<head>
    <meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="Eduread - Education HTML5 Template">
	<meta name="keywords" content="college, education, institute, responsive, school, teacher, template, university">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Let's Teach</title> 
	<link rel="shortcut icon" href="<?=base_url('/resources/common/icon/iconsy-graduation-cap-26.png');?>" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=$url;?>css/assets/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=$url;?>css/assets/font-awesome.min.css">
    <!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:600,700%7COpen+Sans:400,600" rel="stylesheet">     
	<!-- Popup -->
	<link href="<?=$url;?>css/assets/magnific-popup.css" rel="stylesheet"> 
	<!-- Slick Slider -->
	<link href="<?=$url;?>css/assets/slick.css" rel="stylesheet"> 	
	<link href="<?=$url;?>css/assets/slick-theme.css" rel="stylesheet"> 	   
	<!-- owl carousel -->
	<link href="<?=$url;?>css/assets/owl.carousel.css" rel="stylesheet">
	<link href="<?=$url;?>css/assets/owl.theme.css" rel="stylesheet">
	<!-- Main Menu-->
	<link rel="stylesheet" href="<?=$url;?>css/assets/meanmenu.css">	
	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?=$url;?>css/style.css">
	<link rel="stylesheet" href="<?=$url;?>css/responsive.css">
	<script src="<?=$url;?>js/vendor/jquery-1.12.4.min.js"></script>	

	<style type="text/css">
		#txtcolor{
			transition: .4s all ease;
		}
		#txtcolor:hover{
			color: yellow;
		}
	</style>	
</head>
<body class="home_version_03">
<!-- Preloader -->
<!-- <div id="preloader">
	<div id="status">&nbsp;</div>
</div> -->
<header id="header">
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12 header-top-left">
					<ul class="list-unstyled">
						<li><i class="fa fa-phone top-icon"></i> +91 9876543210</li>
						<li><i class="fa fa-envelope top-icon"></i> info@lets_teach.com</li>
					</ul>
				</div>
				<div class="col-sm-6 col-xs-12 header-top-right">
					<?php
						if($this->ss->uid)
						{
					?>
					<ul class="list-unstyled">

						<li><a href="<?=site_url('/Profile');?>" id="txtcolor">Welcome, <?=$this->ss->name;?></a></li>
						<li><a id="txtcolor" href="<?=site_url('Logout');?>"><i class="fa fa-lock top-icon"></i>Log Out</a></li>
					</ul>
					<?php
						}
						else
						{
					?>
					<ul class="list-unstyled">
						<li><a id="txtcolor" href="<?=site_url('Register');?>"><i class="fa fa-user-plus top-icon"></i> Register</a></li>
						<li><a id="txtcolor" href="<?=site_url('Login');?>"><i class="fa fa-lock top-icon"></i>Login</a></li>
					</ul>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div><!-- Ends: .header-top -->

	<div class="header-body">
		<nav class="navbar edu-navbar">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
				</div>

				<div class="collapse navbar-collapse edu-nav  main-menu" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav pull-right">
						<li><a data-scroll href="<?=site_url('/Teacher');?>">Tutors</a></li>
						<li><a data-scroll href="<?=site_url('/Course');?>">Courses</a></li>
						<li><a data-scroll href="<?=site_url('/Article');?>">Articles</a></li>
						<li><a data-scroll href="<?=site_url('/Ques');?>">Ques & Ans</a></li>

						<?php
							if(isset($this->ss->uid))
							{
								if(!$this->ss->type)
								{
						?>
						<!-- <li><a data-scroll href="<?=site_url('/Message');?>"><i class="fa fa-envelope" style="font-size: 20px;"></i></a></li> -->
						<li><a data-scroll href="<?=site_url('/Notifs');?>"><i class="fa fa-bell" style="font-size: 20px;"></i></a></li>
						<span class="badge"><?=count($badge);?></span>
						<?php
								}
							}
						?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav>
		
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-sm-offset-1"style="margin-top: -7rem;">
					<div class="intro-text  wow slideInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
						<h1>Let's Teach</h1>
						<p>The Education You Want. The Attention You Deserve.</p>
					</div>
				</div>
<!-- 				<div class="col-sm-12 text-center">
					<div class="mouse-icon-box">
						<a href="#" class="mouse-icon"></a>
					</div>
				</div>
 -->			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
</header>
	<!--  End header section-->