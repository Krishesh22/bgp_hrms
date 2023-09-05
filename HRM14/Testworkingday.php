<?php
function getWorkingDaysInMonth($month, $year) {
    $workingDays = 0;
    $totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    for ($day = 1; $day <= $totalDays; $day++) {
        $date = date("Y-m-d", strtotime("$year-$month-$day"));
        $dayOfWeek = date("N", strtotime($date));
        
        if ($dayOfWeek != 7) { // Sunday has a value of 7
            $workingDays++;
        }
    }

    return $workingDays;
}


$Payrollmonth = "March";
$month_num =  getMonthNumber($Payrollmonth);

echo "$Payrollmonth-$month_num<br>";
// Example usage
$month = $month_num; // May
$year = 2024;
$workingDays = getWorkingDaysInMonth($month, $year);
echo "Number of working days in $month/$year: " . $workingDays;



function getMonthNumber($monthName) {
    $timestamp = strtotime("1 $monthName");
    $monthNumber = date('m', $timestamp);
    return $monthNumber;
}
?>