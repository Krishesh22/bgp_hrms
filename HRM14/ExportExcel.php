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
$excel->getActiveSheet()->mergeCells("A1:AH1");

// set font style
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);

$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle( 'A3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'B3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'C3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'D3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'E3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'F3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'G3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'H3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'I3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'J3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'K3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'L3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'M3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'N3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'O3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'P3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'Q3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'R3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'S3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'T3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'U3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'V3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'W3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'X3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'Y3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'Z3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AA3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AB3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AC3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AD3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AE3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AF3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AG3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AH3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AI3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'AJ3')->getFont()->setBold( true );



// set cell alignment
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);






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


//$active->fromArray($header, NULL, 'A1');  
$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD");
$active->setCellValue('A2',"Wages For Monthly Paid (".$Category.") For the Month Of ".$Payrollmonth."-".$Payrollyear);
$active->setCellValue('A3','EMPLOYEE ID');
$active->setCellValue('B3','EMPLOYEE NAME');
$active->setCellValue('C3','DEPARTMENT');
$active->setCellValue('D3','DESIGNATION');

$active->setCellValue('E3','WORKING DAYS');
$active->setCellValue('F3','WORKED DAYS');
$active->setCellValue('G3','NH');
$active->setCellValue('H3','LEAVEDAYS');
$active->setCellValue('I3','LEAVETAKEN');
$active->setCellValue('J3','BALANCELEAVE');


$active->setCellValue('K3','LOP');

$active->setCellValue('L3','TOTAL');

$active->setCellValue('M3','BASIC+DA');

$active->setCellValue('N3','HRA');
$active->setCellValue('O3','OTHER_ALLOWANCE');

$active->setCellValue('P3','TOTAL');

$active->setCellValue('Q3','EARNED BASIC');

$active->setCellValue('R3','EARNED HRA');

$active->setCellValue('S3','EARNED OTHERALLOWANCE');
$active->setCellValue('T3','EARNED DAILYALLOWANCE');

$active->setCellValue('U3','OT_HRS');
$active->setCellValue('V3','OT_WAGES');

$active->setCellValue('W3','EARNED WAGES');
$active->setCellValue('X3','PF');
$active->setCellValue('Y3','ESI');
$active->setCellValue('Z3','LOP HRS');
$active->setCellValue('AA3','LOP WAGES');
$active->setCellValue('AB3','ADVANCE');
$active->setCellValue('AC3','FOOD');
$active->setCellValue('AD3','TDS');
$active->setCellValue('AE3','DORMITORY');
$active->setCellValue('AF3','TRANSPORT');
$active->setCellValue('AG3','TOTAL DEDUCTION');
$active->setCellValue('AH3','NET');
$active->setCellValue('AI3','PERFORMANCE ALLOWANCE');
$active->setCellValue('AJ3','TOTAL');
// $active->setCellValue('AH3','TOTAL');



$grandTotal = 0;


$GetState = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid' AND NetWages!=0  ORDER BY Employeeid";

  $result_Region = $conn->query($GetState);
  $currentContenRow=4;
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
  $active->setCellValue('X'.$currentContenRow,$rows['PF']);
  $active->setCellValue('Y'.$currentContenRow,$rows['ESI']);
  $active->setCellValue('Z'.$currentContenRow,$rows['Lophrs']);
  $active->setCellValue('AA'.$currentContenRow,$rows['Lopwages']);
  $active->setCellValue('AB'.$currentContenRow,$rows['Salary_Advance']);
  $active->setCellValue('AC'.$currentContenRow,$rows['FoodDeduction']);
  $active->setCellValue('AD'.$currentContenRow,$rows['TDS']);
  $active->setCellValue('AE'.$currentContenRow,$rows['Dormitory']);
  $active->setCellValue('AF'.$currentContenRow,$rows['Transport']);
  $active->setCellValue('AG'.$currentContenRow,$rows['TotalDeduction']);
  $active->setCellValue('AH'.$currentContenRow,$rows['NetWages']);
  $active->setCellValue('AI'.$currentContenRow,$rows['Performanceallowance']);
  $active->setCellValue('AJ'.$currentContenRow,$Total);

  
  $currentContenRow++;
  

  
  

}  
  }
  $active->setCellValue('AI'.$currentContenRow,'GRAND TOTAL');
  $active->setCellValue('AJ'.$currentContenRow,$grandTotal);

//loop the query data to the table in same order as the headers

$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;
?>