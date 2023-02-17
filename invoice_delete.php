<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>发票删除</title>	
		<script src="js/jquery-1.10.2.min.js"></script>
	</head>
	<body>
			<?php
			//声明变量并接受form表单发送过来的数据
				$user = $_POST['user'];
				$id = $_POST['id'];
			
			//连接数据库
				$con = mysql_connect("localhost","root","123456");
				if(!$con){
				echo "<br/>数据库连接失败".mysql_error();
				}
			//选择数据库
				mysql_select_db("contract");
				//设置mysql字符编码
				mysql_query("set names utf8;");	
				$sql = "select * from invoice where id=$id";//查询语句
				$result=mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$kpdw = "{$row['kpdw']}";
				$kpnr = "{$row['kpnr']}";
				$fpnr = "{$row['fpnr']}";
				$htbh=$row['htbh'];
				$je=$row['jshj'];
				$se=$row['se'];
				$url=$_SERVER['HTTP_REFERER'];
				$url=urldecode($url);  //还原 URL 编码字符串.对url的中文进行处理显示
				$url=substr($url,strpos($url,'=')+1,30);  //substr截取字符串， strpos查找字符串位置
				//插入数据到用户日志表
				$insert = "insert into user (user,czlx,htlx,htmc) values('$url','删除','发票','$kpdw-->$kpnr-->$fpnr')";
				 mysql_query($insert);
			
				
				//income表
				$sql="select ykp from income where htbh='$htbh' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				// $ihtze=$row["htze"];
				$iysk=$row["ykp"];
				
				$iysk=$iysk-$je;
				// $igsk=$ihtze-$iysk;
				//更新income数据
				$update = "update income set ykp='$iysk' where  htbh='$htbh'";
				mysql_query($update);
				
				//contract表
				$sql="select srse  from contract where htbh='$htbh' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$csrse=$row["srse"];
				// $rowse=$xse-$yse;
				$csrse=$csrse-$se;
													
				// $cysk=$cysk-$je;
				// $cgsk=$csrze-$cysk;					
				// $cyfk=$cyfk+$je;
				// $cwfk=$czcze-$cyfk;
				//更新contract数据
				$update = "update contract set srse='$csrse' where  htbh='$htbh' ";
				mysql_query($update);
				
				//delete语句（删除数据）
					$del = "delete from invoice where id=$id";
					$res_del = mysql_query($del);
				// if($res_del){
				// 	echo "<script>
				// 	 window.location.href='invoice.php?user=$user';
				// 	 </script>";
				// }
				
				//判断合同是否是单价合同，若是则合同总额与开票价税合计同步
				$sql="select htze from income where htbh='$htbh' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$htze=$row["htze"];
				$htze=$htze-$je;
				
				$sql="select srhtze  from contract where htbh='$htbh' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$srhtze=$row["srhtze"];									
				$srhtze=$srhtze-$je;
				
				$sql="select begin from income where htbh='$htbh' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$begin=$row['begin'];
				if($begin==1){
					$update = "update income set htze='$htze' where  htbh='$htbh'";
					mysql_query($update);
					$update = "update contract set srhtze='$srhtze' where  htbh='$htbh'";
					mysql_query($update);
				}
			
			 ?>
	    </body>
</html>