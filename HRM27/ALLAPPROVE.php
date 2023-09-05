<?php 
include '../config.php';

error_reporting(0);
session_start();
  $user_id = "1001";
     
      $Clientid =1;   
      $_SESSION["Tittle"] ="Candidate";
$Message ='';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];


 if($MethodGet == 'POSTCANDIDATEID')
 {
   $data01 =     $_SESSION["CandidateidNew"];
   // if(isset($_GET['Candidateid'])){
   //    $data01 =mysqli_real_escape_string($conn, $_GET['Candidateid']);
   //    }
  
     header('Content-Type: application/json');
     echo json_encode($data01);
  }
  if($MethodGet == 'POSTurl')
  {
     
     $data01 = "$domain/HRM09/TYPage.php";
      header('Content-Type: application/json');
      echo json_encode($data01);
   }
 ?>