<?php

use PhpOffice\PhpSpreadsheet\Worksheet\Row;

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

.leaveatt {

background-color: #edebeb;
text-align: center;

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
    $nmonthnew = date('n', strtotime($month));
    $year = $_POST['year'];
    $cat_name = $_POST['catname'];
    $fdaymonth = date("$year-$nmonth-01");

  

   $ldaymonth = date("Y-m-d", strtotime("+1 month", strtotime($fdaymonth)));

  $d = date('Y-m-d',strtotime("$year-$nmonth-01"));
  $d = date('Y-m-d',strtotime("$year-$nmonth-01"));

  $fdaymonth = date('Y-m-01',strtotime($d));
  $ldaymonth=date('Y-m-t',strtotime($d));
   
 $ldaymonth = date("Y-m-d", strtotime("+1 month", strtotime($fdaymonth)));

   // echo "$ldaymonth <br>"; 
    $date = date('Y-m-d');
  // echo "date- $date";
}


/** Client Details **/
  $ClientAdrQry = "SELECT * FROM indsys1001clientmaster where Clientid ='$Clientid'  ORDER BY Clientid";
  $result_ClientAdrQry = $conn->query($ClientAdrQry);
  if (mysqli_num_rows($result_ClientAdrQry) > 0) {
      while ($row = mysqli_fetch_array($result_ClientAdrQry)) {
          $Clientname = $row['Clientname'];
          $Location = $row['Location'];
          $Phoneno = $row['Phoneno'];
          $Emailid = $row['Emailid'];
          $GSTN = $row['GSTN'];
          $Tin = $row['Tin'];
          $Emailpassword = $row['Emailpassword'];
          $Regnno = $row['Regnno'];
          $Panno = $row['Panno'];
          $AddressLine1 = $row['AddressLine1'];
          $AddressLine2 = $row['AddressLine2'];
          $AddressLine3 = $row['AddressLine3'];
          $Country = $row['Country'];
          $City = $row['City'];
          $Zipcode = $row['Zipcode'];
          $Website = $row['Website'];
          $ClientnameTamil = $row['ClientnameTamil'];
          $ClientnameHindi = $row['ClientnameHindi'];
          $ClientLogo = $row['ClientLogo'];
          $Place = $row['Place'];
      }
  }
    



// if($ldaymonth>=$date){
//   echo '<script>alert("NO DATA FOUND")</script>';
// }
// else
// {

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
$query = $query . " WHERE Type_Of_Posistion in (" . $selectedOption . ")  AND  EmpActive IN('Active','Deactive') AND (DATE(Leftdate) >'$fdaymonth'   OR Leftdate IS NULL) AND Clientid='$Clientid' AND DATE(Date_Of_Joing) < '$ldaymonth'";
//echo $query;
$retval = mysqli_query($conn, $query);

?>

<?php

$begin = new DateTime($fdaymonth);
$end = new DateTime($ldaymonth);

$interval = DateInterval::createFromDateString('1day');
$period = new DatePeriod($begin, $interval, $end);

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
  <div class="container-fluid">
<div class="row" >
             <div class="col-md-12">
                <div class="mt-2 mb-5">
                    <button onclick="window.print()" id="printbtn" style="font-size:18px; background-color:#31A569; color:white;">Print <i class="fa fa-print"></i></button>
               
                </div>
             </div>
     </div>
    </div>
 <div id="pdfExport">


<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<table border="2" width="100%"  height="90%" cellpadding="2" cellspacing="2" style="font-size:12px">
  <tbody>
    <tr class="text-center">
      <td colspan="50">
        

<?php echo "<h6>$Clientname</h6><p style='font-size:0.7rem;margin-bottom:1px;'>$AddressLine1, $AddressLine2<br/>$AddressLine3, $Place-$Zipcode, $Country.</p>";?>

<p style="font-size:0.7rem;margin-bottom: 1px;"><b><?php echo"$month -$year";
?></b>  </p>
      </td>
    </tr>
    <tr>
      <th class="leaveatt">S.No</th>
      <th class="leaveatt">Emp ID</th>
      <th class="leaveatt">EmpName</th>
      <!-- <th style="text-align: center">Department</th> -->
      <th class="leaveatt">Designation</th>
      <th style="text-align: center; background-color: #9fd4a9;">CL</th>
      <th style="text-align: center; background-color: #9fd4a9;">SL</th>
      <th style="padding: 10px;"></th>


      <?php foreach ($period as $dt) {
    
    echo '<th class="leaveatt">'.$dt->format("d").'</th>';
    
}?>
 
      <th class="leaveatt">P</th>
      <th class="leaveatt">A</th>
      <th class="leaveatt">WO</th>
      <th class="leaveatt">NH</th>
      <th class="leaveatt">EL</th>
      <th class="leaveatt">CL</th>
      <th class="leaveatt">SL</th>
      <th class="leaveatt">TOT</th>
      <th style="padding: 15px;"></th>
      <th style="text-align: center; background-color: #9fd4a9;">Balance CL</th> 
      <th style="text-align: center; background-color: #9fd4a9;">Balance SL</th>
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
//echo $sql_perform_att;exit;
   $sqlQuery = mysqli_query($conn, $sql_perform_att);
   while ($row = mysqli_fetch_array($sqlQuery)) {
   
       $emp_id = $row['Employeeid'];
       $Department = $row['Department'];
       $Title = $row['Title'];
       $Firstname = $row['Fullname'];
       $Designation = $row['Designation'];
       $date_of_joining = $row['Date_Of_Joing'];
       $Old_Empid=$row['Old_Empid'];
      
      
   }
   echo "<tr>";
   

   echo '<td>'.$sno.'</td>';
   echo '<td>'.$emp_id.'-'.$Old_Empid.'</td>';
   echo '<td>'.$Firstname.'</td>';
  //  echo '<td>'.$Department.'</td>';
   echo '<td>'.$Designation.'</td>';
   
    
   $sql_perform_leave = "SELECT * FROM indsys1030empmonthleavetakensummary WHERE Employeeid  = '$emp_id' AND Clientid ='$Clientid' AND AttendenceMonth='$nmonthnew' AND AttendenceYear='$year' ";


   $sqlQueryLeave = mysqli_query($conn, $sql_perform_leave);
   while ($row = mysqli_fetch_array($sqlQueryLeave)) {
   
       $BalanceCausalLeave = $row['TotalCausalLeave'];
       $BalanceSickLeave = $row['TotalSickLeave'];
     
      
   }

   echo '<td>'.$BalanceCausalLeave.'</td>';
   echo '<td>'.$BalanceSickLeave.'</td>';
   echo '<td style="text-align: center"></td>';

   
  

?>
<?php
 
 
    $start_date = date_create($fdaymonth);
    $end_date = date_create($ldaymonth);
    
    $interval = new DateInterval('P1D');
    $date_range = new DatePeriod($start_date, $interval, $end_date);
    
   
    
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
if($Clientid!=4)
{
$sqlHlD=  "SELECT * FROM `vwholidaymaster` WHERE Holidaydate='$atten' and Clientid ='$Clientid' and Dayname!='Sunday'";
//echo "$sqlHlD<br>";
$resulthld = $conn->query($sqlHlD);
while($rowhld = mysqli_fetch_array($resulthld)){
  $AttenStatus="N&LH";
}
}
$dt = $atten;

 $dt1 = strtotime($dt);

 $dt2 = date("l", $dt1);

 $dt3 = strtolower($dt2);

    if ($dt3 == "sunday") {

    // if($Attentypestatus=='P')

    // {
      echo '<td style="background-color:#fab9be">'.$AttenStatus.'</td>';
    //}

    // else
    // echo '<td style="background-color:#fab9be">WO</td>';

    }

    else{

    echo '<td>'.$AttenStatus.'</td>';

    }

 }
     
    

      

    
    
    
    $fdate= date("$year-$nmonth-01");

    $ldate = date("Y-m-t",strtotime($fdate));
   

    $sql = "SELECT Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id' and AttenStatus='P' and Empattendencestatus='Close' AND Clientid ='$Clientid'";
    //echo "$sql<br>";
      $result = $conn->query($sql);
       while($row = mysqli_fetch_array($result)){
      
    $CountPresentDays= $row['Count(AttenStatus)'];

   
 
    

       
      
      }
     
      $sqlHD = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id' and AttenStatus='HD' and Empattendencestatus='Close'AND Clientid ='$Clientid'";
     
      $resultHD = $conn->query($sqlHD);
      
      while($rowHD = mysqli_fetch_array($resultHD)){
        $CountHalfDay= $rowHD['Count(AttenStatus)'];
          
       
        
      }
      $CountCL=0;
      $CountCL1=0;
      $CountCL2=0;
//////////////////CL/////////////
      $sqlCL = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id' and AttenStatus='CL' and Empattendencestatus='Close'AND Clientid ='$Clientid'";
     
      $resultCL = $conn->query($sqlCL);
      
      while($rowCL = mysqli_fetch_array($resultCL)){
        $CountCL= $rowCL['Count(AttenStatus)'];
          
      }
      //CL1//
      $sqlCL1 = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id' and AttenStatus='CL1/P' and Empattendencestatus='Close'AND Clientid ='$Clientid'";
     
      $resultCL1 = $conn->query($sqlCL1);
      
      while($rowCL1 = mysqli_fetch_array($resultCL1)){
        $CountCL1= $rowCL1['Count(AttenStatus)'];
          
      }

      //CL2//
      $sqlCL2 = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id' and AttenStatus='P/CL2' and Empattendencestatus='Close'AND Clientid ='$Clientid'";
     
      $resultCL2 = $conn->query($sqlCL2);
      
      while($rowCL2 = mysqli_fetch_array($resultCL2)){
        $CountCL2= $rowCL2['Count(AttenStatus)'];
          
      }

 

      if($CountCL1 ==0)
      {
        $CLcount1=0;
      }
      else
      {
        $CLcount1=$CountCL1/2;
      }

      if($CountCL2 ==0)
      {
        $CLcount2=0;
      }
      else
      {
        $CLcount2=$CountCL2/2;
      }


      $TotalCLcount = $CountCL+$CLcount1+$CLcount2;

//////CL-END//
$CountSL=0;
$CountSL1=0;
$CountSL2=0;
/////////////////SL/////////////
$sqlSL = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id' and AttenStatus='SL' and Empattendencestatus='Close'AND Clientid ='$Clientid'";
   
$resultSL = $conn->query($sqlSL);

while($rowSL = mysqli_fetch_array($resultSL)){
  $CountSL= $rowSL['Count(AttenStatus)'];
    
}
//SL1//
$sqlSL1 = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id' and AttenStatus='SL1/P' and Empattendencestatus='Close'AND Clientid ='$Clientid'";

$resultSL1 = $conn->query($sqlSL1);

while($rowSL1 = mysqli_fetch_array($resultSL1)){
  $CountSL1= $rowSL1['Count(AttenStatus)'];
    
}

//SL2//
$sqlSL2 = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id' and AttenStatus='P/SL2' and Empattendencestatus='Close'AND Clientid ='$Clientid'";

$resultSL2 = $conn->query($sqlSL2);

while($rowSL2 = mysqli_fetch_array($resultSL2)){
  $CountSL2= $rowSL2['Count(AttenStatus)'];
    
}



if($CountSL1 ==0)
{
  $SLcount1=0;
}
else
{
  $SLcount1=$CountSL1/2;
}

if($CountSL2 ==0)
{
  $SLcount2=0;
}
else
{
  $SLcount2=$CountSL2/2;
}


$TotalSLcount = $CountSL+$SLcount1+$SLcount2;


//////SL-END//


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
      $Workeddays = $CountPresentDays+$HalfDaycount+$CountOD+$SLcount1+$SLcount2+$CLcount1+$CLcount2;
  
      if(empty($Workeddays))
      {
        $Workeddays = 0;
      }
  
      $Workeddays = $Workeddays;
      //echo "$Workeddays <br>";
     


    

     $sqlabs = "SELECT Count(AttenStatus) as overall_absent_count from vwattendenceclosestatus where Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id' and AttenStatus='A' and Empattendencestatus='Close' AND Clientid ='$Clientid'";
// $sqlabs="SELECT COUNT(*) as overall_absent_count
// FROM vwattendenceclosestatus AS a
// WHERE Clientid='$Clientid' and Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id'  and Empattendencestatus='Close' and AttenStatus='A'
//   AND NOT EXISTS (
//     SELECT 1
//     FROM vwholidaymaster AS h
//     WHERE h.Holidaydate = a.Attendencedate AND Clientid='$Clientid' and Dayname!='Sunday'
//   )";
      $resultabs = $conn->query($sqlabs);
       while($rowabs = mysqli_fetch_array($resultabs)){
      
    $CountAbsentDays= $rowabs['overall_absent_count'];
  
      
      }




      
   
  $sundays=0; 
  ///////////Working Week Off Commanded/////////
  // $total_days=cal_days_in_month (CAL_GREGORIAN, $nmonth, $year); 
  // for ($i=1;$i<=$total_days;$i++) 
  // if (date ('N',strtotime ($year.'-'.$nmonth.'-'.$i))==7) $sundays++;
  // $totsundays = $sundays;
  

  ///////////////Updated On 27-Sep-2023//////////////
  $sqlweek = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id'  and Empattendencestatus='Close' and AttenStatus='WO'";
            
                $resultweek = $conn->query($sqlweek);
                while ($rowweek = mysqli_fetch_array($resultweek)) {
                  $totsundays = $rowweek['Count(AttenStatus)'];                 
                    
                }

             
  

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
  
  
    // if($monthof1stday == $date_of_joining)
    // {
    //   $CL="1.5";
    // }
    // else
    // {
    //   $CL="0";
    // }
  
  
    $sqlHDND = "SELECT Count(*) as total from vwholidaymaster where Month ='$nmonth' and Year = '$year' and Dayname!='Sunday' AND DATE(Holidaydate) <='$date_of_joining' AND Clientid='$Clientid'";
  
  //echo "dsdfsd $sqlHDND ";
    $resultHDND = $conn->query($sqlHDND);
    
    while($rowHDND = mysqli_fetch_array($resultHDND)){
      $Nationalholidaydoj= $rowHDND['total'];
      $Nationalholiday = $Nationalholidaydoj;
  
  
    }
 

  }

  $sqlNH = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$fdate' and Attendencedate <='$ldate' and Employeeid = '$emp_id'  and Empattendencestatus='Close' and AttenStatus='H'";
            
  $resultNH = $conn->query($sqlNH);
  while ($rowNH = mysqli_fetch_array($resultNH)) {
      $Nationalholiday = $rowNH['Count(AttenStatus)'];          
      
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
    $Nationalholiday =0;
  }
  else
  {
  $Lop=Max(($Leavedays-$CL),0);
  }
  //$Lop=Max(($Leavedays-$CL),0);

  

  $LOP=$Lop;
  $Nationalholidays=$Nationalholiday;
  
  
  if($Workeddays == 0)
  {
   
    $TakenEL=0;
    $BalanceEL=0;
    $CL=0;
  }

 
  $sqlOT = "SELECT SUM(HOUR(REPLACE(OT_HRS, '.', ':'))*60+MINUTE(REPLACE(OT_HRS, '.', ':'))) as OTHRSHM from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id'     and Empattendencestatus='Close' AND Clientid='$Clientid'";

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


$Totworked=$Workeddays+$totsundays+$Nationalholiday+$TotalCLcount+$TotalSLcount;
$BalanceCL=$BalanceCausalLeave-$TotalCLcount;
$BalanceSL=$BalanceSickLeave-$TotalSLcount;
$TotalAbsent =  $HalfDaycount+$CountAbsentDays;


  echo '<td style="text-align: center">'.$Workeddays.'</td>';
  echo '<td style="text-align: center">'.$TotalAbsent.'</td>';
  echo '<td style="text-align: center">'.$totsundays.'</td>';
  echo '<td style="text-align: center">'.$Nationalholiday.'</td>';
  echo '<td style="text-align: center">'.$TakenEL.'</td>';
  echo '<td style="text-align: center">'.$TotalCLcount.'</td>';  
  echo '<td style="text-align: center">'.$TotalSLcount.'</td>';
  echo '<td style="text-align: center">'.$Totworked.'</td>';
  echo '<td style="text-align: center"></td>';
  echo '<td style="text-align: center">'.$BalanceCL.'</td>';
  echo '<td style="text-align: center">'.$BalanceSL.'</td>';

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
// }

?>
<!-- <p style="page-break-after: always;"></p> -->
</div>
</div>
</div>

</div>
 
  </div>


  </body>
 
</html>
