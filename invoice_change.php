<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>发票信息更改</title>
		<link href='css/common.css' rel='stylesheet'/>
		<link href='css/easyui.css' rel='stylesheet'/>
		<link href='css/icon.css' rel='stylesheet'/>
		<script src='js/jquery-1.9.1.js'></script>
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
				.ht{
					height:30px;
					text-align:left;
				}
		    </style>
			
	</head>
	<body>
		<div class="alldiv" style="height:700px;">
		<div class="imageShow" style="width: 75%;border:1px solid #95B8E7">
		<div id='divinput' class='cyinputdiv' style='height:460px;'>
					<form   method='get' action='invoice_changephp.php'id='Form'>
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
				$sql = "select * from invoice where id=$id";//查询语句	
				$result=mysql_query($sql,$link);
				$row = mysql_fetch_assoc($result);
				$htbh = $row['htbh'];
			
									echo"  <section class='content'>
				  <div class='row'>
					  <!-- left column -->
					  <div class='col-md-12'>
						  <!-- general form elements -->
						  <div class='box box-primary'>
							  <!-- /.box-header -->
							  <h3><span>发票修改表</span></h3>
							 <table>
							   <tr>
							 	  <td class='datab-1 tdtitle'>类别</td>
							 	 <td class='datab-2'><select name='lb' style='width: 100%;height: 60%; color:black' value='{$row['lb']}'>
							 	 				  <option>{$row['lb']}</option>
							 	 				  <option value='软件'>软件</option>
							 	 				  <option value='数据'>数据</option>
							 	 				  <option value='运营'>运营</option>
							 	 				  <option value='集成'>集成</option>
							 	 				  <option value='其他'>其他</option>
							 	 				</select></td>
							 	  <td class='datab-1 tdtitle'>凭证号</td>
							 	  <td class='datab-2'><textarea class='txtarea' name='pzh'>{$row['pzh']}</textarea></td>
							 						
							 	  <td class='datab-1 tdtitle'>开票日期</td>
							 	  <td class='datab-2'><span class='ace-calendar-picker' style='width:100%;'>
							 					<div>
							 						<input  id='dpStart' placeholder='' autocomplete='off' name='kprq'  type='text' value='{$row['kprq']}' class='ace-calendar-picker-input ace-input'style='width: 100%;height: 60%;color:black'>
							 						<span class='ace-calendar-picker-icon'>							
							 						</span>
							 						</div>
							 						</span></td>
													</tr>
													<tr>	
							 	  <td class='datab-1 tdtitle'>分管领导</td>
							 	  <td class='datab-2'><textarea class='txtarea' name='fgld'>{$row['fgld']}</textarea></td>
							 	  <td class='datab-1 tdtitle'>开票申请人</td>
							 	  <td class='datab-2'><textarea class='txtarea' name='sqr'>{$row['sqr']}</textarea></td>
							   
							 	  <td class='datab-1 tdtitle'>发票种类</td>
							 	  <td class='datab-2'><select name='fpzl' style='width: 100%;height: 60%; color:black' value='{$row['fpzl']}'>
							 	 				  <option>{$row['fpzl']}</option>
							 	 				  <option value='普票'>普票</option>
							 	 				  <option value='专票'>专票</option>					 	 				 
							 	 				</select></td>
								  </tr>
								  <tr>
							 	  <td class='datab-1 tdtitle'>税率</td>
							 	  <td class='datab-2'><textarea class='txtarea' id='sl' onkeyup='slc()' name='sl'>{$row['sl']}</textarea></td>
							 	  <td class='datab-1 tdtitle'>发票号码</td>
							 	  <td class='datab-2'><textarea class='txtarea' name='fphm'>{$row['fphm']}</textarea></td>
							   
							 	  <td class='datab-1 tdtitle'>开票单位</td>
							 	  <td class='datab-2'><textarea class='txtarea' name='kpdw'>{$row['kpdw']}</textarea></td>
								  </tr>
								  <tr>
							 	  <td class='datab-1 tdtitle'>开票内容</td>
							 	  <td class='datab-2'><textarea class='txtarea' name='kpnr'>{$row['kpnr']}</textarea></td>
							 	  <td class='datab-1 tdtitle'>发票内容</td>
							 	  <td class='datab-2'><textarea class='txtarea' name='fpnr'>{$row['fpnr']}</textarea></td>
							   
							 	  <td class='datab-1 tdtitle'>金额</td>
							 	  <td class='datab-2'><textarea class='txtarea' id='je' name='je' onkeyup='money()'>{$row['je']}</textarea></td>
								  </tr>
								  <tr style='display:none'>
								  <td class='datab-1 tdtitle'>原价税</td>
								  <td class='datab-2'><textarea class='txtarea' name='yjshj'>{$row['jshj']}</textarea></td>
								  </tr>
								  <tr>
							 		<td class='datab-1 tdtitle'>税额</td>
							 		<td class='datab-2'><textarea class='txtarea' id='se' name='se'onkeyup='money()'>{$row['se']}</textarea></td>
									<td style='display:none' class='datab-1 tdtitle'>原税额</td>
									<td style='display:none' class='datab-2'><textarea class='txtarea' id='yse' name='yse'>{$row['se']}</textarea></td>
							 		<td class='datab-1 tdtitle'>价税合计</td>
							 		<td class='datab-2'><textarea class='txtarea' id='jshj' name='jshj'>{$row['jshj']}</textarea></td>
							 			<td class='datab-1 tdtitle'>合同编号</td>
							 			<td class='datab-2'><textarea class='txtarea' id='htbh' name='htbh'>{$row['htbh']}</textarea></td>	  	  
							   
							
							  </tr>
							  <tr>
							 	 
							 	  <td class='datab-1 tdtitle'>项目编号</td>
							 	  <td class='datab-2'><textarea class='txtarea' id='xmbh'name='xmbh'>{$row['xmbh']}</textarea></td>
							
							 	
							
							 	  <td class='datab-1 tdtitle'>备注</td>
							 	  <td class='datab-2' ><textarea class='txtarea' name='bz'>{$row['bz']}</textarea></td>
							   </tr>  
								<tr style='display:none;'>
									<td>user</td>
									<td colspan='5'><span class='textbox' style='width: 100%;'><input name='user' value='<?php echo $user;?>' id='_easyui_textbox_input9' type='text' class='textbox-text validatebox-text' autocomplete='off' tabindex='' placeholder='' style='margin: 0px; padding-top: 0px; padding-bottom: 0px; height: 24px; line-height: 24px; width: 100%;'></span></td>
								</tr>
									<tr>
										<td colspan='7'>
										<center>
										<a href='javascript:;' id='ok' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' onclick='subForm();' ><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>修改</span><span class='l-btn-icon icon-ok'>&nbsp;</span></span></a>

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
							  // function slc(){
							  	
							  // var sl = document.getElementById("sl").value;
							  // // alert("nihao");
							  // 	document.getElementById("sl").value=sl+"%";
							  // }
						</script>
						<script>
							function money(){	
								/**
								 ** 加法函数，用来得到精确的加法结果
								 ** 说明：javascript的加法结果会有误差，在两个浮点数相加的时候会比较明显。这个函数返回较为精确的加法结果。
								 ** 调用：accAdd(arg1,arg2)
								 ** 返回值：arg1加上arg2的精确结果
								 **/
								function accAdd (arg1, arg2) {
								  var r1, r2, m, c;
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
								  c = Math.abs(r1 - r2);
								  m = Math.pow(10, Math.max(r1, r2));
								  if (c > 0) {
								    var cm = Math.pow(10, c);
								    if (r1 > r2) {
								      arg1 = Number(arg1.toString().replace('.', ''));
								      arg2 = Number(arg2.toString().replace('.', '')) * cm;
								    } else {
								      arg1 = Number(arg1.toString().replace('.', '')) * cm;
								      arg2 = Number(arg2.toString().replace('.', ''));
								    }
								  } else {
								    arg1 = Number(arg1.toString().replace('.', ''));
								    arg2 = Number(arg2.toString().replace('.', ''));
								  }
								  return (arg1 + arg2) / m;
								}
								
								// 给Number类型增加一个add方法，调用起来更加方便。
								Number.prototype.add = function (arg) {
								  return accAdd(arg, this);
								};
							var je = document.getElementById("je").value;
							var se = document.getElementById("se").value;
										var pattern = /\d/;
										if(!pattern.test(je)&& je!=""){
											layer.alert('请输入数字！', {
											icon: 5,
											title: '提示',
											end:function(){					
												$('#je').focus();
												$('#je').val("");
												
											}
											});
											return false
										}
										if(se!=""){
										if(!pattern.test(se)){
											layer.alert('请输入数字！', {
											icon: 5,
											title: '提示',
											end:function(){
												$('#se').focus();
												$('#se').val("");
											}
											});
											return false;
										}
										}
						
							document.getElementById("jshj").value=accAdd(je,se);
									}
						</script>
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
								url:"invoice_changephp.php",
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
						<div class="image-table" style="margin:2px;padding:2px;border:1px solid #95B8E7">
							<div class="image-table-title">
								<span>合同信息</span>
							</div>
							<?php 
							$sql = "select * from income where htbh='$htbh' ";//查询语句	
							$sql2="select * from spend where htbh='$htbh' ";
							$result=mysql_query($sql,$link);
							$result2=mysql_query($sql2,$link);
							if (!mysql_num_rows($result) && !mysql_num_rows($result2)){
							echo "<center >无合同信息存在!</center>";
							return false;
							}
							if(mysql_num_rows($result)){
							$row = mysql_fetch_assoc($result);
							echo"
<table>
								<tr>
									<td class='ht'>合同编号</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='htbh'  readonly>{$row['htbh']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>项目编号</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='xmbh'  readonly>{$row['xmbh']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>项目名称</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='xmmc' value='' id='xmmc' readonly>{$row['xmmc']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>甲方单位</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='dwmc' id='dwmc' readonly>{$row['dwmc']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>合同名称</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='htmc' id='htmc' readonly>{$row['htmc']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>合同类型</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='htlx' id='htmc' readonly>{$row['htlx']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>联系人</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='lxr' readonly >{$row['lxr']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>签订时间</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='qdsj' id='qdsj' readonly>{$row['qdsj']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>合同工期</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='htgq'  readonly>{$row['htgq']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>付款方式</td>
									<td ><textarea class='txtarea'style='height:30px;text-align:left' name='fkfs'  readonly>{$row['fkfs']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>结算方式</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='jsfs'  readonly>{$row['jsfs']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>合同总额</td>
									<td ><textarea class='txtarea'style='height:30px;text-align:left' name='htze'  readonly>{$row['htze']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>已收款</td>
									<td ><textarea class='txtarea'style='height:30px;text-align:left' name='ysk'  readonly>{$row['ysk']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>应收款</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='gsk'  readonly>{$row['gsk']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>已开票</td>
									<td ><textarea class='txtarea'style='height:30px;text-align:left' name='ykp'  readonly>{$row['ykp']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>合同主要内容</td>
									<td  colspan='5'><textarea class='txtarea' style='height:30px;text-align:left'name='htnr'  readonly>{$row['htnr']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>备注</td>
									<td  colspan='5'><textarea class='txtarea' style='height:30px;text-align:left'name='bz'  readonly>{$row['bz']}</textarea></td>
								</tr>  
								</table>";}
							if(mysql_num_rows($result2)){
							$row = mysql_fetch_assoc($result2);
							echo"
							<table>
								<tr>
									<td class='ht'>合同编号</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left' name='htbh'  readonly>{$row['htbh']}</textarea></td>
								</tr>
								<tr>
									<td class='ht'>项目编号</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='xmbh'  readonly>{$row['xmbh']}</textarea></td>
								</tr>
									<td class='ht'>项目名称</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='xmmc' value='' id='xmmc' readonly>{$row['xmmc']}</textarea></td>
								</tr>
								<tr>
									<td class='ht'>乙方单位</td>
									<td ><textarea class='txtarea'style='height:30px;text-align:left' name='dwmc' id='dwmc' readonly>{$row['dwmc']}</textarea></td>
								</tr>
								<tr>
									<td class='ht'>合同名称</td>
									<td ><textarea class='txtarea'style='height:30px;text-align:left' name='htmc' id='htmc' readonly>{$row['htmc']}</textarea></td>
									</tr>
									<tr>	
									<td class='ht'>合同类型</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='htmc' id='htlx' readonly>{$row['htlx']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>联系人</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='lxr'  readonly>{$row['lxr']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>签订时间</td>
									<td ><textarea class='txtarea' style='height:30px;text-align:left'name='qdsj' id='htmc' readonly>{$row['qdsj']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>合同工期</td>
									<td ><textarea class='txtarea'style='height:30px;text-align:left' name='htgq'  readonly>{$row['htgq']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>付款方式</td>
									<td ><textarea class='txtarea'style='height:30px;text-align:left' name='fkfs'  readonly>{$row['fkfs']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>结算方式</td>
									<td ><textarea class='txtarea'style='height:30px;text-align:left' name='jsfs'  readonly>{$row['jsfs']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>合同总额</td>
									<td ><textarea class='txtarea'style='height:30px;text-align:left' name='htze'  readonly>{$row['htze']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>已付款</td>
									<td ><textarea class='txtarea'style='height:30px;text-align:left' name='yfk'  readonly>{$row['yfk']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>未付款</td>
									<td ><textarea class='txtarea'style='height:30px;text-align:left' name='wfk'  readonly>{$row['wfk']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>已开票</td>
									<td ><textarea class='txtarea'style='height:30px;text-align:left' name='ykp'  readonly>{$row['ykp']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>合同主要内容</td>
									<td  colspan='5'><textarea class='txtarea' style='height:30px;text-align:left'name='htnr'  readonly>{$row['htnr']}</textarea></td>
									</tr>
									<tr>
									<td class='ht'>备注</td>
									<td  colspan='5'><textarea class='txtarea' style='height:30px;text-align:left'name='bz'  readonly>{$row['bz']}</textarea></td>
								</table>
							";
							}
							?>
						</div>
						</div>
						
				
	</body>
	
</html>
