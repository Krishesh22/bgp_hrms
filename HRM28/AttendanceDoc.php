<<<<<<< HEAD
<?php 
include '../config.php';


error_reporting(0);
session_start();

$user_id = $_SESSION["Userid"];
$Clientid =$_SESSION["Clientid"];      
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Attendencedate = $_POST['Attendencedate'];

$Description = $_POST['Description'];
$Status = $_POST['Status'];
// $Document = $_POST['Document'];

      

    
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];



/////////////////////////////////////////////



if($MethodGet == 'Getall')
{


try
{

    $Attendencedate =$form_data['Attendencedate'];
   
   //echo "$Attendencedate test";
    $data01 =[];

   
    $GetState = "SELECT * FROM indsys1032empdailyattendancedoc    ORDER BY Attendencedate";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
     
   
      } 
    }        
 

    header('Content-Type: application/json');
    echo json_encode($data01);
}
catch(Exception $e)
{

}
 
     
}

/////////////////////////////////////////////

  

  if($MethodGet == 'FETCH')
  {
     $GetState = "SELECT * FROM indsys1032empdailyattendancedoc  ORDER BY Userid";
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
  
///////////////////////////////////////////////////////////



if($MethodGet == 'FetchDetail')
{

    try
    { 
  

      $Attendencedate =$form_data['Attendencedate'];

     // echo "$Attendencedate test";
    $GetChapter = "SELECT * FROM indsys1032empdailyattendancedoc where Clientid ='$Clientid' and Attendencedate = '$Attendencedate' ORDER BY Attendencedate";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Document =$row['Document'];
      $Description = $row['Description'];
      $Status =$row['Status'];
   
     
      } 
    }


 
    
    $Display=array(
      'Document'=> $Document,
      'Description'=>  $Description,
      'Status'=> $Status,
   
  
  
  );
 
  // if($Status=="Open")
  // {
  //   $src="/assets/icons/edit.png";
  // }

   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }


 //////////////////////////////////////////


 if($MethodGet == 'ATTDocFetch')
{


try
{

    $Fromdate =$form_data['Fromdate'];
    $Todate =$form_data['Todate'];
    $Status =$form_data['Status'];
   
   
    $GetState = "Select *
    FROM indsys1032empdailyattendancedoc  
   WHERE  Attendencedate>='$Fromdate' AND   Attendencedate <='$Todate' AND Status='$Status'";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 

    $mytbl["Test"]=$data01;


 

 $Display=array('data01' =>   $mytbl["Test"]);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}


 //////////////////////////////////////////


 if($MethodGet == 'FetchAttDetails')
{


try
{

    $Fromdate =$form_data['Fromdate'];
    $Todate =$form_data['Todate'];
   
   
    $GetState = "Select *
    FROM indsys1029empdailyattendancemaster  
   WHERE  Attendencedate>='$Fromdate' AND   Attendencedate <='$Todate' ";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 

    $mytbl["Test"]=$data01;


 

 $Display=array('data01' =>   $mytbl["Test"]);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}

/////////////////////////////////////

if ($MethodGet == 'UpdateAtt')
{
  
  $Attendencedate = $form_data['Attendencedate'];

  $Description = $form_data['Description'];
  $Status = $form_data['Status'];

  

 

  $resultExists = "SELECT * FROM indsys1032empdailyattendancedoc WHERE Attendencedate = '$Attendencedate' AND Clientid = '$Clientid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {

      $resultExistsss = "Update indsys1032empdailyattendancedoc set 
      Description ='$Description',
      Addormodifydatetime ='$date',
      Status ='$Status',
      Userid ='$user_id'
     
  WHERE Attendencedate = '$Attendencedate' 

  AND Clientid ='$Clientid'  ";
      $resultExists0New = $conn->query($resultExistsss);
      $Message = "Update";

  }

  else
  {
    $sqlsave = "INSERT IGNORE INTO indsys1032empdailyattendancedoc(`Clientid`, `Userid`, `Attendencedate`, `Description`, `Document`, `Status`, `Addormodifydatetime`)
    VALUES ('$Clientid','$user_id','$Attendencedate','$Description','$Document','$Status','$date')";
       $resultsave = mysqli_query($conn, $sqlsave);

      $Message = "Update";
  }



  $Display = array(
     
      'Message' => $Message
  );

  $str = json_encode($Display);
  echo trim($str, '"');

}



?>



=======
<?php 
include '../config.php';


error_reporting(0);
session_start();

$user_id = $_SESSION["Userid"];
$Clientid =$_SESSION["Clientid"];      
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Attendencedate = $_POST['Attendencedate'];

$Description = $_POST['Description'];
$Status = $_POST['Status'];
// $Document = $_POST['Document'];

      

    
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];



/////////////////////////////////////////////



if($MethodGet == 'Getall')
{


try
{

    $Attendencedate =$form_data['Attendencedate'];
   
   //echo "$Attendencedate test";
    $data01 =[];

   
    $GetState = "SELECT * FROM indsys1032empdailyattendancedoc    ORDER BY Attendencedate";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
     
   
      } 
    }        
 

    header('Content-Type: application/json');
    echo json_encode($data01);
}
catch(Exception $e)
{

}
 
     
}

/////////////////////////////////////////////

  

  if($MethodGet == 'FETCH')
  {
     $GetState = "SELECT * FROM indsys1032empdailyattendancedoc  ORDER BY Userid";
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
  
///////////////////////////////////////////////////////////



if($MethodGet == 'FetchDetail')
{

    try
    { 
  

      $Attendencedate =$form_data['Attendencedate'];

     // echo "$Attendencedate test";
    $GetChapter = "SELECT * FROM indsys1032empdailyattendancedoc where Clientid ='$Clientid' and Attendencedate = '$Attendencedate' ORDER BY Attendencedate";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Document =$row['Document'];
      $Description = $row['Description'];
      $Status =$row['Status'];
   
     
      } 
    }


 
    
    $Display=array(
      'Document'=> $Document,
      'Description'=>  $Description,
      'Status'=> $Status,
   
  
  
  );
 
  // if($Status=="Open")
  // {
  //   $src="/assets/icons/edit.png";
  // }

   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }


 //////////////////////////////////////////


 if($MethodGet == 'ATTDocFetch')
{


try
{

    $Fromdate =$form_data['Fromdate'];
    $Todate =$form_data['Todate'];
    $Status =$form_data['Status'];
   
   
    $GetState = "Select *
    FROM indsys1032empdailyattendancedoc  
   WHERE  Attendencedate>='$Fromdate' AND   Attendencedate <='$Todate' AND Status='$Status'";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 

    $mytbl["Test"]=$data01;


 

 $Display=array('data01' =>   $mytbl["Test"]);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}


 //////////////////////////////////////////


 if($MethodGet == 'FetchAttDetails')
{


try
{

    $Fromdate =$form_data['Fromdate'];
    $Todate =$form_data['Todate'];
   
   
    $GetState = "Select *
    FROM indsys1029empdailyattendancemaster  
   WHERE  Attendencedate>='$Fromdate' AND   Attendencedate <='$Todate' ";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 

    $mytbl["Test"]=$data01;


 

 $Display=array('data01' =>   $mytbl["Test"]);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}

/////////////////////////////////////

if ($MethodGet == 'UpdateAtt')
{
  
  $Attendencedate = $form_data['Attendencedate'];

  $Description = $form_data['Description'];
  $Status = $form_data['Status'];

  

 

  $resultExists = "SELECT * FROM indsys1032empdailyattendancedoc WHERE Attendencedate = '$Attendencedate' AND Clientid = '$Clientid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {

      $resultExistsss = "Update indsys1032empdailyattendancedoc set 
      Description ='$Description',
      Addormodifydatetime ='$date',
      Status ='$Status',
      Userid ='$user_id'
     
  WHERE Attendencedate = '$Attendencedate' 

  AND Clientid ='$Clientid'  ";
      $resultExists0New = $conn->query($resultExistsss);
      $Message = "Update";

  }

  else
  {
    $sqlsave = "INSERT IGNORE INTO indsys1032empdailyattendancedoc(`Clientid`, `Userid`, `Attendencedate`, `Description`, `Document`, `Status`, `Addormodifydatetime`)
    VALUES ('$Clientid','$user_id','$Attendencedate','$Description','$Document','$Status','$date')";
       $resultsave = mysqli_query($conn, $sqlsave);

      $Message = "Update";
  }



  $Display = array(
     
      'Message' => $Message
  );

  $str = json_encode($Display);
  echo trim($str, '"');

}



?>



>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
