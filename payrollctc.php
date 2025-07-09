<?php
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail = $_SESSION["Mailid"];
$Clientid = $_SESSION["Clientid"];
$SalMonth = 'April';
$SalYear = '2025';


function getCumulativeTotal($conn, $Clientid, $Employeeid, $column, $startMonth, $endMonthName, $endYear, $fiscalStartYear)
{
    $start = strtotime("01-$startMonth-$fiscalStartYear");
    $end = strtotime("01-$endMonthName-$endYear");
    $where = [];
    while ($start <= $end) {
        $m = date('F', $start);
        $y = date('Y', $start);
        $where[] = "(SalMonth = '$m' AND Salyear = '$y')";
        $start = strtotime("+1 month", $start);
    }
    $condition = implode(" OR ", $where);
    $query = "SELECT SUM($column) AS Total FROM indsys1026employeepayrollbonusandctc 
              WHERE Clientid='$Clientid' AND Employeeid='$Employeeid' AND ($condition)";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return round($row['Total'] ?? 0);
}
function SaveCTCandBonus($conn, $Clientid, $SalMonth, $SalYear)
{

    $nmonth = date('m', strtotime($SalMonth));
    $year = $SalYear;
    $fdaymonth = $year . '-' . $nmonth . '-01';
    $ldaymonth = date("Y-m-d", strtotime("+1 month", strtotime($fdaymonth)));
    $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' AND DATE(Date_Of_Joing) <= '$ldaymonth'    ORDER BY Employeeid ASC";
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
        $Employeer_contribution_yes_no = $row["Employeer_contribution_yes_no"];
        $Category = $row['Type_Of_Posistion'];
        $BasicDA = $row["Basic"];
        $ESI_Yesandno = $row['ESI_Yesandno'];
        $PF_Yesandno = $row['PF_Yesandno'];
        $ESIOverlimit = $row['ESIOverlimit'];
        $Intime = "00:00:00";
        $Outtime = "00:00:00";
        $OTIntime = "00:00:00";
        $OTOuttime = "00:00:00";
        $Indate = "";
        $Outdate = "";
        $Workinghrs = "00.00";
        $ActualIntime = "00:00:00";
        $ActualOuttime = $Outtime;
        $AttenStatus = "A";
        $Userpunchid =  $Employeeid;
        $Workeddays = 0;
        $nmonth = date('m', strtotime($SalMonth));
        $d = date('Y-m-d', strtotime("$SalYear-$nmonth-01"));
        $fdaymonth = date('Y-m-01', strtotime($d));
        $ldaymonth = date('Y-m-t', strtotime($d));
        $Missmatched_attendance = 0;
        $Actual_workingday = 0;
        $Half_day_count = 0;
        $Full_day_count = 0;
        $EarnedBasic = 0;
        $resultDetail = "SELECT * FROM indsys1030empdailyattendancedetail WHERE Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$Employeeid' AND Clientid ='$Clientid' ";
        $resultAttendance = $conn->query($resultDetail);
        if (mysqli_num_rows($resultAttendance) > 0) {
            while ($rowatt = mysqli_fetch_array($resultAttendance)) {
                $Attendencedate = $rowatt['Attendencedate'];
                $dayOfWeek = date('w', strtotime($Attendencedate));
                if ($dayOfWeek == 0) {
                    echo "Sunday attendance is not allowed for Employee ID: $Employeeid on date: $Attendencedate <br>";
                    continue;
                }

                $ActualIntime = $rowatt['ActualIntime'];
                $ActualOuttime = $rowatt['ActualOuttime'];
                if ($ActualIntime != '00:00:00' && $ActualOuttime != '00:00:00') {
                    $Intimecheck = strtotime($ActualIntime);
                    $OuttimeCheck = strtotime($ActualOuttime);
                    $WorkingHours = $OuttimeCheck - $Intimecheck;
                    $WorkingHours = gmdate("H:i:s", $WorkingHours);
                    $Checkworkinghrs = substr(str_replace(":", ".", $WorkingHours), 0, 5);
                    if ($Checkworkinghrs < 4) {
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


        if ($Half_day_count != 0) {
            $Half_day_count = $Half_day_count / 2;
        }

        if ($Full_day_count != 0) {
            $Actual_workingday = $Full_day_count + $Half_day_count;
        }
        $EarnedBasics  = 0;
        $EarnedOtherallowance = 0;
        $EarnedHRA = 0;
        $EarnedWages = 0;
        $Performanceallowance = 0;

        $fetchearnedbasic = "SELECT * FROM indsys1026employeepayrolltempmasterdetail Where Employeeid='$Employeeid' And Clientid='$Clientid' And SalMonth='$SalMonth' And Salyear='$SalYear'";
        $result_earnedbasic = $conn->query($fetchearnedbasic);
        if (mysqli_num_rows($result_earnedbasic) > 0) {
            while ($row_earnedbasic = mysqli_fetch_array($result_earnedbasic)) {
                $EarnedBasics   = $row_earnedbasic['EarnedBasic'];
                $EarnedOtherallowance = $row_earnedbasic['EarnedOtherallowance_Con_SA'];
                $EarnedHRA = $row_earnedbasic['EarnedHRA'];
                $EarnedWages = $row_earnedbasic['EarnedWages'];
                $Performanceallowance = $row_earnedbasic['Performanceallowance'];
            }
        }
        $GetPFESI = "SELECT * FROM indsys1025pfandesilimitmaster where Clientid ='$Clientid' ";
        $result_PFESI = $conn->query($GetPFESI);
        if (mysqli_num_rows($result_PFESI) > 0) {
            while ($rowPFESI = mysqli_fetch_array($result_PFESI)) {
                $PFLimit = $rowPFESI['PFLimit'];
                $ESILimit = $rowPFESI['ESILimit'];
                $PFemployeepercentage = $rowPFESI['PFemployeepercentage'];
                $PFemployeerpercentage = $rowPFESI['PFemployeerpercentage'];
                $ESIemployeepercentage = $rowPFESI['ESIemployeepercentage'];
                $ESIemployeerpercentange = $rowPFESI['ESIemployeerpercentange'];
                $Bonuspercentage = $rowPFESI['Bonuspercentage'];
            }
        }
        $EarnedActualBasics = ($BasicDA / 26) * $Actual_workingday;
        $Bonus = ($Bonuspercentage / 100) * $EarnedActualBasics;
        $Bonus = round($Bonus, 0);
        $PF_Employeer_contribution = 0;
        $ESI_Employeer_contribution = 0;
        if ($ESI_Yesandno == 'Yes') {
            $ESI = 0;

            $Earnegwagesperformance = $EarnedWages + $Performanceallowance;
            if ($ESIOverlimit == "Yes") {
                $esiemployeerpercentage =  ($ESIemployeerpercentange / 100);
                $ESI_Employeer_contribution = ($Earnegwagesperformance * $esiemployeerpercentage);
                $ESI_Employeer_contribution = ceil($ESI_Employeer_contribution);
            } else {
                if ($Earnegwagesperformance <= 21000) {
                    $esiemployeerpercentage =  ($ESIemployeerpercentange / 100);
                    $ESI_Employeer_contribution = ($Earnegwagesperformance * $esiemployeerpercentage);
                    $ESI_Employeer_contribution = ceil($ESI_Employeer_contribution);
                }
            }
        } else {
            $ESI_Employeer_contribution = 0;
        }
        if ($Employeer_contribution_yes_no == 'Yes') {
            $PFemployeerpercentage =  ($PFemployeerpercentage / 100);
            $PF_Employeer_contribution = round((round($EarnedBasics) + round($EarnedOtherallowance)) * $PFemployeerpercentage);
            $PF_Employeer_contribution = round($PF_Employeer_contribution, 0);
        } else {
            $PF_Employeer_contribution = 0;
        }

        $Currentmonth_bonus = $Bonus;
        $Bonus_till_month = 0;
        $Actual_worked_days = $Actual_workingday;
        $Currentmonth_CTC = round($EarnedWages + $Performanceallowance + $ESI_Employeer_contribution + $PF_Employeer_contribution + $Bonus, 0);
        $Miss_matched_attendance = $Missmatched_attendance;
        $CTC_till_month = 0;
        $Status = 'Open';
        $inputDate = strtotime("01-$SalMonth-$SalYear");
        $inputMonthNum = (int)date('n', $inputDate);
        $inputYearNum = (int)date('Y', $inputDate);
        $DeleteQuery = "DELETE FROM indsys1026employeepayrollbonusandctc 
        WHERE Clientid='$Clientid' AND Employeeid='$Employeeid' AND SalMonth='$SalMonth' AND Salyear='$SalYear'";
        if (mysqli_query($conn, $DeleteQuery)) {
            echo "Deleted previous records for $Fullname <br>";
        } else {
            echo "Error deleting records: " . mysqli_error($conn) . "<br>";
        }
        $fiscalBonusStart = ($inputMonthNum >= 10) ? $inputYearNum : ($inputYearNum - 1);
        $Bonus_till_month = getCumulativeTotal($conn, $Clientid, $Employeeid, "Currentmonth_bonus", "10", $SalMonth, $SalYear, $fiscalBonusStart) + $Bonus;

        $fiscalCTCStart = ($inputMonthNum < 4) ? ($inputYearNum - 1) : $inputYearNum;
        $CTC_till_month = getCumulativeTotal($conn, $Clientid, $Employeeid, "Currentmonth_CTC", "04", $SalMonth, $SalYear, $fiscalCTCStart) + $Currentmonth_CTC;

        $sql = "INSERT INTO indsys1026employeepayrollbonusandctc (
            Clientid, Employeeid, SalMonth, Salyear,
            Firstname, Lastname, Fullname,
            Department, Designation, Category,
            Currentmonth_bonus, Bonus_till_month,
            Actual_worked_days, Currentmonth_CTC,
            Miss_matched_attendance, CTC_till_month,
            PF_Employeer_contribution, ESI_Employeer_contribution, Status
        ) VALUES (
            '$Clientid', '$Employeeid', '$SalMonth', '$SalYear',
            '$Firstname', '$Lastname', '$Fullname',
            '$Department', '$Designation', '$Category',
            '$Currentmonth_bonus', '$Bonus_till_month',
            '$Actual_worked_days', '$Currentmonth_CTC',
            '$Miss_matched_attendance', '$CTC_till_month',
            '$PF_Employeer_contribution', '$ESI_Employeer_contribution', '$Status'
        )";


        if (mysqli_query($conn, $sql)) {
        } else {
            echo "$sql <br>";
            echo "Error: " . mysqli_error($conn);
        }
    }
}

$start = new DateTime("2022-01-01");
$end = new DateTime("2025-07-01");

while ($start <= $end) {
    $SalMonth = $start->format("F"); 
    $SalYear = $start->format("Y");  
    echo "Processing CTC and Bonus for $SalMonth $SalYear <br>";

    SaveCTCandBonus($conn, $Clientid, $SalMonth, $SalYear);

    $start->modify("+1 month");
}

