<?php
include "../config.php";
session_start();
$user_id = $_SESSION["Userid"];
$Clientid = $_SESSION["Clientid"];
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d H:i:s");
$currentyear = 2024;
$previousyear = $currentyear - 1;
$i = 0;
$Currentmonth = '09';
$GetChapter = "SELECT * FROM indsys1034payrollsettlemonth WHERE Givenmonthno = '$Currentmonth' ";
$result_Chapter = $conn->query($GetChapter);
$financialMonthsArray = '';
$Currentyearmonths = '';
$Previousyearsmonths = '';
if (mysqli_num_rows($result_Chapter) > 0) {
while ($row = mysqli_fetch_array($result_Chapter)) {
$financialMonthsArray = $row['MonthsAddedList'];
$Currentyearmonths = $row['Currentyearmonths'];
$Previousyearsmonths = $row['Previousyearsmonths'];
}
}
$previousMonthsArray = explode(",", $Previousyearsmonths);
$currentMonthsArray = explode(",", $Currentyearmonths);
$financialMonthsArray_t = str_replace(",","','","$financialMonthsArray");
$financialMonthsArray_f = "'".$financialMonthsArray_t."'";
$CurrentyearmonthsArray_t = str_replace(",","','","$Currentyearmonths");
$CurrentyearmonthsArray_f = "'".$CurrentyearmonthsArray_t."'";
$PreviousyearsmonthsArray_t = str_replace(",","','","$Previousyearsmonths");
$PreviousyearsmonthsArray_f = "'".$PreviousyearsmonthsArray_t."'";
$previousMonthsHeaders = [];
foreach ($previousMonthsArray as $month) {
$dateObj = DateTime::createFromFormat('F', $month); 
$abbreviatedMonth = $dateObj->format('M'); 
$previousMonthsHeaders[] = $abbreviatedMonth . '-' . substr($previousyear, 2); 
}
$currentMonthsHeaders = [];
foreach ($currentMonthsArray as $month)
{
$dateObj = DateTime::createFromFormat('F', $month); // 'F' is for full month name
$abbreviatedMonth = $dateObj->format('M'); // 'M' gives the abbreviated month
$currentMonthsHeaders[] = $abbreviatedMonth . '-' . substr($currentyear, 2); // Abbreviate year to last 2 digits
}
$logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active'  ORDER BY Employeeid ASC";

$logempall = mysqli_query($conn, $logemp);
while ($row = mysqli_fetch_array($logempall)) {
    $Employeeid = $row["Employeeid"];
    $Title = $row["Title"];
    $Firstname = $row["Firstname"];
    $Lastname = $row["Lastname"];
    $Gender = $row["Gender"];
    $Fullname = $row["Fullname"];
    $Allow_OT = $row["Allow_OT"];
    $Department = $row["Department"];
    $Designation = $row["Designation"];
    $EmpAutogenerationno = $row["EmpAutogenerationno"];
    $Category=$row['Type_Of_Posistion'];
  
    $Intime = "00:00:00";
    $Outtime = "00:00:00";
    $OTIntime = "00:00:00";
    $OTOuttime = "00:00:00";
    $Allowotyesorno = $Allow_OT;
    $Indate = "";
    $Outdate = "";
    $Workinghrs = "00.00";
    $ActualIntime = "00:00:00";
    $ActualOuttime = $Outtime;
    $AttenStatus = "A";
    $Old_Empid =$row['Old_Empid'];
    $Userpunchid =  $Employeeid;
    $Workeddays =0; 
    $previousMonthMapping = [
        'October' => ['workingdays' => 'Oct_workingdays', 'balanceEL' => 'Oct_balanceEL', 'manual_wd' => 'Oct_manual_wd', 'miss_matched' => 'Oct_miss_matched'],
        'November' => ['workingdays' => 'Nov_workingdays', 'balanceEL' => 'Nov_balanceEL', 'manual_wd' => 'Nov_manual_wd', 'miss_matched' => 'Nov_miss_matched'],
        'December' => ['workingdays' => 'Dec_workingdays', 'balanceEL' => 'Dec_balanceEL', 'manual_wd' => 'Dec_manual_wd', 'miss_matched' => 'Dec_miss_matched']
    ];
    
    $currentMonthMapping = [
        'January' => ['workingdays' => 'Jan_workingdays', 'balanceEL' => 'Jan_balanceEL', 'manual_wd' => 'Jan_manual_wd', 'miss_matched' => 'Jan_miss_matched'],
        'February' => ['workingdays' => 'Feb_workingdays', 'balanceEL' => 'Feb_balanceEL', 'manual_wd' => 'Feb_manual_wd', 'miss_matched' => 'Feb_miss_matched'],
        'March' => ['workingdays' => 'Mar_workingdays', 'balanceEL' => 'Mar_balanceEL', 'manual_wd' => 'Mar_manual_wd', 'miss_matched' => 'Mar_miss_matched'],
        'April' => ['workingdays' => 'Apr_workingdays', 'balanceEL' => 'Apr_balanceEL', 'manual_wd' => 'Apr_manual_wd', 'miss_matched' => 'Apr_miss_matched'],
        'May' => ['workingdays' => 'May_workingdays', 'balanceEL' => 'May_balanceEL', 'manual_wd' => 'May_manual_wd', 'miss_matched' => 'May_miss_matched'],
        'June' => ['workingdays' => 'Jun_workingdays', 'balanceEL' => 'Jun_balanceEL', 'manual_wd' => 'Jun_manual_wd', 'miss_matched' => 'Jun_miss_matched'],
        'July' => ['workingdays' => 'Jul_workingdays', 'balanceEL' => 'Jul_balanceEL', 'manual_wd' => 'Jul_manual_wd', 'miss_matched' => 'Jul_miss_matched'],
        'August' => ['workingdays' => 'Aug_workingdays', 'balanceEL' => 'Aug_balanceEL', 'manual_wd' => 'Aug_manual_wd', 'miss_matched' => 'Aug_miss_matched'],
        'September' => ['workingdays' => 'Sep_workingdays', 'balanceEL' => 'Sep_balanceEL', 'manual_wd' => 'Sep_manual_wd', 'miss_matched' => 'Sep_miss_matched']
    ];
    
    $Jan_workingdays = $Feb_workingdays = $Mar_workingdays = $Apr_workingdays = $May_workingdays = $Jun_workingdays = $Jul_workingdays = $Aug_workingdays = $Sep_workingdays = $Oct_workingdays = $Nov_workingdays = $Dec_workingdays = 0;
    $Jan_balanceEL = $Feb_balanceEL = $Mar_balanceEL = $Apr_balanceEL = $May_balanceEL = $Jun_balanceEL = $Jul_balanceEL = $Aug_balanceEL = $Sep_balanceEL = $Oct_balanceEL = $Nov_balanceEL = $Dec_balanceEL = 0;
    $Jan_manual_wd = $Feb_manual_wd = $Mar_manual_wd = $Apr_manual_wd = $May_manual_wd = $Jun_manual_wd = $Jul_manual_wd = $Aug_manual_wd = $Sep_manual_wd = $Oct_manual_wd = $Nov_manual_wd = $Dec_manual_wd = 0;
    $Jan_miss_matched = $Feb_miss_matched = $Mar_miss_matched = $Apr_miss_matched = $May_miss_matched = $Jun_miss_matched = $Jul_miss_matched = $Aug_miss_matched = $Sep_miss_matched = $Oct_miss_matched = $Nov_miss_matched = $Dec_miss_matched = 0;
        foreach ($previousMonthsArray as $previousmonths): 
            $Workeddays =0;                 
            $sql_perform_leave = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid  = '$Employeeid' AND Clientid ='$Clientid' AND SalMonth='$previousmonths' AND Salyear='$previousyear' ";
            $sqlQueryLeave = mysqli_query($conn, $sql_perform_leave);
            while ($rowpay = mysqli_fetch_array($sqlQueryLeave)) {
            $Workeddays = $rowpay['Workeddays'];
            $BalanceEL=$rowpay['BalanceEL'];
            }
            if (array_key_exists($previousmonths, $previousMonthMapping))
            {
            ${$previousMonthMapping[$previousmonths]['workingdays']} = $Workeddays; 
           
            }
            endforeach;
            foreach ($currentMonthsArray as $currentmonths): 
            $Workeddays =0;                 
            $sql_perform_leave = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid  = '$Employeeid' AND Clientid ='$Clientid' AND SalMonth='$currentmonths' AND Salyear='$currentyear' ";
            $sqlQueryLeave = mysqli_query($conn, $sql_perform_leave);
            while ($rowpay = mysqli_fetch_array($sqlQueryLeave)) {
            $Workeddays = $rowpay['Workeddays'];
         
            }
            if (array_key_exists($currentmonths, $currentMonthMapping)) {
            ${$currentMonthMapping[$currentmonths]['workingdays']} = $Workeddays; // Dynamically set working days
             // Dynamically set balance EL
            }
            endforeach;

            foreach ($previousMonthsArray as $previousmonths): 
                $nmonth = date('m', strtotime($previousmonths));
            $d = date('Y-m-d',strtotime("$previousyear-$nmonth-01"));
            $fdaymonth = date('Y-m-01',strtotime($d));
            $ldaymonth=date('Y-m-t',strtotime($d));
            $Missmatched_attendance=0;
            $Manual_workingday =0;
            $Half_day_count=0;
            $Full_day_count=0;
            $totsundays=0;
            $sundays=0; $total_days=cal_days_in_month (CAL_GREGORIAN, $nmonth, $year); 
            for ($i=1;$i<=$total_days;$i++) 
            if (date ('N',strtotime ($year.'-'.$nmonth.'-'.$i))==7) $sundays++;
            $totsundays = $sundays;
        $resultDetail = "SELECT * FROM indsys1030empdailyattendancedetail WHERE Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$Employeeid' AND Clientid ='$Clientid' ";
        $resultAttendance = $conn->query($resultDetail);
        if (mysqli_num_rows($resultAttendance) > 0) {
            while ($rowatt = mysqli_fetch_array($resultAttendance)) {
                $Attendencedate = $rowatt['Attendencedate'];
                $Manualattendence = $rowatt["Manualattendence"];
                $Regsisterattendence = $rowatt["Regsisterattendence"];
                $ActualOTIntime = $rowatt["ActualOTIntime"];
                $ActualOTOuttime = $rowatt["ActualOTOuttime"];
                $ActualIntime=$rowatt['ActualIntime'];
                $ActualOuttime=$rowatt['ActualOuttime'];
                if($ActualIntime !='00:00:00' && $ActualOuttime !='00:00:00' )
                {
                    $Intimecheck = strtotime($ActualIntime);
                    $OuttimeCheck = strtotime($ActualOuttime);
                    $WorkingHours = $OuttimeCheck - $Intimecheck;
                    $WorkingHours = gmdate("H:i:s", $WorkingHours);
                    $Checkworkinghrs = substr(str_replace(":", ".", $WorkingHours) , 0, 5);
                    if($Checkworkinghrs<4)
                    {
                        $Half_day_count++;
                    }
                    else
                    {
                        $Full_day_count++;
                    }
                }
                if($ActualIntime =='00:00:00' && $ActualOuttime !='00:00:00' || $ActualIntime !='00:00:00' && $ActualOuttime =='00:00:00')
                {
                    $Missmatched_attendance++;
                }

                        
            }
        }
        if($Half_day_count !=0)
        {
            $Half_day_count = $Half_day_count/2;
        }
        if($Full_day_count != 0 )
        {
            $Manual_workingday = $Full_day_count + $Half_day_count ;
      
        }
        

        if (array_key_exists($previousmonths, $previousMonthMapping))
        {
        ${$previousMonthMapping[$previousmonths]['manual_wd']} = $Manual_workingday; 
        ${$previousMonthMapping[$previousmonths]['miss_matched']} = $Missmatched_attendance;   
        }
        echo "$previousMonthMapping + 'Manual Working Day' + $Manual_workingday  <br/>";
        echo "$previousMonthMapping + 'Miss Matched Attendance' + $Missmatched_attendance  <br/>";
    endforeach;


    foreach ($currentMonthsArray as $currentmonths): 
        $nmonth = date('m', strtotime($currentmonths));
        $d = date('Y-m-d',strtotime("$currentyear-$nmonth-01"));
        $fdaymonth = date('Y-m-01',strtotime($d));
        $ldaymonth=date('Y-m-t',strtotime($d));
        $Missmatched_attendance=0;
        $Manual_workingday =0;
        $Half_day_count=0;
        $Full_day_count=0;
        $totsundays=0;
        $sundays=0;
        $total_days=cal_days_in_month (CAL_GREGORIAN, $nmonth, $currentyear); 
        for ($i=1;$i<=$total_days;$i++) {
            if (date('N', strtotime($currentyear.'-'.$nmonth.'-'.$i)) == 7) $sundays++;
        }
        $totsundays = $sundays;
        
        $resultDetail = "SELECT * FROM indsys1030empdailyattendancedetail WHERE Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$Employeeid' AND Clientid ='$Clientid' ";
        $resultAttendance = $conn->query($resultDetail);
        if (mysqli_num_rows($resultAttendance) > 0) {
            while ($rowatt = mysqli_fetch_array($resultAttendance)) {
                $ActualIntime = $rowatt['ActualIntime'];
                $ActualOuttime = $rowatt['ActualOuttime'];
                
                if ($ActualIntime != '00:00:00' && $ActualOuttime != '00:00:00') {
                    $Intimecheck = strtotime($ActualIntime);
                    $OuttimeCheck = strtotime($ActualOuttime);
                    $WorkingHours = $OuttimeCheck - $Intimecheck;
                    $WorkingHours = gmdate("H:i:s", $WorkingHours);
                    $Checkworkinghrs = substr(str_replace(":", ".", $WorkingHours), 0, 5);
                    if ($Checkworkinghrs <4) {
                        $Half_day_count++;
                    } else {
                        $Full_day_count++;
                    }
                }
                
                if ($ActualIntime == '00:00:00' && $ActualOuttime != '00:00:00' || $ActualIntime != '00:00:00' && $ActualOuttime == '00:00:00') {
                    $Missmatched_attendance++;
                }
            }
        }
        
        if ($Half_day_count != 0 ) {
            $Half_day_count = $Half_day_count / 2;
        }

        if($Full_day_count !=0 )
        {
            $Manual_workingday = $Full_day_count + $Half_day_count ;
        }

       
        
        if (array_key_exists($currentmonths, $currentMonthMapping)) {
            ${$currentMonthMapping[$currentmonths]['manual_wd']} = $Manual_workingday; 
            ${$currentMonthMapping[$currentmonths]['miss_matched']} = $Missmatched_attendance;   
        }
        
        echo "$currentMonthMapping + 'Manual Working Day' + $Manual_workingday  <br/>";
        echo "$currentMonthMapping + 'Miss Matched Attendance' + $Missmatched_attendance  <br/>";
    endforeach;

  $inserquery ="INSERT INTO `indsys1063employee_actual_vs_manual_workingday`(`Clientid`,`Processedyear`,`Category`,`Employeeid`,`Employeename`,`Department`,`Designation`,`Userid`,`Addormodifydatetime`,`Current_year`,`Previous_year`,`Oct_workingdays`,`Nov_workingdays`,`Dec_workingdays`,`Jan_workingdays`,`Feb_workingdays`,
`Mar_workingdays`,`Apr_workingdays`,`May_workingdays`,`Jun_workingdays`,`Jul_workingdays`,`Aug_workingdays`,`Sep_workingdays`,`Oct_manual_wd`,`Nov_manual_wd`,`Dec_manual_wd`,`Jan_manual_wd`,`Feb_manual_wd`,`Mar_manual_wd`,
`Apr_manual_wd`,`May_manual_wd`,`Jun_manual_wd`,`Jul_manual_wd`,`Aug_manual_wd`,`Sep_manual_wd`,`Oct_miss_matched`,`Nov_miss_matched`,`Dec_miss_matched`,`Jan_miss_matched`,`Feb_miss_matched`,`Mar_miss_matched`,`Apr_miss_matched`,`May_miss_matched`,`Jun_miss_matched`,`Jul_miss_matched`,`Aug_miss_matched`,`Sep_miss_matched`)
VALUES('$Clientid','$currentyear','$Category','$Employeeid','$Fullname','$Department','$Designation','$user_id','$date',
'$currentyear','$previousyear','$Oct_workingdays','$Nov_workingdays','$Dec_workingdays','$Jan_workingdays','$Feb_workingdays',
'$Mar_workingdays','$Apr_workingdays','$May_workingdays','$Jun_workingdays','$Jul_workingdays','$Aug_workingdays','$Sep_workingdays',
'$Oct_manual_wd','$Nov_manual_wd','$Dec_manual_wd','$Jan_manual_wd','$Feb_manual_wd','$Mar_manual_wd','$Apr_workingdays',
'$May_manual_wd','$Jun_manual_wd','$Jul_manual_wd','$Aug_manual_wd','$Sep_manual_wd','$Oct_miss_matched','$Nov_miss_matched','$Dec_miss_matched',
'$Jan_miss_matched','$Feb_miss_matched','$Mar_miss_matched','$Apr_miss_matched','$May_miss_matched','$Jun_miss_matched','$Jul_miss_matched',
'$Aug_miss_matched','$Sep_miss_matched')";
 $resultsave = mysqli_query($conn, $inserquery);
 if($resultsave===TRUE)
 {

 }
 else
 {
    echo "Error - $Employeeid<br/>";
 }








}
?>