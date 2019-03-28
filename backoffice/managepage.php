<?php
/* Open Pages Site ************************/
if(!empty($_GET['op'])){
	$opURL					=	trim($_GET['op']);
	$getop					=	explode("-",$opURL);
	$op						= 	"pages/".$getop[0];
	$config['page'] 		= 	(trim($getop[1])!='index')?$op.'/'.$getop[1].'.php':$op.'/index.php';
}else{
	$opURL					=	"report_01-index";
	$getop					=	explode("-",$opURL);
	$op						= 	"pages/".$getop[0];
	$config['page'] 		=	$op.'/index.php';
}

/* Config Site ************************/
$config['javas'] 		=	$op.'/page.js';
$config['func'] 		=	$op.'/functions.php';
$config['css']			=	$op.'/page.css';
$config['menu'][$op] 	=	'active';

/* Check and OpenFiles ************************/
if(!file_exists($config['page'])){ goonly("index.php"); }

?>