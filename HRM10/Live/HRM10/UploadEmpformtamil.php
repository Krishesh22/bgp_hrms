<<<<<<< HEAD
<?php
include('../config.php');
error_reporting(0);

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];

      $Clientid =$_SESSION["Clientid"];

   


date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );

$Employeeid = $_POST['Employeeid'];




if (isset($_FILES['files']) && !empty($_FILES['files'])) {
    $Folderid ="bgp-$Clientid";
$directory3 = "../$Folderid/";
$directory2 = "../$Folderid/Empreporttamil/";
$directory = "../$Folderid/Empreporttamil/$Employeeid/";

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
             
                $img = $_FILES["files"]["name"][$i];
                $uniquesavename=time().$Employeeid.$img;
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory . $uniquesavename);
                $Employeeid = $_SESSION["Employeeid"] ;
                $Logofilepath = $directory .$uniquesavename;
               
              
                    $resultExistsss = "Update indsys1017employeemaster set Empformstamilpath = '$Logofilepath',                  Addormodifydatetime ='$date',
                    Userid ='$user_id'                
                   
                WHERE Employeeid = '$Employeeid'  
              
                AND Clientid ='$Clientid'  ";
                    $resultExists0New = $conn->query($resultExistsss);
                   //echo $resultExistsss;
                    echo 'File successfully uploaded : ' .$directory. $uniquesavename . ' ';
              
               
        
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

   


date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );

$Employeeid = $_POST['Employeeid'];




if (isset($_FILES['files']) && !empty($_FILES['files'])) {
    $Folderid ="bgp-$Clientid";
$directory3 = "../$Folderid/";
$directory2 = "../$Folderid/Empreporttamil/";
$directory = "../$Folderid/Empreporttamil/$Employeeid/";

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
             
                $img = $_FILES["files"]["name"][$i];
                $uniquesavename=time().$Employeeid.$img;
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory . $uniquesavename);
                $Employeeid = $_SESSION["Employeeid"] ;
                $Logofilepath = $directory .$uniquesavename;
               
              
                    $resultExistsss = "Update indsys1017employeemaster set Empformstamilpath = '$Logofilepath',                  Addormodifydatetime ='$date',
                    Userid ='$user_id'                
                   
                WHERE Employeeid = '$Employeeid'  
              
                AND Clientid ='$Clientid'  ";
                    $resultExists0New = $conn->query($resultExistsss);
                   //echo $resultExistsss;
                    echo 'File successfully uploaded : ' .$directory. $uniquesavename . ' ';
              
               
        
            }
        }
    }
} else {
    echo 'Please choose at least one file';
}



   


 

?>




        
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
