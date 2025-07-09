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
$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD");
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


/////////////////////Personal Information//////////
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
$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD");
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
//////////////////////SalaryInformation///////////////////////////////

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




$excel->getActiveSheet()->getStyle('A3:W3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffff4d90');
$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD");
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
$active->setCellValue('K3','Conveyence');
$active->setCellValue('L3','PF Yes/No');
$active->setCellValue('M3','PF_Fixed');
$active->setCellValue('N3','ESI Yes/No');
$active->setCellValue('O3','PF');
$active->setCellValue('P3','ESI');
$active->setCellValue('Q3','TDS');
$active->setCellValue('R3','Net Salary');
$active->setCellValue('S3','Gross Salary');
$active->setCellValue('T3','PF Employeer ');
$active->setCellValue('U3','ESI Employeer');
$active->setCellValue('V3','Bonus');
$active->setCellValue('W3','CTC');
////////////////////Employee Bank Details///////////////////////////
$active=$excel->createSheet();
$excel->setActiveSheetIndex(3);
$excel->getActiveSheet()->setTitle('Employee Accounts Information');
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




$excel->getActiveSheet()->getStyle('A3:J3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffff4d90');
$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD");
$active->setCellValue('A2',"Department wise Employee Bank Details");
$active->setCellValue('A3','Employeeid');
$active->setCellValue('B3','Fullname');
$active->setCellValue('C3','Department');
$active->setCellValue('D3','Designation');
$active->setCellValue('E3','Category');
$active->setCellValue('F3','Bankname');
$active->setCellValue('G3','Account NO');
$active->setCellValue('H3','Account Holder Name');
$active->setCellValue('I3','IFSC Code');
$active->setCellValue('J3','Branch');
/////////////////////Employee Address Information/////////////////
$active=$excel->createSheet();
$excel->setActiveSheetIndex(4);
$excel->getActiveSheet()->setTitle('Address Information');
$excel->getActiveSheet();
	
  // ->setCellValue('A2',"Wages For Monthly Paid ('.$Category.') For the Month Of '.$Payrollmonth.'-'.$Payrollyear.'");

//merge heading
$excel->getActiveSheet()->mergeCells("A1:O1");
$excel->getActiveSheet()->mergeCells("A2:O2");

// set font style
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);

// set cell alignment
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);




$excel->getActiveSheet()->getStyle('A3:O3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffff4d90');
$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD");
$active->setCellValue('A2',"Department wise Employee Address Details");
$active->setCellValue('A3','Employeeid');
$active->setCellValue('B3','Fullname');
$active->setCellValue('C3','Department');
$active->setCellValue('D3','Designation');
$active->setCellValue('E3','Category');
$active->setCellValue('F3','T-Address');
$active->setCellValue('G3','T-Country');
$active->setCellValue('H3','T-State');
$active->setCellValue('I3','T-City');
$active->setCellValue('J3','T-Pincode');
$active->setCellValue('K3','P-Address');
$active->setCellValue('L3','P-Country');
$active->setCellValue('M3','P-State');
$active->setCellValue('N3','P-City');
$active->setCellValue('O3','P-Pincode');
/////////////////Employee Reference Information//////

$active=$excel->createSheet();
$excel->setActiveSheetIndex(5);
$excel->getActiveSheet()->setTitle('Reference Information');
$excel->getActiveSheet();
	
  // ->setCellValue('A2',"Wages For Monthly Paid ('.$Category.') For the Month Of '.$Payrollmonth.'-'.$Payrollyear.'");

//merge heading
$excel->getActiveSheet()->mergeCells("A1:K1");
$excel->getActiveSheet()->mergeCells("A2:K2");

// set font style
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);

// set cell alignment
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);




$excel->getActiveSheet()->getStyle('A3:K3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffff4d90');
$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD");
$active->setCellValue('A2',"Department wise Employee Reference Details");
$active->setCellValue('A3','Employeeid');
$active->setCellValue('B3','Fullname');
$active->setCellValue('C3','Department');
$active->setCellValue('D3','Designation');
$active->setCellValue('E3','Category');
$active->setCellValue('F3','Ref1-Name');
$active->setCellValue('G3','Ref1-Contactno');
$active->setCellValue('H3','Ref1-Address');
$active->setCellValue('I3','Ref2-Name');
$active->setCellValue('J3','Ref2-Contactno');
$active->setCellValue('K3','Ref2-Address');
//////////////Employee Family Information/////////////
$active=$excel->createSheet();
$excel->setActiveSheetIndex(6);
$excel->getActiveSheet()->setTitle('Emp Family Information');
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




$excel->getActiveSheet()->getStyle('A3:J3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffff4d90');
$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD");
$active->setCellValue('A2',"Department wise Employee Family Details");
$active->setCellValue('A3','Employeeid');
$active->setCellValue('B3','Fullname');
$active->setCellValue('C3','Department');
$active->setCellValue('D3','Designation');
$active->setCellValue('E3','Category');
$active->setCellValue('F3','Name');
$active->setCellValue('G3','Relationship');
$active->setCellValue('H3','Age');
$active->setCellValue('I3','Contact No');
$active->setCellValue('J3','Occupation');


///////////////////////////Employee Nominee Details/////////////
$active=$excel->createSheet();
$excel->setActiveSheetIndex(7);
$excel->getActiveSheet()->setTitle('Nominee Details');
$excel->getActiveSheet();
	
  // ->setCellValue('A2',"Wages For Monthly Paid ('.$Category.') For the Month Of '.$Payrollmonth.'-'.$Payrollyear.'");

//merge heading
$excel->getActiveSheet()->mergeCells("A1:L1");
$excel->getActiveSheet()->mergeCells("A2:L2");

// set font style
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);

// set cell alignment
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);




$excel->getActiveSheet()->getStyle('A3:L3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffff4d90');
$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD");
$active->setCellValue('A2',"Department wise Employee Nominee Details");
$active->setCellValue('A3','Employeeid');
$active->setCellValue('B3','Fullname');
$active->setCellValue('C3','Department');
$active->setCellValue('D3','Designation');
$active->setCellValue('E3','Category');
$active->setCellValue('F3','Nominee Name');
$active->setCellValue('G3','Relationship');
$active->setCellValue('H3','Age');
$active->setCellValue('I3','Contactno');
$active->setCellValue('J3','Guardian Name');
$active->setCellValue('K3','Amount %');
$active->setCellValue('L3','Address');

//////////////////////////////////////////////////


////////////////////wRITE THE VALUES using active sheet////////////////////
$currentContenRow=4;
$FamilyContenRow=4;
$NomineeContenRow=4;


$GetState = "SELECT * FROM indsys1017employeemaster where  EmpActive='Active' AND Clientid='$Clientid' AND Department in(". $Department.")  ORDER BY Employeeid";

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
    $Bankname ="";
    $Accountno ="";
    $IFSCcode ="";
    $Branch ="";
    $Emppassbook = "";
    $Empnameaspassbook ="";
    $CurrentAddress ="";
    $CurrentCountry ="";
    $CurrentState ="";
    $CurrentCity ="";
    $CurrentPincode ="";
    $PermanentAddress ="";
    $PermanentCountry ="";
    $PermanentState ="";
    $PermanentCity ="";
    $Permanantpincode ="";
    $Reference1name = "";
    $Reference1contactno = "";
    $Reference1address = "";
    $Reference2name = "";
    $Reference2contactno = "";
    $Reference2address = "";

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
    $active->setCellValue('F'.$currentContenRow,$rows['Gender']);
    $active->setCellValue('G'.$currentContenRow,$rows['Contactno']);
    $active->setCellValue('H'.$currentContenRow,$rows['Highestqualification']);
    $active->setCellValue('I'.$currentContenRow,$rows['Emaild']);
    $active->setCellValue('J'.$currentContenRow, $rows['FatherGuardianSpouseName']);  


    ////////////////////Personal Information Of Employee///////////////
    $active=$excel->getSheet(1);
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
    ////////////////////////////////////////Salary Information Of Employee/////////////
    $active=$excel->getSheet(2);
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
    $active->setCellValue('T'.$currentContenRow,$rows['PF_Employeer_contribution']);
    $active->setCellValue('U'.$currentContenRow,$rows['ESI_Employeer_contribution']);
    $active->setCellValue('V'.$currentContenRow,$rows['Bonus']);
    $active->setCellValue('W'.$currentContenRow,$rows['CTC']);
 ////////////////////Fetching Bank Information ///////////////////


 $GetChapter = "SELECT * FROM indsys1016employeeaccountinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Bankname =$row['Bankname'];
      $Accountno =$row['Accountno'];
      $IFSCcode = $row['IFSCcode'];
      $Branch =$row['Branch'];
      $Emppassbook = $row['Bankpassbookdoc'];
      $Empnameaspassbook =$row['Empnameaspassbook'];
     
     
     
     
      } 
    }

    ////////////////Set Bank Details//////////////
    $active=$excel->getSheet(3);
    $active->setCellValue('A'.$currentContenRow,$rows['Employeeid']);
    $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
    $active->setCellValue('C'.$currentContenRow,$rows['Department']);
    $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
    $active->setCellValue('E'.$currentContenRow,$rows['Type_Of_Posistion']);
    $active->setCellValue('F'.$currentContenRow,$Bankname);
    $active->setCellValue('G'.$currentContenRow, $Accountno);
    $active->setCellValue('H'.$currentContenRow,$Empnameaspassbook);
    $active->setCellValue('I'.$currentContenRow,  $IFSCcode);
    $active->setCellValue('J'.$currentContenRow,  $Branch);  

    ///////////////////////////////////Employee Address Information////////////
    $GetAddress = "SELECT * FROM indsys1018employeeaddressinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
    $result_Address = $conn->query($GetAddress );
    if(mysqli_num_rows($result_Address) > 0) { 


    while($rowAddress = mysqli_fetch_array($result_Address)) 
    {  
      $CurrentAddress =$rowAddress['Currentaddress'];
      $CurrentCountry =$rowAddress['Currentcountry'];
      $CurrentState = $rowAddress['Currentstate'];
      $CurrentCity =$rowAddress['Currentcity'];
      $CurrentPincode = $rowAddress['Current_pincode'];
      $PermanentAddress =$rowAddress['Permanantaddress'];
      $PermanentCountry = $rowAddress['Permanantcountry'];
      $PermanentState =$rowAddress['Peremenantstate'];
      $PermanentCity = $rowAddress['Permanantcity'];
      $Permanantpincode = $rowAddress['Permanantpincode'];
     
     
     
      } 
    }
    ////////////////////Set Employee Address Information /////////////
    $active=$excel->getSheet(4);
    $active->setCellValue('A'.$currentContenRow,$rows['Employeeid']);
    $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
    $active->setCellValue('C'.$currentContenRow,$rows['Department']);
    $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
    $active->setCellValue('E'.$currentContenRow,$rows['Type_Of_Posistion']);
    $active->setCellValue('F'.$currentContenRow,$CurrentAddress);
    $active->setCellValue('G'.$currentContenRow, $CurrentCountry);
    $active->setCellValue('H'.$currentContenRow, $CurrentState);
    $active->setCellValue('I'.$currentContenRow,$CurrentCity);
    $active->setCellValue('J'.$currentContenRow,$CurrentPincode); 
    $active->setCellValue('K'.$currentContenRow,$PermanentAddress);
    $active->setCellValue('L'.$currentContenRow,$PermanentCountry);
    $active->setCellValue('M'.$currentContenRow,$PermanentState);
    $active->setCellValue('N'.$currentContenRow,$PermanentCity);
    $active->setCellValue('O'.$currentContenRow,$Permanantpincode);
  
    ///////////////////////////////////////Employee Reference Details///////////////
    $GetReference = "SELECT * FROM indsys1021employeereferenceinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
    $result_Reference = $conn->query($GetReference );
    if(mysqli_num_rows($result_Reference) > 0) { 


    while($rowReference = mysqli_fetch_array($result_Reference)) {  
      $Reference1name =$rowReference['Reference1'];
      $Reference1contactno =$rowReference['Ref1Contactno'];
      $Reference1address = $rowReference['Ref1address'];
      $Reference2name =$rowReference['Reference2'];
      $Reference2contactno = $rowReference['Ref2Contactno'];
      $Reference2address =$rowReference['Ref2address'];
     
     
     
     
      } 
    }
    //////////////////////Set Reference Information///////////
    $active=$excel->getSheet(5);
    $active->setCellValue('A'.$currentContenRow,$rows['Employeeid']);
    $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
    $active->setCellValue('C'.$currentContenRow,$rows['Department']);
    $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
    $active->setCellValue('E'.$currentContenRow,$rows['Type_Of_Posistion']);
    $active->setCellValue('F'.$currentContenRow,$Reference1name);
    $active->setCellValue('G'.$currentContenRow, $Reference1contactno);
    $active->setCellValue('H'.$currentContenRow, $Reference1address);
    $active->setCellValue('I'.$currentContenRow,$Reference2name);
    $active->setCellValue('J'.$currentContenRow,$Reference2contactno); 
    $active->setCellValue('K'.$currentContenRow,$Reference2address);

    ////////////////////////////////////// Employee Family Information////////
    $GetEmpFamily = "SELECT * FROM indsys1019employeefamilyinformation where  Employeeid='$Employeeid' AND Clientid='$Clientid'  ORDER BY Employeeid";

$result_EmpFamily = $conn->query($GetEmpFamily);

  if(mysqli_num_rows($result_EmpFamily) > 0) { 
  while($rowFamily = mysqli_fetch_array($result_EmpFamily)) { 

    $active=$excel->getSheet(6);
    $active->setCellValue('A'.$FamilyContenRow,$rows['Employeeid']);
    $active->setCellValue('B'.$FamilyContenRow,$rows['Fullname']);
    $active->setCellValue('C'.$FamilyContenRow,$rows['Department']);
    $active->setCellValue('D'.$FamilyContenRow,$rows['Designation']);
    $active->setCellValue('E'.$FamilyContenRow,$rows['Type_Of_Posistion']);
    $active->setCellValue('F'.$FamilyContenRow,$rowFamily['Name']);
    $active->setCellValue('G'.$FamilyContenRow, $rowFamily['Relationship']);
    $active->setCellValue('H'.$FamilyContenRow, $rowFamily['Age']);
    $active->setCellValue('I'.$FamilyContenRow,$rowFamily['Contactno']);
    $active->setCellValue('J'.$FamilyContenRow,$rowFamily['Occupation']); 
    $FamilyContenRow++;
    
  }
}
///////////////////////Employee Nominee Information///////////////////////////////
$GetEmpNominee = "SELECT * FROM indsys1019employeenomineeinformation where  Employeeid='$Employeeid' AND Clientid='$Clientid'  ORDER BY Employeeid";

$result_EmpNominee = $conn->query($GetEmpNominee);

  if(mysqli_num_rows($result_EmpNominee) > 0) { 
  while($rowNominee = mysqli_fetch_array($result_EmpNominee)) { 

    $active=$excel->getSheet(7);
    $active->setCellValue('A'.$NomineeContenRow,$rows['Employeeid']);
    $active->setCellValue('B'.$NomineeContenRow,$rows['Fullname']);
    $active->setCellValue('C'.$NomineeContenRow,$rows['Department']);
    $active->setCellValue('D'.$NomineeContenRow,$rows['Designation']);
    $active->setCellValue('E'.$NomineeContenRow,$rows['Type_Of_Posistion']);
    $active->setCellValue('F'.$NomineeContenRow,$rowNominee['NomineeName']);
    $active->setCellValue('G'.$NomineeContenRow, $rowNominee['NomineeRelationship']);
    $active->setCellValue('H'.$NomineeContenRow, $rowNominee['NomineeAge']);
    $active->setCellValue('I'.$NomineeContenRow,$rowNominee['RelationshipContactno']);
    $active->setCellValue('J'.$NomineeContenRow,$rowNominee['Guardianname']); 
    $active->setCellValue('K'.$NomineeContenRow,$rowNominee['PercentageofShare']);
    $active->setCellValue('L'.$NomineeContenRow,$rowNominee['NomineeAddress']); 
    $NomineeContenRow++;
    
  }
}
/////////////////////////////////////////
 
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