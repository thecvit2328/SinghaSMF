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

	//print_r($_COOKIE);

	/*DATABASE CONNECT *************************************************************/
	// https://www.facebook.com/dialog/pagetab?app_id=844574558951959&next=https://www.triple9.co.th/toppo/index.php

	// ONLINE SERVER
	define("HostName","localhost");
	define("DBName","singhasmf");
	define("DBUsername","root");
	define("DBPassword","P@ssw0rd!");

	// OFFLINE : LOCALHOST
	// define("HostName","localhost");
	// $config["base_path"]	=	"http://localhost/facebook_app/ktdextreme/";
	// define("DBName","maria_mydata");
	// define("DBUsername","root");
	// define("DBPassword","");

	// OPEN THE BASE (CONSTRUCT THE OBJECT):
	$db = new DB(DBName, HostName, DBUsername, DBPassword);
	/*DATABASE CONNECT *************************************************************/

?>
