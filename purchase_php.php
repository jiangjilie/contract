
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
					$lxr = $_POST['lxr'];
					$nd = $_POST['nd'];
					$yf = $_POST['yf'];	
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
						if(!empty($_POST['lxr'])){
							$wherelist[] = "lxr like '%{$_POST['lxr']}%'";
						}
						if(!empty($_POST['yf'])){
							$wherelist[] = "yf like '%{$_POST['yf']}%'";
						}
						if(!empty($_POST['nd'])){
							$wherelist[] = "nd like '%{$_POST['nd']}%'";
						}
						if(!empty($_POST['begin'])){
							$wherelist[] = "fksj >= '{$begin}'";
						}
						if(!empty($_POST['finish'])){
							$wherelist[] = "fksj <= '{$finish}'";
						}
						
					if(count($wherelist) > 0){         //组装查询条件
						$where = " where ".implode(' AND ' , $wherelist); 
					}
					
					$sql = "select * from purchase   $where order by xmbh ";//查询语句	;
					$result = mysql_query($sql,$link);
					// $f = "表中无数据存在！";
					// if ($result==''){
					// $data[]=array("id"=>$f,"time"=>$f,"nd"=>$f,"htbh"=>$f,"xmbh"=>$f,"xmmc"=>$f,"dwmc"=>$f,"htmc"=>$f,"htlx"=>$f,"lxr"=>$f,"qdsj"=>$f,"htgq"=>$f,"fkfs"=>$f,"jsfs"=>$f,"htze"=>$f,"yfk"=>$f,"wfk"=>$f,"ykp"=>$f,"bz"=>$f);
					// // return false ;
					// }
					
					while($row = mysql_fetch_assoc($result)){
						if($row["fkje"]!=0&& $row["fkje"]!==''){
						 $fkje = number_format($row["fkje"],2)."元";
						}else{
						 $fkje = 0;
						}
						$yf=intval($row['yf']);  //字符串转数字
							//将查询结构集重新数组化
							$data[]=array("id"=>$row["id"],"time"=>$row["time"],"nd"=>$row["nd"],"yf"=>$yf,"xmbh"=>$row["xmbh"],"xmmc"=>$row["xmmc"],"dwmc"=>$row["dwmc"],"htmc"=>$row["htmc"],"lxr"=>$row["lxr"],"fkje"=>$fkje,"fksj"=>$row["fksj"],"pzh"=>$row["pzh"],"bz"=>$row["bz"],"zy"=>$row["zy"]);
							// $data[] = $row;
						}
						
			
					echo json_encode($data);//输出json数据
?>  
