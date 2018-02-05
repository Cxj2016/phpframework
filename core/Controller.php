<?php 
class Controller{
	protected $view = null;
	protected $model = null;

	public function __construct()
	{
		$this->view = new View();
	}

	public function load_model($model_name)
	{
		$model_file_name = ROOT_PATH.'/model/'.ucfirst($model_name).'Model.php';
		require_once($model_file_name);
		$model_name = ucfirst($model_name).'Model';
		$this->model = new $model_name();
	}
 }
