<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link href="css/easyui.css" rel="stylesheet"/>
		<link href="css/icon.css" rel="stylesheet"/>
		<script src="js/jquery-1.10.2.min.js"></script>
			<script src="js/layer/layer.js"></script>
	</head>
	<body>
		<div  style="padding:5px;height:auto" class="datagrid-toolbar">
			<div  style="margin-bottom:5px">
		<form action="" method="post" enctype="multipart/form-data" id='Form'>
			<table>
				<tr>
					<td><input type="text" style="visibility: hidden;"</td>
					<td style="width: 500px;">	
					合同编号：<input type="text" id='htbh' name=" " value="<?php echo $_GET['htbh'];?>" />
					<input type="file"  name="file[]" id="doc" multiple="multiple"  style="display: none;" onchange="javascript:setImagePreviews();" accept="image/*" />
					<a href="javascript:;" title="点击上传图片"id="tab-File" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-add" plain="true" group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">添加图片</span><span class="l-btn-icon icon-add">&nbsp;</span></span></a>
					<a href="javascript:;" id="button" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-up" plain="true" group="" ><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">上传</span><span class="l-btn-icon icon-up">&nbsp;</span></span></a>
					<a href="javascript:;" onclick="bback()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-cancel" plain="true" group="" id=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">退出</span><span class="l-btn-icon icon-cancel">&nbsp;</span></span></a>
					</td>
					
					<!-- <td><input type="text" style="visibility: hidden;"</td> -->
					
					<td>
					<a href="javascript:;" title="上传单个文件夹" onclick="up_image_one()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-import" plain="true" group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">单个上传文件夹</span><span class="l-btn-icon icon-import">&nbsp;</span></span></a>
					<a href="javascript:;" title="上传单个文件夹" onclick="up_image_many()" class="easyui-linkbutton l-btn l-btn-small l-btn-plain" iconcls="icon-import" plain="true" group=""><span class="l-btn-left l-btn-icon-left"><span class="l-btn-text">批量上传文件夹</span><span class="l-btn-icon icon-import">&nbsp;</span></span></a>
					
					</td>
					
				</tr>
			</table>
			
			</div>
			</div>
			<span style="font-size: smaller;">说明：点击添加图片预览，然后点击上传</span>
			<!-- <center>预览界面</center> -->
				<div id="dd" style=" 990px;"></div>
		</form>
		<script type="text/javascript">
		
		    //下面用于多图片上传预览功能
		    function setImagePreviews(avalue) {
		        //获取选择图片的对象
		        var docObj = document.getElementById("doc");
		        //后期显示图片区域的对象
		        var dd = document.getElementById("dd");
		        dd.innerHTML = "";
		        //得到所有的图片文件
		        var fileList = docObj.files;
				// if(fileList.length>20){
				// 	layer.alert('图片数超过20张，请点击上传文件夹按钮！', {
				// 								icon: 5,
				// 								title: '提示',				// 													})				// 	return false;
				// 						}
		        //循环遍历
		        for (var i = 0; i < fileList.length; i++) {    
		            //动态添加html元素        
		            dd.innerHTML += "<div style='float:left' > <img id='img" + i + "'  /> </div>";
		            //获取图片imgi的对象
		            var imgObjPreview = document.getElementById("img"+i); 
		            
		            if (docObj.files && docObj.files[i]) {
		                //火狐下，直接设img属性
		                imgObjPreview.style.display = 'block';
		                imgObjPreview.style.width = '200px';
		                // imgObjPreview.style.height = '180px';
		                //imgObjPreview.src = docObj.files[0].getAsDataURL();
		                //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要以下方式
		                imgObjPreview.src = window.URL.createObjectURL(docObj.files[i]);   //获取上传图片文件的物理路径
		            }
		            else {
		                //IE下，使用滤镜
		                docObj.select();
		                var imgSrc = document.selection.createRange().text;
		                //alert(imgSrc)
		                var localImagId = document.getElementById("img" + i);
		               //必须设置初始大小
		                localImagId.style.width = "200px";
		                // localImagId.style.height = "180px";
		                //图片异常的捕捉，防止用户修改后缀来伪造图片
		                try {
		                    localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
		                    localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
		                }
		                catch (e) {
		                    alert("您上传的图片格式不正确，请重新选择!");
		                    return false;
		                }
		                imgObjPreview.style.display = 'none';
		                document.selection.empty();
		            }
		        }  
		        return true;
		    }
		
		</script>
		
		<script>
			//点击事件触发file的点击				
			$("#tab-File").click(function() {
				$("#doc").click();
			}) 
			
		
			
		
			var files = [];
			$(document).ready(function(){
				$("#doc").change(function(){
				files = this.files;		
				});
				})
		
			$("#button").click(function(){
				var htbh = document.getElementById('htbh').value;
				if(htbh!==''){
					var fd = new FormData();
					
					for (var i = 0; i < files.length; i++) {
					fd.append("file[]", files[i]);						
					// fd.append("path[]", files[i]['webkitRelativePath']);
					// console.log(files[i]);
					// console.log(files[i]['webkitRelativePath']);
					}
					fd.append("htbh",htbh);
					// console.log(fd);
					
					$.ajax({
					url:"up_image.php",
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
						// layer.closeAll();
						window.parent.location.reload();
						var index = parent.layer.getFrameIndex(window.name);
						 parent.layer.close(index);
									}
											});
											}
							});
								}else{
									layer.alert('合同编号不能为空！', {
									icon: 5,
									title: '提示',
									end:function(){
										$('#htbh').focus();
										return false;
									}
									});
								}
										})
			function bback(){
				var index = parent.layer.getFrameIndex(window.name);
				parent.layer.close(index);// 关闭子窗口
				// layer.closeAll();
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
				 title:'<center><h3> 单个文件夹上传</center>',
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
				//  end:function(){
				// window.parent.location.reload(); //关闭当前窗口
				//  },
					 });
			}
				function up_image_many(){
					layer.open({
					 type: 2,
					 title:'<center><h3> 批量文件夹上传</center>',
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
				// 	 end:function(){
				// window.parent.location.reload(); //关闭当前窗口
				// 	 },
						 });
				}	
		</script>
	</body>
	<?php
		$file=$_FILES['file']; 
		$path=$_POST['htbh'];
		
		$file=$_FILES['file']['name']; //上传文件的名字
		$count = count($file);//计算数组长度
		$tmp_name=$_FILES['file']['tmp_name']; //上传成功后在临时文件夹的文件名字
		// echo $tmp_name[0];
		
		// echo"$image[0]";
	 //获取图片所有的属性
	 
	 // $filename=$_FILES['myFile']['name'];  //客户端文件的原名称。['myfile']为表单name的值
	 
	 // $type=$_FILES['myFile']['type'];//文件的 MIME 类型，需要浏览器提供该信息的支持，例如"image/gif"。
	 
	 // $tmp_name=$_FILES['myFile']['tmp_name'];//已上传文件的大小，单位为字节。 文件被上传后在服务端储存的临时文件名********重要
	 	 
	 // $size=$_FILES['myFile']['size'];//已上传文件的大小，单位为字节。 
	 
	 // $error=$_FILES['myFile']['error'];// 和该文件上传相关的错误代码。['error'] 是在 PHP 4.2.0 版本中增加的。下面是它的说明：(它们在PHP3.0以后成了常量) UPLOAD_ERR_OK 值：0; 没有错误发生，文件上传成功。 UPLOAD_ERR_INI_SIZE 值：1; 上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。 UPLOAD_ERR_FORM_SIZE 值：2; 上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。UPLOAD_ERR_PARTIAL 值：3; 文件只有部分被上传。 UPLOAD_ERR_NO_FILE 值：4; 没有文件被上传。 值：5; 上传文件大小为0. 
		
	// if(!file_exists('./image')){   //检测目录是否存在
	// 	mkdir('image');   //若不存在则创建image目录
	// }

		$path=iconv("UTF-8","gbk",str_replace(' ','',$path));
		for($i=0;$i<$count;$i++ ){
		if(!is_dir('image/'.$path)){ //需要先判断文件夹是否存
		mkdir('image/'.$path,0777);	 //mkdir 创建文件夹
		}
		
		move_uploaded_file($tmp_name[$i],"./image/".$path."/".iconv("UTF-8","gbk",str_replace(' ','',$file[$i])));	 //str_replace 去除字符串中的空格   iconv进行转码
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