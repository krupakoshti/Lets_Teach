<?php
include('header.php');
?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Update Profile</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="">
      <div class="clearfix"></div>

      <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2> Edit Profile </h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="col-xs-3">
              <!-- required for floating -->
              <!-- Nav tabs -->
              <ul class="nav nav-tabs tabs-left">
                <li class="active"><a href="#info" data-toggle="tab">Basic Information</a>
                </li>
                <li><a href="#pwd" data-toggle="tab">Password</a>
                </li>
                <li><a href="#pro_pic" data-toggle="tab">Profile Picture</a>
                </li>
              </ul>
            </div>

            <div class="col-xs-9">
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="info">
                  <p class="lead">Update Basic Information</p>
                  <form method="post" action="<?=site_url('/admin/Admin/update_info/'.$upad[0]->AdminId);?>">
                    <div class="col-md-10 form-group">
                      <input type="text" class="form-control has-feedback-left" name="upadname" placeholder="Update Admin Name" value="<?=$upad[0]->AdminName;?>">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      <font style="color: #E74C3C;"><?=form_error('upadname');?></font>
                    </div>
                    <br />

                    <div class="col-md-10 form-group">
                      <input type="text" class="form-control has-feedback-left" name="upaduname" placeholder="Update Admin User Name" value="<?=$upad[0]->UserName;?>">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      <font style="color: #E74C3C;"><?=form_error('upaduname');?></font>
                    </div>
                    <br />
                    <div class="col-md-10 form-group">
                      <input type="text" class="form-control has-feedback-left" name="upademail" placeholder="Update Admin Email ID" value="<?=$upad[0]->EmailId;?>">
                      <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      <font style="color: #E74C3C;"><?=form_error('upademail');?></font>
                    </div>
                    <br />
                    <div class="col-md-10 form-group">
                      <input type="text" class="form-control has-feedback-left" name="upadcno" placeholder="Update Admin Contact Number" value="<?=$upad[0]->ContactNo;?>">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      <font style="color: #E74C3C;"><?=form_error('upadcno');?></font>
                    </div>
                    <br />
                    <div><br /></div>
                    <button type="submit" class="btn btn-success col-md-2 col-md-offset-1">UPDATE</button>
                  </form>
                </div>
                <div class="tab-pane" id="pwd">
                  <p class="lead">Update Password</p>
                  <form method="post" action="<?=site_url('/admin/Admin/update_pwd/'.$upad[0]->AdminId);?>#pwd">
                    <div class="col-md-12 form-group">
                      <big>Old Password</big>
                    </div>
                    <div class="col-md-10 col-md-offset-1 form-group has-feedback">
                      <input type="password" class="form-control has-feedback-left" id="upadopwd" name="upadopwd" placeholder="Enter Old Password" value="<?=set_value('upadopwd');?>">
                      <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                      <font style="color: #E74C3C;"><?php
                        if(isset($error))
                        {
                          echo $error;
                        }
                      ?></font>
                    </div>
                    <br />
                    <div class="col-md-12 form-group">
                      <big>New Password</big>
                    </div>
                    <div class="col-md-10 col-md-offset-1 form-group has-feedback">
                      <input type="password" class="form-control has-feedback-left" name="upadnpwd" placeholder="Enter New Password">
                      <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                      <font style="color: #E74C3C;"><?=form_error('upadnpwd');?></font>
                    </div>
                    <br />
                    <div class="col-md-10 col-md-offset-1 form-group has-feedback">
                      <input type="password" class="form-control has-feedback-left" name="upadncpwd" placeholder="Confirm Password">
                      <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                      <font style="color: #E74C3C;"><?=form_error('upadncpwd');?></font>
                    </div>
                    <br />
                    <div><br /></div>
                    <button type="submit" class="btn btn-success col-md-2 col-md-offset-1">UPDATE</button>
                  </form>
                </div>
                <div class="tab-pane" id="pro_pic">
                  <p class="lead">Update Profile Pic</p>
                  <?=form_open_multipart('admin/Admin/update_propic/'.$upad[0]->AdminId)?>
                  <div class="col-md-8 form-group has-feedback">
                    <input type="file" class="form-control has-feedback-left" id="upadimg" name="upadimg">
                    <span class="fa fa-file-picture-o form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <br />
                  <div class="col-md-12 form-group has-feedback">
                    <img src="<?=base_url('/resources/common/images/')?><?=$upad[0]->AdminImage;?>" height="300px" style="border-radius: 10%;" class="col-md-5" id="adimg">
                  </div>
                  <br />
                  <div><br /></div>
                  <button type="submit" class="btn btn-success col-md-2 col-md-offset-1">UPDATE</button>
                  <?=form_close();?>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

          </div>
        </div>
      </div>
      <div class="clearfix"></div>

    </div>
    <div class="clearfix"></div>

    <div class="">
    </div>
  </div>
  <div class="clearfix"></div>
</div>

<script type="text/javascript">
  $(function(){
    $('#upadimg').on('change',function(e){
      var imgsrc=URL.createObjectURL(e.target.files[0]);
      $('#adimg').attr('src',imgsrc);
      /*var upimg=('#img');
      upimg.src=URL.createObjectURL(event.target.files[0]);*/
    });
  });
</script>

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
