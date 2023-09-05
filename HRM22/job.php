<?php 
 include '../config.php';
error_reporting(0);
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
// require_once ('class.phpmailer.php');
// include ("class.smtp.php");

  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
      $Sessionid = $_SESSION["SESSIONID"];

      $_SESSION["Tittle"] ="Application";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];
//$MethodGet ="Save";
function Test($conn,$Clientid)
{
    try
    {

        $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='JOBROLL' AND Clientid ='$Clientid'  ";

        $result_Nextno = $conn->query($GetNextno);
        if (mysqli_num_rows($result_Nextno) > 0)
        {
            while ($row = mysqli_fetch_array($result_Nextno))
            {
                $data['Nextno'] = $row['Nextno'];

                $data['Nextno'] = $data['Nextno'] + 1;
            }
        }

        $_SESSION['Nextno'] = $data['Nextno'];

    }
    catch(Exception $e)
    {

    }

}

if($MethodGet == 'Lang')
{
   $GetState = "SELECT * FROM indsys1015languagesmaster where  Clientid ='$Clientid'  ORDER BY Languages";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    
    
    header('Content-Type: application/json');
    echo json_encode($data01);
 
}
if($MethodGet == 'Posapp')
{
   $GetState = "SELECT * FROM indsys1004designationmaster Where Clientid ='$Clientid'   ORDER BY Designation";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    
    
    header('Content-Type: application/json');
    echo json_encode($data01);
 
}
if($MethodGet == 'Qualifi')
{
   $GetState = "SELECT * FROM indsys1014qualificationmaster where Clientid ='$Clientid'  ORDER BY Degree";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
    header('Content-Type: application/json');
    echo json_encode($data01);
 }
 if($MethodGet == 'ModuleNext')
{
   
    $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='JOBROLL' AND Clientid ='$Clientid'  ";

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
 }
 //////////////////////////////////////////////
 if($MethodGet == 'ALL')
 {
    $GetState = "SELECT * FROM indsys1032jobappmaster  where Clientid ='$Clientid'  ORDER BY Applicationid ";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
    header('Content-Type: application/json');
    echo json_encode($data01);
  }
  ///////////////////////////////////////

  if($MethodGet == 'EDITMASTER')
  {
     $GetState = "SELECT * FROM indsys1032jobappmaster where Selectionstatus='Open' AND Clientid ='$Clientid' ORDER BY Applicationid";
     $result_Region = $conn->query($GetState);
   //echo $GetState ;
     if(mysqli_num_rows($result_Region) > 0) { 
     while($row = mysqli_fetch_array($result_Region)) {  
       $data01[] = $row;
       } 
     }        
     header('Content-Type: application/json');
     echo json_encode($data01);
   }


  ////////////////////////////////
  if($MethodGet == 'Save')
{


try
{
    
    $Title =$form_data['Title'];
    $Firstname =$form_data['Firstname'];
    $Lastname =$form_data['Lastname'];
    $Gender =$form_data['Gender'];
    $Qualification =$form_data['Qualification'];
    $Married =$form_data['Married'];
    $Mothertongue =$form_data['Mothertongue'];
    $Contactno =$form_data['Contactno'];
    $Category =$form_data['Category'];
    $Emailid =$form_data['Emailid'];
    $fullname = " $Firstname  $Lastname ";
    $Selectionstatus =$form_data['Selectionstatus'];
    $Vaccancy=$form_data["Vaccancy"];
    $ApplicationDate=$form_data["ApplicationDate"];
    $InterviewDate=$form_data["InterviewDate"];
    $Interviewtime=$form_data["Interviewtime"];
    $Fresher=$form_data["Fresher"];
    $ExpectedCTC=$form_data["ExpectedCTC"];
    $PreviousCTC=$form_data["PreviousCTC"];

    
    if(empty($Firstname))
    {
  
      $Message = "FNAME";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
  /*------------------*/
    if(empty($Contactno))
    {
  
  $Message = "Contact";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Qualification))
    {
  
  $Message = "Quali";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Vaccancy))
    {
  
  $Message = "vacc";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Emailid))
    {
  
  $Message = "Email";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Category))
    {
  
  $Message = "Category";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
  /*   
  $testfn =  
              */
  
  Test($conn,$Clientid);
  
  $Applicationid =$_SESSION['Nextno'];
    if (mysqli_connect_errno()){
      $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
    }
    $resultExists = "SELECT * FROM indsys1032jobappmaster WHERE Applicationid = '$Applicationid' AND Clientid ='$Clientid' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
  
   
   if(mysqli_fetch_row($resultExists01))
    {
      
      $Message ="Exists";
   
    }
  
    else
    {
      $sqlsave = "INSERT IGNORE INTO indsys1032jobappmaster (Clientid,Applicationid,Title,Firstname,Fullname,Lastname,Mother_tong,Gender,Contactno,Userid,Addormodifydatetime,Type_Of_Posistion,Emaild,HighestQualification,Marital_status,Selectionstatus,PoistionApplicant,Appdate,Intervdate,interviewtime,Smsverified,Emailverified,Candidateid,Movedtocandidate,Fresher,ExpectedCTC,PreviousCTC)

      values('$Clientid','$Applicationid','$Title','$Firstname','$fullname','$Lastname','$Mothertongue','$Gender','$Contactno','$user_id','$date','$Category','$Emailid','$Qualification','$Married','$Selectionstatus','$Vaccancy','$ApplicationDate','$InterviewDate','$Interviewtime','No','No',0,'No','$Fresher','$ExpectedCTC','$PreviousCTC')";
  
      $resultsave = mysqli_query($conn,$sqlsave);
     
  
      $UpdateNextno = "Update indsys1008mastermodule set Nextno ='$Applicationid' where ModuleID ='JOBROLL' AND Clientid ='$Clientid'";
      $resultUpdate = mysqli_query($conn,$UpdateNextno);
      $Message ="Data Saved";
  
       $_SESSION["ChapteridApplicationid"] = $Applicationid;
   }
  
  
   $_SESSION["Applicationid"] =$Applicationid;
  
  $Nextno["Nextno"] =$Applicationid;
   $Display=array('Nextno' => $Nextno["Nextno"],'Message' =>$Message);
  
    $str = json_encode($Display);
  echo trim($str, '"');
  }
  catch(Exception $e)
  {
  
  }
   
       
  }

///////////////////////////////////////////////////////

  if($MethodGet == 'FetchApplication')
{

    try
    { 
  

      $Applicationid =$form_data['Applicationid'];
      $_SESSION["Applicationid"] = $Applicationid;
    $GetChapter = "SELECT * FROM indsys1032jobappmaster where Clientid ='$Clientid' and Applicationid = '$Applicationid'  ORDER BY Applicationid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
        while($row = mysqli_fetch_array($result_Chapter)) {  
            $Title =$row['Title'];
            $Firstname =$row['Firstname'];
            $Lastname = $row['Lastname'];
            $Gender =$row['Gender'];
            $Qualification = $row['HighestQualification'];
            $Vaccancy=$row['PoistionApplicant'];
            $Married =$row['Marital_status'];
            $Mothertongue = $row['Mother_tong'];
            $Contactno =$row['Contactno'];
            $Category = $row['Type_Of_Posistion'];
            $Emailid = $row['Emaild'];
            $ApplicationDate=$row["Appdate"];
            $InterviewDate=$row["Intervdate"];
            $Interviewtime=$row["interviewtime"];
            $Selectionstatus = $row['Selectionstatus'];
            $Smsverified = $row['Smsverified'];
            $Emailverified=$row['Emailverified'];
            $Fresher=$row['Fresher'];
            $ExpectedCTC = $row['ExpectedCTC'];
            $PreviousCTC = $row['PreviousCTC'];
           
             
      } 
    }
    $Display=array(
        
        'Title'=>  $Title,
      'Firstname'=> $Firstname,
      'Lastname'=>  $Lastname,
      'Gender'=> $Gender,
      'Qualification'=> $Qualification,
      'Married'=> $Married,
      'Mothertongue'=>  $Mothertongue,
      'Contactno'=> $Contactno,
      'Category'=>  $Category,
      'Emailid'=>  $Emailid,
      'ApplicationDate'=>$ApplicationDate,
      'InterviewDate'=>$InterviewDate,
      'Interviewtime'=>$Interviewtime,
      'Languagesknown'=> $Languagesknown,
      'Selectionstatus'=> $Selectionstatus,
      'Vaccancy'=>$Vaccancy,
      'Smsverified' =>$Smsverified,
      'Emailverified' =>$Emailverified,
      'Fresher' =>$Fresher,
      'ExpectedCTC' =>$ExpectedCTC,
      'PreviousCTC' =>$PreviousCTC
       
  );
   
  $str = json_encode($Display);
  echo trim($str, '"');
 }
 catch(Exception $e)
 {
 
 }
   
  }
  ////////////////////////////////////////////////////
  if($MethodGet == 'FetchDate')
{

    try
    { 
  

      $date=date("Y-m-d");

    
   
 
    
    $Display=array(
      'date'=>  $date
      
   
     
      
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
   
 }

//////////////////////////////////////////////////////



if($MethodGet == 'Update')
{


try
{
  $Applicationid =$form_data['Applicationid'];
    $Title =$form_data['Title'];
    $Firstname =$form_data['Firstname'];
    $Lastname =$form_data['Lastname'];
    $Gender =$form_data['Gender'];
    $Qualification =$form_data['Qualification'];
    $Married =$form_data['Married'];
    $Mothertongue =$form_data['Mothertongue'];
    $Contactno =$form_data['Contactno'];
    $Category =$form_data['Category'];
    $Emailid =$form_data['Emailid'];
    $fullname = " $Firstname  $Lastname ";
    $Selectionstatus =$form_data['Selectionstatus'];
    $ApplicationDate=$form_data["ApplicationDate"];
    $InterviewDate=$form_data["InterviewDate"];
    $Interviewtime=$form_data["Interviewtime"];
    $Vaccancy=$form_data['Vaccancy'];
    $Fresher=$form_data["Fresher"];
    $ExpectedCTC=$form_data["ExpectedCTC"];
    $PreviousCTC=$form_data["PreviousCTC"];
    


    if(empty($Firstname))
    {
  
      $Message = "FNAME";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
  /*------------------*/
    if(empty($Contactno))
    {
  
  $Message = "Contact";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Qualification))
    {
  
  $Message = "Quali";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Vaccancy))
    {
  
  $Message = "vacc";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Emailid))
    {
  
  $Message = "Email";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Category))
    {
  
  $Message = "Category";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
/*   
$testfn =              */




  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "Update indsys1032jobappmaster set 
  Title ='$Title',
  Firstname ='$Firstname',
  Lastname='$Lastname',
  Gender ='$Gender',
  HighestQualification ='$Qualification',
  Marital_status ='$Married',
  Mother_tong='$Mothertongue',
  Contactno ='$Contactno',
  Type_Of_Posistion ='$Category',
  Emaild ='$Emailid',
  Fullname='$fullname',
  Addormodifydatetime ='$date',
  Userid ='$user_id',
  Selectionstatus = '$Selectionstatus',
  Appdate ='$ApplicationDate',
  Intervdate ='$InterviewDate',
  interviewtime ='$Interviewtime',
  PoistionApplicant='$Vaccancy',
  Fresher ='$Fresher',
  ExpectedCTC ='$ExpectedCTC',
  PreviousCTC='$PreviousCTC'
 

    
     WHERE Applicationid = '$Applicationid' AND Clientid ='$Clientid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Update";
 

 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
     
}
///////////////////////////////////////////////
if($MethodGet == 'Emailverification')
{
  $Applicationid =$form_data['Applicationid'];
      $_SESSION["Applicationid"] = $Applicationid;
    $GetChapter = "SELECT * FROM indsys1032jobappmaster where Clientid ='$Clientid' and Applicationid = '$Applicationid'  ORDER BY Applicationid";
    $result_Chapter = $conn->query($GetChapter );
    $Message ="Emailverification"; 
    if(mysqli_num_rows($result_Chapter) > 0) { 
    while($row = mysqli_fetch_array($result_Chapter)) {

    $Title =$row['Title']; 
    $Emailid = $row['Emaild'];
    $Firstname =$row['Firstname'];
    $Lastname = $row['Lastname'];
    // $ApplicationDate="2022-09-18";
    $ApplicationDate=$row["Appdate"];
    $ApplicationDate2=date('d-M-Y', strtotime($ApplicationDate));
    $InterviewDate=$row["Intervdate"];
    $InterviewDate2=date('d-M-Y', strtotime($InterviewDate));
    $Vaccancy=$row['PoistionApplicant'];
    $Interviewtime=$row["interviewtime"];
    // echo "mail info";

$mail = new PHPMailer(false); 
  $mail->IsSMTP();
  $tstbody = "";

try
{
$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
$mail->isSMTP();
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "tls"; // sets the prefix to the servier
$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
$mail->Port = 587; // set the SMTP port for the GMAIL server
$mail->Username = "indsystesting@gmail.com"; // GMAIL username
$mail->Password = "cllazzawsljgntjj"; // GMAIL password

// $to = str_replace(";",",",$to);
$Toaddress=$Emailid;

$htmlContent= "
<!doctype html>
    <html>
      <head>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <title>Email Template</title>
        <style>
    @media only screen and (max-width: 620px) {
      table.body h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }

      table.body p,
    table.body ul,
    table.body ol,
    table.body td,
    table.body span,
    table.body a {
        font-size: 16px !important;
      }

      table.body .wrapper,
    table.body .article {
        padding: 10px !important;
      }

      table.body .content {
        padding: 0 !important;
      }

      table.body .container {
        padding: 0 !important;
        width: 100% !important;
      }

      table.body .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }

      table.body .btn table {
        width: 100% !important;
      }

      table.body .btn a {
        width: 100% !important;
      }

      table.body .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
    }
    @media all {
      .ExternalClass {
        width: 100%;
      }

      .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
        line-height: 100%;
      }

      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }

      #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
      }

      .btn-primary table td:hover {
        background-color: #34495e !important;
      }

      .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
      }
    }
    </style>
      </head>
      <body style='background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
        <span class='preheader' style='color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;'>This is preheader text. Some clients will show this text as a preview.</span>
        <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;' width='100%' bgcolor='#f6f6f6'>
          <tr>
            <td>
            <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>

            <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 620px; padding: 10px; width: 620px; margin: 0 auto;' width='620' valign='top'>
              <div class='content' style='box-sizing: border-box; display: block; margin: 0 auto; max-width: 620px; padding: 10px;'>

                <table role='presentation' class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;' width='100%'>

                  <tr>
                    <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
                      <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
                        <tr> <td><center><img alt='Logo' height='80px' src='$domain/assets/images/logo/logo.jpg'></center></td></tr>
                        <tr>

                          <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
    <br/>
    <h1 style='text-align: center;color:#2D9A43'>Interview Invitation</h1>
                            <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>$Title $Firstname $Lastname,</p>
                            <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Thank you for your application to the $Vaccancy position which was applied on $ApplicationDate2.
                            We have reviewed your application materials carefully, and we are excited to invite you for the interview. </p>
                            
                            Your interview will be conducted<strong></strong> on, <strong><span style=''>$InterviewDate2</span></strong></span> at <strong><span style=''>$Interviewtime</span></strong></span>. Please be available at the office at the given time.

                           <h2 style='text-align: center;color:#2D9A43'></h2>

                           Thanks and Regards,<br>

                           Human Resource Department<br>
                           Britannia Garment Packaging Pvt Ltd<br>
                           Developed by Indsys.
  


                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                </table>


              </div>
            </td>
            <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
          </tr>
        </table>
      </body>
    </html>


";
$SubjectMail="Interview Invitation";

$email_array = explode(',', $Toaddress);
for ($i = 0;$i < count($email_array);$i++)
{
$mail->AddAddress($email_array[$i]);
}
$mail->SetFrom('indsystesting@gmail.com', 'BRITANNIA');
$mail->AddReplyTo('indsystesting@gmail.com', 'BRITANNIA');
$mail->Subject = $SubjectMail ;
// $mail->Body = $tstbody;
$mail->MsgHTML($htmlContent);
// optional - MsgHTML will create an alternate automatically



// attachment
$mail->Send();
$Message="Mail Sent";
$Display=array(
        
  'Message'=>  $Message,

 
);


  $str = json_encode($Display);
echo trim($str, '"');

}

catch(phpmailerException $e)
{

}

  }
    }
  }




//////////////////////////////////////////
if($MethodGet == 'MoveToCandidate')
{

    try
    { 
  

      $Applicationid =$form_data['Applicationid'];
      $Message ="";
      $_SESSION["Applicationid"] = $Applicationid;
    $GetChapter = "SELECT * FROM indsys1032jobappmaster where Clientid ='$Clientid' and Applicationid = '$Applicationid'  ORDER BY Applicationid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
        while($row = mysqli_fetch_array($result_Chapter)) {  
            $Title =$row['Title'];
            $Firstname =$row['Firstname'];
            $Lastname = $row['Lastname'];
            $Gender =$row['Gender'];
            $Qualification = $row['HighestQualification'];
            $Vaccancy=$row['PoistionApplicant'];
            $Married =$row['Marital_status'];
            $Mothertongue = $row['Mother_tong'];
            $Contactno =$row['Contactno'];
            $Category = $row['Type_Of_Posistion'];
            $Emailid = $row['Emaild'];
            $ApplicationDate=$row["Appdate"];
            $InterviewDate=$row["Intervdate"];
            $Interviewtime=$row["interviewtime"];
            $Selectionstatus = $row['Selectionstatus'];
            $Fresher=$row['Fresher'];
            $ExpectedCTC = $row['ExpectedCTC'];
            $PreviousCTC = $row['PreviousCTC'];
$Candidateid = "0";

$fullname = "$Firstname $Lastname"; 
            $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='CAN' AND Clientid ='$Clientid'  ";
            
            $result_Nextno = $conn->query($GetNextno);
            if (mysqli_num_rows($result_Nextno) > 0)
            {
                while ($row = mysqli_fetch_array($result_Nextno))
                {
                    $data['Nextno'] = $row['Nextno'];
    
                    $Candidateid = $data['Nextno'] + 1;
                 
                }
            }


            $sqlsave = "INSERT IGNORE INTO indsys1013candidatemaster (Clientid,Candidateid,Title,Firstname,Fullname,Lastname,Mother_tong,Gender,Contactno,Userid,Addormodifydatetime,Type_Of_Posistion,Emaild,HighestQualification,Marital_status,Selectionstatus,ApplicationDate,Interview_held_On,Previous_sainmarks_emp,Designationproposed,Availableoninterview,Fresher,ExpectedCTC,PreviousCTC,MD_Approve,HR_Approve,GM_Approve,DH_Approve,Accepted_By_Candidate,Candidateinterviewtime)
            values('$Clientid','$Candidateid','$Title','$Firstname','$fullname','$Lastname','$Mothertongue','$Gender','$Contactno','$user_id','$date','$Category','$Emailid','$Qualification','$Married','Pending','$ApplicationDate','$InterviewDate','No','$Vaccancy','$InterviewDate','$Fresher','$ExpectedCTC','$PreviousCTC','Pending','Pending','Pending','Pending','Pending','$Interviewtime')";
        
            $resultsave = mysqli_query($conn,$sqlsave);
           
        
            $UpdateNextno = "Update indsys1008mastermodule set Nextno = '$Candidateid' where ModuleID ='CAN' AND Clientid ='$Clientid'";
            $resultUpdate = mysqli_query($conn,$UpdateNextno);


            $resultExists = "Update indsys1032jobappmaster set 

            Selectionstatus='Close',
            Movedtocandidate='Yes',
            Userid = '$user_id',
            Candidateid ='$Candidateid',
            Addormodifydatetime='$date'   
     WHERE Applicationid = '$Applicationid' AND Clientid ='$Clientid'";
  $resultExists01 = $conn->query($resultExists);
  
 
            $Message ="MovedToCandidate";
           
             
      } 
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

//////////////////////////////////////




if($MethodGet == 'Emailverification01')
{
 
$ApplicationidVerify =$form_data['Applicationid'];
$EmailidVerify =$form_data['Emailid'];
$FirstnameVerify =$form_data['Firstname'];


$VerifyHash=md5("$ApplicationidVerify$EmailidVerify");

//echo "mail info | $FirstnameVerify | $ApplicationidVerify | $EmailidVerify | $VerifyHash";

$mail = new PHPMailer(false); 
  $mail->IsSMTP();
  $tstbody = "";

try
{
$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
$mail->isSMTP();
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "tls"; // sets the prefix to the servier
$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
$mail->Port = 587; // set the SMTP port for the GMAIL server
$mail->Username = "indsystesting@gmail.com"; // GMAIL username
$mail->Password = "cllazzawsljgntjj"; // GMAIL password

// $to = str_replace(";",",",$to);
$Toaddress=$EmailidVerify;

$htmlContent="<!doctype html>
<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<title>Email Template</title>
<style>
@media only screen and (max-width: 620px) {
table.body h1 {
font-size: 28px !important;
margin-bottom: 10px !important;
}

table.body p,
table.body ul,
table.body ol,
table.body td,
table.body span,
table.body a {
font-size: 16px !important;
}

table.body .wrapper,
table.body .article {
padding: 10px !important;
}

table.body .content {
padding: 0 !important;
}

table.body .container {
padding: 0 !important;
width: 100% !important;
}

table.body .main {
border-left-width: 0 !important;
border-radius: 0 !important;
border-right-width: 0 !important;
}

table.body .btn table {
width: 100% !important;
}

table.body .btn a {
width: 100% !important;
}

table.body .img-responsive {
height: auto !important;
max-width: 100% !important;
width: auto !important;
}
}
@media all {
.ExternalClass {
width: 100%;
}

.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
line-height: 100%;
}

.apple-link a {
color: inherit !important;
font-family: inherit !important;
font-size: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
text-decoration: none !important;
}

#MessageViewBody a {
color: inherit;
text-decoration: none;
font-size: inherit;
font-family: inherit;
font-weight: inherit;
line-height: inherit;
}

.btn-primary table td:hover {
background-color: #34495e !important;
}

.btn-primary a:hover {
background-color: #34495e !important;
border-color: #34495e !important;
}
}
</style>
</head>
<body style='background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
<span class='preheader' style='color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;'>This is preheader text. Some clients will show this text as a preview.</span>
<table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;' width='100%' bgcolor='#f6f6f6'>
 <tr>
  <td>
  <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>

  <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 620px; padding: 10px; width: 620px; margin: 0 auto;' width='620' valign='top'>
   <div class='content' style='box-sizing: border-box; display: block; margin: 0 auto; max-width: 620px; padding: 10px;'>

    <table role='presentation' class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;' width='100%'>

     <tr>
      <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
       <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
        <tr> <td><center><img alt='Logo' height='80px' src='$domain/assets/images/logo/logo.jpg'></center></td></tr>
        <tr>

         <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
<br/>
<h1 style='text-align: center;color:#2D9A43'>Thanks for applying to Britannia!</h1>
          <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'><b>Hi $FirstnameVerify</b>,</p>
          <span style='font-size:16px;'>We're happy you're here. Let's get your email address verified:</span>
  <br/>  <br/>
 </td>
 </tr>
 <tr>
 <td> <a target='_blank' href='$domain/HRM22/EmailVerify.php?e=$EmailidVerify&h=$VerifyHash&a=$ApplicationidVerify&c=$Clientid'>Click Here for Email Verification</a></td></tr>
<tr>
<td>
  <br/>  <br/>
<small>Need help with anything? Please Don't hesitate to contact us! </small>

         </td>
        </tr>
       </table>
      </td>
     </tr>

    </table>


   </div>
  </td>
  <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
 </tr>
</table>
</body>
</html>";
$SubjectMail="Welcome to BRITANNIA";

$email_array = explode(',', $Toaddress);
for ($i = 0;$i < count($email_array);$i++)
{
$mail->AddAddress($email_array[$i]);
}
$mail->SetFrom('indsystesting@gmail.com', 'BRITANNIA');
$mail->AddReplyTo('indsystesting@gmail.com', 'BRITANNIA');
$mail->Subject = $SubjectMail ;
$mail->IsHTML(true);  
// $mail->Body = $tstbody;
$mail->MsgHTML($htmlContent);


$mail->Send();

$Message="Mail Sent";
$Display=array(       
  'Message'=>  $Message,

 
);


  $str = json_encode($Display);
echo trim($str, '"');



}

catch(phpmailerException $e)
{

}





  }
  ////////////////////////////////////////////////

  if($MethodGet == 'Contactnounique')
  {
  
  
  try
  {
      

      $Contactno=$form_data["Contactno"];
  
      

      $internalMobile = "SELECT * FROM indsys1035internalmobilenumbers WHERE Contactno = '$Contactno' LIMIT 1";
      $resultinternalMobile = $conn->query($internalMobile);
  
      if(mysqli_fetch_row($resultinternalMobile))
      {
        $Message ="InternalNumberYes";
        $Display=array('Message' =>$Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
      }
      else
      {}
     
    $Message = "No";
   
      if (mysqli_connect_errno()){
        $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
      }
      $resultExists = "SELECT * FROM indsys1032jobappmaster WHERE Contactno = '$Contactno' LIMIT 1";
      $resultExists01 = $conn->query($resultExists);
    
     
     if(mysqli_fetch_row($resultExists01))
      {
        
        $Message ="ContactYes";
     
      }
    
      else
      {
        
     }
    

     $Display=array('Message' =>$Message);
    
      $str = json_encode($Display);
    echo trim($str, '"');
    }
    catch(Exception $e)
    {
    
    }
     
         
    }
    ////////////////////////////////////
    if($MethodGet == 'Mailunique')
  {
  
  
  try
  {
      

      $Emailid=$form_data["Emailid"];
  
      
     
    $Message = "No";
    if (preg_match('/\bsainmarks\b/', $Emailid)) {
      $Message ="InternalEmailYes";
      $Display=array('Message' =>$Message);
      $str = json_encode($Display);
      echo trim($str, '"');
      return;
      }
      if (mysqli_connect_errno()){
        $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
      }
      $resultExists = "SELECT * FROM indsys1032jobappmaster WHERE Emaild = '$Emailid' LIMIT 1";
      $resultExists01 = $conn->query($resultExists);
    
     
     if(mysqli_fetch_row($resultExists01))
      {
        
        $Message ="MailYes";
     
      }
    
      else
      {
        
     }
    

     $Display=array('Message' =>$Message);
    
      $str = json_encode($Display);
    echo trim($str, '"');
    }
    catch(Exception $e)
    {
    
    }
     
         
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
    /////////////////////////////////
 ?>
