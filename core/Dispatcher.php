<?php
class Dispatcher{
	//请求的路径
	private $path;

	const SUCCESS = 0;
	const FAILURE = -1;
	//请求方式
	const GET = 'GET';
	const POST = 'POST';

	//实例化分发器时得到用户请求的URI
	public function __construct(){
		$this->path = $_SERVER['REQUEST_URI'];
	}

	public function run(){
		if (strpos($this->path, 'index.php')) {
			$this->path = str_replace("/index.php/", "", $this->path);
		}
		
		$this->path = trim($this->path, '/');
		$paths = explode('/', $this->path);
		foreach($paths AS &$_path){
			if($start = strpos($_path,"?")){
				$_path = substr($_path,0,$start);
			}
		}
		unset($_path);

		$controller = array_shift($paths);
		$method = array_shift($paths);

		$controller_file_name = ROOT_PATH.'/controller/'.ucfirst($controller)."Controller.php";

		// var_dump('controller_file_name:'.$controller_file_name);echo "<br>";
		
		if (file_exists($controller_file_name)) {
			include_once($controller_file_name);
			$controller_name = ucfirst($controller)."Controller";
			
			// var_dump($controller_name);echo "<br>";

			if(!class_exists($controller_name)){
				die("no such class");
			}

			$controller = new $controller_name();
			if(!method_exists($controller_name, $method)){
				die("no such method");
			}
			$controller->$method();
		}
	}
}