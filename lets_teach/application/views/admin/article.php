<?php
include('header.php');
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><b>Manage Article</b></h3>
      </div>
    </div>
  
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Article Table</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="admin_dt" class="table table-striped table-bordered">

              <thead>
                <tr>
                  <th>Article Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Subject Name</th>
                  <th>Tutor Name</th>
                  <th>Created Date & Time</th>
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
      sAjaxSource:'<?=site_url("/admin/Article/get_data/");?>',
      aoColumns:[
      {data:null,render:function(data,type,row){
        return '<div class="tooltip22"><a href="<?=site_url('admin/Article/');?>'+data.ArticleId+'" style="color:#0E6655">'+data.ArticleTitle+'</a><span class="tooltiptext22">Open Article</span></div>';
      }},
      {data:null,render:function(data,type,row){
        scr=data.Description.substring(0,50)+'...';

        return '<p>'+scr+'</p>';
      }},
      {data:null,render:function(data,type,row){
        return '<img src="<?=base_url('/resources/common/images/');?>'+data.ArticleImage+'" width="75px" height="75px">';
      }},
      {mData:'SubjectName'},
      {mData:'TutorName'},
      {data:null,render:function(data,type,row){
         return '<div class="tooltip22">'+data.ArticleDate+'<span class="tooltiptext22">'+data.Date+'</span></div>'
      }},
      {data:null,render:function(data,type,row){
        if(data.ArticleStatus == "Active")
        {
          var icon='<div class="tooltip22 title_left col-md-offset-3"><i style="font-size:25px; color:green" class="fa fa-toggle-on"></i><span class="tooltiptext22">Block Article</span></div>';
        }
        else
        {
          var icon='<div class="tooltip22 title_left col-md-offset-3"><i style="font-size:25px; color:red" class="fa fa-toggle-off"></i><span class="tooltiptext22">Active Article</span></div>';
        }

        return '<a href="#" class="toggle_status" id='+data.ArticleId+'>'+icon+'</a>';
      }}
      ]
    });
  });

  $(function(){
    $('#admin_dt').on('click','tbody .toggle_status',function(){
      $.ajax({
        url:'<?=site_url("/admin/Article/toggle_status/");?>'+$(this).attr("id"),
        success:function(result){
          $('#admin_dt').DataTable().ajax.reload();
        }
      });
    });
  });
</script>
<?php
include('footer.php');
?>