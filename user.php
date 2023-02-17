<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>收入合同</title>
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
		<style>
			.th-tr{
				text-align:center;
				background-color: #438eb9;
			}
		</style>
	</head>
		<body marginwidth="0" marginheight="0">
			<div class="col-sm-12">
			     <div class="box box-primary">
			         <div class="panel-body form-horizontal">					
						<form method="get" action="user.php" id="Form">
			              <fieldset>
			                  <div class="form-group">	                           
			              		  <div class="col-sm-2" style="width:106px">
			              			  <span class="form-control" style="border:0px;">
			              				  用户名
			              			  </span>
			              		  </div>								  
			              		  <div class="col-sm-2">
			              			  <input type="text" id="val_yqlr" class="form-control" name="admin" value="<?php echo $admin;?>">
			              		  </div>
								  <div class="col-sm-1"></div>
								<!--  <div class="col-sm-2" style="width:106px">
									  <span class="form-control" style="border:0px;">
										  部门
									  </span>
								  </div> -->
								 <!-- <div class="col-sm-2">
									  <input type="text" id="val_yqlr" class="form-control" name="dept" value="<?php echo $dept;?>">
								  </div>	 -->	
			              </fieldset>
			              <fieldset>
			                  <div class="form-group">
			                      <div  style="float: right;">
									  <button type="button" style="background-color: #428BCA !important;border-color: #428BCA;border: 5px solid #FF" class="btn btn-primary" onclick="subForm();"><span class="fa fa-search" style="border: 5px solid #FF"></span>&nbsp;查询</button>											
									  <a href="javascript:;" id="add"  title="添加用户信息" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-add" plain="true" group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">添加</span><span class="l-btn-icon icon-add">&nbsp;</span></span></a>
									 <a href="user.php" title="刷新" class="l-btn l-btn-small l-btn-plain" group="" id="onload"><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">刷新</span><span class="l-btn-icon pagination-load">&nbsp;</span></span></a>
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
					<th class="tr-th" style="text-align:center;">姓名</th>
					<th class="tr-th" style="text-align:center;">联系电话</th>
					<th class="tr-th" style="text-align:center;">邮箱</th>
					<!-- <th class="tr-th" style="text-align:center;">角色</th>
					<th class="tr-th" style="text-align:center;">部门</th> -->
					<th class="tr-th" style="text-align:center;">备注</th>				
					 <th class="tr-th" style="text-align:center;">操作</th>
				  </tr>
	            </thead>
				<tbody>
				<?php
				//声明变量并接受form表单发送过来的数据
					$admin = $_GET['admin'];
					$dept = $_GET['dept'];
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
						if(!empty($_GET['admin'])){
							$wherelist[] = "admin like '%{$_GET['admin']}%'";
						}
						if(!empty($_GET['bm'])){
							$wherelist[] = "bm like '%{$_GET['bm']}%'";
						}
						
					if(count($wherelist) > 0){         //组装查询条件
						$where = " where ".implode(' AND ' , $wherelist); 
					}
					$rows = mysql_num_rows(mysql_query("select * from admin $where"));
					
					$sql = "select * from admin $where ";//查询语句	;
					$result = mysql_query($sql,$link);
					if (!mysql_num_rows($result)){
					 echo "<tr align='center'>";
					echo "<td  colspan='8' >表中无数据存在!</td>";
					// return false;					
					}
					include'paging.php';//导入分页类
							$rs=mysql_paging_query($sql,10);//替代$result=mysql_query($sql,$link)
					while($row = mysql_fetch_assoc($rs)){
				echo "<tr align='center'>";
				echo "<td  width='150px'>{$row['admin']}</td>";
				echo "<td  width='150px'>{$row['name']}</td>";
				echo "<td  width='150px'>{$row['phone']}</td>";
				echo "<td  width='150px'>{$row['email']}</td>";
				// echo "<td  width='150px'>{$row['role']}</td>";
				// echo "<td  width='150px'>{$row['dept']}</td>";
				echo "<td  width='200px'>{$row['bz']}</td>";
				echo "<td  width='50px'>
				<div style='/* text-align:center; */height:auto;' class='datagrid-cell datagrid-cell-c8-edit'><img class='GridTopImg' title='点击编辑修改条记录' onclick='ShowEdit({$row['id']})' src='images/Edit.png'>|<img title='点击删除该条记录' class='GridTopImg' onclick='ShowDel({$row['id']})' src='images/DelBtn.png'></div>
				
				
				</td>";
				echo "</tr>";
			}
		echo "<tbody>";
		echo "</table>";
		mysql_paging_bar();
				 ?>						
	    </body>
		<script>
			$("#add").click(function(){
				layer.open({
				    type: 2,
				    title: '添加用户信息',
				    shadeClose: true,
				    maxmin: false, //开启最大化最小化按钮
				    area: ['800px', '410px'],
				    content: 'user_luru.php',
				    end: function () {
				        //layer层关闭，刷新
				   	window.location.reload();//刷新父页面
				   
				    }
				});
			})
			function ShowEdit(id){
				layer.open({
				    type: 2,
				    title: '修改用户信息',
				    shadeClose: true,
				    maxmin: false, //开启最大化最小化按钮
				    area: ['800px', '410px'],
				    content: 'user_change.php?id='+id,
				    end: function () {
				        //layer层关闭，刷新
				       	window.location.reload();//刷新父页面
				    }
				});
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
						                     window.location.href="user_delete.php?admin=<?php echo $admin;?>&id=" + iid + "";
						                 },
						});
					}		
			</script>
<script>
		function subForm(){
		       $("#Form").submit();
		   }
	</script>
</html>
