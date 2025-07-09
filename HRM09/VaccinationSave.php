<?php 
include '../config.php';
require_once ('class.phpmailer.php');
include ("class.smtp.php");
require_once('../Tcpdf/examples/tcpdf_include.php');
session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];   
      $_SESSION["Tittle"] ="Candidate";
$Message ='';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];
 if($MethodGet == 'CANVACCINATIONNEXT')
{


try
{

    $Candidateid =$form_data['Candidateid'];
     $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwcandidatevaccinationnextno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new))
        {

            $GetChapter = "SELECT * FROM vwcandidatevaccinationnextno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid'  ";
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


if($MethodGet == 'CANVACCINATION')
{


try
{

    $Candidateid =$form_data['Candidateid'];
   
   
    
    $data01 =[];
   
    $GetState = "SELECT * FROM vwcandidatevaccination where Candidateid = '$Candidateid' AND Clientid ='$Clientid'  ORDER BY Candidateid";
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
    
  

      $Candidateid =$form_data['Candidateid'];
      $Vaccinatedsno =$form_data['Vaccinatedsno'];
      $_SESSION["Candidateid"] = $Candidateid;
    $GetChapter = "SELECT * FROM indsys1017candidatevaccinationinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and Sno='$Vaccinatedsno' ORDER BY Candidateid";
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
    
    $Candidateid =$form_data['Candidateid'];
    $Vaccinateddate =$form_data['Vaccinateddate'];
    $Covidvaccinated =$form_data['Covidvaccinated'];
    $Vaccinatedsno=$form_data['Vaccinatedsno'];
    
   
   







  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }

  $resultExists = "SELECT Candidateid FROM indsys1017candidatevaccinationinformation WHERE Candidateid = '$Candidateid' AND Sno='$Vaccinatedsno'AND Clientid = '$Clientid'  LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {
  $resultExists = "Update indsys1017candidatevaccinationinformation set 

  Vacinationtype ='$Covidvaccinated',
  Vaccinationdate ='$Vaccinateddate',
 
  Addormodifydatetime ='$date',
  Userid ='$user_id'

    
     WHERE Candidateid = '$Candidateid' and Sno ='$Vaccinatedsno' AND Clientid='$Clientid' ";
  $resultExists01 = $conn->query($resultExists);


  $resultExists05 = "Update indsys1013candidatemaster set 
  Covidvacinnated ='Yes'    
     WHERE Candidateid = ' $Candidateid' And Clientid ='$Clientid' ";
  $resultExists01 = $conn->query($resultExists05);
  $Message ="Update";



  }
  else
  {
        $sqlsave = "INSERT IGNORE INTO indsys1017candidatevaccinationinformation (Clientid,Candidateid, Sno,Vaccinationdate,Vacinationtype,Vaccinationcertificate,Userid,Addormodifydatetime)
        VALUES ('$Clientid','$Candidateid','$Vaccinatedsno','$Vaccinateddate','$Covidvaccinated','$Logofilepath','$user_id','$date')";
           $resultsave = mysqli_query($conn, $sqlsave);

           
  $resultExists05 = "Update indsys1013candidatemaster set 
  Covidvacinnated ='Yes'    
     WHERE Candidateid = ' $Candidateid' AND Clientid ='$Clientid' ";
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


  $Candidateid =$form_data['Candidateid'];
  $Sno =$form_data['Vaccinatedsno'];
   $GetChapter = "SELECT * FROM indsys1017candidatevaccinationinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and Sno='$Sno' ORDER BY Candidateid";
   $result_Chapter = $conn->query($GetChapter );
   if(mysqli_num_rows($result_Chapter) > 0) { 


   while($row = mysqli_fetch_array($result_Chapter)) {  
  
     $Documentpath = $row['Vaccinationcertificate'];
  
    
    
    
     } 
   }
  $resultExists = "DELETE FROM indsys1017candidatevaccinationinformation WHERE Candidateid = '$Candidateid' and Sno='$Sno' AND Clientid='$Clientid' ";
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