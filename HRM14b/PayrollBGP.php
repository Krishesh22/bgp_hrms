<?php 
include '../config.php';


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

        $date = date("Y-m-d H:i:s" );
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($Startdate, $interval,  $Enddate);
        foreach ($period as $dt)
        {
            if ($dt->format('N') == 7)
            {
                $no++;
            }
        }
      
        $numOfDays=dateDiffInDays($Fromdate,$Todate);
      
        $Working_Days = ($numOfDays+1) - $no;
        $time=strtotime( $Fromdate);
        $Payrollmonth=date("F",$time);
        $Payrollyear=date("Y",$time); 
        $_SESSION["Payrollmonth"] =  $Payrollmonth;
        $_SESSION["Payrollyear"] =  $Payrollyear;
        $AuthorizedType=  $_SESSION["Authorizedtype"];
        $Weekoffdays = $no;
        $TotalDays = $numOfDays+1;

        
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
      'TodayDate' =>$date,
      'Weekoffdays' =>$Weekoffdays,
      'TotalDays' =>$TotalDays


      
     
  
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

        $Startdate = new DateTime($Fromdate);
        $Enddate = new DateTime($Todate);
        $no=0;

        $date = date("Y-m-d H:i:s" );
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($Startdate, $interval,  $Enddate);
        foreach ($period as $dt)
        {
            if ($dt->format('N') == 7)
            {
                $no++;
            }
        }
      
        $numOfDays=dateDiffInDays($Fromdate,$Todate);
      
        $Working_Days = ($numOfDays+1) - $no;
        $time=strtotime( $Fromdate);


        $AuthorizedType=  $_SESSION["Authorizedtype"];
        $Weekoffdays = $no;
        $TotalDays = $numOfDays+1;


$result = mysqli_query($conn, "select Count(*) as total from vwholidaymaster where Monthname ='$Payrollmonth' and Year = '$Payrollyear' and Dayname!='Sunday' AND Clientid ='$Clientid'");
$row = mysqli_fetch_array($result);
$Nationalholiday = $row['total'];

$_SESSION["Payrollmonth"] =  $Payrollmonth;
$_SESSION["Payrollyear"] =  $Payrollyear;

    $Display=array(
   
      'Nationalholiday' =>$Nationalholiday,
      'Weekoffdays' =>$Weekoffdays,
      'TotalDays' =>$TotalDays
      
     
  
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
  $Payrollstatus ="Open";
  $SalaryPaidDate = $date;
  $GetChapter = "SELECT Payrollstatus,SalaryPaidDate FROM indsys1026employeepayrollmastertemp where Clientid ='$Clientid' and SalMonth = '$Payrollmonth' and Salyear='$Payrollyear'  ";
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
  $Status = $form_data['Status'];
  $SalaryPaidDate = $form_data['SalaryPaidDate'];

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
  where SalMonth = '$Payrollmonth' and  Salyear = '$Payrollyear' AND Clientid ='$Clientid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Exists";

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
     
    $Fromdate01 =  date("Y-m-d", strtotime($Fromdate));
    $Todate01 =  date("Y-m-d", strtotime($Todate));
        $Working_Days = $form_data['Working_Days'];
        $Nationalholiday = $form_data['Nationalholiday'];
        $Status = $form_data['Status'];
      //  $CasualLeave = $form_data['CasualLeave'];
        $Emparray = $form_data['Emparray'];
        $TotaDays = $form_data['TotaDays'];
        $WeekOFF = $form_data['WeekOFF'];
        $CasualLeave=0;
        $test = implode(',', $Emparray);

        $array  = explode(",", $test );
        $Workeddays = 0;
if(empty($WeekOFF))
{
    $WeekOFF =0;
}
if(empty($TotaDays))
{
    $TotaDays =0;
}
       
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
           
            Payrollstartdate ='$Fromdate',     
            Payrollenddate ='$Todate',        
            Addormodifydatetime ='$date',
            Weekoff ='$WeekOFF',        
            TotalDays ='$TotaDays',
            Userid ='$user_id'
           
           
        WHERE SalMonth = '$Payrollmonth' AND Salyear ='$Payrollyear'
      
        AND Clientid ='$Clientid'  ";
            $resultExists0New = $conn->query($resultExistsss);
            $Message = "Exists";
      
      
           
        }
      
        else
        {
            $sqlsave = "INSERT IGNORE INTO indsys1026employeepayrollmastertemp (Clientid,
        SalMonth,Salyear,Workingdays,Nationholidays,Payrollstatus,Casual_Leave,Payrollstartdate,Payrollenddate,Userid,Addormodifydatetime,Weekoff,TotalDays)
         VALUES ('$Clientid','$Payrollmonth','$Payrollyear','$Working_Days','$Nationalholiday',
         '$Status','0','$Fromdate','$Todate','$user_id','$date','$WeekOFF','$TotaDays')";
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
      $Performance_allowance = $row['Performance_allowance'];
      $Day_allowance=$row['Day_allowance'];
      $Department =$row['Department'];
      $Type_Of_Posistion = $row['Type_Of_Posistion'];
      $LWF =$row['LWF'];
      $Designation =$row['Designation'];
      $date_of_joining =$row['Date_Of_Joing'];
      $week_off ='Sunday';
      $Backgroundverification = "No Need";
      $Packageholdstatus = "Open";
      $Superuserapproval ="Approved";
      $Performanceallowance =$row['Performance_allowance'];
      $TA =$row['TA'];
      if(empty($TA))
      {
        $TA = 0;
      }
      if(empty($LWF))
      {
        $LWF = 0;
      }
      if(empty($Performanceallowance))
      {
        $Performanceallowance=0;
      }

      $GetState = "SELECT * FROM indsys1017employeemaster where Employeeid='$Employeeid' AND  EmpActive ='Active'  AND Gross_Salary >30000 AND  (BackgroundVerification='No' OR BackgroundVerification is null) AND Clientid ='$Clientid'   ORDER BY Employeeid";
      $result_GetState= $conn->query($GetState );
      if(mysqli_num_rows($result_GetState) > 0) { 
  
  
      while($row = mysqli_fetch_array($result_GetState)) {  

        $Backgroundverification = "Need";
      $Packageholdstatus = "Hold";
      $Superuserapproval="Waiting";
      }
    }
////////////////////////

    $PresentDays = 0;
    $AbsentDays =0;
    $SickLeave = 0;
    $EarnLeave =0;
    $CasualLeave=0;
    $TotalDays = 0;
    //////////////////////////////////////////////////
      $sql = "SELECT  SUM(Workingdays) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'";
      $result = $conn->query($sql);
      
      while($row = mysqli_fetch_array($result)){
        $Workeddays= $row['SUM(Workingdays)'];
          
      }

/////////////////////////////////////
      $sqlPresentDays = "SELECT  SUM(EmpAttendaysloss) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and EmpAttendaysStatus='P'";
      $resultPresentDays = $conn->query($sqlPresentDays);
      
      while($row = mysqli_fetch_array($resultPresentDays)){
        $PresentDays= $row['SUM(EmpAttendaysloss)'];
          
      }

      ////////////////////
      $sqlAbsentDays = "SELECT  SUM(EmpAttendaysloss) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and EmpAttendaysStatus='A'";
      $resultAbsentDays = $conn->query($sqlAbsentDays);
      
      while($row = mysqli_fetch_array($resultAbsentDays)){
        $AbsentDays= $row['SUM(EmpAttendaysloss)'];
          
      }

    
        $sqlCausalLeave = "SELECT  SUM(EmpAttendaysloss) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and EmpAttendaysStatus='CL'";
        $resultCausalLeave = $conn->query($sqlCausalLeave);
        
        while($row = mysqli_fetch_array($resultCausalLeave)){
          $CasualLeave= $row['SUM(EmpAttendaysloss)'];
          
            
        }
      //////////////////////////////////
      $sqlSickLeave = "SELECT  SUM(EmpAttendaysloss) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and EmpAttendaysStatus='SL'";
      $resultSickLeave = $conn->query($sqlSickLeave);
      
      while($row = mysqli_fetch_array($resultSickLeave)){
        $SickLeave= $row['SUM(EmpAttendaysloss)'];
          
      }
      //////////////////////////////////
      $sqlEarnLeave = "SELECT  SUM(EmpAttendaysloss) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and EmpAttendaysStatus='EL'";
      $resultEarnLeave = $conn->query($sqlEarnLeave);
      
      while($row = mysqli_fetch_array($resultEarnLeave)){
        $EarnLeave= $row['SUM(EmpAttendaysloss)'];
          
      }
      /////////////////////////////////////
 
      $TotalDays = $SickLeave+$EarnLeave+$CausalLeave+ $PresentDays+$WeekOFF+$Nationalholiday;
      
      if(empty($Workeddays))
      {
        $Workeddays = 0;
      }
      $OT_HRS = 0;
      $sqlOT = "SELECT  SUM(OT_HRS) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'";
      $resultOT = $conn->query($sqlOT);
      
      while($row = mysqli_fetch_array($resultOT)){
        $OT_HRS= $row['SUM(OT_HRS)'];
          
      }
      if(empty($OT_HRS))
      {
        $OT_HRS = 0;
      }

      if($OT_HRS >16)
      {
        $OT_HRS =16;
      }

      
    
      
      
      

      //$result = get_attendance($conn,$Employeeid,$Fromdate,$emp_shift, $Category,$date_of_joining,$week_off);
 
      $resultExists = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid = '$Employeeid'  and SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  AND Clientid ='$Clientid'LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $Message ="Exists";
 
  }

  else
  {
    $sqlsave = "INSERT IGNORE INTO indsys1026employeepayrolltempmasterdetail (Clientid,Employeeid,SalMonth,Salyear,Firstname,Lastname,Title,Fullname,Designation,Department,Workingdays,Workeddays,Category,Nationalholidays,Leavedays,CL,LOP,Totaldays,BasicDA,HRA,Otherallowance_Con_SA,TotalSal,EarnedBasic,EarnedHRA,EarnedOtherallowance_Con_SA,EarnedWages,PF,ESI,Salary_Advance,FoodDeduction,TotalDeduction,
    NetWages,DailyAllowanance,TDS,OT_HRS,OT_Wages,Userid,Addormodifydatetime,Performanceallowance,
    Backgroundverificationstatus,PackageHoldstatus,Superuserapproval,SL,EL,LWF,Presentdays,AbsentDays,Weekoff,Conveyence,EarnedConveyence,EarnedDailyAllowance,EarnedLWF)
    values('$Clientid','$Employeeid','$Payrollmonth','$Payrollyear','$Firstname','$Lastname','$Title','$Fullname','$Designation','$Department','$TotaDays',0,'$Category','$Nationalholiday',0,'$CasualLeave',0,0,'$Basic','$HR_Allowance','$Other_Allowance',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'$user_id','$date','$Performanceallowance','$Backgroundverification','$Packageholdstatus','$Superuserapproval','$SickLeave','$EarnLeave','$LWF','$PresentDays','$AbsentDays','$WeekOFF','$TA',0,0,0)";

    $resultsave = mysqli_query($conn,$sqlsave);
   

     
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
  $TotalMasterdays = $TotaDays;

$updatefunction = CallEmppdatepayroll($conn,$Clientid,$user_id,$date, $Employeeid,$Payrollmonth, $Payrollyear,$Workeddays, $Leavedays,$Salary_Advance, $FoodDeduction,$TDS,$Category,$Working_Days,$Nationalholiday, $CasualLeave, $Basic,$HR_Allowance,$Other_Allowance , $OT_HRS, $DailyAllowanance,$Performanceallowance,$SickLeave,$EarnLeave,$LWF,$PresentDays,$AbsentDays,$WeekOFF,$TA,$TotalMasterdays);

   
   
     
     
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
   
   
    $GetState = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Clientid ='$Clientid'   ORDER BY Employeeid";
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
//////////////////////////////////////
if($MethodGet == 'ParollFunction')
{


try
{

    $Employeeid =$form_data['Employeeid'];
    $Payrollmonth =$form_data['SalMonth'];
    $Payrollyear =$form_data['Salyear'];
    $Workeddays =$form_data['Workeddays'];
    $Leavedays =$form_data['Leavedays'];
    $Salary_Advance =$form_data['Salary_Advance'];
    $FoodDeduction =$form_data['FoodDeduction'];
    $TDS =$form_data['TDS'];
    $Category =$form_data['Category'];
    $Workingdays =$form_data['Workingdays'];
    $Nationalholidays =$form_data['Nationalholidays'];
    $CasualLeave =$form_data['CL'];
    $Basic =$form_data['BasicDA'];
    $HR_Allowance =$form_data['HRA'];
    $Other_Allowance =$form_data['Otherallowance_Con_SA'];
    $OT_HRS = $form_data['OT_HRS'];
    $DailyAllowanance =$form_data['DailyAllowanance'];

    $PresentDays =$form_data['Presentdays'];
    $AbsentDays =$form_data['AbsentDays'];
    $WeekOFF =$form_data['Weekoff'];
    $SickLeave =$form_data['SL'];
    $EarnLeave = $form_data['EL'];
    $TotalMasterdays =$form_data['TotaDays'];
    $Performanceallowance =0;
    $EarnedBasics =0;
    $EarnedHRA =0;
    $EarnedOtherallowance =0;
    $PF =0;
    $ESI = 0;
    $Totaldays = 0;
    $Total_Salary = 0;
    $Lop =0;
    $Net_Salary =0;
    $OT_Wages = 0;
    $Leavedays =0;
    $Earned_Wages =0;

  if(empty($Workeddays))
  {
    $Workeddays =0;
  }

  if(empty($Salary_Advance))
  {
    $Salary_Advance =0;
  }
  if(empty($FoodDeduction))
  {
    $FoodDeduction =0;
  }
    if(empty($BasicDA))
    {
      $BasicDA =0;
    }
 
    if(empty($HRA))
    {
      $HRA =0;
    }
    if(empty($Otherallowance_Con_SA))
    {
      $Otherallowance_Con_SA =0;
    }
    if(empty($Workingdays))
    {
      $Workingdays =0;
    }
    if(empty($Day_allowance))
    {
      $Day_allowance =0;
    }
    if(empty($Nationalholidays))
    {
      $Nationalholidays =0;
    }
    if(empty($TDS))
     {
  $TDS =0;
  }
  



    $updatefunction = CallEmppdatepayroll($conn,$Clientid,$user_id,$date, $Employeeid,$Payrollmonth, $Payrollyear,$Workeddays, $Leavedays,$Salary_Advance, $FoodDeduction,$TDS,$Category,$Working_Days,$Nationalholiday, $CasualLeave, $Basic,$HR_Allowance,$Other_Allowance , $OT_HRS, $DailyAllowanance,$Performanceallowance,$SickLeave,$EarnLeave,$LWF,$PresentDays,$AbsentDays,$WeekOFF,$TA,$TotalMasterdays);


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
////////////////////////////////////////////////
function roundup($float, $dec = 2){
  if ($dec == 0) {
      if ($float < 0) {
          return floor($float);
      } else {
          return ceil($float);
      }
  } else {
      $d = pow(10, $dec);
      if ($float < 0) {
          return floor($float * $d) / $d;
      } else {
          return ceil($float * $d) / $d;
      }
  }
}
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


////////////////////
function CallEmppdatepayroll($conn,$Clientid,$user_id,$date, $Employeeid,$Payrollmonth, $Payrollyear,$Workeddays, $Leavedays,$Salary_Advance, $FoodDeduction,$TDS,$Category,$Working_Days,$Nationalholiday, $CasualLeave, $Basic,$HR_Allowance,$Other_Allowance , $OT_HRS, $DailyAllowanance,$Performanceallowance,$SickLeave,$EarnLeave,$LWF,$PresentDays,$AbsentDays,$WeekOFF,$TA,$TotalMasterdays)
{

try
{

  //  $MonthworkDays = $Workingdays;
  //  $Workingdays = 26;

    $EarnedBasics =0;
    $EarnedHRA =0;
    $EarnedOtherallowance =0;
    $PF =0;
    $ESI = 0;
    $Totaldays = 0;
    $Total_Salary = 0;
    $Lop =0;
    $Net_Salary =0;
    $OT_Wages = 0;
    $Leavedays =0;
    $Earned_Wages =0;
    $EarnedConveyence =0;
    $EarnedDailyAllowance = 0;
    $SalMonth = $Payrollmonth;
    $Salyear =$Payrollyear;
    $BasicDA = $Basic;
    $HRA = $HR_Allowance;
    $Otherallowance_Con_SA = $Other_Allowance;
    $EarnedLWF=0;




  if(empty($Workeddays))
  {
    $Workeddays =0;
  }

  if(empty($Salary_Advance))
  {
    $Salary_Advance =0;
  }
  if(empty($FoodDeduction))
  {
    $FoodDeduction =0;
  }
    if(empty($BasicDA))
    {
      $BasicDA =0;
    }
 
    if(empty($HRA))
    {
      $HRA =0;
    }
    if(empty($Otherallowance_Con_SA))
    {
      $Otherallowance_Con_SA =0;
    }
    if(empty($Workingdays))
    {
      $Workingdays =0;
    }
    if(empty($Day_allowance))
    {
      $Day_allowance =0;
    }
    if(empty($Nationalholidays))
    {
      $Nationalholidays =0;
    }
    if(empty($TDS))
{
  $TDS =0;
}
if(empty($CasualLeave))
{
  $CasualLeave =0;
}
if(empty($SickLeave))
{
  $SickLeave =0;
}
if(empty($EarnLeave))
{
  $EarnLeave =0;
}
if(empty($LWF))
{
  $LWF =0;
}
if(empty($PresentDays))
{
  $PresentDays =0;
}


if(empty($AbsentDays))
{
    $AbsentDays =0;
}
if(empty($WeekOFF))
{
    $WeekOFF = 0;
}
if(empty($TA))
{
    $TA = 0;
}
    $GetChapter = "SELECT * FROM indsys1025pfandesilimitmaster where Clientid ='$Clientid' ";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
 
 
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $PFLimit =$row['PFLimit'];
      $ESILimit =$row['ESILimit'];
      $PFemployeepercentage = $row['PFemployeepercentage'];   
      $PFemployeerpercentage =$row['PFemployeerpercentage'];
      $ESIemployeepercentage =$row['ESIemployeepercentage'];
      $ESIemployeerpercentange = $row['ESIemployeerpercentange'];
      $Dailyallowancelimit = $row['Dailyallowancelimit'];
     
     
      } 
    }

    $GetEmployee = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid='$Employeeid' ";
    $result_Employee = $conn->query($GetEmployee );
    if(mysqli_num_rows($result_Employee) > 0) { 
 
 
    while($row = mysqli_fetch_array($result_Employee)) {  
      $PF_Yesandno =$row['PF_Yesandno'];
      $ESI_Yesandno =$row['ESI_Yesandno'];
      $Dailyallowancelimit =$row['Day_allowance'];
      $TA =$row['TA'];
      
     
     
      } 
    }


//$Lop=Max(($Leavedays-$CL),0);
    $Totaldays = $CasualLeave+$PresentDays+$SickLeave+$EarnLeave+$WeekOFF+$Nationalholiday;

    //Totalsalary=Basics+HRA+DA
    $Total_Salary = $BasicDA+$HRA+$Otherallowance_Con_SA+$Performanceallowance +$TA;

    //Earnedbasics=Basicda-(Basicda/workingdays)*Lossofpay
    $EarnedBasics =($BasicDA/$TotalMasterdays)*$Totaldays;
    //EarnedHRA = HRA-(HRA/Workingdays)*Lossofpay
    $EarnedHRA =($HRA/$TotalMasterdays)*$Totaldays;
//EarnedOA = OA-(OA/Workingdays)*Lossofpay
$EarnedOtherallowance = ($Otherallowance_Con_SA/$TotalMasterdays)*$Totaldays;
$EarnedConveyence =($TA/$TotalMasterdays)*$Totaldays;
if($Category =="Category 2")
{
  $DailyAllowanance =    $Dailyallowancelimit;
  $EarnedDailyAllowance = $Dailyallowancelimit*$PresentDays;

}

////////////////OT_wages = (Totalsalary/Workingdays/8*2*OThours)

$OT_Wages=($Total_Salary/26/8*2*$OT_HRS);
//Earnedwaged = roundup(Earnedbasics+Earnedhra+EarnedOA+EarnedOTwages,0)

$Earned_Wages =($EarnedBasics+$EarnedHRA+$EarnedOtherallowance+$OT_Wages+$EarnedDailyAllowance+$EarnedConveyence );
$Earned_Wages=roundup($Earned_Wages);
$Earned_Wages=round($Earned_Wages,0);




$EarnedLWF = $Earned_Wages*(0.2/100);

if($EarnedLWF>25)
{
  $EarnedLWF = 25;
}

   $pfpercentage=($PFemployeepercentage/100);
   $esipercentage = ($ESIemployeepercentage/100);

   if($PF_Yesandno =='Yes')
   {
     /////////////////PF=(EarnedBasic+EarnedOtherallowance)*12%
     
    $PF =($EarnedBasics+$EarnedOtherallowance)*$pfpercentage;
    $PF=round($PF,0);
   }
else
{
  $PF =0;
}
if($ESI_Yesandno =='Yes')
{
  /////////ESI =Roundup(Earnedwages*0.75%,0)
  
$Esi = ($Earned_Wages*$esipercentage);
$ESI=roundup($Esi);
$ESI = round($ESI,0);
}
else
{
  $ESI=0;
}
    /////////Totaldeduction=PF+ESI+Advance+Deduction+TDS
$Totaldeduction = $Salary_Advance+$FoodDeduction+$PF+$ESI+$TDS+$EarnedLWF;
////NetWages= Earnedwages-Totaldeduction
$Net_Salary=$Earned_Wages-$Totaldeduction;

$resultExists = "Update indsys1026employeepayrolltempmasterdetail set 
Leavedays ='$AbsentDays',
LOP ='$AbsentDays',
Totaldays='$Totaldays',
TotalSal ='$Total_Salary',
EarnedBasic='$EarnedBasics',
EarnedHRA ='$EarnedHRA',
EarnedOtherallowance_Con_SA ='$EarnedOtherallowance',
EarnedWages='$Earned_Wages',
PF ='$PF',
ESI='$ESI',
Salary_Advance ='$Salary_Advance',
FoodDeduction ='$FoodDeduction',
TotalDeduction='$Totaldeduction',
NetWages ='$Net_Salary',
DailyAllowanance='$DailyAllowanance',
TDS='$TDS',
OT_HRS ='$OT_HRS',
OT_Wages='$OT_Wages',
Workeddays='$Workeddays',
Performanceallowance='$Performanceallowance',
Addormodifydatetime ='$date',
CL='$CasualLeave',
LWF='$LWF',
SL='$SickLeave',
EL='$EarnLeave',
Presentdays='$PresentDays',
AbsentDays='$AbsentDays',
Weekoff='$WeekOFF',
Conveyence='$TA',
EarnedConveyence='$EarnedConveyence',
EarnedDailyAllowance='$EarnedDailyAllowance',
EarnedLWF='$EarnedLWF',
Userid ='$user_id'
   WHERE Employeeid = '$Employeeid' and SalMonth = '$SalMonth' and  Salyear = '$Salyear' AND Clientid ='$Clientid' ";
$resultExists01 = $conn->query($resultExists);
$Message ="Exists";


 
}
catch(Exception $e)
{

}
 
     
}


////////////////////////////
if ($MethodGet == 'FetchTest')
{

    try
    {
        

        $Fromdate = '01-04-2022';
        $Todate ='30-04-2022';
        $Payrollmonth = 'April';
        $Payrollyear ='2022';
     
        $Working_Days =26;
        $Nationalholiday = 0;
        $Status = "Open";
        $CasualLeave = '1.5';
        $Emparray = ['1001','1003','1002'];
        $test = implode(',', $Emparray);

        $array  = explode(",", $test );

       
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
      

        $resultExists = "DELETE FROM indsys1026employeepayrolltempmasterdetail WHERE Clientid = '$Clientid'  and SalMonth = '$Payrollmonth' and Salyear = '$Payrollyear'   ";
        $resultExists01 = $conn->query($resultExists);
      

        foreach ($array as $Employeeid) {
            $no++;
            $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid' and EmpActive='Active'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  

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
      $Performance_allowance = $row['Performance_allowance'];
      $Day_allowance=$row['Day_allowance'];
      $Department =$row['Department'];
      $Type_Of_Posistion = $row['Type_Of_Posistion'];
      $Designation =$row['Designation'];
      $date_of_joining =$row['Date_Of_Joing'];
      $week_off ='Sunday';

      $result = get_attendance($conn,$Employeeid,$Fromdate,$emp_shift, $Category,$date_of_joining,$week_off);
 
      $resultExists = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid = '$Employeeid'  and SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Clientid ='$Clientid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $Message ="Exists";
 
  }

  else
  {
    $sqlsave = "INSERT IGNORE INTO indsys1026employeepayrolltempmasterdetail (Clientid,Employeeid,SalMonth,Salyear,Firstname,Lastname,Title,Fullname,Designation,Department,Workingdays,Workeddays,Category,Nationalholidays,Leavedays,CL,LOP,Totaldays,BasicDA,HRA,Otherallowance_Con_SA,TotalSal,EarnedBasic,EarnedHRA,EarnedOtherallowance_Con_SA,EarnedWages,PF,ESI,Salary_Advance,FoodDeduction,TotalDeduction,NetWages,DailyAllowanance,TDS,OT_HRS,OT_Wages,Userid,Addormodifydatetime,Performanceallowance)
    values('$Clientid','$Employeeid','$Payrollmonth','$Payrollyear','$Firstname','$Lastname','$Title','$Fullname','$Designation','$Department','$Working_Days',0,'$Category','$Nationalholiday',0,$CasualLeave,0,0,$Basic,$HR_Allowance,$Other_Allowance,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'$user_id','$date',0)";

    $resultsave = mysqli_query($conn,$sqlsave);
   

     
  }

  $data = $result['data'];
	$LogDate = $result['LogDate'];
	$apsent = $data['apsent'];
	$extra_day_ot = $data['extra_day_ot'];
	//echo "<br/>";

	$grand_totdh = $data['grand_totdh'];
	$OT_HRS = $data['grand_ot'];
	if($OT_HRS<0){
		$OT_HRS = 0;
	}
	
	$month_working_days = $data['month_working_days'];
	$Workeddays = $data['worked_days'];
  $Salary_Advance =0;
  $TDS =0;
  $FoodDeduction =0;
  $Leavedays =0;
  $DailyAllowanance =0;
//$updatefunction = CallEmppdatepayroll($conn,$Clientid,$user_id,$date, $Employeeid,$Payrollmonth, $Payrollyear,$Workeddays, $Leavedays,$Salary_Advance, $FoodDeduction,$TDS,$Category,$Working_Days,$Nationalholiday, $CasualLeave, $Basic,$HR_Allowance,$Other_Allowance , $OT_HRS, $DailyAllowanance);

   
   
     
     
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
//////////////////////////////////
if ($MethodGet == 'FetchBulk')
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
        
//$from_days=cal_days_in_month(CAL_GREGORIAN,$month_num,$year_num);
     
        $Working_Days = $form_data['Working_Days'];
        $Nationalholiday = $form_data['Nationalholiday'];
        $Status = $form_data['Status'];
        $CasualLeave = $form_data['CasualLeave'];
        
        $Workingdays = 0;

          $TotaDays = $form_data['TotaDays'];
        $WeekOFF = $form_data['WeekOFF'];
       // $Emparray = $form_data['Emparray'];
        // $test = implode(',', $Emparray);

        // $array  = explode(",", $test );
if(empty($WeekOFF))
{
    $WeekOFF =0;
}
if(empty($TotaDays))
{
    $TotaDays =0;
}
  
       
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
              Weekoff ='$WeekOFF',        
            TotalDays ='$TotaDays',     
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
        SalMonth,Salyear,Workingdays,Nationholidays,Payrollstatus,Casual_Leave,Payrollstartdate,Payrollenddate,Userid,Addormodifydatetime,Weekoff,TotalDays)
         VALUES ('$Clientid','$Payrollmonth','$Payrollyear','$Working_Days','$Nationalholiday',
         '$Status','0','$Fromdate','$Todate','$user_id','$date','$WeekOFF','$TotaDays')";
            $resultsave = mysqli_query($conn, $sqlsave);
      
          
        }
      

        // $resultExists = "DELETE FROM indsys1026employeepayrolltempmasterdetail WHERE Clientid = '$Clientid'  and SalMonth = '$Payrollmonth' and Salyear = '$Payrollyear'   ";
        // $resultExists01 = $conn->query($resultExists);
      
        $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active'  ORDER BY Employeeid ASC";
	
   
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
      $Performance_allowance = $row['Performance_allowance'];
      $Day_allowance=$row['Day_allowance'];
      $Department =$row['Department'];
      $Type_Of_Posistion = $row['Type_Of_Posistion'];
      $Designation =$row['Designation'];
      $date_of_joining =$row['Date_Of_Joing'];
      $Backgroundverification = "No Need";
      $Packageholdstatus = "Open";
      $Superuserapproval ="Approved";
      $Performanceallowance =$row['Performance_allowance'];

            $LWF =$row['LWF'];

if(empty($Performanceallowance));
{
  $Performanceallowance =0;
}

  if(empty($TA))
      {
        $TA = 0;
      }
      if(empty($LWF))
      {
        $LWF = 0;
      }
        $GetState = "SELECT * FROM indsys1017employeemaster where Employeeid='$Employeeid' AND  EmpActive ='Active'  AND Gross_Salary >30000 AND  (BackgroundVerification='No' OR BackgroundVerification is null) AND Clientid ='$Clientid'   ORDER BY Employeeid";
      $result_GetState= $conn->query($GetState );
      if(mysqli_num_rows($result_GetState) > 0) { 
  
  
      while($row = mysqli_fetch_array($result_GetState)) {  

        $Backgroundverification = "Need";
      $Packageholdstatus = "Hold";
      $Superuserapproval="Waiting";
      }
    }
////////////////////////

    $PresentDays = 0;
    $AbsentDays =0;
    $SickLeave = 0;
    $EarnLeave =0;
    $CasualLeave=0;
    $TotalDays = 0;
    //////////////////////////////////////////////////
      $sql = "SELECT  SUM(Workingdays) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'";
      $result = $conn->query($sql);
      
      while($row = mysqli_fetch_array($result)){
        $Workeddays= $row['SUM(Workingdays)'];
          
      }

/////////////////////////////////////
      $sqlPresentDays = "SELECT  SUM(EmpAttendaysloss) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and EmpAttendaysStatus='P'";
      $resultPresentDays = $conn->query($sqlPresentDays);
      
      while($row = mysqli_fetch_array($resultPresentDays)){
        $PresentDays= $row['SUM(EmpAttendaysloss)'];
          
      }

      ////////////////////
      $sqlAbsentDays = "SELECT  SUM(EmpAttendaysloss) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and EmpAttendaysStatus='A'";
      $resultAbsentDays = $conn->query($sqlAbsentDays);
      
      while($row = mysqli_fetch_array($resultAbsentDays)){
        $AbsentDays= $row['SUM(EmpAttendaysloss)'];
          
      }

    
        $sqlCausalLeave = "SELECT  SUM(EmpAttendaysloss) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and EmpAttendaysStatus='CL'";
        $resultCausalLeave = $conn->query($sqlCausalLeave);
        
        while($row = mysqli_fetch_array($resultCausalLeave)){
          $CasualLeave= $row['SUM(EmpAttendaysloss)'];
          
            
        }
      //////////////////////////////////
      $sqlSickLeave = "SELECT  SUM(EmpAttendaysloss) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and EmpAttendaysStatus='SL'";
      $resultSickLeave = $conn->query($sqlSickLeave);
      
      while($row = mysqli_fetch_array($resultSickLeave)){
        $SickLeave= $row['SUM(EmpAttendaysloss)'];
          
      }
      //////////////////////////////////
      $sqlEarnLeave = "SELECT  SUM(EmpAttendaysloss) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid' and EmpAttendaysStatus='EL'";
      $resultEarnLeave = $conn->query($sqlEarnLeave);
      
      while($row = mysqli_fetch_array($resultEarnLeave)){
        $EarnLeave= $row['SUM(EmpAttendaysloss)'];
          
      }
      /////////////////////////////////////
 
      $TotalDays = $SickLeave+$EarnLeave+$CausalLeave+ $PresentDays+$WeekOFF+$Nationalholiday;
      
      if(empty($Workeddays))
      {
        $Workeddays = 0;
      }
      $OT_HRS = 0;
      $sqlOT = "SELECT  SUM(OT_HRS) from indsys1030empdailyattendancedetail where Clientid='$Clientid' and Attendencedate>='$Fromdate01' and Attendencedate <='$Todate01' and Employeeid = '$Employeeid'";
      $resultOT = $conn->query($sqlOT);
      
      while($row = mysqli_fetch_array($resultOT)){
        $OT_HRS= $row['SUM(OT_HRS)'];
          
      }
      if(empty($OT_HRS))
      {
        $OT_HRS = 0;
      }

      if($OT_HRS >16)
      {
        $OT_HRS =16;
      }

      
    
      
      
      

      //$result = get_attendance($conn,$Employeeid,$Fromdate,$emp_shift, $Category,$date_of_joining,$week_off);
 
      $resultExists = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid = '$Employeeid'  and SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  AND Clientid ='$Clientid'LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $Message ="Exists";
 
  }

  else
  {
    $sqlsave = "INSERT IGNORE INTO indsys1026employeepayrolltempmasterdetail (Clientid,Employeeid,SalMonth,Salyear,Firstname,Lastname,Title,Fullname,Designation,Department,Workingdays,Workeddays,Category,Nationalholidays,Leavedays,CL,LOP,Totaldays,BasicDA,HRA,Otherallowance_Con_SA,TotalSal,EarnedBasic,EarnedHRA,EarnedOtherallowance_Con_SA,EarnedWages,PF,ESI,Salary_Advance,FoodDeduction,TotalDeduction,
    NetWages,DailyAllowanance,TDS,OT_HRS,OT_Wages,Userid,Addormodifydatetime,Performanceallowance,
    Backgroundverificationstatus,PackageHoldstatus,Superuserapproval,SL,EL,LWF,Presentdays,AbsentDays,Weekoff,Conveyence,EarnedConveyence,EarnedDailyAllowance,EarnedLWF)
    values('$Clientid','$Employeeid','$Payrollmonth','$Payrollyear','$Firstname','$Lastname','$Title','$Fullname','$Designation','$Department','$TotaDays',0,'$Category','$Nationalholiday',0,'$CasualLeave',0,0,'$Basic','$HR_Allowance','$Other_Allowance',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'$user_id','$date','$Performanceallowance','$Backgroundverification','$Packageholdstatus','$Superuserapproval','$SickLeave','$EarnLeave','$LWF','$PresentDays','$AbsentDays','$WeekOFF','$TA',0,0,0)";

    $resultsave = mysqli_query($conn,$sqlsave);
   

     
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
  $TotalMasterdays = $TotaDays;

$updatefunction = CallEmppdatepayroll($conn,$Clientid,$user_id,$date, $Employeeid,$Payrollmonth, $Payrollyear,$Workeddays, $Leavedays,$Salary_Advance, $FoodDeduction,$TDS,$Category,$Working_Days,$Nationalholiday, $CasualLeave, $Basic,$HR_Allowance,$Other_Allowance , $OT_HRS, $DailyAllowanance,$Performanceallowance,$SickLeave,$EarnLeave,$LWF,$PresentDays,$AbsentDays,$WeekOFF,$TA,$TotalMasterdays);

   
   
     
     
 


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

///////////////////////////////////////////////////////
if($MethodGet == 'PAYREPORT')
{
  $Payrollmonth = $form_data['Payrollmonth'];
  $Payrollyear = $form_data['Payrollyear'];

  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('INDSYS');
$pdf->setTitle('Payroll-Employee');
$pdf->setSubject('Payroll');
$pdf->setKeywords('Payroll');

// set default header data
//$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);


$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);



// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('dejavusans', '', 10);

// add a page

$pdf->AddPage();
$logemp = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Clientid='$Clientid' and SalMonth='$Payrollmonth' and Salyear='$Payrollyear' ORDER BY Employeeid ASC";
	
   
$logempall = mysqli_query($conn, $logemp);
while($row = mysqli_fetch_array($logempall)) {
  $month = $row['SalMonth'];
  $Salyear = $row['Salyear'];
  $Title = $row['Title'];
  $Fullname = $row['Fullname'];
  $Department = $row['Department'];
  $Designation = $row['Designation'];
  $Workingdays = $row['Workingdays'];
  $Workeddays = $row['Workeddays'];
  $Category = $row['Category'];
  $Nationalholidays = $row['Nationalholidays'];
  $Leavedays = $row['Leavedays'];
  $CL = $row['CL'];
  $LOP = $row['LOP'];
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
  $Employeeid =$row['Employeeid'];

 

  // $pdf->AddPage();
  $html = '<table border="0"><tr><td style="width:355px"><img src="../Logo/Sainmarknewlogo.png" width="130" height="60" border="0"/></td><td>
  <p style="font-size:14px;">Sainmarks Industries India Pvt Ltd<br/><br/>Payslip for <b>'.$Title.' '.$Fullname.'</b></p></td></tr></table><br/><hr/>&nbsp;';
  
  
  $pdf->setFont('dejavusans', '', 8);
  
  $html .= '<br/>
  <table border="1" cellpadding="5">
  <tr><td>Name</td><td>'.$Fullname.'</td><td>Payslip Month & Year</td><td>'.$month.'-'.$Salyear.'</td></tr>
  <tr><td>Department</td><td>'.$Department.'</td><td>Workingdays</td><td>'.$Workingdays.'</td></tr>
  <tr><td>Employee ID</td><td>'.$Employeeid.' </td><td>Workeddays</td><td>'.$Workeddays.'</td></tr>
  <tr><td>Designation</td><td>'.$Designation.'</td><td>LOP</td><td>'.$LOP.'</td></tr>
  <tr><td>Employee Category</td><td>'.$Category.'</td><td></td><td></td></tr>
  </table>
  <br/><br/>
  
  <table border="1" cellpadding="5">
      <tbody>
          <tr>
          <td rowspan="2"></td>
              <td colspan="2" align="center">Allowances</td>
              <td colspan="2"  align="center" rowspan="2"><br/><br/>Deductions</td>
          </tr>
  
  
  
          <tr>
              <td align="center">Standard</td>
              <td align="center">Earned</td>
          </tr>
          <tr>
              <td>Basic DA</td>
              <td>'.$BasicDA.'</td>
              <td>'.$EarnedBasic.'</td>
              <td>Salary Advance</td>
              <td>'.$Salary_Advance.'</td>
          </tr>
          <tr>
              <td>HRA</td>
              <td>'.$HRA.'</td>
              <td>'.$EarnedHRA.'</td>
              <td>Food</td>
              <td>'.$FoodDeduction.'</td>
          </tr>
          <tr>
              <td>Other Allowances</td>
              <td>'.$Otherallowance_Con_SA.'</td>
              <td>'.$EarnedOtherallowance_Con_SA.'</td>
              <td>TDS</td>
              <td>'.$TDS.'</td>
          </tr>
  
          <tr>
              <td>Total</td>
              <td>'.$TotalSal.'</td>
              <td>'.$EarnedWages.'</td>
              <td>Total</td>
              <td>'.$TotalDeduction.'</td>
          </tr>
  
      </tbody>
  </table>
  
  <br/><br/>
  
  
  <table border="0" cellpadding="7">
  
  <tr><td>PF     :</td><td>'.$PF.'</td><td></td><td></td></tr>
  <tr><td>ESI :</td><td>'.$ESI.'</td><td>Net Salary:</td><td>'.$NetWages.'</td></tr>
  </table>
  

  
  <p><b>Note</b>: <i>This is a computer generated payslip & does not require a signature.</i></p>
  
  ';
  
  // output the HTML content
  $pdf->writeHTML($html, true, false, true, false, '');
  

  
  
}
// output the HTML content





// Print some HTML Cells

// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

$pdf ->AddPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print all HTML colors

// add a page


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$directory = "../PayRoll/";
$filename ='Payroll.pdf';
// ---------------------------------------------------------
if(!is_dir($directory)){
    mkdir($directory);
  }
  $file =$filename;
//Close and output PDF document
$pdf->Output(dirname(__DIR__, 1)."$directory$filename", 'F'  );

$filename = "$directory$filename";
  
// Header content type
header("Content-type: application/pdf");
  
header("Content-Length: " . filesize($filename));
  
// Send the file to the browser.
readfile($filename);
}
///////////////////////
if($MethodGet == 'PayrollPerformanceFunction')
{


try
{

    $Employeeid =$form_data['Employeeid'];
    $SalMonth =$form_data['SalMonth'];
    $Salyear =$form_data['Salyear'];
    $Performanceallowance =$form_data['Performanceallowance'];
    

$resultExists = "Update indsys1026employeepayrolltempmasterdetail set 
Performanceallowance ='$Performanceallowance',

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
   
   
    $GetState = "SELECT * FROM vwpayrollmasteremplist where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  And Employeeid ='$Employeeid' AND Clientid ='$Clientid' ";
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
?>