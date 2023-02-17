<?php
				//声明变量并接受form表单发送过来的数据	
					$setting = $_POST['setting'];				
					$admin = $_POST['admin'];				
				//连接数据库
					$con = mysql_connect("localhost","root","123456");
					if(!$con){
					echo "<br/>数据库连接失败".mysql_error();
					}
				//选择数据库
					mysql_select_db("contract");
					//设置mysql字符编码
					mysql_query("set names utf8;");
					$del = "delete from menu where admin='$admin'";
					mysql_query($del);
					$fields=array('sr','zc','fp','lx','xz','tj','yh','qx','rz','srs','zcs','fps','lxs','xzs');//这个是特意设置校验字典，校验提交的字段是否存在
					   	// $sql = '';				
					// insert语句（插入menu数据，新增）				
					   foreach($setting as $k=>$v) {
					               if(in_array($k, $fields)) { $sqlk .= ','.$k; $sqlv .= ",'$v'"; }
					           }
					           $sqlk = substr($sqlk, 1);
					           $sqlv = substr($sqlv, 1);
					   	$insert = "INSERT INTO menu (admin,$sqlk) VALUES ('$admin',$sqlv)";
					   	mysql_query($insert);
										
				 ?>