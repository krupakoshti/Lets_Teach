<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Register - Let's Teach</title>

<?php
	$this->load->view('header');
?>
<body class="become_teachers">
<?php
	$this->load->view('menu');
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="intro-text ">
					<h1>Register</h1>
					<p><span><a href="<?=site_url('/Home');?>">Home </a><i class='fa fa-angle-right'></i></span> <span>Register</span></p>
				</div>
			</div>
		</div><!-- /.row -->
	</div><!-- /.container -->
</div>
</header>
<!-- Teachers Area section -->

<section class="become-teachers-01">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
						<div class="tab-wapper">
							<ul class="nav nav-tabs">
								<li  class="active" style="width:50%;"><a href="#tutor" data-toggle="tab"><i class="fa fa-mortar-board"></i> Register As Tutor</a></li>
								<li style="width: 50%;"><a href="#stud" data-toggle="tab"><i class="fa fa-user-o"></i>Register As Student</a></li>
							</ul>
							
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tutor">
									<form action="<?=site_url('/Register/add_user/0');?>#tutor" method="post" class="eduread-register-form ">
										<p class="lead">Registration</p>
										<div class="form-group">
											<input autocomplete="on" id="instname" name="instname" class="required form-control" placeholder="Full Name *" type="text" value="<?=set_value('instname');?>">
											<font style="color: #E74C3C;"><?=form_error('instname','<div class="error">','</div>');?></font>
										</div>
										<div class="form-group">
											<input autocomplete="on" id="instuname" name="instuname" class="required form-control" placeholder="User Name *" type="text">
											<font style="color: #E74C3C;"><?=form_error('instuname','<div class="error">','</div>');?></font>
										</div>						
										<div class="form-group"> 
											<input autocomplete="on" name="instemail" id="instemail" class="required form-control" placeholder="Email ID *" type="email">
											<font style="color: #E74C3C;"><?=form_error('instemail','<div class="error">','</div>');?></font>
										</div>
										<div class="form-group">
											<input class="required form-control" id="instpwd" name="instpwd" placeholder="Password *"  type="password">
											<font style="color: #E74C3C;"><?=form_error('instpwd','<div class="error">','</div>');?></font>
										</div>		
										<div class="form-group">
											<input class="required form-control" name="instcpwd" id="instcpwd" placeholder="Confirm Password *"  type="password">
											<font style="color: #E74C3C;"><?=form_error('instcpwd','<div class="error">','</div>');?></font>
										</div>		
										<div class="form-group">
											<input autocomplete="on" class="required form-control" id="instcno" name="instcno" placeholder="Contact Number *" type="text">
											<font style="color: #E74C3C;"><?=form_error('instcno','<div class="error">','</div>');?></font>
										</div>
										<div class="form-group">
											<input autocomplete="on" class="required form-control" id="instweb" name="instweb" placeholder="Website Link" type="text">
											<font style="color: #E74C3C;"><?=form_error('instweb','<div class="error">','</div>');?></font>
										</div>	
										<div class="form-group">
											<select class="form-control" id="inststate" name="inststate">
												<option value="0">SELECT STATE</option>

												<?php
												foreach ($sd as $key) 
												{
													?>
													<option value="<?=$key->StateId;?>"><?=$key->StateName;?></option>
													<?php
												}
												?>
											</select>
											<font style="color: #E74C3C;"><?=form_error('inststate','<div class="error">','</div>');?></font>
										</div>
										<div class="form-group">
											<select class="form-control" id="instcity" name="instcity">
												<option value="0">SELECT CITY</option>
											</select>
											<font style="color: #E74C3C;"><?=form_error('instcity','<div class="error">','</div>');?></font>
										</div>
										<script type="text/javascript">
						                    $(function(){
						                      $('#inststate').on('change',function(){
						                        $.ajax({
						                          url:'<?=site_url('/Register/get_city/');?>'+$(this).val(),
						                          success:function(result){
						                            $('#instcity').html(result);
						                          }
						                        });
						                      });
						                    });
						                </script>
										
										<!-- <textarea class="form-control" placeholder="About / Bio" name="bio" rows="3" style="resize: none;"></textarea> -->

										<div class="form-group register-btn">
										 	<button class="btn btn-primary col-md-12 btn-lg" style="background-color: #fec722;outline: none;border:none;">Register</button>
										</div>			
									</form>
								</div>
								<div class="tab-pane fade" id="stud">
									<form action="<?=site_url('/Register/add_user/1');?>#stud" method="post" class="eduread-register-form ">
										<p class="lead">Registration</p>
										<div class="form-group">
											<input autocomplete="on" id="inssname" name="inssname" class="required form-control" placeholder="Full Name *" type="text">
											<font style="color: #E74C3C;"><?=form_error('inssname','<div class="error">','</div>');?></font>
										</div>
										<div class="form-group">
											<input autocomplete="on" id="inssuname" name="inssuname" class="required form-control" placeholder="User Name *" type="text">
											<font style="color: #E74C3C;"><?=form_error('inssuname','<div class="error">','</div>');?></font>
										</div>						
										<div class="form-group"> 
											<input autocomplete="on" name="inssemail" id="inssemail" class="required form-control" placeholder="Email ID *" type="email">
											<font style="color: #E74C3C;"><?=form_error('inssemail','<div class="error">','</div>');?></font>
										</div>
										<div class="form-group">
											<input class="required form-control" id="insspwd" name="insspwd" placeholder="Password *"  type="password">
											<font style="color: #E74C3C;"><?=form_error('insspwd','<div class="error">','</div>');?></font>
										</div>		
										<div class="form-group">
											<input class="required form-control" name="insscpwd" id="insscpwd" placeholder="Confirm Password *"  type="password">
											<font style="color: #E74C3C;"><?=form_error('insscpwd','<div class="error">','</div>');?></font>
										</div>		
										<div class="form-group">
											<input autocomplete="on" class="required form-control" id="insscno" name="insscno" placeholder="Contact Number *" type="text">
											<font style="color: #E74C3C;"><?=form_error('insscno','<div class="error">','</div>');?></font>
										</div>	
										<div class="form-group">
											<select class="form-control" id="inssstate" name="inssstate">
												<option value="0">SELECT STATE</option>
												<?php
												foreach ($sd as $key) 
												{
													?>
													<option value="<?=$key->StateId;?>"><?=$key->StateName;?></option>
													<?php
												}
												?>
											</select>
											<font style="color: #E74C3C;"><?=form_error('inssstate','<div class="error">','</div>');?></font>
										</div>
										<div class="form-group">
											<select class="form-control" id="insscity" name="insscity">
												<option value="0">SELECT CITY</option>
											</select>
											<font style="color: #E74C3C;"><?=form_error('insscity','<div class="error">','</div>');?></font>
										</div>
						                <script type="text/javascript">
						                    $(function(){
						                      $('#inssstate').on('change',function(){
						                        $.ajax({
						                          url:'<?=site_url('/Register/get_city/');?>'+$(this).val(),
						                          success:function(result){
						                            $('#insscity').html(result);
						                          }
						                        });
						                      });
						                    });
						                </script>
										<!-- <textarea class="form-control" placeholder="About / Bio" name="bio" rows="3" style="resize: none;"></textarea> -->

										<div class="form-group register-btn">
											<button class="btn btn-primary col-md-12 btn-lg" style="background-color: #fec722;outline: none;border:none;">Register</button>
										</div>			
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ./ End Teachers Area section -->


<?php
$this->load->view('footer');
?>