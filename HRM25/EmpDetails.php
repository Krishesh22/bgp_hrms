<<<<<<< HEAD
<?php 
include '../config.php';


error_reporting(0);
session_start();



  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
      $Emaild =$_SESSION["Emaild"];
      

      $_SESSION["Tittle"] ="Daily Attendance Detail";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];



if($MethodGet == 'ExitEmp')
{

    try
    { 
  

      $Employeeid =$form_data['Exitempid'];
      $_SESSION["Employeeid"] = $Employeeid;
//echo $Employeeid;
      
    $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
     
      $ExitDesignation = $row['Designation'];
      $ExitContactno = $row['Contactno'];
      $Emaild = $row['Emaild'];
      $Employeeid = $row['Employeeid'];
    // echo $Employeeid;
     
      } 
    }


    
    $Display=array(
      
      'ExitDesignation'=>  $ExitDesignation,
      'ExitContactno'=> $ExitContactno,
      'Emaild'=>  $Emaild,
      'Employeeid'=>  $Employeeid,
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
 return;      
}
catch(Exception $e)
{

}
}

/////////////////////////////////////////////


if($MethodGet == 'ALL')
 {
    $Department =$form_data['Department'];
     $_SESSION["Department"] = $Department;
    $GetState = "SELECT * FROM indsys1017employeemaster where   Department = '$Department' ORDER BY Employeeid";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
    header('Content-Type: application/json');
    echo json_encode($data01);
    return;
  }

/////////////////////////////////////////////

  if($MethodGet == 'Dept')
  {
     $GetState = "SELECT * FROM indsys1003departmentmaster   ORDER BY Department";
      $result_Region = $conn->query($GetState);
    
      if(mysqli_num_rows($result_Region) > 0) { 
      while($row = mysqli_fetch_array($result_Region)) {  
        $data01[] = $row;
        } 
      }
          
      header('Content-Type: application/json');
      echo json_encode($data01);
      return;
   
  }

/////////////////////////////////////////////
  
  if($MethodGet == 'Desig')
  {
     $GetState = "SELECT * FROM indsys1004designationmaster   ORDER BY Designation";
      $result_Region = $conn->query($GetState);
    
      if(mysqli_num_rows($result_Region) > 0) { 
      while($row = mysqli_fetch_array($result_Region)) {  
        $data01[] = $row;
        } 
      }
          
      header('Content-Type: application/json');
      echo json_encode($data01);
      return;
   
  }
  

  /////////////////////////////////////////////

  if($MethodGet == 'Save')
  {
  
  
    $pwd = $form_data['pwd'];
    if(empty($pwd))
    {
  
  $Message = "Empty";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }

    $Emaild = $form_data['Emaild'];
    if(empty($Emaild))
    {
  
  $Message = "Emailid Empty";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }


    
    $Employeeid = $form_data['Employeeid'];
   
    $Contact = $form_data['ExitContactno'];
    $Authorisedtype = $form_data['EmployeeType'];
    $Department = $form_data['Department'];
    $ExitDesignation = $form_data['ExitDesignation'];
    $username = $form_data['username'];


       $GetChapter2 = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid' ";
       $result_Chapter = $conn->query($GetChapter2 );
       if(mysqli_num_rows($result_Chapter) > 0) { 
   
   
       while($row = mysqli_fetch_array($result_Chapter)) {  
        
         $Firstname = $row['Firstname'];
         $Lastname = $row['Lastname'];
         $Emaild = $row['Emaild'];
         $Employeeid = $row['Employeeid'];
        
         } 
       }
   


    if (mysqli_connect_errno()){
      $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
   
    }
  
    $resultExists = "SELECT * FROM indsys1000useradmin WHERE Clientid ='$Clientid' AND Department='$Department' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
  
   
   
   if(mysqli_fetch_row($resultExists01))
    {
    
      $Message ="Exists";
      
   
    }
  
    else
    {
      
      $sqlsave = "INSERT IGNORE INTO indsys1000useradmin (Clientid,Userid,Username,Emailid,Contactno,Authorizedtype,Userpassword,Memberactive,Userinfo,UserType,Department,Designation) 
      VALUES ('$Clientid','$Employeeid','$Firstname $Lastname $username','$Emaild','$Contact','$Authorisedtype','$pwd','Active','','','$Department','$ExitDesignation')";
      $resultsave = mysqli_query($conn,$sqlsave);
      

      
      $Message ="Data Saved";
   
   }


  $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
  
  
   
       
  }


  /////////////////////////////////////////////

  if($MethodGet == 'FETCH')
  {
     $GetState = "SELECT * FROM indsys1000useradmin where Memberactive ='Active'   ORDER BY Userid";
     $result_Region = $conn->query($GetState);
   
     if(mysqli_num_rows($result_Region) > 0) { 
     while($row = mysqli_fetch_array($result_Region)) {  
       $data01[] = $row;
       } 
     }        
     header('Content-Type: application/json');
     echo json_encode($data01);
     return;
   }
 
  
/////////////////////////////////////////////



   if($MethodGet == 'FetchEmployee')
{

    try
    { 
  

      $Userid =$form_data['Userid'];
     
    $GetChapter = "SELECT * FROM indsys1000useradmin where Userid ='$Userid' ";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Userid =$row['Userid'];
      $Username =$row['Username'];
      $Emailid = $row['Emailid'];
      $Contactno =$row['Contactno'];
   
      $Authorizedtype =$row['Authorizedtype'];
      $Userpassword = $row['Userpassword'];
      $Contactno =$row['Contactno'];
      $Memberactive = $row['Memberactive'];
      $Department = $row['Department'];
      $Designation =$row['Designation'];
     
     
      } 
    }


 
    
    $Display=array(
      'Userid'=>  $Userid,
      'Username'=> $Username,
      'Emailid'=>  $Emailid,
      'Contactno'=> $Contactno,     
      'Authorizedtype'=> $Authorizedtype,
      'Userpassword'=>  $Userpassword,
      'Contactno'=> $Contactno,
      'Contactno'=>  $Contactno,
      'Memberactive'=>  $Memberactive,
      'Department'=> $Department,
      'Designation'=> $Designation,
      
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
 return;
}
catch(Exception $e)
{

}
} 



/////////////////////////////////////////////


if($MethodGet == 'UpdateEmp')
{
  

try
{
    
    $Userid =$form_data['Userid'];
    $Username =$form_data['Username'];
    $Emailid =$form_data['Emailid'];
   
    $Authorizedtype =$form_data['Authorizedtype'];
    $Userpassword =$form_data['Userpassword'];
    $Contactno =$form_data['Contactno'];
    $Memberactive =$form_data['Memberactive'];
    $Department =$form_data['Department'];
    $Designation =$form_data['Designation'];
    


  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "Update indsys1000useradmin set 
  
  Username ='$Username',
  Emailid='$Emailid',
  Contactno ='$Contactno',
  Authorizedtype ='$Authorizedtype',
  Userpassword='$Userpassword',
  
  Memberactive ='$Memberactive',
  Department='$Department',
  Designation='$Designation',
  Userinfo='$Userinfo',
  UserType='$UserType'

    
     WHERE Userid = '$Userid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Updated";



 


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
return;
}
catch(Exception $e)
{

}
 
     
}



?>



=======
<?php 
include '../config.php';


error_reporting(0);
session_start();



  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
      $Emaild =$_SESSION["Emaild"];
      

      $_SESSION["Tittle"] ="Daily Attendance Detail";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];



if($MethodGet == 'ExitEmp')
{

    try
    { 
  

      $Employeeid =$form_data['Exitempid'];
      $_SESSION["Employeeid"] = $Employeeid;
//echo $Employeeid;
      
    $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
     
      $ExitDesignation = $row['Designation'];
      $ExitContactno = $row['Contactno'];
      $Emaild = $row['Emaild'];
      $Employeeid = $row['Employeeid'];
    // echo $Employeeid;
     
      } 
    }


    
    $Display=array(
      
      'ExitDesignation'=>  $ExitDesignation,
      'ExitContactno'=> $ExitContactno,
      'Emaild'=>  $Emaild,
      'Employeeid'=>  $Employeeid,
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
 return;      
}
catch(Exception $e)
{

}
}

/////////////////////////////////////////////


if($MethodGet == 'ALL')
 {
    $Department =$form_data['Department'];
     $_SESSION["Department"] = $Department;
    $GetState = "SELECT * FROM indsys1017employeemaster where   Department = '$Department' ORDER BY Employeeid";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
    header('Content-Type: application/json');
    echo json_encode($data01);
    return;
  }

/////////////////////////////////////////////

  if($MethodGet == 'Dept')
  {
     $GetState = "SELECT * FROM indsys1003departmentmaster   ORDER BY Department";
      $result_Region = $conn->query($GetState);
    
      if(mysqli_num_rows($result_Region) > 0) { 
      while($row = mysqli_fetch_array($result_Region)) {  
        $data01[] = $row;
        } 
      }
          
      header('Content-Type: application/json');
      echo json_encode($data01);
      return;
   
  }

/////////////////////////////////////////////
  
  if($MethodGet == 'Desig')
  {
     $GetState = "SELECT * FROM indsys1004designationmaster   ORDER BY Designation";
      $result_Region = $conn->query($GetState);
    
      if(mysqli_num_rows($result_Region) > 0) { 
      while($row = mysqli_fetch_array($result_Region)) {  
        $data01[] = $row;
        } 
      }
          
      header('Content-Type: application/json');
      echo json_encode($data01);
      return;
   
  }
  

  /////////////////////////////////////////////

  if($MethodGet == 'Save')
  {
  
  
    $pwd = $form_data['pwd'];
    if(empty($pwd))
    {
  
  $Message = "Empty";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }

    $Emaild = $form_data['Emaild'];
    if(empty($Emaild))
    {
  
  $Message = "Emailid Empty";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }


    
    $Employeeid = $form_data['Employeeid'];
   
    $Contact = $form_data['ExitContactno'];
    $Authorisedtype = $form_data['EmployeeType'];
    $Department = $form_data['Department'];
    $ExitDesignation = $form_data['ExitDesignation'];
    $username = $form_data['username'];


       $GetChapter2 = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid' ";
       $result_Chapter = $conn->query($GetChapter2 );
       if(mysqli_num_rows($result_Chapter) > 0) { 
   
   
       while($row = mysqli_fetch_array($result_Chapter)) {  
        
         $Firstname = $row['Firstname'];
         $Lastname = $row['Lastname'];
         $Emaild = $row['Emaild'];
         $Employeeid = $row['Employeeid'];
        
         } 
       }
   


    if (mysqli_connect_errno()){
      $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
   
    }
  
    $resultExists = "SELECT * FROM indsys1000useradmin WHERE Clientid ='$Clientid' AND Department='$Department' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
  
   
   
   if(mysqli_fetch_row($resultExists01))
    {
    
      $Message ="Exists";
      
   
    }
  
    else
    {
      
      $sqlsave = "INSERT IGNORE INTO indsys1000useradmin (Clientid,Userid,Username,Emailid,Contactno,Authorizedtype,Userpassword,Memberactive,Userinfo,UserType,Department,Designation) 
      VALUES ('$Clientid','$Employeeid','$Firstname $Lastname $username','$Emaild','$Contact','$Authorisedtype','$pwd','Active','','','$Department','$ExitDesignation')";
      $resultsave = mysqli_query($conn,$sqlsave);
      

      
      $Message ="Data Saved";
   
   }


  $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
  
  
   
       
  }


  /////////////////////////////////////////////

  if($MethodGet == 'FETCH')
  {
     $GetState = "SELECT * FROM indsys1000useradmin where Memberactive ='Active'   ORDER BY Userid";
     $result_Region = $conn->query($GetState);
   
     if(mysqli_num_rows($result_Region) > 0) { 
     while($row = mysqli_fetch_array($result_Region)) {  
       $data01[] = $row;
       } 
     }        
     header('Content-Type: application/json');
     echo json_encode($data01);
     return;
   }
 
  
/////////////////////////////////////////////



   if($MethodGet == 'FetchEmployee')
{

    try
    { 
  

      $Userid =$form_data['Userid'];
     
    $GetChapter = "SELECT * FROM indsys1000useradmin where Userid ='$Userid' ";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Userid =$row['Userid'];
      $Username =$row['Username'];
      $Emailid = $row['Emailid'];
      $Contactno =$row['Contactno'];
   
      $Authorizedtype =$row['Authorizedtype'];
      $Userpassword = $row['Userpassword'];
      $Contactno =$row['Contactno'];
      $Memberactive = $row['Memberactive'];
      $Department = $row['Department'];
      $Designation =$row['Designation'];
     
     
      } 
    }


 
    
    $Display=array(
      'Userid'=>  $Userid,
      'Username'=> $Username,
      'Emailid'=>  $Emailid,
      'Contactno'=> $Contactno,     
      'Authorizedtype'=> $Authorizedtype,
      'Userpassword'=>  $Userpassword,
      'Contactno'=> $Contactno,
      'Contactno'=>  $Contactno,
      'Memberactive'=>  $Memberactive,
      'Department'=> $Department,
      'Designation'=> $Designation,
      
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
 return;
}
catch(Exception $e)
{

}
} 



/////////////////////////////////////////////


if($MethodGet == 'UpdateEmp')
{
  

try
{
    
    $Userid =$form_data['Userid'];
    $Username =$form_data['Username'];
    $Emailid =$form_data['Emailid'];
   
    $Authorizedtype =$form_data['Authorizedtype'];
    $Userpassword =$form_data['Userpassword'];
    $Contactno =$form_data['Contactno'];
    $Memberactive =$form_data['Memberactive'];
    $Department =$form_data['Department'];
    $Designation =$form_data['Designation'];
    


  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "Update indsys1000useradmin set 
  
  Username ='$Username',
  Emailid='$Emailid',
  Contactno ='$Contactno',
  Authorizedtype ='$Authorizedtype',
  Userpassword='$Userpassword',
  
  Memberactive ='$Memberactive',
  Department='$Department',
  Designation='$Designation',
  Userinfo='$Userinfo',
  UserType='$UserType'

    
     WHERE Userid = '$Userid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Updated";



 


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
return;
}
catch(Exception $e)
{

}
 
     
}



?>



>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
