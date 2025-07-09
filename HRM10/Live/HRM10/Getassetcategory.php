<?php
include('../config.php');
error_reporting(0);

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];

      $Clientid =$_SESSION["Clientid"];

   


date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
if(isset($_POST['Asset'])=='1')
{
$query = "SELECT * FROM indsys1058assetcategory Where Clientid='$Clientid' AND Activestatus='Active'";
$result = $conn->query($query);

$optionsHtml = "";
while ($row = $result->fetch_assoc()) {
  $Assetcategoryid = $row['Assetcategoryid'];
  $Assetcategory = $row['Assetcategory'];
  $optionsHtml .= "<option value='$Assetcategoryid'>$Assetcategory</option>";
}

}


if(isset($_POST['Asset'])=='2')
{

if(isset($_POST['assetCategoryId'])) {
  $Assetcategoryid = $_POST['assetCategoryId'];
  $query = "SELECT  * FROM indsys1058assetlists where Clientid='$Clientid' AND Assetcategoryid='$Assetcategoryid' AND Activestatus='Active' AND  Assetlistid NOT IN (SELECT Assetlistid FROM indsys1034employeeitemchecklist  where Clientid ='$Clientid' AND Status='Allocated' AND Assetlistid IS NOT NULL)";
$result = $conn->query($query);
$assetLists = array();
while ($row = $result->fetch_assoc()) {
    $assetLists[] = $row;
}

 $optionsHtml= json_encode($assetLists);

// while ($row = $result->fetch_assoc()) {
//   $Assetlistid = $row['Assetlistid'];
//   $Assetname = $row['Assetname'];
//   $optionsHtml .= "<option value='$Assetlistid'>$Assetname</option>";
// }


}
}

if(isset($_POST['Asset'])=='3' )
{

if(isset($_POST['assetCategoryId']) && isset($_POST['assetListId'])) {
  $Assetcategoryid = $_POST['assetCategoryId'];
  $assetListId = $_POST['assetListId'];
  $query = "SELECT * FROM indsys1058assetlists Where Clientid='$Clientid' AND Assetcategoryid='$Assetcategoryid' AND Assetlistid='$assetListId'";
$result = $conn->query($query);

$optionsHtml = "";
while ($row = $result->fetch_assoc()) {
  $Assetcode = $row['Assetshortcode'];
  
  $optionsHtml = $Assetcode;
}


}

}

echo $optionsHtml;
?>


