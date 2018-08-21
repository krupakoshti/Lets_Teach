<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Login - Let's Teach</title>

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
						<h1>Login</h1>
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
				<form action="<?=site_url('/Login/do_login');?>" method="post" class="eduread-register-form text-center">
					<h2 class="lead">Welcome Back</h2>					
					<div class="form-group"> 
					  	<input autocomplete="on" class="required form-control" placeholder="Username *" id="logemail" name="logemail" type="text" value="<?=set_value('logemail');?>">
					  	<font style="color: #E74C3C;"><?=form_error('logemail');?></font>
					</div>
					<div class="form-group">
					  	<input class="required form-control" placeholder="Password *" name="logpwd" id="logpwd" type="password">
					  	<font style="color: #E74C3C;"><?=form_error('logpwd');?>
					  		<?php
				              if(isset($error))
				              {
				                echo $error;
				              }
            				?>
					  	</font>
					</div>		
					<div class="form-group register-btn">
					 	<button class="btn btn-primary btn-lg">Login</button>
					</div>
					<!-- <a href="<?=site_url('/Forgot_pwd');?>"><strong>Forgot password?</strong></a> -->
					<p>Not a member? <a href="<?=site_url('/Register');?>"><strong>Join Today</strong></a></p>	
				</form>
			</div>												
		</div>
	</div>
</section>
<!-- ./ End Teachers Area section -->


<?php
	include('footer.php');
?>