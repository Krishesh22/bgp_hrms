<?php 
include 'config.php';
include 'session.php';

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


if($MethodGet=="DISPATT")
{
    try
    {
        $CountPresentDays = 0;  
        $CountLeaveDays = 0;
        $CountAbsentDays = 0;
        $CountOfemp=0;
      
        $AttendanceDate = $form_data['AttendanceDate'];
        $_SESSION['ATTDATE']=$AttendanceDate;




$sqlPre = "SELECT Count(Attentypestatus) from vwemployeedailyattendance WHERE  Type_Of_Posistion='Category 3'And 
Attendencedate ='$AttendanceDate' AND Attentypestatus='P' And Clientid='$Clientid'";
//echo "$sqlPre";
$resultpre = $conn->query($sqlPre);
 while($rowpre = mysqli_fetch_array($resultpre)){

$CountPresentDays= $rowpre['Count(Attentypestatus)'];


}


$sqlabs = "SELECT Count(Attentypestatus) from vwemployeedailyattendance WHERE  Type_Of_Posistion='Category 3'And 
Attendencedate ='$AttendanceDate' AND Attentypestatus='A' And Clientid='$Clientid'";
//echo "$sqlabs";
$resultabs = $conn->query($sqlabs);
 while($row = mysqli_fetch_array($resultabs)){

$CountAbsentDays= $row['Count(Attentypestatus)'];
// echo "$CountAbsentDays";exit;

}


$sqlLeave = "SELECT Count(Attentypestatus) from vwemployeedailyattendance WHERE  Type_Of_Posistion='Category 3'And 
Attendencedate ='$AttendanceDate' AND Attentypestatus='L' And Clientid='$Clientid'";
//echo "$sqlLeave";
$resultLeave = $conn->query($sqlLeave);
 while($rows = mysqli_fetch_array($resultLeave)){

$CountLeaveDays= $rows['Count(Attentypestatus)'];


}

$sqlemp = "SELECT Count(Type_Of_Posistion) from vwemployeedailyattendance WHERE  Type_Of_Posistion='Category 3'And 
Attendencedate ='$AttendanceDate'  And Clientid='$Clientid'";
//echo "$sqlemp";
$resultemp = $conn->query($sqlemp);
 while($rowemp = mysqli_fetch_array($resultemp)){

$CountOfemp= $rowemp['Count(Type_Of_Posistion)'];


}

$Display=array(
    'CountPresentDays' =>$CountPresentDays,
    'CountAbsentDays' =>$CountAbsentDays,
    'CountLeaveDays' =>$CountLeaveDays,
    'CountOfemp' =>$CountOfemp
);


  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
}

if($MethodGet == 'FetchDate')
{

    try
    { 

      $date=date("Y-m-d");

      $_SESSION['ATTDATE']=$date;
    $Display=array(
      'date'=>  $date 
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
   
 }


?>