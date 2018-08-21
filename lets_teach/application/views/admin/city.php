<?php
include('header.php');
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><b>Manage City</b></h3>
      </div>

      <div class="title_right">
        <div class="col-md-12 form-group">
          <div class="pull-right">
            <div class="input-group">
              <div class="tooltip22 title_left"><button type="button" class="btn" data-toggle="modal" data-target=".bs-example-addmodal"><i class="fa fa-plus-square" style="font-size: 25px"></i></button><span class="tooltiptext22">Add New City</span></div>
            </div>
          </div>
        </div>
      </div>

    <div class="modal fade bs-example-addmodal" id="addmodal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header bg-primary">
            <button type="button" class="text-default close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
            <h3 class="modal-title" id="myModalLabel">Add New City</h3>
          </div>
          <div class="modal-body">
            <div class="x_panel">

              <div class="x_content">

                <?php $var=isset($cd)?$cd:"";?>
                <?=form_open_multipart('admin/City/add_data/'.$var);?>

                <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="inscityname" placeholder="Insert City Name" value="<?=set_value('inscityname');?>">
                  <span class="fa fa-th form-control-feedback left" aria-hidden="true"></span>
                  <font style="color: #E74C3C;"><?=form_error('inscityname');?></font>
                </div>
                <br />
                <?php
                if(!isset($cd))
                {
                  ?>
                  <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                    <select class="form-control has-feedback-left" name="insstate">
                      <option value="0">SELECT STATE</option>
                      <?php
                      foreach ($my_st as $sd) 
                      {
                        ?>
                        <option value="<?=$sd->StateId;?>"><?=$sd->StateName;?></option>
                        <?php
                      }
                      ?>
                    </select>
                    <span class="fa fa-th-large form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <?php
                }
                ?>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Insert</button>
          </div>
          <?=form_close();?>
        </div>
      </div>
    </div>

    <div class="modal fade bs-example-upmodal" id="upmodal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header bg-primary">
            <button type="button" class="text-default close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
            <h3 class="modal-title" id="myModalLabel">Update City</h3>
          </div>
          <div class="modal-body">
            <div class="x_panel">
              <?php
              if(isset($upcd))
              {
                ?>
                <div class="x_content">
                  <br />

                  <?php $var=isset($cd)?$cd:"";?>
                  <?=form_open_multipart('admin/City/update_data/'.$upcd[0]->CityId."/".$var);?>
                  <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" name="upcityname" placeholder="Update City Name" value="<?=$upcd[0]->CityName;?>">
                    <span class="fa fa-th form-control-feedback left" aria-hidden="true"></span>
                    <font style="color: #E74C3C;"><?=form_error('upcityname');?></font>
                  </div>
                  <br />

                  <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                    <select class="form-control has-feedback-left" name="upstate">
                      <!-- <option value="0">SELECT CATEGORY</option> -->
                      <?php
                      foreach($st as $sd) 
                      {
                        ?>
                        <option value="<?=$sd->StateId;?>" 
                          <?php
                          if($upcd[0]->StateId==$sd->StateId)
                            echo "selected";
                          ?>>
                          <?=$sd->StateName;?></option>
                          <?php
                        }
                        ?>
                      </select>
                      <span class="fa fa-th-large form-control-feedback left" aria-hidden="true"></span>
                    </div>

                  </div>
                  <?php
                }
                ?>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update</button>
            </div>
            <?=form_close();?>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>City Table</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="scat_dt" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>City Name</th>
                    <th>State</th>
                    <th>Update</th>
                  </tr>
                </thead>
                <tbody>
                </tbody> 
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
$('#scat_dt').DataTable({
  sAjaxSource:'<?=site_url("/admin/City/get_data/");?><?=isset($cd)?$cd:"";?>',
  aoColumns:[
  {mData:'CityName'},
  {mData:'StateName'},
  {data:null,render:function(data,type,row){
    cd='<?=isset($cd)?$cd:"";?>';
    return '<div class="tooltip22 col-md-offset-4"><button type="button" class="btn col-md-offset-2" data-toggle="modal" data-target=".bs-example-upmodal"><a href="<?=site_url('/admin/City/get_update_data/');?>'+data.CityId+'/'+cd+'"><i class="fa fa-edit" style="font-size:25px; color:#0E6655"></i></a></button><span class="tooltiptext22">Update City</span></div>';   
  }}
  ]
});
});
</script>
<script type="text/javascript">
  $(function(){
    <?php
    $val1=form_error('inscityname');

    if($val1 != NULL)
    {
      ?>
      $('#addmodal').modal('show');
      <?php
    }
    $val2=form_error('upcityname');

    if($val2 != NULL)
    {
      ?>
      $('#upmodal').modal('show');
      <?php
    }
    ?>
  });
</script>

<script type="text/javascript">
  $(function(){
    <?php

    if(isset($upcd) && $upcd != NULL)
    {
      ?>
      $('#upmodal').modal('show');
      <?php
    }
    ?>
  });
  </script>
  <?php
  include('footer.php');
  ?>