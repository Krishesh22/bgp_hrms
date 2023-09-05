<?php 
include('../config.php');
include('../session.php');

//  include '../mssql.php';
session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Daily Attendance Detail";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];
 //$MethodGet='Save';
if($MethodGet == 'LoadDate')
{
    $date01 =date("Y-m-d H:i:s" );
   
   
    header('Content-Type: application/json');
    echo json_encode($data01);
 }
 //////////////////////////
 
////////////////////////////////////////
if($MethodGet == 'FetchDate')
{

    try
    { 
  

      $date= $_SESSION['ATTDATE'];
      $_SESSION['ATTDATE01'] =$date;

    
$Message ="No";

      
      $resultExistsnew = "SELECT Attendencedate FROM indsys1029empdailyattendancemaster WHERE Attendencedate = '$date' AND Clientid = '$Clientid' LIMIT 1";
      $resultExists01new = $conn->query($resultExistsnew);

      if (mysqli_fetch_row($resultExists01new))
      {

        $Message ="Yes";

      }
      else
      {
        $Message ="No";
      }
   
 
    
    $Display=array(
      'date'=>  $date,
      'Message' =>$Message
      
   
     
      
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
   
 }
 ///////////////////////////////////
 if($MethodGet == 'DISPATT')
{
    $AttendanceDate =$form_data['AttendanceDate'];
    $_SESSION['ATTDATE01'] = $AttendanceDate;
   $GetState = "SELECT * FROM indsys1030empdailyattendancedetail where Attendencedate='$AttendanceDate'  AND Attentypestatus='A' AND Clientid='$Clientid' ";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
    header('Content-Type: application/json');
    echo json_encode($data01);
 }
 ////////////////////////////////
 
?>
