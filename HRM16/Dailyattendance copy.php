<?php 
include '../config.php';
 include '../mssql.php';
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
 if($MethodGet == 'Save')
{


try
{
    

    // $AttendanceDate ='2022-07-01';
    //  $Atendancestatus ="Open";
    $AttendanceDate =$form_data['AttendanceDate'];
     $Atendancestatus =$form_data['Atendancestatus'];
   
    $Attendancemonth = date('n', strtotime($AttendanceDate));
    $Attendanceyear = date('Y', strtotime($AttendanceDate));
  



  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "SELECT * FROM indsys1029empdailyattendancemaster WHERE Attendencedate ='$AttendanceDate' AND Clientid ='$Clientid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $Message ="Exists";
 
  }

  else
  {
    $sqlsave = "INSERT IGNORE INTO indsys1029empdailyattendancemaster (Clientid,Attendencedate,NoofPresent,NoofAbsents,Noofleave,Addormodifydatetime,NoofEmployee,Userid,Empattendencestatus,Attendencemonth,Attendenceyear,Noofpermission)
    values('$Clientid','$AttendanceDate',0,0,0,'$date',0,'$user_id','Open','$Attendancemonth','$Attendanceyear',0)";

    $resultsave = mysqli_query($conn,$sqlsave);
     

    
 }

 $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active'    ORDER BY Employeeid ASC";
	
   //echo $logemp;
 $logempall = mysqli_query($conn, $logemp);
 while($row = mysqli_fetch_array($logempall)) {
   $Employeeid =$row['Employeeid'];


$Title =$row['Title'];
$Firstname =$row['Firstname'];
$Lastname = $row['Lastname'];
$Gender =$row['Gender'];   
$Fullname =$row['Fullname'];   
$Allow_OT =$row['Allow_OT'];   
//$Category='Test';  

$Department =$row['Department'];

$Designation =$row['Designation'];
$EmpAutogenerationno =$row['EmpAutogenerationno'];

$Intime = "00:00:00";
$Outtime ="00:00:00";
$Indate ="";
$Outdate ="";
$Workinghrs = "00.00";

$AttenStatus ="A";
$Workingdays ="0";
$msconn = connect_msdb();
$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";

$msresp = "SELECT * FROM $table_name where  FORMAT(LogDate,'yyyy-MM-dd') ='$AttendanceDate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId  ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
echo $msresp ;
$stmt = sqlsrv_query( $msconn, $msresp );
$msdlogcount = sqlsrv_num_rows($stmt);

while($msrow = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)) {

  // echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Indate = $CreatedDate;
$DownloadDate = $msrow['DownloadDate'];
$DeviceId =$msrow['DeviceId'];
$Intime = date("H:i:s",strtotime($CreatedDate));

if($Intime !="00:00:00")
{
  $AttenStatus ="P";
  $Workingdays ="1";
  $Workinghrs = "08.00";
}


}
$resultDetail = "SELECT * FROM indsys1030empdailyattendancedetail WHERE Attendencedate = '$AttendanceDate' and Employeeid = '$Employeeid' AND Clientid ='$Clientid' LIMIT 1";
  $resultAttendance = $conn->query($resultDetail);

 
 if(mysqli_fetch_row($resultAttendance))
  {
    
    // $resultExists = "Update indsys1030empdailyattendancedetail set 
    // OT_HRS ='$OT_HRS2',
    // ActualOt_HRS = '$ActualOt_HRS',
    // Workinghours ='$Workinghrs',
    // AttenStatus='$AttenStatus',
    // Intime ='$Intime',
    // Outtime='$Outtime',
    // Workingdays ='$Workingdays',
    // Outtimewithdate ='$Outtimewithdate',
    // Addormodifydatetime ='$date',
    // Actualworkinghours ='$Workinghrs',
    // Userid ='$user_id'
    //    WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid='$Clientid'  ";
    // $resultExists01 = $conn->query($resultExists);
    // $Message ="Exists";
 
  }

  else
  {
    $resultattendancesave = "INSERT IGNORE INTO indsys1030empdailyattendancedetail (Clientid,Employeeid,Attendencedate,Title,Firstname,lastname,Userid,Addormodifydatetime,Workingdays,OT_HRS,Intime,Outtime,Workinghours,AttenStatus,Permissionfromtime,Permissionyesorno,Intimewithdate,Outtimewithdate,Department,Designation,Permissionouttime,Permissionhours,Actualworkinghours,ActualOt_HRS)
    values('$Clientid','$Employeeid','$AttendanceDate','$Title','$Firstname','$Lastname','$user_id','$date','$Workingdays','00:00:00','$Intime','$Outtime','08:00','$AttenStatus','00:00:00','N','$Indate','$Outdate','$Department','$Designation','00:00:00','00:00:00',0,0)";

    $resultsave = mysqli_query($conn,$resultattendancesave);
     

    
 }



 }








 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}

////////////////////////////////////////
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
 ///////////////////////////////////
 if($MethodGet == 'DISPATT')
{
    $AttendanceDate =$form_data['AttendanceDate'];
    $data01 =[];
   $GetState = "SELECT * FROM indsys1030empdailyattendancedetail where Attendencedate='$AttendanceDate' AND Clientid='$Clientid'   ORDER BY Employeeid";
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
 if($MethodGet == 'CalculationUpdate')
{


try
{

    $Employeeid =$form_data['Employeeid'];
    $Attendencedate =$form_data['Attendencedate'];
    $AttenStatus =$form_data['AttenStatus'];
    $Intime =$form_data['Intime'];
    $Outtime =$form_data['Outtime'];
    $Permissionyesorno =$form_data['Permissionyesorno'];    
   $Workingdays=0;
   $calculatedworkinghrs =0;
     $Intimecheck =strtotime($Intime);
     $OuttimeCheck = strtotime($Outtime);
    
   $WorkingHours = $OuttimeCheck-$Intimecheck;
   $WorkingHours = gmdate("H:i:s", $WorkingHours);
   $logemp = "SELECT * FROM indsys1017employeemaster WHERE  EmpActive='Active' And Employeeid='$Employeeid' AND Clientid='$Clientid'  ";
	
   
   $logempall = mysqli_query($conn, $logemp);
   while($row = mysqli_fetch_array($logempall)) {
    $Allow_OT =$row['Allow_OT'];
   }

   $Checkworkinghrs = substr(str_replace(':', '.', $WorkingHours), 0, 5);

   $Workinghrs = $Checkworkinghrs-1;
   $OT_HRS = 0;
   if($Allow_OT=="Yes")
{
  if($Workinghrs>8)
  {
  	

    //$OT_HRS = round($Workinghrs-8,2);

     $OT_HRS = $Workinghrs-8;
  }
}

$OT_HRS = number_format($OT_HRS,2);
  
   if($AttenStatus =="P")
   {
    $calculatedworkinghrs = ($Workinghrs/2)*0.25;
if($calculatedworkinghrs >0.93)
{
   $Workingdays = 1;
}
else
{
  $Workingdays = $calculatedworkinghrs;
}


  

  }
  if($AttenStatus =="L")
  {
    $Workinghrs =0;
  $Workingdays = 0;
  }
  if($AttenStatus =="A")
  {
    $Workinghrs =0;
  $Workingdays = 0;
  }


if($Permissionyesorno =="Y")
{

}




$ActualOt_HRS =$OT_HRS;



$ot_hours = floor($OT_HRS);
$ot_hours_minutes = substr($OT_HRS, -2);

$gettime = "";



$GetNextno = "SELECT * FROM indsys1032timecheck where Timeno ='$ot_hours_minutes'  ";

$result_Nextno = $conn->query($GetNextno);
if (mysqli_num_rows($result_Nextno) > 0)
{
    while ($row = mysqli_fetch_array($result_Nextno))
    {
      $gettime = $row['Timevalue'];
      $ot_hours_minutes =$gettime;  
      $ot_hours_final = $ot_hours;

        
    }
}


$GetNextnonew = "SELECT * FROM indsys1032timemaster where Timemasterno ='$ot_hours_minutes'  ";

$result_Nextnonew = $conn->query($GetNextnonew);
if (mysqli_num_rows($result_Nextnonew) > 0)
{
    while ($row = mysqli_fetch_array($result_Nextnonew))
    {
      $gettimenew = $row['Timevalue'];
      $ot_hours_minutes ="$gettimenew";

      $ot_hours_final =1+$ot_hours;
      //$ot_hours_final = $ot_hours;
        
    }
}









$OT_HRS2 = "$ot_hours_final.$ot_hours_minutes";




   
$resultExists = "Update indsys1030empdailyattendancedetail set 
OT_HRS ='$OT_HRS2',
ActualOt_HRS ='$ActualOt_HRS',
 Workinghours ='$Workinghrs',
 AttenStatus='$AttenStatus',
 Intime ='$Intime',
Outtime='$Outtime',
Workingdays ='$Workingdays',
Actualworkinghours='$calculatedworkinghrs'





   WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid='$Clientid'  ";
$resultExists01 = $conn->query($resultExists);
$Message ="Exists";



  

   
 

 $Display=array('WorkingHours' =>$WorkingHours);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
///////////////////////////////////////////////

function UpdateCalculation($conn,$Employeeid,$Attendencedate,$AttenStatus,$Intime,$Outtime,$Permissionyesorno,$date,$user_id,$Clientid)
{


try
{

    // $Employeeid =$form_data['Employeeid'];
    // $Attendencedate =$form_data['Attendencedate'];
    // $AttenStatus =$form_data['AttenStatus'];
    // $Intime =$form_data['Intime'];
    // $Outtime =$form_data['Outtime'];
    // $Permissionyesorno =$form_data['Permissionyesorno'];
   
    $Intimecheck =strtotime($Intime);
    $OuttimeCheck = strtotime($Outtime);
    
   $WorkingHours = $OuttimeCheck-$Intimecheck;
   $WorkingHours = gmdate("H:i:s", $WorkingHours);


   $Checkworkinghrs = substr(str_replace(':', '.', $WorkingHours), 0, 5);
   $OT_HRS = 0;
   if($Checkworkinghrs>9)
   {
    $OT_HRS = $Checkworkinghrs-9;
   }
   if($AttenStatus =="P")
   {
   $Workingdays = 1;
   if($Checkworkinghrs <5)
   {
    $Workingdays = 0.5;

   }

   else
   {
    $Workingdays = 0;
   }

  }


if($Permissionyesorno =="Y")
{

}


$ot_hours = substr($OT_HRS, 0, 1);
$ot_hours_minutes = substr($OT_HRS, -2);

if($ot_hours_minutes>=20 && $ot_hours_minutes<=30){
        $ot_hours_minutes = "30";
        $ot_hours_final="00";
    
}
elseif($ot_hours_minutes>=31 && $ot_hours_minutes<=49){
        $ot_hours_minutes = $ot_hours_minutes;
        $ot_hours_final=$ot_hours;
       
}

elseif($ot_hours_minutes>=50 && $ot_hours_minutes<=59){
       $ot_hours_minutes = "00";
       $ot_hours_final = $ot_hours+1;
      
}
else{
        $ot_hours_final=$ot_hours;
        $ot_hours_minutes = $ot_hours_minutes;

}


 $OT_HRS = "$ot_hours_final.$ot_hours_minutes";


$OT_HRS =number_format($OT_HRS,2);


   
$resultExists = "Update indsys1030empdailyattendancedetail set 
OT_HRS ='$OT_HRS',
Workinghours ='$WorkingHours',
AttenStatus='$AttenStatus',
Intime ='$Intime',
Outtime='$Outtime',
Workingdays ='$Workingdays',

Addormodifydatetime ='$date',
Userid ='$user_id'
   WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid ='$Clientid' ";
$resultExists01 = $conn->query($resultExists);
$Message ="Exists";



    // $GetState = "SELECT * FROM indsys1030empdailyattendancedetail   ORDER BY Employeeid";
    // $result_Region = $conn->query($GetState);
  
    // if(mysqli_num_rows($result_Region) > 0) { 
    // while($row = mysqli_fetch_array($result_Region)) {  
    //   $data01[] = $row;
    //   } 
    // }        
 

    // $mytbl["Test"]=$data01;

   
 

 $Display=array('WorkingHours' =>$WorkingHours);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
//////////////////////////
if($MethodGet == 'OutTimeFetch')
{


try
{
    

   
     $Attendencedate =$form_data['AttendanceDate'];
     $Atendancestatus =$form_data['Atendancestatus'];
   
    $Attendancemonth = date('n', strtotime($Attendencedate));
    $Attendanceyear = date('Y', strtotime($Attendencedate));
  



  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }


 $logemp = "SELECT * FROM indsys1030empdailyattendancedetail WHERE Clientid='$Clientid' and Attendencedate='$Attendencedate'   ORDER BY Employeeid ASC";
	
   
 $logempall = mysqli_query($conn, $logemp);
 while($row = mysqli_fetch_array($logempall)) {
   $Employeeid =$row['Employeeid'];



 
    $AttenStatus =$row['AttenStatus'];
    $Intime =$row['Intime'];
    $Outtime =$row['Outtime'];
    $Permissionyesorno =$row['Permissionyesorno'];
    $Outtimewithdate = $row['Outtimewithdate'];
    $Allow_OT =$row['Allow_OT'];
    $EmpAutogenerationno = $row['EmpAutogenerationno'];
   

    $Workingdays=0;
    $calculatedworkinghrs =0;

if($Permissionyesorno =="Y")
{

}
$msconn = connect_msdb();
$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";

$msresp = "SELECT * FROM $table_name where  FORMAT(LogDate,'yyyy-MM-dd') ='$Attendencedate' and UserId='$Employeeid' and C1='out'  ORDER BY DeviceLogId ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
echo $msresp ;
$stmt = sqlsrv_query( $msconn, $msresp );
$msdlogcount = sqlsrv_num_rows($stmt);

while($msrow = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)) {
    //print_r($msrow);exit;
  // echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Outtimewithdate = $CreatedDate;
$DownloadDate = $msrow['DownloadDate'];
$DeviceId =$msrow['DeviceId'];
$Outtime = date("H:i:s",strtotime($CreatedDate));


}



$Intimecheck =strtotime($Intime);
$OuttimeCheck = strtotime($Outtime);

$WorkingHours = $OuttimeCheck-$Intimecheck;
$WorkingHours = gmdate("H:i:s", $WorkingHours);


$Checkworkinghrs = substr(str_replace(':', '.', $WorkingHours), 0, 5);
$WorkingHours = $Checkworkinghrs-1;
$OT_HRS = 0;
if($Allow_OT=="Yes")
{
if($WorkingHours>8)
{
$OT_HRS = $WorkingHours-8;
}
}

$OT_HRS = number_format($OT_HRS,2);
if($AttenStatus =="P")
{
$calculatedworkinghrs = ($WorkingHours/2)*0.25;
if($calculatedworkinghrs >0.93)
{
$Workingdays = 1;
}
else
{
$Workingdays = $calculatedworkinghrs;
}




}
if($AttenStatus =="L")
{
$Workingdays = 0;
$WorkingHours =0;
}
if($AttenStatus =="A")
{
$Workingdays = 0;
$WorkingHours=0;
$calculatedworkinghrs =0;
}


if($Permissionyesorno =="Y")
{

}


$ActualOt_HRS =$OT_HRS;



$ot_hours = floor($OT_HRS);
$ot_hours_minutes = substr($OT_HRS, -2);

$gettime = "";



$GetNextno = "SELECT * FROM indsys1032timecheck where Timeno ='$ot_hours_minutes'  ";

$result_Nextno = $conn->query($GetNextno);
if (mysqli_num_rows($result_Nextno) > 0)
{
    while ($row = mysqli_fetch_array($result_Nextno))
    {
      $gettime = $row['Timevalue'];
      $ot_hours_minutes ="$gettime";  
      $ot_hours_final = $ot_hours;

        
    }
}


$GetNextnonew = "SELECT * FROM indsys1032timemaster where Timemasterno ='$ot_hours_minutes'  ";

$result_Nextnonew = $conn->query($GetNextnonew);
if (mysqli_num_rows($result_Nextnonew) > 0)
{
    while ($row = mysqli_fetch_array($result_Nextnonew))
    {
      $gettimenew = $row['Timevalue'];
      $ot_hours_minutes ="$gettimenew";

      $ot_hours_final =1+$ot_hours;
      //$ot_hours_final = $ot_hours;
        
    }
}









$OT_HRS2 = "$ot_hours_final.$ot_hours_minutes";
   
$resultExists = "Update indsys1030empdailyattendancedetail set 
OT_HRS ='$OT_HRS2',
ActualOt_HRS = '$ActualOt_HRS',
Workinghours ='$WorkingHours',
AttenStatus='$AttenStatus',
Intime ='$Intime',
Outtime='$Outtime',
Workingdays ='$Workingdays',
Outtimewithdate ='$Outtimewithdate',
Addormodifydatetime ='$date',
Actualworkinghours ='$calculatedworkinghrs',
Userid ='$user_id'
   WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid='$Clientid'  ";
$resultExists01 = $conn->query($resultExists);
$Message ="Exists";


 }








 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}

///////////////////////////////////////////////////////////

if($MethodGet=="MasterUpdate")
{
  try
  {
   
  $AttendanceDate =$form_data['AttendanceDate'];
  $Atendancestatus =$form_data['Atendancestatus'];
  $Presents = "Select count(AttenStatus) as testPresent from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and AttenStatus='P'  ORDER BY Employeeid ASC";
  
  $NoofPresents01 =mysqli_query($conn,$Presents);
  $testPresents = mysqli_fetch_assoc($NoofPresents01);
  $NoofPresent =$testPresents['testPresent'];
  

  $Absents = "Select count(AttenStatus) as testAbsent from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and AttenStatus='A'  ORDER BY Employeeid ASC";
  $NoofAbsent01 =mysqli_query($conn,$Absents);
  $testAbsent = mysqli_fetch_assoc($NoofAbsent01);
  $NoofAbsents =$testAbsent['testAbsent'];


  $Leave = "Select count(AttenStatus) as testLeave from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and AttenStatus='L'  ORDER BY Employeeid ASC";
  $Noofleave01 =mysqli_query($conn,$Leave);
  $testleave = mysqli_fetch_assoc($Noofleave01);
  $Noofleave =$testleave['testLeave'];
 
  $Empcount ="Select count(Employeeid) as NoofEmp from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'    ORDER BY Employeeid ASC";
  $NoofEmployee01 = mysqli_query($conn,$Empcount);
  $testNoofEmp = mysqli_fetch_assoc($NoofEmployee01);
  $NoofEmployee = $testNoofEmp['NoofEmp'];

 
 
  $resultExists = "Update indsys1029empdailyattendancemaster set 
  Empattendencestatus ='$Atendancestatus',
  NoofPresent ='$NoofPresent',
  NoofAbsents='$NoofAbsents',
  Noofleave ='$Noofleave',
  NoofEmployee ='$NoofEmployee',
Addormodifydatetime ='$date',
Userid ='$user_id'
   WHERE   Attendencedate='$AttendanceDate' AND Clientid='$Clientid'  ";
$resultExists01 = $conn->query($resultExists);
$Message ="Exists";
$Display=array('Message' =>$Message);

$str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
}
///////////////////////////////
if($MethodGet == 'FetchMaster')
{

    try
    { 
  

      $AttendanceDate =$form_data['AttendanceDate'];
      $Empattendencestatus ="Open";
   
    $GetChapter = "SELECT * FROM indsys1029empdailyattendancemaster where Clientid ='$Clientid' and Attendencedate = '$AttendanceDate'  ORDER BY Attendencedate";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $NoofPresent =$row['NoofPresent'];
      $NoofAbsents =$row['NoofAbsents'];
      $Noofleave = $row['Noofleave'];
      $NoofEmployee =$row['NoofEmployee'];
      $Empattendencestatus = $row['Empattendencestatus'];
      
      } 
    }

    $Display=array(
      'NoofPresent'=>  $NoofPresent,
      'NoofAbsents'=> $NoofAbsents,
      'Noofleave'=>  $Noofleave,
      'NoofEmployee'=> $NoofEmployee,  
       'Empattendencestatus' =>$Empattendencestatus
   
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }



?>