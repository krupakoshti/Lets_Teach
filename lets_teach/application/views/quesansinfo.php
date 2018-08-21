<!doctype html>
<html class="no-js" lang="zxx">
<style type="text/css">
	.comment-reply-title h3 {
	    color: #333333;
	    display: inline-block;
	    font-size: 20px;
	    margin-bottom: 15px;
	    padding-bottom: 15px;
	    position: relative;
	}
	.comment-reply-title h3:before {
	    position: absolute;
	    left: 0;
	    bottom: -1px;
	    content: "";
	    width: 50%;
	    height: 2px;
	    content: "";
	    background: #333333;
	}
	#btnsub{
		background:none;
		color:white;
		background-color: #fec722;
		height: 40px;width: 100px;
		border: none;
		text-transform: uppercase;
	}
</style>
<head>
	<title>Answers - Let's Teach</title>

	<?php
	$this->load->view('header');
	?>

	<body class="single-courses_v">

		<?php
		$this->load->view('menu');
		?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="intro-text ">
						<h1>ANSWERS</h1>
						<p>
							<span><a href="<?=site_url('/Home');?>">Home </a><i class='fa fa-angle-right'></i></span><span>Answers</span></p>
						</div>
					</div>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div>
	</header>
	<!--  End header section-->


	<div class="single-courses-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">                                    
					<div class="full-width" style="margin-bottom: 5rem;">
						<a href="<?=site_url('/Ques');?>"><button class="btn" style="background-color: #F1C40F; color: white;"><i class="fa fa-mail-reply" style="margin-right: .5rem;  margin-left: .5rem; margin-top: .5rem; margin-bottom: .5rem;"></i> Back</button></a>
					</div>
				</div>	
				<div class="col-sm-12 sidebar-left">
					<div class="single-curses-contert">
						<?php
						foreach ($qdata as $d) {
							?>
							<div class="description-content">
								<h1>QUESTION</h1>
								<p style="font-size: 15px;font-weight: bold; text-indent: 50px; text-align: justify;"><?=$d->Question;?></p>
							</div>
							<?php
						}
						?>

						<div class="col-sm-12 comments">
							<div class="row">

								<h2>Answers</h2>
								<br>

								<div class="row">
									<?php
										if(empty($adata))
										{
									?>
									<blockquote class="message" style="text-align: justify; margin-left: 4rem; font-size: 17px; color: #757575">No Answers.</blockquote>
									<?php
										}
										else
										{
											foreach ($adata as $d) 
											{
										?>
											<div class="col-sm-12">

												<div class="col-sm-12 comment-single-item">

													<div class="card" style="padding: 20px; padding-left: 20px; background:#eee;margin-top: 1rem;">
														<div class="row">
															<div class="col-sm-10 comment-left-bar">
																<div class="comment-text">
																	<div class="row">
																		<ul class="list-unstyled">
																			<li style="float: left;margin-left: 1rem;">
																				<img src="<?=base_url('/resources/common/images/');?><?=$d->TutorImage;?>" width="10px" height="10px" style="border-radius: 50%;height: 50px;width:50px;"> <?=$d->TutorName;?>
																			</li>

																			<li class="comment-date">
																				<?php echo date('F', strtotime(str_replace('-','/', $d->AnsCreatedDate)))," ",date('d', strtotime(str_replace('-','/', $d->AnsCreatedDate))),", ",date('Y', strtotime(str_replace('-','/', $d->AnsCreatedDate)));?></li>
																			</ul>
																		</div>
																		<div class="row">
																			<p style="margin-left: 7rem;font-size: 15px; text-align: justify; text-indent: 50px"><?=$d->Answer;?></p>
																		</div>
																</div>
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

								<?php
								if(!$this->ss->type)
								{
									?>
									<div class="col-sm-12" style="margin-top: 5rem">
										<div class="leave-comment-box">
											<div class="comment-respond">
												<div class="comment-reply-title">
													<h3>Write Answer</h3>
												</div>
												<div class="comment-form">
													<form method="post" action="<?=site_url('/Ques/add_ans/');?><?=$qdata[0]->QuesId;?>">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group">
																	<textarea class="form-control" rows="8" placeholder="Type Your Answer" name="txtans" id="txtans"></textarea>
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
						</div>
					</div>

				</div>
			</div>	
		</div>



		<?php
		$this->load->view('footer');
		?>


