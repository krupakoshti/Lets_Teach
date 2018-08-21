<?php
include('header.php');
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><b>Manage Question</b></h3>
      </div>
    </div>
  
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Question Table</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="ques_dt" class="table table-striped table-bordered">

              <thead>
                <tr>
                  <th>Question</th>
                  <th>Student Name</th>
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
    $('#ques_dt').DataTable({
      sAjaxSource:'<?=site_url("/admin/QuesAns/get_data/");?>',
      aoColumns:[
      {data:null,render:function(data,type,row){
        scr=data.Question.substring(0,50)+'...';

        return '<div class="tooltip22"><a href="<?=site_url('admin/QuesAns/');?>'+data.QuesId+'" style="color:#0E6655"><p>'+scr+'?</p></a><span class="tooltiptext22">Open Question</span></div>';
      }},
      {mData:'StudentName'},
      {data:null,render:function(data,type,row){
         return '<div class="tooltip22">'+data.QuesDate+'<span class="tooltiptext22">'+data.Date+'</span></div>'
      }},
      {data:null,render:function(data,type,row){
        if(data.QuesStatus == "Active")
        {
          var icon='<div class="tooltip22 title_left col-md-offset-4"><i style="font-size:25px; color:green" class="fa fa-toggle-on"></i><span class="tooltiptext22">Block Question</span></div>';
        }
        else
        {
          var icon='<div class="tooltip22 title_left col-md-offset-4"><i style="font-size:25px; color:red" class="fa fa-toggle-off"></i><span class="tooltiptext22">Active Question</span></div>';
        }

        return '<a href="#" class="toggle_status" id='+data.QuesId+'>'+icon+'</a>';
      }}
      ]
    });
  });

  $(function(){
    $('#ques_dt').on('click','tbody .toggle_status',function(){
      $.ajax({
        url:'<?=site_url("/admin/QuesAns/toggle_status/");?>'+$(this).attr("id"),
        success:function(result){
          $('#ques_dt').DataTable().ajax.reload();
        }
      });
    });
  });
</script>
<?php
include('footer.php');
?>