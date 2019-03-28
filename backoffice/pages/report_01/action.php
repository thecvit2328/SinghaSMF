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
$targetFile = "../../../userfiles/product/";

/*************************************** Content Management ****************************************/
if($_REQUEST['action']=="data_save_as"){
	$content_page = $_REQUEST['content_page'];
	$db->execute("UPDATE ktdextreme_winner_daily SET content_page='{$content_page}', update_time=now() WHERE wn_id='1' ");
}

/*************************************** Content Management ****************************************/

// Close the connexion to the base:
$db->close();
?>
