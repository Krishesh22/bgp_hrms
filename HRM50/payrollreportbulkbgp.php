<?php
   session_start();
   include '../config.php';
   $Clientid =$_SESSION["Clientid"];
   ?>
<!DOCTYPE html moznomarginboxes mozdisallowselectionprint>
<html lang="en">
   <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <style>
                table{
                max-width:85%;
                position: relative;
                margin-left:5rem;
               
                }
                .table-bordered td {
                border: 1px solid #dee2e6;
                padding: 0.35rem;
                vertical-align: middle;
                }
                .table-bordered th {
                border: 1px solid #dee2e6;
                padding: 0.35rem;
                vertical-align: middle;
                }
                .card-container {
                width: 20%;
                height:16%;
                margin: 0 auto;
                /* background-color: #f2f2f2; 
                 border: 1px solid #ddd; */
                } 
                .title{
                text-align: center;
              
                }
               
                
                .list{
                text-align:right;
                }
                .myAlign {
                text-align: left;
                padding-left:60%;
                }
               
                /* .moneys{
                text-align: left;
                padding-left:100px;
                } */
                /* .card{
                background: white;
                margin-bottom: 2rem;
                margin-left:5rem;
                height:35%;
                width: 90%;
                padding-top:40px;
                border: 1px solid #ddd;
                border-radius:0px
                } */
             .letter{
               font-family:Sans-serif;
                font-size:13px;
             }
                .sign{
                 text-align: left;
                 padding-left:10%;
                }
                @media print {
	@page { margin: 0 ;
        }
    #printbtn {
        display :none;
       ;
    }
	
}
             </style>
   </head>
   <?php
      if ($_POST) {
      
          $month = $_POST['month'];
          $nmonth = date('m', strtotime($month));
          $year = $_POST['year'];
          $type_name = $_POST['cat_name'];
          $fdaymonth = $year . '-' . $nmonth . '-01';
          $ldaymonth = $year . '-' . $nmonth . '-31';
      
      }
     
      
      $Departmentname = $_POST['cat_name'];
      $Categoryarray = implode(',', $Departmentname); 
      $Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
      $Category = str_replace(",","','","$Categoryarray");

      
      $query = "SELECT * FROM indsys1017employeemaster where  EmpActive='Active' AND Clientid='$Clientid' AND Type_Of_Posistion in(". $Category.")  ORDER BY Employeeid";
      
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
   <body>
      <p align="left"><a onclick="window.print()" id="printbtn"><button style="font-size:18px; background-color:#31A569; color:white;">Print <i class="fa fa-print"></i></button></a></p>
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
              
               $sql = " SELECT * FROM indsys1017employeemaster WHERE Clientid ='$Clientid' and Employeeid = '$emp_id'  ORDER BY Employeeid ";
               // echo $sql;exit;
               $result = $conn->query($sql);
           
               if (mysqli_num_rows($result) > 0) {
                   while ($rows = mysqli_fetch_array($result)) {
                    $FatherGuardianSpouseName = $rows['FatherGuardianSpouseName'];
                    $Date_Of_Joing = $rows['Date_Of_Joing'];
                    $Panno = $rows['Panno'];
                    $Gross_Salary = $rows['Gross_Salary'];

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
                        $Totalsickleave=$row['Totalsickleave'];
            
                        $TotalWagesCal = $BasicDA+$HRA+$Otherallowance_Con_SA;
            
                        // $result[] = $row;
                        
            
                        
                    }
                }
               
                ?>
                <div class="letter">
                <table class="mt-4 table table-bordered letter" style="bottom:0px">
                <tbody>
                <td colspan="8">
                   <div class="col-xl-12 col-lg-12 col-md-12">
                      <div class="row">
                         <div class="col-xl-4 col-lg-4 col-md-4" style="left:0px">
                            <p><strong>Code/C.No / कोड/सी.नहीं : </strong> <?php echo  $emp_id  ?></p><strong></strong> 
                            <p><strong>Name / नाम :</strong><?php echo $Fullname  ?></p><strong></strong> 
                            <p><strong>Father's Name / पिता का नाम :</strong><?php echo $FatherGuardianSpouseName  ?></p>
                            <p><strong>Desig / पद :</strong><?php echo $Designation  ?></p>
                            <p><strong>Dept. / विभाग :</strong><?php echo $Department  ?></p>
                            <p><strong>DOJ / शामिल होने की तिथि :</strong><?php echo  $Date_Of_Joing  ?></p>
                         </div>
                         <div class="col-xl-4 col-lg-4 col-md-4" style="">
                            <center><b>BRITANNIA LABELS INDIA PVT LTD</b><br/>PLOT NO-1750,SECTOR-38,HSIIDC RAI SONIPAT HARYANA-131028<br/></center>
                            <center><b>Form X</b><br/>(Rule 26)<br/><br/>PAYSLIP FOR THE MONTH OF<br/></center>
                            <div class="card-container">
                               <b class="title"><?php echo  $SalMonth." - ".$Salyear; ?></b>
                            </div>
                         </div>
                         <div class="col-xl-4 col-lg-4 col-md-4" style="left:40px;">
                            <p><strong>Bank Name / बैंक का नाम :</strong><?php echo $Bankname  ?></p>
                            <p><strong>A/c No / खाता संख्या :</strong><?php echo $Accountno  ?></p>
                            <p><strong>PF No / भविष्य निधि संख्या :</strong><?php echo  $PF  ?></p>
                            <p><strong>ESI No / कर्मचारी राज्य बीमा संख्या :</strong><?php echo  $ESI  ?> </p>
                            <p><strong>PAN / स्थायी खाता संख्या :</strong><?php echo  $Panno   ?></p>
                         </div>
                      </div>
                   </div>
               </td>
             
             <!-- <table class="mt-4 table table-bordered letter" style="bottom:33px">
                <tbody> -->
                   <tr class="title-head">
                      <th>Attn.details</th>
                      <th>Avail</th>
                      <th>Bal</th>
                      <th>Salary/Wage Rate / वेतन दर</th>
                      <th>Earnings /आय वेतन</th>
                      <th>Arrears / बकाया</th>
                      <th>Deductions / कटौती</th>
                      <th rowspan="9">Net Salary/<br>
                         शुद्ध वेतन
                      <p style="padding-top:30px;text-align:center"><?php echo   $NetWages ?></p>
                      </th>
                   </tr>
                   <tr>
                      <td>Present <br> वर्तमान</td>
                      <td style="text-align:center; padding-top:20px">26.0</td>
                      <td></td>
                      <td>Basic <br> बुनियादी
                         <span style="padding-left:75%;"><?php echo $BasicDA ?></span>
                      </td>
                      <td  style="text-align:center; padding-top:20px"><?php echo $BasicDA ?></td>
                      <td></td>
                      <td>PF <br>भविष्य निधि
                      <span style="padding-left:90%;"><?php echo  $PF ?></span>
                      </td>
                   </tr>
                   <tr>
                      <td>WOF <br>सप्ताहिक अवकाश</td>
                      <td style="text-align:center; padding-top:20px">4.00</td>
                      <td></td>
                      <td>HRA <br> मकान किराया भत्ता
                      <span style="padding-left:75%;"><?php echo  $HRA ?></span>
                      </td>
                      <td style="text-align:center; padding-top:20px"> <?php echo  $HRA ?></td>
                      <td></td>
                      <td>ESI <br> कर्मचारी राज्य बीमा
                      <span style="padding-left:90%;"><?php echo  $ESI ?></span>
                      </td>
                   </tr>
                   <tr>
                      <td>HD <br>छुट्टी</td>
                      <td style="text-align:center; padding-top:20px"><?php echo $Nationalholidays ?></td>
                      <td></td>
                      <td>Conveyance <br> वाहन
                      <span style="padding-left:75%;"><?php echo  $Conveyence ?></span>
                      </td>
                      <td></td>
                      <td></td>
                      <td>LOAN <br>ऋृण</td>
                   </tr>
                   <tr>
                      <td>EL<br> छुट्टी अर्जित करें</td>
                      <td style="text-align:center; padding-top:20px"><?php echo $TakenEL ?></td>
                      <td></td>
                      <td>Other<br> अन्य <span style="padding-left:65%;"><?php echo  $Otherallowance_Con_SA ?></span>
                      </td>
                      <td style="text-align:center; padding-top:20px"><?php echo  $Otherallowance_Con_SA ?></td>
                      <td></td>
                      <td>ADVANCE<br> अग्रिम
                      <span style="padding-left:90%;"><?php echo  $Salary_Advance  ?></span>
                      </td>
                   </tr>
                   <tr>
                      <td>CL <br>आकस्मिक अवकाश</td>
                      <td style="text-align:center; padding-top:20px"><?php echo   $CL ?></td>
                      <td></td>
                      <td>Daily Allowance <span style="padding-left:78%;"><?php echo  $DailyAllowanance?></span>
                      </td>
                      
                      <td style="text-align:center; padding-top:20px"><?php echo $DailyAllowanance ?></td>
                      <td></td>
                      <td>TDS <br> स्रोत पर कर कटौती
                         <span style="padding-left:90%;"><?php echo   $TDS ?></span>
                      </td>
                   </tr>
                   <tr>
                      <td>SL <br> बीमारी के लिए अवकाश</td>
                      <td><?php echo   $Totalsickleave ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                   </tr>
                   <tr>
                      <td>COFF</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                   </tr>
                   <tr>
                      <td>
                         <p>OL</p>
                         <p>AB</p>
                      </td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                   </tr>
                   <tr>
                      <td colspan="8">
                         <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="row">
                               <div class="col-xl-3 col-lg-3 col-md-3">
                                  Payable Days / देय दिन
                                  <strong><span style="padding-left:50px;"><?php echo $Totaldays ?></span></strong>
                               </div>
                               <div class="col-xl-3 col-lg-3 col-md-3">
                                  Total Rate / कुल दर
                                  <strong><span style="padding-left:50px;"><?php echo $EarnedWages ?></span></strong>
                               </div>
                               <div class="col-xl-3 col-lg-3 col-md-3" style="padding-left:2px;">
                                  Gross / कुल
                                  <strong><span style="padding-left:5px;"><?php echo $Gross_Salary  ?></span></strong>
                                  <strong><span style="padding-left:30px;">0.00</span></strong>
                               </div>
                               <div class="col-xl-3 col-lg-3 col-md-3">
                                  Deductions / कटौती
                                  <strong><span style="padding-left:20px;"><?php echo $TotalDeduction  ?></span></strong>
                               </div>
                            </div>
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td colspan="9"><strong>Rs.<?php echo convertNumber($NetWages);  ?>Only</strong>
                      </td>
                   </tr>
                   <tr>
                      <td colspan="9">
                         <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="row">
                               <div class="col-xl-6 col-lg-6 col-md-6">
                               Authorised Signatory / अधिकृत हस्ताक्षरकर्ता
                               </div>
                               <div class="col-xl-6 col-lg-6 col-md-6 sign" >
                               Employee's Signature / कर्मचारी के हस्ताक्षर
                               </div>
                            </div>
                         </div>
                      </td>
                   </tr>
                </tbody>
             </table>
             
             </div>
            
            
        
             <p style="page-break-after: always;"></p>
         <?php
            }
            
            ?>
      </div>
   </body>
</html>