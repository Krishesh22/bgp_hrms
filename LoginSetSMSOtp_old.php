<?php 
include 'config.php';




if(isset($_POST['MobileNum']))
{
	
$get_MobileNum = mysqli_real_escape_string($conn, $_POST['MobileNum']);
$get_Clientid = mysqli_real_escape_string($conn, $_POST['Clientid']);

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


$fields = array(
"sender_id" => "TXTIND",
"message" => "Use OTP $otp for BGP India Login!.",
"route" => "v3",
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


}
else{
	echo "0";
}






}


?>