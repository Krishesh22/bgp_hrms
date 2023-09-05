<?php

include '../config.php';
require_once ('class.phpmailer.php');
include ("class.smtp.php");
$mail = new PHPMailer(false); 
$mail->IsSMTP();
$tstbody = "";
$Usermailid = "";
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$date = date("Y-m-d " );



$MailTo = "";
$output ="";
$i=0;

$GetAttendenceDate = "SELECT * FROM indsys1029empdailyattendancemaster where  Attendencedate !='$date' and Empattendencestatus='Open'  ";
$result_Supermail = $conn->query($GetAttendenceDate );
if(mysqli_num_rows($result_Supermail) > 0) { 

  
while($row = $result_Supermail->fetch_assoc()) {  
  $i++;

    $Attendencedate = $row['Attendencedate'];
    $Attendencedate2 =date('d-M-Y', strtotime($Attendencedate));
    $output .= '<tr>  
    <td>'.$i.'</td>
    <td>'.$Attendencedate2.'</td>  
    <td>'.$row["Empattendencestatus"].'</td>  
 
</tr>  
    ';  
  } 
}



$content .= '  
<h3 align="center">Attendence Open Status Details</h3><br />  
<p>Dear Sir,</p>
<p>Kindly find the following attendence details not yet closed</p>
<table border="1" cellspacing="0" cellpadding="5">  
     <tr>  <th>S.No</th>
          <th >Date</th>  
          <th >Status</th>  
         
     </tr>  
';  
$content .=$output;




$GetSuperusermail = "SELECT * FROM indsys1000useradmin where  Authorizedtype = 'ADMIN'  ";
$result_Supermail = $conn->query($GetSuperusermail );
if(mysqli_num_rows($result_Supermail) > 0) { 

  
while($row = $result_Supermail->fetch_assoc()) {  
  $Usermailid =$row['Emailid'];
  
  $MailTo .= "$Usermailid,";
  } 
}
$GetHR = "SELECT * FROM indsys1000useradmin where  Authorizedtype = 'HR Manager'  ";
$result_HR = $conn->query($GetHR );
if(mysqli_num_rows($result_HR) > 0) { 

  
while($row = $result_HR->fetch_assoc()) {  
  $Usermailid =$row['Emailid'];
  
  $MailTo .= "$Usermailid,";
  } 
}



if ($MailTo == "")
{
}
else
{

    $MailTo = substr($MailTo, 0, -1);
}
// $MailTo.= $InterviewMailID;

 if ($MailTo == "")
  {
}
else
{

    $MailTo = substr($MailTo, 0, -1);
}
try
{
  $mail->Host = "smtp.gmail.com"; // SMTP server
  $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
  $mail->isSMTP();
  $mail->SMTPAuth = true; // enable SMTP authentication
  $mail->SMTPSecure = "tls"; // sets the prefix to the servier
  $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
  $mail->Port = 587; // set the SMTP port for the GMAIL server
  $mail->Username = "indsystesting@gmail.com"; // GMAIL username
  $mail->Password = "mdpswobfoltlloza"; // GMAIL password
  
  // $to = str_replace(";",",",$to);
  $Toaddress= $MailTo;

  $SubjectMail="Attendence Open Status Details reminder";

$email_array = explode(',', $Toaddress);
for ($i = 0;$i < count($email_array);$i++)
{
$mail->AddAddress($email_array[$i]);
}
$mail->SetFrom('indsystesting@gmail.com', 'SAINMARKS');
$mail->AddReplyTo('indsystesting@gmail.com', 'SAINMARKS');
$mail->Subject = $SubjectMail ;
// $mail->Body = $tstbody;
$mail->MsgHTML($content);
// optional - MsgHTML will create an alternate automatically


// attachment
$mail->Send();
}
catch(Exception $E)
{

}

?>