<<<<<<< HEAD
<?php
include('../config.php');
error_reporting(0);

session_start();
$user_id = $_SESSION["Userid"];
$Clientid =$_SESSION["Clientid"];   
$Message ='';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Attendencedate = $_POST['Attendencedate'];

$Description = $_POST['Description'];
$Status = $_POST['Status'];



if (isset($_FILES['files']) && !empty($_FILES['files'])) {



    $directory2 = "../ATTENDANCEDOC/";


    $directory = "../ATTENDANCEDOC/$Attendencedate/";
    
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
               
                $Document = $directory . $uniquesavename;
                
    $resultExists = "SELECT * FROM indsys1032empdailyattendancedoc WHERE Attendencedate = '$Attendencedate' AND Userid='$user_id' AND Clientid = '$Clientid'  LIMIT 1";
  $resultExists01 = $conn->query($resultExists);
   
 // echo "$Attendencedate $user_id $Clientid $Description";

  if (mysqli_fetch_row($resultExists01))
  {
   
      $resultExistsss = "Update indsys1032empdailyattendancedoc set 
      Description ='$Description', 
      Document='$Document',  
      Addormodifydatetime ='$date',
      Status='$Status'
      
  WHERE Attendencedate='$Attendencedate'  and Clientid='$Clientid' and

  Userid='$user_id' ";

 
      $resultExists0New = $conn->query($resultExistsss);
      $Message = "Update";

  }

  else
  {
    

      $sqlsave = "INSERT IGNORE INTO indsys1032empdailyattendancedoc(`Clientid`, `Userid`, `Attendencedate`, `Description`, `Document`, `Status`, `Addormodifydatetime`)
   VALUES ('$Clientid','$user_id','$Attendencedate','$Description','$Document','$Status','$date')";
      $resultsave = mysqli_query($conn, $sqlsave);
      
      $Message = "Upload";
    
     
  }
                echo 'File successfully uploaded : ' .$directory. $_FILES["files"]["name"][$i] . ' ';
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
$Clientid =$_SESSION["Clientid"];   
$Message ='';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Attendencedate = $_POST['Attendencedate'];

$Description = $_POST['Description'];
$Status = $_POST['Status'];



if (isset($_FILES['files']) && !empty($_FILES['files'])) {



    $directory2 = "../ATTENDANCEDOC/";


    $directory = "../ATTENDANCEDOC/$Attendencedate/";
    
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
               
                $Document = $directory . $uniquesavename;
                
    $resultExists = "SELECT * FROM indsys1032empdailyattendancedoc WHERE Attendencedate = '$Attendencedate' AND Userid='$user_id' AND Clientid = '$Clientid'  LIMIT 1";
  $resultExists01 = $conn->query($resultExists);
   
 // echo "$Attendencedate $user_id $Clientid $Description";

  if (mysqli_fetch_row($resultExists01))
  {
   
      $resultExistsss = "Update indsys1032empdailyattendancedoc set 
      Description ='$Description', 
      Document='$Document',  
      Addormodifydatetime ='$date',
      Status='$Status'
      
  WHERE Attendencedate='$Attendencedate'  and Clientid='$Clientid' and

  Userid='$user_id' ";

 
      $resultExists0New = $conn->query($resultExistsss);
      $Message = "Update";

  }

  else
  {
    

      $sqlsave = "INSERT IGNORE INTO indsys1032empdailyattendancedoc(`Clientid`, `Userid`, `Attendencedate`, `Description`, `Document`, `Status`, `Addormodifydatetime`)
   VALUES ('$Clientid','$user_id','$Attendencedate','$Description','$Document','$Status','$date')";
      $resultsave = mysqli_query($conn, $sqlsave);
      
      $Message = "Upload";
    
     
  }
                echo 'File successfully uploaded : ' .$directory. $_FILES["files"]["name"][$i] . ' ';
            }
        }
    }
} else {
    echo 'Please choose at least one file';
}



   


 

?>




>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
        