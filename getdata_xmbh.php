
<?php
	// header("Content-type:text/html;charset=gb2312");
	
// $htbh=$_POST['htbh'];;
// 	//���ݿ�������Ϣ(�û���,���룬���ݿ�������ǰ׺��)
// 	require("dbconfig.php");//���������ļ�
// 	$link = mysql_connect(HOST,USER,PASS)or die("���ݿ�����ʧ��");//�������ݿ�
// 	mysql_select_db(DBNAME,$link);//ѡ�����ݿ�
// 	mysql_query("set names 'utf8'");//ѡ���ַ���
	
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
//  layer.alert('����ɹ���', {
//  icon: 1,
//  title: '��ʾ'
//  });
// </script>";
// }
?>
<?php
	   $htbh=$_POST['htbh'];
	   	//���ݿ�������Ϣ(�û���,���룬���ݿ�������ǰ׺��)
	   	require("dbconfig.php");//���������ļ�
	   	$link = mysql_connect(HOST,USER,PASS)or die("���ݿ�����ʧ��");//�������ݿ�
	   	mysql_select_db(DBNAME,$link);//ѡ�����ݿ�
	   	mysql_query("set names 'utf8'");//ѡ���ַ���
	   	
	   	$sql = "select xmbh from contract where htbh ='$htbh' ";
	   	$result = mysql_query($sql);
	   		$row = mysql_fetch_assoc($result);
	        /*������ڣ���˵�����ݿ�����������*/
	        if ($row){
	            echo $row["xmbh"];
	        }
	?>

