<<<<<<< HEAD
<?php
include('../config.php');
error_reporting(0);

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];

      $Clientid =$_SESSION["Clientid"];

   
$Candidateid = $_POST["Candidateid"] ;
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


   
    $Folderid ="bgp-$Clientid";
    $directory3 = "../$Folderid/";
$directory2 = "../$Folderid/CANIMAGE/";
$directory = "../$Folderid/CANIMAGE/$Candidateid/";

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
        }
         else
          {
            if (file_exists($directory . $_FILES["files"]["name"][$i])) {
                echo 'File already exists : '.$directory . $_FILES["files"]["name"][$i];
               
              
            }
             else {


                $extension = pathinfo($_FILES["files"]["tmp_name"][$i], PATHINFO_EXTENSION);
                $img = $_FILES["files"]["name"][$i];
                $uniquesavename=time().$img;
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory . $uniquesavename))
                {
                                    
          
                $Logofilepath = $directory .$uniquesavename;
               
              
                    $resultExistsss = "Update indsys1013candidatemaster set                             
                    Candidatephoto = '$Logofilepath',  
                    Addormodifydatetime ='$date',
                    Userid ='$user_id'                
                   
                WHERE Candidateid = '$Candidateid'  
              
                AND Clientid ='$Clientid'  ";
                    $resultExists0New = $conn->query($resultExistsss);
                    echo 'File successfully uploaded : ' .$directory. $uniquesavename . ' ';
                
                } else {
                    echo 'File not uploaded : '.$directory . $_FILES["files"]["name"][$i];
                }

              
               
        
            
        }
    }
} else {
    echo 'Please choose at least one file';
}



   


 

?>




        
=======
<?php
include('../config.php');
error_reporting(0);

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];

      $Clientid =$_SESSION["Clientid"];

   
$Candidateid = $_POST["Candidateid"] ;
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );






if (isset($_FILES['files']) && !empty($_FILES['files'])) {


   
    $Folderid ="bgp-$Clientid";
    $directory3 = "../$Folderid/";
$directory2 = "../$Folderid/CANIMAGE/";
$directory = "../$Folderid/CANIMAGE/$Candidateid/";
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
   


    $no_files = count($_FILES["files"]['name']);
    for ($i = 0; $i < $no_files; $i++) {
        if ($_FILES["files"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
        } else {
            if (file_exists($directory . $_FILES["files"]["name"][$i])) {
                echo 'File already exists : '.$directory . $_FILES["files"]["name"][$i];
               
              
            }
             else {


                $extension = pathinfo($_FILES["files"]["tmp_name"][$i], PATHINFO_EXTENSION);
                $img = $_FILES["files"]["name"][$i];
                $uniquesavename=time().$img;
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory . $uniquesavename);
          
                $Logofilepath = $directory .$uniquesavename;
               
              
                    $resultExistsss = "Update indsys1013candidatemaster set                             
                    Candidatephoto = '$Logofilepath',  
                    Addormodifydatetime ='$date',
                    Userid ='$user_id'                
                   
                WHERE Candidateid = '$Candidateid'  
              
                AND Clientid ='$Clientid'  ";
                    $resultExists0New = $conn->query($resultExistsss);
                    echo 'File successfully uploaded : ' .$directory. $uniquesavename . ' ';
              
               
        
            }
        }
    }
} else {
    echo 'Please choose at least one file';
}



   


 

?>




        
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
