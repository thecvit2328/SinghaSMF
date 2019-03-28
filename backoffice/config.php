<?php
	@header( 'Pragma: no-cache' );
	@header( 'Content-Type:text/html; charset=utf-8');
	error_reporting(0);
	date_default_timezone_set('Asia/Bangkok');
	$config = array();
	$config['ip_address'] 		= ipCheck();
	$config['referrer_page']	= (@eregi($_SERVER["HTTP_HOST"], str_replace("www.", "", strtolower($_SERVER["HTTP_REFERER"])))) ? 1 : 0; //[1]=yes / [0]=no
	$config['this_page']	    = "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];
	$GetURIparameters   		= (($_SERVER['QUERY_STRING'] == ''))?"?":"&";
	$config['page_title'] = "Lotte - Koala March - BACKOFFICE";
	$config['web_name'] = "Lotte - Koala March ";
	/*DATABASE CONNECT *************************************************************/
	
	// ONLINE SERVER
	define("HostName","localhost");
	define("DBName","maria_mydata");
	define("DBUsername","maria_user");
	define("DBPassword","D8kIPtBL");

	// OFFLINE : LOCALHOST
	define("HostName2","localhost");
	define("DBName2","maria_mydata");
	define("DBUsername2","root");
	define("DBPassword2","");


	// OPEN THE BASE (CONSTRUCT THE OBJECT):
	$db = new DB(DBName, HostName, DBUsername, DBPassword);
	// $db = new DB(DBName2, HostName2, DBUsername2, DBPassword2);
	/*DATABASE CONNECT *************************************************************/

	// Admin Config
	// $ADMIN_ID = (int)@$_SESSION['ssADMIN_ID'];
	// if($ADMIN_ID > 0){
	// 	$result = $db->query("SELECT * FROM admin WHERE DATA_ID='{$ADMIN_ID}' ");
	// 	$line = $db->fetchNextObject($result);
	// 	$PM_LEVEL = $line->LEVEL;
	// 	$ARR_PM_BANNER = explode(",", "1,1,1");//explode(",", $line->PM_BANNER); // [insert],[edit],[remove],[review],[show index],[sequence]
	// 	$ARR_PM_NEWS_ACTIVITY = explode(",", "1,1,1");//explode(",", $line->PM_NEWS_ACTIVITY); // [insert],[edit],[remove],[review],[show index],[sequence]
	// }

?>