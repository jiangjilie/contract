
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
					$yf = $_POST['yf'];								
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
						if(!empty($_POST['yf'])){
							$wherelist[] = "yf like '%{$_POST['yf']}%'";
						}
						if(!empty($_POST['nd'])){
							$wherelist[] = "nd like '%{$_POST['nd']}%'";
						}
						if(!empty($_POST['lxr'])){
							$wherelist[] = "lxr like '%{$_POST['lxr']}%'";
						}
						if(!empty($_POST['dept'])){
							$wherelist[] = "dept like '%{$_POST['dept']}%'";
						}
					if(count($wherelist) > 0){         //组装查询条件
						$where = " where ".implode(' AND ' , $wherelist); 
						
					}								
				$sql = "select * from contract $where   order by xmbh desc";//查询语句	;
					
					$result = mysql_query($sql,$link);
				while($row = mysql_fetch_assoc($result)){
					if($row["srhtze"]!=0&& $row["srhtze"]!==''){
					 $sz = number_format($row["srhtze"],2)."元";
					}else{
					 $sz = 0;
					}
					if($row["ysk"]!=0 && $row["ysk"]!==''){
					 $ys = number_format($row["ysk"],2)."元";
					}else{
					 $ys = 0;
					}
					
					if($row["gsk"]!=0 && $row["gsk"]!==''){
					 $gs = number_format($row["gsk"],2)."元";
					}else{
					 $gs = 0;
					}
					if($row["zchtze"]!=0&& $row["zchtze"]!==''){
					 $zz = number_format($row["zchtze"],2)."元";
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
					if($row["fkje"]!=0&& $row["fkje"]!==''){
					 $fkje = number_format($row["fkje"],2)."元";
					}else{
					 $fkje = 0;
					}
							//将查询结构集重新数组化
							$data[]=array("id"=>$row["id"],"time"=>$row["time"],"nd"=>$row["nd"],"yf"=>$row["yf"],"xmbh"=>$row["xmbh"],"xmmc"=>$row["xmmc"],"htlx"=>$row["htlx"],"htbh"=>$row["htbh"],"dwmc"=>$row["dwmc"],"htmc"=>$row["htmc"],"lxr"=>$row["lxr"],"dept"=>$row["dept"],"srze"=>$sz,"ysk"=>$ys,"gsk"=>$gs,"zcze"=>$zz,"yfk"=>$yfk,"wfk"=>$wfk,"bz"=>$row["bz"]);
							// $data[] = $row;
						}
						
			
					echo json_encode($data);//输出json数据
?>  
