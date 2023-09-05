<?php
error_reporting(0);



$domain = "http://localhost:90/INDSYSBGP";
// $domain = "https://hrms.sainmarks.com";
 global $conn;
 $dbname = 'bgplive';
 $conn = new mysqli('localhost', 'root', '', 'bgplive') OR die("Faild to connect");



$_SESSION["HRMEmailAddress"] = "indsystesting@gmail.com";
$_SESSION["HRM16DigitPassword"] = "mdpswobfoltlloza";
$_SESSION["HRMSenderName"] = "Sainmarks";

$HRMEmailAddress = $_SESSION["HRMEmailAddress"];
$HRM16DigitPassword = $_SESSION["HRM16DigitPassword"];
$HRMSenderName = $_SESSION["HRMSenderName"];

//SMSAPI (https://www.fast2sms.com/dashboard/sms/bulk)
$SMSAPI = "hzXOE6K1FpnPDxjqVfLT30eroMb9yNZ7dRU8BAHYiQJCalStGk6OiSuYs8JXeIFlZc0UdkaN3AMH7wDV";

// function connect_db() {
// $conn = new mysqli('localhost', 'indsys', 'Indsys@2022', 'hrmsbgp') OR die("Faild to connect");
// //$conn = mysqli_connect("localhost","root","") OR die("Faild to connect");
// //$db = mysqli_select_db( $conn ,'sainmarkshrm') ;
// }



// function close_db() {
// $conn = mysqli_connect("localhost","root","") OR die("Faild to connect");
// $db = mysqli_select_db( $conn ,'hrms') ;
// $res = mysqli_close($conn);
// }
// global $conn_acc;
// function connect_db_acc() {
// $conn = mysqli_connect("localhost","root","");
// $db = mysqli_select_db($conn ,"sainmarks_acc" );
// }

// function close_db_acc() {
// $conn = mysqli_connect("localhost","root","");
// $db = mysqli_select_db($conn ,"sainmarks_acc" );
// $res = mysqli_close($conn);
// }





//p(getDays(),'e');
?>
