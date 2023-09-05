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

$Sno = $_POST['Vaccinatedsno'];
$Covidvaccinated = $_POST['Covidvaccinated'];
$Vaccinateddate = $_POST['Vaccinateddate'];





if (isset($_FILES['files']) && !empty($_FILES['files'])) {



$directory4 = "../$Clientid/";
$directory3 = "../$Clientid/CANDIDATENEWDOC/";
$directory2 = "../$Clientid/CANDIDATENEWDOC/$Employeeid/";
$directory = "../$Clientid/CANDIDATENEWDOC/$Employeeid/$Sno";
if(!is_dir($directory4)){mkdir($directory4, 0777);}
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
                $uniquesavename=time().uniqid(rand()).$img;
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory . $uniquesavename);
                $Employeeid = $_SESSION["Employeeid"] ;
                $Logofilepath = $directory .$uniquesavename;
                $resultExists = "SELECT Employeeid FROM indsys1023employeevaccinationinformation WHERE Employeeid = '$Employeeid' AND Sno='$Sno'AND Clientid = '$Clientid'  LIMIT 1";
                $resultExists01 = $conn->query($resultExists);
              
                if (mysqli_fetch_row($resultExists01))
                {
              
                    $resultExistsss = "Update indsys1023employeevaccinationinformation set 
                    Vaccinationdate ='$Vaccinateddate',   
                    Vacinationtype='$Covidvaccinated',           
                    Vaccinationcertificate = '$Logofilepath',  
                    Addormodifydatetime ='$date',
                    Userid ='$user_id'                
                   
                WHERE Employeeid = '$Employeeid'  and Sno='$Sno'
              
                AND Clientid ='$Clientid'  ";
                    $resultExists0New = $conn->query($resultExistsss);
                    echo 'File successfully uploaded : ' .$directory. $uniquesavename . ' ';
              
                }
          else
          {
                $sqlsave = "INSERT IGNORE INTO indsys1023employeevaccinationinformation (Clientid,Employeeid, Sno,Vaccinationdate,Vacinationtype,Vaccinationcertificate,Userid,Addormodifydatetime)
                VALUES ('$Clientid','$Employeeid','$Sno','$Vaccinateddate','$Covidvaccinated','$Logofilepath','$user_id','$date')";
                   $resultsave = mysqli_query($conn, $sqlsave);
                // $resultExists01 = $conn->query($resultExists);
                $Message ="Exists";
                echo 'File successfully uploaded : ' .$directory. $uniquesavename . ' ';
          }
            }
        }
    }
} else {
    echo 'Please choose at least one file';
}



   


 

?>




        
