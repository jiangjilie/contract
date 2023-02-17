<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>收入合同更改</title>
		<script src="js/jquery-1.10.2.min.js"></script>
		
	</head>
	<body>
				<?php
				//声明变量并接受form表单发送过来的数据
					$user =  $_POST['user'];
					$id =  $_POST['id'];
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
					$dept = $_POST['dept'];
					$begin = $_POST['begin'];
					$finish = $_POST['finish'];
					$fkfs = $_POST['fkfs'];
					$jsfs = $_POST['jsfs'];
					$htze = $_POST['htze'];
					$ysk = $_POST['ysk'];
					$gsk = $_POST['gsk'];
					$ykp = $_POST['ykp'];
					$kpmx = $_POST['kpmx'];
					$dept = $_POST['dept'];
					$bz = $_POST['bz'];
					$nd = substr($htbh,2,4);
					$yf = substr($qdsj,5,2);
					$chtmc = $_POST['chtmc'];
					$cxmmc = $_POST['cxmmc'];
					$cdwmc = $_POST['cdwmc'];
					$chtbh = $_POST['chtbh'];
					$begin=$_POST['begin'];
				
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
				$insert = "insert into user (user,czlx,htlx,htmc) values('$user','修改','收入合同','$xmbh-->$htbh')";
				 mysql_query($insert);
				 //updat语句 （更新数据）
				  $update1="update contract set nd='{$nd}',yf='{$yf}',xmmc='{$xmmc}',htlx='{$htlx}',htbh='{$htbh}',xmbh='{$xmbh}',dwmc='{$dwmc}',lxr='{$lxr}',htmc='{$htmc}',srhtze='{$htze}',ysk='{$ysk}',gsk='{$gsk}',bz='{$bz}',dept='{$dept}' where htbh='$chtbh'  ";
				  mysql_query($update1);
				//updat语句 （更新数据）
				 $update2="update income set nd='{$nd}',yf='{$yf}',htbh='{$htbh}',xmbh='{$xmbh}',xmmc='{$xmmc}',dwmc='{$dwmc}',htmc='{$htmc}',htlx='{$htlx}',lxr='{$lxr}',qdsj='{$qdsj}',htgq='{$htgq}',fkfs='{$fkfs}',jsfs='{$jsfs}',htze='{$htze}',ysk='{$ysk}',gsk='{$gsk}',ykp='{$ykp}',bz='{$bz}',kpmx='{$kpmx}',dept='{$dept}',begin='{$begin}' where id=$id";
				 $res_update=mysql_query($update2);
				 // if($res_update){
					//  echo "<script>					 
					//   window.location.href='income_php.php?user=$user';
					//  </script>";
				 // } 
				 
				 ?>
	</body>
</html>
