<?php
include '../config.php';

session_start();
 $user_id = $_SESSION["Userid"];
     $username = $_SESSION["Username"];
     $usermail=$_SESSION["Mailid"];
     $Clientid =$_SESSION["Clientid"];
  
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




 if($MethodGet == 'OPENATT')
{

   
    
            $FromDate =$form_data['FromDate'];
            $ToDate =$form_data['ToDate'];
        
           
        $GetATT = "SELECT * FROM indsys1029empdailyattendancemaster where Attendencedate>='$FromDate' AND Attendencedate<='$ToDate' AND Clientid='$Clientid'";
        //echo "test $GetATT";exit;
        
        $result_ATT = $conn->query($GetATT);
        if(mysqli_num_rows($result_ATT) > 0) { 
           
            $resultOpenatt = "Update indsys1029empdailyattendancemaster set 
            Empattendencestatus ='Open' WHERE Attendencedate>='$FromDate' AND Attendencedate<='$ToDate' AND Clientid='$Clientid'  ";
            $resultOpenattsave = mysqli_query($conn, $resultOpenatt);
            $Message = "Success";
    

            } 
            //  if( $resultOpenattsave===TRUE)
            //  {
            //   echo "yes";

            //  }
            //  else{
            //   echo"no";
            //  }
            $Display = ["Message" => $Message];

        $str = json_encode($Display);
        echo trim($str, '"');      
                    
        } 
 



?>