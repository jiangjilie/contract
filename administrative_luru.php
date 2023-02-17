<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>合同录入</title>
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
		<form method="get" action="administrative_luruphp.php" id="Form">
		<section class="content">
		    <div class="row">
		        <!-- left column -->
		        <div class="col-md-12">
		            <!-- general form elements -->
		            <div class="box box-primary">
		                <!-- /.box-header -->
		                <h3><span>行政合同录入表</span></h3>
		                <table>
									<tr>
									    <td class="datab-1 tdtitle">合同编号</td>
									    <td class="datab-2"><textarea class="txtarea" autocomplete='true' id='htbh'name="htbh"></textarea></td>
										<td class="datab-1 tdtitle">合同名称</td>
										<td class="datab-2"><textarea class="txtarea" id='htmc'name="htmc"></textarea></td>
										<td class="datab-1 tdtitle">对方单位</td>
										<td class="datab-2"><textarea class="txtarea" id='dwmc'name="dwmc"></textarea></td>
									</tr>
										<tr>
											<td class="datab-1 tdtitle">签订时间</td>
											<td class="datab-2"><span class="ace-calendar-picker" style="width:100%;">
															<div>
																<input name="qdsj" id="qdsj"type='text'style="width: 92%;height: 60%;color:black;"><input  id="dpStart" placeholder=""  autocomplete='off' type="text" class="ace-calendar-picker-input ace-input"style="width: 8%;height: 60%;background-color:white;color:rgba(0,0,0,0);background:url(css/images/date.png)no-repeat #f8f8f8;background-size: 24px 32px; ">
																<span class="ace-calendar-picker-icon">							
																</span>
																</div>
																</span></td>
											<td class="datab-1 tdtitle">联系人</td>
											<td class="datab-2"><textarea class="txtarea" name="lxr"></textarea></td>										
											<td class="datab-1 tdtitle">合同金额</td>
											<td class="datab-2"><textarea class="txtarea" name="htze" id="htze" onkeyup="money()"></textarea></td>
										</tr>
										<tr>
											<td class="datab-1 tdtitle">已付款</td>
											<td class="datab-2"><textarea class="txtarea" name="yfk" id="yfk"onclick="add()" onkeyup="money()"></textarea></td>
											<td class="datab-1 tdtitle">未付款</td>
											<td class="datab-2"><textarea class="txtarea" name="wfk" id="wfk"></textarea></td>
											<td class="datab-1 tdtitle">付款凭证</td>
											<td class="datab-2"><textarea class="txtarea" name="fkpz"></textarea></td>
										</tr>										
										<tr>
											<td class="datab-1 tdtitle">备注</td>
											<td class="datab-2" colspan="5"><textarea class="txtarea" name="bz"></textarea></td>
										</tr>  
										<tr>
											<td  colspan="7" style="text-align: center;">
												<center>
											<a href="javascript:;" id="ok" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" onclick="subForm();" ><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">保存</span><span class="l-btn-icon icon-ok">&nbsp;</span></span></a>
											<a href="javascript:;" id="exit" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" ><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">退出</span><span class="l-btn-icon icon-exit">&nbsp;</span></span></a>
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
									    </section>
										<script>
										    <!--将select的值赋给input框-->
										   $('#dpStart').on('change', function(){
										   	// alert(this.value); //or alert($(this).val());
										   	document.getElementById("qdsj").value =this.value;
										   });
										 
										</script>
										<script>
											//判断合同编号是否录入，有则询问是否前往更改
											$("#htbh").keyup(function(){
												// alert("nohao");
												var htbh = $("#htbh").val();
												$.ajax({
													type:"post",
													url:"getdata_administrative.php",
													data:"htbh="+htbh,
													// dataType:"text",
													cache: false, 
													// dataType: "json",
													success: function(data){
														if(data==1){
																layer.open({
																 type: 1,
																 area: ['400px', '300px'],
																 skin: 'layui-layer-demo',
																 closeBtn: 1,
																 anim: 2,
																 // icon: 1,
																 shadeClose: true,
																 content: '<center><h4 style="color:red;padding:5px5px;magin:2px;">提示</h4><h4>该合同编号已有录入信息</h4><h4>是否前往添加信息</h4></center>',
																 btn: ["是", "否"],
																 yes: function (index, layero) {
																	 var thisIndex = index;
																layer.open({
																					 type: 2,
																					 // title:'<center><h3> 收入合同修改</center>',
																					 title:false,
																					 shade: [0.5, '#000'],
																					 //配置遮罩层颜色和透明度
																					 shadeClose: true,
																					 //是否允许点击遮罩层关闭弹窗 true /false
																					 //closeBtn:2,
																					 // time:1000,  设置自动关闭窗口时间 1秒=1000；
																					 shift: 0,
																					 //打开效果：0-6 。0放大，1从上到下，2下到上，3左到右放大，4翻滚效果；5渐变；6抖窗口
																					 offset:'t',  //设置弹出位置
																					 area: ['1600px', '600px'],
																					 // skin: 'layui-layer-demo',
																					 closeBtn: 1,
																					 anim: 2,
																					 content: "administrative_change_htbh.php?htbh="+htbh,
																					  // btn: ["", "取消"],
																					 
																					 end:function(){
																window.location.reload();//刷新父页面
																					 },
																						 });						 																	                 
																                 },
																});
														}
														},
												});
												
												})
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
									<script src="js/input/jquery.dataTables.min.js"></script>
									<script src="js/input/dataTables.bootstrap.min.js"></script>
									<script src="js/input/layer.js"></script>
									<script src="js/input/toastr.min.js"></script>
									<script src="js/input/Common.js"></script>
				
	</body>
	<script>
		function add(){
			var htbh = document.getElementById("htbh").value;
			// var xmbh = document.getElementById("xmbh").value;
			// var xmmc = document.getElementById("xmmc").value;
			var dwmc = document.getElementById("dwmc").value;
			var htmc = document.getElementById("htmc").value;
			if(htbh==''){
			layer.alert('合同编号不能为空！', {
			icon: 5,
			title: '提示',
			end:function(){
				$('#htbh').focus();
				// return false;
			}
			});
			return false;
			}
			// var htlx = document.getElementById("htlx").value;
			// var lxr = document.getElementById("lxr").value;
			// var qdsj = document.getElementById("dpStart").value;
			// var htgq = document.getElementById("htgq").value;
			// var fkfs = document.getElementById("fkfs").value;
			// var jsfs = document.getElementById("jsfs").value;
			// var htze = document.getElementById("htze").value;
			// var bz = document.getElementById("bz").value;
			layer.open({
			 type: 2,
			 // title:'<center >收入流水</center>',
			 title:false,
			 // maxmin: false,
			 shade: [0.5, '#000'],
			 //配置遮罩层颜色和透明度
			 shadeClose: false,
			 //是否允许点击遮罩层关闭弹窗 true /false
			 //closeBtn:2,
			 // time:1000,  设置自动关闭窗口时间 1秒=1000；
			 shift: 0,
			 //打开效果：0-6 。0放大，1从上到下，2下到上，3左到右放大，4翻滚效果；5渐变；6抖窗口
			 area: ['1000px', '600px'],
			 skin: 'layui-layer-demo',
			 closeBtn: 1,
			 anim: 2,
			 content: 'bill_administrative.php?htbh='+htbh+'&dwmc='+dwmc+'&htmc='+htmc,
			 // end:function(){
			 // 	window.location.href="administrative_luru.php?htbh="+htbh+"&xmbh="+xmbh+"&xmmc="+xmmc+"&dwmc="+dwmc+"&htmc="+htcm+"&htlx="+htlx+"&lxr="+lxr+"&qdsj="+qdsj+"&htgq="+htgq+"&fkfs="+fkfs+"&jsfs="+jsfs+"&htze="+htze+"&bz="+bz;
			 // },
				// },
				 });
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
				url:"administrative_luruphp.php",
				 cache: false,  
				data: $('#Form').serialize(),
				success: function (data) {
					 layer.alert('保存成功！', {
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
			   parent.layer.close(index); //再执行关闭
			   })
	</script>
	
</html>
