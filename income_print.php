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
			<?php $user = $_GET['user']; ?>
			<div class="col-sm-12">
			     <div class="box box-primary">
			         <div class="panel-body form-horizontal">					
						<form method="get" action="excel_income.php" id="Form">
			              <fieldset>
			                  <div class="form-group">	                           
			              		  <div class="col-sm-2" style="width:106px">
			              			  <span class="form-control" style="border:0px;">
			              				  合同编号
			              			  </span>
			              		  </div>
			              		  <div class="col-sm-2">
			              			  <input type="text" id="val_yqlr" class="form-control" name="htbh" value="<?php echo $htbh;?>">
			              		  </div>
									<div class="col-sm-1"></div>							   
			              		 <div class="col-sm-2" style="width:106px">
									<span class="form-control" style="border:0px;">
			              		           项目编号
			              		       </span>
			              		   </div>		              		 
			              		   <div class="col-sm-2">
			              		       <input type="text" id="val_yqlr" class="form-control" name="xmbh" value="<?php echo $xmbh;?>">
			              		   </div>
								   <div class="col-sm-1"></div>
			                 
			                     <div class="col-sm-2" style="width:106px">
											<span class="form-control" style="border:0px;">
			                              项目名称
			                          </span>
			                      </div>			      
			                      <div class="col-sm-2">
			                          <input type="text" id="val_qlr" class="form-control" name="xmmc" value="<?php echo $xmmc;?>">
			                      </div>
								 </div>
								 <div class="form-group">			            
			                     <div class="col-sm-2" style="width:106px">
									<span class="form-control" style="border:0px;">
			                             甲方单位
			                          </span>
			                      </div>			                     
			                      <div class="col-sm-2">
			                          <input type="text" id="val_zjh" class="form-control" name="dwmc" value="<?php echo $dwmc;?>">
			                      </div>
								  <div class="col-sm-1"></div>
								  <div class="col-sm-2" style="width:106px">
								  	<span class="form-control" style="border:0px;">
								         年度
								       </span>
								   </div>			                     
								   <div class="col-sm-2">
								       <input type="text" id="val_zjh" class="form-control" name="nd" value="<?php echo $nd;?>">
								   </div>
								   <div class="col-sm-1"></div>
								   <div class="col-sm-2" style="width:106px">
										<span class="form-control" style="border:0px;">
								           月份
								        </span>
								    </div>			                     
								    <div class="col-sm-2">
								        <input type="text" id="val_zjh" class="form-control" name="yf" value="<?php echo $yf;?>">
								    </div>
									</div>
									 <div class="form-group">
										<div class="col-sm-2" style="width:106px">
											<span class="form-control" style="border:0px;">
												合同名称
											</span>
										</div>			                     
										<div class="col-sm-2">
											<input type="text" id="val_zjh" class="form-control" name="htmc" value="<?php echo $htmc;?>">
										</div>
									</div>	    
			              </fieldset>
			              <fieldset>
			                  <div class="form-group">
			                      <div class="col-sm-2" style="float: right;">
									  <!-- <button type="button" style="background-color: #428BCA !important;border-color: #428BCA;border: 5px solid #FF" class="btn btn-primary" onclick="subForm();"><span class="fa fa-search" style="border: 5px solid #FF"></span>&nbsp;导出</button>		 -->
										
									<button type="button" id="export" title="点击导出数据" onclick="subForm();" class=" l-btn l-btn-small l-btn-plain"  group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">导出</span><span class="l-btn-icon icon-export">&nbsp;</span></span></a>
									 	  
								  
								  </div>			                  							  							 							  
							  </div>
							  </div>
			              </fieldset>				
			         </div>
			     </div>
			
	    </body>
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
</html>