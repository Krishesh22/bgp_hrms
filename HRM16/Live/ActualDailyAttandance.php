<?php
error_reporting(0);
include '../config.php';
include 'ActualAuditAttendancecalculation.php';
include '../mssql.php';

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
      $Clientid =1;
   
      $_SESSION["Tittle"] ="Daily Attendance Detail";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$AttendanceDate ='2023-04-12';
$logempnew = "SELECT * FROM indsys1017employeemaster WHERE   Empactive='Active' AND DATE(Date_Of_Joing) <='$AttendanceDate'  ORDER BY Employeeid ASC";
	
   
$logempallnew = mysqli_query($conn, $logempnew);
while($row = mysqli_fetch_array($logempallnew)) {
 
  
   $Employeeid =$row['Employeeid'];
   $msconn = connect_msdb();
   Audithrsfn($conn,$msconn,$Clientid,$AttendanceDate,$Employeeid,$user_id);
}




function Audithrsfn($conn,$msconn,$Clientid,$Attendencedate,$Employeeid,$user_id)
{

  try
  {
    $Attendancemonth = date('n', strtotime($Attendencedate));
    $Attendanceyear = date('Y', strtotime($Attendencedate));
 
 $logemp = "SELECT * FROM indsys1030empdailyattendancedetail WHERE Clientid='$Clientid' and Attendencedate='$Attendencedate' and Employeeid='$Employeeid'  ORDER BY Employeeid ASC";
	
   
 $logempall = mysqli_query($conn, $logemp);
 while($row = mysqli_fetch_array($logempall)) {
   
    $AttenStatus =$row['AttenStatus'];
    $Intime =$row['Intime'];
    $Outtime =$row['Outtime'];
    $Permissionyesorno =$row['Permissionyesorno'];
$OTIntime =$row['OTIntime'];
$OTOuttime =$row['OTOuttime'];
$Manualattendence = $row['Manualattendence'];
$Regsisterattendence = $row['Regsisterattendence'];
// $ActualIntime =$row['ActualIntime']; 
// $ActualOuttime =$row['ActualOuttime'];
$Editotin = $row['Editotin'];
$Editotout = $row['Editotout'];
$Editintime =$row['Editintime']; 
$Editouttime =$row['Editouttime'];


    $Workingdays=0;
    $calculatedworkinghrs =0;

 $ActualIntime ="00:00:00"; 
 $ActualOuttime ="00:00:00"; 
 $ActualOTIntime ="00:00:00";
 $ActualOTOuttime ="00:00:00";



$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";

$AddOUTTime = $Attendencedate;




  $msrespin = "SELECT TOP 1 * FROM $table_name where  FORMAT(LogDate,'yyyy-MM-dd') ='$Attendencedate' and UserId='$Employeeid' and C4='0'  ORDER BY DeviceLogId ASC" ;
//echo $msrespin;
$stmtin = sqlsrv_query( $msconn, $msrespin );


while($msrow = sqlsrv_fetch_array($stmtin,SQLSRV_FETCH_ASSOC)) {

//echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Intimewithdate = $CreatedDate;
$DownloadDate = $msrow['DownloadDate'];
$DeviceId =$msrow['DeviceId'];
$Intime = date("H:i:s",strtotime($CreatedDate));
$ActualIntime =$Intime;



}



$time_in_24_hour_format  = date("H:i:s", strtotime($Intime));
$time_in_24_hour_format = substr(str_replace(":", ".", $time_in_24_hour_format), 0, 5);
$Inhr = floor($time_in_24_hour_format);
$Inminute = substr($time_in_24_hour_format, -2);
$IntimeChk = "$Inhr.$Inminute";
echo "$IntimeChk<br>";
$secondShiftTime = "20";
if($IntimeChk>=$secondShiftTime )
{
  
  
  
  //////////////////2nd shift///////////////////////////////


  $AddOUTTime = date('Y-m-d', strtotime($Attendencedate. ' + 1 days'));


  $Attendancemonth = date('n', strtotime($AddOUTTime));
  $Attendanceyear = date('Y', strtotime($AddOUTTime));
  


   






  
  $table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";

$msresp = "SELECT TOP 1 * FROM $table_name where  FORMAT(LogDate,'yyyy-MM-dd') ='$AddOUTTime' and UserId='$Employeeid' and C4='1'  ORDER BY DeviceLogId ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
// echo $msresp ;
$stmt = sqlsrv_query( $msconn, $msresp );


while($msrow = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)) {
    //print_r($msrow);exit;
  // echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Outtimewithdate = $CreatedDate;
$DownloadDate = $msrow['DownloadDate'];
$DeviceId =$msrow['DeviceId'];
$ActualOuttime = date("H:i:s",strtotime($CreatedDate));





}




$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";

$msrespotintime = "SELECT TOP 1 * FROM $table_name where  FORMAT(LogDate,'yyyy-MM-dd') ='$AddOUTTime' and UserId='$Employeeid' and C4='4'  ORDER BY DeviceLogId ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
// echo $msrespotintime ;
$stmtOTIN = sqlsrv_query( $msconn, $msrespotintime );


while($msrow = sqlsrv_fetch_array($stmtOTIN,SQLSRV_FETCH_ASSOC)) {
    //print_r($msrow);exit;
  // echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Outtimewithdate = $CreatedDate;

$ActualOTIntime = date("H:i:s",strtotime($CreatedDate));



}



$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";

$msrespotOTOutime = "SELECT TOP 1 * FROM $table_name where  FORMAT(LogDate,'yyyy-MM-dd') ='$AddOUTTime' and UserId='$Employeeid' and C4='5'  ORDER BY DeviceLogId ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
// echo $msrespotintime ;
$stmtOTOuttime = sqlsrv_query( $msconn, $msrespotOTOutime );


while($msrow = sqlsrv_fetch_array($stmtOTOuttime,SQLSRV_FETCH_ASSOC)) {
    //print_r($msrow);exit;
  // echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Outtimewithdate = $CreatedDate;

$ActualOTOuttime = date("H:i:s",strtotime($CreatedDate));




}

  
}

else
{
  /////////////////1st Shift
  $FromTimeLimit="09:00:00";
  $FromDate ="$AddOUTTime $FromTimeLimit";

$TotimeLimit = "22:30:00";
$ToDate ="$AddOUTTime $TotimeLimit";


$msresp = "SELECT TOP 1 * FROM $table_name where   Logdate>='$FromDate' and Logdate<='$ToDate' and UserId='$Employeeid' and C4='1'  ORDER BY DeviceLogId ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
// echo $msresp ;
$stmt = sqlsrv_query( $msconn, $msresp );


while($msrow = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)) {
    //print_r($msrow);exit;
  // echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Outtimewithdate = $CreatedDate;
$DownloadDate = $msrow['DownloadDate'];
$DeviceId =$msrow['DeviceId'];
$ActualOuttime = date("H:i:s",strtotime($CreatedDate));





}






$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";
  
$FromTimeLimit ="09:00:00";
// $FromDate ="$AddOUTTime $FromTimeLimit";

// $TotimeLimit = "20:30:00";
// $ToDate ="$AddOUTTime $TotimeLimit";
$FromDate ="$AddOUTTime $FromTimeLimit";
$TotimeLimit = "22:30:00";
$ToDate ="$AddOUTTime $TotimeLimit";
$msrespotintime = "SELECT TOP 1 * FROM $table_name where  Logdate>='$FromDate' and Logdate <='$ToDate'  and UserId='$Employeeid' and C4='4'  ORDER BY DeviceLogId ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
//echo "$msrespotintime <br/>";
$stmtOTIN = sqlsrv_query( $msconn, $msrespotintime );


while($msrow = sqlsrv_fetch_array($stmtOTIN,SQLSRV_FETCH_ASSOC)) {
    //print_r($msrow);exit;
  // echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Outtimewithdate = $CreatedDate;

$ActualOTIntime = date("H:i:s",strtotime($CreatedDate));




}


  
   $FromTimeLimit ="09:00:00";
  // $FromDate ="$AddOUTTime $FromTimeLimit";
  
  // $TotimeLimit = "20:30:00";
  // $ToDate ="$AddOUTTime $TotimeLimit";

 
  $FromDate ="$AddOUTTime $FromTimeLimit";
  $TotimeLimit = "22:30:00";
  $ToDate ="$AddOUTTime $TotimeLimit";
$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";

$msrespotOTOutime = "SELECT TOP 1 * FROM $table_name where   Logdate>='$FromDate' and Logdate <='$ToDate' and UserId='$Employeeid' and C4='5'  ORDER BY DeviceLogId ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
//echo "$msrespotOTOutime <br/>";
$stmtOTOuttime = sqlsrv_query( $msconn, $msrespotOTOutime );


while($msrow = sqlsrv_fetch_array($stmtOTOuttime,SQLSRV_FETCH_ASSOC)) {
    //print_r($msrow);exit;
  // echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Outtimewithdate = $CreatedDate;

$ActualOTOuttime = date("H:i:s",strtotime($CreatedDate));




}


}


TestingOutFunction($conn,$Clientid,$Employeeid,$Attendencedate,$AttenStatus,$Intime,$Outtime,$Permissionyesorno,$Manualattendence,$Regsisterattendence,$OTIntime,$OTOuttime,$ActualIntime,$ActualOuttime,$user_id,$ActualOTIntime,$ActualOTOuttime);
}


  ///////////////////////2 nd Shift Attendance Fetching ///////////////////////
  





 

  }
  catch(Exception $e)
  {

  }

}


?>