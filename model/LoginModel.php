<?php 
class LoginModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_user($id)
	{
		$sql = "SELECT * FROM user WHERE id = $id";
		return $res = $this->query($sql);
	}
}