<?php
@ob_start();
@session_start();
header ('Content-type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");
require_once("src/function.php");
require_once("src/class.database.connection.php");
require_once('config.php');



// Close the connexion to the base:
$db->close();
?>

