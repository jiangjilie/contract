<?php

    error_reporting(E_ALL ^ E_DEPRECATED);
    $localhost = 'localhost';
    $dbname = 'contract';
    $dbuser = 'root';
    $dbpwd = '123456';
    $tbname = "purchase";

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
		header("Content-Disposition: attachment;filename=".'零星采购统计表'.".xls");    
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
    @$result=mysql_query("SELECT * FROM $tbname $where");
    echo "<table>";
    echo "<tr>
			<th class='tr-th' style='text-align:center;'>年度</th>
			<th class='tr-th' style='text-align:center;'>月份</th>			
			<th class='tr-th' style='text-align:center;'>项目编号</th>
			<th class='tr-th' style='text-align:center;'>项目名称</th>
			<th class='tr-th' style='text-align:center;'>乙方单位</th>
			<th class='tr-th' style='text-align:center;'>合同名称</th>
			<th class='tr-th' style='text-align:center;'>联系人</th>
			<th class='tr-th' style='text-align:center;'>付款金额</th>
			<th class='tr-th' style='text-align:center;'>付款时间</th>
			<th class='tr-th' style='text-align:center;'>凭证号</th>
			<th class='tr-th' style='text-align:center;'>备注</th>
		  </tr>";
    echo "</tr>";
    while($row=mysql_fetch_array($result)){
    echo "<tr align='center'>";
    echo "<td  width='70px'>{$row['nd']}</td>";
    echo "<td  width='100px'>{$row['yf']}</td>";					
    echo "<td  width='100px'>{$row['xmbh']}</td>";
    echo "<td  width='250px'>{$row['xmmc']}</td>";
    echo "<td  width='150px'>{$row['dwmc']}</td>";
    echo "<td  width='150px'>{$row['htmc']}</td>";
    echo "<td  width='100px'>{$row['lxr']}</td>";
    echo "<td  width='150px'>{$row['fkje']}</td>";
    echo "<td  width='100px'>{$row['fksj']}</td>";
    echo "<td  width='100px'>{$row['pzh']}</td>";
    echo "<td  width='60px'>{$row['bz']}</td>";
    }
?>
