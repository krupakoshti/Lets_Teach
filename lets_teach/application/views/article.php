<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Article - Let's Teach</title>

<?php
	include('header.php');
?>

<body class="blog_1">

<?php
	include('menu.php');
?>

<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="intro-text ">
						<h1>Articles</h1>
						<p><span><a href="<?=site_url('/Home');?>">Home </a><i class='fa fa-angle-right'></i></span> <span>Articles</span></p>
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
	
<div class="blog-area">
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12" style="margin-bottom: 10rem; text-align: right;">
			<?php
				if(isset($this->ss->uid))
				{
					if(!$this->ss->type)
					{
			?>
			<a href="<?=site_url('/Article/add_view');?>">
				<button class="btn" style="background-color: #F1C40F; color: white;">
					<i class="fa fa-plus-circle" style="margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem; font-size: 15px;"></i> 
							Add Article
				</button>
			</a>
			<?php
					}
				}
			?>
			</div>
			
			<div class="col-sm-9 bolg_side-left">
				<?php
					foreach($adata as $a) 
					{
				?>
				<div class="col-sm-12 single-item-box">
					<div class="single-item">
						<div class="img-box">
							<a href="#"><img src="<?=base_url('resources/common/images/');?><?=$a->ArticleImage;?>" alt="" class="img-responsive" style="width: 100%; height: 550px;"></a>
							<span><a href="#" class="overlay"></a></span>
							<div class="img-caption">
								<p class="date"><span><?=date('d', strtotime(str_replace('-','/', $a->ArticleCreatedDate)));?></span><span><?=date('M', strtotime(str_replace('-','/', $a->ArticleCreatedDate)));?></span></p>
							</div>
						</div>
						<div class="single-text-box">
							<h1><?=$a->ArticleTitle;?></h1><br>
							<ul>
							<table>
								<tr>
									<td>
										<li><a href="#"><i class="fa fa-graduation-cap"></i><?=$a->TutorName;?></a></li>
									</td>
									<td>
										<li><a href="#"><i class="fa fa-calendar-check-o"></i><?php echo date('F', strtotime(str_replace('-','/', $a->ArticleCreatedDate)))," ",date('d', strtotime(str_replace('-','/', $a->ArticleCreatedDate))),", ",date('Y', strtotime(str_replace('-','/', $a->ArticleCreatedDate)));?></a></li>
									</td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>
										<li><a href="#"><i class="fa fa-thumbs-up"></i><?=$a->totallike;?> Likes</a></li>
									</td>
									<td>
										<li><a href="#"><i class="fa fa-comment"></i><?=$a->totalcomment;?> Comments</a></li>
									</td>
									<td style="padding-left: 30px;">
										<li><a href="#"><i class="fa fa-eye"></i><?=$a->ArticleViews;?> Views</a></li>
									</td>
								</tr>
							</table>
							</ul>
							<div class="blog-btn-box">
								<a href="<?=site_url('/Article/get_article/');?><?=$a->ArticleId;?>" style="color: white;">Read More</a>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				?>
				<div class="row">
					<div class="col-sm-12 text-center">
						<nav aria-label="Page navigation">
						  	<ul class="pagination">
						      	<?php foreach ($links as $link) {
									echo $link;
								} ?>
						  	</ul>
						</nav>
					</div>
				</div>	
			</div>
			
			<div class="col-sm-1">
			</div>
			<div class="col-sm-2 blog_side-right">
				<div class="sidebar-content">
					<div class="row">
						<div class="categories-item">
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
										<label class="dropdown-toggle" style="margin-left: 2rem;" data-toggle="dropdown" id="myDIV"><a href="<?=site_url('/Article/index');?>/cat/<?=$c->CategoryId;?>"><?=$c->CategoryName;?></a></label>
											<?php
												if(is_array($c->subdata) && count($c->subdata)>0)
												{
											?>
											<ul class="list-unstyled " id="head2" style="margin-left: 20px;">
											<?php
												foreach($c->subdata as $sub)
												{
											?>
											
									      <li style="margin-bottom: 5px;"><i class="fa fa-angle-right" style="margin-right: 2rem;"></i><a href="<?=site_url('/Article/index');?>/subcat/<?=$sub->SubCategoryId;?>"><?=$sub->SubCategoryName;?></a>
									      	<?php
												if(is_array($sub->sdata) && count($sub->sdata)>0)
												{
											?>
									      <ul class="list-unstyled" id="head2">
										      <?php
													foreach($sub->sdata as $s)
													{
												?>
											      <li style="margin-bottom: 5px;" type="circle"><a tabindex="-1" href="<?=site_url('/Article/index');?>/sub/<?=$s->SubjectId?>"><?=$s->SubjectName;?></a></li>
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
		</div>
	</div>	
</div>	

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