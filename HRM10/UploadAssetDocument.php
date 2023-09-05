<?php
include('../config.php');
error_reporting(0);

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];

      $Clientid =$_SESSION["Clientid"];

   


date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );

$Employeeid = $_POST['Empid'];
$Assettype =$_POST['Assettype'];
$assetnotes =$_POST['assetnotes'];

if(empty($assetnotes) || $assetnotes==null || $assetnotes =='')
{
    $Display = array('status' =>"Note");
    echo json_encode($Display);
    return;
}


if (isset($_FILES['assuploadfile']) && !empty($_FILES['assuploadfile'])) {

$directory3 = "../$Clientid/";
$directory2 = "../$Clientid/AssetDOC/";
$directory = "../$Clientid/AssetDOC/$Employeeid/";

if(!is_dir($directory3)){mkdir($directory3, 0777);}
if(!is_dir($directory2)){mkdir($directory2, 0777);}
if(!is_dir($directory)){mkdir($directory, 0777);}
   
      
      $chk ="";
      $files = null;
      if(!is_dir($directory)){
     
      }
    
    
   


 
            if (file_exists($directory . $_FILES["assuploadfile"]["name"])) {
                echo 'File already exists : '.$directory . $_FILES["assuploadfile"]["name"][$i];
               
              
            }
             else {
             
                $img = $_FILES["assuploadfile"]["name"];
                $uniquesavename=time().$Employeeid.$img;
                move_uploaded_file($_FILES["assuploadfile"]["tmp_name"], $directory . $uniquesavename);
              
                $Logofilepath = $directory .$uniquesavename;
                $SaveLog = "INSERT IGNORE INTO indsys1034employeeitemloglist (Employeeid,Clientid,Notes,Userid,Addormodifydatetime,Assetdocumentpath,Assettype,Receivedby,Receiveddatetime,Asselistid)VALUES('$Employeeid','$Clientid','$assetnotes','$user_id','$date','$Logofilepath','$Assettype','$user_id','$date','0')";
             
                $Saveresult = $conn->query($SaveLog);
                if($Saveresult===TRUE)
                {
                    $Display = array('status' =>"success");
                }
            
              echo json_encode($Display);
                   //echo $resultExistsss;
                    //echo 'File successfully uploaded : ' .$directory. $uniquesavename . ' ';
              
               
        
            }
     
} else {
    $Display = array('status' =>"NoFile");
    echo json_encode($Display);
}



   


 

?>




        
