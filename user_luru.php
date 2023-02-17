<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <title>档案管理系统</title>
    <link href="dagl/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <meta name="viewport" content="width=device-width">
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="Content/datatables/dataTables.bootstrap.css" rel="stylesheet">
<link href="css/ionicons.min.css" rel="stylesheet">
<link href="Content/ace/css/ace.min.css" rel="stylesheet">
<link href="css/_all-skins.min.css" rel="stylesheet">
<link href="css/toastr.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<style>
	.col-sm-3 {
	    width: 35%;
	}
</style>
    <!--[if lt IE 9]>
    <script src="~/Scripts/Content/html5shiv.min.js"></script>
    <script src="~/Scripts/Content/respond.js"></script>
    <![endif]-->
<link rel="stylesheet" href="http://10.0.175.249dagl/Scripts/Content/layer/skin/default/layer.css?v=3.0.3303" id="layuicss-skinlayercss"></head>
<body>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form id="Form" id="formAdd" data-parsley-validate="" class="form-horizontal" novalidate="">
                        <div class="panel-body">
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-sm-2"style="width:106px"><label class="lable-title control-label">用户名</label></div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" required="" id="txtUserName" name="admin" placeholder="">
                                    </div>
                                    <div class="col-sm-2"style="width:106px"><label class="lable-title control-label">姓名</label></div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="txtName" name="name" placeholder="">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-sm-2"style="width:106px"><label class="lable-title control-label">密码</label></div>
                                    <div class="col-sm-3">
                                        <input type="password" class="form-control" name="password" id="txtPassWord" placeholder="" required="">
                                    </div>
									<div class="col-sm-2"style="width:106px"><label class="lable-title control-label">邮箱</label></div>
									<div class="col-sm-3">
									    <input type="text" class="form-control" id="txtEmail" data-parsley-type="email" name="email" placeholder="" onchange="CkEmail()">
									</div>
                                   <!-- <div class="col-sm-2"style="width:106px"><label class="lable-title control-label">角色</label></div>
                                    <div class="col-sm-3">
                                         <input type="text" class="form-control" required="" id="txtUserName" name="role" placeholder="">
                                    </div> -->

                                </div>
                            </fieldset>
                          <!--  <fieldset>
                                <div class="form-group">
                                    <div id="emerror">
                                        <div class="col-sm-2"style="width:106px"><label class="lable-title control-label">邮箱</label></div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="txtEmail" data-parsley-type="email" name="email" placeholder="" onchange="CkEmail()">
                                        </div>
                                    </div>

                                   <div class="col-sm-2"style="width:106px"><label class="lable-title control-label">所属部门</label></div>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control" required="" id="txtUserName" name="dept" placeholder="">
                                    </div>
                                </div>
                            </fieldset> -->
                            <fieldset>
                                <div class="form-group">
                                    <div id="mberror">
                                        <div class="col-sm-2"style="width:106px"><label class="lable-title control-label">联系电话</label></div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="txtMobile" name="phone" placeholder="" onchange="CkMobile()">
                                        </div>
                                    </div>
									<div class="col-sm-2"style="width:106px"><label class="lable-title control-label">备注</label></div>
									<div class="col-sm-3">
									    <input type="text" class="form-control" id="txtMobile" name="bz" placeholder="" onchange="CkMobile()">
                                </div>
                            </fieldset>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer layer-footer">
                            <button type="button" class="btn btn-default" onclick="Cancel()">退出</button>
                            <button type="button" class="btn btn-primary" onclick="Save()">保存</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/layer/layer.js"></script>
<script>
	function Save(){
		$.ajax({
				type:"post",			
				url:"user_luruphp.php",
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
	function Cancel(){
		window.location.reload();//刷新父页面
		var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
		parent.layer.close(index); //再执行关闭
		}
</script>

</body></html>