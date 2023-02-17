<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>图片查看</title>
	<link type="text/css" rel="stylesheet" href="css/image.css" />
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	
	<!-- <link type="text/css" rel="stylesheet" href="css/table.css" /> -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/Common.js"></script>
	<script src="js/layer/layer.js"></script>
	<script src="js/jquery-migrate-1.1.0.js"></script>
	<script src="js/jquery.jqprint-0.3.js"></script>
	<script src="js/image.js"></script>
	<link rel="stylesheet" href="css/jquery.treeview.css" type="text/css"/>
	<script src="js/jquery.treeview.js" type="text/javascript"></script>
	<link href="css/scrollbox.css" rel="stylesheet"/>
	
	</head>
	<body>
		<input type='text' id="htbh" style="display: none;" value="<?php echo $_GET['htbh'];?>" />
		<?php
		// $id = $_GET['id'];
		// $con = mysql_connect("localhost","root","123456");
		// 	if(!$con){
		// 	echo "<br/>数据库连接失败".mysql_error();
		// 	}
		// //选择数据库
		// 	mysql_select_db("contract");
		// 	//设置mysql字符编码
		// 	mysql_query("set names utf8;");	
		// 	$sql="select * from income where id=$id";
		// 	$result=mysql_query($sql);
		// 	$row=mysql_fetch_assoc($result);
		// 	$htbh=$row["htbh"]
		
		?>
	<div class="alldiv" style="height:900px;">
		<div class="image-list" >
			<div class="scrollbox">
				<div class="image-table-title">
					<span>卷内目录</span>
				</div>
				<div style="color:black">
					<ul id="treeview" class="filetree">
					<li><span class="folder">
					<?php
					$htbh = $_GET['htbh'];
					// $ND = substr($htbh,2,4);	
					// $path = "image/".$ND."/".$htbh;	//图片保存的目录
					$path = "image/".$htbh;
					// $pathtitle = substr($path,10,18);
					echo $htbh;
					 ?>
					 </span>
					<?php 
					function createDir($path = '.') { 
					if (@$handle = opendir($path)) 
					{ 
					echo "<ul>"; 
					while (false !== ($file = readdir($handle))) 
					{ 
					if (is_dir($path.$file) && $file != '.' && $file !='..') 
					printSubDir($file, $path, $queue); 
					else if ($file != '.' && $file !='..') 
					$queue[] = $file; 
					} 
					printQueue($queue, $path); 
					echo "</ul>"; 
					}else{
						echo"
						<script>
						 layer.alert('未获取到图片，是否上传', {
						 icon: 5,
						 title: '提示',
						  btn: ['确定', '取消'],
						  yes:function(){
							  var htbh=document.getElementById('htbh').value;
							  layer.open({
							   type: 2,
							   title:'<center> 图片上传</center>',							 
							   shade: [0.5, '#000'],							 
							   shadeClose: true,							  							 
							   shift: 0,						
							   offset:'t',  //设置弹出位置
							   area: ['1000px', '700px'],
							   closeBtn: 1,
							   anim: 2,
							   content: 'up_image.php?htbh='+ htbh,	
							  	 });
						  },
						 end:function (){
							window.close();
							
							 
						 },
						 });
						</script>";
						   exit();
						   // return false;
					}
					} 
					function printQueue($queue, $path) 
					{ 
						$i=0;
					foreach ($queue as $file) 
					{ 
						$i++;
					printFile($file, $path,$i); 
					} 
					} 
					function printFile($file, $path,$i) 
					{
					$htbh = $_GET['htbh'];
					$xmmc = $_GET['xmmc'];
					$xmbh = $_GET['xmbh'];
					$htmc = $_GET['htmc'];
					$dwmc = $_GET['dwmc'];
					$lxr = $_GET['lxr'];
					$qdsj = $_GET['qdsj'];					
					$bz = $_GET['bz'];
					// $file=substr($file,0,100);
					$file=iconv("gbk","UTF-8",$file);
					$file=substr($file,0,strlen($file)-4);
					$number=$i;
					$number=$number-1;
					
					echo "<li ><a href='?htbh=$htbh&path=$path&page=$number&xmmc=$xmmc&xmbh=$xmbh&htmc=$htmc&lxr=$lxr&qdsj=$qdsj&bz=$bz&dwmc=$dwmc' ><span class='file'>$file</span></a></li>"; 
					} 
					function printSubDir($dir, $path) 
					{ 
					echo "<li><span class=\"toggle\">$dir</span>"; 
					createDir($path.$dir."/"); 
					echo "</li>"; 
					} 
					createDir($path); 
					?> 
					</div>
					</div>
				</div> 				
		<div class="imageShow">
			<div  id="imgdiv" class="dragAble"style="position:absolute;width:100%;height:100%;">
				<div style="position: absolute; width: 300px; height: 40px; z-index: 99; transform: rotate(30deg); font-family: 华文彩云; color: red; font-size: 36px; margin-left: 339.5px; margin-top: 462.31px;" id="sydiv"></div>
				
				<!--startprint1-->
				<!--打印内容开始-->
				<?php
				$page=isset($_GET['page'])?$_GET['page']:0;//获取当前页数
				$imgnums = 1;    //设置每页显示图片最大张数
				$htbh = $_GET['htbh'];
			// $ND = substr($htbh,2,4);
			// $path = "image/".$ND."/".$htbh;	//图片保存的目录
			$path = "image/".$htbh;
				$handle = opendir($path);
				$i=0;
				while (false !== ($file = readdir($handle))) {//遍历该图片所在目录 
				   list($filesname,$ext)=explode(".",$file);//获取扩展名
				   if($ext=="gif" or $ext=="jpg" or $ext=="JPG" or $ext=="GIF" or $ext=="pdf" or $ert=="PDF" ) {//文件过滤  
					   if (!is_dir('./'.$file)) {//文件夹过滤
						  $array[]=$file;//把符合条件的文件名存入数组
						  ++$i;//记录图片总张数 
					   }
				   }
				}
				for($j=$imgnums*$page; $j<($imgnums*$page+$imgnums)&&$j<$i; ++$j){//循环条件控制显示图片张数
					echo "<img  style='position:absolute;height:960px;cursor:move;' id='imgpanel' src=".$path."/".iconv("gbk","UTF-8",$array[$j])." onmouseover='dragObj=imgpanel;drag=1;this.style.cursor='move';' onmouseout drag='0' onmousewheel='return rollImg(this)'><br />";
					}
				
				?>
				<!--打印内容结束-->
				<!--endprint1-->
			</div>
		</div>
		<div class="image-table">
			<div class="image-table-title">
				<span>合同信息</span>
			</div>
			<table width=100% border=0 >
				<tr class="image-table-tr">
					 <th width="100px" class="image-table-th" >项目名称</th>
				</tr>
				<tr align=center>
					 <td class="image-table-td"><?php echo"$xmmc";?></td>
				</tr>
				<tr class="image-table-tr">
					 <th width="100px" class="image-table-th">项目编号</th>
				</tr>
				<tr align=center>
					 <td class="image-table-td"><?php echo"$xmbh";?></td>
				</tr>
				<tr class="image-table-tr">
					 <th width="200px" class="image-table-th">甲方单位</th>
				</tr>
				<tr align=center>
					 <td class="image-table-td"><?php echo"$dwmc";?></td>
				</tr>
				<tr class="image-table-tr">
					 <th width="200px" class="image-table-th">合同名称</th>
				</tr>
				<tr align=center>
					 <td class="image-table-td"><?php echo"$htmc";?></td>
				</tr>
				<tr class="image-table-tr">
					 <th width="300px" class="image-table-th">合同编号</th>
				</tr>
				<tr align=center>
					 <td class="image-table-td"><?php echo"$htbh";?></td>
				</tr>
				<tr class="image-table-tr">
					 <th width="50px" class="image-table-th">联系人</th>
				</tr>
				<tr align=center>
					 <td class="image-table-td"><?php echo"$lxr";?></td>	
				</tr>
				<tr class="image-table-tr">
					 <th width="50px" class="image-table-th">签订时间</th>
				 </tr>
				 <tr align=center>
					 <td class="image-table-td"><?php echo"$qdsj";?></td>	
				  </tr>
				</table>
				<div class="pagechange">	
						<?php
						 $realpage = @ceil($i / $imgnums) - 1;
						 $Prepage = $page-1;
						 $Nextpage = $page+1;
						  if($Prepage<0){   //首页
							// echo "<a href=?DAH=$DAH&path=$path&XMMC=$XMMC&WH=$WH&ZRZ=$ZRZ&TM=$TM&RQ=$RQ&MJ=$MJ&BZ=$BZ class='imageHref'>上一页</a> ";
							echo "<a href='javascript:void(0);' class='imageHref'>上一页</a> ";
							echo "<a href=?htbh=$htbh&path=$path&page=$Nextpage&xmmc=$xmmc&xmbh=$xmbh&htmc=$htmc&lxr=$lxr&qdsj=$qdsj&bz=$bz&dwmc=$dwmc class='imageHref'>下一页</a> ";
						}elseif($Nextpage>$realpage){  //最末页
							echo "<a href=?htbh=$htbh&path=$path&page=$Prepage&xmmc=$xmmc&xmbh=$xmbh&htmc=$htmc&lxr=$lxr&qdsj=$qdsj&bz=$bz&dwmc=$dwmc class='imageHref'>上一页</a> ";
							// echo "<a href=?DAH=$DAH&path=$path&XMMC=$XMMC&WH=$WH&ZRZ=$ZRZ&TM=$TM&RQ=$RQ&MJ=$MJ&BZ=$BZ class='imageHref'>下一页</a> ";
							echo "<a href='javascript:void(re0);' class='imageHref'>下一页</a> ";
						}else{	//中间页
							echo "<a href=?htbh=$htbh&path=$path&page=$Prepage&xmmc=$xmmc&xmbh=$xmbh&htmc=$htmc&lxr=$lxr&qdsj=$qdsj&bz=$bz&dwmc=$dwmc class='imageHref'>上一页</a> ";
							echo "<a href=?htbh=$htbh&path=$path&page=$Nextpage&xmmc=$xmmc&xmbh=$xmbh&htmc=$htmc&lxr=$lxr&qdsj=$qdsj&bz=$bz&dwmc=$dwmc class='imageHref'>下一页</a> ";
						}
						?>
						<!-- <input type=button name='button_export' title='打印' onclick=preview(1) value=打印> -->
						<button type="button" class="btn btn-primary" onclick="imgToSize(50)"><span class="fa fa-search"></span>&nbsp;放大</button>
						<button type="button" class="btn btn-primary" onclick="imgToSize(-50)"><span class="fa fa-search"></span>&nbsp;缩小</button>
						<button type="button" class="btn btn-primary" onclick="Rotate()"><span class="fa fa-search"></span>&nbsp;旋转</button>
					</div>
					<!-- <div style="width=100%;height: 20%; position:relative;"> -->
						<button type="button" class="btn btn-primary" onclick=imgPrint(<?php echo $page;?>)><span class="fa fa-search"></span>&nbsp;打印</button>
						<!-- <button type="button" class="btn btn-primary" id="print" onclick="window.open('image_pldy.php?<?php echo"htbh=$htbh&path=$path&xmmc=$xmmc&xmbh=$xmbh&htmc=$htmc&lxr=$lxr&qdsj=$qdsj&bz=$bz&dwmc=$dwmc";?>')"><span class="fa fa-search"></span>&nbsp;批量打印</button> -->
						<button type="button" class="btn btn-primary"  onclick=imgPrintCn()><span class="fa fa-search"></span>&nbsp;批量打印</button>
						<button type="button" class="btn btn-primary"  onclick=back()><span class="fa fa-search"></span>&nbsp;返回</button>
						<button type="button" class="btn btn-primary"  onclick=delimg()><span class="fa fa-search"></span>&nbsp;清空图片</button>
					 <!-- </div> -->
	
		</div>
	</div>
	</body>
	<script>
		function imgPrint(page){
					var page=page-0+1;   //用减法或者乘除法会将字符串转换为数字类型在进行运算以达到字符串转换数字类型的操作
					 var url = "image_pldy.php?ksy=" + page + "&jsy=" + page + "&<?php echo"DAH=$DAH&path=$path&ND=$ND&WH=$WH&ZRZ=$ZRZ&TM=$TM&RQ=$RQ&BGQX=$BGQX&BZ=$BZ";?>";
					 window.open(url);
				}
		function imgPrintCn() {
				layer.open({
				 type: 1,
				 skin: 'layui-layer-demo',
				 closeBtn: 1,
				 anim: 2,
				 shadeClose: true,
				 content: '<div class="col-sm-12"><div class="panel-body form-horizontal"><fieldset><div class="form-group"></fieldset><fieldset><div class="form-group"><div class="col-sm-4"><label class="control-label">开始页:</label></div><div class="col-sm-8"><input type="text" id="ksy" class="form-control"" /></div></fieldset><fieldset><div class="form-group"><div class="col-sm-4"><label class="control-label">结束页:</label></div><div class="col-sm-8"><input type="text" id="jsy" class="form-control" /></div></fieldset></div></div>',
				 btn: ["打印", "取消"],
				 yes: function () {
				                     var ksy = $("#ksy").val();
				                     var jsy = $("#jsy").val();
				                     var url = "image_pldy.php?ksy=" + ksy + "&jsy=" + jsy + "&<?php echo"htbh=$htbh&path=$path&xmmc=$xmmc&xmbh=$xmbh&htmc=$htmc&lxr=$lxr&qdsj=$qdsj&bz=$bz&dwmc=$dwmc";?>";
				                     window.open(url);
				                 },
				});
			}		
	</script>
	<script type="text/javascript">
	    $(document).ready(function(){
	        $("#treeview").treeview({
	            toggle: function() {
	                console.log("%s was toggled.", $(this).find(">span").text());
	            }
	        });
	    });
	</script>
	<script>
		function back(){
			window.close(); //返回上一页
			// window.history.back();location.reload();//强行刷新(返回上一页刷新页面）
		}
	</script>
	<script>
		function delimg(){
		var htbh = $("#htbh").val();
		window.location.href="del_image.php?htbh="+htbh;
		}
	</script>
</html>