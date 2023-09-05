<?php

include('../config.php');

error_reporting(0);
include 'Propertychecklist.php';
session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];

      $Clientid =$_SESSION["Clientid"];

   


date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["assetCategory"])) {
    $assetCategories = $_POST["assetCategory"];
    $assetLists = $_POST["assetList"];
    $assetCodes = $_POST["Assetcode"];
    $distributedDates = $_POST["Distributedate"];
    $Employeeid=$_POST["emplid"];
    $Itemcount=0;
    $commaSeparatedAssetListIds = "";
    $Itemsnodetail = "";
    // Assuming $conn is your database connection object
    foreach ($assetCategories as $index => $Assetcategoryid) {
        $Assetlistid = $assetLists[$index];
        $code = $assetCodes[$index];
        $Distributeddate = $distributedDates[$index];
        $Particulars = "";
        $Itemcount++;

        $commaSeparatedAssetListIds .= ($commaSeparatedAssetListIds ? ',' : '') . $Assetlistid;
        $GetChapter = "SELECT * FROM vwemployeechecklistitemno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0)
        {
            while ($row = mysqli_fetch_array($result_Chapter))
            {
                $CheckitemSno = $row['Nextno'];

            }
        }
        else{
            $CheckitemSno=1;
        }


        $Itemsnodetail .= ($Itemsnodetail ? ',' : '') . $CheckitemSno;
        $sqlsave = "INSERT IGNORE INTO indsys1034employeeitemchecklist (Clientid,Employeeid,Sno,Distributeddate,Particulars,Userid,Addormodifydatetime,Qtyitem,Assetlistid,Assetcategoryid,Status,Allocatedby,Allocateddatetime)
        VALUES ('$Clientid','$Employeeid','$CheckitemSno','$Distributeddate','$Particulars','$user_id','$date','0','$Assetlistid','$Assetcategoryid','Allocated','$user_id','$date')";
           $resultsave = mysqli_query($conn, $sqlsave);
           
        $Updatereturnlists = "UPDATE indsys1034employeeitemreturnlist SET Status='Allocate' ,Allocatedatetime='$date',Allocatedby='$user_id' where Clientid='$Clientid' and Employeeid='$Employeeid' and Assetcategoryid='$Assetcategoryid' AND Assetlistid='$Assetlistid' AND Status='Return'";
        $returnqryexecute = $conn ->query($Updatereturnlists);
        // if($returnqryexecute===TRUE)
        // {
        //     $Assettype="R";
        //     $Mode="Return";
        //     $username=$_SESSION["Username"];
         
        //     AssetLog($conn,$Clientid,$user_id,1,$Mode,$username,$Employeeid,$Assettype,$commaSeparatedAssetListIds);
        // }
       
    }
    $Assettype="A";
   $Mode="Allocated";
   $username=$_SESSION["Username"];

   AssetLog($conn,$Clientid,$user_id,$Itemcount,$Mode,$username,$Employeeid,$Assettype,$commaSeparatedAssetListIds);
    echo json_encode(array('status'=>'OK','ListedNo' =>$Itemsnodetail));
} else {
    echo "Invalid request";
}
?>



