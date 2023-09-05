<?php

function TestingOutFunction(
    $conn,
    $Clientid,
    $Employeeid,
    $Attendencedate,
    $AttenStatus,
    $Intime,
    $Outtime,
    $Permissionyesorno,
    $Manualattendence,
    $Regsisterattendence,
    $OTIntime,
    $OTOuttime,
    $ActualIntime,
    $ActualOuttime,
    $user_id,
    $ActualOTIntime,$ActualOTOuttime
) {
    try {
    
        $Lmtdm = date("Y-m-d H:i:s");
        $Workingdays = 0;
        $calculatedworkinghrs = 0;
        $Missmatchedintime = 0;
        $Missmatchedouttime = 0;
        $Missmatchedotintime = 0;
        $Missmatchedotouttime = 0;
        $missmatchedrecordfound = "No";
        $WorkingHours = 0;
        $OT_HRS = 0;
        $Lophrs = 0;
        $Editedattenstatus="";

        $fetchstatus = "Select * from indsys1030dailyattenstatus where AttenStatus='$AttenStatus' ";
        $fetchstatusresult = mysqli_query($conn, $fetchstatus);
        while ($row = mysqli_fetch_array($fetchstatusresult)) {
            $Attentypestatus = $row["Attentypestatus"];
        }

        //OT Alterations/////////////////////////////
        $GetOT = "SELECT * FROM indsys1030empdailyattendancedetail where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Attendencedate='$Attendencedate'";
        $result_OT = $conn->query($GetOT);

        if (mysqli_num_rows($result_OT) > 0) {
            while ($rownew = mysqli_fetch_array($result_OT)) {
                $OTIntimeold = $rownew["OTIntime"];
                $OTOuttimeold = $rownew["OTOuttime"];
            $Intime = $rownew['Intime'];
             $Outtime=$rownew['Outtime'];

                $Editedattenstatus = $rownew["Editedattenstatus"];
            }
        }
      
        // if($ActualIntime=="00:00:00")
        // {
        //     $ActualIntime = $Intime;
        // }

        // if($ActualOuttime=="00:00:00")
        // {
        //     $ActualOuttime = $Outtime;
        // }


        // if($ActualOTIntime=="00:00:00")
        // {
        //     $ActualOTIntime = $OTIntimeold;
        // }

        // if($ActualOTOuttime=="00:00:00")
        // {
        //     $ActualOTOuttime = $OTOuttimeold;
        // }
        $breakMIn = 0;



        $logemp = "SELECT * FROM indsys1017employeemaster WHERE  EmpActive='Active' And Employeeid='$Employeeid' AND Clientid='$Clientid'  ";

        $logempall = mysqli_query($conn, $logemp);
        while ($row = mysqli_fetch_array($logempall)) {
            $Allow_OT = $row["Allow_OT"];
            $Category = $row["Type_Of_Posistion"];
        }

     


        if ($Attentypestatus == "P") {
            $Intimecheck = "00:00:00";
            $OuttimeCheck = "00:00:00";
            $OTIntimecheck = "00:00:00";
            $OTOuttimecheck = "00:00:00";

            /////////Calculate Working hours and Working days
            if ($ActualIntime != "00:00:00") {
                $Missmatchedintime = 1;
              
            }
            if ($ActualOuttime != "00:00:00") {
                $Missmatchedouttime = 1;
             
            }
            if ($Missmatchedintime == 1 && $Missmatchedouttime == 1) {

                $Intimecheck = strtotime($ActualIntime);
                $OuttimeCheck = strtotime($ActualOuttime);
                $missmatchedrecordfound = "No";

                $WorkingHours = $OuttimeCheck - $Intimecheck;
                $WorkingHours = gmdate("H:i:s", $WorkingHours);

                $Checkworkinghrs = substr(str_replace(":", ".", $WorkingHours),0,5);   
               
                $time_in_24_hour_format  = date("H:i:s", strtotime($Intime));
           
                $Inhr = floor($time_in_24_hour_format);
               $Inminute = substr($time_in_24_hour_format, -2);
                $IntimeChk = "$Inhr.$Inminute";
               
                $secondShiftTime = "20";
               
                if($IntimeChk<=$secondShiftTime )
                {
                   
                    $IntimewithDate = "$Attendencedate $ActualIntime";
                    $OuttimeWithDate = "$Attendencedate $ActualOuttime";
                    $workingMinLOP = getIntervalMinutes($IntimewithDate, $OuttimeWithDate) - 60;
                    $lopMin = 480 - $workingMinLOP;
        
                    $Lophrs = getHoursAndMins($lopMin);
        
                    $Lophrs = substr(str_replace(":", ".", $Lophrs), 0, 5);
                  
                }
                else
                {
                    $AddOUTTime = date('Y-m-d', strtotime($Attendencedate. ' + 1 days'));

                     
                    $IntimewithDate = "$Attendencedate $ActualIntime";
                    $OuttimeWithDate = "$AddOUTTime $ActualOuttime";
                   
                    $workingMinLOP = getIntervalMinutes($IntimewithDate, $OuttimeWithDate) - 60;
                  
                    $lopMin = 480 - $workingMinLOP;
        
                    $Lophrs = getHoursAndMins($lopMin);
               
        
                    $Lophrs = substr(str_replace(":", ".", $Lophrs), 0, 5);
                }       
              
            }
            if ($Missmatchedintime == 0 && $Missmatchedouttime == 1) {
                $missmatchedrecordfound = "Yes";
            }
            if ($Missmatchedintime == 1 && $Missmatchedouttime == 0) {
                $missmatchedrecordfound = "Yes";
            }

          

       
      
            //$workingMin = getIntervalMinutes($Outtime,$Intime);
            $Workinghrs = $Checkworkinghrs - 1;
         
            $OT_HRS = "0.00";
     
            if (empty($Lophrs)) {
                $Lophrs = "0.00";
            }

            if ($ActualOuttime == "00:00:00") {
                $Lophrs = "0.00";
            }


            
            if ($Allow_OT == "Yes") {
                
                if ($ActualOTIntime != "00:00:00") {
                    $Missmatchedotintime = 1;
                }
                if ($ActualOTOuttime != "00:00:00") {
                    $Missmatchedotouttime = 1;
                }
                if ($Missmatchedotintime == 1 && $Missmatchedotouttime == 1) {
                    $OTIntimecheck = strtotime($ActualOTIntime);
                    $OTOuttimecheck = strtotime($ActualOTOuttime);
                    $missmatchedrecordfound = "No";
                    $IntimewithOT = "$Attendencedate $ActualOTIntime";
                    $OuttimeWithOT = "$Attendencedate $ActualOTOuttime";
                    $WorkingOTHours = getIntervalMinutes($IntimewithOT, $OuttimeWithOT);
                    
        
                    $OT_HRS = getHoursAndMins($WorkingOTHours);
               
        
                    $OT_HRS = substr(str_replace(":", ".", $OT_HRS), 0, 5);



                       
                }
                if ($Missmatchedotintime == 0 && $Missmatchedotouttime == 1) {
                    $missmatchedrecordfound = "Yes";
                    $OT_HRS ="0.00";
                }
                if ($Missmatchedotintime == 1 && $Missmatchedotouttime == 0) {
                    $missmatchedrecordfound = "Yes";
                    $OT_HRS ="0.00";
                }

             
                 $OT_HRS01 = "0.00";
              
                // $OT_HRS = $OT_HRS + $OT_HRS01;


                if (empty($OT_HRS)) {
                    $OT_HRS = "0.00";
                }
    
                if ($ActualOTOuttime == "00:00:00") {
                    $OT_HRS = "0.00";
                }
    
            }
           
        }

        if ($Attentypestatus == "L") {
            $Workinghrs = "0.00";
            $Workingdays = "0.00";
            $OT_HRS = "0.00";
            $missmatchedrecordfound = "No";
            $Lophrs = "0.00";
        }
        if ($Attentypestatus == "A") {
            $Workinghrs = "0.00";
            $Workingdays = "0.00";
            $OT_HRS = "0.00";
            $missmatchedrecordfound = "No";
            $Lophrs = "0.00";
        }

        if ($Permissionyesorno == "Y") {
        }

        $ActualOt_HRS = $OT_HRS;

      



        if ($Workinghrs < 0) {
            $Workinghrs = "0.00";
        }

        if ($Workingdays < 0) {
            $Workingdays = 0;
        }

        if ($calculatedworkinghrs < 0) {
            $calculatedworkinghrs = "0.00";
        }

    
        $Workinghrs=  number_format((float) $Workinghrs, 2);
        $Lophrs=  number_format((float) $Lophrs, 2);
        $ActualOt_HRS=  number_format((float) $ActualOt_HRS, 2);
        


            $resultExists = "Update indsys1030empdailyattendancedetail set 

            ActualIntime ='$ActualIntime',
  ActualOTIntime ='$ActualOTIntime ',
  ActualOTOuttime='$ActualOTOuttime',
  ActualOuttime ='$ActualOuttime',
  ActualOt_HRSNew='$ActualOt_HRS',
  Actualaudithrs='$Workinghrs',
  Auctualaditlop ='$Lophrs' 
 
     WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid='$Clientid'  ";
     echo "$resultExists<br>";
     $resultExists01 = $conn->query($resultExists);

      
            if ($resultExists01 === true) {
                $Message = "Success";
            } else {
                $Message = "Fail";
            }
            return $Message;
        

        //$Message ="Exists";
        //return $Outtime;
    } catch (Exception $E) {
        echo $E;
    }
}

function getHoursAndMins($time, $format = "%02d:%02d")
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = $time % 60;
    return sprintf($format, $hours, $minutes);
}

function getIntervalMinutes($Intime, $OutTime)
{
    $dateTimeObject1 = date_create($Intime);
    $dateTimeObject2 = date_create($OutTime);
    $interval = date_diff($dateTimeObject1, $dateTimeObject2);

    $minutes = $interval->days * 24 * 60;
    $minutes += $interval->h * 60;
    return $minutes += $interval->i;
}
?>
