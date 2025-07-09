<?php


error_reporting(0);
include '../config.php';
// $Intime="09:37:33";
// $Outtime="17:05:17";

// $workingMin = getIntervalMinutes($Intime,$Outtime)-60;
// $lopMin = 480-$workingMin;

// $Lophrs = getHoursAndMins($lopMin);

// echo $Lophrs;
// $lophrsnew =  substr(str_replace(':', '.', $Lophrs), 0, 5);
// echo "<br/>";
// echo $lophrsnew;


$logemp = "SELECT * FROM indsys1017employeemaster WHERE  Type_Of_Posistion='Category 3' and Empactive='Active'  ORDER BY Employeeid ASC";
	
   
$logempall = mysqli_query($conn, $logemp);
while($row = mysqli_fetch_array($logempall)) {
 
  
   $Employeeid =$row['Employeeid'];
   $Fullname = $row['Fullname'];
  


   $sqlLOP = "SELECT  SUM(Lophrs) from vwattendenceclosestatus where Clientid='1' and Attendencedate>='2023-03-01' and Attendencedate <='2023-03-15' and Employeeid = '$Employeeid'  and Empattendencestatus='Close'";
   $resultLOP = $conn->query($sqlLOP);
   
   while($rownew = mysqli_fetch_array($resultLOP)){
     $Lophrs= $rownew['SUM(Lophrs)'];
       
echo " $Employeeid - $Fullname   $Lophrs <br/>";
     
   }
}





?>