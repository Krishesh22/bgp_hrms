<?php
function CallEmppdatepayroll($conn, $Clientid, $user_id, $date, $Employeeid, $SalMonth, $Salyear, $Workeddays, $Leavedays, $Salary_Advance, $FoodDeduction, $TDS, $Category, $Workingdays, $Nationalholiday, $CL, $BasicDA, $HRA, $Otherallowance_Con_SA, $OT_HRS, $DailyAllowanance, $Performanceallowance,$Dormitory,$Transport) {
    try {
        $EarnedBasics = 0;
        $EarnedHRA = 0;
        $EarnedOtherallowance = 0;
        $PF = 0;
        $ESI = 0;
        $Totaldays = 0;
        $Total_Salary = 0;
        $Lop = 0;
        $Net_Salary = 0;
        $OT_Wages = 0;
        $Leavedays = 0;
        $Earned_Wages = 0;
        $Lophrs = $Lop = 0;
        if (empty($Workeddays)) {
            $Workeddays = 0;
        }
        if (empty($Salary_Advance)) {
            $Salary_Advance = 0;
        }
        if (empty($FoodDeduction)) {
            $FoodDeduction = 0;
        }
        if (empty($BasicDA)) {
            $BasicDA = 0;
        }
        if (empty($HRA)) {
            $HRA = 0;
        }
        if (empty($Otherallowance_Con_SA)) {
            $Otherallowance_Con_SA = 0;
        }
        if (empty($Workingdays)) {
            $Workingdays = 0;
        }
        if (empty($Day_allowance)) {
            $Day_allowance = 0;
        }
        if (empty($Nationalholiday)) {
            $Nationalholiday = 0;
        }
        if (empty($TDS)) {
            $TDS = 0;
        }
        if(empty($Dormitory))
        {
            $Dormitory=0;
        }

        if(empty($Transport))
        {
            $Transport=0;
        }
        $GetChapter = "SELECT * FROM indsys1025pfandesilimitmaster where Clientid ='$Clientid' ";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $PFLimit = $row['PFLimit'];
                $ESILimit = $row['ESILimit'];
                $PFemployeepercentage = $row['PFemployeepercentage'];
                $PFemployeerpercentage = $row['PFemployeerpercentage'];
                $ESIemployeepercentage = $row['ESIemployeepercentage'];
                $ESIemployeerpercentange = $row['ESIemployeerpercentange'];
                $Dailyallowancelimit = $row['Dailyallowancelimit'];
            }
        }
        $GetChapterLOP = "SELECT * FROM indsys1026employeepayrolltempmasterdetail   WHERE Employeeid = '$Employeeid' and SalMonth = '$SalMonth' and  Salyear = '$Salyear' AND Clientid ='$Clientid'";
        $result_Chapter = $conn->query($GetChapterLOP);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Lophrs = $row['Lophrs'];
                $ActualOt_HRSNew = $row['ActualOTHRS'];
            }
        }
        $month_num = date("m", strtotime($SalMonth));
        $year_num = $Salyear;
        $Fromdate = date("01-$month_num-$Salyear");
        $firstmonthstmonthofdate = $Fromdate;
        $Todate = date("t-$month_num-$Salyear", strtotime($Fromdate));
        $monthoflastday = date("$Salyear-$month_num-t", strtotime($Fromdate));
        $monthof1stday = date("$Salyear-$month_num-01");
        $sqlLOP = "SELECT  SUM(HOUR(REPLACE(Lophrs, '.', ':'))*60+MINUTE(REPLACE(Lophrs, '.', ':'))) as LOPHRSNEW  from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$monthof1stday' and Attendencedate <='$monthoflastday' and Employeeid = '$Employeeid'  and Empattendencestatus='Close'";
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
        $GetEmployee = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid='$Employeeid' ";
        $result_Employee = $conn->query($GetEmployee);
        if (mysqli_num_rows($result_Employee) > 0) {
            while ($row = mysqli_fetch_array($result_Employee)) {
                $PF_Yesandno = $row['PF_Yesandno'];
                $PF_Fixed = $row['PF_Fixed'];
                $PFnew = $row['PF'];
                $ESI_Yesandno = $row['ESI_Yesandno'];
                $Dailyallowancelimit = $row['Day_allowance'];
                $ESIOverlimit =$row['ESIOverlimit'];
                if ($Performanceallowance == 0) {
                    $Performanceallowance = $row['Performance_allowance'];
                }
                $date_of_joining = $row['Date_Of_Joing'];
            }
        }
        $Totaldays = $Workeddays + $Nationalholiday;
        $Leavedays = ($Workingdays - $Totaldays);
        $TakenEL = 0;
        $BalanceEL = 0;
        // $Leavedays = ($Workingdays - $Workeddays);
        if ($Workeddays == 0) {
            $Lop = $Leavedays;
            $TakenEL = 0;
            $BalanceEL = 0;
        } else {
            $Lop = Max(($Leavedays - $CL), 0);
        }
        //$Lop=Max(($Leavedays-$CL),0);
        if ($Workeddays == 0) {
            $Totaldays = 0;
        } else {
            $Totaldays = $Workeddays + $Nationalholiday;
        }
        if ($CL > $Leavedays) {
            $TakenEL = $Leavedays;
            $BalanceEL = $CL - $TakenEL;
        } else {
            $TakenEL = $CL;
            $BalanceEL = 0;
        }
        if ($Leavedays == 0) {
            $TakenEL = 0;
            $BalanceEL = $CL;
        }
        //echo("test $Workeddays+$Nationalholiday");
        //Totalsalary=Basics+HRA+DA
        $Total_Salary = $BasicDA + $HRA + $Otherallowance_Con_SA + $Performanceallowance;
        $Total_Salary2 = $BasicDA + $HRA + $Otherallowance_Con_SA;
        $date = date("Y-m-d H:i:s");
        $date1 = new DateTime($date_of_joining);
        $date2 = new DateTime($monthoflastday);
        $dateofjoingdays = $date2->diff($date1)->format("%a");
        $dateofjoingdays = $dateofjoingdays + 1;
        $earlier = new DateTime($monthof1stday);
        $later = new DateTime($monthoflastday);
        $abs_diff = $later->diff($earlier)->format("%a");
        $abs_diff = $abs_diff + 1;
        if ($dateofjoingdays <= $abs_diff) {
            //echo "$Employeeid<br/>";
            if ($monthof1stday == $date_of_joining) {
                $EarnedBasics = $BasicDA - (($BasicDA / 26) * $Lop);
                //EarnedHRA = HRA-(HRA/Workingdays)*Lossofpay
                $EarnedHRA = $HRA - ($HRA / 26) * $Lop;
                //EarnedOA = OA-(OA/Workingdays)*Lossofpay
                $EarnedOtherallowance = $Otherallowance_Con_SA - ($Otherallowance_Con_SA / 26) * $Lop;
            } else {
                $EarnedBasics = ($BasicDA / 26) * $Totaldays;
                //EarnedHRA = HRA-(HRA/Workingdays)*Lossofpay
                $EarnedHRA = ($HRA / 26) * $Totaldays;
                //EarnedOA = OA-(OA/Workingdays)*Lossofpay
                $EarnedOtherallowance = ($Otherallowance_Con_SA / 26) * $Totaldays;
            }
        } else {
            $EarnedBasics = $BasicDA - (($BasicDA / 26) * $Lop);
            //EarnedHRA = HRA-(HRA/Workingdays)*Lossofpay
            $EarnedHRA = $HRA - ($HRA / 26) * $Lop;
            //EarnedOA = OA-(OA/Workingdays)*Lossofpay
            $EarnedOtherallowance = $Otherallowance_Con_SA - ($Otherallowance_Con_SA / 26) * $Lop;
        }
        //Earnedbasics=Basicda-(Basicda/workingdays)*Lossofpay
        if ($Category == "Category 2") {
            $DailyAllowanance = $Dailyallowancelimit * $Workeddays;
        }
        ////////////////OT_wages = (Totalsalary/Workingdays/8*2*OThours)
        $OT_Wages = ($Total_Salary2 / 26 / 8 * 2 * $OT_HRS);
        $ActualOTWages = 0;
        $Actualnet = 0;
        //Earnedwaged = roundup(Earnedbasics+Earnedhra+EarnedOA+EarnedOTwages,0)
        $Earned_Wages = (round($EarnedBasics) + round($EarnedHRA) + round($EarnedOtherallowance) + round($OT_Wages) + round($DailyAllowanance));
        // $Earned_Wages=roundup($Earned_Wages);
        $Earned_Wages = round($Earned_Wages, 0);
        $pfpercentage = ($PFemployeepercentage / 100);
        $esipercentage = ($ESIemployeepercentage / 100);
        if ($PF_Yesandno == 'Yes' && $PF_Fixed == "Yes") {
            /////////////////PF=(EarnedBasic+EarnedOtherallowance)*12%
            /// $PF =$PFnew;
            if ($Lop == 0) {
                $PF = $PFnew;
                $LOPPF = $PF;
            } else {
                $PF = round((round($EarnedBasics) + round($EarnedOtherallowance)) * $pfpercentage);
                $PF = round($PF, 0);
                $LOPPF = $PF;
            }
            if ($LOPPF > $PFnew) {
                $PF = $PFnew;
            }
        } elseif ($PF_Yesandno == 'Yes' && $PF_Fixed == 'No') {
            // $PF =($Basic+$Other_Allowance)*$pfpercentage;
            // $PF=round($PF,0);
            $PF = round((round($EarnedBasics) + round($EarnedOtherallowance)) * $pfpercentage);
            $PF = round($PF, 0);
            //echo "test $PF $EarnedBasics $EarnedOtherallowance $pfpercentage";
            
        } elseif ($PF_Yesandno == 'Yes' && $PF_Fixed == '') {
            $PF = round((round($EarnedBasics) + round($EarnedOtherallowance)) * $pfpercentage);
            $PF = round($PF, 0);
            //echo "test $PF $EarnedBasics $EarnedOtherallowance $pfpercentage";
            
        } elseif ($PF_Yesandno == 'No') {
            $PF = 0;
        }
      if($ESI_Yesandno =='Yes')
{
  /////////ESI =Roundup(Earnedwages*0.75%,0)
  
// $Esi =round( (round($Earned_Wages)*$esipercentage));
$ESI=0;

$Earnegwagesperformance = $Earned_Wages+$Performanceallowance;
if($ESIOverlimit=="Yes")
{
  $Esi = ($Earnegwagesperformance)*$esipercentage;
$ESI=ceil($Esi);

}
else
{
if($Earnegwagesperformance<=21000)
{
$Esi = ($Earnegwagesperformance)*$esipercentage;
$ESI=ceil($Esi);
}
}


// $ESI = round($ESI,0);
}
else
{
  $ESI=0;
}

        if ($Category == "Category 3") {
            $Lophrscal = $Lophrs;
            $Lophrsconverted = floor($Lophrscal);
            $Lopminutes = substr($Lophrscal, -2);
            $Lophrsresult = $Lophrsconverted * 60;
            $lopdeduction = $Lophrsresult + $Lopminutes;
            $Lopwages = ($Total_Salary2 / 26 / 8 / 60) * $lopdeduction;
            $Lopwages = round($Lopwages);
            $ActualOTWages = round(($Total_Salary2 / 26 / 8 * 2 * $ActualOt_HRSNew));
        } else {
            $Lopwages = 0;
            $Lophrs = 0;
            $ActualOTWages = 0;
            $ActualOt_HRSNew = 0;
        }
        if ($Workeddays == 0) {
            $Lopwages = 0;
            $Lophrs = 0;
            $ActualOTWages = 0;
            $ESI = 0;
            $PF = 0;
            $Total_Salary = 0;
            $TakenEL = 0;
            $BalanceEL = 0;
            //Earnedbasics=Basicda-(Basicda/workingdays)*Lossofpay
            $EarnedBasics = 0;
            //EarnedHRA = HRA-(HRA/Workingdays)*Lossofpay
            $EarnedHRA = 0;
            //EarnedOA = OA-(OA/Workingdays)*Lossofpay
            $EarnedOtherallowance = 0;
            $OT_Wages = 0;
            $ActualOTWages = 0;
            $Actualnet = 0;
            //Earnedwaged = roundup(Earnedbasics+Earnedhra+EarnedOA+EarnedOTwages,0)
            $Earned_Wages = 0;
            $Performanceallowance = 0;
        }
        /////////Totaldeduction=PF+ESI+Advance+Deduction+TDS
        $Totaldeduction = round($Salary_Advance) + round($FoodDeduction) + round($PF) + round($ESI) + round($TDS) + round($Lopwages)+round($Dormitory)+round($Transport);
        ////NetWages= Earnedwages-Totaldeduction
        $Net_Salary = $Earned_Wages - $Totaldeduction;
        $Actualnet = ($Earned_Wages + $ActualOTWages) - $Totaldeduction;
        $resultExists = "Update indsys1026employeepayrolltempmasterdetail set 
Leavedays ='$Leavedays',
Nationalholidays = '$Nationalholiday',
LOP ='$Lop',
Totaldays='$Totaldays',
TotalSal ='$Total_Salary',
EarnedBasic='$EarnedBasics',
EarnedHRA ='$EarnedHRA',
EarnedOtherallowance_Con_SA ='$EarnedOtherallowance',
EarnedWages='$Earned_Wages',
PF ='$PF',
ESI='$ESI',
Salary_Advance ='$Salary_Advance',
FoodDeduction ='$FoodDeduction',
TotalDeduction='$Totaldeduction',
NetWages ='$Net_Salary',
DailyAllowanance='$DailyAllowanance',
TDS='$TDS',
OT_HRS ='$OT_HRS',
OT_Wages='$OT_Wages',
TakenEL ='$TakenEL',
BalanceEL='$BalanceEL',
Workeddays='$Workeddays',
Performanceallowance='$Performanceallowance',
Workingdays='$Workingdays',
Addormodifydatetime ='$date',
Lophrs='$Lophrs',
Lopwages='$Lopwages',
ActualOTHRS='$ActualOt_HRSNew',
ActualOTWages='$ActualOTWages',
Actualnet='$Actualnet',
Dormitory='$Dormitory',
Transport='$Transport',

Userid ='$user_id'
   WHERE Employeeid = '$Employeeid' and SalMonth = '$SalMonth' and  Salyear = '$Salyear' AND Clientid ='$Clientid' ";
        $resultExists01 = $conn->query($resultExists);
        if ($resultExists01 === TRUE) {
            LoadLeave($conn, $Clientid, $SalMonth, $Salyear,$Employeeid,$CL,$TakenEL,$BalanceEL) ;
            return "Success";
        } else {
            return "Fail";
        }
        $Message = "Exists";
    }
    catch(Exception $e) {
    }
}
function CallEmppdatepayrollBGPDELHI($conn, $Clientid, $user_id, $date, $Employeeid, $SalMonth, $Salyear, $Workeddays, $Leavedays, $Salary_Advance, $FoodDeduction, $TDS, $Category, $Workingdays, $Nationalholiday, $CL, $BasicDA, $HRA, $Otherallowance_Con_SA, $OT_HRS, $DailyAllowanance, $Performanceallowance, $CountAbsent, $Weekoff, $CountSL, $CountCL, $MonthDays, $TA,$Dormitory,$Transport) {
    try {
        $EarnedBasics = 0;
        $EarnedHRA = 0;
        $EarnedOtherallowance = 0;
        $PF = 0;
        $ESI = 0;
        $Totaldays = 0;
        $Total_Salary = 0;
        $Lop = 0;
        $Net_Salary = 0;
        $OT_Wages = 0;
        $Leavedays = 0;
        $Earned_Wages = 0;
        $Lophrs = $Lop = 0;
        


        if (empty($Workeddays)) {
            $Workeddays = 0;
        }
        if (empty($Salary_Advance)) {
            $Salary_Advance = 0;
        }
        if (empty($FoodDeduction)) {
            $FoodDeduction = 0;
        }
        if (empty($BasicDA)) {
            $BasicDA = 0;
        }
        if (empty($HRA)) {
            $HRA = 0;
        }
        if (empty($Otherallowance_Con_SA)) {
            $Otherallowance_Con_SA = 0;
        }
        if (empty($Workingdays)) {
            $Workingdays = 0;
        }
        if (empty($Day_allowance)) {
            $Day_allowance = 0;
        }
        if (empty($Nationalholiday)) {
            $Nationalholiday = 0;
        }
        if (empty($TDS)) {
            $TDS = 0;
        }
        if(empty($CountAbsent))
        {
          $CountAbsent=0;
        }
        if(empty($Weekoff))
        {
          $Weekoff=0;
        }
        if(empty($CountSL))
        {
          $CountSL=0;
        }
        if(empty($CountCL))
        {
          $CountCL=0;
        }
        if(empty($TotalDays))
        {
          $TotalDays=0;
        }

        if(empty($Dormitory))
        {
            $Dormitory=0;
        }
        if(empty($Transport))
        {
            $Transport=0;
        }
    
        $GetChapter = "SELECT * FROM indsys1025pfandesilimitmaster where Clientid ='$Clientid' ";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $PFLimit = $row['PFLimit'];
                $ESILimit = $row['ESILimit'];
                $PFemployeepercentage = $row['PFemployeepercentage'];
                $PFemployeerpercentage = $row['PFemployeerpercentage'];
                $ESIemployeepercentage = $row['ESIemployeepercentage'];
                $ESIemployeerpercentange = $row['ESIemployeerpercentange'];
                $Dailyallowancelimit = $row['Dailyallowancelimit'];
            }
        }
        $GetChapterLOP = "SELECT * FROM indsys1026employeepayrolltempmasterdetail   WHERE Employeeid = '$Employeeid' and SalMonth = '$SalMonth' and  Salyear = '$Salyear' AND Clientid ='$Clientid'";
        $result_Chapter = $conn->query($GetChapterLOP);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Lophrs = $row['Lophrs'];
                $ActualOt_HRSNew = $row['ActualOTHRS'];
            }
        }
        $month_num = date("m", strtotime($SalMonth));
        $year_num = $Salyear;
        $Fromdate = date("01-$month_num-$Salyear");
        $firstmonthstmonthofdate = $Fromdate;
        $Todate = date("t-$month_num-$Salyear", strtotime($Fromdate));
        $monthoflastday = date("$Salyear-$month_num-t", strtotime($Fromdate));
        $monthof1stday = date("$Salyear-$month_num-01");
        $sqlLOP = "SELECT  SUM(HOUR(REPLACE(Lophrs, '.', ':'))*60+MINUTE(REPLACE(Lophrs, '.', ':'))) as LOPHRSNEW  from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$monthof1stday' and Attendencedate <='$monthoflastday' and Employeeid = '$Employeeid'  and Empattendencestatus='Close'";
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
        $GetEmployee = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid='$Employeeid' ";
        $result_Employee = $conn->query($GetEmployee);
        if (mysqli_num_rows($result_Employee) > 0) {
            while ($row = mysqli_fetch_array($result_Employee)) {
                $PF_Yesandno = $row['PF_Yesandno'];
                $PF_Fixed = $row['PF_Fixed'];
                $PFnew = $row['PF'];
                $ESI_Yesandno = $row['ESI_Yesandno'];
                $Dailyallowancelimit = $row['Day_allowance'];
                    $ESIOverlimit =$row['ESIOverlimit'];
                if ($Performanceallowance == 0) {
                    $Performanceallowance = $row['Performance_allowance'];
                }
                $date_of_joining = $row['Date_Of_Joing'];
            }
        }
        $Totalpayrolldays = $Workeddays+$CountCL+$CountSL+$Nationalholiday+$Weekoff;

        $Totaldays =   $Totalpayrolldays;

        $Leavedays = ($MonthDays - $Totaldays);
        $TakenEL = 0;
        $BalanceEL = 0;
        // $Leavedays = ($Workingdays - $Workeddays);
 
            $Lop = $Leavedays;
            $TakenEL = 0;
            $BalanceEL = 0;
          
        $Total_Salary = $BasicDA + $HRA + $Otherallowance_Con_SA + $Performanceallowance+$TA;
        $Total_Salary2 = $BasicDA + $HRA + $Otherallowance_Con_SA;
        $date = date("Y-m-d H:i:s");
        $date1 = new DateTime($date_of_joining);
        $date2 = new DateTime($monthoflastday);
        $dateofjoingdays = $date2->diff($date1)->format("%a");
        $dateofjoingdays = $dateofjoingdays + 1;
        $earlier = new DateTime($monthof1stday);
        $later = new DateTime($monthoflastday);
        $abs_diff = $later->diff($earlier)->format("%a");
        $abs_diff = $abs_diff + 1;

        $EarnedBasics = $BasicDA - (($BasicDA / $MonthDays) * $Lop);
        //EarnedHRA = HRA-(HRA/Workingdays)*Lossofpay
        $EarnedHRA = $HRA - ($HRA / $MonthDays) * $Lop;
        //EarnedOA = OA-(OA/Workingdays)*Lossofpay
        $EarnedOtherallowance = $Otherallowance_Con_SA - ($Otherallowance_Con_SA / $MonthDays) * $Lop;
        // if ($dateofjoingdays <= $abs_diff) {
        //     //echo "$Employeeid<br/>";
        //     if ($monthof1stday == $date_of_joining) {
        //         $EarnedBasics = $BasicDA - (($BasicDA / 26) * $Lop);
        //         //EarnedHRA = HRA-(HRA/Workingdays)*Lossofpay
        //         $EarnedHRA = $HRA - ($HRA / 26) * $Lop;
        //         //EarnedOA = OA-(OA/Workingdays)*Lossofpay
        //         $EarnedOtherallowance = $Otherallowance_Con_SA - ($Otherallowance_Con_SA / 26) * $Lop;
        //     } else {
        //         $EarnedBasics = ($BasicDA / 26) * $Workeddays;
        //         //EarnedHRA = HRA-(HRA/Workingdays)*Lossofpay
        //         $EarnedHRA = ($HRA / 26) * $Workeddays;
        //         //EarnedOA = OA-(OA/Workingdays)*Lossofpay
        //         $EarnedOtherallowance = ($Otherallowance_Con_SA / 26) * $Workeddays;
        //     }
        // } else {
        //     $EarnedBasics = $BasicDA - (($BasicDA / 26) * $Lop);
        //     //EarnedHRA = HRA-(HRA/Workingdays)*Lossofpay
        //     $EarnedHRA = $HRA - ($HRA / 26) * $Lop;
        //     //EarnedOA = OA-(OA/Workingdays)*Lossofpay
        //     $EarnedOtherallowance = $Otherallowance_Con_SA - ($Otherallowance_Con_SA / 26) * $Lop;
        // }
        //Earnedbasics=Basicda-(Basicda/workingdays)*Lossofpay
        if ($Category == "Category 2") {
            $DailyAllowanance = $Dailyallowancelimit * $Workeddays;
        }
        ////////////////OT_wages = (Totalsalary/Workingdays/8*2*OThours)
        $OT_Wages = ($Total_Salary2 / 26 / 8 * 2 * $OT_HRS);
        $ActualOTWages = 0;
        $Actualnet = 0;

        if($TA ==0)
{
    $EarnedConveyence = 0;
}
else
{
    $EarnedConveyence=round(($TA/$MonthDays)*$Lop);
}
        //Earnedwaged = roundup(Earnedbasics+Earnedhra+EarnedOA+EarnedOTwages,0)
        $Earned_Wages = (round($EarnedBasics) + round($EarnedHRA) + round($EarnedOtherallowance) + round($OT_Wages) + round($DailyAllowanance)+round($EarnedConveyence));
        // $Earned_Wages=roundup($Earned_Wages);
        $Earned_Wages = round($Earned_Wages, 0);
        $pfpercentage = ($PFemployeepercentage / 100);
        $esipercentage = ($ESIemployeepercentage / 100);
        if ($PF_Yesandno == 'Yes' && $PF_Fixed == "Yes") {
            /////////////////PF=(EarnedBasic+EarnedOtherallowance)*12%
            /// $PF =$PFnew;
            if ($Lop == 0) {
                $PF = $PFnew;
                $LOPPF = $PF;
            } else {
                $PF = round((round($EarnedBasics) + round($EarnedOtherallowance)) * $pfpercentage);
                $PF = round($PF, 0);
                $LOPPF = $PF;
            }
            if ($LOPPF > $PFnew) {
                $PF = $PFnew;
            }
        } elseif ($PF_Yesandno == 'Yes' && $PF_Fixed == 'No') {
            // $PF =($Basic+$Other_Allowance)*$pfpercentage;
            // $PF=round($PF,0);
            $PF = round((round($EarnedBasics) + round($EarnedOtherallowance)) * $pfpercentage);
            $PF = round($PF, 0);
            //echo "test $PF $EarnedBasics $EarnedOtherallowance $pfpercentage";
            
        } elseif ($PF_Yesandno == 'Yes' && $PF_Fixed == '') {
            $PF = round((round($EarnedBasics) + round($EarnedOtherallowance)) * $pfpercentage);
            $PF = round($PF, 0);
            //echo "test $PF $EarnedBasics $EarnedOtherallowance $pfpercentage";
            
        } elseif ($PF_Yesandno == 'No') {
            $PF = 0;
        }
     if($ESI_Yesandno =='Yes')
{
  /////////ESI =Roundup(Earnedwages*0.75%,0)
  
// $Esi =round( (round($Earned_Wages)*$esipercentage));
$ESI=0;

$Earnegwagesperformance = $Earned_Wages+$Performanceallowance;
if($ESIOverlimit=="Yes")
{
  $Esi = ($Earnegwagesperformance)*$esipercentage;
$ESI=ceil($Esi);

}
else
{
if($Earnegwagesperformance<=21000)
{
$Esi = ($Earnegwagesperformance)*$esipercentage;
$ESI=ceil($Esi);
}
}


// $ESI = round($ESI,0);
}
else
{
  $ESI=0;
}

        if ($Category == "Category 3") {
            $Lophrscal = $Lophrs;
            $Lophrsconverted = floor($Lophrscal);
            $Lopminutes = substr($Lophrscal, -2);
            $Lophrsresult = $Lophrsconverted * 60;
            $lopdeduction = $Lophrsresult + $Lopminutes;
            $Lopwages = ($Total_Salary2 / 26 / 8 / 60) * $lopdeduction;
            $Lopwages = round($Lopwages);
            $ActualOTWages = round(($Total_Salary2 / 26 / 8 * 2 * $ActualOt_HRSNew));
        } else {
            $Lopwages = 0;
            $Lophrs = 0;
            $ActualOTWages = 0;
            $ActualOt_HRSNew = 0;
        }
        if ($Workeddays == 0) {
            $Lopwages = 0;
            $Lophrs = 0;
            $ActualOTWages = 0;
            $ESI = 0;
            $PF = 0;
            $Total_Salary = 0;
            $TakenEL = 0;
            $BalanceEL = 0;
            //Earnedbasics=Basicda-(Basicda/workingdays)*Lossofpay
            $EarnedBasics = 0;
            //EarnedHRA = HRA-(HRA/Workingdays)*Lossofpay
            $EarnedHRA = 0;
            //EarnedOA = OA-(OA/Workingdays)*Lossofpay
            $EarnedOtherallowance = 0;
            $OT_Wages = 0;
            $ActualOTWages = 0;
            $Actualnet = 0;
            //Earnedwaged = roundup(Earnedbasics+Earnedhra+EarnedOA+EarnedOTwages,0)
            $Earned_Wages = 0;
            $Performanceallowance = 0;
        }
        $LWF = $Earned_Wages*(0.2/100);

  if($LWF>25)
  {
    $LWF = 25;
  }

  if(empty($LWF))
  {
    $LWF=0;
  }

  
        /////////Totaldeduction=PF+ESI+Advance+Deduction+TDS
$Totaldeduction = round($Salary_Advance) + round($FoodDeduction) + round($PF) + round($ESI) + round($TDS) + round($Lopwages)+round($LWF)+round($Dormitory)+round($Transport);
        ////NetWages= Earnedwages-Totaldeduction
$Net_Salary = $Earned_Wages - $Totaldeduction;
$Actualnet = ($Earned_Wages + $ActualOTWages) - $Totaldeduction;
$resultExists = "Update indsys1026employeepayrolltempmasterdetail set 
Leavedays ='$Leavedays',
Nationalholidays = '$Nationalholiday',
LOP ='$Lop',
Totaldays='$Totaldays',
TotalSal ='$Total_Salary',
EarnedBasic='$EarnedBasics',
EarnedHRA ='$EarnedHRA',
EarnedOtherallowance_Con_SA ='$EarnedOtherallowance',
EarnedWages='$Earned_Wages',
PF ='$PF',
ESI='$ESI',
Salary_Advance ='$Salary_Advance',
FoodDeduction ='$FoodDeduction',
TotalDeduction='$Totaldeduction',
NetWages ='$Net_Salary',
DailyAllowanance='$DailyAllowanance',
TDS='$TDS',
OT_HRS ='$OT_HRS',
OT_Wages='$OT_Wages',
TakenEL ='$TakenEL',
BalanceEL='$BalanceEL',
Workeddays='$Workeddays',
Performanceallowance='$Performanceallowance',
Workingdays='$Workingdays',
Addormodifydatetime ='$date',
Lophrs='$Lophrs',
Lopwages='$Lopwages',
ActualOTHRS='$ActualOt_HRSNew',
ActualOTWages='$ActualOTWages',
Actualnet='$Actualnet',
LWF='$LWF',
EarnedConveyence='$EarnedConveyence',
Dormitory='$Dormitory',
Transport='$Transport',
Userid ='$user_id'
   WHERE Employeeid = '$Employeeid' and SalMonth = '$SalMonth' and  Salyear = '$Salyear' AND Clientid ='$Clientid' ";
        $resultExists01 = $conn->query($resultExists);
        if ($resultExists01 === TRUE) {
            return "Success";
        } else {
           
            return "Fail";
          
        }
        $Message = "Exists";
    }
    catch(Exception $e) {
    }
}
function roundup($float, $dec = 2) {
    if ($dec == 0) {
        if ($float < 0) {
            return floor($float);
        } else {
            return ceil($float);
        }
    } else {
        $d = pow(10, $dec);
        if ($float < 0) {
            return floor($float * $d) / $d;
        } else {
            return ceil($float * $d) / $d;
        }
    }
}

function LoadLeave($conn, $Clientid, $Payrollmonth, $Payrollyear,$Employeeid,$CL,$TakenCL,$BalanceCL) 
{
    $Currentyear = $Payrollyear;
    $Previousyear = $Currentyear - 1;
    $month_num = date("m", strtotime($Payrollmonth));
   
    if ($month_num > 10) {
        $Currentyear = date("Y");
        $Currentyear = $Currentyear + 1;
        $Previousyear = $Currentyear - 1;
        $Payrollyear = $Currentyear;
    }
    $Fromdate = date("01-$month_num-$Payrollyear");
    $Todate = date("t-$month_num-$Payrollyear", strtotime($Fromdate));
    $monthof1stday = date("$Payrollyear-$month_num-01");
    $monthoflastday = date("$Payrollyear-$month_num-t", strtotime($Fromdate));
    $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active' and Employeeid='$Employeeid'  ORDER BY Employeeid ASC";
    $logempall = mysqli_query($conn, $logemp);
    while ($rowEmployee = mysqli_fetch_array($logempall)) {
        $Performanceallowance = 0;
        $Employeeid = $rowEmployee["Employeeid"];
        $date_of_joining = $rowEmployee["Date_Of_Joing"];
        $date = strtotime($date_of_joining);
        $Empjoinmonth = date("m", $date);
        $Empjoinyear = date("Y", $date);
        $Empjoinday = date("d", $date);
        ///////////////Fetching Transaction month ////////////////
        $logEmpLeave = "Select * from indsys1034transactionmonth where TransactionMonthno='$Empjoinmonth'";
        $logEmpexecute = mysqli_query($conn, $logEmpLeave);
        while ($rowEmptransaction = mysqli_fetch_assoc($logEmpexecute)) {
            $Currentyearleave = $rowEmptransaction["Currentyear"];
            $Previousyearleave = $rowEmptransaction["Previousyear"];
            $Transactionmonthadded = $rowEmptransaction["Transactionmonthadded"];
        }
        $newjoinee = "No";
        $currentDate = date("Y-m-d");
        $joinDate = date("Y-m-d", strtotime($date_of_joining));
        $diffMonths = (date("Y", strtotime($Todate)) - date("Y", strtotime($joinDate))) * 12;
        $diffMonths+= date("m", strtotime($Todate)) - date("m", strtotime($joinDate));
        $Calculatedmonths =12;
      
            $newjoinee = "Yes";
            $date1 = new DateTime($date_of_joining);
            /////////For payroll check the given month///////////
            $date2 = new DateTime($monthoflastday);
            $dateofjoingdays = $date2->diff($date1)->format("%a");
            $dateofjoingdays = $dateofjoingdays + 1;
            $earlier = new DateTime($monthof1stday);
            $later = new DateTime($monthoflastday);
            $abs_diff = $later->diff($earlier)->format("%a");
            $abs_diff = $abs_diff + 1;
            if ($dateofjoingdays <= $abs_diff) {
                if ($monthof1stday == $date_of_joining) {
                    $Calculatedmonths = 12 - $Transactionmonthadded;
                } else {
                    $trans = $Transactionmonthadded - 1;
                    $Calculatedmonths = 11 - $Transactionmonthadded;
                }
            } 
          
            $TotalLeaves = 1.5 * $Calculatedmonths;

            $Transactiondate="$Payrollyear-$month_num-01";
            SaveMonthLeave($conn, $Clientid, $Employeeid, $month_num,$Payrollyear, $CL,$TakenCL,$Transactiondate);

            SaveLeaveMaster($conn, $Clientid, $Employeeid, $Currentyear, $Previousyear, $TotalLeaves,$month_num);

            getTransactionmonthleavebalance($conn, $Clientid, $Employeeid, $Currentyear, $Previousyear, $month_num, $Payrollyear);
    }
    }
    function SaveLeaveMaster($conn, $Clientid, $Employeeid, $Currentyear, $Previousyear, $TotalLeave,$month_num) {
        try {
            $TotalLeaveeligable = $TotalLeave;
            $BalanceLeave = 0;
            $Takenleave = 0;
            $Fromdate = "$Previousyear-10-01";
            $Todate = "$Currentyear-$month_num-01";
            $UpdateSum = "SELECT SUM(TakenLeave) as TakenLeave FROM indsys1035employeetransactionmonthleave WHERE Employeeid= '$Employeeid' AND Transactionmonthdate >='$Fromdate' AND Transactionmonthdate<='$Todate' ";
            $Takenleaveexecute = mysqli_query($conn, $UpdateSum);
            while ($rowOD = mysqli_fetch_array($Takenleaveexecute)) {
                $Takenleave = $rowOD['TakenLeave'];

                // $Workeddays=roundup($Workeddays);
                // $Workeddays=round($Workeddays,0);
                
            }
            $BalanceLeave = $TotalLeaveeligable - $Takenleave;
            $resultExists = "SELECT * FROM indsys1035employeetransactionyearleave WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' AND Fromtransactionyear ='$Previousyear' AND Totransactionyear='$Currentyear' LIMIT 1";
            $resultExists01 = $conn->query($resultExists);
            if ($rowleavemas = mysqli_fetch_row($resultExists01)) {
                // $TotalLeaveeligable = $rowleavemas['TotalLeaveeligable'];
                // $BalanceLeave = $TotalLeaveeligable - $Takenleave;

                // $UpdateQuery="UPDATE indsys1035employeetransactionyearleave SET TotalLeaveeligable='$TotalLeaveeligable'
                // WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' AND Fromtransactionyear ='$Previousyear' AND Totransactionyear='$Currentyear'";

                // $updatequeryexcute=mysqli_query($conn,$UpdateQuery);
                $Message = "Exists";
            } else {
                $SaveEmployee = "INSERT INTO indsys1035employeetransactionyearleave(Clientid,Employeeid,Fromtransactionyear,Totransactionyear,TotalLeaveeligable,TakenLeave,BalanceLeave)
    VALUES('$Clientid','$Employeeid','$Previousyear','$Currentyear','$TotalLeave','$Takenleave','$BalanceLeave')";
                $Saved = mysqli_query($conn, $SaveEmployee);
                if ($Saved === true) {
                } else {
                    echo "$SaveEmployee<br>;";
                }
            }
        }
        catch(Exception $e) {
        }
    }
    function SaveMonthLeave($conn, $Clientid, $Employeeid, $Transactionmonthno, $Transactionyear, $CL, $TakenCL,  $Transactiondate) {
        try {
            
            $BalanceCL = $CL - $TakenCL;


            $resultExists = "SELECT * FROM indsys1035employeetransactionmonthleave WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' AND Transactionmonthno ='$Transactionmonthno' AND Transactionyear='$Transactionyear' LIMIT 1";
            $resultExists01 = $conn->query($resultExists);
            if (mysqli_fetch_row($resultExists01)) {
                $UpdateLeave="UPDATE indsys1035employeetransactionmonthleave
                 SET TotalLeaveeligable='$CL',
                 TakenLeave='$TakenCL',
                 BalanceLeave='$BalanceCL'
                 WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' AND Transactionmonthno ='$Transactionmonthno' AND Transactionyear='$Transactionyear'";
                 $executeupdateLeave = mysqli_query($conn,$UpdateLeave);
                 if($executeupdateLeave===TRUE)
                 {

                 }
            } else {
                $SaveEmployee = "INSERT INTO indsys1035employeetransactionmonthleave(Clientid,Employeeid,Transactionmonthno,Transactionyear,TotalLeaveeligable,TakenLeave,BalanceLeave,Transactionmonthdate)
    VALUES('$Clientid','$Employeeid','$Transactionmonthno','$Transactionyear','$CL','$TakenCL','$BalanceCL','$Transactiondate')";
                $Saved = mysqli_query($conn, $SaveEmployee);
                if ($Saved === true) {
                    // echo "$SaveEmployee<br>;";
                    
                } else {
                    echo "$SaveEmployee<br>;";
                }
            }
        }
        catch(Exception $e) {
        }
    }



    function getTransactionmonthleavebalance($conn, $Clientid, $Employeeid, $Currentyear, $Previousyear, $Transactionmonthno, $Transactionyear)
 {
    try {
        $Fromdate = "$Previousyear-10-01";
        $Todate = "$Currentyear-$Transactionmonthno-01";
        $UpdateSum = "SELECT SUM(TakenLeave) as TakenLeave FROM indsys1035employeetransactionmonthleave WHERE Employeeid= '$Employeeid' AND Transactionmonthdate >='$Fromdate' AND Transactionmonthdate<='$Todate'  AND Clientid ='$Clientid'";
        $Takenleaveexecute = mysqli_query($conn, $UpdateSum);
        while ($rowOD = mysqli_fetch_array($Takenleaveexecute)) {
            $Takenleave = $rowOD['TakenLeave'];
        }
        $resultExists = "SELECT * FROM indsys1035employeetransactionyearleave WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' AND Fromtransactionyear ='$Previousyear' AND Totransactionyear='$Currentyear' LIMIT 1";
        $resultExists01 = $conn->query($resultExists);
        if ($rowleavemas = mysqli_fetch_array($resultExists01)) {
            $TotalLeaveeligable = $rowleavemas['TotalLeaveeligable'];
        }
        $BalanceLeave = $TotalLeaveeligable - $Takenleave;
        $UpdateLeave = "UPDATE indsys1035employeetransactionmonthleave SET                
                Currentmonthbalance='$BalanceLeave'
                 WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' AND Transactionmonthno ='$Transactionmonthno' AND Transactionyear='$Transactionyear'";
        $executeupdateLeave = mysqli_query($conn, $UpdateLeave);
     
    }
    catch(Exception $e) {
      return $e;
    }
}

?>