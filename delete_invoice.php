<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>合同</title>
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
		<script src="js/jquery.treeview.js" type="text/javascript"></script>
		<style>
			.th-tr{
				text-align:center;
				background-color: #438eb9;
			}
		</style>
	</head>
	<?php
	 $htbh = $_GET['htbh'];
	 $xmbh = $_GET['xmbh'];
	 $xmmc = $_GET['xmmc'];
	 $jfdw = $_GET['jfdw'];
	 $htmc = $_GET['htmc'];
	 $nd = $_GET['nd'];
	 $yf = $_GET['yf'];
	 $kpdw = $_GET['kpdw'];
	 $pzh = $_GET['pzh'];
	 $begin = $_GET['begin'];
	 $finish = $_GET['finish'];
	 
	 if($htbh=='' and  $xmbh=='' and $xmmc=='' and $jfdw=='' and $htmc=='' and $nd=='' and $yf=='' and $kpdw=='' and $pzh=='' and $begin==''and $finish==''){
		 echo"
		 <center><h4 style='color:red;padding:5px5px;magin:2px;'>警告：此操作将清空表中所有数据，请谨慎操作</h4><br><h4>提示：若要删除指定数据，请在查询界面输入框中输入条件</center>
		 ";
		  return false;
	 }
	
	 ?>
	 <center><h4 style='color:red;padding:5px5px;magin:2px;'>确定删除以下</h4></center>
		<table  style="margin-left:28px ;border: 1px solid #ddd;" cellpadding="0"; cellspacing="1">
		<tr id="htbh">
			<td style='height:30px;width:65px;text-align:center'>合同编号:</td>
			<td ><input type="text"  style="width: 400px;border: 0;" name="htbh" value="<?php echo $htbh;?>" readonly></td>
		</tr>
		<tr id="xmbh" style="display: ;">
		<td style='height:30px;width:65px;text-align:center'>项目编号:</td>
		<td ><input type="text"  style="width:  400px;border: 0;" name="xmbh" value="<?php echo $xmbh;?>" readonly></td>
		</tr>
		<tr id='xmmc'>
			<td style='height:30px;width:65px;text-align:center'>项目名称:</td>
			<td><textarea class='txtarea' name='xmmc' style="width:  400px;height: 24px;border: 0;"id='xmmc'readonly><?php echo $xmmc;?></textarea></td>
		</tr>
		<tr id="jfdw">
			<td style='height:30px;width:65px;text-align:center'>甲方单位:</td>
			<td ><input type="text" style="width:  400px;border: 0;" name="jfdw" value="<?php echo $jfdw;?>" readonly></td>
		</tr>
		<tr id="kpdw">
			<td style='height:30px;width:65px;text-align:center'>开票单位:</td>
			<td ><input type="text" style="width:  400px;border: 0;" name="kpdw" value="<?php echo $kpdw;?>" readonly></td>
		</tr>
		<tr id="htmc"><td style='height:30px;width:65px;text-align:center'>合同名称:</td>
			<td ><input type="text"  style="width:  400px;border: 0;" name="htmc" value="<?php echo $htmc;?>" readonly></td>
		</tr>
		<tr id="nd">
			<td style='height:30px;width:65px;text-align:center'>年度:</td>
			<td ><input type="text"  style="width:  400px;border: 0;" name="nd" value="<?php echo $nd;?>" readonly></td>
		</tr>
		<tr id="yf">
			<td style='height:30px;width:65px;text-align:center'>月份:</td>
			<td ><input type="text"  style="width:  400px;border: 0;" name="yf" value="<?php echo $yf;?>" readonly></td>
		</tr>
		<tr id="pzh">
			<td style='height:30px;width:65px;text-align:center'>凭证号:</td>
			<td ><input type="text"  style="width:  400px;border: 0;" name="pzh" value="<?php echo $pzh;?>" readonly></td>
		</tr>
		<tr id="begin">
			<td style='height:30px;width:65px;text-align:center'>开始时间:</td>
			<td ><input type="text"  style="width:  400px;border: 0;" name="begin" value="<?php echo $begin;?>" readonly></td>
		</tr>
		<tr id="finish">
			<td style='height:30px;width:65px;text-align:center'>开始时间:</td>
			<td ><input type="text"  style="width:  400px;border: 0;" name="finish" value="<?php echo $finish;?>" readonly></td>
		</tr>
		</table>
		 <center><h4 style='color:red;padding:5px5px;magin:2px;'>在收入合同表中包含的数据吗？</h4></center>
		<?php
		if($htbh==''){
		 	echo" <script> document.getElementById('htbh').style.display='none';</script>";
		 }
		if($xmbh==''){
			echo" <script> document.getElementById('xmbh').style.display='none';</script>";
		}
		if($xmmc==''){
			echo" <script> document.getElementById('xmmc').style.display='none';</script>";
		}
		if($jfdw==''){
			echo" <script> document.getElementById('jfdw').style.display='none';</script>";
		}
		if($htmc==''){
			echo" <script> document.getElementById('htmc').style.display='none';</script>";
		}
		if($kpdw==''){
			echo" <script> document.getElementById('kpdw').style.display='none';</script>";
		}
		if($nd==''){
			echo" <script> document.getElementById('nd').style.display='none';</script>";
		}
		if($yf==''){
			echo" <script> document.getElementById('yf').style.display='none';</script>";
		}
		if($pzh==''){
			echo" <script> document.getElementById('pzh').style.display='none';</script>";
		}
		if($begin==''){
			echo" <script> document.getElementById('begin').style.display='none';</script>";
		}
		if($finish==''){
			echo" <script> document.getElementById('finish').style.display='none';</script>";
		}
	
		?>
		
</html>