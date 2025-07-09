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
$Location="";
$sqlclient = "SELECT * FROM indsys1001clientmaster where Clientid='$Clientid'";
$resultClient = $conn->query($sqlclient);
if ($resultClient->num_rows > 0) {
  while ($rowClient = $resultClient->fetch_assoc()) {
          $Location = $rowClient['Location'];
  }
}
// if($Clientid==2)
// {
//   $Location="Corporate";
// }
// else
// {
//   $Location="Warehouse";
// }

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


$active->setCellValue('A1',"BRITANNIA LABELS INDIA PVT LTD -$Location ");
$active->setCellValue('A2',"Wages For Monthly Paid  For the Month Of ".$Payrollmonth."-".$Payrollyear);
$active->setCellValue('A3','S.No');
$active->setCellValue('B3','Employeeid');
$active->setCellValue('C3','Account Holder Name');
$active->setCellValue('D3','Bankname');
$active->setCellValue('E3','Accountno');
$active->setCellValue('F3','IFSCcode');
$active->setCellValue('G3','Branch');
$active->setCellValue('H3','Total');

$currentContenRow=4;
$sno = 0;
$sqlbank = "SELECT Bankname, COUNT(*) AS count FROM vwemppayrollbanklist where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  AND Clientid='$Clientid' AND NetWages!=0 GROUP BY Bankname";


// Step 3: Execute the query
$result = $conn->query($sqlbank);

// Step 4: Process the results
if ($result->num_rows > 0) {
    while ($rowbank = $result->fetch_assoc()) {
            $Bankname = $rowbank['Bankname'];

        // $excel->getActiveSheet()->getStyle(A$currentContenRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
       $active->mergeCells("A$currentContenRow:H$currentContenRow");
        $active->setCellValue('A'.$currentContenRow, is_null($Bankname)?'No bank account':$Bankname );

        $mergeCellStyle = $active->getStyle("A$currentContenRow:G$currentContenRow");
        $mergeCellStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $mergeCellStyle->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFA0A0A0'); // Set background color
        $currentContenRow++;
        
        $GetState = "SELECT * FROM vwemppayrollbanklist where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  AND Clientid='$Clientid' AND ".(is_null($Bankname)?"Bankname IS NULL":"Bankname='$Bankname'")." AND NetWages!=0 ORDER BY Employeeid";

$result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($rows = mysqli_fetch_array($result_Region)) {  
    $sno++;
    $NetWages = $rows["NetWages"];
    $PA = $rows["Performanceallowance"];
    $Holiday_net=$rows["Holiday_net"];
    $NetPa=$NetWages+$PA+$Holiday_net;
    $active->setCellValue('A'.$currentContenRow,$sno); 
    $active->setCellValue('B'.$currentContenRow,$rows['Employeeid']);   
    $active->setCellValue('C'.$currentContenRow,$rows['Empnameaspassbook']);
    $active->setCellValue('D'.$currentContenRow,$rows['Bankname']);
    $active->setCellValue('E'.$currentContenRow,$rows['Accountno']);
    $active->setCellValue('F'.$currentContenRow,$rows['IFSCcode']);
    $active->setCellValue('G'.$currentContenRow,$rows['Branch']);
    $active->setCellValue('H'.$currentContenRow, $NetPa);  
 
  $currentContenRow++;


     
   

 }  
   }
  
      
    }
} else {
    
}


  
$sql = "SELECT SUM(NetWages)FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  AND Clientid='$Clientid' AND NetWages!=0 ORDER BY Employeeid";
$result = $conn->query($sql);

while($row = mysqli_fetch_array($result)){
  $NetWages= $row['SUM(NetWages)'];
    
}
if(empty($NetWages))
{
  $NetWages = 0;
}
$sqlPerformanceallowance = "SELECT SUM(Performanceallowance)FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  AND Clientid='$Clientid' AND NetWages!=0 ORDER BY Employeeid";
$resultPerformanceallowance = $conn->query($sqlPerformanceallowance);

while($row = mysqli_fetch_array($resultPerformanceallowance)){
  $Performanceallowance= $row['SUM(Performanceallowance)'];
    
}
if(empty($Performanceallowance))
{
  $Performanceallowance = 0;
}

$sqlHoliday_net = "SELECT SUM(Holiday_net)FROM vwemppayrollbanklist where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  AND Clientid='$Clientid' AND NetWages!=0  ORDER BY Category,Employeeid";
$resultholiday_net = $conn->query($sqlHoliday_net);    
while($row_holiday = mysqli_fetch_array($resultholiday_net)){
  $Holiday_net= $row_holiday['SUM(Holiday_net)'];        
}
if(empty($Holiday_net))
{
  $Holiday_net = 0;
}

$GrandTotal = $NetWages+$Performanceallowance+$Holiday_net;
$active->setCellValue('G'.$currentContenRow,'Grand Total');
$active->setCellValue('H'.$currentContenRow,$GrandTotal);
$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;

?>