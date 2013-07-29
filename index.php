<?php
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
//app use time
//defined('YII_BEGIN_TIME') or define('YII_BEGIN_TIME',microtime(true));


// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii-1.1.13.e9e4a0/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

$constFile=dirname(__FILE__).'/protected/config/const.php';
require_once($constFile);

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
