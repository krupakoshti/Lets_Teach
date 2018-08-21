<?php
$url=base_url('/resources/admin/assets/');
$img=$this->ss->img;
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
  <!-- iCheck -->
  <link href="<?=$url;?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="<?=$url;?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?=$url;?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?=$url;?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?=$url;?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?=$url;?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url('/resources/common/custom/css/');?>tooltip.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="<?=$url;?>build/css/custom.min.css" rel="stylesheet">
  <script src="<?=$url;?>vendors/jquery/dist/jquery.min.js"></script>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">


          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div><br /></div>
          <div class="navbar nav_title site_title" style="padding-left:2rem;">
            <img src="<?=base_url('/resources/common/icon/iconsw-graduation-cap-50.png');?>"> <font style="font-size: 25px">Let's Teach</font>
          </div>
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?=base_url('/resources/common/images/');?><?=$img;?>" alt="..." class="img-circle profile_img" width="60px" height="60px">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?=$this->ss->aname;?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                 <?php
                  if($this->ss->level==0)
                  {
                ?>
                <li><a href="<?=site_url('admin/Admin');?>"><i class="fa fa-universal-access"></i> Manage Admin </a></li>
                <?php
                  }
                ?>
                <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?=site_url('admin/Tutor');?>">Manage Tutor</a></li>
                    <li><a href="<?=site_url('admin/Student');?>">Manage Student</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-th-large"></i> Category <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?=site_url('admin/Category');?>">Manage Category</a></li>
                    <li><a href="<?=site_url('admin/SubCat');?>">Manage Sub Category</a></li>
                  </ul>
                </li>
                <li><a href="<?=site_url('admin/Subject');?>"><i class="fa fa-book"></i> Manage Subject </a></li>
                <li><a href="<?=site_url('admin/Course');?>"><i class="fa fa-file"></i> Manage Course </a></li>
                <li><a href="<?=site_url('admin/Article');?>"><i class="fa fa-newspaper-o"></i> Manage Article </a></li>
                <li><a><i class="fa fa-map-marker"></i> State & City <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?=site_url('admin/State');?>">Manage State</a></li>
                    <li><a href="<?=site_url('admin/City');?>">Manage City</a></li>
                  </ul>
                </li>
                <li><a href="<?=site_url('admin/QuesAns');?>"><i class="fa fa-question-circle"></i>Manage Questions </a></li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6" style="padding-left: 0;padding-right: 0;">
                  <a data-toggle="tooltip" style="width: 100%;" data-placement="top" title="Profile" href="<?=site_url('/admin/Admin/get_update_data');?>">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
                </div>
                <div class="col-md-6" style="padding-left: 0;padding-right: 0;"> 
                  <a data-toggle="tooltip" style="width: 100%;" data-placement="top" title="Logout" href="<?=site_url('/admin/Logout/');?>">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                  </a>    
                </div>
              </div>
            </div>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?=base_url('/resources/common/images/');?><?=$img;?>" alt=""><?=$this->ss->aname;?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="<?=site_url('/admin/Admin/get_update_data');?>"><i class="fa fa-user pull-right" style="font-size: 20px"></i><div style="font-size: 15px">Profile</div></a></li>
                  <li><a href="<?=site_url('/admin/Logout/');?>"><i class="glyphicon glyphicon-off pull-right"></i><div style="font-size: 15px">Log Out</div></a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
