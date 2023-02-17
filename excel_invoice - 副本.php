<?php

    error_reporting(E_ALL ^ E_DEPRECATED);
    $localhost = 'localhost';
    $dbname = 'contract';
    $dbuser = 'root';
    $dbpwd = '123456';
    $tbname = "invoice";

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
		header("Content-Disposition: attachment;filename=".'发票统计表'.".xls");    
		header("Content-Transfer-Encoding: binary ");
	

    $conn = mysql_connect($localhost,$dbuser,$dbpwd) or die("连接数据库失败");
    mysql_select_db($dbname, $conn);
   mysql_query("set names 'utf8'");
	@$htbh = $_GET['htbh'];
	@$xmbh = $_GET['xmbh'];
	@$xmmc = $_GET['xmmc'];
	@$jfdw = $_GET['jfdw'];
	@$htmc = $_GET['htmc'];
	@$nd = $_GET['nd'];
	@$yf = $_GET['yf'];		
	@$kpdw = $_GET['kpdw'];		
	@$pzh = $_GET['pzh'];
	@$begin = $_GET['begin'];
	@$finish = $_GET['finish'];				
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
				if(!empty($_GET['jfdw'])){
					$wherelist[] = "jfdw like '%{$_GET['jfdw']}%'";
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
				if(!empty($_GET['kpdw'])){
					$wherelist[] = "kpdw like '%{$_GET['kpdw']}%'";
				}
				if(!empty($_GET['pzh'])){
					$wherelist[] = "pzh like '%{$_GET['pzh']}%'";
				}
				if(!empty($_GET['begin'])){
					$wherelist[] = "date >= '{$_GET['begin']}'";
				}
				if(!empty($_GET['finish'])){
					$wherelist[] = "date <= '{$_GET['finish']}'";
				}
			if(count($wherelist) > 0){         //组装查询条件
				$where = " where ".implode(' AND ' , $wherelist); 
			}
    @$result=mysql_query("SELECT * FROM $tbname $where");
    echo "<table>";
    echo "<tr>";
	 echo "<th>年度</th>";
	 echo "<th>开票申请</th>";
	 echo "<th>月份</th>";
	 echo "<th>凭证号</th>";	
	 echo "<th>类别</th>	";		
	 echo "<th>开票日期</th>";
	 echo "<th>分管领导</th>";
	 echo "<th>申请人</th>";
	 echo "<th>发票种类</th>";
	 echo "<th>税率</th>";
	 echo "<th>发票号码</th>";
	 echo "<th>开票单位</th>";
	 echo "<th>开票内容</th>";
	 echo "<th>发票内容</th>";
	 echo "<th>金额</th>";
	 echo "<th>税额</th>";
	 echo "<th>价税合计</th>";
	 echo "<th>备注</th>";
     echo "</tr>";
    while($row=mysql_fetch_array($result)){
    echo "<tr align='center'>";
  if($row["je"]!=0&& $row["je"]!==''){
   $je = $row["je"]."万元";
  }else{
   $je = 0;
  }
  if($row["se"]!=0&& $row["se"]!==''){
   $se = $row["se"]."万元";
  }else{
   $se = 0;
  }
  echo "<tr align='center'>";
  echo "<td  width='60px'>{$row['nd']}</td>";
  echo "<td  width='100px'>{$row['kprq']}</td>";
  echo "<td  width='50px'>{$row['yf']}</td>";
  echo "<td  width='150px'>{$row['pzh']}</td>";
  echo "<td  width='60px'>{$row['lb']}</td>";	
  echo "<td  width='150px'>{$row['kprq']}</td>";
  echo "<td  width='100px'>{$row['fgld']}</td>";
  echo "<td  width='100px'>{$row['sqr']}</td>";
  echo "<td  width='100px'>{$row['fpzl']}</td>";
  echo "<td  width='60px'>{$row['sl']}</td>";
  echo "<td  width='120px'>{$row['fphm']}</td>";
  echo "<td  width='100px'>{$row['kpdw']}</td>";
  echo "<td  width='100px'>{$row['kpnr']}</td>";
  echo "<td  width='100px'>{$row['fpnr']}</td>";
  echo "<td  width='100px'>$je</td>";
  echo "<td  width='100px'>$se</td>";
  echo "<td  width='100px'>{$row['jshj']}</td>";
  echo "<td  width='60px'>{$row['bz']}</td>";
    }
?>
