<?php

    error_reporting(E_ALL ^ E_DEPRECATED);
    $localhost = 'localhost';
    $dbname = 'contract';
    $dbuser = 'root';
    $dbpwd = '123456';
    $tbname = "income";

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
		header("Content-Disposition: attachment;filename=".'收入合同统计表'.".xls");    
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
				if(!empty($_GET['begin'])){
					$wherelist[] = "date >= '{$_GET['begin']}'";
				}
				if(!empty($_GET['finish'])){
					$wherelist[] = "date <= '{$_GET['finish']}'";
				}
				
			if(count($wherelist) > 0){         //组装查询条件
				$where = " where ".implode(' AND ' , $wherelist); 
			}
    @$result=mysql_query("SELECT * FROM $tbname $where  ");

    echo "<table style='border:1px'>";
    echo "<tr>";
		echo "<th>年度</th>";
		echo "<th>月份</th>";
		echo "<th>合同编号</th>";				
		echo "<th>项目编号</th>";
		echo "<th>项目名称</th>";
		echo "<th>甲方单位</th>";
		echo "<th>合同名称</th>";
		echo "<th>合同类型</th>";
		echo "<th>联系人</th>";
		echo "<th>签订时间</th>";
		echo "<th>合同工期</th>";
		echo "<th>付款方式</th>";
		echo "<th>结算方式</th>";
		echo "<th>合同总额</th>";
		echo "<th>已收款</th>";
		echo "<th>应收款</th>";
		echo "<th>已开票</th>";
		echo "<th>备注</th>";
    echo "</tr>";
    while($row=mysql_fetch_array($result)){
    echo "<tr align='center'>";
   echo "<td  width='60px'>{$row['nd']}</td>";
   echo "<td  width='60px'>{$row['yf']}</td>";
   echo "<td  width='100px'>{$row['htbh']}</td>";					
   echo "<td  width='100px'>{$row['xmbh']}</td>";
   echo "<td  width='200px'>{$row['xmmc']}</td>";
   echo "<td  width='150px'>{$row['dwmc']}</td>";
   echo "<td  width='150px'>{$row['htmc']}</td>";
   echo "<td  width='100px'>{$row['htlx']}</td>";
   echo "<td  width='100px'>{$row['lxr']}</td>";
   echo "<td  width='120px'>{$row['qdsj']}</td>";
   echo "<td  width='100px'>{$row['htgq']}</td>";
   echo "<td  width='100px'>{$row['fkfs']}</td>";
   echo "<td  width='100px'>{$row['jsfs']}</td>";
   echo "<td  width='100px'>{$row['htze']}</td>";
   echo "<td  width='100px'>{$row['ysk']}</td>";
   echo "<td  width='100px'>{$row['gsk']}</td>";
   echo "<td  width='100px'>{$row['ykp']}</td>";
   echo "<td  width='100px'>{$row['bz']}</td>";
    }
?>
