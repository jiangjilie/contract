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
				$id = $_GET['id'];
			
			//连接数据库
				$con = mysql_connect("localhost","root","123456");
				if(!$con){
				echo "<br/>数据库连接失败".mysql_error();
				}
			//选择数据库
				mysql_select_db("contract");
				//设置mysql字符编码
				mysql_query("set names utf8;");	
			//delete语句（删除数据）
				$sql="select admin from admin where id=$id";
				$result=mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$admin=$row["admin"];
				$del = "delete from menu where admin='$admin'";
				mysql_query($del);
				$del = "delete from admin where id=$id";
				$res_del = mysql_query($del);
				if($res_del){
					echo "<script>
					 window.location.href='user.php';
					 </script>";
				}
			
			 ?>
	    </body>
</html>