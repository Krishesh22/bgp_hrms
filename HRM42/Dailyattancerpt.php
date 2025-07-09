<?php


error_reporting(0);
include '../config.php';


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
if($MethodGet == 'FetchDate')
{

    try
    { 
  

      $date=date("Y-m-d");

    
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
 if($MethodGet == 'DISPATT')
{
    $AttendanceDate =$form_data['AttendanceDate'];
    $data01 =[];
   $GetState = "SELECT * FROM vwdailyattancerptadmin where Attendencedate='$AttendanceDate' AND Clientid='$Clientid'   ORDER BY Employeeid";
   
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
    header('Content-Type: application/json');
    echo json_encode($data01);
 }

 if($MethodGet == 'FetchMaster')
{

    try
    { 
  

      $AttendanceDate =$form_data['AttendanceDate'];
      $Empattendencestatus ="Open";
      $NoofPresent =0;
      $NoofAbsents =0;
      $Noofleave = 0;
      $NoofEmployee =0;
   
      $Adminapproval = "";
   
    $GetChapter = "SELECT * FROM indsys1029empdailyattendancemaster where Clientid ='$Clientid' and Attendencedate = '$AttendanceDate'  ORDER BY Attendencedate";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $NoofPresent =$row['NoofPresent'];
      $NoofAbsents =$row['NoofAbsents'];
      $Noofleave = $row['Noofleave'];
      $NoofEmployee =$row['NoofEmployee'];
      $Empattendencestatus = $row['Empattendencestatus'];
      $Adminapproval = $row['Adminapproval'];
      
      
      } 
    }

    $Display=array(
      'NoofPresent'=>  $NoofPresent,
      'NoofAbsents'=> $NoofAbsents,
      'Noofleave'=>  $Noofleave,
      'NoofEmployee'=> $NoofEmployee,  
       'Empattendencestatus' =>$Empattendencestatus,
       'Adminapproval' =>$Adminapproval
   
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }

?>