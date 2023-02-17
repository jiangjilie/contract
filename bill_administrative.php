<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>行政合同</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
	<!-- 	<link href="css/font-awesome.min.css" rel="stylesheet"/>
		<link href="css/font-awesom.min.css" rel="stylesheet"/> -->
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
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/bootstrap-datepicker.zh-CN.js"></script>
		<script src="js/date.js" type="text/javascript"></script>
		<link href="css/datepicker3.css" rel="stylesheet"/>
		<style>
			.th-tr{
				text-align:center;
				background-color: #438eb9;
			}
		</style>
	</head>
		<body marginwidth="0" marginheight="0">
			<table id="dg" style="word-break:break-all; word-wrap:break-all;" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
				  <tr style="background-color:#438eb9;color: #FFF;">
					<!-- <th class="tr-th" style="text-align:center;">序号</th> -->
					<th class="tr-th" style="text-align:center;">付款次数</th>
					<th class="tr-th" style="text-align:center;">付款金额</th>
					<th class="tr-th" style="text-align:center;">凭证号</th>
					<th class="tr-th" style="text-align:center;">付款时间</th>	
					<th class="tr-th" style="text-align:center;">备注</th>
					 <th class="tr-th" style="text-align:center;">操作</th>
				  </tr>
			    </thead>
				<tbody>
				<?php
				//声明变量并接受form表单发送过来的数据
					$htbh = $_GET['htbh']; 
					$xmbh = $_GET['xmbh'];
					$xmmc = $_GET['xmmc'];
					$dwmc = $_GET['dwmc'];
					$htmc = $_GET['htmc'];
					$nd = $_GET['nd'];
					$yf = $_GET['yf'];								
				//连接数据库
					require("dbconfig.php");//导入配置文件
					$link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
					mysql_select_db(DBNAME,$link);//选择数据库
					mysql_query("set names 'utf8'");//选择字符集
					
					
					// $wherelist = array();//获取查询条件
					// 	if(!empty($_GET['htbh'])){
					// 		$wherelist[] = "htbh like '%{$_GET['htbh']}%'";
					// 	}
					// 	if(!empty($_GET['xmbh'])){
					// 		$wherelist[] = "xmbh like '%{$_GET['xmbh']}%'";
					// 	}
					// 	if(!empty($_GET['xmmc'])){
					// 		$wherelist[] = "xmmc like '%{$_GET['xmmc']}%'";
					// 	}
					// 	if(!empty($_GET['dwmc'])){
					// 		$wherelist[] = "jfdw like '%{$_GET['dwmc']}%'";
					// 	}
					// 	if(!empty($_GET['htmc'])){
					// 		$wherelist[] = "htmc like '%{$_GET['htmc']}%'";
					// 	}
					// 	if(!empty($_GET['yf'])){
					// 		$wherelist[] = "yf like '%{$_GET['yf']}%'";
					// 	}
					// 	if(!empty($_GET['nd'])){
					// 		$wherelist[] = "nd like '%{$_GET['nd']}%'";
					// 	}
						
					// if(count($wherelist) > 0){         //组装查询条件
					// 	$where = " where ".implode(' AND ' , $wherelist); 
					// }
					
					$sql = "select * from 	bill where htbh='$htbh' and jshj is not null and jshj !=0 order by id";//查询语句	;
					$result = mysql_query($sql,$link);
					
					if (!mysql_num_rows($result)){
					 echo "<tr align='center'>";
					echo "<td  colspan='18' >表中无付款记录存在!</td>";
					// return false;					
					}	
					$i=0;
			while(@$row = mysql_fetch_assoc($result)){
				$i++;
				if($row["jshj"]!=0 && $row["jshj"]!==''){
				 $yf = $row["jshj"]."元";;
				}else{
				 $yf = 0;
				}				
				echo "<tr align='center'>";
				echo "<td>第{$i}次付款</td>";
				echo "<td>$yf</td>";
				echo "<td>{$row['pzh']}</td>";
				echo "<td>{$row['kprq']}</td>";
				echo "<td>{$row['bz']}</td>";
				echo "<td  width='40px'><div style='/* text-align:center; */height:auto;' class='datagrid-cell datagrid-cell-c8-edit'><img class='GridTopImg' title='点击编辑修改条记录' onclick='ShowEdit({$row['id']})' src='images/Edit.png'>|<img title='点击删除该条记录' class='GridTopImg' onclick='ShowDel({$row['id']})' src='images/DelBtn.png'></div></td>";
				echo "</tr>";
			}
			$sql2="select count(*) as rows, sum(jshj) as zyfk from bill where htbh='$htbh' and jshj is not null and jshj !=0";
			$result2 = mysql_query($sql2,$link);
			$row = mysql_fetch_assoc($result2);
			$rows=$row["rows"]+1;
			if($row["zyfk"]!=0 && $row["zyfk"]!==''){
			 $zyf = $row["zyfk"]."元";
			}else{
			 $zyf = 0;
			}
			echo "<tr align='center'>";
			echo "<td>累计总付款</td>";
			echo "<td colspan='6'><input  id='zyfk' placeholder=''  value='$zyf' type='text' readonly style='border:0'width: 100%;height: 60%;color:black;'></td>";
			echo "</tr>";
			echo "<tr align='center'>";
			echo "<td colspan='6' style='border:0;'> <a href='javascript:;' id='add' onclick='add()' title='添加收款记录' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' iconcls='icon-add' plain='true' group=''><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'></span><span class='l-btn-icon icon-add'>&nbsp;</span></span></a>";
			// echo"<a href='javascript:;' id='delete3' title='点击删除选定记录' onclick='delete0()' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' iconcls='icon-remove' plain='true' group='' style='display: inline-block;'><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'></span><span class='l-btn-icon icon-remove'>&nbsp;</span></span></a>";
			echo "</td>";
			echo "<tbody>";
			echo "</table>";
				 ?>
					
				
			<form method='get' action='bill_luruphp_administrative.php' id='Form'>
				<?php
				echo"<input name='htbh' value='$htbh' id='_easyui_textbox_input9' type='text' style='display:none'>";
				echo"<input name='htmc' value='$htmc' id='_easyui_textbox_input9' type='text' style='display:none'>";
				echo"<input name='xmmc' value='$xmmc' id='_easyui_textbox_input9' type='text' style='display:none'>";
				echo"<input name='xmbh' value='$xmbh' id='_easyui_textbox_input9' type='text' style='display:none'>";
				echo"<input name='dwmc' value='$dwmc' id='_easyui_textbox_input9' type='text' style='display:none'>";
				?>
				<table id='table' style="word-break:break-all; word-wrap:break-all;border: 0;display: none;" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<tr align='center' id="one">
					<td style="border: 0;">第<input style="border:0;width: 16px;text-align: center;" type='text' name="number" value="<?php echo $rows;?>">次付款</td>
					<td style="border: 0;"><textarea  name='yfk' id='yfk' style="width: 138px;height: 26px"placeholder='付款金额'></textarea></td>
					<td style="border: 0;"><textarea  name='pzh' id='pzh' style="width: 138px;height: 26px"placeholder='凭证号'></textarea></td>
					<td style="border: 0;"><span class="ace-calendar-picker" >
									<div style="top: 40px;">
										<input  id="dpStart" placeholder="付款时间" name="kprq" autocomplete='off' type="text" class="ace-calendar-picker-input ace-input"style="width:100px;height: 60%;color:black">
										<span class="ace-calendar-picker-icon">							
										</span>
										</div>
										</span></td>
					<td style="border: 0;"><textarea  name='bz' id='bz'style="width: 138px;height: 26px"placeholder='备注'></textarea></td>
					<td style="border: 0;"><!-- <a href="javascript:;" id="add1" onclick="add1()"     title="添加付款记录" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-add" plain="true" group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text"></span><span class="l-btn-icon icon-add">&nbsp;</span></span></a> --><a href="javascript:;" id="delete1" title="点击删除选定记录" onclick="delete1()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-remove" plain="true" group="" style="display: inline-block;"><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text"></span><span class="l-btn-icon icon-remove">&nbsp;</span></span></a></td>
				
				</tr>
				<tr>
				<td  colspan='6' style='text-align: center;border: 0;'><center><a href='javascript:;' id='ok' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' onclick='subForm();' ><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>添加付款记录</span><span class='l-btn-icon icon-ok'>&nbsp;</span></span></a></td>
				</tr>
				<tr align='center' id='two' >
					<!-- <td style="border: 0;">第<input style="border:0;width: 16px;text-align: center;"nmae="number" value="<?php echo $rows+2;?>">次收款</td>
					<td style="border: 0;"><textarea  name='yfk' id='yfk' style="width: 100px;"placeholder='付款金额'></textarea></td>
					<td style="border: 0;"><textarea  name='bz' id='bz'style="width: 200px;"placeholder='备注'></textarea></td>
					<td style="border: 0;"><a href="javascript:;" id="add2"  onclick="add2()"title="添加收款记录" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-add" plain="true" group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text"></span><span class="l-btn-icon icon-add">&nbsp;</span></span></a><a href="javascript:;" id="delete2" title="点击删除选定记录" onclick="delete2()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-remove" plain="true" group="" style="display: inline-block;"><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text"></span><span class="l-btn-icon icon-remove">&nbsp;</span></span></a></td>
				 -->
				</tr>
				<tr align='center' id='three' >
					<!-- <td style="border: 0;">第<input style="border:0;width: 16px;text-align: center;"nmae="number" value="<?php echo $rows+3;?>">次收款</td>
					<td style="border: 0;"><textarea  name='yfk' id='yfk' style="width: 100px;"placeholder='付款金额'></textarea></td>
					<td style="border: 0;"><textarea  name='bz' id='bz'style="width: 200px;"placeholder='备注'></textarea></td>
					<td style="border: 0;"><a href="javascript:;" id="add3" onclick="add3()" title="添加收款记录" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-add" plain="true" group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text"></span><span class="l-btn-icon icon-add">&nbsp;</span></span></a><a href="javascript:;" id="delete3" title="点击删除选定记录" onclick="delete3()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-remove" plain="true" group="" style="display: inline-block;"><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text"></span><span class="l-btn-icon icon-remove">&nbsp;</span></span></a></td>				
				 -->
				</tr>
				<tr id='button'>
					<!-- <td  colspan="4" style="text-align: center;border: 0;">
						<center>
					<a href="javascript:;" id="ok" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" onclick="subForm();" ><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">保存</span><span class="l-btn-icon icon-ok">&nbsp;</span></span></a>
				
					</td> -->
				</tr>
				</table>
			</form>
			<!-- 			<div class="box-footer layer-footer" style="float:right"> -->
							<td colspan='6' style='text-align: center;border: 0;'><center>
							<button style='display: ;'type="button" id='save'class="btn btn-primary" onclick="Save()">确定</button>
						</center>
							<!-- <button type="button" class="btn btn-default" onclick="Cancel()">取消</button>				 -->
						<!-- </div> -->
				    </body>
					<script> 
					function Save() {
						var zyfk=$("#zyfk").val();
						if(zyfk!=''){
						$("#yfk" , window.parent.document).val(zyfk.substring(0,zyfk.length-1)); // 传给父窗口
						// $("#ysp" , window.parent.document).val(zyfk.substring(0,zyfk.length-1)); // 传给父窗口
						$("#yfk" , window.parent.document).keyup(); //触发yfk的keyup事件更新应收款
						}else{
							$("#yfk" , window.parent.document).val(0); // 传给父窗口
							// $("#ysp" , window.parent.document).val(0); // 传给父窗口
							$("#yfk" , window.parent.document).keyup(); //触发yfk的keyup事件更新应收款
						}

							var index = parent.layer.getFrameIndex(window.name); 
							parent.layer.close(index);// 关闭子窗口
						}
						</script>
					<script src="js/input/jquery.dataTables.min.js"></script>
					<script src="js/input/dataTables.bootstrap.min.js"></script>
					<script src="js/input/layer.js"></script>
					<script src="js/input/toastr.min.js"></script>
					<script src="js/input/Common.js"></script>
					<script>
						function add(){
							document.getElementById('table').style.display="";
							document.getElementById('save').style.display="none";
						}
						function delete1(){
							document.getElementById('table').style.display="none";
							document.getElementById('save').style.display="";
							}
						</script>
		<!-- 		<script>
			function add(){
				document.getElementById('one').innerHTML="<td style='border: 0;'>第<input style='border:0;width: 16px;text-align: center;' type='text' name='number' value='<?php echo $rows;?>'>次付款</td><td style='border: 0;'><textarea  name='yfk' id='yfk' style='width: 100px;'placeholder='付款金额'></textarea></td><td style='border: 0;'><textarea  name='bz' id='bz'style='width: 200px;'placeholder='备注'></textarea></td><td style='border: 0;'><a href='javascript:;' id='add1' onclick='add1()'     title='添加收款记录' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' iconcls='icon-add' plain='true' group=''><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'></span><span class='l-btn-icon icon-add'>&nbsp;</span></span></a><a href='javascript:;' id='delete1' title='点击删除选定记录' onclick='delete1()' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' iconcls='icon-remove' plain='true' group='' style='display: inline-block;'><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'></span><span class='l-btn-icon icon-remove'>&nbsp;</span></span></a></td>"
				document.getElementById('button').innerHTML="<td  colspan='4' style='text-align: center;border: 0;'><center><a href='javascript:;' id='ok' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' onclick='subForm();' ><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>保存</span><span class='l-btn-icon icon-ok'>&nbsp;</span></span></a></td>";
			}
			function add1(){
				document.getElementById('two').innerHTML="<td style='border: 0;'>第<input style='border:0;width: 16px;text-align: center;' type='text' name='number' value='<?php echo $rows+1;?>'>次付款</td><td style='border: 0;'><textarea  name='yfk' id='yfk' style='width: 100px;'placeholder='付款金额'></textarea></td><td style='border: 0;'><textarea  name='bz' id='bz'style='width: 200px;'placeholder='备注'></textarea></td><td style='border: 0;'><a href='javascript:;' id='add1' onclick='add2()'     title='添加收款记录' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' iconcls='icon-add' plain='true' group=''><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'></span><span class='l-btn-icon icon-add'>&nbsp;</span></span></a><a href='javascript:;' id='delete2' title='点击删除选定记录' onclick='delete2()' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' iconcls='icon-remove' plain='true' group='' style='display: inline-block;'><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'></span><span class='l-btn-icon icon-remove'>&nbsp;</span></span></a></td>";
			}
			function add2(){
				document.getElementById('three').innerHTML="<td style='border: 0;'>第<input style='border:0;width: 16px;text-align: center;' type='text' name='number' value='<?php echo $rows+2;?>'>次付款</td><td style='border: 0;'><textarea  name='yfk' id='yfk' style='width: 100px;'placeholder='付款金额'></textarea></td><td style='border: 0;'><textarea  name='bz' id='bz'style='width: 200px;'placeholder='备注'></textarea></td><td style='border: 0;'><a href='javascript:;' id='add1' onclick='add3()'     title='添加收款记录' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' iconcls='icon-add' plain='true' group=''><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'></span><span class='l-btn-icon icon-add'>&nbsp;</span></span></a><a href='javascript:;' id='delete3' title='点击删除选定记录' onclick='delete3()' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' iconcls='icon-remove' plain='true' group='' style='display: inline-block;'><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'></span><span class='l-btn-icon icon-remove'>&nbsp;</span></span></a></td>";
			}
			// function delete0(){
			// 	document.getElementById('table').style.display="none";
			// }
			function delete1(){
				document.getElementById('one').innerHTML="";
				document.getElementById('button').innerHTML="";
			}
			function delete2(){
				document.getElementById('two').innerHTML="";
			}
			function delete3(){
				document.getElementById('three').innerHTML="";
			}
			
		</script> -->
		<script>
			function ShowEdit(id){
				var iid = id;
				 window.location.href="bill_change_administrative.php?user=<?php echo $user;?>&id=" + iid + "";
				}
		</script>
		<script>
				function ShowDel(id) {					
						layer.open({
						 type: 1,
						 area: ['250px', '150px'],
						 skin: 'layui-layer-demo',
						 closeBtn: 1,
						 anim: 2,
						 shadeClose: true,
						 content: '<center><h4 style="color:red;padding:5px5px;magin:2px;">确定删除该条数据吗</h4></center>',
						 btn: ["确定", "取消"],
						 yes: function () {
						                     var iid = id;
						                     window.location.href="bill_delete_administrative.php?user=<?php echo $user;?>&id=" + iid + "";
						                 },
						});
					}		
			</script>
<script>
		function subForm(){
		       $("#Form").submit();
		   }
	</script>
	<script>
		function excel(){
		
			var xmmc = $("#xmmc").val();
			var xmbh = $("#xmbh").val();
			var dwmc = $("#dwmc").val();
			var htmc = $("#htmc").val();
			var htbh = $("#htbh").val();
			var nd = $("#nd").val();
			var yf = $("#yf").val();
			window.location.href= "excel_income.php?xmmc=" + xmmc + "&xmbh=" + xmbh + "&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&nd=" + nd + "&yf=" + yf + "";
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
	<script>
		function ifram(){
			var xmmc = $("#xmmc").val();
			var xmbh = $("#xmbh").val();
			var dwmc = $("#dwmc").val();
			var htmc = $("#htmc").val();
			var htbh = $("#htbh").val();
			var nd = $("#nd").val();
			var yf = $("#yf").val();
			window.location.href= "income.php?xmmc=" + xmmc + "&xmbh=" + xmbh + "&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&nd=" + nd + "&yf=" + yf + "";
		}
	</script>

</html>