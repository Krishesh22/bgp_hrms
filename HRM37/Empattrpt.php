<?php
include '../config.php';

session_start();
 $user_id = $_SESSION["Userid"];
     $username = $_SESSION["Username"];
     $usermail=$_SESSION["Mailid"];
     $Clientid =$_SESSION["Clientid"];
     $Sessionid = $_SESSION["SESSIONID"];

     $_SESSION["Tittle"] ="Daily Attendance Detail";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
 $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];

if($MethodGet == 'FetchDate')
{

    try
    { 
  

      $date=date("Y-m-d");

    


      

 
    
    $Display=array(
      'date'=>  $date,

      
   
     
      
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
   
 }
 if($MethodGet == 'DISPATT')
{
    $FromDate =$form_data['FromDate'];
    $ToDate =$form_data['ToDate'];
    $Employeeid =$form_data['Employeeid'];
    $_SESSION['FromDate'] = $FromDate;
    $_SESSION['ToDate'] =$ToDate;
    $_SESSION['Employeeid'] =$Employeeid;
    $data01 =[];
   $GetState = "SELECT * FROM indsys1030empdailyattendancedetail where Attendencedate>='$FromDate' AND Attendencedate<='$ToDate' AND Employeeid='$Employeeid'  AND Clientid='$Clientid'   ORDER BY Employeeid";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
    header('Content-Type: application/json');
    echo json_encode($data01);
 }



 if($MethodGet == 'EMPL01')
 {
   
     $data01 =[];
    $GetState = "SELECT * FROM indsys1017employeemaster where Clientid='$Clientid'   ORDER BY Employeeid";
     $result_Region = $conn->query($GetState);
   
     if(mysqli_num_rows($result_Region) > 0) { 
     while($row = mysqli_fetch_array($result_Region)) {  
       $data01[] = $row;
       } 
     }        
     header('Content-Type: application/json');
     echo json_encode($data01);
  }


  if($MethodGet == 'FetchEmployee')
  {
  
      try
      { 
    
  
        $Employeeid =$form_data['Employeeid'];
  
  
        $GetDeptEmp = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetDeptEmp );
        if(mysqli_num_rows($result_Chapter) > 0) { 
            while($row = mysqli_fetch_array($result_Chapter)) {  
                $Fullname =$row['Fullname'];
           
               
                 
          } 
        }
  
  
  
  
  
  
      $Display=array(
          
          'Fullname'=>  $Fullname
     
  
         
    );
     
    $str = json_encode($Display);
    echo trim($str, '"');
   }
   catch(Exception $e)
   {
   
   }
     
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