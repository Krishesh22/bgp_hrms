<?php 
include 'config.php';
require_once ('class.phpmailer.php');
include ("class.smtp.php");
date_default_timezone_set('Asia/Kolkata');
$date = date("d-m-Y H:i:s" );





if(isset($_POST['MobileNum'])&&isset($_POST['Clientid']))
{
	
$get_MobileNum = mysqli_real_escape_string($conn, $_POST['MobileNum']);
$get_Clientid = mysqli_real_escape_string($conn, $_POST['Clientid']);


if($get_MobileNum =="hr@britanniapackaging.com")
{ echo json_encode(2);
	return;
}
$website_live = 1; 	// {{ 0: Test Website ; 1: Live Website}} Also Update Login.php While Update Status

if($website_live==0){$otp = 123456; $SMSAPI="";}
else{
	$otp = substr(str_shuffle('0123456789') , 0 , 6); 
}

$otp = substr(str_shuffle('0123456789') , 0 , 6); //For Live Update

$CheckNumber = "SELECT * FROM indsys1000useradmin WHERE Contactno ='$get_MobileNum'  AND Clientid = '$get_Clientid'";
$result_CheckNumber = $conn->query($CheckNumber);
if (mysqli_num_rows($result_CheckNumber) > 0)
{
	echo "1";

 $OtpQry = "UPDATE `indsys1000useradmin` SET `MobileOtp` = '$otp' WHERE `Contactno` = '$get_MobileNum' AND Clientid = '$get_Clientid'";
 $result_OtpQry = $conn->query($OtpQry); 


// $fields = array(
// "sender_id" => "TXTIND",
// "message" => "Use OTP $otp for BGP India Login!.",
// "route" => "v3",
// "numbers" => "$get_MobileNum",
// );
 $fields = array(
"sender_id" => "TXTIND",
"variables_values" => "$otp",
"route" => "otp",
"numbers" => "$get_MobileNum",
);

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_SSL_VERIFYHOST => 0,
CURLOPT_SSL_VERIFYPEER => 0,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => json_encode($fields),
CURLOPT_HTTPHEADER => array(
"authorization: $SMSAPI",
"accept: */*",
"cache-control: no-cache",
"content-type: application/json"
),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
return;


}


	if (preg_match('/\bbritanniapackaging.com\b/', $get_MobileNum)) 
	
	{
		$CheckEmail = "SELECT * FROM indsys1000useradmin WHERE Emailid ='$get_MobileNum' AND Clientid = '$get_Clientid' LIMIT 1  ";
$result_CheckEmail = $conn->query($CheckEmail);
if (mysqli_num_rows($result_CheckEmail) > 0)
{
	

 $OtpQry = "UPDATE `indsys1000useradmin` SET `MobileOtp` = '$otp' WHERE `Emailid` = '$get_MobileNum' AND Clientid = '$get_Clientid'";
 $result_OtpQry = $conn->query($OtpQry); 

 $htmlMsg = "<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title></title>
</head>
<body>
    Dear sir/madam,
    <p style='margin:13%'> Kindly use this Otp <b>'$otp'</b> For login.</p>

</body>
</html>";


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

$mail->AddAddress($get_MobileNum);




// $mail->AddAddress('ranjith@indsys.holdings');
$mail->SetFrom('indsystesting@gmail.com', 'SAINMARKS');
$mail->Subject = 'BGP OTP '.$date ;
$mail->MsgHTML($htmlMsg);

if($mail->Send()){
	header('Content-Type: application/json');
    echo json_encode(1);
	
}else{
	header('Content-Type: application/json');
    echo json_encode(0);
}
return;

}
		
	
}




}
else{
	echo "0";
}



?>