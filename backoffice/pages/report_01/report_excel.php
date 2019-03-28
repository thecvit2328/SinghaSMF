<?PHP
  // Original PHP code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.
  //http://www.thaicreate.com/php/php-application-vnd.ms-excel.html
  //http://webdev.exteen.com/20101016/excel
  @ob_start();
  @session_start();
  header ('Content-type: text/html; charset=tis-620');
  header("Cache-Control: no-cache, must-revalidate");
  require_once('../../../src/function.php');
  require_once("../../../src/class.database.connection.php");
  require_once('../../config.php');

  function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

  // filename for download
  $filename = "report_" . date('Y-m-d') . ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");
  mysql_query("SET NAMES TIS620");
 
  $SEARCH_KEYWORD = trim($_REQUEST['kw']); // กำหนดคำค้นหา
  $SEARCH_REGISTER_FROM = trim($_REQUEST['rf']); // กำหนดช่วงเวลาที่
  $SEARCH_REGISTER_TO = trim($_REQUEST['rt']); // กำหนดช่วงเวลาที่
  $SEARCH_DELETED_FLAG = trim($_REQUEST['aa']); // สถานะ Publish / Unpublish 

  $SQLWHERE = " ";
  if($SEARCH_KEYWORD != "" ){ $SQLWHERE .= " AND ( gl.MEMBER_NAME LIKE '%{$SEARCH_KEYWORD}%' OR gl.MESSAGES_TXT LIKE '%{$SEARCH_KEYWORD}%'  ) "; } 
  if($SEARCH_REGISTER_FROM != "" and $SEARCH_REGISTER_TO != "" ){ $SQLWHERE .= " AND ( (STR_TO_DATE(pt.CREATE_TIME,'%Y-%m-%d') BETWEEN '{$SEARCH_REGISTER_FROM}' AND '{$SEARCH_REGISTER_TO}') )"; }
  if($SEARCH_DELETED_FLAG != "" ){ $SQLWHERE .= " AND gl.DELETED_FLAG = '{$SEARCH_DELETED_FLAG}' "; } 


  $SQLORDERBY = "ORDER BY pt.CREATE_TIME DESC, pt.UPDATE_TIME DESC " ;

  echo "Report (".date('d-m-Y H:i:s').")\r\n\r\n";

  $sql  = "SELECT pt.FILE_NAME, gl.* 
      FROM bab_gallery_photo as pt    
      LEFT JOIN bab_gallery as gl ON gl.GALLERY_ID = pt.GALLERY_ID  
      WHERE pt.DRAFT_ACTIVE = '0' {$SQLWHERE}  
      {$OrderBy} ";
  $result = mysql_query($sql);
  $cols = mysql_num_fields($result); 
  

  $arr_uid = array('1','6','7','8','9','10','11','12'); //22 = THUMBNAIL

  for ( $i = 0; $i < ($cols); $i++ ) {
    if (!in_array($i, $arr_uid)){
      echo mysql_field_name( $result, $i ). "\t";
    }
  }
  echo "CREATE_TIME\t"; 
  echo "\r\n";

  $arr_uid = array('6','7','8','9','10','11','12'); //22 = THUMBNAIL
  while($row = mysql_fetch_array($result))
  { 
    echo "http://project.momypedia.com/baby-i-love-u/file_upload/{$row[0]}\t";
    for($i=2; $i < ($cols); $i++){ 
      if (!in_array($i, $arr_uid)){ 
        echo preg_replace("/\r\n|\r|\n/",'',($row[$i])) . "\t"; 
      }
    }
    echo unchkhtmlspecialchars($row[6]) . "\t";

    echo "\r\n";
  }

  exit;
?>