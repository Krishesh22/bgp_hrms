<?php

include '../config.php';
session_start();
  $user_id = $_SESSION["Userid"];
  
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
    $AuthorizedType=  $_SESSION["Authorizedtype"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$AttendanceDate ='2022-12-02';

$logemp = "SELECT * FROM indsys1003departmentmaster WHERE Clientid='$Clientid'     ORDER BY Department ASC";
	
//echo $logemp;
$logempall = mysqli_query($conn, $logemp);
while($row = mysqli_fetch_array($logempall)) {
    $NoofDeptPresent =0;
    $NoofDeptAbsents =0;
    $NoofDeptleave =0;
    $NoofDeptEmployee =0;


$Department =$row['Department'];


  $Presents = "Select count(AttenStatus) as testPresent from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and AttenStatus='P' AND Department='$Department'  ORDER BY Employeeid ASC";
  
  $NoofPresents01 =mysqli_query($conn,$Presents);
  $testPresents = mysqli_fetch_assoc($NoofPresents01);
  $NoofDeptPresent =$testPresents['testPresent'];
  

  $Absents = "Select count(AttenStatus) as testAbsent from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and AttenStatus='A' AND Department='$Department' ORDER BY Employeeid ASC";
  $NoofAbsent01 =mysqli_query($conn,$Absents);
  $testAbsent = mysqli_fetch_assoc($NoofAbsent01);
  $NoofDeptAbsents =$testAbsent['testAbsent'];


  $Leave = "Select count(AttenStatus) as testLeave from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and AttenStatus='L' AND Department='$Department' ORDER BY Employeeid ASC";
  $Noofleave01 =mysqli_query($conn,$Leave);
  $testleave = mysqli_fetch_assoc($Noofleave01);
  $NoofDeptleave =$testleave['testLeave'];
 
  $Empcount ="Select count(Employeeid) as NoofEmp from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate' AND Department='$Department'   ORDER BY Employeeid ASC";
  $NoofEmployee01 = mysqli_query($conn,$Empcount);
  $testNoofEmp = mysqli_fetch_assoc($NoofEmployee01);
  $NoofDeptEmployee = $testNoofEmp['NoofEmp'];

  $resultExists = "SELECT * FROM indsys1029empdailyattendancedeptmaster  WHERE   Attendencedate='$AttendanceDate' AND Clientid='$Clientid' AND Department='$Department' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $resultExists = "Update indsys1029empdailyattendancedeptmaster set 

    NoofPresent ='$NoofDeptPresent',
    NoofAbsents='$NoofDeptAbsents',
    Noofleave ='$NoofDeptleave',
    NoofEmployee ='$NoofDeptEmployee',
  Addormodifydatetime ='$date',
  Userid ='$user_id'
     WHERE   Attendencedate='$AttendanceDate' AND Clientid='$Clientid' AND Department='$Department' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Exists";
 
 
  }

  else
  {

    $sqlsave = "INSERT IGNORE INTO indsys1029empdailyattendancedeptmaster (Clientid,Attendencedate,NoofPresent,NoofAbsents,Noofleave,Addormodifydatetime,NoofEmployee,Userid,Attendencemonth,Attendenceyear,Noofpermission,Department)
    values('$Clientid','$AttendanceDate','$NoofDeptPresent','$NoofDeptAbsents','$NoofDeptleave','$date','$NoofDeptEmployee','$user_id','$Attendancemonth','$Attendanceyear',0,'$Department')";

    $resultsave = mysqli_query($conn,$sqlsave);
     

    
 }
 

}

?>