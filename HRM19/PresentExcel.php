<?php
include '../config.php';
include '../HRM54/vendor/autoload.php';

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

$gettime = "Present Details_$Attendencedate.xls";



header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=$gettime");
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');


$excel=new Spreadsheet();
$active=$excel->getActiveSheet();
$active->setTitle("PresentDetails");
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
$excel->getActiveSheet()->getStyle('H3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('I3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('J3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('K3')->getFont()->setBold( true );




$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);



$excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(34);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(34);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);




$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD");
$active->setCellValue('A2',"PresentDetails For $Attendencedate");
$active->setCellValue('A3','S.No');
$active->setCellValue('B3','ID');
$active->setCellValue('C3','NAME');
$active->setCellValue('D3','Status');
$active->setCellValue('E3','In Time');
$active->setCellValue('F3','Out Time');
$active->setCellValue('G3','OT Intime');
$active->setCellValue('H3','OT Outtime');
$active->setCellValue('I3','Working hrs');
$active->setCellValue('J3','OT hrs');
$active->setCellValue('K3','Actual OT hrs');

$GetState = "SELECT * FROM indsys1030empdailyattendancedetail where Attendencedate='$Attendencedate' AND Attentypestatus='P' 
AND Clientid='$Clientid'  ORDER BY Employeeid";



$result_Region = $conn->query($GetState);
$currentContenRow=4;
$Sno = 0;
  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
   
   
    $Sno++;
    $First = $row['Firstname'];
    $last = $row['lastname'];
    $name = "$First $last";

     $active->setCellValue('A'.$currentContenRow,$Sno);
    $active->setCellValue('B'.$currentContenRow,$row['Employeeid']);
    $active->setCellValue('C'.$currentContenRow,   $name );
    $active->setCellValue('D'.$currentContenRow,$row['AttenStatus']);
    $active->setCellValue('E'.$currentContenRow,$row['Intime']);
    $active->setCellValue('F'.$currentContenRow,$row['Outtime']);
    $active->setCellValue('G'.$currentContenRow,$row['OTIntime']);
    $active->setCellValue('H'.$currentContenRow,$row['OTOuttime']);
    $active->setCellValue('I'.$currentContenRow,$row['Workinghours']);
    $active->setCellValue('J'.$currentContenRow,$row['OT_HRS']);  
    $active->setCellValue('K'.$currentContenRow,$row['ActualOt_HRS']);  
     
 
 
  $currentContenRow++;

  }
}


$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;
?>
