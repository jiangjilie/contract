<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title></title>	
		<script src="js/jquery-1.10.2.min.js"></script>
	</head>
	<body>
			<?php
			//声明变量并接受form表单发送过来的数据
			$user = $_GET['user'];
			$id = $_GET['id'];			
			$number = $_GET['number'];			
			$pzh = $_GET['pzh'];			
			$kprq = $_GET['kprq'];
			$kprq = str_replace("-",".",$kprq);	
			$yfk = $_GET['yfk'];			
			$ysk = $_GET['ysk'];			
			$bz = $_GET['bz'];			
			//连接数据库
				$con = mysql_connect("localhost","root","123456");
				if(!$con){
				echo "<br/>数据库连接失败".mysql_error();
				}
			//选择数据库
				mysql_select_db("contract");
				//设置mysql字符编码
				mysql_query("set names utf8;");	
				$sql = "select * from bill where id=$id";//查询语句
				$result=mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$htbh = $row['htbh'];
				$update = "update spend set date='$kprq' where  htbh='$htbh'";
				mysql_query($update);
			//delete语句（删除数据）
				$del = "update bill set yfk='$yfk',ysk='$ysk',bz='$bz',pzh='$pzh',kprq='$kprq' where id=$id ";
				$res_del = mysql_query($del);
				if($res_del){
					echo "<script>
					 window.location.href='bill_spend_invoice.php?htbh=$htbh';
					 </script>";
				}
			
			 ?>
	    </body>
</html>