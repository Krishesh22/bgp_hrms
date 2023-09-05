<?php 
error_reporting(0);
include '../config.php';
include 'Payrollsalary.php';


session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
    $AuthorizedType=  $_SESSION["Authorizedtype"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];
//$MethodGet='FetchTest';
if($MethodGet == 'ModuleNext')
{
   
    $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='EMP' AND Clientid ='$Clientid' ";

        $result_Nextno = $conn->query($GetNextno);
        if (mysqli_num_rows($result_Nextno) > 0)
        {
            while ($row = mysqli_fetch_array($result_Nextno))
            {
                $data = $row['Nextno'];
                $data01 = $data + 1;
            }
        }  
    header('Content-Type: application/json');
    echo json_encode($data01);
 }
 ////////////////////////////
 if($MethodGet == 'FetchDate')
{

    try
    { 
  

      

        $Fromdate= date('01-m-Y');
        $Todate=  date('t-m-Y',strtotime($Fromdate));
$Startdate = new DateTime($Fromdate);
        $Enddate = new DateTime($Todate);
        $no=0;
        $time=strtotime( $Fromdate);


        $month_num = date("m", strtotime($time));
        $Payrollmonth=date("F",$time);
        $Payrollyear=date("Y",$time); 
        $date = date("Y-m-d H:i:s" );
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($Startdate, $interval,  $Enddate);
        // foreach ($period as $dt)
        // {
        //     if ($dt->format('N') == 7)
        //     {
        //         $no++;
        //     }
        // }
      
        $numOfDays=dateDiffInDays($Fromdate,$Todate);

        $total_days=cal_days_in_month (CAL_GREGORIAN, $month_num, $Payrollyear); 
        //echo "Test$total_days";
        for ($i=1;$i<=$total_days;$i++) 
        if (date ('N',strtotime ($Payrollyear.'-'.$month_num.'-'.$i))==7) $sundays++;
        $totsundays = $sundays;
      
        $Working_Days = ($numOfDays+1) - $totsundays;
    
       
        $_SESSION["Payrollmonth"] =  $Payrollmonth;
        $_SESSION["Payrollyear"] =  $Payrollyear;
        $AuthorizedType=  $_SESSION["Authorizedtype"];

        
$result = mysqli_query($conn, "select Count(*) as total from vwholidaymaster where Monthname ='$Payrollmonth' and Year = '$Payrollyear' and Dayname!='Sunday' AND Clientid ='$Clientid'");
$row = mysqli_fetch_array($result);
$Nationalholiday = $row['total'];
    $Display=array(
      'Fromdate'=>  $Fromdate,
      'Todate'=> $Todate,
      'Working_Days'=>$Working_Days,
      'Payrollmonth' =>$Payrollmonth,
      'Payrollyear' =>$Payrollyear,
      'AuthorizedType' =>$AuthorizedType,
      'Nationalholiday' =>$Nationalholiday,
      'TodayDate' =>$date

      
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
} 
////////////////////////////////////////////////
function last_day_of_the_month($date = '')
{
    $month  = date('m', strtotime($date));
    $year   = date('Y', strtotime($date));
    $result = strtotime("{$year}-{$month}-01");
    $result = strtotime('-1 second', strtotime('+1 month', $result));

    return date('Y-m-d', $result);
}
///////////////////////////////

if($MethodGet == 'FetchDays')
{

    try
    { 
  

      $Payrollmonth = $form_data['Payrollmonth'];
      $Payrollyear =$form_data['Payrollyear'];

   
    
      $month_num = date("m", strtotime($Payrollmonth));
      $year_num = $Payrollyear;
      
      
      $Fromdate= date("01-$month_num-$Payrollyear");
      $Todate=  date("t-$month_num-$Payrollyear",strtotime($Fromdate));



      
      // $Fromdate= date('01-m-Y');
      // $Todate=  date('t-m-Y',strtotime($Fromdate));
$Startdate = new DateTime($Fromdate);
      $Enddate = new DateTime($Todate);
      $no=0;

      $date = date("Y-m-d H:i:s" );
      $interval = DateInterval::createFromDateString('1 day');
      $period = new DatePeriod($Startdate, $interval,  $Enddate);
      // foreach ($period as $dt)
      // {
      //     if ($dt->format('N') == 7)
      //     {
      //         $no++;
      //     }
      // }
    
      $numOfDays=dateDiffInDays($Fromdate,$Todate);
     
     
      $sundays=0; $total_days=cal_days_in_month (CAL_GREGORIAN, $month_num, $year_num); 
      for ($i=1;$i<=$total_days;$i++) 
      if (date ('N',strtotime ($year_num.'-'.$month_num.'-'.$i))==7) $sundays++;
      $totsundays = $sundays;
      $Working_Days = ($numOfDays+1) - $totsundays;





$result = mysqli_query($conn, "select Count(*) as total from vwholidaymaster where Monthname ='$Payrollmonth' and Year = '$Payrollyear' and Dayname!='Sunday' AND Clientid ='$Clientid'");
$row = mysqli_fetch_array($result);
$Nationalholiday = $row['total'];

$_SESSION["Payrollmonth"] =  $Payrollmonth;
$_SESSION["Payrollyear"] =  $Payrollyear;

    $Display=array(
   
      'Nationalholiday' =>$Nationalholiday,
      'Working_Days' =>$Working_Days
      
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
} 
//////////////////////////////////
if($MethodGet =="FetchPayrollTemp")
{

  $Payrollmonth = $form_data['Payrollmonth'];
  $Payrollyear = $form_data['Payrollyear'];
  $Category = $form_data['Category'];
  $Payrollstatus ="Open";
  $SalaryPaidDate = $date;
  $GetChapter = "SELECT Payrollstatus,SalaryPaidDate FROM indsys1026employeepayrollmastertemp where Clientid ='$Clientid' and SalMonth = '$Payrollmonth' and Salyear='$Payrollyear' and Category='$Category'  ";
  $result_Chapter = $conn->query($GetChapter );
  if(mysqli_num_rows($result_Chapter) > 0) { 


  while($row = mysqli_fetch_array($result_Chapter)) {  
  
    $Payrollstatus =$row['Payrollstatus'];
    $SalaryPaidDate =$row['SalaryPaidDate'];
    
  }
}

$Display=array(   
  'Payrollstatus' =>$Payrollstatus,
  'SalaryPaidDate' =>$SalaryPaidDate
);

$str = json_encode($Display);
echo trim($str, '"');
}
///////////////////////////////
if($MethodGet =="UpdateStatus")
{

  $Payrollmonth = $form_data['Payrollmonth'];
  $Payrollyear = $form_data['Payrollyear'];
  $Status = "Close";
  $SalaryPaidDate = $form_data['SalaryPaidDate'];
  $Category = $form_data['Category'];

  if(empty($SalaryPaidDate))
  {
    
    $Message ="Salary Date";
$Display=array(   
  'Message' =>$Message
);

$str = json_encode($Display);
echo trim($str, '"');
return;

  }
  $resultExists = "Update indsys1026employeepayrollmastertemp set 
  Payrollstatus ='$Status',    
  Addormodifydatetime ='$date',
  SalaryPaidDate ='$SalaryPaidDate',
  Userid ='$user_id'
  where SalMonth = '$Payrollmonth' and  Salyear = '$Payrollyear' AND Clientid ='$Clientid' AND Category='$Category' ";
  $resultExists01 = $conn->query($resultExists);
  if($resultExists01===TRUE)
  {
    $resultExistsNEW = "Update indsys1027employeepayrolldeduction set 
    Payrollstatus ='$Status',    
    Addormodifydatetime ='$date',
    
    Userid ='$user_id'
    where SalMonth = '$Payrollmonth' and  Salyear = '$Payrollyear' AND Clientid ='$Clientid' AND Category='$Category' ";
    $resultExistsOld = $conn->query($resultExistsNEW);
    
  $Message ="PayrollClose";
  }
  else
  {
    $Message ="FAIL";
  }


$Display=array(   
  'Message' =>$Message
);

$str = json_encode($Display);
echo trim($str, '"');
}

/////////////////////////////////////////////

function dateDiffInDays($date1, $date2) 
{
    // Calculating the difference in timestamps
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400));
}
//////////////////////
if($MethodGet == 'EmployeeALL')
{
   $GetState = "SELECT * FROM indsys1017employeemaster where EmpActive ='Active' AND Clientid ='$Clientid'   ORDER BY Employeeid";
   $result_Region = $conn->query($GetState);
 
   if(mysqli_num_rows($result_Region) > 0) { 
   while($row = mysqli_fetch_array($result_Region)) {  
     $data01[] = $row;
     } 
   }        
   header('Content-Type: application/json');
   echo json_encode($data01);
 }
 ///////////////////////////////
 if ($MethodGet == 'Fetcharray')
{

    try
    {
        

        $Fromdate = $form_data['Fromdate'];
        $Todate = $form_data['Todate'];
        $Payrollmonth = $form_data['Payrollmonth'];
        $Payrollyear = $form_data['Payrollyear'];


        $month_num = date("m", strtotime($Payrollmonth));
        $year_num = $Payrollyear;
        
        
        $Fromdate= date("01-$month_num-$Payrollyear");
        $Todate=  date("t-$month_num-$Payrollyear",strtotime($Fromdate));
     
        $Working_Days = $form_data['Working_Days'];
        $Nationalholiday = $form_data['Nationalholiday'];
        $Status = $form_data['Status'];
        $CasualLeave = $form_data['CasualLeave'];
        $Emparray = $form_data['Emparray'];
        $test = implode(',', $Emparray);

        $array  = explode(",", $test );
        $Workeddays = 0;

       
        $Message ="";
        $no = 1;

        $resultExists = "SELECT * FROM indsys1026employeepayrollmastertemp WHERE Salyear = '$Payrollyear' AND Clientid = '$Clientid' And SalMonth ='$Payrollmonth' LIMIT 1";
        $resultExists01 = $conn->query($resultExists);
      
        if (mysqli_fetch_row($resultExists01))
        {
      
            $resultExistsss = "Update indsys1026employeepayrollmastertemp set 
            Workingdays ='$Working_Days',
            Nationholidays ='$Nationalholiday',
            Payrollstatus ='$Status',
            Casual_Leave =' $CasualLeave',   
            Payrollstartdate ='$Fromdate',     
            Payrollenddate ='$Todate',        
            Addormodifydatetime ='$date',
            Userid ='$user_id'         
           
        WHERE SalMonth = '$Payrollmonth' AND Salyear ='$Payrollyear'
      
        AND Clientid ='$Clientid'  ";
            $resultExists0New = $conn->query($resultExistsss);
            $Message = "Exists";
      
      
           
        }
      
        else
        {
            $sqlsave = "INSERT IGNORE INTO indsys1026employeepayrollmastertemp (Clientid,
        SalMonth,Salyear,Workingdays,Nationholidays,Payrollstatus,Casual_Leave,Payrollstartdate,Payrollenddate,Userid,Addormodifydatetime)
         VALUES ('" . $Clientid . "','" . $Payrollmonth . "','" .$Payrollyear . "','" .$Working_Days . "','" . $Nationalholiday . "',
         '" .$Status . "','" .$CasualLeave . "','" . $Fromdate . "','" .$Todate . "','" . $user_id . "','" . $date . "')";
            $resultsave = mysqli_query($conn, $sqlsave);
      
          
        }
      

        // $resultExists = "DELETE FROM indsys1026employeepayrolltempmasterdetail WHERE Clientid = '$Clientid'  and SalMonth = '$Payrollmonth' and Salyear = '$Payrollyear'   ";
        // $resultExists01 = $conn->query($resultExists);
      

        foreach ($array as $Employeeid) {
            $no++;
            $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid' and EmpActive='Active'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Performanceallowance =0;
      $Workeddays = 0;
      $Title =$row['Title'];
      $Firstname =$row['Firstname'];
      $Lastname = $row['Lastname'];
      $Gender =$row['Gender'];   
      $Fullname =$row['Fullname'];   
      //$Category='Test';  
      $Category = $row['Type_Of_Posistion'];
      $Basic = $row['Basic'];
      $HR_Allowance =$row['HR_Allowance'];
      $Other_Allowance = $row['Other_Allowance'];
      $TA =$row['TA'];      
      $Performanceallowance = $row['Performance_allowance'];
      $Day_allowance=$row['Day_allowance'];
      $Department =$row['Department'];
      $Type_Of_Posistion = $row['Type_Of_Posistion'];
      $Designation =$row['Designation'];
      $date_of_joining =$row['Date_Of_Joing'];
      $week_off ='Sunday';
      $Backgroundverification = "No Need";
      $Packageholdstatus = "Open";
      $Superuserapproval ="Approved";
      $Performanceallowance =$row['Performance_allowance'];
     echo $Performanceallowance;

      $GetState = "SELECT * FROM indsys1017employeemaster where Employeeid='$Employeeid' AND  EmpActive ='Active'  AND Gross_Salary >30000 AND  (BackgroundVerification='No' OR BackgroundVerification is null) AND Clientid ='$Clientid'   ORDER BY Employeeid";
      $result_GetState= $conn->query($GetState );
      if(mysqli_num_rows($result_GetState) > 0) { 
  
  
      while($row = mysqli_fetch_array($result_GetState)) {  

        $Backgroundverification = "Need";
      $Packageholdstatus = "Hold";
      $Superuserapproval="Waiting";
      }
    }


    $Fromdate01 =  date("Y-m-d", strtotime($Fromdate));
    $Todate01 =  date("Y-m-d", strtotime($Todate));
      $sql = "SELECT  SUM(Workingdays) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and Empattendencestatus='Close'";
      $result = $conn->query($sql);
      
      while($row = mysqli_fetch_array($result)){
        $Workeddays= $row['SUM(Workingdays)'];
          
      }
      if(empty($Workeddays))
      {
        $Workeddays = 0;
      }
      $OT_HRS = 0;
      $sqlOT = "SELECT  SUM(OT_HRS) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and Empattendencestatus='Close'";
      $resultOT = $conn->query($sqlOT);
      
      while($row = mysqli_fetch_array($resultOT)){
        $OT_HRS= $row['SUM(OT_HRS)'];
          
      }
      if(empty($OT_HRS))
      {
        $OT_HRS = 0;
      }

      if($OT_HRS >25)
      {
        $OT_HRS =25;
      }
      $date1 = new DateTime($date_of_joining);

      $date2 = new DateTime($date);
      
    
      
      
      
      $dateofjoingdays = $date2->diff($date1)->format("%a"); 
      if($dateofjoingdays<30)
      {
        $CasualLeave =0;
      }
      
else
{
  $CasualLeave = $form_data['CasualLeave'];
}
      //$result = get_attendance($conn,$Employeeid,$Fromdate,$emp_shift, $Category,$date_of_joining,$week_off);
 
      $resultExists = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid = '$Employeeid'  and SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  AND Clientid ='$Clientid'LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $updatefunction = CallEmppdatepayroll($conn,$Clientid,$user_id,$date, $Employeeid,$Payrollmonth, $Payrollyear,$Workeddays, $Leavedays,$Salary_Advance, $FoodDeduction,$TDS,$Category,$Working_Days,$Nationalholiday, $CasualLeave, $Basic,$HR_Allowance,$Other_Allowance , $OT_HRS, $DailyAllowanance,$Performanceallowance);
 
  }

  else
  {
    $sqlsave = "INSERT IGNORE INTO indsys1026employeepayrolltempmasterdetail (Clientid,Employeeid,SalMonth,Salyear,Firstname,Lastname,Title,Fullname,Designation,Department,Workingdays,Workeddays,Category,Nationalholidays,Leavedays,CL,LOP,Totaldays,BasicDA,HRA,Otherallowance_Con_SA,TotalSal,EarnedBasic,EarnedHRA,EarnedOtherallowance_Con_SA,EarnedWages,PF,ESI,Salary_Advance,FoodDeduction,TotalDeduction,NetWages,DailyAllowanance,TDS,OT_HRS,OT_Wages,Userid,Addormodifydatetime,Performanceallowance,Backgroundverificationstatus,PackageHoldstatus,Superuserapproval)
    values('$Clientid','$Employeeid','$Payrollmonth','$Payrollyear','$Firstname','$Lastname','$Title','$Fullname','$Designation','$Department','$Working_Days',0,'$Category','$Nationalholiday',0,$CasualLeave,0,0,$Basic,$HR_Allowance,$Other_Allowance,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'$user_id','$date','$Performanceallowance','$Backgroundverification','$Packageholdstatus','$Superuserapproval')";

    $resultsave = mysqli_query($conn,$sqlsave);
   
  $updatefunction = CallEmppdatepayroll($conn,$Clientid,$user_id,$date, $Employeeid,$Payrollmonth, $Payrollyear,$Workeddays, $Leavedays,$Salary_Advance, $FoodDeduction,$TDS,$Category,$Working_Days,$Nationalholiday, $CasualLeave, $Basic,$HR_Allowance,$Other_Allowance , $OT_HRS, $DailyAllowanance,$Performanceallowance);
     
  }


	//$OT_HRS = 0;
	// if($OT_HRS<0){
	// 	$OT_HRS = 0;
	// }


 
  $Salary_Advance =0;
  $TDS =0;
  $FoodDeduction =0;
  $Leavedays =0;
  $DailyAllowanance =0;
//$updatefunction = CallEmppdatepayroll($conn,$Clientid,$user_id,$date, $Employeeid,$Payrollmonth, $Payrollyear,$Workeddays, $Leavedays,$Salary_Advance, $FoodDeduction,$TDS,$Category,$Working_Days,$Nationalholiday, $CasualLeave, $Basic,$HR_Allowance,$Other_Allowance , $OT_HRS, $DailyAllowanance,$Performanceallowance);

   
   
     
     
      } 
    }



        };
      
        
      

 

        $Display = array(
           'Message' =>$Message,
        

        );

        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e)
    {

    }

}

//////////////////////////
if($MethodGet == 'EMPPAYROLL')
{


try
{

    $Payrollmonth =$form_data['Payrollmonth'];
    $Payrollyear =$form_data['Payrollyear'];
    $Category=$form_data['Category'];
    $_SESSION['Payrollmonth'] = $Payrollmonth;
    $_SESSION['Payrollyear'] = $Payrollyear;
    $_SESSION['Category'] = $Category;

   
   
    $GetState = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Clientid ='$Clientid' And Category='$Category'  ORDER BY Employeeid";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 
 
    $sql = "SELECT SUM(NetWages)FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid'  ORDER BY Employeeid";
    $result = $conn->query($sql);
    
    while($row = mysqli_fetch_array($result)){
      $NetWages= $row['SUM(NetWages)'];
        
    }
    if(empty($NetWages))
    {
      $NetWages = 0;
    }
    $sqlPerformanceallowance = "SELECT SUM(Performanceallowance)FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid'  ORDER BY Employeeid";
    $resultPerformanceallowance = $conn->query($sqlPerformanceallowance);
    
    while($row = mysqli_fetch_array($resultPerformanceallowance)){
      $Performanceallowance= $row['SUM(Performanceallowance)'];
        
    }
    if(empty($Performanceallowance))
    {
      $Performanceallowance = 0;
    }
    
    $GrandTotal = $NetWages+$Performanceallowance;
    $mytbl["Test"]=$data01;


 

 $Display=array('data01' =>   $mytbl["Test"],
 'NetWages' =>$NetWages,
 'Performanceallowance'=>$Performanceallowance,
 'GrandTotal'=>$GrandTotal


);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
//////////////////////////////////////
if($MethodGet == 'ParollFunction')
{


try
{

    $Employeeid =$form_data['Employeeid'];
    $SalMonth =$form_data['SalMonth'];
    $Salyear =$form_data['Salyear'];
    $Workeddays =$form_data['Workeddays'];
    $Leavedays =$form_data['Leavedays'];
    $Salary_Advance =$form_data['Salary_Advance'];
    $FoodDeduction =$form_data['FoodDeduction'];
    $TDS =$form_data['TDS'];
    $Category =$form_data['Category'];
    $Workingdays =$form_data['Workingdays'];
    $Nationalholidays =$form_data['Nationalholidays'];
    $CL =$form_data['CL'];
    $BasicDA =$form_data['BasicDA'];
    $HRA =$form_data['HRA'];
    $Otherallowance_Con_SA =$form_data['Otherallowance_Con_SA'];
    $OT_HRS = $form_data['OT_HRS'];
    $DailyAllowanance =$form_data['DailyAllowanance'];
    $Performanceallowance = $form_data['Performanceallowance'];


    $GetState = "SELECT * FROM indsys1027employeepayrolldeduction where SalMonth='$SalMonth' and Salyear='$Salyear' AND Category ='$Category' and Employeeid='$Employeeid' ORDER BY Employeeid ";
        $result_Region = $conn->query($GetState);
    
      
        if(mysqli_num_rows($result_Region) > 0) { 
        while($row = mysqli_fetch_array($result_Region)) {  
       
        
         $Salary_Advance =$row['Salary_Advance'];
         $FoodDeduction = $row['FoodDeduction'];
         $TDS = $row['TDS'];
        }
      }



    CallEmppdatepayroll($conn,$Clientid,$user_id,$date, $Employeeid,$SalMonth, $Salyear,$Workeddays, $Leavedays,$Salary_Advance, $FoodDeduction,$TDS,$Category,$Workingdays,$Nationalholidays, $CL, $BasicDA,$HRA,$Otherallowance_Con_SA , $OT_HRS, $DailyAllowanance,$Performanceallowance);


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
////////////////////////////////////////////////
// function roundup($float, $dec = 2){
//   if ($dec == 0) {
//       if ($float < 0) {
//           return floor($float);
//       } else {
//           return ceil($float);
//       }
//   } else {
//       $d = pow(10, $dec);
//       if ($float < 0) {
//           return floor($float * $d) / $d;
//       } else {
//           return ceil($float * $d) / $d;
//       }
//   }
// }
//////////////////////////////////////////////

if($MethodGet == 'Delete')
{



  $Employeeid =$form_data['Employeeid'];
  $SalMonth =$form_data['SalMonth'];
  $Salyear =$form_data['Salyear'];

  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "DELETE FROM indsys1026employeepayrolltempmasterdetail WHERE Clientid = '$Clientid' and Employeeid = '$Employeeid' and SalMonth = '$SalMonth' and Salyear = '$Salyear'   ";
  $resultExists01 = $conn->query($resultExists);

    
    $Message ="Delete";
 
 

 






 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}
////////////////////////////////////////

// if($MethodGet == 'AddAtendence')
// {





//   if (mysqli_connect_errno()){
//     $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
//   }

 
//     $month = intval(date('m'));
//     $year = date('Y');
    
//      $table_name = "devicelogs_".$month."_".$year."";
//     // //echo $table_name;exit;
//     $createsql = "CREATE TABLE IF NOT EXISTS ".$table_name." (
//       id int(11) NOT NULL AUTO_INCREMENT,
//       DeviceLogId varchar(500) DEFAULT NULL,
//       DownloadDate datetime NOT NULL,
//       DeviceId varchar(250) DEFAULT NULL,
//       UserId varchar(250) NOT NULL,
//       LogDate datetime NOT NULL,
//       Direction varchar(500) NOT NULL,
//       AttDirection varchar(500) DEFAULT NULL,
//       C1 varchar(300) DEFAULT NULL,
//       C2 varchar(300) DEFAULT NULL,
//       C3 varchar(300) DEFAULT NULL,
//       C4 varchar(300) DEFAULT NULL,
//       C5 varchar(300) DEFAULT NULL,
//       C6 varchar(300) DEFAULT NULL,
//       C7 varchar(300) DEFAULT NULL,
//       WorkCode varchar(300) DEFAULT '0',
//       mlog varchar(5) DEFAULT '0',
//       mlogstatus varchar(5) DEFAULT '0',
//       UpdateFlag varchar(150) DEFAULT '0',
//       cdate datetime NOT NULL,
//       PRIMARY KEY (id)
//     ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;";
    
//     $mydlogresp = mysqli_query($conn,$createsql) ;
//     $mylastdevrow = @mysqli_fetch_assoc($mydlogresp);
//     $mylastdevid = @$mylastdevrow['DeviceLogId'];
//     $msconn = connect_msdb();

//     $resultExists = "DELETE FROM ".$table_name."   ";
//     $resultExists01 = $conn->query($resultExists);
  
      
//       // $Message ="Delete";
//     $msresp = 'SELECT * FROM '.$table_name.'   ORDER BY DeviceLogId ASC' ;
//     //echo $msresp ;
//     $stmt = sqlsrv_query( $msconn, $msresp );
//     $msdlogcount = sqlsrv_num_rows($stmt);
    
//     while($msrow = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)) {
        
//     $DeviceLogId = $msrow['DeviceLogId'];
//     $DownloadDate = $msrow['DownloadDate'];
//     $DeviceId =$msrow['DeviceId'];
//     $UserIdnew =$msrow['UserId'];
//     $LogDate =$msrow['LogDate'];
//     $Direction =$msrow['Direction'];
//     $AttDirection =$msrow['AttDirection'];
//     $UpdateFlag =$msrow['UpdateFlag'];
//     $C1 =$msrow['C1'];
//     $C2 =$msrow['C2'];
//     $C3 =$msrow['C3'];
//     $C4 = $msrow['C4'];
//     $C5 =$msrow['C5'];
//     $C6 =$msrow['C6'];
//     $C7 =$msrow['C7'];
    
//     $WorkCode =$msrow['WorkCode'];
//     // $mlogstatus =$msrow['mlogstatus'];
//     // $mlog =$msrow['mlog'];
//     // $cdate =$msrow['cdate'];
//     // echo $table_name;
//     // echo 'devicelogs_4_2022';
//     $sql = "INSERT IGNORE INTO ".$table_name." (id,DeviceLogId, DownloadDate, DeviceId, UserId,LogDate,Direction,AttDirection,UpdateFlag,C1,C2,C3,C4,C5,C6,C7,WorkCode,cdate)
//          VALUES (NULL,'$DeviceLogId','$DownloadDate','$DeviceId','$UserIdnew','$LogDate','$Direction','$AttDirection','$UpdateFlag','$C1','$C2','$C3','$C4','$C5','$C6','$C7','$WorkCode','$date')";
    
    
    
//         $resp = mysqli_query($conn,$sql) ;
         
       
//         if($resp) {
//         //echo "Success=>".$msrow['DeviceLogId']."<br/>";
//         } else {
//         //echo "Fail=>  ".$msrow['DeviceLogId']."<br/>";
//         }
//     }

 






//  $Display=array('Message' =>$Message);

//   $str = json_encode($Display);
// echo trim($str, '"');
    
 
     
// }
////////////////////


//////////////////////////////////
if ($MethodGet == 'FetchBulk')
{

    try
    {
        

        $Fromdate = $form_data['Fromdate'];
        $Todate = $form_data['Todate'];
        $Payrollmonth = $form_data['Payrollmonth'];
        $Payrollyear = $form_data['Payrollyear'];
        $Category = $form_data['Category'];



        
  if(empty($Category))
  {
    
    $Message ="Category";
$Display=array(   
  'Message' =>$Message
);

$str = json_encode($Display);
echo trim($str, '"');
return;

  }
        $month_num = date("m", strtotime($Payrollmonth));
        $year_num = $Payrollyear;
        
        
        $Fromdate= date("01-$month_num-$Payrollyear");
        $Todate=  date("t-$month_num-$Payrollyear",strtotime($Fromdate));

$monthof1stday =date("$Payrollyear-$month_num-01");
$monthoflastday = date("$Salyear-$month_num-t",strtotime($Fromdate));
        $date02 = date("Y-m-d" );

        $Generatedate = date("Y-m", strtotime($Todate));  
        $Currentdate = date("Y-m", strtotime($date02));  

     
        if($Generatedate>=$Currentdate)
        {
          
      //     $Message ="Payroll Not";
      // $Display=array(   
      //   'Message' =>$Message
      // );
      
      // $str = json_encode($Display);
      // echo trim($str, '"');
      // return;
      
        }
//$from_days=cal_days_in_month(CAL_GREGORIAN,$month_num,$year_num);
     
        $Working_Days = $form_data['Working_Days'];
        $Nationalholiday = $form_data['Nationalholiday'];
        $Status = $form_data['Status'];
        $CasualLeave = $form_data['CasualLeave'];
        $Workingdays = 0;
       // $Emparray = $form_data['Emparray'];
        // $test = implode(',', $Emparray);

        // $array  = explode(",", $test );
       
       
        $Message ="";
        $no = 1;

        $resultExists = "SELECT * FROM indsys1026employeepayrollmastertemp WHERE Salyear = '$Payrollyear' AND Clientid = '$Clientid' And SalMonth ='$Payrollmonth' And Category='$Category' LIMIT 1";
        $resultExists01 = $conn->query($resultExists);
      
        if (mysqli_fetch_row($resultExists01))
        {
      
            $resultExistsss = "Update indsys1026employeepayrollmastertemp set 
            Workingdays ='$Working_Days',
            Nationholidays ='$Nationalholiday',
            Payrollstatus ='$Status',
            Casual_Leave =' $CasualLeave',   
            Payrollstartdate ='$Fromdate',     
            Payrollenddate ='$Todate',        
            Addormodifydatetime ='$date',
            Userid ='$user_id'
           
           
        WHERE SalMonth = '$Payrollmonth' AND Salyear ='$Payrollyear'
      
        AND Clientid ='$Clientid' and Category ='$Category' ";
            $resultExists0New = $conn->query($resultExistsss);
            $Message = "Exists";
      
           
        }
      
        else
        {
            $sqlsave = "INSERT IGNORE INTO indsys1026employeepayrollmastertemp (Clientid,
        SalMonth,Salyear,Category,Workingdays,Nationholidays,Payrollstatus,Casual_Leave,Payrollstartdate,Payrollenddate,Userid,Addormodifydatetime)
         VALUES ('$Clientid','$Payrollmonth','$Payrollyear','$Category','$Working_Days','$Nationalholiday',
         '$Status','$CasualLeave','$Fromdate','$Todate','$user_id','$date')";
            $resultsave = mysqli_query($conn, $sqlsave);
      
          
        }
      

        // $resultExists = "DELETE FROM indsys1026employeepayrolltempmasterdetail WHERE Clientid = '$Clientid'  and SalMonth = '$Payrollmonth' and Salyear = '$Payrollyear'   ";
        // $resultExists01 = $conn->query($resultExists);
      
        $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active' and Type_Of_Posistion='$Category'  ORDER BY Employeeid ASC";
	
   
        $logempall = mysqli_query($conn, $logemp);
        while($row = mysqli_fetch_array($logempall)) {
          $Performanceallowance = 0;
          $Employeeid =$row['Employeeid'];


      $Title =$row['Title'];
      $Firstname =$row['Firstname'];
      $Lastname = $row['Lastname'];
      $Gender =$row['Gender'];   
      $Fullname =$row['Fullname'];   
      //$Category='Test';  
      $Category = $row['Type_Of_Posistion'];
      $Basic = $row['Basic'];
      $HR_Allowance =$row['HR_Allowance'];
      $Other_Allowance = $row['Other_Allowance'];
      $TA =$row['TA'];      
      $Performanceallowance = $row['Performance_allowance'];
      $Day_allowance=$row['Day_allowance'];
      $Department =$row['Department'];
      $Type_Of_Posistion = $row['Type_Of_Posistion'];
      $Designation =$row['Designation'];
      $date_of_joining =$row['Date_Of_Joing'];
      $Backgroundverification = "No Need";
      $Packageholdstatus = "Open";
      $Superuserapproval ="Approved";
      $Performanceallowance =$row['Performance_allowance'];

      $Lophrs=0;
   



      //$GetState = "SELECT * FROM indsys1017employeemaster where Employeeid='$Employeeid' AND  EmpActive ='Active'  AND Gross_Salary >30000 AND  (BackgroundVerification='No' OR BackgroundVerification is null)   ORDER BY Employeeid";
      $GetState = "SELECT * FROM indsys1017employeemaster where Employeeid='$Employeeid' AND  EmpActive ='Active'  AND Gross_Salary >30000 AND  (BackgroundVerification='No' OR BackgroundVerification is null)   ORDER BY Employeeid";
      $result_GetState= $conn->query($GetState );
      if(mysqli_num_rows($result_GetState) > 0) { 
  
  
      while($row = mysqli_fetch_array($result_GetState)) {  

        $Backgroundverification = "Need";
      $Packageholdstatus = "Hold";
      $Superuserapproval="Waiting";
      }
    }
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
      if($monthof1stday == $date_of_joining)
      {
        $CasualLeave = $form_data['CasualLeave'];
      }
      else
      {
      $CasualLeave =0;
      }
    }
    else
    {
      $CasualLeave = $form_data['CasualLeave'];
    }

      $Fromdate01 =  date("Y-m-d", strtotime($Fromdate));
      $Todate01 =  date("Y-m-d", strtotime($Todate));

      $OT_HRS = 0;
      $sql = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='P'";
      $result = $conn->query($sql);
      
      while($row = mysqli_fetch_array($result)){
        $CountPresentDays= $row['Count(AttenStatus)'];
          
        // $Workeddays=roundup($Workeddays);
        // $Workeddays=round($Workeddays,0);
        
      }

      $sqlHD = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='HD'";
      $resultHD = $conn->query($sqlHD);
      
      while($rowHD = mysqli_fetch_array($resultHD)){
        $CountHalfDay= $rowHD['Count(AttenStatus)'];
          
        // $Workeddays=roundup($Workeddays);
        // $Workeddays=round($Workeddays,0);
        
      }

      $sqlOD = "SELECT  Count(AttenStatus) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' and AttenStatus='OD'";
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

  //   if($Category=="Category 3")
  //   {
  //     $Workeddays = 0;
  //     $setworkinghrs =0;
  //     $logempcat3 = "SELECT * from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' ";
	

  //     $logempallnew = mysqli_query($conn, $logempcat3);
  //     while($rownew = mysqli_fetch_array($logempallnew)) {
       
        
  //        $Workinghrs =$rownew['Workinghours'];


         
  // if($Workinghrs>8)
  // {
    

  //   //$OT_HRS = round($Workinghrs-8,2);

  //   $Workinghrs=8;
  // }
      
  //        $calculatedworkinghrs = ($Workinghrs/2)*0.25;
         
       
  //        $Workeddays += $calculatedworkinghrs;
         
  //     }

  //     echo "$Employeeid $Workeddays <br/>";
  //   }


//  $lopMin=0;
//       $logempcat3LOPHR = "SELECT SUM(HOUR(REPLACE(Lophrs, '.', ':'))/60+MINUTE(REPLACE(Lophrs, '.', ':'))) as LOPHRSNEW from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close' ";
	

//       $logempallnewLOP = mysqli_query($conn, $logempcat3LOPHR);
//       while($rowLOP = mysqli_fetch_array($logempallnewLOP)) {
       
        
//          $lopMin=$rowLOP['Workinghours'];

//          $Lophrs = getHoursAndMins($lopMin);

//          $Lophrs =  substr(str_replace(':', '.', $Lophrs), 0, 5);
         
  
         
//       }
     
   



      // $sqlcategory3 = "SELECT  SUM(Workingdays) from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and Empattendencestatus='Close'";
      // $resultcategory3 = $conn->query($sqlcategory3);
      
      // while($rowcategory3 = mysqli_fetch_array($resultcategory3)){
      //   $Workeddays= $rowcategory3['SUM(Workingdays)'];
          
      // }
      // if(empty($Workeddays))
      // {
      //   $Workeddays = 0;
      // }

      $sqlOT = "SELECT  SUM(HOUR(REPLACE(OT_HRS, '.', ':'))*60+MINUTE(REPLACE(OT_HRS, '.', ':'))) as OTHRSHM  from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and Empattendencestatus='Close'";
      $resultOT = $conn->query($sqlOT);
      
      while($row = mysqli_fetch_array($resultOT)){
        $OT_HRS= $row['OTHRSHM'];


            
        $OT_HRS = getHoursAndMins($OT_HRS);

        $OT_HRS =  substr(str_replace(':', '.', $OT_HRS), 0, 5);
          
      }
      if(empty($OT_HRS))
      {
        $OT_HRS = 0;
      }

      if($OT_HRS>25)
      {
        $OT_HRS =25;
      }


      $sqlLOP = "SELECT  SUM(HOUR(REPLACE(Lophrs, '.', ':'))*60+MINUTE(REPLACE(Lophrs, '.', ':'))) as LOPHRSNEW  from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close'";
      $resultLOP = $conn->query($sqlLOP);
      
      while($rownewtest = mysqli_fetch_array($resultLOP)){
        $Lophrs= $rownewtest['LOPHRSNEW'];
        $Lophrs = getHoursAndMins($Lophrs);

        $Lophrs =  substr(str_replace(':', '.', $Lophrs), 0, 5);
       
          //echo "$Employeeid- $Lophrs<br/>";

        
      }


    
      if(empty($Lophrs))
      {
        $Lophrs = 0;
      }

      $sqlActualOT = "SELECT  SUM(HOUR(REPLACE(ActualOt_HRSNew, '.', ':'))*60+MINUTE(REPLACE(ActualOt_HRSNew, '.', ':'))) as ActualOTHM from vwattendenceclosestatus where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'  and Empattendencestatus='Close'";
      $resultActualOT = $conn->query($sqlActualOT);
      
      while($rowactualOT = mysqli_fetch_array($resultActualOT)){
        $ActualOt_HRSNew= $rowactualOT['ActualOTHM'];
          
        $ActualOt_HRSNew = getHoursAndMins($ActualOt_HRSNew);

        $ActualOt_HRSNew =  substr(str_replace(':', '.', $ActualOt_HRSNew), 0, 5);
        
      }

      if(empty($ActualOt_HRSNew))
      {
        $ActualOt_HRSNew = 0;
      }

      $Salary_Advance =0;
      $TDS =0;
      $FoodDeduction =0;
      $Leavedays =0;
      $DailyAllowanance =0;
      $GetDeduction = "SELECT * FROM indsys1027employeepayrolldeduction where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category ='$Category' and Employeeid='$Employeeid' ORDER BY Employeeid ";
     
      $result_Deduction = $conn->query($GetDeduction);
  
    
      if(mysqli_num_rows($result_Deduction) > 0) { 
      while($rowDeduction = mysqli_fetch_array($result_Deduction)) {  
     
      
       $Salary_Advance =$rowDeduction['Salary_Advance'];
       $FoodDeduction = $rowDeduction['FoodDeduction'];
       $TDS = $rowDeduction['TDS'];
      
      }
    }

      //$result = get_attendance($conn,$Employeeid,$Fromdate,$emp_shift, $Category,$date_of_joining,$week_off);
 
      $resultExists = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid = '$Employeeid'  and SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Clientid ='$Clientid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $updatefunction = CallEmppdatepayroll($conn,$Clientid,$user_id,$date, $Employeeid,$Payrollmonth, $Payrollyear,$Workeddays, $Leavedays,$Salary_Advance, $FoodDeduction,$TDS,$Category,$Working_Days,$Nationalholiday, $CasualLeave, $Basic,$HR_Allowance,$Other_Allowance , $OT_HRS, $DailyAllowanance,$Performanceallowance);
    
  }

  else
  {
    $sqlsave = "INSERT IGNORE INTO indsys1026employeepayrolltempmasterdetail (Clientid,Employeeid,SalMonth,Salyear,Firstname,Lastname,Title,Fullname,Designation,Department,Workingdays,Workeddays,Category,Nationalholidays,Leavedays,CL,LOP,Totaldays,BasicDA,HRA,Otherallowance_Con_SA,TotalSal,EarnedBasic,EarnedHRA,EarnedOtherallowance_Con_SA,EarnedWages,PF,ESI,Salary_Advance,FoodDeduction,TotalDeduction,NetWages,DailyAllowanance,TDS,OT_HRS,OT_Wages,Userid,Addormodifydatetime,Performanceallowance,Backgroundverificationstatus,PackageHoldstatus,Superuserapproval,TakenEL,BalanceEL,Lophrs,Lopwages,ActualOTHRS,ActualOTWages,Actualnet)
    values('$Clientid','$Employeeid','$Payrollmonth','$Payrollyear','$Firstname','$Lastname','$Title','$Fullname','$Designation','$Department','$Working_Days',0,'$Category','$Nationalholiday',0,$CasualLeave,0,0,$Basic,$HR_Allowance,$Other_Allowance,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'$user_id','$date','$Performanceallowance','$Backgroundverification','$Packageholdstatus','$Superuserapproval',0,0,'$Lophrs',0,'$ActualOt_HRSNew',0,0)";

    $resultsave = mysqli_query($conn,$sqlsave);
   

     
  }



	// if($OT_HRS<0){
	// 	$OT_HRS = 0;
	// }


 

$updatefunction = CallEmppdatepayroll($conn,$Clientid,$user_id,$date, $Employeeid,$Payrollmonth, $Payrollyear,$Workeddays, $Leavedays,$Salary_Advance, $FoodDeduction,$TDS,$Category,$Working_Days,$Nationalholiday, $CasualLeave, $Basic,$HR_Allowance,$Other_Allowance , $OT_HRS, $DailyAllowanance,$Performanceallowance);

   
   

     
 


        };
      
        
      

 

        $Display = array(
           'Message' =>$Workeddays,
        

        );

        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e)
    {

    }

}


////////////////////////////////
if($MethodGet == 'PayrollSuperUserFunction')
{


try
{

    $Employeeid =$form_data['Employeeid'];
    $SalMonth =$form_data['SalMonth'];
    $Salyear =$form_data['Salyear'];
    $Superuserapproval =$form_data['Superuserapproval'];
    $PackageHoldstatus ="Open";
    if($Superuserapproval =="Approved")
     {
$PackageHoldstatus ="Open";
     }    
     else
     {
$PackageHoldstatus="Hold";
     }

$resultExists = "Update indsys1026employeepayrolltempmasterdetail set 
PackageHoldstatus ='$PackageHoldstatus',
Superuserapproval='$Superuserapproval',

Addormodifydatetime ='$date',
Userid ='$user_id'
   WHERE Employeeid = '$Employeeid' and SalMonth = '$SalMonth' and  Salyear = '$Salyear' AND Clientid ='$Clientid' ";
$resultExists01 = $conn->query($resultExists);
$Message ="Exists";


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
/////////////////////////////////
if($MethodGet == 'EMPPAYROLLVIEW')
{


try
{

    $Payrollmonth =$form_data['Payrollmonth'];
    $Payrollyear =$form_data['Payrollyear'];
   
   
    $GetState = "SELECT * FROM vwpayrollmasteremplist where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Clientid ='$Clientid'  LIMIT 10 ";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 

    $mytbl["Test"]=$data01;


 

 $Display=array('data01' =>   $mytbl["Test"]);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
//////////////////////////////////
if($MethodGet == 'EMPREPORT')
{


try
{

    $Payrollmonth =$form_data['Payrollmonth'];
    $Payrollyear =$form_data['Payrollyear'];
    $Employeeid =$form_data['Employeeid'];
    $Category=$form_data['Category'];
   
   
    $GetState = "SELECT * FROM vwpayrollmasteremplist where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  And Employeeid ='$Employeeid' AND Type_Of_Posistion='$Category' AND Clientid ='$Clientid' ";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 

    $mytbl["Test"]=$data01;


 

 $Display=array('data01' =>   $mytbl["Test"]);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
////////////////////////////////////


if($MethodGet == 'FetchMaster')
{


try
{

  
    $SalMonth =$form_data['Payrollmonth'];
    $Salyear =$form_data['Payrollyear'];
    $Category =$form_data['Category'];
    
    $GetChapter = "SELECT * FROM indsys1026employeepayrollmastertemp where Clientid ='$Clientid' AND Category='$Category' AND SalMonth='$SalMonth' and Salyear='$Salyear' ";

  
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
 
 
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Workingdays =$row['Workingdays'];
      $Nationholidays =$row['Nationholidays'];
      $Payrollstatus = $row['Payrollstatus'];   
      $SalaryPaidDate =$row['SalaryPaidDate'];
     
      $Casual_Leave=$row['Casual_Leave'];
     
     
     
      } 
    }


    else
    {
     

      $Payrollmonth = $form_data['Payrollmonth'];
      $Payrollyear =$form_data['Payrollyear'];

   
    
      $month_num = date("m", strtotime($Payrollmonth));
      $year_num = $Payrollyear;
      
      
      $Fromdate= date("01-$month_num-$Payrollyear");
      $Todate=  date("t-$month_num-$Payrollyear",strtotime($Fromdate));



      
      // $Fromdate= date('01-m-Y');
      // $Todate=  date('t-m-Y',strtotime($Fromdate));
$Startdate = new DateTime($Fromdate);
      $Enddate = new DateTime($Todate);
      $no=0;

      $date = date("Y-m-d H:i:s" );
      $interval = DateInterval::createFromDateString('1 day');
      $period = new DatePeriod($Startdate, $interval,  $Enddate);
      // foreach ($period as $dt)
      // {
      //     if ($dt->format('N') == 7)
      //     {
      //         $no++;
      //     }
      // }
      $sundays=0; 
     
      $total_days=cal_days_in_month (CAL_GREGORIAN, $month_num, $Payrollyear); 
      //echo "Test$total_days";
      for ($i=1;$i<=$total_days;$i++) 
      if (date ('N',strtotime ($Payrollyear.'-'.$month_num.'-'.$i))==7) $sundays++;
      $totsundays = $sundays;



      $numOfDays=dateDiffInDays($Fromdate,$Todate);
    
      $Workingdays = ($numOfDays+1) - $totsundays;





$result = mysqli_query($conn, "select Count(*) as total from vwholidaymaster where Monthname ='$Payrollmonth' and Year = '$Payrollyear' and Dayname!='Sunday' AND Clientid ='$Clientid'");
$row = mysqli_fetch_array($result);
$Nationholidays = $row['total'];

$_SESSION["Payrollmonth"] =  $Payrollmonth;
$_SESSION["Payrollyear"] =  $Payrollyear;


$Payrollstatus ="Open";
$Casual_Leave ="1.5";

$SalaryPaidDate = $date;
  
    }



 $Display=array(
  'Workingdays' =>$Workingdays,
  'Nationholidays' =>$Nationholidays,
  'Payrollstatus' =>$Payrollstatus,
  'SalaryPaidDate' =>$SalaryPaidDate,
  'Casual_Leave' =>$Casual_Leave,
  



);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
//////////////////////////////////

if($MethodGet == 'PayrollFetch')
{


try
{

    $Employeeid =$form_data['Employeeid'];
    $SalMonth =$form_data['SalMonth'];
    $Salyear =$form_data['Salyear'];
    $Category =$form_data['Category'];
    
    $GetChapter = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where Clientid ='$Clientid' AND Employeeid='$Employeeid' AND SalMonth='$SalMonth' AND Category='$Category' and Salyear='$Salyear' ";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
 
 
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Employeeid =$row['Employeeid'];
      $SalMonth =$row['SalMonth'];
      $Salyear = $row['Salyear'];   
      $Title =$row['Title'];
      $Firstname =$row['Firstname'];
      $Lastname = $row['Lastname'];
      $Fullname = $row['Fullname'];
      $Department =$row['Department'];
      $Designation =$row['Designation'];
      $Workingdays = $row['Workingdays'];   
      $Workeddays =$row['Workeddays'];
      $Category =$row['Category'];
      $Nationalholidays = $row['Nationalholidays'];
      $Leavedays = $row['Leavedays'];
      $CL =$row['CL'];
      $LOP =$row['LOP'];
      $Totaldays = $row['Totaldays'];   
      $BasicDA =$row['BasicDA'];
      $HRA =$row['HRA'];
      $Otherallowance_Con_SA = $row['Otherallowance_Con_SA'];
      $TotalSal = $row['TotalSal'];
      $EarnedBasic =$row['EarnedBasic'];
      $EarnedHRA =$row['EarnedHRA'];
      $EarnedOtherallowance_Con_SA = $row['EarnedOtherallowance_Con_SA'];   
      $EarnedWages =$row['EarnedWages'];
      $PF =$row['PF'];
      $ESI = $row['ESI'];
      $Salary_Advance = $row['Salary_Advance'];
      $FoodDeduction =$row['FoodDeduction'];
      $TotalDeduction =$row['TotalDeduction'];
      $NetWages = $row['NetWages'];   
      $DailyAllowanance =$row['DailyAllowanance'];
      $TDS =$row['TDS'];
      $OT_HRS = $row['OT_HRS'];
      $OT_Wages = $row['OT_Wages'];
      $PFEmployeecompany =$row['PFEmployeecompany'];
      $ESIEmployeecompany =$row['ESIEmployeecompany'];
      $Performanceallowance = $row['Performanceallowance'];   
      $Backgroundverificationstatus =$row['Backgroundverificationstatus'];
      $PackageHoldstatus =$row['PackageHoldstatus'];
      $Superuserapproval = $row['Superuserapproval'];
      $TakenEL=$row['TakenEL'];
     
     
     
      } 
    }




 $Display=array(
  'Employeeid' =>$Employeeid,
  'SalMonth' =>$SalMonth,
  'Salyear' =>$Salyear,
  'Title' =>$Title,
  'Firstname' =>$Firstname,
  'Lastname' =>$Lastname,
  'Fullname' =>$Fullname,
  'Department' =>$Department,
  'Designation' =>$Designation,
  'Workingdays' =>$Workingdays,
  'Workeddays' =>$Workeddays,
  'Category' =>$Category,
  'Nationalholidays' =>$Nationalholidays,
  'Leavedays' =>$Leavedays,
  'CL' =>$CL,
  'LOP' =>$LOP,
  'Totaldays' =>$Totaldays,
  'BasicDA' =>$BasicDA,
  'HRA' =>$HRA,
  'Otherallowance_Con_SA' =>$Otherallowance_Con_SA,
  'TotalSal' =>$TotalSal,
  'EarnedBasic' =>$EarnedBasic,
  'EarnedHRA' =>$EarnedHRA,
  'EarnedOtherallowance_Con_SA' =>$EarnedOtherallowance_Con_SA,
  'EarnedWages' =>$EarnedWages,
  'PF' =>$PF,
  'ESI' =>$ESI,
  'Salary_Advance' =>$Salary_Advance,
  'FoodDeduction' =>$FoodDeduction,
  'TotalDeduction' =>$TotalDeduction,
  'NetWages' =>$NetWages,
  'DailyAllowanance' =>$DailyAllowanance,
  'TDS' =>$TDS,
  'OT_HRS' =>$OT_HRS,
  'OT_Wages' =>$OT_Wages,
  'PFEmployeecompany' =>$PFEmployeecompany,
  'ESIEmployeecompany' =>$ESIEmployeecompany,
  'Performanceallowance' =>$Performanceallowance,
  'Backgroundverificationstatus' =>$Backgroundverificationstatus,
  'PackageHoldstatus' =>$PackageHoldstatus,
  'Superuserapproval' =>$Superuserapproval,
  'TakenEL'=>$TakenEL


);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
////////////////////////
function getHoursAndMins($time, $format = '%02d:%02d')
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
/////////////////////////////
?>