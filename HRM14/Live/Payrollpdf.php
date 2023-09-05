<?php 
include '../config.php';

include 'examples/tcpdf_include.php';
//require_once('tcpdf_include.php');
session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );

$Payrollmonth =$_SESSION["Payrollmonth"] ;
$Payrollyear =$_SESSION["Payrollyear"] ;

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('INDSYS');
$pdf->setTitle('Payroll-Employee');
$pdf->setSubject('Payroll');
$pdf->setKeywords('Payroll');

// set default header data
//$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);


$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);



// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('dejavusans', '', 10);

// add a page

$pdf->AddPage();
$logemp = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Clientid='$Clientid' and SalMonth='$Payrollmonth' and Salyear='$Payrollyear' ORDER BY Employeeid ASC";
	
   
$logempall = mysqli_query($conn, $logemp);
while($row = mysqli_fetch_array($logempall)) {
  $month = $row['SalMonth'];
  $Salyear = $row['Salyear'];
  $Title = $row['Title'];
  $Fullname = $row['Fullname'];
  $Department = $row['Department'];
  $Designation = $row['Designation'];
  $Workingdays = $row['Workingdays'];
  $Workeddays = $row['Workeddays'];
  $Category = $row['Category'];
  $Nationalholidays = $row['Nationalholidays'];
  $Leavedays = $row['Leavedays'];
  $CL = $row['CL'];
  $LOP = $row['LOP'];
  $Totaldays = $row['Totaldays'];
  $BasicDA = $row['BasicDA'];
  $HRA = $row['HRA'];
  $Otherallowance_Con_SA = $row['Otherallowance_Con_SA'];
  $TotalSal = $row['TotalSal'];  
  $EarnedBasic = $row['EarnedBasic'];
  $EarnedHRA = $row['EarnedHRA'];
  $EarnedOtherallowance_Con_SA = $row['EarnedOtherallowance_Con_SA'];
  $EarnedWages = $row['EarnedWages'];
  $PF = $row['PF'];
  $ESI = $row['ESI'];  
  $Salary_Advance = $row['Salary_Advance'];
  $FoodDeduction = $row['FoodDeduction'];

  $TotalDeduction = $row['TotalDeduction'];
  $NetWages = $row['NetWages'];
  $DailyAllowanance = $row['DailyAllowanance'];
  $TDS = $row['TDS'];  
  $OT_HRS = $row['OT_HRS'];
  $OT_Wages = $row['OT_Wages'];
  $Employeeid =$row['Employeeid'];

 

  // $pdf->AddPage();
  $html = '<table border="0"><tr><td style="width:355px"><img src="../Logo/Sainmarknewlogo.png" width="130" height="60" border="0"/></td><td>
  <p style="font-size:14px;">BRITANNIA GARMENT PACKAGING<br/><br/>Payslip for <b>'.$Title.' '.$Fullname.'</b></p></td></tr></table><br/><hr/>&nbsp;';
  
  
  $pdf->setFont('dejavusans', '', 8);
  
  $html .= '<br/>
  <table border="1" cellpadding="5">
  <tr><td>Name</td><td>'.$Fullname.'</td><td>Payslip Month & Year</td><td>'.$month.'-'.$Salyear.'</td></tr>
  <tr><td>Department</td><td>'.$Department.'</td><td>Workingdays</td><td>'.$Workingdays.'</td></tr>
  <tr><td>Employee ID</td><td>'.$Employeeid.' </td><td>Workeddays</td><td>'.$Workeddays.'</td></tr>
  <tr><td>Designation</td><td>'.$Designation.'</td><td>LOP</td><td>'.$LOP.'</td></tr>
  <tr><td>Employee Category</td><td>'.$Category.'</td><td></td><td></td></tr>
  </table>
  <br/><br/>
  
  <table border="1" cellpadding="5">
      <tbody>
          <tr>
          <td rowspan="2"></td>
              <td colspan="2" align="center">Allowances</td>
              <td colspan="2"  align="center" rowspan="2"><br/><br/>Deductions</td>
          </tr>
  
  
  
          <tr>
              <td align="center">Standard</td>
              <td align="center">Earned</td>
          </tr>
          <tr>
              <td>Basic DA</td>
              <td>'.$BasicDA.'</td>
              <td>'.$EarnedBasic.'</td>
              <td>Salary Advance</td>
              <td>'.$Salary_Advance.'</td>
          </tr>
          <tr>
              <td>HRA</td>
              <td>'.$HRA.'</td>
              <td>'.$EarnedHRA.'</td>
              <td>Food</td>
              <td>'.$FoodDeduction.'</td>
          </tr>
          <tr>
              <td>Other Allowances</td>
              <td>'.$Otherallowance_Con_SA.'</td>
              <td>'.$EarnedOtherallowance_Con_SA.'</td>
              <td>TDS</td>
              <td>'.$TDS.'</td>
          </tr>
  
          <tr>
              <td>Total</td>
              <td>'.$TotalSal.'</td>
              <td>'.$EarnedWages.'</td>
              <td>Total</td>
              <td>'.$TotalDeduction.'</td>
          </tr>
  
      </tbody>
  </table>
  
  <br/><br/>
  
  
  <table border="0" cellpadding="7">
  
  <tr><td>PF     :</td><td>'.$PF.'</td><td></td><td></td></tr>
  <tr><td>ESI :</td><td>'.$ESI.'</td><td>Net Salary:</td><td>'.$NetWages.'</td></tr>
  </table>
  

  
  <p><b>Note</b>: <i>This is a computer generated payslip & does not require a signature.</i></p>
  
  ';
  
  // output the HTML content
  $pdf->writeHTML($html, true, false, true, false, '');
  

  
  
}
// output the HTML content





// Print some HTML Cells

// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

$pdf ->AddPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print all HTML colors

// add a page


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$directory = "../PayRoll/";
$filename ='Payroll.pdf';
// ---------------------------------------------------------
if(!is_dir($directory)){
    mkdir($directory);
  }
  $file =$filename;
//Close and output PDF document
$pdf->Output(dirname(__DIR__, 1)."$filename", 'I'  );

// $filename = "$directory$filename";
  
// // Header content type
// header("Content-type: application/pdf");
  
// header("Content-Length: " . filesize($filename));
  
// // Send the file to the browser.
// readfile($filename);
?>