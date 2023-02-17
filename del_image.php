<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link href="css/easyui.css" rel="stylesheet"/>
		<link href="css/icon.css" rel="stylesheet"/>
		<script src="js/jquery-1.10.2.min.js"></script>
			<script src="js/layer/layer.js"></script>
	</head>
	
	<?php
		$path=$_GET['htbh'];
		
	
if(is_dir('image/'.$path)){
$dir='image/'.$path;
  //先删除目录下的文件：

  $dh=opendir($dir);

  while ($file=readdir($dh)) {

    if($file!="." && $file!="..") {

      $fullpath=$dir."/".$file;

      if(!is_dir($fullpath)) {

          unlink($fullpath);

      } else {

          deldir($fullpath);

      } 

    }

  }
 closedir($dh);

  //删除当前文件夹：

  rmdir($dir);


}

	require("dbconfig.php");//导入配置文件
$link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
	mysql_select_db(DBNAME,$link);//选择数据库
	mysql_query("set names 'utf8'");//选择字符集
		@$sql = "select bz from income where htbh='$path'";		
		@$result = mysql_query($sql,$link);
		@@$row = mysql_fetch_assoc($result);
		@$bz=str_replace('(该合同已上传图片)','',$row["bz"]);
		@$update="update income set bz='$bz' where htbh='$path'";
		@$result=mysql_query($update);
		if($result){
			echo "<script>
			 window.location.href='image.php?htbh=$path';
			 </script>";
		}
		@$sql = "select bz from spend where htbh='$path'";
		@$result = mysql_query($sql,$link);
		@$row = mysql_fetch_assoc($result);
		@$bz=str_replace('(该合同已上传图片)','',$row["bz"]);
		@$update="update spend set bz='$bz' where htbh='$path'";
		@$result=mysql_query($update);
		if($result){
			echo "<script>
			 window.location.href='image.php?htbh=$path';
			 </script>";
		}
	?>
</html>