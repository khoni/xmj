<?php
//error_reporting(0);
//phpinfo();
//if(date("H") >= '20'){
//    echo '<strong>Tunggu beberapa saat, sistem sedang dalam pemutakhiran..</strong>';
//    exit();
//}
if (function_exists('date_default_timezone_set'))
    date_default_timezone_set('Asia/Jakarta');
// change the following paths if necessary
$yii = dirname(__FILE__) . '/protected/vendor/yii/framework/yii.php';
$config = dirname(__FILE__) . '/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
