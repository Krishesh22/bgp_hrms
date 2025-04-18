<?php
error_reporting(0);
$domain = "http://indsysbgp.localhost:90";
 //$domain = "https://hrms.sainmarks.com";
global $conn;
$dbname = 'hrms_bgp_live';
$conn = new mysqli('localhost', 'root', '', 'hrms_bgp_live') OR die("Faild to connect");
$_SESSION["HRMEmailAddress"] = "indsystesting@gmail.com";
$_SESSION["HRM16DigitPassword"] = "mdpswobfoltlloza";
$_SESSION["HRMSenderName"] = "Sainmarks";
$HRMEmailAddress = $_SESSION["HRMEmailAddress"];
$HRM16DigitPassword = $_SESSION["HRM16DigitPassword"];
$HRMSenderName = $_SESSION["HRMSenderName"];
//SMSAPI (https://www.fast2sms.com/dashboard/sms/bulk)
$SMSAPI = "hzXOE6K1FpnPDxjqVfLT30eroMb9yNZ7dRU8BAHYiQJCalStGk6OiSuYs8JXeIFlZc0UdkaN3AMH7wDV";

?>
