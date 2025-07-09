<<<<<<< HEAD
<?php
include '../config.php';
include '../session.php';



session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="EducationMode";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];

  $EducationMode = '';
  if(isset($form_data['EducationMode']))
  {
$EducationMode=$form_data['EducationMode'];
  }
  $data01 = array();
  
if($MethodGet == 'Save')
{



  if(empty($EducationMode))
  {

$Message = "Empty";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }

  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
 
  }
  $resultExists = "SELECT EducationMode FROM indsys1056educationmodemaster WHERE EducationMode = '$EducationMode' AND Clientid = '$Clientid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $Message ="Exists";
 
  }

  else
  {
      
    $sqlsave = "INSERT IGNORE INTO indsys1056educationmodemaster (Clientid,EducationMode,Userid,Addormodifydatetime) VALUES ('".$Clientid."','".$EducationMode."','".$user_id."','".$date."')";
    $resultsave = mysqli_query($conn,$sqlsave);
    if($resultsave===TRUE)
    {
    $Message ="Data Saved";
    }
    else
    {
      echo "$sqlsave<br/>";
      $Message ="Error";
    }
 
 }



 $GetRegion = "SELECT EducationMode FROM indsys1056educationmodemaster WHERE Clientid = '$Clientid'  ORDER BY EducationMode";
 $result_Region = $conn->query($GetRegion);
 if(mysqli_num_rows($result_Region) > 0) { 
 while($row = mysqli_fetch_array($result_Region)) {  
   $data01[] = $row;  
   } 
 }

$mytbl["mytbl"] =$data01;
 $Display=array('mytbl' => $mytbl["mytbl"],'Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}

if($MethodGet == 'Change')
{
   $GetRegion = "SELECT * FROM indsys1056educationmodemaster WHERE EducationMode Like '%".$EducationMode."%' AND Clientid = '$Clientid'  ORDER BY EducationMode";
    $result_Region = $conn->query($GetRegion);
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;  
      } 
    }
        header('Content-Type: application/json');
    echo json_encode($data01);
 
 
 
}
if($MethodGet == 'ALL')
{
   $GetRegion = "SELECT EducationMode FROM indsys1056educationmodemaster WHERE Clientid = '$Clientid'   ORDER BY EducationMode";
    $result_Region = $conn->query($GetRegion);
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    
    header('Content-Type: application/json');
    echo json_encode($data01);
 
 
 
}





if($MethodGet == 'Delete')
{



  if(empty($EducationMode))
  {

$Message = "Empty";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }

  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "DELETE FROM indsys1056educationmodemaster WHERE EducationMode = '$EducationMode' AND Clientid = '$Clientid' ";
  $resultExists01 = $conn->query($resultExists);

    
    $Message ="Delete";
 
 

 



 $GetRegion = "SELECT EducationMode FROM indsys1056educationmodemaster  WHERE Clientid = '$Clientid' ORDER BY EducationMode";
 $result_Region = $conn->query($GetRegion);
 if(mysqli_num_rows($result_Region) > 0) { 
 while($row = mysqli_fetch_array($result_Region)) {  
   $data01[] = $row;  
   } 
 }

$mytbl["mytbl"] =$data01;
 $Display=array('mytbl' => $mytbl["mytbl"],'Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}

?>




        
=======
<?php
include '../config.php';
include '../session.php';



session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="EducationMode";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];

  $EducationMode = '';
  if(isset($form_data['EducationMode']))
  {
$EducationMode=$form_data['EducationMode'];
  }
  $data01 = array();
  
if($MethodGet == 'Save')
{



  if(empty($EducationMode))
  {

$Message = "Empty";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }

  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
 
  }
  $resultExists = "SELECT EducationMode FROM indsys1056educationmodemaster WHERE EducationMode = '$EducationMode' AND Clientid = '$Clientid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $Message ="Exists";
 
  }

  else
  {
      
    $sqlsave = "INSERT IGNORE INTO indsys1056educationmodemaster (Clientid,EducationMode,Userid,Addormodifydatetime) VALUES ('".$Clientid."','".$EducationMode."','".$user_id."','".$date."')";
    $resultsave = mysqli_query($conn,$sqlsave);
    if($resultsave===TRUE)
    {
    $Message ="Data Saved";
    }
    else
    {
      echo "$sqlsave<br/>";
      $Message ="Error";
    }
 
 }



 $GetRegion = "SELECT EducationMode FROM indsys1056educationmodemaster WHERE Clientid = '$Clientid'  ORDER BY EducationMode";
 $result_Region = $conn->query($GetRegion);
 if(mysqli_num_rows($result_Region) > 0) { 
 while($row = mysqli_fetch_array($result_Region)) {  
   $data01[] = $row;  
   } 
 }

$mytbl["mytbl"] =$data01;
 $Display=array('mytbl' => $mytbl["mytbl"],'Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}

if($MethodGet == 'Change')
{
   $GetRegion = "SELECT * FROM indsys1056educationmodemaster WHERE EducationMode Like '%".$EducationMode."%' AND Clientid = '$Clientid'  ORDER BY EducationMode";
    $result_Region = $conn->query($GetRegion);
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;  
      } 
    }
        header('Content-Type: application/json');
    echo json_encode($data01);
 
 
 
}
if($MethodGet == 'ALL')
{
   $GetRegion = "SELECT EducationMode FROM indsys1056educationmodemaster WHERE Clientid = '$Clientid'   ORDER BY EducationMode";
    $result_Region = $conn->query($GetRegion);
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    
    header('Content-Type: application/json');
    echo json_encode($data01);
 
 
 
}





if($MethodGet == 'Delete')
{



  if(empty($EducationMode))
  {

$Message = "Empty";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }

  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "DELETE FROM indsys1056educationmodemaster WHERE EducationMode = '$EducationMode' AND Clientid = '$Clientid' ";
  $resultExists01 = $conn->query($resultExists);

    
    $Message ="Delete";
 
 

 



 $GetRegion = "SELECT EducationMode FROM indsys1056educationmodemaster  WHERE Clientid = '$Clientid' ORDER BY EducationMode";
 $result_Region = $conn->query($GetRegion);
 if(mysqli_num_rows($result_Region) > 0) { 
 while($row = mysqli_fetch_array($result_Region)) {  
   $data01[] = $row;  
   } 
 }

$mytbl["mytbl"] =$data01;
 $Display=array('mytbl' => $mytbl["mytbl"],'Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}

?>




        
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
