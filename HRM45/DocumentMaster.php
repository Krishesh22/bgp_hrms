<?php
include '../config.php';
include '../session.php';



session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
      $Sessionid = $_SESSION["SESSIONID"];

  
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];






if($MethodGet == 'PageSession')
{

    $Message =$Sessionid;
 
    $Display=array('Message'=>  $Message );
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
}


if($MethodGet == 'ModuleNext')
{
   
    $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='DOCUMENT' AND Clientid ='$Clientid' ";

        $result_Nextno = $conn->query($GetNextno);
        if (mysqli_num_rows($result_Nextno) > 0)
        {
            while ($row = mysqli_fetch_array($result_Nextno))
            {
                $data = $row['Nextno'];
                $data01 = $data + 1;
            }
        }  
    header('Content-Type: application/json');
    echo json_encode($data01);
    return;
 }

 if($MethodGet == 'DOCTYPE')
 {
    $GetState = "SELECT * FROM indsys1054companydocumenttype where  Clientid ='$Clientid'  ORDER BY CompanyDocumenttype";
     $result_Region = $conn->query($GetState);   
     if(mysqli_num_rows($result_Region) > 0) 
     { 
     while($row = mysqli_fetch_array($result_Region)) 
       {  
       $data01[] = $row;
       } 
     }         
     header('Content-Type: application/json');
     echo json_encode($data01);
     return;
  
 }



 if($MethodGet == 'FetchDate')
 {
 
     $Message  = date("Y-m-d" );
  
     header('Content-Type: application/json');
     echo json_encode($Message);
     return;
 }

 if($MethodGet == 'Save')
 {
 
     $Message ="";





     $Documentno =$form_data["Documentno"];
$DocumentIssueDate = $form_data['DocumentIssueDate'];
$RenewalDate = $form_data['RenewalDate'];
$Documenttype = $form_data['Documenttype'];
$Renewalnotificationindays = $form_data['Renewalnotificationindays'];
$DocumentNotes = $form_data['DocumentNotes'];
$Renewalyesorno = $form_data['Renewalyesorno'];
$Documentname = $form_data['Documentname'];
$Documentnoasperrecord = $form_data['Documentnoasperrecord'];


if($Renewalyesorno =='Yes')
{
    if($RenewalDate==""){
      $Message="ExpiredDate";
      $Display=array('Message'=>  $Message);
     $str = json_encode($Display);
     echo trim($str, '"');
     return;
     }
 
    if(empty($RenewalDate)){
      $Message="ExpiredDate";
      $Display=array('Message'=>  $Message);
     $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }

    if(empty($Renewalnotificationindays) || $Renewalnotificationindays==0 ){
      $Message="NotificationDays";
      $Display=array('Message'=>  $Message);
     $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
}

if(empty($Documentname)){
  $Message="DocumentName";
  $Display=array('Message'=>  $Message);
 $str = json_encode($Display);
 echo trim($str, '"');
 return;
}

if(empty($Documenttype)){
  $Message="Documenttype";
  $Display=array('Message'=>  $Message);
 $str = json_encode($Display);
 echo trim($str, '"');
 return;
}
if(empty($Renewalnotificationinday)){
    $Renewalnotificationinday =0;
}
// if(empty($RenewalDate)){
//     $RenewalDate ="0000-00-00";
// }
if(empty($DocumentIssueDate)){
    $DocumentIssueDate ="0000-00-00";
}
// Test($conn, $Clientid);

mysqli_begin_transaction($conn);
$transStatus = true;

$resultExists = "SELECT Documentno FROM indsys1054documentmaster WHERE Documentno = '$Documentno' AND Clientid = '$Clientid'  LIMIT 1";
$resultExists01 = $conn->query($resultExists);

if (mysqli_fetch_row($resultExists01))
{

    $resultExistsss = "Update indsys1054documentmaster set 
    Documenttype ='$Documenttype',   
            
    DocumentIssueDate = '$DocumentIssueDate',  
    ExpiredDate=" . ($RenewalDate ? "'$RenewalDate'" : "NULL") . ",
    Renewalnotificationindays='$Renewalnotificationindays',
    DocumentNotes='$DocumentNotes',
    Addormodifydatetime ='$date',
    Renewalyesorno='$Renewalyesorno',
    Documentname='$Documentname',
    Documentnoasperrecord ='$Documentnoasperrecord',
    Userid ='$user_id'                   
  WHERE Documentno = '$Documentno'  AND Clientid ='$Clientid'  ";
    $resultExists0New = $conn->query($resultExistsss);
 
 if( $resultExists0New===TRUE)
 {

   $Message ="Update";
 }
 else
 {
    $transStatus = false;
    $Message ="Error";
 }

}
else
{
$sqlsave = "INSERT IGNORE INTO indsys1054documentmaster (Clientid,Documentno, Documenttype,Documentcreateddate,DocumentIssueDate,ExpiredDate,Userid,Addormodifydatetime,Renewalnotificationindays,DocumentNotes,Documentstatus,Renewalyesorno,Documentname,Documentnoasperrecord)
VALUES ('$Clientid','$Documentno','$Documenttype','$date','$DocumentIssueDate','$RenewalDate','$user_id','$date','$Renewalnotificationindays','$DocumentNotes','Open','$Renewalyesorno','$Documentname','$Documentnoasperrecord')";


   $resultsave = mysqli_query($conn, $sqlsave);
   if($resultsave===TRUE)
   {
    $UpdateNextno = "Update indsys1008mastermodule set Nextno ='$Documentno' where ModuleID ='DOCUMENT' AND Clientid ='$Clientid'";
    $resultUpdate = mysqli_query($conn,$UpdateNextno);
    $Message="Saved";
   }
   else
   {
    $transStatus = false;
    $Message="Error";
   }
// $resultExists01 = $conn->query($resultExists);
//  $Message ="Exists";

}


if ($transStatus) {

     mysqli_commit($conn);
     
     //echo 'Transaction success';
    
 }
 else {

     mysqli_rollback($conn);
     //echo 'Transaction failed';
   
 }

  
     $Display=array('Message'=>  $Message,'Nextno' =>$Documentno );
     $str = json_encode($Display);
     echo trim($str, '"');
     return;
 }

 ////////////////
 function Test($conn, $Clientid)
{
    try
    {

     
    
    

    
    
    
        $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='DOCUMENT' AND Clientid ='$Clientid'  ";
    
            $result_Nextno = $conn->query($GetNextno);
            if (mysqli_num_rows($result_Nextno) > 0)
            {
                while ($row = mysqli_fetch_array($result_Nextno))
                {
                    $data = $row['Nextno'];
                    $data01 = $data + 1;
                }
            }  
    
            $Textno = $data01;
    
    




        $_SESSION['Nextno'] =$Textno;
    

    }
    catch(Exception $e)
    {

    }

}


if($MethodGet == 'Update')
 {
 
     $Message ="";





     $Documentno =$form_data["Documentno"];
$DocumentIssueDate = $form_data['DocumentIssueDate'];
$RenewalDate = $form_data['RenewalDate'];
$Documenttype = $form_data['Documenttype'];
$Renewalnotificationindays = $form_data['Renewalnotificationindays'];
$DocumentNotes = $form_data['DocumentNotes'];
$Renewalyesorno = $form_data['Renewalyesorno'];
$Documentname = $form_data['Documentname'];
$Documentnoasperrecord = $form_data['Documentnoasperrecord'];


if($Renewalyesorno =='Yes')
{
    if($RenewalDate==""){
      $Message="ExpiredDate";
      $Display=array('Message'=>  $Message);
     $str = json_encode($Display);
     echo trim($str, '"');
     return;
     }
 
    if(empty($RenewalDate)){
      $Message="ExpiredDate";
      $Display=array('Message'=>  $Message);
     $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }

    if(empty($Renewalnotificationindays) || $Renewalnotificationindays==0 ){
      $Message="NotificationDays";
      $Display=array('Message'=>  $Message);
     $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
}

if(empty($Documentname)){
  $Message="DocumentName";
  $Display=array('Message'=>  $Message);
 $str = json_encode($Display);
 echo trim($str, '"');
 return;
}

if(empty($Documenttype)){
  $Message="Documenttype";
  $Display=array('Message'=>  $Message);
 $str = json_encode($Display);
 echo trim($str, '"');
 return;
}
if(empty($Renewalnotificationinday)){
    $Renewalnotificationinday =0;
}
// if(empty($RenewalDate)){
//     $RenewalDate ='NULL';
// }
if(empty($DocumentIssueDate)){
    $DocumentIssueDate ="0000-00-00";
}



$resultExists = "SELECT Documentno FROM indsys1054documentmaster WHERE Documentno = '$Documentno' AND Clientid = '$Clientid'  LIMIT 1";
$resultExists01 = $conn->query($resultExists);

if (mysqli_fetch_row($resultExists01))
{

    $resultExistsss = "Update indsys1054documentmaster set 
    Documenttype ='$Documenttype',   
        
    DocumentIssueDate = '$DocumentIssueDate',  
    ExpiredDate=" . ($RenewalDate ? "'$RenewalDate'" : "NULL") . ",
    Renewalnotificationindays='$Renewalnotificationindays',
    DocumentNotes='$DocumentNotes',
    Addormodifydatetime ='$date',
    Renewalyesorno ='$Renewalyesorno',
    Documentname='$Documentname',
    Documentnoasperrecord ='$Documentnoasperrecord',
    Userid ='$user_id'                   
  WHERE Documentno = '$Documentno'  AND Clientid ='$Clientid'  ";
    $resultExists0New = $conn->query($resultExistsss);



 if( $resultExists0New===TRUE)
 {

   $Message ="Update";
 }
 else
 {
    
    //$Message ="Error". $conn->error;
    $Message ="Error";
 }

}

  
     $Display=array('Message'=>  $Message);
     $str = json_encode($Display);
     echo trim($str, '"');
     return;
 }


 if($MethodGet == 'DOCMAS')
 {
    $GetState = "SELECT * FROM indsys1054documentmaster where  Clientid ='$Clientid'  ORDER BY Documentno";
     $result_Region = $conn->query($GetState);   
     if(mysqli_num_rows($result_Region) > 0) 
     { 
     while($row = mysqli_fetch_array($result_Region)) 
       {  
       $data01[] = $row;
       } 
     }         
     header('Content-Type: application/json');
     echo json_encode($data01);
     return;
  
 }
 if($MethodGet == 'FetchDocument')
{

    try
    { 
  

      $Documentno =$form_data['Documentno'];
      $_SESSION["Documentno"] = $Documentno;
    $GetChapter = "SELECT * FROM indsys1054documentmaster where Clientid ='$Clientid' and Documentno = '$Documentno'  ORDER BY Documentno";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Documenttype =$row['Documenttype'];
      $DocumentIssueDate =$row['DocumentIssueDate'];
      $ExpiredDate = $row['ExpiredDate'];
      $Renewalnotificationindays =$row['Renewalnotificationindays'];
      $DocumentNotes = $row['DocumentNotes'];
     // $Emppassbook = $Emppassbook +"&output=embed";
      $Documentstatus =$row['Documentstatus'];
      $Documentname = $row['Documentname'];
      $Renewalyesorno = $row['Renewalyesorno'];
      $Documentnoasperrecord = $row['Documentnoasperrecord'];
      $Documentstatus = $row['Documentstatus'];

           $Documentoldno = $row['Documentoldno'];
           $Documenthistoryno = $row['Documenthistoryno'];
     
     
      } 
    }


    // if($DocumentIssueDate=="0000-00-00")
    // {
    //    $DocumentIssueDate="";
    // }
    // else
    // {
    //    $DocumentIssueDate = date("d-m-Y", strtotime( $DocumentIssueDate));
    // }

    // if($ExpiredDate=="0000-00-00")
    // {
    //    $ExpiredDate="";
    // }
    // else
    // {
    //    $ExpiredDate = date("d-m-Y", strtotime( $ExpiredDate));
    // }
 
   
    $Display=array(
      'Documenttype'=>  $Documenttype,
      'DocumentIssueDate'=> $DocumentIssueDate,
      'ExpiredDate'=>  $ExpiredDate,
      'Renewalnotificationindays'=> $Renewalnotificationindays,
      'DocumentNotes' =>$DocumentNotes,
      'Documentstatus' =>$Documentstatus,
      'Documentname' =>$Documentname,
      'Renewalyesorno' =>$Renewalyesorno,
      'Documentnoasperrecord' =>$Documentnoasperrecord,
      'Documentoldno' =>$Documentoldno,
      'Documenthistoryno' =>$Documenthistoryno,
      'Documentstatus' =>$Documentstatus
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }

 ///////////////
 if($MethodGet == 'DOCMASFILE')
 {

    $Documentno =$form_data['Documentno'];
    $GetState = "SELECT * FROM indsys1054documentmasterdetails where  Clientid ='$Clientid' AND Documentno='$Documentno'  ORDER BY Documentno";
     $result_Region = $conn->query($GetState);   
     if(mysqli_num_rows($result_Region) > 0) 
     { 
     while($row = mysqli_fetch_array($result_Region)) 
       {  
       $data01[] = $row;
       } 
     }         
     header('Content-Type: application/json');
     echo json_encode($data01);
     return;
  
 }

 /////////////////////////
 if($MethodGet == 'VWDOCMASFILE')
 {

    $Documentno =$form_data['Documentno'];
    $GetState = "SELECT * FROM indsys1054documentmasterdetails where  Clientid ='$Clientid' AND Documentno='$Documentno'  ORDER BY Documentno";
     $result_Region = $conn->query($GetState);   
     if(mysqli_num_rows($result_Region) > 0) 
     { 
     while($row = mysqli_fetch_array($result_Region)) 
       {  
       $data01[] = $row;
       } 
     }         
     header('Content-Type: application/json');
     echo json_encode($data01);
     return;
  
 }
//////////////////
if($MethodGet == 'FetchFileDocument')
{

    try
    { 
  

      $Documentno =$form_data['Documentno'];
      $Sno =$form_data['Sno'];
    $GetChapter = "SELECT * FROM indsys1054documentmasterdetails where Clientid ='$Clientid' and Documentno = '$Documentno' AND Sno='$Sno' ORDER BY Documentno";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Documentfilepath =$row['Documentfilepath'];
      
     
     
     
      } 
    }


  
 
   
    $Display=array(
      'Documentfilepath'=>  $Documentfilepath,
     
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }
 ///////////////////////



 if($MethodGet == 'DeleteFile')
{

    try
    { 
  

      $Documentno =$form_data['Documentno'];
      $Sno =$form_data['Sno'];
    $GetChapter = "DELETE FROM indsys1054documentmasterdetails where Clientid ='$Clientid' and Documentno = '$Documentno' AND Sno='$Sno' ORDER BY Documentno";
  $DeleteFile = mysqli_query($conn,$GetChapter);
  if($DeleteFile===TRUE)
  {
$Message ="Delete";
  }
  else
  {
    $Message ="Error";
  }
 


  
 
   
    $Display=array(
      'Message'=>  $Message,
     
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }
?>




        
