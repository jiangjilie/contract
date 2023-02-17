<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>发票信息修改</title>
		<script src="js/jquery-1.10.2.min.js"></script>
		
	</head>
	<body>
				<?php
				//声明变量并接受form表单发送过来的数据
					$user = $_POST['user'];			
					$setting = $_POST['setting'];
					$kprq = $_POST['kprq'];
					$kprq = str_replace("-",".",$kprq);
					$nd = substr($kprq,0,4);
					$yf = substr($kprq,5,2);
					$id = $_POST['id'];	
					$htbh=$setting['htbh'];
					$xje=$setting['jshj'];  //修改过后的金额
					$yje= $_POST['yjshj'];	//原来的金额
					$xse=$setting['se'];	//新税额
					$yse=$setting['yse'];	//原税额
				//连接数据库
					$con = mysql_connect("localhost","root","123456");
					if(!$con){
					echo "<br/>数据库连接失败".mysql_error();
					}
				//选择数据库
					mysql_select_db("contract");
					//设置mysql字符编码
					mysql_query("set names utf8;");
						
			
				$fields=array('lb','pzh','fgld','sqr','fpzl','sl','fphm','kpdw','kpnr','fpnr','je','se','jshj','bz','htbh','xmbh');//这个是特意设置校验字典，校验提交的字段是否存在
				   	// $sql = '';
				   foreach($setting as $k=>$v) {
				            if(in_array($k, $fields)) $sql .= ",$k='$v'";
				        }
				 $sql = substr($sql, 1);
				 $sql="UPDATE invoice SET $sql,kprq='{$kprq}',yf='{$yf}',nd='{$nd}' WHERE id=$id";
					$res_insert = mysql_query($sql);
					// if($res_insert){
					//  echo "<script>
					//   window.location.href='invoice.php?user=$user';
					//  </script>";
					// }
					
					// insert语句（插入user数据，新增）
					$insert1 = "insert into user (user,czlx,htlx,htmc) values('$user','修改','发票','$htbh')";
					mysql_query($insert1);
					
					@$sql="select srse  from contract where htbh='$htbh' ";
					@$result = mysql_query($sql);
					@$row = mysql_fetch_assoc($result);
					@$csrse=$row["srse"];
					@$rowse=$xse-$yse;
					@$csrse=$csrse+$rowse;
					
					@$sql="select ykp from income where htbh='$htbh' ";
					@$result = mysql_query($sql);
					@$row = mysql_fetch_assoc($result);
					// $ihtze=$row["htze"];
					// $iysk=$row["ysk"];
					@$ykp=$row["ykp"];			
					@$rowje=$xje-$yje;
					
					@$ykp=$ykp+$rowje;
					
					
					// $cysk=$cysk+$rowje;
					// $cgsk=$chtze-$cysk;
					// $iysk=$iysk+$rowje;
					// $igsk=$ihtze-$iysk;
					
					//更新contract
					@$update = "update contract set srse='$csrse' where  htbh='$htbh' ";
					@mysql_query($update);
					//更新income
					@$update = "update income set ykp='$ykp' where htbh='$htbh'";
					@mysql_query($update);
					
					//判断合同是否是单价合同，若是则合同总额与开票价税合计同步
					@$sql="select htze from income where htbh='$htbh' ";
					@$result = mysql_query($sql);
					@$row = mysql_fetch_assoc($result);
					@$htze=$row["htze"];
					@$htze=$htze+$rowje;
					
					@$sql="select srhtze  from contract where htbh='$htbh' ";
					@$result = mysql_query($sql);
					@$row = mysql_fetch_assoc($result);
					@$srhtze=$row["srhtze"];									
					@$srhtze=$srhtze+$rowje;
					
					@$sql="select begin from income where htbh='$htbh' ";
					@$result = mysql_query($sql);
					@$row = mysql_fetch_assoc($result);
					@$begin=$row['begin'];
					@if($begin==1){
						@$update = "update income set htze='$htze' where  htbh='$htbh'";
						@mysql_query($update);
						@$update = "update contract set srhtze='$srhtze' where  htbh='$htbh'";
						@mysql_query($update);
					}
				 ?>
	</body>	
</html>
