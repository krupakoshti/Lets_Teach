<!-- Preloader -->
<div id="preloader">
	<div id="status">&nbsp;</div>
</div>
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
					<a class="navbar-brand  data-scroll" href="<?=site_url('/Home');?>" title="Let's Teach Home"><img src="<?=base_url('/resources/common/icon/iconsy-graduation-cap-35.png');?>" alt=""><span>Let's Teach</span></a>
				</div>

				<div class="collapse navbar-collapse edu-nav main-menu" id="bs-example-navbar-collapse-1">
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

		