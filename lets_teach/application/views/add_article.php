<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<title>Add Article - Let's Teach</title> 

<?php
	include('header.php');
?>

<body class="contact">

<?php
	include('menu.php');
?>

<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="intro-text ">
						<h1>Add Article</h1>
						<p><span><a href="<?=site_url('/Home');?>">Home </a><i class='fa fa-angle-right'></i></span> <span><a href="<?=site_url('/Article');?>">Article </a><i class='fa fa-angle-right'></i></span> <span>Add Article</span></p>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
</header>
	<!--  End header section-->

<section class="contact-area-02">
	<div class="container">
		<div class="row">
			
			<div class="col-sm-6  col-sm-offset-3 contact-form">
				<div class="row">
					<div class="col-sm-12 contact-title-btm">
						<h2>Add Article</h2>		
					</div>
				</div>
				<div class="input-contact-form">
					
					
					<div id="contact">
					<div id="message"></div>
					<?=form_open_multipart('/Article/add_article');?>	                       
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Article Title" name="institle" id="institle">
                                </div>
                                <font style="color: #E74C3C;"><?=form_error('institle','<div class="error">','</div>');?></font>
                            </div>
                            <div class="col-sm-12">
                            	<div class="form-group">
                                    <input class="form-control" type="file" name="insartimg" id="insartimg">
                                </div>
                                <font style="color: #E74C3C;"><?=form_error('insartimg','<div class="error">','</div>');?></font>
                            </div>	
                            <div class="col-sm-12">
                            	<div class="form-group">
                                    <textarea class="form-control" rows="6" placeholder="Description" name="insdesc" id="insdesc"></textarea>
                                </div>
                                <font style="color: #E74C3C;"><?=form_error('insdesc','<div class="error">','</div>');?></font>
                            </div>	
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <select class="form-control" id="inssub" name="inssub">
                                    	<option value="0">SELECT SUBJECT</option>
                                    	<?php
                                    		foreach ($sub as $key) 
                                    		{
                                    	?>
                                    	<option value="<?=$key->SubjectId;?>"><?=$key->SubjectName;?></option>
                                    	<?php
                                    		}
                                    	?>
                                    </select>
                                </div>
                                <font style="color: #E74C3C;"><?=form_error('inssub','<div class="error">','</div>');?></font>
                            </div>	
                            <div class="col-sm-12">                                    
                                <div class="full-width">
                                    <input value="Submit" type="submit" name="submit" id="submit">
                                </div>
                            </div>	
                        </div>
          				<?=form_close();?>
                    </div>
				</div>
			</div>																
		</div>
	</div>
</section>

<?php
	include('footer.php');
?>