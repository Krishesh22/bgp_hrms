<?php 
include '../config.php';
include '../session.php';
session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail=$_SESSION["Mailid"];
$Clientid =$_SESSION["Clientid"];
$Sessionid = $_SESSION["SESSIONID"];
$_SESSION["Tittle"] ="Bonus";
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$form_data = json_decode(file_get_contents("php://input"));
$form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];

if($MethodGet =='Save')
{
$Category=$form_data['Category'];
$Bonusyear=$form_data['Bonusyear'];
$Bonuspercentage=$form_data['Bonuspercentage'];
$currentyear = $Bonusyear;
$previousyear = $currentyear - 1;
$i = 0;
$Currentmonth = '09';
$Getsettlemonth = "SELECT * FROM indsys1034payrollsettlemonth WHERE Givenmonthno = '$Currentmonth' ";
$result_settlemonth = $conn->query($Getsettlemonth);
$financialMonthsArray = '';
$Currentyearmonths = '';
$Previousyearsmonths = '';
if (mysqli_num_rows($result_settlemonth) > 0) {
while ($row = mysqli_fetch_array($result_settlemonth)) {
$financialMonthsArray = $row['MonthsAddedList'];
$Currentyearmonths = $row['Currentyearmonths'];
$Previousyearsmonths = $row['Previousyearsmonths'];
}
}
$previousMonthsArray = explode(",", $Previousyearsmonths);
$currentMonthsArray = explode(",", $Currentyearmonths);
$financialMonthsArray_t = str_replace(",","','","$financialMonthsArray");
$financialMonthsArray_f = "'".$financialMonthsArray_t."'";
$CurrentyearmonthsArray_t = str_replace(",","','","$Currentyearmonths");
$CurrentyearmonthsArray_f = "'".$CurrentyearmonthsArray_t."'";
$PreviousyearsmonthsArray_t = str_replace(",","','","$Previousyearsmonths");
$PreviousyearsmonthsArray_f = "'".$PreviousyearsmonthsArray_t."'";
$previousMonthsHeaders = [];
foreach ($previousMonthsArray as $month) {
$dateObj = DateTime::createFromFormat('F', $month); 
$abbreviatedMonth = $dateObj->format('M'); 
$previousMonthsHeaders[] = $abbreviatedMonth . '-' . substr($previousyear, 2); 
}
$currentMonthsHeaders = [];
foreach ($currentMonthsArray as $month)
{
$dateObj = DateTime::createFromFormat('F', $month); // 'F' is for full month name
$abbreviatedMonth = $dateObj->format('M'); // 'M' gives the abbreviated month
$currentMonthsHeaders[] = $abbreviatedMonth . '-' . substr($currentyear, 2); // Abbreviate year to last 2 digits
}
$sql_bonus="INSERT INTO indsys1063bonus(Clientid,Processedyear,Category,Status,Bonus_percentage,Userid,Addormodifydatetime)
VALUES('$Clientid','$Bonusyear','$Category','Open','$Bonuspercentage','$user_id','$date')";
$result_bonus=mysqli_query($conn,$sql_bonus);
if($result_bonus==true)
{
    
}
else
{
$Message="Exists";
}
$Delete_bonus_details="DELETE FROM indsys1063bonusdetails WHERE Clientid='$Clientid' AND Processedyear='$Bonusyear' AND Category='$Category'";
$result_delete=mysqli_query($conn,$Delete_bonus_details);
$logempnew = "SELECT * FROM indsys1017employeemaster WHERE Empactive='Active' AND Clientid='$Clientid' AND Type_Of_Posistion='$Category' ORDER BY Employeeid ASC ";
$logempallnew = mysqli_query($conn, $logempnew);
while ($rowemp = mysqli_fetch_array($logempallnew)) 
{
$Employeeid = $rowemp['Employeeid'];
$Empname = $rowemp['Title'] . ' ' . $rowemp['Fullname'];
$Date_Of_Joining = $rowemp['Date_Of_Joing'];
$Department = $rowemp['Department'];
$Designation = $rowemp['Designation'];
$Type_Of_Posistion=$rowemp['Type_Of_Posistion'];
$dojDate = new DateTime($Date_Of_Joining);
$nowDate = new DateTime($date);
$interval = $dojDate->diff($nowDate);
$yearsOfService = $interval->y;
$monthsOfService = $interval->m;
$service=$yearsOfService . " years, " . $monthsOfService . " months";
$Basic = $rowemp['Basic'];
$Basic_per_day=round($Basic/26);
$Gross_Salary=$rowemp['Gross_Salary'];
$Gross_Salary_per_day=round($Gross_Salary/26);
$Performance_allowance =0;
$Credit_amount =0;
$previousMonthMapping = [
'October' => ['workingdays' => 'Oct_workingdays', 'balanceEL' => 'Oct_balanceEL'],
'November' => ['workingdays' => 'Nov_workingdays', 'balanceEL' => 'Nov_balanceEL'],
'December' => ['workingdays' => 'Dec_workingdays', 'balanceEL' => 'Dec_balanceEL']
];

$currentMonthMapping = [
'January' => ['workingdays' => 'Jan_workingdays', 'balanceEL' => 'Jan_balanceEL'],
'February' => ['workingdays' => 'Feb_workingdays', 'balanceEL' => 'Feb_balanceEL'],
'March' => ['workingdays' => 'Mar_workingdays', 'balanceEL' => 'Mar_balanceEL'],
'April' => ['workingdays' => 'Apr_workingdays', 'balanceEL' => 'Apr_balanceEL'],
'May' => ['workingdays' => 'May_workingdays', 'balanceEL' => 'May_balanceEL'],
'June' => ['workingdays' => 'Jun_workingdays', 'balanceEL' => 'Jun_balanceEL'],
'July' => ['workingdays' => 'Jul_workingdays', 'balanceEL' => 'Jul_balanceEL'],
'August' => ['workingdays' => 'Aug_workingdays', 'balanceEL' => 'Aug_balanceEL'],
'September' => ['workingdays' => 'Sep_workingdays', 'balanceEL' => 'Sep_balanceEL']
];
$Oct_workingdays = $Nov_workingdays = $Dec_workingdays = $Jan_workingdays = 0;
$Feb_workingdays = $Mar_workingdays = $Apr_workingdays = $May_workingdays = $Jun_workingdays = $Jul_workingdays = $Aug_workingdays = $Sep_workingdays = 0;        
$Oct_balanceEL = $Nov_balanceEL = $Dec_balanceEL = $Jan_balanceEL = 0;
$Feb_balanceEL = $Mar_balanceEL = $Apr_balanceEL = $May_balanceEL = $Jun_balanceEL = $Jul_balanceEL = $Aug_balanceEL = $Sep_balanceEL = 0;
foreach ($previousMonthsArray as $previousmonths): 
$Workeddays =0;                 
$sql_perform_leave = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid  = '$Employeeid' AND Clientid ='$Clientid' AND SalMonth='$previousmonths' AND Salyear='$previousyear' ";
$sqlQueryLeave = mysqli_query($conn, $sql_perform_leave);
while ($rowpay = mysqli_fetch_array($sqlQueryLeave)) {
$Workeddays = $rowpay['Workeddays'];
$BalanceEL=$rowpay['BalanceEL'];
}
if (array_key_exists($previousmonths, $previousMonthMapping))
{
${$previousMonthMapping[$previousmonths]['workingdays']} = $Workeddays; 
${$previousMonthMapping[$previousmonths]['balanceEL']} = $BalanceEL;   
}
endforeach;
foreach ($currentMonthsArray as $currentmonths): 
$Workeddays =0;                 
$sql_perform_leave = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid  = '$Employeeid' AND Clientid ='$Clientid' AND SalMonth='$currentmonths' AND Salyear='$currentyear' ";
$sqlQueryLeave = mysqli_query($conn, $sql_perform_leave);
while ($rowpay = mysqli_fetch_array($sqlQueryLeave)) {
$Workeddays = $rowpay['Workeddays'];
$BalanceEL=$rowpay['BalanceEL'];
}
if (array_key_exists($currentmonths, $currentMonthMapping)) {
${$currentMonthMapping[$currentmonths]['workingdays']} = $Workeddays; 
${$currentMonthMapping[$currentmonths]['balanceEL']} = $BalanceEL;  
}
endforeach;
$total_worked_days=0;
$BalanceCL=0;
$sqlpayroll = "SELECT  SUM(Workeddays) AS TotalWorkingdays, SUM(BalanceEL) AS TotalBalanceEL, SUM(Nationalholidays) AS TotalNationalholidays,   SUM(TakenEL) AS TotalTakenEL
FROM indsys1026employeepayrolltempmasterdetail  WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' AND Salyear BETWEEN '$previousyear' AND '$currentyear' 
AND ((Salyear = '$previousyear' AND SalMonth IN ($PreviousyearsmonthsArray_f)) OR (Salyear = '$currentyear' AND SalMonth IN ($CurrentyearmonthsArray_f)))
ORDER BY FIELD(SalMonth, $financialMonthsArray_f)"; 
$resultpayroll = $conn->query($sqlpayroll);  
if ($resultpayroll->num_rows > 0) {        
while($rownew = $resultpayroll->fetch_assoc()) {   
$total_worked_days = $rownew['TotalWorkingdays'];
$BalanceCL =$rownew['TotalBalanceEL'];
$Nationholidays =$rownew['TotalNationalholidays'];
$TakenEL =$rownew['TotalTakenEL'];              
}
if($total_worked_days=='' || $total_worked_days==null)
{
$total_worked_days=0;
}
if($BalanceCL=='' || $BalanceCL==null)
{
$BalanceCL=0;
}
$Bonus=round(($total_worked_days*$Basic_per_day)*($Bonuspercentage/100));
$ELWages=round($BalanceCL* $Gross_Salary_per_day);
} 
$Total_worked_wages=0;
$Credit_amount=0;
$Total_worked_wages=round(($total_worked_days*$Basic_per_day));
$Credit_amount = $Performance_allowance+$ELWages+$Bonus;
$sql_bonus_save_query = "INSERT INTO indsys1063bonusdetails(Clientid, Processedyear, Category, Employeeid, Userid, Addormodifydatetime, Bonus_percentage, 
Current_year, Previous_year, Oct_workingdays, Nov_workingdays, Dec_workingdays, Jan_workingdays, 
Feb_workingdays, Mar_workingdays, Apr_workingdays, May_workingdays, Jun_workingdays, Jul_workingdays, 
Aug_workingdays, Sep_workingdays, Service_period, Oct_balanceEL, Nov_balanceEL, Dec_balanceEL, 
Jan_balanceEL, Feb_balanceEL, Mar_balanceEL, Apr_balanceEL, May_balanceEL, Jun_balanceEL, Jul_balanceEL, 
Aug_balanceEL, Sep_balanceEL, Total_workeddays, Total_EL_days, Total_worked_wages, Total_EL_wages, 
BasicDA, BasicDA_perdays, Gross_salary, Gross_salar_perday, Bonus_BasicDA, Performance_allowance, 
Credit_amount) VALUES ('$Clientid', '$Bonusyear', '$Category', '$Employeeid', '$user_id', '$date', '$Bonuspercentage', 
'$currentyear', '$previousyear', '$Oct_workingdays', '$Nov_workingdays', '$Dec_workingdays', 
'$Jan_workingdays', '$Feb_workingdays', '$Mar_workingdays', '$Apr_workingdays', '$May_workingdays', 
'$Jun_workingdays', '$Jul_workingdays', '$Aug_workingdays', '$Sep_workingdays', '$service', 
'$Oct_balanceEL', '$Nov_balanceEL', '$Dec_balanceEL', '$Jan_balanceEL', '$Feb_balanceEL', 
'$Mar_balanceEL', '$Apr_balanceEL', '$May_balanceEL', '$Jun_balanceEL', '$Jul_balanceEL', 
'$Aug_balanceEL', '$Sep_balanceEL', '$total_worked_days', '$BalanceCL', '$Total_worked_wages', 
'$ELWages', '$Basic', '$Basic_per_day', '$Gross_Salary', '$Gross_Salary_per_day', '$Bonus', 
'$Performance_allowance', '$Credit_amount');";
 $resultsave = mysqli_query($conn, $sql_bonus_save_query);
 if($resultsave===TRUE)
 {

 }
 $i++;  

 $Message="Processed";
}
$Display = array(

    'Message' => $Message
  );

  $str = json_encode($Display);
  echo trim($str, '"');
}


if($MethodGet == 'ALL')
{
    $Category=$form_data['Category'];
    $Bonusyear=$form_data['Bonusyear'];
    $GetAlldetails = "
    SELECT 
        b.*, 
        e.Fullname, 
        e.Firstname,
        e.Lastname,
        e.Title,
        e.Department, 
        e.Designation, 
        e.Gender, 
        e.Date_Of_Joing,
        e.Marital_status 
    FROM 
        indsys1063bonusdetails AS b
    JOIN 
        indsys1017employeemaster AS e ON b.Employeeid = e.Employeeid
    WHERE 
        b.Clientid = '$Clientid' 
        AND b.Processedyear = '$Bonusyear' 
        AND b.Category = '$Category'   
    ORDER BY 
        e.Firstname
";
    

$result_details = $conn->query($GetAlldetails);
if(mysqli_num_rows($result_details) > 0) { 
while($row = mysqli_fetch_array($result_details)) {  
  $data01[] = $row;
  } 
}
    header('Content-Type: application/json');
    echo json_encode($data01);
 
 
 
}

?>