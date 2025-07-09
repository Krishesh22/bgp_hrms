<<<<<<< HEAD
<?php 
error_reporting(0);
include '../config.php';
session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$Clientid = $_SESSION["Clientid"];
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
$currentyear = date('Y');
$previousyear = $currentyear - 1;
$i = 0;

// Get Employee data
$logempnew = "SELECT * FROM indsys1017employeemaster WHERE Empactive='Active' AND Clientid='$Clientid' ORDER BY Employeeid ASC ";
$logempallnew = mysqli_query($conn, $logempnew);

// Fetch Payroll months data
$Currentmonth = '09'; // Example for current month being September
$GetChapter = "SELECT * FROM indsys1034payrollsettlemonth WHERE Givenmonthno = '$Currentmonth' ";
$result_Chapter = $conn->query($GetChapter);

$financialMonthsArray = '';
$Currentyearmonths = '';
$Previousyearsmonths = '';

if (mysqli_num_rows($result_Chapter) > 0) {
    while ($row = mysqli_fetch_array($result_Chapter)) {
        $financialMonthsArray = $row['MonthsAddedList'];
        $Currentyearmonths = $row['Currentyearmonths'];
        $Previousyearsmonths = $row['Previousyearsmonths'];
    }
}

// Prepare the months with year for table headers
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
    // Convert full month to abbreviated month format
    $dateObj = DateTime::createFromFormat('F', $month); // 'F' is for full month name
    $abbreviatedMonth = $dateObj->format('M'); // 'M' gives the abbreviated month
    $previousMonthsHeaders[] = $abbreviatedMonth . '-' . substr($previousyear, 2); // Abbreviate year to last 2 digits
}

$currentMonthsHeaders = [];
foreach ($currentMonthsArray as $month) {
    // Convert full month to abbreviated month format
    $dateObj = DateTime::createFromFormat('F', $month); // 'F' is for full month name
    $abbreviatedMonth = $dateObj->format('M'); // 'M' gives the abbreviated month
    $currentMonthsHeaders[] = $abbreviatedMonth . '-' . substr($currentyear, 2); // Abbreviate year to last 2 digits
}
?>
<!doctype html moznomarginboxes mozdisallowselectionprint>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Bonus</title>
    <style type="text/css">  
    .holiday-table {
      font-size: 0.7rem;
    }
    .leaveatt {
      background-color: #edebeb;
      text-align: center;
    } 
    </style>
  </head>
  <body>
    <div class="row">
      <div class="col-md-12">
        <table border="2" width="100%" height="90%" cellpadding="2" cellspacing="2" style="font-size:12px">
          <tbody>
            <tr class="text-center">
              <td colspan="50">
                <h6>BRITANNIA LABELS INDIA PVT LTD</h6>
                <p style="font-size:0.7rem;margin-bottom:1px;">4LABEL ARCADE' 476/1B1A, Jothi Nagar</p>
                <p style="font-size:0.7rem;margin-bottom:1px;"><b><?php echo "$currentyear"; ?></b></p>
              </td>
            </tr>
            <tr>
              <th class="leaveatt">S.No</th>
              <th class="leaveatt">Emp ID</th>
              <th class="leaveatt">EmpName</th>
              <th class="leaveatt">DOJ</th> 
              <th class="leaveatt">Department</th> 
              <th class="leaveatt">Designation</th>
              <th class="leaveatt">Category</th>
              <th class="leaveatt">Service</th>
              <?php foreach ($previousMonthsHeaders as $prevMonthHeader): ?>
                <th class="leaveatt"><?php echo $prevMonthHeader; ?></th>
              <?php endforeach; ?>
              <?php foreach ($currentMonthsHeaders as $currMonthHeader): ?>
                <th class="leaveatt"><?php echo $currMonthHeader; ?></th>
              <?php endforeach; ?>
              <th class="leaveatt">Total Worked Days</th>
              <th class="leaveatt">Total EL Days</th>
              <th class="leaveatt">Basic+DA</th>
              <th class="leaveatt">Basic+DA(Per Day)</th>
              <th class="leaveatt">Gross Salary</th>
              <th class="leaveatt">Gross Salary(Per Day)</th>
              <th class="leaveatt">BASIC + DA (  8.33% BONUS) </th>
              <th class="leaveatt">Total EL Wages</th>
              <th class="leaveatt">PA</th>
              <th class="leaveatt">Credit Amount</th>

            </tr>
            <?php 
            // Populate employee data rows
            while ($row = mysqli_fetch_array($logempallnew)) {
                $i++;  
                $Employeeid = $row['Employeeid'];
                $Empname = $row['Title'] . ' ' . $row['Fullname'];
                $Date_Of_Joining = $row['Date_Of_Joing'];
                $Department = $row['Department'];
                $Designation = $row['Designation'];
                $Type_Of_Posistion=$row['Type_Of_Posistion'];
                $dojDate = new DateTime($Date_Of_Joining);
                $nowDate = new DateTime($date);
                $interval = $dojDate->diff($nowDate);
                $yearsOfService = $interval->y;
                $monthsOfService = $interval->m;
                $service=$yearsOfService . " years, " . $monthsOfService . " months";
                $Basic = $row['Basic'];
                $Basic_per_day=round($Basic/26);
                $Gross_Salary=$row['Gross_Salary'];
                $Gross_Salary_per_day=round($Gross_Salary/26);


            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $Employeeid; ?></td>
              <td><?php echo $Empname; ?></td>
              <td><?php echo date('d-M-Y', strtotime($Date_Of_Joining)) ; ?></td>
              <td><?php echo $Department; ?></td>
              <td><?php echo $Designation; ?></td>
              <td><?php echo $Type_Of_Posistion; ?></td>
              <td><?php echo $service; ?></td>
              <?php foreach ($previousMonthsArray as $previousmonths): 
                $Workeddays =0;                 
                $sql_perform_leave = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid  = '$Employeeid' AND Clientid ='$Clientid' AND SalMonth='$previousmonths' AND Salyear='$previousyear' ";
                $sqlQueryLeave = mysqli_query($conn, $sql_perform_leave);
                while ($rowpay = mysqli_fetch_array($sqlQueryLeave)) {
                $Workeddays = $rowpay['Workeddays'];
                }
                ?>
              <td><?php echo $Workeddays; ?></td>
              <?php endforeach; ?>
              <?php foreach ($currentMonthsArray as $currentmonths): 
                $Workeddays =0;                 
                $sql_perform_leave = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid  = '$Employeeid' AND Clientid ='$Clientid' AND SalMonth='$currentmonths' AND Salyear='$currentyear' ";
                $sqlQueryLeave = mysqli_query($conn, $sql_perform_leave);
                while ($rowpay = mysqli_fetch_array($sqlQueryLeave)) {
                $Workeddays = $rowpay['Workeddays'];
                }
                ?>
              <td><?php echo $Workeddays; ?></td>
              <?php endforeach; ?>         
            
            <?php $total_worked_days=0;$BalanceCL=0;
            $sqlpayroll = "SELECT  SUM(Workeddays) AS TotalWorkingdays, SUM(BalanceEL) AS TotalBalanceEL, SUM(Nationalholidays) AS TotalNationalholidays,   SUM(TakenEL) AS TotalTakenEL
            FROM indsys1026employeepayrolltempmasterdetail  WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' AND Salyear BETWEEN '$previousyear' AND '$currentyear' 
            AND ((Salyear = '$previousyear' AND SalMonth IN ($PreviousyearsmonthsArray_f)) OR (Salyear = '$currentyear' AND SalMonth IN ($CurrentyearmonthsArray_f)))
            ORDER BY FIELD(SalMonth, $financialMonthsArray_f)"; 
            $resultpayroll = $conn->query($sqlpayroll);  
            if ($resultpayroll->num_rows > 0) {        
            while($rownew = $resultpayroll->fetch_assoc()) {   
                $total_worked_days = $rownew['TotalWorkingdays'];
                $BalanceCL =$rownew['TotalBalanceEL'];
                $Workingdays =$rownew['Workingdays'];
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
            } 
            ?>
           <td><?php echo $total_worked_days; ?></td>
           <td><?php echo $BalanceCL;?></td>
           <td><?php echo $Basic;?></td>
           <td><?php echo $Basic_per_day;?></td>
           <td><?php echo $Gross_Salary;?></td>
           <td><?php echo $Gross_Salary_per_day;?></td>
           <td><?php $Bonus=round(($total_worked_days*$Basic_per_day)*(8.33/100)); echo $Bonus;?>
           <td><?php $ELWages=round($BalanceCL* $Gross_Salary_per_day); echo $ELWages;?>
           <td>0</td>
           <td><?php $creditamount=$Bonus+$ELWages; echo $creditamount?></td>
           <?php } ?>
           </tr>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
=======
<?php 
error_reporting(0);
include '../config.php';
session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$Clientid = $_SESSION["Clientid"];
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
$currentyear = date('Y');
$previousyear = $currentyear - 1;
$i = 0;

// Get Employee data
$logempnew = "SELECT * FROM indsys1017employeemaster WHERE Empactive='Active' AND Clientid='$Clientid' ORDER BY Employeeid ASC ";
$logempallnew = mysqli_query($conn, $logempnew);

// Fetch Payroll months data
$Currentmonth = '09'; // Example for current month being September
$GetChapter = "SELECT * FROM indsys1034payrollsettlemonth WHERE Givenmonthno = '$Currentmonth' ";
$result_Chapter = $conn->query($GetChapter);

$financialMonthsArray = '';
$Currentyearmonths = '';
$Previousyearsmonths = '';

if (mysqli_num_rows($result_Chapter) > 0) {
    while ($row = mysqli_fetch_array($result_Chapter)) {
        $financialMonthsArray = $row['MonthsAddedList'];
        $Currentyearmonths = $row['Currentyearmonths'];
        $Previousyearsmonths = $row['Previousyearsmonths'];
    }
}

// Prepare the months with year for table headers
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
    // Convert full month to abbreviated month format
    $dateObj = DateTime::createFromFormat('F', $month); // 'F' is for full month name
    $abbreviatedMonth = $dateObj->format('M'); // 'M' gives the abbreviated month
    $previousMonthsHeaders[] = $abbreviatedMonth . '-' . substr($previousyear, 2); // Abbreviate year to last 2 digits
}

$currentMonthsHeaders = [];
foreach ($currentMonthsArray as $month) {
    // Convert full month to abbreviated month format
    $dateObj = DateTime::createFromFormat('F', $month); // 'F' is for full month name
    $abbreviatedMonth = $dateObj->format('M'); // 'M' gives the abbreviated month
    $currentMonthsHeaders[] = $abbreviatedMonth . '-' . substr($currentyear, 2); // Abbreviate year to last 2 digits
}
?>
<!doctype html moznomarginboxes mozdisallowselectionprint>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Bonus</title>
    <style type="text/css">  
    .holiday-table {
      font-size: 0.7rem;
    }
    .leaveatt {
      background-color: #edebeb;
      text-align: center;
    } 
    </style>
  </head>
  <body>
    <div class="row">
      <div class="col-md-12">
        <table border="2" width="100%" height="90%" cellpadding="2" cellspacing="2" style="font-size:12px">
          <tbody>
            <tr class="text-center">
              <td colspan="50">
                <h6>BRITANNIA LABELS INDIA PVT LTD</h6>
                <p style="font-size:0.7rem;margin-bottom:1px;">4LABEL ARCADE' 476/1B1A, Jothi Nagar</p>
                <p style="font-size:0.7rem;margin-bottom:1px;"><b><?php echo "$currentyear"; ?></b></p>
              </td>
            </tr>
            <tr>
              <th class="leaveatt">S.No</th>
              <th class="leaveatt">Emp ID</th>
              <th class="leaveatt">EmpName</th>
              <th class="leaveatt">DOJ</th> 
              <th class="leaveatt">Department</th> 
              <th class="leaveatt">Designation</th>
              <th class="leaveatt">Category</th>
              <th class="leaveatt">Service</th>
              <?php foreach ($previousMonthsHeaders as $prevMonthHeader): ?>
                <th class="leaveatt"><?php echo $prevMonthHeader; ?></th>
              <?php endforeach; ?>
              <?php foreach ($currentMonthsHeaders as $currMonthHeader): ?>
                <th class="leaveatt"><?php echo $currMonthHeader; ?></th>
              <?php endforeach; ?>
              <th class="leaveatt">Total Worked Days</th>
              <th class="leaveatt">Total EL Days</th>
              <th class="leaveatt">Basic+DA</th>
              <th class="leaveatt">Basic+DA(Per Day)</th>
              <th class="leaveatt">Gross Salary</th>
              <th class="leaveatt">Gross Salary(Per Day)</th>
              <th class="leaveatt">BASIC + DA (  8.33% BONUS) </th>
              <th class="leaveatt">Total EL Wages</th>
              <th class="leaveatt">PA</th>
              <th class="leaveatt">Credit Amount</th>

            </tr>
            <?php 
            // Populate employee data rows
            while ($row = mysqli_fetch_array($logempallnew)) {
                $i++;  
                $Employeeid = $row['Employeeid'];
                $Empname = $row['Title'] . ' ' . $row['Fullname'];
                $Date_Of_Joining = $row['Date_Of_Joing'];
                $Department = $row['Department'];
                $Designation = $row['Designation'];
                $Type_Of_Posistion=$row['Type_Of_Posistion'];
                $dojDate = new DateTime($Date_Of_Joining);
                $nowDate = new DateTime($date);
                $interval = $dojDate->diff($nowDate);
                $yearsOfService = $interval->y;
                $monthsOfService = $interval->m;
                $service=$yearsOfService . " years, " . $monthsOfService . " months";
                $Basic = $row['Basic'];
                $Basic_per_day=round($Basic/26);
                $Gross_Salary=$row['Gross_Salary'];
                $Gross_Salary_per_day=round($Gross_Salary/26);


            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $Employeeid; ?></td>
              <td><?php echo $Empname; ?></td>
              <td><?php echo date('d-M-Y', strtotime($Date_Of_Joining)) ; ?></td>
              <td><?php echo $Department; ?></td>
              <td><?php echo $Designation; ?></td>
              <td><?php echo $Type_Of_Posistion; ?></td>
              <td><?php echo $service; ?></td>
              <?php foreach ($previousMonthsArray as $previousmonths): 
                $Workeddays =0;                 
                $sql_perform_leave = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid  = '$Employeeid' AND Clientid ='$Clientid' AND SalMonth='$previousmonths' AND Salyear='$previousyear' ";
                $sqlQueryLeave = mysqli_query($conn, $sql_perform_leave);
                while ($rowpay = mysqli_fetch_array($sqlQueryLeave)) {
                $Workeddays = $rowpay['Workeddays'];
                }
                ?>
              <td><?php echo $Workeddays; ?></td>
              <?php endforeach; ?>
              <?php foreach ($currentMonthsArray as $currentmonths): 
                $Workeddays =0;                 
                $sql_perform_leave = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid  = '$Employeeid' AND Clientid ='$Clientid' AND SalMonth='$currentmonths' AND Salyear='$currentyear' ";
                $sqlQueryLeave = mysqli_query($conn, $sql_perform_leave);
                while ($rowpay = mysqli_fetch_array($sqlQueryLeave)) {
                $Workeddays = $rowpay['Workeddays'];
                }
                ?>
              <td><?php echo $Workeddays; ?></td>
              <?php endforeach; ?>         
            
            <?php $total_worked_days=0;$BalanceCL=0;
            $sqlpayroll = "SELECT  SUM(Workeddays) AS TotalWorkingdays, SUM(BalanceEL) AS TotalBalanceEL, SUM(Nationalholidays) AS TotalNationalholidays,   SUM(TakenEL) AS TotalTakenEL
            FROM indsys1026employeepayrolltempmasterdetail  WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' AND Salyear BETWEEN '$previousyear' AND '$currentyear' 
            AND ((Salyear = '$previousyear' AND SalMonth IN ($PreviousyearsmonthsArray_f)) OR (Salyear = '$currentyear' AND SalMonth IN ($CurrentyearmonthsArray_f)))
            ORDER BY FIELD(SalMonth, $financialMonthsArray_f)"; 
            $resultpayroll = $conn->query($sqlpayroll);  
            if ($resultpayroll->num_rows > 0) {        
            while($rownew = $resultpayroll->fetch_assoc()) {   
                $total_worked_days = $rownew['TotalWorkingdays'];
                $BalanceCL =$rownew['TotalBalanceEL'];
                $Workingdays =$rownew['Workingdays'];
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
            } 
            ?>
           <td><?php echo $total_worked_days; ?></td>
           <td><?php echo $BalanceCL;?></td>
           <td><?php echo $Basic;?></td>
           <td><?php echo $Basic_per_day;?></td>
           <td><?php echo $Gross_Salary;?></td>
           <td><?php echo $Gross_Salary_per_day;?></td>
           <td><?php $Bonus=round(($total_worked_days*$Basic_per_day)*(8.33/100)); echo $Bonus;?>
           <td><?php $ELWages=round($BalanceCL* $Gross_Salary_per_day); echo $ELWages;?>
           <td>0</td>
           <td><?php $creditamount=$Bonus+$ELWages; echo $creditamount?></td>
           <?php } ?>
           </tr>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
