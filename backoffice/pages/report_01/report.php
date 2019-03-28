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

/*SQL SEARCH*************************************************************/
  $SEARCH_KEYWORD = trim($_REQUEST['kw']); // กำหนดคำค้นหา
  $SEARCH_REGISTER_FROM = trim($_REQUEST['rf']); // กำหนดช่วงเวลาที่
  $SEARCH_REGISTER_TO = trim($_REQUEST['rt']); // กำหนดช่วงเวลาที่
  $SEARCH_DELETED_FLAG = trim($_REQUEST['aa']); // สถานะ Publish / Unpublish 

  $SQLWHERE = " ";
  if($SEARCH_KEYWORD != "" ){ $SQLWHERE .= " AND ( gl.BABY_FIRST_NAME LIKE '%{$SEARCH_KEYWORD}%' OR gl.BABY_LAST_NAME LIKE '%{$SEARCH_KEYWORD}%' OR gl.BABY_NICKNAME LIKE '%{$SEARCH_KEYWORD}%' OR gl.FIRST_NAME LIKE '%{$SEARCH_KEYWORD}%' OR gl.LAST_NAME LIKE '%{$SEARCH_KEYWORD}%' OR gl.TELEPHONE_NUMBER LIKE '%{$SEARCH_KEYWORD}%' OR gl.EMAIL LIKE '%{$SEARCH_KEYWORD}%' ) "; } 
  if($SEARCH_REGISTER_FROM != "" and $SEARCH_REGISTER_TO != "" ){ $SQLWHERE .= " AND ( (STR_TO_DATE(pt.CREATE_TIME,'%Y-%m-%d') BETWEEN '{$SEARCH_REGISTER_FROM}' AND '{$SEARCH_REGISTER_TO}') )"; }
  if($SEARCH_DELETED_FLAG != "" ){ $SQLWHERE .= " AND gl.DELETED_FLAG = '{$SEARCH_DELETED_FLAG}' "; } 
  
  //http://www.thaiseoboard.com/index.php?topic=77951.0;wap2
  $SQLORDERBY = "ORDER BY pt.CREATE_TIME DESC, pt.UPDATE_TIME DESC " ;
  
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
      <th style="text-align:center; width:91px;">รูปภาพ</th>
      <th style="text-align:left;">ข้อมูลลงทะเบียน</th>
      <th style="text-align:center; width:80px;">คะแนนโหวต</th>
      <th style="text-align:center; width:150px;">วันที่เข้าร่วม</th>
      <th style="text-align:center; width:150px;">สถานะ</th>
    </tr>
  </thead>
        <tbody>
         <?php
          $ArrStauts = array('publish','unpublish');

          $sql  = " SELECT pt.*, gl.* , pt.CREATE_TIME as PHOTO_CREATE_TIME 
              FROM bab_gallery_photo as pt    
              LEFT JOIN bab_gallery as gl ON gl.GALLERY_ID = pt.GALLERY_ID  
              WHERE pt.DRAFT_ACTIVE = '0' {$SQLWHERE}  
              {$OrderBy} ";
          $result = $db->query($sql);
          while($line = $db->fetchNextObject($result)){
            $MEDIA_ID = $line->MEDIA_ID;
            $GALLERY_ID = $line->GALLERY_ID;
            $MEMBER_ID = $line->MEMBER_ID;
            $MEMBER_NAME  = unchkhtmlspecialchars( $line->MEMBER_NAME );
            $MESSAGES_TXT  = unchkhtmlspecialchars( $line->MESSAGES_TXT );
            $TOTAL_VOTE  = (int)( $line->TOTAL_VOTE );
            $THUMBNAIL = $line->FILE_NAME;
            $CREATE_TIME = ($line->PHOTO_CREATE_TIME == "") ? "-" : DateThai($line->PHOTO_CREATE_TIME,"datetime");
            $DELETED_FLAG = $line->DELETED_FLAG;
          ?>
              <tr>
                <td><a href="http://project.momypedia.com/baby-i-love-u/file_upload/<?=$THUMBNAIL;?>" tatget="_blank"><img src="http://project.momypedia.com/baby-i-love-u/file_upload/thumbnail/<?=$THUMBNAIL;?>"></a></td>
                <td>
                  <div class="span12">
                    <strong>Username (ID)</strong> &nbsp;&nbsp;<?php echo $MEMBER_NAME;?> (<?php echo $MEMBER_ID;?>)<br>
                    <strong>คำบอกรัก</strong> &nbsp;&nbsp;<?php echo $MESSAGES_TXT;?> <br>
                  </div>   
                  <a href="http://project.momypedia.com/baby-i-love-u/file_upload/<?=$THUMBNAIL;?>" target="_blank">http://project.momypedia.com/baby-i-love-u/file_upload/<?=$THUMBNAIL;?></a>
                </td>
                <td style="text-align:center; "><?=$TOTAL_VOTE;?></td>
                <td style="text-align:center; "><?=$CREATE_TIME;?></td>
                <td style="text-align:center; "><?=$ArrStauts[$DELETED_FLAG];?></td>
              </tr>
         <?php $Sequence++; } ?>
        </tbody>
</table>
</body>
</html>