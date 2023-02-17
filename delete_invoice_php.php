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
			@$htbh = $_GET['htbh'];
			@$xmbh = $_GET['xmbh'];
			@$xmmc = $_GET['xmmc'];
			@$jfdw = $_GET['jfdw'];
			@$htmc = $_GET['htmc'];
			@$nd = $_GET['nd'];
			@$yf = $_GET['yf'];	
			@$kpdw = $_GET['kpdw'];	
			@$pzh = $_GET['pzh'];	
			@$begin=$_GET['begin'];
			@$finish=$_GET['finish'];
			@$begin=str_replace("-",".",$begin);
			@$finish=str_replace("-",".",$finish);
			
			//连接数据库
				$con = mysql_connect("localhost","root","123456");
				if(!$con){
				echo "<br/>数据库连接失败".mysql_error();
				}
			//选择数据库
				mysql_select_db("contract");
				//设置mysql字符编码
				mysql_query("set names utf8;");	
				
				if($htbh=='' and  $xmbh=='' and $xmmc=='' and $jfdw=='' and $htmc=='' and $nd=='' and $yf=='' and $kpdw=='' and $pzh=='' and $begin=='' and $finish==''){	
					$sql="select htbh,sum(jshj) as jshj from invoice group by htbh" ;
					$result = mysql_query($sql);
					while($row = mysql_fetch_assoc($result)){
						$je=$row["jshj"];
						$htbh=$row["htbh"];
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
						$del = "delete from invoice ";
						$res_del = mysql_query($del);
						}
						//从invoice中删除
						// $del = "delete from invoice  ";
						// $res_del = mysql_query($del);
						// if($res_del){
							echo "<script>
							 window.location.href='invoice.php?user=$user';
							 </script>";
						// }
				}
				
				$wherelist = array();//获取查询条件
					if(!empty($_GET['htbh'])){
						$wherelist[] = "htbh ='{$_GET['htbh']}'";
					}
					if(!empty($_GET['xmbh'])){
						$wherelist[] = "xmbh like '%{$_GET['xmbh']}%'";
					}
					if(!empty($_GET['xmmc'])){
						$wherelist[] = "xmmc like '%{$_GET['xmmc']}%'";
					}
					if(!empty($_GET['jfdw'])){
						$wherelist[] = "jfdw like '%{$_GET['jfdw']}%'";
					}
					if(!empty($_GET['htmc'])){
						$wherelist[] = "htmc like '%{$_GET['htmc']}%'";
					}
					if(!empty($_GET['yf'])){
						$wherelist[] = "yf like '%{$_GET['yf']}%'";
					}
					if(!empty($_GET['nd'])){
						$wherelist[] = "nd like '%{$_GET['nd']}%'";
					}
					if(!empty($_GET['kpdw'])){
						$wherelist[] = "kpdw like '%{$_GET['kpdw']}%'";
					}
					if(!empty($_GET['pzh'])){
						$wherelist[] = "pzh like '%{$_GET['pzh']}%'";
					}
					if(!empty($_GET['begin'])){
						$wherelist[] = "kprq >= '{$begin}'";
					}
					if(!empty($_GET['finish'])){
						$wherelist[] = "kprq <= '{$finish}'";
					}
					
				if(count($wherelist) > 0){         //组装查询条件
					$where = " where ".implode(' AND ' , $wherelist); 
				}
				$sql="select htbh,sum(jshj) as jshj from invoice $where group by htbh" ;
				$result = mysql_query($sql);
				
				while($row = mysql_fetch_assoc($result)){
					$je=$row["jshj"];
					$htbh=$row["htbh"];
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
					$del = "delete from invoice $where";
					mysql_query($del);
					}
			//从invoice 中删除
				// $del = "delete from invoice $where";
				// $res_del = mysql_query($del);
				// if($res_del){
					echo "<script>
					 window.location.href='invoice.php?user=$user';
					 </script>";
				// }
			
			 ?>
	    </body>
</html>