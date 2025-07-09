<?php
error_reporting(0);
include '../config.php';

$AttendanceDate='2023-03-02';
$Clientid=1;
$Presents = "Select count(Attentypestatus) as testPresent from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and Attentypestatus='P'  ORDER BY Employeeid ASC";

$NoofPresents01 =mysqli_query($conn,$Presents);
$testPresents = mysqli_fetch_assoc($NoofPresents01);
$NoofPresent =$testPresents['testPresent'];


$Absents = "Select count(Attentypestatus) as testAbsent from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and Attentypestatus='A'  ORDER BY Employeeid ASC";
$NoofAbsent01 =mysqli_query($conn,$Absents);
$testAbsent = mysqli_fetch_assoc($NoofAbsent01);
$NoofAbsents =$testAbsent['testAbsent'];


$Leave = "Select count(Attentypestatus) as testLeave from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and Attentypestatus='L'  ORDER BY Employeeid ASC";
$Noofleave01 =mysqli_query($conn,$Leave);
$testleave = mysqli_fetch_assoc($Noofleave01);
$Noofleave =$testleave['testLeave'];

$Empcount ="Select count(Employeeid) as NoofEmp from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'    ORDER BY Employeeid ASC";
$NoofEmployee01 = mysqli_query($conn,$Empcount);
$testNoofEmp = mysqli_fetch_assoc($NoofEmployee01);
$NoofEmployee = $testNoofEmp['NoofEmp'];


if(empty($AttenStatus))
{
$Atendancestatus="Open";
}
$resultExiststst = "Update indsys1029empdailyattendancemaster set 

NoofPresent ='$NoofPresent',
NoofAbsents='$NoofAbsents',
Noofleave ='$Noofleave',
NoofEmployee ='$NoofEmployee'

 WHERE   Attendencedate='$AttendanceDate' AND Clientid='$Clientid'  ";
$resultExists01 = $conn->query($resultExiststst);
echo " $resultExiststst <br/>";
?>