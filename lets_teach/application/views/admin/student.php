<?php
include('header.php');
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><b>Manage Student</b></h3>
      </div>

      <div class="title_right">
        <div class="col-md-12 form-group">
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Student Table</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="user_dt" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Student Name</th>
                  <th>User Name</th>
                  <th>Email ID</th>
                  <th>Contact No</th>
                  <th>Image</th>
                  <th>City</th>
                  <th>State</th>
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
    $('#user_dt').DataTable({
      sAjaxSource:'<?=site_url("/admin/Student/get_data/");?>',
      aoColumns:[
      {data:null,render:function(data,type,row){
        return '<div class="tooltip22"><a href="<?=site_url('admin/Student/');?>'+data.StudentId+'" style="color:#0E6655">'+data.StudentName+'</a><span class="tooltiptext22">'+data.UserName+' Profile</span></div>';
      }},
      {mData:'UserName'},
      {mData:'EmailId'},
      {mData:'ContactNo'},
      {data:null,render:function(data,type,row){
        return '<img src="<?=base_url('/resources/common/images/');?>'+data.StudentImage+'" width="75px" height="75px">';
      }},
      {mData:'CityName'},
      {mData:'StateName'},
      {data:null,render:function(data,type,row){
        if(data.UserStatus == "Active")
        {
          var icon='<div class="tooltip22 col-md-offset-3"><i style="font-size:25px; color:green" class="fa fa-toggle-on col-md-offset-1"></i><span class="tooltiptext22">Block Student</span></div>';
        }
        else
        {
          var icon='<div class="tooltip22 col-md-offset-3"><i style="font-size:25px; color:red" class="fa fa-toggle-off col-md-offset-1"></i><span class="tooltiptext22">Active Student</span></div>';
        }

        return '<a href="#" class="toggle_status" id='+data.UserId+'>'+icon+'</a>';
      }}
      ]
    });
  });

  $(function(){
    $('#user_dt').on('click','tbody .toggle_status',function(){
      $.ajax({
        url:'<?=site_url("/admin/Student/toggle_status/");?>'+$(this).attr("id"),
        success:function(result){
          $('#user_dt').DataTable().ajax.reload();
        }
      });
    });
  });
</script>

<?php
include('footer.php');
?>