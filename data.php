<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>数据统计</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/font-awesome.min.css" rel="stylesheet"/>
		<link href="css/font-awesom.min.css" rel="stylesheet"/>
		<link href="css/sidebar-menu.css" rel="stylesheet"/>
		<link href="css/ace-rtl.min.css" rel="stylesheet"/>
		<link href="css/ace-skins.min.css" rel="stylesheet"/>
		<link href="css/common.css" rel="stylesheet"/>
		<link href="css/easyui.css" rel="stylesheet"/>
		<link href="css/icon.css" rel="stylesheet"/>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/Common.js"></script>
		<script src="js/layer/layer.js"></script>
		<script src="js/jquery-migrate-1.1.0.js"></script>
		<script src="js/jquery.jqprint-0.3.js"></script>
		<script src="js/image.js"></script>
		<link rel="stylesheet" href="css/jquery.treeview.css" type="text/css"/>
		<link rel="stylesheet" href="css/scrollbox.css" type="text/css"/>
		<script src="js/jquery.treeview.js" type="text/javascript"></script>
		<script>
				function subForm(){
					// $xmmc = document.getElementById('xmmc').value;
					// $xmbh = document.getElementById('xmbh').value;
					// 	if($xmmc==''&&$xmbh==''){
					// 	layer.alert('请输入查询内容（具体精确一点）');
					// 	return false;
					// 	}
				       $("#Form").submit();
				   }
			</script>
			<script>
					function year_subForm(){
						// $xmmc = document.getElementById('xmmc').value;
						// $xmbh = document.getElementById('xmbh').value;
						// 	if($xmmc==''&&$xmbh==''){
						// 	layer.alert('请输入查询内容（具体精确一点）');
						// 	return false;
						// 	}
					       $("#year_Form").submit();
					   }
				</script>
				<script>
					function excel(){
					
						// var xmmc = $("#xmmc").val();
						// var xmbh = $("#xmbh").val();
						// var dwmc = $("#dwmc").val();
						// var htmc = $("#htmc").val();
						// var htbh = $("#htbh").val();
						var nd = $("#nd").val();
						var yf = $("#yf").val();
						// alert(xmbh);
						window.location.href= "excel_date.php?nd=" + nd + "&yf=" + yf ;
										// layer.open({
										//  type: 2,
										//  skin: 'layui-layer-demo',
										//   area: ['1200px', '300px'],
										//  closeBtn: 1,
										//  anim: 2,
										//  shadeClose: true,
										//  content: 'income_print.php',
										// });
									}		
				</script>
	</head>
		<body marginwidth="0" marginheight="0">
			<div class="col-sm-12">				
			     <div class="box box-primary">
					
			 <h2 style='font-size:20px;text-align:center;color:black'>年度统计表	</h2>
						 <div class="col-sm-12">
							  <div class="box box-primary">
								  <div class="panel-body form-horizontal">					
									<form method="get" action="data.php" id="year_Form">
									   <fieldset>
										   <div class="form-group">
											  <div class="col-sm-2" style="width:106px">
												  <span class="form-control" style="border:0px;">
													 年度
												  </span>
											  </div>
											  <div class="col-sm-2">
												  <input type="text" id="xmmc" class="form-control" name="year" value="<?php echo $year;?>">
											  </div>
										   </div>	    
									   </fieldset>
									   <fieldset>
										   <div class="form-group">
											   <div  style="float: right;">
												  <button type="button" style="background-color: #428BCA !important;border-color: #428BCA;border: 5px solid #FF" class="btn btn-primary" onclick="year_subForm();"><span class="fa fa-search" style="border: 5px solid #FF"></span>&nbsp;查询</button>
													<a href="data_byxm_php.php" id="exit" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" ><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">按项目查看</span><span class="l-btn-icon icon-exit">&nbsp;</span></span></a>													  
											  </div>			                  							  							 							  
										  </div>
										  </div>
									   </fieldset>
									</form>
								  </div>
							  </div>
						 <table id="dg" style="word-break:break-all; word-wrap:break-all" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
							  <tr style="background-color:#438eb9;color: #FFF;">
								<th class="tr-th" style="text-align:center;">年度</th>
								<!-- <th class="tr-th" style="text-align:center;">月份</th> -->
								<th class="tr-th" style="text-align:center;">合同总数量</th>
								<th class="tr-th" style="text-align:center;">收入合同数量</th>
								<th class="tr-th" style="text-align:center;">支出合同数量</th>
								<!-- <th class="tr-th" style="text-align:center;">采购合同数量</th> -->
								<th class="tr-th" style="text-align:center;">收入总额</th>
								<th class="tr-th" style="text-align:center;">已收款</th>
								<th class="tr-th" style="text-align:center;">收入比例</th>
								<th class="tr-th" style="text-align:center;">支出总额</th>
								<th class="tr-th" style="text-align:center;">已支出</th>
								<th class="tr-th" style="text-align:center;">支出比例</th>
								<!-- <th class="tr-th" style="text-align:center;">采购支出</th> -->
								<th class="tr-th" style="text-align:center;">项目汇总</th>
								<th class="tr-th" style="text-align:center;">比例比较</th>
								<th class="tr-th" style="text-align:center;">操作</th>
							  </tr>
							 </thead>
							<tbody>
							<?php
							$con = mysql_connect("localhost","root","123456");
								if(!$con){
								echo "<br/>数据库连接失败".mysql_error();
								}
							//选择数据库
								mysql_select_db("contract");
								//设置mysql字符编码
								mysql_query("set names utf8;");			
								
								
								$wherelist = array();//获取查询条件
									if(!empty($_GET['year'])){
										$wherelist[] = "nd like '%{$_GET['year']}%'";
									}							
									
								if(count($wherelist) > 0){         //组装查询条件
									$where = " where ".implode(' AND ' , $wherelist); 
								}
								
								$sql = "select nd,yf,count(0) as total,count(ishtlx = '1' or null) as income,count(ishtlx = '2' or null) as spend,count(ishtlx = '3' or null) as purchase,sum(srhtze) as sz,sum(ysk) as ys,sum(gsk) as gs,sum(zchtze) as zz,sum(yfk) as yfk,sum(wfk) as wf,sum(fkje) as fkje from contract   $where group by nd order by nd ";//查询语句	;
								
								$result = mysql_query($sql);
								if (!mysql_num_rows($result)){
								 echo "<tr align='center'>";
								echo "<td  colspan='18' >表中无数据存在!</td>";
								return false;					
								}
						 while($row = mysql_fetch_assoc($result)){
							if($row["sz"]!=0&& $row["sz"]!==''){
							 $sz = number_format($row["sz"],2)."元";
							}else{
							 $sz = 0;
							}
							if($row["ys"]!=0 && $row["ys"]!==''){
							 $ys = number_format($row["ys"],2)."元";;
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
							 $yfk = number_format($row["yfk"],2)."元";;
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
							$ml =  $row['sz']-$row['zz']-$row['fkje'];
							if($ml!=0 && $ml!=''){
							 $ml = number_format($ml,2)."元";
							}else{
							 $ml = 0;
							}
							
							$bj = $srbl - $zcbl ;
							// $bj =  number_format($bj, 2);
							$bj=($bj)."%";
							echo "<tr align='center'>";
							echo "<td  width='100px'>{$row['nd']}</td>";
							// echo "<td  width='100px'>{$row['yf']}</td>";
							echo "<td  width='150px'>{$row['total']}</td>";
							echo "<td  width='150px'>{$row['income']}</td>";
							echo "<td  width='150px'>{$row['spend']}</td>";
							// echo "<td  width='150px'>{$row['purchase']}</td>";
							echo "<td  align='right'width='150px'>$sz</td>";
							echo "<td  align='right'width='150px'>$ys</td>";
							echo "<td  width='150px'>$srbl</td>";
							echo "<td  align='right'width='150px'>$zz</td>";
							echo "<td  align='right'width='150px'>$yfk</td>";;
							echo "<td  width='150px'>$zcbl</td>";
							// echo "<td  width='150px'>$fkje</td>";
							echo "<td  align='right'width='150px'>$ml</td>";
							echo "<td  width='150px'>$bj</td>";
							echo "<td  width='100px'>
							<a href='excel_nd.php?nd={$row['nd']}' id='export' title='点击导出该年数据' onclick='('export')' class='easyui-menubutton l-btn l-btn-small l-btn-plain m-btn m-btn-small' data-options='menu:'#mmexport',iconCls:'icon-export'' group=''><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>导出</span><span class='l-btn-icon icon-export'>&nbsp;</span><span class='m-btn-line'></span></span></a>
							</td>";		
								echo "</tr>";
						 }					 
						 echo"</table>";
					?>						
 </body>

</html>