<?php
@ob_start();
@session_start();
header ('Content-type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");
require_once("../../../src/function.php");
require_once("../../../src/class.database.connection.php");
require_once('../../config.php');
require_once('../../../src/class.inputfilter.php');
$InputFilter = new InputFilter();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report</title>
	<style type="text/css">
    @media print {
      input.printButton, #print_bnt {
        display: none;
      }
    }  
    body {
      height: 842px;
      width: 990px;
      margin-left: auto;
      margin-right: auto;
      padding: 0;
      font-size: 14px;
      font-family:Helvetica,Arial,Thonburi,Tahoma,FreeSans,sans-serif;
    }  

    table td, th{
      border : 0;
      border-bottom:1px; 
      border-color: #000;
      border-style: solid;
    }  
	</style>
</head>
<body>
<div id="print_bnt" style="text-align:center;">
  <input class="printButton" type="button" value="สั่งพิมพ์ / Print" onClick=" window.print();"><br/><br/>
</div>

<table width="100%" border="0" cellpadding="5" cellspacing="0">
  <thead>
    <tr>
      <th style="text-align:center; width:100px;">รูปภาพ</th>
      <th style="text-align:left; width:250px;">ข้อมูลลงทะเบียน</th>
      <th style="text-align:left; width:250px;">ข้อมูลจาก facebook</th>
      <th style="text-align:left; width:250px;">สถานะการแชร์</th>
      <th style="text-align:left; width:250px;">วันที่-เวลา</th>
    </tr>
  </thead>
        <tbody>
         <?php
          $ArrStauts = array('publish','unpublish');
          $sql  = " SELECT * 
              FROM tbl_register    
              -- WHERE 
              ORDER BY createDate DESC ";
          $result = $db->query($sql);
          while($line = $db->fetchNextObject($result)){
            $fb_uid = $line->fb_uid;
            $fb_name = $line->fb_name;
            $txt_name = $line->txt_name;
            $txt_caption  = unchkhtmlspecialchars( $line->txt_caption );
            $photo_file  = $line->photo_file ;
            $fb_share_id  = $line->fb_share_id ;
            $fb_share_mode  = $line->fb_share_mode ;
            $createDate  = $line->createDate ;
          ?>
              <tr>
                <td><a href="../photos/<?=$photo_file;?>" tatget="_blank"><img src="../photos/<?=$photo_file;?>" width="100"></a></td>
                <td>
                  <div class="span12">
                    <strong>name</strong> &nbsp;&nbsp;<?php echo $txt_name;?><br>
                    <strong>caption</strong> &nbsp;&nbsp;<?php echo $txt_caption;?> 
                  </div>   
                </td>
                <td>
                  <div class="span12">
                    <strong>facebook id</strong> &nbsp;&nbsp;<?php echo $fb_uid;?><br>
                    <strong>facebook name</strong> &nbsp;&nbsp;<?php echo $fb_name;?> 
                  </div>   
                </td>
                <td>
                  <div class="span12">
                    <strong>share id</strong> &nbsp;&nbsp; <a href=""><?php echo $fb_share_id;?></a><br>
                    <strong>share mode</strong> &nbsp;&nbsp;<?php echo $fb_share_mode;?> 
                  </div>   
                </td>
                <td style="text-align:center; "><?=$createDate;?></td>
              </tr>
         <?php $Sequence++; } ?>
        </tbody>
</table>
</body>
</html>