<?php
include('header.php');
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><b>Manage State</b></h3>
      </div>

      <div class="title_right">
        <div class="col-md-12 form-group">
          <div class="pull-right">
            <div class="input-group">
              <div class="tooltip22 title_left"><button type="button" class="btn" data-toggle="modal" data-target=".bs-example-addmodal"><i class="fa fa-plus-square" style="font-size: 25px"></i></button><span class="tooltiptext22">Add New State</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bs-example-addmodal" id="addmodal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header bg-primary">
            <button type="button" class="text-default close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
            <h3 class="modal-title" id="myModalLabel">Add New State</h3>
          </div>
          <div class="modal-body">
            <div class="x_panel">

              <div class="x_content">
                <br />
                <?=form_open_multipart('admin/State/add_data');?>
                <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="insstname" placeholder="Insert State Name" value="<?=set_value('insstname');?>">
                  <span class="fa fa-th-large form-control-feedback left" aria-hidden="true"></span>
                  <font style="color: #E74C3C;"><?=form_error('insstname');?></font>
                </div>
                <br />
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
            <h3 class="modal-title" id="myModalLabel">Update State</h3>
          </div>
          <div class="modal-body">
            <div class="x_panel">
              <?php
                if(isset($upsd))
                {
                ?>
              <div class="x_content">
                <br />
                <?=form_open_multipart('admin/State/update_data/'.$upsd[0]->StateId);?>
                <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="upstname" placeholder="Update State Name" value="<?=$upsd[0]->StateName;?>">
                  <span class="fa fa-th-large form-control-feedback left" aria-hidden="true"></span>
                  <font style="color: #E74C3C;"><?=form_error('upstname');?></font>
                </div>
                <br />
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
            <h2>State Table</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="st_dt" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>State Name</th>
                  <th>Update</th>
                  <th>City</th>
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
<!-- /page content -->

<script type="text/javascript">
  $(function(){
    $('#st_dt').DataTable({
      sAjaxSource:'<?=site_url("/admin/State/get_data/");?>',
      aoColumns:[
      {mData:'StateName'},
      {data:null,render:function(data,type,row){
        return '<div class="tooltip22 title_left col-md-offset-5"><button type="button" class="btn" data-toggle="modal" data-target=".bs-example-upmodal"><a href="<?=site_url('/admin/State/get_update_data/');?>'+data.StateId+'"><i class="fa fa-edit" style="font-size:25px; color:#0E6655"></i></a></button><span class="tooltiptext22">Update State</span></div>';
      }},
      {data:null,render:function(data,tyoe,row){
        return '<div class="tooltip22 col-md-offset-4"><a href="<?=site_url('admin/City/');?>'+data.StateId+'" class="col-md-offset-5" style="font-size:25px; color:#0E6655"><i class="fa fa-th"></i></a><span class="tooltiptext22">View More</span></div>';
      }}
      ]
    });
  });
</script>
<script type="text/javascript">
  $(function(){
    <?php
    $val1=form_error('insstname');

    if($val1 != NULL)
    {
      ?>
      $('#addmodal').modal('show');
      <?php
    }
    $val2=form_error('upstname');

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

    if(isset($upsd) && $upsd != NULL)
    {
      ?>
      $('#upmodal').modal('show');
      <?php
      //echo validation_errors();
    }
    ?>
  });
</script>
<?php
include('footer.php');
?>