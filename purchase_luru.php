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
    <!-- Main content -->
	<form method="post" action="" id="Form">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <h3><span>零星采购录入表</span></h3>
                    <table>
                        <tr>
							<td class="datab-1 tdtitle">项目编号</td>
							<td class="datab-2"><textarea class="txtarea" id='xmbh'name="xmbh"></textarea></td>
                            <td class="datab-1 tdtitle">项目名称</td>
                            <td class="datab-2"><textarea class="txtarea" id='xmmc'name="xmmc"></textarea></td>
							<td class="datab-1 tdtitle">收款人</td>
							<td class="datab-2"><textarea class="txtarea" id='dwmc'name="dwmc"></textarea></td>
                        </tr>
                        <tr>
                          <!--  
                            <td class="datab-1 tdtitle">合同名称</td>
                            <td class="datab-2"><textarea class="txtarea" id='htmc'name="htmc"></textarea></td>
                            <td class="datab-1 tdtitle">联系人</td>
                            <td class="datab-2"><textarea class="txtarea" name="lxr"></textarea></td> -->
							<td class="datab-1 tdtitle">付款金额</td>
							<td class="datab-2"><textarea class="txtarea" name="fkje"></textarea></td>
							<td class="datab-1 tdtitle">付款时间</td>
							<td class="datab-2"><span class="ace-calendar-picker" style="width:100%;">
											<div>
												<input name="fksj" id="qdsj"type='text'style="width: 92%;height: 60%;color:black;"><input  id="dpStart" placeholder=""  autocomplete='off' type="text" class="ace-calendar-picker-input ace-input"style="width: 8%;height: 60%;background-color:white;color:rgba(0,0,0,0);background:url(css/images/date.png)no-repeat #f8f8f8;background-size: 24px 32px; ">
												<span class="ace-calendar-picker-icon">							
												</span>
												</div>
												</span></td>
							<td class="datab-1 tdtitle">凭证号</td>
							<td class="datab-2"><textarea class="txtarea" name="pzh"></textarea></td>
                        </tr>
                        <tr>                   
                           
							<td class="datab-1 tdtitle">税额</td>
							<td class="datab-2"><textarea class="txtarea" name="se" id="se" ></textarea></td>
                        </tr>
						<tr>
						    <td class="datab-1 tdtitle">摘要</td>
						    <td class="datab-2" colspan="5"><textarea class="txtarea" name="zy"></textarea></td>
						</tr>
                        <tr>
                            <td class="datab-1 tdtitle">备注</td>
                            <td class="datab-2" colspan="5"><textarea class="txtarea" name="bz"></textarea></td>
                        </tr>  
						<tr>
							<td  colspan="7" style="text-align: center;">
								<center>
							<a href="javascript:;" id="ok" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" onclick="subForm();" ><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">保存</span><span class="l-btn-icon icon-ok">&nbsp;</span></span></a>
							<a href="javascript:;" id="exit" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" ><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">返回</span><span class="l-btn-icon icon-exit">&nbsp;</span></span></a>
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
<script src="js/input/jquery.dataTables.min.js"></script>
<script src="js/input/dataTables.bootstrap.min.js"></script>
<script src="js/input/layer.js"></script>
<script src="js/input/toastr.min.js"></script>
<script src="js/input/Common.js"></script>
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
  				layer.alert('项目编号不能为空！', {
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
  			url:"purchase_luruphp.php",
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

