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
					$setting = $_POST['setting'];
					$kprq = $_POST['kprq'];
					$kprq = str_replace("-",".",$kprq);
					$nd = substr($kprq,0,4);
					$yf = substr($kprq,5,2);
					$htbh=$setting['htbh'];
					$je=$setting['jshj'];
					$se=$setting['se'];
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
					// $sql="select htze from income where htbh='$htbh' ";
					// $result = mysql_query($sql);
					// $row = mysql_fetch_assoc($result);
					// $htze=$row['htze'];
					
					$sql="select count(*) as rows from invoice where htbh='$htbh' ";
					$result = mysql_query($sql);
					$row = mysql_fetch_assoc($result);
					
					if (!$result){      //$row 为0说明是第一次添加发票，则更新contract和income的数据-------------------------------------------
						$rows=1;
						//插入日志   新增
						$insert1 = "insert into user (user,czlx,htlx,htmc) values('$url','添加','发票','$htmc')";
						mysql_query($insert1);						
					}else{   //$row 不为0 说明有记录，那就在原有数据基础上更新------------------------------------------------					
						$rows=$row['rows']+1;
						//插入日志 更新
						$insert1 = "insert into user (user,czlx,htlx,htmc) values('$url','添加','发票','$htmc')";
						mysql_query($insert1);												
					}
					// insert语句（插入invoice数据，新增）
					$fields=array('lb','pzh','fgld','sqr','fpzl','sl','fphm','kpdw','kpnr','fpnr','je','se','jshj','skqk','bz','htbh','xmbh','xmmc','jfdw');//这个是特意设置校验字典，校验提交的字段是否存在
					foreach($setting as $k=>$v) {
					            if(in_array($k, $fields)) { $sqlk .= ','.$k; $sqlv .= ",'$v'"; }
					        }
					        $sqlk = substr($sqlk, 1);
					        $sqlv = substr($sqlv, 1);
						$insert = "INSERT INTO invoice ($sqlk,kprq,nd,yf,htmc,number,date) VALUES ($sqlv,'$kprq','$nd','$yf','$htmc','$rows','$kprq')";
						mysql_query($insert);
					
					//income表
					$sql="select ykp from income where htbh='$htbh' ";
					$result = mysql_query($sql);
					$row = mysql_fetch_assoc($result);
					// $ihtze=$row["htze"];
					// $iysk=$row["ysk"];
					$ykp=$row["ykp"];
					$ykp=$ykp+$je;
					// $iysk=$iysk+$je;
					// $igsk=$ihtze-$iysk;
					
					// spend表
					// $sql="select htze,yfk from spend where htbh='$htbh' ";
					// $result = mysql_query($sql);
					// $row = mysql_fetch_assoc($result);
					// $shtze=$row["htze"];
					// $syfk=$row["yfk"];
					
					// $syfk=$syfk+$je;
					// $swfk=$shtze-$syfk;
					
					//contract表
					$sql="select srse  from contract where htbh='$htbh' ";
					$result = mysql_query($sql);
					$row = mysql_fetch_assoc($result);
					$csrse=$row["srse"];
						
														
					$csrse=$csrse+$se;
					// $cgsk=$csrze-$cysk;					
					// $cyfk=$cyfk+$je;
					// $cwfk=$czcze-$cyfk;
	
					
					//更新contract数据
					$update = "update contract set srse='$csrse' where  htbh='$htbh' ";
					mysql_query($update);
					// $update = "update contract set yfk='$cyfk',wfk='$cwfk' where  htbh='$htbh' and ishtlx='2'";
					// mysql_query($update);
					 //更新income数据
					$update = "update income set ykp='$ykp' where  htbh='$htbh'";
					mysql_query($update);
					 // 更新spend
					// $update = "update spend set yfk='$syfk',wfk='$swfk' where  htbh='$htbh'";
					//  mysql_query($update);
					
				//判断合同是否是单价合同，若是则合同总额与开票价税合计同步
				$sql="select htze from income where htbh='$htbh' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$htze=$row["htze"];
				$htze=$htze+$je;
				
				$sql="select srhtze  from contract where htbh='$htbh' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$srhtze=$row["srhtze"];									
				$srhtze=$srhtze+$je;
				
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
					
					// if($res_insert){
					//  echo "<script>
					//   window.location.href='invoice.php?user=$user';
					//  </script>";
					// }
				 ?>
	</body>	
</html>
