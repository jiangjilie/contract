<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>零星采购更改</title>
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
					<form method='get' action='purchase_changephp.php' id='Form'>
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
				$sql = "select * from purchase where id=$id";//查询语句	
				$result=mysql_query($sql,$link);
				$row = mysql_fetch_assoc($result);
				$xmbh = $row['xmbh'];
				
			
				echo"<section class='content'>
        <div class='row'>
            <!-- left column -->
            <div class='col-md-12'>
                <!-- general form elements -->
                <div class='box box-primary'>
                    <!-- /.box-header -->
                    <h3><span>零星采购修改表</span></h3>
                    <table>
                        <tr>
							<td class='datab-1 tdtitle'>项目编号</td>
							<td class='datab-2'><textarea class='txtarea' id='xmbh'name='xmbh'>{$row['xmbh']}</textarea></td>
                            <td class='datab-1 tdtitle'>项目名称</td>
                            <td class='datab-2'><textarea class='txtarea' id='xmmc'name='xmmc'>{$row['xmmc']}</textarea></td>
							<td class='datab-1 tdtitle'>收款人</td>
							<td class='datab-2'><textarea class='txtarea' id='dwmc'name='dwmc'>{$row['dwmc']}</textarea></td>
                        </tr>
                        <tr>
                            
                           
							<td class='datab-1 tdtitle'>付款金额</td>
							<td class='datab-2'><textarea class='txtarea' name='fkje'>{$row['fkje']}</textarea></td>
							<td class='datab-1 tdtitle'>付款时间</td>
							<td class='datab-2'><span class='ace-calendar-picker' style='width:100%;'>
											<div>
											<input value='{$row['fksj']}' name='fksj' id='qdsj'type='text'style='width: 92%;height: 60%;color:black;'><input  id='dpStart' placeholder=''  autocomplete='off' type='text' class='ace-calendar-picker-input ace-input'style='width: 8%;height: 60%;background-color:white;color:rgba(0,0,0,0);background:url(css/images/date.png)no-repeat #f8f8f8;background-size: 24px 32px; '>
											<span class='ace-calendar-picker-icon'>							
											</span>
											</div>
												</span></td>
							<td class='datab-1 tdtitle'>凭证号</td>
							<td class='datab-2'><textarea class='txtarea' name='pzh'>{$row['pzh']}</textarea></td>
							<td style='display:none' class='datab-1 tdtitle' >原凭证号</td>
							<td style='display:none' class='datab-2'><textarea class='txtarea' name='ypzh'>{$row['pzh']}</textarea></td>
                        </tr>
                        <tr>                   
                           
							<td class='datab-1 tdtitle'>税额</td>
							<td class='datab-2'><textarea class='txtarea' name='se'>{$row['se']}</textarea></td>
							<td style='display:none'class='datab-1 tdtitle'>原税额</td>
							<td style='display:none'class='datab-2'><textarea class='txtarea' id='yse' name='yse'  >{$row['se']}</textarea></td>
						</tr>
						<tr>
						    <td class='datab-1 tdtitle'>摘要</td>
						    <td class='datab-2' colspan='5'><textarea class='txtarea' name='zy'>{$row['zy']}</textarea></td>
						</tr> 
                        <tr>
                            <td class='datab-1 tdtitle'>备注</td>
                            <td class='datab-2' colspan='5'><textarea class='txtarea' name='bz'>{$row['bz']}</textarea></td>
                        </tr> 
						 <tr style='display:none;'>
						 	<td>合同名称</td>
						 	<td colspan='1'><span class='textbox' style='width: 100%;'><input name='chtmc' value='{$row['htmc']}' id='_easyui_textbox_input9' type='text' class='textbox-text validatebox-text' autocomplete='off' tabindex='' placeholder='' style='margin: 0px; padding-top: 0px; padding-bottom: 0px; height: 24px; line-height: 24px; width: 100%;'></span></td>
						 	<td>单位名称</td>
						 	<td colspan='1'><span class='textbox' style='width: 100%;'><input name='cdwmc' value='{$row['dwmc']}' id='_easyui_textbox_input9' type='text' class='textbox-text validatebox-text' autocomplete='off' tabindex='' placeholder='' style='margin: 0px; padding-top: 0px; padding-bottom: 0px; height: 24px; line-height: 24px; width: 100%;'></span></td>
						 	<td>项目名称</td>
						 	<td colspan='1'><span class='textbox' style='width: 100%;'><input name='cxmmc' value='{$row['xmmc']}' id='_easyui_textbox_input9' type='text' class='textbox-text validatebox-text' autocomplete='off' tabindex='' placeholder='' style='margin: 0px; padding-top: 0px; padding-bottom: 0px; height: 24px; line-height: 24px; width: 100%;'></span></td>
						 <td>项目编号</td>
						 <td colspan='1'><span class='textbox' style='width: 100%;'><input name='cxmbh' value='{$row['xmbh']}' id='_easyui_textbox_input9' type='text' class='textbox-text validatebox-text' autocomplete='off' tabindex='' placeholder='' style='margin: 0px; padding-top: 0px; padding-bottom: 0px; height: 24px; line-height: 24px; width: 100%;'></span></td>
						 						 
						 </tr>
						<tr>
							<td  colspan='7' style='text-align: center;'>
								<center>
							<a href='javascript:;' id='ok' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' onclick='subForm();' ><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>保存</span><span class='l-btn-icon icon-ok'>&nbsp;</span></span></a>
							<a href='purchase.php?user=<?php echo $user;?>' id='exit' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' ><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>返回</span><span class='l-btn-icon icon-exit'>&nbsp;</span></span></a>
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
							      <!--将select的值赋给input框-->
							     $('#dpStart').on('change', function(){
							     	// alert(this.value); //or alert($(this).val());
							     	document.getElementById("qdsj").value =this.value;
							     });
							   
							  </script>
						<script>
						function subForm(){
							var xmbh = document.getElementById('xmbh').value;
									if(xmbh==''){
									layer.alert('合同编号不能为空！', {
									icon: 5,
									title: '提示',
									end:function(){
										$('#xmbh').focus();
										// return false;
									}
									});
									}
												
							if(xmbh !='')
								$.ajax({					
								type:"post",			
								url:"purchase_changephp.php",
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

						
						 
						  
						</body>
						</html>
						