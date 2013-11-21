<?php
date_default_timezone_set("America/Vancouver");
require_once('<path-to-yii>/yii.php');
$root = dirname(__FILE__);

switch ( $_SERVER['SERVER_ADDR'] ) {
	case '<dev-server-ip>' :
		defined('YII_DEBUG') or define('YII_DEBUG',true);
		defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
		ini_set('display_errors', 1);
		error_reporting(E_ALL & ~E_NOTICE);
		$config = $root . '/protected/config/dev.php';
	break;
	default :
		$config = $root . '/protected/config/main.php';
	break;
}

Yii::createWebApplication($config)->run();