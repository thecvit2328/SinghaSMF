<?php
@ob_start();
@session_start();
header ('Content-type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");
require_once("../../../src/function.php");
require_once("../../../src/class.database.connection.php");
require_once('../../config.php');
if($_REQUEST['action']=="signin"){
	$USERNAME	=	$_POST['username'];
	$PASSWORD	=	$_POST['password'];

	if($USERNAME === "admin" and $PASSWORD === "Welcome1#"){
		$_SESSION['ssADMIN_ID'] = "1";
		echo "y";
	}else{ 
		unset($_SESSION['ssADMIN_ID']);
		echo "n";
	}
}

if($_REQUEST['action']=="signout"){
	unset($_SESSION['ssADMIN_ID']);
	goonly("../../login.php");
}

// Close the connexion to the base:
$db->close();
?>
