<?php
define('ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)));//定义根目录 

require ROOT_PATH.'/config.php'; //主要配置
require ROOT_PATH.'/core/Dispatcher.php'; //分发器模块
require ROOT_PATH.'/core/Controller.php'; //父类控制层
require ROOT_PATH.'/core/Model.php'; //父类模型层
require ROOT_PATH.'/core/View.php'; //父类视图层

$dispatcher = new Dispatcher();  //实例化请求分发器 
$result = $dispatcher->run();

echo $result;

exit(0);

//支持重写模块 done
//支持GET请求
//支持配置文件
