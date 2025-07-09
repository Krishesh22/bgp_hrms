<<<<<<< HEAD
<?php


error_reporting(0);
include '../config.php';
$GetLophr = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid = 'CAT03ADM000010' and SalMonth = 'February' and  Salyear = '2023' AND Clientid ='1' "; 
$result_Lop = $conn->query($GetLophr );
if(mysqli_num_rows($result_Lop) > 0) { 


while($row = mysqli_fetch_array($result_Lop)) {  
  $Lophrs =$row['Lophrs'];
  
 
 
 
  } 
}
=======
<?php


error_reporting(0);
include '../config.php';
$GetLophr = "SELECT * FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid = 'CAT03ADM000010' and SalMonth = 'February' and  Salyear = '2023' AND Clientid ='1' "; 
$result_Lop = $conn->query($GetLophr );
if(mysqli_num_rows($result_Lop) > 0) { 


while($row = mysqli_fetch_array($result_Lop)) {  
  $Lophrs =$row['Lophrs'];
  
 
 
 
  } 
}
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
?>