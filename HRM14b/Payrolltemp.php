<?php
error_reporting(0);
include '../config.php';
include 'Payrollsalary.php';
session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail = $_SESSION["Mailid"];
$Clientid = $_SESSION["Clientid"];
$AuthorizedType = $_SESSION["Authorizedtype"];
$_SESSION["Tittle"] = "Employee";
$Message = '';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
$form_data = json_decode(file_get_contents("php://input"));
$form_data = json_decode(json_encode($form_data), true);
$MethodGet = $form_data['Method'];
//$MethodGet='FetchTest';
if ($MethodGet == 'ModuleNext') {
    $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='EMP' AND Clientid ='$Clientid' ";
    $result_Nextno = $conn->query($GetNextno);
    if (mysqli_num_rows($result_Nextno) > 0) {
        while ($row = mysqli_fetch_array($result_Nextno)) {
            $data = $row['Nextno'];
            $data01 = $data + 1;
        }
    }
    header('Content-Type: application/json');
    echo json_encode($data01);
}
////////////////////////////
if ($MethodGet == 'FetchDate') {
    try {
        $Fromdate = date('01-m-Y');
        $Todate = date('t-m-Y', strtotime($Fromdate));
        $Startdate = new DateTime($Fromdate);
        $Enddate = new DateTime($Todate);
        $no = 0;
        $time = strtotime($Fromdate);
        $month_num = date("m", strtotime($time));
        $Payrollmonth = date("F", $time);
        $Payrollyear = date("Y", $time);
        $date = date("Y-m-d H:i:s");
        $month_num = getMonthNumber($Payrollmonth);
        $year_num = $Payrollyear;
        $Fromdate = date("01-$month_num-$Payrollyear");
        $Todate = date("t-$month_num-$Payrollyear", strtotime($Fromdate));
        // $Fromdate= date('01-m-Y');
        // $Todate=  date('t-m-Y',strtotime($Fromdate));
        $Startdate = new DateTime($Fromdate);
        $Enddate = new DateTime($Todate);
        $no = 0;
        $date = date("Y-m-d H:i:s");
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($Startdate, $interval, $Enddate);
        $sundays = 0;
        $total_days = cal_days_in_month(CAL_GREGORIAN, $month_num, $Payrollyear);
        //echo "Test$total_days";
        for ($i = 1;$i <= $total_days;$i++) if (date('N', strtotime($Payrollyear . '-' . $month_num . '-' . $i)) == 7) $sundays++;
        $totsundays = $sundays;
        $Weekoff = $totsundays;
        $numOfDays = dateDiffInDays($Fromdate, $Todate);
        $Workingdays = ($numOfDays + 1) - $totsundays;
        $TotalDays = $numOfDays + 1;
        $_SESSION["Payrollmonth"] = $Payrollmonth;
        $_SESSION["Payrollyear"] = $Payrollyear;
        $AuthorizedType = $_SESSION["Authorizedtype"];
        $result = mysqli_query($conn, "select Count(*) as total from vwholidaymaster where Monthname ='$Payrollmonth' and Year = '$Payrollyear' and Dayname!='Sunday' AND Clientid ='$Clientid'");
        $row = mysqli_fetch_array($result);
        $Nationalholiday = $row['total'];
        $Display = array('Fromdate' => $Fromdate, 'Todate' => $Todate, 'Working_Days' => $Workingdays, 'Payrollmonth' => $Payrollmonth, 'Payrollyear' => $Payrollyear, 'AuthorizedType' => $AuthorizedType, 'Nationalholiday' => $Nationalholiday, 'Weekoff' => $Weekoff, 'TotalDays' => $TotalDays, 'TodayDate' => $date);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////////////////
function last_day_of_the_month($date = '') {
    $month = date('m', strtotime($date));
    $year = date('Y', strtotime($date));
    $result = strtotime("{$year}-{$month}-01");
    $result = strtotime('-1 second', strtotime('+1 month', $result));
    return date('Y-m-d', $result);
}
///////////////////////////////
if ($MethodGet == 'FetchDays') {
    try {
        $Payrollmonth = $form_data['Payrollmonth'];
        $Payrollyear = $form_data['Payrollyear'];
        $month_num = getMonthNumber($Payrollmonth);
        $year_num = $Payrollyear;
        $Fromdate = date("01-$month_num-$Payrollyear");
        $Todate = date("t-$month_num-$Payrollyear", strtotime($Fromdate));
        // $Fromdate= date('01-m-Y');
        // $Todate=  date('t-m-Y',strtotime($Fromdate));
        $Startdate = new DateTime($Fromdate);
        $Enddate = new DateTime($Todate);
        $no = 0;
        $date = date("Y-m-d H:i:s");
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($Startdate, $interval, $Enddate);
        // foreach ($period as $dt)
        // {
        //     if ($dt->format('N') == 7)
        //     {
        //         $no++;
        //     }
        // }
        $numOfDays = dateDiffInDays($Fromdate, $Todate);
        $sundays = 0;
        $total_days = cal_days_in_month(CAL_GREGORIAN, $month_num, $year_num);
        for ($i = 1;$i <= $total_days;$i++) if (date('N', strtotime($year_num . '-' . $month_num . '-' . $i)) == 7) $sundays++;
        $totsundays = $sundays;
        $Working_Days = ($numOfDays + 1) - $totsundays;
        $result = mysqli_query($conn, "select Count(*) as total from vwholidaymaster where Monthname ='$Payrollmonth' and Year = '$Payrollyear' and Dayname!='Sunday' AND Clientid ='$Clientid'");
        $row = mysqli_fetch_array($result);
        $Nationalholiday = $row['total'];
        $_SESSION["Payrollmonth"] = $Payrollmonth;
        $_SESSION["Payrollyear"] = $Payrollyear;
        $Display = array('Nationalholiday' => $Nationalholiday, 'Working_Days' => $Working_Days);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
//////////////////////////////////
if ($MethodGet == "FetchPayrollTemp") {
    $Payrollmonth = $form_data['Payrollmonth'];
    $Payrollyear = $form_data['Payrollyear'];
    $Category = $form_data['Category'];
    $Payrollstatus = "Open";
    $SalaryPaidDate = $date;
    $GetChapter = "SELECT Payrollstatus,SalaryPaidDate FROM indsys1026employeepayrollmastertemp where Clientid ='$Clientid' and SalMonth = '$Payrollmonth' and Salyear='$Payrollyear' and Category='$Category'  ";
    $result_Chapter = $conn->query($GetChapter);
    if (mysqli_num_rows($result_Chapter) > 0) {
        while ($row = mysqli_fetch_array($result_Chapter)) {
            $Payrollstatus = $row['Payrollstatus'];
            $SalaryPaidDate = $row['SalaryPaidDate'];
        }
    }
    $Display = array('Payrollstatus' => $Payrollstatus, 'SalaryPaidDate' => $SalaryPaidDate);
    $str = json_encode($Display);
    echo trim($str, '"');
}
///////////////////////////////
if ($MethodGet == "UpdateStatus") {
    $Payrollmonth = $form_data['Payrollmonth'];
    $Payrollyear = $form_data['Payrollyear'];
    $Status = "Close";
    $SalaryPaidDate = $form_data['SalaryPaidDate'];
    $Category = $form_data['Category'];
    if (empty($SalaryPaidDate)) {
        $Message = "Salary Date";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    $resultExists = "Update indsys1026employeepayrollmastertemp set 
  Payrollstatus ='$Status',    
  Addormodifydatetime ='$date',
  SalaryPaidDate ='$SalaryPaidDate',
  Userid ='$user_id'
  where SalMonth = '$Payrollmonth' and  Salyear = '$Payrollyear' AND Clientid ='$Clientid' AND Category='$Category' ";
    $resultExists01 = $conn->query($resultExists);
    if ($resultExists01 === TRUE) {
        $resultExistsNEW = "Update indsys1027employeepayrolldeduction set 
    Payrollstatus ='$Status',    
    Addormodifydatetime ='$date',
    
    Userid ='$user_id'
    where SalMonth = '$Payrollmonth' and  Salyear = '$Payrollyear' AND Clientid ='$Clientid' AND Category='$Category' ";
        $resultExistsOld = $conn->query($resultExistsNEW);
        $Message = "PayrollClose";
    } else {
        $Message = "FAIL";
    }
    $Display = array('Message' => $Message);
    $str = json_encode($Display);
    echo trim($str, '"');
}
/////////////////////////////////////////////
function dateDiffInDays($date1, $date2) {
    // Calculating the difference in timestamps
    $diff = strtotime($date2) - strtotime($date1);
    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400));
}
//////////////////////
if ($MethodGet == 'EmployeeALL') {
    $GetState = "SELECT * FROM indsys1017employeemaster where EmpActive ='Active' AND Clientid ='$Clientid'   ORDER BY Employeeid";
    $result_Region = $conn->query($GetState);
    if (mysqli_num_rows($result_Region) > 0) {
        while ($row = mysqli_fetch_array($result_Region)) {
            $data01[] = $row;
        }
    }
    header('Content-Type: application/json');
    echo json_encode($data01);
}
///////////////////////////////

//////////////////////////
if ($MethodGet == 'EMPPAYROLL') {
    try {
        $Payrollmonth = $form_data['Payrollmonth'];
        $Payrollyear = $form_data['Payrollyear'];
        $Category = $form_data['Category'];
        $_SESSION['Payrollmonth'] = $Payrollmonth;
        $_SESSION['Payrollyear'] = $Payrollyear;
        $_SESSION['Category'] = $Category;
        $GetState = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Clientid ='$Clientid' And Category='$Category' AND NetWages!=0  ORDER BY Employeeid";
        $result_Region = $conn->query($GetState);
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $data01[] = $row;
            }
        }
        $sql = "SELECT SUM(NetWages)FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid'  ORDER BY Employeeid";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_array($result)) {
            $NetWages = $row['SUM(NetWages)'];
        }
        if (empty($NetWages)) {
            $NetWages = 0;
        }
        $sqlPerformanceallowance = "SELECT SUM(Performanceallowance)FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid'  ORDER BY Employeeid";
        $resultPerformanceallowance = $conn->query($sqlPerformanceallowance);
        while ($row = mysqli_fetch_array($resultPerformanceallowance)) {
            $Performanceallowance = $row['SUM(Performanceallowance)'];
        }
        if (empty($Performanceallowance)) {
            $Performanceallowance = 0;
        }
        $GrandTotal = $NetWages + $Performanceallowance;
        $mytbl["Test"] = $data01;
        $Display = array('data01' => $mytbl["Test"], 'NetWages' => $NetWages, 'Performanceallowance' => $Performanceallowance, 'GrandTotal' => $GrandTotal);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
//////////////////////////////////////
if ($MethodGet == 'ParollFunction') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $SalMonth = $form_data['SalMonth'];
        $Salyear = $form_data['Salyear'];
        $Workeddays = $form_data['Workeddays'];
        $Leavedays = $form_data['Leavedays'];
        $Salary_Advance = $form_data['Salary_Advance'];
        $FoodDeduction = $form_data['FoodDeduction'];
        $TDS = $form_data['TDS'];
        $Category = $form_data['Category'];
        $Workingdays = $form_data['Workingdays'];
        $Nationalholidays = $form_data['Nationalholidays'];
        $CL = $form_data['CL'];
        $BasicDA = $form_data['BasicDA'];
        $HRA = $form_data['HRA'];
        $Otherallowance_Con_SA = $form_data['Otherallowance_Con_SA'];
        $OT_HRS = $form_data['OT_HRS'];
        $DailyAllowanance = $form_data['DailyAllowanance'];
        $Performanceallowance = $form_data['Performanceallowance'];
        $GetState = "SELECT * FROM indsys1027employeepayrolldeduction where SalMonth='$SalMonth' and Salyear='$Salyear' AND Category ='$Category' and Employeeid='$Employeeid' AND Clientid='$Clientid' ORDER BY Employeeid ";
        $result_Region = $conn->query($GetState);
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $Salary_Advance = $row['Salary_Advance'];
                $FoodDeduction = $row['FoodDeduction'];
                $TDS = $row['TDS'];
                $Dormitory=$row['Dormitory'];
                $Transport=$row['Transport'];
            }
        }
        CallEmppdatepayroll($conn, $Clientid, $user_id, $date, $Employeeid, $SalMonth, $Salyear, $Workeddays, $Leavedays, $Salary_Advance, $FoodDeduction, $TDS, $Category, $Workingdays, $Nationalholidays, $CL, $BasicDA, $HRA, $Otherallowance_Con_SA, $OT_HRS, $DailyAllowanance, $Performanceallowance,$Transport);
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////////////////
//////////////////////////////////////////////
if ($MethodGet == 'Delete') {
    $Employeeid = $form_data['Employeeid'];
    $SalMonth = $form_data['SalMonth'];
    $Salyear = $form_data['Salyear'];
    if (mysqli_connect_errno()) {
        $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }
    $resultExists = "DELETE FROM indsys1026employeepayrolltempmasterdetail WHERE Clientid = '$Clientid' and Employeeid = '$Employeeid' and SalMonth = '$SalMonth' and Salyear = '$Salyear'   ";
    $resultExists01 = $conn->query($resultExists);
    $Message = "Delete";
    $Display = array('Message' => $Message);
    $str = json_encode($Display);
    echo trim($str, '"');
}
//////////////////////////////////
if ($MethodGet == 'FetchBulk') {
    try {
        $Fromdate = $form_data['Fromdate'];
        $Todate = $form_data['Todate'];
        $Payrollmonth = $form_data['Payrollmonth'];
        $Payrollyear = $form_data['Payrollyear'];
        $Category = $form_data['Category'];
        $Weekoff = $form_data['Weekoff'];
        $TotalDays = $form_data['TotalDays'];
        if (empty($Category)) {
            $Message = "Category";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        $month_num = date("m", strtotime($Payrollmonth));
        $year_num = $Payrollyear;
        $Fromdate = date("01-$month_num-$Payrollyear");
        $Todate = date("t-$month_num-$Payrollyear", strtotime($Fromdate));
        $monthof1stday = date("$Payrollyear-$month_num-01");
        $monthoflastday = date("$Payrollyear-$month_num-t", strtotime($Fromdate));
        $date02 = date("Y-m-d");
        $Generatedate = date("Y-m", strtotime($Todate));
        $Currentdate = date("Y-m", strtotime($date02));
        if ($Generatedate >= $Currentdate) {
                $Message ="Payroll Not";
            $Display=array('Message' =>$Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
            
        }
        //$from_days=cal_days_in_month(CAL_GREGORIAN,$month_num,$year_num);
        $Working_Days = $form_data['Working_Days'];
        $Nationalholiday = $form_data['Nationalholiday'];
        $Status = $form_data['Status'];
        $CasualLeave = $form_data['CasualLeave'];
        $Workingdays = 0;
       
        $Message = "";
        $no = 1;
        $resultExists = "SELECT * FROM indsys1026employeepayrollmastertemp WHERE Salyear = '$Payrollyear' AND Clientid = '$Clientid' And SalMonth ='$Payrollmonth' And Category='$Category' LIMIT 1";
        $resultExists01 = $conn->query($resultExists);
        if (mysqli_fetch_row($resultExists01)) {
            $resultExistsss = "Update indsys1026employeepayrollmastertemp set 
            Workingdays ='$Working_Days',
            Nationholidays ='$Nationalholiday',
            Payrollstatus ='$Status',
            Casual_Leave =' $CasualLeave',   
            Payrollstartdate ='$Fromdate',     
            Payrollenddate ='$Todate',        
            Addormodifydatetime ='$date',
            Totaldays='$TotalDays',
            Weekoff='$Weekoff',
            Userid ='$user_id'            
            WHERE SalMonth = '$Payrollmonth' AND Salyear ='$Payrollyear'   AND Clientid ='$Clientid' and Category ='$Category' ";
            $resultExists0New = $conn->query($resultExistsss);
            $Message = "Exists";
        } else {
            $sqlsave = "INSERT IGNORE INTO indsys1026employeepayrollmastertemp (Clientid,
        SalMonth,Salyear,Category,Workingdays,Nationholidays,Payrollstatus,Casual_Leave,Payrollstartdate,Payrollenddate,Userid,Addormodifydatetime,Weekoff,Totaldays)
         VALUES ('$Clientid','$Payrollmonth','$Payrollyear','$Category','$Working_Days','$Nationalholiday',
         '$Status','$CasualLeave','$Fromdate','$Todate','$user_id','$date','$Weekoff','$TotalDays')";
            $resultsave = mysqli_query($conn, $sqlsave);
        }
        $resultExists = "DELETE FROM indsys1026employeepayrolltempmasterdetail WHERE Clientid = '$Clientid'  and SalMonth = '$Payrollmonth' and Salyear = '$Payrollyear' AND Category='$Category'  ";
        $resultExists01 = $conn->query($resultExists);
        $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active' and Type_Of_Posistion='$Category'  ORDER BY Employeeid ASC";
        $logempall = mysqli_query($conn, $logemp);
        while ($row = mysqli_fetch_array($logempall)) {
            $Performanceallowance = 0;
            $Employeeid = $row['Employeeid'];
            $Nationalholiday02 = $Nationalholiday;
            $Title = $row['Title'];
            $Firstname = $row['Firstname'];
            $Lastname = $row['Lastname'];
            $Gender = $row['Gender'];
            $Fullname = $row['Fullname'];
            //$Category='Test';
            $Category = $row['Type_Of_Posistion'];
            $Basic = $row['Basic'];
            $HR_Allowance = $row['HR_Allowance'];
            $Other_Allowance = $row['Other_Allowance'];
            $TA = $row['TA'];
            $Performanceallowance = $row['Performance_allowance'];
            $Day_allowance = $row['Day_allowance'];
            $Department = $row['Department'];
            $Type_Of_Posistion = $row['Type_Of_Posistion'];
            $Designation = $row['Designation'];
            $date_of_joining = $row['Date_Of_Joing'];
            $Backgroundverification = "No Need";
            $Packageholdstatus = "Open";
            $Superuserapproval = "Approved";
            $Performanceallowance = $row['Performance_allowance'];
            $Lophrs = 0;
            //$GetState = "SELECT * FROM indsys1017employeemaster where Employeeid='$Employeeid' AND  EmpActive ='Active'  AND Gross_Salary >30000 AND  (BackgroundVerification='No' OR BackgroundVerification is null)   ORDER BY Employeeid";
            $GetState = "SELECT * FROM indsys1017employeemaster where Employeeid='$Employeeid' AND  EmpActive ='Active'  AND Gross_Salary >30000 AND  (BackgroundVerification='No' OR BackgroundVerification is null)   ORDER BY Employeeid";
            $result_GetState = $conn->query($GetState);
            if (mysqli_num_rows($result_GetState) > 0) {
                while ($row = mysqli_fetch_array($result_GetState)) {
                    $Backgroundverification = "Need";
                    $Packageholdstatus = "Hold";
                    $Superuserapproval = "Waiting";
                }
            }
            $date1 = new DateTime($date_of_joining);
            $date2 = new DateTime($monthoflastday);
            $dateofjoingdays = $date2->diff($date1)->format("%a");
            $dateofjoingdays = $dateofjoingdays + 1;
            $earlier = new DateTime($monthof1stday);
            $later = new DateTime($monthoflastday);
            $abs_diff = $later->diff($earlier)->format("%a");
            $abs_diff = $abs_diff + 1;
            if ($dateofjoingdays <= $abs_diff) {
                if ($monthof1stday == $date_of_joining) {
                    $CasualLeave = $form_data['CasualLeave'];
                } else {
                    $CasualLeave = 0;
                }
                $sqlHDND = "SELECT Count(*) as total from vwholidaymaster where Month ='$month_num' and Year = '$Payrollyear' and Dayname!='Sunday' AND Clientid ='$Clientid'  AND DATE(Holidaydate) >='$date_of_joining'";
                $resultHDND = $conn->query($sqlHDND);

             
                while ($rowHDND = mysqli_fetch_array($resultHDND)) {
                    $Nationalholidaydoj = $rowHDND['total'];
                    $Nationalholiday02 = $Nationalholidaydoj;
                }
                // $resultrg = "SELECT Count(*) as total from vwholidaymaster where Monthname ='$month_num' and Year = '$Payrollyear' and Dayname!='Sunday' AND Clientid ='$Clientid'  AND DATE(Holidaydate) <='$date_of_joining' ";
                // $resultnational = mysqli_query($conn, "SELECT Count(*) as total from vwholidaymaster where Monthname ='$month_num' and Year = '$Payrollyear' and Dayname!='Sunday' AND Clientid ='$Clientid'  AND DATE(Holidaydate) <='$date_of_joining' ");
                // $rownational = mysqli_fetch_array($resultnational);
                // $Nationalholidaydoj = $rownational['total'];
                // if($Employeeid =='CAT03WOV000147')
                // {
                // echo "$resultrg";
                // }
                
            } else {
                $CasualLeave = $form_data['CasualLeave'];
            }
            $Fromdate01 = date("Y-m-d", strtotime($Fromdate));
            $Todate01 = date("Y-m-d", strtotime($Todate));
            $OT_HRS = 0;


            if($Clientid=="4")
            {
                $sqlweek = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='WO'";
            
                $resultweek = $conn->query($sqlweek);
                while ($rowweek = mysqli_fetch_array($resultweek)) {
                    $Weekoff = $rowweek['Count(AttenStatus)'];                 
                    
                }

                $sqlNH = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='H'";
            
                $resultNH = $conn->query($sqlNH);
                while ($rowNH = mysqli_fetch_array($resultNH)) {
                    $Nationalholiday02 = $rowNH['Count(AttenStatus)'];          
                    
                }
            }
            $sql = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='P'";
            
            $result = $conn->query($sql);
            while ($rowpresent = mysqli_fetch_array($result)) {
                $CountPresentDays = $rowpresent['Count(AttenStatus)'];
                // $Workeddays=roundup($Workeddays);
                // $Workeddays=round($Workeddays,0);
                
            }
            $sqlHD = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='HD'";
            $resultHD = $conn->query($sqlHD);
            while ($rowHD = mysqli_fetch_array($resultHD)) {
                $CountHalfDay = $rowHD['Count(AttenStatus)'];
                // $Workeddays=roundup($Workeddays);
                // $Workeddays=round($Workeddays,0);
                
            }
            $sqlOD = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='OD'";
            $resultOD = $conn->query($sqlOD);
            while ($rowOD = mysqli_fetch_array($resultOD)) {
                $CountOD = $rowOD['Count(AttenStatus)'];
                // $Workeddays=roundup($Workeddays);
                // $Workeddays=round($Workeddays,0);
                
            }
            $CountAbsent = 0;
            $CountCL = 0;
            $CountSL = 0;
            $CountSL1stpart = 0;
            $CountSL2ndpart = 0;
            $CountSL1stpart = 0;
            $CountCL2ndpart = 0;
            $CountCL1stpart = 0;
            $sqlAbsent = "SELECT  Count(AttenStatus) as overall_absent_count from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='A'";
        //    $sqlAbsent = "SELECT COUNT(*) as overall_absent_count
        //    FROM vwattendenceclosestatus AS a
        //    WHERE Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='A'
        //      AND NOT EXISTS (
        //        SELECT 1
        //        FROM vwholidaymaster AS h
        //        WHERE h.Holidaydate = a.Attendencedate AND Clientid='$Clientid' and Dayname!='Sunday'
        //      )";
            $resultAbsent = $conn->query($sqlAbsent);
            while ($rowAbsent = mysqli_fetch_array($resultAbsent)) {
                $CountAbsent = $rowAbsent['overall_absent_count'];
                
                
            }
            $sqlCL = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='CL'";
            $resultCL = $conn->query($sqlCL);
            while ($rowCL = mysqli_fetch_array($resultCL)) {
                $CountCL = $rowCL['Count(AttenStatus)'];
                // $Workeddays=roundup($Workeddays);
                // $Workeddays=round($Workeddays,0);
                
            }
            $sqlSL = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='SL'";
            $resultSL = $conn->query($sqlSL);
            while ($rowSL = mysqli_fetch_array($resultSL)) {
                $CountSL = $rowSL['Count(AttenStatus)'];
                // $Workeddays=roundup($Workeddays);
                // $Workeddays=round($Workeddays,0);
                
            }
            $sqlSLPart = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='SL1/P'";
            $resultSLPart = $conn->query($sqlSLPart);
            while ($rowSL1stPart = mysqli_fetch_array($resultSLPart)) {
                $CountSL1stpart = $rowSL1stPart['Count(AttenStatus)'];
            }
            $sqlSL2Part = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='P/SL2'";
            $resultSL2Part = $conn->query($sqlSL2Part);
            while ($rowSL2ndPart = mysqli_fetch_array($resultSL2Part)) {
                $CountSL2ndpart = $rowSL2ndPart['Count(AttenStatus)'];
            }
            $sqlCLPart = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='CL1/P'";
            $resultCLPart = $conn->query($sqlCLPart);
            while ($rowCL1stPart = mysqli_fetch_array($resultCLPart)) {
                $CountCL1stpart = $rowCL1stPart['Count(AttenStatus)'];
            }
            $sqlCL2Part = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='P/CL2'";
            $resultCL2Part = $conn->query($sqlCL2Part);
            while ($rowCL2ndPart = mysqli_fetch_array($resultCL2Part)) {
                $CountCL2ndpart = $rowCL2ndPart['Count(AttenStatus)'];
            }
            $SLHalfday = 0;
            $CLHalfday = 0;
            $SLHalfday = $CountSL1stpart + $CountSL2ndpart;
            $CLHalfday = $CountCL1stpart + $CountCL2ndpart;
            if (empty($CountPresentDays)) {
                $CountPresentDays = 0;
            }
            if (empty($CountOD)) {
                $CountOD = 0;
            }
            if (empty($CountHalfDay)) {
                $CountHalfDay = 0;
            }
            $HalfDaycount = 0;
            if ($CountHalfDay == 0) {
                $HalfDaycount = 0;
            } else {
                $HalfDaycount = $CountHalfDay / 2;
            }
         
            if (empty($Workeddays)) {
                $Workeddays = 0;
            }
            if ($SLHalfday == 0) {
            } else {
                $SLHalfday = $SLHalfday / 2;
            }
            if ($CLHalfday == 0) {
            } else {
                $CLHalfday = $CLHalfday / 2;
            }
            $CountCL = $CountCL + $CLHalfday;
            $CountSL = $CountSL + $SLHalfday;
            $CountAbsent=$CountAbsent+$HalfDaycount;
            $sqlOT = "SELECT  SUM(HOUR(REPLACE(OT_HRS, '.', ':'))*60+MINUTE(REPLACE(OT_HRS, '.', ':'))) as OTHRSHM  from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and Empattendencestatus='Close'";
            $resultOT = $conn->query($sqlOT);
            while ($row = mysqli_fetch_array($resultOT)) {
                
                $OT_HRS = $row['OTHRSHM'];
                $OT_HRS = getHoursAndMins($OT_HRS);
                $OT_HRS = substr(str_replace(':', '.', $OT_HRS), 0, 5);
            }
            if (empty($OT_HRS)) {
                $OT_HRS = 0;
            }
      
            $sqlLOP = "SELECT  SUM(HOUR(REPLACE(Lophrs, '.', ':'))*60+MINUTE(REPLACE(Lophrs, '.', ':'))) as LOPHRSNEW  from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close'";
            $resultLOP = $conn->query($sqlLOP);
            while ($rownewtest = mysqli_fetch_array($resultLOP)) {
                $Lophrs = $rownewtest['LOPHRSNEW'];
                $Lophrs = getHoursAndMins($Lophrs);
                $Lophrs = substr(str_replace(':', '.', $Lophrs), 0, 5);
                //echo "$Employeeid- $Lophrs<br/>";
                
            }
            if (empty($Lophrs)) {
                $Lophrs = 0;
            }
            $sqlActualOT = "SELECT  SUM(HOUR(REPLACE(ActualOt_HRSNew, '.', ':'))*60+MINUTE(REPLACE(ActualOt_HRSNew, '.', ':'))) as ActualOTHM from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close'";
            $resultActualOT = $conn->query($sqlActualOT);
            while ($rowactualOT = mysqli_fetch_array($resultActualOT)) {
                $ActualOt_HRSNew = $rowactualOT['ActualOTHM'];
                $ActualOt_HRSNew = getHoursAndMins($ActualOt_HRSNew);
                $ActualOt_HRSNew = substr(str_replace(':', '.', $ActualOt_HRSNew), 0, 5);
            }
            if (empty($ActualOt_HRSNew)) {
                $ActualOt_HRSNew = 0;
            }
            $Workeddays = $CountPresentDays + $HalfDaycount + $CountOD+$CLHalfday+$SLHalfday;
            $Salary_Advance = 0;
            $TDS = 0;
            $FoodDeduction = 0;
            $Leavedays = 0;
            $DailyAllowanance = 0;
            $Dormitory =0;
            $Transport=0;
            if($Workeddays==0)
            {
                $Nationalholiday02=0;
            }
            $GetDeduction = "SELECT * FROM indsys1027employeepayrolldeduction where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category ='$Category' and Employeeid='$Employeeid' AND Clientid='$Clientid' ORDER BY Employeeid ";
            $result_Deduction = $conn->query($GetDeduction);
            if (mysqli_num_rows($result_Deduction) > 0) {
                while ($rowDeduction = mysqli_fetch_array($result_Deduction)) {
                    $Salary_Advance = $rowDeduction['Salary_Advance'];
                    $FoodDeduction = $rowDeduction['FoodDeduction'];
                    $TDS = $rowDeduction['TDS'];
                    $Dormitory=$rowDeduction['Dormitory'];
                    $Transport=$rowDeduction['Transport'];

                }
            }
            if(empty($Dormitory))
            {
                $Dormitory=0;
            }
            if(empty($Transport))
            {
                $Transport=0;
            }
            //$result = get_attendance($conn,$Employeeid,$Fromdate,$emp_shift, $Category,$date_of_joining,$week_off);
            $resultExists = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid = '$Employeeid'  and SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Clientid ='$Clientid' LIMIT 1";
            $resultExists01 = $conn->query($resultExists);
            if (mysqli_fetch_row($resultExists01)) {
                if ($Clientid == 4) {
                    $updatefunction = CallEmppdatepayrollBGPDELHI($conn, $Clientid, $user_id, $date, $Employeeid, $Payrollmonth, $Payrollyear, $Workeddays, $Leavedays, $Salary_Advance, $FoodDeduction, $TDS, $Category, $TotalDays, $Nationalholiday02, $CasualLeave, $Basic, $HR_Allowance, $Other_Allowance, $OT_HRS, $DailyAllowanance, $Performanceallowance, $CountAbsent, $Weekoff, $CountSL, $CountCL, $TotalDays, $TA,$Dormitory,$Transport);
                } else {
                    $updatefunction = CallEmppdatepayroll($conn, $Clientid, $user_id, $date, $Employeeid, $Payrollmonth, $Payrollyear, $Workeddays, $Leavedays, $Salary_Advance, $FoodDeduction, $TDS, $Category, $Working_Days, $Nationalholiday02, $CasualLeave, $Basic, $HR_Allowance, $Other_Allowance, $OT_HRS, $DailyAllowanance, $Performanceallowance,$Dormitory,$Transport);
                }
            } else {
                $sqlsave = "INSERT IGNORE INTO indsys1026employeepayrolltempmasterdetail (Clientid,Employeeid,SalMonth,Salyear,Firstname,Lastname,Title,Fullname,Designation,Department,Workingdays,Workeddays,Category,Nationalholidays,Leavedays,CL,LOP,Totaldays,BasicDA,HRA,Otherallowance_Con_SA,TotalSal,EarnedBasic,EarnedHRA,EarnedOtherallowance_Con_SA,EarnedWages,PF,ESI,Salary_Advance,FoodDeduction,TotalDeduction,NetWages,DailyAllowanance,TDS,OT_HRS,OT_Wages,Userid,Addormodifydatetime,Performanceallowance,Backgroundverificationstatus,PackageHoldstatus,Superuserapproval,TakenEL,BalanceEL,Lophrs,Lopwages,ActualOTHRS,ActualOTWages,Actualnet,TotalPresentdays,TotalAbsentdays,Totalweekoff,Totalsickleave,TotalEL,TotalCL,Conveyence,EarnedConveyence,Dormitory)
            values('$Clientid','$Employeeid','$Payrollmonth','$Payrollyear','$Firstname','$Lastname','$Title','$Fullname','$Designation','$Department','$Working_Days',0,'$Category','$Nationalholiday02',0,$CasualLeave,0,0,$Basic,$HR_Allowance,$Other_Allowance,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'$user_id','$date','$Performanceallowance','$Backgroundverification','$Packageholdstatus','$Superuserapproval',0,0,'$Lophrs',0,'$ActualOt_HRSNew',0,0,'$Workeddays','$CountAbsent','$Weekoff','$CountSL',0,'$CountCL','$TA',0,'$Dormitory')";
                $resultsave = mysqli_query($conn, $sqlsave);
                if ($resultsave === TRUE) {
                } else {
                    echo "$sqlsave<br/>";
                    echo "Error" . $conn->error;
                }
            }
            // if($OT_HRS<0){
            // 	$OT_HRS = 0;
            // }
            if ($Clientid == 4) {
                $updatefunction = CallEmppdatepayrollBGPDELHI($conn, $Clientid, $user_id, $date, $Employeeid, $Payrollmonth, $Payrollyear, $Workeddays, $Leavedays, $Salary_Advance, $FoodDeduction, $TDS, $Category, $TotalDays, $Nationalholiday02, $CasualLeave, $Basic, $HR_Allowance, $Other_Allowance, $OT_HRS, $DailyAllowanance, $Performanceallowance, $CountAbsent, $Weekoff, $CountSL, $CountCL, $TotalDays, $TA,$Dormitory,$Transport);
            } else {
                $updatefunction = CallEmppdatepayroll($conn, $Clientid, $user_id, $date, $Employeeid, $Payrollmonth, $Payrollyear, $Workeddays, $Leavedays, $Salary_Advance, $FoodDeduction, $TDS, $Category, $Working_Days, $Nationalholiday02, $CasualLeave, $Basic, $HR_Allowance, $Other_Allowance, $OT_HRS, $DailyAllowanance, $Performanceallowance,$Dormitory,$Transport);
            }
        };
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
////////////////////////////////
if ($MethodGet == 'PayrollSuperUserFunction') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $SalMonth = $form_data['SalMonth'];
        $Salyear = $form_data['Salyear'];
        $Superuserapproval = $form_data['Superuserapproval'];
        $PackageHoldstatus = "Open";
        if ($Superuserapproval == "Approved") {
            $PackageHoldstatus = "Open";
        } else {
            $PackageHoldstatus = "Hold";
        }
        $resultExists = "Update indsys1026employeepayrolltempmasterdetail set 
PackageHoldstatus ='$PackageHoldstatus',
Superuserapproval='$Superuserapproval',

Addormodifydatetime ='$date',
Userid ='$user_id'
   WHERE Employeeid = '$Employeeid' and SalMonth = '$SalMonth' and  Salyear = '$Salyear' AND Clientid ='$Clientid' ";
        $resultExists01 = $conn->query($resultExists);
        $Message = "Exists";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
/////////////////////////////////
if ($MethodGet == 'EMPPAYROLLVIEW') {
    try {
        $Payrollmonth = $form_data['Payrollmonth'];
        $Payrollyear = $form_data['Payrollyear'];
        $GetState = "SELECT * FROM vwpayrollmasteremplist where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Clientid ='$Clientid'  LIMIT 10 ";
        $result_Region = $conn->query($GetState);
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $data01[] = $row;
            }
        }
        $mytbl["Test"] = $data01;
        $Display = array('data01' => $mytbl["Test"]);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
//////////////////////////////////
if ($MethodGet == 'EMPREPORT') {
    try {
        $Payrollmonth = $form_data['Payrollmonth'];
        $Payrollyear = $form_data['Payrollyear'];
        $Employeeid = $form_data['Employeeid'];
        $Category = $form_data['Category'];
        
    $_SESSION['Payrollmonth']=$Payrollmonth;
    $_SESSION['Payrollyear']=$Payrollyear;
    $_SESSION['Employeeid']=$Employeeid;
    $_SESSION['Category']=$Category;
        $GetState = "SELECT * FROM vwpayrollmasteremplist where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  And Employeeid ='$Employeeid' AND Type_Of_Posistion='$Category' AND Clientid ='$Clientid' ";
        $result_Region = $conn->query($GetState);
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $data01[] = $row;
            }
        }
        $mytbl["Test"] = $data01;
        $Display = array('data01' => $mytbl["Test"]);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////
if ($MethodGet == 'FetchMaster') {
    try {
        $SalMonth = $form_data['Payrollmonth'];
        $Salyear = $form_data['Payrollyear'];
        $Category = $form_data['Category'];
        $GetChapter = "SELECT * FROM indsys1026employeepayrollmastertemp where Clientid ='$Clientid' AND Category='$Category' AND SalMonth='$SalMonth' and Salyear='$Salyear' ";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Workingdays = $row['Workingdays'];
                $Nationholidays = $row['Nationholidays'];
                $Payrollstatus = $row['Payrollstatus'];
                $SalaryPaidDate = $row['SalaryPaidDate'];
                $Casual_Leave = $row['Casual_Leave'];
                $TotalDays =$row['Totaldays'];
                $Weekoff = $row['Weekoff'];
            }
        } else {
            $Payrollmonth = $form_data['Payrollmonth'];
            $Payrollyear = $form_data['Payrollyear'];
            $month_num = getMonthNumber($Payrollmonth);
            $year_num = $Payrollyear;
            $Fromdate = date("01-$month_num-$Payrollyear");
            $Todate = date("t-$month_num-$Payrollyear", strtotime($Fromdate));
            // $Fromdate= date('01-m-Y');
            // $Todate=  date('t-m-Y',strtotime($Fromdate));
            $Startdate = new DateTime($Fromdate);
            $Enddate = new DateTime($Todate);
            $no = 0;
            $date = date("Y-m-d H:i:s");
            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($Startdate, $interval, $Enddate);
            // foreach ($period as $dt)
            // {
            //     if ($dt->format('N') == 7)
            //     {
            //         $no++;
            //     }
            // }
            $sundays = 0;
            $total_days = cal_days_in_month(CAL_GREGORIAN, $month_num, $Payrollyear);
            //echo "Test$total_days";
            for ($i = 1;$i <= $total_days;$i++) if (date('N', strtotime($Payrollyear . '-' . $month_num . '-' . $i)) == 7) $sundays++;
            $totsundays = $sundays;
            $Weekoff = $totsundays;
            $numOfDays = dateDiffInDays($Fromdate, $Todate);
            $Workingdays = ($numOfDays + 1) - $totsundays;
            $TotalDays = ($numOfDays + 1);
            $result = mysqli_query($conn, "select Count(*) as total from vwholidaymaster where Monthname ='$Payrollmonth' and Year = '$Payrollyear' and Dayname!='Sunday' AND Clientid ='$Clientid'");
            $row = mysqli_fetch_array($result);
            $Nationholidays = $row['total'];
            $_SESSION["Payrollmonth"] = $Payrollmonth;
            $_SESSION["Payrollyear"] = $Payrollyear;
            $Payrollstatus = "Open";
            $Casual_Leave = "1.5";
            $SalaryPaidDate = $date;
        }
        $Display = array('Workingdays' => $Workingdays, 'Nationholidays' => $Nationholidays, 'Payrollstatus' => $Payrollstatus, 'SalaryPaidDate' => $SalaryPaidDate, 'Casual_Leave' => $Casual_Leave, 'Weekoff' => $Weekoff, 'TotalDays' => $TotalDays);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
//////////////////////////////////
if ($MethodGet == 'PayrollFetch') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $SalMonth = $form_data['SalMonth'];
        $Salyear = $form_data['Salyear'];
        $Category = $form_data['Category'];
        $GetChapter = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where Clientid ='$Clientid' AND Employeeid='$Employeeid' AND SalMonth='$SalMonth' AND Category='$Category' and Salyear='$Salyear' ";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Employeeid = $row['Employeeid'];
                $SalMonth = $row['SalMonth'];
                $Salyear = $row['Salyear'];
                $Title = $row['Title'];
                $Firstname = $row['Firstname'];
                $Lastname = $row['Lastname'];
                $Fullname = $row['Fullname'];
                $Department = $row['Department'];
                $Designation = $row['Designation'];
                $Workingdays = $row['Workingdays'];
                $Workeddays = $row['Workeddays'];
                $Category = $row['Category'];
                $Nationalholidays = $row['Nationalholidays'];
                $Leavedays = $row['Leavedays'];
                $CL = $row['CL'];
                $LOP = $row['LOP'];
                $Totaldays = $row['Totaldays'];
                $BasicDA = $row['BasicDA'];
                $HRA = $row['HRA'];
                $Otherallowance_Con_SA = $row['Otherallowance_Con_SA'];
                $TotalSal = $row['TotalSal'];
                $EarnedBasic = $row['EarnedBasic'];
                $EarnedHRA = $row['EarnedHRA'];
                $EarnedOtherallowance_Con_SA = $row['EarnedOtherallowance_Con_SA'];
                $EarnedWages = $row['EarnedWages'];
                $PF = $row['PF'];
                $ESI = $row['ESI'];
                $Salary_Advance = $row['Salary_Advance'];
                $FoodDeduction = $row['FoodDeduction'];
                $TotalDeduction = $row['TotalDeduction'];
                $NetWages = $row['NetWages'];
                $DailyAllowanance = $row['DailyAllowanance'];
                $TDS = $row['TDS'];
                $OT_HRS = $row['OT_HRS'];
                $OT_Wages = $row['OT_Wages'];
                $PFEmployeecompany = $row['PFEmployeecompany'];
                $ESIEmployeecompany = $row['ESIEmployeecompany'];
                $Performanceallowance = $row['Performanceallowance'];
                $Backgroundverificationstatus = $row['Backgroundverificationstatus'];
                $PackageHoldstatus = $row['PackageHoldstatus'];
                $Superuserapproval = $row['Superuserapproval'];
                $TakenEL = $row['TakenEL'];
                 $Dormitory = $row['Dormitory'];
      $Transport=$row['Transport'];
            }
        }
        $Display = array('Employeeid' => $Employeeid, 'SalMonth' => $SalMonth, 'Salyear' => $Salyear, 'Title' => $Title, 'Firstname' => $Firstname, 'Lastname' => $Lastname, 'Fullname' => $Fullname, 'Department' => $Department, 'Designation' => $Designation, 'Workingdays' => $Workingdays, 'Workeddays' => $Workeddays, 'Category' => $Category, 'Nationalholidays' => $Nationalholidays, 'Leavedays' => $Leavedays, 'CL' => $CL, 'LOP' => $LOP, 'Totaldays' => $Totaldays, 'BasicDA' => $BasicDA, 'HRA' => $HRA, 'Otherallowance_Con_SA' => $Otherallowance_Con_SA, 'TotalSal' => $TotalSal, 'EarnedBasic' => $EarnedBasic, 'EarnedHRA' => $EarnedHRA, 'EarnedOtherallowance_Con_SA' => $EarnedOtherallowance_Con_SA, 'EarnedWages' => $EarnedWages, 'PF' => $PF, 'ESI' => $ESI, 'Salary_Advance' => $Salary_Advance, 'FoodDeduction' => $FoodDeduction, 'TotalDeduction' => $TotalDeduction, 'NetWages' => $NetWages, 'DailyAllowanance' => $DailyAllowanance, 'TDS' => $TDS, 'OT_HRS' => $OT_HRS, 'OT_Wages' => $OT_Wages, 'PFEmployeecompany' => $PFEmployeecompany, 'ESIEmployeecompany' => $ESIEmployeecompany, 'Performanceallowance' => $Performanceallowance, 'Backgroundverificationstatus' => $Backgroundverificationstatus, 'PackageHoldstatus' => $PackageHoldstatus, 'Superuserapproval' => $Superuserapproval, 'TakenEL' => $TakenEL,  'Dormitory' =>$Dormitory,
  'Transport' =>$Transport);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
////////////////////////
function getHoursAndMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
/////////////////////////////
function getMonthNumber($monthName) {
    $timestamp = strtotime("1 $monthName");
    $monthNumber = date('m', $timestamp);
    return $monthNumber;
}
?>