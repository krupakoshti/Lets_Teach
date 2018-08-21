<?php
include('header.php');
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><b>Manage Category</b></h3>
      </div>

      <div class="title_right">
        <div class="col-md-12 form-group">
          <div class="pull-right">
            <div class="input-group">
              <div class="tooltip22 title_left"><button type="button" class="btn" data-toggle="modal" data-target=".bs-example-addmodal"><i class="fa fa-plus-square" style="font-size: 25px"></i></button><span class="tooltiptext22">Add New Category</span></div>
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
            <h3 class="modal-title" id="myModalLabel">Add New Category</h3>
          </div>
          <div class="modal-body">
            <div class="x_panel">

              <div class="x_content">
                <br />
                <?=form_open_multipart('admin/Category/add_data');?>
                <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="inscatname" placeholder="Insert Category Name" value="<?=set_value('inscatname');?>">
                  <span class="fa fa-th-large form-control-feedback left" aria-hidden="true"></span>
                  <font style="color: #E74C3C;"><?=form_error('inscatname');?></font>
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
            <h3 class="modal-title" id="myModalLabel">Update Category</h3>
          </div>
          <div class="modal-body">
            <div class="x_panel">
              <?php
              if(isset($upcd))
              {
                ?>
              <div class="x_content">
                <br />
                <?=form_open_multipart('admin/Category/update_data/'.$upcd[0]->CategoryId);?>
                <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="upcatname" placeholder="Update Category Name" value="<?=$upcd[0]->CategoryName;?>">
                  <span class="fa fa-th-large form-control-feedback left" aria-hidden="true"></span>
                  <font style="color: #E74C3C;"><?=form_error('upcatname');?></font>
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
            <h2>Category Table</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="cat_dt" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Added By Admin</th>
                  <th>Added Date/Time</th>
                  <th>Update</th>
                  <th>Status</th>
                  <th>Sub-Category</th>
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
    $('#cat_dt').DataTable({
      sAjaxSource:'<?=site_url("/admin/Category/get_data/");?>',
      aoColumns:[
      {mData:'CategoryName'},
      {mData:'AdminName'},
      {data:null,render:function(data,type,row){
        return '<div class="tooltip22">'+data.CatDate+'<span class="tooltiptext22">'+data.Date+'</span></div>'
      }},
      {data:null,render:function(data,type,row){
        return '<div class="tooltip22 title_left"><button type="button" class="btn col-md-offset-5" data-toggle="modal" data-target=".bs-example-upmodal"><a href="<?=site_url('/admin/Category/get_update_data/');?>'+data.CategoryId+'"><i class="fa fa-edit" style="font-size:25px; color:#0E6655"></i></a></button><span class="tooltiptext22">Update Category</span></div>';  
      }},
      {data:null,render:function(data,type,row){
        if(data.CategoryStatus == "Active")
        {
          var icon='<div class="tooltip22 title_left col-md-offset-3"><i style="font-size:25px; color:green" class="fa fa-toggle-on "></i><span class="tooltiptext22">Block Category</span></div>';
        }
        else
        {
          var icon='<div class="tooltip22 title_left col-md-offset-3"><i style="font-size:25px; color:red" class="fa fa-toggle-off"></i><span class="tooltiptext22">Active Category</span></div>';
        }

        return '<a href="#" class="toggle_status" id='+data.CategoryId+'>'+icon+'</a>';
      }},
      {data:null,render:function(data,type,row){
        return '<div class="tooltip22 col-md-offset-4"><a href="<?=site_url('admin/SubCat/');?>'+data.CategoryId+'" style="font-size:25px; color:#0E6655"><i class="fa fa-th"></i></a><span class="tooltiptext22">View More</span></div>';
      }}
      ]
    });
  });

  $(function(){
    $('#cat_dt').on('click','tbody .toggle_status',function(){
      $.ajax({
        url:'<?=site_url("/admin/Category/toggle_status/");?>'+$(this).attr("id"),
        success:function(result){
          $('#cat_dt').DataTable().ajax.reload();
        }
      });
    });
  });
</script>
<script type="text/javascript">
  $(function(){
    <?php
    $val1=form_error('inscatname');

    if($val1 != NULL)
    {
      ?>
      $('#addmodal').modal('show');
      <?php
    }
    $val2=form_error('upcatname');

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
      //echo validation_errors();
    }
    ?>
  });
</script>
<?php
include('footer.php');
?>