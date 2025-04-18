<?php
include '../config.php';
session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Employeeid= $_SESSION['Employeeid'];
$FromDate=$_SESSION['FromDate'];
$ToDate=$_SESSION['ToDate'];
$gettime = time();
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=".$gettime.".xls");  
header("Pragma: no-cache"); 
header("Expires: 0");


echo '<table border="1">';
//make the column headers what you want in whatever order you want
echo ' <tr >

<th style="width: 50px;">S.No</th>



<th>Date</th>
<th scope="col">Empid</th>
<th scope="col">Empname</th>
<th scope="col">Status</th>
<th scope="col">In</th>
<th scope="col">Out</th>
<th scope="col">OT In</th>
<th scope="col">OT Out</th>
<th scope="col">Hrs</th>

<th scope="col">OT</th>
<th scope="col" title="Actual OT Hrs">AW OT</th>

</tr>';


$GetState = "SELECT * ,e.Fullname FROM indsys1030empdailyattendancedetail as d 
JOIN indsys1017employeemaster AS e ON d.Employeeid = e.Employeeid AND d.Clientid = e.Clientid 
where d.Attendencedate>='$FromDate' AND d.Attendencedate<='$ToDate' AND d.Employeeid='$Employeeid'  AND d.Clientid='$Clientid'   ORDER BY d.Employeeid";

  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $i++;
    $Attendencedate = $row['Attendencedate'];
 
    echo '<tr>  

    <td>'.$i.'</td>  
    <td>'.date('d-M-Y', strtotime($Attendencedate)).'</td>  
    <td>'.$row["Employeeid"].'</td>  
    <td>'.$row["Title"].$row["Fullname"].'</td>  
    <td>'.$row["AttenStatus"].'</td>  
    <td>'.$row["Intime"].'</td>  
    <td>'.$row["Outtime"].'</td>  
    <td>'.$row["OTIntime"].'</td>  
    <td>'.$row["OTOuttime"].'</td>  
    <td>'.$row["Workinghours"].'</td>  
 
    <td>'.$row["OT_HRS"].'</td>  
    <td>'.$row["ActualOt_HRS"].'</td>  
 
   
</tr>  
    ';  
}  
  }
//loop the query data to the table in same order as the headers

echo '</table>';
exit;
?>