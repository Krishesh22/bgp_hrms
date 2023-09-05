<?php
include 'config.php';

  $test_res="";
  $LoginQryAdmin = "SELECT * FROM indsys1000useradmin ";
  $resultLoginQryAdmin = $conn->query($LoginQryAdmin);
  while($row = $resultLoginQryAdmin->fetch_assoc()) 
  {
  $user_id = $row['Userid'];
  $username = $row['Username'];
    $Emailid = $row['Emailid'];
    $Userpassword = $row['Userpassword'];
    $test_res .="$Emailid | $Userpassword";
  }

echo "test | $test_res <br/><br/>";

echo "$conn";


?>