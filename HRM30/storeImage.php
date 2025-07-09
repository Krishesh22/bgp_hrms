<?php
    
    include('../config.php');


session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
     
      $Clientid =$_SESSION["Clientid"];
     
   
$DVoucherno =   $_SESSION['DVNO'];
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
    $img = $_POST['image'];

    $directory2 = "../Upload/";
    if(!is_dir($directory2)){
      mkdir($directory2, 0777);
    }

    $directory = "../Upload/$DVoucherno/";
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
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
  
    $file = $folderPath . $fileName;


    file_put_contents($file, $image_base64);
 
    $resultExists = "Update indsys1051vouchermaster set ReceiverImagePath ='$file',Addormodifydatetime ='$date',Userid ='$user_id' WHERE DVoucherno = '$DVoucherno' ";
    $resultExists01 = $conn->query($resultExists);
 

  
    print_r($fileName);
  
  
?>