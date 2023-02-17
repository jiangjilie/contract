<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>合同</title>
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
		<link href="Content/bootstrap-table/extensions/fixed-column/bootstrap-table-fixed-columns.css"  rel="stylesheet" />
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/bootstrap-datepicker.zh-CN.js"></script>
		<script src="js/date.js" type="text/javascript"></script>
		<link href="css/datepicker3.css" rel="stylesheet"/>
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
			height:42px;
			background-color: #438eb9;
			    color: #FFF;
			border: 1px solid #438eb9;
			text-align: center;
		}
		.columns{
			display: none;
		}
		.ace-calendar-picker{
			display: block;
			    width: 100%;
			    height: 34px;
			    padding: 6px 12px;
			    font-size: 16px;
			    line-height: 1.42857143;
			    color: #555;
			    background-color: #fff;
			    background-image: none;
			    border: 1px solid #ccc;
			    border-radius: 4px;
				}
				.fixed-table-container thead th .sortable{
				    background-image:url('images/sort.png');cursor:pointer;background-position:right;background-repeat:no-repeat;padding-right:30px
				    }
				    .fixed-table-container thead th .asc{
				    background-image:url('images/sort_asc.png');cursor:pointer;background-position:right;background-repeat:no-repeat;padding-right:30px
				    }
				    .fixed-table-container thead th .desc{
				    background-image:url('images/sort_desc.png');cursor:pointer;background-position:right;background-repeat:no-repeat;padding-right:30px
				    }
				.l-btn-left-1{
					margin-left:-21px;
					padding:0;
				}
				.dropdown-menu {
					width:92px;
					min-width: 68px;
					padding:0;
				}
				.l-btn-text-1{
					display: inline-block;
					vertical-align: top;
					width: auto;
					line-height: 24px;
					font-size: 12px;
					padding: 0;
					margin-left:4px;
				}
					.datepicker{
						width:16%;
					}
				</style>
	</head>
		<body marginwidth="0" marginheight="0">
			<?php $user = $_GET['user'];
			 $htbh = $_GET['htbh'];
			 $xmbh = $_GET['xmbh'];
			 $xmmc = $_GET['xmmc'];
			 $dwmc = $_GET['dwmc'];
			 $htmc = $_GET['htmc'];
			 $nd = $_GET['nd'];
			 $fkpz = $_GET['fkpz'];
			 ?>
			 <?php $user = $_GET['user']; ?>
			 <input type="text" value="<?php echo $user; ?>" style="display: none;" id="user">
			<div class="col-sm-12">
			     <div class="box box-primary">
			         <div class="panel-body form-horizontal">					
						<form method="get" action="administrative.php" id="Form">
			              <fieldset>
			                  <div class="form-group">	                           
			              		  <div class="col-sm-2" style="width:106px">
			              			  <span class="form-control" style="border:0px;">
			              				  合同编号
			              			  </span>
			              		  </div>
			              		  <div class="col-sm-2">
			              			  <input type="text" id="htbh" class="form-control" name="htbh" value="<?php echo $htbh;?>">
			              		  </div>
								  <div class="col-sm-1"></div>
								  <div class="col-sm-2" style="width:106px">
								  	<span class="form-control" style="border:0px;">
								  		合同名称
								  	</span>
								  </div>			                     
								  <div class="col-sm-2">
								  	<input type="text" id="htmc" class="form-control" name="htmc" value="<?php echo $htmc;?>">
								  </div>
									<div class="col-sm-1"></div>							   			        	            
			                     <div class="col-sm-2" style="width:106px">
									<span class="form-control" style="border:0px;">
			                             对方单位
			                          </span>
			                      </div>			                     
			                      <div class="col-sm-2">
			                          <input type="text" id="dwmc" class="form-control" name="dwmc" value="<?php echo $dwmc;?>">
			                      </div>
								  </div>
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
								 <!--  <div class="col-sm-2" style="width:106px">
										<span class="form-control" style="border:0px;">
								           月份
								        </span>
								    </div>			                     
								    <div class="col-sm-2">
								        <input type="text" id="fkpz" class="form-control" name="fkpz" value="<?php echo $fkpz;?>">
								    </div> -->
									<div class="col-sm-2" style="width:106px">
										<span class="form-control" style="border:0px;">
									       开始时间
									     </span>
									 </div>			                     
									 <div class="col-sm-2">
										 <span class="ace-calendar-picker" style="width:100%;">
										 				<div>
										 					<input  id="begin" value="<?php echo $begin;?>"placeholder="" name="begin" autocomplete='off' type="text" class="ace-calendar-picker-input ace-input"style="width: 100%;height: 60%;color:black;border:0">
										 					<span class="ace-calendar-picker-icon">							
										 					</span>
										 					</div>
										 					</span>
									
									 </div>
									 <div class="col-sm-1"></div>
									 <div class="col-sm-2" style="width:106px">
									 	<span class="form-control" style="border:0px;">
									        结束时间
									      </span>
									  </div>			                     
									  <div class="col-sm-2">
										  <span class="ace-calendar-picker" style="width:100%;">
										  				<div>
										  					<input  id="finish" value="<?php echo $finish;?>"placeholder="" name="finish" autocomplete='off' type="text" class="ace-calendar-picker-input ace-input"style="width: 100%;height: 60%;color:black;border:0">
										  					<span class="ace-calendar-picker-icon">							
										  					</span>
										  					</div>
										  					</span>
									   
									  </div>
									</div>
										<div class="form-group">
										<div class="col-sm-2" style="width:106px">
											<span class="form-control" style="border:0px;">
										       付款凭证
										     </span>
										 </div>			                     
										 <div class="col-sm-2">
										     <input type="text" id="fkpz" class="form-control" name="fkpz" value="<?php echo $fkpz;?>">
										 </div>
										 </div>
										    
			              </fieldset>
			              <fieldset>
			                  <div class="form-group">
			                      <div style="float: right;">
									   <button type="button"  style="background-color: #428BCA !important;border-color: #428BCA;border: 5px solid #FF" class="btn btn-primary" id="button";"><span class="fa fa-search" style="border: 5px solid #FF"></span>&nbsp;查询</button>		
									 <a href="javascript:;" id="add" title="添加行政合同信息" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-add" plain="true" group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">添加行政</span><span class="l-btn-icon icon-add">&nbsp;</span></span></a>									
									<a href="javascript:;" id="import" title="点击导入记录" onclick="inportExcel()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-import" plain="true" group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">导入行政</span><span class="l-btn-icon icon-import">&nbsp;</span></span></a>
									<a href="javascript:;" onclick="up_image()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-up" plain="true" group="" ><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">上传图片</span><span class="l-btn-icon icon-up">&nbsp;</span></span></a>
								<div class="btn-group dropup">
										<button type="button" class="btn btn-default dropdown-toggle" style="width:91px;text-align:right;border:0;font-size:12px;color:blue"data-toggle="dropdown"style='color:blue;'>导出数据<span class="l-btn-icon icon-export" style="margin-left:-72px;">&nbsp;</span> 
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li ><a href="javascript:;"  title="批量导出简略数据" id="excel_select" class=" l-btn l-btn-small l-btn-plain"  group=""><span class="l-btn-left-1 l-btn-icon-left"><span class="l-btn-text-1">导出选中台账</span></span></a></li>
											<li ><a href="javascript:;"  title="批量导出详细数据" id="excel_select_detail" class=" l-btn l-btn-small l-btn-plain"  group=""><span class="l-btn-left-1 l-btn-icon-left"><span class="l-btn-text-1">导出选中明细</span></span></a></li>
											<li class="divider"></li>
											<li ><a href="javascript:;"  title="批量导出简略数据" onclick="excel()" class=" l-btn l-btn-small l-btn-plain"  group=""><span class="l-btn-left-1 l-btn-icon-left"><span class="l-btn-text-1">导出查询台账</span></span></a></li>							
											<li><a href="javascript:;"   title="批量导出详细数据" onclick="excel_detail()" class=" l-btn l-btn-small l-btn-plain"  group=""><span class="l-btn-left-1 l-btn-icon-left"><span class="l-btn-text-1">导出查询明细</span></span></a></li>
										</ul>
									</div>
								<div class="btn-group dropup">
										<button type="button" class="btn btn-default dropdown-toggle" style="width:91px;text-align:right;border:0;font-size:12px;color:blue"data-toggle="dropdown"style='color:blue;'>批量删除<span class="l-btn-icon icon-cancel"style="margin-left:-72px;">&nbsp;</span>
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li ><a href="javascript:;"title="清空数据库"onclick="del()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-cancel" plain="true" group="" id=""><span class="l-btn-left-1 l-btn-icon-left"><span class="l-btn-text-1">删除查询数据</span></span></a></li>
											<!-- <li class="divider"></li> -->
											<li><a href="javascript:;"title="删除选中" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-cancel" plain="true" group="" id="remove"><span class="l-btn-left-1 l-btn-icon-left"><span class="l-btn-text-1">删除选中数据</span></span></a></li>
										</ul>
									</div>
									<!-- <a href="javascript:;" title="刷新" onclick="ifram()" class="l-btn l-btn-small l-btn-plain" group="" id="onload"><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">刷新</span><span class="l-btn-icon pagination-load">&nbsp;</span></span></a>								 -->
																	  									  					  
								  </div>			                  							  							 
							  </div>
							  </div>
			              </fieldset>				
			         </div>
			     </div>
			<table style="word-break:break-all; word-wrap:break-all;" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%"id="tb_user" >
				<thead>
				  <tr style="background-color:#438eb9;color: #FFF;">
					<th class="tr-th" style="text-align:center;padding:10px;">年度</th>
					<th class="tr-th" style="text-align:center;padding:10px;">合同编号</th>
					<th class="tr-th" style="text-align:center;padding:10px;">合同名称</th>
					<th class="tr-th" style="text-align:center;padding:10px;">对方单位</th>
					<th class="tr-th" style="text-align:center;padding:10px;">签订时间</th>
					<th class="tr-th" style="text-align:center;padding:10px;">联系人</th>
					<th class="tr-th" style="text-align:center;padding:10px;">合同金额</th>
					<th class="tr-th" style="text-align:center;padding:10px;">已付款</th>
					<th class="tr-th" style="text-align:center;padding:10px;">未付款</th>
					<th class="tr-th" style="text-align:center;padding:10px;">付款凭证</th>
					<!-- <th class="tr-th" style="text-align:center;padding:10px;">备注</th> -->
					 <th class="tr-th" style="text-align:center;padding:10px;">操作</th>
				  </tr>
	           </thead>
	           <tr>
	           	<td colspan='12' style="text-align:center;">表中无数据存在！</td>
	           </tr>
	           </table>
				<!-- <script src="Content/jquery-1.10.2.min.js"></script> -->
				<script src="Content/bootstrap/js/bootstrap.min.js"></script>
				<script src="Content/bootstrap-table/bootstrap-table.min.js"></script>
				<script src="Content/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
				<!-- <script src="Content/bootstrap-table/extensions/fixed-column/bootstrap-table-fixed-columns.js"></script>
				<script type="text/javascript" src="Content/bootstrap-table/extensions/resizable/bootstrap-table-resizable.js"></script> -->
				<script type="text/javascript" src="Content/bootstrap-table/extensions/resizable/colResizable-1.6.js"></script>
				</body>
				<script>
					window.onload=function(){
					document.getElementById("button").click();
					
					}
					
					$("#add").click(function(){
						var user=$("#user").val();
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
							 area: ['1500px', '600px'],
							 // skin: 'layui-layer-demo',
							 closeBtn: 1,
							 anim: 2,
							 content: "administrative_luru.php?user="+user,
							  // btn: ["", "取消"],
							 
							 end:function(){
					  window.location.reload();//刷新父页面
							 },
								 });
						})
				//do sarch-------
				$("#button").click(function(){
					 $('#tb_user').bootstrapTable('destroy'); //动态加载表格之前，先销毁表格
						var dwmc = $("#dwmc").val();
						var htmc = $("#htmc").val();
						var htbh = $("#htbh").val();
						var nd = $("#nd").val();
						var fkpz = $("#fkpz").val();
						var begin = $("#begin").val();
						var finish = $("#finish").val();
						var search= "dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&nd=" + nd + "&begin=" + begin + "&finish=" + finish+ "&fkpz=" + fkpz ; 
							$.ajax({
						
							type:"post",
							
							url:"administrative_php.php",
				
							data: search,//提交到demo.php的数据
							 cache: false,   
				
							// error:function()
							
							// {alert("错误 !")},
							
							success:function(msg){
											// console.log(msg); 
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
																	sort: 'htbh', //要排序的字段
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
												                    // height:400,
																	
												            selectItemName: 'parentItem',
															 clickToSelect : true, // 是否启用点击选中行
												                    // fixedColumns: true, 				//是否冻结列
												                    // fixedNumber: 6,						//冻结列数
												                    //注册加载子表的事件。注意下这里的三个参数！
												                    onExpandRow: function (index, row, $detail) {
												                        InitSubTable(index, row, $detail);
												                    },
												                    columns: [
																		{
												                        checkbox: true,
																		visible: true
												                    },
																	{
												                        field: 'nd',
												                        title: '年度',
												width:60,
												sortable : true
												                        
												                    }, {
												                        field: 'htbh',
												                        title: '合同编号',
												// width:100
												sortable : true
												                        
												                    }, {
												                        field: 'htmc',
												                        title: '合同名称',
												// width:200
												                        
												                    }, {
												                        field: 'dwmc',
												                        title: '单位名称',
												// width:200
												                    }, {
												                        field: 'qdsj',
												                        title: '签订时间',
												// width:100
												sortable : true
												                    }, 	{
												                        field: 'lxr',
												                        title: '联系人',
												// width:100
												                    }, {
												                        field: 'htje',
												                        title: '合同金额',
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
												// width:120
												                    }, {
												                        field: 'fkpz',
												                        title: '付款凭证',
												// width:200
												                    },{
												                        title: '操作',
												width:100,
												                        formatter: function (value, row, index) {//这里的三个参数：value表示当前行当前列的值；row表示当前行的数据；index表示当前行的索引（从0开始）。
																			var html = '<div style="/* text-align:center; */height:auto;" class="datagrid-cell datagrid-cell-c8-edit">'+
																			'<img class="GridTopImg" title="点击编辑修改条记录" onclick="ShowEdit('+row.id+')" src="images/Edit.png">'+
																			'<a href="javascript:;" onclick="ShowImg(\''+row.xmbh+'\',\''+row.xmmc+'\',\''+row.dwmc+'\',\''+row.htmc+'\',\''+row.lxr+'\',\''+row.fksj+'\')" title="查看图片" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" ><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text"></span><span class="l-btn-icon icon-search">&nbsp;</span></span></a>'+
																			'<img title="点击删除该条记录" class="GridTopImg" onclick="ShowDel('+row.id+')" src="images/DelBtn.png"></div>';
												                            return html;
												                        },
																		
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
											
												})
												// 删除按钮事件
												$("#remove").on("click", function() {
												    var rows = $("#tb_user").bootstrapTable('getSelections');// 获得要删除的数据
												    if (rows.length == 0) {// rows 主要是为了判断是否选中，下面的else内容才是主要
														layer.alert('请先选择要删除的记录!', {
														icon: 5,
														title: '提示'
														});
												        return;
												    } else {
												        var ids = new Array();// 声明一个数组
												        $(rows).each(function() {// 通过获得别选中的来进行遍历
												            ids.push(this.id);// cid为获得到的整条数据中的一列
												        });
												        deleteMs(ids)
												    }
												})
												function deleteMs(ids) {
													layer.alert('是否确定删除所选数据', {
													icon: 3,
													title: '提示',
													 btn: ['确定', '取消'],
													 yes:function(){
														$.ajax({
														    url : 'administrative_delete_batch.php',
														    // data : "id=" + ids,
														    data : "id=" + ids,
														    type : "post",
															// processData: false,  // 告诉jQuery不要去处理发送的数据
															// contentType: false,// 告诉jQuery不要去设置Content-Type请求头 
														    // dataType : "json",
														    success :  function (data) {
																		 layer.alert('删除成功！', {
																		 icon: 1,   
																		 title: '提示',
																		 end:function(){
																			document.getElementById("button").click();
																			// window.location.reload();//刷新父页面
																			layer.closeAll(); //关闭所有layer
																		 },
																		 });
																		 // alert(data);
																	 },
														});
															},
													end:function (){
														window.close();
																				
																				 
													},
													});
												   
												}
												// 导出选中简略按钮事件
												$("#excel_select").on("click", function() {
												    var rows = $("#tb_user").bootstrapTable('getSelections');// 获得要删除的数据
												    if (rows.length == 0) {// rows 主要是为了判断是否选中，下面的else内容才是主要
														layer.alert('请先选择要导出的数据!', {
														icon: 5,
														title: '提示'
														});
												        return;
												    } else {
												        var ids = new Array();// 声明一个数组
												        $(rows).each(function() {// 通过获得别选中的来进行遍历
												            ids.push(this.id);// cid为获得到的整条数据中的一列
												        });
												        excel_select(ids)
												    }
												})
												function excel_select(ids) {
													window.location.href= "excel_administrative_select.php?id=" + ids ;
															}
															
												// 导出选中详细按钮事件
												$("#excel_select_detail").on("click", function() {
												    var rows = $("#tb_user").bootstrapTable('getSelections');// 获得要删除的数据
												    if (rows.length == 0) {// rows 主要是为了判断是否选中，下面的else内容才是主要
														layer.alert('请先选择要导出的数据!', {
														icon: 5,
														title: '提示'
														});
												        return;
												    } else {
												        var ids = new Array();// 声明一个数组
												        $(rows).each(function() {// 通过获得别选中的来进行遍历
												            ids.push(this.id);// cid为获得到的整条数据中的一列
												        });
												        excel_select_detail(ids)
												    }
												})
												function excel_select_detail(ids) {
													window.location.href= "excel_administrative_detail_select.php?id=" + ids ;
															}
					</script>
						<script>
						//修改
							function ShowEdit(id){
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
									 area: ['1500px', '500px'],
									 // skin: 'layui-layer-demo',
									 closeBtn: 1,
									 anim: 2,
									 content: "administrative_change.php?id=" + id ,
									  // btn: ["", "取消"],
									 
									 end:function(){
										 // document.getElementById("button").click();
										  // window.location.reload();//刷新父页面
								var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
								parent.layer.close(index); //再执行关闭
										
									 },
										 });
								//  window.location.href="administrative_change.php?user=<?php echo $user;?>&id=" + id + "&ysk=" + ysk;
								}
								
					function ShowDel(id) {	
					var delid= "id=" + id;
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
							 var delid= "id=" + id;
							 $.ajax({
								type:"post",
								url:"administrative_delete.php",
								data: delid,
								cache: false,
								success: function (data) {
									 layer.alert('删除成功！', {
									 icon: 1,   
									 title: '提示',
									 end:function(){
										document.getElementById("button").click();
										// window.location.reload();//刷新父页面
										layer.closeAll(); //关闭所有layer
									 },
									 });
								 },
							 });										 																	                 
						                 },
						});
					}						
	
					function del() {
						// var xmmc = $("#xmmc").val();
						// var xmbh = $("#xmbh").val();
						var dwmc = $("#dwmc").val();
						var htmc = $("#htmc").val();
						var htbh = $("#htbh").val();
						var nd = $("#nd").val();
						var fkpz = $("#fkpz").val();
						 if(htbh=="" &&   dwmc=="" && htmc=="" && nd=="" && fkpz==""){
								layer.open({
								 type: 2,
								  title:'<center><h3> 提示</center>',
								 area: ['500px', '400px'],
								 skin: 'layui-layer-demo',
								 closeBtn: 1,
								 anim: 2,
								 offset:'t',  //设置弹出位置
								 shadeClose: true,
								 content: 'delete_administrative.php?dwmc=' + dwmc + '&htmc=' + htmc + '&htbh=' + htbh + '&nd=' + nd + '&fkpz=' + fkpz,
								 success: function (layero, index) {
								                         },
								 btn: ["确定", "取消"],
								 yes: function (index, layero) {
									 var thisIndex = index;
									
									   layer.confirm('<h4 style="color:red;padding:5px5px;magin:2px;">警告：真的确定清空表中所有数据吗</h4></center>', { icon: 5, title: '提示' }, function (index) {
											window.location.href= "delete_administrative_php.php?&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&nd=" + nd + "&fkpz=" + fkpz ;										                                									                 
																																});
																},//layer嵌套  *****重要
											});
											}else{
												layer.open({
												 type: 2,
												  title:'<center><h3> 提示</center>',
												 area: ['500px', '400px'],
												 skin: 'layui-layer-demo',
												 closeBtn: 1,
												 anim: 2,
												 offset:'t',  //设置弹出位置
												 shadeClose: true,
												 content: 'delete_administrative.php?&dwmc=' + dwmc + '&htmc=' + htmc + '&htbh=' + htbh + '&nd=' + nd + '&fkpz=' + fkpz,
												 success: function (layero, index) {
												                         },
												 btn: ["确定", "取消"],
												 yes: function (index, layero) {
													 var thisIndex = index;
													
													  layer.confirm('确定删除所选数据吗', { icon: 2, title: '提示' }, function (index) {
															window.location.href= "delete_administrative_php.php?&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&nd=" + nd + "&fkpz=" + fkpz ;										                                									                 
																																				});
																				},//layer嵌套  *****重要
															});
												
											}
							}			
			</script>
	<script>
		function up_image(){
			layer.open({
			 type: 2,
			 title:'<center><h3> 图片上传</center>',
			 // title:false,
			 // maxmin: false,
			 shade: [0.5, '#000'],
			 //配置遮罩层颜色和透明度
			 shadeClose: true,
			 //是否允许点击遮罩层关闭弹窗 true /false
			 //closeBtn:2,
			 // time:1000,  设置自动关闭窗口时间 1秒=1000；
			 shift: 0,
			 //打开效果：0-6 。0放大，1从上到下，2下到上，3左到右放大，4翻滚效果；5渐变；6抖窗口
			 offset:'t',  //设置弹出位置
			 area: ['1000px', '700px'],
			 // skin: 'layui-layer-demo',
			 closeBtn: 1,
			 anim: 2,
			 content: 'up_image.php',
			 end:function(){
				 document.getElementById("button").click();
			var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
			parent.layer.close(index); //再执行关闭
		
			 },
				 });
		}
			function ShowImg(htbh,xmbh,xmmc,dwmc,htmc,lxr,qdsj){
						
						 window.open("image.php?xmmc=" + xmmc + "&xmbh=" + xmbh + "&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&lxr=" + lxr + "&qdsj=" + qdsj,"_blank") ;
						}
		function excel(){
		
			// var xmmc = $("#xmmc").val();
			// var xmbh = $("#xmbh").val();
			var dwmc = $("#dwmc").val();
			var htmc = $("#htmc").val();
			var htbh = $("#htbh").val();
			var nd = $("#nd").val();
			var fkpz = $("#fkpz").val();
			var begin = $("#begin").val();
			var finish = $("#finish").val();
			window.location.href= "excel_administrative.php?&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&nd=" + nd + "&fkpz=" + fkpz + "&begin=" + begin+"&finish=" + finish ;
							//  type: 2,
							//  skin: 'layui-layer-demo',
							//   area: ['1200px', '300px'],
							//  closeBtn: 1,
							//  anim: 2,
							//  shadeClose: true,
							//  content: 'administrative_print.php',
							// });
						}
		function excel_detail(){
			var dwmc = $("#dwmc").val();
			var htmc = $("#htmc").val();
			var htbh = $("#htbh").val();
			var nd = $("#nd").val();
			var fkpz = $("#fkpz").val();
			var begin = $("#begin").val();
			var finish = $("#finish").val();
			window.location.href= "excel_administrative_detail_search.php?&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&nd=" + nd + "&fkpz=" + fkpz + "&begin=" + begin+"&finish=" + finish ;
						}
	</script>
	<script>
		function ifram(){
			// var xmmc = $("#xmmc").val();
			// var xmbh = $("#xmbh").val();
			var dwmc = $("#dwmc").val();
			var htmc = $("#htmc").val();
			var htbh = $("#htbh").val();
			var nd = $("#nd").val();
			var fkpz = $("#fkpz").val();
			window.location.href= "administrative.php?&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&nd=" + nd + "&fkpz=" + fkpz + "";
		}
	</script>
	<script>
	function inportExcel(){		
			layer.open({
			 type: 2,
			title:'<center><h3> 行政合同数据导入</center>',
			 // title:false,
			 // maxmin: false,
			 shade: [0.5, '#000'],
			 //配置遮罩层颜色和透明度
			 shadeClose: true,
			 //是否允许点击遮罩层关闭弹窗 true /false
			 //closeBtn:2,
			 // time:1000,  设置自动关闭窗口时间 1秒=1000；
			 shift: 0,
			 //打开效果：0-6 。0放大，1从上到下，2下到上，3左到右放大，4翻滚效果；5渐变；6抖窗口
			  offset:'t',  //设置弹出位置
			 area: ['1220px', '700px'],
			 skin: 'layui-layer-demo',
			 closeBtn: 1,
			 anim: 2,
			 content: 'up_administrative.php',
			 end:function(){
			 	window.location.href="administrative.php";
			 },
				 });
		}
	</script>
</html>