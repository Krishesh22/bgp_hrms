<?php 
include '../config.php';


session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Fromdate= date('01-m-Y');
$Todate=  date('t-m-Y',strtotime($Fromdate));
$Todate =date('Y-m-d', strtotime($Todate. ' + 1 days'));
$period = new DatePeriod(
    new DateTime($Fromdate),
    new DateInterval('P1D'),
    new DateTime($Todate)
);

$month = intval(date('m'));
$year = date('Y');

 $table_name = "devicelogs_".$month."_".$year."";
foreach ($period as $key => $value) {
   $fromtestdate =  $value->format('Y-m-d') ;  

  
   $greatertestdate = $fromtestdate;
   $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active'  ORDER BY Employeeid ASC";
	
   
   $logempall = mysqli_query($conn, $logemp);
   while($Emprow = mysqli_fetch_array($logempall)) {
    $Employeeid = $Emprow['Employeeid'];

   $logsql = "SELECT * FROM ".$table_name." WHERE DATE(LogDate)>=CAST('$greatertestdate' AS DATE) AND DATE(LogDate) <=CAST('$fromtestdate' AS DATE) AND c1 ='in' and UserId='$Employeeid'  ORDER BY LogDate ASC";
	
   
   $logresp = mysqli_query($conn, $logsql);
   while($logrow = mysqli_fetch_array($logresp)) {
    echo 'in';
    echo '<br>';
    $c1 = $logrow['C1'];
    $intime = '00:00:00';
    $outtime ='00:00:00';
    $outdate ='';
    $indate ='';
    $Employeeid = $logrow['UserId'];
    if($c1 =='in' )
    {
$indate = $logrow['LogDate'];
$dt = new DateTime($indate);
$intime = $dt->format('H:i:s');
    }
    else
    {
        $outdate = $logrow['LogDate'];
        $dt = new DateTime($indate);
        $outtime = $dt->format('H:i:s');
    }

    $sst = strtotime($intime);
$eet=  strtotime($outtime);
$diff= $eet-$sst;
$hours= gmdate("h:i",$diff);


$resultExists = "SELECT * FROM indsys1026employeeromworkingdays WHERE Employeeid = '$Employeeid' AND DATE(EmpDate) >=CAST('$fromtestdate' AS DATE) AND DATE(EmpDate)<=CAST('$fromtestdate' AS DATE) LIMIT 1";
$resultExists01 = $conn->query($resultExists);

if (mysqli_fetch_row($resultExists01))
{

    $resultExistsss = "Update indsys1026employeeromworkingdays set 
    Empin ='$indate',
    Intime ='$intime',

    Addormodifydatetime ='$date',
    Userid ='$user_id'
   
    WHERE Employeeid = '$Employeeid' AND DATE(EmpDate) >=CAST('$fromtestdate' AS DATE) AND DATE(EmpDate)<=CAST('$fromtestdate' AS DATE)";
    $resultExists0New = $conn->query($resultExistsss);
    $Message = "Update";

}

else{
    $sqlsave = "INSERT IGNORE INTO indsys1026employeeromworkingdays (Clientid,Employeeid,
EmpDate,Empin,Empout,Userid,Addormodifydatetime,Workingdays,OT_HRS,Intime,Outtime,Workinghours)
 VALUES ('$Clientid','$Employeeid','$fromtestdate','$indate','$outdate','$user_id','$date',0,0,'$intime','$outtime',0)";
    $resultsave = mysqli_query($conn, $sqlsave);

    $Message = "Data Saved";

}
    
   


   }    

   $logsql = "SELECT * FROM ".$table_name." WHERE DATE(LogDate)>=CAST('$greatertestdate' AS DATE) AND DATE(LogDate) <=CAST('$fromtestdate' AS DATE) AND c1 ='out' and UserId='$Employeeid'  ORDER BY LogDate ASC";
	
 

   $logresp = mysqli_query($conn, $logsql);
   while($logrow = mysqli_fetch_array($logresp)) {

    $c1 = $logrow['C1'];
    $intime = '00:00:00';
    $outtime ='00:00:00';
    $outdate ='';
    $indate ='';
    $Employeeid = $logrow['UserId'];
    if($c1 =='in' )
    {
$indate = $logrow['LogDate'];
$dt = new DateTime($indate);
$intime = $dt->format('H:i:s');
    }
    else
    {
        $outdate = $logrow['LogDate'];
        $dt = new DateTime($indate);
        $outtime = $dt->format('H:i:s');
    }

    $sst = strtotime($intime);
$eet=  strtotime($outtime);
$diff= $eet-$sst;
$hours= gmdate("h:i",$diff);

$resultExists = "SELECT * FROM indsys1026employeeromworkingdays WHERE Employeeid = '$Employeeid' AND DATE(EmpDate) >=CAST('$fromtestdate' AS DATE) AND DATE(EmpDate)<=CAST('$fromtestdate' AS DATE) LIMIT 1";
$resultExists01 = $conn->query($resultExists);

if (mysqli_fetch_row($resultExists01))
{

    $resultExistsss = "Update indsys1026employeeromworkingdays set 
    Empout ='$outdate',
    Outtime ='$outtime',
  
    Addormodifydatetime ='$date',
    Userid ='$user_id'
   
    WHERE Employeeid = '$Employeeid' AND DATE(EmpDate) >=CAST('$fromtestdate' AS DATE) AND DATE(EmpDate)<=CAST('$fromtestdate' AS DATE)";
    $resultExists0New = $conn->query($resultExistsss);
    $Message = "Update";

}

else{
    $sqlsave = "INSERT IGNORE INTO indsys1026employeeromworkingdays (Clientid,Employeeid,
EmpDate,Empin,Empout,Userid,Addormodifydatetime,Workingdays,OT_HRS,Intime,Outtime,Workinghours)
 VALUES ('$Clientid','$Employeeid','$fromtestdate','$indate','$outdate','$user_id','$date',0,0,'$intime','$outtime',0)";
    $resultsave = mysqli_query($conn, $sqlsave);

    $Message = "Data Saved";

}
    
   


   }    
   $testsave = Calculateworkingdays($conn,$Employeeid,$fromtestdate);
}
}

function Calculateworkingdays($conn,$Employeeid,$fromtestdate)
{
   
        $Workingdays = "0";
        $OT_HRS = "0";
        $Workinghours ="0";
        $workingdays = 1;
        $GetChapter = "SELECT * FROM indsys1026employeeromworkingdays WHERE Employeeid = '$Employeeid' AND DATE(EmpDate) >=CAST('$fromtestdate' AS DATE) AND DATE(EmpDate)<=CAST('$fromtestdate' AS DATE) LIMIT 1";
        $result_Chapter = $conn->query($GetChapter );
        if(mysqli_num_rows($result_Chapter) > 0) { 
        while($row = mysqli_fetch_array($result_Chapter)) {  
         { 
$intime = $row['Intime'];
$Outtime = $row['Outtime'];
if($intime =='00:00:00')
{
$intime = '09:10:00';
}
if($Outtime =='00:00:00')
{
    $Outtime ='18:05:00';
}
$workingdays =1;
echo $workingdays;
$from_time = new DateTime($intime);
$to_time = new DateTime($Outtime);
$Workinghours = $from_time->diff($to_time);
$Workinghours =$Workinghours->h;

if($Workinghours >=10)
{
    $OT_HRS = $Workinghours-9;
   // $workingdays = 1;
}
if($Workinghours <=5)
{
    $OT_HRS = 0;
    $workingdays = 0.5;
}
          }
              }

        $resultExistsss = "Update indsys1026employeeromworkingdays set 
        Workinghours ='$Workinghours',
        OT_HRS ='$OT_HRS',
        Workingdays ='$workingdays'         
        WHERE Employeeid = '$Employeeid' AND DATE(EmpDate) >=CAST('$fromtestdate' AS DATE) AND DATE(EmpDate)<=CAST('$fromtestdate' AS DATE)";
        $resultExists0New = $conn->query($resultExistsss);
        $Message = "Update";
   
}
  
}
////////////////////////////////
?>