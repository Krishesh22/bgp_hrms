<?php
include '../config.php';
include '../session.php';



session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
      $Sessionid = $_SESSION["SESSIONID"];

      $_SESSION["Tittle"] ="Holiday Master";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];

  $Holidaydate = '';
  if(isset($form_data['Holidaydate']))
  {
$Holidaydate=$form_data['Holidaydate'];
  }
  $data01 = array();
  
if($MethodGet == 'Save')
{



  if(empty($Holidaydate))
  {

$Message = "Empty";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }

  $Holidaydetail = $form_data['Holidaydetail'];
  
  if(empty($Holidaydetail))
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
  $resultExists = "SELECT * FROM indsys1012holidaymaster WHERE Holidaydate = '$Holidaydate' AND Clientid = '$Clientid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $resultExists22 = "Update indsys1012holidaymaster set Holidaydetail ='$Holidaydetail',Addormodifydatetime ='$date',Userid ='$user_id' WHERE Holidaydate = '$Holidaydate' AND Clientid = '$Clientid' ";
    $resultExists233 = $conn->query($resultExists22);
    $Message ="Exists";
 
  }

  else
  {
      
    $sqlsave = "INSERT IGNORE INTO indsys1012holidaymaster (Clientid,Holidaydate,Userid,Addormodifydatetime,Holidaydetail) VALUES ('".$Clientid."','".$Holidaydate."','".$user_id."','".$date."','".$Holidaydetail."')";
    $resultsave = mysqli_query($conn,$sqlsave);
    $Message ="Data Saved";
 
 }



 $GetRegion = "SELECT * FROM vwholidaymaster  WHERE Clientid = '$Clientid' ORDER BY Holidaydate";
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
   $GetRegion = "SELECT * FROM vwholidaymaster WHERE Clientid = '$Clientid' AND Holidaydate Like '%".$Holidaydate."%'  ORDER BY Holidaydate";
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
   $GetRegion = "SELECT * FROM vwholidaymaster WHERE Clientid = '$Clientid' ORDER BY Holidaydate";
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



  if(empty($Holidaydate))
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
  $resultExists = "DELETE FROM indsys1012holidaymaster WHERE Holidaydate = '$Holidaydate' AND Clientid = '$Clientid' ";
  $resultExists01 = $conn->query($resultExists);

    
    $Message ="Delete";
 
 

 



 $GetRegion = "SELECT * FROM vwholidaymaster WHERE Clientid = '$Clientid' ORDER BY Holidaydate";
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

if($MethodGet == 'PageSession')
{

     $Message =$Sessionid;

  
    $Display=array(
        'Message'=>  $Message,
      
    );
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
}
?>




        
