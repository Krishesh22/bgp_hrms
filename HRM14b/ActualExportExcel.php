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
$Category=$_SESSION['Category'];
$Payrollyear=$_SESSION['Payrollyear'];
$Payrollmonth=$_SESSION['Payrollmonth'];
$gettime = time();
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=".$gettime.".xls");  
header("Pragma: no-cache"); 
header("Expires: 0");


echo '<table border="1">';
echo '<tr><td colspan="32"  ><h2 style="text-align:center">SAINMARKS INDUSTRIES(INDIA) PVT LTD-Tirupur</h2></td>
<td colspan="3">RegNo: TPR-17460</td></tr>';

echo '<tr><td colspan="35"  ><h5 style="text-align:right">Wages For Monthly Paid ('.$Category.')  For the Month Of '.$Payrollmonth.'-'.$Payrollyear.'</h5></td></tr>';

//make the column headers what you want in whatever order you want
echo ' <tr >

<th style="width: 50px;">S.No</th>


<th>ID</th>
<th>Name</th>
<th>Dept</th>
<th>Designation</th>
<th>Status</th>

<th>Working</th>
<th>Worked</th>
<th>NH</th>
<th>Leavedays</th>
<th>EL</th>
<th>LOP</th>
<th >Total</th>
<th>Basic+DA</th>
<th>HRA</th>
<th>Other_Allowance</th>
<th class="tabletotalrow">Total</th>
<th>Earned Basic</th>
<th>Earned HRA</th>
<th>Earned OtherAllowance</th>
<th>Earned Dailyallowance</th>
<th>OT_HRS</th>
<th>OT_Wages</th>
<th >Earned Wages</th>
<th>PF</th>
<th>ESI</th>
<th>Lop Hrs</th>
<th>Lop Wages</th>
<th>Advance</th>
<th>Food</th>

<th>TDS</th>
<th >Total Deduction</th>
<th >Net</th>
<th  title="Performance Allowance">
    PA</th>
<th>Total</th>

</tr>';


$GetState = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid'  ORDER BY Employeeid";

  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $i++;
    $NetWages = $row["NetWages"];
    $PA = $row["Performanceallowance"];
    $NetPa=$NetWages+$PA;
    echo '<tr>  

    <td>'.$i.'</td>  
    <td>'.$row["Employeeid"].'</td>  
    <td>'.$row["Fullname"].'</td>  
    <td>'.$row["Department"].'</td>  
    <td>'.$row["Designation"].'</td>  
    <td>'.$row["PackageHoldstatus"].'</td>  
    <td>'.$row["Workingdays"].'</td>  
    <td>'.$row["Workeddays"].'</td>  
    <td>'.$row["Nationalholidays"].'</td>  
    <td>'.$row["Leavedays"].'</td>  
    <td>'.$row["TakenEL"].'</td>  
    <td>'.$row["LOP"].'</td>  
    <td>'.$row["Totaldays"].'</td>  
    <td>'.$row["BasicDA"].'</td>  
    <td>'.$row["HRA"].'</td>  
    <td>'.$row["Otherallowance_Con_SA"].'</td>  
    <td>'.$row["TotalSal"].'</td>  
    <td>'.$row["EarnedBasic"].'</td>  
    <td>'.$row["EarnedHRA"].'</td>  
    <td>'.$row["EarnedOtherallowance_Con_SA"].'</td>  
    <td>'.$row["DailyAllowanance"].'</td>  
    <td>'.$row["ActualOTHRS"].'</td>  
    <td>'.$row["OT_Wages"].'</td>  
    <td>'.$row["ActualOTWages"].'</td>  
    <td>'.$row["PF"].'</td>  
    <td>'.$row["ESI"].'</td>  
    <td>'.$row["Lophrs"].'</td>  
    <td>'.$row["Lopwages"].'</td>  
    <td>'.$row["Salary_Advance"].'</td>  
    <td>'.$row["FoodDeduction"].'</td>  
    <td>'.$row["TDS"].'</td>  
    <td>'.$row["TotalDeduction"].'</td> 
    <td>'.$row["Actualnet"].'</td>  
    <td>'.$row["Performanceallowance"].'</td>  
    <td>'.$NetPa.'</td>  
   
</tr>  
    ';  
}  
  }

  
$sql = "SELECT SUM(Actualnet)FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category='$Category' AND Clientid='$Clientid'  ORDER BY Employeeid";
$result = $conn->query($sql);

while($row = mysqli_fetch_array($result)){
  $NetWages= $row['SUM(Actualnet)'];
    
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
  echo '<tr> 
  <td colspan="34" style="text-align:right"> Total</td> 

  <td>'. $GrandTotal.'</td>

  </tr>  
    ';

//loop the query data to the table in same order as the headers





echo '</table>';

exit;
?>