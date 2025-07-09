<?php
function get_attendance($conn,$emp_id,$periods,$date_of_joining,$Clientid){

	$data = $result = array();
	//$periods = "02/Feb/2019";
	$period = explode('/',$periods);
	$week_offcount =$extra_day_ot=  0;

	$last_month = $period[0];//Month Number
	$last_month_name = $period[1];//Month Name
	$last_month_year = $period[2];//Year

	$month_date = $last_month_year."-".$last_month."-01";
	$last_date = date('Y-m-t', strtotime($month_date));
	
	$logsql = "SELECT * FROM indsys1030empdailyattendancedetail WHERE Employeeid  = '".$emp_id."' AND DATE(Attendencedate) >= '".$month_date."' AND DATE(Attendencedate) <= '".$last_date."'  and Clientid ='$Clientid' ORDER BY Attendencedate ASC";
	//echo $logsql;
	$result_Region = $conn->query($logsql);
 
	if(mysqli_num_rows($result_Region) > 0) { 
	while($row = mysqli_fetch_array($result_Region)) {  
	  $result[] = $row;
	  } 
	} 

//$month_date = date('Y-m-d', strtotime($month_date. ' + 1 day'));
	//$LogDate[$loopdate]['Intime'] = $Intime;
	return $result;
	//echo "fgdfgf $month_date ";
}

function dateDiffInDays($date1, $date2) 
{
    // Calculating the difference in timestamps
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400));
}

function getHoursAndMins($time, $format = '%02d:%02d')
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
?>