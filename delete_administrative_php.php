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
			@$dwmc = $_GET['dwmc'];
			@$htmc = $_GET['htmc'];
			@$nd = $_GET['nd'];
			@$fkpz = $_GET['fkpz'];	
			
			//连接数据库
				$con = mysql_connect("localhost","root","123456");
				if(!$con){
				echo "<br/>数据库连接失败".mysql_error();
				}
			//选择数据库
				mysql_select_db("contract");
				//设置mysql字符编码
				mysql_query("set names utf8;");	
				
				if($htbh=='' and  $xmbh=='' and $xmmc=='' and $dwmc=='' and $htmc=='' and $nd=='' and $fkpz==''){				
						//从administrative中删除
						$del = "delete from administrative  ";
						$res_del =mysql_query($del);
						//从bill中删除
						$del = "delete from bill where ishtlx='3' ";
						mysql_query($del);
						if($res_del){
							echo "<script>
							 window.location.href='administrative.php?user=$user';
							 </script>";
						}
				}
				
				$wherelist = array();//获取查询条件
					if(!empty($_GET['htbh'])){
						$wherelist[] = "htbh like '%{$_GET['htbh']}%'";
					}
					if(!empty($_GET['xmbh'])){
						$wherelist[] = "xmbh like '%{$_GET['xmbh']}%'";
					}
					if(!empty($_GET['xmmc'])){
						$wherelist[] = "xmmc like '%{$_GET['xmmc']}%'";
					}
					if(!empty($_GET['dwmc'])){
						$wherelist[] = "dwmc like '%{$_GET['dwmc']}%'";
					}
					if(!empty($_GET['htmc'])){
						$wherelist[] = "htmc like '%{$_GET['htmc']}%'";
					}
					if(!empty($_GET['fkpz'])){
						$wherelist[] = "fkpz like '%{$_GET['fkpz']}%'";
					}
					if(!empty($_GET['nd'])){
						$wherelist[] = "nd like '%{$_GET['nd']}%'";
					}
					
				if(count($wherelist) > 0){         //组装查询条件
					$where = " where ".implode(' AND ' , $wherelist); 
				}
				//从bill中删除
				$del = "delete from bill $where and ishtlx = '3' ";
				mysql_query($del);
			//从administrative 中删除
				$del = "delete from administrative $where";
				$res_del = mysql_query($del);
				if($res_del){
					echo "<script>
					 window.location.href='administrative.php?user=$user';
					 </script>";
				}
			
			 ?>
	    </body>
</html>