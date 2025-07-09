<?php
include '../config.php';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
session_start();
$Category = $_SESSION['Category'];
$Payrollyear = $_SESSION['Payrollyear'];
$Payrollmonth = $_SESSION['Payrollmonth'];
$Clientid = $_SESSION['Clientid'];
$Category=$_SESSION['Category'];
$Location ="";
if ($Clientid=="2")
{
    $Location ="Corporate Office";

}

if($Clientid=="3")
{
    $Location ="R.K.Palayam";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Employee Report</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            margin: 10px;
        }

        .intro-text {
            font-size: 12px;
            font-weight: normal;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .header img {
            height: 60px;
        }

        .header-title {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
            page-break-inside: auto;
        }

        table,
        td {
            border: 1px solid #000;
        }

        /* th {
  white-space: nowrap;
} */

        thead {
            display: table-header-group;
        }

        thead tr {
            border-top: 1px solid #000;
            background-color: #fff;
        }

        thead th {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
            background-color: #f9f9f9;
        }

        td {
            padding: 4px;
            text-align: center;
        }

        tr {
            page-break-inside: avoid;
        }

        @media print {
            @page {
                size: Legal landscape;
                margin: 1cm;
            }

            .print-btn {
                display: none !important;
            }

            body {
                font-size: 12px;
                margin: 1cm;
            }

            .header {
                page-break-after: avoid;
            }
        }

        th {
            background-color: rgb(235, 234, 234) !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .main-head th {
            background-color: rgb(220, 218, 218) !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .print-btn button {
            background: linear-gradient(135deg,
                    #2d9a43,
                    #28c247);
            /* premium gradient */
            color: #fff;
            padding: 8px 20px;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .print-btn button:hover {
            background: linear-gradient(135deg, #28c247, #2d9a43);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            transform: scale(1.03);
        }

        .print-btn button:active {
            transform: scale(0.97);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .print-btn {
            text-align: right;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="print-btn">
        <button onclick="window.print()">Print</button>
    </div>
    <div class="header">
        <div class="logo">
            <img
                src="https://hrms.bgpindia.com/assets/images/logo/Sainmarknewlogo.png""
                alt="BGP Logo" />
        </div>
        <div class="header-title">
           BRITANNIA LABELS INDIA PVT LTD - <?php echo $Location;?><br>
            <div class="intro-text">
                <p>
                    Factories Act 1948 And TAMILNADU FACTORIES RULES 1950 (FORM NO 12 &
                    25) [Prescribed Under Rule 80 & 103] Register of Adult Workers
                    Men/Women Attendance Report for the Month of <b><?php echo "$Payrollmonth-$Payrollyear";?></b>
                </p>
                <p>
                    Wages for <b><?php echo $Category?></b> monthly-paid employees for the month of <b><?php echo "$Payrollmonth-$Payrollyear";?></b>.
                    
                </p>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr class="main-head">
                <th colspan="4">Employee Details</th>
                <th colspan="8">Attendance & Leave Details</th>
                <th colspan="4">Salary Details</th>
                <th colspan="7">Earned Salary Details</th>
                <th colspan="10">Deductions</th>
                <th colspan="2">Net Pay</th>
            </tr>
            <tr>
                <th>S.NO</th>
                <th>EMP&nbsp;ID</th>
                <th>EMP&nbsp;NAME</th>
                <th>DESIG.</th>
                <th>WRKG</th>
                <th>WRKD</th>
                <th>NH</th>
                <th>LD</th>
                <th>LTKN</th>
                <th>BAL</th>
                <th>LOP</th>
                <th>TOTAL</th>
                <th>B+DA</th>
                <th>HRA</th>
                <th>OA</th>
                <th>TOTAL</th>
                <th>BASIC</th>
                <th>HRA</th>
                <th>OA</th>
                <th>DA</th>
                <th>OT.&nbsp;HRS</th>
                <th>OT.&nbsp;WG</th>
                <th>TOTAL</th>
                <th>PF</th>
                <th>ESI</th>
                <th>ADV</th>
                <th>FOOD</th>
                <th>TRNSP</th>
                <th>LOP&nbsp;HRS</th>
                <th>LOP&nbsp;WG</th>               
                <th>TDS</th>
                <th>TOT</th>
                <th>NET&nbsp;SAL</th>
                <th>PA</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <?php

        $grandTotal.$Holiday_Total=0;
        $payslip_list = "";
        $GetState = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid' AND NetWages!=0  ORDER BY Employeeid";
       
       $result_Region = $conn->query($GetState);
        $currentContenRow = 0;
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $currentContenRow++;
                $sno = $currentContenRow;
                $emp_id = $row['Employeeid'];
                $Fullname = $row['Fullname'];
                $Workingdays = $row['Workingdays'];
                $Workeddays = $row['Workeddays'];
                $Designation = $row['Designation'];
                $Nationalholidays = $row['Nationalholidays'];
                $Leavedays = $row['Leavedays'];
                $CL = $row['CL'];
                $LOP = $row['LOP'];
                $Lophrs = $row['Lophrs'];
                $Lopwages = $row['Lopwages'];
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
                $Performanceallowance = $row['Performanceallowance'];
                $TakenEL = $row['TakenEL'];
                $Dormitory = $row['Dormitory'];
                $Transport = $row['Transport'];
                $Holiday_pay = $row['Holiday_pay'];
                $Holiday_pf = $row['Holiday_pf'];
                $Holiday_esi = $row['Holiday_esi'];
                $Holiday_deduction = $row['Holiday_deduction'];
                $Holiday_net = $row['Holiday_net'];
                $Total=$NetWages+$Performanceallowance;


                $TotalWagesCal = $BasicDA + $HRA + $Otherallowance_Con_SA;
                $TotalDeduction_HolidayDeduction = $TotalDeduction + $Holiday_deduction;
                $TotalNetWages=$NetWages+$Holiday_net;

                // $result[] = $row;

                $month_num = date("m", strtotime($month));

                $Balanceleave = 0;
                $GetLeave = "SELECT * FROM indsys1035employeetransactionmonthleave WHERE Clientid='$Clientid' AND Employeeid='$emp_id' AND Transactionyear='$Payrollyear' AND Transactionmonthno='$month_num'";
                $fetchLeave = mysqli_query($conn, $GetLeave);
                if (mysqli_num_rows($fetchLeave) > 0) {
                    while ($rowleave = mysqli_fetch_array($fetchLeave)) {
                        $Balanceleave = $rowleave['Currentmonthbalance'];
                    }
                }
            


            $Sqlpayrollmaster = " SELECT * FROM indsys1026employeepayrollmastertemp WHERE SalMonth  = '$Payrollmonth' and Salyear = '$Payrollyear' and Category='$Category' AND Clientid='$Clientid'";
        
            $result_RegionPayroll = $conn->query($Sqlpayrollmaster);

            if (mysqli_num_rows($result_RegionPayroll) > 0) {
                while ($rowpayroll = mysqli_fetch_array($result_RegionPayroll)) {

                    $PaidDate = $rowpayroll['SalaryPaidDate'];

                    if ($PaidDate == "0000-00-00") {
                        $PaidDate = "";
                    } else {
                        $PaidDate = date("d-m-Y", strtotime($PaidDate));
                    }
                }
            }


            $Sqlpayrollmasteremp = " SELECT * FROM indsys1017employeemaster WHERE Employeeid = '$emp_id' and Clientid='$Clientid' ";
            $result_RegionPayrollemp = $conn->query($Sqlpayrollmasteremp);
            if (mysqli_num_rows($result_RegionPayrollemp) > 0) {
                while ($rowpayrollemp = mysqli_fetch_array($result_RegionPayrollemp)) {

                    $UANno = $rowpayrollemp['UANno'];
                    $ESIno = $rowpayrollemp['ESIno'];
                }
            }
            $Paidleave = $Nationalholidays + $CL;
            $TotNetWages_01 = $NetWages + $Performanceallowance + $Holiday_net;
            $Total=$NetWages+$PA;
            $grandTotal +=$Total;             
            $Holiday_Total +=$Holiday_Net;

            $payslip_list.="<tr>
                <td>$sno</td>
                <td>$emp_id</td>
                <td style='white-space: nowrap;'>$Fullname</td>
                <td style='white-space: nowrap;'>$Designation</td>
                <td>$Workingdays</td>
                <td>$Workeddays</td>
                <td>$Nationalholidays</td>
                <td>$Leavedays</td>
                <td>$TakenEL</td>
                <td>$Balanceleave</td>
                <td>$LOP</td>
                <td>$Totaldays</td>
                <td>$BasicDA</td>
                <td>$HRA</td>
                <td>$Otherallowance_Con_SA</td>
                <td>$TotalSal</td>
                <td>$EarnedBasic</td>
                <td>$EarnedHRA</td>
                <td>$EarnedOtherallowance_Con_SA</td>
                <td>$DailyAllowanance</td>
                <td>$OT_HRS</td>
                <td>$OT_Wages</td>
                <td>$EarnedWages</td>
                <td>$PF</td>
                <td>$ESI</td>
                <td>$Salary_Advance</td>
                <td>$FoodDeduction</td>
                <td>$Transport</td>
                <td>$Lophrs</td>
                <td>$Lopwages</td>
               
                <td>$TDS</td>
                <td>$TotalDeduction_HolidayDeduction</td>
                <td>$TotalNetWages</td>
                <td>$Performanceallowance</td>
                <td>$TotNetWages_01</td>
            </tr>";
        }
    }
       
       
        ?>
        <tbody>
            <?php echo $payslip_list; ?>
        </tbody>
        <tr>
            <td colspan="34" style="text-align: right; font-weight: bold;">Grand Total</td>
            <td  style="text-align: right; font-weight: bold;"><?php echo round($grandTotal+$Holiday_Total); ?></td>
        </tr>
    </table>
</body>

</html>