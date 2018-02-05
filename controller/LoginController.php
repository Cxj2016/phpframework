<?php 
class LoginController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_model('login');
	}

	public function get_user()
	{
		// $id = $_GET['id'];
		// var_dump($id);die;
		$user_data = $this->model->get_user($id);
		var_dump($user_data);die;
		$this->view->show('user',$user_data);
	}

}
