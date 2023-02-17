<?php
ini_set("memory_limit","80M");   //解决内存溢出
/**
     * 批量导出数据
     * @param $arr 从数据库查询出来，即要导出的数据
     *  $name excel表歌名
     */
    function expExcel($arr,$name,$data){
 
        require_once 'PHPExcel.php';
		require_once 'PHPExcel/IOFactory.php';		
		require_once 'PHPExcel/Reader/Excel5.php';
        // Vendor('PHPExcel.PHPExcel');
        // Vendor('PHPExcel.Autoloader');
 
        //实例化
        $objPHPExcel = new PHPExcel();
        /*右键属性所显示的信息*/
        $objPHPExcel->getProperties()->setCreator("jiuwu")  //作者
        ->setLastModifiedBy("jiuwu")  //最后一次保存者
        ->setTitle('数据EXCEL导出')  //标题
        ->setSubject('数据EXCEL导出') //主题
        ->setDescription('导出数据')  //描述
        ->setKeywords("excel")   //标记
        ->setCategory("result file");  //类别
 
 
        //设置当前的表格
        $objPHPExcel->setActiveSheetIndex(0);
        // 设置表格第一行显示内容
        $objPHPExcel->getActiveSheet()
            ->setCellValue('A1', '年度')
            ->setCellValue('B1', '项目名称')
            ->setCellValue('C1', '合同类型')
            ->setCellValue('D1', '合同编号')
            ->setCellValue('E1', '项目编号')
            ->setCellValue('F1', '项目名称')
            ->setCellValue('G1', '单位名称')
            ->setCellValue('H1', '联系人')
            ->setCellValue('I1', '合同总额')
            ->setCellValue('J1', '已收款')
            ->setCellValue('K1', '应收款')
            ->setCellValue('L1', '支出总额')
            ->setCellValue('M1', '已付款')
            ->setCellValue('N1', '未付款')
            ->setCellValue('O1', '备注')          
            ->setCellValue('P1', '部门')          
            ->setCellValue('Q1', '收入总额')          
            ->setCellValue('R1', '已收款')          
            ->setCellValue('S1', '收入比例')          
            ->setCellValue('T1', '支出总额')          
            ->setCellValue('U1', '已支出')          
            ->setCellValue('V1', '支出比例')          
            ->setCellValue('W1', '项目汇总')          
            ->setCellValue('X1', '比例比较')          
            ->getStyle('Q1:X1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED) //设置第一行字体颜色
			->getActiveSheet()->freezePane('A2'); //冻结窗口
			// $objPHPExcel->getActiveSheet()->mergeCells('A1:P1'); //设置合并单元格
			$objPHPExcel->getActiveSheet()->getStyle('A1:X1')->getFont()->setBold(true);  //设置第一行字体加粗
        $key = 1;
        /*以下就是对处理Excel里的数据，横着取数据*/
        foreach($arr as $v){
 
            //设置循环从第二行开始
            $key++;
            $objPHPExcel->getActiveSheet()
 
                //Excel的第A列，name是你查出数组的键值字段，下面以此类推
                ->setCellValue('A'.$key, $v['nd'])
                ->setCellValue('B'.$key, $v['xmmc'])
                ->setCellValue('C'.$key, $v['htlx'])
                ->setCellValue('D'.$key, $v['htbh'])
                ->setCellValue('E'.$key, $v['xmbh'])
                ->setCellValue('F'.$key, $v['dwmc'])
                ->setCellValue('G'.$key, $v['htmc'])
                ->setCellValue('H'.$key, $v['lxr'])
                ->setCellValue('I'.$key, $v['srhtze'])
                ->setCellValue('J'.$key, $v['ysk'])
                ->setCellValue('K'.$key, $v['gsk'])
                ->setCellValue('L'.$key, $v['zchtze'])
                ->setCellValue('M'.$key, $v['yfk'])
                ->setCellValue('N'.$key, $v['wfk'])
                ->setCellValue('O'.$key, $v['bz'])
                ->setCellValue('P'.$key, $v['dept']);

        }
		foreach($data as $v){
		 
		    //设置循环从第二行开始
		    $key++;
		    $objPHPExcel->getActiveSheet()
		 
		        //Excel的第A列，name是你查出数组的键值字段，下面以此类推
		        ->setCellValue('A'.$key, $v['nd'].'年数据统计：')
		        ->setCellValue('B'.$key, '')
		        ->setCellValue('C'.$key, '')
		        ->setCellValue('D'.$key, '')
		        ->setCellValue('E'.$key, '')
		        ->setCellValue('F'.$key, '')
		        ->setCellValue('G'.$key, '')
		        ->setCellValue('H'.$key, '')
		        ->setCellValue('I'.$key, '')
		        ->setCellValue('J'.$key, '')
		        ->setCellValue('K'.$key, '')
		        ->setCellValue('L'.$key, '')
		        ->setCellValue('M'.$key, '')
		        ->setCellValue('N'.$key, '')
		        ->setCellValue('O'.$key, '')
		        ->setCellValue('P'.$key, '')
		        ->setCellValue('Q'.$key, $v['srze'])
		        ->setCellValue('R'.$key, $v['ysk'])
		        ->setCellValue('S'.$key, $v['srbl'])
		        ->setCellValue('T'.$key, $v['zcze'])
		        ->setCellValue('U'.$key, $v['yzc'])
		        ->setCellValue('V'.$key, $v['zcbl'])
		        ->setCellValue('W'.$key, $v['mlr'])
		        ->setCellValue('X'.$key, $v['blbj']);
				

		
		}
		
        //设置当前的表格
        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean();  //清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel'); //文件类型
        header('Content-Disposition: attachment;filename="'.$name.'.xls"'); //文件名
        header('Cache-Control: max-age=0');
        header('Content-Type: text/html; charset=utf-8'); //编码
        //解决报错的问题：Class 'Warehouse\Controller\PHPExcel_IOFactory' not found
        //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');//原始路径
        //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  //excel 2003
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');//新路径
 
        $objWriter->save('php://output');
        exit;
    }
 /***********调用**********************/
 // header("Content-type:text/html;charset=utf-8");
  
 //链接数据库
 $link = @mysql_connect('localhost','root','123456') or die('连接数据库失败');
 mysql_select_db('contract',$link);
 mysql_query('set names utf8');
  $wherelist = array();//获取查询条件
  	if(!empty($_GET['htbh'])){
  		$wherelist[] = "htbh like '%{$_GET['htbh']}%'";
  	}
  	if(!empty($_GET['xmbh'])){
  		$wherelist[] = "xmbh like '%{$_GET['xmbh']}%'";
  	}
  	if(!empty($_GET['xmmc'])){
  		$wherelist[] = "xmmc like '%{$_GET['xmmc']}%'";
  	}
  	if(!empty($_GET['dwmc'])){
  		$wherelist[] = "dwmc like '%{$_GET['dwmc']}%'";
  	}
  	if(!empty($_GET['htmc'])){
  		$wherelist[] = "htmc like '%{$_GET['htmc']}%'";
  	}
  	if(!empty($_GET['yf'])){
  		$wherelist[] = "yf like '%{$_GET['yf']}%'";
  	}
  	if(!empty($_GET['nd'])){
  		$wherelist[] = "nd like '%{$_GET['nd']}%'";
  	}
	if(!empty($_POST['lxr'])){
		$wherelist[] = "lxr like '%{$_GET['lxr']}%'";
	}
	if(!empty($_POST['dept'])){
		$wherelist[] = "dept like '%{$_GET['dept']}%'";
	}
  	if(!empty($_GET['begin'])){
  		$wherelist[] = "date >= '{$_GET['begin']}'";
  	}
  	if(!empty($_GET['finish'])){
  		$wherelist[] = "date <= '{$_GET['finish']}'";
  	}
  	
  if(count($wherelist) > 0){         //组装查询条件
  	$where = " where ".implode(' AND ' , $wherelist); 
  }
 //先获取数据
 $sql = "select * from contract $where";
 $res = mysql_query($sql);
 $arr = array();
 //把$res=>$arr,把结果集内容转移到一个数组中
 while ($row = mysql_fetch_assoc($res)){
  $arr[] = $row;
 }
 $sql="select id,time,nd,yf,xmmc,xmbh, sum(srhtze) as sz,sum(ysk) as ys,sum(gsk) as gs,sum(srse) as srse,sum(zchtze) as zz,sum(yfk) as yfk,sum(wfk) as wf,sum(zcse) as zcse,sum(fkje) as fkje,sum(lxse) as lxse from contract $where   group by nd order by nd desc";
  
 $res = mysql_query($sql);
 // $arry = array();
  while ($row = mysql_fetch_assoc($res)){
  if($row["sz"]!=0&& $row["sz"]!==''){
   $sz = number_format($row["sz"],2)."元";
  }else{
   $sz = 0;
  }
  if($row["ys"]!=0 && $row["ys"]!==''){
   $ys = number_format($row["ys"],2)."元";
  }else{
   $ys = 0;
  }
  
  if ($row['sz'] != 0) {
  $srbl =  $row['ys']/$row['sz'];
  $srbl =  number_format($srbl, 2);
  $srbl=($srbl*100)."%";
  }else{
  	$srbl= '0%' ;
  }
  if($row["zz"]!=0&& $row["zz"]!==''){
   $zz = number_format($row["zz"],2)."元";
  }else{
   $zz = 0;
  }
  if($row["yfk"]!=0 && $row["yfk"]!==''){
   $yfk = number_format($row["yfk"],2)."元";
  }else{
   $yfk = 0;
  }				
  if ($row['zz'] != 0) {
  $zcbl =  $row['yfk']/$row['zz'];
  $zcbl =  number_format($zcbl, 2);
  $zcbl=($zcbl*100)."%";
  }else{
  	$zcbl= '0%' ;
  }
  if($row["fkje"]!=0&& $row["fkje"]!==''){
   $fkje = number_format($row["fkje"],2)."元";
  }else{
   $fkje = 0;
  }
  $ml =  $row['sz']-$row['zz']-$row['fkje']-$row['srse']+$row['zcse']+$row['lxse'];
  if($ml!=0 && $ml!=''){
   $ml = number_format($ml,2)."元";
  }else{
   $ml = 0;
  }
  
  $bj = $srbl - $zcbl ;
  // $bj =  number_format($bj, 2);
  $bj=($bj)."%";
  	//将查询结构集重新数组化
  	$data[]=array("id"=>$row["id"],"time"=>$row["time"],"nd"=>$row["nd"],"yf"=>$row["yf"],"xmbh"=>$row["xmbh"],"xmmc"=>$row["xmmc"],"srze"=>$sz,"ysk"=>$ys,"gsk"=>$row["gs"],"srbl"=>$srbl,"zcze"=>$zz,"yzc"=>$yfk,"wfk"=>$row["wf"],"zcbl"=>$zcbl,"mlr"=>$ml,"blbj"=>$bj);
  	// $data[] = $row;
  }
  
 //excel表格名
 $name = "年度统计表";
  
 //调用
 expExcel($arr,$name,$data);
 
 function Manage_exportfile ($fields,$data,$name){
	 require_once 'PHPExcel.php';
	 require_once 'PHPExcel/IOFactory.php';		
	 require_once 'PHPExcel/Reader/Excel5.php';
	 Vendor('PHPExcel.PHPExcel');
	 Vendor('PHPExcel.Autoloader');
        // Vendor('PHPExcel.PHPExcel');
        // Vendor('PHPExcel.Autoloader');
        $file_name = $name.'_'.uniqid();
        // 首先创建一个新的对象  PHPExcel object
        $objPHPExcel = new PHPExcel();
 
        // 设置文件的一些属性，在xls文件——>属性——>详细信息里可以看到这些值，xml表格里是没有这些值的
        $objPHPExcel
            ->getProperties()  //获得文件属性对象，给下文提供设置资源
            ->setCreator( "Itsean")                 //设置文件的创建者
            ->setLastModifiedBy( "Itsean")          //设置最后修改者
            ->setTitle($name)    //设置标题
            ->setSubject($name)  //设置主题
            ->setDescription(iconv('utf-8', 'gb2312', "The File Great By Xvdesign.Com !The Site:http://www.xvdesign.com/")) //设置备注
            ->setKeywords($name.' Itsean')        //设置标记
            ->setCategory($name.' Itsean');                //设置类别
        // 位置aaa  *为下文代码位置提供锚
        // 给表格添加数据
        $objActSheet = $objPHPExcel->setActiveSheetIndex(0);             //设置第一个内置表（一个xls文件里可以有多个表）为活动的
        $excel_col = 'A';
        $excel_row = 1;
        //dump($data);die;
        //dump($fields);die;
        foreach ($fields as $key => $field) {
            $objActSheet->setCellValue($excel_col.$excel_row, $field[1]);
            if($field[2]){
                $objActSheet->getColumnDimension($excel_col) -> setWidth($field[2]/10);
            }
            //$objActSheet->getStyle($excel_col.$excel_row)->getAlignment()->setHorizontal('center');
            $objActSheet->getStyle($excel_col.$excel_row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objActSheet->getStyle($excel_col.$excel_row)->getFill()->getStartColor()->setARGB('ffcccccc');
            //$objActSheet->getColumnDimension($excel_col)->setWidth(20);
 
            $objActSheet->getStyle($excel_col.$excel_row)->getAlignment()->setHorizontal('left');
            //$objActSheet->getStyle('B'.$excel_row)->getAlignment()->setHorizontal('left');
            //$objActSheet->getStyle('E'.$excel_row)->getAlignment()->setHorizontal('left');
 
 
            $excel_col++;
        }
 
        //设置宽度
        // $objActSheet->getColumnDimension('A')->setWidth(30);
        // $objActSheet->getColumnDimension('B')->setWidth(30);
        // $objActSheet->getColumnDimension('C')->setWidth(15);
        // $objActSheet->getColumnDimension('D')->setWidth(50);
 
        //dump($objActSheet);die;
        $excel_row++;
        foreach ($data as $k => $v) {
            $excel_col = 'A';
            foreach ($fields as $key => $field) {
                /*$objActSheet->getStyle('A'.$excel_row)->getAlignment()->setHorizontal('left');
                $objActSheet->getStyle('B'.$excel_row)->getAlignment()->setHorizontal('left');
                $objActSheet->getStyle('E'.$excel_row)->getAlignment()->setHorizontal('left');*/
                $objActSheet->setCellValue( $excel_col.$excel_row, $v[$field[0]]);
                //设置换行
                //$objActSheet->getStyle($excel_col)->getAlignment()->setWrapText(true);
 
                $excel_col++;
            }
            $excel_row++;
        }
 
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('Paid');
        $objDrawing->setDescription('Paid');
//	$objDrawing->setPath('./Public/Images/login/loginlogo.png'); //图片引入位置
//	$objDrawing->setCoordinates('A'.$excel_row); //图片添加位置
        $objDrawing->setOffsetX(10);
        $objDrawing->setRotation(0);
        $objDrawing->setHeight(100);
        $objDrawing->getShadow()->setVisible (true);
        $objDrawing->getShadow()->setDirection(20);
        $objDrawing->setWorksheet($objActSheet);
 
        //得到当前活动的表,注意下文教程中会经常用到$objActSheet
        // $objActSheet = $objPHPExcel->getActiveSheet();
        // 位置bbb  *为下文代码位置提供锚
        // 给当前活动的表设置名称
        $objActSheet->setTitle($name);
 
        // 生成2003excel格式的xls文件
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$file_name.'.xls"');
        header('Cache-Control: max-age=0');
        //解决报错的问题：Class 'Warehouse\Controller\PHPExcel_IOFactory' not found
        //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');//原始路径
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');//新路径
 
        // 生成2007excel格式的xlsx文件
//	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//	header('Content-Disposition: attachment;filename="'.$name.'.xlsx"');
//	header('Cache-Control: max-age=0');
//	$objWriter = \PHPExcel_IOFactory:: createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
 
?>
