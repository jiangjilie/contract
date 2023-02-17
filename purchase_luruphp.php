<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>收入合同录入</title>
		<script src="js/jquery-1.10.2.min.js"></script>
		
	</head>
	<body>
				<?php
				//声明变量并接受form表单发送过来的数据
					$user = $_POST['user'];			
					$htbh = $_POST['htbh']; 
					$xmbh = $_POST['xmbh'];
					$xmmc = $_POST['xmmc'];
					$dwmc = $_POST['dwmc'];
					$htmc = $_POST['htmc'];
					$lxr = $_POST['lxr'];
					$qdsj = $_POST['fksj'];
					$qdsj = str_replace("-",".",$qdsj);

					$fkje = $_POST['fkje'];
					$pzh = $_POST['pzh'];					
					$bz = $_POST['bz'];
					$zy = $_POST['zy'];
					$se=$_POST['se'];
					$nd = substr($qdsj,0,4);
					$yf = substr($qdsj,5,2);
				$url=$_SERVER['HTTP_REFERER'];
				$url=urldecode($url);  //还原 URL 编码字符串.对url的中文进行处理显示
				$url=substr($url,strpos($url,'=')+1,30);  //substr截取字符串， strpos查找字符串位置
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
				$insert1 = "insert into user (user,czlx,htlx,htmc) values('$url','添加','零星采购合同','$xmmc-->$dwmc-->$htmc')";
				mysql_query($insert1);
				// insert语句（插入contract数据，新增）
				$insert3 = "insert into contract (nd,yf,xmbh,xmmc,dwmc,htmc,lxr,fkje,bz,ishtlx,lxse,qdsj) values('$nd','$yf','$xmbh','$xmmc','$dwmc','$htmc','$lxr','$fkje','$bz',3,'$se','$pzh')";
				mysql_query($insert3);
				// insert语句（插入数据，新增）
					$insert2 = "insert into purchase (nd,yf,xmbh,xmmc,dwmc,htmc,lxr,fkje,fksj,pzh,bz,se,zy) values('$nd','$yf','$xmbh','$xmmc','$dwmc','$htmc','$lxr','$fkje','$qdsj','$pzh','$bz','$se','$zy')";
					$res_insert = mysql_query($insert2);
					// if($res_insert){
					//  echo "<script>
					//   window.location.href='purchase.php?user=$user';
					//  </script>";
					// }
				 ?>
	</body>
	
</html>
