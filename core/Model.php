<?php 
$config = require(ROOT_PATH.'/config.php');
$db_config = $config['db'];

class Model
{
	protected $link = null;

	public function __construct()
	{
        global $db_config;
		$this->link = mysqli_connect($db_config['host'],$db_config['user'],$db_config['password'],$db_config['database']);
		mysqli_query($this->link,"SET NAMES ".$db_config['charset']);
	}

	// 检查输入的sql语句，过滤敏感字符,防止sql注入
    private function _check($sql)
    {
        /*此处添加对$sql的过滤*/
        // return mysqli_real_escape_string($this->link,$sql);
        return $sql;
    }

    // 执行sql命令，成功返回结果集和TRUE，失败返回FALSE
    protected function query($sql)
    {
        $query_result = mysqli_query($this->link, $this->_check($sql));
        if('boolean' == $query_result)//表示为insert/update/delete或者失败操作
        {
            $intMysqlExecCode = mysqli_errno($this->link);//大于0则执行失败
            if(!$query_result || $intMysqlExecCode)
            {
                return false;
            }
//获得 INSERT、UPDATE、DELETE 语句结果集中的影响行数。0表示没有受影响的记录、-1 表示错误、大于 0 的整数表示所影响的行数
            $intNumRows = mysqli_affected_rows($this->link);
            // 对 INSERT、UPDATE、DELETE 语句的 $intNumRows 判断
            if (0 >= $intNumRows) {
                return false;
            }
            return true;
        }else{//select操作
            $return_arr = array();
            while ($row = mysqli_fetch_assoc($query_result)) {
            $return_arr[] = $row;
            }
            return $return_arr;
        }

        

        

        //获取SELECT得到的数据
        // $result_arr = mysqli_fetch_array($query_result, MYSQLI_ASSOC);


        // while ($arrSqlResRow = mysqli_fetch_array($sqlRes, MYSQLI_ASSOC)) {
        //     var_dump($arrSqlResRow);
        // }
        // $result = array();
        // while ($row = mysqli_fetch_assoc($query_result)) {
        //     $result[] = $row;
        // }

        // return $result;
        
    }

    
}