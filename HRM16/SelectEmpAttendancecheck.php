<?php

include '../config.php';
$GetChapter = "SELECT * FROM indsys1030empdailyattendancedetail where Clientid ='1' and Attendencedate = '2023-03-20' And Employeeid='CAT03WOV000011'  ORDER BY Employeeid";
     $result_Chapter = $conn->query($GetChapter );
     if(mysqli_num_rows($result_Chapter) > 0) { 
 
       
     while($row = mysqli_fetch_array($result_Chapter)) {  
      $AttenStatus =$row['AttenStatus'];
      $Intime =$row['Intime'];
      $Outtime =$row['Outtime'];
      $Permissionyesorno =$row['Permissionyesorno'];
  $OTIntime =$row['OTIntime'];
  $OTOuttime =$row['OTOuttime'];
  $Manualattendence = $row['Manualattendence'];
  $Regsisterattendence = $row['Regsisterattendence'];
  $ActualIntime =$row['ActualIntime']; ;
  $ActualOuttime =$row['ActualOuttime'];;
  $Employeeid = $row['Employeeid'];
  $Attendancedate=$row['Attendencedate'];
  

  
     
       
       } 
     }



     Calculateouttimefetch($conn,$Clientid,$Employeeid,$Attendancedate,$AttenStatus,$Intime,$Outtime,$Permissionyesorno,$Manualattendence,$Regsisterattendence,$OTIntime,$OTOuttime,$ActualIntime,$ActualOuttime);


     function Calculateouttimefetch($conn,$Clientid,$Employeeid,$Attendencedate,$AttenStatus,$Intime,$Outtime,$Permissionyesorno,$Manualattendence,$Regsisterattendence,$OTIntime,$OTOuttime,$ActualIntime,$ActualOuttime)
{
  try
  {

   
       $Workingdays=0;
    $calculatedworkinghrs =0;
    $Missmatchedintime = 0;
    $Missmatchedouttime = 0;
    $Missmatchedotintime = 0;
    $Missmatchedotouttime = 0;
    $missmatchedrecordfound ="No";
    $WorkingHours = 0;
    $OT_HRS =0;
    $Lophrs =0;

    $fetchstatus ="Select * from indsys1030dailyattenstatus where AttenStatus='$AttenStatus' ";
    $fetchstatusresult=mysqli_query($conn,$fetchstatus);
    while($row=mysqli_fetch_array($fetchstatusresult))
    {
      $Attentypestatus=$row['Attentypestatus'];
    }

 //OT Alterations/////////////////////////////
 $GetOT = "SELECT * FROM indsys1030empdailyattendancedetail where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Attendencedate='$Attendencedate'";
 $result_OT = $conn->query($GetOT);
 
 if(mysqli_num_rows($result_OT) > 0) { 


 while($row = mysqli_fetch_array($result_OT)) {  
  
   $OTIntimeold =$row['OTIntime'];
   $OTOuttimeold =$row['OTOuttime'];
   $ActualOTIntime =$row['ActualOTIntime'];
   $ActualOTOuttime =$row['ActualOTOuttime'];
   $Breakhours =$row['Breakhours'];
   $Editedattenstatus = $row['Editedattenstatus'];
 }
}
if(empty($Breakhours))
{
  $Breakhours=0;
}
   
    $logemp = "SELECT * FROM indsys1017employeemaster WHERE  EmpActive='Active' And Employeeid='$Employeeid' AND Clientid='$Clientid'  ";
   
    
    $logempall = mysqli_query($conn, $logemp);
    while($row = mysqli_fetch_array($logempall)) {
     $Allow_OT =$row['Allow_OT'];
     $Category =$row['Type_Of_Posistion'];
    }


    if($Attentypestatus =="P")
    {
      $Intimecheck ="00:00:00";
      $OuttimeCheck ="00:00:00";
      $OTIntimecheck ="00:00:00";
      $OTOuttimecheck ="00:00:00";
     
      /////////Calculate Working hours and Working days
      if($Intime !='00:00:00')
      {
        $Missmatchedintime = 1;
        if($Category =='Category 3')
        {
          
          $time_in_24_hour_format  = date("H:i:s", strtotime($Intime));
          $Inhr = floor($time_in_24_hour_format);
         $Inminute = substr($time_in_24_hour_format, -2);
          $IntimeChk = "$Inhr.$Inminute";
          $greaterintime = "8.25";
          if($IntimeChk<=$greaterintime )
          {
           $Intime ="08:40:00";
          }

         

        }

        
      }
      if($Outtime !='00:00:00')
      {
        $Missmatchedouttime =1;
        if($Category =='Category 3')
        {
          
        

          $time_in_24_hour_formatout  = date("H:i:s", strtotime($Outtime));
          $Outtimehr = floor($time_in_24_hour_formatout);
         $Outtimeminute = substr($time_in_24_hour_formatout, -2);
          $OuttimeChk = "$Outtimehr.$Outtimeminute";
       

          $greaterouttime1 ="17.40";
$greaterouttime2 = "17.50";

if($OuttimeChk>=$greaterouttime1 && $OuttimeChk<=$greaterouttime2  )
{
   $Outtime ="17:40:00";
}

        }
      }
      if($Missmatchedintime ==1 && $Missmatchedouttime == 1)
      {
        if($Category =='Category 3')
        {
          
          $time_in_24_hour_format  = date("H:i:s", strtotime($Intime));
          $Inhr = floor($time_in_24_hour_format);
         $Inminute = substr($time_in_24_hour_format, -2);
          $IntimeChk = "$Inhr.$Inminute";
          $greaterintime = "8.25";
          if($IntimeChk<=$greaterintime )
          {
           $Intime ="08:40:00";
          }

          $time_in_24_hour_formatout  = date("H:i:s", strtotime($Outtime));
          $Outtimehr = floor($time_in_24_hour_formatout);
         $Outtimeminute = substr($time_in_24_hour_formatout, -2);
          $OuttimeChk = "$Outtimehr.$Outtimeminute";
       

          $greaterouttime1 ="17.40";
           $greaterouttime2 = "17.50";

            if($OuttimeChk>=$greaterouttime1 && $OuttimeChk<=$greaterouttime2  )
             {
              $Outtime ="17:30:00";
             }

        }


      $Intimecheck =strtotime($Intime);
      $OuttimeCheck = strtotime($Outtime);
      $missmatchedrecordfound ="No";
      
      $WorkingHours = $OuttimeCheck-$Intimecheck;
      $WorkingHours = gmdate("H:i:s", $WorkingHours);

  
 
    $Checkworkinghrs = substr(str_replace(':', '.', $WorkingHours), 0, 5);
      if($Editedattenstatus !='Yes')
      {
               if($Checkworkinghrs <6)
              {
                $AttenStatus ='HD';
                 $Attentypestatus='P';
      
      
              }
      }
      }
      if($Missmatchedintime ==0 && $Missmatchedouttime == 1)
      {
        $missmatchedrecordfound ="Yes";
      }
      if($Missmatchedintime ==1 && $Missmatchedouttime == 0)
      {
        $missmatchedrecordfound ="Yes";
      }


      $WorkingHours = $OuttimeCheck-$Intimecheck;
      $WorkingHours = gmdate("H:i:s", $WorkingHours);


      $breakMIn=0;

$logempbreakhrs = "SELECT * FROM indsys1030empdailybreaktimedetail WHERE   Employeeid='$Employeeid' and Attendencedate='$Attendencedate' ORDER BY Employeeid ASC";
	
   //echo "$logempbreakhrs <br/>";
$logempbreakhrsexe = mysqli_query($conn, $logempbreakhrs);
while($row = mysqli_fetch_array($logempbreakhrsexe)) {
 
  
   $BreakIntime =$row['BreakIntime'];
   $BreakOuttime =$row['BreakOuttime'];

   $breakMIn += getIntervalMinutes($BreakOuttime,$BreakIntime);
}
$workingMin=0;
$workingMinLOP =0;
$time_in_24_hour_format  = date("H:i:s", strtotime($Intime));
$Inhr = floor($time_in_24_hour_format);
$Inminute = substr($time_in_24_hour_format, -2);
$IntimeChk = "$Inhr.$Inminute";
$secondShiftTime = "20";
echo "$Attendencedate <br/>";
if($IntimeChk<=$secondShiftTime )
{
    echo "Morning Shift";
$IntimewithDate = "$Attendencedate $Intime";
$OuttimeWithDate = "$Attendencedate $Outtime";
  $workingMin = getIntervalMinutes($IntimewithDate,$OuttimeWithDate);
  $workingMinLOP = getIntervalMinutes($IntimewithDate,$OuttimeWithDate)-60;
  $actualWorkMIn = $workingMin-$breakMIn;

$actualWorkHrs = getHoursAndMins($actualWorkMIn);
  echo $actualWorkHrs;
 
$Checkworkinghrs = substr(str_replace(':', '.', $actualWorkHrs), 0, 5);
}
else
{
   // echo "Evening Shift";
  $AddOUTTime = date('Y-m-d', strtotime($Attendencedate. ' + 1 days'));
  $IntimewithDate = "$Attendencedate $Intime";
  $OuttimeWithDate = "$AddOUTTime $Outtime";


  
  $workingMin = getIntervalMinutes($IntimewithDate,$OuttimeWithDate);



  $workingMinLOP = getIntervalMinutes($IntimewithDate,$OuttimeWithDate)-60;
  $actualWorkMIn = $workingMin-$breakMIn;

$actualWorkHrs = getHoursAndMins($actualWorkMIn);
echo $actualWorkHrs;

$Checkworkinghrs = substr(str_replace(':', '.', $actualWorkHrs), 0, 5);
}

//$workingMin = getIntervalMinutes($Outtime,$Intime);

$actualWorkMIn = $workingMin-$breakMIn;

$actualWorkHrs = getHoursAndMins($actualWorkMIn);
  
 
$Checkworkinghrs = substr(str_replace(':', '.', $actualWorkHrs), 0, 5);


 if($AttenStatus=="HD")
 {
  $Workinghrs = $Checkworkinghrs;
  $OT_HRS = 0;
 }
 else
 {
    $Workinghrs = $Checkworkinghrs-1;
    //$Workinghrs=$Workinghrs-$Breakhours;
    $OT_HRS = 0;
 }

            $lopMin = 480-$workingMinLOP;
            
            $Lophrs = getHoursAndMins($lopMin);

            $Lophrs =  substr(str_replace(':', '.', $Lophrs), 0, 5);
            if(empty($Lophrs))
            {
              $Lophrs=0;
            }

           // return $Lophrs;


 /////////// Half Day check

 
    //////////// Calculate OThours and identifying missmatched record
    if($Allow_OT=="Yes")
 {
  if($OTIntime !='00:00:00')
  {
    $Missmatchedotintime = 1;
  }
  if($OTOuttime !='00:00:00')
  {
    $Missmatchedotouttime =1;
  }
  if($Missmatchedotintime ==1 && $Missmatchedotouttime == 1)
  {
  $OTIntimecheck =strtotime($OTIntime);
  $OTOuttimecheck = strtotime($OTOuttime);
  $missmatchedrecordfound ="No";

  }
  if($Missmatchedotintime ==0 && $Missmatchedotouttime == 1)
  {
    $missmatchedrecordfound ="Yes";
  }
  if($Missmatchedotintime ==1 && $Missmatchedotouttime == 0)
  {
    $missmatchedrecordfound ="Yes";
  }

  $WorkingOTHours = $OTOuttimecheck-$OTIntimecheck;
  $WorkingOTHours = gmdate("H:i:s", $WorkingOTHours);
  $OT_HRS  = substr(str_replace(':', '.', $WorkingOTHours), 0, 5);

  if($Workinghrs>8)
   {
     
 
     //$OT_HRS = round($Workinghrs-8,2);
 
      $OT_HRS01 = $Workinghrs-8;
   }
   $OT_HRS =  $OT_HRS+$OT_HRS01;
 }
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





     
     


   if($Attentypestatus =="L")
   {
     $Workinghrs =0;
   $Workingdays = 0;
   $OT_HRS =0;
   $missmatchedrecordfound ="No";
   $Lophrs=0;
   }
   if($Attentypestatus =="A")
   {
     $Workinghrs =0;
   $Workingdays = 0;
   $OT_HRS =0;
   $missmatchedrecordfound ="No";
   $Lophrs=0;
   }
 
 
 if($Permissionyesorno =="Y")
 {
 
 }
 
 
 
 
 $ActualOt_HRS =$OT_HRS;
 
 $OT_HRS= number_format((float)$OT_HRS, 2, '.', '');
 
 $ot_hours = floor($OT_HRS);
 $ot_hours_minutes = substr($OT_HRS, -2);
 
 $gettime = "";
 $ot_hours_final= $ot_hours;
 
 
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
 
 
 
 
 if($Workinghrs<0)
 {
  $Workinghrs =0;
 }
 
 if($Workingdays <0)
 {
  $Workingdays =0;
 }

 if($calculatedworkinghrs<0)
 {
  $calculatedworkinghrs =0;
 }
 


 $OT_HRS2 = "$ot_hours_final.$ot_hours_minutes";
 

// echo "dfsdefsf $OTIntimeold $OTOuttimeold $AltOTIntimeold $AltOTOuttimeold";
 //exit;
// echo "$OTOuttimeold     $OTOuttimeold";
 
 
    
if($OTIntimeold == '00:00:00' && $OTOuttimeold == '00:00:00')
{
  //echo "aaa ";
  $resultExists = "Update indsys1030empdailyattendancedetail set 
  OT_HRS ='$OT_HRS2',
  ActualOt_HRS ='$ActualOt_HRS',
  ActualOt_HRSNew ='$ActualOt_HRS',
   Workinghours ='$Workinghrs',
   AttenStatus='$AttenStatus',
   Intime ='$Intime',
  Outtime='$Outtime',
  Attentypestatus='$Attentypestatus',
  Lophrs='$Lophrs',
 
  ActualOTIntime ='$OTIntime',
  ActualOTOuttime='$OTOuttime',
  OTIntime ='$OTIntime',
  OTOuttime='$OTOuttime',
  Regsisterattendence ='$Regsisterattendence',
  Allowotyesorno='$Allow_OT',
  Mismatchedattendence ='$missmatchedrecordfound',
  Workingdays ='$Workingdays',
  Actualworkinghours='$calculatedworkinghrs',
  ActualIntime ='$ActualIntime',
  ActualOuttime='$ActualOuttime',
  Manualattendence='$Manualattendence'
  
 
     WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid='$Clientid'  ";
  $resultExists01 = $conn->query($resultExists);
  
  if($resultExists01===TRUE)
  {
    $Message ="Success";
  }
  else
  {
    $Message ="Fail";
  }
  return $Message;
 
}
elseif($OTIntimeold != '00:00:00' && $OTOuttimeold == '00:00:00'){


  //echo "bbbb";

  $resultExists = "Update indsys1030empdailyattendancedetail set 
  OT_HRS ='$OT_HRS2',
  ActualOt_HRS ='$ActualOt_HRS',
  ActualOt_HRSNew ='$ActualOt_HRS',
   Workinghours ='$Workinghrs',
   AttenStatus='$AttenStatus',
   Intime ='$Intime',
  Outtime='$Outtime',
  ActualOTIntime ='$ActualOTIntime',
  ActualOTOuttime='$OTOuttime',
  OTIntime ='$OTIntime',
  OTOuttime='$OTOuttime',
  Attentypestatus='$Attentypestatus',
  Lophrs='$Lophrs',
  Regsisterattendence ='$Regsisterattendence',
  Allowotyesorno='$Allow_OT',
  Mismatchedattendence ='$missmatchedrecordfound',
  Workingdays ='$Workingdays',
  Actualworkinghours='$calculatedworkinghrs',
  ActualIntime ='$ActualIntime',
  ActualOuttime='$ActualOuttime',
  Manualattendence='$Manualattendence'
  
 
     WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid='$Clientid'  ";
  $resultExists01 = $conn->query($resultExists);
  if($resultExists01===TRUE)
  {
    $Message ="Success";
  }
  else
  {
    $Message ="Fail";
  }
  return $Message;
}
elseif($OTIntimeold == '00:00:00' && $OTOuttimeold != '00:00:00')
{

 // echo "cccc";

  $resultExists = "Update indsys1030empdailyattendancedetail set 
  OT_HRS ='$OT_HRS2',
  ActualOt_HRS ='$ActualOt_HRS',
  ActualOt_HRSNew ='$ActualOt_HRS',
   Workinghours ='$Workinghrs',
   AttenStatus='$AttenStatus',
   Intime ='$Intime',
  Outtime='$Outtime',
  Attentypestatus='$Attentypestatus',
  Lophrs='$Lophrs',
  ActualOTIntime ='$OTIntime',
  ActualOTOuttime='$ActualOTOuttime',
  OTIntime ='$OTIntime',
  OTOuttime='$OTOuttime',
  Regsisterattendence ='$Regsisterattendence',
  Allowotyesorno='$Allow_OT',
  Mismatchedattendence ='$missmatchedrecordfound',
  Workingdays ='$Workingdays',
  Actualworkinghours='$calculatedworkinghrs',
  ActualIntime ='$ActualIntime',
  ActualOuttime='$ActualOuttime',
  Manualattendence='$Manualattendence'
  
 
     WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid='$Clientid'  ";
    
  $resultExists01 = $conn->query($resultExists);
  if($resultExists01===TRUE)
  {
    $Message ="Success";
  }
  else
  {
    $Message ="Fail";
  }
  return $Message;
}
elseif($OTIntimeold != '00:00:00' && $OTOuttimeold != '00:00:00'){


  //echo "ddd $ActualOTOuttime";

  $resultExists = "Update indsys1030empdailyattendancedetail set 
  OT_HRS ='$OT_HRS2',
  ActualOt_HRS ='$ActualOt_HRS',
   Workinghours ='$Workinghrs',
   AttenStatus='$AttenStatus',
   Intime ='$Intime',
  Outtime='$Outtime',
  Attentypestatus='$Attentypestatus',
  Lophrs='$Lophrs',
  ActualOTIntime ='$ActualOTIntime ',
  ActualOTOuttime='$ActualOTOuttime',
  OTIntime ='$OTIntime',
  OTOuttime='$OTOuttime',
  Regsisterattendence ='$Regsisterattendence',
  Allowotyesorno='$Allow_OT',
  Mismatchedattendence ='$missmatchedrecordfound',
  Workingdays ='$Workingdays',
  Actualworkinghours='$calculatedworkinghrs',
  ActualIntime ='$ActualIntime',
  ActualOuttime='$ActualOuttime',
  Manualattendence='$Manualattendence'
  
 
     WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid='$Clientid'  ";
  $resultExists01 = $conn->query($resultExists);
  if($resultExists01===TRUE)
  {
    $Message ="Success";
  }
  else
  {
    $Message ="Fail";
  }
  return $Message;
}


 //$Message ="Exists";
 //return $Outtime;
  }
  catch(Exception $E)
  {
echo $E;
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