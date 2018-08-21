<?php
$url=base_url('/resources/admin/assets/');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Let's Teach [Admin]</title>
  <link rel="shortcut icon" href="<?=base_url('/resources/common/icon/iconsg-graduation-cap-26.png');?>" type="image/x-icon">
  <!-- Bootstrap -->
  <link href="<?=$url;?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?=$url;?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?=$url;?>vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?=$url;?>vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?=$url;?>build/css/custom.min.css" rel="stylesheet">


</head>

<body class="login">
  <div><br /></div>
  <div><br /></div>
  <div class="col-md-12 col-md-offset-5">
      <h1><img src="<?=base_url('/resources/common/icon/iconsg-graduation-cap-52.png');?>">&nbspLet's Teach</h1>
    </div>
    <div><br /></div>
  <div>
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="post" action="<?=site_url('/admin/Login/do_login/');?>">
            <h1>Login</h1>
            <div>
              <input type="text" name="logemail" class="form-control" placeholder="Email or UserName" required="" value="<?=set_value('logemail');?>" />
            </div>
            <font style="color: #E74C3C;"><?=form_error('logemail');?></font>
            <div>
              <input type="password" name="logpwd" id="logpwd" class="form-control" placeholder="Password" required=""  />
              
            </div>
            <font style="color: #E74C3C;"><?=form_error('logpwd');?>
            <?php
              if(isset($error))
              {
                echo $error;
              }
            ?></font>
            <div class="clearfix"></div>

            <div class="separator">
              <div>
                <button class="btn btn-lg submit col-md-12" style="background-color:#D7DBDD;"><b>Log In</b></button>
              </div>            
              <div class="clearfix"></div>
              <br />
            </div>
            <div class="separator"></div>
          </form>
        </section>
      </div>


    </div>
  </div>
</body>
</html>
