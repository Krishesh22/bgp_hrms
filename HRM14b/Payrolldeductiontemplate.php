<<<<<<< HEAD
<?php


include '../config.php';
require_once('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

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
$Category=$_SESSION['Category'];

$Categoryarray = implode(',', $Category); 
$Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
$Categoryarray = str_replace(",","','","$Categoryarray");

$GetState = "SELECT Employeeid,Fullname,Department,Designation,Type_Of_Posistion FROM indsys1017employeemaster  where  Clientid='$Clientid' and EmpActive='Active'  AND Type_Of_Posistion in(". $Categoryarray.") ORDER BY Employeeid";
$result_Region = $conn->query($GetState);

$excel=new Spreadsheet();
$active=$excel->getActiveSheet();
$active->setTitle("payroll");


$excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);


$active->setCellValue('A1','ID');
$active->setCellValue('B1','Fullname');
$active->setCellValue('C1','Department');
$active->setCellValue('D1','Designation');
$active->setCellValue('E1','Category');
$active->setCellValue('F1','Salary Advance');
$active->setCellValue('G1','Food Deduction');
$active->setCellValue('H1','TDS Deduction');
$active->setCellValue('I1','Dormitory Maintance Deduction');
$active ->setCellValue('J1','Transport Deduction');



$file=2;
while($rows =$result_Region->fetch_assoc()){
  $active->setCellValue('A'.$file,$rows['Employeeid']);
  $active->setCellValue('B'.$file,$rows['Fullname']);
  $active->setCellValue('C'.$file,$rows['Department']);
  $active->setCellValue('D'.$file,$rows['Designation']);
  $active->setCellValue('E'.$file,$rows['Type_Of_Posistion']);
  $active->setCellValue('F'.$file,0);
  $active->setCellValue('G'.$file,0);
  $active->setCellValue('H'.$file,0);
   $active->setCellValue('I'.$file,0);
     $active->setCellValue('J'.$file,0);
  $file++;
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="DeductionEmployeeList.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');


$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;
=======
<?php


include '../config.php';
require_once('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

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
$Category=$_SESSION['Category'];

$Categoryarray = implode(',', $Category); 
$Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
$Categoryarray = str_replace(",","','","$Categoryarray");

$GetState = "SELECT Employeeid,Fullname,Department,Designation,Type_Of_Posistion FROM indsys1017employeemaster  where  Clientid='$Clientid' and EmpActive='Active'  AND Type_Of_Posistion in(". $Categoryarray.") ORDER BY Employeeid";
$result_Region = $conn->query($GetState);

$excel=new Spreadsheet();
$active=$excel->getActiveSheet();
$active->setTitle("payroll");


$excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);


$active->setCellValue('A1','ID');
$active->setCellValue('B1','Fullname');
$active->setCellValue('C1','Department');
$active->setCellValue('D1','Designation');
$active->setCellValue('E1','Category');
$active->setCellValue('F1','Salary Advance');
$active->setCellValue('G1','Food Deduction');
$active->setCellValue('H1','TDS Deduction');
$active->setCellValue('I1','Dormitory Maintance Deduction');
$active ->setCellValue('J1','Transport Deduction');



$file=2;
while($rows =$result_Region->fetch_assoc()){
  $active->setCellValue('A'.$file,$rows['Employeeid']);
  $active->setCellValue('B'.$file,$rows['Fullname']);
  $active->setCellValue('C'.$file,$rows['Department']);
  $active->setCellValue('D'.$file,$rows['Designation']);
  $active->setCellValue('E'.$file,$rows['Type_Of_Posistion']);
  $active->setCellValue('F'.$file,0);
  $active->setCellValue('G'.$file,0);
  $active->setCellValue('H'.$file,0);
   $active->setCellValue('I'.$file,0);
     $active->setCellValue('J'.$file,0);
  $file++;
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="DeductionEmployeeList.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');


$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
?>