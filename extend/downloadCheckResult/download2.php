<?php
include './phpexcel/Classes/PHPExcel.php';
require_once 'db.php';
//renshi_zhuguan_score
//julebu_yuangong
// ren_zong_yuangong
//rs_zuzhang_score
//shengsheng_yuangong

//zg_anquan_zhuguan
//zg_caiwuzu_zhuguan
//zg_ducha_zhuguan
//zg_jishu_zhuguan
//zg_jizhe_zhuguan
//zg_mishu_zhuguan

//zichan_zhuguan_score
$group=Array('renshi_zhuguan_score','julebu_yuangong','ren_zong_yuangong','rs_zuzhang_score','shengsheng_yuangong','zichan_zhuguan_score');

$group_map=Array('renshi_zhuguan_score'=>'人事主管','julebu_yuangong'=>'俱乐部员工','ren_zong_yuangong'=>'综管人事员工','rs_zuzhang_score'=>'人事部组长','shengsheng_yuangong'=>'升升活动中心员工','zichan_zhuguan_score'=>'资产主管');

//创建对象
$excel = new PHPExcel();
$titleName = array("人事主管","俱乐部员工","综管人事员工","人事部组长","升升活动中心员工","资产主管");
$list_A_to_D=array('A','B','C','D','e');

for ($k=0;$k<count($titleName);$k++)
 {
	if( $k>0){
		$excel->createSheet();
	}
	$excel->setActiveSheetIndex($k);
	$objWorksheet = $excel->getActiveSheet();
	$objWorksheet->setTitle($titleName[$k]);
	$objWorksheet->setCellValue("a1","编号")->setCellValue("b1","姓名")->setCellValue("c1","部门")->setCellValue("d1","职位")->setCellValue("e1","得分");
	/**
	 *填充内容
	 */
	foreach($group_map as $key=>$val){
		if($val==$titleName[$k]){
			break;
		}
	}
	$row_num=2;
	$sql="select total_score,id_name from {$key} order by total_score";
	$db=new DB($config);
	$result = $db->getResult($sql);
	for($cnt=0;$cnt<count($result);$cnt++){
		$total_score = $result[$cnt]['total_score'];
		$id_name = $result[$cnt]['id_name'];
		$sql="select userid,apartment,position from main_tb where name='".$id_name."'";
		$res_from_main_tb = $db->getResult($sql);

		$userid = $res_from_main_tb[0]['userid'];
		$apartment = $res_from_main_tb[0]['apartment'];
		$position = $res_from_main_tb[0]['position'];
	
		$objWorksheet->setCellValue("a".$row_num,$userid)->setCellValue("b".$row_num,$id_name)->setCellValue("c".$row_num,$apartment)->setCellValue("d".$row_num,$position)->setCellValue("e".$row_num,$total_score);
		$row_num++;
	}
	
}	

  /*
   *数据库映射表
   */
 $zg_zuzhang_group=Array('zg_anquan_zhuguan','zg_caiwuzu_zhuguan','zg_ducha_zhuguan','zg_jishu_zhuguan','zg_jizhe_zhuguan','zg_mishu_zhuguan');
  /**
  *综管各组长
  */
 $titleName="综管各组长";
 $excel->createSheet();
 $objWorksheet = $excel->getActiveSheet();
$objWorksheet->setTitle($titleName);
$objWorksheet->setCellValue("a1","编号")->setCellValue("b1","姓名")->setCellValue("c1","部门")->setCellValue("d1","职位")->setCellValue("e1","得分");
$map=array();
for($i=0;$i<count($zg_zuzhang_group);$i++){
	$sql="select total_score,id_name from {$zg_zuzhang_group[$i]}";
	$db=new DB($config);
	$result = $db->getResult($sql);
	$total_score = $result[0]['total_score'];
	$id_name = $result[0]['id_name'];
	$map[$id_name]=$total_score;
}
arsort($map);//降序排序

$row_num=2;
foreach($map as $key=>$value){
	$sql="select userid,apartment,position from main_tb where name='".$key."'";
	$res_from_main_tb = $db->getResult($sql);

	$userid = $res_from_main_tb[0]['userid'];
	$apartment = $res_from_main_tb[0]['apartment'];
	$position = $res_from_main_tb[0]['position'];

	$objWorksheet->setCellValue("a".$row_num,$userid)->setCellValue("b".$row_num,$key)->setCellValue("c".$row_num,$apartment)->setCellValue("d".$row_num,$position)->setCellValue("e".$row_num,$value);
	$row_num++;
	
}
 
//设置打印 页面 方向与大小（此为竖向）Portrait  PORTRAIT
$objWorksheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$objWorksheet->getPageSetup()->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

$write = new PHPExcel_Writer_Excel5($excel);


header("Pragma: public");
header("Expires: 0");
header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
header("Content-Type:application/force-download");
header("Content-Type:application/vnd.ms-execl");
header("Content-Type:application/octet-stream");
header("Content-Type:application/download");;
header('Content-Disposition:attachment;filename="resultFromCheck.xls"');
header("Content-Transfer-Encoding:binary");
$write->save('php://output');

/*
$write->save("supply.xls");
*/
?>