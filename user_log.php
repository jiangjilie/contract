<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>操作记录</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/font-awesome.min.css" rel="stylesheet"/>
		<link href="css/font-awesom.min.css" rel="stylesheet"/>
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
		</style>
	</head>
		<body marginwidth="0" marginheight="0">
			<div class="col-sm-12">
			     <div class="box box-primary">
			         <div class="panel-body form-horizontal">					
						<form method="get" action="user_log.php" id="Form">
			              <fieldset>
			                  <div class="form-group">	                           
			              		  <div class="col-sm-2" style="width:106px">
			              			  <span class="form-control" style="border:0px;">
			              				  用户名
			              			  </span>
			              		  </div>
			              		  <div class="col-sm-2">
			              			  <input type="text" id="user" class="form-control" name="user" value="<?php echo $user;?>">
			              		  </div>
									<div class="col-sm-1"></div>							   
			              		 <div class="col-sm-2" style="width:106px">
									<span class="form-control" style="border:0px;">
			              		           日期
			              		       </span>
			              		   </div>		              		 
			              		   <div class="col-sm-2">
									   <span class="ace-calendar-picker" style="width:100%;">
									   				<div>
									   					<input  id="dpStart" value="<?php echo $time;?>"placeholder="" name="time" autocomplete='off' type="text" class="ace-calendar-picker-input ace-input"style="width: 100%;height: 60%;color:black;border:0">
									   					<span class="ace-calendar-picker-icon">							
									   					</span>
									   					</div>
									   					</span>
			              		       <!-- <input type="text" id="val_yqlr" class="form-control" name="time" value="<?php echo $time;?>"> -->
			              		   </div>
								   <div class="col-sm-1"></div>
			                 
			                     <div class="col-sm-2" style="width:106px">
											<span class="form-control" style="border:0px;">
			                              操作行为
			                          </span>
			                      </div>			      
			                      <div class="col-sm-2">
									  <select class="form-control" id="czlx" name="czlx" value="<?php echo $czlx;?>">
										  <option><?php echo $czlx;?></option>
										  <option value="添加">添加</option>
										  <option value="修改">修改</option>
										  <option value="删除">删除</option>
										  <option value="">全部</option>
									  </select>
			                      </div>
								 </div>
								 <div class="form-group">			            
			                     <div class="col-sm-2" style="width:106px">
									<span class="form-control" style="border:0px;">
			                             合同类型
			                          </span>
			                      </div>			                     
			                      <div class="col-sm-2">
									  <select class="form-control" id="htlx"  name="htlx" value="<?php echo $htlx;?>">
										  <option><?php echo $htlx;?></option>
										  <option value="收入合同">收入合同</option>
										  <option value="支付合同">支付合同</option>
										  <option value="发票">发票</option>
										   <option value="">全部</option>
									  </select>
			                      </div>
								  <div class="col-sm-1"></div>
								  <div class="col-sm-2" style="width:106px">
										<span class="form-control" style="border:0px;">
								          合同编号
								       </span>
								   </div>			                     
								   <div class="col-sm-2">
								       <input type="text" id="htmc" class="form-control" name="htmc" value="<?php echo $htmc;?>">
								   </div>
			                  </div>	    
			              </fieldset>
			              <fieldset>
			                  <div class="form-group">
			                      <div class="" style="float: right;">
									  <button type="button" style="background-color: #428BCA !important;border-color: #428BCA;border: 5px solid #FF" class="btn btn-primary" onclick="subForm();"><span class="fa fa-search" style="border: 5px solid #FF"></span>&nbsp;查询</button>											
									 <a href="user_log.php" title="刷新" class="l-btn l-btn-small l-btn-plain" group="" id="onload"><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">刷新</span><span class="l-btn-icon pagination-load">&nbsp;</span></span></a>
									 <a href="javascript:;" onclick="del()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-cancel" plain="true" group="" id=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">批量删除</span><span class="l-btn-icon icon-cancel">&nbsp;</span></span></a>
								  </div>			                  							  							 							  
							  </div>
							  </div>
			              </fieldset>				
			         </div>
			     </div>
			<table id="dg" style="word-break:break-all; word-wrap:break-all;" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
				  <tr style="background-color:#438eb9;color: #FFF;">
					<th class="tr-th" style="text-align:center;">用户名</th>
					<th class="tr-th" style="text-align:center;">操作时间</th>				
					<th class="tr-th" style="text-align:center;">操作行为</th>
					<th class="tr-th" style="text-align:center;">合同类型</th>
					<th class="tr-th" style="text-align:center;">操作内容（ 项目编号 --> 合同编号）</th>
					 <th class="tr-th" style="text-align:center;">操作</th>
				  </tr>
	            </thead>
				<tbody>
				<?php
				//声明变量并接受form表单发送过来的数据
					$user = $_GET['user']; 
					$time = $_GET['time'];
					$czlx = $_GET['czlx'];
					$htlx = $_GET['htlx'];
					$htmc = $_GET['htmc'];									
				//连接数据库
					require("dbconfig.php");//导入配置文件
					$link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
					mysql_select_db(DBNAME,$link);//选择数据库
					mysql_query("set names 'utf8'");//选择字符集

					// 用Page函数计算出 $select_from 从哪条记录开始检索、$pagenav 输出分页导航
					
					
					$wherelist = array();//获取查询条件
						if(!empty($_GET['user'])){
							$wherelist[] = "user like '%{$_GET['user']}%'";
						}
						if(!empty($_GET['time'])){
							$wherelist[] = "time like '%{$_GET['time']}%'";
						}
						if(!empty($_GET['czlx'])){
							$wherelist[] = "czlx like '%{$_GET['czlx']}%'";
						}
						if(!empty($_GET['htlx'])){
							$wherelist[] = "htlx like '%{$_GET['htlx']}%'";
						}
						if(!empty($_GET['htmc'])){
							$wherelist[] = "htmc like '%{$_GET['htmc']}%'";
						}
						
					if(count($wherelist) > 0){         //组装查询条件
						$where = " where ".implode(' AND ' , $wherelist); 
					}
					$rows = mysql_num_rows(mysql_query("select * from user $where"));					
					$sql = "select * from user $where order by time desc  ";//查询语句	;
					$result = mysql_query($sql,$link);
					if (!mysql_num_rows($result)){
					 echo "<tr align='center'>";
					echo "<td  colspan='18' >表中无数据存在!</td>";
					// return false;					
					}
			include'paging.php';//导入分页类
					$rs=mysql_paging_query($sql,10);//替代$result=mysql_query($sql,$link)
			while($row = mysql_fetch_assoc($rs)){
				echo "<tr align='center'>";
				echo "<td  width='100px'>{$row['user']}</td>";
				echo "<td  width='150px'>{$row['time']}</td>";					
				echo "<td  width='100px'>{$row['czlx']}</td>";
				echo "<td  width='100px'>{$row['htlx']}</td>";
				echo "<td  width='600px'>{$row['htmc']}</td>";
				echo "<td  width='50px'>
				<div style='/* text-align:center; */height:auto;' class='datagrid-cell datagrid-cell-c8-edit'><img title='点击删除该条记录' class='GridTopImg' onclick='ShowDel({$row['id']})' src='images/DelBtn.png'></div>
				
				
				</td>";
				echo "</tr>";
			}
			echo "<tbody>";
			echo "</table>";
			mysql_paging_bar();
				 ?>						
	    </body>
		<script>
			function ShowEdit(id){
				var iid = id;
				 window.location.href="income_change.php?user=<?php echo $user;?>&id=" + iid + "";
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
						                     var jsy = $("#jsy").val();
						                     window.location.href="user_log_delete.php?user=<?php echo $user;?>&id=" + iid + "";
						                 },
						});
					}		
			</script>
<script>
		function subForm(){
			// $qdsj = document.getElementById('qdsj').value;
			// 	if($qdsj.length!=10){
			// 	layer.alert('签订时间输入有误，例：2013.01.04');
			// 	return false;
			// 	}
		       $("#Form").submit();
		   }
	</script>
	<script>
				function del() {
					layer.open({
					 type: 1,
					 area: ['250px', '150px'],
					 skin: 'layui-layer-demo',
					 closeBtn: 1,
					 anim: 2,
					 shadeClose: true,
					 content: '<center><h4 style="color:red;padding:5px5px;magin:2px;">确定删除所有数据吗</h4></center>',
					 btn: ["确定", "取消"],
					 yes: function () {
					                     window.location.href="user_log_delete_all.php";
					                 },
					});
						}		
	</script>
</html>