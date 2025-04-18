<?php
include ('../config.php');
error_reporting(0);
session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$Clientid = $_SESSION["Clientid"];
$Message = '';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
$Documentno = $_POST['Documentno'];
$DocumentIssueDate = $_POST['DocumentIssueDate'];
$RenewalDate = $_POST['RenewalDate'];
$Documenttype = $_POST['Documenttype'];
$Renewalnotificationindays = $_POST['Renewalnotificationindays'];
$DocumentNotes = $_POST['DocumentNotes'];
$Renewalyesorno = $_POST['Renewalyesorno'];
$Documentname = $_POST['Documentname'];
$Documentnoasperrecord = $_POST['Documentnoasperrecord'];
$status = $_POST['status'];
if ($Renewalyesorno == 'Yes') {
    if ($RenewalDate == "") {
        echo "Please Select Expired Date....";
        return;
    }
    if (empty($RenewalDate)||$RenewalDate=="") {
        echo "Please Select Expired Date....";
        return;
    }
    if (empty($Renewalnotificationindays) || $Renewalnotificationindays == 0) {
        echo "Please Enter Renewal Notification Days....";
        return;
    }
}
if (empty($Documentname)) {
    echo "Please Enter Document Name....";
    return;
}
if (empty($Documenttype)) {
    echo "Please Select Document Type....";
    return;
}
if (empty($Renewalnotificationindays)) {
    $Renewalnotificationindays = 0;
}
if (empty($RenewalDate)) {
    $RenewalDate = "0000-00-00";
}
if (empty($DocumentIssueDate)) {
    $DocumentIssueDate = "0000-00-00";
}
mysqli_begin_transaction($conn);
$transStatus = true;
$Historyno = "";
$Documentoldno = "";
$Updatehistoryno = 0;
if ($status == 'Renewal') {

  
    $RenewalOldno = $_POST['Renewaloldno'];
    $Documentoldno = $RenewalOldno;
    $GetChapter = "SELECT * FROM indsys1054documentmaster where Clientid ='$Clientid' and Documentno = '$RenewalOldno'  ORDER BY Documentno";
    $result_Chapter = $conn->query($GetChapter);
    if (mysqli_num_rows($result_Chapter) > 0) {
        while ($row = mysqli_fetch_array($result_Chapter)) {
            $Documenthistoryno = $row['Documenthistoryno'];
            if (empty($Documenthistoryno) || $Documenthistoryno == "0") {
                $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='DOCHISTORY' AND Clientid ='$Clientid' ";
                $result_Nextno = $conn->query($GetNextno);
                if (mysqli_num_rows($result_Nextno) > 0) {
                    while ($row = mysqli_fetch_array($result_Nextno)) {
                        $data = $row['Nextno'];
                        $data01 = $data + 1;
                    }
                }
                $Historyno = $data01;
                $Updatehistoryno = 1;
            } else {
                $Historyno = $Documenthistoryno;
            }
        }
    }
} else {
    $Historyno = "0";
    $Documentoldno = "0";
}
$resultExists = "SELECT Documentno FROM indsys1054documentmaster WHERE Documentno = '$Documentno' AND Clientid = '$Clientid'  LIMIT 1";
$resultExists01 = $conn->query($resultExists);
if (mysqli_fetch_row($resultExists01)) {
    $resultExistsss = "Update indsys1054documentmaster set 
    Documenttype ='$Documenttype',            
    DocumentIssueDate = '$DocumentIssueDate',  
    ExpiredDate='$RenewalDate',
    Renewalnotificationindays='$Renewalnotificationindays',
    DocumentNotes='$DocumentNotes',
    Addormodifydatetime ='$date',
    Documentname='$Documentname',
    Renewalyesorno ='$Renewalyesorno',
    Documentname ='$Documentname',
    Documentnoasperrecord ='$Documentnoasperrecord',
    Userid ='$user_id'                   
  WHERE Documentno = '$Documentno'  AND Clientid ='$Clientid'  ";
    $resultExists0New = $conn->query($resultExistsss);
    if ($resultExists0New === TRUE) {
    } else {
        $transStatus = false;
    }
} else {
    $sqlsave = "INSERT IGNORE INTO indsys1054documentmaster (Clientid,Documentno, Documenttype,Documentcreateddate,DocumentIssueDate,ExpiredDate,Userid,Addormodifydatetime,Renewalnotificationindays,DocumentNotes,Documentstatus,Documentname,Renewalyesorno,Documentnoasperrecord,Documentoldno,Documenthistoryno)
VALUES ('$Clientid','$Documentno','$Documenttype','$date','$DocumentIssueDate','$RenewalDate','$user_id','$date','$Renewalnotificationindays','$DocumentNotes','Open','$Documentname','$Renewalyesorno','$Documentnoasperrecord','$Documentoldno','$Historyno')";
    $resultsave = mysqli_query($conn, $sqlsave);
    if ($resultsave === TRUE) {
        $UpdateNextno = "Update indsys1008mastermodule set Nextno ='$Documentno' where ModuleID ='DOCUMENT' AND Clientid ='$Clientid'";
        $resultUpdate = mysqli_query($conn, $UpdateNextno);
        if ($status == 'Renewal') {
            if($Updatehistoryno==1)
            {
            $UpdateHistoryNextno = "Update indsys1008mastermodule set Nextno ='$Historyno' where ModuleID ='DOCHISTORY' AND Clientid ='$Clientid'";
            $resultUpdateHistory = mysqli_query($conn, $UpdateHistoryNextno);
            }
            $resultExistsss = "Update indsys1054documentmaster set 
            Documenthistoryno ='$Historyno',            
            Documentstatus = 'Renewed',  
            Documentoldno='$Documentno',           
            Userid ='$user_id'                   
          WHERE Documentno = '$Documentoldno'  AND Clientid ='$Clientid'  ";
            $resultExists0New = $conn->query($resultExistsss);

            Maintainhistoryrecord($conn,$Documentoldno,$Clientid);

        }
    } else {
        echo "Error" . $conn->error;
        $transStatus = false;
    }
    // $resultExists01 = $conn->query($resultExists);
    //  $Message ="Exists";
    
}
if ($transStatus) {
    mysqli_commit($conn);
    //echo 'Transaction success';
    
} else {
    mysqli_rollback($conn);
    //echo 'Transaction failed';
    
}
if (isset($_FILES['files']) && !empty($_FILES['files'])) {
    $directory4 = "../$Clientid/";
    $directory3 = "../$Clientid/AUDITDOCUMENT/";
    $directory = "../$Clientid/AUDITDOCUMENT/$Documentno/";
    if (!is_dir($directory4)) {
        mkdir($directory4, 0777);
    }
    if (!is_dir($directory3)) {
        mkdir($directory3, 0777);
    }
    if (!is_dir($directory)) {
        mkdir($directory, 0777);
    }
    $chk = "";
    $files = null;
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
    $no_files = count($_FILES["files"]['name']);
    for ($i = 0;$i < $no_files;$i++) {
        if ($_FILES["files"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
        } else {
            if (file_exists($directory . $_FILES["files"]["name"][$i])) {
                echo 'File already exists : ' . $directory . $_FILES["files"]["name"][$i];
            } else {
                $img = $_FILES["files"]["name"][$i];
                $file_type = $_FILES['files']['type'][$i];
                $file_size = $_FILES['files']['size'][$i];
                $Sno = 0;
                $resultExistsnew = "SELECT Nextno FROM vwdocumentnextno WHERE Documentno = '$Documentno' AND Clientid = '$Clientid' LIMIT 1";
                $resultExists01new = $conn->query($resultExistsnew);
                if (mysqli_fetch_row($resultExists01new)) {
                    $GetChapter = "SELECT * FROM vwdocumentnextno WHERE Documentno = '$Documentno' AND Clientid = '$Clientid'  ";
                    $result_Chapter = $conn->query($GetChapter);
                    if (mysqli_num_rows($result_Chapter) > 0) {
                        while ($row = mysqli_fetch_array($result_Chapter)) {
                            $Sno = $row['Nextno'];
                        }
                    }
                } else {
                    $Sno = 1;
                }
                $gettime = time();
                $uniquesavename = "$Documentno-$Sno-$img";
                $uploadFilePath = $directory . $uniquesavename;
                
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $uploadFilePath)) {
                   
                    $Documentsave = "INSERT IGNORE INTO indsys1054documentmasterdetails(Clientid,Documentno,Sno,Userid,Addormodifydatetime,Documentfilepath,Documentfilename,Documentfilesize,Documenttype)
                    VALUES('$Clientid','$Documentno','$Sno','$user_id','$date','$uploadFilePath','$uniquesavename','$file_size','$file_type')";
                    $savedocument = mysqli_query($conn, $Documentsave);
                    if ($savedocument === TRUE) {
                        echo 'File Uploaded Successfully....';
                    } else {
                        echo 'File Uploaded Error....';
                    }
                } 
                else
                {
                    echo 'File Uploaded Error....';
                } 
            }
        }
    }
   
} else {
    echo 'Please choose at least one file';
}


function Maintainhistoryrecord($conn,$Documentno,$Clientid)
{
 $InsertHistory="INSERT INTO indsys1054documentmasterhistory(Clientid,Documentno,Documentname,Documenttype,Documentcreateddate,ExpiredDate,Renewalnotificationindays,DocumentNotes,Documentstatus,DocumentIssueDate,Renewalyesorno,Documentnoasperrecord,Documentoldno,Documenthistoryno,Userid,Addormodifydatetime)
 SELECT Clientid,Documentno,Documentname,Documenttype,Documentcreateddate,ExpiredDate,Renewalnotificationindays,DocumentNotes,Documentstatus,DocumentIssueDate,Renewalyesorno,Documentnoasperrecord,Documentoldno,Documenthistoryno,Userid,Addormodifydatetime FROM indsys1054documentmaster where Documentno='$Documentno' AND Clientid='$Clientid'";
 $Excute = mysqli_query($conn,$InsertHistory);

 if($Excute===TRUE)
 {

 }
 else
 {
    echo "Error" . $conn->error;
 }
}
?>




        
