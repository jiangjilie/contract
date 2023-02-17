<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>收入合同</title>
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
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/bootstrap-datepicker.zh-CN.js"></script>
		<script src="js/date.js" type="text/javascript"></script>
		<link href="css/datepicker3.css" rel="stylesheet"/>
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
		<body marginwidth="0" marginheight="0">
			<form method='get' action='bill_changephp_spend_invoice.php' id='Form'>
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
					
					$sql = "select * from bill where id=$id";//查询语句	
				$result=mysql_query($sql,$link);
				$row = mysql_fetch_assoc($result);
				$htbh= $row['htbh'];
				echo"<section class='content'>
					<div class='row'>
						<!-- left column -->
						<div class='col-md-12'>
							<!-- general form elements -->
							<div class='box box-primary'>
								<!-- /.box-header -->
								<h3><span>收票情况修改表</span></h3>
								<table>
									<tr>
										<td class='datab-1 tdtitle'>收票金额</td>
										<td class='datab-2'><textarea class='txtarea' name='yfk' >{$row['yfk']}</textarea></td>
								<td class='datab-1 tdtitle'>税额</td>
								<td class='datab-2'><textarea class='txtarea' name='ysk' >{$row['ysk']}</textarea></td>
								</tr>
								<tr>
									<td class='datab-1 tdtitle'>凭证号</td>
									<td class='datab-2'><textarea class='txtarea' id='pzh' name='pzh' >{$row['pzh']}</textarea></td>
									<td class='datab-1 tdtitle'>发票时间</td>
									<td class='datab-2'><span class='ace-calendar-picker' style='width:100%;'>
													<div>
														<input  id='dpStart' placeholder='' autocomplete='off' name='kprq' value='{$row['kprq']}' type='text' class='ace-calendar-picker-input ace-input' style='width: 100%;height: 60%;color:black;'>
														<span class='ace-calendar-picker-icon'>							
														</span>
														</div>
														</span></td>
								</tr>
								<tr>	
									<td class='datab-1 tdtitle'  >备注</td>
									<td class='datab-2' colspan='5'><textarea class='txtarea' name='bz' id='bz'>{$row['bz']}</textarea></td>
								</tr>
									<tr>
										<td colspan='5'>
										<center>
									<a href='javascript:;' id='ok' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' onclick='subForm();' ><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>修改</span><span class='l-btn-icon icon-ok'>&nbsp;</span></span></a>
										<a href='bill_spend_invoice.php?htbh=$htbh' id='exit' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' ><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>返回</span><span class='l-btn-icon icon-exit'>&nbsp;</span></span></a>
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
				 <script>
				 	function subForm(){
				layer.open({
					       type: 1,
					       area: ['250px', '150px'],
					       skin: 'layui-layer-demo',
					       closeBtn: 1,
					       anim: 2,
					       shadeClose: true,
					       content: '<center><h4 style="padding:5px5px;magin:2px;">是否更改收票情况信息</h4></center>',
					       btn: ["确定", "取消"],
					       yes: function () {
					                          $("#Form").submit();
					                       },
					      });
					   }
				</script>
</html>