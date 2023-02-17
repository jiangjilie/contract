
<?php
// header("Access-Control-Allow-Origin:*");//解决跨域请求问题
// header('Access-Control-Allow-Methods:POST');
// header('Access-Control-Allow-Headers:x-requested-with, content-type');  
// header("content-Type: text/html; charset=utf-8");//字符编码设置  
				//声明变量并接受form表单发送过来的数据
					$htbh = $_POST['htbh']; 
					$xmbh = $_POST['xmbh'];
					$xmmc = $_POST['xmmc'];
					$dwmc = $_POST['dwmc'];
					$htmc = $_POST['htmc'];
					$nd = $_POST['nd'];
					$fkpz = $_POST['fkpz'];
					$begin=$_POST['begin'];
					$finish=$_POST['finish'];
					$begin=str_replace("-",".",$begin);
					$finish=str_replace("-",".",$finish);
				//连接数据库
					require("dbconfig.php");//导入配置文件
					$link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
					mysql_select_db(DBNAME,$link);//选择数据库
					mysql_query("set names 'utf8'");//选择字符集

					// 用Page函数计算出 $select_from 从哪条记录开始检索、$pagenav 输出分页导航
					
					
				$wherelist = array();//获取查询条件
					if(!empty($_POST['htbh'])){
						$wherelist[] = "htbh like '%{$_POST['htbh']}%'";
					}
					if(!empty($_POST['xmbh'])){
						$wherelist[] = "xmbh like '%{$_POST['xmbh']}%'";
					}
					if(!empty($_POST['xmmc'])){
						$wherelist[] = "xmmc like '%{$_POST['xmmc']}%'";
					}
					if(!empty($_POST['dwmc'])){
						$wherelist[] = "dwmc like '%{$_POST['dwmc']}%'";
					}
					if(!empty($_POST['htmc'])){
						$wherelist[] = "htmc like '%{$_POST['htmc']}%'";
					}
					if(!empty($_POST['fkpz'])){
						$wherelist[] = "fkpz like '%{$_POST['fkpz']}%'";
					}
					if(!empty($_POST['nd'])){
						$wherelist[] = "nd like '%{$_POST['nd']}%'";
					}
					if(!empty($_POST['begin'])){
						$wherelist[] = "date >= '{$begin}'";
					}
					if(!empty($_POST['finish'])){
						$wherelist[] = "date <= '{$finish}'";
					}
					
				if(count($wherelist) > 0){         //组装查询条件
					$where = " where ".implode(' AND ' , $wherelist); 
				}									
				$sql = "select * from administrative  $where order by htbh ";//查询语句	
				$result = mysql_query($sql,$link);										
				while($row = mysql_fetch_assoc($result)){
					if($row["htze"]!=0&& $row["zchtze"]!==''){
					 $zz = number_format($row["htze"],2)."元";
					}else{
					 $zz = 0;
					}
					if($row["yfk"]!=0 && $row["yfk"]!==''){
					 $yfk = number_format($row["yfk"],2)."元";
					}else{
					 $yfk = 0;
					}				
					if($row["wfk"]!=0 && $row["wfk"]!==''){
					 $wfk = number_format($row["wfk"],2)."元";
					}else{
					 $wfk = 0;
					}			
							//将查询结构集重新数组化
							$data[]=array("id"=>$row["id"],"time"=>$row["time"],"nd"=>$row["nd"],"yf"=>$row["yf"],"htbh"=>$row["htbh"],"dwmc"=>$row["dwmc"],"htmc"=>$row["htmc"],"lxr"=>$row["lxr"],"qdsj"=>$row["qdsj"],"htje"=>$zz,"yfk"=>$yfk,"wfk"=>$wfk,"fkpz"=>$row["fkpz"],"bz"=>$row["bz"]);
							// $data[] = $row;
						}
						
			
					echo json_encode($data);//输出json数据
?>  
