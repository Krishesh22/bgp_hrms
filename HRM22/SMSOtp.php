<<<<<<< HEAD
<?php 
include '../config.php';

if(isset($_POST['Applicationid']))
{
	$get_Applicationid = mysqli_real_escape_string($conn, $_POST['Applicationid']);

	$otp = substr(str_shuffle('0123456789') , 0 , 6); //For Live Update

    $mobile_num = mysqli_real_escape_string($conn, $_POST['MobileNum']);

// $otp = "1234"; // Temporary

$OtpQry = "UPDATE `indsys1032jobappmaster` SET `Smsotp` = '$otp' WHERE `Applicationid` = '$get_Applicationid'";
$result_OtpQry = $conn->query($OtpQry); 

if($result_OtpQry){echo "Success";} else{echo "Failiure";}
$fields = array(
  "sender_id" => "TXTIND",
  "variables_values" => "$otp",
  "route" => "otp",
  "numbers" => "$mobile_num",
  );


// $fields = array(
//     "sender_id" => "TXTIND",
//     "message" => "$otp",
//     "route" => "v3",
//     "numbers" => "$mobile_num",
// );

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
    "authorization: hzXOE6K1FpnPDxjqVfLT30eroMb9yNZ7dRU8BAHYiQJCalStGk6OiSuYs8JXeIFlZc0UdkaN3AMH7wDV",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
//echo $response;
$err = curl_error($curl);

curl_close($curl);





}


=======
<?php 
include '../config.php';

if(isset($_POST['Applicationid']))
{
	$get_Applicationid = mysqli_real_escape_string($conn, $_POST['Applicationid']);

	$otp = substr(str_shuffle('0123456789') , 0 , 6); //For Live Update

    $mobile_num = mysqli_real_escape_string($conn, $_POST['MobileNum']);

// $otp = "1234"; // Temporary

$OtpQry = "UPDATE `indsys1032jobappmaster` SET `Smsotp` = '$otp' WHERE `Applicationid` = '$get_Applicationid'";
$result_OtpQry = $conn->query($OtpQry); 

if($result_OtpQry){echo "Success";} else{echo "Failiure";}
$fields = array(
  "sender_id" => "TXTIND",
  "variables_values" => "$otp",
  "route" => "otp",
  "numbers" => "$mobile_num",
  );


// $fields = array(
//     "sender_id" => "TXTIND",
//     "message" => "$otp",
//     "route" => "v3",
//     "numbers" => "$mobile_num",
// );

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
    "authorization: hzXOE6K1FpnPDxjqVfLT30eroMb9yNZ7dRU8BAHYiQJCalStGk6OiSuYs8JXeIFlZc0UdkaN3AMH7wDV",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
//echo $response;
$err = curl_error($curl);

curl_close($curl);





}


>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
?>