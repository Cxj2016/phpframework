<?php 
class UserController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_model('user');
	}

	public function add()
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$user = array(
			'user_name' => $user_name,
			'password' => $password
		);
		$res = $this->model->add_user($user);
		var_dump($res);
	}
}