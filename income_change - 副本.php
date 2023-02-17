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
					<form method='post' action='' id='Form'>
		<?php
			//声明变量并接受form表单发送过来的数据
				$user= $_GET['user']; 
				$id = $_GET['id']; 
				$htbh = $_GET['htbh']; 
			echo"<input name='id' value='$id' id='_easyui_textbox_input9' type='text' style='display:none'>";
			//连接数据库
				require("dbconfig.php");//导入配置文件
				$link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
				mysql_select_db(DBNAME,$link);//选择数据库
				mysql_query("set names 'utf8'");//选择字符集							
				$sql = "select * from income where id='$id'";//查询语句	
				$result=mysql_query($sql,$link);
				$row = mysql_fetch_assoc($result);
				$htbh = $row['htbh'];
				$ysk=$_GET['ysk'];				
				$ykp=$_GET['ykp'];	
				$ysk=substr($ysk,0,strlen($ysk)-6);
				// $sql2="select sum(je) as ysk from invoice where htbh='$htbh' ";
				// $result2=mysql_query($sql2,$link);
				// $row2= mysql_fetch_assoc($result2);
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
															<input  id='dpStart' placeholder='' autocomplete='off' name='qdsj' value='{$row['qdsj']}' type='text' class='ace-calendar-picker-input ace-input' style='width: 100%;height: 60%;color:black;'>
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
										<td class='datab-2'><textarea class='txtarea' name='ysk' id='ysk' onclick='add()' onkeyup='money()'>$ysk</textarea></td>
										<td class='datab-1 tdtitle'>应收款</td>
										<td class='datab-2'><textarea class='txtarea' name='gsk' id='gsk' >{$row['gsk']}</textarea></td>
										<td class='datab-1 tdtitle'>已开票</td>
										<td class='datab-2'><textarea class='txtarea' name='ykp' >$ykp</textarea></td>
									</tr>
									<tr style='display:none;'>
										<td class='datab-1 tdtitle'>合同主要内容</td>
										<td class='datab-2' colspan='5'><textarea class='txtarea' name='htnr' >{$row['htnr']}</textarea></td>

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
									<a href='javascript:;' id='ok' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' onclick='subForm();' ><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>保存</span><span class='l-btn-icon icon-ok'>&nbsp;</span></span></a>
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
								</section>"
						
					
						?>
							</form>
						</div>
						</div>
						<script>
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
									 title: '提示'
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
							var ysk = document.getElementById("ysk").value;
							var pattern = /\d/;
							if(!pattern.test(htze)){
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
								 area: ['750px', '549px'],
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
								
						<div class="image-table" style="margin:2px;padding:2px;border:1px solid #95B8E7">
							<div class="image-table-title">
								<span>发票信息</span>
							</div>
							<?php 
							$sql = "select * from invoice where htbh='$htbh' order by time desc limit 1";//查询语句	
							$result=mysql_query($sql,$link);
							if (!mysql_num_rows($result)){
							echo "<center style='color:red;'>无发票信息存在!</center>";
							return false;					
							}
							$row = mysql_fetch_assoc($result);
							$sql = "select count(*) as number,sum(je) as je,sum(se) as se,sum(jshj) as jshj,max(kprq) as kprq,max(pzh) as pzh from invoice where htbh='$htbh' ";//查询语句
							$result=mysql_query($sql,$link);
							$ro = mysql_fetch_assoc($result);
							echo"
							<table>
							<tr>
								<td colspan='2' style='text-align:center;'>共{$ro['number']}次收入记录，以下为最新收入发票</td>
							</tr>
							<tr>
								<td style='height:30px;width:65px;text-align:left'>类别:</td>
								<td ><textarea style='height:30px;' class='txtarea' name='xmbh' readonly>{$row['lb']}</textarea></td>
							</tr>
							<tr>
								<td style='height:30px;width:65px;text-align:left'>凭证号：</td>
								<td><textarea  style='height:30px;' class='txtarea' name='xmbh' readonly >{$row['pzh']}</textarea></td>
							</tr>
							<tr>
								<td style='height:30px;width:65px;text-align:left'>开票日期：</td>
								<td><textarea  style='height:30px;' class='txtarea' name='xmbh' readonly >{$row['kprq']}</textarea></td>
							</tr>
							<tr>
								<td style='height:30px;width:65px;text-align:left'>分管领导：</td>
								<td><textarea  style='height:30px;' class='txtarea' name='xmbh' readonly >{$row['fgld']}</textarea></td>
							</tr>
							<tr>
								<td style='height:30px;width:65px;text-align:left'>申请人：</td>
								<td><textarea  style='height:30px;' class='txtarea' name='xmbh' readonly >{$row['sqr']}</textarea></td>
							</tr>
							<tr>
								<td style='height:30px;width:65px;text-align:left'>发票种类：</td>
								<td><textarea  style='height:30px;' class='txtarea' name='xmbh' readonly >{$row['fpzl']}</textarea></td>
							</tr>
							<tr>
								<td style='height:30px;width:65px;text-align:left'>税率：</td>
								<td><textarea  style='height:30px;' class='txtarea' name='xmbh' readonly >{$row['sl']}</textarea></td>
							</tr>
							<tr>
								<td style='height:30px;width:65px;text-align:left'>发票号码：</td>
								<td><textarea  style='height:30px;' class='txtarea' name='xmbh' readonly >{$row['fphm']}</textarea></td>
							</tr>
							<tr>
								<td style='height:30px;width:65px;text-align:left'>开票单位：</td>
								<td><textarea  style='height:30px;' class='txtarea' name='xmbh' readonly >{$row['kpdw']}</textarea></td>
							</tr>
							<tr>
								<td style='height:30px;width:65px;text-align:left'>开票内容：</td>
								<td><textarea  style='height:30px;' class='txtarea' name='xmbh' readonly >{$row['kpnr']}</textarea></td>
							</tr>
							<tr>
								<td style='height:30px;width:65px;text-align:left'>发票内容：</td>
								<td><textarea  style='height:30px;' class='txtarea' name='xmbh' readonly >{$row['fpnr']}</textarea></td>
							</tr>
							<tr>
								<td style='height:30px;width:65px;text-align:left'>合计金额：</td>
								<td><textarea  style='height:30px;' class='txtarea' name='xmbh' readonly >{$ro['je']}</textarea></td>
							</tr>
							<tr>
								<td style='height:30px;width:65px;text-align:left'>合计税额：</td>
								<td><textarea  style='height:30px;' class='txtarea' name='xmbh' readonly >{$ro['se']}</textarea></td>
							</tr>
							<tr>
							<td style='height:30px;width:65px;text-align:left'>价税合计：</td>
								<td><textarea  style='height:30px;' class='txtarea' name='xmbh' readonly >{$ro['jshj']}</textarea></td>
							</tr>";
									?>
								</div>
								</div>
				
	</body>
	
	
</html>
