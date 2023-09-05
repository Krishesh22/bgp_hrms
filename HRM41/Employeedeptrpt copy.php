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
$gettime = "Departmentwise-$Downloadtime.xls";


header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=".$gettime."");
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

$Departmentname = $_POST['DEPTName'];
$Categoryarray = implode(',', $Departmentname); 
$Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
$Department = str_replace(",","','","$Categoryarray");
$excel=new Spreadsheet();
$active=$excel->getActiveSheet();
$active->setTitle("Departwiseemployeedetails");
$excel->getActiveSheet();
	
  // ->setCellValue('A2',"Wages For Monthly Paid ('.$Category.') For the Month Of '.$Payrollmonth.'-'.$Payrollyear.'");

//merge heading
$excel->getActiveSheet()->mergeCells("A1:J1");
$excel->getActiveSheet()->mergeCells("A2:J2");

// set font style
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
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

$excel->getActiveSheet()->getStyle('A3:J3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffff4d90');
$active->setCellValue('A1',"SAINMARKS INDUSTRIES(INDIA) PVT LTD-Tirupur");
$active->setCellValue('A2',"Department wise Employee Details");
$active->setCellValue('A3','Employeeid');
$active->setCellValue('B3','Fullname');
$active->setCellValue('C3','Department');
$active->setCellValue('D3','Designation');
$active->setCellValue('E3','Category');
$active->setCellValue('F3','Gender');
$active->setCellValue('G3','ContactNo');
$active->setCellValue('H3','Qualification');
$active->setCellValue('I3','Email-ID');
$active->setCellValue('J3','Father/Spouse Name');








$GetState = "SELECT * FROM indsys1017employeemaster where  EmpActive='Active' AND Clientid='$Clientid' AND Department in(". $Department.")  ORDER BY Employeeid";

$result_Region = $conn->query($GetState);
$currentContenRow=4;
  if(mysqli_num_rows($result_Region) > 0) { 
  while($rows = mysqli_fetch_array($result_Region)) {  


  
    $active->setCellValue('A'.$currentContenRow,$rows['Employeeid']);
    $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
    $active->setCellValue('C'.$currentContenRow,$rows['Department']);
    $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
    $active->setCellValue('E'.$currentContenRow,$rows['Type_Of_Posistion']);
    $active->setCellValue('F'.$currentContenRow,$rows['Gender']);
    $active->setCellValue('G'.$currentContenRow,$rows['Contactno']);
    $active->setCellValue('H'.$currentContenRow,$rows['Highestqualification']);
    $active->setCellValue('I'.$currentContenRow,$rows['Emaild']);
    $active->setCellValue('J'.$currentContenRow, $rows['FatherGuardianSpouseName']);  
 
  $currentContenRow++;


     
   

 }  
   }
////////////////////////////////////////PersonalInformation//////////////////////
$active=$excel->createSheet();
$excel->setActiveSheetIndex(1);
$excel->getActiveSheet()->setTitle('Personal Information');
$excel->getActiveSheet();
	
  // ->setCellValue('A2',"Wages For Monthly Paid ('.$Category.') For the Month Of '.$Payrollmonth.'-'.$Payrollyear.'");

//merge heading
$excel->getActiveSheet()->mergeCells("A1:S1");
$excel->getActiveSheet()->mergeCells("A2:S2");

// set font style
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);

// set cell alignment
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);




$excel->getActiveSheet()->getStyle('A3:S3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffff4d90');
$active->setCellValue('A1',"SAINMARKS INDUSTRIES(INDIA) PVT LTD-Tirupur");
$active->setCellValue('A2',"Department wise Employee Personal Details");
$active->setCellValue('A3','Employeeid');
$active->setCellValue('B3','Fullname');
$active->setCellValue('C3','Department');
$active->setCellValue('D3','Designation');
$active->setCellValue('E3','Category');
$active->setCellValue('F3','DOB');
$active->setCellValue('G3','Age');
$active->setCellValue('H3','Blood Group');
$active->setCellValue('I3','Experience');
$active->setCellValue('J3','Freshers');
$active->setCellValue('K3','DOJ');
$active->setCellValue('L3','UAN No');
$active->setCellValue('M3','ESI NO');
$active->setCellValue('N3','Aadhar No');
$active->setCellValue('O3','PAN No');
$active->setCellValue('P3','Allow_OT');
$active->setCellValue('Q3','PF Joining Date');
$active->setCellValue('R3','ESI Joining Date');
$active->setCellValue('S3','Salary Mode');








$GetStatepersonal = "SELECT * FROM indsys1017employeemaster where  EmpActive='Active' AND Clientid='$Clientid' AND Department in(". $Department.") ORDER BY Employeeid";

$result_RegionPersonal = $conn->query($GetStatepersonal);
$currentContenRow=4;
  if(mysqli_num_rows($result_RegionPersonal) > 0) { 
  while($rows = mysqli_fetch_array($result_RegionPersonal)) {  


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
  
    $active->setCellValue('A'.$currentContenRow,$rows['Employeeid']);
    $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
    $active->setCellValue('C'.$currentContenRow,$rows['Department']);
    $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
    $active->setCellValue('E'.$currentContenRow,$rows['Type_Of_Posistion']);
    $active->setCellValue('F'.$currentContenRow,$DOB);
    $active->setCellValue('G'.$currentContenRow,$rows['Age']);
    $active->setCellValue('H'.$currentContenRow,$rows['Bloodgroup']);
    $active->setCellValue('I'.$currentContenRow,$rows['Expereienced']);
    $active->setCellValue('J'.$currentContenRow, $rows['Fresher']); 
    $active->setCellValue('K'.$currentContenRow,$Date_Of_Joing);
    $active->setCellValue('L'.$currentContenRow,$rows['UANno']);
    $active->setCellValue('M'.$currentContenRow,$rows['ESIno']);
    $active->setCellValue('N'.$currentContenRow,$rows['Aadharno']);
    $active->setCellValue('O'.$currentContenRow,$rows['Panno']);
    $active->setCellValue('P'.$currentContenRow,$rows['Allow_OT']);
    $active->setCellValue('Q'.$currentContenRow,$PFJoindate);
    $active->setCellValue('R'.$currentContenRow,$ESIJoindate);
    $active->setCellValue('S'.$currentContenRow,$rows['Salary_mode']);
 
 
  $currentContenRow++;


     
   

 }  
   }

///////////////////////////////////////////////Salary Information///////////////
  
$active=$excel->createSheet();
$excel->setActiveSheetIndex(2);
$excel->getActiveSheet()->setTitle('Salary Information');
$excel->getActiveSheet();
	
  // ->setCellValue('A2',"Wages For Monthly Paid ('.$Category.') For the Month Of '.$Payrollmonth.'-'.$Payrollyear.'");

//merge heading
$excel->getActiveSheet()->mergeCells("A1:S1");
$excel->getActiveSheet()->mergeCells("A2:S2");

// set font style
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);

// set cell alignment
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);




$excel->getActiveSheet()->getStyle('A3:S3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffff4d90');
$active->setCellValue('A1',"SAINMARKS INDUSTRIES(INDIA) PVT LTD-Tirupur");
$active->setCellValue('A2',"Department wise Employee Salary Details");
$active->setCellValue('A3','Employeeid');
$active->setCellValue('B3','Fullname');
$active->setCellValue('C3','Department');
$active->setCellValue('D3','Designation');
$active->setCellValue('E3','Category');
$active->setCellValue('F3','Basic+DA');
$active->setCellValue('G3','HRA');
$active->setCellValue('H3','Other Allowance');
$active->setCellValue('I3','Performance Allowance');
$active->setCellValue('J3','Day Allowance');
$active->setCellValue('K3','Travel Allowance');
$active->setCellValue('L3','PF Yes/No');
$active->setCellValue('M3','PF_Fixed');
$active->setCellValue('N3','ESI Yes/No');
$active->setCellValue('O3','PF');
$active->setCellValue('P3','ESI');
$active->setCellValue('Q3','TDS');
$active->setCellValue('R3','Net Salary');
$active->setCellValue('S3','Gross Salary');








$GetStatepersonal = "SELECT * FROM indsys1017employeemaster where  EmpActive='Active' AND Clientid='$Clientid' AND Department in(". $Department.") ORDER BY Employeeid";

$result_RegionPersonal = $conn->query($GetStatepersonal);
$currentContenRow=4;
  if(mysqli_num_rows($result_RegionPersonal) > 0) { 
  while($rows = mysqli_fetch_array($result_RegionPersonal)) {  


  
    $active->setCellValue('A'.$currentContenRow,$rows['Employeeid']);
    $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
    $active->setCellValue('C'.$currentContenRow,$rows['Department']);
    $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
    $active->setCellValue('E'.$currentContenRow,$rows['Type_Of_Posistion']);
    $active->setCellValue('F'.$currentContenRow,$rows['Basic']);
    $active->setCellValue('G'.$currentContenRow,$rows['HR_Allowance']);
    $active->setCellValue('H'.$currentContenRow,$rows['Other_Allowance']);
    $active->setCellValue('I'.$currentContenRow,$rows['Performance_allowance']);
    $active->setCellValue('J'.$currentContenRow,$rows['Day_allowance']); 
    $active->setCellValue('K'.$currentContenRow,$rows['TA']);
    $active->setCellValue('L'.$currentContenRow,$rows['PF_Yesandno']);
    $active->setCellValue('M'.$currentContenRow,$rows['PF_Fixed']);
    $active->setCellValue('N'.$currentContenRow,$rows['ESI_Yesandno']);
    $active->setCellValue('O'.$currentContenRow,$rows['PF']);
    $active->setCellValue('P'.$currentContenRow,$rows['ESI']);
    $active->setCellValue('Q'.$currentContenRow,$rows['TDS']);
    $active->setCellValue('R'.$currentContenRow,$rows['Net_Salary']);
    $active->setCellValue('S'.$currentContenRow,$rows['Gross_Salary']);
 
 
  $currentContenRow++;


     
   

 }  
   }
  


//////////////////////////////////////////////

$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;

?>