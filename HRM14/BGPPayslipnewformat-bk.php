<?php
   session_start();
   include '../config.php';
   $Clientid =$_SESSION["Clientid"];
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Sheet</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    table{
    font-size: 10px;
    margin-bottom: 0px;
    }
    @media print {
    @page {
    margin: 0;
    size: A5 landscape;
    background-color: #ffffff !important;
    }

    #printbtn {
    display: none;
    }
    }
    </style>
    </head>



<body>   
       
            
            <?php
            //   if ($_POST) {

            //       $month = $_POST['month'];
            //       $nmonth = date('m', strtotime($month));
            //       $year = $_POST['year'];
            //       $type_name = $_POST['cat_name'];
            //       $fdaymonth = $year . '-' . $nmonth . '-01';
            //       $ldaymonth = date("Y-m-d", strtotime("+1 month", strtotime($fdaymonth)));

            //   }

            //   $month = $_POST['month'];
            //   $nmonth = date('m', strtotime($month));
            //   $year = $_POST['year'];
            //$type_name = $_POST['cat_name'];
            $month = "June";
            $nmonth = date('m', strtotime($month));
            $year = 2024;
            $type_name="'Category 1','Category 2','Category 3'";
            $fdaymonth = $year . '-' . $nmonth . '-01';
            $ldaymonth = date("Y-m-d", strtotime("+1 month", strtotime($fdaymonth)));
            //   $Departmentname = $_POST['cat_name'];
            //     $Categoryarray = implode(',', $Departmentname); 
            //     $Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
            //     $Category = str_replace(",","','","$Categoryarray");
            $Category=$type_name;
            $query = "SELECT e.* ,p.Type_Of_Posistion,p.Date_Of_Joing
            FROM indsys1026employeepayrolltempmasterdetail e
            JOIN indsys1017employeemaster p ON e.Employeeid = p.Employeeid AND e.Clientid = p.Clientid
            WHERE 
                e.Clientid = '$Clientid' 
                AND p.Type_Of_Posistion IN ($Category) 
                AND DATE(p.Date_Of_Joing) <= '$ldaymonth'             
                and e.SalMonth  = '$month'
                and e.Salyear = '$year'
            ORDER BY e.Employeeid";

            //echo "  $query<br/>";
            $retval = mysqli_query($conn, $query);


            function convertNumber($num = false)
            {
            $num = str_replace(array(',', ''), '' , trim($num));
            if(! $num) {
            return false;
            }
            $num = (int) $num;
            $words = array();
            $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
            'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
            );
            $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
            $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
            'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
            'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
            );
            $num_length = strlen($num);
            $levels = (int) (($num_length + 2) / 3);
            $max_length = $levels * 3;
            $num = substr('00' . $num, -$max_length);
            $num_levels = str_split($num, 3);
            for ($i = 0; $i < count($num_levels); $i++) {
            $levels--;
            $hundreds = (int) ($num_levels[$i] / 100);
            $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ( $hundreds == 1 ? '' : '' ) . ' ' : '');
            $tens = (int) ($num_levels[$i] % 100);
            $singles = '';
            if ( $tens < 20 ) {
            $tens = ($tens ? ' and ' . $list1[$tens] . ' ' : '' );
            } elseif ($tens >= 20) {
            $tens = (int)($tens / 10);
            $tens = ' and ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
            }
            $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
            } //end for loop
            $commas = count($words);
            if ($commas > 1) {
            $commas = $commas - 1;
            }
            $words = implode(' ',  $words);
            $words = preg_replace('/^\s\b(and)/', '', $words );
            $words = trim($words);
            $words = ucfirst($words);
            $words = $words . "-";
            return $words;
            }

            ?>
            <div class="container">
            <a onclick="window.print()" id="printbtn"> <button class="btn btn-info my-3"><i class="fa fa-print"></i> Print</button></a>
            <div class="data-box">
			
			<div class="header">
            <h2 class='text-center'>BRITANNIA LABELS INDIA PVT LTD</h2>
            <p class='text-center'>PLOT NO-1705, SECTOR-38, RAI INDUSTRIAL AREA, SONIPAT HARYANA-131029</p>
            <p class='text-center'>Salary for the month of <?php echo "$month-$year"?></p>
            </div>
            </div>
            <?php
            $emp_id = array();
            //  $logtbl = 'devicelogs_'.(int)$month.'_'.$year;
            while ($row = mysqli_fetch_array($retval)) {
            
                // $emp_id=$row['Employeeid'];
                $emp_id[] = $row;
                $date_of_joining = $row['Date_Of_Joing'];               
                $allow_ot = $row['Allow_OT'];
                $Category =$row['Type_Of_Posistion'];
               
            }
            
            foreach ($emp_id as $row) {
               $emp_id = $row['Employeeid'];              
               $sql = " SELECT * FROM indsys1017employeemaster WHERE Clientid ='$Clientid' and Employeeid = '$emp_id'  ORDER BY Employeeid ";           
               $result = $conn->query($sql);           
               if (mysqli_num_rows($result) > 0) {
                   while ($rows = mysqli_fetch_array($result)) {
                    $FatherGuardianSpouseName = $rows['FatherGuardianSpouseName'];
                    $Date_Of_Joing = $rows['Date_Of_Joing'];
                    $Panno = $rows['Panno'];
                    $Gross_Salary = $rows['Gross_Salary'];
                    $Day_allowance = $rows['Day_allowance'];
                    $UANno = $rows['UANno'];
                    $ESIno = $rows['ESIno'];
                    $Gross_Salary= $Gross_Salary-  $Day_allowance;

                   }
                 }
                 $sqlacc = " SELECT * FROM indsys1016employeeaccountinformation WHERE Clientid ='$Clientid' and Employeeid = '$emp_id'  ORDER BY Employeeid ";
                 // echo $sql;exit;
                 $resultacc = $conn->query($sqlacc);
             
                 if (mysqli_num_rows($resultacc) > 0) {
                     while ($rowacc = mysqli_fetch_array($resultacc)) {
                      $Bankname = $rowacc['Bankname'];
                      $Accountno = $rowacc['Accountno'];
                     //  $Accountno = $rowacc['Accountno'];
  
                     }
                   }
                
            
                $sql_perform_att = " SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Clientid ='$Clientid' and Employeeid = '$emp_id' and SalMonth  = '$month' and Salyear = '$year'";
                 //echo $sql_perform_att;exit;
                $result_Region = $conn->query($sql_perform_att);
            
                if (mysqli_num_rows($result_Region) > 0) {
                    while ($row = mysqli_fetch_array($result_Region)) {
            
                        $emp_id = $row['Employeeid'];
                        $Fullname = $row['Fullname'];
                        $Workingdays = $row['Workingdays'];
                        $Workeddays = $row['Workeddays'];
                        $Designation = $row['Designation'];
                        $Department=$row['Department'];
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
                        $SalMonth=$row['SalMonth'];
                        $Salyear=$row['Salyear'];
                        $EarnedConveyence=$row['EarnedConveyence'];
                        $Totalsickleave=$row['Totalsickleave'];
                        $TotalPresentdays = $row['TotalPresentdays'];
                        $TotalWagesCal = $BasicDA+$HRA+$Otherallowance_Con_SA;
                        $Totalweekoff = $row['Totalweekoff'];
                        $Totalsickleave = $row['Totalsickleave'];
                        $TotalCL = $row['TotalCL'];
                        $LWF = $row['LWF'];
                        $EarnedConveyence = $row['EarnedConveyence'];
                        $TotalAbsentdays = $row['TotalAbsentdays'];
                        $NetSalary =$NetWages+$Performanceallowance;
                        $EarnedNetwages=$EarnedWages+$Performanceallowance;
                        $Totalrate = $TotalSal-$Performanceallowance;
                        // $result[] = $row;
                        
            
                        
                    }
                }
               
                ?>
                
       
               
            <table class="table table-sm table-bordered">       
            <tbody>
             <tr>
            <th >Sno.</th>
            <th colspan="2">Employee Details</th>
            <th colspan="3">Attendance Detail</th>
            <th colspan="2">Salary/Wage Rate</th>
            <th colspan="4">Earnings</th>
            <th colspan="2">Arrears</th>
            <th colspan="2">O.T. Details</th>
            <th colspan="2">Deductions</th>
            <th >Net Payable</th>
            <th >Remarks</th>
            </tr>
            <tr>
            </tr>
            <tr>
            <td>1</td>
            <td colspan="2">
            <table class="table table-sm table-bordered">
            <tr>
            <td>Code</td>
            <td> <?php echo $emp_id  ?></td>
            </tr>
            <tr>
            <td>Name</td>
            <td> <?php echo $Fullname  ?></td>
            </tr>
            <tr>
            <td>F.Name</td>
            <td> <?php echo $FatherGuardianSpouseName  ?></td>
            </tr>
            <tr>
            <td>Designation</td>
            <td>  <?php echo $Designation  ?></td>
            </tr>
            <tr>
            <td>Department</td>
            <td> <?php echo $Department  ?></td>
            </tr>
            <tr>
            <td>P.F No</td>
            <td> <?php echo  $UANno  ?></td>
            </tr>
            <tr>
            <td>ESIC NO</td>
            <td>   <?php echo  $ESIno  ?></td>
            </tr>
            </table>
            </td>
            <td colspan="3">
            <table class="table table-sm table-bordered">
            <tr>
            <td>EL</td>
            <td><?php echo $TakenEL ?></td>
            <td>P</td>
            <td><?php echo $TotalPresentdays ?></td>
            </tr>
            <tr>
            <td>CL</td>
            <td><?php echo   $TotalCL ?></td>
            <td>WO</td>
            <td><?php echo   $Totalweekoff?></td>
            </tr>
            <tr>
            <td>SL</td>
            <td><?php echo   $Totalsickleave ?></td>
            <td>AB</td>
            <td><?php echo $TotalAbsentdays?></td>
            </tr>
           
            <tr>
            <td colspan="2"><strong>Payable Days</strong></td>
            <td colspan="2"  style="text-align: right;"><strong><?php echo $Totaldays ?></strong></td>

            </tr>
            </table>
            </td>
            <td colspan="2">
            <table class="table table-sm table-bordered">
            <tr>
            <td>Basic</td>
            <td style="text-align:right; " ><?php echo $BasicDA ?></td>
            </tr>
            <tr>
            <td>HRA</td>
            <td style="text-align:right; " ><?php echo $HRA ?></td>
            </tr>
            <tr>
            <td>Conveyance</td>
            <td style="text-align:right; " ><?php echo $Conveyence ?></td>
            </tr>
            <tr>
            <td>Other</td>
            <td style="text-align:right;"><?php echo $Otherallowance_Con_SA ?></td>
            </tr>
            <tr>
            <td>Daily</td>
            <td style="text-align:right;" ><?php echo $Day_allowance ?></td>
            </tr>
            <tr>
            <td>Total</td>
            <td style="text-align: right;"> <strong> <?php echo $Totalrate ?></strong></td>
            </tr>
            </table>
            </td>
            <td colspan="4">
            <table class="table table-sm table-bordered">
            <tr>
            <td>Basic</td>
            <td style="text-align:right;" ><?php echo $EarnedBasic ?></td>
            </tr>
            <tr>
            <td>HRA</td>
            <td style="text-align:right; " ><?php echo  $EarnedHRA ?></td>
            </tr>
            <tr>
            <td>Conveyance</td>
            <td style="text-align:right;" ><?php echo  $EarnedConveyence ?></td>
            </tr>
            <tr>
            <td>Other</td>
            <td style="text-align:right; " ><?php echo  $EarnedOtherallowance_Con_SA ?></td>
            </tr>
            <tr>
            <td>Daily</td>
            <td style="text-align:right; " ><?php echo  $DailyAllowanance ?></td>
            </tr>
            <tr>
            <td>Total</td>
            <td style="text-align: right;"> <strong> <?php echo $EarnedNetwages ?></strong></td>
            </tr>
            </table>
            </td>
            <td colspan="2"></td>
            <td colspan="2">
            <table class="table table-sm table-bordered">
            <tr>
            <td>OT Hrs</td>
            <td style="text-align: right;"><?php echo $OT_HRS?></td>
            </tr>
            <tr>
            <td>OT Amt</td>
            <td style="text-align: right;"><?php echo $OT_Wages?></td>
            </tr>
            </table>
            </td>
            <td colspan="2">
            <table class="table table-sm table-bordered">
            <tr>
            <td>PF</td>
            <td> <?php echo $PF ?></td>
            </tr>
            <tr>
            <td>ESI</td>
            <td> <?php echo $ESI ?></td>
            </tr>
          
            <tr>
            <td>Loan</td>
            <td> 0</td>
            </tr>
            <tr>
            <td>Advance</td>
            <td><?php echo $Salary_Advance ?></td>
            </tr>
            <tr>
            <td>TDS</td>
            <td><?php echo $TDS ?></td>
            </tr>
            <tr>
            <td>LWF</td>
            <td><?php echo $LWF ?></td>
            </tr>
            <tr>
            <td>Deductions</td>
            <td style="text-align: right;"><strong><?php echo $TotalDeduction ?></strong></td>
            </tr>
            </table>
            </td>
            <td style="text-align: right;"><b><?php echo $NetSalary ?></b></td>
            <td></td>
            </tr>

            
            </tbody>
            </table>
            <?php
            }

            ?>
            </div>
   



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
