<?php
@ob_start();
@session_start();
header('Content-type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");
require_once("src/function.php");
require_once("src/class.database.connection.php");
require_once('config.php');
require_once("src/class.pagination.php");
require_once('src/class.inputfilter.php');
$InputFilter = new InputFilter();


if ($_GET['action'] == "register_data") {
  $fullName = chkhtmlspecialchars($InputFilter->clean_script(trim($_POST['fullName'])));
  $phoneNumber = chkhtmlspecialchars($InputFilter->clean_script(trim($_POST['phoneNumber'])));
  $receiptNumber = chkhtmlspecialchars($InputFilter->clean_script(trim($_POST['receiptNumber'])));
  $quality = chkhtmlspecialchars($InputFilter->clean_script(trim($_POST['quality'])));
  $mediaSource = chkhtmlspecialchars($InputFilter->clean_script(trim($_POST['mediaSource'])));
  $whereToBuy = chkhtmlspecialchars($InputFilter->clean_script(trim($_POST['whereToBuy'])));

  require_once('src/class.upload.php');
  $targetfile =  'receipts/';

  $temp = explode(".", $_FILES["attachmentFile"]["name"]);
  $new_file_name  = date('Ymdhis');
  $newfilename  = $new_file_name . '.jpg'; // end($temp);
  $thumbnail = new Upload($_FILES['attachmentFile']);
  if ($thumbnail->uploaded) {
    $thumbnail->image_convert = 'jpg';
    $thumbnail->jpeg_quality = 100;
    $thumbnail->image_resize  = true;
    $thumbnail->image_ratio_crop = true;
    $thumbnail->image_x = 500;
    $thumbnail->image_ratio_y = true;
    $thumbnail->file_new_name_body  = $new_file_name;
    $thumbnail->process($targetfile);
    if ($thumbnail->processed) {
      $thumbnail->clean();
      $statussave = 1;
    }
  }

  // $mediaSource = ($mediaSource == 'สื่อในห้างสรรพสินค้า') ? 'YouTube' : $mediaSource;

  if ($whereToBuy == 'Tesco Lotus' || $whereToBuy == 'Tesco Lotus Express') {
    $quality = (int)$quality * 4;
  } else {
    $quality = (int)$quality * 2;
  }

  $insert = array();
  $insert["fullName"] = "'" . $fullName . "'";
  $insert["phoneNumber"] = "'" . $phoneNumber . "'";
  $insert["quality"] = "'" . $quality . "'";
  $insert["receiptNumber"] = "'" . $receiptNumber . "'";
  $insert["source"] = "'application'";
  $insert["mediaSource"] = "'" . $mediaSource . "'";
  $insert["whereToBuy"] = "'" . $whereToBuy . "'";
  $insert["attachmentFile"] = "'" . $newfilename . "'";
  $insert["createDate"] = "now()";

  # INSERT NEW DATA
  $sql = "INSERT INTO sadasugarluckydraw(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
  $db->execute($sql);
  $DATA_ID = $db->lastInsertedId();
  goonly('index.html#process_completed');
  // alertgo('ขอบคุณที่ร่วมสนุก\nทางเราได้ทำการบันทึกข้อมูลของท่านเรียบร้อยแล้ว ขอบคุณค่ะ!','index.html');
}

?>