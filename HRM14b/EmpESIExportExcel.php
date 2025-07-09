<<<<<<< HEAD
<?php
include '../config.php';
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';



date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$Downloadtime = time();
$gettime = "Emp-ESI-UAN-$Downloadtime.xls";


header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=".$gettime."");
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');



$excel=new Spreadsheet();
$active=$excel->getActiveSheet();
$active->setTitle("EmployeeESIDetails");
$excel->getActiveSheet();
	
  // ->setCellValue('A2',"Wages For Monthly Paid ('.$Category.') For the Month Of '.$Payrollmonth.'-'.$Payrollyear.'");

//merge heading
$excel->getActiveSheet()->mergeCells("A1:H1");
$excel->getActiveSheet()->mergeCells("A2:H2");

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
$active->setCellValue('A2',"Employee ESI/UAN Details ");
$active->setCellValue('A3','Employeeid');
$active->setCellValue('B3','Fullname');
$active->setCellValue('C3','Department');
$active->setCellValue('D3','Designation');
$active->setCellValue('E3','Date Of Birth');
$active->setCellValue('F3','Date Of Joining');
$active->setCellValue('G3','ESI No');
$active->setCellValue('H3','UAN No');









$GetState = "SELECT * FROM indsys1017employeemaster where EmpActive='Active'  AND Clientid='$Clientid'  ORDER BY Employeeid";

$result_Region = $conn->query($GetState);
$currentContenRow=4;
  if(mysqli_num_rows($result_Region) > 0) { 
  while($rows = mysqli_fetch_array($result_Region)) {  

    $DOB = $rows["DOB"];
    $Date_Of_Joing = $rows["Date_Of_Joing"];

    if($Date_Of_Joing=="0000-00-00")
    {
       $Date_Of_Joing="";
    }
    else
    {
       $Date_Of_Joing = date("d-m-Y", strtotime( $Date_Of_Joing));
    }

    if($DOB=="0000-00-00")
    {
       $DOB="";
    }
    else
    {
       $DOB = date("d-m-Y", strtotime( $DOB));
    }
    
  
    $active->setCellValue('A'.$currentContenRow,$rows['Employeeid']);
    $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
    $active->setCellValue('C'.$currentContenRow,$rows['Department']);
    $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
    $active->setCellValue('E'.$currentContenRow,$DOB);
    $active->setCellValue('F'.$currentContenRow, $Date_Of_Joing);
    $active->setCellValue('G'.$currentContenRow,$rows['ESIno']);
    $active->setCellValue('H'.$currentContenRow,$rows['UANno']);
 
 
  $currentContenRow++;


     
   

 }  
   }
  

  




$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;

=======
<?php
include '../config.php';
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';



date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$Downloadtime = time();
$gettime = "Emp-ESI-UAN-$Downloadtime.xls";


header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=".$gettime."");
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');



$excel=new Spreadsheet();
$active=$excel->getActiveSheet();
$active->setTitle("EmployeeESIDetails");
$excel->getActiveSheet();
	
  // ->setCellValue('A2',"Wages For Monthly Paid ('.$Category.') For the Month Of '.$Payrollmonth.'-'.$Payrollyear.'");

//merge heading
$excel->getActiveSheet()->mergeCells("A1:H1");
$excel->getActiveSheet()->mergeCells("A2:H2");

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
$active->setCellValue('A2',"Employee ESI/UAN Details ");
$active->setCellValue('A3','Employeeid');
$active->setCellValue('B3','Fullname');
$active->setCellValue('C3','Department');
$active->setCellValue('D3','Designation');
$active->setCellValue('E3','Date Of Birth');
$active->setCellValue('F3','Date Of Joining');
$active->setCellValue('G3','ESI No');
$active->setCellValue('H3','UAN No');









$GetState = "SELECT * FROM indsys1017employeemaster where EmpActive='Active'  AND Clientid='$Clientid'  ORDER BY Employeeid";

$result_Region = $conn->query($GetState);
$currentContenRow=4;
  if(mysqli_num_rows($result_Region) > 0) { 
  while($rows = mysqli_fetch_array($result_Region)) {  

    $DOB = $rows["DOB"];
    $Date_Of_Joing = $rows["Date_Of_Joing"];

    if($Date_Of_Joing=="0000-00-00")
    {
       $Date_Of_Joing="";
    }
    else
    {
       $Date_Of_Joing = date("d-m-Y", strtotime( $Date_Of_Joing));
    }

    if($DOB=="0000-00-00")
    {
       $DOB="";
    }
    else
    {
       $DOB = date("d-m-Y", strtotime( $DOB));
    }
    
  
    $active->setCellValue('A'.$currentContenRow,$rows['Employeeid']);
    $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
    $active->setCellValue('C'.$currentContenRow,$rows['Department']);
    $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
    $active->setCellValue('E'.$currentContenRow,$DOB);
    $active->setCellValue('F'.$currentContenRow, $Date_Of_Joing);
    $active->setCellValue('G'.$currentContenRow,$rows['ESIno']);
    $active->setCellValue('H'.$currentContenRow,$rows['UANno']);
 
 
  $currentContenRow++;


     
   

 }  
   }
  

  




$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
?>