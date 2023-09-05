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
      $Sessionid = $_SESSION["SESSIONID"];
   
      $_SESSION["Tittle"] ="Assetcategory";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];

  $Assetcategory = '';
  if(isset($form_data['Assetcategory']))
  {
$Assetcategory=$form_data['Assetcategory'];
  }
  $data01 = array();
  
if($MethodGet == 'Save')
{



  if(empty($Assetcategory))
  {

$Message = "Empty";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
$Shortcode = $form_data['Shortcode'];
if(empty($Shortcode))
{

$Message = "Shortcode";

  $Display=array('Message' =>$Message);

  $str = json_encode($Display);
 echo trim($str, '"');
 return;
}

  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
 
  }
  $resultExists = "SELECT Assetcategory FROM indsys1058assetcategory WHERE Assetcategory = '$Assetcategory' AND Clientid = '$Clientid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    

    $Message ="Exists";
 
  }

  else
  {
      
    $sqlsave = "INSERT IGNORE INTO indsys1058assetcategory (Clientid,Assetcategory,Userid,Addormodifydatetime,Itemcount,Shortcode,Activestatus) VALUES ('$Clientid','$Assetcategory','$user_id','$date',0,'$Shortcode','Active')";
    $resultsave = mysqli_query($conn,$sqlsave);
    if($resultsave===TRUE)
    {
    $Message ="Data Saved";
    }
 
 }




 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}

if($MethodGet == 'Change')
{


                  $GetRegion = "SELECT
                  ac.Assetcategoryid,
                  ac.Clientid,
                  ac.Assetcategory,
                  ac.Userid,
                  ac.Addormodifydatetime,
                  ac.Itemcount,
                  ac.Shortcode,
                  ac.Activestatus,
                  
                  CASE 
                      WHEN (SELECT COUNT(*) FROM indsys1034employeeitemchecklist eic WHERE ac.Assetcategoryid = eic.Assetcategoryid AND ac.Clientid = eic.Clientid) > 1 THEN 1
                      ELSE (SELECT COUNT(*) FROM indsys1034employeeitemchecklist eic WHERE ac.Assetcategoryid = eic.Assetcategoryid AND ac.Clientid = eic.Clientid)
                  END AS EmployeeItemCount,
                  
                  (SELECT COUNT(*) FROM indsys1058assetlists al WHERE ac.Assetcategoryid = al.Assetcategoryid AND ac.Clientid = al.Clientid) AS AssetListCount
                FROM
                  indsys1058assetcategory ac
                JOIN (
                  SELECT Clientid, MIN(Assetcategoryid) AS Assetcategoryid
                  FROM indsys1058assetcategory Where Clientid = '$Clientid' AND Assetcategory Like '%".$Assetcategory."%'
                  GROUP BY Clientid, Assetcategory
                ) min_ac ON ac.Clientid = min_ac.Clientid AND ac.Assetcategoryid = min_ac.Assetcategoryid 
                GROUP BY
                  ac.Assetcategoryid, ac.Clientid, ac.Assetcategory, ac.Userid, ac.Addormodifydatetime, ac.Itemcount, ac.Shortcode ";

  // $GetRegion = "SELECT * FROM indsys1058assetcategory WHERE Assetcategory Like '%".$Assetcategory."%' AND Clientid = '$Clientid'  ORDER BY Assetcategory";
    $result_Region = $conn->query($GetRegion);

    
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;  
      } 
    }
        header('Content-Type: application/json');
    echo json_encode($data01);
 
 
 
}
if($MethodGet == 'ALL')
{
   $GetRegion = "SELECT
   ac.Assetcategoryid,
   ac.Clientid,
   ac.Assetcategory,
   ac.Userid,
   ac.Addormodifydatetime,
   ac.Itemcount,
   ac.Shortcode,
   ac.Activestatus,
  
   CASE 
       WHEN (SELECT COUNT(*) FROM indsys1034employeeitemchecklist eic WHERE ac.Assetcategoryid = eic.Assetcategoryid AND ac.Clientid = eic.Clientid) > 1 THEN 1
       ELSE (SELECT COUNT(*) FROM indsys1034employeeitemchecklist eic WHERE ac.Assetcategoryid = eic.Assetcategoryid AND ac.Clientid = eic.Clientid)
   END AS EmployeeItemCount,
   
   (SELECT COUNT(*) FROM indsys1058assetlists al WHERE ac.Assetcategoryid = al.Assetcategoryid AND ac.Clientid = al.Clientid) AS AssetListCount
FROM
   indsys1058assetcategory ac
JOIN (
   SELECT Clientid, MIN(Assetcategoryid) AS Assetcategoryid
   FROM indsys1058assetcategory Where Clientid = '$Clientid'
   GROUP BY Clientid, Assetcategory
) min_ac ON ac.Clientid = min_ac.Clientid AND ac.Assetcategoryid = min_ac.Assetcategoryid 
GROUP BY
   ac.Assetcategoryid, ac.Clientid, ac.Assetcategory, ac.Userid, ac.Addormodifydatetime, ac.Itemcount, ac.Shortcode ";


    $result_Region = $conn->query($GetRegion);


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

$Assetcategoryid = $form_data['Assetcategoryid'];






  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "DELETE FROM indsys1058assetcategory WHERE Assetcategoryid = '$Assetcategoryid' AND Clientid = '$Clientid' ";
  $resultExists01 = $conn->query($resultExists);

    if($resultExists01===TRUE)
    {
    $Message ="Delete";
 
    }

 


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}


if($MethodGet == 'PageSession')
{

    $Message =$Sessionid;

    






 
    $Display=array(
        'Message'=>  $Message,
      
    );
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
}

if($MethodGet =="ActiveDeactive")
{
  $Assetcategoryid = $form_data['Assetcategoryid'];
  $Activestatus = $form_data['Activestatus'];
  if($Activestatus =="Active")
  {
    $Status = "Deactive";
  }
  if($Activestatus =="Deactive")
  {
    $Status = "Active";
  }

  $updateqry = "UPDATE indsys1058assetcategory SET Activestatus='$Status' Where Clientid ='$Clientid' AND Assetcategoryid='$Assetcategoryid' ";
  $updateqryresult = $conn->query($updateqry);
  if($updateqryresult===TRUE)
  {

    $updateqrylist = "UPDATE indsys1058assetlists SET Activestatus='$Status' Where Clientid ='$Clientid' AND Assetcategoryid='$Assetcategoryid' ";
    $updateqryresultlist = $conn->query($updateqrylist);
    if($updateqryresultlist ===TRUE)
    {
    $Message ="Update";
    }
  }

  
  $Display=array(
    'Message'=>  $Message,
  
);
$str = json_encode($Display);
echo trim($str, '"');
return;
}


if($MethodGet == 'DeleteList')
{

$Assetcategoryid = $form_data['Assetcategoryid'];






  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "DELETE FROM indsys1058assetcategory WHERE Assetcategoryid = '$Assetcategoryid' AND Clientid = '$Clientid' ";
  $resultExists01 = $conn->query($resultExists);

    if($resultExists01===TRUE)
    {

    $resultExistslist = "DELETE FROM indsys1058assetlists WHERE Assetcategoryid = '$Assetcategoryid' AND Clientid = '$Clientid' ";
    $resultExistsexist = $conn->query($resultExistslist);
    if($resultExistsexist ===TRUE)
    {
      $Message ="Delete";
    }
    }

 


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}


// if($MethodGet == 'PRINTLIST')
// {

// $Assetcategoryid = $form_data['Assetcategoryid'];
//    if (mysqli_connect_errno()){
//     $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
//   }
//   $width =100;
//   $height = 500;
//   $pageLayout = array($width, $height); //  or array($height, $width) 
//   $pdf = new TCPDF('p', 'pt', $pageLayout, true, 'UTF-8', false);
//   //$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//   // Set document information
//   $pdf->SetCreator('INDSYS');
//   $pdf->SetAuthor('INDSYS');
//   $pdf->SetTitle('Assets Barcode');
//   $pdf->SetSubject('Barcodes');
//   $pdf->SetKeywords('TCPDF, Barcode, Code 128');
  
//   // Add a page
//   $pdf->AddPage();

//   $GetState = "SELECT
//    al.Assetlistid,
//    al.Clientid,
//    ac.Assetcategoryid,
//    ac.Assetcategory ,
//    al.Assetshortcode,
//    al.Assetcode,
//    al.Assetname,
//    al.Activestatus,
//    ac.Activestatus AS Categoryactivestatus,
//    IF(COUNT(eic.Assetlistid) > 0, 1, 0) AS AssignedCount
// FROM indsys1058assetlists al 
// LEFT JOIN indsys1034employeeitemchecklist eic ON al.Assetlistid = eic.Assetlistid AND al.Clientid = eic.Clientid
// JOIN indsys1058assetcategory ac ON al.Assetcategoryid = ac.Assetcategoryid AND al.Clientid = ac.Clientid  Where al.Clientid='$Clientid' AND ac.Assetcategoryid='$Assetcategoryid'
// GROUP BY al.Assetlistid, al.Clientid, ac.Assetcategoryid, ac.Assetcategory, ac.Activestatus;";
//   $resultExists01 = $conn->query($GetState);

//   if(mysqli_num_rows($resultExists01) > 0) { 
//     while($row = mysqli_fetch_array($resultExists01)) {  
//       $Assetshortcode= $row['Assetlistid'];
//       $Shortcode = $row['Shortcode'];

//       $Code = "$Shortcode-$Assetshortcode";

      
//       $pdf->write1DBarcode($Code, 'C128', '', '', '', 18, 0.4, $style=array(), 'N');
//       $pdf->Ln(15);
//       } 
//     }
//  $pdf->Output('code128_barcodes.pdf', 'I');
//  exit;

    
 
     
// }



if($MethodGet == 'PRINTLIST')
{

$Assetcategoryid = $form_data['Assetcategoryid'];
 
$generator = new BarcodeGeneratorPNG();
$directory4 = "../$Clientid/";
$directory3 = "../$Clientid/AssetCategory/";

$directory = "../$Clientid/AssetCategory/$Assetcategoryid/";

if(!is_dir($directory4)){mkdir($directory4, 0777);}
if(!is_dir($directory3)){mkdir($directory3, 0777);}

if(!is_dir($directory)){mkdir($directory, 0777);}
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
   ac.Activestatus AS Categoryactivestatus,
   IF(COUNT(eic.Assetlistid) > 0, 1, 0) AS AssignedCount
FROM indsys1058assetlists al 
LEFT JOIN indsys1034employeeitemchecklist eic ON al.Assetlistid = eic.Assetlistid AND al.Clientid = eic.Clientid
JOIN indsys1058assetcategory ac ON al.Assetcategoryid = ac.Assetcategoryid AND al.Clientid = ac.Clientid  Where al.Clientid='$Clientid' AND ac.Assetcategoryid='$Assetcategoryid' AND al.Activestatus='Active'
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

  

    echo json_encode($barcodes);
 
     
}


?>




        
