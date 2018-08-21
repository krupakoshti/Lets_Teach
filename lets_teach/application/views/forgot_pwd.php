<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Forget Password - Let's Teach</title>

<?php
	include('header.php');
?>

<body class="login">

<?php
	include('menu.php');
?>

<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="intro-text ">
						<h1>Forgot Password</h1>
						<p><span><a href="<?=site_url('/Login');?>">Login </a><i class='fa fa-angle-right'></i></span> <span>Forgot Password</span></p>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
</header>
<!--  End header section-->

<!-- Teachers Area section -->
<section class="login-area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<form action="<?=site_url('/Forgot_pwd/forgot_pwd_c');?>" method="post" class="eduread-register-form text-center">
					<p>Lost your password? Please enter your username. You will receive a link to create a new password via email.</p>					
					<div class="form-group"> 
					  	<input autocomplete="off" class="required form-control" placeholder="Enter Username" id="txtuname" name="txtuname" type="text">
					</div>
					<div class="form-group register-btn">
					 	<button type="submit" class="btn btn-primary btn-lg">Forgot Password</button>
					</div>	
				</form>
			</div>												
		</div>
	</div>
</section>
<!-- ./ End Teachers Area section -->


<?php
	include('footer.php');
?>
