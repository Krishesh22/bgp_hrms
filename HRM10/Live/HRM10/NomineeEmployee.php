<<<<<<< HEAD
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
$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];
 //$MethodGet="NomineeDelete";
 if($MethodGet == 'EMPNOMINEENEXT')
{


try
{

    $Employeeid =$form_data['Employeeid'];
     $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwemployeenomineenextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new))
        {

            $GetChapter = "SELECT * FROM vwemployeenomineenextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
            $result_Chapter = $conn->query($GetChapter);
            if (mysqli_num_rows($result_Chapter) > 0)
            {
                while ($row = mysqli_fetch_array($result_Chapter))
                {
                    $Sno = $row['Nextno'];

                }
            }

        }
        else
        {
            $Sno = 1;
        }





 

 $Display=array('Sno' => $Sno);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}


if($MethodGet == 'EMPNOMINEE')
{


try
{

    $Employeeid =$form_data['Employeeid'];
   
   
    
    $data01 =[];
   
    $GetState = "SELECT * FROM vwempnominee  where Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
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

////////////////////////////
if($MethodGet == 'FetchEmpNominee')
{

    try
    { 
    
  

      $Employeeid =$form_data['Employeeid'];
      $NomineeSno =$form_data['NomineeSno'];
      $_SESSION["Employeeid"] = $Employeeid;
    $GetChapter = "SELECT * FROM indsys1019employeenomineeinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$NomineeSno' ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $NomineeName =$row['NomineeName'];
      $NomineeRelationship =$row['NomineeRelationship'];
      $NomineeAge = $row['NomineeAge'];
      $RelationshipContactno =$row['RelationshipContactno'];
      $Guardianname =$row['Guardianname'];
      $PercentageofShare = $row['PercentageofShare'];
      $NomineeDateOfBirth =$row['NomineeDateOfBirth'];
      $NomineeAddress =$row['NomineeAddress'];
      $NomineeAge =$row['NomineeAge'];

     
    
     
     
     
      } 
    }


 
    
    $Display=array(
      'NomineeName'=>  $NomineeName,
      'NomineeRelationship'=> $NomineeRelationship,
      'NomineeAge'=>  $NomineeAge,
      'RelationshipContactno'=> $RelationshipContactno,
      'Guardianname'=>  $Guardianname,
      'PercentageofShare'=> $PercentageofShare,
      'NomineeDateOfBirth'=>  $NomineeDateOfBirth,
      'NomineeAddress'=> $NomineeAddress,
      'NomineeAge'=>$NomineeAge
     
      
     
     
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
 return;
}
catch(Exception $e)
{

}
}


if($MethodGet == 'FetchEmpNominee2')
{

    try
    { 
    
  
      $Employeeid =$form_data['Employeeid'];
     // $NomineeSno =$form_data['NomineeSno'];
      $_SESSION["Employeeid"] = $Employeeid;
    $GetChapter = "SELECT * FROM indsys1019employeenomineeinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid' ORDER BY Employeeid LIMIT 1";
  //  echo "sdfsfs $GetChapter sdsfsdf";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $NomineeName =$row['NomineeName'];
      $NomineeRelationship =$row['NomineeRelationship'];
      $NomineeAge = $row['NomineeAge'];
      $RelationshipContactno =$row['RelationshipContactno'];
      $Guardianname =$row['Guardianname'];
      $PercentageofShare = $row['PercentageofShare'];
      $NomineeDateOfBirth =$row['NomineeDateOfBirth'];
      $NomineeAddress =$row['NomineeAddress'];
      $NomineeAge =$row['NomineeAge'];

     
    
     
     
     
      } 
    }


 
    
    $Display=array(
      'NomineeName'=>  $NomineeName,
      'NomineeRelationship'=> $NomineeRelationship
      
     
      
     
     
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
 return;
}
catch(Exception $e)
{

}
}

//////////////////////////////////////////////////////
if($MethodGet == 'EmpNomineeUpdate')
{


try
{
    
    $Employeeid =$form_data['Employeeid'];
    $NomineeSno =$form_data['NomineeSno'];
    $NomineeName =$form_data['NomineeName'];
    $NomineeRelationship=$form_data['NomineeRelationship'];
    $NomineeAge =$form_data['NomineeAge'];
    $RelationshipContactno =$form_data['RelationshipContactno'];
    $Guardianname=$form_data['Guardianname'];
    $PercentageofShare =$form_data['PercentageofShare'];
    $NomineeDateOfBirth =$form_data['NomineeDateOfBirth'];
    $NomineeAddress=$form_data['NomineeAddress'];
   
    if(empty($NomineeDateOfBirth))
    {
      $NomineeDateOfBirth ="0000:00:00";
    }

    if (empty($NomineeName))
    {
  
        $Message = "NomineeName";
  
        $Display = array(
            'Message' => $Message
        );
  
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    
  if (empty($NomineeRelationship))
  {

      $Message = "NomineeRelationship";

      $Display = array(
          'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
  }
  
  if (empty($NomineeAddress))
  {

      $Message = "NomineeAddress";

      $Display = array(
          'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
  }
  
  if (empty($PercentageofShare))
  {

      $Message = "PercentageofShare";

      $Display = array(
          'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
  }
  
  






  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }

  $resultExists = "SELECT Employeeid FROM indsys1019employeenomineeinformation WHERE Employeeid = '$Employeeid' AND Sno='$NomineeSno'AND Clientid = '$Clientid'  LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {
  $resultExists = "Update indsys1019employeenomineeinformation set 
  NomineeName ='$NomineeName',
  NomineeRelationship ='$NomineeRelationship',
  NomineeAge ='$NomineeAge',
  RelationshipContactno ='$RelationshipContactno',
  Guardianname ='$Guardianname',
  PercentageofShare ='$PercentageofShare',
  NomineeDateOfBirth ='$NomineeDateOfBirth',
  NomineeAddress ='$NomineeAddress', 
  Addormodifydatetime ='$date',
  Userid ='$user_id'    
     WHERE Employeeid = '$Employeeid' and Sno ='$NomineeSno' AND Clientid = '$Clientid'";
  $resultExists01 = $conn->query($resultExists);


  $Message ="Update";



  }
  else
  {
        $sqlsave = "INSERT IGNORE INTO indsys1019employeenomineeinformation (Clientid,Employeeid, Sno,NomineeName,NomineeRelationship,NomineeAge,RelationshipContactno,Guardianname,PercentageofShare,NomineeDateOfBirth,NomineeAddress,Addormodifydatetime,Userid)
        VALUES ('$Clientid','$Employeeid','$NomineeSno','$NomineeName','$NomineeRelationship','$NomineeAge','$RelationshipContactno','$Guardianname','$PercentageofShare','$NomineeDateOfBirth','$NomineeAddress','$date','$user_id')";
           $resultsave = mysqli_query($conn, $sqlsave);

           

        // $resultExists01 = $conn->query($resultExists);
        $Message ="Exists";
      
  }


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
return;
}
catch(Exception $e)
{

}
 
     
}
////////////////
if($MethodGet == 'NomineeDelete')
{




  // $Employeeid ="172";
  // $Sno ="2";
 


  $Employeeid =$form_data['Employeeid'];
  $Sno =$form_data['NomineeSno'];
 
  $resultExists = "DELETE FROM indsys1019employeenomineeinformation WHERE Employeeid = '$Employeeid' and Sno='$Sno'  AND Clientid = '$Clientid'";
  $resultExists01 = $conn->query($resultExists);
 
    
    $Message ="Delete";
    echo "Delete";
 
 

 





 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}
/////////////////////////////////////////////
if($MethodGet == 'GetNomineeAge')
{


try
{

    $Dob =$form_data['Dob'];
    $dateOfBirth = $Dob;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    
 
  $Age =$diff->format('%y');
 

 $Display=array('Age' =>$Age);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
////////////////////////////

=======
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
$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];
 //$MethodGet="NomineeDelete";
 if($MethodGet == 'EMPNOMINEENEXT')
{


try
{

    $Employeeid =$form_data['Employeeid'];
     $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwemployeenomineenextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new))
        {

            $GetChapter = "SELECT * FROM vwemployeenomineenextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
            $result_Chapter = $conn->query($GetChapter);
            if (mysqli_num_rows($result_Chapter) > 0)
            {
                while ($row = mysqli_fetch_array($result_Chapter))
                {
                    $Sno = $row['Nextno'];

                }
            }

        }
        else
        {
            $Sno = 1;
        }





 

 $Display=array('Sno' => $Sno);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}


if($MethodGet == 'EMPNOMINEE')
{


try
{

    $Employeeid =$form_data['Employeeid'];
   
   
    
    $data01 =[];
   
    $GetState = "SELECT * FROM vwempnominee  where Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
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

////////////////////////////
if($MethodGet == 'FetchEmpNominee')
{

    try
    { 
    
  

      $Employeeid =$form_data['Employeeid'];
      $NomineeSno =$form_data['NomineeSno'];
      $_SESSION["Employeeid"] = $Employeeid;
    $GetChapter = "SELECT * FROM indsys1019employeenomineeinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$NomineeSno' ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $NomineeName =$row['NomineeName'];
      $NomineeRelationship =$row['NomineeRelationship'];
      $NomineeAge = $row['NomineeAge'];
      $RelationshipContactno =$row['RelationshipContactno'];
      $Guardianname =$row['Guardianname'];
      $PercentageofShare = $row['PercentageofShare'];
      $NomineeDateOfBirth =$row['NomineeDateOfBirth'];
      $NomineeAddress =$row['NomineeAddress'];
      $NomineeAge =$row['NomineeAge'];

     
    
     
     
     
      } 
    }


 
    
    $Display=array(
      'NomineeName'=>  $NomineeName,
      'NomineeRelationship'=> $NomineeRelationship,
      'NomineeAge'=>  $NomineeAge,
      'RelationshipContactno'=> $RelationshipContactno,
      'Guardianname'=>  $Guardianname,
      'PercentageofShare'=> $PercentageofShare,
      'NomineeDateOfBirth'=>  $NomineeDateOfBirth,
      'NomineeAddress'=> $NomineeAddress,
      'NomineeAge'=>$NomineeAge
     
      
     
     
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
 return;
}
catch(Exception $e)
{

}
}


if($MethodGet == 'FetchEmpNominee2')
{

    try
    { 
    
  
      $Employeeid =$form_data['Employeeid'];
     // $NomineeSno =$form_data['NomineeSno'];
      $_SESSION["Employeeid"] = $Employeeid;
    $GetChapter = "SELECT * FROM indsys1019employeenomineeinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid' ORDER BY Employeeid LIMIT 1";
  //  echo "sdfsfs $GetChapter sdsfsdf";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $NomineeName =$row['NomineeName'];
      $NomineeRelationship =$row['NomineeRelationship'];
      $NomineeAge = $row['NomineeAge'];
      $RelationshipContactno =$row['RelationshipContactno'];
      $Guardianname =$row['Guardianname'];
      $PercentageofShare = $row['PercentageofShare'];
      $NomineeDateOfBirth =$row['NomineeDateOfBirth'];
      $NomineeAddress =$row['NomineeAddress'];
      $NomineeAge =$row['NomineeAge'];

     
    
     
     
     
      } 
    }


 
    
    $Display=array(
      'NomineeName'=>  $NomineeName,
      'NomineeRelationship'=> $NomineeRelationship
      
     
      
     
     
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
 return;
}
catch(Exception $e)
{

}
}

//////////////////////////////////////////////////////
if($MethodGet == 'EmpNomineeUpdate')
{


try
{
    
    $Employeeid =$form_data['Employeeid'];
    $NomineeSno =$form_data['NomineeSno'];
    $NomineeName =$form_data['NomineeName'];
    $NomineeRelationship=$form_data['NomineeRelationship'];
    $NomineeAge =$form_data['NomineeAge'];
    $RelationshipContactno =$form_data['RelationshipContactno'];
    $Guardianname=$form_data['Guardianname'];
    $PercentageofShare =$form_data['PercentageofShare'];
    $NomineeDateOfBirth =$form_data['NomineeDateOfBirth'];
    $NomineeAddress=$form_data['NomineeAddress'];
   
    if(empty($NomineeDateOfBirth))
    {
      $NomineeDateOfBirth ="0000:00:00";
    }

    if (empty($NomineeName))
    {
  
        $Message = "NomineeName";
  
        $Display = array(
            'Message' => $Message
        );
  
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    
  if (empty($NomineeRelationship))
  {

      $Message = "NomineeRelationship";

      $Display = array(
          'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
  }
  
  if (empty($NomineeAddress))
  {

      $Message = "NomineeAddress";

      $Display = array(
          'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
  }
  
  if (empty($PercentageofShare))
  {

      $Message = "PercentageofShare";

      $Display = array(
          'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
  }
  
  






  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }

  $resultExists = "SELECT Employeeid FROM indsys1019employeenomineeinformation WHERE Employeeid = '$Employeeid' AND Sno='$NomineeSno'AND Clientid = '$Clientid'  LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {
  $resultExists = "Update indsys1019employeenomineeinformation set 
  NomineeName ='$NomineeName',
  NomineeRelationship ='$NomineeRelationship',
  NomineeAge ='$NomineeAge',
  RelationshipContactno ='$RelationshipContactno',
  Guardianname ='$Guardianname',
  PercentageofShare ='$PercentageofShare',
  NomineeDateOfBirth ='$NomineeDateOfBirth',
  NomineeAddress ='$NomineeAddress', 
  Addormodifydatetime ='$date',
  Userid ='$user_id'    
     WHERE Employeeid = '$Employeeid' and Sno ='$NomineeSno' AND Clientid = '$Clientid'";
  $resultExists01 = $conn->query($resultExists);


  $Message ="Update";



  }
  else
  {
        $sqlsave = "INSERT IGNORE INTO indsys1019employeenomineeinformation (Clientid,Employeeid, Sno,NomineeName,NomineeRelationship,NomineeAge,RelationshipContactno,Guardianname,PercentageofShare,NomineeDateOfBirth,NomineeAddress,Addormodifydatetime,Userid)
        VALUES ('$Clientid','$Employeeid','$NomineeSno','$NomineeName','$NomineeRelationship','$NomineeAge','$RelationshipContactno','$Guardianname','$PercentageofShare','$NomineeDateOfBirth','$NomineeAddress','$date','$user_id')";
           $resultsave = mysqli_query($conn, $sqlsave);

           

        // $resultExists01 = $conn->query($resultExists);
        $Message ="Exists";
      
  }


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
return;
}
catch(Exception $e)
{

}
 
     
}
////////////////
if($MethodGet == 'NomineeDelete')
{




  // $Employeeid ="172";
  // $Sno ="2";
 


  $Employeeid =$form_data['Employeeid'];
  $Sno =$form_data['NomineeSno'];
 
  $resultExists = "DELETE FROM indsys1019employeenomineeinformation WHERE Employeeid = '$Employeeid' and Sno='$Sno'  AND Clientid = '$Clientid'";
  $resultExists01 = $conn->query($resultExists);
 
    
    $Message ="Delete";
    echo "Delete";
 
 

 





 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}
/////////////////////////////////////////////
if($MethodGet == 'GetNomineeAge')
{


try
{

    $Dob =$form_data['Dob'];
    $dateOfBirth = $Dob;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    
 
  $Age =$diff->format('%y');
 

 $Display=array('Age' =>$Age);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
////////////////////////////

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
 ?>