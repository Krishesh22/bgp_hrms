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

<<<<<<< HEAD
function createDirectoryIfNotExists($path) {
    if (!is_dir($path)) {
        if (!mkdir($path, 0777, true)) {
            echo "Warning: Folder not created - $path<br>";
            return false;
        }
    }
    return true;
}
=======

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2




if (isset($_FILES['files']) && !empty($_FILES['files'])) {


   
    $directory3 = "../$Clientid/";
    $directory2 = "../$Clientid/EMPimage/";
    $directory = "../$Clientid/EMPimage/$Employeeid/";


<<<<<<< HEAD
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
=======
    if(!is_dir($directory3)){mkdir($directory3, 0777);}
    if(!is_dir($directory2)){mkdir($directory2, 0777);}
 
    if(!is_dir($directory)){mkdir($directory, 0777);}
     

      
      $chk ="";
      $files = null;
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
        mkdir($directory, 0777, true);
                }
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2

    $no_files = count($_FILES["files"]['name']);
    for ($i = 0; $i < $no_files; $i++) {
        if ($_FILES["files"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
        } else {
            if (file_exists($directory . $_FILES["files"]["name"][$i])) {
                echo 'File already exists : '.$directory . $_FILES["files"]["name"][$i];
            } else {
                $uniquesavename=time().uniqid(rand());
<<<<<<< HEAD
               if(move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory . $uniquesavename))
               {
=======
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory . $uniquesavename);
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
                $Employeeid = $_SESSION["Employeeid"] ;
                $Logofilepath = $directory .$uniquesavename;
                $resultExists = "Update indsys1017employeemaster set Empimage ='$Logofilepath',Addormodifydatetime ='$date',Userid ='$user_id' WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' ";
                $resultExists01 = $conn->query($resultExists);
                $Message ="Exists";
                echo 'File successfully uploaded : ' .$directory. $uniquesavename . ' ';
<<<<<<< HEAD
               }
               else
               {
                echo 'File not uploaded : '.$directory . $_FILES["files"]["name"][$i];
               }
=======
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
            }
        }
    }
} else {
    echo 'Please choose at least one file';
}



   


 

?>




        
