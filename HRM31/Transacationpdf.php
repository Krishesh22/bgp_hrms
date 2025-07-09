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
$Fromdate=$_SESSION['Fromdate'];
$Todate=$_SESSION['Todate'];
$Locationidarray=$_SESSION['Locationidarray'];

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
           <tr>  
                <th >Transactionno</th>  
                <th >Date</th>  
                <th >Type</th>  
                <th >Location</th>  
                <th >Notes</th>  
                <th >Debit</th>  
                <th >Credit</th> 
             
                <th >Balance</th>  
           </tr>  
      ';  
      $content .= CreatePDF($Fromdate, $Todate,$Locationidarray,$conn,$Clientid);  
      $content .= '</table>';  
   
      $pdf->writeHTML($content, true, false, true, false, '');  

    
      $directory = "../TestPDFss/";
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



function CreatePDF($Fromdate, $Todate,$Locationidarray,$conn,$Clientid)
{
  $output = '';  
  $GetState = "SELECT * FROM vwcreditdebitdetails where Transactiondate>='$Fromdate' and Transactiondate<='$Todate' AND Clientid='$Clientid' AND Locationid in(". $Locationidarray.") ORDER BY Transactiondate";

  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $output .= '<tr>  
    <td>'.$row["Transactionno"].'</td>  
    <td>'.$row["Addormodifydatetime2"].'</td>  
    <td>'.$row["Transactiontype"].'</td>  
    <td>'.$row["Location"].'</td>  
    <td>'.$row["Transactionnotes"].'</td>  
    <td>'.$row["Debit"].'</td>  
    <td>'.$row["Credit"].'</td>  
    <td>'.$row["Balance"].'</td>  
</tr>  
    ';  
}  
return $output;
  }

}

?>