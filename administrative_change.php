<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>行政合同录修改</title>
		<link href="css/common.css" rel="stylesheet"/>
		<link href="css/easyui.css" rel="stylesheet"/>
		<link href="css/icon.css" rel="stylesheet"/>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/layer/layer.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/bootstrap-datepicker.zh-CN.js"></script>
		<script src="js/date.js" type="text/javascript"></script>
		<link href="css/datepicker3.css" rel="stylesheet"/>
			<script src="js/layer/layer.js"></script>
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
		<?php $user = $_GET['user']; ?>
		<!-- Main content -->
		<form method="post" action="administrative_changephp.php" id="Form">
			<?php
				//声明变量并接受form表单发送过来的数据
					$user= $_GET['user']; 
					$id = $_GET['id']; 
				echo"<input name='id' value='$id' id='_easyui_textbox_input9' type='text' style='display:none'>";
				//连接数据库
					require("dbconfig.php");//导入配置文件
					$link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
					mysql_select_db(DBNAME,$link);//选择数据库
					mysql_query("set names 'utf8'");//选择字符集
					$sql = "select * from administrative where id=$id";//查询语句	
					$result=mysql_query($sql,$link);
					$row = mysql_fetch_assoc($result);
					echo "					
		<section class='content'>
				    <div class='row'>
				        <!-- left column -->
				        <div class='col-md-12'>
				            <!-- general form elements -->
				            <div class='box box-primary'>
				                <!-- /.box-header -->
				                <h3><span>行政合同修改表</span></h3>
				                <table>
											<tr>
											    <td class='datab-1 tdtitle'>合同编号</td>
											    <td class='datab-2'><textarea class='txtarea' autocomplete='true' id='htbh'name='htbh'>{$row['htbh']}</textarea></td>
												<td class='datab-1 tdtitle'>合同名称</td>
												<td class='datab-2'><textarea class='txtarea' id='htmc'name='htmc'>{$row['htmc']}</textarea></td>
												<td class='datab-1 tdtitle'>对方单位</td>
												<td class='datab-2'><textarea class='txtarea' id='dwmc'name='dwmc'>{$row['dwmc']}</textarea></td>
											</tr>
												<tr>
													<td class='datab-1 tdtitle'>签订时间</td>
													<td class='datab-2'><span class='ace-calendar-picker' style='width:100%;'>
																	<div>
																	<input value='{$row['qdsj']}' name='qdsj' id='qdsj'type='text'style='width: 92%;height: 60%;color:black;'><input  id='dpStart' placeholder=''  autocomplete='off' type='text' class='ace-calendar-picker-input ace-input'style='width: 8%;height: 60%;background-color:white;color:rgba(0,0,0,0);background:url(css/images/date.png)no-repeat #f8f8f8;background-size: 24px 32px; '>
																	<span class='ace-calendar-picker-icon'>							
																	</span>
																	</div>
																		</span></td>
													<td class='datab-1 tdtitle'>联系人</td>
													<td class='datab-2'><textarea class='txtarea' name='lxr'>{$row['lxr']}</textarea></td>										
												<td class='datab-1 tdtitle'>合同金额</td>
													<td class='datab-2'><textarea class='txtarea' name='htze' id='htze' onkeyup='money()' >{$row['htze']}</textarea></td>
												</tr>
												<tr>
													<td class='datab-1 tdtitle'>已付款</td>
													<td class='datab-2'><textarea class='txtarea' name='yfk' id='yfk' onclick='add()'onkeyup='money()'>{$row['yfk']}</textarea></td>
													<td class='datab-1 tdtitle'>未付款</td>
													<td class='datab-2'><textarea class='txtarea' name='wfk' id='wfk' >{$row['wfk']}</textarea></td>
													<td class='datab-1 tdtitle'>付款凭证</td>
													<td class='datab-2'><textarea class='txtarea' name='fkpz'>{$row['fkpz']}</textarea></td>
												</tr>										
												<tr>
													<td class='datab-1 tdtitle'>备注</td>
													<td class='datab-2' colspan='5'><textarea class='txtarea' name='bz'>{$row['bz']}</textarea></td>
												</tr>  
												<tr>
													<td  colspan='7' style='text-align: center;'>
														<center>
													<a href='javascript:;' id='ok' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' onclick='subForm();' ><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>修改</span><span class='l-btn-icon icon-ok'>&nbsp;</span></span></a>
														<a href='javascript:;' id='exit' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' ><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>退出</span><span class='l-btn-icon icon-exit'>&nbsp;</span></span></a>
														</center>
												</tr>
															
													</table>
												</form>				
											                </div>
											                <!-- /.box -->
											            </div>
											            <!--/.col (left) -->
											
											        </div>
											        <!-- /.row -->
											    </section> ";
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
														url:"administrative_changephp.php",
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
													// var xmbh = document.getElementById("xmbh").value;
													// var xmmc = document.getElementById("xmmc").value;
													var dwmc = document.getElementById("dwmc").value;
													var htmc = document.getElementById("htmc").value;	
													layer.open({
													 type: 2,
													 area: ['1000px', '600px'],
													 skin: 'layui-layer-demo',
													 closeBtn: 1,
													 anim: 2,
													 shadeClose: true,
													 content: 'bill_administrative.php?htbh='+htbh+'&dwmc='+dwmc+'&htmc='+htmc,
														 // end:function(){
														 // 	location.reload();
														 // }
														});
													}
													
												</script>
								
				
	</body>
	
	
</html>
