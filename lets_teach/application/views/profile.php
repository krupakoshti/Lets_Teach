<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Profile - Let's Teach</title> 

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
						<h1>Profile</h1>
						<p>
							<span>
								<a href="<?=site_url('/Home');?>">
									Home 
								</a>
								<i class='fa fa-angle-right'></i>
							</span> 
							<span>Profile</span>
						</p>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
</header>

<section class="teacher-prolile-01">
	<div class="container">
		<div class="row">
			<div class="col-sm-12" style="margin-bottom: 10rem; text-align: right;">
				<a href="<?=site_url('/Profile/get_update_data');?>">
					<button class="btn" style="background-color: #F1C40F; color: white;">
						<i class="fa fa-edit" style="margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem; font-size: 15px;"></i> 
								Edit Profile
					</button>
				</a>
			</div>
			
			<div class="col-sm-4 t-profile-left">
				<div class="teacher-contact">

					<?php
						if($this->ss->type)
						{
							$img=$user[0]->StudentImage;
							$name=$user[0]->StudentName;
						}
						else
						{
							$img=$user[0]->TutorImage;
							$name=$user[0]->TutorName;
							$web=$user[0]->WebsiteLink;
						}

					?>

					<img src="<?=base_url('/resources/common/images/'.$img);?>" alt="" class="img-responsive" style="width: 320px; height: 400px;">
					<h3 style="margin-bottom: 2rem;margin: 0; text-align: left; color: #333333; text-transform: uppercase; font-size: 25px; position: relative;"><?=$name;?></h3>
					<table style="text-align: left; margin-top: 2rem;">
						<tr>
							<td style="padding: 10px;">
								<b>User Name:</b> 
							</td>
							<td>
								<?=$user[0]->UserName;?>
							</td>
						</tr>
						<tr>
							<td style="padding: 10px;">
								<b>Email Id: </b>
							</td>
							<td>
								<?=$user[0]->EmailId;?>
							</td>
						</tr>
						<tr>
							<td style="padding: 10px;">
								<b>Contact No.: </b>
							</td>
							<td>
								<?=$user[0]->ContactNo;?>
							</td>
						</tr>
						<?php
							if(!$this->ss->type)
							{
						?>
						<tr>
							<td style="padding: 10px;">
								<b>Website: </b>
							</td>
							<td>
								<?php
									if($web == "")
									{
										echo "No Website";
									}
									else
									{
								?>
								<a href="http://<?=$web;?>" target="_blank"><?=$web;?></a>
								<?php
									}
								?>
							</td>
						</tr>
						<?php
							}
						?>
						<tr>
							<td style="padding: 10px;">
								<b>Location: </b>
							</td>
							<td>
								<?=$user[0]->CityName;?>,<?=$user[0]->StateName;?>
							</td>
						</tr>
						<?php
							if($this->ss->type)
							{
						?>
						<tr>
							<td style="padding: 10px;">
								<b>Following: </b>
							</td>
							<td>
								<?=$user[0]->totaltutor;?> Tutor/s
							</td>
						</tr>
						<?php
							}
							else
							{
						?>
						<tr>
							<td style="padding: 10px;">
								<b>Followers: </b>
							</td>
							<td>
								<?=$user[0]->totalstud;?> Student/s
							</td>
						</tr>
						<?php
							}
						?>
					</table>
					<?php
						if(!$this->ss->type)
						{
					?>
					<ul class="list-unstyled">
						<?php
							if($user[0]->FacebookLink != "")
							{
						?>
						<li><a href="https://<?=$user[0]->FacebookLink;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<?php
							}
							if($user[0]->TwitterLink != "")
							{
						?>
						<li><a href="https://<?=$user[0]->TwitterLink;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<?php
							}
							if($user[0]->GoogleplusLink != "")
							{
						?>
						<li><a href="https://<?=$user[0]->GoogleplusLink;?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						<?php
							}
							if($user[0]->LinkedinLink != "")
							{
						?>
						<li><a href="https://<?=$user[0]->LinkedinLink;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<?php
							}
						?>
					</ul>
					<?php
						}
					?>
				</div>
			</div>

			<?php 
				if($this->ss->type)
				{
			?>

			<div class="col-sm-8 t-profile-right">
                <div class="row courses-instuctor">
                	<div class="col-sm-12">
                		<h2 class="courses-title" style="text-align: left">Enrollments</h2>
                		<div class="row item-margin">
                			<?php
                			if(empty($enroll))
	                				{
            					?>
            					<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">No Course Enrollment.</blockquote>
            					<?php
	                				}
	                				else
	                				{
		                				foreach ($enroll as $key) 
		                				{
                			?>
                			<div class="col-sm-4 instractor-single">
								<div class="instractor-courses-single">
									<div class="img-box">
										<img src="<?=base_url('/resources/common/images/'.$key->Thumbnail);?>" alt="" class="img-responsive" style="height: 200px; border-bottom: 2px solid #585858;">
									</div>
									<div class="instractor-courses-text">
										<div class="instractor-parson">
											<div class="parson-img">
									          	<img src="<?=base_url('/resources/common/images/'.$key->TutorImage);?>" alt="" class="img-circle" style="height: 40px;">
									        </div>
									        <p><a href="#"><?=$key->TutorName;?></a></p>
										</div>
										<div class="text-bottom">
											<h3><a href="<?=site_url('/Course/'.$key->CourseId);?>"><?=$key->CourseTitle;?></a></h3>
											<div class="price">
												<ul class="list-unstyled">
													<li><i class="fa fa-calendar"></i>
														<?php echo date('F', strtotime(str_replace('-','/', $key->CreatedDate)))," ",date('d', strtotime(str_replace('-','/', $key->CreatedDate))),", ",date('Y', strtotime(str_replace('-','/', $key->CreatedDate)));?>
													</li>
												</ul>
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

                <div class="row courses-instuctor">
                	<div class="col-sm-12">
                		<h2 class="courses-title" style="text-align: left">FOLLOWING</h2>
                		<div class="row item-margin">
                			<?php
                			if(empty($sub))
	                				{
            					?>
            					<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">Not Following Any Tutor.</blockquote>
            					<?php
	                				}
	                				else
	                				{
		                				foreach ($sub as $key)
		                				{
                			?>
                			<div class="col-sm-6 instractor-single" style="margin-bottom: 3rem;">
								<div class="instractor-courses-single" style="padding: 0 0 0 10px;">
									<ul class="list-unstyled" style="margin-bottom: 0;">
										<li style="display: inline-block;">
											<img src="<?=base_url('/resources/common/images/'.$key->TutorImage);?>" alt="" class="img-responsive" style="height: 120px;width:100px;margin-top: 1rem; margin-bottom: -1.5rem;">
										</li>
										<li style="display: inline-block;position: relative;top:-3.5rem;left:1rem;">
											<h3><a href="<?=site_url('/Teacher/get_tutor/'.$key->TutorId)?>"><?=$key->TutorName;?></h3>
										</li>
									</ul>
								</div>                  				
	            			</div>
                			<?php
                					}
                				}
                			?>
                		</div>
                	</div>
                </div>

                <div class="row courses-instuctor">
                	<div class="col-sm-12">
                		<h2 class="courses-title" style="text-align: left">LIKED ARTICLES</h2>
                		<div class="row item-margin">
                			<?php
                			if(empty($like))
	                				{
            					?>
            					<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">Not Liked Any Article.</blockquote>
            					<?php
	                				}
	                				else
	                				{
		                				foreach($like as $key)
		                				{
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
                			?>
                	</div>
                </div>

                <div class="row">
                    <div class="teacher_skill clearfix">
                        <div class="col-md-12 col-lg-12">
                            <div class="teacher_shedule_list">
                                <h2 class="courses-title" style="text-align: left">COMMENTS</h2>
                                <ul class="list-unstyled teachers-time-shedule">
                                	<?php
                                	if(empty($comm))
	                				{
	            					?>
	            					<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">No Comments.</blockquote>
	            					<?php
		                				}
		                				else
		                				{
	                                		foreach ($comm as $key) 
	                                		{
	                                			$scr=substr($key->ArticleComment,0,50).'...';
                                	?>
                                    <li><?=$scr;?> <a href="<?=site_url('/Article/get_article/'.$key->ArticleId."#comment-$key->ArticleCommentId");?>">Read More</a>
                                    	<br><br>
                                    	<font style="margin: 2rem; margin-top: 2rem; color: #F1C40F;">
                                    		<i class="fa fa-calendar"></i> <?php echo date('F', strtotime(str_replace('-','/', $key->CommCreatedDate)))," ",date('d', strtotime(str_replace('-','/', $key->CommCreatedDate))),", ",date('Y', strtotime(str_replace('-','/', $key->CommCreatedDate)));?>
                                    	</font>
                                    	<br><br>
                                    </li>
                                	<?php
                                			}
                                		}
                                	?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="teacher_skill clearfix">
                        <div class="col-md-12 col-lg-12">
                            <div class="teacher_shedule_list">
                                <h2 class="courses-title" style="text-align: left">QUESTIONS ASKED</h2>
                                <ul class="list-unstyled teachers-time-shedule">
                                	<?php
                                	if(empty($ques))
	                				{
	            					?>
	            					<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">No Questions Asked.</blockquote>
	            					<?php
		                				}
		                				else
		                				{
	                                		foreach ($ques as $k) 
	                                		{
	                                			$scr=substr($k->Question,0,50).'...';
                                	?>
                                    <li><?=$scr;?> <a href="<?=site_url('/Ques/get_ques/'.$k->QuesId);?>">Read More</a>
                                    	<br><br>
                                    	<font style="margin: 2rem; margin-top: 2rem; color: #F1C40F;">
                                    		<i class="fa fa-calendar"></i> <?php echo date('F', strtotime(str_replace('-','/', $k->QuesCreatedDate)))," ",date('d', strtotime(str_replace('-','/', $k->QuesCreatedDate))),", ",date('Y', strtotime(str_replace('-','/', $k->QuesCreatedDate)));?>
                                    	</font>
                                    	<br><br>
                                    </li>
                                	<?php
                                			}
                                		}
                                	?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
			</div>															

			<?php
				}
				else
				{
			?>

			<div class="col-sm-8 t-profile-right">
                <div class="row courses-instuctor">
                	<div class="col-sm-12">
                		<h2 class="courses-title" style="text-align: left">COURSES</h2>
	                		<div class="row item-margin">
	                			<?php
	                				if(empty($course))
	                				{
            					?>
            					<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">No Courses.</blockquote>
            					<?php
	                				}
	                				else
	                				{
	                					$rate=floor($course[0]->rate[0]->Rating * 10) / 10;
	                					foreach ($course as $c) 
	                					{
	    						?>
	                			<div class="col-sm-4 instractor-single" style="margin-bottom: 3rem;">
									<div class="instractor-courses-single">
										<div class="img-box">
											<img src="<?=base_url('/resources/common/images/'.$c->Thumbnail);?>" alt="" class="img-responsive" style="height: 200px; border-bottom: 2px solid #585858;">
										</div>
										<div class="instractor-courses-text">
											<div class="text-bottom">
												<h3><a href="<?=site_url('/Course/'.$c->CourseId);?>"><?=$c->CourseTitle;?></a></h3>
												<div class="price">
												<ul class="list-unstyled">
													<li style="color: #F1C40F"><i class="fa fa-bookmark"></i><?=$c->enroll;?> Enrollments</li>
													<br>
													<li><i class="fa fa-star"></i> <?=$rate;?> </li>
												</ul>
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

                <div class="row courses-instuctor">
                	<div class="col-sm-12">
                		<h2 class="courses-title" style="text-align: left">ARTICLES</h2>
                		<div class="row item-margin">
                			<?php
                				if(empty($article))
	                				{
            					?>
            					<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">No Articles.</blockquote>
            					<?php
	                				}
	                				else
	                				{
			                			foreach ($article as $a)
			                			{
	                		?>
                			<div class="col-sm-4 instractor-single" style="margin-bottom: 2rem;">
								<div class="instractor-courses-single" style="margin-top: 1rem;">
									<div class="img-box">
										<img src="<?=base_url('/resources/common/images/'.$a->ArticleImage);?>" alt="" class="img-responsive" style="height: 200px; border-bottom: 2px solid #585858;">
									</div>
									<div class="instractor-courses-text">
										<div class="instractor-parson">
											<ul class="list-unstyled" style="margin-top: 1rem; ">
												<li style="color: #F1C40F;">
													<?php echo date('F', strtotime(str_replace('-','/', $a->ArticleCreatedDate)))," ",date('d', strtotime(str_replace('-','/', $a->ArticleCreatedDate))),", ",date('Y', strtotime(str_replace('-','/', $a->ArticleCreatedDate)));?>
												</li>
											</ul>
										</div>
										<div class="text-bottom">
											<h3><a href="<?=site_url('/Article/get_article/'.$a->ArticleId);?>"><?=$a->ArticleTitle;?></a></h3>
											<div class="price">
												<ul class="list-unstyled">
													<li style="color: #F1C40F"><i class="fa fa-heart"></i><?=$a->like?> Likes</li><br>
													<li><i class="fa fa-comment"></i><?=$a->comment?> Comments</li>
												</ul>
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

                <div class="row courses-instuctor">
                	<div class="col-sm-12">
                		<h2 class="courses-title" style="text-align: left">FOLLOWERS</h2>
                		<div class="row item-margin">
                			<?php
                				if(empty($sub))
	                				{
            					?>
            					<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">No Followers.</blockquote>
            					<?php
	                				}
	                				else
	                				{
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
                				}
                			?>
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