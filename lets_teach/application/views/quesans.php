<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Questions - Let's Teach</title>

<?php
$this->load->view('header');
?>
<body class="event-01">
	<?php
	$this->load->view('menu');
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="intro-text ">
					<h1>QUESTIONS</h1>
					<p><span><a href="<?=site_url('/Home');?>">Home </a><i class='fa fa-angle-right'></i></span> <span>Questions</span></p>
				</div>
			</div>
		</div><!-- /.row -->
	</div><!-- /.container -->
</div>
</header>
<section class="events-list-03">

	<div class="container">
		<div class="row event-body-content">
			<div class="col-sm-12" style="margin-bottom: 10rem; text-align: right;">
				<?php
					if($this->ss->type)
					{
				?>
				<a href="<?=site_url('/Ques/add_view');?>">
					<button class="btn" style="background-color: #F1C40F; color: white;">
						<i class="fa fa-plus-circle" style="margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem; font-size: 15px;"></i> 
								Ask Question
					</button>
				</a>
				<?php
					}
				?>
			</div>
			<?php
			foreach ($qdata as $d) {
				?>

				<div class="col-sm-12 events-full-box">
					<div class="events-single-box">
						<div class="row">
							<div class="" style="margin-left: 5rem;margin-top: 5rem; ">
								<i class="fa fa-calendar event-icon"></i>
								<?php echo date('F', strtotime(str_replace('-','/', $d->QuesCreatedDate)))," ",date('d', strtotime(str_replace('-','/', $d->QuesCreatedDate))),", ",date('Y', strtotime(str_replace('-','/', $d->QuesCreatedDate)));?>
							</div>
							<div class="col-sm-12 event-info">
								<font style="font-size: 20px"><?=$d->Question;?> ?</font>
								<div class="row" style="margin-top: 2rem;">
									<div class="col-md-12" style="padding-left: 0;">
										<ul class="list-unstyled">
											<li style="float: left;margin-left: 1rem; margin-bottom: 1rem; font-size: 15px" class="">
												<img src="<?=base_url('/resources/common/images/');?><?=$d->StudentImage;?>" width="10px" height="10px" style="border-radius: 50%;height: 50px;width:50px;"> <?=$d->StudentName;?>
											</li>
											<li style="float: left;margin-top: 1.3rem;margin-left: 1rem; font-size: 15px">
												<i class="fa fa-book event-icon"></i>
												<?=$d->SubjectName;?>
											</li>
										</ul>
									</div>
								</div>
								<div class="row" style="margin-top: 2rem;">
									<div class="col-md-12" style="margin-top: 1rem;">
										<a class="event-btn" href="<?=site_url('Ques/get_ques/');?><?=$d->QuesId;?>">Read More<i class="fa fa-long-arrow-right events-btn-icon"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>	
				<?php
			}
			?>			
		</div>

	</div>
</section>
<?php
include('footer.php');
?>        