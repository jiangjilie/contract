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
					$dept = $_POST['dept'];
					$bz = $_POST['bz'];
					$nd = substr($htbh,2,4);
					$yf = substr($qdsj,5,2);
					$yf=intval($yf);
					$begin=$_POST['begin'];
					// $date=date('Y-m-d', time());  //获取系统时间年月日
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
				$url=$_SERVER['HTTP_REFERER'];
				$url=urldecode($url);  //还原 URL 编码字符串.对url的中文进行处理显示
				$url=substr($url,strpos($url,'=')+1,30);  //substr截取字符串， strpos查找字符串位置
				$insert1 = "insert into user (user,czlx,htlx,htmc) values('$url','添加','收入合同','$xmbh-->$htbh')";
				mysql_query($insert1);
				// insert语句（插入contract数据，新增）
				$insert3 = "insert into contract (nd,yf,xmmc,htlx,htbh,xmbh,dwmc,htmc,lxr,srhtze,ysk,gsk,bz,ishtlx,dept) values('$nd','$yf','$xmmc','$htlx','$htbh','$xmbh','$dwmc','$htmc','$lxr','$htze','$ysk','$gsk','$bz','1','$dept')";
				mysql_query($insert3);
				// insert语句（插入数据，新增）
				// if($ysk!==''){
				// $insert = "insert into bill (htbh,jshj,ishtlx,isxs,,kprq) values('$htbh','$ysk','1','1','$qdsj')";
				// mysql_query($insert);
				// }
				// insert语句（插入income数据，新增）
					$insert2 = "insert into income (nd,yf,htbh,xmbh,xmmc,dwmc,htmc,htlx,lxr,qdsj,htgq,fkfs,jsfs,htze,ysk,gsk,ykp,bz,dept,begin) values('$nd','$yf','$htbh','$xmbh','$xmmc','$dwmc','$htmc','$htlx','$lxr','$qdsj','$htgq','$fkfs','$jsfs','$htze','$ysk','$gsk','$ykp','$bz','$dept','$begin')";
					$res_insert = mysql_query($insert2);
					// if($res_insert){
					//  echo "<script>
					//   window.location.href='income_php.php?user=$user';
					//  </script>";
					// }
					echo $htbh;
				 ?>
	</body>
	
</html>
