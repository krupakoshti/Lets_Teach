<?php
include('header.php');
?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Student Profile</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Student Information</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="card" style="box-shadow: 0 0 10px rgba(0,0,0,.2);padding: 2rem;">
                <div class="profile_img" style="margin-top:1rem; ">
                  <div id="crop-avatar">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view" src="<?=base_url('/resources/common/images/').$sdata[0]->StudentImage;?>" alt="Avatar" style="width: 100%">
                  </div>
                </div>
                <div class="heading" style="border-bottom: 1px solid #9e9e9e;">
                  <h3><?=$sdata[0]->StudentName;?></h3>
                </div>
                <div style="margin-top: 2rem; font-size: 15">
                  <ul class="list-unstyled user_data">
                    <li>
                      <i class="fa fa-user user-profile-icon"></i> <?=$sdata[0]->UserName;?> 
                    </li>
                    <li>
                      <i class="fa fa-envelope user-profile-icon"></i> <?=$sdata[0]->EmailId;?> 
                    </li>

                    <li>
                      <i class="fa fa-phone user-profile-icon"></i> <?=$sdata[0]->ContactNo;?>
                    </li>

                    <li class="m-top-xs">
                      <i class="fa fa-map-marker user-profile-icon"></i> <?=$sdata[0]->CityName;?>,<?=$sdata[0]->StateName;?>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

              <div class="" role="tabpanel" data-example-id="togglable-tabs" style="box-shadow:0 0 10px rgba(0,0,0,.2);">
                <div class="row">
                  <div class="col-md-12">
                    <ul class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1" id="article" role="tab" data-toggle="tab" aria-expanded="true">Enrollment</a>
                      </li>
                      <li role="presentation"><a href="#tab_content2" aria-controls="settings" role="tab" data-toggle="tab">Following</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <!-- start recent activity -->
                        <ul class="messages">
                          <?php
                          foreach ($edata as $a) 
                          {
                            ?>
                            <li>
                              <div class="col-md-12" style="margin-top: 5rem;">
                                <img src="<?=base_url('/resources/common/images/'.$a->Thumbnail);?>" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <div class="tooltip22" style="margin-right: 2rem;"><?=get_time_ago(strtotime($a->CreatedDate));?>
                                    <span class="tooltiptext22"><?php echo date('d', strtotime(str_replace('-','/', $a->CreatedDate)))," ",date('M', strtotime(str_replace('-','/', $a->CreatedDate)))," ",date('Y', strtotime(str_replace('-','/', $a->CreatedDate)));?></span>
                                  </div>    
                                </div>
                                <div class="message_wrapper">
                                  <h4 class="heading"><a href="<?=site_url('/admin/Student/'.$a->CourseId);?>"><?=$a->CourseTitle;?></a></h4>
                                  <blockquote class="message"><?=$a->Description;?></blockquote>
                                </div>
                              </div>
                              <br />
                            </li>
                            <?php
                          }
                          ?>
                        </ul>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="tab_content2">
                        <div class="row">
                          <div class="col-md-12">
                            <div>
                              <div class="x_title" style="margin: 10px;">
                                <h2>Following</h2>
                                <div class="clearfix"></div>
                              </div>
                              <?php
                              foreach ($fdata as $s) 
                              {
                                ?>
                                <div class="col-md-4 media event">
                                  <div class="row">
                                  <div class="card" style="padding: 10px;box-shadow: 0 0 10px rgba(0,0,0,.2);margin: 1rem;border-radius: 10px;background-color: #eee;">
                                    <div class="row">
                                      <div class="col-md-5">
                                        <img src="<?=base_url('/resources/common/images/');?><?=$s->TutorImage;?>" width="100px" height="100px" style="border-radius: 100%;">
                                      </div>
                                      <div class="col-md-7">
                                        <h5><a class="title" href="#"><?=$s->TutorName;?></a></h5>
                                        <p><i class="fa fa-envelope"></i> <?=$s->EmailId;?></p>
                                      </div>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('footer.php');
?>
