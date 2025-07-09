<?php
include('../config.php');
error_reporting(0);

session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"]; 
$Clientid =$_SESSION["Clientid"];      
$DVoucherno =$_SESSION["DVoucherno"] ;;
$Message ='';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$DVdetailno = $_POST['DVdetailno'];
$DVoucherno = $_POST['DVoucherno'];



if (isset($_FILES['files']) && !empty($_FILES['files'])) {

$directory4 = "../$Clientid/";
$directory3 = "../$Clientid/CASHVOUCHER/";
$directory2 = "../$Clientid/CASHVOUCHER/$DVoucherno/";
$directory = "../$Clientid/CASHVOUCHER/$DVoucherno/$DVdetailno/";

if(!is_dir($directory4)){mkdir($directory4, 0777);}
if(!is_dir($directory3)){mkdir($directory3, 0777);}
if(!is_dir($directory2)){mkdir($directory2, 0777);}
if(!is_dir($directory)){mkdir($directory, 0777);}

 
      $chk ="";
      //$files = null;
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

    $no_files = count($_FILES["files"]['name']);
    for ($i = 0; $i < $no_files; $i++) {
        if ($_FILES["files"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
        } else {
            if (file_exists($directory . $_FILES["files"]["name"][$i])) {
                echo 'File already exists : '.$directory . $_FILES["files"]["name"][$i];
            } else {
                $uniquesavename=time().uniqid(rand());
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory .  $uniquesavename);
               
                $Logofilepath = $directory . $uniquesavename;
    $resultExists = "SELECT * FROM indsys1051vouchermasterdetail WHERE DVoucherno = '$DVoucherno' AND DVdetailno='$DVdetailno' AND Clientid = '$Clientid'  LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {
    $resultExists = "Update indsys1051vouchermasterdetail set 
    voucherattachmentpath ='$Logofilepath',
  
    Userid='$user_id',
    Addormodifydatetime ='$date'

 
   
  
      
       WHERE DVoucherno = '$DVoucherno' AND DVdetailno ='$DVdetailno' ";
    $resultExists01 = $conn->query($resultExists);
    $Message ="Update";

     
  }


              //  $Message ="Exists";
                echo 'File successfully uploaded : ' .$directory. $_FILES["files"]["name"][$i] . ' ';
            }
        }
    }
} else {
    echo 'Please choose at least one file';
}



   


 

?>




        