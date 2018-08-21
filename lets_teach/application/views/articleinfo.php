<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Article Information - Let's Teach</title>

	<?php
	include('header.php');
	?>

	<body class="post-1">

		<?php
		include('menu.php');
		?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="intro-text ">
						<h1>Article's Information</h1>
						<p><span><a href="<?=site_url('/Home');?>">Home </a><i class='fa fa-angle-right'></i></span> <span><a href="<?=site_url('/Article');?>">Article </a><i class='fa fa-angle-right'></i></span> <span>Article's Information</span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<style type="text/css">
	h3 {
	    line-height: 30px;
	    margin: 0;
	    padding-bottom: 20px;
	    color: #333333;
	    text-transform: uppercase;
	    font-size: 25px;
	    transition: all 0.3s ease-in-out;
	}

	h3:hover{
		color: #333333;
	}

	#btn_edit:hover {
		background-color: #F1C40F;
		color: white; 
	}

	#btn_img:hover {
		background-color: #F1C40F;
		color: white; 
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
	}
</style>

<div class="post_1_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">                                    
				<div class="full-width" style="margin-bottom: 5rem;">
					<a href="<?=site_url('/Article');?>"><button class="btn" style="background-color: #F1C40F; color: white;"><i class="fa fa-mail-reply" style="margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem;"></i> Back</button></a>
				</div>
			</div>	
			<div class="col-sm-10 col-md-offset-1 post_left-side">
				<div class="row">
					<div class="col-sm-12">
						<div class="post-img-box">
							<?php
							if(!$this->ss->type)
							{
								if($adata[0]->TutorId==$this->ss->id)
								{
							?>
							<div class="pull-right" style="margin-bottom: -2rem;">
								<button class="btn" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="border-radius: 100%; background-color: #EBEDEF;" id="btn_img"><i class="fa fa-pencil" style="font-size: 20px; color: #757575"></i></button>
							</div>
							<?php
								}
							}
							?>
							<img src="<?=base_url('/resources/common/images/');?><?=$adata[0]->ArticleImage;?>" alt="" class="img-responsive" style="width: 100%; height: 600px;">

						</div>
					</div>

					<!-- Modal -->
					<div id="myModal" class="modal fade" role="dialog" style="margin-top: 10rem;">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Update Article Image</h4>
					      </div>
					      <?=form_open_multipart('/Article/update_img/'.$adata[0]->ArticleId);?>
					      <div class="modal-body">
					        	<img src="<?=base_url('/resources/common/images/');?><?=$adata[0]->ArticleImage;?>" style="height: 300px; width: 450px; margin-bottom: 3rem; margin-left: 6rem;" id="aimg">
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

					<div class="col-sm-12">
						<div class="description-content">
							<div class="description-heading">
								<div class="time">
									<span><?=date('d', strtotime(str_replace('-','/', $adata[0]->ArticleCreatedDate)));?></span>
									<span><?=date('M', strtotime(str_replace('-','/', $adata[0]->ArticleCreatedDate)));?></span>
								</div>
								<h3><?=$adata[0]->ArticleTitle;?></h3>
								
							</div>

							<?php
							if(!$this->ss->type)
							{
								if($adata[0]->TutorId==$this->ss->id)
								{
							?>
							<div class="pull-right" style="margin-bottom: 2rem;">
								<button class="btn" style="border-radius: 100%; background-color: #EBEDEF;" id="btn_edit"><i class="fa fa-pencil" style="font-size: 20px; color: #757575"></i></button>
							</div>
							<?php
								}
							}
							?>

							<div class="description-text">
								<div class="row">
									<div class="col-sm-1">
										<div class="description-side-left">
											<div class="author-img">
												<img src="<?=base_url('/resources/common/images/');?><?=$adata[0]->TutorImage;?>" width="60px" height="60px" alt="" class="img-circle">
												<div class="author-details" style="margin-top: 1rem;">
													<a href="#"><?=$adata[0]->TutorName;?></a>
												</div>
											</div>
											<ul class="list-unstyled">
												<li><i class="fa fa-eye" style="color: black; font-size: 20px;"></i><?=$adata[0]->ArticleViews;?></li>
												<li id="articleliked">
													<?php
													if($this->ss->type)
													{
														$icon=$flag=="liked"?"fa fa-heart":"fa fa-heart-o"; 
														?>
														<i class="<?=$icon;?> user" style="color: red; font-size: 25px;"></i>
														<?=$adata[0]->totallike;?>
														<?php
													}
													else
													{
														?>
														<i class="fa fa-heart" style="color: red; font-size: 25px;"></i><?=$adata[0]->totallike;?>
														<?php
													}
													?>
												</li>
												<li><i class="fa fa-comment" style="color: black; font-size: 20px;"></i><?=$adata[0]->totalcomment;?></li>
											</ul>
										</div>
									</div>
									<script type="text/javascript">
										$(function(){
											$('#articleliked').on('click','.user',function(){
												$.ajax({
													url:'<?=site_url('/Article/article_like/').$adata[0]->ArticleId;?>',
													success:function(result){
														$('#articleliked').html(result);
													}
												});
											});
										});
									</script>
									<div class="col-sm-11">
										<div class="description-text-right" id="desc">
											<p style="text-indent: 50px; font-size: 17px; text-align: justify;"><?=$adata[0]->Description;?></p>
										</div>
									</div>
									<div class="col-sm-11" id="desc_box" hidden>
										<form method="post" action="<?=site_url('/Article/update_desc/').$adata[0]->ArticleId;?>" id="up_desc">
											<textarea class="form-control" rows="10" name="txtdesc" id="txtdesc" style="border-color: #F1C40F; font-size: 17px;"><?=$adata[0]->Description?></textarea>
											<div class="col-sm-11">                                    
												<div class="full-width"style="margin-top: 2rem;">
													<button class="btn" type="submit" id="desc_update" style="background-color: #F1C40F; color: white; font-size: 15px;">Update</button>
												</div>
											</div>	
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
<!-- 
					<script type="text/javascript">
						$(function(){
							$('#up_desc').submit(function(){

								$.ajax({
									url:'',
									success:function(data){
										alert('success');
									}
								});
							});
						});
					</script> -->

					<script type="text/javascript">
						$(function(){
							$('#btn_edit').on('click',function(){
								$('#desc_box').toggle(500);
								$('#desc').toggle();
								$('#btn_edit').hide();
							});
						});

						/*$(function(){
							$('#desc_update').on('click',function(){
								$('#desc_box').toggle(500);
								$('#desc').toggle(500);
							});
						});*/
					</script>
							
					<div class="col-md-12 post_slider">
						<div class="row">
							<h3>Related Articles</h3>
							<?php
								if($total<=0)
								{
							?>
							<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">No Related Article Available.</blockquote>
							<?php
								}
								else
								{
								foreach ($relate as $key) 
								{
							?>
								<div class="col-md-4 col-sm-6 blog-single-item">
									<div class="blog-post">
										<figure>
											<div class="figure-img"><img src="<?=base_url('/resources/common/images/').$key->ArticleImage;?>" alt="" class="img-responsive" style="height: 250px; width: 300px;"></div>
											<figcaption>
												<div><a href="<?=site_url('/Article/get_article/');?><?=$key->ArticleId;?>" class="read_more-btn">Read More</a></div>
											</figcaption>
										</figure>
										<div class="courses-content-box">
											<div class="courses-content">
												<h4><a href="#"><?=$key->ArticleTitle;?></a></h4>
												<p><span><b>By:</b> <?=$key->TutorName;?></span> | 
													<span><?php echo date('F', strtotime(str_replace('-','/', $key->ArticleCreatedDate)))," ",date('d', strtotime(str_replace('-','/', $key->ArticleCreatedDate))),", ",date('Y', strtotime(str_replace('-','/', $key->ArticleCreatedDate)));?></span>
												</p>
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

					<?php
						if(isset($this->ss->uid))
						{
					?>

 					<div class="col-md-12 comments">							
						<div class="row">
							<h3>Comments</h3>
							<?php
								if(empty($cdata))
								{
							?>
							<blockquote class="message" style="text-align: justify; font-size: 15px; color: #757575; margin-left: 2rem;">No Comments.</blockquote>
							<?php
								}
								else
								{
									foreach ($cdata as $c)
									{
							?>
							<a href="#comment-<?=$c->ArticleCommentId;?>">
							<div class="col-sm-12 comment-single-item" id="comment-<?=$c->ArticleCommentId;?>">
								<div class="col-sm-1 img-box">
									<img src="<?=base_url('/resources/common/images/');?><?=$c->StudentImage;?>" alt="" class="img-circle">
								</div>
								<div class="col-sm-11 comment-left-bar">
									<div class="comment-text">
										<ul class="list-unstyled comment-author-box">
											<li> <span class="name"><?=$c->StudentName;?></span> 
												<span>
													<?php echo date('F', strtotime(str_replace('-','/', $c->CommCreatedDate)))," ",date('d', strtotime(str_replace('-','/', $c->CommCreatedDate))),", ",date('Y', strtotime(str_replace('-','/', $c->CommCreatedDate)));?> 
												</span>
											</li>
										</ul>
										<p style="text-align: justify;"><?=$c->ArticleComment;?></p>
									</div>
								</div>
							</div>
							</a>
							<?php
									}
								}
							?>	
							</div>
						</div>

						<script type="text/javascript">
							$(function(){
							    var tab='';
							    tab=location.hash;
							    if(tab!=''){
							      $('[href="'+tab+'"]').focus();      
							    }
							});
		                </script>

						<?php
						if($this->ss->type)
						{
							?>
							<div class="col-sm-12">
								<div class="leave-comment-box">
									<div class="comment-respond">
										<div class="comment-reply-title">
											<h3>Leave a Reply</h3>
										</div>
										<div class="comment-form">
											<form method="post" action="<?=site_url('/Article/add_comment/');?><?=$adata[0]->ArticleId;?>">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<textarea class="form-control" rows="8" placeholder="Type Your Comments" name="txtcomment" id="txtcomment"></textarea>
														</div>
													</div>
													<div class="col-sm-12">                                    
														<div class="full-width">
															<input value="Submit" type="submit" name="btnsub" id="btnsub">
														</div>
													</div>	
												</div>
											</form>
										</div>
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
		</div>	
	</div>

	<?php
	include('footer.php');
	?>