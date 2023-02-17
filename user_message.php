<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>档案查询</title>
		<script src="js/jquery-1.10.2.min.js"></script>
		</head>
				<?php
				//声明变量并接受form表单发送过来的数据
					$admin = $_GET['admin']; 
					$password = $_GET['password'];
					$phone = $_GET['phone'];
					$bank = $_GET['bank'];
					$bz = $_GET['beizhu'];
				
				//连接数据库
					$con = mysql_connect("localhost","root","123456");
					if(!$con){
					echo "<br/>数据库连接失败".mysql_error();
					}
				//选择数据库
					mysql_select_db("dagl");
					//设置mysql字符编码
					mysql_query("set names utf8;");
				// insert语句（插入数据，新增）
					// $insert = "insert into admin (admin,password,bz) values ('$admin','$password','$bz')";
					// $res_insert = mysql_query($insert);
					// if($res_insert){
					//  echo "<script>
					//  layer.msg('注册成功');
					//  </script>";
					// }
				
				
				// updat语句 （更新数据）
				 $update="update admin set password='{$password}',phone='{$phone}',bank='{$bank}',bz='{$bz}' where admin='{$admin}'";
				 $res_update=mysql_query($update);
				 if($res_update){
					 echo "<script>
					   window.location.href='index_contract.php';
					 </script>";
				 } 
				 ?>
	    </body>