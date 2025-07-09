<?php
session_start();
include '../config.php';
include 'empAttendance.php';
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail = $_SESSION["Mailid"];
$Clientid = $_SESSION["Clientid"];
$AuthorizedType = $_SESSION["Authorizedtype"];
if($Clientid==4)
{
  include 'Categoryattandanceforbgp.php';
}
else
{
  include 'Categoryattandanceforsain.php';
}
?>

