<?php
include('../config.php');
error_reporting(0);

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];

      $Clientid =$_SESSION["Clientid"];
      $_SESSION["AdditionAddress"]='Home.php';
      $_SESSION["ModificationAddress"]='Home.php';
      $_SESSION["ViewAddress"]='Home.php';
      $_SESSION["ReturnAddress"]='Home.php';
      $_SESSION["Tittle"] ="Member Type";
   
$Employeeid = $_SESSION["Employeeid"] ;
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );

function createDirectoryIfNotExists($path) {
    if (!is_dir($path)) {
        if (!mkdir($path, 0777, true)) {
            echo "Warning: Folder not created - $path<br>";
            return false;
        }
    }
    return true;
}




if (isset($_FILES['files']) && !empty($_FILES['files'])) {


   
    $directory3 = "../$Clientid/";
    $directory2 = "../$Clientid/EMPimage/";
    $directory = "../$Clientid/EMPimage/$Employeeid/";


  if (     
        createDirectoryIfNotExists($directory3) &&
        createDirectoryIfNotExists($directory2) &&
        createDirectoryIfNotExists($directory)
    ) {
        // Clear existing files in directory
        
    } else {
        echo "Error: One or more folders could not be created.";
        exit;
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
               if(move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory . $uniquesavename))
               {
                $Employeeid = $_SESSION["Employeeid"] ;
                $Logofilepath = $directory .$uniquesavename;
                $resultExists = "Update indsys1017employeemaster set Empimage ='$Logofilepath',Addormodifydatetime ='$date',Userid ='$user_id' WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' ";
                $resultExists01 = $conn->query($resultExists);
                $Message ="Exists";
                echo 'File successfully uploaded : ' .$directory. $uniquesavename . ' ';
               }
               else
               {
                echo 'File not uploaded : '.$directory . $_FILES["files"]["name"][$i];
               }
            }
        }
    }
} else {
    echo 'Please choose at least one file';
}



   


 

?>




        
