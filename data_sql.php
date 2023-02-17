<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>数据统计</title>
<?php
$db = '';
$base = 'contract';//数据库名称
$data = show_db($db, $base);
echo($data);

// 获取数据库信息
function show_db($db, $base)
{
    $data = '<h1>数据库设计说明书(' . $db . ')</h1>';
    $tables = show_tables($base);
    foreach ($tables as $key => $val) {
        $table = current($val);
        $table_annotation =current(table_annotation($table,$base)); //表的注释
        $data .= '<table border="1" cellspacing="0">';
        $data .= '<caption><h2>' . $key . $table .$table_annotation. '</h2></caption>';
        $data .= '<tr bgcolor="#cccccc"><th width="130">字段名称</th><th width="200">类型（长度）</th><th width="180">主键</th><th width="80">不是空</th><th width="80">默认</th><th width="80">注释</th></tr>';
        $fields = describe($table, $base);
        foreach ($fields as $item) {
            $data .= '<tr><td>' . $item['column_name'] . '</td><td>' . $item['column_type'] . '</td><td>' . $item['column_key'] . '</td><td>' . $item['is_nullable'] . '</td><td>' . ($item['column_default'] ? $item['column_default'] : '&nbsp') . '</td><td>' . ($item['column_comment'] ? $item['column_comment'] : '&nbsp') . '</td></tr>';
        }
        $data .= '</table>';
        $data .= '<br/>';
    }
    $data .= '';
    return $data;
}

// 获取全部数据表
function show_tables($base)
{
    $sql = "SHOW TABLES";
    return query($sql, $base);
}

// 获取数据表结构信息
function describe($table, $base)
{
    $sql = "SELECT  column_name,column_type, column_key, is_nullable, column_default, column_comment, character_set_name FROM information_schema.COLUMNS WHERE table_schema = '$base' AND table_name = '$table'";
    return query($sql, $base);
}

//获取表数据表名注释信息
function table_annotation($table, $base)
{
    $sql = "SELECT table_comment FROM	information_schema.tables WHERE	table_schema = '$base' 	AND table_name = '$table'";

    return query($sql, $base);
}

// 执行SQL
function query($sql, $base)
{
    //连接数据库
    $mysqli = mysqli_connect("localhost", "root", "123456", $base);
    $res = mysqli_query($mysqli, $sql);

    if (!$res) {
        die('Invalid query: ' . mysqli_error());
    }
    $list = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $list[] = $row;
    }
    return $list;
}

?>

