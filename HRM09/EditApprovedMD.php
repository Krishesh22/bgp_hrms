<?php 
include '../config.php';
// $conn = new mysqli('localhost', 'root', '', 'hrm') OR die("Faild to connect");

require_once ('class.phpmailer.php');
include ('class.smtp.php');

if (isset($_POST['submit'])) {


$Approvedstatus = $_POST["Approvedstatus"];



    $EditingUserMail ="";
    $Randomuserid ="";
    $Randompassword = "";   
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d H:i:s" );

 
  $Candidateid = $_GET['Candidateid'];
  $Sno = $_GET['Sno'];
 

  $CandidateMDAprroveQry = "Update indsys1017candidateeditingrights set  MD_Approval_Time ='$date',  MD_Approval_Status='$Approvedstatus', Addormodifydatetime ='$date'
  WHERE Candidateid = '$Candidateid' and Sno ='$Sno' ";  
  $resultCandidateMDAprroveQry = $conn->query($CandidateMDAprroveQry);

    if($Approvedstatus =="Approved")
    {
      
    $GetChapter = "SELECT * FROM indsys1017candidateeditingrights where  Candidateid = '$Candidateid' and Sno='$Sno' ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $EditingUserMail =$row['EditingUserMail'];
      $Randomuserid =$row['Randomuserid'];
      $Randompassword = $row['Randompassword'];    
     
      } 
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
    
    
                          <p>Dear User,</p>
                          <p> Your request has been approved. You can use this following  login credentials



                          
                          <p> Candidate ID  = $Candidateid</p>
                           <p> Username = $Randomuserid</p>

                           <br/>
                            <p>Password  = $Randompassword</p>
                            <br/>
                          
                          
                          Im bringing this to your concern that once this login credentials have been used it will get expired</p>    
                          <br/>
                          
                          <br/>          
    
                         
                      
    
    
    
                     
                          </td>
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
    $ToMail = $EditingUserMail;
    $SubjectMail = "Request Has been Approved";
    
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
     
   // echo "Mail Send Successfully";
          
      }
    catch(Exception $e)
    {
    
    }
  }
    header("Location: $domain/HRM09/TYPage.php");



}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Edit Approved API</title>
        <style>
      body{margin-top: 3rem;}
      h1{font-size: 1.3rem;margin-bottom: 15px;color: #2D9B43;}
      .ApprovalApiBox{
        background-color: #f5f5f5;
        padding: 25px;
        margin: 0 50px 0;
      }
select:focus,
      textarea:focus,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="time"]:focus,
input[type="week"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="color"]:focus,
.uneditable-input:focus {   
  border-color:none !important;
  box-shadow: none !important;
  outline: 0 none !important;
}
    </style>
  </head>
  <body>
   <div class="container">


  <div class="row"><div class="col-md-3">&nbsp;</div>
      <div class="col-md-6">

    <p class="text-center mb-0"><img height="100px" class="mb-5" src="../Logo/Sainmarknewlogo.png"></p>
      <div class="ApprovalApiBox">
        <h1>MD Approval</h1>
      <form action="" method="POST">
      <div class="form-group">
<label class="col-form-label">Status</label>
<select class="form-control" name="Approvedstatus">
<option value="Approved">✔️ Approved</option>
<option value="Pending">🕑 Pending</option>
<option value="Rejected">❌ Rejected</option>
</select>
</div>



<div class="form-group text-right">
<button style="margin-top: 25px;" class="btn btn-sm btn-success" name="submit" type="submit">Update</button>
</div>
      </form>
      </div>
      </div>
      </div>


 </div>
 


  </body>
</html>