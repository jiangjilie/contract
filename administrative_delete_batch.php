<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>收入合同删除</title>	
		<script src="js/jquery-1.10.2.min.js"></script>
	</head>
	<body>
			<?php
			//声明变量并接受form表单发送过来的数据
				$id = $_POST['id'];	
				$arr = explode(',', $id);   //ajax传过来的是字符串需要转化为数组
				$countp=count($arr);//计算id数组长度
			//连接数据库
				$con = mysql_connect("localhost","root","123456");
				if(!$con){
				echo "<br/>数据库连接失败".mysql_error();
				}
			//选择数据库
				mysql_select_db("contract");
				//设置mysql字符编码
				mysql_query("set names utf8;");	
				for($i=0;$i<$countp;$i++ ){
					$sql = "select htbh from administrative where id=$arr[$i]";//查询语句
					$result=mysql_query($sql);
					$row = mysql_fetch_assoc($result);
					$htbh = $row['htbh'];
					$del2 = "delete from bill where htbh='$htbh' and ishtlx=3";
					mysql_query($del2);
					//delete语句（删除数据）
					$del = "delete from administrative where id=$arr[$i]";
					mysql_query($del);
				}
				// echo json_encode($arr);//输出json数据
			
			 ?>
	    </body>
</html>