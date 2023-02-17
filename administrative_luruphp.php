<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>行政合同录入</title>
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
					$htlx = $_POST['htlx'];
					$lxr = $_POST['lxr'];
					$qdsj = $_POST['qdsj'];
					$qdsj = str_replace("-",".",$qdsj);
					$htgq = $_POST['htgq'];
					// $dept = $_POST['dept'];
					// $begin = $_POST['begin'];
					// $finish = $_POST['finish'];
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
					$insert1 = "insert into user (user,czlx,htlx,htmc) values('$url','添加','行政合同','$htmc>$dwmc')";
					mysql_query($insert1);
					// insert语句（插入contract数据，新增）
					// $insert3 = "insert into contract (nd,yf,xmmc,htlx,htbh,xmbh,dwmc,htmc,lxr,srhtze,yfk,wfk,bz,ishtlx) values('$nd','$yf','$xmmc','$htlx','$htbh','$xmbh','$dwmc','$htmc','$lxr','$htze','$yfk','$wfk','$bz','2')";
					// mysql_query($insert3);
				// insert语句（插入数据，新增）
					$insert2 = "insert into administrative (nd,yf,htbh,htmc,dwmc,qdsj,lxr,htze,yfk,wfk,fkpz,bz) values('$nd','$yf','$htbh','$htmc','$dwmc','$qdsj','$lxr','$htze','$yfk','$wfk','$fkpz','$bz')";
					$res_insert = mysql_query($insert2);
					// if($res_insert){
					//  echo "<script>
					//  window.location.href='administrative.php?user=$user';
					//  </script>";
					// }						
				 ?>
	</body>
</html>
