<?php 
include 'config.php';
include 'session.php';

session_start();
 $user_id = $_SESSION["Userid"];
     $username = $_SESSION["Username"];
     $usermail=$_SESSION["Mailid"];
     $Clientid =$_SESSION["Clientid"];
  
     $_SESSION["Tittle"] ="Daily Attendance Detail";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
 $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];


if($MethodGet=="DISPATT")
{
    try
    {

        $NoofPresent = 0;  
        $NoofAbsents = 0;
        $Noofleave = 0;
        $NoofEmployee = 0;  
        $Cat1Present = 0;
        $Cat1Absent=CategorywisePresentCount($conn,$Clientid,'Category 1','A',$AttendanceDate);
$Cat1Leave= 0;
$Cat1Employee= 0;
$Cat2Present= 0;
$Cat2Absent= 0;
$Cat2Leave= 0;
$Cat2Employee= 0;
$Cat3Present= 0;
$Cat3Absent= 0;
$Cat3Leave= 0;
$Cat3Employee= 0;
        $AttendanceDate = $form_data['AttendanceDate'];
        $_SESSION['ATTDATE']=$AttendanceDate;
$GetAttendance = "SELECT * FROM indsys1029empdailyattendancemaster WHERE Attendencedate ='$AttendanceDate' AND Clientid='$Clientid'";
$result_Region = $conn->query($GetAttendance);
if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
        $NoofPresent = $row['NoofPresent'];  
        $NoofAbsents = $row['NoofAbsents'];
        $Noofleave = $row['Noofleave'];
        $NoofEmployee = $row['NoofEmployee'];    
        $Cat1Present=CategorywisePresentCount($conn,$Clientid,'Category 1','P',$AttendanceDate);
$Cat1Absent=CategorywisePresentCount($conn,$Clientid,'Category 1','A',$AttendanceDate);
$Cat1Leave=CategorywisePresentCount($conn,$Clientid,'Category 1','L',$AttendanceDate);
$Cat1Employee= CategorywiseEmpCount($conn,$Clientid,'Category 1',$AttendanceDate);
$Cat2Present=CategorywisePresentCount($conn,$Clientid,'Category 2','P',$AttendanceDate);
$Cat2Absent=CategorywisePresentCount($conn,$Clientid,'Category 2','A',$AttendanceDate);
$Cat2Leave=CategorywisePresentCount($conn,$Clientid,'Category 2','L',$AttendanceDate);
$Cat2Employee=CategorywiseEmpCount($conn,$Clientid,'Category 2',$AttendanceDate);
$Cat3Present=CategorywisePresentCount($conn,$Clientid,'Category 3','P',$AttendanceDate);
$Cat3Absent=CategorywisePresentCount($conn,$Clientid,'Category 3','A',$AttendanceDate);
$Cat3Leave=CategorywisePresentCount($conn,$Clientid,'Category 3','L',$AttendanceDate);
$Cat3Employee=CategorywiseEmpCount($conn,$Clientid,'Category 3',$AttendanceDate);
    } 
    
}
$data01 =[];
$GetState = "SELECT * FROM vwdailyattendencedeptmaster where Attendencedate='$AttendanceDate' AND Clientid='$Clientid'   ORDER BY Department";
 $result_Region = $conn->query($GetState);

 if(mysqli_num_rows($result_Region) > 0) { 
 while($row = mysqli_fetch_array($result_Region)) {  
   $data01[] = $row;
   } 
 }  



$mytbl = $data01;




$Display=array('NoofPresent' =>$NoofPresent,
'NoofAbsents' =>$NoofAbsents,
'Noofleave' =>$Noofleave,
'NoofEmployee' =>$NoofEmployee,
'mytbl' =>$mytbl,
'Cat1Present' =>$Cat1Present,
'Cat1Absent' =>$Cat1Absent,
'Cat1Leave' =>$Cat1Leave,
'Cat1Employee' =>$Cat1Employee,
'Cat2Present' =>$Cat2Present,
'Cat2Absent' =>$Cat2Absent,
'Cat2Leave' =>$Cat2Leave,
'Cat2Employee' =>$Cat2Employee,
'Cat3Present' =>$Cat3Present,
'Cat3Absent' =>$Cat3Absent,
'Cat3Leave' =>$Cat3Leave,
'Cat3Employee' =>$Cat3Employee,

);

$str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}


}
function CategorywisePresentCount($conn,$Clientid,$Category,$Attentypestatus,$AttendanceDate)
{
try
{

  $Attencount = 0;
  $Absents = "Select count(Attentypestatus) as Presentabsentcount from vwemployeedailyattendance  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and Attentypestatus='$Attentypestatus' AND Type_Of_Posistion='$Category'  ORDER BY Employeeid ASC";
  $NoofAbsent01 =mysqli_query($conn,$Absents);
  $testAbsent = mysqli_fetch_assoc($NoofAbsent01);
  $Attencount =$testAbsent['Presentabsentcount'];
  return $Attencount;
  
}
catch(Exception $e)
{

}
}

function CategorywiseEmpCount($conn,$Clientid,$Category,$AttendanceDate)
{
try
{

  $Attencount = 0;
  $Absents = "Select count(Employeeid) as TotalEmp from vwemployeedailyattendance  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'   AND Type_Of_Posistion='$Category'  ORDER BY Employeeid ASC";
  $NoofAbsent01 =mysqli_query($conn,$Absents);
  $testAbsent = mysqli_fetch_assoc($NoofAbsent01);
  $Attencount =$testAbsent['TotalEmp'];
  return $Attencount;
  
}
catch(Exception $e)
{

}
}

if($MethodGet == 'FetchDate')
{

    try
    { 
  

      $date=date("Y-m-d");

      $_SESSION['ATTDATE']=$date;
   
 
    
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
if($MethodGet=="SendMail")
{
    try
    {
 
        $AttendanceDate = $form_data['AttendanceDate'];
        $Employeeid = $form_data['Employeeid'];
        $Department = $form_data['Department'];


        $GetChapter = "SELECT * FROM indsys1029empdailyattendancemaster where Clientid ='$Clientid' and Attendencedate = '$AttendanceDate'  ORDER BY Attendencedate";
        $result_Chapter = $conn->query($GetChapter );
        if(mysqli_num_rows($result_Chapter) > 0) { 
    
          
        while($row = mysqli_fetch_array($result_Chapter)) {  
      
          $Empattendencestatus = $row['Empattendencestatus'];
          
          } 
        }



        
        $GetEMPMAIL = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
        $result_EMPMAIL = $conn->query($GetEMPMAIL );
        if(mysqli_num_rows($result_EMPMAIL) > 0) { 
    
          
        while($row = mysqli_fetch_array($result_EMPMAIL)) {  
      
          $Emaild = $row['OfficemailID'];
          $Title= $row['Title'];
          $Firstname = $row['Firstname'];
           $Lastname= $row['Lastname'];
          
          } 
        }

        if($Empattendencestatus =='Close')
        {
          $Message ="Attendence Close";
          $Display=array('Message' =>$Message,

);

$str = json_encode($Display);
echo trim($str, '"');
return;
        }


$TableHead .= '  

<table border="1" cellspacing="0" cellpadding="5">  
<thead>

<tr >

   

    <th>ID</th>
    <th>Name</th>
    <th>Dept</th>
    <th>Designation</th>
   
   
</tr>
</thead>
';  
$content .= '  




   

 <p>  Employee Present Details</P>
   
   


'; 
$content .=$TableHead;

$PresentList =  CreateAttendenceList($AttendanceDate, $Department,'P',$conn,$Clientid);
$content .= $PresentList;
$AbsentList =  CreateAttendenceList($AttendanceDate, $Department,'A',$conn,$Clientid);
if($AbsentList !='')
{
$content .= "</table>";
$content .= '  




   

   <p>Employee Absent Details</p>
   
   


'; 
$content .=$TableHead;

$content .= $AbsentList;
}
$LeaveList =  CreateAttendenceList($AttendanceDate, $Department,'L',$conn,$Clientid);
if($LeaveList!='')
{
$content .= "</table>";
$content .= '  




   

   <p>Employee Leave Details</p>
   
   


'; 
$content .=$TableHead;

$content .= $LeaveList;
$content .= "</table>";
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
  
  
                        <p>Dear <b>$Title$Firstname $Lastname</b></p>
                        <p>Greetings from Sainmarks India Private Limited.</p>
                        <p>Kindly update Employee present and absent details to HR Manager.</b></p>
                        
  
  
                                             $content 
  
  
  
                   
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

$mail = new PHPMailer(false); 
$mail->IsSMTP();
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
    
    // $to = str_replace(";",",",$to);
    $Toaddress= $Emaild;
    $Attendancedate02 = date('d-M-Y', strtotime($AttendanceDate));
    $SubjectMail="Employee Attendance Details-$Attendancedate02";
  
  $email_array = explode(',', $Toaddress);
  for ($i = 0;$i < count($email_array);$i++)
  {
  $mail->AddAddress($email_array[$i]);
  }
  $mail->SetFrom('indsystesting@gmail.com', 'BRITANNIA');
  $mail->AddReplyTo('indsystesting@gmail.com', 'BRITANNIA');
  $mail->Subject = $SubjectMail ;
  // $mail->Body = $tstbody;
  $mail->MsgHTML($Mailcontent);
  // optional - MsgHTML will create an alternate automatically
  
  
  // attachment
  $mail->Send();
  $Message = "Mail Sent";

}
catch(Exception $e)
{

}

$Display=array('Message' =>$Message,

);

$str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}

}

 function CreateAttendenceList($AttendanceDate, $Department,$Status,$conn,$Clientid)
 {
   $output = '';  
   $i=0;
   $GetState = "SELECT * FROM indsys1030empdailyattendancedetail where Attendencedate='$AttendanceDate' and Department='$Department' AND Attentypestatus='$Status' AND Clientid='$Clientid'  ORDER BY Employeeid";
 
   $result_Region = $conn->query($GetState);
 
   if(mysqli_num_rows($result_Region) > 0) { 
   while($row = mysqli_fetch_array($result_Region)) {  
     $i++;
     $output .= '<tr>  
 
     <td>'.$row["Employeeid"].'</td>  
     <td>'.$row["Title"].''.$row["Firstname"].' '.$row["lastname"].'</td>  
     <td>'.$row["Department"].'</td>  
     <td>'.$row["Designation"].'</td>  
    
    
 </tr>  
     ';  
 }  
 return $output;
   }
 
 }

?>