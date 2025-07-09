<<<<<<< HEAD
<?php 
include '../config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
error_reporting(0);
session_start();


require 'vendor/autoload.php';

  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
      $Emaild =$_SESSION["Emaild"];


      $_SESSION["Tittle"] ="Daily Attendance Detail";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];
 //$MethodGet='Save';
if($MethodGet == 'LoadDate')
{
    $date01 =date("Y-m-d H:i:s" );
   
   
    header('Content-Type: application/json');
    echo json_encode($data01);
 }



 if($MethodGet == 'FetchDate')
 {
 
     try
     { 

         $Fromdate= date('01-m-Y');
         $Todate=  date('t-m-Y',strtotime($Fromdate));
 $Startdate = new DateTime(   $Fromdate);
         $Enddate = new DateTime($Todate);
     
     $Display=array(
       'Fromdate'=>  $Fromdate,
       'Todate'=> $Todate,
       
 
   );
    
  $str = json_encode($Display);
  echo trim($str, '"');
 }
 catch(Exception $e)
 {
 
 }
 } 


 if($MethodGet == 'EMPLATECOME')
{


try
{

    $Fromdate =$form_data['Fromdate'];
    $Todate =$form_data['Todate'];
   
   
    $GetState = "Select Clientid,Employeeid,Title,Firstname,Lastname,Department,Designation,count(Employeeid) as LateCount,sum(OT_HRS) as OT,sum(Workingdays) as Workingdays,sum(Workinghours) as Workinghours
    FROM indsys1030empdailyattendancedetail  
   WHERE Intime > '09.15' AND Attendencedate>='$Fromdate' AND   Attendencedate <='$Todate'
    GROUP BY Clientid, Employeeid 
    HAVING COUNT(Employeeid)>2";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 

    $mytbl["Test"]=$data01;


 

 $Display=array('data01' =>   $mytbl["Test"]);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}





if($MethodGet == 'Emailverification')
{
  $Mailsent_date=date("Y-m-d");
  $Employeeid =$form_data['Employeeid'];
  $_SESSION["Employeeid"] = $Employeeid;

  $resultExistsnew = "SELECT Employeeid,Mailsent_date FROM indsys1031maildata WHERE Employeeid = '$Employeeid' AND Mailsent_date = '$Mailsent_date'";
  $resultExists01new = $conn->query($resultExistsnew);
echo  $Mailsent_date;
echo $Employeeid;
  if(mysqli_fetch_row($resultExists01new))
  {
    
    $Message ="MailExists";
    echo  $Message;
  }

  else
{

  try
  { 

    $Employeeid =$form_data['Employeeid'];
    $_SESSION["Employeeid"] = $Employeeid;
  
    $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
   
    if(mysqli_num_rows($result_Chapter) > 0) {

    while($row = mysqli_fetch_array($result_Chapter)) {   
      
    $Emaild =$row['Emaild'];
    $Firstname =$row['Firstname'];
    $Lastname =$row['Lastname'];
    $Title =$row['Title'];

    $mail = new PHPMailer(false);
        $mail->IsSMTP();
        $tstbody = "";
    
        $mail = new PHPMailer(false);
        $mail->IsSMTP();
        $tstbody = "";
    
        $mail->Host = "smtp.gmail.com"; // SMTP server
        $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
        $mail->isSMTP();
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "tls"; // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
        $mail->Port = 587; // set the SMTP port for the GMAIL server
        $mail->Username = "indsystesting@gmail.com"; // GMAIL username
        $mail->Password = "mdpswobfoltlloza"; // GMAIL password
        
        // $to = str_replace(";",",",$to);
        $Toaddress=$Emaild;
    
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
                        <tr>
    
                          <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
    <br/>
  
           
                           <h2 style='text-align: center;color:#2D9A43'>Warning letter for late coming</h2>
   Dear $Title $Firstname $Lastname   ,<br><br>

   With reference to our recent observation, it has been brought to our notice that you have been arriving at the office beyond the time prescribed for reporting to duty for most of the time.You are well aware of the companies policy about late arrival. 

   <br><br>
   Please note that such late coming is considered quite adversely during the evaluation process of your appraisal or promotion in the company.We hope that you will abide by the rules to the letter.

   <br><br>
   You are further advised to be punctual at work and not to repeat such late comings in future.Please note that the company will be forced to take disciplinary actions, if you continue to arrive late at work.
   <br><br>
   Sincerely,<br>
   Human Resource Department<br>
   SAINMARKS INDUSTRIES (INDIA) Pvt Ltd<br> 
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
    </html>";
    $SubjectMail="Warning Mail for late coming";
        
         $email_array = explode(',', $Toaddress);
        for ($i = 0;$i < count($email_array);$i++)
        {
        $mail->AddAddress($email_array[$i]);
        }
        $mail->SetFrom('indsystesting@gmail.com', 'INDSYS');
        $mail->AddReplyTo('indsystesting@gmail.com', 'INDSYS');
        $mail->Subject = $SubjectMail ;
        // $mail->Body = $tstbody;
        $mail->MsgHTML($htmlContent);
    // optional - MsgHTML will create an alternate automatically
    
    
    
    // attachment
    $mail->Send();




    $str = json_encode("E-Mail Sent Succesfully");
    echo trim($str, '"');
    // $str = json_encode("E-Mail Sent Succesfully")
    $Message = "Mail sent";
   
     $Display=array('Message' =>$Message);



     maildata($conn, $Clientid,$user_id,$Employeeid,$Firstname,$Lastname);
      
    } 
 
  }  
  $str = json_encode($Display);
  echo trim($str, '"');
}
catch(Exception $e)
{

}
}
} 
 

function maildata($conn, $Clientid,$user_id,$Employeeid,$Firstname,$Lastname){
 
  try
  { 

    $Message="";
$Mailsent_date=date("Y-m-d");
    
    
    $resultExistsnew = "SELECT * FROM indsys1017employeemaster WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
    $resultExists01new = $conn->query($resultExistsnew);
 
    while($row = mysqli_fetch_array($resultExists01new)) {  
    
      $Employeeid =$row['Employeeid'];
      $Firstname =$row['Firstname'];
      $Lastname =$row['Lastname'];
      $Clientid =$row['Clientid'];
      $user_id =$row['Userid'];
      $Department =$row['Department'];
      $Designation =$row['Designation'];
      
    }

   
    
    $sqlsave = "INSERT IGNORE INTO indsys1031maildata (Clientid,Userid,Mailsent_date,Employeeid,Firstname,Lastname,Department,Designation)
    values('$Clientid','$user_id','$Mailsent_date','$Employeeid','$Firstname','$Lastname','$Department','$Designation')";

    $resultsave = mysqli_query($conn,$sqlsave);
    $Message="Mailsent";
    
   


    $Display=array('Message' =>$Message);

    $str = json_encode($Display);
  echo trim($str, '"');
  }
  catch(Exception $e)
  {
  
  }
   
       
  }
   
 
function send_email ($conn, $Toaddress, $Clientid,$Employeeid,$Firstname,$Lastname ){

  
  $Mailsent_date=date("Y-m-d");
 
  $resultExistsnew = "SELECT Employeeid,Mailsent_date FROM indsys1031maildata WHERE Employeeid = '$Employeeid' AND Mailsent_date = '$Mailsent_date' LIMIT 1";
  $resultExists01new = $conn->query($resultExistsnew);


if(mysqli_fetch_row($resultExists01new))
{
  
  $Message ="MailExists";
  echo  $Message;
}

else
{
  try
  { 
  
    $i =0;
    $resultExists = "SELECT * FROM indsys1017employeemaster WHERE Clientid ='$Clientid' and Employeeid = '$Employeeid'";
    $resultExists01 = $conn->query($resultExists);
    while ($row = $resultExists01->fetch_assoc())
    {
      $i++;
      
    $Emaild =$row['Emaild'];
    $Firstname =$row['Firstname'];
    $Lastname =$row['Lastname'];
    $Title =$row['Title'];

    echo($Emaild);

    if($Emaild !=null)
      {
    
        $mail = new PHPMailer(false);
        $mail->IsSMTP();
        $tstbody = "";
    
        $mail->Host = "smtp.gmail.com"; // SMTP server
        $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
        $mail->isSMTP();
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "tls"; // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
        $mail->Port = 587; // set the SMTP port for the GMAIL server
        $mail->Username = "indsystesting@gmail.com"; // GMAIL username
        $mail->Password = "mdpswobfoltlloza"; // GMAIL password
        
        // $to = str_replace(";",",",$to);
        $Toaddress=$Emaild;
        
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
                            <tr>
        
                              <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
        <br/>
      
               
                               <h2 style='text-align: center;color:#2D9A43'>Warning letter for late coming</h2>
       Dear $Title $Firstname $Lastname   ,<br><br>
    
       With reference to our recent observation, it has been brought to our notice that you have been arriving at the office beyond the time prescribed for reporting to duty for most of the time.You are well aware of the companies policy about late arrival. 
    
       <br><br>
       Please note that such late coming is considered quite adversely during the evaluation process of your appraisal or promotion in the company.We hope that you will abide by the rules to the letter.
    
       <br><br>
       You are further advised to be punctual at work and not to repeat such late comings in future.Please note that the company will be forced to take disciplinary actions, if you continue to arrive late at work.
       <br><br>

       Sincerely,<br>
       Human Resource Department<br>
       SAINMARKS INDUSTRIES (INDIA) Pvt Ltd<br> 
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
        </html>";;
        $SubjectMail="Warning Mail for late coming";
        
         $email_array = explode(',', $Toaddress);
        for ($i = 0;$i < count($email_array);$i++)
        {
        $mail->AddAddress($email_array[$i]);
        }
        $mail->SetFrom('indsystesting@gmail.com', 'INDSYS');
        $mail->AddReplyTo('indsystesting@gmail.com', 'INDSYS');
        $mail->Subject = $SubjectMail ;
        // $mail->Body = $tstbody;
        $mail->MsgHTML($htmlContent);
        // optional - MsgHTML will create an alternate automatically
      
        
        // attachment
        $mail->Send();
        $str = json_encode("E-Mail Sent Succesfully");

        maildata($conn, $Clientid,$user_id,$Employeeid,$Firstname,$Lastname);
        
        echo trim($str, '"');
    // $str = json_encode("E-Mail Sent Succesfully")
  }        
    }
}
catch(Exception $e)
{

}
}
}

  if($MethodGet == 'Emailverificationbulk')
{
  

    $Fromdate =$form_data['Fromdate'];
    $Todate =$form_data['Todate'];
   
    $GetState = "Select Clientid,Employeeid,Title,Firstname,Lastname,Department,Designation,count(Employeeid) as LateCount,sum(OT_HRS) as OT,sum(Workingdays) as Workingdays,sum(Workinghours) as Workinghours
    FROM indsys1030empdailyattendancedetail  
   WHERE Intime > '09.15' AND Attendencedate>='$Fromdate' AND   Attendencedate <='$Todate'
    GROUP BY Clientid, Employeeid 
    HAVING COUNT(Employeeid)>2";
 
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
    
      $Employeeid =$row['Employeeid'];
      echo $Employeeid;
      $Firstname =$row['Firstname'];
      $Lastname =$row['Lastname'];

      send_email($conn, $Toaddress, $Clientid,$Employeeid,$Firstname,$Lastname);
     // $Message = "Mail sent";
      } 
    }        
 
    //$Message = "Mail sent";
   
     $Display=array('Message' =>$Message);
    
      $str = json_encode($Display);
    echo trim($str, '"');

  }

  ///////////////////




?>



=======
<?php 
include '../config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
error_reporting(0);
session_start();


require 'vendor/autoload.php';

  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
      $Emaild =$_SESSION["Emaild"];


      $_SESSION["Tittle"] ="Daily Attendance Detail";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];
 //$MethodGet='Save';
if($MethodGet == 'LoadDate')
{
    $date01 =date("Y-m-d H:i:s" );
   
   
    header('Content-Type: application/json');
    echo json_encode($data01);
 }



 if($MethodGet == 'FetchDate')
 {
 
     try
     { 

         $Fromdate= date('01-m-Y');
         $Todate=  date('t-m-Y',strtotime($Fromdate));
 $Startdate = new DateTime(   $Fromdate);
         $Enddate = new DateTime($Todate);
     
     $Display=array(
       'Fromdate'=>  $Fromdate,
       'Todate'=> $Todate,
       
 
   );
    
  $str = json_encode($Display);
  echo trim($str, '"');
 }
 catch(Exception $e)
 {
 
 }
 } 


 if($MethodGet == 'EMPLATECOME')
{


try
{

    $Fromdate =$form_data['Fromdate'];
    $Todate =$form_data['Todate'];
   
   
    $GetState = "Select Clientid,Employeeid,Title,Firstname,Lastname,Department,Designation,count(Employeeid) as LateCount,sum(OT_HRS) as OT,sum(Workingdays) as Workingdays,sum(Workinghours) as Workinghours
    FROM indsys1030empdailyattendancedetail  
   WHERE Intime > '09.15' AND Attendencedate>='$Fromdate' AND   Attendencedate <='$Todate'
    GROUP BY Clientid, Employeeid 
    HAVING COUNT(Employeeid)>2";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 

    $mytbl["Test"]=$data01;


 

 $Display=array('data01' =>   $mytbl["Test"]);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}





if($MethodGet == 'Emailverification')
{
  $Mailsent_date=date("Y-m-d");
  $Employeeid =$form_data['Employeeid'];
  $_SESSION["Employeeid"] = $Employeeid;

  $resultExistsnew = "SELECT Employeeid,Mailsent_date FROM indsys1031maildata WHERE Employeeid = '$Employeeid' AND Mailsent_date = '$Mailsent_date'";
  $resultExists01new = $conn->query($resultExistsnew);
echo  $Mailsent_date;
echo $Employeeid;
  if(mysqli_fetch_row($resultExists01new))
  {
    
    $Message ="MailExists";
    echo  $Message;
  }

  else
{

  try
  { 

    $Employeeid =$form_data['Employeeid'];
    $_SESSION["Employeeid"] = $Employeeid;
  
    $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
   
    if(mysqli_num_rows($result_Chapter) > 0) {

    while($row = mysqli_fetch_array($result_Chapter)) {   
      
    $Emaild =$row['Emaild'];
    $Firstname =$row['Firstname'];
    $Lastname =$row['Lastname'];
    $Title =$row['Title'];

    $mail = new PHPMailer(false);
        $mail->IsSMTP();
        $tstbody = "";
    
        $mail = new PHPMailer(false);
        $mail->IsSMTP();
        $tstbody = "";
    
        $mail->Host = "smtp.gmail.com"; // SMTP server
        $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
        $mail->isSMTP();
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "tls"; // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
        $mail->Port = 587; // set the SMTP port for the GMAIL server
        $mail->Username = "indsystesting@gmail.com"; // GMAIL username
        $mail->Password = "mdpswobfoltlloza"; // GMAIL password
        
        // $to = str_replace(";",",",$to);
        $Toaddress=$Emaild;
    
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
                        <tr>
    
                          <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
    <br/>
  
           
                           <h2 style='text-align: center;color:#2D9A43'>Warning letter for late coming</h2>
   Dear $Title $Firstname $Lastname   ,<br><br>

   With reference to our recent observation, it has been brought to our notice that you have been arriving at the office beyond the time prescribed for reporting to duty for most of the time.You are well aware of the companies policy about late arrival. 

   <br><br>
   Please note that such late coming is considered quite adversely during the evaluation process of your appraisal or promotion in the company.We hope that you will abide by the rules to the letter.

   <br><br>
   You are further advised to be punctual at work and not to repeat such late comings in future.Please note that the company will be forced to take disciplinary actions, if you continue to arrive late at work.
   <br><br>
   Sincerely,<br>
   Human Resource Department<br>
   SAINMARKS INDUSTRIES (INDIA) Pvt Ltd<br> 
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
    </html>";
    $SubjectMail="Warning Mail for late coming";
        
         $email_array = explode(',', $Toaddress);
        for ($i = 0;$i < count($email_array);$i++)
        {
        $mail->AddAddress($email_array[$i]);
        }
        $mail->SetFrom('indsystesting@gmail.com', 'INDSYS');
        $mail->AddReplyTo('indsystesting@gmail.com', 'INDSYS');
        $mail->Subject = $SubjectMail ;
        // $mail->Body = $tstbody;
        $mail->MsgHTML($htmlContent);
    // optional - MsgHTML will create an alternate automatically
    
    
    
    // attachment
    $mail->Send();




    $str = json_encode("E-Mail Sent Succesfully");
    echo trim($str, '"');
    // $str = json_encode("E-Mail Sent Succesfully")
    $Message = "Mail sent";
   
     $Display=array('Message' =>$Message);



     maildata($conn, $Clientid,$user_id,$Employeeid,$Firstname,$Lastname);
      
    } 
 
  }  
  $str = json_encode($Display);
  echo trim($str, '"');
}
catch(Exception $e)
{

}
}
} 
 

function maildata($conn, $Clientid,$user_id,$Employeeid,$Firstname,$Lastname){
 
  try
  { 

    $Message="";
$Mailsent_date=date("Y-m-d");
    
    
    $resultExistsnew = "SELECT * FROM indsys1017employeemaster WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
    $resultExists01new = $conn->query($resultExistsnew);
 
    while($row = mysqli_fetch_array($resultExists01new)) {  
    
      $Employeeid =$row['Employeeid'];
      $Firstname =$row['Firstname'];
      $Lastname =$row['Lastname'];
      $Clientid =$row['Clientid'];
      $user_id =$row['Userid'];
      $Department =$row['Department'];
      $Designation =$row['Designation'];
      
    }

   
    
    $sqlsave = "INSERT IGNORE INTO indsys1031maildata (Clientid,Userid,Mailsent_date,Employeeid,Firstname,Lastname,Department,Designation)
    values('$Clientid','$user_id','$Mailsent_date','$Employeeid','$Firstname','$Lastname','$Department','$Designation')";

    $resultsave = mysqli_query($conn,$sqlsave);
    $Message="Mailsent";
    
   


    $Display=array('Message' =>$Message);

    $str = json_encode($Display);
  echo trim($str, '"');
  }
  catch(Exception $e)
  {
  
  }
   
       
  }
   
 
function send_email ($conn, $Toaddress, $Clientid,$Employeeid,$Firstname,$Lastname ){

  
  $Mailsent_date=date("Y-m-d");
 
  $resultExistsnew = "SELECT Employeeid,Mailsent_date FROM indsys1031maildata WHERE Employeeid = '$Employeeid' AND Mailsent_date = '$Mailsent_date' LIMIT 1";
  $resultExists01new = $conn->query($resultExistsnew);


if(mysqli_fetch_row($resultExists01new))
{
  
  $Message ="MailExists";
  echo  $Message;
}

else
{
  try
  { 
  
    $i =0;
    $resultExists = "SELECT * FROM indsys1017employeemaster WHERE Clientid ='$Clientid' and Employeeid = '$Employeeid'";
    $resultExists01 = $conn->query($resultExists);
    while ($row = $resultExists01->fetch_assoc())
    {
      $i++;
      
    $Emaild =$row['Emaild'];
    $Firstname =$row['Firstname'];
    $Lastname =$row['Lastname'];
    $Title =$row['Title'];

    echo($Emaild);

    if($Emaild !=null)
      {
    
        $mail = new PHPMailer(false);
        $mail->IsSMTP();
        $tstbody = "";
    
        $mail->Host = "smtp.gmail.com"; // SMTP server
        $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
        $mail->isSMTP();
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "tls"; // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
        $mail->Port = 587; // set the SMTP port for the GMAIL server
        $mail->Username = "indsystesting@gmail.com"; // GMAIL username
        $mail->Password = "mdpswobfoltlloza"; // GMAIL password
        
        // $to = str_replace(";",",",$to);
        $Toaddress=$Emaild;
        
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
                            <tr>
        
                              <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
        <br/>
      
               
                               <h2 style='text-align: center;color:#2D9A43'>Warning letter for late coming</h2>
       Dear $Title $Firstname $Lastname   ,<br><br>
    
       With reference to our recent observation, it has been brought to our notice that you have been arriving at the office beyond the time prescribed for reporting to duty for most of the time.You are well aware of the companies policy about late arrival. 
    
       <br><br>
       Please note that such late coming is considered quite adversely during the evaluation process of your appraisal or promotion in the company.We hope that you will abide by the rules to the letter.
    
       <br><br>
       You are further advised to be punctual at work and not to repeat such late comings in future.Please note that the company will be forced to take disciplinary actions, if you continue to arrive late at work.
       <br><br>

       Sincerely,<br>
       Human Resource Department<br>
       SAINMARKS INDUSTRIES (INDIA) Pvt Ltd<br> 
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
        </html>";;
        $SubjectMail="Warning Mail for late coming";
        
         $email_array = explode(',', $Toaddress);
        for ($i = 0;$i < count($email_array);$i++)
        {
        $mail->AddAddress($email_array[$i]);
        }
        $mail->SetFrom('indsystesting@gmail.com', 'INDSYS');
        $mail->AddReplyTo('indsystesting@gmail.com', 'INDSYS');
        $mail->Subject = $SubjectMail ;
        // $mail->Body = $tstbody;
        $mail->MsgHTML($htmlContent);
        // optional - MsgHTML will create an alternate automatically
      
        
        // attachment
        $mail->Send();
        $str = json_encode("E-Mail Sent Succesfully");

        maildata($conn, $Clientid,$user_id,$Employeeid,$Firstname,$Lastname);
        
        echo trim($str, '"');
    // $str = json_encode("E-Mail Sent Succesfully")
  }        
    }
}
catch(Exception $e)
{

}
}
}

  if($MethodGet == 'Emailverificationbulk')
{
  

    $Fromdate =$form_data['Fromdate'];
    $Todate =$form_data['Todate'];
   
    $GetState = "Select Clientid,Employeeid,Title,Firstname,Lastname,Department,Designation,count(Employeeid) as LateCount,sum(OT_HRS) as OT,sum(Workingdays) as Workingdays,sum(Workinghours) as Workinghours
    FROM indsys1030empdailyattendancedetail  
   WHERE Intime > '09.15' AND Attendencedate>='$Fromdate' AND   Attendencedate <='$Todate'
    GROUP BY Clientid, Employeeid 
    HAVING COUNT(Employeeid)>2";
 
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
    
      $Employeeid =$row['Employeeid'];
      echo $Employeeid;
      $Firstname =$row['Firstname'];
      $Lastname =$row['Lastname'];

      send_email($conn, $Toaddress, $Clientid,$Employeeid,$Firstname,$Lastname);
     // $Message = "Mail sent";
      } 
    }        
 
    //$Message = "Mail sent";
   
     $Display=array('Message' =>$Message);
    
      $str = json_encode($Display);
    echo trim($str, '"');

  }

  ///////////////////




?>



>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
