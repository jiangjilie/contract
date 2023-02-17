
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
					$lxr = $_POST['lxr'];								
					$dept = $_POST['dept'];								
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
				$sql="select id,time,nd,yf,xmmc,xmbh, sum(srhtze) as sz,sum(ysk) as ys,sum(gsk) as gs,sum(srse) as srse,sum(zchtze) as zz,sum(yfk) as yfk,sum(wfk) as wf,sum(zcse) as zcse,sum(fkje) as fkje,sum(lxse) as lxse from contract $where   group by xmbh order by xmbh desc";

				$result = mysql_query($sql);
					while($row = mysql_fetch_assoc($result)){
						if($row["sz"]!=0&& $row["sz"]!==''){
						 $sz = number_format($row["sz"],2)."元";
						}else{
						 $sz = 0;
						}
						if($row["ys"]!=0 && $row["ys"]!==''){
						 $ys = number_format($row["ys"],2)."元";
						}else{
						 $ys = 0;
						}
						
						if ($row['sz'] != 0) {
						$srbl =  $row['ys']/$row['sz'];
						$srbl =  number_format($srbl, 2);
						$srbl=($srbl*100)."%";
						}else{
							$srbl= '0%' ;
						}
						if($row["zz"]!=0&& $row["zz"]!==''){
						 $zz = number_format($row["zz"],2)."元";
						}else{
						 $zz = 0;
						}
						if($row["yfk"]!=0 && $row["yfk"]!==''){
						 $yfk = number_format($row["yfk"],2)."元";
						}else{
						 $yfk = 0;
						}				
						if ($row['zz'] != 0) {
						$zcbl =  $row['yfk']/$row['zz'];
						$zcbl =  number_format($zcbl, 2);
						$zcbl=($zcbl*100)."%";
						}else{
							$zcbl= '0%' ;
						}
						if($row["fkje"]!=0&& $row["fkje"]!==''){
						 $fkje = number_format($row["fkje"],2)."元";
						}else{
						 $fkje = 0;
						}
						//---------------毛利润--------
						$ml =  $row['sz']-$row['zz']-$row['fkje']-$row['srse']+$row['zcse']+$row['lxse'];
						if($ml!=0 && $ml!=''){
						 $ml = number_format($ml,2)."元";
						}else{
						 $ml = 0;
						}
						//---------收入税额------------
						if($row["srse"]!=0&& $row["srse"]!==''){
						 $srse = number_format($row["srse"],2)."元";
						}else{
						 $srse = 0;
						}
						//-------支出零星税额------------
						$zlse=$row['zcse']+$row['lxse'];
						if($zlse!=0&& $zlse!==''){
						 $zlse = number_format($zlse,2)."元";
						}else{
						 $zlse = 0;
						}
						
						$bj = $srbl - $zcbl ;
						// $bj =  number_format($bj, 2);
						$bj=($bj)."%";
							//将查询结构集重新数组化
							$data[]=array("id"=>$row["id"],"time"=>$row["time"],"nd"=>$row["nd"],"yf"=>$row["yf"],"xmbh"=>$row["xmbh"],"xmmc"=>$row["xmmc"],"srze"=>$sz,"ysk"=>$ys,"srbl"=>$srbl,"zcze"=>$zz,"yzc"=>$yfk,"zcbl"=>$zcbl,"mlr"=>$ml,"blbj"=>$bj,"srse"=>$srse,"zlse"=>$zlse);
							// $data[] = $row;
						}
						
			
					echo json_encode($data);//输出json数据
?>  
