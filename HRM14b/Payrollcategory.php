<<<<<<< HEAD
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
$Category=$_SESSION['Category'];
$Payrollyear=$_SESSION['Payrollyear'];
$Payrollmonth=$_SESSION['Payrollmonth'];

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

     // set document information
     $pdf->setCreator(PDF_CREATOR);
     $pdf->setAuthor('INDSYS');
     $pdf->setTitle('Transaction-Details');
     $pdf->setSubject('Transaction');
     $pdf->setKeywords('Transaction');
     
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
      $content = '';  
      $content .= '  
      <h3 align="center">Transaction Details</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
      <thead>

      <tr >

          <th style="width: 50px;">S.No</th>


          <th>ID</th>
          <th>Name</th>
          <th>Dept</th>
          <th>Designation</th>
          <th>Status</th>
          
          <th>Working</th>
          <th>Worked</th>
          <th>NH</th>
          <th>Leavedays</th>
          <th>CL</th>
          <th>LOP</th>
          <th >Total</th>
          <th>Basic+DA</th>
          <th>HRA</th>
          <th>Other_Allowance</th>
          <th class="tabletotalrow">Total</th>
          <th>Earned Basic</th>
          <th>Earned HRA</th>
          <th>Earned OtherAllowance</th>
          <th>Earned DA</th>
          <th>OT_HRS</th>
          <th>OT_Wages</th>
          <th >Earned Wages</th>
          <th>PF</th>
          <th>ESI</th>
          <th>Advance</th>
          <th>Food</th>

          <th>TDS</th>
          <th >Deduction</th>
          <th >Net</th>
          <th  title="Performance Allowance">
              PA</th>
         
      </tr>
  </thead>
      ';  
      $content .= CreatePDF($Category, $Payrollyear,$Payrollmonth,$conn,$Clientid);  
      $content .= '</table>';  
   
      $pdf->writeHTML($content, true, false, true, false, '');  

    

      //$filename ='Payroll.pdf';
      $filename = time().'.pdf';

      if(!is_dir($directory)){mkdir($directory, 0777);}
    //   // ---------------------------------------------------------
    //   if(!is_dir($directory)){
    //       mkdir($directory);
    //     }
        $file =$filename;
      //Close and output PDF document
      //$pdf->Output(dirname(__DIR__, 1)."$directory$filename", 'F'  );
      $pdf->Output("$filename", 'D');
     //$filename = "$filename ";
        
      // Header content type
    //   header("Content-type: application/pdf");
        
    //   header("Content-Length: " . filesize($filename));
        
    //   // Send the file to the browser.
    //   readfile($filename);



function CreatePDF($Category, $Payrollyear,$Payrollmonth,$conn,$Clientid)
{
  $output = '';  
  $i=0;
  $GetState = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid'  ORDER BY Employeeid";

  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $i++;
    $output .= '<tr>  

    <td>'.$i.'</td>  
    <td>'.$row["Employeeid"].'</td>  
    <td>'.$row["Fullname"].'</td>  
    <td>'.$row["Department"].'</td>  
    <td>'.$row["Designation"].'</td>  
    <td>'.$row["PackageHoldstatus"].'</td>  
    <td>'.$row["Workingdays"].'</td>  
    <td>'.$row["Workeddays"].'</td>  
    <td>'.$row["Nationalholidays"].'</td>  
    <td>'.$row["Leavedays"].'</td>  
    <td>'.$row["CL"].'</td>  
    <td>'.$row["LOP"].'</td>  
    <td>'.$row["Totaldays"].'</td>  
    <td>'.$row["BasicDA"].'</td>  
    <td>'.$row["HRA"].'</td>  
    <td>'.$row["Otherallowance_Con_SA"].'</td>  
    <td>'.$row["TotalSal"].'</td>  
    <td>'.$row["EarnedBasic"].'</td>  
    <td>'.$row["EarnedHRA"].'</td>  
    <td>'.$row["EarnedOtherallowance_Con_SA"].'</td>  
    <td>'.$row["DailyAllowanance"].'</td>  
    <td>'.$row["OT_HRS"].'</td>  
    <td>'.$row["OT_Wages"].'</td>  
    <td>'.$row["EarnedWages"].'</td>  
    <td>'.$row["PF"].'</td>  
    <td>'.$row["ESI"].'</td>  
    <td>'.$row["Salary_Advance"].'</td>  
    <td>'.$row["FoodDeduction"].'</td>  
    <td>'.$row["TDS"].'</td>  
    <td>'.$row["NetWages"].'</td>  
    <td>'.$row["Performanceallowance"].'</td>  
   
</tr>  
    ';  
}  
return $output;
  }

}

=======
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
$Category=$_SESSION['Category'];
$Payrollyear=$_SESSION['Payrollyear'];
$Payrollmonth=$_SESSION['Payrollmonth'];

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

     // set document information
     $pdf->setCreator(PDF_CREATOR);
     $pdf->setAuthor('INDSYS');
     $pdf->setTitle('Transaction-Details');
     $pdf->setSubject('Transaction');
     $pdf->setKeywords('Transaction');
     
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
      $content = '';  
      $content .= '  
      <h3 align="center">Transaction Details</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
      <thead>

      <tr >

          <th style="width: 50px;">S.No</th>


          <th>ID</th>
          <th>Name</th>
          <th>Dept</th>
          <th>Designation</th>
          <th>Status</th>
          
          <th>Working</th>
          <th>Worked</th>
          <th>NH</th>
          <th>Leavedays</th>
          <th>CL</th>
          <th>LOP</th>
          <th >Total</th>
          <th>Basic+DA</th>
          <th>HRA</th>
          <th>Other_Allowance</th>
          <th class="tabletotalrow">Total</th>
          <th>Earned Basic</th>
          <th>Earned HRA</th>
          <th>Earned OtherAllowance</th>
          <th>Earned DA</th>
          <th>OT_HRS</th>
          <th>OT_Wages</th>
          <th >Earned Wages</th>
          <th>PF</th>
          <th>ESI</th>
          <th>Advance</th>
          <th>Food</th>

          <th>TDS</th>
          <th >Deduction</th>
          <th >Net</th>
          <th  title="Performance Allowance">
              PA</th>
         
      </tr>
  </thead>
      ';  
      $content .= CreatePDF($Category, $Payrollyear,$Payrollmonth,$conn,$Clientid);  
      $content .= '</table>';  
   
      $pdf->writeHTML($content, true, false, true, false, '');  

    

      //$filename ='Payroll.pdf';
      $filename = time().'.pdf';

      if(!is_dir($directory)){mkdir($directory, 0777);}
    //   // ---------------------------------------------------------
    //   if(!is_dir($directory)){
    //       mkdir($directory);
    //     }
        $file =$filename;
      //Close and output PDF document
      //$pdf->Output(dirname(__DIR__, 1)."$directory$filename", 'F'  );
      $pdf->Output("$filename", 'D');
     //$filename = "$filename ";
        
      // Header content type
    //   header("Content-type: application/pdf");
        
    //   header("Content-Length: " . filesize($filename));
        
    //   // Send the file to the browser.
    //   readfile($filename);



function CreatePDF($Category, $Payrollyear,$Payrollmonth,$conn,$Clientid)
{
  $output = '';  
  $i=0;
  $GetState = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid'  ORDER BY Employeeid";

  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $i++;
    $output .= '<tr>  

    <td>'.$i.'</td>  
    <td>'.$row["Employeeid"].'</td>  
    <td>'.$row["Fullname"].'</td>  
    <td>'.$row["Department"].'</td>  
    <td>'.$row["Designation"].'</td>  
    <td>'.$row["PackageHoldstatus"].'</td>  
    <td>'.$row["Workingdays"].'</td>  
    <td>'.$row["Workeddays"].'</td>  
    <td>'.$row["Nationalholidays"].'</td>  
    <td>'.$row["Leavedays"].'</td>  
    <td>'.$row["CL"].'</td>  
    <td>'.$row["LOP"].'</td>  
    <td>'.$row["Totaldays"].'</td>  
    <td>'.$row["BasicDA"].'</td>  
    <td>'.$row["HRA"].'</td>  
    <td>'.$row["Otherallowance_Con_SA"].'</td>  
    <td>'.$row["TotalSal"].'</td>  
    <td>'.$row["EarnedBasic"].'</td>  
    <td>'.$row["EarnedHRA"].'</td>  
    <td>'.$row["EarnedOtherallowance_Con_SA"].'</td>  
    <td>'.$row["DailyAllowanance"].'</td>  
    <td>'.$row["OT_HRS"].'</td>  
    <td>'.$row["OT_Wages"].'</td>  
    <td>'.$row["EarnedWages"].'</td>  
    <td>'.$row["PF"].'</td>  
    <td>'.$row["ESI"].'</td>  
    <td>'.$row["Salary_Advance"].'</td>  
    <td>'.$row["FoodDeduction"].'</td>  
    <td>'.$row["TDS"].'</td>  
    <td>'.$row["NetWages"].'</td>  
    <td>'.$row["Performanceallowance"].'</td>  
   
</tr>  
    ';  
}  
return $output;
  }

}

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
?>