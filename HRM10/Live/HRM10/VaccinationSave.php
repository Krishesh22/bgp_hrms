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
 if($MethodGet == 'EMPVACCINATIONNEXT')
{


try
{

    $Employeeid =$form_data['Employeeid'];
     $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwemployeevaccinationnextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new))
        {

            $GetChapter = "SELECT * FROM vwemployeevaccinationnextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
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


if($MethodGet == 'EMPVACCINATION')
{


try
{

    $Employeeid =$form_data['Employeeid'];
   
   
    
    $data01 =[];
   
    $GetState = "SELECT * FROM vwemployeevaccination where Employeeid = '$Employeeid'  ORDER BY Employeeid";
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
if($MethodGet == 'Fetchvaccination')
{

    try
    { 
    
  

      $Employeeid =$form_data['Employeeid'];
      $Vaccinatedsno =$form_data['Vaccinatedsno'];
      $_SESSION["Employeeid"] = $Employeeid;
    $GetChapter = "SELECT * FROM indsys1023employeevaccinationinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$Vaccinatedsno' ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $VaccinationView =$row['Vaccinationcertificate'];
      $Vaccinateddate =$row['Vaccinationdate'];
      $Covidvaccinated = $row['Vacinationtype'];
     
    
     
     
     
      } 
    }


 
    
    $Display=array(
      'VaccinationView'=>  $VaccinationView,
      'Vaccinateddate'=> $Vaccinateddate,
      'Covidvaccinated'=>  $Covidvaccinated
      
     
     
     
  
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
if($MethodGet == 'Vaccinationupdate')
{


try
{
    
    $Employeeid =$form_data['Employeeid'];
    $Vaccinateddate =$form_data['Vaccinateddate'];
    $Covidvaccinated =$form_data['Covidvaccinated'];
    $Vaccinatedsno=$form_data['Vaccinatedsno'];
    
   
   







  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }

  $resultExists = "SELECT Employeeid FROM indsys1023employeevaccinationinformation WHERE Employeeid = '$Employeeid' AND Sno='$Vaccinatedsno'AND Clientid = '$Clientid'  LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {
  $resultExists = "Update indsys1023employeevaccinationinformation set 

  Vacinationtype ='$Covidvaccinated',
  Vaccinationdate ='$Vaccinateddate',
 
  Addormodifydatetime ='$date',
  Userid ='$user_id'

    
     WHERE Employeeid = '$Employeeid' and Sno ='$Vaccinatedsno' ";
  $resultExists01 = $conn->query($resultExists);


  $resultExists05 = "Update indsys1017employeemaster set 
  Covidvacinnated ='Yes'


    
     WHERE Employeeid = ' $Employeeid' ";
  $resultExists01 = $conn->query($resultExists05);
  $Message ="Update";



  }
  else
  {
        $sqlsave = "INSERT IGNORE INTO indsys1023employeevaccinationinformation (Clientid,Employeeid, Sno,Vaccinationdate,Vacinationtype,Vaccinationcertificate,Userid,Addormodifydatetime)
        VALUES ('$Clientid','$Employeeid','$Vaccinatedsno','$Vaccinateddate','$Covidvaccinated','$Logofilepath','$user_id','$date')";
           $resultsave = mysqli_query($conn, $sqlsave);

           
  $resultExists05 = "Update indsys1017employeemaster set 
  Covidvacinnated ='Yes'    
     WHERE Employeeid = ' $Employeeid' ";
  $resultExists01 = $conn->query($resultExists05);
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
if($MethodGet == 'VaccinationDelete')
{




  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }


  $Employeeid =$form_data['Employeeid'];
  $Sno =$form_data['Vaccinatedsno'];
   $GetChapter = "SELECT * FROM indsys1023employeevaccinationinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$Sno' ORDER BY Employeeid";
   $result_Chapter = $conn->query($GetChapter );
   if(mysqli_num_rows($result_Chapter) > 0) { 


   while($row = mysqli_fetch_array($result_Chapter)) {  
  
     $Documentpath = $row['Vaccinationcertificate'];
  
    
    
    
     } 
   }
  $resultExists = "DELETE FROM indsys1023employeevaccinationinformation WHERE Employeeid = '$Employeeid' and Sno='$Sno' ";
  $resultExists01 = $conn->query($resultExists);
  if(empty($Documentpath))
  {

  }
  else
  {
  unlink($Documentpath);
  }
    
    $Message ="Delete";
 
 

 





 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}
/////////////////////////////////////////////

 ?>