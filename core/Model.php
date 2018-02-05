<?php 
class Model
{
	protected $link = null;

	public function __construct($mysql_host,$mysql_user,$mysql_password,$db_name,
		$mysql_charset)
	{
		$this->link = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$db_name);
		mysqli_query($this->link,"SET NAMES ".$mysql_charset);
	}

	// 检查输入的sql语句，过滤敏感字符,防止sql注入
    private function _check($sql)
    {
        /*此处添加对$sql的过滤*/
        return $sql;
    }

    // 执行sql命令，成功返回结果集和TRUE，失败返回FALSE
    protected function query($sql)
    {
        $query_result = mysqli_query($this->link,$this->_check($sql));
        $result = array();
        while ($row = mysqli_fetch_assoc($query_result)) {
            $result[] = $row;
        }

        return $result;
        // $return_arr = array();
        // while ($row = mysqli_fetch_assoc($query_result)) {
        //     var_dump($row);die;
        //     $return_arr[] = $row;
        // }
        // return $return_arr;
    }

    
}