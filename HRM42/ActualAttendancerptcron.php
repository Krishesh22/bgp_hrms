<?php 
set_include_path('/var/www/html/');
 include 'config.php';
set_include_path('/var/www/html/HRM42/');
//include '../config.php';
include 'examples/tcpdf_include.php';
//require_once('tcpdf_include.php');
//  $conn="";
$dbname = 'hrms';
$conn = new mysqli('localhost', 'indsys', 'Indsys@2022', 'hrms') OR die("Faild to connect");

      $Clientid =1;
   
     
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Attendancedate =  date('Y-m-d', strtotime('-1 day', strtotime($date)));
//$Attendancedate =  date('Y-m-d');
$Attendancedate2= date("d-m-Y", strtotime( $Attendancedate));

$pdf = new TCPDF('L','pt', PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $pdf=new TCPDF('L', 'pt', ['format' => [$width, $height], 'Rotate' => 270]);
// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('INDSYS');
$pdf->setTitle('Actual_Audit_attendance_report'.$Attendancedate2);
$pdf->setSubject('Actual_Audit_attendance_report');
$pdf->setKeywords('Actual_Audit_attendance_report');


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
$pdf->setFont('dejavusans', '',9);

// add a page

$pdf->AddPage();

  // output the HTML content

  $testhtml = Getattendance($conn,$Clientid,$Attendancedate);
  $pdf->writeHTML($testhtml, true, false, true, false, '');
  

  
  

// output the HTML content





// Print some HTML Cells

// reset pointer to the last page
$pdf->lastPage();

//$attendancePdf = $pdf->Output('ActualAttendance.pdf', 'I'  );

$attendancePdf = $pdf->Output('ActualAttendance.pdf', 'S'  );

$htmlMsg = '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    Dear sir/madam,
    <p style="margin:13%">PFA for actual  attendance report of the day '.date("d-m-Y",strtotime($Attendancedate)).'</p>

</body>
</html>';


require_once ('class.phpmailer.php');
include ("class.smtp.php");
$mail = new PHPMailer(false); 
$mail->IsSMTP();

$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug = 1; // enables SMTP debug information (for testing)
$mail->isSMTP();
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "tls"; // sets the prefix to the servier

$mail->Port = 587; // set the SMTP port for the GMAIL server
$mail->Username = "indsystesting@gmail.com"; // GMAIL username
$mail->Password = "mdpswobfoltlloza"; // GMAIL password

$mail->AddAddress("aj@sainmarks.com");
$mail->AddAddress("thilagam@sainmarks.com");
/*$mail->AddAddress("ranjith@indsys.holdings");
$mail->AddCC("krishnaveni@indsys.holdings");*/
$mail->AddCC("krishnaveni@indsys.holdings");
$mail->AddCC("ranjith@indsys.holdings");

// $mail->AddAddress('ranjith@indsys.holdings');
$mail->SetFrom('indsystesting@gmail.com', 'SAINMARKS');
$mail->Subject = 'Actual_and_audit_attendance_report_'.date("d-m-Y",strtotime($Attendancedate)) ;
$mail->MsgHTML($htmlMsg);
$mail->AddStringAttachment($attendancePdf,'Actual_Attendance_report_'.date("d-m-Y",strtotime($Attendancedate)).'.pdf', 'base64',  'application/pdf');
if($mail->Send()){
	echo "Mail Sent";
}else{
	echo "Not Sent";
}


function Getattendance($conn,$Clientid,$Attendancedate)

{


    $NoofPresent = 0;
    $NoofAbsents = 0;
    $Noofleave = 0;
    $NoofEmployee = 0;
    $Empattendencestatus = "";
    $Attendancedate2= date("d-m-Y", strtotime( $Attendancedate));
    $logempattendence = "SELECT * FROM indsys1029empdailyattendancemaster WHERE  Attendencedate='$Attendancedate'   and Clientid='$Clientid'   ORDER BY Attendencedate ASC";
	

    $logempattendencemaster = mysqli_query($conn, $logempattendence);
    while($rowmas = mysqli_fetch_array($logempattendencemaster)) {
        $NoofPresent = $rowmas['NoofPresent'];
        $NoofAbsents = $rowmas['NoofAbsents'];
        $Noofleave = $rowmas['Noofleave'];
        $NoofEmployee = $rowmas['NoofEmployee'];
        $Empattendencestatus = $rowmas['Empattendencestatus'];
    }

    $html="";
    $html .='<table border="1" >';
    $html .=' <thead><tr ><th colspan="13" ><h2 style="text-align:center">SAINMARKS INDUSTRIES(INDIA) PVT LTD-Tirupur</h2></th></tr>
  
    <tr>
    <th>Date</th>
    <th colspan="2">'.$Attendancedate2.'</th>
    <th > Present</th>
    <th >'.$NoofPresent.'</th>
    <th > Leave</th>
    <th >'.$Noofleave.'</th>
    <th > Absent</th>
    <th >'.$NoofAbsents.'</th>
    <th > Employees</th>
    <th >'.$NoofEmployee.'</th>
    <th >Status</th>
    <th>'.$Empattendencestatus.'</th>
    </tr>

   ';
    $html .='
 
    <tr>
    <th > S.No </th>
    <th colspan="2" style="text-align:center"> Employee ID </th>
    <th colspan="2" style="text-align:center"> Employee Name </th>
    <th style="text-align:center"> Status </th>
    <th > In Time </th>
    <th > Out Time </th>
    <th> Hrs </th>
    <th > LOP </th>
    <th > OT Intime </th>
    <th >OT Outtime</th>    
    <th > OT </th>


    </tr>
    </thead>
   ';
    $i=0;
    $logempnew = "SELECT * FROM indsys1017employeemaster WHERE Empactive='Active'  AND DATE(Date_Of_Joing) <='$Attendancedate'    and Clientid='$Clientid' ORDER BY Employeeid ASC  ";
	
   
$logempallnew = mysqli_query($conn, $logempnew);
while($row = mysqli_fetch_array($logempallnew)) {
 $i++;
  
   $Employeeid =$row['Employeeid'];

$logemp = "SELECT * FROM vwdailyattancerptadmin WHERE  Attendencedate='$Attendancedate'   and Clientid='$Clientid' and Employeeid='$Employeeid'   ORDER BY Employeeid ASC";
	
   
$logempall = mysqli_query($conn, $logemp);
while($row = mysqli_fetch_array($logempall)) {


   $Employeeid =$row['Employeeid'];
   $Title =$row['Title'];
   $Firstname =$row['Firstname'];
   $lastname =$row['lastname'];
   $AttenStatus =$row['AttenStatus'];
   $ActualIntime =$row['ActualIntime'];
   $ActualOuttime =$row['ActualOuttime'];
   $ActualOTIntime =$row['ActualOTIntime'];
   $ActualOTOuttime =$row['ActualOTOuttime'];
   $Actualaudithrs =$row['Actualaudithrs'];
   $ActualOt_HRSNew =$row['ActualOt_HRSNew'];
   $Auctualaditlop =$row['Auctualaditlop'];
   $Intime =$row['Intime'];
   $Outtime =$row['Outtime'];
   $OTIntime =$row['OTIntime'];
   $OTOuttime =$row['OTOuttime'];
   $Workinghours =$row['Workinghours'];
   $OT_HRS =$row['OT_HRS'];
   $Lophrs =$row['Lophrs'];
   $Type_Of_Posistion =$row['Type_Of_Posistion'];
   $Regsisterattendence=$row['Regsisterattendence'];
if($Type_Of_Posistion!='Category 3')
{
    $ActualOt_HRSNew ="0.00";
    $Auctualaditlop ="0.00";
    $OT_HRS ="0.00";
   $Lophrs  ="0.00";
}
$Name ="$Title$Firstname$lastname";
 

   if($Regsisterattendence==0)
    { 
        $editedAttendanceStyle ='';
    }else{
       $editedAttendanceStyle = 'style="background-color:yellow;"';
    }

    $html .= '<tr '.$editedAttendanceStyle.'> 
   <td >'.$i.'</td>
   <td colspan="2" style="text-align:center">'.$Employeeid.'</td>
   <td colspan="2" style="text-align:center">'.$Name.'</td>
   <td  style="text-align:center">'.$AttenStatus.'</td> 
   <td >'.$ActualIntime.'</td>
   <td >'.$ActualOuttime.'</td>
   <td >'.$Actualaudithrs.'</td>
   <td >'.$Auctualaditlop.'</td>
   <td >'.$ActualOTIntime.'</td>
   <td >'.$ActualOTOuttime.'</td>
   <td >'.$ActualOt_HRSNew.'</td>
 
 


   
   </tr>';



}

}
$html .='</table>';
return $html;
}

?>