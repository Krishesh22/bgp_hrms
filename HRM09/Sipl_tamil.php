<?php 
include '../config.php';
require_once ('class.phpmailer.php');
include ("class.smtp.php");
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

 
 if($MethodGet == 'APPOINTMENTTAMIL')
{


try
{

    $Candidateid =$form_data['Candidateid'];
   
   

 

       

            $GetChapter = "SELECT * FROM indsys1013candidatemaster WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid'  ";
            $result_Chapter = $conn->query($GetChapter);
            if (mysqli_num_rows($result_Chapter) > 0)
            {
                while ($row = mysqli_fetch_array($result_Chapter))
                {
                    $Title = $row['Title'];
                    $Firstname = $row['Firstname'];
                    $Lastname = $row['Lastname'];
                    $Fullname = "$Title $Firstname $Lastname";
                    $Candidateimage = $row['Candidateimage'];
                    $DOB = $row['DOB'];
                    $Age = $row['Age'];
                    $Department = $row['Department'];
                    $Date_Of_Joing = $row['Date_Of_Joing'];
                    $HighestQualification = $row['HighestQualification'];
                    $ReportingTo = $row['ReportingTo'];
                    $Bussiness = $row['Bussiness'];
                    $Designationproposed = $row['Designationproposed'];
                    $Gender = $row['Gender'];
                    $Marital_status = $row['Marital_status'];
                    $CommitedCTC = $row['CommitedCTC'];
                    $ApplicationDate =$row['ApplicationDate'];
                    $Address =$row['Address'];
                    $ApplicationDate2 = date('d-M-Y', strtotime($row['ApplicationDate']));

                    $date = date("Y-m-d H:i:s" );
                   $Appointmentsentdate =  date('d-M-Y', strtotime($date));
                   $Date_Of_Joing2 = date('d-M-Y', strtotime($Date_Of_Joing));


                }
            }

       





 

 $Display=array(
    'Title' => $Title,
    'Firstname' => $Firstname,
    'Lastname' => $Lastname,
    'Fullname' => $Fullname,
    'Candidateimage' => $Candidateimage,
    'DOB' => $DOB,
    'Age' => $Age,
    'Department' => $Department,
    'Date_Of_Joing' => $Date_Of_Joing,
    'HighestQualification' => $HighestQualification,
    'ReportingTo' => $ReportingTo,
    'Bussiness' => $Bussiness,
    'Designationproposed' => $Designationproposed,
    'Gender' => $Gender,
    'Marital_status' => $Marital_status,
    'CommitedCTC' => $CommitedCTC,
    'ApplicationDate' =>$ApplicationDate,
    'Address' =>$Address,
    'ApplicationDate2' =>$ApplicationDate2,
    'Appointmentsentdate' =>$Appointmentsentdate,
    'Date_Of_Joing2' =>$Date_Of_Joing2,
   );

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}


?>