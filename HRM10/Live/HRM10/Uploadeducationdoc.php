<<<<<<< HEAD
<?php
include('../config.php');
error_reporting(0);

session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"]; 
$Clientid =$_SESSION["Clientid"];      
$Employeeid =$_SESSION["Employeeid"] ;;
$Message ='';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Sno = $_POST['EduNextno'];
$Employeestudied = $_POST['Employeestudied'];
$UniversityorSchool = $_POST['UniversityorSchool'];
$GradeorPercentage = $_POST['GradeorPercentage'];
$Passoutyear = $_POST['Passoutyear'];
$EducationMode = $_POST['EducationMode'];
$Specialization = $_POST['Specialization'];
if($EducationMode=="? undefined:undefined ?")
{
    $EducationMode="";
}
if($Specialization=="? undefined:undefined ?")
{
    $Specialization="";
}

if (isset($_FILES['files']) && !empty($_FILES['files'])) {
    $Folderid ="bgp-$Clientid";
$directory4 = "../$Folderid/";
$directory3 = "../$Folderid/EMPEDUCATIONDOCUMENTNEW/";
$directory2 = "../$Folderid/EMPEDUCATIONDOCUMENTNEW/$Employeeid/";
$directory = "../$Folderid/EMPEDUCATIONDOCUMENTNEW/$Employeeid/$Sno/";

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
                $img = $_FILES["files"]["name"][$i];
                $uniquesavename=time().$img;
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory.$uniquesavename);
               
                $Logofilepath = $directory . $uniquesavename;
    $resultExists = "SELECT * FROM indsys1020employeeeducationinformation WHERE Employeeid = '$Employeeid' AND Sno='$Sno' AND Clientid = '$Clientid'  LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {

      $resultExistsss = "Update indsys1020employeeeducationinformation set 
      Studies ='$Employeestudied',   
      Universityorschool='$UniversityorSchool',
      Grade=' $GradeorPercentage',
      Passoutyear='$Passoutyear',  
      Educationdocument =   '$Logofilepath',   
      Addormodifydatetime ='$date',
      EducationMode='$EducationMode',
      Specialization='$Specialization',
      Userid ='$user_id'
   
     
  WHERE Employeeid = '$Employeeid'  and Sno='$Sno'

  AND Clientid ='$Clientid'  ";
      $resultExists0New = $conn->query($resultExistsss);
      $Message = "Exists";

  }

  else
  {
    $sqlsave = "INSERT IGNORE INTO indsys1020employeeeducationinformation (Clientid,Employeeid, Sno,Studies,Universityorschool,Grade,Userid,Addormodifydatetime,Passoutyear,Educationdocument,EducationMode,Specialization)
    VALUES ('$Clientid','$Employeeid','$Sno','$Employeestudied','$UniversityorSchool','$GradeorPercentage','$user_id','$date','$Passoutyear','$Logofilepath','$EducationMode','$Specialization')";
       $resultsave = mysqli_query($conn, $sqlsave);
 
       $Message = "Exists";
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




=======
<?php
include('../config.php');
error_reporting(0);

session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"]; 
$Clientid =$_SESSION["Clientid"];      
$Employeeid =$_SESSION["Employeeid"] ;;
$Message ='';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Sno = $_POST['EduNextno'];
$Employeestudied = $_POST['Employeestudied'];
$UniversityorSchool = $_POST['UniversityorSchool'];
$GradeorPercentage = $_POST['GradeorPercentage'];
$Passoutyear = $_POST['Passoutyear'];
$EducationMode = $_POST['EducationMode'];
$Specialization = $_POST['Specialization'];
if($EducationMode=="? undefined:undefined ?")
{
    $EducationMode="";
}
if($Specialization=="? undefined:undefined ?")
{
    $Specialization="";
}

if (isset($_FILES['files']) && !empty($_FILES['files'])) {
    $Folderid ="bgp-$Clientid";
$directory4 = "../$Folderid/";
$directory3 = "../$Folderid/EMPEDUCATIONDOCUMENTNEW/";
$directory2 = "../$Folderid/EMPEDUCATIONDOCUMENTNEW/$Employeeid/";
$directory = "../$Folderid/EMPEDUCATIONDOCUMENTNEW/$Employeeid/$Sno/";

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
                $img = $_FILES["files"]["name"][$i];
                $uniquesavename=time().$img;
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory.$uniquesavename);
               
                $Logofilepath = $directory . $uniquesavename;
    $resultExists = "SELECT * FROM indsys1020employeeeducationinformation WHERE Employeeid = '$Employeeid' AND Sno='$Sno' AND Clientid = '$Clientid'  LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {

      $resultExistsss = "Update indsys1020employeeeducationinformation set 
      Studies ='$Employeestudied',   
      Universityorschool='$UniversityorSchool',
      Grade=' $GradeorPercentage',
      Passoutyear='$Passoutyear',  
      Educationdocument =   '$Logofilepath',   
      Addormodifydatetime ='$date',
      EducationMode='$EducationMode',
      Specialization='$Specialization',
      Userid ='$user_id'
   
     
  WHERE Employeeid = '$Employeeid'  and Sno='$Sno'

  AND Clientid ='$Clientid'  ";
      $resultExists0New = $conn->query($resultExistsss);
      $Message = "Exists";

  }

  else
  {
    $sqlsave = "INSERT IGNORE INTO indsys1020employeeeducationinformation (Clientid,Employeeid, Sno,Studies,Universityorschool,Grade,Userid,Addormodifydatetime,Passoutyear,Educationdocument,EducationMode,Specialization)
    VALUES ('$Clientid','$Employeeid','$Sno','$Employeestudied','$UniversityorSchool','$GradeorPercentage','$user_id','$date','$Passoutyear','$Logofilepath','$EducationMode','$Specialization')";
       $resultsave = mysqli_query($conn, $sqlsave);
 
       $Message = "Exists";
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




>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
        