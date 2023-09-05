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

$gettime = time();
$Downloadtime = time();
$gettime = "Employee-Leave-Summary-$Downloadtime.xls";


header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=".$gettime."");
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');



$excel=new Spreadsheet();
$active=$excel->getActiveSheet();
$active->setTitle("EmployeeLeaveSummary");
$excel->getActiveSheet();
	
  // ->setCellValue('A2',"Wages For Monthly Paid ('.$Category.') For the Month Of '.$Payrollmonth.'-'.$Payrollyear.'");

//merge heading
$excel->getActiveSheet()->mergeCells("A1:L1");
$excel->getActiveSheet()->mergeCells("A2:L2");

// set font style
// $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
// $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
// $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);

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

$excel->getActiveSheet()->getStyle('A3:L3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffff4d90');
$active->setCellValue('A1',"BRITANNIA GARMENT PACKAGING");
$active->setCellValue('A2',"Employee Details");
$active->setCellValue('A3','Employeeid');
$active->setCellValue('B3','Fullname');
$active->setCellValue('C3','Department');
$active->setCellValue('D3','Designation');
$active->setCellValue('E3','Category');
$active->setCellValue('F3','Year');
$active->setCellValue('G3','EligibilitySL');
$active->setCellValue('H3','UsedSL');
$active->setCellValue('I3','BalanceSL');
$active->setCellValue('J3','EligibilityCL');
$active->setCellValue('K3','UsedCL');
$active->setCellValue('L3','BalanceCL');




//////////////////////////////////////////////////


////////////////////wRITE THE VALUES using active sheet////////////////////
$currentContenRow=4;
$FamilyContenRow=4;
$NomineeContenRow=4;


$GetState = "SELECT * FROM indsys1017employeemaster where  EmpActive='Active' AND Clientid='$Clientid'   ORDER BY Employeeid";

$result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($rows = mysqli_fetch_array($result_Region)) {  
    $Employeeid =$rows['Employeeid'];
    $DOB = $rows["DOB"];
    $Date_Of_Joing = $rows["Date_Of_Joing"];
    $PFJoindate = $rows['PFJoindate'];
    $ESIJoindate = date("d-m-Y", strtotime( $DOB));
    $Date_Of_Joing = date("d-m-Y", strtotime( $Date_Of_Joing));
    $PFJoindate = date("d-m-Y", strtotime( $PFJoindate));
    $ESIJoindate = date("d-m-Y", strtotime( $ESIJoindate));


    if($Date_Of_Joing=="0000-00-00")
    {
       $Date_Of_Joing="";
    }
    

    if($DOB=="0000-00-00")
    {
       $DOB="";
    }
    if($PFJoindate=="0000-00-00")
    {
       $PFJoindate="";
    }
    

    if($ESIJoindate=="0000-00-00")
    {
       $ESIJoindate="";
    }
  
////////////////////Basic Information Of Employee ///////////////////////
$active=$excel->getSheet(0);
    $active->setCellValue('A'.$currentContenRow,$rows['Employeeid']);
    $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
    $active->setCellValue('C'.$currentContenRow,$rows['Department']);
    $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
    $active->setCellValue('E'.$currentContenRow,$rows['Type_Of_Posistion']);
    $active->setCellValue('F'.$currentContenRow, date("Y"));
    $active->setCellValue('G'.$currentContenRow,0);
    $active->setCellValue('H'.$currentContenRow,0);
    $active->setCellValue('I'.$currentContenRow,0);
    $active->setCellValue('J'.$currentContenRow, 0);  
    $active->setCellValue('K'.$currentContenRow, 0);  
    $active->setCellValue('L'.$currentContenRow,0);  


  
 
  $currentContenRow++;


     
   

 }  
   }
////////////////////////////////////////PersonalInformation//////////////////////




///////////////////////////////////////////////////////////////










//////////////////////////////////////////////

$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;

?>