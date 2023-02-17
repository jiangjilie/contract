<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>发票信息更改</title>
	</head>

	<?php
		//声明变量并接受form表单发送过来的数据
			$id = $_POST['id'];	
			$user = $_POST['user'];			
			$kprq = $_POST['kprq'];
			$kprq = str_replace("-",".",$kprq);
			$nd = substr($kprq,0,4);
			$yf = substr($kprq,5,2);
			$htbh=$_POST['htbh'];
			$xmbh=$_POST['xmbh'];
			$lb=$_POST['lb'];
			$pzh=$_POST['pzh'];
			$fgld=$_POST['fgld'];
			$sqr=$_POST['sqr'];
			$fpzl=$_POST['fpzl'];
			$sl=$_POST['sl'];
			$fphm=$_POST['fphm'];
			$kpdw=$_POST['kpdw'];
			$kpnr=$_POST['kpnr'];
			$fpnr=$_POST['fpnr'];
			$je=$_POST['je'];
			$xje=$_POST['jshj'];  //修改过后的价税合计
			$yje= $_POST['yjshj'];	//原来的价税合计
			$xse=$_POST['se'];	//新税额
			$yse=$_POST['yse'];	//原税额
		//连接数据库
			$con = mysql_connect("localhost","root","123456");
			if(!$con){
			echo "<br/>数据库连接失败".mysql_error();
			}
		//选择数据库
			mysql_select_db("contract");
			//设置mysql字符编码
			mysql_query("set names utf8;");
			
			
			
			
		
		
		//updat语句 （更新数据）
		 $update1="update invoice set nd='{$nd}',yf='{$yf}',kprq='{$kprq}',htbh='{$htbh}',xmbh='{$xmbh}',lb='{$lb}',pzh='{$pzh}',fgld='{$fgld}',sqr='{$sqr}',fpzl='{$fpzl}',sl='{$sl}',fphm='{$fphm}',kpdw='{$kpdw}',kpnr='{$kpnr}',fpnr='{$fpnr}',je='{$je}',se='{$xse}',jshj='{$xje}',bz='{$bz}' where id='$id'  ";
		 mysql_query($update1);
	
	// insert语句（插入user数据，新增）
	$insert1 = "insert into user (user,czlx,htlx,htmc) values('$user','修改','发票','$htbh')";
	mysql_query($insert1);
	
			$sql="select srse  from contract where htbh='$htbh' ";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			$csrse=$row["srse"];
			$rowse=$xse-$yse;
			$csrse=$csrse+$rowse;
			
			$sql="select ykp from income where htbh='$htbh' ";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			// $ihtze=$row["htze"];
			// $iysk=$row["ysk"];
			$ykp=$row["ykp"];			
			$rowje=$xje-$yje;
			
			$ykp=$ykp+$rowje;
			
			
			// $cysk=$cysk+$rowje;
			// $cgsk=$chtze-$cysk;
			// $iysk=$iysk+$rowje;
			// $igsk=$ihtze-$iysk;
			
			//更新contract
			$update = "update contract set srse='$csrse' where  htbh='$htbh' ";
			mysql_query($update);
			//更新income
			$update = "update income set ykp='$ykp' where htbh='$htbh'";
			mysql_query($update);
			
			//判断合同是否是单价合同，若是则合同总额与开票价税合计同步
			$sql="select htze from income where htbh='$htbh' ";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			$htze=$row["htze"];
			$htze=$htze+$rowje;
			
			$sql="select srhtze  from contract where htbh='$htbh' ";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			$srhtze=$row["srhtze"];									
			$srhtze=$srhtze+$rowje;
			
			$sql="select begin from income where htbh='$htbh' ";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			$begin=$row['begin'];
			if($begin==1){
				$update = "update income set htze='$htze' where  htbh='$htbh'";
				mysql_query($update);
				$update = "update contract set srhtze='$srhtze' where  htbh='$htbh'";
				mysql_query($update);
			}
		 ?>	
</html>
