<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>开发合同更改</title>
		<link href='css/common.css' rel='stylesheet'/>
		<link href='css/easyui.css' rel='stylesheet'/>
		<link href='css/icon.css' rel='stylesheet'/>
		<script src='js/jquery-1.10.2.min.js'></script>
		<script src='js/layer/layer.js'></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/bootstrap-datepicker.zh-CN.js"></script>
		<script src="js/date.js" type="text/javascript"></script>
		<link href="css/datepicker3.css" rel="stylesheet"/>
		<link type="text/css" rel="stylesheet" href="css/image.css" />
		
		<link href="css/input/bootstrap.min.css" rel="stylesheet"/>
		<link href="css/input/font-awesome.min.css" rel="stylesheet"/>
		<link href="css/input/dataTables.bootstrap.css" rel="stylesheet"/>
		<link href="css/input/ionicons.min.css" rel="stylesheet"/>
		<link href="css/input/ace.min.css" rel="stylesheet"/>
		<link href="css/input/_all-skins.min.css" rel="stylesheet"/>
		<link href="css/input/toastr.min.css" rel="stylesheet"/>
		<link href="css/input/main.css" rel="stylesheet"/>
		<style>
			table {
			    width: 100%;
			}
			
			    table tr td {
			        /* border: 1.5px solid; */
			        height: 35px;
			        text-align: center;
			    }
			
			.datab-1 {
			    width: 10%;
				text-align:right;
			}
			
			.datab-2 {
			    width: 23%;
				/* border: 1.5px solid; */
			}
			
			h3 {
			    width: 100%;
			    text-align: center;
			}
		</style>
		 
		    <style>
		        .tdtitle {
		            color: black;
					font-size: 16px;
		        }
		
		        .txtarea {
		            width: 100%;
		            height: 60%;
		        }
		
		        .datafont {
		            font-family: 粗体;
		            font-size: 14px;
		        }
				.txtarea{
						border: 1px solid #95B8E7;
						color: black;
				}
		    </style>
		
		
	</head>
	<body>
		<div class="alldiv" style="height:700px;">
		<div class="imageShow" style="width: 75%;border:1px solid #95B8E7">
		<div id='divinput' class='cyinputdiv' style='height:460px;'>
					<form method='post' action='spend_changephp.php' id='Form'>
		<?php
			//声明变量并接受form表单发送过来的数据
				$user= $_GET['user']; 
				$id = $_GET['id']; 
			echo"<input name='id' value='$id' id='_easyui_textbox_input9' type='text' style='display:none'>";
			echo"<input name='user' value='$user' id='_easyui_textbox_input9' type='text' style='display:none'>";
			//连接数据库
				require("dbconfig.php");//导入配置文件
				$link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
				mysql_select_db(DBNAME,$link);//选择数据库
				mysql_query("set names 'utf8'");//选择字符集
				$sql = "select * from spend where id=$id";//查询语句	
				$result=mysql_query($sql,$link);
				$row = mysql_fetch_assoc($result);
				$htbh = $row['htbh'];
				$yfk=$_GET['yfk'];
				$ysp=$_GET['ysp'];
				$yfk=substr($yfk,0,strlen($yfk)-3);
				
			
				echo"<section class='content'>
					<div class='row'>
						<!-- left column -->
						<div class='col-md-12'>
							<!-- general form elements -->
							<div class='box box-primary'>
								<!-- /.box-header -->
								<h3><span>支付合同修改表</span></h3>
								<table>
									<tr>
										<td class='datab-1 tdtitle'>合同编号</td>
										<td class='datab-2'><textarea class='txtarea' id='htbh' name='htbh' >{$row['htbh']}</textarea></td>
										<td class='datab-1 tdtitle'>项目编号</td>
										<td class='datab-2'><textarea class='txtarea' id='xmbh' name='xmbh' >{$row['xmbh']}</textarea></td>
										<td class='datab-1 tdtitle'>项目名称</td>
										<td class='datab-2'><textarea class='txtarea' name='xmmc' id='xmmc' value='' id='xmmc'>{$row['xmmc']}</textarea></td>
									</tr>
									<tr>
										<td class='datab-1 tdtitle'>甲方单位</td>
										<td class='datab-2'><textarea class='txtarea' name='dwmc' id='dwmc'>{$row['dwmc']}</textarea></td>
										<td class='datab-1 tdtitle'>合同名称</td>
										<td class='datab-2'><textarea class='txtarea' name='htmc' id='htmc'>{$row['htmc']}</textarea></td>
										<td class='datab-1 tdtitle'>联系人</td>
										<td class='datab-2'><textarea class='txtarea' name='lxr' >{$row['lxr']}</textarea></td>
									</tr>
									<tr>
										
										<td class='datab-1 tdtitle'>签订时间</td>
										<td class='datab-2'><span class='ace-calendar-picker' style='width:100%;'>
														<div>
														<input value='{$row['qdsj']}'name='qdsj' id='qdsj'type='text'style='width: 92%;height: 60%;color:black;'><input  id='dpStart' placeholder=''  autocomplete='off' type='text' class='ace-calendar-picker-input ace-input'style='width: 8%;height: 60%;background-color:white;color:rgba(0,0,0,0);background:url(css/images/date.png)no-repeat #f8f8f8;background-size: 24px 32px; '>
														<span class='ace-calendar-picker-icon'>							
														</span>
														</div>
															</span></td>
										<td class='datab-1 tdtitle'>合同工期</td>
										<td class='datab-2'><textarea class='txtarea' name='htgq' >{$row['htgq']}</textarea></td>
										<td class='datab-1 tdtitle'>付款方式</td>
										<td class='datab-2'><textarea class='txtarea' name='fkfs' >{$row['fkfs']}</textarea></td>
									</tr>
									<tr>
										
										<td class='datab-1 tdtitle'>结算方式</td>
										<td class='datab-2'><textarea class='txtarea' name='jsfs' >{$row['jsfs']}</textarea></td>
										<td class='datab-1 tdtitle'>合同总额</td>
										<td class='datab-2'><textarea class='txtarea' name='htze' id='htze' onkeyup='money()' >{$row['htze']}</textarea></td>
										<td class='datab-1 tdtitle'>已付款</td>
										<td class='datab-2'><textarea class='txtarea' name='yfk' id='yfk' onclick='add()'onkeyup='money()'>{$row['yfk']}</textarea></td>
									</tr>
									<tr>
										
										<td class='datab-1 tdtitle'>未付款</td>
										<td class='datab-2'><textarea class='txtarea' name='wfk' id='wfk' >{$row['wfk']}</textarea></td>
										<td class='datab-1 tdtitle'>已收票</td>
										<td class='datab-2'><textarea class='txtarea' id='ysp' name='ysp'  onclick='addy()'>{$row['ysp']}</textarea></td>
										<td class='datab-1 tdtitle'>税额</td>
										<td class='datab-2'><textarea class='txtarea' id='se' name='se' onclick='addy()' >{$row['se']}</textarea></td>
										<td style='display:none'class='datab-1 tdtitle'>原税额</td>
										<td style='display:none'class='datab-2'><textarea class='txtarea' id='yse' name='yse'  >{$row['se']}</textarea></td>
									</tr>
									<tr id ='spmx'>
										<td class='datab-1 tdtitle'>收票明细</td>
										<td class='datab-2' colspan='5'><textarea class='txtarea' id ='spmx' name='spmx' >{$row['spmx']}</textarea></td>
									
									</tr>
								
									<tr>
										<td class='datab-1 tdtitle'>备注</td>
										<td class='datab-2' colspan='5'><textarea class='txtarea' name='bz' >{$row['bz']}</textarea></td>
									</tr>  
									<tr>
									<tr style='display:none;'>
										<td>user</td>
										<td colspan='5'><span class='textbox' style='width: 100%;'><input name='user' value=' $user' id='_easyui_textbox_input9' type='text' class='textbox-text validatebox-text' autocomplete='off' tabindex='' placeholder='' style='margin: 0px; padding-top: 0px; padding-bottom: 0px; height: 24px; line-height: 24px; width: 100%;'></span></td>
									</tr>
									<tr style='display:none;'>
										<td>合同名称</td>
										<td colspan='1'><span class='textbox' style='width: 100%;'><input name='chtmc' value='{$row['htmc']}' id='_easyui_textbox_input9' type='text' class='textbox-text validatebox-text' autocomplete='off' tabindex='' placeholder='' style='margin: 0px; padding-top: 0px; padding-bottom: 0px; height: 24px; line-height: 24px; width: 100%;'></span></td>
										<td>单位名称</td>
										<td colspan='1'><span class='textbox' style='width: 100%;'><input name='cdwmc' value='{$row['dwmc']}' id='_easyui_textbox_input9' type='text' class='textbox-text validatebox-text' autocomplete='off' tabindex='' placeholder='' style='margin: 0px; padding-top: 0px; padding-bottom: 0px; height: 24px; line-height: 24px; width: 100%;'></span></td>
										<td>项目名称</td>
										<td colspan='1'><span class='textbox' style='width: 100%;'><input name='cxmmc' value='{$row['xmmc']}' id='_easyui_textbox_input9' type='text' class='textbox-text validatebox-text' autocomplete='off' tabindex='' placeholder='' style='margin: 0px; padding-top: 0px; padding-bottom: 0px; height: 24px; line-height: 24px; width: 100%;'></span></td>									
										<td>合同编号</td>
										<td colspan='1'><span class='textbox' style='width: 100%;'><input name='chtbh' value='{$row['htbh']}' id='_easyui_textbox_input9' type='text' class='textbox-text validatebox-text' autocomplete='off' tabindex='' placeholder='' style='margin: 0px; padding-top: 0px; padding-bottom: 0px; height: 24px; line-height: 24px; width: 100%;'></span></td>																		
									</tr>
									<tr>
										<td colspan='7'>
										<center>
										<a href='javascript:;' id='ok' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' onclick='subForm();' ><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>保存</span><span >&nbsp;</span></span></a>
											<a href='javascript:;' id='exit' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' ><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>退出</span><span class='l-btn-icon icon-exit'>&nbsp;</span></span></a>
											</center>
										</td>
									</tr>			
								</table>
								</form>
										</div>
										<!-- /.box -->
									</div>
									<!--/.col (left) -->
							
								</div>
								<!-- /.row -->
								</section>";
						if($row['spmx']==''){
						 	echo" <script> document.getElementById('spmx').style.display='none';</script>";
						 }
						
						?>
						</form>
						</div>
						</div>
						<script>
						    <!--将select的值赋给input框-->
						   $('#dpStart').on('change', function(){
						   	// alert(this.value); //or alert($(this).val());
						   	document.getElementById("qdsj").value =this.value;
						   });
						 
						</script>
						<script>
							$("yfk").blur(function() {
									  $("#Form").submit();
													 })
							$("ysp").blur(function() {
									  $("#Form").submit();
													 })
							$("se").blur(function() {
									  $("#Form").submit();
													 })
						function subForm(){
							var htbh = document.getElementById('htbh').value;
									if(htbh==''){
									layer.alert('合同编号不能为空！', {
									icon: 5,
									title: '提示',
									end:function(){
										$('#htbh').focus();
										// return false;
									}
									});
									}
												
							if(htbh !='')
								$.ajax({					
								type:"post",			
								url:"spend_changephp.php",
								data: $('#Form').serialize(),
								cache: false,
								success: function (data) {
									 layer.alert('修改成功！', {
									 icon: 6,   //绿色笑脸
									 title: '提示',
									 end:function(){
									 					  var index = parent.layer.getFrameIndex(window.name);
									 					   parent.layer.close(index);
									 					 // layer.closeAll();
									 					 // window.location.href='income.php';
									 }
									 });
							  }
							  });
						   }
						   $("#exit").click(function(){
							   var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
							   parent.layer.close(index); //
							   })
						</script>
						<!-- <script>
							var htze = document.getElementById("htze").value;
							var yfk = document.getElementById("yfk").value;
							var wfk = document.getElementById('wfk');   //获取元素div
							wfk.onclick = function(){   //给元素增加点击事件
								wfk.value=htze-yfk;
							};
							wfk.click(); 
							function money(){
							var htze = document.getElementById("htze").value;
							var yfk = document.getElementById("yfk").value;
							document.getElementById("wfk").value=htze-yfk;
									}
						</script> -->
						<script>
							/**
							 ** 减法函数，用来得到精确的减法结果
							 ** 说明：javascript的减法结果会有误差，在两个浮点数相减的时候会比较明显。这个函数返回较为精确的减法结果。
							 ** 调用：accSub(arg1,arg2)
							 ** 返回值：arg1加上arg2的精确结果
							 **/
							function accSub (arg1, arg2) {
							  var r1, r2, m, n;
							  try {
							    r1 = arg1.toString().split('.')[1].length;
							  } catch (e) {
							    r1 = 0;
							  }
							  try {
							    r2 = arg2.toString().split('.')[1].length;
							  } catch (e) {
							    r2 = 0;
							  }
							  m = Math.pow(10, Math.max(r1, r2)); // last modify by deeka //动态控制精度长度
							  n = (r1 >= r2) ? r1 : r2;
							  return ((arg1 * m - arg2 * m) / m).toFixed(n);
							}
							
							// 给Number类型增加一个mul方法，调用起来更加方便。
							Number.prototype.sub = function (arg) {
							  return accMul(arg, this);
							};
							
							
							function money(){
								
							var htze = document.getElementById("htze").value;
							var yfk = document.getElementById("yfk").value;
							var pattern = /\d/;
							if(!pattern.test(htze)&& htze!=""){
								layer.alert('请输入数字！', {
								icon: 5,
								title: '提示',
								end:function(){					
									$('#htze').focus();
									$('#htze').val("");
									
								}
								});
								return false
							}
							if(yfk!=""){
							if(!pattern.test(yfk)){
								layer.alert('请输入数字！', {
								icon: 5,
								title: '提示',
								end:function(){
									$('#yfk').focus();
									$('#yfk').val("");
								}
								});
								return false;
							}
							}
							document.getElementById("wfk").value=accSub(htze,yfk);
									}
						</script>
						<script>
								function add(){
							var htbh = document.getElementById("htbh").value;
							var xmbh = document.getElementById("xmbh").value;
							var xmmc = document.getElementById("xmmc").value;
							var dwmc = document.getElementById("dwmc").value;
							var htmc = document.getElementById("htmc").value;	
							layer.open({
							 type: 2,
							 area: ['1000px', '600px'],
							 skin: 'layui-layer-demo',
							 closeBtn: 1,
							 anim: 2,
							 shadeClose: true,
							 content: 'bill_spend.php?htbh='+htbh+'&xmbh='+xmbh+'&xmmc='+xmmc+'&dwmc='+dwmc+'&htmc='+htmc,
								 // end:function(){
								 // 	location.reload();
								 // }
								});
							}
							function addy(){
							var htbh = document.getElementById("htbh").value;
							var xmbh = document.getElementById("xmbh").value;
							var xmmc = document.getElementById("xmmc").value;
							var dwmc = document.getElementById("dwmc").value;
							var htmc = document.getElementById("htmc").value;	
							layer.open({
							 type: 2,
							 area: ['1000px', '600px'],
							 skin: 'layui-layer-demo',
							 closeBtn: 1,
							 anim: 2,
							 shadeClose: true,
							 content: 'bill_spend_invoice.php?htbh='+htbh+'&xmbh='+xmbh+'&xmmc='+xmmc+'&dwmc='+dwmc+'&htmc='+htmc,
								 // end:function(){
								 // 	location.reload();
								 // }
								});
							}
						</script>
												<link href="Content/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
												<link href="Content/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
												<link href="Content/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
												<link href="Content/sidebar-menu/sidebar-menu.css" rel="stylesheet"/>
												<link href="Content/ace/css/ace-rtl.min.css" rel="stylesheet"/>
												<link href="Content/ace/css/ace-skins.min.css" rel="stylesheet"/>	
											<div class="image-table" style="margin:2px;padding:2px;border:1px solid #95B8E7">
												<div class="image-table-title">
													<span>收票信息</span>
												</div>
												<?php 
												$sql = "select * from bill where htbh='$htbh' and yfk is not null order by id";//查询语句	
												$rows = mysql_num_rows(mysql_query("$sql"));
												$result=mysql_query($sql,$link);
												if (!mysql_num_rows($result)){
												echo "<center style='color:red;'>无收票信息存在!</center>";
												return false;					
												}
												// $row = mysql_fetch_assoc($result);		
												echo "<center ><span style='font-size: 16px;'> 该合同共{$rows}次收票记录</span><span>(点击查看详情)<span></center>";
												$i=0;
												echo"
												<div class='sidebar' id='sidebar' style='width:100%;postion:'>
													<ul class='nav nav-list' id='menu'>
												";
												while($row = mysql_fetch_assoc($result) ){
												$i++;
												echo"
												
													  <li id='submenutab_1'>
														<a href='javascript:;' class='dropdown-toggle'>
														  <i class='icon-paste'style='float:left'>
														  </i>
														  <span class='menu-text' style='line-height:34px;padding-left:0px;font-size:15px'>第{$i}次收票记录</span><span class='menu-text' style='line-height:34px;padding-left:0px;font-size:'>（价税：{$row['yfk']} )</span>
														  <b class='arrow icon-angle-down'>
														  </b>
														</a>
													   <ul class='submenu' style='display: none;'>  
														  <li id='submenutab_2'>														       
															  <textarea style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly>收票金额:{$row['yfk']}</textarea>
														  </li>
														  <li id='submenutab_2'>
															<textarea style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly>税额:{$row['ysk']}</textarea>
														  </li>
														  <li id='submenutab_2'>
															 <textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >凭证号:{$row['pzh']}</textarea>
														  </li>
														  <li id='submenutab_2'>
															<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >发票时间:{$row['kprq']}</textarea>						
														  </li>	 
														  <li id='submenutab_2'>
															<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >备注:{$row['bz']}</textarea>									
														  </li> 													
														</ul>
													  </li>
												
														  ";
												}
												$sql = "select count(*) as number,sum(yfk) as jshj,max(kprq) as kprq,max(pzh) as pzh from bill where htbh='$htbh' ";//查询语句
												$result=mysql_query($sql,$link);
												$ro = mysql_fetch_assoc($result);
												echo"
												<table>
												<tr>
												<td><input  style='height:30px;color:black' class='txtarea' name='xmbh' readonly value='所有收票价税总合计：{$ro['jshj']}'></td>
												</tr>
												</table>";
														?>
														</ul>
														</div>
													</div>
													</div>
									<script src="js/jquery-1.9.1.min.js"></script>
									<script src="js/sidebar-menu.js"></script>
									<script type="text/javascript" src="js/jquery.min.js"></script>
									<script type="text/javascript" src="js/bootstrap.min.js"></script> 
									<script src="Content/bootstrap/js/bootstrap-tab.js"></script>
									<script src="js/ace.min.js"></script>
									<script src="js/ace-elements.min.js"></script>
									<script src="js/ace-extra.min.js"></script>
						</body>
		
</html>