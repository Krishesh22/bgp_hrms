<<<<<<< HEAD
<?php 
include '../config.php';

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];   
      $_SESSION["Tittle"] ="Employee";
$Message ='';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];
 if($MethodGet == 'EMPPROPERTYNEXT')
{


try
{

    $Employeeid =$form_data['Employeeid'];
     $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwemployeechecklistitemno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new))
        {

            $GetChapter = "SELECT * FROM vwemployeechecklistitemno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
            $result_Chapter = $conn->query($GetChapter);
            if (mysqli_num_rows($result_Chapter) > 0)
            {
                while ($row = mysqli_fetch_array($result_Chapter))
                {
                    $Sno = $row['Nextno'];

                }
            }

        }
        else
        {
            $Sno = 1;
        }



$Distributeddate = $date;

 

 $Display=array('Sno' => $Sno,
'Distributeddate' =>$Distributeddate);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}


if($MethodGet == 'EMPPROPERTYCHECKLIST')
{


try
{

    $Employeeid =$form_data['Employeeid'];
   
   
    
    $data01 =[];
   
    $GetState = "SELECT *,al.Assetcode,al.Assetname,al.Assetshortcode,ac.Assetcategory, DATE_FORMAT(ec.Distributeddate,'%d-%m-%Y') AS Distributeddate2  FROM indsys1034employeeitemchecklist ec JOIN indsys1058assetcategory ac ON ec.Clientid= ac.Clientid AND ec.Assetcategoryid=ac.Assetcategoryid JOIN indsys1058assetlists al ON ec.Clientid=al.Clientid AND ec.Assetlistid=al.Assetlistid where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' AND ec.Status='Allocated' ORDER BY ec.Employeeid";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 




 

    header('Content-Type: application/json');
    echo json_encode($data01);
}
catch(Exception $e)
{

}
 
     
}

////////////////////////////
if($MethodGet == 'EMPASSETLIST')
{


try
{

    $Employeeid =$form_data['Employeeid'];
   
   
    
    $data01 =[];
   
    $GetState = "SELECT *,DATE_FORMAT(ec.Receiveddatetime,'%d-%m-%Y %H:%i:%s') AS LogDatetime   FROM indsys1034employeeitemloglist ec  where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' ORDER BY ec.Employeeid";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 




 

    header('Content-Type: application/json');
    echo json_encode($data01);
}
catch(Exception $e)
{

}
 
     
}

////////////////////////////////
if($MethodGet == 'FetchProperty')
{

    try
    { 
    
  

      $Employeeid =$form_data['Employeeid'];
      $CheckitemSno =$form_data['CheckitemSno'];
      $_SESSION["Employeeid"] = $Employeeid;
    $GetChapter = "SELECT * FROM indsys1034employeeitemchecklist where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$CheckitemSno' ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Propertychecklistitemimage =$row['Propertychecklistitemimage'];
      $Distributeddate =$row['Distributeddate'];
      $Qtyitem = $row['Qtyitem'];
      $Particulars = $row['Particulars'];
      $Assetlistid = $row['Assetlistid'];
      $Assetcategoryid = $row['Assetcategoryid'];
     
    
     
     
     
      } 
    }


 
    
    $Display=array(
      'Propertychecklistitemimage'=>  $Propertychecklistitemimage,
      'Distributeddate'=> $Distributeddate,
      'Qtyitem'=> $Qtyitem,
      'Particulars'=>  $Particulars,
      'Assetlistid' =>$Assetlistid,
      'Assetcategoryid' =>$Assetcategoryid
      
     
     
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
 return;
}
catch(Exception $e)
{

}
}
//////////////////////////////////////////////////////
if($MethodGet == 'Propertyupdate')
{


try
{
    
    $Employeeid =$form_data['Employeeid'];
    $CheckitemSno =$form_data['CheckitemSno'];
    $Distributeddate =$form_data['Distributeddate'];
    $Particulars=$form_data['Particulars'];
    $Qtyitem=$form_data['Qtyitem'];
    $Assetlistid = $form_data['Assetlistid'];
    $Assetcategoryid = $form_data['Assetcategoryid'];
   
    if(empty($Assetcategoryid))
    {
  
    $Message = "Categoryid";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }

    if(empty($Assetlistid))
    {
  
    $Message = "AssetDetails";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }







  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }

  $resultExists = "SELECT Employeeid FROM indsys1034employeeitemchecklist WHERE Employeeid = '$Employeeid' AND Sno='$CheckitemSno'AND Clientid = '$Clientid'  LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {
  $resultExists = "Update indsys1034employeeitemchecklist set 

  Distributeddate ='$Distributeddate',
  Particulars ='$Particulars',
  Qtyitem ='$Qtyitem', 
  Assetlistid='$Assetlistid',
  Assetcategoryid='$Assetcategoryid',
  Userid ='$user_id',
  Addormodifydatetime='$date'    
     WHERE Employeeid = '$Employeeid' and Sno ='$CheckitemSno' AND Clientid = '$Clientid' ";
  $resultExists01 = $conn->query($resultExists);


  
  $Message ="Update";



  }
  else
  {
        $sqlsave = "INSERT IGNORE INTO indsys1034employeeitemchecklist (Clientid,Employeeid,Sno,Distributeddate,Particulars,Userid,Addormodifydatetime,Qtyitem,Assetlistid,Assetcategoryid,Status,Allocatedby,Allocateddatetime)
        VALUES ('$Clientid','$Employeeid','$CheckitemSno','$Distributeddate','$Particulars','$user_id','$date','$Qtyitem','$Assetlistid','$Assetcategoryid','Allocated','$user_id','$date')";
           $resultsave = mysqli_query($conn, $sqlsave);

           

        // $resultExists01 = $conn->query($resultExists);
        $Message ="Exists";
      
  }


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
return;
}
catch(Exception $e)
{

}
 
     
}
////////////////
if($MethodGet == 'PropertyDelete')
{
  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }


  $Employeeid =$form_data['Employeeid'];
  $Sno =$form_data['Sno'];
   $GetChapter = "SELECT * FROM indsys1034employeeitemchecklist where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$Sno' ORDER BY Employeeid";
   $result_Chapter = $conn->query($GetChapter );
   if(mysqli_num_rows($result_Chapter) > 0) { 


   while($row = mysqli_fetch_array($result_Chapter)) {  
  
     $Documentpath = $row['Propertychecklistitemimage'];
  
    
    
    
     } 
   }
  $resultExists = "DELETE FROM indsys1034employeeitemchecklist WHERE Employeeid = '$Employeeid' and Sno='$Sno' AND Clientid = '$Clientid' ";
  $resultExists01 = $conn->query($resultExists);
  if(empty($Documentpath))
  {

  }
  else
  {
  unlink($Documentpath);
  }
    
    $Message ="Delete";
 
 

 





 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}
/////////////////////////////////////////////
if($MethodGet=='AssetCategory')
{
  $GetCategory = "SELECT * FROM indsys1058assetcategory Where Clientid='$Clientid' Order By Assetcategory";
  $Categorylist = $conn->query($GetCategory);
  if(mysqli_num_rows($Categorylist)>0)
  {
    while($row = mysqli_fetch_array($Categorylist))
    {
      $data[]=$row;
    }
  }
  $mytbl['mytbl'] = $data;
  $Display = array('mytbl' =>$mytbl['mytbl']);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}

if($MethodGet=='AssetCategoryList')
{
  $Assetcategoryid= $form_data['Assetcategoryid'];

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
  $mytbl['mytbl'] = $data01;
  $Display = array('Shortcode' =>$Shortcode,'Assetcategory' =>$Assetcategory,'mytbl' =>$mytbl['mytbl']);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}

if($MethodGet=='AssetName')
{
  $Assetlistid= $form_data['Assetlistid'];

  $fetchCategory = "Select * from indsys1058assetlists where Clientid='$Clientid' AND Assetlistid='$Assetlistid'";
  $resultcategory=$conn->query($fetchCategory);
  if(mysqli_num_rows($resultcategory)>0)
  {
      while($row=mysqli_fetch_array($resultcategory))
      {
          $Assetcode = $row['Assetshortcode'];
          $Assetname=$row['Assetname'];

      }
  }

  $Display = array('Assetname' =>$Assetname,'Assetcode' =>$Assetcode);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}
//////////////////////////
if($MethodGet=='AssetReturn')
{
  $Employeeid= $form_data['Employeeid'];
  $Listedno= $form_data['Listedno'];
  $Itemcount = 0;




  $commaSeparatedAssetListIds = "";
  $Itemsnodetail = "";
  foreach($Listedno as $itemId)
  {

    $GetChapter = "SELECT * FROM indsys1034employeeitemchecklist where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$itemId' ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Propertychecklistitemimage =$row['Propertychecklistitemimage'];
      $Distributeddate =$row['Distributeddate'];
      $Qtyitem = $row['Qtyitem'];
      $Particulars = $row['Particulars'];
      $Assetlistid = $row['Assetlistid'];
      $Assetcategoryid = $row['Assetcategoryid'];
      $sno = $row['Sno'];
        $Itemcount++;
        $Itemsnodetail .= ($Itemsnodetail ? ',' : '') . $sno;
        $commaSeparatedAssetListIds .= ($commaSeparatedAssetListIds ? ',' : '') . $Assetlistid;
        
      $sqlsave = "INSERT IGNORE INTO indsys1034employeeitemreturnlist (Clientid,Employeeid,Distributeddate,Particulars,Userid,Addormodifydatetime,Qtyitem,Assetlistid,Assetcategoryid,Receivedby,Receiveddatetime,Sno,Status)
        VALUES ('$Clientid','$Employeeid','$Distributeddate','$Particulars','$user_id','$date','$Qtyitem','$Assetlistid','$Assetcategoryid','$user_id','$date','$itemId','Return')";
           $resultsave = mysqli_query($conn, $sqlsave);
    
     if($resultsave===TRUE)
     
     {
      $resultExists = "Update indsys1034employeeitemchecklist set 

      Status ='Return',
      Returndate ='$date',      
      Userid ='$user_id',
      Addormodifydatetime='$date'
    
        
         WHERE Employeeid = '$Employeeid' and Sno ='$itemId' AND Clientid = '$Clientid' ";
      $resultExists01 = $conn->query($resultExists);
    
    
      
      $Message ="Update";
     }
     else
     {
      echo "$sqlsave<br/>";
     }
     
  
      } 



    }
  }
  if($Itemcount !=0)
  {
    
    $Assettype="R";
   $Mode="Return";
   $username=$_SESSION["Username"];

   AssetLog($conn,$Clientid,$user_id,$Itemcount,$Mode,$username,$Employeeid,$Assettype,$commaSeparatedAssetListIds);
  }
  $GetState = "SELECT *,al.Assetcode,al.Assetname,al.Assetshortcode,ac.Assetcategory, DATE_FORMAT(ec.Distributeddate,'%d-%m-%Y') AS Distributeddate2,DATE_FORMAT(ec.Receiveddatetime,'%d-%m-%Y') AS Receiveddatetime2  FROM indsys1034employeeitemreturnlist ec JOIN indsys1058assetcategory ac ON ec.Clientid= ac.Clientid AND ec.Assetcategoryid=ac.Assetcategoryid JOIN indsys1058assetlists al ON ec.Clientid=al.Clientid AND ec.Assetlistid=al.Assetlistid where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' ORDER BY ec.Employeeid";
  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $data01[] = $row;
    } 
  }      
  $mytbl['mytbl'] =$data01;
  $Display = array('mytbl' =>$mytbl['mytbl'] ,'Itemsnodetail' =>$Itemsnodetail);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;


}

if($MethodGet=='ReturnList')
{
  $Employeeid= $form_data['Employeeid'];
  $GetState = "SELECT *,al.Assetcode,al.Assetname,al.Assetshortcode,ac.Assetcategory, DATE_FORMAT(ec.Distributeddate,'%d-%m-%Y') AS Distributeddate2,DATE_FORMAT(ec.Receiveddatetime,'%d-%m-%Y') AS Receiveddate2  FROM indsys1034employeeitemreturnlist ec JOIN indsys1058assetcategory ac ON ec.Clientid= ac.Clientid AND ec.Assetcategoryid=ac.Assetcategoryid JOIN indsys1058assetlists al ON ec.Clientid=al.Clientid AND ec.Assetlistid=al.Assetlistid where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' AND ec.Status='Return' ORDER BY ec.Employeeid";
  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $data01[] = $row;
    } 
  }      
$mytbl['mytbl'] =$data01;
  $Display = array('mytbl' =>$mytbl['mytbl']);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}


function AssetLog($conn,$Clientid,$user_id,$Itemcount,$Mode,$username,$Employeeid,$Assettype,$Listedno)
{
  $Logofilepath = "";
  $date = date("Y-m-d H:i:s");
  if($Assettype=='R')
  {
    $selectemp = "SELECT * FROM indsys1017employeemaster where Clientid='$Clientid' AND Employeeid='$Employeeid'";
    $fetchemp = $conn ->query($selectemp);
    while($rowemp = mysqli_fetch_array($fetchemp)) {  
      $username = $rowemp['Fullname'];
    }

  }
  $assetnotes = "$Itemcount - Assets, $Mode by $username";
  $SaveLog = "INSERT IGNORE INTO indsys1034employeeitemloglist (Employeeid,Clientid,Notes,Userid,Addormodifydatetime,Assetdocumentpath,Assettype,Receivedby,Receiveddatetime,Asselistid)VALUES('$Employeeid','$Clientid','$assetnotes','$user_id','$date','$Logofilepath','$Assettype','$user_id','$date','$Listedno')";

  $Saveresult = $conn->query($SaveLog);
  if($Saveresult===TRUE)
  {
      $Display = array('status' =>"success");
  }
}
if($MethodGet=='AssetPrint')
{
  $Employeeid= $form_data['Employeeid'];
  $Listedno= $form_data['Listedno'];
  $Testno = $form_data['Testno'];
  if($Testno==0)
  {
  
    $Category = $Listedno;
  }
  else
  {
    $Categoryarray = implode(',', $Listedno); 
    $Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
    $Category = str_replace(",","','","$Categoryarray");
  }


  $GetState = "SELECT *,al.Assetcode,al.Assetname,al.Assetshortcode,ac.Assetcategory, DATE_FORMAT(ec.Distributeddate,'%d-%m-%Y') AS Distributeddate2 FROM indsys1034employeeitemchecklist ec JOIN indsys1058assetcategory ac ON ec.Clientid= ac.Clientid AND ec.Assetcategoryid=ac.Assetcategoryid JOIN indsys1058assetlists al ON ec.Clientid=al.Clientid AND ec.Assetlistid=al.Assetlistid where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' AND  ec.Sno in($Category)  ORDER BY ec.Employeeid";

  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $data01[] = $row;
    } 
  }      
$mytbl['mytbl'] =$data01;
  $Display = array('mytbl' =>$mytbl['mytbl']);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}


if($MethodGet=='ReturnAssetPrint')
{
  $Employeeid= $form_data['Employeeid'];
  $Listedno= $form_data['Listedno'];

  $Testno = $form_data['Testno'];
  if($Testno==0)
  {
  
    $Category = $Listedno;
  }
  else
  {
    $Categoryarray = implode(',', $Listedno); 
    $Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
    $Category = str_replace(",","','","$Categoryarray");
  }
  $GetState = "SELECT *,al.Assetcode,al.Assetname,al.Assetshortcode,ac.Assetcategory, DATE_FORMAT(ec.Distributeddate,'%d-%m-%Y') AS Distributeddate2 FROM indsys1034employeeitemreturnlist ec JOIN indsys1058assetcategory ac ON ec.Clientid= ac.Clientid AND ec.Assetcategoryid=ac.Assetcategoryid JOIN indsys1058assetlists al ON ec.Clientid=al.Clientid AND ec.Assetlistid=al.Assetlistid where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' AND  ec.Returnid in($Category)  ORDER BY ec.Employeeid";

  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $data01[] = $row;
    } 
  }      
$mytbl['mytbl'] =$data01;
  $Display = array('mytbl' =>$mytbl['mytbl']);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}

if($MethodGet=='AssetReallocation')
{
  $Employeeid= $form_data['Employeeid'];
  $Listedno= $form_data['Listedno'];
  $Itemcount = 0;
  $commaSeparatedAssetListIds = "";
  $Itemsnodetai = "";
  foreach($Listedno as $itemId)
  {

    $GetChapter = "SELECT * FROM indsys1034employeeitemreturnlist where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Returnid='$itemId' ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Propertychecklistitemimage =$row['Propertychecklistitemimage'];
      $Distributeddate =$row['Distributeddate'];
      $Qtyitem = $row['Qtyitem'];
      $Particulars = $row['Particulars'];
      $Assetlistid = $row['Assetlistid'];
      $Assetcategoryid = $row['Assetcategoryid'];
      $commaSeparatedAssetListIds .= ($commaSeparatedAssetListIds ? ',' : '') . $Assetlistid;
      $Itemsnodetail .= ($Itemsnodetail ? ',' : '') . $itemId;
      $Sno = 0;
      $Itemcount++;
      $resultExistsnew = "SELECT Nextno FROM vwemployeechecklistitemno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
      $resultExists01new = $conn->query($resultExistsnew);
      if (mysqli_fetch_row($resultExists01new))
      {

          $GetChapter = "SELECT * FROM vwemployeechecklistitemno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
          $result_Chapter = $conn->query($GetChapter);
          if (mysqli_num_rows($result_Chapter) > 0)
          {
              while ($row = mysqli_fetch_array($result_Chapter))
              {
                  $Sno = $row['Nextno'];

              }
          }

      }
      
      $sqlsave = "INSERT IGNORE INTO indsys1034employeeitemchecklist (Clientid,Employeeid,Distributeddate,Particulars,Userid,Addormodifydatetime,Qtyitem,Assetlistid,Assetcategoryid,Allocatedby,Allocateddatetime,Sno,Status)
        VALUES ('$Clientid','$Employeeid','$Distributeddate','$Particulars','$user_id','$date','$Qtyitem','$Assetlistid','$Assetcategoryid','$user_id','$date','$Sno','Allocated')";
           $resultsave = mysqli_query($conn, $sqlsave);
    
     if($resultsave===TRUE)
     
     {
     
    
      $resultExists = "Update indsys1034employeeitemreturnlist set 

      Status ='Allocate',
      Allocatedatetime ='$date',      
      Allocatedby ='$user_id',
      Addormodifydatetime='$date'
    
        
         WHERE Employeeid = '$Employeeid' and Returnid ='$itemId' AND Clientid = '$Clientid' ";
      $resultExists01 = $conn->query($resultExists);
    
      
      $Message ="Update";
     }
     else
     {
      echo "$sqlsave<br/>";
     }
         
    
     
      } 



    }
  }


   
  if($Itemcount !=0)
  {
   $Assettype="A";
   $Mode="Allocated";
   $username=$_SESSION["Username"];
   
   AssetLog($conn,$Clientid,$user_id,$Itemcount,$Mode,$username,$Employeeid,$Assettype,$commaSeparatedAssetListIds);
  }
  $GetState = "SELECT *,al.Assetcode,al.Assetname,al.Assetshortcode,ac.Assetcategory, DATE_FORMAT(ec.Distributeddate,'%d-%m-%Y') AS Distributeddate2,DATE_FORMAT(ec.Receiveddatetime,'%d-%m-%Y') AS Receiveddatetime2  FROM indsys1034employeeitemreturnlist ec JOIN indsys1058assetcategory ac ON ec.Clientid= ac.Clientid AND ec.Assetcategoryid=ac.Assetcategoryid JOIN indsys1058assetlists al ON ec.Clientid=al.Clientid AND ec.Assetlistid=al.Assetlistid where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' ORDER BY ec.Employeeid";
  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $data01[] = $row;
    } 
  }      
$mytbl['mytbl'] =$data01;
  $Display = array('mytbl' =>$mytbl['mytbl'],'Itemsnodetail' =>$Itemsnodetail);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;


}


if($MethodGet=='EMPLOGLIST')
{
  $Employeeid= $form_data['Employeeid'];
  $Assetlistids = $form_data['Assetlistids'];
  $GetRegion = "SELECT *,ac.Assetcategory,ac.Shortcode FROM indsys1058assetlists al JOIN indsys1058assetcategory ac ON al.Clientid=ac.Clientid AND  al.Assetcategoryid= ac.Assetcategoryid WHERE al.Clientid = '$Clientid' AND al.Assetlistid IN($Assetlistids)  ORDER BY Assetname";
  $result_Region = $conn->query($GetRegion);

  if(mysqli_num_rows($result_Region) > 0) { 
  
  while($row = mysqli_fetch_array($result_Region)) {  
    $data01[] = $row;  
    } 
  }      
$mytbl['mytbl'] =$data01;
  $Display = array('mytbl' =>$mytbl['mytbl']);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}
=======
<?php 
include '../config.php';

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];   
      $_SESSION["Tittle"] ="Employee";
$Message ='';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];
 if($MethodGet == 'EMPPROPERTYNEXT')
{


try
{

    $Employeeid =$form_data['Employeeid'];
     $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwemployeechecklistitemno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new))
        {

            $GetChapter = "SELECT * FROM vwemployeechecklistitemno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
            $result_Chapter = $conn->query($GetChapter);
            if (mysqli_num_rows($result_Chapter) > 0)
            {
                while ($row = mysqli_fetch_array($result_Chapter))
                {
                    $Sno = $row['Nextno'];

                }
            }

        }
        else
        {
            $Sno = 1;
        }



$Distributeddate = $date;

 

 $Display=array('Sno' => $Sno,
'Distributeddate' =>$Distributeddate);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}


if($MethodGet == 'EMPPROPERTYCHECKLIST')
{


try
{

    $Employeeid =$form_data['Employeeid'];
   
   
    
    $data01 =[];
   
    $GetState = "SELECT *,al.Assetcode,al.Assetname,al.Assetshortcode,ac.Assetcategory, DATE_FORMAT(ec.Distributeddate,'%d-%m-%Y') AS Distributeddate2  FROM indsys1034employeeitemchecklist ec JOIN indsys1058assetcategory ac ON ec.Clientid= ac.Clientid AND ec.Assetcategoryid=ac.Assetcategoryid JOIN indsys1058assetlists al ON ec.Clientid=al.Clientid AND ec.Assetlistid=al.Assetlistid where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' AND ec.Status='Allocated' ORDER BY ec.Employeeid";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 




 

    header('Content-Type: application/json');
    echo json_encode($data01);
}
catch(Exception $e)
{

}
 
     
}

////////////////////////////
if($MethodGet == 'EMPASSETLIST')
{


try
{

    $Employeeid =$form_data['Employeeid'];
   
   
    
    $data01 =[];
   
    $GetState = "SELECT *,DATE_FORMAT(ec.Receiveddatetime,'%d-%m-%Y %H:%i:%s') AS LogDatetime   FROM indsys1034employeeitemloglist ec  where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' ORDER BY ec.Employeeid";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 




 

    header('Content-Type: application/json');
    echo json_encode($data01);
}
catch(Exception $e)
{

}
 
     
}

////////////////////////////////
if($MethodGet == 'FetchProperty')
{

    try
    { 
    
  

      $Employeeid =$form_data['Employeeid'];
      $CheckitemSno =$form_data['CheckitemSno'];
      $_SESSION["Employeeid"] = $Employeeid;
    $GetChapter = "SELECT * FROM indsys1034employeeitemchecklist where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$CheckitemSno' ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Propertychecklistitemimage =$row['Propertychecklistitemimage'];
      $Distributeddate =$row['Distributeddate'];
      $Qtyitem = $row['Qtyitem'];
      $Particulars = $row['Particulars'];
      $Assetlistid = $row['Assetlistid'];
      $Assetcategoryid = $row['Assetcategoryid'];
     
    
     
     
     
      } 
    }


 
    
    $Display=array(
      'Propertychecklistitemimage'=>  $Propertychecklistitemimage,
      'Distributeddate'=> $Distributeddate,
      'Qtyitem'=> $Qtyitem,
      'Particulars'=>  $Particulars,
      'Assetlistid' =>$Assetlistid,
      'Assetcategoryid' =>$Assetcategoryid
      
     
     
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
 return;
}
catch(Exception $e)
{

}
}
//////////////////////////////////////////////////////
if($MethodGet == 'Propertyupdate')
{


try
{
    
    $Employeeid =$form_data['Employeeid'];
    $CheckitemSno =$form_data['CheckitemSno'];
    $Distributeddate =$form_data['Distributeddate'];
    $Particulars=$form_data['Particulars'];
    $Qtyitem=$form_data['Qtyitem'];
    $Assetlistid = $form_data['Assetlistid'];
    $Assetcategoryid = $form_data['Assetcategoryid'];
   
    if(empty($Assetcategoryid))
    {
  
    $Message = "Categoryid";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }

    if(empty($Assetlistid))
    {
  
    $Message = "AssetDetails";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }







  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }

  $resultExists = "SELECT Employeeid FROM indsys1034employeeitemchecklist WHERE Employeeid = '$Employeeid' AND Sno='$CheckitemSno'AND Clientid = '$Clientid'  LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {
  $resultExists = "Update indsys1034employeeitemchecklist set 

  Distributeddate ='$Distributeddate',
  Particulars ='$Particulars',
  Qtyitem ='$Qtyitem', 
  Assetlistid='$Assetlistid',
  Assetcategoryid='$Assetcategoryid',
  Userid ='$user_id',
  Addormodifydatetime='$date'    
     WHERE Employeeid = '$Employeeid' and Sno ='$CheckitemSno' AND Clientid = '$Clientid' ";
  $resultExists01 = $conn->query($resultExists);


  
  $Message ="Update";



  }
  else
  {
        $sqlsave = "INSERT IGNORE INTO indsys1034employeeitemchecklist (Clientid,Employeeid,Sno,Distributeddate,Particulars,Userid,Addormodifydatetime,Qtyitem,Assetlistid,Assetcategoryid,Status,Allocatedby,Allocateddatetime)
        VALUES ('$Clientid','$Employeeid','$CheckitemSno','$Distributeddate','$Particulars','$user_id','$date','$Qtyitem','$Assetlistid','$Assetcategoryid','Allocated','$user_id','$date')";
           $resultsave = mysqli_query($conn, $sqlsave);

           

        // $resultExists01 = $conn->query($resultExists);
        $Message ="Exists";
      
  }


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
return;
}
catch(Exception $e)
{

}
 
     
}
////////////////
if($MethodGet == 'PropertyDelete')
{
  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }


  $Employeeid =$form_data['Employeeid'];
  $Sno =$form_data['Sno'];
   $GetChapter = "SELECT * FROM indsys1034employeeitemchecklist where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$Sno' ORDER BY Employeeid";
   $result_Chapter = $conn->query($GetChapter );
   if(mysqli_num_rows($result_Chapter) > 0) { 


   while($row = mysqli_fetch_array($result_Chapter)) {  
  
     $Documentpath = $row['Propertychecklistitemimage'];
  
    
    
    
     } 
   }
  $resultExists = "DELETE FROM indsys1034employeeitemchecklist WHERE Employeeid = '$Employeeid' and Sno='$Sno' AND Clientid = '$Clientid' ";
  $resultExists01 = $conn->query($resultExists);
  if(empty($Documentpath))
  {

  }
  else
  {
  unlink($Documentpath);
  }
    
    $Message ="Delete";
 
 

 





 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}
/////////////////////////////////////////////
if($MethodGet=='AssetCategory')
{
  $GetCategory = "SELECT * FROM indsys1058assetcategory Where Clientid='$Clientid' Order By Assetcategory";
  $Categorylist = $conn->query($GetCategory);
  if(mysqli_num_rows($Categorylist)>0)
  {
    while($row = mysqli_fetch_array($Categorylist))
    {
      $data[]=$row;
    }
  }
  $mytbl['mytbl'] = $data;
  $Display = array('mytbl' =>$mytbl['mytbl']);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}

if($MethodGet=='AssetCategoryList')
{
  $Assetcategoryid= $form_data['Assetcategoryid'];

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
  $mytbl['mytbl'] = $data01;
  $Display = array('Shortcode' =>$Shortcode,'Assetcategory' =>$Assetcategory,'mytbl' =>$mytbl['mytbl']);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}

if($MethodGet=='AssetName')
{
  $Assetlistid= $form_data['Assetlistid'];

  $fetchCategory = "Select * from indsys1058assetlists where Clientid='$Clientid' AND Assetlistid='$Assetlistid'";
  $resultcategory=$conn->query($fetchCategory);
  if(mysqli_num_rows($resultcategory)>0)
  {
      while($row=mysqli_fetch_array($resultcategory))
      {
          $Assetcode = $row['Assetshortcode'];
          $Assetname=$row['Assetname'];

      }
  }

  $Display = array('Assetname' =>$Assetname,'Assetcode' =>$Assetcode);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}
//////////////////////////
if($MethodGet=='AssetReturn')
{
  $Employeeid= $form_data['Employeeid'];
  $Listedno= $form_data['Listedno'];
  $Itemcount = 0;




  $commaSeparatedAssetListIds = "";
  $Itemsnodetail = "";
  foreach($Listedno as $itemId)
  {

    $GetChapter = "SELECT * FROM indsys1034employeeitemchecklist where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$itemId' ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Propertychecklistitemimage =$row['Propertychecklistitemimage'];
      $Distributeddate =$row['Distributeddate'];
      $Qtyitem = $row['Qtyitem'];
      $Particulars = $row['Particulars'];
      $Assetlistid = $row['Assetlistid'];
      $Assetcategoryid = $row['Assetcategoryid'];
      $sno = $row['Sno'];
        $Itemcount++;
        $Itemsnodetail .= ($Itemsnodetail ? ',' : '') . $sno;
        $commaSeparatedAssetListIds .= ($commaSeparatedAssetListIds ? ',' : '') . $Assetlistid;
        
      $sqlsave = "INSERT IGNORE INTO indsys1034employeeitemreturnlist (Clientid,Employeeid,Distributeddate,Particulars,Userid,Addormodifydatetime,Qtyitem,Assetlistid,Assetcategoryid,Receivedby,Receiveddatetime,Sno,Status)
        VALUES ('$Clientid','$Employeeid','$Distributeddate','$Particulars','$user_id','$date','$Qtyitem','$Assetlistid','$Assetcategoryid','$user_id','$date','$itemId','Return')";
           $resultsave = mysqli_query($conn, $sqlsave);
    
     if($resultsave===TRUE)
     
     {
      $resultExists = "Update indsys1034employeeitemchecklist set 

      Status ='Return',
      Returndate ='$date',      
      Userid ='$user_id',
      Addormodifydatetime='$date'
    
        
         WHERE Employeeid = '$Employeeid' and Sno ='$itemId' AND Clientid = '$Clientid' ";
      $resultExists01 = $conn->query($resultExists);
    
    
      
      $Message ="Update";
     }
     else
     {
      echo "$sqlsave<br/>";
     }
     
  
      } 



    }
  }
  if($Itemcount !=0)
  {
    
    $Assettype="R";
   $Mode="Return";
   $username=$_SESSION["Username"];

   AssetLog($conn,$Clientid,$user_id,$Itemcount,$Mode,$username,$Employeeid,$Assettype,$commaSeparatedAssetListIds);
  }
  $GetState = "SELECT *,al.Assetcode,al.Assetname,al.Assetshortcode,ac.Assetcategory, DATE_FORMAT(ec.Distributeddate,'%d-%m-%Y') AS Distributeddate2,DATE_FORMAT(ec.Receiveddatetime,'%d-%m-%Y') AS Receiveddatetime2  FROM indsys1034employeeitemreturnlist ec JOIN indsys1058assetcategory ac ON ec.Clientid= ac.Clientid AND ec.Assetcategoryid=ac.Assetcategoryid JOIN indsys1058assetlists al ON ec.Clientid=al.Clientid AND ec.Assetlistid=al.Assetlistid where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' ORDER BY ec.Employeeid";
  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $data01[] = $row;
    } 
  }      
  $mytbl['mytbl'] =$data01;
  $Display = array('mytbl' =>$mytbl['mytbl'] ,'Itemsnodetail' =>$Itemsnodetail);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;


}

if($MethodGet=='ReturnList')
{
  $Employeeid= $form_data['Employeeid'];
  $GetState = "SELECT *,al.Assetcode,al.Assetname,al.Assetshortcode,ac.Assetcategory, DATE_FORMAT(ec.Distributeddate,'%d-%m-%Y') AS Distributeddate2,DATE_FORMAT(ec.Receiveddatetime,'%d-%m-%Y') AS Receiveddate2  FROM indsys1034employeeitemreturnlist ec JOIN indsys1058assetcategory ac ON ec.Clientid= ac.Clientid AND ec.Assetcategoryid=ac.Assetcategoryid JOIN indsys1058assetlists al ON ec.Clientid=al.Clientid AND ec.Assetlistid=al.Assetlistid where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' AND ec.Status='Return' ORDER BY ec.Employeeid";
  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $data01[] = $row;
    } 
  }      
$mytbl['mytbl'] =$data01;
  $Display = array('mytbl' =>$mytbl['mytbl']);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}


function AssetLog($conn,$Clientid,$user_id,$Itemcount,$Mode,$username,$Employeeid,$Assettype,$Listedno)
{
  $Logofilepath = "";
  $date = date("Y-m-d H:i:s");
  if($Assettype=='R')
  {
    $selectemp = "SELECT * FROM indsys1017employeemaster where Clientid='$Clientid' AND Employeeid='$Employeeid'";
    $fetchemp = $conn ->query($selectemp);
    while($rowemp = mysqli_fetch_array($fetchemp)) {  
      $username = $rowemp['Fullname'];
    }

  }
  $assetnotes = "$Itemcount - Assets, $Mode by $username";
  $SaveLog = "INSERT IGNORE INTO indsys1034employeeitemloglist (Employeeid,Clientid,Notes,Userid,Addormodifydatetime,Assetdocumentpath,Assettype,Receivedby,Receiveddatetime,Asselistid)VALUES('$Employeeid','$Clientid','$assetnotes','$user_id','$date','$Logofilepath','$Assettype','$user_id','$date','$Listedno')";

  $Saveresult = $conn->query($SaveLog);
  if($Saveresult===TRUE)
  {
      $Display = array('status' =>"success");
  }
}
if($MethodGet=='AssetPrint')
{
  $Employeeid= $form_data['Employeeid'];
  $Listedno= $form_data['Listedno'];
  $Testno = $form_data['Testno'];
  if($Testno==0)
  {
  
    $Category = $Listedno;
  }
  else
  {
    $Categoryarray = implode(',', $Listedno); 
    $Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
    $Category = str_replace(",","','","$Categoryarray");
  }


  $GetState = "SELECT *,al.Assetcode,al.Assetname,al.Assetshortcode,ac.Assetcategory, DATE_FORMAT(ec.Distributeddate,'%d-%m-%Y') AS Distributeddate2 FROM indsys1034employeeitemchecklist ec JOIN indsys1058assetcategory ac ON ec.Clientid= ac.Clientid AND ec.Assetcategoryid=ac.Assetcategoryid JOIN indsys1058assetlists al ON ec.Clientid=al.Clientid AND ec.Assetlistid=al.Assetlistid where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' AND  ec.Sno in($Category)  ORDER BY ec.Employeeid";

  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $data01[] = $row;
    } 
  }      
$mytbl['mytbl'] =$data01;
  $Display = array('mytbl' =>$mytbl['mytbl']);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}


if($MethodGet=='ReturnAssetPrint')
{
  $Employeeid= $form_data['Employeeid'];
  $Listedno= $form_data['Listedno'];

  $Testno = $form_data['Testno'];
  if($Testno==0)
  {
  
    $Category = $Listedno;
  }
  else
  {
    $Categoryarray = implode(',', $Listedno); 
    $Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
    $Category = str_replace(",","','","$Categoryarray");
  }
  $GetState = "SELECT *,al.Assetcode,al.Assetname,al.Assetshortcode,ac.Assetcategory, DATE_FORMAT(ec.Distributeddate,'%d-%m-%Y') AS Distributeddate2 FROM indsys1034employeeitemreturnlist ec JOIN indsys1058assetcategory ac ON ec.Clientid= ac.Clientid AND ec.Assetcategoryid=ac.Assetcategoryid JOIN indsys1058assetlists al ON ec.Clientid=al.Clientid AND ec.Assetlistid=al.Assetlistid where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' AND  ec.Returnid in($Category)  ORDER BY ec.Employeeid";

  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $data01[] = $row;
    } 
  }      
$mytbl['mytbl'] =$data01;
  $Display = array('mytbl' =>$mytbl['mytbl']);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}

if($MethodGet=='AssetReallocation')
{
  $Employeeid= $form_data['Employeeid'];
  $Listedno= $form_data['Listedno'];
  $Itemcount = 0;
  $commaSeparatedAssetListIds = "";
  $Itemsnodetai = "";
  foreach($Listedno as $itemId)
  {

    $GetChapter = "SELECT * FROM indsys1034employeeitemreturnlist where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Returnid='$itemId' ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Propertychecklistitemimage =$row['Propertychecklistitemimage'];
      $Distributeddate =$row['Distributeddate'];
      $Qtyitem = $row['Qtyitem'];
      $Particulars = $row['Particulars'];
      $Assetlistid = $row['Assetlistid'];
      $Assetcategoryid = $row['Assetcategoryid'];
      $commaSeparatedAssetListIds .= ($commaSeparatedAssetListIds ? ',' : '') . $Assetlistid;
      $Itemsnodetail .= ($Itemsnodetail ? ',' : '') . $itemId;
      $Sno = 0;
      $Itemcount++;
      $resultExistsnew = "SELECT Nextno FROM vwemployeechecklistitemno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
      $resultExists01new = $conn->query($resultExistsnew);
      if (mysqli_fetch_row($resultExists01new))
      {

          $GetChapter = "SELECT * FROM vwemployeechecklistitemno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
          $result_Chapter = $conn->query($GetChapter);
          if (mysqli_num_rows($result_Chapter) > 0)
          {
              while ($row = mysqli_fetch_array($result_Chapter))
              {
                  $Sno = $row['Nextno'];

              }
          }

      }
      
      $sqlsave = "INSERT IGNORE INTO indsys1034employeeitemchecklist (Clientid,Employeeid,Distributeddate,Particulars,Userid,Addormodifydatetime,Qtyitem,Assetlistid,Assetcategoryid,Allocatedby,Allocateddatetime,Sno,Status)
        VALUES ('$Clientid','$Employeeid','$Distributeddate','$Particulars','$user_id','$date','$Qtyitem','$Assetlistid','$Assetcategoryid','$user_id','$date','$Sno','Allocated')";
           $resultsave = mysqli_query($conn, $sqlsave);
    
     if($resultsave===TRUE)
     
     {
     
    
      $resultExists = "Update indsys1034employeeitemreturnlist set 

      Status ='Allocate',
      Allocatedatetime ='$date',      
      Allocatedby ='$user_id',
      Addormodifydatetime='$date'
    
        
         WHERE Employeeid = '$Employeeid' and Returnid ='$itemId' AND Clientid = '$Clientid' ";
      $resultExists01 = $conn->query($resultExists);
    
      
      $Message ="Update";
     }
     else
     {
      echo "$sqlsave<br/>";
     }
         
    
     
      } 



    }
  }


   
  if($Itemcount !=0)
  {
   $Assettype="A";
   $Mode="Allocated";
   $username=$_SESSION["Username"];
   
   AssetLog($conn,$Clientid,$user_id,$Itemcount,$Mode,$username,$Employeeid,$Assettype,$commaSeparatedAssetListIds);
  }
  $GetState = "SELECT *,al.Assetcode,al.Assetname,al.Assetshortcode,ac.Assetcategory, DATE_FORMAT(ec.Distributeddate,'%d-%m-%Y') AS Distributeddate2,DATE_FORMAT(ec.Receiveddatetime,'%d-%m-%Y') AS Receiveddatetime2  FROM indsys1034employeeitemreturnlist ec JOIN indsys1058assetcategory ac ON ec.Clientid= ac.Clientid AND ec.Assetcategoryid=ac.Assetcategoryid JOIN indsys1058assetlists al ON ec.Clientid=al.Clientid AND ec.Assetlistid=al.Assetlistid where ec.Employeeid = '$Employeeid' AND ec.Clientid = '$Clientid' ORDER BY ec.Employeeid";
  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
    $data01[] = $row;
    } 
  }      
$mytbl['mytbl'] =$data01;
  $Display = array('mytbl' =>$mytbl['mytbl'],'Itemsnodetail' =>$Itemsnodetail);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;


}


if($MethodGet=='EMPLOGLIST')
{
  $Employeeid= $form_data['Employeeid'];
  $Assetlistids = $form_data['Assetlistids'];
  $GetRegion = "SELECT *,ac.Assetcategory,ac.Shortcode FROM indsys1058assetlists al JOIN indsys1058assetcategory ac ON al.Clientid=ac.Clientid AND  al.Assetcategoryid= ac.Assetcategoryid WHERE al.Clientid = '$Clientid' AND al.Assetlistid IN($Assetlistids)  ORDER BY Assetname";
  $result_Region = $conn->query($GetRegion);

  if(mysqli_num_rows($result_Region) > 0) { 
  
  while($row = mysqli_fetch_array($result_Region)) {  
    $data01[] = $row;  
    } 
  }      
$mytbl['mytbl'] =$data01;
  $Display = array('mytbl' =>$mytbl['mytbl']);
  $str = json_encode($Display);
  echo trim($str,'"');
  return;
}
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
 ?>