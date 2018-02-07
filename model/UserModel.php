<?php 
class UserModel extends Model
{
	public function add_user(array $user_info)
	{
		//insert
		$sql = "INSERT INTO user(user_name,password) VALUES ('{$user_info['user_name']}','{$user_info['password']}')";
		//delete
		$sql = "DELETE FROM user WHERE id = 22";
		//update
		$sql = "UPDATE user SET password = 'xijian.chen' WHERE id = 2";
		//select
		$sql = "SELECT * FROM user";
		return $res = $this->query($sql);
	}
}