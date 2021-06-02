

<?php
include ("includes/createasection.inc.php");
require_once('C:/xampp/htdocs/Aysii/phpexcel/Classes/PHPExcel.php');
 
//Usage:

 $infile = $_FILES['excel-file']['tmp_name'];
 $outfile = "Download.csv";
 $fileType = PHPExcel_IOFactory::identify($infile);
 $objReader = PHPExcel_IOFactory::createReader($fileType);
 
 $objReader->setReadDataOnly(true);   
 $objPHPExcel = $objReader->load($infile);    
 
 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
 $objWriter->save($outfile);


 header("location: .\csvtodb.php");
?>