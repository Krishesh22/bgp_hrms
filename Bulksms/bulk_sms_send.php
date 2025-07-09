<?php

$error ="";
error_reporting(0);
include '../config.php';
$Clientid = $_SESSION["Clientid"];
if (isset($_POST['recipient_number']) && isset($_POST['sms_content'])) {

$SMSAPI="";   //Remove this variable while moving this to live

$get_recipient_number = mysqli_real_escape_string($conn, $_POST['recipient_number']);
$get_sms_content = mysqli_real_escape_string($conn, $_POST['sms_content']);


$fields = array(
    "message" => "$get_sms_content",
    "language" => "english",
    "route" => "q",
    "numbers" => "$get_recipient_number",
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

if ($err) {
  echo "cURL Error #:" . $err;
} else {
 // echo "1"; // 1 - Status is success
  echo $response;
}


}
else{
  echo "Somthing Went Wrong! SMS Not Sent";
}


?>