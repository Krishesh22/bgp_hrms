<?php 
include '../config.php';
require_once ('class.phpmailer.php');
include ("class.smtp.php");
require_once('../Tcpdf/examples/tcpdf_include.php');
session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];   
      $_SESSION["Tittle"] ="Candidate";
$Message ='';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];
 if($MethodGet == 'CANEDITRIGHTSNEXTNO')
{


try
{

    $Candidateid =$form_data['Candidateid'];
     $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwcandidateeditingrightsnextno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new))
        {

            $GetChapter = "SELECT * FROM vwcandidateeditingrightsnextno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid'  ";
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





 

 $Display=array('Sno' => $Sno);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}




////////////////////////////

//////////////////////////////////////////////////////
if($MethodGet == 'EditingReasonUpdate')
{


try
{
    
    $Candidateid =$form_data['Candidateid'];
    $EditingRightSno =$form_data['EditingRightSno'];
    $EditingReason =$form_data['EditingReason'];

    
    if(empty($EditingReason))
    {
  
      $Message = "EREASON";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
   

$Randomuserid =  uniqid().date("Ymdhhis");
$Randompassword=rand(0000,9999);





  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }

  $resultExists = "SELECT Candidateid FROM indsys1017candidateeditingrights WHERE Candidateid = '$Candidateid' AND Sno='$Vaccinatedsno'AND Clientid = '$Clientid'  LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {
  $resultExists = "Update indsys1017candidateeditingrights set 

  Editingreason ='$EditingReason',
  EditingUserid ='$user_id',
  EditingUsername ='$username',
  Randomuserid ='$Randomuserid',
  Randompassword ='$Randompassword',

  Addormodifydatetime ='$date'
 

    
     WHERE Candidateid = '$Candidateid' and Sno ='$EditingRightSno' ";
  $resultExists01 = $conn->query($resultExists);


  $Message ="Update";



  }
  else
  {
        $sqlsave = "INSERT IGNORE INTO indsys1017candidateeditingrights (Clientid,Candidateid, Sno,MD_Approval_Status,Editingreason,EditingUserid,EditingUsername,Randomuserid,Randompassword,EditingStatus,Addormodifydatetime,EditingUserMail)
        VALUES ('$Clientid','$Candidateid','$EditingRightSno','Pending','$EditingReason','$user_id','$username','$Randomuserid','$Randompassword','Open','$date','$usermail')";
           $resultsave = mysqli_query($conn, $sqlsave);

           

        // $resultExists01 = $conn->query($resultExists);
 
        $Usermailid = "";

        $GetSuperusermail = "SELECT * FROM indsys1000useradmin where Clientid ='$Clientid' and Authorizedtype = 'HR Manager'  ";
        $result_Supermail = $conn->query($GetSuperusermail );
        if(mysqli_num_rows($result_Supermail) > 0) { 
        
          
        while($row = $result_Supermail->fetch_assoc()) {  
          $Usermailid =$row['Emailid'];
          
          $MailTo .= "$Usermailid,";
          } 
        }



        if ($MailTo == "")
        {
      }
      else
      {
      
          $MailTo = substr($MailTo, 0, -1);
      }

    $Mailcontent ="<!doctype html>
<html>
  <head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>Email</title>
    <style>
    
      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; 
      }


      .body {
        background-color: #f6f6f6;
        width: 100%; 
      }

      .container {
        display: block;
        margin: 0 auto !important;
        max-width: 800px;
        padding: 10px;
        width: 800px; 
      }

      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 800px;
        padding: 10px; 
      }


      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; 
      }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; 
      }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%; 
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; 
      }

    

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 18px;
        font-weight: normal;
        line-height: 1.5;
        margin: 0;
        margin-bottom: 15px; 
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; 
      }

      a {
        color: #3498db;
        text-decoration: underline; 
      }

 

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

    </style>
  </head>
  <body>
    <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body'>
      <tr>
        <td>&nbsp;</td>
        <td class='container'>
          <div class='content'>

            <!-- START CENTERED WHITE CONTAINER -->
            <table role='presentation' class='main'>

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class='wrapper'>
                  <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                      <td>


                      <p>Dear Sir,</p>
                      <p>A request have been raised by  $username to modify the candidate master and details for the following reason listed below
                      </p>    
                      <br/>
                      
                      <br/>          

                     
                    <p>$EditingReason</p>



                 
                      </td>
                    </tr>
                    <tr>
                    <td>Click<a target='_blank' href='$domain/HRM09/EditApprovedMD.php?Candidateid=$Candidateid&Sno=$EditingRightSno'> Here </a>For Approval</td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td align='center' class='content-block'><br/>
              <small>
              Best Regards,<br/>

Human Resource Department<br/>

<span class='apple-link'>SAINMARKS INDUSTRIES (INDIA) Pvt Ltd</span></small>
              
              
              
              </td>
            </tr>
            <tr>
              <td align='center' class='content-block powered-by'>
               <small> Developed by <a target='_blank' href='https://www.indsystech.com/'>Indsys</a>.</small>
              </td>
            </tr>
          </table>

           

          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
";
    

$ToMail = $MailTo;
$SubjectMail = "Candidate Master and Detail Editing Approval";

$to = $ToMail;
$mail = new PHPMailer(false); // the true param means it will throw exceptions on errors, which we need to catch
$mail->IsSMTP(); // telling the class to use SMTP
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
    $mail->Password = "mdpswobfoltlloza"; // GMAIL password
    
 $to = str_replace(";",",",$to);


    $email_array = explode(',',  $to);
    for ($i = 0;$i < count($email_array);$i++)
    {
        $mail->AddAddress($email_array[$i]);
    }
    $mail->SetFrom('indsystesting@gmail.com', 'INDSYS');
    $mail->AddReplyTo('indsystesting@gmail.com', 'INDSYS');
    $mail->Subject =  $SubjectMail ;
    // $mail->Body = $tstbody;
    $mail->MsgHTML($Mailcontent);
    // optional - MsgHTML will create an alternate automatically
    

   
    // attachment
    $mail->Send();
    //$Message = "Mail Send Successfully";
    $Message ="Request Update";

      
  }
catch(Exception $e)
{

}
  }
  $Message ="Request Update";
 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
return;
}
catch(Exception $e)
{

}
 
     
}

/////////////////////////////////////////////
if($MethodGet == 'LoginUpdate')
{
  $Candidateid =$form_data['Candidateid'];
  $EditingUserid =$form_data['EditingUserid'];
  $EditingPassword =$form_data['EditingPassword'];

  if(empty($EditingUserid))
  {

    $Message = "USERID";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }

  if(empty($EditingPassword))
  {

    $Message = "USERPASSWORD";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
  $resultExists = "SELECT Candidateid FROM indsys1017candidateeditingrights WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' AND Randomuserid ='$EditingUserid' AND  Randompassword ='$EditingPassword' AND EditingStatus='Open'  LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {
    $Message = "LOGINSUCCESS";
  }

  else
  {
    $Message = "LOGINFAIL";
  }

  $Display=array('Message' =>$Message);
 
  $str = json_encode($Display);
 echo trim($str, '"');
 return;

}


if($MethodGet == 'LoginDestroy')
{
  try
  {
  $Candidateid =$form_data['Candidateid'];
  $EditingUserid =$form_data['EditingUserid'];
  $EditingPassword =$form_data['EditingPassword'];

  $resultExists = "Update indsys1017candidateeditingrights set 
  EditingStatus ='Close'
   
   
     WHERE Candidateid = ' $Candidateid' And Randomuserid='$EditingUserid' And Randompassword='$EditingPassword' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="st";
 

 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
  }
  catch(Exception $e)
  {
    $Message ="";
 $Display=array('Message' =>$Message);

 $str = json_encode($Display);
echo trim($str, '"');
  }

}

 ?>