

<!DOCTYPE html moznomarginboxes mozdisallowselectionprint>
<html lang="en">

 <head> 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.break 
{ 
page-break-before: always;
 

 }
 .title{
    background-color:lightgrey;
   
   
 }

 .textright{
    text-align:right;
}
 
table tr .clean {
    border-left: 0px solid #FFFFFF !important;
    border-bottom: 0px solid #FFFFFF !important;
	border-right: 0px solid #FFFFFF !important;	    
}
table tr .total-clean {
    border: 0px solid #FFFFFF !important;
}

@media print {
	@page { margin: 0 ;
        }
    #data_to_image_btn {
        display :none;
       ;
    }
	
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
    //var cat_name = $("#multiple-checkboxes").val();
    $month = $_POST['month'];
    $nmonth = date('m', strtotime($month));
    $year = $_POST['year'];
    // $type_name = $_POST['cat_name'];
    // $fdaymonth = $year . '-' . $nmonth . '-01';
    // $ldaymonth = $year . '-' . $nmonth . '-31';
    // $ldaymonth = date("Y-m-d", strtotime("+1 month", strtotime($fdaymonth)));
    $d = date('Y-m-d', strtotime("$year-$nmonth-01"));
    $fdaymonth = date('Y-m-01', strtotime($d));
    $ldaymonth = date('Y-m-t', strtotime($d));
}
$Departmentname = $_POST['cat_name'];
$Categoryarray = implode(',', $Departmentname);
$Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
$Category = str_replace(",", "','", "$Categoryarray");
$query = "SELECT * FROM indsys1017employeemaster where EmpActive IN('Active','Deactive') AND (DATE(Leftdate) >'$fdaymonth'   OR Leftdate IS NULL)  AND Clientid='$Clientid'  AND Type_Of_Posistion in(" . $Category . ")  AND DATE(Date_Of_Joing) < '$ldaymonth'  ORDER BY Employeeid";
$retval = mysqli_query($conn, $query);
?>
	
	<body>
    <div class="row">
             <div class="col-md-12">
                <div class="mt-2 mb-2">
                    <button onclick="window.print()" id="printbtn" style="font-size:18px; background-color:#31A569; color:white;">Print <i class="fa fa-print"></i></button>
               
                </div>
             </div>
     </div>
  
 <div id="pdfExport">
     
        
<?php
$emp_id = array();
while ($row = mysqli_fetch_array($retval)) {
    $emp_id[] = $row;
    $date_of_joining = $row['Date_Of_Joing'];
    // echo    $date_of_joining;
    $allow_ot = $row['Allow_OT'];
}
foreach ($emp_id as $row) {
    $overAllLopMin = 0;
    $emp_id = $row['Employeeid'];
    $Category = $row['Type_Of_Posistion'];
    $date_of_joining = $row['Date_Of_Joing'];
    $sql_perform_att = " SELECT * FROM indsys1030empdailyattendancedetail WHERE Employeeid = '$emp_id' AND Clientid='$Clientid'";
    //echo $sql_perform_att;
    //$sqlQuery = mysqli_query($conn,$sql_perform_att);
    $sqlQuery = mysqli_query($conn, $sql_perform_att);
    while ($row = mysqli_fetch_array($sqlQuery)) {
        $emp_id = $row['Employeeid'];
        $Department = $row['Department'];
        $Title = $row['Title'];
        $Firstname = $row['Firstname'];
        $lastname = $row['lastname'];
        $Designation = $row['Designation'];
        $Intime = $row['Intime'];
        $Outtime = $row['Outtime'];
        $OTIntime = $row['OTIntime'];
        $OTOuttime = $row['OTOuttime'];
        $Actualworkinghours = $row['Actualworkinghours'];
        $ActualOt_HRS = $row['ActualOt_HRS'];
    }
    //echo $emp_id;
    
?>

<div align="center">

<table border="1" width="95%"  height="93%" cellpadding="0" cellspacing="0" style="font-size:12px">
<h3>BRITANNIA LABELS INDIA PVT LTD</h3>Attendance Report

<tr>
<td align="center" style="font-size:16px" colspan="2" style="width: 75px !important">
<?php
    echo "$month- $year"; ?>
</td>
<td colspan="4" align="center">
<h3>IN & OUT REPORT</h3>	
</td>
<td colspan="6">
<font size="1">
EMPLOYEE CODE :&nbsp;&nbsp;&nbsp;<b><?php echo $emp_id; ?></b>
</br>
EMPLOYEE NAME :&nbsp;&nbsp;&nbsp;<b><?php echo "$Title $Firstname $lastname"; ?></b>
</br>
DEPARTMENT :&nbsp;&nbsp;&nbsp;<b><?php echo $Department; ?>

</b>
</br>
DESIGNATION :&nbsp;&nbsp;&nbsp;<b><?php echo $Designation; ?></b>
</font>
</td>
</tr>
<?php
    // $first_day_this_month = date('m-01-Y'); // hard-coded '01' for first day
    // $last_day_this_month  = date('m-t-Y');
    
?>
	<tr align="center">

</tr>
<tr>
</tr>
<tr>
<td colspan="11">

</td>
</tr>
<tr>
</tr>
<tr>
<td colspan="2" class="title" >

</td>
<td colspan="2" class="title" align="center">
SHIFT TIMINGS
</td>
<!-- <td colspan="2" bgcolor="#31A569">
Break TIME
</td> -->
<td colspan="2"  class="title" align="center">
OT
</td>

<td colspan="2"  class="title" align="center">
Worked Hrs
</td>
<td colspan="2" class="title">
</td>
<td colspan="2" class="title">
</td>
</tr>
<tr>
<td style="width:10px !important;"  class="title" align="center">
SNO
</td>
<td style="width:75px !important;" class="title" align="center">
DATE
</td>
<td style="width:75px !important;"  class="title" align="center">
IN
</td>
<td style="width:75px !important;" class="title" align="center">
OUT
</td>

<td style="width:75px !important;" class="title" align="center">
IN
</td>
<td style="width:75px !important;" class="title" align="center">
OUT
</td>
<td style="width:75px !important;" class="title" align="center">
Reg Hrs
</td>
<td style="width:75px !important;" class="title" align="center">
Act Hrs
</td> 

<td style="width:75px !important;" class="title" align="center">
LOP
</td> 

<td style="width:75px !important;" class="title" align="center">
OT Hrs
</td>
<td style="width:75px !important;" class="title" align="center">
Remarks
</td>
</tr>

<?php
    $sno = 1;
    $reghrs = 8;
    $CL = "";
    $Nationalholidays = "";
    $Workingdays = "";
    $Workeddays = "";
    $Leavedays = "";
    $Totalpayabledays=0;
    $CountCL = 0;
    $CountSL = 0;
    $TotalCLSL =0;
    $CountAbsent = 0;
    $Nationalholidays=0;
    // $no_of_date_month = weekOfMonth($year,$month,1);
    //$no_of_date_month = cal_days_in_month(CAL_GREGORIAN,$month, $year);
    // $month=11;
    // $year=2016;
    $sql = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and AttenStatus='P' and Empattendencestatus='Close' AND Clientid='$Clientid'";
    //echo $sql;
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        $CountPresentDays = $row['Count(AttenStatus)'];
      
        
    }

    $sqlAB = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and AttenStatus='A' and Empattendencestatus='Close' AND Clientid='$Clientid'";
    //echo $sql;
    $resultAB = $conn->query($sqlAB);
    while ($rowAB = mysqli_fetch_array($resultAB)) {
        $CountAbsent = $rowAB['Count(AttenStatus)'];
      
        
    }
    $sqlHD = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id'    and AttenStatus='HD' and Empattendencestatus='Close' AND Clientid='$Clientid'";
    $resultHD = $conn->query($sqlHD);
    while ($rowHD = mysqli_fetch_array($resultHD)) {
        $CountHalfDay = $rowHD['Count(AttenStatus)'];
       
    }
    $sqlOD = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id'    and AttenStatus='OD' and Empattendencestatus='Close' AND Clientid='$Clientid'";
    $resultOD = $conn->query($sqlOD);
    while ($rowOD = mysqli_fetch_array($resultOD)) {
        $CountOD = $rowOD['Count(AttenStatus)'];
        
        
    }
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
    $sqlSLPart = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id'  and Empattendencestatus='Close' and AttenStatus='SL1/P'";
    $resultSLPart = $conn->query($sqlSLPart);
    while ($rowSL1stPart = mysqli_fetch_array($resultSLPart)) {
        $CountSL1stpart = $rowSL1stPart['Count(AttenStatus)'];
    }
    $sqlSL2Part = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and Empattendencestatus='Close' and AttenStatus='P/SL2'";
    $resultSL2Part = $conn->query($sqlSL2Part);
    while ($rowSL2ndPart = mysqli_fetch_array($resultSL2Part)) {
        $CountSL2ndpart = $rowSL2ndPart['Count(AttenStatus)'];
    }
    $sqlCLPart = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id'  and Empattendencestatus='Close' and AttenStatus='CL1/P'";
    $resultCLPart = $conn->query($sqlCLPart);
    while ($rowCL1stPart = mysqli_fetch_array($resultCLPart)) {
        $CountCL1stpart = $rowCL1stPart['Count(AttenStatus)'];
    }
    $sqlCL2Part = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and Empattendencestatus='Close' and AttenStatus='P/CL2'";
    $resultCL2Part = $conn->query($sqlCL2Part);
    while ($rowCL2ndPart = mysqli_fetch_array($resultCL2Part)) {
        $CountCL2ndpart = $rowCL2ndPart['Count(AttenStatus)'];
    }
    $TotalAbsent =  $HalfDaycount+$CountAbsent ;
    


    $sqlSL = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and AttenStatus='SL' and Empattendencestatus='Close'AND Clientid ='$Clientid'";
   
       $resultSL = $conn->query($sqlSL);

          while($rowSL = mysqli_fetch_array($resultSL)){
          $CountSL= $rowSL['Count(AttenStatus)'];
    
       }


  
$sqlCL= "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and AttenStatus='CL' and Empattendencestatus='Close'AND Clientid ='$Clientid'";
   
$resultCL = $conn->query($sqlCL);

while($rowCL = mysqli_fetch_array($resultCL)){
  $CountCL= $rowCL['Count(AttenStatus)'];
    
}




    $SLHalfday = 0;
    $CLHalfday = 0;
    $SLHalfday02 = 0;
    $CLHalfday02 =0;
    $SLHalfday = $CountSL1stpart + $CountSL2ndpart;
    $CLHalfday = $CountCL1stpart + $CountCL2ndpart;
    if ($SLHalfday == 0) {
    } else {
        $SLHalfday02 = $SLHalfday / 2;
    }
    if ($CLHalfday == 0) {
    } else {
        $CLHalfday02 = $CLHalfday / 2;
    }


   

    $TotalCLSL = $CountCL+$CountSL+$SLHalfday02+$CLHalfday02;

   

    
    $Workeddays = $CountPresentDays + $HalfDaycount + $CountOD +$SLHalfday02+$CLHalfday02;
    if (empty($Workeddays)) {
        $Workeddays = 0;
    }
    $Workeddays = $Workeddays;


    
    $sqlweek = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and  Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and Empattendencestatus='Close' and AttenStatus='WO'";
            
    $resultweek = $conn->query($sqlweek);
    while ($rowweek = mysqli_fetch_array($resultweek)) {
      $totsundays = $rowweek['Count(AttenStatus)'];                 
        
    }
    $sqlNH = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id'  and Empattendencestatus='Close' and AttenStatus='H'";
            
    $resultNH = $conn->query($sqlNH);
    while ($rowNH = mysqli_fetch_array($resultNH)) {
        $Nationalholidays = $rowNH['Count(AttenStatus)'];          
        
    }

    $sqlworkinghrs = "SELECT SUM(HOUR(REPLACE(Workinghours, '.', ':'))*60+MINUTE(REPLACE(Workinghours, '.', ':'))) as WorkinghoursHRM from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and Empattendencestatus='Close' AND Clientid='$Clientid'";
    //  echo $sqlworkinghrs;
    $resultwkhrs = $conn->query($sqlworkinghrs);
    while ($rowwkhrs = mysqli_fetch_array($resultwkhrs)) {
        $TotalWorkingHRS = $rowwkhrs['WorkinghoursHRM'];
        $TotalWorkingHRS = getHoursAndMins($TotalWorkingHRS);
        $TotalWorkingHRS = substr(str_replace(':', '.', $TotalWorkingHRS), 0, 5);
       
        
    }
    if (empty($TotalWorkingHRS)) {
        $TotalWorkingHRS = 0;
    }
    $periods = date("m/M/Y", strtotime("01-" . $month . '-' . $year));
    $result = mysqli_query($conn, "select Count(*) as total from vwholidaymaster where Monthname ='$month' and Year = '$year' and Dayname!='Sunday' AND Clientid ='$Clientid'");
    //echo  $result;
    $row = mysqli_fetch_array($result);
    $Nationalholiday = $row['total'];
    $month_num = date("m", strtotime($month));
    $year_num = $year;
    $Fromdate = date("01-$month_num-$year");
    $Todate = date("t-$month_num-$year", strtotime($Fromdate));
    $monthof1stday = date("$year-$month_num-01");
    $monthoflastday = date("$year-$month_num-t");
    // $Fromdate= date('01-m-Y');
    // $Todate=  date('t-m-Y',strtotime($Fromdate));
    $Startdate = new DateTime($Fromdate);
    $Enddate = new DateTime($Todate);
    $no = 0;
    $date = date("Y-m-d H:i:s");
    $interval = DateInterval::createFromDateString('1 day');

    $sundays = 0;
 
    $numOfDays = dateDiffInDays($Fromdate, $Todate);
    $Working_Days = ($numOfDays + 1) ;
    // $numOfDays=dateDiffInDays($Fromdate,$Todate);
    // $Working_Days = ($numOfDays+1) - $no;
    $Workingdays = $Working_Days;
    $Totaldays = $Workeddays+$totsundays+$Nationalholidays+$TotalCLSL;
    

     
    
 
  
 



 
    
    
    
    $Totalpayabledays = $Totaldays;


  


  
    $result = get_attendance($conn, $emp_id, $Clientid, $periods, $date_of_joining);
    foreach ($result as $row) {
        $Intime = $row["Intime"];
        $Attendencedate = $row["Attendencedate"];
        $Outtime = $row["Outtime"];
        $OTIntime = $row["OTIntime"];
        $OTOuttime = $row["OTOuttime"];
        $Workinghours = $row["Workinghours"];
        $ActualOt_HRS = $row["OT_HRS"];
        $AttenStatus = $row["AttenStatus"];
        $Lophrs = $row['Lophrs'];
        $Date = date("d-m-Y", strtotime($Attendencedate));
        $Workinghours = $row["Workinghours"];
        
        $sqlLOP = "SELECT  SUM(HOUR(REPLACE(Lophrs, '.', ':'))*60+MINUTE(REPLACE(Lophrs, '.', ':'))) as LophrsHRM from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and Empattendencestatus='Close' AND Clientid='$Clientid'";
        $resultLOP = $conn->query($sqlLOP);
        while ($row = mysqli_fetch_array($resultLOP)) {
            $LophrsTot = $row['LophrsHRM'];
            $LophrsTot = getHoursAndMins($LophrsTot);
            $LophrsTot = substr(str_replace(':', '.', $LophrsTot), 0, 5);
        }
        if (empty($LophrsTot)) {
            $LophrsTot = 0;
        }

        if($Category=='Category 3')
        {

        }
        else
        {
            $LophrsTot ="0.00";
            $Lophrs="0.00";
        }
?>
	<tr>
		<td><?=@$sno ?></td>
		<td ><?php echo $Date ?></td>
		<td class="textright"><?php echo $Intime ?></td>
		<td class="textright"><?php echo $Outtime ?></td>
		<td class="textright"><?php echo $OTIntime ?></td>
		<td class="textright"><?php echo $OTOuttime ?></td>
		<td class="textright" style="background:#D3D3D3 !important;"><?php
        $dt = $Attendencedate;
        $dt1 = strtotime($dt);
        $dt2 = date("l", $dt1);
        $dt3 = strtolower($dt2);
      
            
                if ($AttenStatus == 'P') {
                    echo "$reghrs";
                } else echo "";
            
        ?></td>
		<td class="textright"><?php echo $Workinghours ?></td>
		
		<td class="textright"><?php
        $sql_holcheck = "SELECT Type_Of_Posistion,Allow_OT FROM indsys1017employeemaster WHERE Employeeid = '$emp_id' AND Clientid='$Clientid'";
        //echo $sql_holcheck;
        $result_Nextno = $conn->query($sql_holcheck);
        if (mysqli_num_rows($result_Nextno) > 0) {
            while ($row = mysqli_fetch_array($result_Nextno)) {
                $Type_Of_Posistion = $row['Type_Of_Posistion'];
                $Allow_OT = $row['Allow_OT'];
                //echo $Type_Of_Posistion;
                
            }
        }
        echo $Lophrs;
?></td> 
		
		<td class="textright">
      <?php
     
            echo $ActualOt_HRS;
       
        $sqlOT = "SELECT SUM(HOUR(REPLACE(OT_HRS, '.', ':'))*60+MINUTE(REPLACE(OT_HRS, '.', ':'))) as OTHRSHM from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and Empattendencestatus='Close' AND Clientid='$Clientid'";
        $resultOT = $conn->query($sqlOT);
        while ($row = mysqli_fetch_array($resultOT)) {
            $ActualOt_HRS = $row['OTHRSHM'];
            $ActualOt_HRS = getHoursAndMins($ActualOt_HRS);
            $ActualOt_HRS = substr(str_replace(':', '.', $ActualOt_HRS), 0, 5);
        }
        if (empty($ActualOt_HRS)) {
            $ActualOt_HRS = 0;
        }
?>
        
        
        
       </td>
       <td><?php {
            $sql_weekoff = "SELECT Week_Off FROM indsys1017employeemaster WHERE Employeeid = '$emp_id' AND Clientid='$Clientid'";
            // echo $sql_weekoff;
            $result_weekoff = $conn->query($sql_weekoff);
            if (mysqli_num_rows($result_weekoff) > 0) {
                while ($row = mysqli_fetch_array($result_weekoff)) {
                    $Week_Off = $row['Week_Off'];
                }
            }
            $dt = $Attendencedate;
            $dt1 = strtotime($dt);
            $dt2 = date("l", $dt1);
            $dt3 = strtolower($dt2);
            $Holidaydetail="";
                $sql_holcheck = "SELECT * FROM indsys1012holidaymaster WHERE Holidaydate = '$Attendencedate' AND Clientid='$Clientid'";
           
                $result_Nextno = $conn->query($sql_holcheck);
                if (mysqli_num_rows($result_Nextno) > 0) {
                    while ($row = mysqli_fetch_array($result_Nextno)) {
                       
                            if ($AttenStatus == 'H') {
                                $Holidaydetail = $row['Holidaydetail'];
                            } 
                       
                        echo $Holidaydetail;
                    }
                } 
            
            ////....HD and OD check..../////
         
       
          
                $sql_attencheck= "SELECT * FROM indsys1035attenstatusmaster WHERE AttenStatus = '$AttenStatus' AND Clientid='$Clientid'";
                //echo $sql_holcheck;
                $result_attencheck = $conn->query($sql_attencheck);
                if (mysqli_num_rows($result_attencheck) > 0) {
                    while ($rowattencheck = mysqli_fetch_array($result_attencheck)) {
                        if($AttenStatus=='P' || $AttenStatus=='H')
                        {

                        }
                        else
                        {
                        echo $rowattencheck['AttenStatusdetail'];
                        }
                    }
                }
                
            
        }
?></td></tr>
	</tr>
	<?php
        $sno++;
    }
?>

<tr></tr>
<tr></tr>
<tr></tr>
<tr>
<th></th>
<th>Total Days</th>
<th>Total Present</th>
<th>Total Absent</th>
<th>Total CL/SL</th>
<th>Total Payable Days</th>
<th>Holiday Count</th>
<th>Total Working Hrs</th>
<th>Total LOP Hrs

</th> <th>
<?php
    
        echo "Total OT Hrs ";
    ?>
   


</th><th>Week Off Count</th>

</tr>
<tr>
<th></th>
<th><?php echo $Workingdays; ?></th>
<th><?php echo $Workeddays; ?></th>
<th><?php echo $TotalAbsent; ?></th>
<th><?php echo $TotalCLSL; ?>
<th><?php echo $Totalpayabledays; ?></th>
<th><?php echo $Nationalholidays; ?></th>
<th><?php echo $TotalWorkingHRS ?></th>
<th> <?php
    echo $LophrsTot;
?></th> <th><?php
   
        echo $ActualOt_HRS;
 
?>
</th><th><?php echo $totsundays; ?></th>

</tr>


			

	
		
   
<?php
}
?>
<tr><?=@$trow ?></tr>	

	

</table>
<p style="page-break-after: always;"></p>
</div>	
	
    </div>



  </body>
</html>
