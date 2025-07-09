<?php
include('../config.php');
error_reporting(0);

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];

      $Clientid =$_SESSION["Clientid"];

   
function createDirectoryIfNotExists($path) {
    if (!is_dir($path)) {
        if (!mkdir($path, 0777, true)) {
            echo "Warning: Folder not created - $path<br>";
            return false;
        }
    }
    return true;
}

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );

$Employeeid = $_POST['Empid'];
$Assettype =$_POST['Assettype'];
$assetnotes =$_POST['assetnotes'];

if(empty($assetnotes) || $assetnotes==null || $assetnotes =='')
{
    $Display = array('status' =>"Note");
    echo json_encode($Display);
    return;
}


if (isset($_FILES['assuploadfile']) && !empty($_FILES['assuploadfile'])) {
 $Folderid ="bgp-$Clientid";
$directory3 = "../$Folderid/";
$directory2 = "../$Folderid/AssetDOC/";
$directory = "../$Folderid/AssetDOC/$Employeeid/";

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
    
    
   


 
            if (file_exists($directory . $_FILES["assuploadfile"]["name"])) {
                echo 'File already exists : '.$directory . $_FILES["assuploadfile"]["name"][$i];
               
              
            }
             else {
             
                $img = $_FILES["assuploadfile"]["name"];
                $uniquesavename=time().$Employeeid.$img;
                if(move_uploaded_file($_FILES["assuploadfile"]["tmp_name"], $directory . $uniquesavename))
                {
              
                $Logofilepath = $directory .$uniquesavename;
                $SaveLog = "INSERT IGNORE INTO indsys1034employeeitemloglist (Employeeid,Clientid,Notes,Userid,Addormodifydatetime,Assetdocumentpath,Assettype,Receivedby,Receiveddatetime,Asselistid)VALUES('$Employeeid','$Clientid','$assetnotes','$user_id','$date','$Logofilepath','$Assettype','$user_id','$date','0')";
             
                $Saveresult = $conn->query($SaveLog);
                if($Saveresult===TRUE)
                {
                    $Display = array('status' =>"success");
                }
                }
                else
                {
                    $Display = array('status' =>"NoFile");
                }
              
                   // $resultExists = "Update indsys1017employeemaster set Empimage ='$Logofilepath',Addormodifydatetime ='$date',Userid ='$user_id' WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' ";
                   // $resultExists01 = $conn->query($resultExists);
                   // $Message ="Exists";

            
              echo json_encode($Display);
              
                   //echo $resultExistsss;
                    //echo 'File successfully uploaded : ' .$directory. $uniquesavename . ' ';
              
               
        
            }
     
} else {
    $Display = array('status' =>"NoFile");
    echo json_encode($Display);
}



   


 

?>




        
