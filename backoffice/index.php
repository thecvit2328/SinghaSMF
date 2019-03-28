<?php
/*
 * Web-Based Instruction PHP Programming :: NetdesignRank (Thailand)
 * Web-Design ::  NetdesignRank (Thailand )
 * Copyright (C) 2007-2012
 * Contact :: support@netdesignrank.com 
 * This is the integration file for PHP (versions 5)
*/
@ob_start();
@session_start();
require_once('include/checkadmin.php');
require_once("../src/class.database.connection.php");
require_once('../src/function.php');
require_once('config.php');
require_once('managepage.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
  	<title>Backoffice</title>
	<meta name="description" content="SimpliQ - Flat & Responsive Bootstrap Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="SimpliQ, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style-responsive.min.css" rel="stylesheet">
	<link href="css/retina.css" rel="stylesheet">
	<?php if(file_exists($config['css'])){ echo '<link href="' .$config['css']. '" rel="stylesheet" type="text/css" />';} ?>
  <!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
	
	<!-- start: Favicon and Touch Icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="ico/favicon.png">
	<!-- end: Favicon and Touch Icons -->	

  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="js/jqueryui/js/jquery-ui-1.10.2.custom.min.js"></script>
  <script src="js/main.js"></script>

  <?php if(file_exists($config['javas'])){ echo '<script type="text/javascript" src="' .$config['javas']. '" ></script>';} ?>
  <?php if(file_exists($config['func'])){ require_once($config['func']);} ?>
</head>

<body>
	<!-- start: Header -->
	<?php include('include/inc.header.php'); ?>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
			<!-- start: Content -->
			<div id="content" class="span10 full">
        		<? require_once($config['page']);?>
			</div>
			<!-- end: Content -->
				
		</div><!--/fluid-row-->
				
		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>
		
		<div class="clearfix"></div>
		<?php include('include/inc.footer.php'); ?>
				
	</div><!--/.fluid-container-->

  <!-- start: JavaScript-->
  <?php require_once('include/inc.js.php'); ?>
  <!-- end: JavaScript-->
	
</body>
</html>