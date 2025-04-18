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
$Payrollyear=$_SESSION['Payrollyear'];
$Payrollmonth=$_SESSION['Payrollmonth'];
$gettime = time();
$Downloadtime = time();
$gettime = "BankReport_$Payrollmonth-$Payrollyear-$Downloadtime.xls";


header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=".$gettime."");
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');



$excel=new Spreadsheet();
$active=$excel->getActiveSheet();
$active->setTitle("payroll");
$excel->getActiveSheet();
	
  // ->setCellValue('A2',"Wages For Monthly Paid ('.$Category.') For the Month Of '.$Payrollmonth.'-'.$Payrollyear.'");

//merge heading
$excel->getActiveSheet()->mergeCells("A1:J1");
$excel->getActiveSheet()->mergeCells("A2:J2");

// set font style
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);

// set cell alignment
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


$excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);


$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD");
$active->setCellValue('A2',"Wages For Monthly Paid  For the Month Of ".$Payrollmonth."-".$Payrollyear);
$active->setCellValue('A3','Employeeid');
$active->setCellValue('B3','Fullname');
$active->setCellValue('C3','Department');
$active->setCellValue('D3','Designation');
$active->setCellValue('E3','Account Holder Name');
$active->setCellValue('F3','Bankname');
$active->setCellValue('G3','Accountno');
$active->setCellValue('H3','IFSCcode');
$active->setCellValue('I3','Branch');
$active->setCellValue('J3','Total');








$GetState = "SELECT * FROM vwemppayrollbanklist where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  AND Clientid='$Clientid'  ORDER BY Employeeid";

$result_Region = $conn->query($GetState);
$currentContenRow=4;
  if(mysqli_num_rows($result_Region) > 0) { 
  while($rows = mysqli_fetch_array($result_Region)) {  

    $NetWages = $rows["NetWages"];
    $PA = $rows["Performanceallowance"];
    $NetPa=$NetWages+$PA;
  
    $active->setCellValue('A'.$currentContenRow,$rows['Employeeid']);
    $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
    $active->setCellValue('C'.$currentContenRow,$rows['Department']);
    $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
    $active->setCellValue('E'.$currentContenRow,$rows['Empnameaspassbook']);
    $active->setCellValue('F'.$currentContenRow,$rows['Bankname']);
    $active->setCellValue('G'.$currentContenRow,$rows['Accountno']);
    $active->setCellValue('H'.$currentContenRow,$rows['IFSCcode']);
    $active->setCellValue('I'.$currentContenRow,$rows['Branch']);
    $active->setCellValue('J'.$currentContenRow, $NetPa);  
 
  $currentContenRow++;


     
   

 }  
   }
  

  
$sql = "SELECT SUM(NetWages)FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  AND Clientid='$Clientid'  ORDER BY Employeeid";
$result = $conn->query($sql);

while($row = mysqli_fetch_array($result)){
  $NetWages= $row['SUM(NetWages)'];
    
}
if(empty($NetWages))
{
  $NetWages = 0;
}
$sqlPerformanceallowance = "SELECT SUM(Performanceallowance)FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  AND Clientid='$Clientid'  ORDER BY Employeeid";
$resultPerformanceallowance = $conn->query($sqlPerformanceallowance);

while($row = mysqli_fetch_array($resultPerformanceallowance)){
  $Performanceallowance= $row['SUM(Performanceallowance)'];
    
}
if(empty($Performanceallowance))
{
  $Performanceallowance = 0;
}

$GrandTotal = $NetWages+$Performanceallowance;
$active->setCellValue('I'.$currentContenRow,'Grand Total');
$active->setCellValue('J'.$currentContenRow,$GrandTotal);



$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;

?>