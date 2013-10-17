<?php
// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
if(file_exists(dirname(__FILE__).'/protected/config/dev.php'))
    $config=dirname(__FILE__).'/protected/config/dev.php';    
else{
    $config=dirname(__FILE__).'/protected/config/main.php';
}


// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();
