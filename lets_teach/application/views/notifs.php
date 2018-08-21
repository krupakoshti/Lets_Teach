<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Notification - Let's Teach</title>

<?php
	include('header.php');
?>

<body class="event-01">

<?php
	include('menu.php');
?>

<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="intro-text ">
						<h1>Notifications</h1>
						<p><span><a href="<?=site_url('/Home');?>">Home </a><i class='fa fa-angle-right'></i></span> <span>Notifications</span></p>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
</header>
<!--  End header section-->

<!-- Teachers Area section -->
<section class="events-list-03">
	<div class="container">
		<div class="row event-body-content">
			<!-- <div class="row pull-right" style="margin-bottom: 7rem;">
				<div class="col-md-12">
					<div class="event-bottom-btn">
						<a href="<?=site_url('/Notifs/mark_as_read');?>" class="view-more-item">Mark All As Read</a>
					</div>
				</div>
			</div> -->
			<?php
				foreach ($nd as $key) 
				{
					if($this->ss->type)
					{
						if($key->NotifStatus==0)
						{
				?>
				<div class="col-sm-12 events-full-box" style="background-color: #EAECEE">
				<?php
						}
						else
						{
				?>
				<div class="col-sm-12 events-full-box">
				<?php
						}
				?>
					<div class="row events-single-box">
						<img src="<?=base_url('/resources/common/images/'.$key->TutorImage);?>" style="width: 75px; height: 75px; border-radius: 100%; margin-top: 2rem; margin-left: 2rem;" class="col-sm-2">
						<div class="event-info col-sm-7">
							<h3><?=$key->TutorName;?> <?=$key->Notification;?></h3>
						</div>
						<div class="event-info col-sm-3">
							<p><?=$key->Date;?></p>
						</div>
					</div>
				</div>
				<?php
					}
					else
					{
						if($key->NotifStatus==0)
						{
			?>
			<div class="col-sm-12 events-full-box" style="background-color: #EAECEE">
			<?php
							}
							else
							{
			?>
			<div class="col-sm-12 events-full-box">
			<?php
							}
			?>
				<div class="row events-single-box">
					<img src="<?=base_url('/resources/common/images/'.$key->StudentImage);?>" style="width: 100px; height: 75px; border-radius: 100%; margin-top: 2rem; margin-left: 2rem;" class="col-sm-1">
					<div class="event-info col-sm-7">
						<h3><?=$key->StudentName;?> <?=$key->Notification;?></h3>
					</div>
					<div class="event-info col-sm-3">
						<p><?=$key->Date;?></p>
					</div>
				</div>
			</div>
			<?php
					}
				}
			?>
		</div>
		
	</div>
</section>
<!-- ./ End Teachers Area section -->


<?php
	include('footer.php');
?>
