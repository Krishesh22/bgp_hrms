<?php



$date = date("Y-m-d" );
$date_of_joining = "2022-05-05";
//echo $date_of_joining ;
$date1 = new DateTime($date_of_joining);

$date2 = new DateTime($date);




$dateofjoingdays = $date2->diff($date1)->format("%a"); 
echo $dateofjoingdays;


?>