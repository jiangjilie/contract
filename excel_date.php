<?php

    error_reporting(E_ALL ^ E_DEPRECATED);
    $localhost = 'localhost';
    $dbname = 'contract';
    $dbuser = 'root';
    $dbpwd = '123456';
    $tbname = "contract";

    // ob_end_clean();
    // header('Content-type: text/html; charset=utf-8');
    // header("Content-type:application/vnd.ms-excel;charset=UTF-8"); 
    // header("Content-Disposition:filename=data.xls");// 文件名自己改，默认data.xls
	
		header("Content-Type:application/vnd.ms-excel;charset=UTF-8");    
		header("Pragma: public");    
		header("Expires: 0");    
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");    
		header("Content-Type: application/force-download");    
		header("Content-Type: application/octet-stream");    
		header("Content-Type: application/download");    
		header("Content-Disposition: attachment;filename=".'月份统计表'.".xls");    
		header("Content-Transfer-Encoding: binary ");
	

    $conn = mysql_connect($localhost,$dbuser,$dbpwd) or die("连接数据库失败");
    mysql_select_db($dbname, $conn);
   mysql_query("set names 'utf8'");
	@$htbh = $_GET['htbh'];
	@$xmbh = $_GET['xmbh'];
	@$xmmc = $_GET['xmmc'];
	@$dwmc = $_GET['dwmc'];
	@$htmc = $_GET['htmc'];
	@$nd = $_GET['nd'];
	@$yf = $_GET['yf'];		
			$wherelist = array();//获取查询条件
				if(!empty($_GET['htbh'])){
					$wherelist[] = "htbh like '%{$_GET['htbh']}%'";
				}
				if(!empty($_GET['xmbh'])){
					$wherelist[] = "xmbh like '%{$_GET['xmbh']}%'";
				}
				if(!empty($_GET['xmmc'])){
					$wherelist[] = "xmmc like '%{$_GET['xmmc']}%'";
				}
				if(!empty($_GET['dwmc'])){
					$wherelist[] = "dwmc like '%{$_GET['dwmc']}%'";
				}
				if(!empty($_GET['htmc'])){
					$wherelist[] = "htmc like '%{$_GET['htmc']}%'";
				}
				if(!empty($_GET['yf'])){
					$wherelist[] = "yf like '%{$_GET['yf']}%'";
				}
				if(!empty($_GET['nd'])){
					$wherelist[] = "nd like '%{$_GET['nd']}%'";
				}
				
			if(count($wherelist) > 0){         //组装查询条件
				$where = " where ".implode(' AND ' , $wherelist); 
			}
 @$sql = "select nd,yf,count(0) as total,count(ishtlx = '1' or null) as income,count(ishtlx = '2' or null) as spend,count(ishtlx = '3' or null) as purchase,sum(srhtze) as sz,sum(ysk) as ys,sum(gsk) as gs,sum(zchtze) as zz,sum(yfk) as yfk,sum(wfk) as wf,sum(fkje) as fkje from contract  $where group by nd,yf order by nd,yf ";//查询语句
 $result = mysql_query($sql);
 if(!$result){
 echo "表中无数据存在";
 echo "<td  colspan='18' >表中无数据存在!</td>";
 return false;	
 }
    echo "<table>";
	// echo" <caption style='font-size:25px;text-align:center'>月份统计表</caption>";
    echo "<tr>";
    echo "<th>年度</th>";
    echo "<th>月份</th>
    <th >合同总数量</th>
    <th >开发合同数量</th>
    <th >支出合同数量</th>
    <th >零星采购数量</th>
    <th >收入总额</th>
    <th >已收款</th>
    <th >收入比例</th>
    <th >支出总额</th>
    <th >已支出</th>
    <th >采购支出</th>
    <th >支出比例</th>
    <th >毛利润</th>
    <th >比例比较</th>";
    echo "</tr>";
    // echo "</table>";
   while($row = mysql_fetch_assoc($result)){
   	if($row["sz"]!=0&& $row["sz"]!==''){
   	 $sz = $row["sz"]."万元";
   	}else{
   	 $sz = 0;
   	}
   	if($row["ys"]!=0 && $row["ys"]!==''){
   	 $ys = $row["ys"]."万元";
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
   	 $zz = $row["zz"]."万元";
   	}else{
   	 $zz = 0;
   	}
   	if($row["yfk"]!=0 && $row["yfk"]!==''){
   	 $yfk = $row["yfk"]."万元";
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
	 $fkje = $row["fkje"]."万元";
	}else{
	 $fkje = 0;
	}
   	$ml =  $row['sz']-$row['zz']-$row['fkje'];
   	if($ml!=0 && $ml!=''){
   	 $ml = $ml."万元";
   	}else{
   	 $ml = 0;
   	}
   
   	$bj = $srbl - $zcbl ;
   	// $bj =  number_format($bj, 2);
   	$bj=($bj)."%";
   	
   	echo "<tr align='center'>";
   echo "<td  width='100px'>{$row['nd']}</td>";
   echo "<td  width='100px'>{$row['yf']}</td>";
   echo "<td  width='150px'>{$row['total']}</td>";
   echo "<td  width='150px'>{$row['income']}</td>";
   echo "<td  width='150px'>{$row['spend']}</td>";
   echo "<td  width='150px'>{$row['purchase']}</td>";
   echo "<td  width='150px'>$sz</td>";
   echo "<td  width='150px'>$ys</td>";
   echo "<td  width='150px'>$srbl</td>";
   echo "<td  width='150px'>$zz</td>";
   echo "<td  width='150px'>$yfk</td>";;
   echo "<td  width='150px'>$zcbl</td>";
   echo "<td  width='150px'>$fkje</td>";
   echo "<td  width='150px'>$ml</td>";
   echo "<td  width='150px'>$bj</td>";
   		echo "</tr>";
   }	
	 echo "</table>";
		@$htbh = $_GET['htbh'];
		@$xmbh = $_GET['xmbh'];
		@$xmmc = $_GET['xmmc'];
		@$dwmc = $_GET['dwmc'];
		@$htmc = $_GET['htmc'];
		@$nd = $_GET['nd'];
		@$yf = $_GET['yf'];		
	 $con = mysql_connect("localhost","root","123456");
	 	if(!$con){
	 	echo "<br/>数据库连接失败".mysql_error();
	 	}
	 //选择数据库
	 	mysql_select_db("contract");
	 	//设置mysql字符编码
	 	mysql_query("set names utf8;");	
	 			$wherelist = array();//获取查询条件
	 				if(!empty($_GET['nd'])){
	 					$wherelist[] = "nd like '%{$_GET['nd']}%'";
	 				}
	 				if(!empty($_GET['yf'])){
	 					$wherelist[] = "yf like '%{$_GET['yf']}%'";
	 				}
	 				if(!empty($_GET['htbh'])){
	 					$wherelist[] = "htbh like '%{$_GET['htbh']}%'";
	 				}
	 				if(!empty($_GET['xmbh'])){
	 					$wherelist[] = "xmbh like '%{$_GET['xmbh']}%'";
	 				}
	 				if(!empty($_GET['xmmc'])){
	 					$wherelist[] = "xmmc like '%{$_GET['xmmc']}%'";
	 				}
	 				if(!empty($_GET['jfdw'])){
	 					$wherelist[] = "jfdw like '%{$_GET['jfdw']}%'";
	 				}
	 				if(!empty($_GET['htmc'])){
	 					$wherelist[] = "htmc like '%{$_GET['htmc']}%'";
	 				}
	 				
	 			if(count($wherelist) > 0){         //组装查询条件
	 				$where = " where ".implode(' AND ' , $wherelist); 
	 			}
	@$sql = "select nd,yf,count(0) as total,count(ishtlx = '1' or null) as income,count(ishtlx = '2' or null) as spend,count(ishtlx = '3' or null) as purchase,sum(srhtze) as sz,sum(ysk) as ys,sum(gsk) as gs,sum(zchtze) as zz,sum(yfk) as yfk,sum(wfk) as wf,sum(fkje) as fkje from contract  $where group by nd order by nd ";//查询语句	;
	
	$result = mysql_query($sql);
	if(!$result){
	echo "表中无数据存在";
	echo "<td  colspan='18' >表中无数据存在!</td>";
	return false;	
	}
	  echo "<table>";
	 // echo" <caption style='font-size:25px;text-align:center'>年度统计表</caption>";
	    echo "<tr>";
	  echo"
	 <th >年度</th>
	<th >合同总数量</th>
	<th >开发合同数量</th>
	<th >支出合同数量</th>
	<th >零星采购数量</th>
	<th >收入总额</th>
	<th >已收款</th>
	<th >收入比例</th>
	<th >支出总额</th>
	<th >已支出</th>
	<th >采购支出</th>
	<th >支出比例</th>
	<th >毛利润</th>
	<th >比例比较</th>";
	while($row = mysql_fetch_assoc($result)){
								if($row["sz"]!=0&& $row["sz"]!==''){
								 $sz = $row["sz"]."万元";
								}else{
								 $sz = 0;
								}
								if($row["ys"]!=0 && $row["ys"]!==''){
								 $ys = $row["ys"]."万元";;
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
								 $zz = $row["zz"]."万元";
								}else{
								 $zz = 0;
								}
								if($row["yfk"]!=0 && $row["yfk"]!==''){
								 $yfk = $row["yfk"]."万元";;
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
								 $fkje = $row["fkje"]."万元";
								}else{
								 $fkje = 0;
								}
								$ml =  $row['sz']-$row['zz']-$row['fkje'];
								if($ml!=0 && $ml!=''){
								 $ml = $ml."万元";
								}else{
								 $ml = 0;
								}
								
								$bj = $srbl - $zcbl ;
								// $bj =  number_format($bj, 2);
								$bj=($bj)."%";
								echo "<tr align='center'>";
								echo "<td  width='100px'>{$row['nd']}</td>";
								echo "<td  width='100px'>{$row['yf']}</td>";
								echo "<td  width='150px'>{$row['total']}</td>";
								echo "<td  width='150px'>{$row['income']}</td>";
								echo "<td  width='150px'>{$row['spend']}</td>";
								echo "<td  width='150px'>{$row['purchase']}</td>";
								echo "<td  width='150px'>$sz</td>";
								echo "<td  width='150px'>$ys</td>";
								echo "<td  width='150px'>$srbl</td>";
								echo "<td  width='150px'>$zz</td>";
								echo "<td  width='150px'>$yfk</td>";;
								echo "<td  width='150px'>$zcbl</td>";
								echo "<td  width='150px'>$fkje</td>";
								echo "<td  width='150px'>$ml</td>";
								echo "<td  width='150px'>$bj</td>";						
									echo "</tr>";
	}					 
	echo"</table>";
	 
?>
