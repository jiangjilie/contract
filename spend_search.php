<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>支出合同</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<!-- <link href="css/font-awesome.min.css" rel="stylesheet"/>
		<link href="css/font-awesom.min.css" rel="stylesheet"/> -->
		<link href="css/ace-rtl.min.css" rel="stylesheet"/>
		<link href="css/ace-skins.min.css" rel="stylesheet"/>
		<link href="css/common.css" rel="stylesheet"/>
		<link href="css/easyui.css" rel="stylesheet"/>
		<link href="css/icon.css" rel="stylesheet"/>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/Common.js"></script>
		<script src="js/layer/layer.js"></script>
		<link rel="stylesheet" href="css/jquery.treeview.css" type="text/css"/>
		<script src="js/jquery.treeview.js" type="text/javascript"></script>
		<link href="css/scrollbox.css" rel="stylesheet"/>  
		<link href="Content/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="Content/bootstrap-table/bootstrap-table.min.css"  rel="stylesheet" />
		<link href="Content/bootstrap-table/extensions/fixed-column/bootstrap-table-fixed-columns.css"  rel="stylesheet" />
				   <!-- 解决bootstrapTable中的width值设置无效的问题   table-layout:fixed意思是固定的，即width设置为多少bootstrapTable就显示多宽-->
		<style type="text/css">		
		 .table {table-layout:fixed;}    
		</style>
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
		.fixed-table-container thead th .sortable{
		    background-image:url('images/sort.png');cursor:pointer;background-position:right;background-repeat:no-repeat;padding-right:30px
		    }
		    .fixed-table-container thead th .asc{
		    background-image:url('images/sort_asc.png');cursor:pointer;background-position:right;background-repeat:no-repeat;padding-right:30px
		    }
		    .fixed-table-container thead th .desc{
		    background-image:url('images/sort_desc.png');cursor:pointer;background-position:right;background-repeat:no-repeat;padding-right:30px
		    }
		</style>
	</head>
		<body marginwidth="0" marginheight="0">
			<?php $user = $_GET['user']; ?>
			<div class="col-sm-12">
			     <div class="box box-primary">
			         <div class="panel-body form-horizontal">					
						<form method="get" action="spend_php.php" id="Form">
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
			              		           项目编号
			              		       </span>
			              		   </div>		              		 
			              		   <div class="col-sm-2">
			              		       <input type="text" id="xmbh" class="form-control" name="xmbh" value="<?php echo $xmbh;?>">
			              		   </div>
								   <div class="col-sm-1"></div>
			                 
			                     <div class="col-sm-2" style="width:106px">
											<span class="form-control" style="border:0px;">
			                              项目名称
			                          </span>
			                      </div>			      
			                      <div class="col-sm-2">
			                          <input type="text" id="xmmc" class="form-control" name="xmmc" value="<?php echo $xmmc;?>">
			                      </div>
								 </div>
								 <div class="form-group">			            
			                     <div class="col-sm-2" style="width:106px">
									<span class="form-control" style="border:0px;">
			                             乙方单位
			                          </span>
			                      </div>			                     
			                      <div class="col-sm-2">
			                          <input type="text" id="dwmc" class="form-control" name="dwmc" value="<?php echo $dwmc;?>">
			                      </div>
								  <div class="col-sm-1"></div>
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
									 <div class="form-group">
										<div class="col-sm-2" style="width:106px">
											<span class="form-control" style="border:0px;">
												合同名称
											</span>
										</div>			                     
										<div class="col-sm-2">
											<input type="text" id="htmc" class="form-control" name="htmc" value="<?php echo $htmc;?>">
										</div>
									</div>	    
			              </fieldset>
			              <fieldset>
			                  <div class="form-group">
			                      <div  style="float: right;">
									  <button type="button"  style="background-color: #428BCA !important;border-color: #428BCA;border: 5px solid #FF" class="btn btn-primary" id="button";"><span class="fa fa-search" style="border: 5px solid #FF"></span>&nbsp;查询</button>		
									 <!-- <a href="javascript:" id="add" title="添加支出合同信息" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-add" plain="true" group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">添加支出</span><span class="l-btn-icon icon-add">&nbsp;</span></span></a>												 -->
									<!-- <a href="javascript:;" id="import" title="点击导入记录" onclick="inportExcel()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-import" plain="true" group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">导入支出</span><span class="l-btn-icon icon-import">&nbsp;</span></span></a> -->
										<!-- <a href="javascript:;" onclick="up_image()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-up" plain="true" group="" ><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">上传图片</span><span class="l-btn-icon icon-up">&nbsp;</span></span></a> -->
									 <!-- <a href="javascript:;" id="export" title="导出查询数据" onclick="excel()" class=" l-btn l-btn-small l-btn-plain"  group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">导出查询</span><span class="l-btn-icon icon-export">&nbsp;</span></span></a> -->
									 <!-- <a href="javascript:;" onclick="del()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-cancel" plain="true" group="" id=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">批量删除</span><span class="l-btn-icon icon-cancel">&nbsp;</span></span></a> -->
									 	
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
			<th class="tr-th" style="text-align:center;padding:10px">年度</th>
			<th class="tr-th" style="text-align:center;padding:10px">合同编号</th>				
			<th class="tr-th" style="text-align:center;padding:10px">项目编号</th>
			<th class="tr-th" style="text-align:center;padding:10px">项目名称</th>
			<th class="tr-th" style="text-align:center;padding:10px">乙方单位</th>
			<th class="tr-th" style="text-align:center;padding:10px">合同名称</th>
			<th class="tr-th" style="text-align:center;padding:10px">合同类型</th>
			<th class="tr-th" style="text-align:center;padding:10px">联系人</th>
			<th class="tr-th" style="text-align:center;padding:10px">签订时间</th>
			<th class="tr-th" style="text-align:center;padding:10px">合同工期</th>
			<th class="tr-th" style="text-align:center;padding:10px">付款方式</th>
			<th class="tr-th" style="text-align:center;padding:10px">结算方式</th>
			<th class="tr-th" style="text-align:center;padding:10px">合同总额</th>
			<th class="tr-th" style="text-align:center;padding:10px">已付款</th>
			<th class="tr-th" style="text-align:center;padding:10px">应付款</th>
			<th class="tr-th" style="text-align:center;padding:10px">已收票</th>
			<th class="tr-th" style="text-align:center;padding:10px">备注</th>
			 <th class="tr-th" style="text-align:center;padding:10px">操作</th>
		  </tr>
		</thead>
		<tr>
			<td colspan='18' style="text-align:center;">表中无数据存在！</td>
		</tr>
		</table>
		<script src="Content/jquery-1.10.2.min.js"></script>
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
				layer.open({
					 type: 2,
					 // title:'<center><h3> 支出合同修改</center>',
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
					 area: ['1200px', '600px'],
					 // skin: 'layui-layer-demo',
					 closeBtn: 1,
					 anim: 2,
					 content: "spend_luru.php",
					  // btn: ["", "取消"],
					 
					 end:function(){
			  window.location.reload();//刷新父页面
					 },
						 });
				})
		//do sarch-------
		$("#button").click(function(){
			 $('#tb_user').bootstrapTable('destroy'); //动态加载表格之前，先销毁表格
				var xmmc = $("#xmmc").val();
				var xmbh = $("#xmbh").val();
				var dwmc = $("#dwmc").val();
				var htmc = $("#htmc").val();
				var htbh = $("#htbh").val();
				var nd = $("#nd").val();
				var yf = $("#yf").val();
				var search= "xmmc=" + xmmc + "&xmbh=" + xmbh + "&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&nd=" + nd + "&yf=" + yf ;
					$.ajax({
				
					type:"post",
					
					url:"spend_php.php",

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
										                    pageList: [5,10,20],        //可供选择的每页的行数（*）
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
										                        field: 'htbh',
										                        title: '合同编号',
										// width:100
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
										                        title: '单位名称',
										// width:250
										                    }, 	{
										                        field: 'htmc',
										                        title: '合同名称',
										// width:300
										                    }, {
										                        field: 'htlx',
										                        title: '合同类型',
										// width:100
										                    }, {
										                        field: 'lxr',
										                        title: '联系人',
										// width:100
										                    }, {
										                        field: 'qdsj',
										                        title: '签订时间',
										// width:120
										sortable : true
										                    }, {
										                        field: 'htgq',
										                        title: '合同工期',
										// width:100
										                    },{
										                        field: 'fkfs',
										                        title: '付款方式',
										// width:100
										                    },{
										                        field: 'jsfs',
										                        title: '结算方式',
										// width:100
										                    },{
										                        field: 'htze',
										                        title: '合同总额',
																align:'right',
										// width:100
										                    },{
										                        field: 'yfk',
										                        title: '已付款',
																align:'right',
										// width:100
										                    },{
										                        field: 'wfk',
										                        title: '未付款',
																align:'right',
										// width:100
										                    },{
										                        field: 'ysp',
										                        title: '已收票',
																align:'right',
										// width:300
										                    },{
										                        field: 'bz',
										                        title: '备注',
										// width:300
										                    },{
										                        title: '操作',
										width:50,
										                        formatter: function (value, row, index) {//这里的三个参数：value表示当前行当前列的值；row表示当前行的数据；index表示当前行的索引（从0开始）。
																		var html = '<div style="height:auto;font-size:14px" class="datagrid-cell datagrid-cell-c8-edit">'+
																	
																	'<a href="javascript:;" onclick="ShowImg(\''+row.htbh+'\',\''+row.xmbh+'\',\''+row.xmmc+'\',\''+row.dwmc+'\',\''+row.htmc+'\',\''+row.lxr+'\',\''+row.qdsj+'\')" title="查看图片" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" ><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text"></span><span class="l-btn-icon icon-search">&nbsp;</span></span></a>'+
																	
																	'</div>';
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
				
				//修改
					function ShowEdit(id,yfk,ysp){
						layer.open({
							 type: 2,
							 // title:'<center><h3> 支出合同修改</center>',
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
							 area: ['1500px', '700px'],
							 // skin: 'layui-layer-demo',
							 closeBtn: 1,
							 anim: 2,
							 content: "spend_change.php?id=" + id + "&yfk=" + yfk+"&ysp="+ysp,
							  // btn: ["", "取消"],
							 
							 end:function(){
								  window.location.reload();//刷新父页面
						var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
						parent.layer.close(index); //再执行关闭
								
							 },
								 });
						//  window.location.href="spend_change.php?user=<?php echo $user;?>&id=" + id + "&ysk=" + ysk;
						}
						
						//图片上传
						function ShowImg(htbh,xmbh,xmmc,dwmc,htmc,lxr,qdsj){
							 window.open("image.php?xmmc=" + xmmc + "&xmbh=" + xmbh + "&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&lxr=" + lxr + "&qdsj=" + qdsj,"_blank") ;
							 // window.location.href="image.php?xmmc=" + xmmc + "&xmbh=" + xmbh + "&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&lxr=" + lxr + "&qdsj=" + qdsj ;
							}
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
							 area: ['1000px', '300px'],
							 // skin: 'layui-layer-demo',
							 closeBtn: 1,
							 anim: 2,
							 content: 'up_image.php',
							 end:function(){
						var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
						parent.layer.close(index); //再执行关闭
		
							 },
								 });
						}	
				</script>
				
				<script>
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
										url:"spend_delete.php",
										data: delid,
										cache: false,
										success: function (data) {
											 layer.alert('删除成功！', {
											 icon: 1,   
											 title: '提示',
											 end:function(){
												  window.location.reload();//刷新父页面
												layer.closeAll(); //关闭所有layer
											 },
											 });
										 },
									 });										 																	                 
								                 },
								});
							}							
					</script>
					<script>
								function del() {
									var xmmc = $("#xmmc").val();
									var xmbh = $("#xmbh").val();
									var dwmc = $("#dwmc").val();
									var htmc = $("#htmc").val();
									var htbh = $("#htbh").val();
									var nd = $("#nd").val();
									var yf = $("#yf").val();
									 if(htbh=="" &&  xmbh=="" && xmmc=="" && dwmc=="" && htmc=="" && nd=="" && yf==""){
											layer.open({
											 type: 2,
											  title:'<center><h3> 提示</center>',
											 area: ['500px', '400px'],
											 skin: 'layui-layer-demo',
											 closeBtn: 1,
											 anim: 2,
											 offset:'t',  //设置弹出位置
											 shadeClose: true,
											 content: 'delete_spend.php?xmmc=' + xmmc + '&xmbh=' + xmbh + '&dwmc=' + dwmc + '&htmc=' + htmc + '&htbh=' + htbh + '&nd=' + nd + '&yf=' + yf,
											 success: function (layero, index) {
											                         },
											 btn: ["确定", "取消"],
											 yes: function (index, layero) {
												 var thisIndex = index;
												
												  layer.confirm('<h4 style="color:red;padding:5px5px;magin:2px;">警告：真的确定清空表中所有数据吗</h4></center>', { icon: 5, title: '提示' }, function (index) {
														window.location.href= "delete_spend_php.php?xmmc=" + xmmc + "&xmbh=" + xmbh + "&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&nd=" + nd + "&yf=" + yf ;										                                									                 
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
															 content: 'delete_spend.php?xmmc=' + xmmc + '&xmbh=' + xmbh + '&dwmc=' + dwmc + '&htmc=' + htmc + '&htbh=' + htbh + '&nd=' + nd + '&yf=' + yf,
															 success: function (layero, index) {
															                         },
															 btn: ["确定", "取消"],
															 yes: function (index, layero) {
																 var thisIndex = index;
																
																  layer.confirm('确定删除所选数据吗', { icon: 2, title: '提示' }, function (index) {
																		window.location.href= "delete_spend_php.php?xmmc=" + xmmc + "&xmbh=" + xmbh + "&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&nd=" + nd + "&yf=" + yf ;										                                									                 
																																							});
																							},//layer嵌套  *****重要
																		});
															
														}
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
					window.location.href= "excel_spend.php?xmmc=" + xmmc + "&xmbh=" + xmbh + "&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&nd=" + nd + "&yf=" + yf + "";
									// layer.open({
									//  type: 2,
									//  skin: 'layui-layer-demo',
									//   area: ['1200px', '300px'],
									//  closeBtn: 1,
									//  anim: 2,
									//  shadeClose: true,
									//  content: 'spend_print.php',
									// });
								}
				function detail(htbh,htze){
					window.location.href= "excel_spend_detail.php?&htbh=" + htbh+"&htze="+htze ;			
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
					window.location.href= "spend_php.php?xmmc=" + xmmc + "&xmbh=" + xmbh + "&dwmc=" + dwmc + "&htmc=" + htmc + "&htbh=" + htbh + "&nd=" + nd + "&yf=" + yf + "";
				}
			</script>
			<script>
			function inportExcel(){		
					layer.open({
					 type: 2,
					 title:'<center><h3> 支出合同数据导入</center>',
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
					 content: 'up_spend.php',
					 end:function(){
					 	 window.location.reload();//刷新父页面
					 },
						 });
				}
			</script>
		
</html>