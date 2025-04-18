<?php
include '../config.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

session_start();
$user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );





$Attendencedate=$_SESSION['ATTDATE01'];



$gettime = time();

$gettime = "Cat-3 Leave Details_$Attendencedate.xls";



header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=$gettime");
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');


$excel=new Spreadsheet();
$active=$excel->getActiveSheet();
$active->setTitle("CAT-3 LeaveDetails");
$excel->getActiveSheet();


$excel->getActiveSheet()->mergeCells("A1:K1");

$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);
$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('A3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('B3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('C3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('D3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('E3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('F3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('G3')->getFont()->setBold( true );




$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);



$excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(34);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(34);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);




$active->setCellValue('A1',"SAINMARKS INDUSTRIES(INDIA) PVT LTD-Tirupur");
$active->setCellValue('A2',"Cat-3 LeaveDetails For $Attendencedate");
$active->setCellValue('A3','EMPLOYEE ID');
$active->setCellValue('B3','EMPLOYEE NAME');
$active->setCellValue('C3','Status');
$active->setCellValue('D3','In');
$active->setCellValue('E3','Out');
$active->setCellValue('F3','Workinghours');
$active->setCellValue('G3','OT_HRS');

$GetState = "SELECT * FROM vwemployeedailyattendance where Type_Of_Posistion='Category 3' and Attendencedate='$Attendencedate' 
AND Attentypestatus='L' AND Clientid = '$Clientid' ORDER BY Employeeid";


$result_Region = $conn->query($GetState);
$currentContenRow=4;
  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
   
   
    

 
    $active->setCellValue('A'.$currentContenRow,$row['Employeeid']);
    $active->setCellValue('B'.$currentContenRow,$row['Firstname']);
    $active->setCellValue('C'.$currentContenRow,$row['AttenStatus']);
    $active->setCellValue('D'.$currentContenRow,$row['Intime']);
    $active->setCellValue('E'.$currentContenRow,$row['Outtime']);
    $active->setCellValue('F'.$currentContenRow,$row['Workinghours']);
    $active->setCellValue('G'.$currentContenRow,$row['OT_HRS']);  
     
 
 
  $currentContenRow++;

  }
}


$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;
?>
