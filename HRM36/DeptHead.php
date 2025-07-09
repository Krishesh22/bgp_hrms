<?php 
include '../config.php';

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
      $Sessionid = $_SESSION["SESSIONID"];

      $_SESSION["Tittle"] ="Department Head Details";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
    $form_data= json_decode( json_encode($form_data), true);

$MethodGet = $form_data['Method'];


if($MethodGet == 'Deptnew')
{
   $GetRegion = "SELECT * FROM indsys1003departmentmaster WHERE Clientid = '$Clientid'  ORDER BY Department";
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
   $GetRegion = "SELECT * FROM vwdepartmenthead WHERE Clientid = '$Clientid'  ORDER BY Department";
    $result_Region = $conn->query($GetRegion);
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;  
      } 
    }

    
        header('Content-Type: application/json');
    echo json_encode($data01);
 
 
 
}
if($MethodGet == 'Change')
{
    $DeptHead= $form_data['DeptHead'];
   $GetRegion = "SELECT * FROM indsys1017employeemaster WHERE Clientid = '$Clientid' AND Department ='$DeptHead'  AND EmpActive='Active' ORDER BY Employeeid";
    $result_Region = $conn->query($GetRegion);
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;  
      } 
    }
   header('Content-Type: application/json');
    echo json_encode($data01);


 
 
 
}
if($MethodGet == 'GETCATEGORY')
{
   
   $GetRegion = "SELECT * FROM indsys1017employeemaster WHERE Clientid = '$Clientid' AND Type_Of_Posistion ='Category 1'  AND EmpActive='Active' ORDER BY Employeeid";
    $result_Region = $conn->query($GetRegion);
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;  
      } 
    }
   header('Content-Type: application/json');
    echo json_encode($data01);


 
 
 
}

if($MethodGet == 'EMPLOYEE')
{

    try
    { 
  

      $DeptHead =$form_data['DeptHead'];


      $GetDeptEmp = "SELECT * FROM indsys1017departmentheaddetail where Clientid ='$Clientid' and Department = '$DeptHead'  ORDER BY Employeeid";
      $result_Chapter = $conn->query($GetDeptEmp );
      if(mysqli_num_rows($result_Chapter) > 0) { 
          while($row = mysqli_fetch_array($result_Chapter)) {  
              $Employeeid =$row['Employeeid'];
            
             
               
        } 
      }


      $GetDeptEmpname = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
      $result_Chaptername = $conn->query($GetDeptEmpname );
      if(mysqli_num_rows($result_Chapter) > 0) { 
          while($row = mysqli_fetch_array($result_Chaptername)) {  
              $Fullname =$row['Fullname'];
         
             
               
        } 
      }




    $Display=array(
        
        'Employeeid'=>  $Employeeid,
        'Fullname' =>$Fullname,
   

       
  );
   
  $str = json_encode($Display);
  echo trim($str, '"');
 }
 catch(Exception $e)
 {
 
 }
   
  }




  if ($MethodGet == 'SaveDeptHead')
  {
  
    $Employeeid = $form_data['Employeeid'];
  
    $DeptHead = $form_data['DeptHead'];
 
  
  
    if (empty($Employeeid))
    {
  
        $Message = "Employeeid";
  
        $Display = array(
            'Message' => $Message
        );
  
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    if (empty($DeptHead))
    {
  
        $Message = "DeptHead";
  
        $Display = array(
            'Message' => $Message
        );
  
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
  
  
    $resultExists = "SELECT Employeeid FROM indsys1017departmentheaddetail WHERE Department = '$DeptHead' AND Clientid = '$Clientid' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
  
    if (mysqli_fetch_row($resultExists01))
    {

        $resultExistsss = "Update indsys1017departmentheaddetail set 
        Employeeid ='$Employeeid',
     
        Addormodifydatetime ='$date',
        Userid ='$user_id'
    WHERE Department = '$DeptHead' AND Clientid ='$Clientid'  ";
        $resultExists0New = $conn->query($resultExistsss);
        $Message = "Update";
  
    }
  
    else
    {
        $sqlsave = "INSERT IGNORE INTO indsys1017departmentheaddetail (Clientid,Employeeid,
    Department,Userid,Addormodifydatetime)
     VALUES ('$Clientid','$Employeeid','$DeptHead','$user_id','$date')";


        $resultsave = mysqli_query($conn, $sqlsave);
  
        $Message = "Saved";
    }
  
  
  
    $Display = array(
       
        'Message' => $Message
    );
  
    $str = json_encode($Display);
    echo trim($str, '"');
  
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