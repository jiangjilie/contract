<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>用户录入</title>
		<script src="js/jquery-1.10.2.min.js"></script>
		
	</head>
	<body>
				<?php
				//声明变量并接受form表单发送过来的数据
					$admin = $_POST['admin'];			
					$password = $_POST['password']; 
					$name = $_POST['name'];
					$phone = $_POST['phone'];
					$email = $_POST['email'];
					$role = $_POST['role'];
					$dept = $_POST['dept'];
					$bz = $_POST['bz'];
				//连接数据库
					$con = mysql_connect("localhost","root","123456");
					if(!$con){
					echo "<br/>数据库连接失败".mysql_error();
					}
				//选择数据库
					mysql_select_db("contract");
					//设置mysql字符编码
					mysql_query("set names utf8;");
				// insert语句（插入user数据，新增）
				$insert = "insert into admin (admin,password,name,phone,email,role,dept,bz) values('$admin','$password','$name','$phone','$email','$role','$dept','$bz')";
				$res_insert = mysql_query($insert);
				$insert = "insert into menu (admin) values('$admin')";
				$res_insert = mysql_query($insert);
					// if($res_insert){
					//  echo "<script>
					//   window.location.href='user.php';
					//  </script>";
					// }
				 ?>
	</body>
	
</html>
