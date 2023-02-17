<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta charset="utf-8">
		<title>文书档案查询</title>
	<link type="text/css" rel="stylesheet" href="css/image.css" />
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<!-- <link type="text/css" rel="stylesheet" href="css/table.css" /> -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/Common.js"></script>
	<script src="js/layer.js"></script>
	<script src="js/jquery-migrate-1.1.0.js"></script>
	<script src="js/jquery.jqprint-0.3.js"></script>
	<script src="js/image.js"></script>
	</head>
	<body>
		<button  style="display:none" type="button" class="btn btn-primary" id="pldy" onclick=preview(1)><span class="fa fa-search"></span>&nbsp;批量打印</button>							
				<!--startprint1-->
				<!--打印内容开始-->
				<?php					
				    // $page=isset($_GET['page'])?$_GET['page']:0;//获取当前页数
					$ksy=$_GET['ksy']-1;
					$jsy=$_GET['jsy'];
				    // $imgnums = $jsy-$jsy+1;    //设置每页显示图片最大张数
				    $path=$_GET['path']; 	//图片保存的目录
				    $handle = opendir($path);
				    $i=0;
				    while (false !== ($file = readdir($handle))) {//遍历该图片所在目录 
				       list($filesname,$ext)=explode(".",$file);//获取扩展名
				       if($ext=="gif" or $ext=="jpg" or $ext=="JPG" or $ext=="GIF" ) {//文件过滤  
				           if (!is_dir('./'.$file)) {//文件夹过滤
				              $array[]=$file;//把符合条件的文件名存入数组
				              ++$i;//记录图片总张数 
				           }
				       }
				    }
				    for($j=$ksy; $j<$jsy; ++$j){//循环条件控制显示图片张数
				       //echo $array[$j],'<br />';
					  // echo "<a href=".$path."/".$array[$j]."><br />";
				       echo "<img style=' height:950px;margin-top:-20px;' src=".$path."/".$array[$j]." onmousewheel='return rollImg(this)'><br />";
				    }
					?>
				<!--打印内容结束-->
				<!--endprint1-->
	</body>
	<script>
	window.onload=function(){
		document.getElementById("pldy").click();   
	}
	</script>
	<script language="javascript">
		var i = 2;
			function clock(){
				i = i - 1;
				document.title="本窗口将在" + i + "秒后自动关闭!";	
				if (i > 0) {
					setTimeout("clock();",1000);
				} else {
					self.close();
				}
			}	
			clock();	
	</script>
</html>