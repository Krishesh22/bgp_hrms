<?php
include '../config.php';
include '../session.php';
include '../Picqer/vendor/autoload.php';
use Picqer\Barcode\BarcodeGeneratorPNG;


session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
 
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];

  $data01 = array();
  
if($MethodGet == 'Save')
{


$Assetcategoryid = $form_data['Assetcategoryid'];
$Assetcode = $form_data['Assetcode'];
$Assetname = $form_data['Assetname'];
$Shortcode = $form_data['Shortcode'];
$Assetlistid = 0;
  if(empty($Assetcategoryid))
  {

   $Message = "Assetcategoryid";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
  if(empty($Assetcode))
  {

    $Message = "Assetcode";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
  if(empty($Assetname))
  {

  $Message = "Assetname";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
  $Systemgenerate = "$Shortcode-$Assetcode";
  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
 
  }
  $resultExists = "SELECT * FROM indsys1058assetlists WHERE Assetcode = '$Assetcode' AND Clientid = '$Clientid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $Message ="Exists";
 
  }

  else
  {
      
    $sqlsave = "INSERT IGNORE INTO indsys1058assetlists (Clientid,Assetcode,Assetname,Userid,Addormodifydatetime,Assetcategoryid,Assetshortcode,Activestatus) VALUES ('$Clientid','$Assetcode','$Assetname','$user_id','$date','$Assetcategoryid','$Systemgenerate','Active')";
    $resultsave = mysqli_query($conn,$sqlsave);
    if($resultsave===TRUE)
    {
      $Assetlistid = $conn->insert_id;
      $Message ="Data Saved";
    }
    
 
 }

 Assetcategorycountupdate($conn,$Clientid,$Assetcategoryid,$user_id,$date);


 $Display=array('Message' =>$Message,'Assetlistid' =>$Assetlistid);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}
if($MethodGet == 'Update')
{


$Assetcategoryid = $form_data['Assetcategoryid'];
$Assetcode = $form_data['Assetcode'];
$Assetname = $form_data['Assetname'];
$Shortcode = $form_data['Shortcode'];
$Assetlistid = $form_data['Assetlistid'];
  if(empty($Assetcategoryid))
  {

   $Message = "Assetcategoryid";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
  if(empty($Assetcode))
  {

    $Message = "Assetcode";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
  if(empty($Assetname))
  {

  $Message = "Assetname";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
  $Systemgenerate = "$Shortcode-$Assetcode";
  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
 
  }
 
    $updateqry ="UPDATE indsys1058assetlists SET Assetcode='$Assetcode',Assetname='$Assetname',Assetcategoryid='$Assetcategoryid',Assetshortcode='$Systemgenerate',Userid='$user_id',Addormodifydatetime='$date' Where Clientid ='$Clientid' AND Assetlistid='$Assetlistid'";
    $resultupdate = $conn->query($updateqry);
    if($resultupdate===TRUE)
    {
      $Message ="Update";
    }  



 

 Assetcategorycountupdate($conn,$Clientid,$Assetcategoryid,$user_id,$date);


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}

function Assetcategorycountupdate($conn,$Clientid,$Assetcategoryid,$user_id,$date)
{
  $Categorycount = "Select Count(Assetcategoryid) as Categorycount FROM indsys1058assetlists Where Clientid='$Clientid' AND Assetcategoryid='$Assetcategoryid' ";
  $countcategory =mysqli_query($conn,$Categorycount);
  $testcount = mysqli_fetch_assoc($countcategory);
  $catcount =$testcount['Categorycount'];
  if(empty($catcount))
  {
    $catcount = 0;
  }

  $updateQuery = "UPDATE indsys1058assetcategory set Itemcount='$catcount',Userid='$user_id',Addormodifydatetime='$date' where Clientid='$Clientid' AND Assetcategoryid='$Assetcategoryid'";
  $executeupdatequery = $conn->query($updateQuery);
  if($executeupdatequery===TRUE)
  {

  }
}

if($MethodGet == 'ALL')
{
 

   $GetState = "SELECT
   al.Assetlistid,
   al.Clientid,
   ac.Assetcategoryid,
   ac.Assetcategory ,
   al.Assetshortcode,
   al.Assetcode,
   al.Assetname,
   al.Activestatus,
   ac.Activestatus AS Categoryactivestatus,
   IF(COUNT(eic.Assetlistid) > 0, 1, 0) AS AssignedCount
FROM indsys1058assetlists al 
LEFT JOIN indsys1034employeeitemchecklist eic ON al.Assetlistid = eic.Assetlistid AND al.Clientid = eic.Clientid
JOIN indsys1058assetcategory ac ON al.Assetcategoryid = ac.Assetcategoryid AND al.Clientid = ac.Clientid  Where al.Clientid='$Clientid'
GROUP BY al.Assetlistid, al.Clientid, ac.Assetcategoryid, ac.Assetcategory, ac.Activestatus;";
    $result_Region = $conn->query($GetState);
   
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    

    header('Content-Type: application/json');
    echo json_encode($data01);
 
 
 
}

if($MethodGet == 'Category')
{
   $GetState = "SELECT * FROM indsys1058assetcategory WHERE Clientid = '$Clientid' AND Activestatus='Active' ORDER BY Assetcategory";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    
    
    header('Content-Type: application/json');
    echo json_encode($data01);
 
 
 
}



if($MethodGet == 'Delete')
{



  
  $Assetlistid=$form_data['Assetlistid'];
  $Assetcategoryid = $form_data['Assetcategoryid'];

  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }

  $Empassetquery = "SELECT * FROM indsys1034employeeitemchecklist where Clientid='$Clientid' AND Assetlistid='$Assetlistid'";
  $Empassetqueryresult = $conn->query($Empassetquery);
  if(mysqli_num_rows($Empassetqueryresult)>0)
 {

$Message ="Allocation";
  $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    return;
 }

 $Empassetreturnquery = "SELECT * FROM indsys1034employeeitemreturnlist where Clientid='$Clientid' AND Assetlistid='$Assetlistid'";
 $Empassetreturnqueryresult = $conn->query($Empassetreturnquery);
 if(mysqli_num_rows($Empassetreturnqueryresult)>0)
 {

  $Message ="Return";
  $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    return;
 }

  $resultExists = "DELETE FROM indsys1058assetlists WHERE Assetlistid = '$Assetlistid'  AND Clientid = '$Clientid'";
  $resultExists01 = $conn->query($resultExists);
if($resultExists01===TRUE)
{
    
    $Message ="Delete";
}
else
{
  $Message="Error";
}
 
 
    Assetcategorycountupdate($conn,$Clientid,$Assetcategoryid,$user_id,$date);
 


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}

if($MethodGet =="Fetchcategory")
{
    $Assetcategoryid = $form_data['Assetcategoryid'];
    $fetchCategory = "Select * from indsys1058assetcategory where Clientid='$Clientid' AND Assetcategoryid='$Assetcategoryid'";
    $resultcategory=$conn->query($fetchCategory);
    if(mysqli_num_rows($resultcategory)>0)
    {
        while($row=mysqli_fetch_array($resultcategory))
        {
            $Shortcode = $row['Shortcode'];
            $Assetcategory=$row['Assetcategory'];

        }
    }

    $GetRegion = "SELECT *,ac.Assetcategory,ac.Shortcode FROM indsys1058assetlists al JOIN indsys1058assetcategory ac ON al.Clientid=ac.Clientid AND al.Assetcategoryid=ac.Assetcategoryid WHERE al.Clientid = '$Clientid' AND ac.Assetcategoryid='$Assetcategoryid'  ORDER BY Assetname";
    $result_Region = $conn->query($GetRegion);
   
    if(mysqli_num_rows($result_Region) > 0) { 
    
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;  
      } 
    }
   
   $mytbl["mytbl"] =$data01;
  
    $Display=array('Shortcode' =>$Shortcode,'Assetcategory' =>$Assetcategory,'data' =>$mytbl["mytbl"]);
    $str =  json_encode($Display);
    echo trim($str,'"');
}
if($MethodGet=="FetchAsset")
{
  $Assetlistid = $form_data['Assetlistid'];
  $FetchAssetlist ="SELECT * FROM indsys1058assetlists where Clientid='$Clientid' AND Assetlistid='$Assetlistid'";
  $FetchAsset = $conn->query($FetchAssetlist);
  while($row = mysqli_fetch_assoc($FetchAsset))
  {
    $Assetcode =$row['Assetcode'];
    $Assetname = $row['Assetname'];
    $Assetcategoryid = $row['Assetcategoryid'];
  } 

  $Display=array('Assetcode' =>$Assetcode,'Assetname' =>$Assetname,'Assetcategoryid' =>$Assetcategoryid);
  $str = json_encode(($Display));
  echo trim($str,'"');


}



if($MethodGet =="ActiveDeactive")
{
  $Assetlistid = $form_data['Assetlistid'];
  $Activestatus = $form_data['Activestatus'];
  if($Activestatus =="Active")
  {
    $Status = "Deactive";
  }
  if($Activestatus =="Deactive")
  {
    $Status = "Active";
  }



    $updateqrylist = "UPDATE indsys1058assetlists SET Activestatus='$Status' Where Clientid ='$Clientid' AND Assetlistid='$Assetlistid' ";
    $updateqryresultlist = $conn->query($updateqrylist);
    if($updateqryresultlist ===TRUE)
    {
    $Message ="Update";
    }


  
  $Display=array(
    'Message'=>  $Message,
  
);
$str = json_encode($Display);
echo trim($str, '"');
return;
}
if($MethodGet == 'PRINTLIST')
{

$Listedno = $form_data['Listedno'];
 
$generator = new BarcodeGeneratorPNG();
$directory4 = "../$Clientid/";


$directory = "../$Clientid/AssetBarcode/";

if(!is_dir($directory4)){mkdir($directory4, 0777);}


if(!is_dir($directory)){mkdir($directory, 0777);}

foreach($Listedno as $itemId)
{
  $GetState = "SELECT
   al.Assetlistid,
   al.Clientid,
   ac.Assetcategoryid,
   ac.Assetcategory ,
   ac.Shortcode ,
   al.Assetshortcode,
   al.Assetcode,
   al.Assetname,
   al.Activestatus,
   ac.Activestatus AS Categoryactivestatus
   
FROM indsys1058assetlists al 
JOIN indsys1058assetcategory ac ON al.Assetcategoryid = ac.Assetcategoryid AND al.Clientid = ac.Clientid  Where al.Clientid='$Clientid' AND al.Assetlistid ='$itemId'
GROUP BY al.Assetlistid, al.Clientid, ac.Assetcategoryid, ac.Assetcategory, ac.Activestatus;";
  $resultExists01 = $conn->query($GetState);

  if(mysqli_num_rows($resultExists01) > 0) { 
    while($row = mysqli_fetch_array($resultExists01)) {  
      $Assetshortcode= $row['Assetlistid'];
      $Shortcode = $row['Shortcode'];

      $Code = "$Shortcode-$Assetshortcode";
      $barcodeImage = $generator->getBarcode($Code, $generator::TYPE_CODE_128,3,120);    
      
      $imageFilePath = $directory . $Code . '.png';
      file_put_contents($imageFilePath, $barcodeImage);
      // $baseURL = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/';
      // $absoluteImagePath = $baseURL . $imageFilePath;
      $barcodes[] = array(
        'imageUrl' => $imageFilePath,
        'code' => $Code
    );
   
 
      } 
    }
  }
  

    echo json_encode($barcodes);
 
     
}
?>