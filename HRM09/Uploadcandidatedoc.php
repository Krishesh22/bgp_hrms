<?php
include('../config.php');
error_reporting(0);

session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"]; 
$Clientid =$_SESSION["Clientid"];      
$Candidateid =$_SESSION["Candidateid"] ;
$Message ='';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Sno = $_POST['EduNextno'];
$Candidatestudied = $_POST['Candidatestudied'];
$UniversityorSchool = $_POST['UniversityorSchool'];
$GradeorPercentage = $_POST['GradeorPercentage'];
$Passoutyear = $_POST['Passoutyear'];
$Specialization = $_POST['Specialization'];
$EducationMode = $_POST['EducationMode'];
if(empty($EducationMode))
{
    $EducationMode="";
}
if(empty($Specialization))
{
    $Specialization="";
}
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
    $directory2 = "../$Folderid/";
    $directory3 = "../$Folderid/CANDIDATENEWDOC/";
 
$directory = "../$Folderid/CANDIDATENEWDOC/$Candidateid/";
if (     
        createDirectoryIfNotExists($directory2) &&
        createDirectoryIfNotExists($directory3) &&
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

                $img = $_FILES["files"]["name"][$i];

                    
                $uniquesavename=time().$img; ;
               // $uniquesavename=time().uniqid(rand());
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory .  $uniquesavename))
                {

                

                $Logofilepath = $directory . $uniquesavename;
                $resultExists = "SELECT Candidateid FROM indsys1017candidateeducationinformation WHERE Candidateid = '$Candidateid' AND Sno='$Sno'AND Clientid = '$Clientid'  LIMIT 1";
                $resultExists01 = $conn->query($resultExists);

                if (mysqli_fetch_row($resultExists01))
                {
                //CopyCandidateEducationData($conn, $Candidateid, $Sno);
                $resultExistsss = "Update indsys1017candidateeducationinformation set 
                Studies ='$Candidatestudied',   
                Universityorschool='$UniversityorSchool',
                Grade='$GradeorPercentage',
                Passoutyear='$Passoutyear',  
                Candidatedocument = '$Logofilepath',   
                Addormodifydatetime ='$date',
                Specialization='$Specialization',
                EducationMode='$EducationMode',
                Userid ='$user_id'


                WHERE Candidateid = '$Candidateid'  and Sno='$Sno'

                AND Clientid ='$Clientid'  ";
                $resultExists0New = $conn->query($resultExistsss);
                $Message = "Exists";

                }

                else
                {
                $sqlsave = "INSERT IGNORE INTO indsys1017candidateeducationinformation (Clientid,Candidateid, Sno,Studies,Universityorschool,Grade,Userid,Addormodifydatetime,Passoutyear,Candidatedocument,Specialization,EducationMode)
                VALUES ('$Clientid','$Candidateid','$Sno','$Candidatestudied','$UniversityorSchool','$GradeorPercentage','$user_id','$date','$Passoutyear','$Logofilepath','$Specialization','$EducationMode')";
                $resultsave = mysqli_query($conn, $sqlsave);

                $Message = "Exists";
                }
                //  $Message ="Exists";
                echo 'File successfully uploaded : ' .$directory. $_FILES["files"]["name"][$i] . ' ';
            }
            else
            {
                echo 'File not uploaded : '.$directory . $_FILES["files"]["name"][$i];}
                }
        }
    }
} else {
    echo 'Please choose at least one file';
}



   

function CopyCandidateEducationData($conn, $Candidateid, $EducationSNo){
    try
    {
    $insertCandidateEducation = "INSERT INTO `indsys1017candidateeducationinformationhistory`(`Clientid`, `Candidateid`, `Sno`, `Studies`, `Universityorschool`, `Grade`, `Addormodifydatetime`, `Passoutyear`, `Userid`, `Candidatedocument`) SELECT `Clientid`, `Candidateid`, `Sno`, `Studies`, `Universityorschool`, `Grade`, `Addormodifydatetime`, `Passoutyear`, `Userid`, `Candidatedocument` FROM `indsys1017candidateeducationinformation` WHERE `Candidateid`=$Candidateid and `Sno`=$EducationSNo";
    $resultinsertCandidateEducation = $conn->query($insertCandidateEducation); 
    }
    catch(Exception $x)
    {
  
    }
  }
 

?>




        