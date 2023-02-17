<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>收入合同</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<!-- <link href="css/font-awesome.min.css" rel="stylesheet"/>
		<link href="css/font-awesom.min.css" rel="stylesheet"/> -->
		<link href="css/ace-rtl.min.css" rel="stylesheet"/>
		<link href="css/ace-skins.min.css" rel="stylesheet"/>
		<link href="css/common.css" rel="stylesheet"/>
		<link href="css/easyui.css" rel="stylesheet"/>
		<link href="css/icon.css" rel="stylesheet"/>
		<script src="js/Common.js"></script>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/layer/layer.js"></script>
		<link rel="stylesheet" href="css/jquery.treeview.css" type="text/css"/>
		<script src="js/jquery.treeview.js" type="text/javascript"></script>
		<link href="css/scrollbox.css" rel="stylesheet"/>  
		<link href="Content/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="Content/bootstrap-table/bootstrap-table.min.css"  rel="stylesheet" />
		<!-- <link href="Content/bootstrap-table/extensions/fixed-column/bootstrap-table-fixed-columns.css"  rel="stylesheet" /> -->
				   <!-- 解决bootstrapTable中的width值设置无效的问题   table-layout:fixed意思是固定的，即width设置为多少bootstrapTable就显示多宽-->
		<!-- <style type="text/css">		
		 .table {table-layout:fixed;}    
		</style> -->
		<style>
			.th-tr{
				text-align:center;
				background-color: #438eb9;
			}
		
		</style>
		<style>
		/*定义类名为.thead-blue的样式*/
		.table td {
		text-align: center;
		}
		.th-inner {
			background-color: #438eb9;
			    color: #FFF;
			border: 1px solid #438eb9;
			text-align: center;
		}
		.columns{
			display: none;
		}
		</style>
	</head>
		<body marginwidth="0" marginheight="0">
			<?php $user = $_GET['user'];
			 $htbh = $_GET['htbh'];
			 $xmbh = $_GET['xmbh'];
			 $xmmc = $_GET['xmmc'];
			 $jfdw = $_GET['jfdw'];
			 $htmc = $_GET['htmc'];											
			 $nd = $_GET['nd'];											
			 $yf = $_GET['yf'];	
			 ?>
			<div class="col-sm-12">
			     <div class="box box-primary">
			         <div class="panel-body form-horizontal">					
						<form method="get" action="data_byxm_php.php" id="Form">
			              <fieldset>
			                  <div class="form-group">	  
													    <!-- <div class="col-sm-2" style="width:274px"></div> -->
			              		  <div class="col-sm-2" style="width:106px">
			              			  <span class="form-control" style="border:0px;">
			              				  项目名称
			              			  </span>
			              		  </div>
			              		  <div class="col-sm-2">
			              			  <input type="text" id="xmmc" class="form-control" name="xmmc" value="<?php echo $xmmc;?>">
			              		  </div>
									<!-- <div class="col-sm-1"></div>							   -->
			              		 <div class="col-sm-2" style="width:106px">
									<span class="form-control" style="border:0px;">
			              		           项目编号
			              		       </span>
			              		   </div>		              		 
			              		   <div class="col-sm-2">
			              		       <input type="text" id="xmbh" class="form-control" name="xmbh" value="<?php echo $xmbh;?>">
			              		   </div>
								   <!-- <div class="col-sm-1"></div> -->
								   <div class="col-sm-2" style="width:106px">
								   									<span class="form-control" style="border:0px;">
								             联系人
								         </span>
								     </div>		              		 
								     <div class="col-sm-2">
								         <input type="text" id="lxr" class="form-control" name="lxr" value="<?php echo $lxr;?>">
								     </div>
									 <!-- <div class="col-sm-1"></div> -->
									 <div class="col-sm-2" style="width:106px">
									 	<span class="form-control" style="border:0px;">
									           部门
									    </span>
									   </div>		              		 
									   <div class="col-sm-2">
									     <div style="padding:5px ;position:relative;width: 100%;height: 100%;" class="col-sm-4">
									         <span style="top:5px;overflow:hidden;width:95%;height:32px;">
									             <!--这个是个多选框，用onchange事件的时候 ，将这个select的id传进去-->
									                    <select name="trains" οnchange="qlcTrainS('qlc_zdz1')" class="form-control" id="qlc_zdz1" style="height:36px;outline:0;margin-top: -5px;">
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
									                   <input type="text" name="dept" id="dept" class="form-control" autocomplete='off' placeholder="" style="width:100%;height:32px;border:0px;border-radius:5px;outline:0;margin-left: 1px;color: black;margin-top: -6px;">
									         </span>
									     </div>
									   </div>
			                  </div>
						
			              </fieldset>
						 <!-- <fieldset>
						      <div class="form-group">	                           
						  		  <div class="col-sm-2" style="width:106px">
						  			  <span class="form-control" style="border:0px;">
						  				  年度
						  			  </span>
						  		  </div>
						  		  <div class="col-sm-2">
						  			  <input type="text" id="nd" class="form-control" name="nd" value="<?php echo $nd;?>">
						  		  </div>
						  									<div class="col-sm-1"></div>							   
						  		 <div class="col-sm-2" style="width:106px">
						  									<span class="form-control" style="border:0px;">
						  		           月份
						  		       </span>
						  		   </div>		              		 
						  		   <div class="col-sm-2">
						  		       <input type="text" id="yf" class="form-control" name="yf" value="<?php echo $yf;?>">
						  		   </div>
						      </div>	    
						  </fieldset> -->
			              <fieldset>
			                  <div class="form-group">
			                      <div style="float: right;">
									  <button type="button" id="button" style="background-color: #428BCA !important;border-color: #428BCA;border: 5px solid #FF" class="btn btn-primary" ><span class="fa fa-search" style="border: 5px solid #FF"></span>&nbsp;查询</button>		
									<a href="javascript:;" id="export" title="导出查询数据" onclick="excel()" class=" l-btn l-btn-small l-btn-plain"  group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">导出查询</span><span class="l-btn-icon icon-export">&nbsp;</span></span></a>								
									<a href="data.php" id="exit" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" ><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">按时间查看</span><span class="l-btn-icon icon-exit">&nbsp;</span></span></a>
									 <a href="javascript:;" title="刷新" onclick="ifram()" class="l-btn l-btn-small l-btn-plain" group="" id="onload"><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">刷新</span><span class="l-btn-icon pagination-load">&nbsp;</span></span></a>																	 	 
								  </div>			                  							  							 							  
							  </div>
							  </div>
			              </fieldset>				
			         </div>
			     </div>
				 <div style="display: ;" id='table_xmbh'>
		<table style="word-break:break-all; word-wrap:break-all;" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%"id="tb_user" >
					<thead>
					  <tr style="background-color:#438eb9;color: #FFF;">
						<th class="tr-th" style="text-align:center;padding:10px">项目名称</th>
						<th class="tr-th" style="text-align:center;padding:10px">项目编号</th>
						<th class="tr-th" style="text-align:center;padding:10px">收入总额</th>
						<th class="tr-th" style="text-align:center;padding:10px">已收款</th>
						<th class="tr-th" style="text-align:center;padding:10px">收入比例</th>
						<th class="tr-th" style="text-align:center;padding:10px">支出总额</th>
						<th class="tr-th" style="text-align:center;padding:10px">已支出</th>
						<th class="tr-th" style="text-align:center;padding:10px">支出比例</th>
						<th class="tr-th" style="text-align:center;">收入税额</th>
						<th class="tr-th" style="text-align:center;">支出零星税额</th>
						<th class="tr-th" style="text-align:center;padding:10px">项目汇总</th>
						<th class="tr-th" style="text-align:center;padding:10px">比例比较</th>
						 <!-- <th class="tr-th" style="text-align:center;">操作</th> -->
					  </tr>
				    </thead>
				<tr>
					<td colspan='10' style="text-align:center;">表中无数据存在！</td>
				</tr>
				</table>
			</div>
				<table style="word-break:break-all; word-wrap:break-all;display: ;" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%"id="tb_lxr" >
							<thead>
							  <tr style="background-color:#438eb9;color: #FFF;">
								<!-- <th class="tr-th" style="text-align:center;padding:10px">项目名称</th> -->
								<th class="tr-th" style="text-align:center;padding:10px">联系人</th>
								<th class="tr-th" style="text-align:center;padding:10px">收入总额</th>
								<th class="tr-th" style="text-align:center;padding:10px">已收款</th>
								<th class="tr-th" style="text-align:center;padding:10px">收入比例</th>
								<th class="tr-th" style="text-align:center;padding:10px">支出总额</th>
								<th class="tr-th" style="text-align:center;padding:10px">已支出</th>
								<th class="tr-th" style="text-align:center;padding:10px">支出比例</th>
								<th class="tr-th" style="text-align:center;">收入税额</th>
								<th class="tr-th" style="text-align:center;">支出零星税额</th>
								<th class="tr-th" style="text-align:center;padding:10px">项目汇总</th>
								<th class="tr-th" style="text-align:center;padding:10px">比例比较</th>
								 <!-- <th class="tr-th" style="text-align:center;">操作</th> -->
							  </tr>
						    </thead>
						<tr>
							<td colspan='10' style="text-align:center;">表中无数据存在！</td>
						</tr>
						</table>
						<table style="word-break:break-all; word-wrap:break-all;" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%"id="tb_dept" >
									<thead>
									  <tr style="background-color:#438eb9;color: #FFF;">
										<!-- <th class="tr-th" style="text-align:center;padding:10px">项目名称</th> -->
										<th class="tr-th" style="text-align:center;padding:10px">部门</th>
										<th class="tr-th" style="text-align:center;padding:10px">收入总额</th>
										<th class="tr-th" style="text-align:center;padding:10px">已收款</th>
										<th class="tr-th" style="text-align:center;padding:10px">收入比例</th>
										<th class="tr-th" style="text-align:center;padding:10px">支出总额</th>
										<th class="tr-th" style="text-align:center;padding:10px">已支出</th>
										<th class="tr-th" style="text-align:center;padding:10px">支出比例</th>
										<th class="tr-th" style="text-align:center;">收入税额</th>
										<th class="tr-th" style="text-align:center;">支出零星税额</th>
										<th class="tr-th" style="text-align:center;padding:10px">项目汇总</th>
										<th class="tr-th" style="text-align:center;padding:10px">比例比较</th>
										 <!-- <th class="tr-th" style="text-align:center;">操作</th> -->
									  </tr>
								    </thead>
								<tr>
									<td colspan='10' style="text-align:center;">表中无数据存在！</td>
								</tr>
								</table>
				<div style="display: ;" >
				<center><h2 style='font-size:25px;text-align:center'>项目收支详细表</h2></center>
				<table id="dg" style="word-break:break-all; word-wrap:break-all;" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<!-- <caption style='font-size:25px;text-align:center'>项目收支详细表</caption> -->
								<thead>
								  <tr style="background-color:#438eb9;color: #FFF;">
									<th class="tr-th" style="text-align:center;padding:10px">项目名称</th>				
				<!-- 					<th class="tr-th" style="text-align:center;">部门</th> -->
									<th class="tr-th" style="text-align:center;padding:10px">合同类型</th>
									<th class="tr-th" style="text-align:center;padding:10px">合同编号</th>
									<th class="tr-th" style="text-align:center;padding:10px">项目编号</th>
									<th class="tr-th" style="text-align:center;padding:10px">对应单位</th>
									<th class="tr-th" style="text-align:center;padding:10px">合同名称</th>
									<th class="tr-th" style="text-align:center;padding:10px">联系人</th>
									<th class="tr-th" style="text-align:center;padding:10px">部门</th>
				<!-- 					<th class="tr-th" style="text-align:center;">开始时间</th>
									<th class="tr-th" style="text-align:center;">结束时间</th> -->
									<th class="tr-th" style="text-align:center;padding:10px">合同总额</th>
									<th class="tr-th" style="text-align:center;padding:10px">已收款</th>
									<th class="tr-th" style="text-align:center;padding:10px">应收款</th>
									<th class="tr-th" style="text-align:center;padding:10px">支出总额</th>
									 <th class="tr-th" style="text-align:center;padding:10px">已付款</th>
									 <th class="tr-th" style="text-align:center;padding:10px">未付款</th>					 
									 <!-- <th class="tr-th" style="text-align:center;">零星采购</th>					 -->
									 <!-- <th class="tr-th" style="text-align:center;padding:10px">备注</th>													 -->
								  </tr>
					            </thead>
								<tr>
									<td colspan='10' style="text-align:center;">表中无数据存在！</td>
								</tr>
								</table>
								<center><h2 style='font-size:25px;text-align:center'>项目零星采购详细表</h2></center>
								<table id="lxcg" style="word-break:break-all; word-wrap:break-all;" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
									  <tr style="background-color:#438eb9;color: #FFF;">
										<!-- <th class="tr-th" style="text-align:center;">序号</th> -->
										<th class="tr-th" style="text-align:center;padding:10px;">年度</th>
										<!-- <th class="tr-th" style="text-align:center;padding:10px">月份</th>			 -->
										<th class="tr-th" style="text-align:center;padding:10px">项目编号</th>
										<th class="tr-th" style="text-align:center;padding:10px">项目名称</th>
										<th class="tr-th" style="text-align:center;padding:10px">收款人</th>
										<!-- <th class="tr-th" style="text-align:center;padding:10px">合同名称</th> -->
										<!-- <th class="tr-th" style="text-align:center;padding:10px">联系人</th> -->
										<th class="tr-th" style="text-align:center;padding:10px">付款金额</th>
										<th class="tr-th" style="text-align:center;padding:10px">付款时间</th>
										<th class="tr-th" style="text-align:center;padding:10px">凭证号</th>
										<th class="tr-th" style="text-align:center;padding:10px">摘要</th>
										<!-- <th class="tr-th" style="text-align:center;padding:10px">操作</th> -->
										</tr>
									</thead>
									<tr>
										<td colspan='8' style="text-align:center;">表中无数据存在！</td>
									</tr>
									</table>
				</div>
				<!-- <script src="Content/jquery-1.10.2.min.js"></script> -->
				<script src="Content/bootstrap/js/bootstrap.min.js"></script>
				<script src="Content/bootstrap-table/bootstrap-table.min.js"></script>
				<script src="Content/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
				<!-- <script src="Content/bootstrap-table/extensions/fixed-column/bootstrap-table-fixed-columns.js"></script>
				<script type="text/javascript" src="Content/bootstrap-table/extensions/resizable/bootstrap-table-resizable.js"></script> -->
			<script type="text/javascript" src="js/colResizable-1.6.js"></script>
				</body>
				<script>
				    <!--将select的值赋给input框-->
				   $('#qlc_zdz1').on('change', function(){
				   	// alert(this.value); //or alert($(this).val());
				   	document.getElementById("dept").value =this.value;
				   });
				 
				</script>
				<script>
					window.onload=function(){
					var xmmc = $("#xmmc").val();
					var xmbh = $("#xmbh").val();
					var lxr = $("#lxr").val();
					var dept = $("#dept").val();
					if(lxr==''){
						document.getElementById('tb_lxr').style.display="none";
					}
					}
				</script>
				<script>
					
					window.onload=function(){
					document.getElementById("button").click();
					
					}
				//do sarch-------------------------------------总表--------------------------------------
				$("#button").click(function(){
					 $('#tb_user').bootstrapTable('destroy'); //动态加载表格之前，先销毁表格
						var xmmc = $("#xmmc").val();
						var xmbh = $("#xmbh").val();
						var lxr = $("#lxr").val();
						var dept = $("#dept").val();
						var search= "xmmc=" + xmmc + "&xmbh=" + xmbh+"&lxr="+lxr+"&dept="+dept ;
							$.ajax({
						
							type:"post",
							
							url:"data_byxm.php",
				
							data: search,//提交到demo.php的数据
							 cache: false,   
				
							// error:function()
							
							// {alert("错误 !")},
							
							success:function(msg){
											// console.log(msg); 
											// alert(msg);
											var   data = eval("("+msg+")"); //将返回的json数据进解析，并赋给data									
												
												$('#tb_user').bootstrapTable({
												                    data: data,                         //直接从本地数据初始化表格
												                    method: 'get',                      //请求方式（*）
												                    toolbar: '#toolbar',                //工具按钮用哪个容器
																	 // theadClasses: "thead-blue",//设置thead-blue为表头样式
												                    striped: true,                      //是否显示行间隔色
												                    cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
												                    pagination: true,                   //是否显示分页（*）
												                    sortable: true,                     //是否启用排序
																	sort: 'xmbh', //要排序的字段
												                    sortOrder: "desc",                   //排序方式 倒序
												                    queryParams: function (params) {
												                        return params;
												                    },                                  //传递参数（*）
												                    sidePagination: "client",           //分页方式：client客户端分页，server服务端分页（*）
												                    pageNumber: 1,                      //初始化加载第一页，默认第一页
												                    pageSize: 5,                       //每页的记录行数（*）
												                    pageList: [5,10,20],        //可供选择的每页的行数（*）
																	paginationPreText:"上一页",
																	paginationNextText:"下一页",
																	resizable: true,
												                    // search: true,                       //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
												                    strictSearch: true,
												                    showColumns: true,                  //是否显示所有的列
												
												                    // showRefresh: true,                  //是否显示刷新按钮
												                    minimumCountColumns: 2,             //最少允许的列数
												                    // height:300,
																	
												            selectItemName: 'parentItem',
															 clickToSelect : true, // 是否启用点击选中行
												                    // fixedColumns: true, 				//是否冻结列
												                    // fixedNumber: 10,						//冻结列数
												                    //注册加载子表的事件。注意下这里的三个参数！
												                    onExpandRow: function (index, row, $detail) {
												                        InitSubTable(index, row, $detail);
												                    },
												                    columns: [
																		// {
												      //                   checkbox: true,
																		// visible: true
												      //               },
																	{
												                        field: 'xmmc',
												                        title: '项目名称',
												// width:450
												                        
												                    }, {
												                        field: 'xmbh',
												                        title: '项目编号',
												// width:100
												                        
												                    }, {
												                        field: 'srze',
												                        title: '合同总额',
																		align:'right',
												// width:100
												                        
												                    }, {
												                        field: 'ysk',
												                        title: '已收款',
																		align:'right',
												// width:100
												                    }, {
												                        field: 'srbl',
												                        title: '收入比例',
												// width:100
												                    }, 	{
												                        field: 'zcze',
												                        title: '支出总额',
																		align:'right',
												// width:100
												                    }, {
												                        field: 'yzc',
												                        title: '已支出',
																		align:'right',
												// width:100
												                    }, {
												                        field: 'zcbl',
												                        title: '支出比例',
												// width:100
												                    },{
												                        field: 'srse',
												                        title: '收入税额',
																		align:'right',
												// width:100
												                    },{
												                        field: 'zlse',
												                        title: '支出零星税额',
																		align:'right',
												// width:100
												                    }, {
												                        field: 'mlr',
												                        title: '项目汇总',
																		align:'right',
												// width:100
												                    }, {
												                        field: 'blbj',
												                        title: '比例比较',
												// width:100
												                    }],
																	formatNoMatches: function () {  //没有匹配的结果
																	            return '无符合条件的记录';
																	           // return "<img src='图片路径' style='设置图片样式'>"
																	  },
																	  onLoadError:function(){
																		  console.info("无数据");
																	  },
												          
				
												                });
																				
											$('#tb_user').colResizable({
											         liveDrag:true,//拖动列时更新表布局
											         gripInnerHtml:"<div class='grip'></div>",
											         draggingClass:"dragging",
											         resizeMode:'overflow',//允许溢出父容器
													partialRefresh:true,  //ajax 的部分页面刷新内部
											     });		
											}
												});
			///////////////////////////////////////////////收支详细表///////////////////////////////////////////////////////////////////////
						$('#dg').bootstrapTable('destroy'); //动态加载表格之前，先销毁表格
												var xmmc = $("#xmmc").val();
												var xmbh = $("#xmbh").val();
												var lxr = $("#lxr").val();
												var dept = $("#dept").val();
												search= "xmmc=" + xmmc + "&xmbh=" + xmbh+"&lxr="+lxr+"&dept="+dept ;
													$.ajax({
												
													type:"post",
													
													url:"data_php.php",
										
													data: search,//提交到demo.php的数据
													 cache: false,   
										
													// error:function()
													
													// {alert("错误 !")},
													
													success:function(msg){
																	// console.log(msg); 
																	// alert(msg);
																	var   data = eval("("+msg+")"); //将返回的json数据进解析，并赋给data									
																		
																		$('#dg').bootstrapTable({
																							data: data,                         //直接从本地数据初始化表格
																							method: 'get',                      //请求方式（*）
																							toolbar: '#toolbar',                //工具按钮用哪个容器
																							 // theadClasses: "thead-blue",//设置thead-blue为表头样式
																							striped: true,                      //是否显示行间隔色
																							cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
																							pagination: true,                   //是否显示分页（*）
																							sortable: true,                     //是否启用排序
																							sort: 'htbh', //要排序的字段
																							sortOrder: "desc",                   //排序方式 倒序
																							queryParams: function (params) {
																								return params;
																							},                                  //传递参数（*）
																							sidePagination: "client",           //分页方式：client客户端分页，server服务端分页（*）
																							pageNumber: 1,                      //初始化加载第一页，默认第一页
																							pageSize: 5,                       //每页的记录行数（*）
																							pageList: [5,10,20],        //可供选择的每页的行数（*）
																							paginationPreText:"上一页",
																							paginationNextText:"下一页",
																		
																							// search: true,                       //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
																							strictSearch: true,
																							showColumns: true,                  //是否显示所有的列
																							resizable: true,
																							// showRefresh: true,                  //是否显示刷新按钮
																							minimumCountColumns: 2,             //最少允许的列数
																							// height:350,
																							
																					selectItemName: 'parentItem',
																					 clickToSelect : true, // 是否启用点击选中行
																							// fixedColumns: true, 				//是否冻结列
																							// fixedNumber: 6,						//冻结列数
																							//注册加载子表的事件。注意下这里的三个参数！
																							onExpandRow: function (index, row, $detail) {
																								InitSubTable(index, row, $detail);
																							},
																							columns: [
																								// {
																			  //                   checkbox: true,
																								// visible: true
																			  //               },
																							{
																								field: 'xmmc',
																								title: '项目名称',
																		// width:300
																								
																							}, {
																								field: 'htlx',
																								title: '合同类型',
																		// width:100
																								
																							},{
																								field: 'htbh',
																								title: '合同编号',
																		// width:100
																								
																							},
																							{
																								field: 'xmbh',
																								title: '项目编号',
																		// width:100
																								
																							},{
																								field: 'dwmc',
																								title: '单位名称',
																		// width:300
																								
																							},{
																								field: 'htmc',
																								title: '合同名称',
																		// width:300
																								
																							},{
																								field: 'lxr',
																								title: '联系人',
																		// width:100
																								},{
																								field: 'dept',
																								title: '部门',
																		// width:100
																								}, {
																								field: 'srze',
																								title: '合同总额',
																								align:'right',
																		// width:100
																								
																							}, {
																								field: 'ysk',
																								title: '已收款',
																								align:'right',
																		// width:100
																							}, {
																								field: 'gsk',
																								title: '应收款',
																								align:'right',
																		// width:100
																							}, 	{
																								field: 'zcze',
																								title: '支出总额',
																								align:'right',
																		// width:100
																							}, {
																								field: 'yfk',
																								title: '已付款',
																								align:'right',
																		// width:100
																							}, {
																								field: 'wfk',
																								title: '未付款',
																								align:'right',
																		// width:100
																							}
																							],
																							formatNoMatches: function () {  //没有匹配的结果
																										return '无符合条件的记录';
																									   // return "<img src='图片路径' style='设置图片样式'>"
																							  },
																							  onLoadError:function(){
																								  console.info("无数据");
																							  },
																							
										
																						});
																										
																	$('#dg').colResizable({
																	         liveDrag:true,//拖动列时更新表布局
																	         gripInnerHtml:"<div class='grip'></div>",
																	         draggingClass:"dragging",
																	         resizeMode:'overflow',//允许溢出父容器
																				partialRefresh:true,  //ajax 的部分页面刷新内部
																	     });
																	}
																		});
			//-----------------------------------------------------------------零星采购表详细------------------------------------------------------
			$('#lxcg').bootstrapTable('destroy'); //动态加载表格之前，先销毁表格
									var xmmc = $("#xmmc").val();
									var xmbh = $("#xmbh").val();
									var lxr = $("#lxr").val();
									var dept = $("#dept").val();
									var search= "xmmc=" + xmmc + "&xmbh=" + xmbh+"&lxr="+lxr+"&dept="+dept ;
										$.ajax({
									
										type:"post",
										
										url:"purchase_php.php",
							
										data: search,//提交到demo.php的数据
										 cache: false,   
							
										// error:function()
										
										// {alert("错误 !")},
										
										success:function(msg){
														// console.log(msg); 
														var   data = eval("("+msg+")"); //将返回的json数据进解析，并赋给data									
															
															$('#lxcg').bootstrapTable({
															                    data: data,                         //直接从本地数据初始化表格
															                    method: 'get',                      //请求方式（*）
															                    toolbar: '#toolbar',                //工具按钮用哪个容器
																				 // theadClasses: "thead-blue",//设置thead-blue为表头样式
															                    striped: true,                      //是否显示行间隔色
															                    cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
															                    pagination: true,                   //是否显示分页（*）
															                    sortable: true,                     //是否启用排序
																				sort: 'xmbh', //要排序的字段
																				sortOrder: "asc",                   //排序方式 desc倒序 asc顺序
																				queryParams: function (params) {
																				    var temp = {
																				               'pageSize' : params.pageSize,
																				               'pageNumber' : params.pageNumber,
																				               'searchText': params.searchText,
																				               'sortName': params.sortName,    //点击字段排序
																				               'sortOrder': params.sortOrder,
																				           };
																				           return temp;
																				},                                  //传递参数（*）
															                    sidePagination: "client",           //分页方式：client客户端分页，server服务端分页（*）
															                    pageNumber: 1,                      //初始化加载第一页，默认第一页
															                    pageSize: 5,                       //每页的记录行数（*）
															                   pageList: [20,50,100],        //可供选择的每页的行数（*）
																				paginationPreText:"上一页",
																				paginationNextText:"下一页",
																					resizable: true,
															                    // search: true,                       //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
															                    strictSearch: true,
															                    showColumns: true,                  //是否显示所有的列
															
															                    // showRefresh: true,                  //是否显示刷新按钮
															                    minimumCountColumns: 2,             //最少允许的列数
															                    // height:370,
																				
															            selectItemName: 'parentItem',
																		 clickToSelect : true, // 是否启用点击选中行
															                    // fixedColumns: true, 				//是否冻结列
															                    // fixedNumber: 6,						//冻结列数
															                    //注册加载子表的事件。注意下这里的三个参数！
															                    onExpandRow: function (index, row, $detail) {
															                        InitSubTable(index, row, $detail);
															                    },
															                    columns: [
																					// {
															      //                   checkbox: true,
																					// visible: true
															      //               },
																				{
															                        field: 'nd',
															                        title: '年度',
															width:60,
															sortable : true
															                        
															                    }, {
															                        field: 'xmbh',
															                        title: '项目编号',
															// width:100
															sortable : true
															                        
															                    }, {
															                        field: 'xmmc',
															                        title: '项目名称',
															// width:300
															                    }, {
															                        field: 'dwmc',
															                        title: '收款人',
															// width:250
															                    }, {
															                        field: 'fkje',
															                        title: '付款金额',
																					align:'right',
															// width:100
															                    }, {
															                        field: 'fksj',
															                        title: '付款时间',
															// width:120
															sortable : true
															                    }, {
															                        field: 'pzh',
															                        title: '凭证号',
															// width:200
															                    }, {
															                        field: 'zy',
															                        title: '摘要',
															// width:200
															                    }],
																				formatNoMatches: function () {  //没有匹配的结果
																				            return '无符合条件的记录';
																				           // return "<img src='图片路径' style='设置图片样式'>"
																				  },
																				  onLoadError:function(){
																					  console.info("无数据");
																				  },
															             
							
															                });
																			$('#lxcg').colResizable({
																			         liveDrag:true,//拖动列时更新表布局
																			         gripInnerHtml:"<div class='grip'></div>",
																			         draggingClass:"dragging",
																			         resizeMode:'overflow',//允许溢出父容器
																					partialRefresh:true,  //ajax 的部分页面刷新内部
																			     });						
														
														}
															});															
							///////////////////////////////////////////////联系人///////////////////////////////////////////////////////////////////////
							if($("#lxr").val()==''){
								document.getElementById('tb_lxr').style.display="none";
								$('#tb_lxr').bootstrapTable('destroy');
								// document.getElementById('table_xmbh').style.display="";
								}
							if($("#lxr").val()!=''){
							document.getElementById('tb_lxr').style.display="";	
							// document.getElementById('table_xmbh').style.display="none";	
							$('#tb_lxr').bootstrapTable('destroy'); //动态加载表格之前，先销毁表格
													var xmmc = $("#xmmc").val();
													var xmbh = $("#xmbh").val();
													var lxr = $("#lxr").val();
													var dept = $("#dept").val();
													var search= "xmmc=" + xmmc + "&xmbh=" + xmbh+"&lxr="+lxr+"&dept="+dept ;
														$.ajax({
													
														type:"post",
														
														url:"data_bylxr.php",
											
														data: search,//提交到demo.php的数据
														 cache: false,   
											
														// error:function()
														
														// {alert("错误 !")},
														
														success:function(msg){
																		// console.log(msg); 
																		// alert(msg);
																		var   data = eval("("+msg+")"); //将返回的json数据进解析，并赋给data									
																			
																			$('#tb_lxr').bootstrapTable({
																			                    data: data,                         //直接从本地数据初始化表格
																			                    method: 'get',                      //请求方式（*）
																			                    toolbar: '#toolbar',                //工具按钮用哪个容器
																								 // theadClasses: "thead-blue",//设置thead-blue为表头样式
																			                    striped: true,                      //是否显示行间隔色
																			                    cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
																			                    pagination: true,                   //是否显示分页（*）
																			                    sortable: true,                     //是否启用排序
																								sort: 'xmbh', //要排序的字段
																			                    sortOrder: "desc",                   //排序方式 倒序
																			                    queryParams: function (params) {
																			                        return params;
																			                    },                                  //传递参数（*）
																			                    sidePagination: "client",           //分页方式：client客户端分页，server服务端分页（*）
																			                    pageNumber: 1,                      //初始化加载第一页，默认第一页
																			                    pageSize: 5,                       //每页的记录行数（*）
																			                    pageList: [5,10,20],        //可供选择的每页的行数（*）
																								paginationPreText:"上一页",
																								paginationNextText:"下一页",
																								resizable: true,
																			                    // search: true,                       //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
																			                    strictSearch: true,
																			                    showColumns: true,                  //是否显示所有的列
																			
																			                    // showRefresh: true,                  //是否显示刷新按钮
																			                    minimumCountColumns: 2,             //最少允许的列数
																			                    // height:300,
																								
																			            selectItemName: 'parentItem',
																						 clickToSelect : true, // 是否启用点击选中行
																			                    // fixedColumns: true, 				//是否冻结列
																			                    // fixedNumber: 10,						//冻结列数
																			                    //注册加载子表的事件。注意下这里的三个参数！
																			                    onExpandRow: function (index, row, $detail) {
																			                        InitSubTable(index, row, $detail);
																			                    },
																			                    columns: [
																									// {
																			      //                   checkbox: true,
																									// visible: true
																			      //               },
																								{
																			                        field: 'lxr',
																			                        title: '联系人',
																			// width:450
																			                        
																			                    }, {
																			                        field: 'srze',
																			                        title: '合同总额',
																									align:'right',
																			// width:100
																			                        
																			                    }, {
																			                        field: 'ysk',
																			                        title: '已收款',
																									align:'right',
																			// width:100
																			                    }, {
																			                        field: 'srbl',
																			                        title: '收入比例',
																			// width:100
																			                    }, 	{
																			                        field: 'zcze',
																			                        title: '支出总额',
																									align:'right',
																			// width:100
																			                    }, {
																			                        field: 'yzc',
																			                        title: '已支出',
																									align:'right',
																			// width:100
																			                    }, {
																			                        field: 'zcbl',
																			                        title: '支出比例',
																			// width:100
																			                    },{
																									field: 'srse',
																									title: '收入税额',
																									align:'right',
																			// width:100
																								},{
																									field: 'zlse',
																									title: '支出零星税额',
																									align:'right',
																			// width:100
																								}, {
																			                        field: 'mlr',
																			                        title: '项目汇总',
																									align:'right',
																			// width:100
																			                    }, {
																			                        field: 'blbj',
																			                        title: '比例比较',
																			// width:100
																			                    }],
																								formatNoMatches: function () {  //没有匹配的结果
																								            return '无符合条件的记录';
																								           // return "<img src='图片路径' style='设置图片样式'>"
																								  },
																								  onLoadError:function(){
																									  console.info("无数据");
																								  },
																			          
											
																			                });
																											
																		$('#tb_lxr').colResizable({
																		         liveDrag:true,//拖动列时更新表布局
																		         gripInnerHtml:"<div class='grip'></div>",
																		         draggingClass:"dragging",
																		         resizeMode:'overflow',//允许溢出父容器
																				partialRefresh:true,  //ajax 的部分页面刷新内部
																		     });		
																		}
																			});
																			}
								///////////////////////////////////////////////部门///////////////////////////////////////////////////////////////////////
								if($("#dept").val()==''){
									document.getElementById('tb_dept').style.display="none";
									$('#tb_dept').bootstrapTable('destroy');
									}
								if($("#dept").val()!=''){
								document.getElementById('tb_dept').style.display="";	
								$('#tb_dept').bootstrapTable('destroy'); //动态加载表格之前，先销毁表格
														var xmmc = $("#xmmc").val();
														var xmbh = $("#xmbh").val();
														var lxr = $("#lxr").val();
														var dept = $("#dept").val();
														var search= "xmmc=" + xmmc + "&xmbh=" + xmbh+"&lxr="+lxr+"&dept="+dept ;
															$.ajax({
														
															type:"post",
															
															url:"data_bydept.php",
												
															data: search,//提交到demo.php的数据
															 cache: false,   
												
															// error:function()
															
															// {alert("错误 !")},
															
															success:function(msg){
																			// console.log(msg); 
																			// alert(msg);
																			var   data = eval("("+msg+")"); //将返回的json数据进解析，并赋给data									
																				
																				$('#tb_dept').bootstrapTable({
																				                    data: data,                         //直接从本地数据初始化表格
																				                    method: 'get',                      //请求方式（*）
																				                    toolbar: '#toolbar',                //工具按钮用哪个容器
																									 // theadClasses: "thead-blue",//设置thead-blue为表头样式
																				                    striped: true,                      //是否显示行间隔色
																				                    cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
																				                    pagination: true,                   //是否显示分页（*）
																				                    sortable: true,                     //是否启用排序
																									sort: 'xmbh', //要排序的字段
																				                    sortOrder: "desc",                   //排序方式 倒序
																				                    queryParams: function (params) {
																				                        return params;
																				                    },                                  //传递参数（*）
																				                    sidePagination: "client",           //分页方式：client客户端分页，server服务端分页（*）
																				                    pageNumber: 1,                      //初始化加载第一页，默认第一页
																				                    pageSize: 5,                       //每页的记录行数（*）
																				                    pageList: [5,10,20],        //可供选择的每页的行数（*）
																									paginationPreText:"上一页",
																									paginationNextText:"下一页",
																									resizable: true,
																				                    // search: true,                       //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
																				                    strictSearch: true,
																				                    showColumns: true,                  //是否显示所有的列
																				
																				                    // showRefresh: true,                  //是否显示刷新按钮
																				                    minimumCountColumns: 2,             //最少允许的列数
																				                    // height:300,
																									
																				            selectItemName: 'parentItem',
																							 clickToSelect : true, // 是否启用点击选中行
																				                    // fixedColumns: true, 				//是否冻结列
																				                    // fixedNumber: 10,						//冻结列数
																				                    //注册加载子表的事件。注意下这里的三个参数！
																				                    onExpandRow: function (index, row, $detail) {
																				                        InitSubTable(index, row, $detail);
																				                    },
																				                    columns: [
																										// {
																				      //                   checkbox: true,
																										// visible: true
																				      //               },
																									{
																				                        field: 'dept',
																				                        title: '部门',
																				// width:450
																				                        
																				                    }, {
																				                        field: 'srze',
																				                        title: '合同总额',
																										align:'right',
																				// width:100
																				                        
																				                    }, {
																				                        field: 'ysk',
																				                        title: '已收款',
																										align:'right',
																				// width:100
																				                    }, {
																				                        field: 'srbl',
																				                        title: '收入比例',
																				// width:100
																				                    }, 	{
																				                        field: 'zcze',
																				                        title: '支出总额',
																										align:'right',
																				// width:100
																				                    }, {
																				                        field: 'yzc',
																				                        title: '已支出',
																										align:'right',
																				// width:100
																				                    }, {
																				                        field: 'zcbl',
																				                        title: '支出比例',
																				// width:100
																				                    },{
																										field: 'srse',
																										title: '收入税额',
																										align:'right',
																				// width:100
																									},{
																										field: 'zlse',
																										title: '支出零星税额',
																										align:'right',
																				// width:100
																									}, {
																				                        field: 'mlr',
																				                        title: '项目汇总',
																										align:'right',
																				// width:100
																				                    }, {
																				                        field: 'blbj',
																				                        title: '比例比较',
																				// width:100
																				                    }],
																									formatNoMatches: function () {  //没有匹配的结果
																									            return '无符合条件的记录';
																									           // return "<img src='图片路径' style='设置图片样式'>"
																									  },
																									  onLoadError:function(){
																										  console.info("无数据");
																									  },
																				          
												
																				                });
																												
																			$('#tb_dept').colResizable({
																			         liveDrag:true,//拖动列时更新表布局
																			         gripInnerHtml:"<div class='grip'></div>",
																			         draggingClass:"dragging",
																			         resizeMode:'overflow',//允许溢出父容器
																					partialRefresh:true,  //ajax 的部分页面刷新内部
																			     });		
																			}
																				});
																				}

								
													
																		
					
						})
				</script>
				<script>
					function ifram(){
						var xmmc = $("#xmmc").val();
						var xmbh = $("#xmbh").val();
						// var dwmc = $("#dwmc").val();
						// var htmc = $("#htmc").val();
						// var htbh = $("#htbh").val();
						// var nd = $("#nd").val();
						// var yf = $("#yf").val();
						window.location.href= "data_byxm_php.php?xmmc=" + xmmc + "&xmbh=" + xmbh ;
					}
				</script>
				<script>
				function excel(){
				
					var xmmc = $("#xmmc").val();
					var xmbh = $("#xmbh").val();
					// var dwmc = $("#dwmc").val();
					// var htmc = $("#htmc").val();
					// var htbh = $("#htbh").val();
					// var nd = $("#nd").val();
					// var yf = $("#yf").val();
					// alert(xmbh);
					var lxr = $("#lxr").val();
					var dept = $("#dept").val();
					window.location.href= "excel_xmmc.php?xmmc=" + xmmc + "&xmbh=" + xmbh+"&lxr="+lxr+"&dept="+dept ;
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
</html>