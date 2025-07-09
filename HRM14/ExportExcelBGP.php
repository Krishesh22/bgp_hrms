<<<<<<< HEAD
<?php
include '../config.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$tableHead = [
	'font'=>[
		'color'=>[
			'rgb'=>'FFFFFF'
		],
		'bold'=>true,
		'size'=>11
	],
	'fill'=>[
		'fillType' => Fill::FILL_SOLID,
		'startColor' => [
			'rgb' => '538ED5'
		]
	],
];

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Category=$_SESSION['Category'];
$Payrollyear=$_SESSION['Payrollyear'];
$Payrollmonth=$_SESSION['Payrollmonth'];
$gettime = time();
// $Downloadtime = time();
$gettime = "payroll_$Payrollmonth-$Payrollyear.xls";


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
$excel->getActiveSheet()->mergeCells("A1:AM1");
$excel->getActiveSheet()->mergeCells("A2:AM2");
$excel->getActiveSheet()->mergeCells("A3:AM3");


// set font style
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);

$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle( 'A4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'B4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'C4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'D4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'E4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'F4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'G4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'H4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'I4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'J4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'K4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'L4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'M4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'N4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'O4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'P4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'Q4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'R4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'S4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'T4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'U4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'V4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'W4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'X4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'Y4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'Z4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AA4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AB4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AC4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AD4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AE4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AF4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AG4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AH4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AI4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AJ4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AK4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AL4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AM4')->getFont()->setBold( true );

// set cell alignment
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
$excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);






// $excel->getActiveSheet()->getStyle('C')->getAlignment()->setWrapText(true);
// $excel->getActiveSheet()->getStyle('D')->getAlignment()->setWrapText(true);
// $excel->getActiveSheet()->getStyle('E')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('F')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('G')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('H')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('I')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('J')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('K')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('L')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('M')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('N')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('O')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('P')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('Q')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('S')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('T')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('U')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('V')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('W')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('X')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('Y')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('Z')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AA')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AB')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AC')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AD')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AE')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AF')->getAlignment()->setWrapText(true);

$excel->getActiveSheet()->getStyle('AI')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AJ')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AK')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AL')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AM')->getAlignment()->setWrapText(true);



//$active->fromArray($header, NULL, 'A1');  
$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD");
$active->setCellValue('A2',"Factories Act 1948 And HARYANA FACTORIES RULES 1950 (FORM NO 12 & 25) [Prescribed Under Rule 80 & 103]
Register of Adult Workers Men/Women Attendance Report for the Month of ".$Payrollmonth."-".$Payrollyear);
$active->setCellValue('A3',"Wages For Monthly Paid (".$Category.") For the Month Of ".$Payrollmonth."-".$Payrollyear);
$active->setCellValue('A4','EMPLOYEE ID');
$active->setCellValue('B4','EMPLOYEE NAME');
$active->setCellValue('C4','DEPARTMENT');
$active->setCellValue('D4','DESIGNATION');

$active->setCellValue('E4','DAYS');
$active->setCellValue('F4','P');
$active->setCellValue('G4','A');
$active->setCellValue('H4','SL');
$active->setCellValue('I4','CL');
$active->setCellValue('J4','EL');
$active->setCellValue('K4','WO');


$active->setCellValue('L4','HO');

$active->setCellValue('M4','TOTAL');

$active->setCellValue('N4','BASIC+DA');

$active->setCellValue('O4','HRA');
$active->setCellValue('P4','OTHER_ALLOWANCE');
$active->setCellValue('Q4','DA');

$active->setCellValue('R4','TOTAL');

$active->setCellValue('S4','EARNED BASIC');

$active->setCellValue('T4','EARNED HRA');

$active->setCellValue('U4','EARNED OTHERALLOWANCE');
$active->setCellValue('V4','EARNED DA');

$active->setCellValue('W4','OT_HRS');
$active->setCellValue('X4','OT_WAGES');

$active->setCellValue('Y4','EARNED WAGES');
$active->setCellValue('Z4','PF');
$active->setCellValue('AA4','ESI');
$active->setCellValue('AB4','LOP HRS');
$active->setCellValue('AC4','LOP WAGES');
$active->setCellValue('AD4','ADVANCE');
$active->setCellValue('AE4','FOOD');
$active->setCellValue('AF4','TDS');
$active->setCellValue('AG4','DORMITORY');
$active->setCellValue('AH4','TRANSPORT');
$active->setCellValue('AI4','LWF');
$active->setCellValue('AJ4','TOTAL DEDUCTION');
$active->setCellValue('AK4','NET');
$active->setCellValue('AL4','PERFORMANCE ALLOWANCE');
$active->setCellValue('AM4','TOTAL');
// $active->setCellValue('AH3','TOTAL');



$grandTotal = 0;


$GetState = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid'  ORDER BY Employeeid";

  $result_Region = $conn->query($GetState);
  $currentContenRow=5;
  if(mysqli_num_rows($result_Region) > 0) { 
  while($rows = mysqli_fetch_array($result_Region)) {  


  
    $NetWages = $rows["NetWages"];
    $PA = $rows["Performanceallowance"];
    $Total=$NetWages+$PA;
    $grandTotal +=$Total;   
    $Employeeid=$rows['Employeeid'];
    $month_num = date("m", strtotime($Payrollmonth));
    $Balanceleave = 0;
    $GetLeave ="SELECT * FROM indsys1035employeetransactionmonthleave WHERE Clientid='$Clientid' AND Employeeid='$Employeeid' AND Transactionyear='$Payrollyear' AND Transactionmonthno='$month_num'";
    $fetchLeave=mysqli_query($conn,$GetLeave);
    if(mysqli_num_rows($fetchLeave)>0)
    {
    while($rowleave=mysqli_fetch_array($fetchLeave))
    {
    $Balanceleave=$rowleave['Currentmonthbalance'];
    }
    }
    $EmployeeDailyallowance=0;
    $Empda="SELECT * FROM indsys1017employeemaster Where Clientid='$Clientid' AND Employeeid='$Employeeid'";
    $fetchEMPDA=mysqli_query($conn,$Empda);
    if(mysqli_num_rows($fetchEMPDA)>0)
    {
      while($rowempda=mysqli_fetch_array($fetchEMPDA))
      {
        $EmployeeDailyallowance=$rowempda['Day_allowance'];
        $Old_Empid=$rowempda['Old_Empid'];
      }
    }

  $active->setCellValue('A'.$currentContenRow,"$Employeeid-$Old_Empid");
  $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
  $active->setCellValue('C'.$currentContenRow,$rows['Department']);
  $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
 // $active->setCellValue('E'.$currentContenRow,$rows['PackageHoldstatus']);
  $active->setCellValue('E'.$currentContenRow,$rows['Workingdays']);
  $active->setCellValue('F'.$currentContenRow,$rows['TotalPresentdays']);
  $active->setCellValue('G'.$currentContenRow,$rows['TotalAbsentdays']);
  $active->setCellValue('H'.$currentContenRow,$rows['Totalsickleave']);
  $active->setCellValue('I'.$currentContenRow,$rows['TotalCL']);
  $active->setCellValue('J'.$currentContenRow,$rows['TotalEL']);
  $active->setCellValue('K'.$currentContenRow, $rows['Totalweekoff']);
  $active->setCellValue('L'.$currentContenRow,$rows['Nationalholidays']);
  $active->setCellValue('M'.$currentContenRow,$rows['Totaldays']);
  $active->setCellValue('N'.$currentContenRow,$rows['BasicDA']);
  $active->setCellValue('O'.$currentContenRow,$rows['HRA']);
  $active->setCellValue('P'.$currentContenRow,$rows['Otherallowance_Con_SA']);
  $active->setCellValue('Q'.$currentContenRow,$EmployeeDailyallowance);
  $active->setCellValue('R'.$currentContenRow,$rows['TotalSal']);
  $active->setCellValue('S'.$currentContenRow,$rows['EarnedBasic']);
  $active->setCellValue('T'.$currentContenRow,$rows['EarnedHRA']);
  $active->setCellValue('U'.$currentContenRow,$rows['EarnedOtherallowance_Con_SA']);
  $active->setCellValue('V'.$currentContenRow,$rows['DailyAllowanance']);
  $active->setCellValue('W'.$currentContenRow,$rows['OT_HRS']);
  $active->setCellValue('X'.$currentContenRow,$rows['OT_Wages']);
  $active->setCellValue('Y'.$currentContenRow,$rows['EarnedWages']);
  $active->setCellValue('Z'.$currentContenRow,$rows['PF']);
  $active->setCellValue('AA'.$currentContenRow,$rows['ESI']);
  $active->setCellValue('AB'.$currentContenRow,$rows['Lophrs']);
  $active->setCellValue('AC'.$currentContenRow,$rows['Lopwages']);
  $active->setCellValue('AD'.$currentContenRow,$rows['Salary_Advance']);
  $active->setCellValue('AE'.$currentContenRow,$rows['FoodDeduction']);
  $active->setCellValue('AF'.$currentContenRow,$rows['TDS']);
  $active->setCellValue('AG'.$currentContenRow,$rows['Dormitory']);
  $active->setCellValue('AH'.$currentContenRow,$rows['Transport']);
  $active->setCellValue('AI'.$currentContenRow,$rows['LWF']);
  $active->setCellValue('AJ'.$currentContenRow,$rows['TotalDeduction']);
  $active->setCellValue('AK'.$currentContenRow,$rows['NetWages']);
  $active->setCellValue('AL'.$currentContenRow,$rows['Performanceallowance']);
  $active->setCellValue('AM'.$currentContenRow,$Total);

  
  $currentContenRow++;
  

  
  

}  
  }
  $active->setCellValue('AL'.$currentContenRow,'GRAND TOTAL');
  $active->setCellValue('AM'.$currentContenRow,$grandTotal);

//loop the query data to the table in same order as the headers

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
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$tableHead = [
	'font'=>[
		'color'=>[
			'rgb'=>'FFFFFF'
		],
		'bold'=>true,
		'size'=>11
	],
	'fill'=>[
		'fillType' => Fill::FILL_SOLID,
		'startColor' => [
			'rgb' => '538ED5'
		]
	],
];

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Category=$_SESSION['Category'];
$Payrollyear=$_SESSION['Payrollyear'];
$Payrollmonth=$_SESSION['Payrollmonth'];
$gettime = time();
// $Downloadtime = time();
$gettime = "payroll_$Payrollmonth-$Payrollyear.xls";


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
$excel->getActiveSheet()->mergeCells("A1:AM1");
$excel->getActiveSheet()->mergeCells("A2:AM2");
$excel->getActiveSheet()->mergeCells("A3:AM3");


// set font style
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);

$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle( 'A4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'B4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'C4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'D4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'E4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'F4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'G4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'H4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'I4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'J4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'K4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'L4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'M4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'N4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'O4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'P4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'Q4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'R4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'S4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'T4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'U4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'V4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'W4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'X4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'Y4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'Z4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AA4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AB4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AC4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AD4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AE4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AF4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AG4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AH4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AI4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AJ4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AK4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AL4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AM4')->getFont()->setBold( true );

// set cell alignment
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
$excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);






// $excel->getActiveSheet()->getStyle('C')->getAlignment()->setWrapText(true);
// $excel->getActiveSheet()->getStyle('D')->getAlignment()->setWrapText(true);
// $excel->getActiveSheet()->getStyle('E')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('F')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('G')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('H')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('I')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('J')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('K')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('L')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('M')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('N')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('O')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('P')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('Q')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('S')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('T')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('U')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('V')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('W')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('X')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('Y')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('Z')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AA')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AB')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AC')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AD')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AE')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AF')->getAlignment()->setWrapText(true);

$excel->getActiveSheet()->getStyle('AI')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AJ')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AK')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AL')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AM')->getAlignment()->setWrapText(true);



//$active->fromArray($header, NULL, 'A1');  
$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD");
$active->setCellValue('A2',"Factories Act 1948 And HARYANA FACTORIES RULES 1950 (FORM NO 12 & 25) [Prescribed Under Rule 80 & 103]
Register of Adult Workers Men/Women Attendance Report for the Month of ".$Payrollmonth."-".$Payrollyear);
$active->setCellValue('A3',"Wages For Monthly Paid (".$Category.") For the Month Of ".$Payrollmonth."-".$Payrollyear);
$active->setCellValue('A4','EMPLOYEE ID');
$active->setCellValue('B4','EMPLOYEE NAME');
$active->setCellValue('C4','DEPARTMENT');
$active->setCellValue('D4','DESIGNATION');

$active->setCellValue('E4','DAYS');
$active->setCellValue('F4','P');
$active->setCellValue('G4','A');
$active->setCellValue('H4','SL');
$active->setCellValue('I4','CL');
$active->setCellValue('J4','EL');
$active->setCellValue('K4','WO');


$active->setCellValue('L4','HO');

$active->setCellValue('M4','TOTAL');

$active->setCellValue('N4','BASIC+DA');

$active->setCellValue('O4','HRA');
$active->setCellValue('P4','OTHER_ALLOWANCE');
$active->setCellValue('Q4','DA');

$active->setCellValue('R4','TOTAL');

$active->setCellValue('S4','EARNED BASIC');

$active->setCellValue('T4','EARNED HRA');

$active->setCellValue('U4','EARNED OTHERALLOWANCE');
$active->setCellValue('V4','EARNED DA');

$active->setCellValue('W4','OT_HRS');
$active->setCellValue('X4','OT_WAGES');

$active->setCellValue('Y4','EARNED WAGES');
$active->setCellValue('Z4','PF');
$active->setCellValue('AA4','ESI');
$active->setCellValue('AB4','LOP HRS');
$active->setCellValue('AC4','LOP WAGES');
$active->setCellValue('AD4','ADVANCE');
$active->setCellValue('AE4','FOOD');
$active->setCellValue('AF4','TDS');
$active->setCellValue('AG4','DORMITORY');
$active->setCellValue('AH4','TRANSPORT');
$active->setCellValue('AI4','LWF');
$active->setCellValue('AJ4','TOTAL DEDUCTION');
$active->setCellValue('AK4','NET');
$active->setCellValue('AL4','PERFORMANCE ALLOWANCE');
$active->setCellValue('AM4','TOTAL');
// $active->setCellValue('AH3','TOTAL');



$grandTotal = 0;


$GetState = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid'  ORDER BY Employeeid";

  $result_Region = $conn->query($GetState);
  $currentContenRow=5;
  if(mysqli_num_rows($result_Region) > 0) { 
  while($rows = mysqli_fetch_array($result_Region)) {  


  
    $NetWages = $rows["NetWages"];
    $PA = $rows["Performanceallowance"];
    $Total=$NetWages+$PA;
    $grandTotal +=$Total;   
    $Employeeid=$rows['Employeeid'];
    $month_num = date("m", strtotime($Payrollmonth));
    $Balanceleave = 0;
    $GetLeave ="SELECT * FROM indsys1035employeetransactionmonthleave WHERE Clientid='$Clientid' AND Employeeid='$Employeeid' AND Transactionyear='$Payrollyear' AND Transactionmonthno='$month_num'";
    $fetchLeave=mysqli_query($conn,$GetLeave);
    if(mysqli_num_rows($fetchLeave)>0)
    {
    while($rowleave=mysqli_fetch_array($fetchLeave))
    {
    $Balanceleave=$rowleave['Currentmonthbalance'];
    }
    }
    $EmployeeDailyallowance=0;
    $Empda="SELECT * FROM indsys1017employeemaster Where Clientid='$Clientid' AND Employeeid='$Employeeid'";
    $fetchEMPDA=mysqli_query($conn,$Empda);
    if(mysqli_num_rows($fetchEMPDA)>0)
    {
      while($rowempda=mysqli_fetch_array($fetchEMPDA))
      {
        $EmployeeDailyallowance=$rowempda['Day_allowance'];
        $Old_Empid=$rowempda['Old_Empid'];
      }
    }

  $active->setCellValue('A'.$currentContenRow,"$Employeeid-$Old_Empid");
  $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
  $active->setCellValue('C'.$currentContenRow,$rows['Department']);
  $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
 // $active->setCellValue('E'.$currentContenRow,$rows['PackageHoldstatus']);
  $active->setCellValue('E'.$currentContenRow,$rows['Workingdays']);
  $active->setCellValue('F'.$currentContenRow,$rows['TotalPresentdays']);
  $active->setCellValue('G'.$currentContenRow,$rows['TotalAbsentdays']);
  $active->setCellValue('H'.$currentContenRow,$rows['Totalsickleave']);
  $active->setCellValue('I'.$currentContenRow,$rows['TotalCL']);
  $active->setCellValue('J'.$currentContenRow,$rows['TotalEL']);
  $active->setCellValue('K'.$currentContenRow, $rows['Totalweekoff']);
  $active->setCellValue('L'.$currentContenRow,$rows['Nationalholidays']);
  $active->setCellValue('M'.$currentContenRow,$rows['Totaldays']);
  $active->setCellValue('N'.$currentContenRow,$rows['BasicDA']);
  $active->setCellValue('O'.$currentContenRow,$rows['HRA']);
  $active->setCellValue('P'.$currentContenRow,$rows['Otherallowance_Con_SA']);
  $active->setCellValue('Q'.$currentContenRow,$EmployeeDailyallowance);
  $active->setCellValue('R'.$currentContenRow,$rows['TotalSal']);
  $active->setCellValue('S'.$currentContenRow,$rows['EarnedBasic']);
  $active->setCellValue('T'.$currentContenRow,$rows['EarnedHRA']);
  $active->setCellValue('U'.$currentContenRow,$rows['EarnedOtherallowance_Con_SA']);
  $active->setCellValue('V'.$currentContenRow,$rows['DailyAllowanance']);
  $active->setCellValue('W'.$currentContenRow,$rows['OT_HRS']);
  $active->setCellValue('X'.$currentContenRow,$rows['OT_Wages']);
  $active->setCellValue('Y'.$currentContenRow,$rows['EarnedWages']);
  $active->setCellValue('Z'.$currentContenRow,$rows['PF']);
  $active->setCellValue('AA'.$currentContenRow,$rows['ESI']);
  $active->setCellValue('AB'.$currentContenRow,$rows['Lophrs']);
  $active->setCellValue('AC'.$currentContenRow,$rows['Lopwages']);
  $active->setCellValue('AD'.$currentContenRow,$rows['Salary_Advance']);
  $active->setCellValue('AE'.$currentContenRow,$rows['FoodDeduction']);
  $active->setCellValue('AF'.$currentContenRow,$rows['TDS']);
  $active->setCellValue('AG'.$currentContenRow,$rows['Dormitory']);
  $active->setCellValue('AH'.$currentContenRow,$rows['Transport']);
  $active->setCellValue('AI'.$currentContenRow,$rows['LWF']);
  $active->setCellValue('AJ'.$currentContenRow,$rows['TotalDeduction']);
  $active->setCellValue('AK'.$currentContenRow,$rows['NetWages']);
  $active->setCellValue('AL'.$currentContenRow,$rows['Performanceallowance']);
  $active->setCellValue('AM'.$currentContenRow,$Total);

  
  $currentContenRow++;
  

  
  

}  
  }
  $active->setCellValue('AL'.$currentContenRow,'GRAND TOTAL');
  $active->setCellValue('AM'.$currentContenRow,$grandTotal);

//loop the query data to the table in same order as the headers

$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
?>