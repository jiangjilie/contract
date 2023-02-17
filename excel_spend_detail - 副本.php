<?php

    error_reporting(E_ALL ^ E_DEPRECATED);
    $localhost = 'localhost';
    $dbname = 'contract';
    $dbuser = 'root';
    $dbpwd = '123456';
    $tbname = "spend";

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
		header("Content-Disposition: attachment;filename=".'支付合同统计表'.".xls");    
		header("Content-Transfer-Encoding: binary ");
	

    $conn = mysql_connect($localhost,$dbuser,$dbpwd) or die("连接数据库失败");
    mysql_select_db($dbname, $conn);
   mysql_query("set names 'utf8'");
	@$htbh = $_GET['htbh'];
    @$result=mysql_query("SELECT spend.*,bill.jshj as je,bill.pzh,bill.kprq,bill.number FROM spend left  JOIN bill on spend.htbh=bill.htbh where spend.htbh='$htbh'");
    echo "<table>";
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
		echo "<th>已付款</th>";
		echo "<th>未付款</th>";
		echo "<th>已收票</th>";
		echo"<th>付款次数</th>";
		echo "<th>备注</th>";
    echo "</tr>";
	@$hz=$_GET['htze'];
	$i=1;
    while($row=mysql_fetch_array($result)){
	$yfk = $row["je"]."元";	
	$wfk = $hz- $yfk."元";
	if($row["pzh"]!=='' && $row["kprq"]!==''&&$row["je"]!=0){
	 $ysp = $row["pzh"]."（".$row["kprq"]."）"."，".$row["je"];;
	}else{
	 $ykp = "无收票信息";
	}
	$yf=intval($row['yf']);	
	$number="第".$i."次付款";
    echo "<tr align='center'>";
   echo "<td  width='60px'>{$row['nd']}</td>";
   echo "<td  width='60px'>$yf</td>";
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
   echo "<td  width='100px'> {$row['htze']}元</td>";
   echo "<td  width='100px'>$yfk</td>";
   echo "<td  width='100px'>$wfk</td>";
   echo "<td  width='100px'>$ysp</td>";
   echo "<td  width='100px'>$number</td>";
   echo "<td  width='100px'>{$row['bz']}</td>";
   $hz=$hz-$yfk;  //合同剩余部分；
   $i++;
    }
?>
