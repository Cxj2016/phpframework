<?php 
class View
{
	public function show($file,array $data = array())
	{
		$view_file_name = ROOT_PATH.'/view/'.$file.'.php';
		if (!file_exists($view_file_name)) {
			die("no such file");
		}

		//extract() 函数从数组中将变量导入到当前的符号表。
		extract($data);
		require($view_file_name);
	}
}