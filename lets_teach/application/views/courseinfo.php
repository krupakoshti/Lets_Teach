<?php
//echo '<pre>';
$f1=$f2=$f3=$f4=$f5=false;
foreach ($rate_card as $rc)
{
	if($rc['Rating']==1)
		$f1=true;
	elseif($rc['Rating']==2)
		$f2=true;
	elseif($rc['Rating']==3)
		$f3=true;
	elseif($rc['Rating']==4)
		$f4=true;
	elseif($rc['Rating']==5)
		$f5=true;
}
//$rate_card[] = new stdClass();
if(!$f1)
{
	$temp=&$rate_card[];
	$temp['Rating']=1;
	$temp['crt']=0;	
}
if(!$f2)
{
	$temp=&$rate_card[];
	$temp['Rating']=2;
	$temp['crt']=0;	
}
if(!$f3)
{
	$temp=&$rate_card[];
	$temp['Rating']=3;
	$temp['crt']=0;	
}
if(!$f4)
{
	$temp=&$rate_card[];
	$temp['Rating']=4;
	$temp['crt']=0;	
}
if(!$f5)
{
	$temp=&$rate_card[];
	$temp['Rating']=5;
	$temp['crt']=0;	
}

/*echo "<pre>";
print_r($rate_card);
die();*/

$rr=[];
foreach ($rate_card as $rc)
{
	$rr[$rc['Rating']]=$rc['crt'];
}
krsort($rr);
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Course Information - Let's Teach</title>

	<?php
	include('header.php');
	?>

	<body class="single-courses_v">

		<?php
		include('menu.php');
		?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="intro-text ">
						<h1>Course's Information</h1>
						<p><span><a href="<?=site_url('/Home');?>">Home </a><i class='fa fa-angle-right'></i></span> <span><a href="<?=site_url('/Course');?>">Courses </a><i class='fa fa-angle-right'></i></span> <span>Course's Information</span></p>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
</header>
<!--  End header section-->



<script type="text/javascript">
	$(document).ready(function(){


		/* 1. Visualizing things on Hover - See next part for action on click */
		$('#stars li').on('mouseover', function(){
var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

// Now highlight all the stars that's not after the current hovered star
$(this).parent().children('li.star').each(function(e){
	if (e < onStar) {
		$(this).addClass('hover');
	}
	else {
		$(this).removeClass('hover');
	}
});

}).on('mouseout', function(){
	$(this).parent().children('li.star').each(function(e){
		$(this).removeClass('hover');
	});
});


/* 2. Action to perform on click */
$('#stars li').on('click', function(){
var onStar = parseInt($(this).data('value'), 10); // The star currently selected
var stars = $(this).parent().children('li.star');

for (i = 0; i < stars.length; i++) {
	$(stars[i]).removeClass('selected');
}

for (i = 0; i < onStar; i++) {
	$(stars[i]).addClass('selected');
}

// JUST RESPONSE (Not needed)
var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
var msg = "";
if (ratingValue > 1) {
	msg = "Thanks! You rated this " + ratingValue + " stars.";
}
else {
	msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
}
document.getElementById('abc').value=onStar;
responseMessage(msg);
});  
});


	function responseMessage(msg) {
		$('.success-box').fadeIn(200);  
		$('.success-box div.text-message').html("<span>" + msg + "</span>");
	}	
</script>

<style type="text/css">
* {
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	box-sizing:border-box;
}

*:before, *:after {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

.clearfix {
	clear:both;
}

.text-center {text-align:center;}

a {
	color: tomato;
	text-decoration: none;
}

a:hover {
	color: #2196f3;
}

pre {
	display: block;
	padding: 9.5px;
	margin: 0 0 10px;
	font-size: 13px;
	line-height: 1.42857143;
	color: #333;
	word-break: break-all;
	word-wrap: break-word;
	background-color: #F5F5F5;
	border: 1px solid #CCC;
	border-radius: 4px;
}

.header {
	padding:20px 0;
	position:relative;
	margin-bottom:10px;

}

.header:after {
	content:"";
	display:block;
	height:1px;
	background:#eee;
	position:absolute; 
	left:30%; right:30%;
}

.header h2 {
	font-size:3em;
	font-weight:300;
	margin-bottom:0.2em;
}

.header p {
	font-size:14px;
}

#a-footer {
	margin: 20px 0;
}

.new-react-version {
	padding: 20px 20px;
	border: 1px solid #eee;
	border-radius: 20px;
	box-shadow: 0 2px 12px 0 rgba(0,0,0,0.1);

	text-align: center;
	font-size: 14px;
	line-height: 1.7;
}

.new-react-version .react-svg-logo {
	text-align: center;
	max-width: 60px;
	margin: 20px auto;
	margin-top: 0;
}

.success-box {
	margin:50px 0;
	padding:10px 10px;
	border:1px solid #eee;
	background:#f9f9f9;
}

.success-box img {
	margin-right:10px;
	display:inline-block;
	vertical-align:top;
}

.success-box > div {
	vertical-align:top;
	display:inline-block;
	color:#888;
}



/* Rating Star Widgets Style */
.rating-stars ul {
	list-style-type:none;
	padding:0;

	-moz-user-select:none;
	-webkit-user-select:none;
}
.rating-stars ul > li.star {
	display:inline-block;

}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
	font-size:2.5em; /* Change the size of the stars */
	color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
	color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
	color:#FF912C;
}

.progress {
	height: 10px;
}

.post-img-box .btn {
	position: absolute;
	top: 0%;
	left: 98%;
	transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	color: white;
	border: none;
	cursor: pointer;
}/*
#btn_img{
	position:absolute;
	top:0;
	top:37rem;
	height:50px;
	width:50px;
	display: block;
	background-color: #eee;
	border-radius: 50%;
	transition: .2s all ease;
}
#btn_img:hover{
	background-color: #F1C40F;
}*/
</style>

<div class="single-courses-area">
	<div class="container">
		<div class="row">
			<div class="col-sm-12" style="margin-bottom: 5rem;">
				<div class="full-width" style="margin-bottom: 3rem;">
					<a href="<?=site_url('/Course');?>">
						<button class="btn" style="background-color: #F1C40F; color: white;"><i class="fa fa-mail-reply" style="margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem;"></i> Back</button>
					</a>
				</div>
			</div>

			<div class="col-sm-10 col-sm-offset-1">
				<div class="single-curses-contert">

					<div class="review-option">
						<div class="row" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 1rem;">
							<div class="col-sm-4 col-xm-12 teacher-info border-left review-item-singel" style=" margin-bottom: 1rem;">
								<img src="<?=base_url('/resources/common/images/'.$course[0]->TutorImage);?>" alt="" class="img-circle" style="height: 50px; width: 50px;">
								<div class="teacher-name">
									<span>By:</span>
									<span style="margin-left: 5rem;left:0;top:2rem;left:2rem;position: absolute; font-size: 15px;"> <?=$course[0]->TutorName;?></span>
								</div>
							</div>

							<div class="col-sm-4 col-xm-12  review-rank border-left  review-item-singel" style=" margin-bottom: 1rem;">
								<span>Reviews</span>
								<div class="rank-icons">
									<ul class="list-unstyled">
										<?php
										$rate=round($course[0]->totalrate[0]->Rating,1);
										$int=intval($course[0]->totalrate[0]->Rating);
										$frac=$course[0]->totalrate[0]->Rating-$int;
										$star=0;
										while($star!=$int)
										{
											?>
											<i class="fa fa-star" style="color: #F1C40F"></i>
											<?php 
											$star++;  
										}

										if($frac>0.1)
										{
											?>
											<i class="fa fa-star-half" style="color: #F1C40F"></i>
											<?php
										}
										?>
									</font>
									<font style="color: #F1C40F"><?=$rate;?></font>
									<span>(<?=$course[0]->countrate;?> Reviews)</span>
								</ul>
							</div>
						</div>

						<div class="col-sm-4 col-xm-12 students_105 border-left  review-item-singel" style=" margin-bottom: 1rem;">
							<span>Students</span>
							<span><?=$course[0]->countstud;?></span>
						</div>
					</div>
					<div class="row"style="margin-top: 1rem;">
						<div class="col-sm-4 col-xm-12  categories border-left  review-item-singel">
							<span>Category</span>
							<span><?=$course[0]->CategoryName;?></span>
						</div>
						<div class="col-sm-4 col-xm-12  categories border-left  review-item-singel">
							<span>Sub Category</span>
							<span><?=$course[0]->SubCategoryName;?></span>
						</div>
						<div class="col-sm-4 col-xm-12  categories border-left  review-item-singel">
							<span>Subject</span>
							<span><?=$course[0]->SubjectName;?></span>
						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 5rem;">
					<span style="font-size: 40px; font-weight: bold; text-transform: uppercase; "><?=$course[0]->CourseTitle;?></span>

					<?php
					if($this->ss->type)
					{
						?>
						<div class="pull-right" id="enroll">
							<?php
							if(empty($chk_enroll))
							{
								?>
								<button class="btn" style="background-color: #F1C40F; color: white; font-size: 20px; padding: 1 1 1 1;">Subscribe</button>
								<?php
							}
							else
							{
								?>
								<button class="btn" style="background-color: #F1C40F; color: white; font-size: 20px; padding: 1 1 1 1;">Unsubscribe</button>
								<?php
							}
							?>
						</div>
						<?php
					}
					?>
				</div>

				<script type="text/javascript">
					$(function(){
						$('#enroll').on('click',function(){
							$.ajax({
								url:'<?=site_url('/Course/enroll/').$course[0]->CourseId;?>',
								success:function(result){
									$('#enroll').html(result);
								}
							});
						});
					});
				</script>
				<div class="details-img-bxo">
					<div class="post-img-box" style="margin-top: 5rem;">
						<?php
						if(!$this->ss->type)
						{
							if($course[0]->TutorId==$this->ss->id)
							{
								?>
								<div class="pull-right" style="position: relative;">
									<button class="btn" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="btn_img" style="border-radius: 100%; background-color: #EBEDEF;"><i class="fa fa-pencil" style="font-size: 20px; color: #757575"></i></button>
								</div>
								<?php
							}
						}
						?>
						<img src="<?=base_url('/resources/common/images/'.$course[0]->Thumbnail);?>" alt="" class="img-responsive" style="width: 100%; height: 600px;">
						
					</div>
				</div>

				<div id="myModal" class="modal fade" role="dialog" style="margin-top: 10rem;">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Update Course Image</h4>
							</div>
							<?=form_open_multipart('/Course/update_img/'.$course[0]->CourseId);?>
							<div class="modal-body">
								<img src="<?=base_url('/resources/common/images/');?><?=$course[0]->Thumbnail;?>" style="height: 300px; width: 450px; margin-bottom: 3rem; margin-left: 6rem;" id="aimg">
								<input type="file" class="form-control" name="art_img" id="art_img">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn" style="background-color: #F1C40F; color: white;">Update</button>
							</div>
							<?=form_close();?>
						</div>
					</div>
				</div>

				<script type="text/javascript">
					$(function(){
						$('#art_img').on('change',function(e){
							var imgsrc=URL.createObjectURL(e.target.files[0]);
							$('#aimg').attr('src',imgsrc);
						});
					});
				</script>

				<div class="description-content">
					<h2>Description: 
						<?php
						if(!$this->ss->type)
						{
							if($course[0]->TutorId==$this->ss->id)
							{
								?>
								<div class="pull-right" style="margin-bottom: 2rem;">
									<button class="btn" style="border-radius: 100%; background-color: #EBEDEF;" id="btn_edit"><i class="fa fa-pencil" style="font-size: 20px; color: #757575"></i></button>
								</div>
								<?php
							}
						}
						?>
					</h2>
					<p style="text-align: justify; text-indent: 50px;" id="desc"><?=$course[0]->Description;?></p>
				</div>

				<div id="desc_box" hidden style="margin-top: 2rem; margin-bottom: 10rem;">
					<form method="post" action="<?=site_url('/Course/update_desc/').$course[0]->CourseId;?>" id="up_desc">
						<textarea class="form-control" rows="10" name="txtdesc" id="txtdesc" style="border-color: #F1C40F; font-size: 15px;"><?=$course[0]->Description?></textarea>
						<div class="col-sm-11">                                    
							<div class="full-width"style="margin-top: 2rem;">
								<button class="btn" type="submit" id="desc_update" style="background-color: #F1C40F; color: white; font-size: 15px;">Update</button>
							</div>
						</div>	
					</form>
				</div>

				<script type="text/javascript">
					$(function(){
						$('#btn_edit').on('click',function(){
							$('#desc_box').toggle(500);
							$('#desc').toggle();
							$('#btn_edit').hide();
						});
					});
				</script>

				<div class="review-content">
					<h2>Videos
						<?php
						if(!$this->ss->type)
						{
							if($course[0]->TutorId==$this->ss->id)
							{
								?>
								<div class="pull-right" style="margin-bottom: 2rem;">
									<button class="btn" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalvideo" style="border-radius: 100%; background-color: #EBEDEF;" id="btn_img"><i class="fa fa-plus" style="font-size: 25px; color: #757575"></i></button>
								</div>
								<?php
							}
						}
						?>
					</h2>
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="row">
								<?php
								if(empty($video))
								{
									?>
									<blockquote class="message" style="text-align: justify; font-size: 20px; color: #757575; margin-left: 2rem;">No Videos Available</blockquote>
									<?php
								}
								else
								{
									foreach ($video as $key)
									{

										?>
										<div class="row">
											<div class="col-sm-6">
												<video width="375" height="250" controls>
													<source src="<?=base_url('/resources/common/videos/'.$key->VideoURL)?>" type="video/mp4">
													</video>
												</div>
												<div class="col-sm-6">
													<h4 class="heading"><?=$key->VideoName;?>
													<?php
													if(!$this->ss->type)
													{
														if($course[0]->TutorId==$this->ss->id)
														{
															$vid=$key->CourseVideoId;
															?>
															<div class="pull-right"  style="margin-top: -1rem;">
																<button type="button" onclick="addClick(<?=$key->CourseVideoId ?>)" class="btn btn-lg btn_upvd" data-toggle="modal" data-target="#video_update" style="border-radius: 100%; background-color: #EBEDEF;" id=""><i class="fa fa-pencil" style="font-size: 15px; color: #757575"></i></button>
															</div>
															<?php
														}
													}
													?>
												</h4>
												<blockquote class="message" style="text-align: justify; font-size: 15px; color: #757575"><?=$key->VideoDescription;?></blockquote>
											</div>
										</div>
										<?php
									}
								}
								?>
							</div>
						</div>
					</div>								
				</div>

				<script type="text/javascript">
					/*$(function(){
						$('.btn_upvd').on('click',function(){
							
						});
					});*/
					function addClick(id)
					{
						$.ajax({
								url:'<?=site_url('/Course/get_up_video/')?>'+id,
								success:function(result){
									$('#video_body').html(result);
								}
							});
					}
				</script>

				<div id="myModalvideo" class="modal fade" role="dialog" style="margin-top: 10rem;">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add New Video</h4>
							</div>
							<?=form_open_multipart('/Course/add_video/'.$course[0]->CourseId);?>
							<div class="modal-body">
								<input type="text" class="form-control" name="vd_title" id="vd_title" placeholder="Video Title" style="font-size: 15px; margin-bottom: 2rem;">
								<input type="file" class="form-control" name="art_vd" id="art_vd" style="font-size: 15px; margin-bottom: 2rem;">
								<textarea class="form-control" placeholder="Video Description" rows="5" name="vddesc" id="vddesc" style="font-size: 15px; margin-bottom: 2rem;"></textarea>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn" style="background-color: #F1C40F; color: white;">Add Video</button>
							</div>
							<?=form_close();?>
						</div>
					</div>
				</div>

				<div id="video_update" class="modal fade" role="dialog" style="margin-top: 10rem;">
					<div class="modal-dialog">

						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Update Video</h4>
							</div>
							<div id="video_body">
							<form method="post" action="">
								<div class="modal-body">
									<input type="text" class="form-control" name="vdtitle" id="vdtitle" placeholder="Video Title" style="font-size: 15px; margin-bottom: 2rem;">
									<textarea class="form-control" rows="5" name="vd_desc" id="vd_desc" style="font-size: 15px; margin-bottom: 2rem;"></textarea>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn" style="background-color: #F1C40F; color: white;">Update</button>
								</div>
							</form>
						</div>
						</div>
					</div>
				</div>

				<div class="review-content">
					<h2>Ratings</h2>
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="row">
								<div class="col-md-4">
									<div class="five-star-rating">
										<div class="rating-box">
											<?php
											$rate=round($course[0]->totalrate[0]->Rating,1);
											?>
											<span class="five"><?=$rate;?></span>
											<ul class="list-unstyled">
												<?php
												$int=intval($course[0]->totalrate[0]->Rating);
												$frac=$course[0]->totalrate[0]->Rating-$int;
												$star=0;
												while($star!=$int)
												{
													?>
													<i class="fa fa-star" style="color: #F1C40F"></i>
													<?php 
													$star++;  
												}

												if($frac>0.1)
												{
													?>
													<i class="fa fa-star-half" style="color: #F1C40F"></i>
													<?php
												}
												?>
											</ul>
											<span><?=$course[0]->countrate;?> Reviews</span>					
										</div>
									</div>
								</div>
								<div class="col-sm-8">

									<?php
									$r['Rating']=null;
									if($tot_rate==0)
									{
										$tot_rate=1;
									}
									foreach($rr as $rk=>$rv)
									{
										$r['Rating']=$rk;
										$rate=($rv*100)/$tot_rate;
										$rate=round($rate,1);
										if($rate<1)
										{
											?>
											<div class="col-sm-12">
												<label style="font-size: 20px;" class="col-sm-2"><?=$r['Rating']?><i class="fa fa-star"></i></label>
												<div class="progress col-sm-9" style="margin-top: 1rem;">
													<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:<?=$rate?>%">
													</div>

												</div>
												<label class="col-sm-1"><?=$rate?>%</label>
											</div>
											<?php
										}

										if($rate>=1 && $rate<11)
										{
											?>
											<div class="col-sm-12">
												<label style="font-size: 20px;" class="col-sm-2"><?=$r['Rating']?><i class="fa fa-star"></i></label>
												<div class="progress col-sm-9" style="margin-top: 1rem;">
													<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:<?=$rate?>%">
													</div>

												</div>
												<label class="col-sm-1"><?=$rate?>%</label>
											</div>
											<?php
										}

										if($rate>=11 && $rate<41)
										{
											?>
											<div class="col-sm-12">
												<label style="font-size: 20px;" class="col-sm-2"><?=$r['Rating']?><i class="fa fa-star"></i></label>
												<div class="progress col-sm-9" style="margin-top: 1rem;">
													<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:<?=$rate?>%">
													</div>
												</div>
												<label class="col-sm-1"><?=$rate?>%</label>
											</div>

											<?php
										}

										if($rate>=41)
										{
											?>
											<div class="col-md-12">
												<label style="font-size: 20px;" class="col-sm-2"><?=$r['Rating']?><i class="fa fa-star"></i></label>
												<div class="progress col-sm-9" style="margin-top: 1rem;">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:<?=$rate?>%">
													</div>
												</div>
												<label class="col-sm-1"><?=$rate?>%</label>
											</div>
											<?php
										}
									}
									?>
								</div>
							</div>
						</div>
					</div>								
				</div>
				<div class="comments review-content">
					<div class="row">
						<div class="col-sm-12">
							<h2>Review</h2>
							<?php
							if(empty($review))
							{
								?>
								<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">No Reviews.</blockquote>
								<?php
							}
							else
							{
								?>
								<div class="row">
									<?php
									foreach ($review as $k)
									{
										?>
										<div class="col-sm-12 comment-single-item">
											<div class="col-sm-2 img-box">
												<img src="<?=base_url('/resources/common/images/'.$k->StudentImage);?>" alt="" class="img-circle">
											</div>
											<div class="col-sm-10 comment-left-bar">
												<div class="comment-text">
													<ul class="list-unstyled">
														<li class="name"><?=$k->StudentName;?>
														<div class="comment-author">
															<ul class="list-unstyled">
																<li>Rated: </li>
																<font style="padding-right: 1rem;">
																	<?php
																	$rate=$k->Rating;
																	$star=0;
																	while($star!=$rate)
																	{
																		?>
																		<i class="fa fa-star" style="color: #F1C40F"></i>
																		<?php 
																		$star++;  
																	}
																	?>
																</font>
																<font style="color: #F1C40F"> <?=$rate;?></font>
															</ul>
														</div>
													</li>
													<li class="comment-date"><?php echo date('F', strtotime(str_replace('-','/', $k->ReviewCreatedDate)))," ",date('d', strtotime(str_replace('-','/', $k->ReviewCreatedDate))),", ",date('Y', strtotime(str_replace('-','/', $k->ReviewCreatedDate)))," ",date('H', strtotime(str_replace('-','/', $k->ReviewCreatedDate))),":",date('i', strtotime(str_replace('-','/', $k->ReviewCreatedDate)));?></li>
												</ul>
												<p style="text-indent: 50px; text-align: justify;"><?=$k->Review;?></p>
											</div>
										</div>
									</div>
									<?php
								}
								?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>

			<?php
			if($this->ss->type)
			{
				?>
				<div class="leave_a_comment">
					<div class="row">
						<div class="col-sm-12">
							<h3>Add Review</h3>
							<div class="row">
								<div class="col-sm-12" style="margin-left: 5rem;">
									<form method="post" action="<?=site_url('/Course/add_review/'.$course[0]->CourseId);?>"> 
										<div class="form-group">
											<div class="row">
												<div class="col-sm-12">
													<section class='rating-widget'>
														<!-- Rating Stars Box -->
														<div class='rating-stars text-center'>
															<ul id='stars'>
																<li class='star' title='Poor' data-value='1'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='Fair' data-value='2'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='Good' data-value='3'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='Excellent' data-value='4'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='WOW!!!' data-value='5'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
															</ul>
														</div>
														<div class='success-box'>
															<div class='clearfix'></div>
															<img alt='tick image' width='32' src='https://i.imgur.com/3C3apOp.png'/>
															<div class='text-message'></div>
															<div class='clearfix'></div>
														</div>
													</section>
													<input type="text" name="abc" id="abc" style="display: none;">
												</div>
												<div class="col-sm-12" style="margin-bottom: 2rem;">
													<label class="input-label">Write A Review</label>
													<div class="form-group">
														<textarea style="width: 100%;" placeholder="Type your comments" id="txtreview" name="txtreview"></textarea>
													</div>
												</div>
												<div class="col-sm-12">
													<button type="submit">Add/Update Review</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>

			<?php
			if(isset($this->ss->uid))
			{
				?>
				<div class="comments review-content">
					<div class="row">
						<div class="col-sm-12">
							<h2>Questions</h2>
							<?php
							if(empty($ques))
							{
								?>
								<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">No Questions.</blockquote>
								<?php
							}
							else
							{
								?>
								<div class="row">
									<?php
										foreach ($ques as $key) 
										{
									?>
									<div class="col-sm-12 comment-single-item">
										<div class="col-sm-2 img-box">
											<img src="<?=base_url('/resources/common/images/'.$key->StudentImage);?>" alt="" class="img-circle">
										</div>
										<div class="col-sm-10 comment-left-bar">
											<div class="comment-text">
												<ul class="list-unstyled">
													<li class="name"><?=$key->StudentName;?></li>
													<li class="comment-date"><?php echo date('F', strtotime(str_replace('-','/', $key->QuesCreatedDate)))," ",date('d', strtotime(str_replace('-','/', $key->QuesCreatedDate))),", ",date('Y', strtotime(str_replace('-','/', $key->QuesCreatedDate)))," ",date('H', strtotime(str_replace('-','/', $key->QuesCreatedDate))),":",date('i', strtotime(str_replace('-','/', $key->QuesCreatedDate)));?> </li>
												</ul>
												<p><?=$key->Question;?> ?</p>
												<div id="answer">
													<?php
														if($key->Answer=="")
														{
													?>
													<blockquote class="message" style="text-align: justify; font-size: 15px; color: #757575; margin-bottom: 2rem;">No Answers.</blockquote>
													<?php
														if(!$this->ss->type)
														{
													?>
													<div class="col-sm-12">
														<button type="button" id="ans<?=$key->CourseQuesId?>" class="btn" style="background-color: #F1C40F; color: white;">Add Answer</button>
													</div>
													<div class="row" id="add_ans<?=$key->CourseQuesId?>" style="margin-top: 2rem; margin-bottom: 2rem;" hidden>
														<form action="<?=site_url('/Course/add_ans/'.$key->CourseQuesId.'/'.$key->CourseId.'/');?>" method="post">
															<div class="leave_a_comment">
																<div class="col-sm-12">
																	<div class="form-group">
																		<textarea style="width:100%;" placeholder="Type your answer" id="txtans" name="txtans" required=""></textarea>
																	</div>
																</div>
																<input type="submit" name="btnsub" value="Add" class="btn" style="background-color: #F1C40F; color: white;">
															</div>
														</form>
													</div>
													</div>
												<?php
														}
													}
													else
													{
												?>
												<blockquote class="message" style="text-align: justify; font-size: 15px; color: #757575"><?=$key->Answer;?></blockquote>
												<?php
													}
												?>
											</div>
										</div>
									</div>
								</div>
										<?php
									}
								}
								?>
							</div>
						</div>
					</div>
					<?php
						foreach ($ques as $key) 
						{
					?>
				<script>
					$(function(){
						$("#ans<?=$key->CourseQuesId?>").on('click',function(){
							$("#add_ans<?=$key->CourseQuesId?>").toggle(500);
						});
					});
				</script>
				<?php
					}
				?>
				<?php
				if($this->ss->type)
				{
					?>
					<div class="leave_a_comment">
						<div class="row">
							<div class="col-sm-12">
								<h3>Ask Question</h3>
								<div class="row">
									<div class="col-sm-12">
										<form method="post" action="<?=site_url('Course/add_ques/'.$course[0]->CourseId);?>">
											<div class="form-group">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<textarea placeholder="Ask Your Question" name="txtques" id="txtques" required></textarea>
														</div>
													</div>
													<div class="col-sm-12">
														<button type="submit">Ask</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</div>
</div>
</div>	
</div>

<?php
include('footer.php');
?>