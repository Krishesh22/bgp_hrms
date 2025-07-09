<?php
function CallEmppdatepayroll($conn, $Clientid, $user_id, $date, $Employeeid, $SalMonth, $Salyear, $Workeddays, $Leavedays, $Salary_Advance, $FoodDeduction, $TDS, $Category, $Workingdays, $Nationalholiday, $CL, $BasicDA, $HRA, $Otherallowance_Con_SA, $OT_HRS, $DailyAllowanance, $Performanceallowance, $Dormitory, $Transport)
{
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
        if (empty($Dormitory)) {
            $Dormitory = 0;
        }

        if (empty($Transport)) {
            $Transport = 0;
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
                $NH_Sunday=$row['Holiday_count'];
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
            $Lophrs = substr(str_replace(':', '.', $Lophrs), 0, 5);;
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
                $ESIOverlimit = $row['ESIOverlimit'];

                $Performanceallowance = $row['Performance_allowance'];

                $date_of_joining = $row['Date_Of_Joing'];
            }
        }
        $Totaldays = $Workeddays + $Nationalholiday;
        $Leavedays = ($Workingdays - $Totaldays);
        $TakenEL = 0;
        $BalanceEL = 0;        
        if ($Workeddays == 0) {
            $Lop = $Leavedays;
            $TakenEL = 0;
            $BalanceEL = 0;
        } else {
            $Lop = Max(($Leavedays - $CL), 0);
        }
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
    
        $Total_Salary = $BasicDA + $HRA + $Otherallowance_Con_SA + $Performanceallowance;
        $Total_Salary2 = $BasicDA + $HRA + $Otherallowance_Con_SA;
        $BasicDA_Day=$BasicDA/26;
        $HRA_Day=$HRA/26;
        $Otherallowance_Con_SA_day=$Otherallowance_Con_SA/26;
        $Wages_perday=$Total_Salary2/26;
        $NH_pf =0;
        $NH_esi=0;
        $NH_deduction=0;
        $NH_net=0;
        
        $Total_per_day=$BasicDA_Day+$HRA_Day+$Otherallowance_Con_SA_day;
      
        $NH_pay=round($Wages_perday)*$NH_Sunday;
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
            if ($monthof1stday == $date_of_joining) {
                $EarnedBasics = $BasicDA - (($BasicDA / 26) * $Lop);              
                $EarnedHRA = $HRA - ($HRA / 26) * $Lop;               
                $EarnedOtherallowance = $Otherallowance_Con_SA - ($Otherallowance_Con_SA / 26) * $Lop;
            } else {
                $EarnedBasics = ($BasicDA / 26) * $Totaldays;              
                $EarnedHRA = ($HRA / 26) * $Totaldays;                
                $EarnedOtherallowance = ($Otherallowance_Con_SA / 26) * $Totaldays;
            }
        } else {
            $EarnedBasics = $BasicDA - (($BasicDA / 26) * $Lop);           
            $EarnedHRA = $HRA - ($HRA / 26) * $Lop;           
            $EarnedOtherallowance = $Otherallowance_Con_SA - ($Otherallowance_Con_SA / 26) * $Lop;
        }
        if ($Category == "Category 2") {
            $DailyAllowanance = $Dailyallowancelimit * $Workeddays;
        }
        list($integerPart, $fractionalPart) = explode(".", $OT_HRS);
        $hours = $integerPart;
        $minutes = $fractionalPart;
        $totalMinutes = ($hours * 60) + $minutes;
        $OT_Wages = ($Total_Salary2 / 26 / 8 / 60 * 2 * $totalMinutes);
        $ActualOTWages = 0;
        $Actualnet = 0;       
        $Earned_Wages = (round($EarnedBasics) + round($EarnedHRA) + round($EarnedOtherallowance) + round($OT_Wages) + round($DailyAllowanance));
        $Earned_Wages = round($Earned_Wages, 0);
        $pfpercentage = ($PFemployeepercentage / 100);
        $esipercentage = ($ESIemployeepercentage / 100);
        if ($PF_Yesandno == 'Yes' && $PF_Fixed == "Yes") {
            if ($Lop == 0) {
                $PF = $PFnew;
                $LOPPF = $PF;
                $NH_pf=0;
            } else {
                $PF = round((round($EarnedBasics) + round($EarnedOtherallowance)) * $pfpercentage);
                $PF = round($PF, 0);
                $LOPPF = $PF;
<<<<<<< HEAD
                
=======
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
                $NH_pf=round((round($BasicDA_Day)*$NH_Sunday + round($Otherallowance_Con_SA_day)*$NH_Sunday)*$pfpercentage);
                $NH_pf = round($NH_pf, 0);
            }
            if ($LOPPF > $PFnew) {
                $PF = $PFnew;
            }
        } elseif ($PF_Yesandno == 'Yes' && $PF_Fixed == 'No') {
           
            $PF = round((round($EarnedBasics) + round($EarnedOtherallowance)) * $pfpercentage);
            $PF = round($PF, 0);
            $NH_pf=round((round($BasicDA_Day)*$NH_Sunday + round($Otherallowance_Con_SA_day)*$NH_Sunday)*$pfpercentage);
            $NH_pf = round($NH_pf, 0);
            //echo "test $PF $EarnedBasics $EarnedOtherallowance $pfpercentage";

        } elseif ($PF_Yesandno == 'Yes' && $PF_Fixed == '') {
            $PF = round((round($EarnedBasics) + round($EarnedOtherallowance)) * $pfpercentage);
            $PF = round($PF, 0);
            $NH_pf=round((round($BasicDA_Day)*$NH_Sunday + round($Otherallowance_Con_SA_day)*$NH_Sunday)*$pfpercentage);
            $NH_pf = round($NH_pf, 0);
         
        } elseif ($PF_Yesandno == 'No') {
            $PF = 0;
        }
        if ($ESI_Yesandno == 'Yes') {
             $ESI = 0;

            $Earnegwagesperformance = $Earned_Wages + $Performanceallowance;
            if ($ESIOverlimit == "Yes") {
                $Esi = ($Earnegwagesperformance) * $esipercentage;
                $ESI = ceil($Esi);
                $NH_esi=($Wages_perday*$NH_Sunday)*$esipercentage;
                $NH_esi=ceil($NH_esi);

            } else {
                if ($Earnegwagesperformance <= 21000) {
                    $Esi = ($Earnegwagesperformance) * $esipercentage;
                    $ESI = ceil($Esi);
                    $NH_esi=($Wages_perday*$NH_Sunday)*$esipercentage;
                    $NH_esi=ceil($NH_esi);
                }
            }


            // $ESI = round($ESI,0);
        } else {
            $ESI = 0;
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
        $NH_deduction=round($NH_esi+$NH_pf);
        $NH_net=round($NH_pay-$NH_deduction);
        if ($Workeddays == 0) {
            $Lopwages = 0;
            $Lophrs = 0;
            $ActualOTWages = 0;
            $ESI = 0;
            $PF = 0;
            $Total_Salary = 0;
            $TakenEL = 0;
            $BalanceEL = 0;           
            $EarnedBasics = 0;           
            $EarnedHRA = 0; 
            $EarnedOtherallowance = 0;
            $OT_Wages = 0;
            $ActualOTWages = 0;
            $Actualnet = 0;            
            $Earned_Wages = 0;
            $Performanceallowance = 0;
            $NH_pf =0;
            $NH_esi=0;
            $NH_deduction=0;
            $NH_net=0;
            $NH_pay=0;

        }
 
        /////////Totaldeduction=PF+ESI+Advance+Deduction+TDS
        $Totaldeduction = round($Salary_Advance) + round($FoodDeduction) + round($PF) + round($ESI) + round($TDS) + round($Lopwages) + round($Dormitory) + round($Transport);
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
        Holiday_pay='$NH_pay',
        Holiday_pf='$NH_pf',
        Holiday_esi='$NH_esi',
        Holiday_deduction='$NH_deduction',
        Holiday_net='$NH_net',
        Userid ='$user_id'
        WHERE Employeeid = '$Employeeid' and SalMonth = '$SalMonth' and  Salyear = '$Salyear' AND Clientid ='$Clientid' ";
        $resultExists01 = $conn->query($resultExists);
        if ($resultExists01 === TRUE) {
            LoadLeave($conn, $Clientid, $SalMonth, $Salyear, $Employeeid, $CL, $TakenEL, $BalanceEL);
<<<<<<< HEAD
            SaveCTCandBonus($conn, $Clientid, $SalMonth, $Salyear,$Employeeid);
=======
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
            return "Success";
        } else {
          
            return "Fail";
        }
        $Message = "Exists";
    } catch (Exception $e) {
    }
}
function CallEmppdatepayrollBGPDELHI($conn, $Clientid, $user_id, $date, $Employeeid, $SalMonth, $Salyear, $Workeddays, $Leavedays, $Salary_Advance, $FoodDeduction, $TDS, $Category, $Workingdays, $Nationalholiday, $CL, $BasicDA, $HRA, $Otherallowance_Con_SA, $OT_HRS, $DailyAllowanance, $Performanceallowance, $CountAbsent, $Weekoff, $CountSL, $CountCL, $MonthDays, $TA, $Dormitory, $Transport)
{
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
        if (empty($CountAbsent)) {
            $CountAbsent = 0;
        }
        if (empty($Weekoff)) {
            $Weekoff = 0;
        }
        if (empty($CountSL)) {
            $CountSL = 0;
        }
        if (empty($CountCL)) {
            $CountCL = 0;
        }
        if (empty($TotalDays)) {
            $TotalDays = 0;
        }

        if (empty($Dormitory)) {
            $Dormitory = 0;
        }
        if (empty($Transport)) {
            $Transport = 0;
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
                $ESIOverlimit = $row['ESIOverlimit'];

                $Performanceallowance = $row['Performance_allowance'];

                $date_of_joining = $row['Date_Of_Joing'];
                $DayallowanceincludedESI = $row['DayallowanceincludedESI'];
            }
        }
        $Totalpayrolldays = $Workeddays + $CountCL + $CountSL + $Nationalholiday + $Weekoff;

        $Totaldays =   $Totalpayrolldays;

        $Leavedays = ($MonthDays - $Totaldays);
        $TakenEL = 0;
        $BalanceEL = 0;
        // $Leavedays = ($Workingdays - $Workeddays);

        $Lop = $Leavedays;
        $TakenEL = 0;
        $BalanceEL = 0;

        $Total_Salary = $BasicDA + $HRA + $Otherallowance_Con_SA + $Performanceallowance + $TA;
        $Total_SalaryBGP = $BasicDA + $HRA + $Otherallowance_Con_SA + $Performanceallowance + $TA;
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

        $DailyAllowanance = $Dailyallowancelimit * $Workeddays;

        ////////////////OT_wages = (Totalsalary/Workingdays/8*2*OThours)

        list($integerPart, $fractionalPart) = explode(".", $OT_HRS);
        $hours = $integerPart;
        $minutes = $fractionalPart;
        $totalMinutes = ($hours * 60) + $minutes;
        $OT_Wages = ($Total_Salary2 / 26 / 8 / 60 * 2 * $totalMinutes);
        $ActualOTWages = 0;
        $Actualnet = 0;

        if ($TA == 0) {
            $EarnedConveyence = 0;
        } else {
            $EarnedConveyence = round(($TA / $MonthDays) * $Lop);
        }
        //Earnedwaged = roundup(Earnedbasics+Earnedhra+EarnedOA+EarnedOTwages,0)
        $Earned_Wages = (round($EarnedBasics) + round($EarnedHRA) + round($EarnedOtherallowance) + round($OT_Wages) + round($DailyAllowanance) + round($EarnedConveyence));
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
        if ($ESI_Yesandno == 'Yes') {

            $ESI = 0;

            $Earnegwagesperformance = $Earned_Wages + $Performanceallowance;
            if ($DayallowanceincludedESI == 'No') {
                $Earnegwagesperformance = $Earnegwagesperformance - $DailyAllowanance;
            }
            if ($ESIOverlimit == "Yes") {
                $Esi = ($Earnegwagesperformance) * $esipercentage;
                $ESI = ceil($Esi);
            } else {
                if ($Earnegwagesperformance <= 21000) {
                    $Esi = ($Earnegwagesperformance) * $esipercentage;
                    $ESI = ceil($Esi);
                }
            }


            // $ESI = round($ESI,0);
        } else {
            $ESI = 0;
        }



        if ($Category == "Category 3") {
            $Lophrscal = $Lophrs;
            $Lophrsconverted = floor($Lophrscal);
            $Lopminutes = substr($Lophrscal, -2);
            $Lophrsresult = $Lophrsconverted * 60;
            $lopdeduction = $Lophrsresult + $Lopminutes;
            $Lopwages = ($Total_Salary2 / $MonthDays / 8 / 60) * $lopdeduction;
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
        $LWF = round(($Earned_Wages +$Performanceallowance) * (0.2 / 100));

        if ($LWF > 34) {
            $LWF = 34;
        }

        if (empty($LWF)) {
            $LWF = 0;
        }
        ///Lop wages dont want to deducted request from madhaven sir on FEB 27-2025
        $Lopwages = 0;

        /////////Totaldeduction=PF+ESI+Advance+Deduction+TDS
        $Totaldeduction = round($Salary_Advance) + round($FoodDeduction) + round($PF) + round($ESI) + round($TDS) + round($Lopwages) + round($LWF) + round($Dormitory) + round($Transport);
        ////NetWages= Earnedwages-Totaldeduction
        $Net_Salary = $Earned_Wages - $Totaldeduction;
        $Actualnet = ($Earned_Wages + $ActualOTWages) - $Totaldeduction;
        $resultExists = "Update indsys1026employeepayrolltempmasterdetail set 
<<<<<<< HEAD
        Leavedays ='$Leavedays',
        Nationalholidays = '$Nationalholiday',
        LOP ='$Lop',
        Totaldays='$Totaldays',
        TotalSal ='$Total_SalaryBGP',
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
=======
Leavedays ='$Leavedays',
Nationalholidays = '$Nationalholiday',
LOP ='$Lop',
Totaldays='$Totaldays',
TotalSal ='$Total_SalaryBGP',
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
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
   WHERE Employeeid = '$Employeeid' and SalMonth = '$SalMonth' and  Salyear = '$Salyear' AND Clientid ='$Clientid' ";
        $resultExists01 = $conn->query($resultExists);
        if ($resultExists01 === TRUE) {
            return "Success";
        } else {

            return "Fail";
        }
        $Message = "Exists";
    } catch (Exception $e) {
    }
}
function roundup($float, $dec = 2)
{
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

function LoadLeave($conn, $Clientid, $Payrollmonth, $Payrollyear, $Employeeid, $CL, $TakenCL, $BalanceCL)
{
    $Currentyear = $Payrollyear;
    $Previousyear = $Currentyear - 1;
    $month_num = date("m", strtotime($Payrollmonth));
    $Payrollyear = $Currentyear;
    if ($month_num >= 10) {
        $Currentyear = date("Y");
        $currmonth = date("m");
        if ($currmonth == 01) {
            $Currentyear = $Currentyear - 1;
        }
        $Currentyear = $Currentyear + 1;
        $Previousyear = $Currentyear - 1;
    }
    $Fromdate = date("01-$month_num-$Payrollyear");
    $Todate = date("t-$month_num-$Payrollyear", strtotime($Fromdate));
    $d = date('Y-m-d', strtotime("$Payrollyear-$month_num-01"));
    $monthof1stday = date('Y-m-01', strtotime($d));
    $monthoflastday = date('Y-m-t', strtotime($d));
    // $monthof1stday = date("$Payrollyear-$month_num-01");
    // $monthoflastday = date("$Payrollyear-$month_num-t", strtotime($Fromdate));
<<<<<<< HEAD
    $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid'  and Employeeid='$Employeeid'  ORDER BY Employeeid ASC";
=======
    $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active' and Employeeid='$Employeeid'  ORDER BY Employeeid ASC";
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
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
        // $newjoinee = "No";
        // $currentDate = date("Y-m-d");
        // $joinDate = date("Y-m-d", strtotime($date_of_joining));
        // $diffMonths = (date("Y", strtotime($Todate)) - date("Y", strtotime($joinDate))) * 12;
        // $diffMonths+= date("m", strtotime($Todate)) - date("m", strtotime($joinDate));
        $Calculatedmonths = 12;

        // $newjoinee = "Yes";
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

                $Calculatedmonths = 11 - $Transactionmonthadded;
            }
        }

        $TotalLeaves = 1.5 * $Calculatedmonths;

        $Transactiondate = "$Payrollyear-$month_num-01";
        SaveMonthLeave($conn, $Clientid, $Employeeid, $month_num, $Payrollyear, $CL, $TakenCL, $Transactiondate);
        SaveLeaveMaster($conn, $Clientid, $Employeeid, $Currentyear, $Previousyear, $TotalLeaves, $month_num);
        getTransactionmonthleavebalance($conn, $Clientid, $Employeeid, $Currentyear, $Previousyear, $month_num, $Payrollyear);
    }
}
function SaveLeaveMaster($conn, $Clientid, $Employeeid, $Currentyear, $Previousyear, $TotalLeave, $month_num)
{
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

            //  $updatequeryexcute=mysqli_query($conn,$UpdateQuery);
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
    } catch (Exception $e) {
    }
}
function SaveMonthLeave($conn, $Clientid, $Employeeid, $Transactionmonthno, $Transactionyear, $CL, $TakenCL,  $Transactiondate)
{
    try {

        $BalanceCL = $CL - $TakenCL;


        $resultExists = "SELECT * FROM indsys1035employeetransactionmonthleave WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' AND Transactionmonthno ='$Transactionmonthno' AND Transactionyear='$Transactionyear' LIMIT 1";
        $resultExists01 = $conn->query($resultExists);
        if (mysqli_fetch_row($resultExists01)) {
            $UpdateLeave = "UPDATE indsys1035employeetransactionmonthleave
                 SET TotalLeaveeligable='$CL',
                 TakenLeave='$TakenCL',
                 BalanceLeave='$BalanceCL'
                 WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' AND Transactionmonthno ='$Transactionmonthno' AND Transactionyear='$Transactionyear'";
            $executeupdateLeave = mysqli_query($conn, $UpdateLeave);
            if ($executeupdateLeave === TRUE) {
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
    } catch (Exception $e) {
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
    } catch (Exception $e) {
        return $e;
    }
}
<<<<<<< HEAD
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
function SaveCTCandBonus($conn, $Clientid, $SalMonth, $SalYear,$Employeeid)
{
    $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active' AND Employeeid='$Employeeid'   ORDER BY Employeeid ASC";
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
                    // echo "Sunday attendance is not allowed for Employee ID: $Employeeid on date: $Attendencedate <br>";
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
            
        } else {
            // echo "Error deleting records: " . mysqli_error($conn) . "<br>";
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
            // echo "$sql <br>";
            // echo "Error: " . mysqli_error($conn);
        }
    }
}
=======
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
