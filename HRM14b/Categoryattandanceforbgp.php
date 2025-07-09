<!DOCTYPE html moznomarginboxes mozdisallowselectionprint>
<html lang="en">
 <head> 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
.at-box{margin: 0px 20px}
.at-header h3,
.at-header h4,
.at-header h5{
margin: 3px 0;
}

.at-table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 12px;
}

.at-table td, 
.at-table th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
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
<div class="at-box">
<div class="at-header">
    <h3>BRITANNIA LABELS INDIA PVT LTD</h3>
    <h4>PLOT NO-1705, SECTOR-38, RAI INDUSTRIAL AREA, SONIPAT HARYANA-131029</h4>
    <h5>Attendance Register for the month of <?php echo "$month - $year"; ?></h5>
</div>

<div class="at-info">
    <p>1.In Time 2.Out Time 3.Total working hours 4.Late Hours 5.O.T.hours 6.Attendance status</p>
</div>
</div>
<div align="center">
<table class="at-table" border="1" width="95%">
<?php
    // $first_day_this_month = date('m-01-Y'); // hard-coded '01' for first day
    // $last_day_this_month  = date('m-t-Y');
?>
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

        // dk edit

?>

<?php 
$Date_num = substr($Date, 0,2);

echo "<td>$Date_num</td>"; 
?>



<?php
$sno++;}
?>
<?php
}
?>
<?=@$trow ?>   

    
</table>















<p style="page-break-after: always;"></p>
</div>  
    
    </div>



  </body>
</html>
