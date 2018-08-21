<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Edit Profile - Let's Teach</title> 

	<?php
	include('header.php');
	?>

	<body class="become_teachers contact">

		<?php
		include('menu.php');
		?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="intro-text ">
						<h1>Edit Profile</h1>
						<p><span><a href="<?=site_url('/Home');?>">Home </a><i class='fa fa-angle-right'></i></span> <span>Edit Profile</span></p>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
</header>
<!--  End header section-->

<section class="become-teachers-01">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="tab-wapper">
							<ul class="nav nav-tabs">
								<li  class="active"><a href="#become_a_teacher"  data-toggle="tab"><i class="fa fa-user"></i>Basic Information</a></li>
								<li ><a href="#roles" data-toggle="tab"><i class="fa fa-key"></i>Password</a></li>
								<li ><a href="#courses"  data-toggle="tab"><i class="fa fa-image"></i>Profile Picture</a></li>
							</ul>

							<div class="tab-content">
								<div class="tab-pane fade in active" id="become_a_teacher">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<?php
												if($this->ss->type)
												{
													?>
													<form method="post" action="<?=site_url('/Profile/update_info/'.$upad[0]->StudentId);?>#become_a_teacher">
														<div class="col-sm-12">
															<div class="form-group">
																<input type="text" class="form-control" placeholder="Enter Full Name" name="upname" id="upname" value="<?=$upad[0]->StudentName;?>">
															</div>
															<font style="color: #E74C3C;"><?=form_error('upname','<div class="error">','</div>');?></font>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<input type="text" class="form-control" placeholder="Enter Email Id" name="upemail" id="upemail" value="<?=$upad[0]->EmailId;?>">
															</div>
															<font style="color: #E74C3C;"><?=form_error('upemail','<div class="error">','</div>');?></font>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<input type="text" class="form-control" placeholder="Enter Contact Number" name="upcno" id="upcno" value="<?=$upad[0]->ContactNo;?>">
															</div>
															<font style="color: #E74C3C;"><?=form_error('upcno','<div class="error">','</div>');?></font>
														</div>
														<div class="col-sm-12">
														<div class="form-group">
															<select class="form-control" id="upstate" name="upstate">
																<?php
																foreach ($state as $key) 
																{
																	?>
																	<option value="<?=$key->StateId;?>"
																		<?php
																		if($upad[0]->StateId==$key->StateId)
																			echo "selected";
																		?>
																		><?=$key->StateName;?></option>
																		<?php
																	}
																	?>
																</select>
															</div>
															<font style="color: #E74C3C;"><?=form_error('upstate','<div class="error">','</div>');?></font>
														</div>
														<script type="text/javascript">
															$(function(){
																$('#upstate').on('change',function(){
																	$.ajax({
																		url:'<?=site_url('/Profile/get_city/');?>'+$(this).val(),
																		success:function(result){
																			$('#upcity').html(result);
																		}
																	});
																});
															});
														</script>	
														<div class="col-sm-12">
															<div class="form-group">
																<select class="form-control" id="upcity" name="upcity">
																	<option value="<?=$upad[0]->CityId;?>" ><?=$upad[0]->CityName;?></option>                   	
																</select>
															</div>
															<font style="color: #E74C3C;"><?=form_error('upcity','<div class="error">','</div>');?></font>
														</div>


														<div class="col-sm-12">                                    
															<div class="full-width">
																<button class="btn" style="background-color: #F1C40F; color: white; margin-top: 3rem;">UPDATE INFO</button>
															</div>
														</div>
													</form>
												</div>

												<?php
											}
											else
											{
												?>
												<form method="post" action="<?=site_url('/Profile/update_info/'.$upad[0]->TutorId);?>#become_a_teacher">
													<div class="col-sm-12">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="Enter Full Name" name="upname" id="upname" value="<?=$upad[0]->TutorName;?>">
														</div>
														<font style="color: #E74C3C;"><?=form_error('upname','<div class="error">','</div>');?></font>
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="Enter Email Id" name="upemail" id="upemail" value="<?=$upad[0]->EmailId;?>">
														</div>
														<font style="color: #E74C3C;"><?=form_error('upemail','<div class="error">','</div>');?></font>
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="Enter Contact Number" name="upcno" id="upcno" value="<?=$upad[0]->ContactNo;?>">
														</div>
														<font style="color: #E74C3C;"><?=form_error('upcno','<div class="error">','</div>');?></font>
													</div>

													<div class="col-sm-12">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="Enter Website Link" name="insweb" id="insweb" value="<?=$upad[0]->WebsiteLink;?>">
														</div>
														<font style="color: #E74C3C;"><?=form_error('insweb','<div class="error">','</div>');?></font>
													</div>

													<div class="col-sm-12">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="Enter Facebook Link" name="insfb" id="insfb" value="<?=$upad[0]->FacebookLink;?>">
														</div>
														<font style="color: #E74C3C;"><?=form_error('insfb','<div class="error">','</div>');?></font>
													</div>

													<div class="col-sm-12">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="Enter Twitter Link" name="instwitter" id="instwitter" value="<?=$upad[0]->TwitterLink;?>">
														</div>
														<font style="color: #E74C3C;"><?=form_error('instwitter','<div class="error">','</div>');?></font>
													</div>

													<div class="col-sm-12">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="Enter Google Plus Link" name="insgp" id="insgp" value="<?=$upad[0]->GoogleplusLink;?>">
														</div>
														<font style="color: #E74C3C;"><?=form_error('insgp','<div class="error">','</div>');?></font>
													</div>

													<div class="col-sm-12">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="Enter Linkedin Link" name="insin" id="insin" value="<?=$upad[0]->LinkedinLink;?>">
														</div>
														<font style="color: #E74C3C;"><?=form_error('insin','<div class="error">','</div>');?></font>
													</div>

													<div class="col-sm-12">
														<div class="form-group">
															<select class="form-control" id="upstate" name="upstate">
																<?php
																foreach ($state as $key) 
																{
																	?>
																	<option value="<?=$key->StateId;?>"
																		<?php
																		if($upad[0]->StateId==$key->StateId)
																			echo "selected";
																		?>
																		><?=$key->StateName;?></option>
																		<?php
																	}
																	?>
																</select>
															</div>
															<font style="color: #E74C3C;"><?=form_error('upstate','<div class="error">','</div>');?></font>
														</div>
														<script type="text/javascript">
															$(function(){
																$('#upstate').on('change',function(){
																	$.ajax({
																		url:'<?=site_url('/Profile/get_city/');?>'+$(this).val(),
																		success:function(result){
																			$('#upcity').html(result);
																		}
																	});
																});
															});
														</script>	
														<div class="col-sm-12">
															<div class="form-group">
																<select class="form-control" id="upcity" name="upcity">
																	<option value="<?=$upad[0]->CityId;?>" ><?=$upad[0]->CityName;?></option>                   	
																</select>
															</div>
															<font style="color: #E74C3C;"><?=form_error('upcity','<div class="error">','</div>');?></font>
														</div>

														<div class="col-sm-12">                                    
															<div class="full-width">
																<button class="btn" style="background-color: #F1C40F; color: white; margin-top: 3rem;">UPDATE INFO</button>
															</div>
														</div>
													</form>	
												</div>
												<?php
											}
											?>
										</div>
									</div>																
								</div>
								<div class="tab-pane fade" id="roles">
									<div class="row">
										<div class="col-md-12">
											<form method="post" action="<?=site_url('/Profile/update_pwd/'.$upad[0]->UserId);?>#roles">
												<div class="row">
													<div class="col-md-12 form-group">
														<big>Old Password</big>
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<input type="password" class="form-control" placeholder="Enter Old Password" name="upopwd" id="upopwd">
														</div>
														<font style="color: #E74C3C;"><?=form_error('upopwd','<div class="error">','</div>');?></font>
														<font style="color: #E74C3C;"><?php
														if(isset($error))
														{
															echo $error;
														}
														?></font>
													</div>
													<div class="col-md-12 form-group">
														<big>New Password</big>
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<input type="password" class="form-control" placeholder="Enter New Password" name="upnpwd" id="upnpwd">
														</div>
														<font style="color: #E74C3C;"><?=form_error('upnpwd','<div class="error">','</div>');?></font>
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<input type="password" class="form-control" placeholder="Confirm Password" name="upcpwd" id="upcpwd">
														</div>
														<font style="color: #E74C3C;"><?=form_error('upcpwd','<div class="error">','</div>');?></font>
													</div>
													<div class="col-sm-12">                                    
														<div class="full-width">
															<button class="btn" style="background-color: #F1C40F; color: white; margin-top: 3rem;">UPDATE PASSWORD</button>
														</div>
													</div>	
												</div>
											</form>
										</div>
									</div>																
								</div>
								<div class="tab-pane fade" id="courses">
									<div class="row">
										<div class="col-md-12">
											<?php
											if($this->ss->type)
											{
												?>
												<?=form_open_multipart('/Profile/update_img/'.$upad[0]->StudentId);?>
												<div class="row">
													<div class="col-sm-12 col-sm-offset-3 form-group has-feedback">
														<img src="<?=base_url('/resources/common/images/')?><?=$upad[0]->StudentImage;?>" height="250px" width="100%" style="border-radius: 10%;" class="col-md-5" id="adimg">
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<input class="form-control" type="file" name="upimg" id="upimg">
														</div>
														<font style="color: #E74C3C;"><?=form_error('upimg','<div class="error">','</div>');?></font>
													</div>	
													<div class="col-sm-12">                                    
														<div class="full-width">
															<button class="btn" style="background-color: #F1C40F; color: white; margin-top: 3rem;">UPDATE PICTURE</button>
														</div>
													</div>	
												</div>
												<?=form_close();?>
												<?php
											}
											else
											{
												?>
												<?=form_open_multipart('/Profile/update_img/'.$upad[0]->TutorId);?>
												<div class="row">
													<div class="col-sm-12 col-sm-offset-3 form-group has-feedback">
														<img src="<?=base_url('/resources/common/images/')?><?=$upad[0]->TutorImage;?>" height="250px" width="100%" style="border-radius: 10%;" class="col-md-5" id="adimg">
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<input class="form-control" type="file" name="upimg" id="upimg">
														</div>
														<font style="color: #E74C3C;"><?=form_error('upimg','<div class="error">','</div>');?></font>
													</div>	
													<div class="col-sm-12">                                    
														<div class="full-width">
															<button class="btn" style="background-color: #F1C40F; color: white; margin-top: 3rem;">UPDATE PICTURE</button>
														</div>
													</div>	
												</div>
												<?=form_close();?>
												<?php
											}
											?>
										</div>
									</div>																
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$(function(){
		$('#upimg').on('change',function(e){
			var imgsrc=URL.createObjectURL(e.target.files[0]);
			$('#adimg').attr('src',imgsrc);
/*var upimg=('#img');
upimg.src=URL.createObjectURL(event.target.files[0]);*/
});
	});
</script>

<?php
include('footer.php');
?>
