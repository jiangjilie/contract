<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<title></title>
		<link href="css/easyui.css" rel="stylesheet"/>
		<link href="css/icon.css" rel="stylesheet"/>
		<script src="js/jquery-1.10.2.min.js"></script>
			<script src="js/layer/layer.js"></script>
	</head>
	<body>
	<div  style="padding:5px;" class="datagrid-toolbar">
		<div  style="margin-bottom:5px">
	<form action="" method="post" enctype="multipart/form-data" id='Form'>
		       <table>
		       	<tr>
		       		<td ><input  type="text" style="visibility: hidden;"></td>
					
		            <td style="width: 400px;" ><input type="file" style="border: 1px;" name="file[]"  webkitdirectory multiple >
						<a href="javascript:;" id="button" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-up" plain="true" group="" ><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">上传</span><span class="l-btn-icon icon-up">&nbsp;</span></span></a>
						<a href="javascript:;" onclick="bback()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-cancel" plain="true" group="" id=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">退出</span><span class="l-btn-icon icon-cancel">&nbsp;</span></span></a>
					</td>
						
					<td><input type="text" style="visibility: hidden;"</td>
						
				<!-- 	<td>
						<a href="javascript:;" title="上传单张或多张图片" onclick="up_image()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-import" plain="true" group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">上传单张或多张图片</span><span class="l-btn-icon icon-import">&nbsp;</span></span></a>
						<a href="javascript:;" title="上传批量文件夹" onclick="up_image_many()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-import" plain="true" group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">批量上传文件夹</span><span class="l-btn-icon icon-import">&nbsp;</span></span></a>
					</td> -->
								
				</tr>
				</table>
		</form>
		</div>
		</div>
<span style="font-size: smaller;">说明：点击选择文件无需预览，然后点击上传,以合同编号命名文件夹，请勿包含中文字符</span>
	</body>
	<script>
		var files = [];
			$(document).ready(function(){
			$("input").change(function(){
			files = this.files;		
			});
		
			$("#button").click(function(){
			var fd = new FormData();
			
			for (var i = 0; i < files.length; i++) {
			fd.append("file[]", files[i]);
			
			fd.append("path[]", files[i]['webkitRelativePath']);
			// console.log(files[i]);
			// console.log(files[i]['webkitRelativePath']);
			
			}
			
			// console.log(fd);
			
			$.ajax({
			url:"up_image_one.php",
			type: "POST",  
			data: fd,  
			processData: false,  // 告诉jQuery不要去处理发送的数据  
			contentType: false   ,// 告诉jQuery不要去设置Content-Type请求头  
			cache: false,  //上传文件不需要缓存。
			success: function(data){
			layer.alert('上传成功！', {
			icon: 1,
			title: '提示',
			end:function(){
				window.parent.location.reload();
				var index = parent.layer.getFrameIndex(window.name);
				 parent.layer.close(index);
				
			}
			});
			}
			});
			
			});
		});
		function bback(){
			window.parent.location.reload(); //关闭当前窗口
		}
		function up_image(){
			layer.open({
			 type: 2,
			 title:'<center> 图片上传</center>',
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
			window.parent.location.reload(); //关闭当前窗口
			 },
				 });
		}	
		function up_image_one(){
			layer.open({
			 type: 2,
			 title:'<center> 单个文件夹上传</center>',
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
			 skin: 'layui-layer-demo',
			 closeBtn: 1,
			 anim: 2,
			 content: 'up_image_one.php',
			 end:function(){
			 window.parent.location.reload(); //关闭当前窗口
			 },
				 });
		}
			function up_image_many(){
				layer.open({
				 type: 2,
				 title:'<center> 批量文件夹上传</center>',
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
				 skin: 'layui-layer-demo',
				 closeBtn: 1,
				 anim: 2,
				 content: 'up_image_many.php',
				 end:function(){
				window.parent.location.reload(); //关闭当前窗口
				 },
					 });
			}	
	</script>
	<?php
	// echo $_POST['path'][0];
	
	$file=$_FILES['file'];	
	$file=$_FILES['file']['name']; //上传文件的名字
	$count = count($file);//计算数组长度
	$tmp_name=$_FILES['file']['tmp_name']; //上传成功后在临时文件夹的文件名字
	// $paths=$_POST['path'];
	//多文件夹上传
	// for($i=0;$i<$count;$i++ ){
	// 	$path=$paths[$i];
	// $path=substr($path,strpos($path,'/')+1,strrpos($path,'/')-strpos($path,'/')-1);   //substr() 截取字符，参数（字符串，开始位置，结束位置）,strpos() - 查找字符串首次出现的位置，strrpos() - 查找指定字符在字符串中的最后一次出现
	// 	if(!is_dir('image/'.$path)){ //需要先判断文件夹是否存	
	// 	mkdir('image/'.$path,0777);	 //mkdir 创建文件夹
	// 	}	
	// 	move_uploaded_file($tmp_name[$i],"./image/".$path."/".$file[$i]);
	// }
		 
	//单文件夹上传	 
	for($i=0;$i<$count;$i++ ){
		$path=$_POST['path'][$i];
		$path=substr($path,0,strpos($path,'/'));   //substr() 截取字符，参数（字符串，开始位置，长度）,strpos() - 查找字符串首次出现的位置
		if(!is_dir('image/'.$path)){ //需要先判断文件夹是否存	
		mkdir('image/'.$path,0777);	 //mkdir 创建文件夹
		}	
		move_uploaded_file($tmp_name[$i],"./image/".$path."/".$file[$i]);
	}
		 require("dbconfig.php");//导入配置文件
		 $link = mysql_connect(HOST,USER,PASS)or die("数据库连接失败");//连接数据库
		 	mysql_select_db(DBNAME,$link);//选择数据库
		 	mysql_query("set names 'utf8'");//选择字符集
		 		@$sql = "select bz from income where htbh='$path'";		
		 		@$result = mysql_query($sql,$link);
		 		@@$row = mysql_fetch_assoc($result);
		 		@$bz=$row["bz"]."(该合同已上传图片)";
		 		@$update="update income set bz='$bz' where htbh='$path'";
		 		@mysql_query($update);
		 		@$sql = "select bz from spend where htbh='$path'";
		 		@$result = mysql_query($sql,$link);
		 		@$row = mysql_fetch_assoc($result);
		 		@$bz=$row["bz"]."(该合同已上传图片)";
		 		@$update="update spend set bz='$bz' where htbh='$path'";
		 		@mysql_query($update);
	 ?>
</html>