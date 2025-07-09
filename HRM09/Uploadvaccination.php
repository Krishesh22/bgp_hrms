<<<<<<< HEAD
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
   
$Candidateid = $_SESSION["Candidateid"] ;
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );

$Sno = $_POST['Vaccinatedsno'];
$Covidvaccinated = $_POST['Covidvaccinated'];
$Vaccinateddate = $_POST['Vaccinateddate'];





if (isset($_FILES['files']) && !empty($_FILES['files'])) {
    $Folderid ="bgp-$Clientid";
    $directory2 = "../$Folderid/";
    $directory3 = "../$Folderid/CANVACCINATIONNEW/";
   // $directory = "../CANVaccination/$Candidateid/$Sno/";
   $directory = "../$Folderid/CANVACCINATIONNEW/$Candidateid/";



   if(!is_dir($directory2)){mkdir($directory2, 0777);}
   if(!is_dir($directory3)){mkdir($directory3, 0777);}
if(!is_dir($directory)){mkdir($directory, 0777);}
   
      
      $chk ="";
      $files = null;
      if(!is_dir($directory)){
     
      }
      // else
      // {
      //   foreach (new DirectoryIterator($directory) as $fileInfo) {
      //     if(!$fileInfo->isDot()) {
      //         unlink($fileInfo->getPathname());
      //     }
        
      // }
      // }
   
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
               
              
            }
             else {

                $img = $_FILES["files"]["name"][$i];

                $gettime = time();
                $uniquesavename="$gettime$img" ;
                // $extension = pathinfo($_FILES["files"]["tmp_name"][$i], PATHINFO_EXTENSION);
                // $uniquesavename=time().uniqid(rand()) ;
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory . $uniquesavename);
                $Candidateid = $_SESSION["Candidateid"] ;
                $Logofilepath = $directory .$uniquesavename;
                $resultExists = "SELECT Candidateid FROM indsys1017candidatevaccinationinformation WHERE Candidateid = '$Candidateid' AND Sno='$Sno'AND Clientid = '$Clientid'  LIMIT 1";
                $resultExists01 = $conn->query($resultExists);
              
                if (mysqli_fetch_row($resultExists01))
                {
              
                    $resultExistsss = "Update indsys1017candidatevaccinationinformation set 
                    Vaccinationdate ='$Vaccinateddate',   
                    Vacinationtype='$Covidvaccinated',           
                    Vaccinationcertificate = '$Logofilepath',  
                    Addormodifydatetime ='$date',
                    Userid ='$user_id'                
                   
                WHERE Candidateid = '$Candidateid'  and Sno='$Sno'
              
                AND Clientid ='$Clientid'  ";
                    $resultExists0New = $conn->query($resultExistsss);
                    echo 'File successfully uploaded : ' .$directory. $uniquesavename . ' ';
              
                }
          else
          {
                $sqlsave = "INSERT IGNORE INTO indsys1017candidatevaccinationinformation (Clientid,Candidateid, Sno,Vaccinationdate,Vacinationtype,Vaccinationcertificate,Userid,Addormodifydatetime)
                VALUES ('$Clientid','$Candidateid','$Sno','$Vaccinateddate','$Covidvaccinated','$Logofilepath','$user_id','$date')";
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




        
=======
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
   
$Candidateid = $_SESSION["Candidateid"] ;
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );

$Sno = $_POST['Vaccinatedsno'];
$Covidvaccinated = $_POST['Covidvaccinated'];
$Vaccinateddate = $_POST['Vaccinateddate'];





if (isset($_FILES['files']) && !empty($_FILES['files'])) {
    $Folderid ="bgp-$Clientid";
    $directory2 = "../$Folderid/";
    $directory3 = "../$Folderid/CANVACCINATIONNEW/";
   // $directory = "../CANVaccination/$Candidateid/$Sno/";
   $directory = "../$Folderid/CANVACCINATIONNEW/$Candidateid/";



   if(!is_dir($directory2)){mkdir($directory2, 0777);}
   if(!is_dir($directory3)){mkdir($directory3, 0777);}
if(!is_dir($directory)){mkdir($directory, 0777);}
   
      
      $chk ="";
      $files = null;
      if(!is_dir($directory)){
     
      }
      // else
      // {
      //   foreach (new DirectoryIterator($directory) as $fileInfo) {
      //     if(!$fileInfo->isDot()) {
      //         unlink($fileInfo->getPathname());
      //     }
        
      // }
      // }
   
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
               
              
            }
             else {

                $img = $_FILES["files"]["name"][$i];

                $gettime = time();
                $uniquesavename="$gettime$img" ;
                // $extension = pathinfo($_FILES["files"]["tmp_name"][$i], PATHINFO_EXTENSION);
                // $uniquesavename=time().uniqid(rand()) ;
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory . $uniquesavename);
                $Candidateid = $_SESSION["Candidateid"] ;
                $Logofilepath = $directory .$uniquesavename;
                $resultExists = "SELECT Candidateid FROM indsys1017candidatevaccinationinformation WHERE Candidateid = '$Candidateid' AND Sno='$Sno'AND Clientid = '$Clientid'  LIMIT 1";
                $resultExists01 = $conn->query($resultExists);
              
                if (mysqli_fetch_row($resultExists01))
                {
              
                    $resultExistsss = "Update indsys1017candidatevaccinationinformation set 
                    Vaccinationdate ='$Vaccinateddate',   
                    Vacinationtype='$Covidvaccinated',           
                    Vaccinationcertificate = '$Logofilepath',  
                    Addormodifydatetime ='$date',
                    Userid ='$user_id'                
                   
                WHERE Candidateid = '$Candidateid'  and Sno='$Sno'
              
                AND Clientid ='$Clientid'  ";
                    $resultExists0New = $conn->query($resultExistsss);
                    echo 'File successfully uploaded : ' .$directory. $uniquesavename . ' ';
              
                }
          else
          {
                $sqlsave = "INSERT IGNORE INTO indsys1017candidatevaccinationinformation (Clientid,Candidateid, Sno,Vaccinationdate,Vacinationtype,Vaccinationcertificate,Userid,Addormodifydatetime)
                VALUES ('$Clientid','$Candidateid','$Sno','$Vaccinateddate','$Covidvaccinated','$Logofilepath','$user_id','$date')";
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




        
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
