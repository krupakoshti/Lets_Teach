<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Course - Let's Teach</title>

<?php
	include('header.php');
?>

<body class="courses">

<?php
	include('menu.php');
?>

<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="intro-text ">
						<h1>Courses</h1>
						<p><span><a href="<?=site_url('/Home');?>">Home </a><i class='fa fa-angle-right'></i></span> <span>Courses</span></p>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
</header>
	<!--  End header section-->
<style>
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}

.dropdown li:hover{
	transition:.4s all ease;
}

.dropdown li:hover{
	padding-left: 1rem;
}
</style>
<!--Start Courses Area Section-->
<section class="courses-area-04" id="courses">
	<div class="container">
		<div class="row">
			<div class="col-sm-12" style="margin-bottom: 10rem; text-align: right;">
				<?php
				if(isset($this->ss->uid))
				{
					if(!$this->ss->type)
					{
				?>
				<a href="<?=site_url('/Course/add_view');?>">
					<button class="btn" style="background-color: #F1C40F; color: white;">
						<i class="fa fa-plus-circle" style="margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem; font-size: 15px;"></i> 
								Add Course
					</button>
				</a>
				<?php
					}
				}
				?>
			</div>
			<div class="row">	

				<div class="row col-sm-9">
					<div class="courses-wrapper">		
						<div class="col-sm-12">
							<div class="row">
								<?php
									foreach($course as $key)
									{
								?>
								<div class="col-sm-4">
								    <div class="single-courses">
										<figure>
											<div class="figure-img"><img src="<?=base_url('/resources/common/images/').$key->Thumbnail;?>" alt="" class="img-responsive" style="height: 270px; width: 270px; margin-bottom: 2rem;"></div>
											
											<figcaption>
												<div><a href="<?=site_url('/Course/get_course/'.$key->CourseId);?>" class="read_more-btn">read more</a></div>
											</figcaption>
										</figure>
										<div class="courses-content-box" style="padding-left: 10px;">
											<div class="courses-content">
												<h3 align="center"><a href=""><?=$key->CourseTitle;?></a></h3>
												<ul class="list-unstyled">
													<li><img src="<?=base_url('/resources/common/images/').$key->TutorImage;?>" alt="" class="img-circle" style="height: 50px; width: 50px;"></li>
													<li>By: <span><?=$key->TutorName;?></span></li>
												</ul>
											</div>
											<div class="rank-icons">
												<ul class="list-unstyled">
													<font style="padding-right: 1rem;">
														<?php
															$rate=round($key->totalrate[0]->Rating,1);
										                    $int=intval($key->totalrate[0]->Rating);
										                    $frac=$key->totalrate[0]->Rating-$int;
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
												</ul>
												<span>(<?=$key->countrate;?> Reviews)</span>
											</div>
										</div>
									</div><!-- Ends: .single courses -->
								</div><!-- Ends: . -->
								<?php
									}
								?>
							</div>
						</div>	
					</div>
				</div><!--End .row-->

				<div class="categories-item col-sm-2 pull-right" style="color: #757575">
					<h2 style="font-size: 25px; margin-bottom: 2rem;">categories</h2>
					<ul class="list-unstyled" id="head1">
						<?php
							$i=0;
							foreach($cdata as $c)
							{
						?>
						<div class="dropdown">
							<li>
								<i class="fa fa-angle-right"></i>
								<label class="dropdown-toggle" style="margin-left: 2rem;" data-toggle="dropdown" id="myDIV"><a href="<?=site_url('/Course/index');?>/cat/<?=$c->CategoryId;?>" style="color: #757575"><?=$c->CategoryName;?></a></label>
									<?php
										if(is_array($c->subdata) && count($c->subdata)>0)
										{
									?>
									<ul class="list-unstyled " id="head2" style="margin-left: 20px;">
									<?php
										foreach($c->subdata as $sub)
										{
									?>
									
							      <li style="margin-bottom: 5px;"><i class="fa fa-angle-right" style="margin-right: 2rem;"></i><a href="<?=site_url('/Course/index');?>/subcat/<?=$sub->SubCategoryId;?>" style="color: #757575"><?=$sub->SubCategoryName;?></a>
							      	<?php
										if(is_array($sub->sdata) && count($sub->sdata)>0)
										{
									?>
							      <ul class="list-unstyled" id="head2">
								      <?php
											foreach($sub->sdata as $s)
											{
										?>
									      <li style="margin-bottom: 5px;" type="circle"><a tabindex="-1" href="<?=site_url('/Course/index');?>/sub/<?=$s->SubjectId?>" style="color: #757575"><?=$s->SubjectName;?></a></li>
									 	<?php
									 		}
									 	?>
									 </ul>
									 <?php
									 	}
									 ?>
									</li>
							 	<?php
							 		}
							 	?>
							 	</ul>
							 	<?php
							 		}
							 	?>
						 	</li>
					 	</div>	
						<?php
							$i++;
							}
					  ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section><!-- Ends: . -->	
<!-- ./ End Courses Area section -->


<script>
$('#head1').mouseleave(function() {
    $(this).find('li ul').each(function () {
        $(this).stop().slideUp('slow');
    });
});

$('#head2').mouseleave(function() {
    $(this).find('li ul').each(function () {
        $(this).stop().slideUp('slow');
    });
});

$("ul li").mouseenter(function() { 
	$(this).children('ul').stop().slideDown('slow'); 
});
$(document).ready(function(){
    $(this).find('li ul').each(function () {
        $(this).stop().slideUp('slow');
    });
 });
	
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
<script>
	var header = document.getElementById("myDIV");
	var btns = header.getElementsByClassName("btnActive");
	for (var i = 1; i < btns.length; i++) {
	  btns[i].addEventListener("click", function() {
	    var current = document.getElementsByClassName("active");
	    current[0].className = current[0].className.replace(" active", "");
	    this.className += " active";
	  });
	}
</script>	

<?php
	include('footer.php');
?>