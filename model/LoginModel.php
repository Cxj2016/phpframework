<?php 
class LoginModel extends Model
{

	public function __construct()
	{
		parent::__construct(
			'127.0.0.1','root','root','framework','utf8'
		);
	}

	public function get_user($id)
	{
		$sql = "SELECT * FROM user WHERE id = $id";
		return $res = $this->query($sql);
	}
}