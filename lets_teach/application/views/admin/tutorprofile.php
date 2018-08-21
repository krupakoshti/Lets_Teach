<?php
  include('header.php');
  ?>

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tutor Profile</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Tutor Information</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-4 col-sm-3 col-xs-12 profile_left">
                <div class="card" style="box-shadow: 0 0 10px rgba(0,0,0,.2);padding: 2rem;">
                  <div class="profile_img">
                    <div id="crop-avatar">
                      <!-- Current avatar -->
                      <img class="img-responsive avatar-view" src="<?=base_url('/resources/common/images/').$tdata[0]->TutorImage;?>" alt="Avatar" style="width: 100%">
                    </div>
                  </div>
                  <div class="heading" style="border-bottom: 1px solid #9e9e9e;">
                    <h3><?=$tdata[0]->TutorName;?></h3>
                  </div>

                  <div style="margin-top: 2rem; font-size: 15">
                    <ul class="list-unstyled user_data">
                      <li>
                        <i class="fa fa-user user-profile-icon"></i> <?=$tdata[0]->UserName;?> 
                      </li>

                      <li>
                        <i class="fa fa-envelope user-profile-icon"></i> <?=$tdata[0]->EmailId;?> 
                      </li>

                      <li>
                        <i class="fa fa-phone user-profile-icon"></i> <?=$tdata[0]->ContactNo;?>
                      </li>

                      <li class="m-top-xs">
                        <i class="fa fa-external-link user-profile-icon"></i>
                        <?php
                          if($tdata[0]->WebsiteLink =="")
                          {
                            ?>
                            <font> Not Found</font>
                            <?php
                          }
                        ?>
                        <a href="http://<?=$tdata[0]->WebsiteLink;?>" target="_blank"> <?=$tdata[0]->WebsiteLink;?></a>
                      </li>

                      <li class="m-top-xs">
                        <i class="fa fa-facebook user-profile-icon"></i>
                        <?php
                          if($tdata[0]->FacebookLink =="")
                          {
                            ?>
                            <font> Not Found</font>
                            <?php
                          }
                        ?>
                        <a href="http://<?=$tdata[0]->FacebookLink;?>" target="_blank"> <?=$tdata[0]->FacebookLink;?></a>
                      </li>

                      <li class="m-top-xs">
                        <i class="fa fa-twitter user-profile-icon"></i>
                        <?php
                          if($tdata[0]->TwitterLink =="")
                          {
                            ?>
                            <font> Not Found</font>
                            <?php
                          }
                        ?>
                        <a href="http://<?=$tdata[0]->TwitterLink;?>" target="_blank"> <?=$tdata[0]->TwitterLink;?></a>
                      </li>

                      <li class="m-top-xs">
                        <i class="fa fa-google-plus user-profile-icon"></i>
                        <?php
                          if($tdata[0]->GoogleplusLink =="")
                          {
                            ?>
                            <font> Not Found</font>
                            <?php
                          }
                        ?>
                        <a href="http://<?=$tdata[0]->GoogleplusLink;?>" target="_blank"> <?=$tdata[0]->GoogleplusLink;?></a>
                      </li>

                      <li class="m-top-xs">
                        <i class="fa fa-linkedin user-profile-icon"></i>
                        <?php
                          if($tdata[0]->LinkedinLink =="")
                          {
                            ?>
                            <font> Not Found</font>
                            <?php
                          }
                        ?>
                        <a href="http://<?=$tdata[0]->LinkedinLink;?>" target="_blank"> <?=$tdata[0]->LinkedinLink;?></a>
                      </li>

                      <li class="m-top-xs">
                        <i class="fa fa-map-marker user-profile-icon"></i> <?=$tdata[0]->CityName;?>,<?=$tdata[0]->StateName;?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-8 col-sm-9 col-xs-12">

                <div class="" role="tabpanel" data-example-id="togglable-tabs" style="box-shadow:0 0 10px rgba(0,0,0,.2);">
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="article" role="tab" data-toggle="tab" aria-expanded="true">Tutor Articles</a>
                        </li>
                        <li role="presentation"><a href="#tab_content2" aria-controls="messages" role="tab" data-toggle="tab">Tutor Courses</a></li>
                        <li role="presentation"><a href="#tab_content3" aria-controls="settings" role="tab" data-toggle="tab">Followers</a></li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <!-- start recent activity -->
                          <ul class="messages">
                            <?php
                            foreach ($adata as $a) 
                            {
                              ?>
                              <li>
                                <div class="col-md-12" style="margin-top: 2rem;">
                                  <img src="<?=base_url('/resources/common/images/'.$a->ArticleImage);?>" class="avatar" alt="Avatar">
                                  <div class="message_date">
                                    <div class="tooltip22"><?=get_time_ago(strtotime($a->ArticleCreatedDate));?>
                                      <span class="tooltiptext22"><?php echo date('d', strtotime(str_replace('-','/', $a->ArticleCreatedDate)))," ",date('M', strtotime(str_replace('-','/', $a->ArticleCreatedDate)))," ",date('Y', strtotime(str_replace('-','/', $a->ArticleCreatedDate)));?></span>
                                    </div>    
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading"><a href="<?=site_url('/admin/Article/'.$a->ArticleId);?>"><?=$a->ArticleTitle;?></a></h4>
                                    <blockquote class="message" style="text-align: justify"><?=$a->Description;?></blockquote>
                                    <p class="url">
                                      <div class="col-md-3" style="line-height: 2rem;">
                                        <div class="tooltip22" data-placement="bottom"><i class="fa fa-thumbs-up"></i> <?=$a->totallike;?>
                                          <span class="tooltiptext22">
                                            <?php
                                            foreach ($ldata as $like) 
                                            {
                                              if($like->ArticleId==$a->ArticleId)
                                              {
                                                  echo $like->StudentName;
                                                  echo "<br />";
                                              }
                                            }
                                            ?>
                                          </span>
                                        </div>  
                                      </div>  
                                      <div class="col-md-3" style="line-height: 2rem;">
                                        <i class="fa fa-comment"></i> <?=$a->totalcomment;?>
                                      </div>
                                      <div class="col-md-3" style="line-height: 2rem;">
                                        <i class="fa fa-eye"></i> <?=$a->ArticleViews;?>
                                      </div>
                                    </p>
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
                            <div class="col-md-12" style="margin-top:10px; ">
                              <table class="table table-striped">
                                <thead>
                                  <th>Course ID</th>
                                  <th>Course Title</th>
                                  <th>Description</th>
                                  <th>Created Date</th>
                                  <th>View More</th>
                                </thead>
                                <tbody>
                                  <?php
                                  foreach ($cdata as $c) 
                                  {
                                    ?>
                                    <tr>
                                      <td><?=$c->CourseId;?></td>
                                      <td><?=$c->CourseTitle;?></td>
                                      <td><?=substr($c->Description,0,75);?>....</td>
                                      <td>
                                        <div class="tooltip22"><?=get_time_ago(strtotime($a->ArticleCreatedDate));?>
                                          <span class="tooltiptext22"><?php echo date('d', strtotime(str_replace('-','/', $a->ArticleCreatedDate)))," ",date('M', strtotime(str_replace('-','/', $a->ArticleCreatedDate)))," ",date('Y', strtotime(str_replace('-','/', $a->ArticleCreatedDate)));?></span>
                                        </div>
                                      </td>
                                      <td><div class="tooltip22 col-md-offset-3"><a href="<?=site_url('admin/Course/get_course/');?><?=$c->CourseId;?>" style="font-size:25px; color:#0E6655"><i class="fa fa-ellipsis-h"></i></a><span class="tooltiptext22 bottom">View More</span>
                                      </div>
                                    </td>
                                  </tr>
                                  <?php
                                  }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="tab_content3">
                          <div class="row">
                            <div class="col-md-12">
                              <div>
                                <div class="x_title" style="margin: 10px;">
                                  <h2>Followers</h2>
                                  <div class="clearfix"></div>
                                </div>
                                <?php
                                foreach ($sdata as $s) 
                                {
                                  ?>
                                  <div class="col-md-4 media event">
                                    <div class="row">
                                      <div class="card" style="padding: 10px;box-shadow: 0 0 10px rgba(0,0,0,.2);margin: 1rem;border-radius: 10px;background-color: #eee;">
                                        <div class="row">
                                          <div class="col-md-5">
                                            <img src="<?=base_url('/resources/common/images/');?><?=$s->StudentImage;?>" width="100px" height="100px" style="border-radius: 100%;">
                                          </div>
                                          <div class="col-md-7">
                                            <h5><a class="title" href="#"><?=$s->StudentName;?></a></h5>
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
