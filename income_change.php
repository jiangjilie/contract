<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>收入合同更改</title>
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
						color:black;
				}
		    </style>
		
			
	</head>
	<body>
		<div class="alldiv" style="height:700px;">
		<div class="imageShow" style="width: 75%;border:1px solid #95B8E7">
		<div id='divinput' class='cyinputdiv' style='height:460px;'>
					<form method='post' action='income_changephp.php' id='Form'>
		<?php
			//声明变量并接受form表单发送过来的数据
				$user= $_GET['user']; 
				$id = $_GET['id']; 
				$htbh = $_GET['htbh']; 
			echo"<input name='id' value='$id' id='_easyui_textbox_input9' type='text' style='display:none'>";
			echo"<input name='user' value='$user' id='_easyui_textbox_input9' type='text' style='display:none'>";
			//连接数据库
				require("dbconfig.php");//导入配置文件
				$link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
				mysql_select_db(DBNAME,$link);//选择数据库
				mysql_query("set names 'utf8'");//选择字符集					
				$sql = "select * from income where id='$id'";//查询语句	
				$result=mysql_query($sql,$link);
				$row = mysql_fetch_assoc($result);
				$htbh = $row['htbh'];
				$ykp=$row["ykp"];
				$begin=$row['begin'];
				if($begin==1){
					$isdjht="是";
				}else{
					$isdjht="否";
				}
				$sql = "select sum(jshj) as jshj from invoice where htbh='$htbh' group by htbh ";//查询语句
				$result=mysql_query($sql,$link);
				$row2 = mysql_fetch_assoc($result);
				$jshj=$row2["jshj"];
				if($ykp==0 && $ykp==''){
					$ykp=$jshj;
				}
				// $ysk=$_GET['ysk'];				
				// $ysk=substr($ysk,0,strlen($ysk)-3);
				// $sql2="select sum(jshj) as ykp from invoice where htbh='$htbh' ";
				// $result2=mysql_query($sql2,$link);
				// $row2= mysql_fetch_assoc($result2);
				// if($row2['jshj']!=''){
				// 	$ykp=$row["ykp"];
				// }else{
				// 	$ykp=
				// }
				echo"<section class='content'>
					<div class='row'>
						<!-- left column -->
						<div class='col-md-12'>
							<!-- general form elements -->
							<div class='box box-primary'>
								<!-- /.box-header -->
								<h3><span>收入合同修改表</span></h3>
								<table>
									<tr>
										<td class='datab-1 tdtitle'>合同编号</td>
										<td class='datab-2'><textarea class='txtarea' id='htbh' name='htbh' >{$row['htbh']}</textarea></td>
										<td class='datab-1 tdtitle'>项目编号</td>
										<td class='datab-2'><textarea class='txtarea' id='xmbh'name='xmbh' >{$row['xmbh']}</textarea></td>
										<td class='datab-1 tdtitle'>项目名称</td>
										<td class='datab-2'><textarea class='txtarea' id='xmmc'name='xmmc' id='xmmc'>{$row['xmmc']}</textarea></td>
									</tr>
									<tr>
										<td class='datab-1 tdtitle'>甲方单位</td>
										<td class='datab-2'><textarea class='txtarea' name='dwmc' id='dwmc'>{$row['dwmc']}</textarea></td>
										<td class='datab-1 tdtitle'>合同名称</td>
										<td class='datab-2'><textarea class='txtarea' name='htmc' id='htmc'>{$row['htmc']}</textarea></td>
										<td class='datab-1 tdtitle'>合同类型</td>
										<td class='datab-2'><select name='htlx' style='width: 100%;height: 60%;color:black;' value='{$row['htlx']}'>
														  <option>{$row['htlx']}</option>
														  <option value='软件'>软件</option>
														  <option value='数据'>数据</option>
														  <option value='运营'>运营</option>
														  <option value='集成'>集成</option>
														  <option value='其他'>其他</option>
														</select></td>
									</tr>
									<tr>
										<td class='datab-1 tdtitle'>联系人</td>
										<td class='datab-2'><textarea class='txtarea' name='lxr' >{$row['lxr']}</textarea></td>
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
									</tr>
									<tr>
										<td class='datab-1 tdtitle'>付款方式</td>
										<td class='datab-2'><textarea class='txtarea' name='fkfs' >{$row['fkfs']}</textarea></td>
										<td class='datab-1 tdtitle'>结算方式</td>
										<td class='datab-2'><textarea class='txtarea' name='jsfs' >{$row['jsfs']}</textarea></td>
										<td class='datab-1 tdtitle'>合同总额</td>
										<td class='datab-2'><textarea class='txtarea' name='htze' id='htze' onkeyup='money()'>{$row['htze']}</textarea></td>
									</tr>
									<tr>
										<td class='datab-1 tdtitle'>已收款</td>
										<td class='datab-2'><textarea class='txtarea' name='ysk' id='ysk' onclick='add()' onkeyup='money()'>{$row['ysk']}</textarea></td>
										<td class='datab-1 tdtitle'>应收款</td>
										<td class='datab-2'><textarea class='txtarea' name='gsk' id='gsk' >{$row['gsk']}</textarea></td>
										<td class='datab-1 tdtitle'>已开票</td>
										<td class='datab-2'><textarea class='txtarea' id='ykp'name='ykp' onkeyup='isdjht()'>$ykp</textarea></td>
									</tr>
									<tr >
										<td class='datab-1 tdtitle'>部门</td>
										<td class='datab-2' >
										<div style='padding:5px ;position:relative;width: 100%;height: 100%;' class='col-sm-4'>
																	    <span style='top:5px;overflow:hidden;width:95%;height:32px;'>
																	        <!--这个是个多选框，用onchange事件的时候 ，将这个select的id传进去-->
																	               <select name='trains' οnchange='qlcTrainS('qlc_zdz1')' class='form-control' id='qlc_zdz1' style='height:36px;outline:0;'>
																	                   <option>{$row['dept']}</option>
																	                   <option value='档案数据部'>档案数据部</option>
																	                   <option value='地理信息部'>地理信息部</option>
																	                   <option value='智能化部'>智能化部</option>
																	                   <option value='系统集成部'>系统集成部</option>
																	                   <option value='充换电平台部'>充换电平台部</option>
																	                   <option value='云计算与大数据部'>云计算与大数据部</option>
																	                   <option value='研发应用部'>研发应用部</option>
																	               </select>
																	 
																	    </span>
																	    <span style='position:absolute;top:7px;left:6px;width:80%;height:28px;border-radius:5px;'>
																	        <!--这里是input框，定位到select的上面-->
																	              <input type='text' name='dept' id='dept' class='ccdd' placeholder='' value='{$row['dept']}'autocomplete='off'style='width:100%;height:32px;border:0px;border-radius:5px;outline:0;margin-left: 1px;color: black;'>
																	    </span>
																	</div>
										</td>
										<td class='datab-1 tdtitle'>是否单价合同</td>
																	<td class='datab-2'><select name='begin'  onclick='isdj()' id='begin' style='width: 100%;height: 60%;color:black' value='$begin'>
																					  <option value='$begin'>$isdjht</option>
																					  <option value='1'>是</option>
																					  <option value='2'>否</option>
																					 
																					</select></td>
									</tr>
									<tr id ='kpmx'>
										<td class='datab-1 tdtitle'>开票明细</td>
										<td class='datab-2' colspan='5'><textarea class='txtarea' id ='kpmx' name='kpmx' >{$row['kpmx']}</textarea></td>

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
						if($row['kpmx']==''){
						 	echo" <script> document.getElementById('kpmx').style.display='none';</script>";
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
							function isdjht(){
							// var isdjht=$("#begin").find("option:selected").val();
							var isdjht=document.getElementById("begin").value;
							if(isdjht==1){
								document.getElementById("htze").value=document.getElementById("ykp").value;
							}
							}
							function isdj(){
								var isdjht=document.getElementById("begin").value;
								if(isdjht==1){
								document.getElementById("htze").value=document.getElementById("ykp").value;
								}
								
							}
						    <!--将select的值赋给input框-->
						   $('#qlc_zdz1').on('change', function(){
						   	// alert(this.value); //or alert($(this).val());
						   	document.getElementById("dept").value =this.value;
						   });
						 
						</script>
						<script>
							
							 $("ysk").blur(function() {
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
								url:"income_changephp.php",
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
							   // window.location.reload();//刷新父页面
							   // layer.closeAll(); //关闭所有layer
							   })
						</script>
						<!-- <script>						
							var htze = document.getElementById("htze").value;
							var ysk = document.getElementById("ysk").value;
							var gsk = document.getElementById('gsk');   //获取元素div
							gsk.onclick = function(){   //给元素增加点击事件
								gsk.value=htze-ysk;
							};
							gsk.click(); 
							
							function money(){
							var htze = document.getElementById("htze").value;
							var ysk = document.getElementById("ysk").value;
							document.getElementById("gsk").value=htze-ysk;
									}
						</script> -->
						<script>
							/**
							 ** 减法函数，用来得到精确的减法结果
							 ** 说明:javascript的减法结果会有误差，在两个浮点数相减的时候会比较明显。这个函数返回较为精确的减法结果。
							 ** 调用:accSub(arg1,arg2)
							 ** 返回值:arg1加上arg2的精确结果
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
							var ysk = document.getElementById("ysk").value;
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
							if(ysk!=""){
							if(!pattern.test(ysk)){
								layer.alert('请输入数字！', {
								icon: 5,
								title: '提示',
								end:function(){
									$('#ysk').focus();
									$('#ysk').val("");
								}
								});
								return false;
							}
							}
							document.getElementById("gsk").value=accSub(htze,ysk);
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
								 content: 'bill_income.php?htbh='+htbh+'&xmbh='+xmbh+'&xmmc='+xmmc+'&dwmc='+dwmc+'&htmc='+htmc,
								// end:function(){
								// 	window.location.href="income_change.php?id=<?php echo $id; ?>"
								// }
								});
							}
						</script>
						<style>
						 @import url("Content/bootstrap/css/bootstrap.min.css");
						 @import url("Content/font-awesome/css/font-awesome.min.css");
						 @import url("Content/font-awesome-4.7.0/css/font-awesome.min.css");
						 @import url("Content/sidebar-menu/sidebar-menu.css");
						 @import url("Content/ace/css/ace-rtl.min.css");
						 @import url("Content/ace/css/ace-skins.min.css");
						 </style>
						<!-- 	<link href="Content/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
							<link href="Content/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
							<link href="Content/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
							<link href="Content/sidebar-menu/sidebar-menu.css" rel="stylesheet"/>
							<link href="Content/ace/css/ace-rtl.min.css" rel="stylesheet"/>
							<link href="Content/ace/css/ace-skins.min.css" rel="stylesheet"/>	 -->
						<div class="image-table" style="margin:2px;padding:2px;border:1px solid #95B8E7">
							<div class="image-table-title">
								<span>开票信息</span>
							</div>
							<?php 
							$sql = "select * from invoice where htbh='$htbh' order by id";//查询语句	
							$rows = mysql_num_rows(mysql_query("$sql"));
							$result=mysql_query($sql,$link);
							if (!mysql_num_rows($result)){
							echo "<center style='color:red;'>无发票信息存在!</center>";
							return false;					
							}
							// $row = mysql_fetch_assoc($result);		
							echo "<center ><span style='font-size: 16px;'> 该合同共{$rows}次开票记录</span><span>(点击查看详情)<span></center>";
							$i=0;
							echo"
							<div class='sidebar' id='sidebar' style='width:100%;postion:'>
								<ul class='nav nav-list' id='menu'>
							";
							while($row = mysql_fetch_assoc($result) ){
							$i++;
							if($row['lb']==''){
							 	echo" <script> document.getElementById('{$i}_1').style.display='none';</script>";
							 }
							echo"
								
								  <li id='submenutab_1'>
									<a href='javascript:;' class='dropdown-toggle'>
									  <i class='icon-paste'style='float:left'>
									  </i>
									  <span class='menu-text' style='line-height:34px;padding-left:0px;font-size:15px'>第{$i}次开票记录</span><span class='menu-text' style='line-height:34px;padding-left:0px;font-size:'>（价税：{$row['jshj']} )</span>
									  <b class='arrow icon-angle-down'>
									  </b>
									</a>
								   <ul class='submenu' style='display: none;'>  
									  <li id='{$i}_1'>														       
										  <textarea style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly>类别:{$row['lb']}</textarea>
									  </li>
									  <li id='{$i}_2'>
										 <textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >凭证号:{$row['pzh']}</textarea>
									  </li>
									  <li id='{$i}_3'>
										<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >开票日期:{$row['kprq']}</textarea>						
									  </li>	 
									  <li id='{$i}_4'>
										<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >分管领导:{$row['fgld']}</textarea>									
									  </li> 
									  <li id='{$i}_5'>
										<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >申请人:{$row['sqr']}</textarea>										
									  </li> 
									  <li id='{$i}_6'>
										<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >发票种类:{$row['fpzl']}</textarea>										
									  </li> 
									  <li id='{$i}_7'>
										<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >税率:{$row['sl']}</textarea>										
									  </li> 
									  <li id='{$i}_8'>
										<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >发票号码:{$row['fphm']}</textarea>										
									  </li> 
									  <li id='{$i}_9'>
										<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >开票单位:{$row['kpdw']}</textarea>										
									  </li>
									  <li id='{$i}_10'>
										<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >开票内容:{$row['kpnr']}</textarea>										
									  </li>	 
									  <li id='{$i}_11'>
										<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >发票内容:{$row['fpnr']}</textarea>										
									  </li>	
									  <li id='{$i}_12'>
										<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >金额:{$row['je']}</textarea>										
									  </li> 
									  <li id='{$i}_13'>
										<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >税额:{$row['se']}</textarea>										
									  </li> 
									  <li id='{$i}_14'>
										<textarea  style='height:36px;width: 332px;' class='menu-text' name='xmbh' readonly >价税合计:{$row['jshj']}</textarea>										
									  </li>			
									</ul>
								  </li>
							
									  ";
							}
							// if($row['lb']==''){
							//  	echo" <script> document.getElementById('1_1').style.display='none';</script>";
							//  }
							$sql = "select count(*) as number,sum(je) as je,sum(se) as se,sum(jshj) as jshj,max(kprq) as kprq,max(pzh) as pzh from invoice where htbh='$htbh' ";//查询语句
							$result=mysql_query($sql,$link);
							$ro = mysql_fetch_assoc($result);
							echo"
							<table>
							<tr>
							<td><input  style='height:30px;color:black' class='txtarea' name='xmbh' readonly value='所有发票价税总合计：{$ro['jshj']}'></td>
							</tr>
							</table>";
									?>
									</ul>
									</div>
								</div>
								</div>
				
	</body>
<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/sidebar-menu.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script> 
	<script src="Content/bootstrap/js/bootstrap-tab.js"></script>
	<script src="js/ace.min.js"></script>
	<script src="js/ace-elements.min.js"></script>
	<script src="js/ace-extra.min.js"></script>
</html>
