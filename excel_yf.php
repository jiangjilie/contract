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
					$wherelist[] = "yf = '{$_GET['yf']}'";
				}
				if(!empty($_GET['nd'])){
					$wherelist[] = "nd like '%{$_GET['nd']}%'";
				}
				
			if(count($wherelist) > 0){         //组装查询条件
				$where = " where ".implode(' AND ' , $wherelist); 
			}
    @$result=mysql_query("SELECT * FROM $tbname $where");
    echo "<table>";
    echo "<tr>";
    echo "<th>年度</th>";
    echo "<th>月份</th>";
    echo "<th>项目名称</th>";
    echo "<th>部门</th>";
    echo "<th>合同类型</th>";
    echo "<th>合同编号</th>";
    echo "<th>项目编号</th>";
    echo "<th>单位名称</th>";
    echo "<th>合同名称</th>";
    echo "<th>联系人</th>";
    echo "<th>合同开始时间</th>";
    echo "<th>合同结束时间</th>";
    echo "<th>收入合同总额</th>";
    echo "<th>已收款</th>";
    echo "<th>应收款</th>";
    echo "<th>支出合同总额</th>";
    echo "<th>应付款</th>";
    echo "<th>未付款</th>";
    echo "<th>备注</th>";
    echo "</tr>";
    // echo "</table>";
    while($row=mysql_fetch_array($result)){
    echo "<tr align='center'>";
    echo "<td  width='50px'>{$row['nd']}</td>";
    echo "<td  width='60px'>{$row['yf']}</td>";
    echo "<td  width='60px'>{$row['xmmc']}</td>";
    echo "<td  width='60px'>{$row['dept']}</td>";
    echo "<td  width='60px'>{$row['htlx']}</td>";
    echo "<td  width='100px'>{$row['htbh']}</td>";					
    echo "<td  width='100px'>{$row['xmbh']}</td>";
    echo "<td  width='150px'>{$row['dwmc']}</td>";
    echo "<td  width='150px'>{$row['htmc']}</td>";
    echo "<td  width='100px'>{$row['lxr']}</td>";
    echo "<td  width='120px'>{$row['begin']}</td>";
    echo "<td  width='120px'>{$row['finish']}</td>";
    echo "<td  width='100px'>{$row['srhtze']}</td>";
    echo "<td  width='100px'>{$row['ysk']}</td>";
    echo "<td  width='100px'>{$row['gsk']}</td>";
    echo "<td  width='100px'>{$row['zchtze']}</td>";
    echo "<td  width='100px'>{$row['yfk']}</td>";
    echo "<td  width='100px'>{$row['wfk']}</td>";
    echo "<td  width='100px'>{$row['bz']}</td>";
    }
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
						$wherelist[] = "yf = '{$_GET['yf']}'";
					}
					if(!empty($_GET['nd'])){
						$wherelist[] = "nd like '%{$_GET['nd']}%'";
					}
					
				if(count($wherelist) > 0){         //组装查询条件
					$where = " where ".implode(' AND ' , $wherelist); 
				}
	@$sql = "select nd,yf,count(0) as total,count(ishtlx = '1' or null) as income,count(ishtlx = '2' or null) as spend,sum(srhtze) as sz,sum(ysk) as ys,sum(gsk) as gs,sum(zchtze) as zz,sum(yfk) as yfk,sum(wfk) as wf from contract  $where group by nd,yf order by nd,yf ";//查询语句
	$result = mysql_query($sql);
	if(!$result){
	echo "表中无数据存在";
	echo "<td  colspan='18' >表中无数据存在!</td>";
	return false;	
	}
	   echo "<table>";
		echo" <caption style='font-size:25px;text-align:center'>月份统计表</caption>";
	   echo "<tr>";
	   echo "<th>年度</th>";
	   echo "<th>月份</th>
	   <th >合同总数量</th>
	   <th >开发合同数量</th>
	   <th >支出合同数量</th>
	   <th >收入总额</th>
	   <th >已收款</th>
	   <th >收入比例</th>
	   <th >支出总额</th>
	   <th >已支出</th>
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
	  	$ml =  $row['sz']-$row['zz'];
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
	  	echo "<td  width='150px'>$sz</td>";
	  	echo "<td  width='150px'>$ys</td>";
	  	echo "<td  width='150px'>$srbl</td>";
	  	echo "<td  width='150px'>$zz</td>";
	  	echo "<td  width='150px'>$yfk</td>";;
	  	echo "<td  width='150px'>$zcbl</td>";
	  	echo "<td  width='150px'>$ml</td>";
	  	echo "<td  width='150px'>$bj</td>";
	  		echo "</tr>";
	  }	
		 echo "</table>";
		
?>
