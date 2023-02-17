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
				$id= $_POST['id'];
				$user = $_POST['user'];
				$htbh = $_POST['htbh']; 
				$xmbh = $_POST['xmbh'];
				$xmmc = $_POST['xmmc'];
				$dwmc = $_POST['dwmc'];
				// $htmc = $_POST['htmc'];
				// $lxr = $_POST['lxr'];
				$qdsj = $_POST['fksj'];
				$qdsj = str_replace("-",".",$qdsj);
			
				$fkje = $_POST['fkje'];
				$pzh = $_POST['pzh'];					
				$bz = $_POST['bz'];
				$zy = $_POST['zy'];
				$nd = substr($qdsj,0,4);
				$yf = substr($qdsj,5,2);
					$chtmc = $_POST['chtmc'];
					$cxmmc = $_POST['cxmmc'];
					$cdwmc = $_POST['cdwmc'];
					$cxmbh = $_POST['cxmbh'];
				$xse=$_POST['se'];
				$yse=$_POST['yse'];
				$ypzh=$_POST['ypzh'];

				//连接数据库
					$con = mysql_connect("localhost","root","123456");
					if(!$con){
					echo "<br/>数据库连接失败".mysql_error();
					}
				//选择数据库
					mysql_select_db("contract");
					//设置mysql字符编码
					mysql_query("set names utf8;");	
							
							$sql="select lxse  from contract where xmbh='$xmbh' ";
							$result = mysql_query($sql);
							$row = mysql_fetch_assoc($result);
							$clxse=$row["lxse"];
							$rowse=$xse-$yse;
							$clxse=$clxse+$rowse;
				//插入数据到用户日志表
				$insert = "insert into user (user,czlx,htlx,htmc) values('$user','修改','零星采购合同','$xmmc-->$dwmc-->$htmc')";
				 mysql_query($insert);
				 //updat语句 （更新数据）
				$update1="update contract set nd='{$nd}',yf='{$yf}',xmbh='{$xmbh}',xmmc='{$xmmc}',dwmc='{$dwmc}',fkje='{$fkje}',bz='{$bz}',lxse='{$clxse}',qdsj='{$pzh}' where xmbh='$xmbh' and qdsj='$ypzh' and ishtlx=3 ";
				mysql_query($update1);
				//updat语句 （更新数据）
				 $update2="update purchase set nd='{$nd}',yf='{$yf}',xmbh='{$xmbh}',xmmc='{$xmmc}',dwmc='{$dwmc}',fksj='{$qdsj}',fkje='{$fkje}',pzh='{$pzh}',bz='{$bz}',se='{$xse}',zy='{$zy}' where id=$id";
				 $res_update=mysql_query($update2);
				 // if($res_update){
					//  echo "<script>					 
					//   window.location.href='purchase.php?user=$user';
					//  </script>";
				 // } 
				 ?>
	</body>
</html>
