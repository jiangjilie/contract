<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>行政合同更改</title>
		<script src="js/jquery-1.10.2.min.js"></script>
		
	</head>
	<body>
				<?php
				//声明变量并接受form表单发送过来的数据
					$id =  $_POST['id'];
					$user =  $_POST['user'];
					$htbh = $_POST['htbh']; 
					$xmbh = $_POST['xmbh'];
					$xmmc = $_POST['xmmc'];
					$dwmc = $_POST['dwmc'];
					$htmc = $_POST['htmc'];
					$htlx = $_POST['htlx'];
					$lxr = $_POST['lxr'];
					$qdsj = $_POST['qdsj'];
					$qdsj = str_replace("-",".",$qdsj);
					$htgq = $_POST['htgq'];				
					$fkfs = $_POST['fkfs'];
					$jsfs = $_POST['jsfs'];
					$htze = $_POST['htze'];
					$yfk = $_POST['yfk'];
					$wfk = $_POST['wfk'];
					$fkpz = $_POST['fkpz'];
					$htnr = $_POST['htnr'];
					$bz = $_POST['bz'];
					$nd = substr($qdsj,0,4);
					$yf = substr($qdsj,5,2);
					$chtmc = $_POST['chtmc'];
					$cxmmc = $_POST['cxmmc'];
					$cdwmc = $_POST['cdwmc'];
				//连接数据库
					$con = mysql_connect("localhost","root","123456");
					if(!$con){
					echo "<br/>数据库连接失败".mysql_error();
					}
				//选择数据库
					mysql_select_db("contract");
					//设置mysql字符编码
					mysql_query("set names utf8;");
				//插入数据到用户日志表
				$insert = "insert into user (user,czlx,htlx,htmc) values('$user','修改','行政合同','$dwmc>$htmc')";
				 mysql_query($insert);
				 //updat语句 （更新数据）
				  // $update1="update contract set nd='{$nd}',yf='{$yf}',xmmc='{$xmmc}',htlx='{$htlx}',htbh='{$htbh}',xmbh='{$xmbh}',dwmc='{$dwmc}',lxr='{$lxr}',htmc='{$htmc}',srhtze='{$htze}',yfk='{$yfk}',wfk='{$wfk}',bz='{$bz}' where xmmc='$cxmmc' and dwmc='$cdwmc' and htmc='$chtmc' and ishtlx=2 ";
				  // mysql_query($update1);
				//updat语句 （更新数据）
				 $update="update administrative set nd='{$nd}',yf='{$yf}',htbh='{$htbh}',dwmc='{$dwmc}',htmc='{$htmc}',lxr='{$lxr}',qdsj='{$qdsj}',htze='{$htze}',yfk='{$yfk}',wfk='{$wfk}',fkpz='{$fkpz}',bz='{$bz}' where id=$id";
				 $res_update=mysql_query($update);
				 // if($res_update){
					//  echo "<script>
					//  window.location.href='administrative.php?user=$user';
					//  </script>";
				 // } 
				 ?>
	</body>
</html>
