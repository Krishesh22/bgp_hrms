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

 $Employeeid ='CAT03ADM000010';
 $SalMonth = 'December';
  $Salyear='2022';
  $Workeddays='25.00';
   $Leavedays="2.00";
   $Salary_Advance=0;
   $FoodDeduction=0;
   $TDS=0;
   $Category='Category 3';
   $Workingdays="27.00";
   $Nationalholidays =0;
    $CL="1.5";
    $BasicDA='10002.00';
    $HRA =0;
    $Otherallowance_Con_SA =0;
     $OT_HRS=0;
      $DailyAllowanance =0;
      $Performanceallowance =170;

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
      
     
     
      } 
    }

    $Leavedays = ($Workingdays - $Workeddays);
    if($Workeddays == 0)
    {
      $Lop = $Leavedays;
    }
else
{
    $Lop=Max(($Leavedays-$CL),0);
 }
//$Lop=Max(($Leavedays-$CL),0);
    $Totaldays = $Workeddays+$Nationalholidays;

    //Totalsalary=Basics+HRA+DA
    $Total_Salary = $BasicDA+$HRA+$Otherallowance_Con_SA+$Performanceallowance;

    //Earnedbasics=Basicda-(Basicda/workingdays)*Lossofpay
    $EarnedBasics =$BasicDA-(($BasicDA/26)*$Lop);

    
    //EarnedHRA = HRA-(HRA/Workingdays)*Lossofpay
    $EarnedHRA =$HRA-($HRA/26)*$Lop;
//EarnedOA = OA-(OA/Workingdays)*Lossofpay
$EarnedOtherallowance = $Otherallowance_Con_SA-($Otherallowance_Con_SA/26)*$Lop;
if($Category =="Category 2")
{
  $DailyAllowanance =    $Dailyallowancelimit*$Workeddays;

}



////////////////OT_wages = (Totalsalary/Workingdays/8*2*OThours)

$OT_Wages=($Total_Salary/26/8*2*$OT_HRS);
//Earnedwaged = roundup(Earnedbasics+Earnedhra+EarnedOA+EarnedOTwages,0)

$Earned_Wages =($EarnedBasics+$EarnedHRA+$EarnedOtherallowance+$OT_Wages+$DailyAllowanance);
$Earned_Wages=roundup($Earned_Wages);
$Earned_Wages=round($Earned_Wages,0);


   $pfpercentage=($PFemployeepercentage/100);
   $esipercentage = ($ESIemployeepercentage/100);

   if($BasicDA<15000)
   {
   if($PF_Yesandno =='Yes')
   {
     
    $PF =($EarnedBasics+$EarnedOtherallowance)*$pfpercentage;
    $PF=round($PF,0);
   }
  }
  else
  {
    $PF_Yesandno ="No";
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
$Totaldeduction = $Salary_Advance+$FoodDeduction+$PF+$ESI+$TDS;
////NetWages= Earnedwages-Totaldeduction
$Net_Salary=$Earned_Wages-$Totaldeduction;
echo  "2 $EarnedBasics <br/>";
$resultExists = "Update indsys1026employeepayrolltempmasterdetail set 
Leavedays ='$Leavedays',
LOP ='$Lop',
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
Workingdays='$Workingdays',
Addormodifydatetime ='$date',
Userid ='$user_id'
   WHERE Employeeid = '$Employeeid' and SalMonth = '$SalMonth' and  Salyear = '$Salyear' AND Clientid ='$Clientid' ";
echo $resultExists ;

$resultExists01 = $conn->query($resultExists);
$Message ="Exists";


 
}
catch(Exception $e)
{

}
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
?>