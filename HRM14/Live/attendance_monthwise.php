<?php
session_start();
include '../config.php';
include 'empAttendance.php';
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail=$_SESSION["Mailid"];
$Clientid =$_SESSION["Clientid"];
$AuthorizedType=  $_SESSION["Authorizedtype"];



?>

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
    $fdaymonth = $year . '-' . $nmonth . '-01';
    $ldaymonth = $year . '-' . $nmonth . '-31';
}

$Departmentname = $_POST['cat_name'];
$Categoryarray = implode(',', $Departmentname); 
$Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
$Category = str_replace(",","','","$Categoryarray");
$query = "SELECT * FROM indsys1017employeemaster where  EmpActive='Active' AND Clientid='$Clientid' AND Type_Of_Posistion in(". $Category.")  ORDER BY Employeeid";

// $query = "SELECT * from indsys1017employeemaster";
// $i = 0;
// $selectedOptionCount = count($_POST['cat_name']);
// $selectedOption = "";
// while ($i < $selectedOptionCount) {
//     $selectedOption = $selectedOption . "'" . $_POST['cat_name'][$i] . "'";
//     if ($i < $selectedOptionCount - 1) {
//         $selectedOption = $selectedOption . ", ";
//     }
    
//     $i ++;
// }
// $query = $query . " WHERE Type_Of_Posistion in (" . $selectedOption . ") and EmpActive='Active' ";
//echo $query;
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

foreach ($emp_id as $row)
 {
   $overAllLopMin=0;
   
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
<td align="center" style="font-size:16px" colspan="4" style="width: 75px !important">
<?php


   echo "$month- $year"; ?>
</td>
<td colspan="3" align="center">
<h3>IN & OUT REPORT</h3>	
</td>
<td colspan="5">
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
<!--<td align="center" >Date Between <?php //echo $first_day_this_month;
     ?>&nbsp;&nbsp;&nbsp;To&nbsp;&nbsp;&nbsp;<?php //echo $last_day_this_month;
     ?></td>  !----></tr>
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
    $CL ="";
    $Nationalholidays  ="";
    $Workingdays  ="";
    $Workeddays  ="";
    $Leavedays  ="";
    // $no_of_date_month = weekOfMonth($year,$month,1);
    //$no_of_date_month = cal_days_in_month(CAL_GREGORIAN,$month, $year);
    // $month=11;
    // $year=2016;
    



    $sql = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and AttenStatus='P' and Empattendencestatus='Close' AND Clientid='$Clientid'";
    //echo $sql;
    $result = $conn->query($sql);
    
    while($row = mysqli_fetch_array($result)){
      $CountPresentDays= $row['Count(AttenStatus)'];
        
      // $Workeddays=roundup($Workeddays);
      // $Workeddays=round($Workeddays,0);
      
    }

    $sqlHD = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id'    and AttenStatus='HD' and Empattendencestatus='Close' AND Clientid='$Clientid'";
    $resultHD = $conn->query($sqlHD);
    
    while($rowHD = mysqli_fetch_array($resultHD)){
      $CountHalfDay= $rowHD['Count(AttenStatus)'];
        
      // $Workeddays=roundup($Workeddays);
      // $Workeddays=round($Workeddays,0);
      
    }

    $sqlOD = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id'    and AttenStatus='OD' and Empattendencestatus='Close' AND Clientid='$Clientid'";
    $resultOD = $conn->query($sqlOD);
    
    while($rowOD = mysqli_fetch_array($resultOD)){
      $CountOD= $rowOD['Count(AttenStatus)'];
        
      // $Workeddays=roundup($Workeddays);
      // $Workeddays=round($Workeddays,0);
      
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



    // if($Category=="Category 3")
    // {
    //   $Workeddays = 0;
    //   $setworkinghrs =0;
    //   $logempcat3 = "SELECT * from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id'     and Empattendencestatus='Close' ";
	

    //   $logempallnew = mysqli_query($conn, $logempcat3);
    //   while($rownew = mysqli_fetch_array($logempallnew)) {
       
        
    //      $Workinghrs =$rownew['Workinghours'];


         
    //               if($Workinghrs>8)
    //                   {
    

    // //$OT_HRS = round($Workinghrs-8,2);

    //                 $Workinghrs=8;
    //           }
      
    //                  $calculatedworkinghrs = ($Workinghrs/2)*0.25;
         
       
    //      $Workeddays += $calculatedworkinghrs;
         
    //   }
    //   $Workeddaysround = floatval($Workeddays);
 
    //   // Use the number_format function to format the string
    //   $Workeddays = number_format($Workeddaysround, 1, '.', '');
       
     
    // }


    $sqlworkinghrs = "SELECT SUM(HOUR(REPLACE(Workinghours, '.', ':'))*60+MINUTE(REPLACE(Workinghours, '.', ':'))) as WorkinghoursHRM from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and Empattendencestatus='Close' AND Clientid='$Clientid'";
  //  echo $sqlworkinghrs;
    $resultwkhrs = $conn->query($sqlworkinghrs);
    
    while($rowwkhrs = mysqli_fetch_array($resultwkhrs)){
        $TotalWorkingHRS= $rowwkhrs['WorkinghoursHRM'];
        $TotalWorkingHRS = getHoursAndMins($TotalWorkingHRS);

        $TotalWorkingHRS =  substr(str_replace(':', '.', $TotalWorkingHRS), 0, 5);
        
      // $Workeddays=roundup($Workeddays);
      // $Workeddays=round($Workeddays,0);
      
    }
if(empty($TotalWorkingHRS))
{
    $TotalWorkingHRS=0;
}
  
    $periods = date("m/M/Y", strtotime("01-" . $month . '-' . $year));



    $result = mysqli_query($conn, "select Count(*) as total from vwholidaymaster where Monthname ='$month' and Year = '$year' and Dayname!='Sunday' AND Clientid ='$Clientid'");
//echo  $result;
    $row = mysqli_fetch_array($result);
$Nationalholiday = $row['total'];




 
    
$month_num = date("m", strtotime($month));
$year_num = $year;


$Fromdate= date("01-$month_num-$year");
$Todate=  date("t-$month_num-$year",strtotime($Fromdate));


$monthof1stday =date("$year-$month_num-01");

$monthoflastday=date("$year-$month_num-t");


// $Fromdate= date('01-m-Y');
// $Todate=  date('t-m-Y',strtotime($Fromdate));
$Startdate = new DateTime($Fromdate);
$Enddate = new DateTime($Todate);
$no=0;

$date = date("Y-m-d H:i:s" );
$interval = DateInterval::createFromDateString('1 day');
// $period = new DatePeriod($Startdate, $interval,  $Enddate);
// foreach ($period as $dt)
// {
//     if ($dt->format('N') == 7)
//     {
//         $no++;
//     }
// }
$sundays=0; $total_days=cal_days_in_month (CAL_GREGORIAN, $month_num, $year_num); 
for ($i=1;$i<=$total_days;$i++) 
if (date ('N',strtotime ($year.'-'.$nmonth.'-'.$i))==7) $sundays++;
$totsundays = $sundays;
$numOfDays=dateDiffInDays($Fromdate,$Todate);

$Working_Days = ($numOfDays+1) - $totsundays;
// $numOfDays=dateDiffInDays($Fromdate,$Todate);

// $Working_Days = ($numOfDays+1) - $no;

$Workingdays=$Working_Days;

$Totaldays = $Workeddays+$Nationalholiday;
$Leavedays = ($Workingdays - $Totaldays);
$TakenEL=0;
$BalanceEL=0;
$CL="1.5";
$date = date("Y-m-d H:i:s" );


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
  

  $sqlHDND = "SELECT Count(*) as total from vwholidaymaster where Monthname ='$month_num' and Year = '$year_num' and Dayname!='Sunday' AND Clientid ='$Clientid'  AND DATE(Holidaydate) <='$date_of_joining' AND Clientid='$Clientid'";
//echo " test $sqlHDND";
  $resultHDND = $conn->query($sqlHDND);
  
  while($rowHDND = mysqli_fetch_array($resultHDND)){
    $Nationalholidaydoj= $rowHDND['total'];
    $Nationalholiday = $Nationalholidaydoj;

  }

//  $Nationalholiday = $row['total'];
}



// $Leavedays = ($Workingdays - $Workeddays);
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
if($Workeddays==0)
{
$Totaldays = 0;
}
else{
$Totaldays = $Workeddays+$Nationalholiday;
}



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

//     $sql_att = " SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid = '$emp_id' and SalMonth  = '$month' and Salyear = '$year'";
    
//    // echo $sql_att;exit;
//     //$sqlQuery = mysqli_query($conn,$sql_perform_att);


//     $sqlattQuery = mysqli_query($conn, $sql_att);
//     while ($row = mysqli_fetch_array($sqlattQuery)) {

//         $Workingdays = round($row['Workingdays']);
//         $Totaldays = $row['Totaldays'];
//         $Leavedays = $row['Leavedays'];
//         $CL = $row['CL'];
//         $LOP = $row['LOP'];
//         // $Workeddays = $row['Workeddays'];
//         $Nationalholidays = $row['Nationalholidays'];
//         $OT_HRS = $row['OT_HRS'];
       
        
//     }

   // echo "sdcfsdf  $Workeddays $Leavedays";exit;
    $Paid_leave = $CL + $Nationalholidays;
    $Tot_RegHrs = $reghrs * $Workingdays;

   
    $sundays=0; $total_days=cal_days_in_month (CAL_GREGORIAN, $nmonth, $year); 
    for ($i=1;$i<=$total_days;$i++) 
    if (date ('N',strtotime ($year.'-'.$nmonth.'-'.$i))==7) $sundays++;
    $totsundays = $sundays;
    //echo "dfs $sundays";

    
    $result = get_attendance($conn, $emp_id,$Clientid, $periods, $date_of_joining);

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

    
        // if ($Workinghours < 9) {
        //     $dt = $row["Attendencedate"];
        //     $AttenStatus = $row["AttenStatus"];
        //     $dt1 = strtotime($dt);
        //     $dt2 = date("l", $dt1);
        //     $dt3 = strtolower($dt2); 
          
        //     if ($dt3 == "sunday" || $AttenStatus == "A") {
        //         $Lop = 0;
              
        //     }
        //    else
        //    {
            
        //     //$Lop = $reghrs - $Workinghours;
        //   //   $row["Intime"].' '.$row["Outtime"].'<br>';
        //     $workingMin = getIntervalMinutes($row["Intime"],$row["Outtime"])-60;
        //     $lopMin = 480-$workingMin;
        //     $overAllLopMin += $lopMin;
        //     $Lop = getHoursAndMins($lopMin);

           
        //    }
          
        // }
        // else {
        //     // $Ot_HRS = round(($Workinghours - $reghrs), 2);
        //     $Lop = 0;
        // }


        $sqlLOP = "SELECT  SUM(HOUR(REPLACE(Lophrs, '.', ':'))*60+MINUTE(REPLACE(Lophrs, '.', ':'))) as LophrsHRM from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and Empattendencestatus='Close' AND Clientid='$Clientid'";
        $resultLOP = $conn->query($sqlLOP);
        while($row = mysqli_fetch_array($resultLOP)){
           $LophrsTot= $row['LophrsHRM'];
           $LophrsTot = getHoursAndMins($LophrsTot);

        $LophrsTot =  substr(str_replace(':', '.', $LophrsTot), 0, 5);
        }
        if(empty($LophrsTot))
        {
          $LophrsTot=0;
        }
    
   
        

?>
	<tr>
		<td><?=@$sno ?></td>
		<td ><?php echo  $Date ?></td>
		<td class="textright"><?php echo $Intime ?></td>
		<td class="textright"><?php echo $Outtime ?></td>
		<td class="textright"><?php echo $OTIntime ?></td>
		<td class="textright"><?php echo $OTOuttime ?></td>
		<td class="textright" style="background:#D3D3D3 !important;"><?php
        $dt = $Attendencedate;
        $dt1 = strtotime($dt);
        $dt2 = date("l", $dt1);
        $dt3 = strtolower($dt2);
        if ($dt3 == "sunday") {

        
            if($AttenStatus =='P')
            {
              echo "$reghrs";
            }
            else
              echo "";
            
        
      }
     else
     {
      $sql_holcheck = "SELECT * FROM indsys1012holidaymaster WHERE Holidaydate = '$Attendencedate' AND Clientid='$Clientid'";

      $result_holcheck = $conn->query($sql_holcheck);
     if (mysqli_num_rows($result_holcheck) > 0)
     {
         while ($row = mysqli_fetch_array($result_holcheck))
         {
             $Holidaydetail = $row['Holidaydetail'];
        
         }
         echo "";
     } 
    else
    {
      if($AttenStatus =='P')
      {
        echo "$reghrs";
      }
      else
        echo "";

    }
     }
   ?></td>
		<td class="textright"><?php echo $Workinghours ?></td>
		
		<td class="textright"><?php 
        
        $sql_holcheck = "SELECT Type_Of_Posistion FROM indsys1017employeemaster WHERE Employeeid = '$emp_id' AND Clientid='$Clientid'";
       //echo $sql_holcheck;
        $result_Nextno = $conn->query($sql_holcheck);
        if (mysqli_num_rows($result_Nextno) > 0)
        {
            while ($row = mysqli_fetch_array($result_Nextno))
            {
                $Type_Of_Posistion = $row['Type_Of_Posistion'];
                //echo $Type_Of_Posistion;
            }
        } 

      
            echo $Lophrs ;
        ?></td> 
		
		<td class="textright"><?php
        
        if($Type_Of_Posistion == 'Category 3')
        
        {
            echo $ActualOt_HRS  ;
         }
         else
         {
            echo ""; 
         }
         $sqlOT = "SELECT SUM(HOUR(REPLACE(OT_HRS, '.', ':'))*60+MINUTE(REPLACE(OT_HRS, '.', ':'))) as OTHRSHM from vwattendenceclosestatus where Attendencedate>='$fdaymonth' and Attendencedate <='$ldaymonth' and Employeeid = '$emp_id' and Empattendencestatus='Close' AND Clientid='$Clientid'";

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
         ?>
        
        
        
       </td>
       <td><?php {


            $sql_weekoff = "SELECT Week_Off FROM indsys1017employeemaster WHERE Employeeid = '$emp_id' AND Clientid='$Clientid'";
            // echo $sql_weekoff;
            $result_weekoff = $conn->query($sql_weekoff);
            if (mysqli_num_rows($result_weekoff) > 0)
            {
                while ($row = mysqli_fetch_array($result_weekoff))
                {
                    $Week_Off = $row['Week_Off'];
                  
                }
            } 
              $dt = $Attendencedate;
              $dt1 = strtotime($dt);
              $dt2 = date("l", $dt1);
              $dt3 = strtolower($dt2);
            // $AttenStatus  =$row['AttenStatus'];
            // echo "$AttenStatus";  
            if ($dt3 == "sunday")
            {
              if($AttenStatus =='P')
              {
                echo "";
              }
              else
                echo "Week Off";
              
                
            }
            else
         {
           // $Attendencedate = $row["Attendencedate"];
            $sql_holcheck = "SELECT * FROM indsys1012holidaymaster WHERE Holidaydate = '$Attendencedate' AND Clientid='$Clientid'";
             //echo $sql_holcheck;
            $result_Nextno = $conn->query($sql_holcheck);
            if (mysqli_num_rows($result_Nextno) > 0)
            {
                while ($row = mysqli_fetch_array($result_Nextno))
                {
                    $Holidaydetail = $row['Holidaydetail'];
                  echo $Holidaydetail;
                }
            } 
            else {
              if($AttenStatus == "A" || $AttenStatus == "L")
              {
                echo "Absent";
              }
              
              if($AttenStatus == "WO")
            {  
              echo "Week Off";
            }
            }
           

        }
         ////....HD and OD check..../////
         if ($dt3 != "sunday")
            {
               
                if ($AttenStatus == "HD")
                {
                    echo "Half Day";
                }
                elseif ($AttenStatus == "OD")
                {
                    echo "OD";
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
<th>Total WorkingDays</th><th>Total Present</th><th>Total Absent</th><th>EL</th><th>Total LOP</th><th>Holiday Count</th><th>Total Working Hrs</th>
<th>Total LOP Hrs

</th> <th>
<?php 

if($Type_Of_Posistion == 'Category 3')
        
        {
            echo "Total OT Hrs " ;
         }
         else
         echo ""; ?>
   


</th><th>Week Off Count</th>

</tr>
<tr>
<th></th>
<th><?php echo $Workingdays; ?></th><th><?php echo $Workeddays; ?></th><th><?php echo $Leavedays; ?></th><th><?php echo $TakenEL; ?>
<th><?php echo $LOP; ?></th>
<th><?php echo $Nationalholidays; ?></th><th><?php echo $TotalWorkingHRS ?></th>
<th> <?php


            echo $LophrsTot;
       

 ?></th> <th><?php 
 
if($Type_Of_Posistion == 'Category 3')
        
{
    echo $ActualOt_HRS;
 }
 else
 echo "";
 
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
