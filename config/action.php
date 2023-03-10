<?php
//执行商品信息的增、删、改的操作

//一、导入配置文件和函数库文件
	require("dbconfig.php");
	require("functions.php");

//二、连接MySQL，选择数据库
	$link = mysql_connect(HOST,USER,PASS) or die("数据库失败！");
	mysql_select_db(DBNAME,$link);


//三、获取action参数的值，并做对应的操作
	switch($_GET["action"]){
		case "add": //添加
			//1. 获取添加信息
			$name 	= $_POST["name"];
			$typeid = $_POST["typeid"];
			$price 	= $_POST["price"];
			$total 	= $_POST["total"];
			$note 	= $_POST["note"];
			$addtime = time();
			//2. 验证()省略
			if(empty($name)){
				die("商品名称必须有值");
			}
			//3. 执行图片上传
			$upinfo = uploadFile("pic","./uploads/");
			if($upinfo["error"]===false){
				die("图片信息上传失败：".$upinfo["info"]);
			}else{
				//上传成功
				$pic = $upinfo[info];// 获取上传成功的图片名
			}
			//4. 执行图片缩放
			imageUpdateSize('./uploads/'.$pic,50,50);
			
			//5. 拼装sql语句，并执行添加
			$sql = "insert into goods values(null,'{$name}','{$typeid}',{$price},{$total},'{$pic}','{$note}',{$addtime})";
			//echo $sql;
			mysql_query($sql,$link);
			
			//6. 判断并输出结果
			if(mysql_insert_id($link)>0){
				echo "商品发布成功！";
			}else{
				echo "商品发布失败！".mysql_error();
			}
			echo "<br/> <a href='index.php'>查看商品信息<a>";
			
			
			break;
		
		case "del": //删除
			//获取要删除的DAH号并拼装删除sql，执行
			$sql = "delete from wsda where DAH={$_GET['DAH']}";
			mysql_query($sql,$link);
			//执行图片删除
			if(mysql_affected_rows($link)>0){
				@unlink("./uploads/".$_GET['picname']);
				@unlink("./uploads/s_".$_GET['picname']);
			}
			//跳转到浏览界面
			header("Location:index.php");
			break;
			
			
		case "update": //修改
			//1. 获取要修改的信息
			$name 	= $_POST["name"];
			$typeid = $_POST["typeid"];
			$price 	= $_POST["price"];
			$total 	= $_POST["total"];
			$note 	= $_POST["note"];
			$id = $_POST['id'];
			$pic = $_POST['oldpic'];
			//2. 数据验证
			if(empty($name)){
				die("商品名称必须有值");
			}
			
			//3. 判断有无图片上传
			if($_FILES['pic']['error']!=4){
				//执行上传
				$upinfo = uploadFile("pic","./uploads/");
				if($upinfo["error"]===false){
					die("图片信息上传失败：".$upinfo["info"]);
				}else{
					//上传成功
					$pic = $upinfo[info];// 获取上传成功的图片名
					//4. 有图片上传，执行缩放
					imageUpdateSize('./uploads/'.$pic,50,50);
				}
			
			}
			
			//5. 执行修改
			$sql = "update goods set name='{$name}',typeid={$typeid},price={$price},total={$total},note='{$note}',pic='{$pic}' where id={$id}";
			//echo $sql;
			mysql_query($sql,$link);
			
			//6. 判断是否修改成功
			if(mysql_affected_rows($link)>0){
				//若有图片上传，就删除老图片
				if($_FILES['pic']['error']!=4){
					@unlink("./uploads/".$_POST['oldpic']);
					@unlink("./uploads/s_".$_POST['oldpic']);
				}
				echo "修改成功";
			}else{
				echo "修改失败".mysql_error();
			}
			echo "<br/> <a href='index.php'>查看商品信息<a>";
			
			break;

	}

//四、关闭数据库
mysql_close($link);


