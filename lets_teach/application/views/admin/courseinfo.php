<?php
include('header.php');
?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Course Detail</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Course Information</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="card" style="box-shadow: 0 0 10px rgba(0,0,0,.2);padding: 2rem;">
                <div class="heading" style="border-bottom: 1px solid #9e9e9e;">
                  <p style="text-align: center"><h3><?=$cdata[0]->CourseTitle;?></h3></p>
                </div>
                <div class="profile_img" style="margin-top:1rem; ">
                  <div id="crop-avatar">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view" src="<?=base_url('/resources/common/images/').$cdata[0]->Thumbnail;?>" alt="Avatar" style="width: 100%;">
                  </div>
                </div>
                <div><br /></div>
                <div class="col-md-12" style="margin-bottom: 2rem;margin-top: 1rem; margin-left: 6rem; font-size: 15px;">
                  <?php
                  if(count($rdata)>0)
                  {
                    $rate=floor($rdata[0]->totalrating[0]->Rating * 10) / 10;
                    $int=intval($rdata[0]->totalrating[0]->Rating);
                    $frac=$rdata[0]->totalrating[0]->Rating-$int;
                    $star=0;
                    while($star!=$int)
                    {
                  ?>
                  <i class="fa fa-star" style="color: #F1C40F"></i>
                  <?php 
                      $star++;  
                    }

                    if($frac>0.1)
                    {
                  ?>
                  <i class="fa fa-star-half" style="color: #F1C40F"></i>
                  <?php
                      }
                      echo $rate;
                    }
                  ?>
                </div>
                <div><br /></div>
                <div class="col-md-12" style="margin-bottom: 2rem;margin-left: 3rem; font-size: 15px;">
                  Subject: <?=$cdata[0]->SubjectName;?>
                </div>
                <div class="row">
                  <div class="col-md-12" id="desc" >
                    <p style="text-align: justify; text-indent: 30px; font-size: 15px;"><?=$cdata[0]->Description;?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

              <div class="row" role="tabpanel" data-example-id="togglable-tabs" style="box-shadow:0 0 10px rgba(0,0,0,.2);">
                <ul class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="article" role="tab" data-toggle="tab" aria-expanded="true">Course Videos</a>
                  </li>
                  <li role="presentation"><a href="#tab_content2" aria-controls="messages" role="tab" data-toggle="tab">Enrollments</a></li>
                  <li role="presentation"><a href="#tab_content3" aria-controls="settings" id="review" role="tab" data-toggle="tab">Review</a></li>
                  <li role="presentation"><a href="#tab_content4" aria-controls="settings" id="ques" role="tab" data-toggle="tab">Questions</a></li>
                </ul>

                <!-- Tab panes -->
                  <div class="tab-content">
                      <div div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <!-- start recent activity -->
                        <ul class="messages">
                          <?php
                          foreach ($vdata as $v) 
                          {
                            ?>
                            <li>
                              <div class="col-md-12" style="margin: 2rem;">
                                <div class="col-md-5">
                                  <video width="320" height="240" controls>
                                    <source src="<?=base_url('/resources/common/videos/');?><?=$v->VideoURL;?>" type="video/mp4">
                                    </video>
                                  </div>
                                  <div class="col-md-6">
                                    <h4 class="heading"><?=$v->VideoName;?></h4>
                                    <blockquote class="message" style="text-align: justify;"><?=$v->VideoDescription;?></blockquote>
                                  </div>
                                  <div class="col-md-1" id="video_toggle">
                                    <?php
                                    if($v->VideoStatus == "Active")
                                    {
                                      ?>
                                      <div class="tooltip22">
                                      <a href="<?=site_url('/admin/Course/video_toggle_status/').$v->CourseVideoId.'/'.$cdata[0]->CourseId?>"><i style="font-size:25px; color:green" class="fa fa-toggle-on col-md-offset-1"></i></a>
                                      <span class="tooltiptext22">Block Video</span></div>
                                      <?php
                                    }
                                    else
                                    {
                                      ?>
                                      <div class="tooltip22">
                                      <a href="<?=site_url('/admin/Course/video_toggle_status/').$v->CourseVideoId.'/'.$cdata[0]->CourseId?>"><i style="font-size:25px; color:red" class="fa fa-toggle-off col-md-offset-1"></i></a>
                                      <span class="tooltiptext22">Active Video</span></div>
                                      <?php
                                    }
                                    ?>
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
                                <h2>Enrollments</h2>
                                <div class="clearfix"></div>
                              </div>
                              <?php
                              foreach ($edata as $e) 
                              {
                                ?>
                                <div class="col-md-4 media event">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="card" style="padding: 10px;box-shadow: 0 0 10px rgba(0,0,0,.2);margin: 1rem;border-radius: 10px;background-color: #eee;">
                                        <div class="row">
                                          <div class="col-md-5">
                                            <img src="<?=base_url('/resources/common/images/');?><?=$e->StudentImage;?>" width="100px" height="100px" style="border-radius: 100%;">
                                          </div>
                                          <div class="col-md-7">
                                            <h5><a class="title" href="#"><?=$e->StudentName;?></a></h5>
                                            <p><i class="fa fa-envelope"></i> <?=$e->EmailId;?></p>
                                          </div>
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

                      <div role="tabpanel" class="tab-pane" id="tab_content3">
                        <ul class="messages">
                          <?php
                          foreach ($rdata as $r) 
                          {
                            ?>
                            <li>
                              <div class="col-md-12" style="margin: 2rem;">
                                <div class="col-md-11">
                                  <h4 class="heading" style="text-align: justify"><?=$r->Review;?></h4>
                                  <div>
                                    <div class="col-md-1" style="line-height: 2rem;"><blockquote style="height: 50px"></blockquote></div>
                                    <div class="col-md-3" style="line-height: 2rem;">
                                      <img src="<?=base_url('/resources/common/images/');?><?=$r->StudentImage;?>" width="50px" height="50px" style="border-radius: 100%;">  <?=$r->StudentName;?>
                                    </div>
                                    <div class="col-md-3" style="margin: 1.5rem ;line-height: 2rem;">
                                      <i class="fa fa-star" style="font-size:20px; color: #F1C40F"></i> <?=$r->Rating;?>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-1" id="review_toggle">
                                  <?php
                                  if($r->ReviewStatus == "Active")
                                  {
                                    ?>
                                    <div class="tooltip22">
                                    <a href="<?=site_url('/admin/Course/review_toggle_status/').$r->CourseReviewId.'/'.$cdata[0]->CourseId?>#tab_content3"><i style="font-size:25px; color:green" class="fa fa-toggle-on col-md-offset-1"></i></a>
                                    <span class="tooltiptext22">Block Review</span></div>
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                    <div class="tooltip22">
                                    <a href="<?=site_url('/admin/Course/review_toggle_status/').$r->CourseReviewId.'/'.$cdata[0]->CourseId?>#tab_content3"><i style="font-size:25px; color:red" class="fa fa-toggle-off col-md-offset-1"></i></a>
                                    <span class="tooltiptext22">Active Review</span></div>
                                    <?php
                                  }
                                  ?>
                                </div>
                              </div>
                              <br />
                            </li>
                            <?php
                          }
                          ?>
                        </ul>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="tab_content4">
                        <ul class="messages">
                          <?php
                          foreach ($qdata as $q) 
                          {
                            ?>
                            <li>
                              <div class="col-md-12" style="margin: 2rem;">
                                <div class="col-md-11">
                                <div class="message_date">
                                  <div class="tooltip22"><?=get_time_ago(strtotime($q->QuesCreatedDate));?>
                                    <span class="tooltiptext22"><?php echo date('d', strtotime(str_replace('-','/', $q->QuesCreatedDate)))," ",date('M', strtotime(str_replace('-','/', $q->QuesCreatedDate)))," ",date('Y', strtotime(str_replace('-','/', $q->QuesCreatedDate)));?></span>
                                  </div>    
                                </div>
                                  <h3 class="heading" style="text-align: justify"><?=$q->Question;?> ?</h3>
                                  <div>
                                    <div style="line-height: 2rem;text-align: justify;font-size: 17px">
                                      <blockquote><?=$q->Answer;?></blockquote>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-1" id="review_toggle">
                                  <?php
                                  if($q->QuesStatus == "Active")
                                  {
                                    ?>
                                    <div class="tooltip22">
                                    <a href="<?=site_url('/admin/Course/ques_toggle_status/').$q->CourseQuesId.'/'.$cdata[0]->CourseId?>#tab_content4"><i style="font-size:25px; color:green" class="fa fa-toggle-on col-md-offset-1"></i></a>
                                    <span class="tooltiptext22">Block Question</span></div>
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                    <div class="tooltip22">
                                    <a href="<?=site_url('/admin/Course/ques_toggle_status/').$q->CourseQuesId.'/'.$cdata[0]->CourseId?>#tab_content4"><i style="font-size:25px; color:red" class="fa fa-toggle-off col-md-offset-1"></i></a>
                                    <span class="tooltiptext22">Active Question</span></div>
                                    <?php
                                  }
                                  ?>
                                </div>
                              </div>
                              <br />
                            </li>
                            <?php
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
      </div>
    </div>
  </div>

<script type="text/javascript">
  $(function(){
    var tab='';
    tab=location.hash;
    if(tab!=''){
      $('[href="'+tab+'"]').trigger('click');      
    }
  });
</script>

<?php
include('footer.php');
?>