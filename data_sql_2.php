<?php
// 数据库配置参数
$db_config = array(
    'host' => 'localhost',
    'port' => '3306',
    'username' => 'root',
    'password' => '123456',
    'dbname' => 'contract',
    'charset' => 'utf8'
);
$tablePre = 'joe_'; // 表前缀
$tableName = 'users'; // 表名        

// 读取表结构生成 php表操作 类
$res = linkdb($db_config, $tablePre . $tableName);
$className = $tableName . 'Dal';
$fileName = $tableName . '.d.class.php';
$annStr = addAnnotation($fileName, $tablePre . $tableName, '用户表操作', true);
$classStr = readDmodelToDal($res, $className, $tablePre, $tableName, $annStr);

// 写入文件
$file = fopen($fileName, "w+");
fwrite($file, $classStr);
fclose($file);

/**
 * 生成表操作
 *
 * @param unknown $className            
 * @param unknown $tableName            
 * @param string $annStr            
 */
function readDmodelToDal($res, $className, $tablePre, $tableName, $annStr = '')
{
    // class start
    $result = '<?php ' . "\n";
    $result .= $annStr;
    $result .= "\n" . 'class ' . $className . ' extends datamodel' . "\n";
    $result .= "\n{";

    // 变量
    $result .= "\n" . 'private $_tablename;';
    $result .= "\n" . 'private $_db;';

    // 构造函数
    $result .= "\n" . 'public function __construct()';
    $result .= "\n{";
    $result .= "\n" . 'global $db_config;'; // 数据库连接参数
    $result .= "\n" . '$this->_db=parent::getInstance($db_config);';
    $result .= "\n" . '$this->_tablename = \'' . $tablePre . $tableName . '\';';
    $result .= "\n}";

    // 获得表的主键id字段
    $kFields = tablePri($res);

    // 添加一行数据操作方法
    $result .= addMethodAnnotation('添加一行数据');
    $result .= "\n" . 'public function ' . $tableName . 'Add(' . $tableName . 'Dmodel $' . $tableName . ')';
    $result .= "\n{";
    $result .= "\ntry{";
    $result .= "\n" . 'if(! $' . $tableName . ' instanceof ' . $tableName . 'Dmodel)return false;';
    $result .= "\n" . '$data = array();';
    foreach ($res as $v) {
        $result .= "\n" . 'if($users->get' . $v['Field'] . '() !== null){';
        $result .= '$data[\'' . $v['Field'] . '\']=$users->get' . $v['Field'] . '();}';
    }
    $result .= "\n" . 'return $this->_db->insert($this->_tablename, $data);';
    $result .= "\n" . '}catch (Exception $e) {';
    $result .= 'throw $e;';
    $result .= "\n}";
    $result .= "\n}";

    // 根据条件查询列表操作方法
    $result .= addMethodAnnotation('根据条件查询列表');
    $result .= "\n" . 'public function ' . $tableName . 'List($fields="*",$wheresql="1=:a",$where=array(":a" =>1))';
    $result .= "\n{";
    $result .= "\ntry{";
    $result .= "\n" . '$sql = "SELECT " . $fields . " FROM $this->_tablename WHERE $wheresql";';
    $result .= "\n" . 'return $this->_db->queryAll($sql, $where);';
    $result .= "\n" . '}catch (Exception $e) {';
    $result .= 'throw $e;';
    $result .= "\n}";
    $result .= "\n}";

    // 根据条件查询记录数操作方法
    $result .= addMethodAnnotation('根据条件查询记录数');
    $result .= "\n" . 'public function ' . $tableName . 'Count($wheresql = "1=:a", $where = array(":a"=>1))';
    $result .= "\n{";
    $result .= "\ntry{";
    $result .= "\n" . 'return $this->_db->count($this->_tablename, $wheresql, $where);';
    $result .= "\n" . '}catch (Exception $e) {';
    $result .= 'throw $e;';
    $result .= "\n}";
    $result .= "\n}";

    // 根据主键id查询记录数操作方法
    $result .= addMethodAnnotation('根据主键id查询记录数');
    $result .= "\n" . 'public function ' . $tableName . 'ArrayRow($id, $fields = "*")';
    $result .= "\n{";
    $result .= "\ntry{";
    $result .= "\n" . '$sql = "select " . $fields . " from " . $this->_tablename . " where ' . $kFields . '=:' . $kFields . '";';
    $result .= "\n" . '$where=array(\'' . $kFields . '\'=>$id);';
    $result .= "\n" . 'return $this->_db->queryAll($sql, $where);';
    $result .= "\n" . '}catch (Exception $e) {';
    $result .= 'throw $e;';
    $result .= "\n}";
    $result .= "\n}";

    // 更新一行数据操作方法
    $result .= addMethodAnnotation('更新一行数据');
    $result .= "\n" . 'public function ' . $tableName . 'Update(' . $tableName . 'Dmodel $' . $tableName . ')';
    $result .= "\n{";
    $result .= "\ntry{";
    $result .= "\n" . 'if(! $' . $tableName . ' instanceof ' . $tableName . 'Dmodel)return false;';
    $result .= "\n" . 'if($' . $tableName . '->get' . $kFields . '==null&&$' . $tableName . '->get' . $kFields . '==0)return false;';
    $result .= "\n" . '$data = array();';
    foreach ($res as $v) {
        $result .= "\n" . 'if($users->get' . $v['Field'] . '() !== null){';
        $result .= '$data[\'' . $v['Field'] . '\']=$users->get' . $v['Field'] . '();}';
    }
    $result .= "\n" . '$where[' . $kFields . '] = $users->get' . $kFields . '();';
    $result .= "\n" . 'return $this->_db->updata($this->_tablename, $data, $where);';
    $result .= "\n" . '}catch (Exception $e) {';
    $result .= 'throw $e;';
    $result .= "\n}";
    $result .= "\n}";

    // 根据where条件更新数据操作方法
    $result .= addMethodAnnotation('根据where条件更新数据');
    $result .= "\n" . 'public function ' . $tableName . 'WhereUpdate(' . $tableName . 'Dmodel $' . $tableName . ',$where=array("1"=>2))';
    $result .= "\n{";
    $result .= "\ntry{";
    $result .= "\n" . 'if(! $' . $tableName . ' instanceof ' . $tableName . 'Dmodel)return false;';
    $result .= "\n" . '$data = array();';
    foreach ($res as $v) {
        $result .= "\n" . 'if($users->get' . $v['Field'] . '() !== null){';
        $result .= '$data[\'' . $v['Field'] . '\']=$users->get' . $v['Field'] . '();}';
    }
    $result .= "\n" . 'return $this->_db->updata($this->_tablename, $data, $where);';
    $result .= "\n" . '}catch (Exception $e) {';
    $result .= 'throw $e;';
    $result .= "\n}";
    $result .= "\n}";

    // 删除一行数据操作方法
    $result .= addMethodAnnotation('删除一行数据');
    $result .= "\n" . 'public function ' . $tableName . 'Delete($id)';
    $result .= "\n{";
    $result .= "\ntry{";
    $result .= "\n" . ' return $this->_db->delete($this->_tablename, array(\'' . $kFields . '\' => $id));';
    $result .= "\n" . '}catch (Exception $e) {';
    $result .= 'throw $e;';
    $result .= "\n}";
    $result .= "\n}";

    // 根据where删除数据操作方法
    $result .= addMethodAnnotation('根据where删除数据');
    $result .= "\n" . 'public function ' . $tableName . 'WhereDelete($where)';
    $result .= "\n{";
    $result .= "\ntry{";
    $result .= "\n" . ' return $this->_db->delete($this->_tablename, $where);';
    $result .= "\n" . '}catch (Exception $e) {';
    $result .= 'throw $e;';
    $result .= "\n}";
    $result .= "\n}";

    // 根据一行数据返回Dmodel对象操作方法
    $result .= addMethodAnnotation('根据一行数据返回Dmodel对象');
    $result .= "\n" . 'public function ' . $tableName . 'Dmodel(array $row)';
    $result .= "\n{";
    $result .= "\n" . '$'.$tableName.'=new '. $tableName. 'Dmodel();';
    $result .= "\n" . 'if(!empty($row))';
    $result .= "\n{";
    foreach ($res as $v){
        $result .= "\n" . 'isset($row["'.$v['Field'].'"])?$users->set'.$v['Field'].'($row["'.$v['Field'].'"]):"";';
    }
    $result .= "\n}";
    $result .= "\n" . 'return $'.$tableName.';';
    $result .= "\n}";

    // class end
    $result .= "\n}";
    $result .= " \n ?>";

    return $result;
}

/**
 * 添加类注释
 *
 * @param unknown $fileName            
 * @param unknown $fun            
 * @param unknown $des            
 * @param unknown $date            
 * @param unknown $author            
 */
function addAnnotation($fileName, $fun, $des, $f = false)
{
    $annStr = "\n/**";
    $annStr .= "\n* 文件名：" . $fileName;
    if ($f) {
        $annStr .= "\n* 功能：    数据层";
    } else {
        $annStr .= "\n* 功能：    模型层-表-" . $fun;
    }
    $annStr .= "\n* 描述：    " . $des;
    $annStr .= "\n* 日期：    " . date('y-m-d', time());
    $annStr .= "\n* 版权：    Copyright © 2016 github.com/JoeXiong All Rights Reserved";
    $annStr .= "\n* @author JoeXiong";
    $annStr .= "\n*/";
    return $annStr;
}

/**
 * 添加方法注释
 *
 * @param unknown $des            
 */
function addMethodAnnotation($des, $param = array())
{
    $annStr = "\n/**";
    $annStr .= "\n* " . $des;
    $annStr .= "\n*/";
    return $annStr;
}

/**
 * * 连接数据库，查询表结构
 *
 * @param unknown $array
 *            数据库连接参数
 * @param unknown $tableName
 *            表名
 */
function linkdb($array, $tableName)
{
    $mysql_server_name = $array['host']; // 改成自己的mysql数据库服务器
    $mysql_username = $array['username']; // 改成自己的mysql数据库用户名
    $mysql_password = $array['password']; // 改成自己的mysql数据库密码
    $mysql_database = $array['dbname']; // 改成自己的mysql数据库名
    $conn = mysql_connect($mysql_server_name, $mysql_username, $mysql_password) or die("error connecting"); // 连接数据库
    mysql_query("set names " . $array['charset']); // 数据库输出编码
    mysql_select_db($mysql_database); // 打开数据库

    $sql = "SHOW FULL COLUMNS FROM $tableName";
    $res = mysql_query($sql);
    $res = dataTable($res);

    return $res;
}

/**
 * 返回到表集合
 *
 * @param query $query            
 * @return array
 */
function dataTable($query)
{
    if ($query) {
        $ListTable = array();
        while ($rows = mysql_fetch_array($query, MYSQL_ASSOC)) {
            array_push($ListTable, $rows);
        }
        return $ListTable;
    } else {
        return 0;
    }
}

/**
 * 获得表结构的主键
 *
 * @param unknown $res            
 */
function tablePri($res)
{
    foreach ($res as $v) {
        if ($v['Key'] == 'PRI')
            return $v['Field'];
        exit();
    }
}
