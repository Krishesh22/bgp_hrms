<?php
    
    include('../config.php');


session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
     
      
   
$DVoucherno = $_SESSION["DVNO"] ;
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
    
$directory2 = "../Signature/";
if(!is_dir($directory2)){
  mkdir($directory2, 0777);
}
    $directory = "../Signature/$DVoucherno/";
    $folderPath =$directory;

    if(!is_dir($directory)){
     
    }
    else
    {
      foreach (new DirectoryIterator($directory) as $fileInfo) {
        if(!$fileInfo->isDot()) {
            unlink($fileInfo->getPathname());
        }
      
    }
    }
 
      if(!is_dir($directory)){
      mkdir($directory, 0777);
    }
  
    $image_parts = explode(";base64,", $_POST['signed']);
        
    $image_type_aux = explode("image/", $image_parts[0]);
      
    $image_type = $image_type_aux[1];
      
    $image_base64 = base64_decode($image_parts[1]);
      
    $file = $folderPath . uniqid() . '.'.$image_type;



 
    $resultExists = "Update indsys1051vouchermaster set Receiversignature ='$file',Addormodifydatetime ='$date',Userid ='$user_id' WHERE DVoucherno = '$DVoucherno' ";
    $resultExists01 = $conn->query($resultExists);
    file_put_contents($file, $image_base64);


  
?>