<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <title></title>
 <meta name="viewport" content="width=device-width" />
 <link href="css/input/bootstrap.min.css" rel="stylesheet"/>
<link href="css/input/font-awesome.min.css" rel="stylesheet"/>
<link href="css/input/dataTables.bootstrap.css" rel="stylesheet"/>
<link href="css/input/ionicons.min.css" rel="stylesheet"/>
<link href="css/input/ace.min.css" rel="stylesheet"/>
<link href="css/input/_all-skins.min.css" rel="stylesheet"/>
<link href="css/input/toastr.min.css" rel="stylesheet"/>
<link href="css/input/main.css" rel="stylesheet"/>
   <!-- <link href="css/input/DaDetail.css" rel="stylesheet" /> -->
   <link href="css/easyui.css" rel="stylesheet"/>
   <link href="css/icon.css" rel="stylesheet"/>
   		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/layer/layer.js"></script>
		
   <script src="js/bootstrap-datepicker.js"></script>
   <script src="js/bootstrap-datepicker.zh-CN.js"></script>
   <script src="js/date.js" type="text/javascript"></script>
   <link href="css/datepicker3.css" rel="stylesheet"/>
   
  <link href="ajax-php/css/searchSuggest.css" type="text/css" rel="stylesheet" />
   <!-- <script type="text/javascript" src="ajax-php/js/searchSuggest.js"></script> -->
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
		.selectInput{
			position:absolute; 
			margin-left:15px;
			padding-left:10px;
			width:130px;
			height:25px;
			left:1px;
			top:2px;
			border-bottom:0px;
			border-right:0px;
			border-left:0px;
			border-top:0px;
		}

    </style>
</head>
<body>
    <!-- Main content -->
	
	<form method="post" action="" id="Form">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <h3><span>收入合同录入表</span></h3>
                    <table>
                        <tr>
                            <td class="datab-1 tdtitle">合同编号</td>
                            <td class="datab-2"><input style="width: 100%;height: 60%;color:black"type="text"name="htbh" autocomplete='off' value="" id="htbh"  />
												<!-- <ul class="datab-2" id="suggest_ul">
												</ul> -->
							</td>
							<td class="datab-1 tdtitle">项目编号</td>
							<td class="datab-2"><input style="width: 100%;height: 60%;color:black"type="text"name="xmbh" autocomplete='off' value="" id="xmbh"  />											
							</td>
                            <td class="datab-1 tdtitle">项目名称</td>
                            <td class="datab-2"><textarea class="txtarea" id='xmmc'name="xmmc"onblur="close()"></textarea>
												<!-- <ul class="datab-2" id="suggest_ul">
												</ul> -->
							</td>
                        </tr>
                        <tr>
                            <td class="datab-1 tdtitle">甲方单位</td>
                            <td class="datab-2"><textarea class="txtarea" id='dwmc'name="dwmc"></textarea></td>
                            <td class="datab-1 tdtitle">合同名称</td>
                            <td class="datab-2"><textarea class="txtarea" id='htmc'name="htmc"></textarea></td>
                            <td class="datab-1 tdtitle">合同类型</td>
                            <td class="datab-2"><select name="htlx"  id="htlx" style="width: 100%;height: 60%;color:black" value="<?php echo $htlx;?>">
											  <option><?php echo $htlx;?></option>
											  <option value="软件">软件</option>
											  <option value="数据">数据</option>
											  <option value="运营">运营</option>
											  <option value="集成">集成</option>
											  <option value="其他">其他</option>
											</select></td>
                        </tr>
                        <tr>
                            <td class="datab-1 tdtitle">联系人</td>
                            <td class="datab-2"><textarea class="txtarea" name="lxr" id="lxr"></textarea></td>
                            <td class="datab-1 tdtitle">签订时间</td>
                            <td class="datab-2"><span class="ace-calendar-picker" style="width:100%;">
											<div>
												<input name="qdsj" id="qdsj"type='text'style="width: 92%;height: 60%;color:black;"><input  id="dpStart" placeholder=""  autocomplete='off' type="text" class="ace-calendar-picker-input ace-input"style="width: 8%;height: 60%;background-color:white;color:rgba(0,0,0,0);background:url(css/images/date.png)no-repeat #f8f8f8;background-size: 24px 32px; ">
												<span class="ace-calendar-picker-icon">							
												</span>
												</div>
												</span></td>
                            <td class="datab-1 tdtitle">合同工期</td>
                            <td class="datab-2"><textarea class="txtarea" name="htgq" id="htgq"></textarea></td>
                        </tr>
                        <tr>
                            <td class="datab-1 tdtitle">付款方式</td>
                            <td class="datab-2"><textarea class="txtarea" name="fkfs" id="fkfs"></textarea></td>
                            <td class="datab-1 tdtitle">结算方式</td>
                            <td class="datab-2"><textarea class="txtarea" name="jsfs" id="jsfs"></textarea></td>
                            <td class="datab-1 tdtitle">合同总额</td>
                            <td class="datab-2"><textarea class="txtarea" name="htze" id="htze" onkeyup="money()" ></textarea></td>
                        </tr>
                        <tr>
                            <td class="datab-1 tdtitle">已收款</td>
                            <td class="datab-2"><textarea class="txtarea" name="ysk" id="ysk" onclick="add()" onkeyup="money()"><?php echo $ysk;?></textarea></td>
                            <td class="datab-1 tdtitle">应收款</td>
                            <td class="datab-2"><textarea class="txtarea" name="gsk" id="gsk"></textarea></td>
                            <td class="datab-1 tdtitle">已开票</td>
                            <td class="datab-2"><textarea class="txtarea" name="ykp"  id="ykp" onkeyup="isdjht()"></textarea></td>
                        </tr>
                       <tr>
                            <td class="datab-1 tdtitle">部门</td>                       
							<td class="datab-2">
							<div style="padding:5px ;position:relative;width: 100%;height: 100%;" class="col-sm-4">
							    <span style="top:5px;overflow:hidden;width:95%;height:32px;">
							        <!--这个是个多选框，用onchange事件的时候 ，将这个select的id传进去-->
							               <select name="trains" οnchange="qlcTrainS('qlc_zdz1')" class="form-control" id="qlc_zdz1" style="height:36px;outline:0;">
							                   <option><?php echo $dept;?></option>
							                   <option value="档案数据部">档案数据部</option>
							                   <option value="地理信息部">地理信息部</option>
							                   <option value="智能化部">智能化部</option>
							                   <option value="系统集成部">系统集成部</option>
							                   <option value="充换电平台部">充换电平台部</option>
							                   <option value="云计算与大数据部">云计算与大数据部</option>
							                   <option value="研发应用部">研发应用部</option>
							               </select>
							 
							    </span>
							    <span style="position:absolute;top:7px;left:6px;width:80%;height:28px;border-radius:5px;">
							        <!--这里是input框，定位到select的上面-->
							              <input type="text" name="dept" id="dept" class="ccdd" placeholder="" autocomplete='off'style="width:100%;height:32px;border:0px;border-radius:5px;outline:0;margin-left: 1px;color: black;">
							    </span>
							</div>
							
							</td>
							<td class="datab-1 tdtitle">是否单价合同</td>
							<td class="datab-2"><select name="begin"  onclick="isdj()" id="begin"  style="width: 100%;height: 60%;color:black" >
											  <option><?php echo $begin;?></option>
											  <option value="1">是</option>
											  <option value="2">否</option>
											 
											</select></td>
                        </tr>

                        <tr>
                            <td class="datab-1 tdtitle">备注</td>
                            <td class="datab-2" colspan="5"><textarea class="txtarea" name="bz" id='bz'></textarea></td>
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
		$("#dept").click(function(){
			setInterval(changehover,300);
			function changehover(){
				$("#suggest_ul li").hover(function(){ $(this).css("background","#d5d5d5");},function(){ $(this).css("background","#ffff");});
				
				$("#suggest_ul li").click(function(){ 
					$("#dept").val($(this).html());
					$("#suggest_ul").hide(0);
				});
				// $("#suggest_ul li").click(function(){ $("#suggest_ul").hide(0);});
			}
		});
	//判断合同编号是否录入，有则询问是否前往更改
	$("#htbh").keyup(function(){
		// alert("nohao");
		var htbh = $("#htbh").val();
		$.ajax({
			type:"post",
			url:"getdata_income.php",
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
						 content: '<center><h4 style="color:red;padding:5px5px;magin:2px;">提示</h4><h4>该合同编号已有录入信息</h4><h4>是否前往修改合同信息</h4></center>',
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
											 content: "income_change_htbh.php?htbh="+htbh,
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
	// function close()	{
	// 	setTimeout("$('#suggest_ul').hide();", 100);
	// }
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
		// if(document.getElementById("begin").value=1){
		// 	document.getElementById("ykp").value=document.getElementById("htze").value
		// }
				}
	</script>
	<script>
		function add(){
			var htbh = document.getElementById("htbh").value;
			// var xmbh = document.getElementById("xmbh").value;
			// var xmmc = document.getElementById("xmmc").value;
			// var dwmc = document.getElementById("dwmc").value;
			// var htmc = document.getElementById("htmc").value;
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
			 content: 'bill_income.php?htbh='+htbh+'&xmbh='+xmbh+'&xmmc='+xmmc+'&dwmc='+dwmc+'&htmc='+htmc,
			 // end:function(){
			 // 	window.location.href="income_luru.php?htbh="+htbh+"&xmbh="+xmbh+"&xmmc="+xmmc+"&dwmc="+dwmc+"&htmc="+htcm+"&htlx="+htlx+"&lxr="+lxr+"&qdsj="+qdsj+"&htgq="+htgq+"&fkfs="+fkfs+"&jsfs="+jsfs+"&htze="+htze+"&bz="+bz;
			 // },
				// },
				 });
		}
	</script>
<script src="js/input/jquery.dataTables.min.js"></script>
<script src="js/input/dataTables.bootstrap.min.js"></script>
<script src="js/input/layer.js"></script>
<script src="js/input/toastr.min.js"></script>
<script src="js/input/Common.js"></script>

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
			url:"income_luruphp.php",
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
  
</body>
</html>

