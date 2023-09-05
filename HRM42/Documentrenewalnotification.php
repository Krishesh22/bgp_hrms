<?php 
set_include_path('/var/www/html/');
 include 'config.php';
// include '../config.php';
set_include_path('/var/www/html/HRM42/');
require_once ('class.phpmailer.php');
include ("class.smtp.php");


   
   
     
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$currentdate = date("Y-m-d" );
$X=1;
$html = '<p> Dear User ,</p>';
$html .='<br/>';
$html .='<p> The Following Documents are expired very soon,kindly take the necessary action.</p>';
$html .= '<table border="1">';
$html .='<thead>
<tr>
<th>Document No</th>
<th> Document Name</th>
<th> Expired Date </th>

</tr>
</thead>';


$GetExpireddate = "SELECT * FROM indsys1054documentmaster WHERE curdate()<=ExpiredDate AND ExpiredDate <= DATE_ADD(CURDATE(), INTERVAL Renewalnotificationindays DAY) AND Renewalyesorno='Yes' AND Documentstatus='Open'";
$Getresult = mysqli_query($conn,$GetExpireddate);
while ($row = mysqli_fetch_assoc($Getresult)) {
    // Get the necessary data from the row
  

    $expiryDate = $row['ExpiredDate'];
    $renewalDays = $row['Renewalnotificationindays'];

    $Documentnoasperrecord = $row['Documentnoasperrecord'];
    
    $Documentname = $row['Documentname'];

    // Calculate the number of days until expiration
    $today = date('Y-m-d');
    $expirationDate = date('Y-m-d', strtotime($expiryDate));
    $remainingDays = floor((strtotime($expirationDate) - strtotime($today)) / (60 * 60 * 24));

    $expiryDate2 = date("d-m-Y", strtotime( $expiryDate));
    if($remainingDays >0)
    {
    // Send expiration notification if within the renewal days
    if ($remainingDays <= $renewalDays) {

      $X=2;
      $html .='<tr>
      <td>'.$Documentnoasperrecord.'</td>
      <td> '.$Documentname.'</td>
      <td> '.$expiryDate2.'</td>
      </tr>';
       

     
    }
}
}

$html .='</table>';

if($X==2)
{


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

 $mail->AddAddress("hrm@sainmarks.com");
$mail->AddAddress("Shajan.thomas@britanniapackaging.com");
$mail->AddAddress("compliance1.india@britanniapackaging.com");
$mail ->AddAddress("sundar@sainmarks.com");
$mail->AddCC("aj@sainmarks.com");

$mail->AddCC("krishnaveni@indsys.holdings");
$mail->AddCC("ranjith@indsys.holdings");

// $mail->AddAddress('ranjith@indsys.holdings');
$mail->SetFrom('indsystesting@gmail.com', 'SAINMARKS');
$mail->Subject = "Document Expiry Reminder";
$mail->MsgHTML($html);

if($mail->Send()){
  echo "Mail Sent";
}else{
  echo "Not Sent";
}

}



?>