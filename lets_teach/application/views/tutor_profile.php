<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Tutor Profile - Let's Teach</title>

<?php
	include('header.php');
?>

<body class="t-profile-01">

<?php
	include('menu.php');
?>

<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="intro-text ">
						<h1>Tutors</h1>
						<p><span><a href="<?=site_url('/Home');?>">Home </a><i class='fa fa-angle-right'></i></span> <span><a href="<?=site_url('/Teacher');?>">Tutors </a><i class='fa fa-angle-right'></i></span> <span>Tutor Profile</span></p>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
</header>
	<!--  End header section-->

<!-- Teachers Area section -->
<section class="teacher-prolile-01">
	<div class="container">
		<div class="row">
			<div class="col-sm-12" style="margin-bottom: 5rem;">
				<div style="margin-bottom: 5rem;" class="col-sm-6">
					<a href="<?=site_url('/Teacher');?>">
						<button class="btn" style="background-color: #F1C40F; color: white;"><i class="fa fa-mail-reply" style="margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem;"></i> Back</button>
					</a>
				</div>

				<?php
					if($this->ss->type)
					{
				?>
					<div class="pull-right" id="sub">
						<?php
						if(empty($chk_sub))
						{
							?>
							<button class="btn" style="background-color: #F1C40F; color: white; font-size: 20px; padding: 1 1 1 1;">Follow</button>
							<?php
						}
						else
						{
							?>
							<button class="btn" style="background-color: #F1C40F; color: white; font-size: 20px; padding: 1 1 1 1;">Unfollow</button>
							<?php
						}
						?>
					</div>
					<script type="text/javascript">
						$(function(){
							$('#sub').on('click',function(){
								$.ajax({
									url:'<?=site_url('/Teacher/subscribe/'.$tutor[0]->TutorId);?>',
									success:function(result){
										$('#sub').html(result);
									}
								});
							});
						});
					</script>
				<?php
					}
				?>
			</div>
			
			<div class="col-sm-4 t-profile-left">
				<div class="teacher-contact">
					<img src="<?=base_url('/resources/common/images/'.$tutor[0]->TutorImage);?>" alt="" class="img-responsive" style="width: 320px; height: 400px;">
					<h3 style="margin-bottom: 2rem;margin: 0; text-align: left; color: #333333; text-transform: uppercase; font-size: 25px; position: relative;"><?=$tutor[0]->TutorName?></h3>
					<table style="text-align: left; margin-top: 2rem;">
							<tr>
								<td style="padding: 10px;"><b>UserName: </b></td>
								<td><?=$tutor[0]->UserName;?></td>
							</tr>
							<tr>
								<td style="padding: 10px;"><b>EmailId: </b></td>
								<td><a href="mailto:<?=$tutor[0]->EmailId;?>" target="_blank"><?=$tutor[0]->EmailId;?></a></td>
							</tr>
							<tr>
								<td style="padding: 10px;"><b>ContactNo: </b></td>
								<td><?=$tutor[0]->ContactNo;?></td>
							</tr>
							<tr>
								<td style="padding: 10px;"><b>Website: </b></td>
								<td><a href="http://<?=$tutor[0]->WebsiteLink;?>" target="_blank"><?=$tutor[0]->WebsiteLink;?></a></td>
							</tr>
							<tr>
								<td style="padding: 10px;"><b>Location: </b></td>
								<td><?=$tutor[0]->CityName;?>, <?=$tutor[0]->StateName?></td>
							</tr>
						</table>
					<ul class="list-unstyled">
						<?php
							if($tutor[0]->FacebookLink != "")
							{
						?>
						<li><a href="https://<?=$tutor[0]->FacebookLink;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<?php
							}
							if($tutor[0]->TwitterLink != "")
							{
						?>
						<li><a href="https://<?=$tutor[0]->TwitterLink;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<?php
							}
							if($tutor[0]->GoogleplusLink != "")
							{
						?>
						<li><a href="https://<?=$tutor[0]->GoogleplusLink;?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						<?php
							}
							if($tutor[0]->LinkedinLink != "")
							{
						?>
						<li><a href="https://<?=$tutor[0]->LinkedinLink;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<?php
							}
						?>
					</ul>
				</div>
			</div>
			
			<div class="col-sm-8 t-profile-right">
				<div class="row all-corsess-wapper">
						<div class="col-sm-12">
							<div class="all-courses">
								<h3 style="margin-bottom: 2rem;margin: 0; text-align: left; color: #333333; text-transform: uppercase; font-size: 35px; position: relative;">Basic Info.</h3>
								<div class="profile__courses__inner" style="margin-top: 3rem;">
	                                <ul class="profile__courses__list list-unstyled" style="padding-right: 3rem;">
	                                    <li><b><i class="fa fa-book"></i>Courses:</b></li>
	                                    <li><b><i class="fa fa-newspaper-o"></i>Articles:</b></li>
	                                    <li><b><i class="fa fa-users"></i>Followers:</b></li>
	                                </ul>
	                                <ul class="profile__courses__right list-unstyled">
	                                    <li><?=$tot_course;?> Course/s</li>
	                                    <li><?=$tot_article;?> Article/s</li>
	                                    <li><?=$tot_sub;?> Follower/s</li>
	                                </ul>
	                            </div>
							</div>
						</div>
				</div>

				<div class="row">
	                <div class="row courses-instuctor">
	                	<div class="col-sm-12">
	                		<h2 class="courses-title" style="text-align: left">Courses</h2>
	                		<div class="row item-margin" id="course1">
	                			<?php
	                				if(empty($course))
	                				{
            					?>
            					<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">No Courses.</blockquote>
            					<?php
	                				}
	                				else
	                				{
	                				$cnt_c=0;
	                				foreach ($course as $key) 
	                				{
	                					if($cnt_c>=4)
	                					{
	    						?>
	    						<button class="btn" id="view_course" style=" text-align: right; background-color: #F1C40F; color: white; margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem; font-size: 15px;">View More
								</button>
								
	    						<?php
	    								break;
	                					}
	                					else
	                					{
	                						$cnt_c++;
	                			?>
	                			<div class="col-sm-6 instractor-single" style="margin-bottom: 3rem;">
									<div class="instractor-courses-single" style="padding: 0 0 0 10px;">
										<ul class="list-unstyled" style="margin-bottom: 0;">
											<li style="display: inline-block;">
												<img src="<?=base_url('/resources/common/images/'.$key->Thumbnail);?>" alt="" class="img-responsive" style="height: 120px;width:100px;margin-top: 1rem; margin-bottom: -1.5rem;">
											</li>
											<li style="display: inline-block;position: relative;top:-3.5rem;left:1rem;">
												<h3><a href="<?=site_url('/Course/get_course/'.$key->CourseId);?>"><?=$key->CourseTitle;?></a></h3>
											</li>
										</ul>
									</div>                  				
	                			</div>
	                		<?php
	                			
	                				}
	               				}
	               			}
	                		?>
	                		</div>

	                		<div class="row item-margin" id="course2" hidden>
	                			<div class="row">
									<?php
										foreach ($course as $key) 
		                				{
	                				?>
									<div class="col-sm-6 instractor-single" style="margin-bottom: 3rem;">
										<div class="instractor-courses-single" style="padding: 0 0 0 10px;">
											<ul class="list-unstyled" style="margin-bottom: 0;">
												<li style="display: inline-block;">
													<img src="<?=base_url('/resources/common/images/'.$key->Thumbnail);?>" alt="" class="img-responsive" style="height: 120px;width:100px;margin-top: 1rem; margin-bottom: -1.5rem;">
												</li>
												<li style="display: inline-block;position: relative;top:-3.5rem;left:1rem;">
													<h3><a href="<?=site_url('/Course/get_course/'.$key->CourseId);?>"><?=$key->CourseTitle;?></a></h3>
												</li>
											</ul>
										</div>                  				
		                			</div>
		                			<?php
		                				}
		                			?>
		                			<div class="col-sm-12">
			                			<button class="btn" id="hide_course" style=" text-align: right; background-color: #F1C40F; color: white; margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem; font-size: 15px;">Hide
										</button>
									</div>
	                			</div>	
	                		</div>
	                	</div>
	                </div>

	                <script>
						$(function(){
							$("#view_course").on('click',function(){
								$("#course1").toggle();
								$("#course2").toggle();
								$('#hide_course').show();
							});
						});

						$(function(){
							$("#hide_course").on('click',function(){
								$("#course1").toggle();
								$("#course2").toggle();
							});
						});
					</script>
				</div>

				<div class="row">
	                <div class="row courses-instuctor">
	                	<div class="col-sm-12">
	                		<h2 class="courses-title" style="text-align: left">Articles</h2>
	                		<div class="row item-margin" id="article1">
	                			<?php
	                				if(empty($article))
	                				{
            					?>
            					<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">No Article.</blockquote>
            					<?php
	                				}
	                				else
	                				{
	                				$cnt_a=0;
	                				foreach ($article as $key) 
	                				{
	                					if($cnt_a>=4)
	                					{
	    						?>
	    						<button class="btn" id="view_article" style=" text-align: right; background-color: #F1C40F; color: white; margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem; font-size: 15px;">View More
								</button>
								
	    						<?php
	    								break;
	                					}
	                					else
	                					{
	                						$cnt_a++;
	                			?>
	                			<div class="col-sm-6 instractor-single" style="margin-bottom: 3rem;">
									<div class="instractor-courses-single" style="padding: 0 0 0 10px;">
										<ul class="list-unstyled" style="margin-bottom: 0;">
											<li style="display: inline-block;">
												<img src="<?=base_url('/resources/common/images/'.$key->ArticleImage);?>" alt="" class="img-responsive" style="height: 120px;width:100px;margin-top: 1rem; margin-bottom: -1.5rem;">
											</li>
											<li style="display: inline-block;position: relative;top:-3.5rem;left:1rem;">
												<h3><a href="<?=site_url('/Article/get_article/'.$key->ArticleId);?>"><?=$key->ArticleTitle;?></a></h3>
											</li>
										</ul>
									</div>                  				
	                			</div>
	                			<?php
	                					}
	                				}
	               				}
	                			?>
	                		</div>

	                		<div class="row item-margin" id="article2" hidden>
	                			<div class="row">
									<?php
										foreach ($article as $key) 
		                				{
	                				?>
									<div class="col-sm-6 instractor-single" style="margin-bottom: 3rem;">
										<div class="instractor-courses-single" style="padding: 0 0 0 10px;">
											<ul class="list-unstyled" style="margin-bottom: 0;">
												<li style="display: inline-block;">
													<img src="<?=base_url('/resources/common/images/'.$key->ArticleImage);?>" alt="" class="img-responsive" style="height: 120px;width:100px;margin-top: 1rem; margin-bottom: -1.5rem;">
												</li>
												<li style="display: inline-block;position: relative;top:-3.5rem;left:1rem;">
													<h3><a href="<?=site_url('/Artice/get_article/'.$key->ArticleId);?>"><?=$key->ArticleTitle;?></a></h3>
												</li>
											</ul>
										</div>                  				
		                			</div>
		                			<?php
		                				}
		                			?>
		                			<div class="col-sm-12">
			                			<button class="btn" id="hide_article" style=" text-align: right; background-color: #F1C40F; color: white; margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem; font-size: 15px;">Hide
										</button>
									</div>
	                			</div>	
	                		</div>
	                	</div>
	                </div>

	                <script>
						$(function(){
							$("#view_article").on('click',function(){
								$("#article1").toggle();
								$("#article2").toggle();
								$('#hide_article').show();
							});
						});

						$(function(){
							$("#hide_article").on('click',function(){
								$("#article1").toggle();
								$("#article2").toggle();
							});
						});
					</script>
				</div>

				<div class="row">
	                <div class="row courses-instuctor">
	                	<div class="col-sm-12">
	                		<h2 class="courses-title" style="text-align: left">Followers</h2>
	                		<div class="row item-margin" id="sub1">
	                			<?php
	                				if(empty($sub))
	                				{
            					?>
            					<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">No Followers.</blockquote>
            					<?php
	                				}
	                				else
	                				{
	                				$cnt_s=0;
	                				foreach ($sub as $key) 
	                				{
	                					if($cnt_s>=4)
	                					{
	    						?>
	    						<button class="btn" id="view_sub" style=" text-align: right; background-color: #F1C40F; color: white; margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem; font-size: 15px;">View More
								</button>
								
	    						<?php
	    								break;
	                					}
	                					else
	                					{
	                						$cnt_s++;
	                			?>
	                			<div class="col-sm-6 instractor-single" style="margin-bottom: 3rem;">
									<div class="instractor-courses-single" style="padding: 0 0 0 10px;">
										<ul class="list-unstyled" style="margin-bottom: 0;">
											<li style="display: inline-block;">
												<img src="<?=base_url('/resources/common/images/'.$key->StudentImage);?>" alt="" class="img-responsive" style="height: 120px;width:100px;margin-top: 1rem; margin-bottom: -1.5rem;">
											</li>
											<li style="display: inline-block;position: relative;top:-3.5rem;left:1rem;">
												<h3><?=$key->StudentName;?></h3>
											</li>
										</ul>
									</div>                  				
	                			</div>
	                			<?php
	                					}
	                				}
	               				}
	                			?>
	                		</div>

	                		<div class="row item-margin" id="sub2" hidden>
	                			<div class="row">
									<?php
										foreach ($sub as $key) 
		                				{
	                				?>
									<div class="col-sm-6 instractor-single" style="margin-bottom: 3rem;">
										<div class="instractor-courses-single" style="padding: 0 0 0 10px;">
											<ul class="list-unstyled" style="margin-bottom: 0;">
												<li style="display: inline-block;">
													<img src="<?=base_url('/resources/common/images/'.$key->StudentImage);?>" alt="" class="img-responsive" style="height: 120px;width:100px;margin-top: 1rem; margin-bottom: -1.5rem;">
												</li>
												<li style="display: inline-block;position: relative;top:-3.5rem;left:1rem;">
													<h3><?=$key->StudentName;?></h3>
												</li>
											</ul>
										</div>                  				
		                			</div>
		                			<?php
		                				}
		                			?>
		                			<div class="col-sm-12">
			                			<button class="btn" id="hide_sub" style=" text-align: right; background-color: #F1C40F; color: white; margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem; font-size: 15px;">Hide
										</button>
									</div>
	                			</div>	
	                		</div>
	                	</div>
	                </div>

	                <script>
						$(function(){
							$("#view_sub").on('click',function(){
								$("#sub1").toggle();
								$("#sub2").toggle();
								$('#hide_sub').show();
							});
						});

						$(function(){
							$("#hide_sub").on('click',function(){
								$("#sub1").toggle();
								$("#sub2").toggle();
							});
						});
					</script>
				</div>	
			</div>															
		</div>
	</div>
</section>
<!-- ./ End Teachers Area section -->

<?php
	include('footer.php');
?>