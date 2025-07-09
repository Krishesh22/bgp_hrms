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
$Location="";
if($Clientid==2)
{
  $Location="Corporate";
}
else
{
  $Location="Warehouse";
}

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
$excel->getActiveSheet()->mergeCells("A1:AZ1");
$excel->getActiveSheet()->mergeCells("A2:AZ2");
$excel->getActiveSheet()->mergeCells("A3:AZ3");


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
$excel->getActiveSheet()->getStyle( 'AN4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AO4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AP4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AQ4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AR4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AS4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AT4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AU4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AV4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AW4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AX4')->getFont()->setBold  ( true );   
$excel->getActiveSheet()->getStyle( 'AY4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AZ4')->getFont()->setBold   ( true );  

$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
$excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
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
$excel->getActiveSheet()->getStyle('AN')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AO')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AP')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AQ')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AR')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AS')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AT')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AU')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AV')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AW')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AX')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AY')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AZ')->getAlignment()->setWrapText(true);

$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD  ($Location)");
$active->setCellValue('A2',"Factories Act 1948 And TAMILNADU FACTORIES RULES 1950 (FORM NO 12 & 25) [Prescribed Under Rule 80 & 103]
Register of Adult Workers Men/Women Attendance Report for the Month of ".$Payrollmonth."-".$Payrollyear);
$active->setCellValue('A3',"Wages For Monthly Paid (".$Category.") For the Month Of ".$Payrollmonth."-".$Payrollyear);
$active->setCellValue('A4','EMPLOYEE ID');
$active->setCellValue('B4','EMPLOYEE NAME');
$active->setCellValue('C4','DEPARTMENT');
$active->setCellValue('D4','DESIGNATION');
$active->setCellValue('E4','WORKING DAYS');
$active->setCellValue('F4','WORKED DAYS');
$active->setCellValue('G4','NH');
$active->setCellValue('H4','LEAVEDAYS');
$active->setCellValue('I4','LEAVETAKEN');
$active->setCellValue('J4','BALANCELEAVE');
$active->setCellValue('K4','LOP');
$active->setCellValue('L4','TOTAL');
$active->setCellValue('M4','BASIC+DA');
$active->setCellValue('N4','HRA');
$active->setCellValue('O4','OTHER_ALLOWANCE');
$active->setCellValue('P4','TOTAL');
$active->setCellValue('Q4','EARNED BASIC');
$active->setCellValue('R4','EARNED HRA');
$active->setCellValue('S4','EARNED OTHERALLOWANCE');
$active->setCellValue('T4','EARNED DAILYALLOWANCE');
$active->setCellValue('U4','OT_HRS');
$active->setCellValue('V4','OT_WAGES');
$active->setCellValue('W4','EARNED WAGES');
$active->setCellValue('X4','HOLIDAY COUNT');
$active->setCellValue('Y4','HOLIDAY WAGES');
$active->setCellValue('Z4','HOLIDAY PF');
$active->setCellValue('AA4','HOLIDAY ESI');
$active->setCellValue('AB4','EARNED PF');
$active->setCellValue('AC4','EARNED ESI');
$active->setCellValue('AD4','LOP HRS');
$active->setCellValue('AE4','LOP WAGES');
$active->setCellValue('AF4','ADVANCE');
$active->setCellValue('AG4','FOOD');
$active->setCellValue('AH4','TDS');
$active->setCellValue('AI4','DORMITORY');
$active->setCellValue('AJ4','TRANSPORT');
$active->setCellValue('AK4','HOLIDAY DEDUCTION');
$active->setCellValue('AL4','EARNED DEDUCTION');
$active->setCellValue('AM4','TOTAL PF');
$active->setCellValue('AN4','TOTAL ESI');
$active->setCellValue('AO4','TOTAL DEDUCTION');
$active->setCellValue('AP4','HOLIDAY NET');
$active->setCellValue('AQ4','EARNED NET');
$active->setCellValue('AR4','NET');
$active->setCellValue('AS4','PERFORMANCE ALLOWANCE');
$active->setCellValue('AT4','TOTAL');
$active->setCellValue('AU4','PF Employer Contribution');
$active->setCellValue('AV4','ESI Employer Contribution');
$active->setCellValue('AW4','Punching Days');
$active->setCellValue('AX4','Current Month Bonus');
$active->setCellValue('AY4','Accumulated Bonus');
$active->setCellValue('AZ4','CTC');




// $active->setCellValue('AH3','TOTAL');



$grandTotal = 0;


$GetState = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid' AND NetWages!=0  ORDER BY Employeeid";

  $result_Region = $conn->query($GetState);
  $currentContenRow=5;
  if(mysqli_num_rows($result_Region) > 0) { 
  while($rows = mysqli_fetch_array($result_Region)) {  


  
    $NetWages = $rows["NetWages"];
    $PA = $rows["Performanceallowance"];
    $Total=$NetWages+$PA;
    $grandTotal +=$Total;   
    $Holiday_Net = $rows["Holiday_net"];
    $Holiday_Total +=$Holiday_Net;
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

    $Actual_worked_days = 0;
    $PF_Employeer_contribution=0;
    $ESI_Employeer_contribution=0;
    $Currentmonth_bonus=0;
    $Bonus_till_month=0;
    $CTC_till_month=0;

    $getCtc = "SELECT * FROM indsys1026employeepayrollbonusandctc WHERE Employeeid='$Employeeid' AND SalMonth='$Payrollmonth' AND Salyear='$Payrollyear' AND Clientid='$Clientid'";
    $fetchCtc = mysqli_query($conn,$getCtc);    
    if(mysqli_num_rows($fetchCtc)>0)
    {
      while($rowCtc = mysqli_fetch_array($fetchCtc))
      {
        $Actual_worked_days = $rowCtc['Actual_worked_days'];
        $PF_Employeer_contribution = $rowCtc['PF_Employeer_contribution'];
        $ESI_Employeer_contribution = $rowCtc['ESI_Employeer_contribution'];
        $Currentmonth_bonus = $rowCtc['Currentmonth_bonus'];
        $Bonus_till_month = $rowCtc['Bonus_till_month'];
        $CTC_till_month = $rowCtc['CTC_till_month'];
      }
    }


  $active->setCellValue('A'.$currentContenRow,$rows['Employeeid']);
  $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
  $active->setCellValue('C'.$currentContenRow,$rows['Department']);
  $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
 // $active->setCellValue('E'.$currentContenRow,$rows['PackageHoldstatus']);
  $active->setCellValue('E'.$currentContenRow,$rows['Workingdays']);
  $active->setCellValue('F'.$currentContenRow,$rows['Workeddays']);
  $active->setCellValue('G'.$currentContenRow,$rows['Nationalholidays']);
  $active->setCellValue('H'.$currentContenRow,$rows['Leavedays']);
  $active->setCellValue('I'.$currentContenRow,$rows['TakenEL']);
  $active->setCellValue('J'.$currentContenRow, $Balanceleave);
  $active->setCellValue('K'.$currentContenRow,$rows['LOP']);
  $active->setCellValue('L'.$currentContenRow,$rows['Totaldays']);
  $active->setCellValue('M'.$currentContenRow,$rows['BasicDA']);
  $active->setCellValue('N'.$currentContenRow,$rows['HRA']);
  $active->setCellValue('O'.$currentContenRow,$rows['Otherallowance_Con_SA']);
  $active->setCellValue('P'.$currentContenRow,$rows['TotalSal']);
  $active->setCellValue('Q'.$currentContenRow,$rows['EarnedBasic']);
  $active->setCellValue('R'.$currentContenRow,$rows['EarnedHRA']);
  $active->setCellValue('S'.$currentContenRow,$rows['EarnedOtherallowance_Con_SA']);
  $active->setCellValue('T'.$currentContenRow,$rows['DailyAllowanance']);
  $active->setCellValue('U'.$currentContenRow,$rows['OT_HRS']);
  $active->setCellValue('V'.$currentContenRow,$rows['OT_Wages']);
  $active->setCellValue('W'.$currentContenRow,$rows['EarnedWages']);
  $active->setCellValue('X'.$currentContenRow,$rows['Holiday_count']);
  $active->setCellValue('Y'.$currentContenRow,$rows['Holiday_pay']);
  $active->setCellValue('Z'.$currentContenRow,$rows['Holiday_pf']);
  $active->setCellValue('AA'.$currentContenRow,$rows['Holiday_esi']);
  $active->setCellValue('AB'.$currentContenRow,$rows['PF']);
  $active->setCellValue('AC'.$currentContenRow,$rows['ESI']);
  $active->setCellValue('AD'.$currentContenRow,$rows['Lophrs']);
  $active->setCellValue('AE'.$currentContenRow,$rows['Lopwages']);
  $active->setCellValue('AF'.$currentContenRow,$rows['Salary_Advance']);
  $active->setCellValue('AG'.$currentContenRow,$rows['FoodDeduction']);
  $active->setCellValue('AH'.$currentContenRow,$rows['TDS']);
  $active->setCellValue('AI'.$currentContenRow,$rows['Dormitory']);
  $active->setCellValue('AJ'.$currentContenRow,$rows['Transport']);
  $active->setCellValue('AK'.$currentContenRow,$rows['Holiday_deduction']);
  $active->setCellValue('AL'.$currentContenRow,$rows['TotalDeduction']);
  $active->setCellValue('AM'.$currentContenRow,$rows['PF']+$rows['Holiday_pf']);
  $active->setCellValue('AN'.$currentContenRow,$rows['ESI']+$rows['Holiday_esi']);
  $active->setCellValue('AO'.$currentContenRow,$rows['Holiday_deduction']+$rows['TotalDeduction']);
  $active->setCellValue('AP'.$currentContenRow,$rows['Holiday_net']);
  $active->setCellValue('AQ'.$currentContenRow,$rows['NetWages']);
  $active->setCellValue('AR'.$currentContenRow,$rows['Holiday_net']+$rows['NetWages']);
  $active->setCellValue('AS'.$currentContenRow,$rows['Performanceallowance']);
  $active->setCellValue('AT'.$currentContenRow,$rows['Holiday_net']+$rows['NetWages']+$rows['Performanceallowance']);
  $active->setCellValue('AU'.$currentContenRow,$PF_Employeer_contribution);
  $active->setCellValue('AV'.$currentContenRow,$ESI_Employeer_contribution);
  $active->setCellValue('AW'.$currentContenRow,$Actual_worked_days);
  $active->setCellValue('AX'.$currentContenRow,$Currentmonth_bonus);    
  $active->setCellValue('AY'.$currentContenRow,$Bonus_till_month);   
  $active->setCellValue('AZ'.$currentContenRow,$CTC_till_month);
  
  $currentContenRow++;
  

  
  

}  
  }
  $active->setCellValue('AS'.$currentContenRow,'GRAND TOTAL');
  $active->setCellValue('AT'.$currentContenRow,$grandTotal+$Holiday_Total);


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
$Location="";
if($Clientid==2)
{
  $Location="Corporate";
}
else
{
  $Location="Warehouse";
}

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
$excel->getActiveSheet()->mergeCells("A1:AT1");
$excel->getActiveSheet()->mergeCells("A2:AT2");
$excel->getActiveSheet()->mergeCells("A3:AT3");


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
$excel->getActiveSheet()->getStyle( 'AN4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AO4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AP4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AQ4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AR4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AS4')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AT4')->getFont()->setBold( true );

$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
$excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
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
$excel->getActiveSheet()->getStyle('AN')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AO')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AP')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AQ')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AR')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AS')->getAlignment()->setWrapText(true);
$excel->getActiveSheet()->getStyle('AT')->getAlignment()->setWrapText(true);

$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD  ($Location)");
$active->setCellValue('A2',"Factories Act 1948 And TAMILNADU FACTORIES RULES 1950 (FORM NO 12 & 25) [Prescribed Under Rule 80 & 103]
Register of Adult Workers Men/Women Attendance Report for the Month of ".$Payrollmonth."-".$Payrollyear);
$active->setCellValue('A3',"Wages For Monthly Paid (".$Category.") For the Month Of ".$Payrollmonth."-".$Payrollyear);
$active->setCellValue('A4','EMPLOYEE ID');
$active->setCellValue('B4','EMPLOYEE NAME');
$active->setCellValue('C4','DEPARTMENT');
$active->setCellValue('D4','DESIGNATION');
$active->setCellValue('E4','WORKING DAYS');
$active->setCellValue('F4','WORKED DAYS');
$active->setCellValue('G4','NH');
$active->setCellValue('H4','LEAVEDAYS');
$active->setCellValue('I4','LEAVETAKEN');
$active->setCellValue('J4','BALANCELEAVE');
$active->setCellValue('K4','LOP');
$active->setCellValue('L4','TOTAL');
$active->setCellValue('M4','BASIC+DA');
$active->setCellValue('N4','HRA');
$active->setCellValue('O4','OTHER_ALLOWANCE');
$active->setCellValue('P4','TOTAL');
$active->setCellValue('Q4','EARNED BASIC');
$active->setCellValue('R4','EARNED HRA');
$active->setCellValue('S4','EARNED OTHERALLOWANCE');
$active->setCellValue('T4','EARNED DAILYALLOWANCE');
$active->setCellValue('U4','OT_HRS');
$active->setCellValue('V4','OT_WAGES');
$active->setCellValue('W4','EARNED WAGES');
$active->setCellValue('X4','HOLIDAY COUNT');
$active->setCellValue('Y4','HOLIDAY WAGES');
$active->setCellValue('Z4','HOLIDAY PF');
$active->setCellValue('AA4','HOLIDAY ESI');
$active->setCellValue('AB4','EARNED PF');
$active->setCellValue('AC4','EARNED ESI');
$active->setCellValue('AD4','LOP HRS');
$active->setCellValue('AE4','LOP WAGES');
$active->setCellValue('AF4','ADVANCE');
$active->setCellValue('AG4','FOOD');
$active->setCellValue('AH4','TDS');
$active->setCellValue('AI4','DORMITORY');
$active->setCellValue('AJ4','TRANSPORT');
$active->setCellValue('AK4','HOLIDAY DEDUCTION');
$active->setCellValue('AL4','EARNED DEDUCTION');
$active->setCellValue('AM4','TOTAL PF');
$active->setCellValue('AN4','TOTAL ESI');
$active->setCellValue('AO4','TOTAL DEDUCTION');
$active->setCellValue('AP4','HOLIDAY NET');
$active->setCellValue('AQ4','EARNED NET');
$active->setCellValue('AR4','NET');
$active->setCellValue('AS4','PERFORMANCE ALLOWANCE');
$active->setCellValue('AT4','TOTAL');





// $active->setCellValue('AH3','TOTAL');



$grandTotal = 0;


$GetState = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid' AND NetWages!=0  ORDER BY Employeeid";

  $result_Region = $conn->query($GetState);
  $currentContenRow=5;
  if(mysqli_num_rows($result_Region) > 0) { 
  while($rows = mysqli_fetch_array($result_Region)) {  


  
    $NetWages = $rows["NetWages"];
    $PA = $rows["Performanceallowance"];
    $Total=$NetWages+$PA;
    $grandTotal +=$Total;   
    $Holiday_Net = $rows["Holiday_net"];
    $Holiday_Total +=$Holiday_Net;
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

  $active->setCellValue('A'.$currentContenRow,$rows['Employeeid']);
  $active->setCellValue('B'.$currentContenRow,$rows['Fullname']);
  $active->setCellValue('C'.$currentContenRow,$rows['Department']);
  $active->setCellValue('D'.$currentContenRow,$rows['Designation']);
 // $active->setCellValue('E'.$currentContenRow,$rows['PackageHoldstatus']);
  $active->setCellValue('E'.$currentContenRow,$rows['Workingdays']);
  $active->setCellValue('F'.$currentContenRow,$rows['Workeddays']);
  $active->setCellValue('G'.$currentContenRow,$rows['Nationalholidays']);
  $active->setCellValue('H'.$currentContenRow,$rows['Leavedays']);
  $active->setCellValue('I'.$currentContenRow,$rows['TakenEL']);
  $active->setCellValue('J'.$currentContenRow, $Balanceleave);
  $active->setCellValue('K'.$currentContenRow,$rows['LOP']);
  $active->setCellValue('L'.$currentContenRow,$rows['Totaldays']);
  $active->setCellValue('M'.$currentContenRow,$rows['BasicDA']);
  $active->setCellValue('N'.$currentContenRow,$rows['HRA']);
  $active->setCellValue('O'.$currentContenRow,$rows['Otherallowance_Con_SA']);
  $active->setCellValue('P'.$currentContenRow,$rows['TotalSal']);
  $active->setCellValue('Q'.$currentContenRow,$rows['EarnedBasic']);
  $active->setCellValue('R'.$currentContenRow,$rows['EarnedHRA']);
  $active->setCellValue('S'.$currentContenRow,$rows['EarnedOtherallowance_Con_SA']);
  $active->setCellValue('T'.$currentContenRow,$rows['DailyAllowanance']);
  $active->setCellValue('U'.$currentContenRow,$rows['OT_HRS']);
  $active->setCellValue('V'.$currentContenRow,$rows['OT_Wages']);
  $active->setCellValue('W'.$currentContenRow,$rows['EarnedWages']);
  $active->setCellValue('X'.$currentContenRow,$rows['Holiday_count']);
  $active->setCellValue('Y'.$currentContenRow,$rows['Holiday_pay']);
  $active->setCellValue('Z'.$currentContenRow,$rows['Holiday_pf']);
  $active->setCellValue('AA'.$currentContenRow,$rows['Holiday_esi']);
  $active->setCellValue('AB'.$currentContenRow,$rows['PF']);
  $active->setCellValue('AC'.$currentContenRow,$rows['ESI']);
  $active->setCellValue('AD'.$currentContenRow,$rows['Lophrs']);
  $active->setCellValue('AE'.$currentContenRow,$rows['Lopwages']);
  $active->setCellValue('AF'.$currentContenRow,$rows['Salary_Advance']);
  $active->setCellValue('AG'.$currentContenRow,$rows['FoodDeduction']);
  $active->setCellValue('AH'.$currentContenRow,$rows['TDS']);
  $active->setCellValue('AI'.$currentContenRow,$rows['Dormitory']);
  $active->setCellValue('AJ'.$currentContenRow,$rows['Transport']);
  $active->setCellValue('AK'.$currentContenRow,$rows['Holiday_deduction']);
  $active->setCellValue('AL'.$currentContenRow,$rows['TotalDeduction']);
  $active->setCellValue('AM'.$currentContenRow,$rows['PF']+$rows['Holiday_pf']);
  $active->setCellValue('AN'.$currentContenRow,$rows['ESI']+$rows['Holiday_esi']);
  $active->setCellValue('AO'.$currentContenRow,$rows['Holiday_deduction']+$rows['TotalDeduction']);
  $active->setCellValue('AP'.$currentContenRow,$rows['Holiday_net']);
  $active->setCellValue('AQ'.$currentContenRow,$rows['NetWages']);
  $active->setCellValue('AR'.$currentContenRow,$rows['Holiday_net']+$rows['NetWages']);
  $active->setCellValue('AS'.$currentContenRow,$rows['Performanceallowance']);
  $active->setCellValue('AT'.$currentContenRow,$rows['Holiday_net']+$rows['NetWages']+$rows['Performanceallowance']);
  $currentContenRow++;
  

  
  

}  
  }
  $active->setCellValue('AS'.$currentContenRow,'GRAND TOTAL');
  $active->setCellValue('AT'.$currentContenRow,$grandTotal+$Holiday_Total);


//loop the query data to the table in same order as the headers

$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
?>