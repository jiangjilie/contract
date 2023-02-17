
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
					$begin=	$_POST['begin'];
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
							$wherelist[] = "spend.htbh like '%{$_POST['htbh']}%'";
						}
						if(!empty($_POST['xmbh'])){
							$wherelist[] = "spend.xmbh like '%{$_POST['xmbh']}%'";
						}
						if(!empty($_POST['xmmc'])){
							$wherelist[] = "spend.xmmc like '%{$_POST['xmmc']}%'";
						}
						if(!empty($_POST['dwmc'])){
							$wherelist[] = "spend.dwmc like '%{$_POST['dwmc']}%'";
						}
						if(!empty($_POST['htmc'])){
							$wherelist[] = "spend.htmc like '%{$_POST['htmc']}%'";
						}
						if(!empty($_POST['yf'])){
							$wherelist[] = "spend.yf like '%{$_POST['yf']}%'";
						}
						if(!empty($_POST['nd'])){
							$wherelist[] = "spend.nd like '%{$_POST['nd']}%'";
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
					// $sql = "select id,nd,yf,htbh,xmbh,xmmc,dwmc,htmc,htlx,lxr,qdsj,htgq,fkfs,jsfs,htze,yfk,wfk,ysp,bz,MAX(pzh) as pzh,MAX(kprq) as kprq,SUM(jshj) as je from (select spend.*,invoice. pzh,invoice.kprq,invoice.jshj from spend  left join invoice  on spend.htbh=invoice.htbh $where) spendvoice GROUP BY id order by time desc ";//查询语句
					$sql = "select *from spend $where order by htbh";
					
					$result = mysql_query($sql,$link);
					// $f = "表中无数据存在！";
					// if ($result==''){
					// $data[]=array("id"=>$f,"time"=>$f,"nd"=>$f,"htbh"=>$f,"xmbh"=>$f,"xmmc"=>$f,"dwmc"=>$f,"htmc"=>$f,"htlx"=>$f,"lxr"=>$f,"qdsj"=>$f,"htgq"=>$f,"fkfs"=>$f,"jsfs"=>$f,"htze"=>$f,"yfk"=>$f,"wfk"=>$f,"ykp"=>$f,"bz"=>$f);
					// // return false ;
					// }
					
					while($row = mysql_fetch_assoc($result) ){
							if($row["htze"]!=0&& $row["htze"]!==''){
							 $zz = number_format($row["htze"],2)."元";
							}else{
							 $zz = 0;
							}
							
							// if( $row["je"]=='' ){							
								if($row["yfk"]!=0){
									$yfk = number_format($row["yfk"],2)."元";		
								}else{
									$yfk = 0;
								}
							// }else if($row["je"]!==''){
							//  if($row["je"]>$row["yfk"]){
							//  $yfk = $row["je"]."元";
							//  }else{
							//   $yfk=$row["yfk"]."元";
							//  }
							// }
										
							// if( $row["je"]==''){
								$wfk = $row["htze"]-$row["yfk"];
								if($wfk!=0){
									$wfk=number_format($wfk,2)."元";
								}else{
									$wfk=0;
								}
							// }else if($row["je"]!==''){
							//  	if($row["je"]>$row["ysk"]){
							//  	 $wfk = $row["htze"]- $row["je"]."元";
							//  	 }else{
							//  	 $wfk = $row["htze"]- $row["wfk"]."元";
							//  	 }
							// }
							if($row["ysp"]!==''){
								$ysp=number_format($row["ysp"],2)."元";
							}else{
							 $ysp = "无收票信息";
							}
							$yf=intval($row['yf']);	
							//将查询结构集重新数组化
							$data[]=array("id"=>$row["id"],"time"=>$row["time"],"nd"=>$row["nd"],"htbh"=>$row["htbh"],"xmbh"=>$row["xmbh"],"xmmc"=>$row["xmmc"],"dwmc"=>$row["dwmc"],"htmc"=>$row["htmc"],"htlx"=>$row["htlx"],"lxr"=>$row["lxr"],"qdsj"=>$row["qdsj"],"htgq"=>$row["htgq"],"fkfs"=>$row["fkfs"],"jsfs"=>$row["jsfs"],"htze"=>$zz,"yfk"=>$yfk,"wfk"=>$wfk,"ysp"=>$ysp,"bz"=>$row["bz"]);
							// $data[] = $row;
						}
						
			
					echo json_encode($data);//输出json数据
?>  
