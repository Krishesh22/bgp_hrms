<?php
set_include_path('/var/www/html/');
include 'config.php';
set_include_path('/var/www/html/HRM42/');
require_once('class.phpmailer.php');
include("class.smtp.php");

for ($Clientid = 2; $Clientid <= 4; $Clientid++) {


  $Message = '';
  date_default_timezone_set('Asia/Kolkata');
  $Subject = "Document Expiry";
  $Changes = "";
  $Status = "Starting";
  $Startdateandtime = date("Y-m-d H:i:s");

  date_default_timezone_set('Asia/Kolkata');
  $date = date("Y-m-d H:i:s");
  $currentdate = date("Y-m-d");
  $x=1;
  $html = '<div> Dear User,</div><br/>';
  $html .= '<div > This is a reminder regarding the upcoming expiration of the document mentioned below:</div><br/>';
  $html .= '<table border="1" >';
  $html .= '<thead>
<tr>
<th>Document No</th>
<th> Document Name</th>
<th> Expire Date </th>
<th> Remaining Days </th>

</tr>
</thead>';


  $GetExpireddate = "SELECT * FROM indsys1054documentmaster WHERE curdate()<=ExpiredDate AND ExpiredDate <= DATE_ADD(CURDATE(), INTERVAL Renewalnotificationindays DAY) AND Renewalyesorno='Yes' AND Documentstatus='Open' AND Clientid='$Clientid'";
  $Getresult = mysqli_query($conn, $GetExpireddate);
  while ($row = mysqli_fetch_assoc($Getresult)) {
    $expiryDate = $row['ExpiredDate'];
    $renewalDays = $row['Renewalnotificationindays'];
    $Documentnoasperrecord = $row['Documentnoasperrecord'];
    $Documentname = $row['Documentname'];
    $today = date('Y-m-d');
    $expirationDate = date('Y-m-d', strtotime($expiryDate));
    $remainingDays = floor((strtotime($expirationDate) - strtotime($today)) / (60 * 60 * 24));

    $expiryDate2 = date("d-m-Y", strtotime($expiryDate));
    if ($remainingDays > 0) {
       if ($remainingDays <= $renewalDays) {
        $x=2;
        $html .= '<tr>
        <td>' . $Documentnoasperrecord . '</td>
        <td> ' . $Documentname . '</td>
        <td> ' . $expiryDate2 . '</td>
        <td style="text-align:right;"> ' . $remainingDays . '</td>
        </tr>';
      }
    }
  }


  $html .= '</table>';


  if ($x==2) {
    $mail = new PHPMailer(false);
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com"; 
    $mail->SMTPDebug = 1; 
    $mail->isSMTP();
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = "tls"; 
    $mail->Port = 587; 
    $mail->Username = "indsystesting@gmail.com"; 
    $mail->Password = "mdpswobfoltlloza"; 
   
    $mail->AddAddress("compliance1.india@britanniapackaging.com");
    $mail->AddCC("hrm@sainmarks.com");
    $mail->AddCC("Shajan.thomas@britanniapackaging.com");
    $mail->AddCC("sundar@sainmarks.com");
    $mail->AddCC("aj@sainmarks.com");
    $mail->AddCC("accounts.india@britanniapackaging.com");
    $mail->AddCC("krishnaveni@indsysholdings.com");
    $mail->SetFrom('indsystesting@gmail.com', 'BRITANNIA');
    $mail->SetFrom('indsystesting@gmail.com', 'BRITANNIA');
    $mail->Subject = "Document Expiry Reminder";
    $mail->MsgHTML($html);
    $Status = "*";
    if ($mail->Send()) {

      $Status = "Sent  ";
      echo "Mail Sent";
    } else {
      $Status = "Failed";
      echo "Not Sent";
    }
   
  }
  Logfiletext($Clientid, $Subject, $Status, $Startdateandtime);
}
function Logfiletext($Clientid, $Subject, $Status, $Startdateandtime)
{

  $Folderid = "bgpdoc-$Clientid";
  $directory3 = "/var/www/html/$Folderid/";
  $directory = "/var/www/html/$Folderid/Cronlog/";
  if (!is_dir($directory3)) {
    mkdir($directory3, 0777);
  }

  if (!is_dir($directory)) {
    mkdir($directory, 0777);
  }

  $Logdatetime = date('Y-m-d H:i:s');
  $logMessage = "Start-$Startdateandtime   End-$Logdatetime   $Status - $Subject";

  //echo $logMessage;
  $logFile = "$directory/cron.log";
  if (!file_exists($logFile)) {
    $logDirectory = dirname($logFile);
    if (!file_exists($logDirectory)) {
      if (mkdir($logDirectory, 0777, true)) {
        echo "Log directory created successfully.";
      } else {
        echo "Failed to create log directory.";
      }
    }

    // Create the log file
    if (touch($logFile)) {
      echo "Log file created successfully.";
    } else {
      echo "Failed to create log file.";
    }
  }
  $fileHandle = fopen($logFile, 'a');
  fwrite($fileHandle, $logMessage . PHP_EOL);
  fclose($fileHandle);
}
