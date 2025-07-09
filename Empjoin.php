<?php
include 'config.php';
session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$Clientid = $_SESSION["Clientid"];
// Specify the joining date and the number of working days
$joiningDate = '2023-04-01';
$numWorkingDays = 40;
$Attendencedate='2023-07-01';
// Retrieve the list of holidays from the database
// Assuming you have established a database connection
$holidays = array();
$query = "SELECT Holidaydate FROM indsys1012holidaymaster where DATE(Holidaydate) >='$joiningDate' AND Clientid='$Clientid'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $holidays[] = $row['Holidaydate'];
}

// Calculate the target date
$currentDate = strtotime($joiningDate);
$workingDays = 0;

while ($workingDays < $numWorkingDays) {
    // Skip weekends (Saturday: 6, Sunday: 0)
    if (date('N', $currentDate) < 6) {
        $formattedDate = date('Y-m-d', $currentDate);

        // Check if the current date is a holiday
        if (!in_array($formattedDate, $holidays)) {
            $workingDays++;
        }
    }

    // Move to the next day
    $currentDate = strtotime('+1 day', $currentDate);
}

$targetDate = date('Y-m-d', $currentDate);

if($targetDate<=$Attendencedate)
        {
echo "$targetDate-Correct";
        }
        else{
            echo "$targetDate-Wrong";


        }

     
?>