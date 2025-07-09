<<<<<<< HEAD
<?php 
include '../config.php';
session_start();
 $user_id = $_SESSION["Userid"];

$Clientid =$_SESSION["Clientid"];
  
     $_SESSION["Tittle"] ="Daily Attendance Detail";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$FromDate ="";
$ToDate ="";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'save') {
                    $FromDate=$_POST['FromDate'];
                    $ToDate=$_POST['ToDate'];
                   
                    $startDate = new DateTime($FromDate);
                    $endDate = new DateTime($ToDate);
                    $startDate->modify('first day of this month');
                    $endDate->modify('first day of next month');
                    $monthsAndYears = [];
                
                    while ($startDate < $endDate) {
                        $month = $startDate->format('F');
                        $year = $startDate->format('Y');          
                        $monthsAndYears[] = ['month' => $month, 'year' => $year];           
                        $startDate->modify('+1 month');
                    }
                    $i=0;
                    foreach ($monthsAndYears as $entry) {
                        $SalMonth=$entry['month'];
                        $Salyear=$entry['year'];
                       
                        $GetPayroll = "SELECT * FROM indsys1026employeepayrollmastertemp where SalMonth='$SalMonth' AND Salyear='$Salyear' AND Clientid='$Clientid' LIMIT 1";
                        $result_payroll = $conn->query($GetPayroll);
                     
                        if(mysqli_num_rows($result_payroll) > 0) { 
                            $i++;
                            
                        }

                    }

                    
                    if($i==0)
                    {
                     
                    $GetATT = "SELECT * FROM indsys1029empdailyattendancemaster where Attendencedate>='$FromDate' AND Attendencedate<='$ToDate' AND Clientid='$Clientid'";
                    $result_ATT = $conn->query($GetATT);
                    if(mysqli_num_rows($result_ATT) > 0) { 

                    $resultOpenatt = "Update indsys1029empdailyattendancemaster set 
                    Empattendencestatus ='Open' WHERE Attendencedate>='$FromDate' AND Attendencedate<='$ToDate' AND Clientid='$Clientid'  ";
                    $resultOpenattsave = mysqli_query($conn, $resultOpenatt);
                    if($resultOpenattsave==TRUE)
                    {
                    echo json_encode(['status' => 'success']); 
                    return;
                    }
                    }  
                   
                  
                
                    }
                    
                    echo json_encode(['status' => 'payroll']); 
                    return;
}
}


} 
=======
<?php 
include '../config.php';
session_start();
 $user_id = $_SESSION["Userid"];

$Clientid =$_SESSION["Clientid"];
  
     $_SESSION["Tittle"] ="Daily Attendance Detail";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$FromDate ="";
$ToDate ="";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'save') {
                    $FromDate=$_POST['FromDate'];
                    $ToDate=$_POST['ToDate'];
                   
                    $startDate = new DateTime($FromDate);
                    $endDate = new DateTime($ToDate);
                    $startDate->modify('first day of this month');
                    $endDate->modify('first day of next month');
                    $monthsAndYears = [];
                
                    while ($startDate < $endDate) {
                        $month = $startDate->format('F');
                        $year = $startDate->format('Y');          
                        $monthsAndYears[] = ['month' => $month, 'year' => $year];           
                        $startDate->modify('+1 month');
                    }
                    $i=0;
                    foreach ($monthsAndYears as $entry) {
                        $SalMonth=$entry['month'];
                        $Salyear=$entry['year'];
                       
                        $GetPayroll = "SELECT * FROM indsys1026employeepayrollmastertemp where SalMonth='$SalMonth' AND Salyear='$Salyear' AND Clientid='$Clientid' LIMIT 1";
                        $result_payroll = $conn->query($GetPayroll);
                     
                        if(mysqli_num_rows($result_payroll) > 0) { 
                            $i++;
                            
                        }

                    }

                    
                    if($i==0)
                    {
                     
                    $GetATT = "SELECT * FROM indsys1029empdailyattendancemaster where Attendencedate>='$FromDate' AND Attendencedate<='$ToDate' AND Clientid='$Clientid'";
                    $result_ATT = $conn->query($GetATT);
                    if(mysqli_num_rows($result_ATT) > 0) { 

                    $resultOpenatt = "Update indsys1029empdailyattendancemaster set 
                    Empattendencestatus ='Open' WHERE Attendencedate>='$FromDate' AND Attendencedate<='$ToDate' AND Clientid='$Clientid'  ";
                    $resultOpenattsave = mysqli_query($conn, $resultOpenatt);
                    if($resultOpenattsave==TRUE)
                    {
                    echo json_encode(['status' => 'success']); 
                    return;
                    }
                    }  
                   
                  
                
                    }
                    
                    echo json_encode(['status' => 'payroll']); 
                    return;
}
}


} 
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
?>