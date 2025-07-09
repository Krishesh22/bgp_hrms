<?php



include '../config.php';
$AttendanceDate ='2023-04-11';

$logempnew = "SELECT * FROM indsys1017employeemaster WHERE   Empactive='Active' and Type_Of_Posistion='Category 3' AND DATE(Date_Of_Joing) <='$AttendanceDate'   ORDER BY Employeeid ASC";
	
   
$logempallnew = mysqli_query($conn, $logempnew);
while($row = mysqli_fetch_array($logempallnew)) {
 
  
   $Employeeid =$row['Employeeid'];

$logemp = "SELECT * FROM indsys1030empdailyattendancedetail WHERE  Attendencedate='$AttendanceDate'   and Clientid='1' and Employeeid='$Employeeid'   ORDER BY Employeeid ASC";
	
   
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
   $Clientid=1;
   ActualAuditLopCalculation($conn,$Clientid,$Employeeid,$Attendencedate);



}
}


function ActualAuditLopCalculation($conn,$Clientid,$Employeeid,$Attendencedate)
{
try
{
   
    $GetOT = "SELECT * FROM indsys1030empdailyattendancedetail where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Attendencedate='$Attendencedate'";
    $result_OT = $conn->query($GetOT);

    if (mysqli_num_rows($result_OT) > 0) {
        while ($rownew = mysqli_fetch_array($result_OT)) {
      
        $Intime = $rownew['Intime'];
         $Outtime=$rownew['Outtime'];

          
            $Attentypestatus = $rownew['Attentypestatus'];
            echo "AttenTypese-$Attentypestatus<br/> ";
        }
    }
    if($Attentypestatus=='P')
    {
        echo "Intm";
        if ($Intime != "00:00:00") {
            $Missmatchedintime = 1;
          
        }
        if ($Outtime != "00:00:00") {
            $Missmatchedouttime = 1;
         
        }
        if ($Missmatchedintime == 1 && $Missmatchedouttime == 1) {


            $time_in_24_hour_format  = date("H:i:s", strtotime($Intime));
           
            $Inhr = floor($time_in_24_hour_format);
           $Inminute = substr($time_in_24_hour_format, -2);
            $IntimeChk = "$Inhr.$Inminute";
           
            $secondShiftTime = "20";
           
            if($IntimeChk<=$secondShiftTime )
            {
            
                $IntimewithDate = "$Attendencedate $Intime";
                $OuttimeWithDate = "$Attendencedate $Outtime";
                $workingMinLOP = getIntervalMinutes($IntimewithDate, $OuttimeWithDate) - 60;
                $lopMin = 480 - $workingMinLOP;
    
                $Lophrs = getHoursAndMins($lopMin);
    
                $Lophrs = substr(str_replace(":", ".", $Lophrs), 0, 5);
              
            }
            else
            {
                $AddOUTTime = date('Y-m-d', strtotime($Attendencedate. ' + 1 days'));

                 
                $IntimewithDate = "$Attendencedate $Intime";
                $OuttimeWithDate = "$AddOUTTime $Outtime";
               
                $workingMinLOP = getIntervalMinutes($IntimewithDate, $OuttimeWithDate) - 60;
              
                $lopMin = 480 - $workingMinLOP;
    
                $Lophrs = getHoursAndMins($lopMin);
           
    
                $Lophrs = substr(str_replace(":", ".", $Lophrs), 0, 5);
            }       
          

        }

        if (empty($Lophrs)) {
            $Lophrs = "0.00";
        }

        if ($Outtime == "00:00:00") {
            $Lophrs = "0.00";
        }

        $Lateintime1="08:30:00";
        $Lateintime2="09:30:00";

echo "$Lophrs";
        $LTIntime1    =   strtotime($Lateintime1);
        $LTIntime2   =   strtotime($Lateintime2);
        $Lopgracetime = "0.10";
        $EmpintimeLT = strtotime($Intime);

    if ($EmpintimeLT >= $LTIntime1 && $EmpintimeLT <= $LTIntime2)

     {
        echo "Cursor In Grace Time $Lophrs <br/>";

 
        if($Lophrs >=$Lopgracetime)
        {
            $Loptest = $Lophrs-$Lopgracetime;
            $Lophrs=   number_format((float) $Loptest, 2, ".", "");
            //echo "If $Loptest<br>";
        }
        else
        {
            $Lophrs = "0.00";
            
        }

     }
        $Lophrs=  number_format((float) $Lophrs, 2);

    }
    else
    {
       $Lophrs="0.00";
    }



    $resultExists = "Update indsys1030empdailyattendancedetail set   
Lophrs ='$Lophrs' 
WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid='$Clientid'  ";
;

echo "$resultExists<br/>";
$resultExists01 = $conn->query($resultExists);


    if ($resultExists01 === true) {
        $Message = "Success";
    } else {
        $Message = "Fail";
    }

}
catch(Exception $e)
{

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