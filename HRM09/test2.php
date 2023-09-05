<?php 

include '../config.php';
session_start();
error_reporting(E_ALL);




$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail=$_SESSION["Mailid"];
$Clientid =$_SESSION["Clientid"];

$_SESSION["Tittle"] ="Candidate";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );

$Candidateid = 1024;


    $CandidateArray1 = "SELECT * FROM indsys1013candidatemaster  Where Candidateid='$Candidateid' LIMIT 1";
    $result_CandidateArray1 = $conn->query($CandidateArray1);
    $CandidateData1=[];
    if(mysqli_num_rows($result_CandidateArray1) > 0) {
    while($row = mysqli_fetch_array($result_CandidateArray1)) {  
    $CandidateData1= $row;
    }
    }

print_r($CandidateData1);

    $Sno = 0;
    $resultExistsnew = "SELECT Nextno FROM vwcandidatemasterhistrymaxno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' LIMIT 1";
    $resultExists01new = $conn->query($resultExistsnew);
    if (mysqli_fetch_row($resultExists01new))
    {

    $GetChapter = "SELECT * FROM vwcandidatemasterhistrymaxno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid'  ";
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

    $CandidateArray2 = "SELECT Clientid, Candidateid, Title, Firstname, Fullname, Lastname, Candidateimage, Languages, Mother_tong, DOB, Age, Bloodgroup, Religion, Currentlocation, Nationality, Country, Jobtitle, Department, Previous_sainmarks_emp, Previous_Sainmarks_designation, Previous_Sainmarks_salary, Previous_sainmarks_period, Releivingreason, Candidatephone, Emaild, Marital_status, Exp_salary, Exp_salary_nego, Notice_per, Serving_Notice_Period, Vaccancy_Known, Refrence, MD_Approve, HR_Approve, GM_Approve, DH_Approve, MD_Decline, GM_Decline, HR_Decline, DH_Decline, Previous_Salary, Type_Of_Posistion, Date_Of_Joing, HighestQualification, Interview_held_On, Reschedule_interview, Reschedule_interview_reason, Accepted_By_Candidate, Interviewer_Accepted_date, Taken_Interview, Previous_Organization, Expereienced, Fresher, Relocate, Userid, Addormodifydatetime, Previous_sainmarks_department, Gender, Contactno, MD_Approve_datetime, HR_Approve_datetime, GM_Approve_datetime, DH_Approve_datetime, Selectionstatus, Previousdesignation, Availableoninterview, PreviousCTC, ExpectedCTC, NegotiableCTC, CommitedCTC, MD_Approve_ID, HR_Approve_ID, DH_Approve_ID, GM_Approve_ID, Empid, Oldempid, PSworkedMDApproval, PSworkedMDApprovaldatetime, PSworkedMDApproveduserid, interviewerid, Designationproposed, ReportingToid, ReportingTo, Bussiness, Location, Covidvacinnated, Covidvaccinationcertificatepath, Coviddose, Covidlastvaccinateddate, PreviousEmpid, PreviousEmpName, DHinterviewdate, ApplicationDate, Address, Candidateofferaccepteddatetime FROM indsys1013candidatemasterhistory Where Candidateid='$Candidateid' AND Logid ='$Sno'";
    $result_CandidateArray2 = $conn->query($CandidateArray2);
    $CandidateData2=[];
    if(mysqli_num_rows($result_CandidateArray2) > 0) {
    while($row = mysqli_fetch_array($result_CandidateArray2)) {  
    $CandidateData2 = $row;
    }
    }
    echo "<br/><br/>";
    print_r($CandidateData2);
     echo "<br/><br/>";

    $array_diff_result=array_diff($CandidateData2, $CandidateData1);
    print_r($array_diff_result);
    
    $newarraytest = array_unique($array_diff_result);
    $i=0;

    $ModifiedValue = "";
    $orignalvalue ="";
    foreach($array_diff_result as $key => $value){
    $key_temp = $key;
    $key_temp = preg_replace('/[0-9]+/', '', $key_temp);

    $GetChapter = "SELECT * FROM indsys1013candidatemaster where Clientid ='$Clientid' and Candidateid = '$Candidateid'  ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

    while($row = mysqli_fetch_array($result_Chapter)) {  
    $ModifiedValue = $row[$key_temp];
    }
    }

    $changeResult="";

    $GetChapterss = "SELECT * FROM indsys1013candidatemasterhistory where Clientid ='$Clientid' and Candidateid = '$Candidateid' AND Logid ='50' ORDER BY Candidateid";
    $result_Chapterss = $conn->query($GetChapterss );
    if(mysqli_num_rows($result_Chapterss) > 0) { 
    while($row = mysqli_fetch_array($result_Chapterss)) {  
    $orignalvalue = $row[$key_temp];
    $changeResult .="<tr><td>$key_temp</td><td>$ModifiedValue</td><td>$orignalvalue</td></tr>";
    }
    $changeResult = str_replace("<td></td>","","$changeResult");
    $changeResult = str_replace("<tr></tr>","","$changeResult");
    echo "<table>$changeResult</table>";

    }


    }


// $email_content="<!DOCTYPE html>
// <html lang='en' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:v='urn:schemas-microsoft-com:vml'>
// <head>
// <title></title>
// <meta content='text/html; charset=utf-8' http-equiv='Content-Type'/>
// <meta content='width=device-width, initial-scale=1.0' name='viewport'/>
// <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
// <!--[if !mso]><!-->
// <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
// <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'/>
// <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'/>
// <link href='https://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'/>
// <link href='https://fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'/>
// <!--<![endif]-->
// <style>
// 		* {
// 			box-sizing: border-box;
// 		}

// 		body {
// 			margin: 0;
// 			padding: 0;
// 		}

// 		a[x-apple-data-detectors] {
// 			color: inherit !important;
// 			text-decoration: inherit !important;
// 		}

// 		#MessageViewBody a {
// 			color: inherit;
// 			text-decoration: none;
// 		}

// 		p {
// 			line-height: inherit
// 		}

// 		.desktop_hide,
// 		.desktop_hide table {
// 			mso-hide: all;
// 			display: none;
// 			max-height: 0px;
// 			overflow: hidden;
// 		}

// 		@media (max-width:700px) {

// 			.desktop_hide table.icons-inner,
// 			.social_block.desktop_hide .social-table {
// 				display: inline-block !important;
// 			}

// 			.icons-inner {
// 				text-align: center;
// 			}

// 			.icons-inner td {
// 				margin: 0 auto;
// 			}

// 			.row-content {
// 				width: 100% !important;
// 			}

// 			.mobile_hide {
// 				display: none;
// 			}

// 			.stack .column {
// 				width: 100%;
// 				display: block;
// 			}

// 			.mobile_hide {
// 				min-height: 0;
// 				max-height: 0;
// 				max-width: 0;
// 				overflow: hidden;
// 				font-size: 0px;
// 			}

// 			.desktop_hide,
// 			.desktop_hide table {
// 				display: table !important;
// 				max-height: none !important;
// 			}
// 		}
// 	</style>
// </head>
// <body style='background-color: #f9f9f9; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;'>
// <table border='0' cellpadding='0' cellspacing='0' class='nl-container' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f9f9f9;' width='100%'>
// <tbody>
// <tr>
// <td>
// <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-1' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
// <tbody>
// <tr>
// <td>
// <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f4f4f4; color: #000000; width: 680px;' width='680'>
// <tbody>
// <tr>
// <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
// <table border='0' cellpadding='0' cellspacing='0' class='image_block block-1' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
// <tr>
// <td class='pad' style='padding-bottom:10px;padding-top:10px;width:100%;padding-right:0px;padding-left:0px;'>
// <div align='center' class='alignment' style='line-height:10px'><img alt='Yourlogo Light' src='http://localhost/IndsysHRM19/Logo/Sainmarknewlogo.png' style='display: block; height: 70px; border: 0; width:auto; max-width: 100%;' title='Yourlogo Light' width='268'/></div>
// </td>
// </tr>
// </table>
// </td>
// </tr>
// </tbody>
// </table>
// </td>
// </tr>
// </tbody>
// </table>
// <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-2' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
// <tbody>
// <tr>
// <td>
// <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cbdbef; color: #000000; width: 680px;' width='680'>
// <tbody>
// <tr>
// <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 20px; padding-bottom: 20px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>

// <table border='0' cellpadding='0' cellspacing='0' class='text_block block-3' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
// <tr>
// <td class='pad' style='padding-bottom:25px;padding-left:20px;padding-right:20px;padding-top:10px;'>
// <div style='font-family: Georgia, 'Times New Roman', serif'>
// <div class='' style='font-size: 14px; font-family: Georgia, Times, 'Times New Roman', serif; mso-line-height-alt: 16.8px; color: #2f2f2f; line-height: 1.2;'>
// <p style='margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 16.8px;'><span style='font-size:42px;color:#2D9A43'>Data Change Request</span></p>
// </div>
// </div>
// </td>
// </tr>
// </table>
// <table border='0' cellpadding='0' cellspacing='0' class='text_block block-4' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
// <tr>
// <td class='pad' style='padding-bottom:30px;padding-left:30px;padding-right:30px;padding-top:10px;'>
// <div style='font-family: sans-serif'>
// <div class='' style='font-size: 14px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 21px; color: #2f2f2f; line-height: 1.5;'>
// <p style='margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 24px;'><span style='font-size:16px;'>Hi <strong><u>User Name</u></strong>,</span></p>
// <p style='margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;'></p>
// <p style='margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 24px;'><span style='font-size:16px;'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin arcu et risus lacinia ullamcorper.<strong></strong> on <strong><span style=''>Sept. 16, 2022</span></strong></span></p>
// <p style='margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;'></p>

// </div>
// </div>
// </td>
// </tr>
// </table>
// </td>
// </tr>
// </tbody>
// </table>
// </td>
// </tr>
// </tbody>
// </table>
// <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-3' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
// <tbody>
// <tr>
// <td>
// <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;' width='680'>
// <tbody>
// <tr>
// <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
// <table border='0' cellpadding='0' cellspacing='0' class='text_block block-1' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
// <tr>
// <td class='pad' style='padding-bottom:0px;padding-left:20px;padding-right:20px;padding-top:30px;'>
// <div style='font-family: sans-serif'>
// <div class='' style='font-size: 14px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 16.8px; color: #2f2f2f; line-height: 1.2;'>
// <p style='margin: 0; text-align: center; mso-line-height-alt: 16.8px; letter-spacing: 1px;'><strong><span style='font-size:18px;'>Data Modification Details</span></strong></p>
// </div>
// </div>
// </td>
// </tr>
// </table>
// </td>
// </tr>
// </tbody>
// </table>
// </td>
// </tr>
// </tbody>
// </table>
// <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-4' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
// <tbody>
// <tr>
// <td>
// <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;' width='680'>
// <tbody>
// <tr>
// <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; border-bottom: 0px solid #f4f4f4; border-left: 0px solid #f4f4f4; border-right: 0px solid #f4f4f4; border-top: 0px solid #f4f4f4; vertical-align: top;' width='50%'>
// <table border='0' cellpadding='0' cellspacing='0' class='text_block block-2' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
// <tr>
// <td class='pad' style='padding-bottom:15px;padding-left:10px;padding-right:20px;padding-top:15px;'>

// <div class='alignment' style='text-align:center;'>

// 	<style type='text/css'>
// 		table.notication-data-info, .notication-data-info td, .notication-data-info th {
//   border: 1px solid;
//   border-color: #888888;padding: 5px;
// }

// table.notication-data-info {
//   width: 100%;
//   border-collapse: collapse;
// }

// 	</style>
// <table class='notication-data-info' style='width:100%;padding-left:50px;padding-left:0px;padding-top:20px;' border='1'>
// 	<tr>
// 		<td style='width:33%'><p style='margin: 0; font-size: 16px; text-align: center; mso-line-height-alt: 32px;'><strong><span style='font-size:16px;'><span style='color:#2d9a43;'>Change</span></span></strong></p></td>
// 		<td style='width:33%'><p style='margin: 0; font-size: 16px; text-align: center; mso-line-height-alt: 32px;'><strong><span style='font-size:16px;'><span style='color:#2d9a43;'>Orignal Value</span></span></strong></p></td><td><p style='margin: 0; font-size: 16px; text-align: center; mso-line-height-alt: 32px;'><strong><span style='font-size:16px;'><span style='color:#2d9a43;'>Modified Value</span></span></strong></p></td></tr>
// 		<td>First Name</td><td>2</td><td>3</td></tr>
// 		<td>Full Name</td><td>2</td><td>3</td></tr>
// 		<td>Last Name</td><td>2</td><td>3</td></tr>

// </table>
// </div>




// </td>
// </tr>
// </table>
// </td>

// </tr>
// </tbody>
// </table>
// </td>
// </tr>
// </tbody>
// </table>
// <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-5' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
// <tbody>
// <tr>
// <td>
// <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;' width='680'>
// <tbody>
// <tr>
// <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
// <table border='0' cellpadding='0' cellspacing='0' class='text_block block-1' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
// <tr>
// <td class='pad' style='padding-bottom:40px;padding-left:30px;padding-right:30px;padding-top:40px;'>
// <div style='font-family: sans-serif'>
// <div class='' style='font-size: 14px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 21px; color: #2f2f2f; line-height: 1.5;'>
// <p style='margin: 0; font-size: 16px; text-align: center; mso-line-height-alt: 21px;'><span style='font-size:14px;'><span style='color:#000000;'>*Lorem ipsum dolor sit amet, </span><span style='color:#000000;'>consectetur adipiscing elit lectus.</span></span></p>
// </div>
// </div>
// </td>
// </tr>
// </table>
// </td>
// </tr>
// </tbody>
// </table>
// </td>
// </tr>
// </tbody>
// </table>
// <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-6' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
// <tbody>
// <tr>
// <td>
// <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f4f4f4; color: #000000; width: 680px;' width='680'>
// <tbody>
// <tr>
// <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
// <table border='0' cellpadding='0' cellspacing='0' class='image_block block-2' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
// <tr>
// <td class='pad' style='width:100%;padding-right:0px;padding-left:0px;padding-top:20px;'>
// <div align='center' class='alignment' style='line-height:10px'><img alt='' src='http://localhost/IndsysHRM19/Logo/Sainmarknewlogo.png' style='display: block; height: 70px; border: 0; width:auto;  max-width: 100%;' title='Yourlogo Light' width='204'/></div>
// </td>
// </tr>
// </table>
// <table border='0' cellpadding='10' cellspacing='0' class='social_block block-3' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
// <tr>
// <td class='pad'>

// </td>
// </tr>
// </table>

// </td>
// </tr>
// </tbody>
// </table>
// </td>
// </tr>
// </tbody>
// </table>
// <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-7' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
// <tbody>
// <tr>
// <td>

// </td>
// </tr>
// </tbody>
// </table>

// </td>
// </tr>
// </tbody>
// </table>
// </body>
// </html>";

// echo "$email_content";
?>