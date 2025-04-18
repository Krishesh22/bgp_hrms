<?php





function get_attendance($conn,$emp_id,$periods,$emp_shift,$salary_policy,$date_of_joining,$week_off) {
	$data = $result = $holidays = array();
	//$periods = "02/Feb/2019";
	$period = explode('/',$periods);

	//p($period,'e');
    $sunday_count =0;
    $sunday_ot =0;
	$week_offcount =$extra_day_ot=  0;
		
	$grand_tot_duty_hours =0;

	 $grand_ot =0;
	$last_month = $period[0];//Month Number
	$last_month_name = $period[1];//Month Name
	$last_month_year = $period[2];//Year
	
	$month_date = $last_month_year."-".$last_month."-01";
	$last_date = date('Y-m-t', strtotime($month_date));

	$monthfrday = date('d',strtotime($month_date));
	
	$nxtMonth = date('m',strtotime('+1 month',strtotime($month_date)));
	$nxtMonthYr = date('Y',strtotime('+1 month',strtotime($month_date)));
	
	$table_name = "devicelogs_".intval($last_month)."_".$last_month_year;
	$nxtMonthtable_name = "devicelogs_".intval($nxtMonth)."_".$nxtMonthYr;
	
	$worked_days = $month_working_days = $fmonth_working_days = 0;

	$month_date = ($date_of_joining > $month_date)?$date_of_joining:$month_date;
        $emp_shift = 8.00;
	
	$emp_shift_arr = explode('.',$emp_shift);
	$shift_hour = $emp_shift_arr[0];
	$shift_min = "0.".$emp_shift_arr[1];
	$shift_tot_min = ($shift_hour*60) + $emp_shift_arr[1];
	
	$loopdate = $month_date;
	connect_db();
	$weekholidayarr = array();
	while($loopdate<=$last_date) {
		$LogDate[$loopdate]['In'] = 0;
		$LogDate[$loopdate]['InKey'] = 0;
		$LogDate[$loopdate]['Inmlog'] = 0;
		$LogDate[$loopdate]['Inmlogstatus'] = 0;
		$LogDate[$loopdate]['Out'] = 0;
		$LogDate[$loopdate]['OutKey'] = 0;
		$LogDate[$loopdate]['Outmlog'] = 0;
		$LogDate[$loopdate]['Outmlogstatus'] = 0;
		$crday = date("D",strtotime($loopdate));
		
		if($crday==trim($week_off)){

			$hsql = "SELECT * FROM indsys1012holidaymaster WHERE Holidaydate='".$loopdate."' and Holidaydate>='".$date_of_joining."'";
			//echo $hsql;exit;

           // $result_Region = $conn->query($hsql);
			$hquery = mysqli_query($conn,$hsql);
			$hcount = mysqli_num_rows($hquery);
			if($hcount>0){
				$weekholidayarr[] = $loopdate;
			}
		}

		$loopdate = date("Y-m-d", strtotime("+1 day", strtotime($loopdate)));
	}

	//p($weekholidayarr,'e');
		
        $whdays = implode("','",$weekholidayarr);
	$holsql = "SELECT * FROM indsys1012holidaymaster WHERE  YEAR(Holidaydate) = ".$last_month_year." AND MONTH(Holidaydate) = ".$last_month." AND location!='' and Holidaydate>='".$date_of_joining."' AND Holidaydate NOT IN ('".$whdays."') ORDER BY Holidaydate ASC";

	$holresp = mysqli_query($conn,$holsql) ;
	close_db();
	$holiday_count = mysqli_num_rows($holresp);
	//$holidays1 = mysql_fetch_array($holresp, MYSQL_NUM);
	while($holrow = mysqli_fetch_array($holresp)){
	  $holidays[] = $holrow['Holidaydate']; //for check if logdate is Holiday
	  $holidays1[$holrow['Holidaydate']] = $holrow['Holidaydetail']; // For print on timesheet
	}
	$holiday_count = count($holidays);



	//Count sundays of the Month
	$frday = date('d',strtotime($month_date));
	$lday = date('t',strtotime($last_date));
	for($fday=$frday;$fday<=$lday;$fday++) {
	$MonDate = date($last_month_year.'-'.$last_month.'-'.$fday);
        
	$Day = date('D',strtotime($MonDate));
	if($Day=='Sun') { 
   
     $sunday_count++; }	
       if($Day==$week_off) { 
		
		$week_offcount++;
	}
if(!empty($holidays))
{
	foreach ($holidays as $holikey) {
		if(date('D',strtotime($holikey)) == 'Sun' && $holikey == $MonDate)
		{
		if($Day=='Sun') { 
   
     $sunday_count--; }
       if($Day==$week_off) { 
		
		$week_offcount--;
	}		
		}

	}
}

   
	}


	//echo $week_offcount;die;


	// echo '<pre>';print_r($holidays);
	$logsql = "SELECT * FROM ".$table_name." WHERE UserId = ".$emp_id." AND DATE(LogDate) >= '".$month_date."' AND DATE(LogDate) <= '".$last_date."' ORDER BY LogDate ASC";
	

	$logresp = mysqli_query($conn, $logsql);

	while($logrow =@ mysqli_fetch_array($logresp)) {
		$lid = $logrow['id'];

	$PreDate = date('Y-m-d',strtotime('-1 day',strtotime($logrow['LogDate'])));
	$Date = date('Y-m-d',strtotime($logrow['LogDate']));
	$Time = $logrow['LogDate'];
		//if($logrow['C1'] == 'in'&&!isset($LogDate[$Date]['In']))  {
		if($logrow['C1'] == 'in' && $LogDate[$Date]['In']==0 && $LogDate['C4']==0)  {
				$LogDate[$Date]['In'] = $Time; 
				$LogDate[$Date]['InKey'] = $lid; 
				$LogDate[$Date]['Inmlog'] = $logrow['mlog'];
				$LogDate[$Date]['Inmlogstatus'] = $logrow['mlogstatus'];

		} elseif($logrow['C1'] == 'out' && $logrow['C4']==1) { //31st of previous month night shift punch out on 1st morning should not carry
			if ($Time > $Date." 10:00:00" && $Time < $Date." 23:59:59") {
			$LogDate[$Date]['Out'] = $Time;
			$LogDate[$Date]['OutKey'] = $lid; 
			$LogDate[$Date]['Outmlog'] = $logrow['mlog'];
			$LogDate[$Date]['Outmlogstatus'] = $logrow['mlogstatus'];
			} elseif ($Time < $Date." 10:00:00") {

				if(date('m',strtotime($PreDate)) == $last_month ) {
					 $LogDate[$PreDate]['Out'] = $Time; $LogDate[$Date]['OutKey'] = $lid; $LogDate[$Date]['Outmlog'] = $logrow['mlog'];
						$LogDate[$Date]['Outmlogstatus'] = $logrow['mlogstatus'];
				}

			}

		}else if($logrow['C1']=='out' && $logrow['C4']==4  ){

				if($Time < $Date." 10:00:00"  ){
					
					$Date1 = date("Y-m-d",strtotime($Date." -1 days"));
						
						 $LogDate[$Date1]['OTIn'] = $Time; 

				}else{
					$LogDate[$Date]['OTIn'] = $Time; 
				}
		}else if($logrow['C1']=='out' && $logrow['C4']==5 ){
				if($Time < $Date." 10:00:00"){
					$Date1 = date("Y-m-d",strtotime($Date." -1 days"));
						$LogDate[$Date1]['OTOut'] = $Time; 
				}else{
					$LogDate[$Date]['OTOut'] = $Time;
				}
		}else if($logrow['C1']=='otin'){
			if($Time < $Date." 10:00:00"){
					$Date1 = date("Y-m-d",strtotime($Date." -1 days"));
						$LogDate[$Date1]['OTIn'] = $Time; 
				}else{
					$LogDate[$Date]['OTIn'] = $Time; 
				}
		}elseif($logrow['C1']=='otout'){
			
			if($Time < $Date." 10:00:00"){

					 $Date1 = date("Y-m-d",strtotime($Date." -1 days"));
						$LogDate[$Date1]['OTOut'] = $Time; 
				}else{
					$LogDate[$Date]['OTOut'] = $Time;
				} 
		}
	}

	$LogDate[$last_date]['In'];

	
	//if($LogDate[$last_date]['In']  >= $Date." 20:00:00" && !isset($LogDate[$last_date]['Out'])) { //Month Last date after 12am(night) Out Punch Update
	if($LogDate[$last_date]['In']  >= $Date." 20:00:00" && $LogDate[$last_date]['Out']==0) { //Month Last date after 12am(night) Out Punch Update
	$nxtDate = date('Y-m-d',strtotime('+1 day',strtotime($last_date)));
	$monthsql = "SELECT LogDate,C1 FROM ".$nxtMonthtable_name." WHERE UserId = ".$emp_id." AND DATE(LogDate) = '".$nxtDate."' ORDER BY LogDate ASC LIMIT 0,1";

	$monresp = mysqli_query($conn, $monthsql);

		if(mysqli_num_rows($monresp) > 0) {
		$monrow =@ mysqli_fetch_assoc($monresp);

		$nxtTime = date('Y-m-d H:i:s',strtotime($monrow['LogDate']));
		$LogDate[$last_date]['Out'] = $nxtTime;
		}
	}
	if($LogDate[$last_date]['Out']==0) { //Month Last date after 12am(night) Out Punch Update
	$nxtDate = date('Y-m-d',strtotime('+1 day',strtotime($last_date)));
	$monthsql = "SELECT LogDate,C1 FROM ".$nxtMonthtable_name." WHERE UserId = ".$emp_id." AND DATE(LogDate) = '".$nxtDate."' ORDER BY LogDate ASC LIMIT 0,1";

	$monresp = mysqli_query($conn, $monthsql);

	$monrow =@ mysqli_fetch_assoc($monresp);
		if($monrow['C1']=='out') {
		$nxtTime = date('Y-m-d H:i:s',strtotime($monrow['LogDate']));
		$LogDate[$last_date]['Out'] = $nxtTime;
		}
	}


	if($salary_policy == 'Admin & Staff') {
		
	$month_working_days = ($lday-($frday-1))-($week_offcount+$holiday_count);//day before first day frday-1
	$fmonth_working_days = ($lday-($monthfrday-1))-($week_offcount+$holiday_count);//day before first day 
	} else {

	$month_working_days = ($lday-($frday-1))-($week_offcount+$holiday_count);//day before first day frday-1
	$fmonth_working_days = ($lday-($monthfrday-1))-($week_offcount+$holiday_count);//day before first day frday-1
	//ECHO $week_off;EXIT;
	}


	// $day_sal = round((@$basic_salary*12)/365,3);
	// $hour_sal = round(((@$basic_salary*12)/365)/$emp_shift,2);
	// $minute_sal = round($hour_sal/60,2);
	// $sunday_ot= "";
	// $empabsent = 0;

	foreach($LogDate as $Date => $Time){

		//if(isset($Time['In'])&&isset($Time['Out'])) {

		if($Time['In']!= 0&&$Time['Out']!= 0 ) {
			
		$Diff = strtotime($Time['Out']) - strtotime($Time['In']);

		$tot_mins = round((($Diff/60)>15)?$Diff/60:0);
		
		$LogDate[$Date]['actdh'] = $tot_mins;
		/*
		A (OFFICE)
		B (WORKERS)
		C (SALES)
		D (CANTEEN)
		E (DELIVERY)
		M (MANAGER)
		O (OPERATER)
		*/

				


			if(($salary_policy != 'Admin & Staff' && date('D',strtotime($Date)) == 'Sun') || (in_array($Date,$holidays))) {


				
				// packer + helper sunday ot hours new//
				if($salary_policy == 'Workers'){
					//$sunday_ot += $tot_mins;
				}

				if($salary_policy == 'Admin & Staff' ||	 $salary_policy == 'Workers') {

				$LogDate[$Date]['ot'] =  $tot_mins;
				$LogDate[$Date]['totdh'] = 0;

				} elseif($salary_policy == 'Marketing') {
				$LogDate[$Date]['ot'] =  0;
				$LogDate[$Date]['totdh'] = 0;
				}
				else if($salary_policy=="Admin & Staff") {
								
					//$sunday_ot += $tot_mins;
							
						} 
						/*echo $Date.'-'.$emp_id."-".$tot_mins .'>='. $shift_tot_min."<br>";*/
				if($tot_mins >= 360) {
				
				$worked_days++;
				
				$LogDate[$Date]['ot'] =  $tot_mins - $shift_tot_min;
				$LogDate[$Date]['totdh'] = $shift_tot_min;
				}
				else
				{
					$worked_days += 0.5;
				}
				
				if($fmonth_working_days<$worked_days){
					//echo $tot_mins;exit;
					$extra_day_ot += $tot_mins;
				}
				
			} else {
				
				if($tot_mins > 0) {
					
						

					if($salary_policy == 'Workers') {	

						if($tot_mins > 60 && $tot_mins < 270)
						{
							$worked_days += 0.5;
						}
						 
						else if($tot_mins >= $shift_tot_min) {

						$worked_days++;
						if($fmonth_working_days<$worked_days){
								//echo $tot_mins;exit;
								$extra_day_ot += $tot_mins;
							}
						
						$LogDate[$Date]['ot'] =  $tot_mins - $shift_tot_min;
						$LogDate[$Date]['totdh'] = $shift_tot_min;
						} elseif($shift_tot_min > $tot_mins) {

						$worked_days++;

						if($fmonth_working_days<$worked_days){
					//echo $tot_mins;exit;
					$extra_day_ot += $tot_mins;
				}

						$LogDate[$Date]['ot'] = $tot_mins - $shift_tot_min;
						$LogDate[$Date]['totdh'] = $tot_mins;
						
							/*if($tot_mins > ($shift_tot_min/4) && $tot_mins < (270)) {
							$worked_days += 0.5;
							}*/
							
						}
					} elseif($salary_policy=="Admin & Staff"){

						/*if($tot_mins >= $shift_tot_min) {
							$worked_days++;*/

							if($tot_mins >= 60 && $tot_mins <= (270)) {

							   $worked_days += 0.5;
							   if($fmonth_working_days<$worked_days){
									//echo $tot_mins;exit;
									$extra_day_ot += $tot_mins;
								}
							} else if($tot_mins >= (270) && $tot_mins <= $shift_tot_min) {

							   $worked_days++;

							   if($fmonth_working_days<$worked_days){
										//echo $tot_mins;exit;
											$extra_day_ot += $tot_mins;
										}
						
						$LogDate[$Date]['ot'] =  $tot_mins - $shift_tot_min;
						$LogDate[$Date]['totdh'] = $shift_tot_min;
						} elseif($shift_tot_min > $tot_mins) {

							$worked_days++;
							$LogDate[$Date]['ot'] = $tot_mins - $shift_tot_min;
							$LogDate[$Date]['totdh'] = $tot_mins;
						if($fmonth_working_days<$worked_days){
					//echo $tot_mins;exit;
					$extra_day_ot += $tot_mins;
				}
							/*if($tot_mins > ($shift_tot_min/4) && $tot_mins < (270)) {
							$worked_days += 0.5;
							}*/
						}
					}elseif($salary_policy == 'Admin & Staff') {

						if($tot_mins >= $shift_tot_min) {

						$worked_days++;
						$Day = date('D',strtotime($Date));
							if($Day=='Sun') {  
							$LogDate[$Date]['ot'] =  0;
							$LogDate[$Date]['totdh'] = $shift_tot_min;
							} else {
							$LogDate[$Date]['ot'] =  $tot_mins - $shift_tot_min;
							$LogDate[$Date]['totdh'] = $shift_tot_min;
							}

							if($fmonth_working_days<$worked_days){
					//echo $tot_mins;exit;
					$extra_day_ot += $tot_mins;
				}
						
						} elseif($shift_tot_min > $tot_mins) {

						$worked_days++;
						$LogDate[$Date]['ot'] = $tot_mins - $shift_tot_min;
						$LogDate[$Date]['totdh'] = $tot_mins;
						
							/*if($tot_mins > ($shift_tot_min/4) && $tot_mins < (270)) {
							$worked_days += 0.5;
							}*/

							if($fmonth_working_days<$worked_days){
					//echo $tot_mins;exit;
					$extra_day_ot += $tot_mins;
				}
						}
					} else {	

						
							
					if($tot_mins > 60 && $tot_mins < 270) {

					$worked_days += 0.5;
					if($fmonth_working_days<$worked_days){
					//echo $tot_mins;exit;
							$extra_day_ot += $tot_mins;
						}
					} else if($tot_mins > 270) {
						
					$worked_days++;

					
					if($fmonth_working_days<$worked_days){
					//echo $tot_mins;exit;
							$extra_day_ot += $tot_mins;
						}
					}
								
					$LogDate[$Date]['ot'] = 0;
						if($tot_mins >= $shift_tot_min) {
						$LogDate[$Date]['totdh'] = $shift_tot_min;
						} elseif($shift_tot_min > $tot_mins) {
						$LogDate[$Date]['totdh'] = $tot_mins;
						}
					}
				}
			}
			
		}
			/*if($salary_policy == 'B')
			{

				if($Time['In']== 0 && $Time['Out']==0)
				{
					if((date('D',strtotime($Date)) != 'Sun'))
					$empabsent++;
					echo $empabsent." ".$Date."<br>";
				}
				elseif($Time['In']!= 0 && $Time['Out']!=0)
				{

				}
			}*/
	
	$grand_tot_duty_hours += $LogDate[$Date]['totdh'];

	 $grand_ot += $LogDate[$Date]['ot'];
	//echo '<br>';
	

	}
	
	//echo $emp_id."-".$worked_days;
	
	//echo $grand_ot;	

	$grand_totdh_hours = intval($grand_tot_duty_hours/60);
	$grand_totdh_minutes = time_round(($grand_tot_duty_hours%60)/100);
	$grand_totdh = number_format($grand_totdh_hours+$grand_totdh_minutes,2);
	
	$grand_ot1 = $grand_ot;
	$grand_ot_hours = intval($grand_ot/60);
	$grand_ot_minutes = time_round(($grand_ot%60)/100);
	  $grand_ot = number_format($grand_ot_hours+$grand_ot_minutes,2);
	//echo '<br>';

	$expmin = explode('.', $grand_ot);
	$num_min = $expmin[1]/60;
	$get_min = explode('.',$num_min);
	if($get_min[1]!="")
	{
	$grand_ot = $expmin[0].'.'.$get_min[1];
	}else
	{
		$grand_ot = $expmin[0];
	}
	

	if($salary_policy=='Admin & Staff')
		{
		
		//$grand_ot=$grand_ot-intval($sunday_ot/60);
		}
		



	
	// $data['salary_type'] = $salary_type;							
	$data['grand_totdh'] = $grand_totdh;
	$data['grand_ot'] = $grand_ot;
	$data['sunday_ot'] = $sunday_ot/60; 
	$data['extra_day_ot'] = $extra_day_ot;
	$data['month_working_days'] = $month_working_days;
	$data['worked_days'] = $worked_days;
	$data['sunday_count'] = $sunday_count;
	$data['week_offcount'] = $week_offcount;
	$data['holiday_count'] = $holiday_count;
	$data['holidays1'] = $holidays1;
	$data['last_month_name'] = $last_month_name;
	$data['last_month_year'] = $last_month_year;
//	$data['apsent'] = $fmonth_working_days-$worked_days;
 /*if($salary_policy == 'B' )
 {
 	$data['apsent'] = $empabsent;
 }else {*/

 	if($worked_days<=$fmonth_working_days){
 		$data['apsent'] = $fmonth_working_days-$worked_days; 
 	}else{
 		$data['apsent'] = 0;
 	}
	
	$data['salary_policy']=$salary_policy;
	$result['data'] = $data;


if($last_month==1){
	$last_month=11;
	$last_month_year = $last_month_year-1;
}else{
	$last_month= $last_month-1;
}

$ldt =  date("Y-m-t", strtotime($last_month_year."-".$last_month));
if(isset($LogDate[$ldt])){
	unset($LogDate[$ldt]);
}

$result['LogDate'] = $LogDate;

//2019-04-30

return $result;

}
function time_round($time) {
	if($time<=0.15)
	$time=0;
	elseif($time>0.15 && $time<=0.30)
	$time=0.30;
	elseif($time>0.30 && $time<=0.45)
	$time=0.45;
	else
	$time = 1;
return $time;
}
?>
