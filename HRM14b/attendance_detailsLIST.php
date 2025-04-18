<?php
session_start();
include '../config.php';
$Clientid =$_SESSION["Clientid"];
function getHoursAndMins($time, $format = "%02d:%02d")
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = $time % 60;
    return sprintf($format, $hours, $minutes);
}
?>

<!doctype html moznomarginboxes mozdisallowselectionprint>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Form</title>

<style type="text/css">
  
.holiday-table{
  font-size: 0.7rem;
}
/* table, th, td {
 text-align: center;
 
} */
@media print{@page {size: landscape}}

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
    $month = $_POST['month'];
    $nmonth = date('m', strtotime($month));
    //echo  $nmonth;
    $year = $_POST['year'];

    $cat_name = $_POST['catname'];
    $fdaymonth = date("$year-$nmonth-01");
    //echo "$fdaymonth";
    // $ldaymonth = date("$year-$nmonth-t");
     
    // $ldaymonth = date("Y-m-d", strtotime("+1 month", strtotime($fdaymonth)));
    $d = date('Y-m-d',strtotime("$year-$nmonth-01"));

    $fdaymonth = date('Y-m-01',strtotime($d));
    $ldaymonth=date('Y-m-t',strtotime($d));
    // //echo "$ldaymonth <br>"; 
     $date = date('Y-m-d');
   
}

if ($ldaymonth > $date) {
  echo '<script>alert("NO DATA FOUND")</script>';
} else {



$query = "SELECT * from indsys1017employeemaster ";
$i = 0;
$selectedOptionCount = count($_POST['catname']);
$selectedOption = "";
while ($i < $selectedOptionCount) {
    $selectedOption = $selectedOption . "'" . $_POST['catname'][$i] . "'";
    if ($i < $selectedOptionCount - 1) {
        $selectedOption = $selectedOption . ", ";
    }
    
    $i ++;
}
$query = $query . " WHERE Type_Of_Posistion in (" . $selectedOption . ")  AND  EmpActive='Active' AND Clientid ='$Clientid' AND DATE(Date_Of_Joing) < '$ldaymonth' AND EmpActive IN('Active','Deactive') AND (DATE(Leftdate) >'$fdaymonth' OR Leftdate IS NULL)";
//echo $query;
$retval = mysqli_query($conn, $query);

?>

<?php

$begin = new DateTime($fdaymonth);
$end = (new DateTime($ldaymonth))->modify("+1 second");

$interval = DateInterval::createFromDateString("1day");
$period = new DatePeriod($begin,new DateInterval('P1D'), $end);

?>
 <?php
$emp_id = array();
while ($row = mysqli_fetch_array($retval)) {

    $emp_id[] = $row;
  
}
  
?>
<?php
$month = $_POST['month'];
$year = $_POST['year'];
?>
<body>
<div class="row" >
             <div class="col-md-12">
                <div class="mt-2 mb-5">
                    <button onclick="window.print()" id="printbtn" style="font-size:18px; background-color:#31A569; color:white;">Print <i class="fa fa-print"></i></button>
               
                </div>
             </div>
     </div>
  
 <div id="pdfExport">


<div>
<div class="row">
<div class="col-md-12">

<table border="2" width="100%"  height="90%" cellpadding="2" cellspacing="2" style="font-size:12px">
  <tbody>
    <tr class="text-center">
      <td colspan="50">
        <h6>BRITANNIA LABELS INDIA PVT LTD</h6>

        <p style="font-size:0.7rem;margin-bottom:1px;">No:471/3,Ramegoundempalaiyam,
Peruntholuvu Village,Tirupur-641665, India. TPR-22066  </p>

<p style="font-size:0.7rem;margin-bottom: 1px;"><b>Factories Act 1948 And TAMILNADU FACTORIES RULES 1950 (FORM NO 12 & 25) [Prescribed Under Rule 80 & 103]<br/>
Register of Adult Workers Men/Women Attendance Report for the Month of <?php echo"$month -$year";
?></b>  </p>
      </td>
    </tr>
    <tr>
      <th style="text-align: center" >S.No</th>
      <th style="text-align: center">Emp ID</th>
      <th style="text-align: center">EmpName</th>
      <!-- <th style="text-align: center">Department</th> -->
      <th style="text-align: center">Designation</th>
      <?php foreach ($period as $dt) {
    
    echo '<th>'.$dt->format("d").'</th>';
    
}?>
 
      <th style="text-align: center">P</th>
      <th style="text-align: center">A</th>
      <th style="text-align: center">WO</th>
      <th style="text-align: center">NH</th>
      <th style="text-align: center">EL</th>
      <th style="text-align: center">LOP</th>
      <th style="text-align: center">WD</th>
      <th style="text-align: center">OT Hrs</th>

    </tr>
   
      
    <?php 
       $sno = 0;
       
    
foreach ($emp_id as $row)
{
  $sno++;

   $emp_id = $row['Employeeid'];
   $Firstname = $row['Firstname'];
   $Department = $row['Department'];
   $Designation = $row['Designation'];
   //$date_of_joining = $row['Date_Of_Joing'];
   $sql_perform_att = "SELECT * FROM indsys1017employeemaster WHERE Employeeid  = '$emp_id' AND Clientid ='$Clientid'";

   $sqlQuery = mysqli_query($conn, $sql_perform_att);
   while ($row = mysqli_fetch_array($sqlQuery)) {
   
       $emp_id = $row['Employeeid'];
       $Department = $row['Department'];
       $Title = $row['Title'];
       $Firstname = $row['Firstname'];
       $Designation = $row['Designation'];
       $date_of_joining = $row['Date_Of_Joing'];
      
      
   }
   echo "<tr>";
   

   echo '<td>'.$sno.'</td>';
   echo '<td>'.$emp_id.'</td>';
   echo '<td>'.$Firstname.'</td>';
  //  echo '<td>'.$Department.'</td>';
   echo '<td>'.$Designation.'</td>';
   
    
 

  
  

?>
<?php
 
 
 $start_date = date_create($fdaymonth);
 $end_date = date_create($ldaymonth)->modify("+1 second");;
 $interval = new DateInterval("P1D");
 $date_range = new DatePeriod(
     $start_date,
     $interval,
 
     $end_date
 ); 
    
   
    
    foreach ($date_range as $rowdate) {

    // echo($rowdate->format("d-m-Y"));  echo "<br>";
    
      $atten= $rowdate->format("Y-m-d ");
      
      $AttenStatus ="N";
        $attstatus = " SELECT * FROM vwattendenceclosestatus WHERE Employeeid = '$emp_id' and Attendencedate ='$atten' and Empattendencestatus='Close' AND Clientid ='$Clientid'" ;
        //echo"$attstatus<br>";
        $sqlQuery = mysqli_query($conn, $attstatus);
      
    
         while ($row = mysqli_fetch_array($sqlQuery)) {
          $AttenStatus = $row['AttenStatus'];
          
          
        
      }

      $fetchstatus = "Select * from indsys1030dailyattenstatus where AttenStatus='$AttenStatus' ";

 $fetchstatusresult = mysqli_query($conn, $fetchstatus);

 while ($row = mysqli_fetch_array($fetchstatusresult)) {

 $Attentypestatus = $row["Attentypestatus"];

}

$sqlHlD=  "SELECT * FROM `vwholidaymaster` WHERE Holidaydate='$atten' and Clientid ='$Clientid'";
//echo "$sqlHlD<br>";
$resulthld = $conn->query($sqlHlD);
while($rowhld = mysqli_fetch_array($resulthld)){


  $AttenStatus="N&LH";

}
      $dt = $atten;

 $dt1 = strtotime($dt);

 $dt2 = date("l", $dt1);

 $dt3 = strtolower($dt2);

    if ($dt3 == "sunday") {

    if($Attentypestatus=='P')

    {
      echo '<td>'.$AttenStatus.'</td>';
    }

    else
    echo '<td>WO</td>';

    }

    else{

    echo '<td>'.$AttenStatus.'</td>';

    }

 }
     
    

      

    
    
    
    $fdate= date("$year-$nmonth-01");

    $ldate = date("$year-$nmonth-t");
    //$ldate = date("Y-m-d", strtotime("+1 month", strtotime($fdate)));
    $ldate = date("Y-m-t", strtotime($fdate));

    $sql = "SELECT Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id' and AttenStatus='P' and Empattendencestatus='Close' AND Clientid ='$Clientid'";
   // echo "$sql<br>";exit;
      $result = $conn->query($sql);
       while($row = mysqli_fetch_array($result)){
      
    $CountPresentDays= $row['Count(AttenStatus)'];
    //echo $CountPresentDays;
   
 
    

       
      
      }
     
      $sqlHD = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id' and AttenStatus='HD' and Empattendencestatus='Close'AND Clientid ='$Clientid'";
     
      $resultHD = $conn->query($sqlHD);
      
      while($rowHD = mysqli_fetch_array($resultHD)){
        $CountHalfDay= $rowHD['Count(AttenStatus)'];
          
       
        
      }
  
      $sqlOD = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id' and AttenStatus='OD' and Empattendencestatus='Close' AND Clientid ='$Clientid'";
      $resultOD = $conn->query($sqlOD);
      
      while($rowOD = mysqli_fetch_array($resultOD)){
        $CountOD= $rowOD['Count(AttenStatus)'];
          
        
        
      }
  
      if(empty($CountPresentDays))
      {
        $CountPresentDays=0;
      }
  
      if(empty($CountOD))
      {
        $CountOD=0;
      }
      if(empty($CountHalfDay))
      {
        $CountHalfDay=0;
      }
  
      $HalfDaycount=0;
      if($CountHalfDay ==0)
      {
        $HalfDaycount=0;
      }
      else
      {
        $HalfDaycount=$CountHalfDay/2;
      }
      $Workeddays = $CountPresentDays+$HalfDaycount+$CountOD;
  
      if(empty($Workeddays))
      {
        $Workeddays = 0;
      }
  
      $Workeddays = $Workeddays;
      //echo "$Workeddays <br>";
     


    

      $sqlabs = "SELECT Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id' and AttenStatus='A' and Empattendencestatus='Close' AND Clientid ='$Clientid'";

      $resultabs = $conn->query($sqlabs);
       while($row = mysqli_fetch_array($resultabs)){
      
    $CountAbsentDays= $row['Count(AttenStatus)'];
  
      
      }




      
   
  $sundays=0; 
  $total_days=cal_days_in_month (CAL_GREGORIAN, $nmonth, $year); 
  for ($i=1;$i<=$total_days;$i++) 
  if (date ('N',strtotime ($year.'-'.$nmonth.'-'.$i))==7) $sundays++;
  $totsundays = $sundays;
  

  $d=cal_days_in_month(CAL_GREGORIAN,$nmonth,$year);
$workingdays =  $d - $totsundays;
//echo $workingdays;exit;



 $periods = date("m/M/Y", strtotime("01-" . $month . '-' . $year));

   $result = mysqli_query($conn, "select Count(*) as total from vwholidaymaster where Monthname ='$month' and Year = '$year' and Dayname!='Sunday' AND Clientid ='$Clientid'");
  $row = mysqli_fetch_array($result);
  $Nationalholiday = $row['total'];




  $monthof1stday =date("$year-$nmonth-01");

  $monthoflastday=date("$year-$nmonth-t");

  
$Totaldays = $Workeddays+$Nationalholiday;

$Leavedays = ($workingdays - $Totaldays);
//echo "$Leavedays <br>";


  $TakenEL=0;
  $BalanceEL=0;
  $CL="1.5";
  $date = date("Y-m-d" );
  
  
  $date1 = new DateTime($date_of_joining);
  
  $date2 = new DateTime($monthoflastday);
  
  $dateofjoingdays = $date2->diff($date1)->format("%a"); 
  $dateofjoingdays= $dateofjoingdays+1;
  
  
  
  $earlier = new DateTime($monthof1stday);
  $later = new DateTime($monthoflastday);
  
  $abs_diff = $later->diff($earlier)->format("%a");
  
  $abs_diff=$abs_diff+1;
  if($dateofjoingdays<=$abs_diff)
  {
   //Echo "$emp_id<br/>";
  
  
    if($monthof1stday == $date_of_joining)
    {
      $CL="1.5";
    }
    else
    {
      $CL="0";
    }
  
  
    $sqlHDND = "SELECT Count(*) as total from vwholidaymaster where Month ='$nmonth' and Year = '$year' and Dayname!='Sunday' AND DATE(Holidaydate) >='$date_of_joining' AND Clientid='$Clientid'";
  
  
    $resultHDND = $conn->query($sqlHDND);
 
    while($rowHDND = mysqli_fetch_array($resultHDND)){
      $Nationalholidaydoj= $rowHDND['total'];
      $Nationalholiday = $Nationalholidaydoj;
  
  
    }
 

  }
  
  if($Workeddays==0)
  {
  $Totaldays = 0;
  }
  else{
  $Totaldays = $Workeddays+$Nationalholiday;
  $Leavedays = ($workingdays - $Totaldays);
  }
  
  if($Workeddays == 0)
  {
    $Lop = $Leavedays;
    $TakenEL=0;
    $BalanceEL=0;
  }
  else
  {
  $Lop=Max(($Leavedays-$CL),0);
  }
  //$Lop=Max(($Leavedays-$CL),0);

  
  
  if($CL > $Leavedays)
  {
  $TakenEL=$Leavedays;
  $BalanceEL = $CL-$TakenEL;
  }
  else
  {
  $TakenEL=$CL;
  $BalanceEL=0;
  }
  if($Leavedays<0)
  {
    $Leavedays=0;
  }
  if($Leavedays==0)
  {
  $TakenEL=0;
  $BalanceEL=$CL;
  }
  
  if($CL==0)
  {
  $TakenEL=0;
  $BalanceEL=0;
  }
  $LOP=$Lop;
  $Nationalholidays=$Nationalholiday;
  
  
  if($Workeddays == 0)
  {
   
    $TakenEL=0;
    $BalanceEL=0;
    $CL=0;
  }

 
  $sqlOT = "SELECT SUM(HOUR(REPLACE(OT_HRS, '.', ':'))*60+MINUTE(REPLACE(OT_HRS, '.', ':'))) as OTHRSHM from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id'     and Empattendencestatus='Close'";

  $resultOT = $conn->query($sqlOT);
  while($row = mysqli_fetch_array($resultOT)){
     $ActualOt_HRS= $row['OTHRSHM'];

     $ActualOt_HRS = getHoursAndMins($ActualOt_HRS);

     $ActualOt_HRS =  substr(str_replace(':', '.', $ActualOt_HRS), 0, 5);
  }
  
  if(empty($ActualOt_HRS))
  {
   $ActualOt_HRS=0;
  }







  echo '<td style="text-align: center">'.$Workeddays.'</td>';
  echo '<td style="text-align: center">'.$Leavedays.'</td>';
  echo '<td style="text-align: center">'.$totsundays.'</td>';
  echo '<td style="text-align: center">'.$Nationalholiday.'</td>';
  echo '<td style="text-align: center">'.$TakenEL.'</td>';
  echo '<td style="text-align: center">'.$LOP.'</td>';
  
  echo '<td style="text-align: center">'.$workingdays.'</td>';
  echo '<td style="text-align: center">'.$ActualOt_HRS.'</td>';

// $totaldays=$Workeddays+$CountAbsentDays;
// echo '<td>'.$totaldays.'</td>';

   echo "</tr>";
    }

   ?>

  
</tr>

  </tbody>
 
</table>

<p style="page-break-after: always;"></p>


<?php
}
?>
<!-- <p style="page-break-after: always;"></p> -->
</div>
</div>
</div>

</div>
 
  </div>


  </body>
 
</html>
