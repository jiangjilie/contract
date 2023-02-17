<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>录入</title>
		<script src="js/jquery-1.10.2.min.js"></script>
		
	</head>
	<body>
				<?php
				//声明变量并接受form表单发送过来的数据						
					$htbh = $_GET['htbh'];
					$xmbh = $_GET['xmbh'];
					$xmmc = $_GET['xmmc'];
					$dwmc = $_GET['dwmc'];
					$htmc = $_GET['htmc'];				
					$je = $_GET['yfk'];				
					$pzh = $_GET['pzh'];				
					$kprq = $_GET['kprq'];
					$kprq = str_replace("-",".",$kprq);	
					$bz = $_GET['bz'];
					$number = $_GET['number'];
				//连接数据库
					$con = mysql_connect("localhost","root","123456");
					if(!$con){
					echo "<br/>数据库连接失败".mysql_error();
					}
				//选择数据库
					mysql_select_db("contract");
					//设置mysql字符编码
					mysql_query("set names utf8;");	
				$insert = "insert into bill (htbh,xmbh,xmmc,jfdw,htmc,jshj,pzh,kprq,ishtlx,number,bz,isxs) values('$htbh','$xmbh','$xmmc','$dwmc','$htmc','$je','$pzh','$kprq','2','$number','$bz','1')";
				$res_insert = mysql_query($insert);
				
				// spend表
				$sql="select htze,yfk from spend where htbh='$htbh' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$shtze=$row["htze"];
				$syfk=$row["yfk"];
				
				$syfk=$syfk+$je;
				$swfk=$shtze-$syfk;
				
				//contract表
				$sql="select srhtze,ysk,zchtze,yfk  from contract where htbh='$htbh' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$csrze=$row["srhtze"];
				$cysk=$row["ysk"];
				$czcze=$row["zchtze"];
				$cyfk=$row["yfk"];	
													
				$cysk=$cysk+$je;
				$cgsk=$csrze-$cysk;					
				$cyfk=$cyfk+$je;
				$cwfk=$czcze-$cyfk;
					
				
				//更新contract数据
				$update = "update contract set ysk='$cysk',gsk='$cgsk' where  htbh='$htbh' and ishtlx='1'";
				mysql_query($update);
				$update = "update contract set yfk='$cyfk',wfk='$cwfk' where  htbh='$htbh' and ishtlx='2'";
				mysql_query($update);
			
				 // 更新spend
				$update = "update spend set yfk='$syfk',wfk='$swfk',date='$kprq'where  htbh='$htbh'";
				 mysql_query($update);
				 
				// insert语句（插入bill数据，新增）
			
				if($res_insert){
				 echo "<script>
				  window.location.href='bill_spend.php?htbh=$htbh';
				 </script>";
				}
				 ?>
	</body>
	
</html>
