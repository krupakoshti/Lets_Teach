<?php
include('header.php');
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><b>Manage Sub-Admin</b></h3>
      </div>
      <div class="title_right">
        <div class="col-md-12 form-group">
          <div class="pull-right">
            <div class="input-group">
              <div class="tooltip22 title_left"><button type="button" class="btn" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus-square" style="font-size: 25px"></i></button><span class="tooltiptext22">Add New Admin</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="addmodal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header bg-primary">
            <button type="button" class="text-default close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
            <h3 class="modal-title" id="myModalLabel">Add New Admin</h3>
          </div>
          <div class="modal-body">
            <div class="x_panel">

              <div class="x_content">
                <br />
                <?=form_open_multipart('admin/Admin/add_data');?>
                <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="insadname" placeholder="Insert Admin Name" value="<?=set_value('insadname');?>">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  <font style="color: #E74C3C;"><?=form_error('insadname');?></font>
                </div>
                <br />
                <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="insaduname" placeholder="Insert Admin User Name" value="<?=set_value('insaduname');?>">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  <font style="color: #E74C3C;"><?=form_error('insaduname');?></font>
                </div>
                <br />
                <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="insademail" placeholder="Insert Admin Email" value="<?=set_value('insademail');?>">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                  <font style="color: #E74C3C;"><?=form_error('insademail');?></font>
                </div>
                <br />
                <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                  <input type="password" class="form-control has-feedback-left" name="insadpwd" placeholder="Insert Admin Password" value="<?=set_value('insadpwd');?>">
                  <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                  <font style="color: #E74C3C;"><?=form_error('insadpwd');?></font>
                </div>
                <br />
                <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                  <input type="password" class="form-control has-feedback-left" name="insadcpwd" placeholder="Confirm Password" value="<?=set_value('insadcpwd');?>">
                  <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                  <font style="color: #E74C3C;"><?=form_error('insadcpwd');?></font>
                </div>
                <br />
                <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                  <input type="file" class="form-control has-feedback-left" name="insadimg" placeholder="Insert Admin Image">
                  <span class="fa fa-file-picture-o form-control-feedback left" aria-hidden="true"></span>
                </div>
                <br />
                <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="insadcno" placeholder="Insert Admin Contact Number" value="<?=set_value('insadcno');?>">
                  <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                  <font style="color: #E74C3C;"><?=form_error('insadcno');?></font>
                </div>
                <br />
                <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                  <select class="form-control has-feedback-left" name="insadlevel">
                    <option value="-1">SELECT ADMIN</option>
                    <option value="0">Super Admin</option>
                    <option value="1">Sub Admin</option>
                  </select>
                  <span class="fa fa-level-up form-control-feedback left" aria-hidden="true"></span>
                  <font style="color: #E74C3C;"><?=form_error('insadlevel');?></font>
                </div>
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

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Sub-Admin Table</h2>


            <div class="title_right">
              <div class="col-md-5 form-group pull-right top_search">
                <div class="input-group">
                  
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <table id="admin_dt" class="table table-striped table-bordered">

              <thead>
                <tr>
                  <th>Admin Name</th>
                  <th>User Name</th>
                  <th>Email Id</th>
                  <th>Image</th>
                  <th>Contact Number</th>
                  <th>Added By Admin</th>
                  <th>Added Date/Time</th>
                  <th>Status</th>                   
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
    $('#admin_dt').DataTable({
      sAjaxSource:'<?=site_url("/admin/Admin/get_data/");?>',
      aoColumns:[
      {mData:'AdminName'},
      {mData:'UserName'},
      {mData:'EmailId'},
      {data:null,render:function(data,type,row){
        return '<img src="<?=base_url('/resources/common/images/');?>'+data.AdminImage+'" width="75px" height="75px">';
      }},
      {mData:'ContactNo'},
      {mData:'AddedByAdminId'},
      {data:null,render:function(data,type,row){
        return '<div class="tooltip22">'+data.AddDate+'<span class="tooltiptext22">'+data.Date+'</span></div>'
      }},
      {data:null,render:function(data,type,row){
        if(data.AdminStatus == "Active")
        {
          var icon='<div class="tooltip22 title_left col-md-offset-3"><i style="font-size:25px; color:green" class="fa fa-toggle-on col-md-offset-1"></i><span class="tooltiptext22">Block Admin</span></div>';
        }
        else
        {
          var icon='<div class="tooltip22 title_left col-md-offset-3"><i style="font-size:25px; color:red" class="fa fa-toggle-off col-md-offset-1"></i><span class="tooltiptext22">Active Admin</span></div>';
        }

        return '<a href="#" class="toggle_status" id='+data.AdminId+'>'+icon+'</a>';
      }}
      ]
    });
  });

  $(function(){
    $('#admin_dt').on('click','tbody .toggle_status',function(){
      $.ajax({
        url:'<?=site_url("/admin/Admin/toggle_status/");?>'+$(this).attr("id"),
        success:function(result){
          $('#admin_dt').DataTable().ajax.reload();
        }
      });
    });
  });
</script>
<script type="text/javascript">
  $(function(){
    <?php
    $val=validation_errors();

    if($val != NULL)
    {
      ?>
      $('#addmodal').modal('show');
      <?php
    }
    ?>
  });
</script>
<script type="text/javascript">
  $(function(){
    $('#insadimg').on('change',function(e){
      var imgsrc=URL.createObjectURL(e.target.files[0]);
      $('#adimg').attr('src',imgsrc);
    });
  });
</script>
<?php
include('footer.php');
?>