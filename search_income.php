<?php
$queryString = $_POST['queryString'];
require("dbconfig.php");//导入配置文件
$link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
mysql_select_db(DBNAME,$link);//选择数据库
mysql_query("set names 'utf8'");//选择字符集


$sql= "SELECT htbh FROM income WHERE htbh LIKE '%{$_POST['queryString']}%' LIMIT 10";
$query = mysql_query($sql);
if(!$query){
	return false;
}
if($query){
while ($result = mysql_fetch_assoc($query)){
$htbh=$result['htbh'];
echo '<li onClick="fill(\''.$htbh.'\');">'.$htbh.'</li>';
}
}
?>