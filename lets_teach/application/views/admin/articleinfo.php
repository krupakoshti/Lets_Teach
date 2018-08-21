<?php
include('header.php');
?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Article Detail</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Article Information</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                <div class="card" style="box-shadow: 0 0 10px rgba(0,0,0,.2);padding: 10px;">
                  <div class="heding" style="border-bottom: 1px solid #9e9e9e;">
                    <p style="text-align: center"><h3><?=$adata[0]->ArticleTitle;?></h3></p>
                  </div>
                  <div class="profile_img" style="margin-top: 1rem;">
                    <div id="crop-avatar">
                      <!-- Current avatar -->
                      <img class="img-responsive avatar-view" src="<?=base_url('/resources/common/images/').$adata[0]->ArticleImage;?>" alt="Avatar" style="width:100%;">
                    </div>
                  </div>
                  <div><br /></div>
                  
                </div>
              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="card" style="box-shadow: 0 0 10px rgba(0,0,0,.2);padding: 10px;">
                  <div class="row">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="article" role="tab" data-toggle="tab" aria-expanded="true">Description</a>
                        </li>
                        <li role="presentation"><a href="#tab_content2" aria-controls="messages" id="" role="tab" data-toggle="tab">Likes</a></li>
                        <li role="presentation"><a href="#tab_content3" aria-controls="settings" id="" role="tab" data-toggle="tab">Comments</a></li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab" style="padding: 10px;margin-top: 10px;">
                          <ul class="messages">
                              <li>
                                <div class="col-md-12" style="margin-top: 2rem;">
                                <div class="message_wrapper col-md-11" style="text-align: justify">
                                  <p style="text-indent: 40px; font-size: 17px;"><?=$adata[0]->Description;?></p>
                                </div>
                              </div>
                              <br />
                              </li>
                          </ul>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="tab_content2">
                          <div class="row">
                            <div class="col-md-12">
                              <div>
                                <div class="x_title" style="margin: 10px;">
                                  <h2>Liked By</h2>
                                  <div class="clearfix"></div>
                                </div>
                                <?php
                                  foreach ($ldata as $l) 
                                  {
                                ?>
                                <div class="col-md-4 media event" style="">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="card" style="padding: 10px;box-shadow: 0 0 10px rgba(0,0,0,.2);margin: 1rem;border-radius: 10px;background-color: #eee;">
                                        <div class="row">
                                          <div class="col-md-5">
                                            <img src="<?=base_url('/resources/common/images/');?><?=$l->StudentImage;?>" width="100px" height="100px" style="border-radius: 100%;">
                                          </div>
                                          <div class="col-md-7">
                                            <h5><a class="title" href="#"><?=$l->StudentName;?></a></h5>
                                            <p><i class="fa fa-envelope"></i> <?=$l->EmailId;?></p>
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
                            foreach ($cdata as $c) 
                            {
                              ?>
                              <li>
                                <div class="col-md-12" style="margin: 2rem;">
                                  <div class="col-md-11">
                                    <h4 class="heading" style="text-align: justify"><?=$c->ArticleComment;?></h4>
                                    <div>
                                      <div class="col-md-1" style="line-height: 2rem;"><blockquote style="height: 50px"></blockquote></div>
                                      <div class="col-md-3" style="line-height: 2rem;">
                                        <img src="<?=base_url('/resources/common/images/');?><?=$c->StudentImage;?>" width="50px" height="50px" style="border-radius: 100%;">  <?=$c->StudentName;?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-1" id="review_toggle">
                                    <?php
                                    if($c->CommentStatus == "Active")
                                    {
                                      ?>
                                      <div class="tooltip22">
                                      <a href="<?=site_url('/admin/Article/comment_toggle_status/').$c->ArticleCommentId.'/'.$adata[0]->ArticleId?>#tab_content3"><i style="font-size:25px; color:green" class="fa fa-toggle-on col-md-offset-1"></i></a>
                                      <span class="tooltiptext22">Block Comment</span></div>
                                      <?php
                                    }
                                    else
                                    {
                                      ?>
                                      <div class="tooltip22">
                                      <a href="<?=site_url('/admin/Article/comment_toggle_status/').$c->ArticleCommentId.'/'.$adata[0]->ArticleId?>#tab_content3"><i style="font-size:25px; color:red" class="fa fa-toggle-off col-md-offset-1"></i></a>
                                      <span class="tooltiptext22">Active Comment</span></div>
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