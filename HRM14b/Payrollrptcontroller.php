<?php 
include '../config.php';

 include 'Payrollsalary.php';
 
 require_once ('class.phpmailer.php');
include ("class.smtp.php");

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
    $AuthorizedType=  $_SESSION["Authorizedtype"];
    $Authorizedno =$_SESSION["Authorizedno"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];

if($MethodGet == 'GETINBEDETAILS')
 {
    $Payrollmonth =$form_data['Payrollmonth'];
    $Payrollyear =$form_data['Payrollyear']; 
    $Category =$form_data['Category']; 

    $_SESSION["Payrollmonth"] =  $Payrollmonth;
    $_SESSION["Payrollyear"] =  $Payrollyear;
    $_SESSION["Category"] =  $Category;
   
   $Category = implode(',', $Category); 
   $Category = "'$Category'"; // added single quote to start and end position
$Category = str_replace(",","','","$Category");     // comma replaced to ','
    $GetState = "SELECT * FROM indsys1026employeepayrolltempmasterdetail where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category in(". $Category.") AND Clientid='$Clientid' ORDER BY Employeeid ";
    $result_Region = $conn->query($GetState);

  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }  
      

 
 
         $Display=array(
           'data01' =>$data01,   
         
                 );
    
         $str = json_encode($Display);
        echo trim($str, '"');
        return;
  }



  if($MethodGet == 'FetchDate')
  {
  
      try
      { 
    
  
        
  
          $Fromdate= date('01-m-Y');
         
  
          $time=strtotime( $Fromdate);
          $Payrollmonth=date("F",$time);
          $Payrollyear=date("Y",$time); 
          $_SESSION["Payrollmonth"] =  $Payrollmonth;
          $_SESSION["Payrollyear"] =  $Payrollyear;
          
           //$Authorizedno =5;
      $Display=array(     

        'Payrollmonth' =>$Payrollmonth,
        'Payrollyear' =>$Payrollyear,
        'Authorizedno' => $Authorizedno
       
  
        
       
    
    );
     
   $str = json_encode($Display);
   echo trim($str, '"');
  }
  catch(Exception $e)
  {
  
  }
  } 

  if($MethodGet == 'GETSESSION')
 {
    $Payrollmonth =$form_data['Payrollmonth'];
    $Payrollyear =$form_data['Payrollyear']; 
    $Category =$form_data['Category']; 

    $_SESSION["Payrollmonth"] =  $Payrollmonth;
    $_SESSION["Payrollyear"] =  $Payrollyear;
    $_SESSION["Category"] =  $Category;
   

      

 
 
         $Display=array(
           
         
                 );
    
         $str = json_encode($Display);
        echo trim($str, '"');
        return;
  }

  if($MethodGet == 'GETBANKSESSION')
  {
     $Payrollmonth =$form_data['Payrollmonth'];
     $Payrollyear =$form_data['Payrollyear']; 
   
     $_SESSION["Payrollmonth"] =  $Payrollmonth;
     $_SESSION["Payrollyear"] =  $Payrollyear;
   
    
 
       
 
  
  
          $Display=array(
            
          
                  );
     
          $str = json_encode($Display);
         echo trim($str, '"');
         return;
   }


   if($MethodGet == 'GETBANKDETAILS')
 {
    $Payrollmonth =$form_data['Payrollmonth'];
    $Payrollyear =$form_data['Payrollyear']; 
  

    $_SESSION["Payrollmonth"] =  $Payrollmonth;
    $_SESSION["Payrollyear"] =  $Payrollyear;
   
   
 // added single quote to start and end position
    // comma replaced to ','
    $GetState = "SELECT * FROM vwemppayrollbanklist where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Clientid='$Clientid' AND NetWages!=0 ORDER BY Employeeid ";
    $result_Region = $conn->query($GetState);

  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }  
      

    
    $sql = "SELECT SUM(NetWages)FROM vwemppayrollbanklist where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  AND Clientid='$Clientid'  ORDER BY Employeeid";
    $result = $conn->query($sql);
    
    while($row = mysqli_fetch_array($result)){
      $NetWages= $row['SUM(NetWages)'];
        
    }
    if(empty($NetWages))
    {
      $NetWages = 0;
    }
    $sqlPerformanceallowance = "SELECT SUM(Performanceallowance)FROM vwemppayrollbanklist where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  AND Clientid='$Clientid'  ORDER BY Employeeid";
    $resultPerformanceallowance = $conn->query($sqlPerformanceallowance);
    
    while($row = mysqli_fetch_array($resultPerformanceallowance)){
      $Performanceallowance= $row['SUM(Performanceallowance)'];
        
    }
    if(empty($Performanceallowance))
    {
      $Performanceallowance = 0;
    }
    
    $GrandTotal = $NetWages+$Performanceallowance;

 
 
         $Display=array(
           'data01' =>$data01, 
           'GrandTotal' =>$GrandTotal,  
         
                 );
    
         $str = json_encode($Display);
        echo trim($str, '"');
        return;
  }
  if($MethodGet == 'GETDEDUCTIONDETAILS')
 {
    $Payrollmonth =$form_data['Payrollmonth'];
    $Payrollyear =$form_data['Payrollyear']; 
  

    $_SESSION["Payrollmonth"] =  $Payrollmonth;
    $_SESSION["Payrollyear"] =  $Payrollyear;
   
   
 // added single quote to start and end position
    // comma replaced to ','
    $GetState = "SELECT * FROM indsys1027employeepayrolldeduction Where Clientid='$Clientid'  ORDER BY Employeeid ";
    $result_Region = $conn->query($GetState);

  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }  
      


 
 
         $Display=array(
           'data01' =>$data01, 
          
         
                 );
    
         $str = json_encode($Display);
        echo trim($str, '"');
        return;
  }

//   if($MethodGet == 'ConfirmList')
//  {
//     $Payrollmonth =$form_data['Payrollmonth'];
//     $Payrollyear =$form_data['Payrollyear']; 
  

//     $_SESSION["Payrollmonth"] =  $Payrollmonth;
//     $_SESSION["Payrollyear"] =  $Payrollyear;





   
   
//  // added single quote to start and end position
//     // comma replaced to ','
//     $Processedrecord = 0;
//     $Processfail = 0;
//     $i=0;


//     $GetState = "SELECT * FROM indsys1027employeepayrolldeduction  ORDER BY Employeeid ";
//     $result_Region = $conn->query($GetState);

  
//     if(mysqli_num_rows($result_Region) > 0) { 
//     while($row = mysqli_fetch_array($result_Region)) {  
//       $i++;
//      $Employeeid = $row['Employeeid'];
//      $Salary_Advance =$row['Salary_Advance'];
//      $FoodDeduction = $row['FoodDeduction'];
//      $TDS = $row['TDS'];

//      $GetChapterLOP = "SELECT * FROM indsys1026employeepayrolltempmasterdetail   WHERE Employeeid = '$Employeeid' and SalMonth = '$Payrollmonth' and  Salyear = '$Payrollyear' AND Clientid ='$Clientid'";

//      $result_Chapter = $conn->query($GetChapterLOP );
//      if(mysqli_num_rows($result_Chapter) > 0) { 
  
  
//      while($rowpayroll = mysqli_fetch_array($result_Chapter)) {  
//        $Lophrs =$rowpayroll['Lophrs'];
//        $ActualOt_HRSNew =$rowpayroll['ActualOTHRS'];
//        $SalMonth =$Payrollmonth;
//        $Salyear = $Payrollyear;
//        $Workeddays =$rowpayroll['Workeddays'];
//        $Leavedays =$rowpayroll['Leavedays'];

//        $Category =$rowpayroll['Category'];
//        $Workingdays =$rowpayroll['Workingdays'];
//        $Nationalholidays =$rowpayroll['Nationalholidays'];
//        $CL =$rowpayroll['CL'];
//        $BasicDA =$rowpayroll['BasicDA'];
//        $HRA =$rowpayroll['HRA'];
//        $Otherallowance_Con_SA =$rowpayroll['Otherallowance_Con_SA'];
//        $OT_HRS = $rowpayroll['OT_HRS'];
//        $DailyAllowanance =$rowpayroll['DailyAllowanance'];
//        $Performanceallowance = $rowpayroll['Performanceallowance'];
     
//        $Message=CallEmppdatepayroll($conn,$Clientid,$user_id,$date, $Employeeid,$SalMonth, $Salyear,$Workeddays, $Leavedays,$Salary_Advance, $FoodDeduction,$TDS,$Category,$Workingdays,$Nationalholidays, $CL, $BasicDA,$HRA,$Otherallowance_Con_SA , $OT_HRS, $DailyAllowanance,$Performanceallowance);

//        if($Message=='Success')
//        {
//         $Processedrecord++;
//        }
//        else
//        {
//         $Processfail++;
//        }
      
//        } 
//      if($i==0)
//      {
//   $Message =='No Record';
      
// $Display=array(
//   'Message' =>$Message, );

// $str = json_encode($Display);
// echo trim($str, '"');
// return;
//      }
// if($Processedrecord==$i)
// {
//   $resultExists = "SELECT * FROM indsys1027employeepayrollexcel WHERE SalMonth = '$Payrollyear' AND Clientid = '$Clientid' And SalMonth ='$Payrollmonth' LIMIT 1";
//   $resultExists01 = $conn->query($resultExists);

//   if (mysqli_fetch_row($resultExists01))
//   {

//       $resultExistsss = "Update indsys1027employeepayrollexcel set 
//       Empfileupdated ='Yes',           
//       Addormodifydatetime ='$date',
//       Userid ='$user_id'    
//   WHERE SalMonth = '$Payrollmonth' AND SalMonth ='$Payrollyear'
//   AND Clientid ='$Clientid'  ";
//       $resultExists0New = $conn->query($resultExistsss);
//       if($resultExists0New ===TRUE)
//       {
// $Message="Success";
//       }
//       else
//       {
//         $Message="Error";
//       }
   

     
//   }

//   else
//   {
//       $sqlsave = "INSERT IGNORE INTO indsys1027employeepayrollexcel (Clientid,
//   SalMonth,Salyear,Empfileupdated,Adminapproval,Userid,Addormodifydatetime)
//    VALUES ('$Clientid','$Payrollmonth','$Payrollyear','Yes','No','$user_id','$date')";
//       $resultsave = mysqli_query($conn, $sqlsave);

//       if($resultsave ===TRUE)
//       {

//         $Message="Success";
//       }
//       else
//       {
//         $Message="Error";
//       }

    
//   }

// }

// else
// {

//   $Message="Record Not Processed";
// }


//      }
//       } 
//     }  
      


//     $Display=array(
//       'Message' =>$Message, 
     
    
//             );
    
//     $str = json_encode($Display);
//     echo trim($str, '"');
//     return;
 
 
       
//   }


if($MethodGet == 'GETDEDUCTIONLIST')
 {
    $Payrollmonth =$form_data['Payrollmonth'];
    $Payrollyear =$form_data['Payrollyear']; 
    $Category =$form_data['Category']; 

    $_SESSION["Payrollmonth"] =  $Payrollmonth;
    $_SESSION["Payrollyear"] =  $Payrollyear;
    $_SESSION["Category"] =  $Category;
   
   $Category = implode(',', $Category); 
   $Category = "'$Category'"; // added single quote to start and end position
$Category = str_replace(",","','","$Category");     // comma replaced to ','
    $GetState = "SELECT * FROM indsys1027employeepayrolldeduction where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category in(". $Category.") AND Clientid='$Clientid' ORDER BY Employeeid ";
    $result_Region = $conn->query($GetState);

  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }  
      

 
 
         $Display=array(
           'data01' =>$data01,   
         
                 );
    
         $str = json_encode($Display);
        echo trim($str, '"');
        return;
  }
if($MethodGet=='FetchDeduction')
{
  $Payrollmonth = $form_data['SalMonth'];
  $Employeeid = $form_data['Employeeid'];
  $Payrollyear = $form_data['Salyear'];
  $GetChapterLOP = "SELECT * FROM indsys1027employeepayrolldeduction   WHERE Employeeid = '$Employeeid' and SalMonth = '$Payrollmonth' and  Salyear = '$Payrollyear' AND Clientid ='$Clientid'";

     $result_Chapter = $conn->query($GetChapterLOP );
     if(mysqli_num_rows($result_Chapter) > 0) { 
  
  
     while($rowpayroll = mysqli_fetch_array($result_Chapter)) {  
       $Fullname =$rowpayroll['Fullname'];
       $Department =$rowpayroll['Department'];
       $Designation =$rowpayroll['Salary_Advance'];
       $Salary_Advance = $rowpayroll['Salary_Advance'];
       $FoodDeduction =$rowpayroll['FoodDeduction'];
       $TDS =$rowpayroll['TDS'];

       $Editrequest ='No';
       $Editrequestapproval =$rowpayroll['Editrequestapproval'];
       $Deleterequest ='No';
       $Deleterequestapproval =$rowpayroll['Deleterequestapproval'];
       $Editrequestreasonraisedby =$rowpayroll['Editrequestreasonraisedby'];
       $Deleterequestreasonraisedby =$rowpayroll['Deleterequestreasonraisedby'];
       $Editingreason =$rowpayroll['Editingreason'];
       $Deletingreason = $rowpayroll['Deletingreason'];
       $Category =$rowpayroll['Category'];
       
}
}

    $Display=array(
      'Fullname' =>$Fullname, 
      'Department' =>$Department, 
      'Designation' =>$Designation, 
      'Salary_Advance' =>$Salary_Advance, 
      'FoodDeduction' =>$FoodDeduction, 
      'TDS' =>$TDS, 
      'Editrequest' =>$Editrequest, 
      'Editrequestapproval' =>$Editrequestapproval, 
      'Deleterequest' =>$Deleterequest, 
      'Deleterequestapproval' =>$Deleterequestapproval, 
      'Editrequestreasonraisedby' =>$Editrequestreasonraisedby, 
      'Deleterequestreasonraisedby' =>$Deleterequestreasonraisedby, 
      'Editingreason' =>$Editingreason,  
       'Deletingreason' =>$Deletingreason, 
      'Category' =>$Category, 
     
    
            );
    
    $str = json_encode($Display);
    echo trim($str, '"');
    return;

}



if($MethodGet=='UpdateEditingreason')
{
  $Payrollmonth = $form_data['SalMonth'];
  $Employeeid = $form_data['Employeeid'];
  $Payrollyear = $form_data['Salyear'];
  $Editingreason = $form_data['Editingreason'];
  $resultExists = "Update indsys1027employeepayrolldeduction set 
  Editrequestapproval='Pending',
  Editingreason='$Editingreason',
  Editrequestreasonraisedby='$user_id',
Addormodifydatetime ='$date',

EditDeleterequest='Edit',
Userid ='$user_id'
   WHERE Employeeid = '$Employeeid' and SalMonth = '$Payrollmonth' and  Salyear = '$Payrollyear' AND Clientid ='$Clientid' ";
$resultExists01 = $conn->query($resultExists);

if($resultExists01 ===TRUE)
{
  $Message= "Success";

 $Message= SendMailEditingApproval($conn,$Clientid,$user_id,$Employeeid,$Payrollmonth,$Payrollyear,$Editingreason,$HRMEmailAddress,$HRM16DigitPassword,$HRMSenderName,$domain);

}
else
{
  $Message= "Fail";
}

    $Display=array(
      'Message' =>$Message, 
     
     
    
            );
    
    $str = json_encode($Display);
    echo trim($str, '"');
    return;

}


function SendMailEditingApproval($conn,$Clientid,$user_id,$Employeeid,$SalMonth,$Salyear,$Reason,$HRMEmailAddress,$HRM16DigitPassword,$HRMSenderName,$domain)
{
  try
  {

    $MailTo ="";
   $GetChapter = "SELECT Emailid  FROM indsys1000useradmin where Clientid ='$Clientid' and  Authorizedno ='1' ";
   $result_Chapter = $conn->query($GetChapter );
   $Message ="mail";
   if (mysqli_num_rows($result_Chapter) > 0) {
    while($row = mysqli_fetch_array($result_Chapter)) {

      $Emailid = $row['Emailid'];
      
      $MailTo .= "$Emailid,";
     
    }
  }

  
if ($MailTo == "")
{
}
else
{
$MailTo = substr($MailTo, 0, -1);

}

$GetChapter02 = "SELECT * FROM indsys1017employeemaster  where Clientid ='$Clientid' and Employeeid ='$Employeeid'  ORDER BY Employeeid";
$result_Chapter02 = $conn->query($GetChapter02 );

if(mysqli_num_rows($result_Chapter02) > 0) {
while($row = mysqli_fetch_array($result_Chapter02)) {

  $Designation =$row['Designation'];
  $Department =$row['Department'];
  $Title = $row['Title'];
  $Firstname = $row['Firstname'];
  $Lastname = $row['Lastname'];
  
  
  
  }
}

$mail = new PHPMailer(false); 
$mail->IsSMTP();
$tstbody = "";
//echo " $ReleivingDate test";

try
{

$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
$mail->isSMTP();
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "tls"; // sets the prefix to the servier
$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
$mail->Port = 587; // set the SMTP port for the GMAIL server
$mail->Username = $HRMEmailAddress; // GMAIL username
$mail->Password = $HRM16DigitPassword; // GMAIL password

// $to = str_replace(";",",",$to);
$Toaddress=$MailTo ; 

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
                        <p>Kindly Approve $Title$Firstname $Lastname for the salary Deduction .

                        <p>$Reason</p>

Kindly check and provide your approval to select the respective Employee.</p>



<tr>
<td><a style='background-color:#06B6EA;color:#ffffff;padding:5px;text-decoration:none' target='_blank' href='$domain/HRM14/AdminEditApproval.php?Employeeid=$Employeeid&Clientid=$Clientid&SalMonth=$SalMonth&Salyear=$Salyear'> Click Here For Approval </a></td>
</tr>
<p>Thank you.</p>



                 
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
           
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

$SubjectMail="Employee Deduction $SalMonth-$Salyear-$Employeeid-Approval";

$email_array = explode(',', $Toaddress);
for ($i = 0;$i < count($email_array);$i++)
{
$mail->AddAddress($email_array[$i]);
}
$mail->SetFrom($HRMEmailAddress, $HRMSenderName);
$mail->AddReplyTo($HRMEmailAddress, $HRMSenderName);
$mail->Subject = $SubjectMail ;
// $mail->Body = $tstbody;
$mail->MsgHTML($Mailcontent);
// optional - MsgHTML will create an alternate automatically

// attachment
// $mail->Send();
if(!$mail->Send())
{
  //  $Message= "Error sending: " . $mail->ErrorInfo;
  $Message= "Error sending" ;
}
else
{
   $Message= 'Mail Sent';
}
return $Message;

}

catch(phpmailerException $e)
{

}

 
  }
  catch(Exception $e)
  {

  }
}



function SendMailDeletingApproval($conn,$Clientid,$user_id,$Employeeid,$SalMonth,$Salyear,$Reason,$HRMEmailAddress,$HRM16DigitPassword,$HRMSenderName,$domain)
{
  try
  {

    $MailTo ="";
   $GetChapter = "SELECT Emailid  FROM indsys1000useradmin where Clientid ='$Clientid' and  Authorizedno ='1' ";
   $result_Chapter = $conn->query($GetChapter );
   $Message ="mail";
   if (mysqli_num_rows($result_Chapter) > 0) {
    while($row = mysqli_fetch_array($result_Chapter)) {

      $Emailid = $row['Emailid'];
      
      $MailTo .= "$Emailid,";
     
    }
  }

  
if ($MailTo == "")
{
}
else
{
$MailTo = substr($MailTo, 0, -1);

}

$GetChapter02 = "SELECT * FROM indsys1017employeemaster  where Clientid ='$Clientid' and Employeeid ='$Employeeid'  ORDER BY Employeeid";
$result_Chapter02 = $conn->query($GetChapter02 );

if(mysqli_num_rows($result_Chapter02) > 0) {
while($row = mysqli_fetch_array($result_Chapter02)) {

  $Designation =$row['Designation'];
  $Department =$row['Department'];
  $Title = $row['Title'];
  $Firstname = $row['Firstname'];
  $Lastname = $row['Lastname'];
  
  
  
  }
}

$mail = new PHPMailer(false); 
$mail->IsSMTP();
$tstbody = "";
//echo " $ReleivingDate test";

try
{

$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
$mail->isSMTP();
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "tls"; // sets the prefix to the servier
$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
$mail->Port = 587; // set the SMTP port for the GMAIL server
$mail->Username = $HRMEmailAddress; // GMAIL username
$mail->Password = $HRM16DigitPassword; // GMAIL password

// $to = str_replace(";",",",$to);
$Toaddress=$MailTo ; 

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
                        <p>Kindly Approve $Title$Firstname $Lastname for the salary Deduction .

                        <p>$Reason</p>

Kindly check and provide your approval to select the respective Employee.</p>



<tr>
<td><a style='background-color:#06B6EA;color:#ffffff;padding:5px;text-decoration:none' target='_blank' href='$domain/HRM14/AdminDeleteApproval.php?Employeeid=$Employeeid&Clientid=$Clientid&SalMonth=$SalMonth&Salyear=$Salyear'> Click Here For Approval </a></td>
</tr>
<p>Thank you.</p>



                 
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
           
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

$SubjectMail="Employee Deduction $SalMonth-$Salyear-$Employeeid-Delete Approval";

$email_array = explode(',', $Toaddress);
for ($i = 0;$i < count($email_array);$i++)
{
$mail->AddAddress($email_array[$i]);
}
$mail->SetFrom($HRMEmailAddress, $HRMSenderName);
$mail->AddReplyTo($HRMEmailAddress, $HRMSenderName);
$mail->Subject = $SubjectMail ;
// $mail->Body = $tstbody;
$mail->MsgHTML($Mailcontent);
// optional - MsgHTML will create an alternate automatically

// attachment
// $mail->Send();
if(!$mail->Send())
{
  //  $Message= "Error sending: " . $mail->ErrorInfo;
  $Message= "Error sending" ;
}
else
{
   $Message= 'Mail Sent';
}
return $Message;

}

catch(phpmailerException $e)
{

}

 
  }
  catch(Exception $e)
  {

  }
}


if($MethodGet=='UpdateDeletingReason')
{
  $Payrollmonth = $form_data['SalMonth'];
  $Employeeid = $form_data['Employeeid'];
  $Payrollyear = $form_data['Salyear'];
  $Deletingreason = $form_data['Deletingreason'];
  $resultExists = "Update indsys1027employeepayrolldeduction set 
  Deleterequestapproval='Pending',
  Deletingreason='$Deletingreason',
  Deleterequestreasonraisedby='$user_id',
Addormodifydatetime ='$date',

EditDeleterequest='Delete',
Userid ='$user_id'
   WHERE Employeeid = '$Employeeid' and SalMonth = '$Payrollmonth' and  Salyear = '$Payrollyear' AND Clientid ='$Clientid' ";
$resultExists01 = $conn->query($resultExists);

if($resultExists01 ===TRUE)
{
  $Message= "Success";
  $Message=SendMailDeletingApproval($conn,$Clientid,$user_id,$Employeeid,$Payrollmonth,$Payrollyear,$Deletingreason,$HRMEmailAddress,$HRM16DigitPassword,$HRMSenderName,$domain);
}
else
{
  $Message= "Fail";
}

    $Display=array(
      'Message' =>$Message, 
     
     
    
            );
    
    $str = json_encode($Display);
    echo trim($str, '"');
    return;

}



if($MethodGet == 'DeleteDeduction')
{
  $Payrollmonth = $form_data['SalMonth'];
  $Employeeid = $form_data['Employeeid'];
  $Payrollyear = $form_data['Salyear'];



  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "DELETE FROM indsys1027employeepayrolldeduction WHERE Employeeid = '$Employeeid' and SalMonth = '$Payrollmonth' and  Salyear = '$Payrollyear' AND Clientid ='$Clientid' ";
  $resultExists01 = $conn->query($resultExists);

    
    
if($resultExists01 ===TRUE)
{
  $Message= "Delete";
}
else
{
  $Message= "Fail";
}

    $Display=array(
      'Message' =>$Message, 
     
     
    
            );
    
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
 
 

 





 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}


if($MethodGet=='UpdateDetails')
{
  $Payrollmonth = $form_data['SalMonth'];
  $Employeeid = $form_data['Employeeid'];
  $Payrollyear = $form_data['Salyear'];
  $Salary_Advance = $form_data['Salary_Advance'];
  $FoodDeduction = $form_data['FoodDeduction'];
  $TDS = $form_data['TDS'];
  $Editrequestapproval = $form_data['Editrequestapproval'];
  $Deleterequestapproval = $form_data['Deleterequestapproval'];
  if(empty($Salary_Advance))
  {
    $Salary_Advance=0;
  }
  if(empty($FoodDeduction))
  {
    $FoodDeduction=0;
  }
  if(empty($TDS))
  {
    $TDS=0;
  }

  $resultExists = "Update indsys1027employeepayrolldeduction set 

  Salary_Advance='$Salary_Advance',
  FoodDeduction='$FoodDeduction',
  
  TDS='$TDS',
  Editrequestapproval='$Editrequestapproval',
  Deleterequestapproval='$Deleterequestapproval',
 
Addormodifydatetime ='$date',


Userid ='$user_id'
   WHERE Employeeid = '$Employeeid' and SalMonth = '$Payrollmonth' and  Salyear = '$Payrollyear' AND Clientid ='$Clientid' ";
$resultExists01 = $conn->query($resultExists);

if($resultExists01 ===TRUE)
{
  $Message= "Success";

  $GetChapterLOP = "SELECT * FROM indsys1026employeepayrolltempmasterdetail   WHERE  Employeeid = '$Employeeid' and SalMonth = '$Payrollmonth' and  Salyear = '$Payrollyear' AND Clientid ='$Clientid'";

       $result_Chapter = $conn->query($GetChapterLOP );
       if(mysqli_num_rows($result_Chapter) > 0) { 
    
    
       while($rowpayroll = mysqli_fetch_array($result_Chapter)) {  
         $Lophrs =$rowpayroll['Lophrs'];
         $ActualOt_HRSNew =$rowpayroll['ActualOTHRS'];
         $SalMonth =$Payrollmonth;
         $Salyear = $Payrollyear;
         $Workeddays =$rowpayroll['Workeddays'];
         $Leavedays =$rowpayroll['Leavedays'];
  
         $Category =$rowpayroll['Category'];
         $Workingdays =$rowpayroll['Workingdays'];
         $Nationalholidays =$rowpayroll['Nationalholidays'];
         $CL =$rowpayroll['CL'];
         $BasicDA =$rowpayroll['BasicDA'];
         $HRA =$rowpayroll['HRA'];
         $Otherallowance_Con_SA =$rowpayroll['Otherallowance_Con_SA'];
         $OT_HRS = $rowpayroll['OT_HRS'];
         $DailyAllowanance =$rowpayroll['DailyAllowanance'];
         $Performanceallowance = $rowpayroll['Performanceallowance'];
       
       //  $Message=CallEmppdatepayroll($conn,$Clientid,$user_id,$date, $Employeeid,$SalMonth, $Salyear,$Workeddays, $Leavedays,$Salary_Advance, $FoodDeduction,$TDS,$Category,$Workingdays,$Nationalholidays, $CL, $BasicDA,$HRA,$Otherallowance_Con_SA , $OT_HRS, $DailyAllowanance,$Performanceallowance);
        }
        }
}
else
{
  $Message= "Fail";
}

    $Display=array(
      'Message' =>$Message, 
     
     
    
            );
    
    $str = json_encode($Display);
    echo trim($str, '"');
    return;

}


if($MethodGet == 'ESILIST')
 {
      // comma replaced to ','
    $GetState = "SELECT * FROM indsys1017employeemaster where EmpActive='Active' and Clientid='$Clientid' ORDER BY Employeeid ";
    $result_Region = $conn->query($GetState);

  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }  
      

 
 
         $Display=array(
           'data01' =>$data01,   
         
                 );
    
         $str = json_encode($Display);
        echo trim($str, '"');
        return;
  }
?>