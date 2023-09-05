<?php


error_reporting(0);
include '../config.php';
// $Intime="09:37:33";
// $Outtime="17:05:17";

// $workingMin = getIntervalMinutes($Intime,$Outtime)-60;
// $lopMin = 480-$workingMin;

// $Lophrs = getHoursAndMins($lopMin);

// echo $Lophrs;
// $lophrsnew =  substr(str_replace(':', '.', $Lophrs), 0, 5);
// echo "<br/>";
// echo $lophrsnew;
$logempnew = "SELECT * FROM indsys1017employeemaster WHERE   Empactive='Active' and Type_Of_Posistion='Category 3'  ORDER BY Employeeid ASC";
	
   
$logempallnew = mysqli_query($conn, $logempnew);
while($row = mysqli_fetch_array($logempallnew)) {
 
  
   $Employeeid =$row['Employeeid'];

$logemp = "SELECT * FROM indsys1030empdailyattendancedetail WHERE  Attendencedate='2023-03-21'   and Clientid='1' and Employeeid='$Employeeid'   ORDER BY Employeeid ASC";
	
   
$logempall = mysqli_query($conn, $logemp);
while($row = mysqli_fetch_array($logempall)) {
 
   $AttenStatus =$row['AttenStatus'];
   $Intime =$row['Intime'];
   $Outtime =$row['Outtime'];
   $Employeeid =$row['Employeeid'];
   $Firstname = $row['Firstname'];
   $Attendencedate =$row['Attendencedate'];
   $Mismatchedattendence=$row['Mismatchedattendence'];
   $AttenStatus=$row['AttenStatus'];
   echo "$Mismatchedattendence<br/>";
   $Lophrs=0;
   $AttendanceDate=$Attendencedate;
   $fetchstatus ="Select * from indsys1030dailyattenstatus where AttenStatus='$AttenStatus' ";
   $fetchstatusresult=mysqli_query($conn,$fetchstatus);
   while($row=mysqli_fetch_array($fetchstatusresult))
   {
     $Attentypestatus=$row['Attentypestatus'];
   }

   if($Attentypestatus =='P')
   {
       if($Mismatchedattendence=="No")
       {

        $time_in_24_hour_format  = date("H:i:s", strtotime($Intime));
        $Inhr = floor($time_in_24_hour_format);
        $Inminute = substr($time_in_24_hour_format, -2);
        $IntimeChk = "$Inhr.$Inminute";
        $secondShiftTime = "20";
        if($IntimeChk<=$secondShiftTime )
        {
        $IntimewithDate = "$Attendencedate $Intime";
        $OuttimeWithDate = "$Attendencedate $Outtime";
          $workingMin = getIntervalMinutes($IntimewithDate,$OuttimeWithDate);
          $workingMinLOP = getIntervalMinutes($IntimewithDate,$OuttimeWithDate)-60;
        }
        else
        {
          $AddOUTTime = date('Y-m-d', strtotime($Attendencedate. ' + 1 days'));
          $IntimewithDate = "$Attendencedate $Intime";
          $OuttimeWithDate = "$AddOUTTime $Outtime";
          $workingMin = getIntervalMinutes($IntimewithDate,$OuttimeWithDate);
          $workingMinLOP = getIntervalMinutes($IntimewithDate,$OuttimeWithDate)-60;
        }


    // $workingMinLOP = getIntervalMinutes($Intime,$Outtime)-60;
    $lopMin = 480-$workingMinLOP;
    
    $Lophrs = getHoursAndMins($lopMin);
    
    echo $Lophrs;
    $Lophrs =  substr(str_replace(':', '.', $Lophrs), 0, 5);
    
    if(empty($Lophrs))
    {
    $Lophrs=0;
    }

    if($OutTime=="00:00:00")
    {
        $Lophrs=0;
    }
     }
   }
else
{
    $Lophrs=0;
}
$resultExists = "Update indsys1030empdailyattendancedetail set 

Lophrs='$Lophrs'




   WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' and Clientid='1'  ";
$resultExists01 = $conn->query($resultExists);
if($resultExists01===true)
{
    echo "$resultExists <br/>";
  


}
}
}


function getHoursAndMins($time, $format = '%02d:%02d')
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

function getIntervalMinutes($Intime , $OutTime){
	$dateTimeObject1 = date_create($Intime); 
$dateTimeObject2 = date_create($OutTime); 
$interval = date_diff($dateTimeObject1, $dateTimeObject2); 

$minutes = $interval->days * 24 * 60;
$minutes += $interval->h * 60;
return $minutes += $interval->i;
}
?>