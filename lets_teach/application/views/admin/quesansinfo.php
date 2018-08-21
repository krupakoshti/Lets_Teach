<?php
include('header.php');
?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Question Detail</h3>
      </div>


    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="col-md-9">
            <div class="card" style="box-shadow: 0 0 10px rgba(0,0,0,.2);padding: 1rem;">
              <div class="row">
                <div class="col-md-12">
                  <div class="x_title">
                    <h3>Question</h3>

                    <div class="clearfix"></div>
                  </div>
                  <h2><?=$qdata[0]->Question;?>?</h2>
                  <div class="col-md-12">
                    <div>
                      <div class="x_title">
                        <h3>Answers</h3>
                        <div class="clearfix"></div>
                      </div>
                      <!-- end of user messages -->
                      <ul class="messages">
                        <?php
                        foreach ($adata as $a) 
                        {
                          ?>
                          <li>
                            <div class="col-md-12" style="margin: 2rem;">
                              <div class="col-md-11">
                                <h4 class="heading" style="text-align: justify"><?=$a->Answer;?></h4>
                                <div>
                                  <div class="col-md-1" style="line-height: 2rem;"><blockquote style="height: 50px"></blockquote></div>
                                  <div class="col-md-3" style="line-height: 2rem;">
                                    <img src="<?=base_url('/resources/common/images/');?><?=$a->TutorImage;?>" width="50px" height="50px" style="border-radius: 100%;">  <?=$a->TutorName;?>
                                  </div>
                                  <div class="col-md-3 pull-right" style="margin: 1.5rem;">
                                    <div class="message_date">
                                      <div class="tooltip22"><?=get_time_ago(strtotime($a->AnsCreatedDate));?>
                                        <span class="tooltiptext22"><?php echo date('d', strtotime(str_replace('-','/', $a->AnsCreatedDate)))," ",date('M', strtotime(str_replace('-','/', $a->AnsCreatedDate)))," ",date('Y', strtotime(str_replace('-','/', $a->AnsCreatedDate)));?></span>
                                      </div> 
                                    </div>
                                  </div>
                                </div>
                              </div> 
                              <div class="col-md-1" id="review_toggle">
                                <?php
                                if($a->AnsStatus == "Active")
                                {
                                  ?>
                                  <div class="tooltip22">
                                  <a href="<?=site_url('/admin/QuesAns/ans_toggle_status/').$a->AnsId.'/'.$qdata[0]->QuesId?>"><i style="font-size:25px; color:green" class="fa fa-toggle-on col-md-offset-1"></i></a>
                                  <span class="tooltiptext22">Block Answer</span></div>
                                  <?php
                                }
                                else
                                {
                                  ?>
                                  <div class="tooltip22">
                                  <a href="<?=site_url('/admin/QuesAns/ans_toggle_status/').$a->AnsId.'/'.$qdata[0]->QuesId?>"><i style="font-size:25px; color:red" class="fa fa-toggle-off col-md-offset-1"></i></a>
                                  <span class="tooltiptext22">Active Answer</span></div>
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
                      <!-- end of user messages -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="col-md-3 col-sm-3 col-xs-12" style="box-shadow: 0 0 10px rgba(0,0,0,.2);">
            <div class="x_title">
              <h3>Student Information</h3>
              <div class="clearfix"></div>
            </div>
            <div class="panel-body">
              <img class="img-responsive avatar-view" src="<?=base_url('/resources/common/images/').$qdata[0]->StudentImage;?>" alt="Avatar" style="width: 100%; height:300px">
              <h3><?=$qdata[0]->StudentName;?></h3>
              <p><i class="fa fa-user"> <?=$qdata[0]->UserName;?></i></p>
              <p><i class="fa fa-envelope"></i> <?=$qdata[0]->EmailId;?></p>
              <p><i class="fa fa-phone"></i> <?=$qdata[0]->ContactNo;?></p>
            </div>
          </div>
          <div class="col-md-9">
            
          </div>
         
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('footer.php');
?>        