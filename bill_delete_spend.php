<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>删除</title>	
		<script src="js/jquery-1.10.2.min.js"></script>
	</head>
	<body>
			<?php
			//声明变量并接受form表单发送过来的数据
				$user = $_GET['user'];
				$id = $_GET['id'];			
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
				$je=$row["jshj"];
				// spend表
				$sql="select htze,yfk from spend where htbh='$htbh' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$shtze=$row["htze"];
				$syfk=$row["yfk"];
				
				$syfk=$syfk-$je;
				$swfk=$shtze-$syfk;
				// 更新spend数据
				$update = "update spend set yfk='$syfk',wfk='$swfk' where  htbh='$htbh' ";
				mysql_query($update);
				
				//contract表
				$sql="select srhtze,ysk,zchtze,yfk  from contract where htbh='$htbh' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$csrze=$row["srhtze"];
				$cysk=$row["ysk"];
				$czcze=$row["zchtze"];
				$cyfk=$row["yfk"];	
													
				$cysk=$cysk-$je;
				$cgsk=$csrze-$cysk;					
				$cyfk=$cyfk+$je;
				$cwfk=$czcze-$cyfk;
				//更新contract数据
				$update = "update contract set yfk='$cyfk',wfk='$cwfk' where  htbh='$htbh' ";
				mysql_query($update);
			//delete语句（删除数据）
				$del = "delete from bill  where id=$id";
				$res_del = mysql_query($del);
				if($res_del){
					echo "<script>
					 window.location.href='bill_spend.php?htbh=$htbh';
					 </script>";
				}
			
			 ?>
	    </body>
</html>