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
		$id = $_GET['id'];
		$user_data = $this->model->get_user($id)[0];
		$this->view->show('user',$user_data);
	}
}
