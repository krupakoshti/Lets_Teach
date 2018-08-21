<?php
	include('headerhome.php');
?>
<?php
	if(isset($this->ss->type))
	{
?>
<script type="text/javascript">
	$(function(){
		$.ajax({
			url:'<?=site_url('/Home/get_name');?>',
			success:function(result){
				$('#txtcolor').text('Welcome, '+result);
			}
		});
	});
</script>
<?php
	}
?>

<!--Start Courses Area Section-->
<section class="Courses-area" id="courses">
	<div class="container">	
		<div class="row">
			<div class="col-sm-12 section-header-box">
				<div class="section-header-l">
					<h2>Popular Courses</h2>
				</div><!-- ends: .section-header -->
			</div>
		</div>

		<div class="row">
			<div class="courses-wrapper owl-carousel" id="courses-carousel-03">		
				<?php
					foreach ($course as $key)
					{
				?>
				<div>
					<div class="col-sm-12">
					    <div class="single-courses">
							<figure>
								<div class="figure-img"><img src="<?=base_url('/resources/common/images/'.$key->Thumbnail)?>" alt="" class="img-responsive" style="width: 270px; height: 250px;"></div>
								<figcaption>
									<div><a href="<?=site_url('/Course/get_course/'.$key->CourseId);?>" class="read_more-btn">Read More</a></div>
								</figcaption>
							</figure>
							<div class="courses-content-box">
								<div class="courses-content">
									<h3><?=$key->CourseTitle;?></h3>
									<ul class="list-unstyled">
										<li><img src="<?=base_url('/resources/common/images/'.$key->TutorImage)?>" alt="" class="img-circle" style="width: 50px; height: 50px;"></li>
										<li><?=$key->TutorName?></li>
									</ul>
								</div>
							</div>
						</div><!-- Ends: .single courses -->
					</div><!-- Ends: . -->
				</div>
				<?php
					}
				?>	
			</div>
		</div><!--End .row-->

	</div>
</section><!-- Ends: . -->	
<!-- ./ End Courses Area section -->



<!-- Start achievment Area Section -->
<section class="achievment-area">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 section-header-box">
				<div class="section-header">
					<h2>OUR ACHIEVEMENT</h2>
				</div><!-- ends: .section-header -->
			</div>
		</div>

		<div class="row">
			<div class="col-sm-3 counters-item">
				<div class="section counter-box">
					<img src="images/index-03/counter-icon-01.png" alt="">
					<div class="project-count counter"><?=$tot_stud;?></div>
					<span>Total Students</span>
				</div>
			</div>

			<div class="col-sm-3 counters-item">
				<div class="section counter-box">
					<img src="images/index-03/counter-icon-02.png" alt="">
					<div class="project-count counter"><?=$tot_course;?></div>
					<span>Total Courses</span>
				</div>	
			</div>	

			<div class="col-sm-3 counters-item">
				<div class="section counter-box">
					<img src="images/index-03/counter-icon-03.png" alt="">
					<div class="project-count counter"><?=$tot_tutor;?></div>
					<span>Total Tutors</span>
				</div>
			</div>

			<div class="col-sm-3 counters-item">
				<div class="section counter-box">
					<img src="images/index-03/counter-icon-04.png" alt="">
					<div class="project-count counter"><?=$tot_article;?></div>
					<span>Total Articles</span>
				</div>	
			</div>	
		</div>

	</div>
</section>
<!-- ./ End Information Area section -->

<!--Start Courses Area Section-->
<section class="blog-area" id="blog">
	<div class="container">	
		<div class="row">
			<div class="col-sm-12 section-header-box">
				<div class="section-header-l">
					<h2>POPULAR ARTICLES</h2>
				</div><!-- ends: .section-header -->
			</div>
		</div>

		<div class="row">
			<div class="blog-wrapper owl-carousel" id="bolg-carousel-03">
				<?php
					foreach ($article as $key)
					{
				?>		
				<div class="col-sm-12">
					<div class="blog-single-box">
						<div class="img-box">
							<img src="<?=base_url('/resources/common/images/'.$key->ArticleImage);?>" alt="" class="img-responsive" style="width: 370px; height: 300px;">
						</div>
						<div class="content-full-box">
							<div class="blog-content">
								<h3><a href="<?=site_url('/Article/get_article/'.$key->ArticleId);?>"><?=$key->ArticleTitle?></a></h3>
							</div>
							<div class="bolg-content-bottom">
								<div class="blog-time">
									<span><?=date('d', strtotime(str_replace('-','/', $key->ArticleCreatedDate)));?></span>
									<span><?=date('M', strtotime(str_replace('-','/', $key->ArticleCreatedDate)));?></span>
								</div>
								<ul class="list-unstyled">
									<li><a href="<?=site_url('/Tutor/get_tutor/'.$key->TutorId);?>"><i class="fa fa-user blog-icon"></i><?=$key->TutorName;?></a></li>
								</ul>	
							</div>
						</div>
					</div>
				</div>	
				<?php
					}
				?>
			</div>
		</div><!--End .row-->

	</div>
</section><!-- Ends: . -->	
<!-- ./ End Courses Area section -->

<?php
	include('footer.php');
?>