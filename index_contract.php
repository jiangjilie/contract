<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>合同管理</title>
		<link href="login/favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link href="Content/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="Content/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
		<link href="Content/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
		<link href="Content/sidebar-menu/sidebar-menu.css" rel="stylesheet"/>
		<link href="Content/ace/css/ace-rtl.min.css" rel="stylesheet"/>
		<link href="Content/ace/css/ace-skins.min.css" rel="stylesheet"/>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/layer/layer.js"></script>
		<style type="text/css">
		        body {
		            font-size: 14px;
		            height: 90%;
					color: #000000;
		        }
		
		        html {
		            height: 90%;
		        }
				.nav-list > li .submenu > li > a {
					color: black;
					}
		
		        .nav > li > a {
		            padding: 5px 10px;
		        }
		
		        /* .tab-content {
		            padding-top: 3px;
		        } */
		
		        a:hover {
		            text-decoration: none;
		        }
		
		        .banner-right i {
		            font-size: 16px;
		        }
				.tab-content > .tab-pane {
				    padding: 0;
				}
		    </style>
	</head>
	<body>
	    <div class="navbar navbar-default" id="navbar" spellcheck="height:8">
	        <div class="navbar-container" id="navbar-container">
	            <div class="navbar-header pull-left">
	                <a href="#" class="navbar-brand">
	                    <small class="banner-title">
	                        <!-- <img src="login/logo1.png" style=""> -->
	                        <i style="font-family:'Adobe Kaiti Std'; font-style:normal; font-weight:800;">
	                            项目经营生产合同管理系统
	                        </i>
	                    </small>
	                </a>
	            </div>
			   <div class="navbar-header pull-right" role="navigation">
							   <div class="banner-right">
								 <span style="padding-right: 10px;font-size: 18px;">
									  <script type="text/javascript">
										var date = new Date();
										document.write(date.getFullYear() + "年" + (date.getMonth() + 1) + "月" + date.getDate() + "日" + " 星期" + "日一二三四五六".charAt(date.getDay()));
									  </script>
								 </span>
								 <span style="padding-right: 10px;"></span>
							   <i class="icon-user"></i>
							   <span style="font-size: 18px;">
								<?php echo $_GET['user']; ?> 欢迎您
								</span>
							   <span style="padding: 0 20px 0 0; font-size: 14px;" id="span_user"></span>
							   <a href="javascript://void(0)" style="color: #fff; margin-right: 10px; font-size: 14px;" onclick="imgPrintCn()">
								   <i class="icon-pencil"></i>
								  修改密码
							   </a>
							   <a href="index.php" style="color: #fff; margin-right: 10px; font-size: 14px;" onclick="Main.ExitLogin()">
								   <i class="icon-off"></i>
								   退出
								   </a>
							   </div>
				</div>
	        </div>
	    </div>
		<input type="text" value="<?php echo $_GET['id']; ?>" id="id" style="display:none" >
	      <div class="main-container" id="main-container" style="height: 0;">
	              <div class="main-container-inner">
	                  <a class="menu-toggler" id="menu-toggler" href="#">
	                      <span class="menu-text"></span>
	                  </a>
	                  <div class="sidebar" id="sidebar">
	                      <ul class="nav nav-list" id="menu">
							  <li id="submenutab_1">
							    <a href="javascript:;" class="dropdown-toggle">
							      <i class="icon-paste">
							      </i>
							      <span class="menu-text">合同管理</span>
							      <b class="arrow icon-angle-down">
							      </b>
							    </a>
							   <ul class="submenu" style="display: block;">    <!-- block 打开 -->
							      <li id="submenutab_2">
							        <a href="javascript:addTabs({id:'2',title: '收入合同',close: true,url: 'income.php?user=<?php echo $_GET['user'];?>',icon:' icon-paste'});">
							          <i class="icon-plus">
							          </i>
							          <span class="menu-text">收入合同</span>
							        </a>
							      </li>
								  <li id="submenutab_13">
								    <a href="javascript:addTabs({id:'13',title: '收入合同',close: true,url: 'income_search.php?user=<?php echo $_GET['user'];?>',icon:' icon-paste'});">
								      <i class="icon-plus">
								      </i>
								      <span class="menu-text">收入合同</span>
								    </a>
								  </li>
							      <li id="submenutab_3">
							        <a href="javascript:addTabs({id:'3',title: '支付合同',close: true,url: 'spend.php?user=<?php echo $_GET['user'];?>',icon:' icon-paste'});">
							          <i class="icon-signin">
							          </i>
							          <span class="menu-text">支付合同</span>
							        </a>
							      </li>
								  <li id="submenutab_14">
								    <a href="javascript:addTabs({id:'14',title: '支付合同',close: true,url: 'spend_search.php?user=<?php echo $_GET['user'];?>',icon:' icon-paste'});">
								      <i class="icon-signin">
								      </i>
								      <span class="menu-text">支付合同</span>
								    </a>
								  </li>
							      <li id="submenutab_4">
							        <a href="javascript:addTabs({id:'4',title: '发票管理',close: true,url: 'invoice.php?user=<?php echo $_GET['user'];?>',icon:' icon-paste'});">
							          <i class="icon-tasks">
							          </i>
							          <span class="menu-text">发票管理</span>
							        </a>
							      </li>
								  <li id="submenutab_15">
								    <a href="javascript:addTabs({id:'15',title: '发票管理',close: true,url: 'invoice_search.php?user=<?php echo $_GET['user'];?>',icon:' icon-paste'});">
								      <i class="icon-tasks">
								      </i>
								      <span class="menu-text">发票管理</span>
								    </a>
								  </li>
							      <li id="submenutab_5">
							        <a href="javascript:addTabs({id:'5',title: '零星采购',close: true,url: 'purchase.php?user=<?php echo $_GET['user'];?>', icon:' icon-paste'});">
							          <i class="icon-exchange">
							          </i>
							          <span class="menu-text">零星采购</span>
							        </a>
							      </li>
								  <li id="submenutab_16">
								    <a href="javascript:addTabs({id:'16',title: '零星采购',close: true,url: 'purchase_search.php?user=<?php echo $_GET['user'];?>', icon:' icon-paste'});">
								      <i class="icon-exchange">
								      </i>
								      <span class="menu-text">零星采购</span>
								    </a>
								  </li>
							      <li id="submenutab_6">
							        <a href="javascript:addTabs({id:'6',title: '其他',close: true,url: 'administrative.php?user=<?php echo $_GET['user'];?>',icon:' icon-paste'});">
							          <i class="icon-book">
							          </i>
							          <span class="menu-text">其他</span>
							        </a>
							      </li>
								<li id="submenutab_17">
								  <a href="javascript:addTabs({id:'17',title: '其他',close: true,url: 'administrative_search.php?user=<?php echo $_GET['user'];?>',icon:' icon-paste'});">
								    <i class="icon-book">
								    </i>
								    <span class="menu-text">其他</span>
								  </a>
								</li>											
							    </ul>
							  </li>
							<li id="submenutab_7">
							  <a href="javascript:addTabs({id:'7',title: '数据统计',close: true,url: 'data_byxm_php.php',icon:' icon-zoom-out'});">
							    <i class="icon-bar-chart">
							    </i>
							    <span class="menu-text">数据统计</span>
							  </a>
							</li>
							 <li id="submenutab_8" class="">
							  <a href="#" class="dropdown-toggle">
							    <i class="icon-cog">
							    </i>
							    <span class="menu-text">系统管理</span>
							    <b class="arrow icon-angle-down">
							    </b>
							  </a>
							  <ul class="submenu" style="display: none;">
							    <li id="submenutab_9" class="">
							      <a href="javascript:addTabs({id:'10',title: '用户管理',close: true,url: 'user.php',icon:' icon-user'});">
							        <i class="icon-user">
							        </i>
							        <span class="menu-text">用户管理</span>
							      </a>
							    </li>
								<li id="submenutab_10" class="">
								  <a href="javascript:addTabs({id:'11',title: '权限管理',close: true,url: 'user_role.php',icon:' icon-user'});">
								    <i class="icon-key">
								    </i>
								    <span class="menu-text">权限管理</span>
								  </a>
								</li>
								<!-- <li id="submenutab_11" class="">
								  <a href="javascript:addTabs({id:'12',title: '部门管理',close: true,url: 'user_dept.php',icon:' icon-user'});">
								    <i class="icon-group">
								    </i>
								    <span class="menu-text">部门管理</span>
								  </a>
								</li> -->
								<li id="submenutab_12" class="">
								      <a href="javascript:addTabs({id:'13',title: '日志管理',close: true,url: 'user_log.php',icon:' icon-file-alt'});">
								        <i class="icon-file-alt">
								        </i>
								        <span class="menu-text">日志管理</span>
								      </a>
								    </li>
								</ul>
							</li>
						  </ul>
	                      <div id="sidebar-collapse" class="sidebar-collapse">
	                          <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
	                      </div>
	                  </div>
	                  <div class="main-content">
	                      <div class="page-content">
	                          <div class="row">
	                              <div class="col-xs-12" style="padding-left: 0px;">
									  
	                                  <ul class="nav nav-tabs" role="tablist">
	                                      <li class="active noclose" role="presentation"><a href="#Index" role="tab" data-toggle="tab">首页</a></li>
	                                  </ul>
	                                  <div class="tab-content">
	                                      <div role="tabpanel" class="tab-pane active" id="Index" style="height: 100%;position: relative;top: 13px;padding:0">
	      
	                                          <iframe src="index_data.php" style="height:100%; width: 100%; border: none;"></iframe>
	                                      </div>
	      
	                                  </div>
	      
	                              </div>
	                          </div>
	                      </div>
	                  </div>
	      
	              </div>
	          </div>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/sidebar-menu.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script> 
	<script src="Content/bootstrap/js/bootstrap-tab.js"></script>
	
	</body>
	<?php
	$admin=$_GET['user'];
	$con = mysql_connect("localhost","root","123456");
		if(!$con){
		echo "<br/>数据库连接失败".mysql_error();
		}
	//选择数据库
		mysql_select_db("contract");
		//设置mysql字符编码
		mysql_query("set names utf8;");	
		$sql="select * from menu where admin='$admin'";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		$sr=$row['sr'];
		$zc=$row['zc'];
		$fp=$row['fp'];
		$lx=$row['lx'];
		$xz=$row['xz'];
		$tj=$row['tj'];
		$yh=$row['yh'];
		$qx=$row['qx'];
		$rz=$row['rz'];
		$srs=$row['srs'];
		$zcs=$row['zcs'];
		$fps=$row['fps'];
		$lxs=$row['lxs']; 
		$xzs=$row['xzs'];
		if($sr==''){
		 	echo" <script> document.getElementById('submenutab_2').style.display='none';</script>";
		 }
		if($zc==''){
		  	echo" <script> document.getElementById('submenutab_3').style.display='none';</script>";
		  }
		if($fp==''){
		   	echo" <script> document.getElementById('submenutab_4').style.display='none';</script>";
		   }
		if($lx==''){
		   	echo" <script> document.getElementById('submenutab_5').style.display='none';</script>";
		   }
		if($xz==''){
		   	echo" <script> document.getElementById('submenutab_6').style.display='none';</script>";
		   }
		  if($srs==''){
		   	echo" <script> document.getElementById('submenutab_13').style.display='none';</script>";
		   }
		  if($zcs==''){
		    	echo" <script> document.getElementById('submenutab_14').style.display='none';</script>";
		    }
		  if($fps==''){
		     	echo" <script> document.getElementById('submenutab_15').style.display='none';</script>";
		     }
		  if($lxs==''){
		     	echo" <script> document.getElementById('submenutab_16').style.display='none';</script>";
		     }
		  if($xzs==''){
		     	echo" <script> document.getElementById('submenutab_17').style.display='none';</script>";
		     }
		if($tj==''){
		   	echo" <script> document.getElementById('submenutab_7').style.display='none';</script>";
		   }
		if($yh==''&&$qx==''&&$rz==''){
		   	echo" <script> document.getElementById('submenutab_8').style.display='none';</script>";
		   }
		if($yh==''){
		   	echo" <script> document.getElementById('submenutab_9').style.display='none';</script>";
		   }		
		if($qx==''){
		   	echo" <script> document.getElementById('submenutab_10').style.display='none';</script>";
		   }
		if($rz==''){
		   	echo" <script> document.getElementById('submenutab_12').style.display='none';</script>";
		   }
		
	?>
	<script>
		
		 $(function () {
		            // alert($(window).height());
		            var height = $(window).height() - 140;
		            $(".tab-content").attr("style", "height:" + height + "px");
					});
			$(window).resize(function () {
					   var height = $(window).height() - 140;
					   $(".tab-content").attr("style", "height:" + height + "px");
				   });
		function imgPrintCn() {
			var id=$("#id").val();
		layer.open({
		    type: 2,
		    title: '修改用户信息',
		    shadeClose: true,
		    maxmin: false, //开启最大化最小化按钮
		    area: ['800px', '410px'],
		    content: 'user_change.php?id='+id,
		    // end: function () {
		    //     //layer层关闭，刷新
		    //    	window.location.reload();//刷新父页面
		    // }
		});
					}
		</script>
		    <script src="js/ace.min.js"></script>
		<script src="js/ace-elements.min.js"></script>
		<script src="js/ace-extra.min.js"></script>
	</html>

	
	
		