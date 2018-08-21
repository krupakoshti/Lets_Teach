<?php
include('header.php');
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><b>Manage Subject</b></h3>
      </div>

      <div class="title_right">
        <div class="col-md-12 form-group">
          <div class="pull-right">
            <div class="input-group">
              <div class="tooltip22 title_left"><button type="button" class="btn" data-toggle="modal" data-target=".bs-example-addmodal"><i class="fa fa-plus-square" style="font-size: 25px"></i></button><span class="tooltiptext22">Add New Subject</span>
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
              <h3 class="modal-title" id="myModalLabel">Add New Subject</h3>
            </div>
            <div class="modal-body">
              <div class="x_panel">
                <div class="x_content">
                  <?php $var=isset($scd)?$scd:"";?>
                  <?=form_open_multipart('admin/Subject/add_data/'.$var);?>

                  <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" name="inssubname" placeholder="Insert Subject Name" value="<?=set_value('inssubname');?>">
                    <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                    <font style="color: #E74C3C;"><?=form_error('inssubname');?></font>
                  </div>
                  <br />
                  <?php
                  if(!isset($scd))
                  {
                    ?>
                    <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                      <select class="form-control has-feedback-left" name="inssub">
                        <option value="0">SELECT SUB-CATEGORY</option>
                        <?php
                        foreach ($my_subcat as $cd) 
                        {
                          ?>
                          <option value="<?=$cd->SubCategoryId;?>"><?=$cd->SubCategoryName;?></option>
                          <?php
                        }
                        ?>
                      </select>
                      <span class="fa fa-th form-control-feedback left" aria-hidden="true"></span>
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
              <h3 class="modal-title" id="myModalLabel">Update Subject</h3>
            </div>
            <div class="modal-body">
              <div class="x_panel">
                <?php
                if(isset($upsd))
                {
                  ?>
                  <div class="x_content">
                    <br />

                    <?php $var=isset($scd)?$scd:"";?>
                    <?=form_open_multipart('admin/Subject/update_data/'.$upsd[0]->SubjectId."/".$var);?>
                    <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" name="upsubname" placeholder="Update Subject Name" value="<?=$upsd[0]->SubjectName;?>">
                      <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                      <font style="color: #E74C3C;"><?=form_error('upsubname');?></font>
                    </div>
                    <br />

                    <div class="col-md-8 col-md-offset-2 form-group has-feedback">
                      <select class="form-control has-feedback-left" name="upsub">
                        <!-- <option value="0">SELECT CATEGORY</option> -->
                        <?php
                        foreach($subcat as $cd) 
                        {
                          ?>
                          <option value="<?=$cd->SubCategoryId;?>" 
                            <?php
                            if($upsd[0]->SubCategoryId==$cd->SubCategoryId)
                              echo "selected";
                            ?>>
                            <?=$cd->SubCategoryName;?></option>
                            <?php
                          }
                          ?>
                        </select>
                        <span class="fa fa-th form-control-feedback left" aria-hidden="true"></span>
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
      </div> 

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Subject Table</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="sub_dt" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Subject Name</th>
                    <th>Sub-Category</th>
                    <th>Added By Admin</th>
                    <th>Added Date/Time</th>
                    <th>Update</th>
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
  <script type="text/javascript">
    $(function(){
      $('#sub_dt').DataTable({
        sAjaxSource:'<?=site_url("/admin/Subject/get_data/");?><?=isset($scd)?$scd:"";?>',
        aoColumns:[
        {mData:'SubjectName'},
        {mData:'SubCategoryName'},
        {mData:'AdminName'},
        {data:null,render:function(data,type,row){
          return '<div class="tooltip22">'+data.SubDate+'<span class="tooltiptext22">'+data.Date+'</span></div>'
        }},
        {data:null,render:function(data,type,row){
          scd='<?=isset($scd)?$scd:"";?>';
          return '<div class="tooltip22 col-md-offset-2"><button type="button" class="btn" data-toggle="modal" data-target=".bs-example-upmodal"><a href="<?=site_url('/admin/Subject/get_update_data/');?>'+data.SubjectId+'/'+scd+'"><i class="fa fa-edit" style="font-size:25px; color:#0E6655"></i></a></button><span class="tooltiptext22">Update Subject</span></div>';   
        }},
        {data:null,render:function(data,type,row){
          if(data.SubjectStatus == "Active")
          {
          var icon='<div class="tooltip22 title_left col-md-offset-3"><i style="font-size:25px; color:green" class="fa fa-toggle-on "></i><span class="tooltiptext22">Block Subject</span></div>';
        }
        else
        {
          var icon='<div class="tooltip22 title_left col-md-offset-3"><i style="font-size:25px; color:red" class="fa fa-toggle-off"></i><span class="tooltiptext22">Active Subject</span></div>';
        }

          return '<a href="#" class="toggle_status" id='+data.SubjectId+'>'+icon+'</a>';
        }}
        ]
      });
    });

    $(function(){
      $('#sub_dt').on('click','tbody .toggle_status',function(){
        $.ajax({
          url:'<?=site_url("/admin/Subject/toggle_status/");?>'+$(this).attr("id"),
          success:function(result){
            $('#sub_dt').DataTable().ajax.reload();
          }
        });
      });
    });
  </script>
  <script type="text/javascript">
    $(function(){
      <?php
      $val1=form_error('inssubname');

      if($val1 != NULL)
      {
        ?>
        $('#addmodal').modal('show');
        <?php
      }
      $val2=form_error('upsubname');

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
      }
      ?>
    });
    </script><?php
    include('footer.php');
    ?>