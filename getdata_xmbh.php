
<?php
	// header("Content-type:text/html;charset=gb2312");
	
// $htbh=$_POST['htbh'];;
// 	//数据库配置信息(用户名,密码，数据库名，表前缀等)
// 	require("dbconfig.php");//导入配置文件
// 	$link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
// 	mysql_select_db(DBNAME,$link);//选择数据库
// 	mysql_query("set names 'utf8'");//选择字符集
	
// 	$sql = "select htbh from income where htbh ='$htbh' ";
// 	$result = mysql_query($sql);
// 		$row = mysql_fetch_assoc($result);
// 		$data=$row["htbh"];	
// 		// if($data=$htbh){
// 			echo "
// 			<script>
// 			alert('nihao');
			
// 			</script>";
		// }
		// echo json_encode($data);
			// echo $data;
			
		
	// echo $data;
	
				// echo $data;	
// 	if($data==$htbh){
// 	echo "
// <script>
//  layer.alert('导入成功！', {
//  icon: 1,
//  title: '提示'
//  });
// </script>";
// }
?>
<?php
	   $htbh=$_POST['htbh'];
	   	//数据库配置信息(用户名,密码，数据库名，表前缀等)
	   	require("dbconfig.php");//导入配置文件
	   	$link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
	   	mysql_select_db(DBNAME,$link);//选择数据库
	   	mysql_query("set names 'utf8'");//选择字符集
	   	
	   	$sql = "select xmbh from contract where htbh ='$htbh' ";
	   	$result = mysql_query($sql);
	   		$row = mysql_fetch_assoc($result);
	        /*如果存在，则说明数据库中有重名的*/
	        if ($row){
	            echo $row["xmbh"];
	        }
	?>

