<?php
include ('../config.php');
error_reporting(0);
session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$Clientid = $_SESSION["Clientid"];
$Employeeid = $_SESSION["Employeeid"];
$Message = '';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
$Bankname = $_POST['Bankname'];
$Accountno = $_POST['Accountno'];
$IFSCcode = $_POST['IFSCcode'];
$Branch = $_POST['Branch'];
$Empnameaspassbook = $_POST['Empnameaspassbook'];
$Employeeid = $_POST['Employeeid'];
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
    $Folderid = "bgp-$Clientid";
    $directory3 = "../$Folderid/";
    $directory2 = "../$Folderid/EMPBANKDOCUMENT/";
    $directory = "../$Folderid/EMPBANKDOCUMENT/$Employeeid/";
    if (createDirectoryIfNotExists($directory3) && createDirectoryIfNotExists($directory2) && createDirectoryIfNotExists($directory)) {
        // Clear existing files in directory
        
    } else {
        echo "Error: One or more folders could not be created.";
        exit;
    }
    $no_files = count($_FILES["files"]['name']);
    for ($i = 0;$i < $no_files;$i++) {
        if ($_FILES["files"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
        } 
        else {
            if (file_exists($directory . $_FILES["files"]["name"][$i])) {
                echo 'File already exists : ' . $directory . $_FILES["files"]["name"][$i];
            }
             else {
                // $img = $_FILES["files"]["name"][$i];
                $img = $_FILES["files"]["name"][$i];
                $gettime = time();
                $uniquesavename = "$gettime$img";
                // $uniquesavename=time().uniqid(rand());
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory . $uniquesavename)) {
                    $Logofilepath = $directory . $uniquesavename;
                    $resultExists = "SELECT Employeeid FROM indsys1016employeeaccountinformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
                    $resultExists01 = $conn->query($resultExists);
                    if (mysqli_fetch_row($resultExists01)) {
                        $resultExistsss = "Update indsys1016employeeaccountinformation set 
                    Bankname ='$Bankname',
                    Accountno ='$Accountno',
                    IFSCcode='$IFSCcode',
                    Branch='$Branch',
                    Bankpassbookdoc='$Logofilepath',
                    Addormodifydatetime ='$date',
                    Empnameaspassbook='$Empnameaspassbook',
                    Userid ='$user_id'
                WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid'  ";
                        $resultExists0New = $conn->query($resultExistsss);
                        $Message = "Update";
                    } else {
                        $sqlsave = "INSERT IGNORE INTO indsys1016employeeaccountinformation (Clientid,Employeeid,
                Bankname,Accountno,IFSCcode,Branch,Userid,Addormodifydatetime,Bankpassbookdoc,Empnameaspassbook)
                 VALUES ('$Clientid','$Employeeid','$Bankname','$Accountno','$IFSCcode',
                 '$Branch','$user_id','$date','$Logofilepath','$Empnameaspassbook')";
                        $resultsave = mysqli_query($conn, $sqlsave);
                        $Message = "Update";
                    }
                    //  $Message ="Exists";
                    echo 'File successfully uploaded : ' . $directory . $_FILES["files"]["name"][$i] . ' ';
                } else {
                    echo 'File not uploaded : ' . $directory . $_FILES["files"]["name"][$i];
                }
            }
        }
    } 
}
else {
        echo 'Please choose at least one file';
    }
    
?>