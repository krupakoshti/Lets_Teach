<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Tutor - Let's Teach</title>

<?php
	include('header.php');
?>

<body class="teachers-01">

<?php
	include('menu.php');
?>

<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="intro-text ">
						<h1>Tutors</h1>
						<p><span><a href="<?=site_url('/Home');?>">Home </a><i class='fa fa-angle-right'></i></span> <span>Tutors</span></p>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
</header>
	<!--  End header section-->

<!-- Teachers Area section -->
<section class="teachers-area">
	<div class="container">
		<div class="row teachers-wapper-02">
			<?php
				foreach ($tutor as $key)
				{
			?>
			<div class="col-sm-6 col-md-4 teacher-single" style="margin-bottom: 2rem;">
				<figure class="text-center">
					<div class="teacher-img-02">
						<img src="<?=base_url('/resources/common/images/'.$key->TutorImage);?>" alt="" class="img-responsive" style="width: 400px; height: 295px;">
					</div>
					<div class="teachers-name">
						<h3><a><?=$key->TutorName;?></a></h3>
						<table style="text-align: left;">
							<tr>
								<td style="padding: 7px;"><b>EmailId: </b></td>
								<td><?=$key->EmailId;?></td>
							</tr>
							<tr>
								<td style="padding: 7px;"><b>ContactNo: </b></td>
								<td><?=$key->ContactNo;?></td>
							</tr>
							<tr>
								<td style="padding: 7px;"><b>Website: </b></td>
								<td><a href="http://<?=$key->WebsiteLink;?>" target="_blank"><?=$key->WebsiteLink;?></a></td>
							</tr>
							<tr>
								<td style="padding: 7px;"><b>Location: </b></td>
								<td><?=$key->CityName;?>, <?=$key->StateName?></td>
							</tr>
						</table>	
					</div>
					<figcaption>
						<ul class="list-unstyled">
							<li><a href="<?=site_url('/Teacher/get_tutor/'.$key->TutorId);?>"><i class="fa fa-info teacher-icon"></i></a></li>
						</ul>
					</figcaption>
				</figure>
			</div>
			<?php
				}
			?>
		</div>
	</div>
</section>
<!-- ./ End Teachers Area section -->

<?php
	include('footer.php');
?>