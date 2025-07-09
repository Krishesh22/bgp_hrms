<<<<<<< HEAD
<?php
include '../config.php';
session_start();
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';



require_once ('class.phpmailer.php');
include ("class.smtp.php");

  $mail = new PHPMailer(false); 
  $mail->IsSMTP();
  $tstbody = "";

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
$Toaddress="brindha@indsys.holdings";

$htmlContent="test email";
$SubjectMail="test email Subject";

 $email_array = explode(',', $Toaddress);
for ($i = 0;$i < count($email_array);$i++)
{
$mail->AddAddress($email_array[$i]);
}
$mail->SetFrom('indsystesting@gmail.com', 'INDSYS');
$mail->AddReplyTo('indsystesting@gmail.com', 'INDSYS');
$mail->Subject = $SubjectMail ;
// $mail->Body = $tstbody;
$mail->MsgHTML($htmlContent);
// optional - MsgHTML will create an alternate automatically



// attachment
$mail->Send();
$str = json_encode("E-Mail Sent Succesfully");
echo trim($str, '"');

}

catch(phpmailerException $e)
{

}


?>

=======
<?php
include '../config.php';
session_start();
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';



require_once ('class.phpmailer.php');
include ("class.smtp.php");

  $mail = new PHPMailer(false); 
  $mail->IsSMTP();
  $tstbody = "";

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
$Toaddress="brindha@indsys.holdings";

$htmlContent="test email";
$SubjectMail="test email Subject";

 $email_array = explode(',', $Toaddress);
for ($i = 0;$i < count($email_array);$i++)
{
$mail->AddAddress($email_array[$i]);
}
$mail->SetFrom('indsystesting@gmail.com', 'INDSYS');
$mail->AddReplyTo('indsystesting@gmail.com', 'INDSYS');
$mail->Subject = $SubjectMail ;
// $mail->Body = $tstbody;
$mail->MsgHTML($htmlContent);
// optional - MsgHTML will create an alternate automatically



// attachment
$mail->Send();
$str = json_encode("E-Mail Sent Succesfully");
echo trim($str, '"');

}

catch(phpmailerException $e)
{

}


?>

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
