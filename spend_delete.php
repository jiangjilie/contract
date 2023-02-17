<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>支出合同删除</title>
		<script src="js/jquery-1.10.2.min.js"></script>
	</head>
	<body>
			<?php
			//声明变量并接受form表单发送过来的数据
				$id = $_POST['id'];
				$user = $_GET['user'];
			//连接数据库
				$con = mysql_connect("localhost","root","123456");
				if(!$con){
				echo "<br/>数据库连接失败".mysql_error();
				}
			//选择数据库
				mysql_select_db("contract");
				//设置mysql字符编码
				mysql_query("set names utf8;");
				$sql = "select * from spend where id=$id";//查询语句
				$result=mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$htmc = $row['htmc'];
				$xmmc = $row['xmmc'];
				$dwmc = $row['dwmc'];
				$htbh = $row['htbh'];
				$url=$_SERVER['HTTP_REFERER'];
				$url=urldecode($url);  //还原 URL 编码字符串.对url的中文进行处理显示
				$url=substr($url,strpos($url,'=')+1,30);  //substr截取字符串， strpos查找字符串位置
			//插入数据到用户日志表
			$insert = "insert into user (user,czlx,htlx,htmc) values('$url','删除','支付合同','$xmbh-->$htbh')";
			 mysql_query($insert);
			 //从contract 中删除
			 $del2 = "delete from contract where htbh='$htbh' ";
			 mysql_query($del2);
			 $del2 = "delete from bill where htbh='$htbh' ";
			 mysql_query($del2);
			//delete语句（删除数据）
			$del = "delete from spend where id=$id";
			$res_del = mysql_query($del);
			// if($res_del){
			// 	echo "<script>
			// 	 window.location.href='spend_php.php?user=$user';
			// 	 </script>";
			// }
			
			 ?>
	    </body>
</html>