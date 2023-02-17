



<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <title>档案管理系统</title>
    <link href="dagl/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width" />
    <link href="Content/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<link href="Content/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="Content/datatables/dataTables.bootstrap.css" rel="stylesheet"/>
<link href="css/ionicons.min.css" rel="stylesheet"/>
<link href="Content/ace/css/ace.min.css" rel="stylesheet"/>
<link href="css/_all-skins.min.css" rel="stylesheet"/>
<link href="dagl/Scripts/Content/toastr/toastr.min.css" rel="stylesheet"/>
<link href="css/main.css" rel="stylesheet"/>

    <link href="dagl/Scripts/Content/bootstrap-treeview/css/bootstrap-treeview.css" rel="stylesheet"/>

    <style type="text/css">
        .treeview ul li {
            border: none;
        }
        a{font-size:16px;padding-left:5px; text-decoration:none;}
             html,body{height:100%}
    </style>
	 <style>
	        ul {
	            display: block;
	            list-style: none;
	            cursor: pointer;
	        }
	        
	        #lv2U,#3v2U,#4v2U{
	            display: none;
				margin-left: 27%;
	        }
	        #1v1L1,#2v1L1,#3v2L1{
				font-size: 18px;
			}
	        #tree img {
	            display: block;
	            float: left;
	            width: 16px;
				height: 16px;
				margin-top: 3px;
				margin-right: 5px;
	        }
	        
	        .lv3Checks{
	            display: block; float: left; clear: left; width: 15px; height: 15px;
	        }
			</style>
    <!--[if lt IE 9]>
    <script src="~/Scripts/Content/html5shiv.min.js"></script>
    <script src="~/Scripts/Content/respond.js"></script>
    <![endif]-->
</head>
<body>
    <section class="content" style="height:100%;">
        <div class="row" style="height:100%;">
            <!-- left column -->
            <div class="col-md-3" style="height:100%;width: 16%;">
                <!-- general form elements -->
                <div class="box box-primary" style="height: 95%;">
                    <div class="box-header with-border">
                        <h3 class="box-title"style="margin-left: 47%;">用户</h3>
                       <!-- <div class="box-tools pull-right">
                           <a title="删除用户" class="red" id="btnDelRole" onclick="Init.RemoveRole()" href="javascript://" >
                                <i class="fa fa-remove"></i>
                            </a>
                            <a title="编辑用户信息" class="green" id="btnEditRole" onclick="Init.EditRole();" href="javascript://"><i class="fa fa-edit"></i></a>
                            <a title="添加用户信息" class="green" id="btnAddRole" onclick="Init.AddRole();" href="javascript://"><i class="fa fa-plus"></i></a>
                        </div> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3"style="height:100%;width: 14%;">
                                    <div id="treeview-disabled" class="">
										<?php
										require("dbconfig.php");//导入配置文件
										$link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
										mysql_select_db(DBNAME,$link);//选择数据库
										mysql_query("set names 'utf8'");//选择字符集
										$sql = "select * from admin  ";//查询语句	;
										$result = mysql_query($sql,$link);
										echo"<ul  id='suggest_ul' class='suggest_ul' style='width:100%;margin-left:auto;'>";
										while($row = mysql_fetch_assoc($result)){
											echo "<li id='{$row["admin"]}'onclick='put'style='background-color:;text-align: center;padding:2px;list-style:none' class='cd'><a style='text-decoration:none;'href='user_role?admin={$row["admin"]}'>{$row["admin"]}</a></li>";
										}
										?>
										</ul>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
           
            <div class="col-md-5 " style="height:100%;">
                <div class="box box-primary" style="height: 95%;width: 56%;">
                    <div class="box-header with-border">
                        <h3 class="box-title"style="margin-left: 36%;"><?php echo $_GET["admin"]; ?>菜单权限</h3>
                        <!-- <div class="box-tools pull-right">
                            <a title="删除菜单" class="red" id="btnDelMenu" onclick="Init.RemoveMenu()" href="javascript://">
                                <i class="fa fa-remove"></i>
                            </a>
                            <a title="编辑菜单信息" class="green" id="btnEditMenu" onclick="Init.EditMenu();" href="javascript://"><i class="fa fa-edit"></i></a>
                            <a title="添加菜单信息" class="green" id="btnAddMenu" onclick="Init.AddMenu();" href="javascript://"><i class="fa fa-plus"></i></a>
                        </div> -->
                    </div>
					<form id="Form">
						<input type="text" value="<?php echo $_GET['admin'];?>" name="admin" style="display: none;"/>
                    <div class="box-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div id="tvMenu" class="" style=" max-height: 500px;overflow-y: auto;">
										<div id="tree">
										        <ul id="lv1U">
										            <img src="css/icons/add" id="lv1M" />
										            <input type="checkbox" id="allCheck" style="display: ; float: left; width: 15px; height: 15px;"/>
										            <li id="lv1L1" style="font-size: 17px;">合同管理(查询,编辑)
										                <ul id="lv2U" style="margin-left: 27%;display:none">
										                 
										                    <input type="checkbox" id="secondCheck1" value="1"name="setting[sr]"class="check1" style="display: block; float: left; width: 15px; height: 15px;"/>
										                    <li id="lv2L1"style="font-size: 15px;">收入合同(查询,编辑)</li>	
																																												
										                    <input type="checkbox" id="secondCheck2" value="1"name="setting[zc]"class="check1"style="display: block; float: left; width: 15px; height: 15px;"/>
										                    <li id="lv2L2"style="font-size: 15px;">支付合同(查询,编辑)</li>
										                  
										                    <input type="checkbox" id="secondCheck3" value="1"name="setting[fp]"class="check1"style="display: block; float: left; width: 15px; height: 15px;"/>
										                    <li id="lv2L3"style="font-size: 15px;">发票管理(查询,编辑) </li>
															
															<input type="checkbox" id="secondCheck4"value="1" name="setting[lx]"class="check1"style="display: block; float: left; width: 15px; height: 15px;"/>
															<li id="lv2L4"style="font-size: 15px;">零星采购(查询,编辑)</li>
															
															<input type="checkbox" id="secondCheck5" value="1"name="setting[xz]" class="check1"style="display: block; float: left; width: 15px; height: 15px;"/>
															<li id="lv2L5"style="font-size: 15px;">行政合同(查询,编辑)</li>
															
										                </ul>
										            </li>
										        </ul>
												<ul id="4v1U">
												    <img src="css/icons/add.png" id="4v1M" />
												    <input type="checkbox" id="allCheck4" style="display: ; float: left; width: 15px; height: 15px;"/>
												    <li id="4v1L1" style="font-size: 17px;">合同管理(仅查询)
												        <ul id="4v2U" style="margin-left: 27%;display:none">											         
												           							                    
															<input type="checkbox" id="secondCheck9" value="1"name="setting[srs]"class="check4" style="display: block; float: left; width: 15px; height: 15px;"/>
															<li id="4v2L1"style="font-size: 15px;">收入合同(仅查询)</li>		
												           
												            <input type="checkbox" id="secondCheck10" value="1"name="setting[zcs]"class="check4"style="display: block; float: left; width: 15px; height: 15px;"/>
												            <li id="4v2L2"style="font-size: 15px;">支付合同(仅查询)</li>
												           
															<input type="checkbox" id="secondCheck11" value="1"name="setting[fps]"class="check4"style="display: block; float: left; width: 15px; height: 15px;"/>
															<li id="4v2L3"style="font-size: 15px;">发票管理(仅查询) </li>
															
															<input type="checkbox" id="secondCheck12"value="1" name="setting[lxs]"class="check4"style="display: block; float: left; width: 15px; height: 15px;"/>
															<li id="4v2L4"style="font-size: 15px;">零星采购(仅查询)</li>
															
															<input type="checkbox" id="secondCheck13" value="1"name="setting[xzs]" class="check4"style="display: block; float: left; width: 15px; height: 15px;"/>
															<li id="4v2L5"style="font-size: 15px;">行政合同(仅查询)</li>
												        </ul>
												    </li>
												</ul>
												<ul id="3v1U">
												    <img src="css/icons/add.png" id="3v1M" />
												    <input type="checkbox" id="allCheck1" style="display:; float: left; width: 15px; height: 15px;"/>
												    <li id="3v1L1"style="font-size: 17px;">系统管理
												        <ul id="3v2U"style="margin-left: 27%;display:none">
												         
												            <input type="checkbox" id="secondCheck6" value="1"name="setting[yh]" class="check2"style="display: block; float: left; width: 15px; height: 15px;"/>
												            <li id="3v2L1"style="font-size: 15px;">用户管理</li>										                    
												          
												            <input type="checkbox" id="secondCheck7" value="1"name="setting[qx]"class="check2"style="display: block; float: left; width: 15px; height: 15px;"/>
												            <li id="3v2L2"style="font-size: 15px;">权限管理</li>
												            
												            <input type="checkbox" id="secondCheck8" value="1"name="setting[rz]"class="check2"style="display: block; float: left; width: 15px; height: 15px;"/>
												            <li id="3v2L3"style="font-size: 15px;">日志管理 </li>
															
												        </ul>
												    </li>
												</ul>
												<ul id="2v1U">
													 <img src="css/icons/add.png" id="2v1M" />
												    <input type="checkbox" id="allCheck3"value="1"name="setting[tj]" style="display: block; float: left; width: 15px; height: 15px;"/>
												    <li id="2v1L1"style="font-size: 17px;">数据统计</li>
												</ul>
										
										    </div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
				 
                </div>
            </div>
			<div class="col-md-1" style="text-align:center;height:99%; padding-top:350px;margin-left: -18%;">
			    <button type="button" class="btn btn-primary" onclick="Menu()">保存</button>
				 </form>
			</div>
        </div>
    </section>
    <script src="js/jquery-1.9.1.min.js"></script>
<script src="dagl/Scripts/Content/datatables/jquery.dataTables.min.js"></script>
<script src="dagl/Scripts/Content/datatables/dataTables.bootstrap.min.js"></script>
<script src="js/layer/layer.js"></script>
<script src="dagl/Scripts/Content/toastr/toastr.min.js"></script>
<script src="dagl/Scripts/Common.js"></script>
<script type="text/javascript">
		var yj=document.getElementsByClassName('cd');
		for(var i=0;i<yj.length;i++){
			yj[i].onmouseover=function(){
			//console.log(i)
			this.style.backgroundColor="rgb(213,213,213)"	
		}
		yj[i].click=function(){
				this.style.backgroundColor="rgb(213,213,213)"
			}
		yj[i].onmouseout=function(){
			this.style.backgroundColor="";
		}
		}
</script>
	<script>
    $(function(){
        /* 单机li进行页面跳转 */
        $(".cd").click(function(){
            /*当前标签下的a标签*/
            var obj = $(this).children("a");
            /*获取第一个a标签，进行跳转*/
            window.location.href=$(obj[0]).attr("href");
        });
    })
	</script>

    <script src="dagl/Scripts/Content/bootstrap-treeview/js/bootstrap-treeview.js"></script>

    <script src="dagl/Scripts/RoleManage.js" type="text/javascript"> </script>
	
	<script>
	function Menu(){
		// if($('#secondCheck1').is(':checked')){
		// }
		$.ajax({
			
						type:"post",			
						url:"user_role_php.php",
						 cache: false,  
						data: $('#Form').serialize(),
						success: function (data) {
							 layer.alert('保存成功！', {
							 icon: 6,   //绿色笑脸
							 title: '提示'
							 });
		}
		});
	}
	</script>
	 <script type="text/javascript">
        $(function() {
            $("#lv1M").click(function() {
                if($("#lv2U").is(":visible")) {
                    //                      alert("隐藏内容");
                    $("#lv1M").attr("src", "css/icons/add.png");
                } else {
                    //                      alert("显示内容");
                    $("#lv1M").attr("src", "css/icons/edit_remove.png");
                }
                $("#lv2U").slideToggle(300);
            });
          $("#4v1M").click(function() {
              if($("#4v2U").is(":visible")) {
                  //                      alert("隐藏内容");
                  $("#4v1M").attr("src", "css/icons/add.png");
              } else {
                  //                      alert("显示内容");
                  $("#4v1M").attr("src", "css/icons/edit_remove.png");
              }
              $("#4v2U").slideToggle(300);
          });  
           $("#3v1M").click(function() {
               if($("#3v2U").is(":visible")) {
                   //                      alert("隐藏内容");
                   $("#3v1M").attr("src", "css/icons/add.png");
               } else {
                   //                      alert("显示内容");
                   $("#3v1M").attr("src", "css/icons/edit_remove.png");
               }
               $("#3v2U").slideToggle(300);
           });                    
            
            $("#allCheck").click(function(){
                $("input[class=check1]").prop("checked",$("#allCheck").prop("checked"));
            });
            
            $("#allCheck1").click(function(){
                $("input[class=check2]").prop("checked",$("#allCheck1").prop("checked"));
            });
			$("#allCheck4").click(function(){
			    $("input[class=check4]").prop("checked",$("#allCheck4").prop("checked"));
			});
         
        });
    </script>
	<?php
	$admin = $_GET["admin"];
	// echo"<script>$('#$admin').style.backgroundColor='rgb(213,213,213)'";
	require("dbconfig.php");//导入配置文件
	$link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
	mysql_select_db(DBNAME,$link);//选择数据库
	mysql_query("set names 'utf8'");//选择字符集
	$sql = "select * from menu where admin='$admin'";//查询语句	;
	$result = mysql_query($sql,$link);
	if(!$result){
		return false;
	}
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
	if($sr=='1' and $zc=='1' and $fp=='1'and $lx=='1'and$xz=='1'){
		echo" <script> $('#allCheck').attr('checked',true);</script>";
	}
	if($sr=='1'){
	 	echo" <script> $('#secondCheck1').attr('checked',true);</script>";
	 }
	if($zc=='1'){
	  	echo" <script> $('#secondCheck2').attr('checked',true);</script>";
	  }
	if($fp=='1'){
	   	echo" <script> $('#secondCheck3').attr('checked',true);</script>";
	   }
	if($lx=='1'){
	   	echo" <script> $('#secondCheck4').attr('checked',true);</script>";
	   }
	if($xz=='1'){
	   	echo" <script> $('#secondCheck5').attr('checked',true);</script>";
	   }
   if($srs=='1'){
		echo" <script> $('#secondCheck9').attr('checked',true);</script>";
	}
   if($zcs=='1'){
		echo" <script> $('#secondCheck10').attr('checked',true);</script>";
	 }
   if($fps=='1'){
		echo" <script> $('#secondCheck11').attr('checked',true);</script>";
	  }
   if($lxs=='1'){
		echo" <script> $('#secondCheck12').attr('checked',true);</script>";
	  }
   if($xzs=='1'){
		echo" <script> $('#secondCheck13').attr('checked',true);</script>";
	  }
	 if($srs=='1' and $zcs=='1' and $fps=='1'and $lxs=='1'and$xzs=='1'){
	 	echo" <script> $('#allCheck4').attr('checked',true);</script>";
	 }
	if($tj=='1'){
	   	echo" <script> $('#allCheck3').attr('checked',true);</script>";
	   }
	if($yh=='1'&&$qx=='1'&&$rz=='1'){
		echo" <script> $('#allCheck1').attr('checked',true);</script>";
	   }
	if($yh=='1'){
	   	echo" <script>  $('#secondCheck6').attr('checked',true);</script>";
	   }		
	if($qx=='1'){
	   	echo" <script> $('#secondCheck7').attr('checked',true);</script>";
	   }
	if($rz=='1'){
	   	echo" <script>  $('#secondCheck8').attr('checked',true);</script>";
	   }
	?>
</body>
</html>

