<?php

    $query      = "SELECT content_page FROM ktdextreme_winner_daily  WHERE wn_id =1 ";
    $result = mysql_query($query);
    $line = mysql_fetch_row($result);
    $content_page = $line[0];

  include_once ("{$op}/texteditor.php");
?>
<div class="clearfix"></div>
	<div class="alert alert-success" id="msgbox" style="display:none;"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Saved  successfully </div>      
	<div style="float:right; margin-bottom:10px;">
</div>

<div class="clearfix"></div>

<form id="frm_data" name="frm_data" class="" method="post" enctype="multipart/form-data" action="#" >
<div class="row-fluid">
  <div class="box span12">
    <div class="box-header">
      <!-- <h2>รายการทั้งหมด 77 รายการ.</h2> -->
      <div class="box-icon">
        <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
      </div>
    </div>
    <div class="box-content">
                    <textarea name="content_page" id="content_page" style="width:100%; height:600px;" class="tinymce"><?=$content_page;?></textarea>

    </div>
  </div><!--/span-->
</div><!--/row-->  
</form>
<div class="span12 text-center">
  <button type="button" id="bt_save_as" class="btn btn-primary"><i class="icon-download-alt icon-white"></i> บันทึก  </button>
</div>
<?php if($_GET['action'] == "successfully"){ echo "<script>alert_msg();</script>"; } ?>