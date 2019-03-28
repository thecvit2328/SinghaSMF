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
  $fb_uid = chkhtmlspecialchars($InputFilter->clean_script(trim($_POST['fb_uid'])));
  $fb_name = chkhtmlspecialchars($InputFilter->clean_script(trim($_POST['fb_name'])));
  $txt_name = chkhtmlspecialchars($InputFilter->clean_script(trim($_POST['txt_name'])));
  $txt_share_message = chkhtmlspecialchars($InputFilter->clean_script(trim($_POST['txt_share_message'])));
  $photo_file = chkhtmlspecialchars($InputFilter->clean_script(trim($_POST['photo_file'])));

  $insert = array();
  $insert["fb_uid"] = "'" . $fb_uid . "'";
  $insert["fb_name"] = "'" . $fb_name . "'";
  $insert["txt_name"] = "'" . $txt_name . "'";
  $insert["txt_share_message"] = "'" . $txt_share_message . "'";
  $insert["photo_file"] = "'" . $photo_file . "'";
  $insert["whereToBuy"] = "'" . $whereToBuy . "'";
  $insert["attachmentFile"] = "'" . $newfilename . "'";
  $insert["createDate"] = "now()";

  # INSERT NEW DATA
  $sql = "INSERT INTO savedata(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
  $db->execute($sql);
  $DATA_ID = $db->lastInsertedId();
  echo 'process_completed';
  // goonly('index.html#process_completed');
  // alertgo('ขอบคุณที่ร่วมสนุก\nทางเราได้ทำการบันทึกข้อมูลของท่านเรียบร้อยแล้ว ขอบคุณค่ะ!','index.html');
}

?>