<?php
   session_start();
   include '../config.php';
 
   $Clientid =$_SESSION["Clientid"];
   $Address1 = "";
   $Address2 ="";
   if($Clientid==2)
   {
    $Address1 ="'LABEL ARCADE' 476/1B1A, Jothi Nagar,";
    $Address2 =" K CHETTIPALAYAM,TIRUPPUR-641605, INDIA";

   }
   else
   {
    $Address1 ="No:471/3,Ramegoundempalaiyam,";
    $Address2 =" Peruntholuvu Village,Tirupur-641665, India. TPR-22066";
   }
   ?>
<!DOCTYPE html moznomarginboxes mozdisallowselectionprint>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    table {
        page-break-inside: auto
    }

    tr {
        page-break-inside: avoid;
        page-break-after: auto
    }

    thead {
        display: table-header-group
    }

    tfoot {
        display: table-footer-group
    }

    .payslip-data table {
        width: 100%;
    }

    .payslip-data table,
    .payslip-data td,
    .payslip-data th {
        border: 1px solid #888888;
        border-collapse: collapse;
    }

    .payslip-data td,
    .payslip-data th {
        padding: 3px;
        width: 30px;
        height: 25px;
        font-size: 12px;
    }

    .payslip-data th {
        background: #f0e6cc;
    }

    .payslip-data .even {
        background: #fbf8f0;
    }

    .payslip-data .odd {
        background: #fefcf9;
    }

    .textright {
        text-align: right;
    }

    .payslip-data .payslip-logo {
        height: 35px;
        position: absolute;
        margin: 2px 0 0px 5px
    }

    @media print {
        @page {
            margin: 0;
        }

        #printbtn {
            display: none;
            ;
        }

    }
    </style>
</head>
<?php
     $query ="";
     $retval="";
       if ($_POST) {
      
          $month = $_POST['month'];
          $nmonth = date('m', strtotime($month));
          $year = $_POST['year'];
          $type_name = $_POST['cat_name'];
          $fdaymonth = $year . '-' . $nmonth . '-01';
          $ldaymonth = date("Y-m-d", strtotime("+1 month", strtotime($fdaymonth)));
          $Departmentname = $_POST['cat_name'];
            $Categoryarray = implode(',', $Departmentname); 
            $Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
            $Category = str_replace(",","','","$Categoryarray");
                     $query = "SELECT e.* ,p.Type_Of_Posistion,p.Date_Of_Joing
                FROM indsys1026employeepayrolltempmasterdetail e
                 JOIN indsys1017employeemaster p ON e.Employeeid = p.Employeeid AND e.Clientid = p.Clientid
                WHERE 
                       e.Clientid = '$Clientid' 
                      AND p.Type_Of_Posistion IN ($Category) 
                      AND DATE(p.Date_Of_Joing) <= '$ldaymonth' 
                      AND e.Workeddays > 0.5
                      and e.SalMonth  = '$month'
                       and e.Salyear = '$year'
                ORDER BY e.Employeeid";

            $retval = mysqli_query($conn, $query);
      
      }
 



if (isset($_SESSION['Payrollmonth'])&&isset($_SESSION['Payrollyear']) &&isset($_SESSION['Employeeid']) &&isset($_SESSION['Category']) )
{

    $month = $_SESSION['Payrollmonth'];
    $nmonth = date('m', strtotime($month));
    $year = $_SESSION['Payrollyear'];
    $type_name = $_SESSION['Category'];
    $fdaymonth = $year . '-' . $nmonth . '-01';
    $ldaymonth = date("Y-m-d", strtotime("+1 month", strtotime($fdaymonth)));
    $Employeeid =$_SESSION['Employeeid'];
    $category = $_SESSION['Category'];
     
      $query = "SELECT * FROM indsys1017employeemaster where  EmpActive IN('Active','Deactive') AND (DATE(Leftdate) >'$fdaymonth'   OR Leftdate IS NULL) AND Clientid='$Clientid' AND Type_Of_Posistion ='$category' AND DATE(Date_Of_Joing) <='$ldaymonth' AND Employeeid='$Employeeid'  ORDER BY Employeeid";
      $retval = mysqli_query($conn, $query);
}


      
      ?>

<body>
    <p align="left"><a onclick="window.print()" id="printbtn"><button
                style="font-size:18px; background-color:#31A569; color:white;">Print <i
                    class="fa fa-print"></i></button></a></p>
    <div id="div_perform">

        <?php



            $emp_id = array();
            //  $logtbl = 'devicelogs_'.(int)$month.'_'.$year;
            while ($row = mysqli_fetch_array($retval)) {
            
                // $emp_id=$row['Employeeid'];
                $emp_id[] = $row;
                $date_of_joining = $row['Date_Of_Joing'];
                $UANno = $row['UANno'];
                $ESIno = $row['ESIno'];
            
                $allow_ot = $row['Allow_OT'];
                $Category =$row['Type_Of_Posistion'];
               
            }
            
            foreach ($emp_id as $row) {
            
                $emp_id = $row['Employeeid'];
                $emp_id = $row['Employeeid'];


                  $emp_id = $row['Employeeid'];
                        $Fullname = $row['Fullname'];
                        $Workingdays = 0;
                        $Workeddays = 0;
                      
                        $Nationalholidays = 0;
                        $Leavedays = 0;
                        $CL = 0;
                        $LOP = 0;
                        $Lophrs = 0;
                        $Lopwages = 0;
                        $Totaldays = 0;
                        $BasicDA = 0;
                        $HRA = 0;
                        $Otherallowance_Con_SA = 0;
                        $TotalSal = 0;
                        $EarnedBasic = 0;
                        $EarnedHRA = 0;
                        $EarnedOtherallowance_Con_SA = 0;
                        $EarnedWages = 0;
                        $PF = 0;
                        $ESI = 0;
                        $Salary_Advance = 0;
                        $FoodDeduction = 0;
                        $TotalDeduction = 0;
                        $NetWages = 0;
                        $DailyAllowanance = 0;
                        $TDS = 0;
                        $OT_HRS = 0;
                        $OT_Wages = 0;
                        $Performanceallowance = 0;
                        $TakenEL =0;
                        $Dormitory=0;
                        $Transport=0;

                     
                      
                        $TotalWagesCal = 0;
                              $Balanceleave = 0;
            
                $sql_perform_att = " SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid = '$emp_id' and SalMonth  = '$month' and Salyear = '$year' and Clientid='$Clientid'";
                // echo $sql_perform_att;exit;
                $result_Region = $conn->query($sql_perform_att);
            
                if (mysqli_num_rows($result_Region) > 0) {
                    while ($row = mysqli_fetch_array($result_Region)) {
            
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
                          $Dormitory=$row['Dormitory'];
                        $Transport=$row['Transport'];

                        $TotalWagesCal = $BasicDA+$HRA+$Otherallowance_Con_SA;

                        // $result[] = $row;

                         $month_num = date("m", strtotime($month));
                     
                        $Balanceleave = 0;
                            $GetLeave ="SELECT * FROM indsys1035employeetransactionmonthleave WHERE Clientid='$Clientid' AND Employeeid='$emp_id' AND Transactionyear='$year' AND Transactionmonthno='$month_num'";
                            $fetchLeave=mysqli_query($conn,$GetLeave);
                            if(mysqli_num_rows($fetchLeave)>0)
                            {
                        while($rowleave=mysqli_fetch_array($fetchLeave))
                        {
                          $Balanceleave=$rowleave['Currentmonthbalance'];
                        }
                            }
                        
            
                        
                    }
                }


                $Sqlpayrollmaster = " SELECT * FROM indsys1026employeepayrollmastertemp WHERE SalMonth  = '$month' and Salyear = '$year' and Category='$Category' AND Clientid='$Clientid'";
                // echo $sql_perform_att;exit;
                $result_RegionPayroll = $conn->query($Sqlpayrollmaster);
               
            
                if (mysqli_num_rows($result_RegionPayroll) > 0) {
                    while ($rowpayroll = mysqli_fetch_array($result_RegionPayroll)) {

                     $PaidDate = $rowpayroll['SalaryPaidDate'];
                    
                     if($PaidDate=="0000-00-00")
                     {
                        $PaidDate="";
                     }
                     else
                     {
                        $PaidDate = date("d-m-Y", strtotime( $PaidDate));
                     }
                    }
                  }


                  $Sqlpayrollmasteremp = " SELECT * FROM indsys1017employeemaster WHERE Employeeid = '$emp_id' and Clientid='$Clientid' ";
                  // echo $sql_perform_att;exit;
                  $result_RegionPayrollemp = $conn->query($Sqlpayrollmasteremp);
                 
              
                  if (mysqli_num_rows($result_RegionPayrollemp) > 0) {
                      while ($rowpayrollemp = mysqli_fetch_array($result_RegionPayrollemp)) {
  
                        $UANno = $rowpayrollemp['UANno'];
                        $ESIno = $rowpayrollemp['ESIno'];
                    
                      }
                    }
                $Paidleave = $Nationalholidays + $CL;
                $TotNetWages = $NetWages + $Performanceallowance;
            ?>
        <div style="padding:10px" class="payslip-data">

            <table width="95%" height="85%" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td colspan="6"><img class="payslip-logo" src="sainmarks.png">
                            <center><b>BRITANNIA LABELS INDIA PVT LTD</b><br />
                                <?php echo $Address1?>

                                <br />
                                <?php echo $Address2?>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"><span>Paid Date :
                                <?php echo  $PaidDate?></span><span style="float: right;">
                                <center><b>Wage slip for the month
                                        <?php echo "$month- $year"; ?><center></b>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Employee Name / பணியாளர் பெயர்/ कर्मचारी नाम
                        </td>
                        <td><?php echo $Fullname ?></td>
                        <td>Basic+DA / அடிப்படை சம்பளம் </td>
                        <td style="width: 40px;" class="textright">
                            <?php echo $BasicDA ?></td>
                        <td>Earned Basic+DA / ஈட்டிய
                            அடிப்படை ஊதியம் / अर्जित
                            बेसिक + महंगाई भत्ता </td>
                        <td style="width:40px" class="textright">
                            <?php echo $EarnedBasic ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Employee Id / பணியாளர் எண் /
                            कर्मचारी

                            पहचान संख्या </td>
                        <td>
                            <?php echo $emp_id ?> </td>
                        <td>HRA/ வீடு வாடகை படி</td>
                        <td class="textright"><?php echo $HRA ?></td>
                        <td>Earned HRA / ஈட்டிய வீடு வாடகை
                            படி / अर्जित आवास
                            किराए
                            की अनुमति </td>
                        <td class="textright"><?php echo $EarnedHRA ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Designation / பதவி / औहदा </td>
                        <td><?php echo $Designation ?></td>
                        <td>OA / இதர படி </td>
                        <td class="textright"><?php echo $Otherallowance_Con_SA ?>
                        </td>
                        <td>Earned OA / ஈட்டிய இதர படி/ अन्य
                            भत्ता अर्जित किया
                        </td>
                        <td class="textright"><?php echo $EarnedOtherallowance_Con_SA ?>
                        </td>
                    </tr>
                    <tr>
                        <td>WORKING DAYS/ வேலை நாட்கள் /
                            कार्य

                            दिवस </td>
                        <td class="textright"><?php echo $Workingdays ?></td>
                        <td></td>
                        <td class="textright"></td>
                        <td>OT Amount / மிகை பணி செய்த
                            சம்பளம் / ओवरटाइम भत्ता
                        </td>
                        <td class="textright"><?php echo $OT_Wages ?></td>
                    </tr>
                    <tr>
                        <td>WORKED DAYS / வேலை செய்த

                            நாட்கள் / काम किया दिन </td>
                        <td class="textright"><?php echo $Workeddays ?></td>
                        <td></td>
                        <td></td>
                        <td>Daily/Monthly Allowance /
                            தினசரி/மாதாந்திர படி /
                            दैनिक/मासिक भत्ता </td>
                        <td class="textright"><?php echo $DailyAllowanance ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Paid Leave / சம்பளத்துடன் கூடிய
                            விடுப்பு /

                            वैतनिक अवकाश </td>
                        <td class="textright"><?php echo $TakenEL ?></td>
                        <td><b>Total Wages / மொத்தம் /
                                सकल वेतन</b></td>
                        <td class="textright"><?php echo $TotalWagesCal  ?></td>
                        <td><b>Earned Wages/ ஈட்டிய மொத்தம்
                                / अर्जित राशि</b>
                        </td>
                        <td class="textright"><?php echo $EarnedWages ?>
                        </td>
                    </tr>
                    <tr>
                        <td>LOP / சம்பள இழப்பு / वेतन का
                            नुकसान </td>
                        <td class="textright"><?php echo $LOP ?></td>
                        <td></td>
                        <td></td>
                        <td>PF / பிஎஃப் / भविष्य निधि </td>
                        <td class="textright"><?php echo $PF ?></td>
                    </tr>
                    <tr>
                        <td>OT Hrs / மிகை பணி செய்த நேரம்
                            /

                            समयोपरि घंटे </td>
                        <td class="textright"><?php echo $OT_HRS ?></td>
                        <td></td>
                        <td></td>
                        <td>ESI / இ.எஸ்.ஐ. / कर्मचारियों का
                            राज्य बीमा </td>
                        <td class="textright"><?php echo $ESI ?></td>
                    </tr>

                    <tr>
                        <td>LOP Hrs/ ஊதிய நேர இழப்பு / वेतन घंटों का नुकसान </td>
                        <td class="textright"><?php echo $Lophrs ?></td>
                        <td></td>
                        <td></td>
                        <td>LOP Wages/ ஊதிய இழப்பு
                            / वेतन मजदूरी का नुकसान </td>
                        <td class="textright"><?php echo $Lopwages ?></td>
                    </tr>

                    <tr>
                        <td>National / Festival Holiday /
                            தேசிய விடுப்பு /

                            राष्ट्रीय अवकाश </td>
                        <td class="textright"><?php echo $Nationalholidays ?> </td>
                        <td rowspan="2"></td>
                        <td rowspan="2"></td>
                        <td>Salary Advance / சம்பள முன்பணம்
                            / अग्रिम वेतन
                        </td>
                        <td class="textright"><?php echo $Salary_Advance ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Leave days / விடுப்பு எடுத்த நாட்கள்/
                        छुट्टी के दिन लिए गए

                           </td>
                        <td class="textright"><?php echo $Leavedays ?></td>
                        <td>Food & Other Deduction / பிடித்தம் /
                            कटौती </td>
                        <td class="textright"><?php echo $FoodDeduction ?>
                        </td>
                    </tr>
                    <tr>
                    <td> Total Days / மொத்த நாட்கள்/
                            सकल

                            दिन </td>
                        <td class="textright"><?php echo $Totaldays ?></td>
                    
                        <td></td>
                        <td></td>
                        <td>TDS/ டிடிஎஸ்/ टीडीएस </td>
                        <td class="textright"><?php echo $TDS ?></td>
                    </tr>
                    <tr>
                    <td>UAN NO</td>
                        <td><?php echo $UANno ?></td>
                      
                        <td></td>
                        <td></td>
                        <td>Dormitory / தங்குமிடம் /
                            छात्रावास</td>
                        <td class="textright"><?php echo $Dormitory ?>
                        </td>
                    </tr>


                    <tr>
                    <td>ESIC NO </td>
                        <td><?php echo $ESIno ?></td>
                       
                        <td></td>
                        <td></td>
                        <td>Transport/போக்குவரத்து/ परिवहन </td>
                        <td class="textright"><?php echo $Transport ?></td>
                    </tr>
                    <tr>
                    <td>Balance Leave</td>
                        <td class="textright"><?php echo $Balanceleave?></td>
                        <td></td>
                        <td></td>
                        <td><b>Total Deduction / மொத்த
                                பிடித்தம் / कटौती</b></td>
                        <td class="textright"><?php echo $TotalDeduction ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Performance allowance/ஊக்க தொகை/ प्रदर्शन भत्ता </td>
                        <td class="textright"><?php echo $Performanceallowance ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Net Wages நிகர ஊதியம் / नेट
                                सैलरी</b> </td>
                        <td class="textright"><?php echo $TotNetWages ?></td>
                    </tr>
                    <tr>
                        <td>Authorised Signature /
                            மேலாளர்

                            கையொப்பம் / कर्मचारी हस्ताक्षर
                        </td>
                        <td></td>
                        <td colspan="2">Employee Signature /
                            பணியாளர் கையொப்பம்
                            /
                            कर्मचारी हस्ताक्षर </td>
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
            <p style="page-break-after: always;"></p>
        </div>
        <?php
               }
               
               ?>
    </div>

</body>

</html>