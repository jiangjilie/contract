<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>收入合同删除</title>	
		<script src="js/jquery-1.10.2.min.js"></script>
	</head>
	<body>
			<?php
			//声明变量并接受form表单发送过来的数据
				$id = $_POST['id'];	
				$arr = explode(',', $id);   //ajax传过来的是字符串需要转化为数组
				$countp=count($arr);//计算id数组长度
			//连接数据库
				$con = mysql_connect("localhost","root","123456");
				if(!$con){
				echo "<br/>数据库连接失败".mysql_error();
				}
			//选择数据库
				mysql_select_db("contract");
				//设置mysql字符编码
				mysql_query("set names utf8;");	
				for($i=0;$i<$countp;$i++ ){
					// $data=$arr[$i];
					$sql = "select htbh,jshj,se from invoice where id=$arr[$i]";//查询语句
					$result=mysql_query($sql);
					$row = mysql_fetch_assoc($result);
					$htbh = $row['htbh'];
					$je=$row['jshj'];
					$se=$row['se'];
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
						$del = "delete from invoice where id=$arr[$i]";
						$res_del = mysql_query($del);	
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
				}
				// echo json_encode($arr);//输出json数据
			
			 ?>
	    </body>
</html>