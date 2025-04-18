<?php 
error_reporting(0);
include '../config.php';
//  include '../session.php';

require_once ('class.phpmailer.php');
include ("class.smtp.php");




error_reporting(0);
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
//$MethodGet ="Save";

function Test($conn)
{
    try
    {

        $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='CAN' AND Clientid = '$Clientid' ";

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
if($MethodGet == 'Dept')
{
   $GetState = "SELECT * FROM indsys1003departmentmaster WHERE Clientid = '$Clientid'   ORDER BY Department";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
        
    header('Content-Type: application/json');
    echo json_encode($data01);
 
}
if($MethodGet == 'Religion')
{
   $GetState = "SELECT * FROM indsys1002religionmaster WHERE Clientid = '$Clientid'  ORDER BY Religion";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    
    
    header('Content-Type: application/json');
    echo json_encode($data01);
 
}

if($MethodGet == 'Dest')
{
   $GetState = "SELECT * FROM indsys1004designationmaster WHERE Clientid = '$Clientid'  ORDER BY Designation";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    
    
    header('Content-Type: application/json');
    echo json_encode($data01);
 
}

if($MethodGet == 'Lang')
{
   $GetState = "SELECT * FROM indsys1015languagesmaster WHERE Clientid = '$Clientid'  ORDER BY Languages";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    
    
    header('Content-Type: application/json');
    echo json_encode($data01);
 
}

///////////////////////////////////////////////

if($MethodGet == 'City')
{
   $GetState = "SELECT * FROM indsys1008citymaster WHERE Clientid = '$Clientid'  ORDER BY City";
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
if($MethodGet == 'Qualifi')
{
   $GetState = "SELECT * FROM indsys1014qualificationmaster WHERE Clientid = '$Clientid'  ORDER BY Degree";
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
   
    $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='CAN' AND Clientid = '$Clientid' ";

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

 if($MethodGet == 'ALL')
 {
    $GetState = "SELECT * FROM indsys1013candidatemaster WHERE Clientid = '$Clientid' ORDER BY Candidateid DESC";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
    header('Content-Type: application/json');
    echo json_encode($data01);
  }

////////////////////////////////////////////////////////////////////////
  
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
    $City = $form_data['City'];
    $Selectionstatus =$form_data['Selectionstatus'];
    // $Title ="Miss.";
    // $Firstname ="Krishna";
    // $Lastname ="Veni";
    // $Gender ="Female";
    // $Qualification ="M.C.A";
    // $Married ="Yes";
    // $Mothertongue ="Tamil";
    // $Contactno ="9597531896";
    // $Category ="Admin&Staff";
    // $Emailid ="Krishnaveni@indsys.holdings";
    // $fullname = " $Firstname  $Lastname ";

    //$Branch = date("Y-m-d", strtotime($Branch));

  if(empty($Firstname))
  {

    $Message = "FNAME";

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
  
  if(empty($Emailid))
  {

    $Message = "Emailid";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
  
  if(empty($Gender))
  {

    $Message = "Gender";

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
/*   
$testfn =              */

Test($conn);

$Candidateid =$_SESSION['Nextno'];
  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "SELECT * FROM indsys1013candidatemaster WHERE Candidateid = '$Candidateid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $Message ="Exists";
 
  }

  else
  {
    $sqlsave = "INSERT IGNORE INTO indsys1013candidatemaster (Clientid,Candidateid,Title,Firstname,Fullname,Lastname,Mother_tong,Gender,Contactno,Userid,Addormodifydatetime,Type_Of_Posistion,Emaild,HighestQualification,Marital_status,Currentlocation,Selectionstatus,MD_Approve,HR_Approve,GM_Approve,DH_Approve,Accepted_By_Candidate)
    values('$Clientid','$Candidateid','$Title','$Firstname','$fullname','$Lastname','$Mothertongue','$Gender','$Contactno','$user_id','$date','$Category','$Emailid','$Qualification','$Married','$City','$Selectionstatus','Pending','Pending','Pending','Pending','Pending')";

    $resultsave = mysqli_query($conn,$sqlsave);
   

    $UpdateNextno = "Update indsys1008mastermodule set Nextno = '$Candidateid' where ModuleID ='CAN' AND Clientid = '$Clientid'";
    $resultUpdate = mysqli_query($conn,$UpdateNextno);
    $Message ="Data Saved";

    $_SESSION["ChapteridCandidateid"] = $Candidateid;
 }


 $_SESSION["Candidateid"] =$Candidateid;

$Nextno["Nextno"] =$Candidateid;
 $Display=array('Nextno' => $Nextno["Nextno"],'Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}

////////////////////////////////////////////////////////////
if($MethodGet == 'FetchCandidate')
{

    try
    { 
  

      $Candidateid =$form_data['Candidateid'];
      $_SESSION["Candidateid"] = $Candidateid;
    $GetChapter = "SELECT * FROM indsys1013candidatemaster where Clientid ='$Clientid' and Candidateid = '$Candidateid'  ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Title =$row['Title'];
      $Firstname =$row['Firstname'];
      $Lastname = $row['Lastname'];
      $Gender =$row['Gender'];
      $Qualification = $row['HighestQualification'];
      $Married =$row['Marital_status'];
      $Mothertongue = $row['Mother_tong'];
      $Contactno =$row['Contactno'];
      $Category = $row['Type_Of_Posistion'];
      $Emailid = $row['Emaild'];
      $Dob =$row['DOB'];
      $Age = $row['Age'];
      $Bloodgroup =$row['Bloodgroup'];
      $Expereience =$row['Expereienced'];
      $Fresher =$row['Fresher'];
      $ServingNoticeperiod = $row['Serving_Notice_Period'];
      $NoticePeriod =$row['Notice_per'];
      $Religion = $row['Religion'];
      $Languagesknown =$row['Languages'];
      $Previoussainmarksemployee =$row['Previous_sainmarks_emp'];
      $Previous_Sainmark_Worked_Designation =$row['Previous_Sainmarks_designation'];
      $PreviousDesignation =$row['Previousdesignation'];
      $PreviousDepartment =$row['Previous_sainmarks_department'];
      $Workingperiod =$row['Previous_sainmarks_period'];
      $Releivingreason =$row['Releivingreason'];
      $CurrentOrganization =$row['Previous_Organization'];
      $Availableoninterview =$row['Availableoninterview'];
      $PreviousPosition = $row['Previousdesignation'];
      $AppliedPosition = $row['Jobtitle'];
      $CurrentCTC =$row['PreviousCTC'];
      $ExpectedCTC =$row['ExpectedCTC'];
      $NegotiableCTC =$row['NegotiableCTC'];
      $Willingtorelocate =$row['Relocate'];
      $MD_Approve =$row['MD_Approve'];
      $HR_Approve = $row['HR_Approve'];
      $GM_Approve =$row['GM_Approve'];
      $DH_Approve = $row['DH_Approve'];
      $Vaccancy_Known =$row['Vaccancy_Known'];
      $Refrence =$row['Refrence'];
      $Taken_Interview =$row['Taken_Interview'];
      $Interview_held_On = $row['Interview_held_On'];
      $Date_Of_Joing =$row['Date_Of_Joing'];
      $MD_Decline =$row['MD_Decline'];
      $GM_Decline = $row['GM_Decline'];
      $HR_Decline = $row['HR_Decline'];
      $DH_Decline =$row['DH_Decline'];
      $Selectionstatus = $row['Selectionstatus'];
     $MD_Approve_datetime=$row['MD_Approve_datetime'];
     $HR_Approve_datetime=$row['HR_Approve_datetime'];
     $GM_Approve_datetime=$row['GM_Approve_datetime'];
     $DH_Approve_datetime=$row['DH_Approve_datetime'];
     $Reschedule_interview=$row['Reschedule_interview'];
     $Reschedule_interview_reason=$row['Reschedule_interview_reason'];
     $CandidateAccepted=$row['Accepted_By_Candidate'];
     $CommitedCTC=$row['CommitedCTC'];
     $City =$row['Currentlocation'];
     $interviewerid = $row['interviewerid'];

     $Reportingname=$row['ReportingTo'];
     $ReportingToid=$row['ReportingToid'];
     $Business=$row['Bussiness'];
     $Designationproposed =$row['Designationproposed'];
     $Location = $row['Location'];
     $OldEmpid =$row['PreviousEmpid'];
     $OldEmpName =$row['PreviousEmpName'];
     $Department =$row['Department'];
     $ApplicationDate =$row['ApplicationDate'];
     $Address =$row['Address'];
     $Candidateinterviewtime =$row['Candidateinterviewtime'];
     $HRinterviewnotes = $row['HRinterviewnotes'];
     $DHinterviewnotes = $row['DHinterviewnotes'];
     $GMinterviewnotes = $row['GMinterviewnotes'];
     $MDinterviewnotes = $row['MDinterviewnotes'];
     $DHinterviewdate = $row['DHinterviewdate'];
     $Candidateofferaccepteddatetime = $row['Candidateofferaccepteddatetime'];
    
     
      } 
    }


 
    
    $Display=array(
      'ApplicationDate' =>$ApplicationDate,
      'Address' =>$Address,
      'OldEmpid'=>  $OldEmpid,
      'OldEmpName'=> $OldEmpName,
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
      'Dob'=> $Dob,
      'Age'=> $Age,
      'Bloodgroup'=> $Bloodgroup,
      'Expereience'=> $Expereience,
      'Fresher'=>$Fresher,
      'ServingNoticeperiod'=> $ServingNoticeperiod,
      'NoticePeriod'=> $NoticePeriod,
      'Religion'=> $Religion,
      'Languagesknown'=> $Languagesknown,
      'Previoussainmarksemployee'=>$Previoussainmarksemployee,
      'Previous_Sainmark_Worked_Designation'=>$Previous_Sainmark_Worked_Designation,
      'PreviousDesignation'=>$PreviousDesignation,
      'PreviousDepartment'=>$PreviousDepartment,
      'Workingperiod'=>$Workingperiod,
      'Releivingreason'=>$Releivingreason,
      'CurrentOrganization'=>$CurrentOrganization,
      'Availableoninterview'=>$Availableoninterview,
      'PreviousPosition'=> $PreviousPosition,
      'AppliedPosition'=> $AppliedPosition,
      'CurrentCTC'=>$CurrentCTC,
      'ExpectedCTC'=>$ExpectedCTC,
     'NegotiableCTC'=>$NegotiableCTC,
      'Willingtorelocate'=>$Willingtorelocate,
      'MD_Approve'=>$MD_Approve,
      'HR_Approve'=> $HR_Approve,
      'GM_Approve'=>$GM_Approve,
      'DH_Approve'=> $DH_Approve,
      'Vaccancy_Known'=>$Vaccancy_Known,
      'Refrence'=>$Refrence,
      'Taken_Interview'=>$Taken_Interview,
     'Interview_held_On'=> $Interview_held_On,
      'Date_Of_Joing'=>$Date_Of_Joing,
    'MD_Decline'=>$MD_Decline,
     'GM_Decline'=> $GM_Decline,
     'HR_Decline'=> $HR_Decline,
     'DH_Decline'=>$DH_Decline,
     'Selectionstatus'=> $Selectionstatus,
    'MD_Approve_datetime'=>$MD_Approve_datetime,
    'HR_Approve_datetime'=>$HR_Approve_datetime,
   'GM_Approve_datetime'=>$GM_Approve_datetime,
    'DH_Approve_datetime'=>$DH_Approve_datetime,
    'Reschedule_interview' =>$Reschedule_interview,
    'Reschedule_interview_reason' =>$Reschedule_interview_reason,
    'CandidateAccepted' =>$CandidateAccepted,
    'CommitedCTC' =>$CommitedCTC,
    'City' =>$City,
    'interviewerid' =>$interviewerid,
    'Reportingname' =>$Reportingname,
    'ReportingToid' =>$ReportingToid,
    'Business' =>$Business,
    'Designationproposed' =>$Designationproposed,
    'Location' =>$Location,
    'Department' =>$Department,
    'Candidateinterviewtime' =>$Candidateinterviewtime,
    'HRinterviewnotes' =>$HRinterviewnotes,
    'DHinterviewnotes' =>$DHinterviewnotes,
    'GMinterviewnotes' =>$GMinterviewnotes,
    'MDinterviewnotes' =>$MDinterviewnotes,
    'DHinterviewdate' =>$DHinterviewdate,
    'Candidateofferaccepteddatetime' =>$Candidateofferaccepteddatetime
   
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }

 //////////////////////////////////////////
 if($MethodGet == 'FetcharraydiffCandidate')
{

    try
    { 
  

      $Candidateid =$form_data['Candidateid'];
      $_SESSION["Candidateid"] = $Candidateid;
    $GetChapter = "SELECT * FROM indsys1013candidatemaster where Clientid ='$Clientid' and Candidateid = '$Candidateid'  ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Title =$row['Title'];
      $Firstname =$row['Firstname'];
      $Lastname = $row['Lastname'];
      $Gender =$row['Gender'];
      $Qualification = $row['HighestQualification'];
      $Married =$row['Marital_status'];
      $Mothertongue = $row['Mother_tong'];
      $Contactno =$row['Contactno'];
      $Category = $row['Type_Of_Posistion'];
      $Emailid = $row['Emaild'];
      $Dob =$row['DOB'];
      $Age = $row['Age'];
      $Bloodgroup =$row['Bloodgroup'];
      $Expereience =$row['Expereienced'];
      $Fresher =$row['Fresher'];
      $ServingNoticeperiod = $row['Serving_Notice_Period'];
      $NoticePeriod =$row['Notice_per'];
      $Religion = $row['Religion'];
      $Languagesknown =$row['Languages'];
      $Previoussainmarksemployee =$row['Previous_sainmarks_emp'];
      $Previous_Sainmark_Worked_Designation =$row['Previous_Sainmarks_designation'];
      $PreviousDesignation =$row['Previousdesignation'];
      $PreviousDepartment =$row['Previous_sainmarks_department'];
      $Workingperiod =$row['Previous_sainmarks_period'];
      $Releivingreason =$row['Releivingreason'];
      $CurrentOrganization =$row['Previous_Organization'];
      $Availableoninterview =$row['Availableoninterview'];
      $PreviousPosition = $row['Previousdesignation'];
      $AppliedPosition = $row['Jobtitle'];
      $CurrentCTC =$row['PreviousCTC'];
      $ExpectedCTC =$row['ExpectedCTC'];
      $NegotiableCTC =$row['NegotiableCTC'];
      $Willingtorelocate =$row['Relocate'];
      $MD_Approve =$row['MD_Approve'];
      $HR_Approve = $row['HR_Approve'];
      $GM_Approve =$row['GM_Approve'];
      $DH_Approve = $row['DH_Approve'];
      $Vaccancy_Known =$row['Vaccancy_Known'];
      $Refrence =$row['Refrence'];
      $Taken_Interview =$row['Taken_Interview'];
      $Interview_held_On = $row['Interview_held_On'];
      $Date_Of_Joing =$row['Date_Of_Joing'];
      $MD_Decline =$row['MD_Decline'];
      $GM_Decline = $row['GM_Decline'];
      $HR_Decline = $row['HR_Decline'];
      $DH_Decline =$row['DH_Decline'];
      $Selectionstatus = $row['Selectionstatus'];
     $MD_Approve_datetime=$row['MD_Approve_datetime'];
     $HR_Approve_datetime=$row['HR_Approve_datetime'];
     $GM_Approve_datetime=$row['GM_Approve_datetime'];
     $DH_Approve_datetime=$row['DH_Approve_datetime'];
     $Reschedule_interview=$row['Reschedule_interview'];
     $Reschedule_interview_reason=$row['Reschedule_interview_reason'];
     $CandidateAccepted=$row['Accepted_By_Candidate'];
     $CommitedCTC=$row['CommitedCTC'];
     $City =$row['Currentlocation'];
     $interviewerid = $row['interviewerid'];

     $Reportingname=$row['ReportingTo'];
     $ReportingToid=$row['ReportingToid'];
     $Business=$row['Bussiness'];
     $Designationproposed =$row['Designationproposed'];
     $Location = $row['Location'];
     $OldEmpid =$row['PreviousEmpid'];
     $OldEmpName =$row['PreviousEmpName'];
     $Department =$row['Department'];
     $ApplicationDate =$row['ApplicationDate'];
     $Address =$row['Address'];
    
     
      } 
    }


 
    
    $Display=array(
      'ApplicationDate' =>$ApplicationDate,
      'Address' =>$Address,
      'OldEmpid'=>  $OldEmpid,
      'OldEmpName'=> $OldEmpName,
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
      'Dob'=> $Dob,
      'Age'=> $Age,
      'Bloodgroup'=> $Bloodgroup,
      'Expereience'=> $Expereience,
      'Fresher'=>$Fresher,
      'ServingNoticeperiod'=> $ServingNoticeperiod,
      'NoticePeriod'=> $NoticePeriod,
      'Religion'=> $Religion,
      'Languagesknown'=> $Languagesknown,
      'Previoussainmarksemployee'=>$Previoussainmarksemployee,
      'Previous_Sainmark_Worked_Designation'=>$Previous_Sainmark_Worked_Designation,
      'PreviousDesignation'=>$PreviousDesignation,
      'PreviousDepartment'=>$PreviousDepartment,
      'Workingperiod'=>$Workingperiod,
      'Releivingreason'=>$Releivingreason,
      'CurrentOrganization'=>$CurrentOrganization,
      'Availableoninterview'=>$Availableoninterview,
      'PreviousPosition'=> $PreviousPosition,
      'AppliedPosition'=> $AppliedPosition,
      'CurrentCTC'=>$CurrentCTC,
      'ExpectedCTC'=>$ExpectedCTC,
     'NegotiableCTC'=>$NegotiableCTC,
      'Willingtorelocate'=>$Willingtorelocate,
      'MD_Approve'=>$MD_Approve,
      'HR_Approve'=> $HR_Approve,
      'GM_Approve'=>$GM_Approve,
      'DH_Approve'=> $DH_Approve,
      'Vaccancy_Known'=>$Vaccancy_Known,
      'Refrence'=>$Refrence,
      'Taken_Interview'=>$Taken_Interview,
     'Interview_held_On'=> $Interview_held_On,
      'Date_Of_Joing'=>$Date_Of_Joing,
    'MD_Decline'=>$MD_Decline,
     'GM_Decline'=> $GM_Decline,
     'HR_Decline'=> $HR_Decline,
     'DH_Decline'=>$DH_Decline,
     'Selectionstatus'=> $Selectionstatus,
    'MD_Approve_datetime'=>$MD_Approve_datetime,
    'HR_Approve_datetime'=>$HR_Approve_datetime,
   'GM_Approve_datetime'=>$GM_Approve_datetime,
    'DH_Approve_datetime'=>$DH_Approve_datetime,
    'Reschedule_interview' =>$Reschedule_interview,
    'Reschedule_interview_reason' =>$Reschedule_interview_reason,
    'CandidateAccepted' =>$CandidateAccepted,
    'CommitedCTC' =>$CommitedCTC,
    'City' =>$City,
    'interviewerid' =>$interviewerid,
    'Reportingname' =>$Reportingname,
    'ReportingToid' =>$ReportingToid,
    'Business' =>$Business,
    'Designationproposed' =>$Designationproposed,
    'Location' =>$Location,
    'Department' =>$Department
   
  
  );
   
  $_SESSION['Candidate1array']=$Display;
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }




 //////////////////////////////////////////////////////
 if($MethodGet == 'UpdatOtherInfo')
{


try
{

    $Dob =$form_data['Dob'];
    $Age =$form_data['Age'];
    $Candidateid =$form_data['Candidateid'];
    $Bloodgroup =$form_data['Bloodgroup'];
    $Expereience =$form_data['Expereience'];
    $Fresher =$form_data['Fresher'];
    $ServingNoticeperiod =$form_data['ServingNoticeperiod'];
    $NoticePeriod =$form_data['NoticePeriod'];
    $Languagesknown =$form_data['Languagesknown'];
    $Religion =$form_data['Religion'];
    $Address =$form_data['Address'];
  $ApplicationDate=$form_data['ApplicationDate'];
  $Availableoninterview=$form_data['Availableoninterview'];
   

  if(empty($Dob))
  {
    $Dob ="0000:00:00";
  }
  if(empty($ApplicationDate))
  {
    $ApplicationDate ="0000:00:00";
  }
  if(empty($Availableoninterview))
  {
    $Availableoninterview ="0000:00:00";
  }

    $Languagesknown = implode(",",$Languagesknown);



    if(empty($Address))
    {
  
      $Message = "Address";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }

/////// DK ////////




CopyCandidateMasterData($conn, $Candidateid);


  $resultExists = "Update indsys1013candidatemaster set 
  DOB ='$Dob',
   Age ='$Age',
   Bloodgroup='$Bloodgroup',
   Expereienced ='$Expereience',
   Fresher='$Fresher',
   Serving_Notice_Period ='$ServingNoticeperiod',
   Notice_per=' $NoticePeriod',
   Addormodifydatetime ='$date',
   Userid ='$user_id',
   Languages ='$Languagesknown',
   Address ='$Address',
   Religion='$Religion',
   ApplicationDate ='$ApplicationDate',
   Availableoninterview ='$Availableoninterview'
     WHERE Candidateid = ' $Candidateid' AND Clientid = '$Clientid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Update";

  
//  data_change_email($conn, $Candidateid,$Clientid);
 

 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
}

////////////////////////////////////////////
if($MethodGet == 'UpdatPreviousInfo')
{


try
{

    $Previoussainmarksemployee =$form_data['Previoussainmarksemployee'];
    $Previous_Sainmarks_designation =$form_data['PreviousDesignation'];
    $Candidateid =$form_data['Candidateid'];
    $PreviousDepartment =$form_data['PreviousDepartment'];
    $Workingperiod =$form_data['Workingperiod'];
    $Releivingreason =$form_data['Releivingreason'];
    $OldEmpid =$form_data['OldEmpid'];
    $OldEmpName =$form_data['OldEmpName'];
  
    CopyCandidateMasterData($conn, $Candidateid);

  $resultExists = "Update indsys1013candidatemaster set 
  Previous_sainmarks_emp ='$Previoussainmarksemployee',
  Previous_Sainmarks_designation ='$Previous_Sainmarks_designation',
  Previous_sainmarks_department='$PreviousDepartment',
  Previous_sainmarks_period ='$Workingperiod',
  Releivingreason='$Releivingreason',
  Addormodifydatetime ='$date',
  PreviousEmpid='$OldEmpid',
  PreviousEmpName ='$OldEmpName',
  Userid ='$user_id'
     WHERE Candidateid = '$Candidateid' ";
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
//////////////////////////////////////////////////
if($MethodGet == 'UpdatPresentInfo')
{


try
{

    $CurrentOrganization =$form_data['CurrentOrganization'];
   // $Availableoninterview =$form_data['Availableoninterview'];
    $Candidateid =$form_data['Candidateid'];
    $PreviousPosition =$form_data['PreviousPosition'];
    $AppliedPosition =$form_data['AppliedPosition'];
    $CurrentCTC =$form_data['CurrentCTC'];
    $ExpectedCTC =$form_data['ExpectedCTC'];
    $NegotiableCTC =$form_data['NegotiableCTC'];
    $Willingtorelocate =$form_data['Willingtorelocate'];
  
    CopyCandidateMasterData($conn, $Candidateid);

  $resultExists = "Update indsys1013candidatemaster set 
  Previous_Organization ='$CurrentOrganization',

  Previousdesignation='$PreviousPosition',
  Jobtitle ='$AppliedPosition',
  PreviousCTC='$CurrentCTC',
  ExpectedCTC='$ExpectedCTC',
  NegotiableCTC ='$NegotiableCTC',
  Relocate='$Willingtorelocate',
  Addormodifydatetime ='$date',
  Userid ='$user_id'
     WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' ";
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
///////////////////////////////////////////////////////
if($MethodGet == 'UpdatinterviewInfo')
{


try
{



    $Taken_Interview =$form_data['Taken_Interview'];
    $Interview_held_On =$form_data['Interview_held_On'];
    $Candidateid =$form_data['Candidateid'];
    $Reschedule_interview =$form_data['Reschedule_interview'];
    $Reschedule_interview_reason =$form_data['Reschedule_interview_reason'];
    $interviewerid = $form_data['interviewerid'];
    $DHinterviewdate = $form_data['DHinterviewdate'];
    $Candidateinterviewtime = $form_data['Candidateinterviewtime'];

    if(empty($Interview_held_On))
    {
      $Interview_held_On ="0000:00:00";
    }
    if(empty($Reschedule_interview))
    {
      $Reschedule_interview ="0000:00:00";
    }
    if(empty($DHinterviewdate))
    {
      $DHinterviewdate ="0000:00:00";
    }





    if(empty($Interview_held_On))
    {
  
  $Message = "Interview_held_On";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }

    if(empty($interviewerid))
    {
  
  $Message = "interviewerid";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
  
    CopyCandidateMasterData($conn, $Candidateid);

  $resultExists = "Update indsys1013candidatemaster set 
  Taken_Interview ='$Taken_Interview',
  Interview_held_On ='$Interview_held_On',
  Reschedule_interview='$Reschedule_interview',
  Reschedule_interview_reason ='$Reschedule_interview_reason',
  interviewerid ='$interviewerid',
  DHinterviewdate ='$DHinterviewdate',
  Addormodifydatetime ='$date',
  Userid ='$user_id',
  Candidateinterviewtime ='$Candidateinterviewtime'
 
     WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Update";


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
//UpdateReschduleinterview($conn,$Candidateid,$Reschedule_interview);
}
catch(Exception $e)
{

}
 
     
}
///////////////////////////////////////////////////
function UpdateReschduleinterview($conn,$Candidateid,$Reschedule_interview)
{
  try
  {
    $resultExists = "Update indsys1013candidatemaster set  Reschedule_interview='$Reschedule_interview' WHERE Candidateid = '$Candidateid' ";
    $resultExists01 = $conn->query($resultExists);
    $Message ="Update";
  }
  catch(Exception $e)
  {

  }
}


//////////////////////////
if($MethodGet == 'UpdateApproval')
{


try
{

  

    $ApprovedType =$form_data['ApprovedType'];
    $Approvedstatus =$form_data['Approvedstatus'];
    $Candidateid =$form_data['Candidateid'];
    $HR_Decline =$form_data['HR_Decline'];
    $DH_Decline =$form_data['DH_Decline'];
    $GM_Decline =$form_data['GM_Decline'];
    $MD_Decline =$form_data['MD_Decline'];
    $Selectedstatus ="Appointed";
    if(empty($ApprovedType))
    {
  
      $Message = "Approved";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Approvedstatus))
    {
  
      $Message = "Status";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    CopyCandidateMasterData($conn, $Candidateid);
if($ApprovedType =="HR" && $Approvedstatus =="Rejected" )
{
    $Selectedstatus="Rejected";
  if(empty($HR_Decline))
  {

    $Message = "HR_Decline";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
  else
  {
    $resultExists = "Update indsys1013candidatemaster set 
    HR_Approve_ID ='$user_id',
    HR_Approve_datetime ='$date',
    HR_Approve='$Approvedstatus',
    Addormodifydatetime ='$date',
    HR_Decline ='$HR_Decline',
    MD_Approve='$Approvedstatus',
    GM_Approve='$Approvedstatus',
    DH_Approve='$Approvedstatus',
    Selectionstatus ='$Selectedstatus',
    Userid ='$user_id'
   
   
       WHERE Candidateid = '$Candidateid' ";
    $resultExists01 = $conn->query($resultExists);
    $Message ="Update";
    return;

  }

}
if($ApprovedType =="GM" && $Approvedstatus =="Rejected" )
{
  
  $Selectedstatus="Rejected";
  if(empty($GM_Decline))
  {

    $Message = "GM_Decline";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
  else
  {
    $resultExists = "Update indsys1013candidatemaster set 
    GM_Approve_ID ='$user_id',
     GM_Approve_datetime ='$date',
     GM_Approve='$Approvedstatus',
     Addormodifydatetime ='$date',
     GM_Decline ='$GM_Decline',
     MD_Approve='$Approvedstatus',
     GM_Approve='$Approvedstatus',
     DH_Approve='$Approvedstatus',
     HR_Approve='$Approvedstatus',
     Selectionstatus ='$Selectedstatus',
     Userid ='$user_id'
    
    
        WHERE Candidateid = '$Candidateid' ";
     $resultExists01 = $conn->query($resultExists);
     $Message ="Update";
     $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
return;

  }

}
if($ApprovedType =="DH" && $Approvedstatus =="Rejected" )
{
  $Selectedstatus="Rejected";
  if(empty($DH_Decline))
  {

    $Message = "DH_Decline";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
   
  }
  else
  {
    $resultExists = "Update indsys1013candidatemaster set 
    DH_Approve_ID ='$user_id',
    DH_Approve_datetime ='$date',
    DH_Approve='$Approvedstatus',
    Addormodifydatetime ='$date',
    DH_Decline ='$DH_Decline',
    Selectionstatus ='$Selectedstatus',
    MD_Approve='$Approvedstatus',
    GM_Approve='$Approvedstatus',
    DH_Approve='$Approvedstatus',
    HR_Approve='$Approvedstatus',
    Userid ='$user_id'
   
   
       WHERE Candidateid = '$Candidateid' ";
    $resultExists01 = $conn->query($resultExists);
    $Message ="Update";
    $Display=array('Message' =>$Message);

    $str = json_encode($Display);
  echo trim($str, '"');
  return;

  }

}
if($ApprovedType =="MD" && $Approvedstatus =="Rejected" )
{
  $Selectedstatus="Rejected";
    
  if(empty($MD_Decline))
  {

    $Message = "MD_Decline";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
  else
  {
    $resultExists = "Update indsys1013candidatemaster set 
    MD_Approve_ID ='$user_id',
    MD_Approve_datetime ='$date',
    MD_Approve='$Approvedstatus',
    Addormodifydatetime ='$date',
    MD_Decline ='$MD_Decline',
    Selectionstatus ='$Selectedstatus',
    GM_Approve='$Approvedstatus',
    DH_Approve='$Approvedstatus',
    HR_Approve='$Approvedstatus',
    Userid ='$user_id'
   
   
       WHERE Candidateid = '$Candidateid' ";
    $resultExists01 = $conn->query($resultExists);
    $Message ="Update";
    $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
return;

  }

}
 
if($ApprovedType=="MD")
{
  $resultExists = "Update indsys1013candidatemaster set 
  MD_Approve_ID ='$user_id',
  MD_Approve_datetime ='$date',
  MD_Approve='$Approvedstatus',
  Addormodifydatetime ='$date',
  MD_Decline ='$MD_Decline',
  Selectionstatus ='$Selectedstatus',
  Userid ='$user_id'
 
 
     WHERE Candidateid = '$Candidateid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Update";
}
if($ApprovedType=="HR")
{
  $resultExists = "Update indsys1013candidatemaster set 
  HR_Approve_ID ='$user_id',
  HR_Approve_datetime ='$date',
  HR_Approve='$Approvedstatus',
  Addormodifydatetime ='$date',
  HR_Decline ='$HR_Decline',
  Userid ='$user_id'
 
 
     WHERE Candidateid = '$Candidateid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Update";


}
if($ApprovedType=="GM")
{
  $resultExists = "Update indsys1013candidatemaster set 
 GM_Approve_ID ='$user_id',
  GM_Approve_datetime ='$date',
  GM_Approve='$Approvedstatus',
  Addormodifydatetime ='$date',
  GM_Decline ='$GM_Decline',
  Userid ='$user_id'
 
 
     WHERE Candidateid = '$Candidateid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Update";
}
if($ApprovedType=="DH")
{
  $resultExists = "Update indsys1013candidatemaster set 
  DH_Approve_ID ='$user_id',
  DH_Approve_datetime ='$date',
  DH_Approve='$Approvedstatus',
  Addormodifydatetime ='$date',
  DH_Decline ='$DH_Decline',
  Userid ='$user_id'
 
 
     WHERE Candidateid = '$Candidateid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Update";
}


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
///////////////////////////////////////////////////////
 //////////////////////////////////////////
 if($MethodGet == 'UpdatDOJInfo')
{


try
{

    $CandidateAccepted =$form_data['CandidateAccepted'];
    $Date_Of_Joing =$form_data['Date_Of_Joing'];
    $Candidateid =$form_data['Candidateid'];
    $CommitedCTC =$form_data['CommitedCTC'];
    $Selectionstatus =$form_data['Selectionstatus'];
   
    CopyCandidateMasterData($conn, $Candidateid);


    if(empty($Date_Of_Joing))
    {
      $Date_Of_Joing ="0000:00:00";
    }
  
  $resultExists = "Update indsys1013candidatemaster set 
  Accepted_By_Candidate ='$CandidateAccepted',
  Date_Of_Joing ='$Date_Of_Joing',
  CommitedCTC='$CommitedCTC'

     Addormodifydatetime ='$date',
   Userid ='$user_id'
    
     WHERE Candidateid = ' $Candidateid' ";
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

////////////////////////////////////////////////////////////////
if($MethodGet == 'Update')
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
    $Candidateid =$form_data['Candidateid'];
    $fullname = " $Firstname  $Lastname ";
    $City =$form_data['City'];
    $Selectionstatus =$form_data['Selectionstatus'];


    if(empty($Firstname))
    {
  
      $Message = "FNAME";
  
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
    
    if(empty($Emailid))
    {
  
      $Message = "Emailid";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    
    if(empty($Gender))
    {
  
      $Message = "Gender";
  
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
/*   
$testfn =              */




  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  CopyCandidateMasterData($conn, $Candidateid);


  $resultExists = "Update indsys1013candidatemaster set 
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
  Currentlocation = '$City',
  Selectionstatus = '$Selectionstatus'

    
     WHERE Candidateid = ' $Candidateid' ";
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
///////////////////////////////////////////////////////////////////////////////////
if($MethodGet == 'GetAge')
{


try
{

    $Dob =$form_data['Dob'];
    $dateOfBirth = $Dob;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    
 
  $Age =$diff->format('%y');
 

 $Display=array('Age' =>$Age);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
////////////////////////////////////////////////////////////
if($MethodGet == 'MoveToCandidate')
{


try
{
    
    $Candidateid =$form_data['Candidateid'];
  

  




    $GetChapter = "SELECT * FROM indsys1013candidatemaster where Clientid ='$Clientid' and Candidateid = '$Candidateid'  ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      
      $Title =$row['Title'];
      $Firstname =$row['Firstname'];
      $Lastname = $row['Lastname'];
      $Gender =$row['Gender'];
      $Qualification = $row['HighestQualification'];
      $Married =$row['Marital_status'];
      $Mothertongue = $row['Mother_tong'];
      $Contactno =$row['Contactno'];
      $Category = $row['Type_Of_Posistion'];
      $Emailid = $row['Emaild'];
      $Dob =$row['DOB'];
      $Nationality =$row['Nationality'];
      $Country=$row['Country'];
      $Age = $row['Age'];
      $Bloodgroup =$row['Bloodgroup'];
      $Expereience =$row['Expereienced'];
      $Fresher =$row['Fresher'];
      $ServingNoticeperiod = $row['Serving_Notice_Period'];
      $NoticePeriod =$row['Notice_per'];
      $Religion = $row['Religion'];
      $Languagesknown =$row['Languages'];
      $Previoussainmarksemployee =$row['Previous_sainmarks_emp'];
      $Previous_Sainmark_Worked_Designation =$row['Previous_Sainmarks_designation'];
      $PreviousDesignation =$row['Previousdesignation'];
      $PreviousDepartment =$row['Previous_sainmarks_department'];
      $Workingperiod =$row['Previous_sainmarks_period'];
      $Releivingreason =$row['Releivingreason'];
      $CurrentOrganization =$row['Previous_Organization'];
      $Availableoninterview =$row['Availableoninterview'];
      $PreviousPosition = $row['Previousdesignation'];
      $AppliedPosition = $row['Jobtitle'];
      $CurrentCTC =$row['PreviousCTC'];
      $ExpectedCTC =$row['ExpectedCTC'];
      $NegotiableCTC =$row['NegotiableCTC'];
      $Willingtorelocate =$row['Relocate'];
      $MD_Approve =$row['MD_Approve'];
      $HR_Approve = $row['HR_Approve'];
      $GM_Approve =$row['GM_Approve'];
      $DH_Approve = $row['DH_Approve'];
      $Vaccancy_Known =$row['Vaccancy_Known'];
      $Refrence =$row['Refrence'];
      $Taken_Interview =$row['Taken_Interview'];
      $Interview_held_On = $row['Interview_held_On'];
      $Date_Of_Joing =$row['Date_Of_Joing'];
      $MD_Decline =$row['MD_Decline'];
      $GM_Decline = $row['GM_Decline'];
      $HR_Decline = $row['HR_Decline'];
      $DH_Decline =$row['DH_Decline'];
      $Selectionstatus = $row['Selectionstatus'];
     $MD_Approve_datetime=$row['MD_Approve_datetime'];
     $HR_Approve_datetime=$row['HR_Approve_datetime'];
     $GM_Approve_datetime=$row['GM_Approve_datetime'];
     $DH_Approve_datetime=$row['DH_Approve_datetime'];
     $Reschedule_interview=$row['Reschedule_interview'];
     $Reschedule_interview_reason=$row['Reschedule_interview_reason'];
     $CandidateAccepted=$row['Accepted_By_Candidate'];
     $CommitedCTC=$row['CommitedCTC'];
     $City =$row['Currentlocation'];
     $interviewerid = $row['interviewerid'];

     $Reportingname=$row['ReportingTo'];
     $ReportingToid=$row['ReportingToid'];
     $Business=$row['Bussiness'];
     $Designationproposed =$row['Designationproposed'];
     $Location = $row['Location'];
     $OldEmpid =$row['PreviousEmpid'];
     $OldEmpName =$row['PreviousEmpName'];
     $Department =$row['Department'];
     $ApplicationDate =$row['ApplicationDate'];
     $Address =$row['Address'];
     $Covidvacinnated =$row['Covidvacinnated'];
    
    $fullname =$row['Fullname'];
     $Empid =$row['Empid'];
    if($Empid !='0')
    {
      $Message = "Alreadyin";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;

    }

    if(empty($Department))
    {
      $Message = "Department";

      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if( $MD_Approve =='Approved')
    {
      $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='EMP'  ";

      $result_Nextno = $conn->query($GetNextno);
      if (mysqli_num_rows($result_Nextno) > 0)
      {
          while ($row = mysqli_fetch_array($result_Nextno))
          {
              $data['Nextno'] = $row['Nextno'];
 
              $data['Nextno'] = $data['Nextno'] + 1;
          }
      }
 
      $Employeeid = $data['Nextno'];

      $FinalStatus = "No";

      $resultExists = "SELECT * FROM indsys1017candidatefinalfitment WHERE Candidateid = '$Candidateid' LIMIT 1";
      $resultExists01 = $conn->query($resultExists);
    
     
     if(mysqli_fetch_row($resultExists01))
      {
        
        $FinalStatus = "Yes";
     
      }
      else
      {
        $Message = "FinalNotMove";

        $Display=array('Message' =>$Message);
     
        $str = json_encode($Display);
       echo trim($str, '"');
       return;
      }
      $resultExists = "SELECT * FROM indsys1017employeemaster WHERE Candidateid = '$Candidateid' LIMIT 1";
      $resultExists01 = $conn->query($resultExists);
    
     
     if(mysqli_fetch_row($resultExists01))
      {
        
        $Message ="Exists";
     
      }
    
      else
      {


    if($Gender =="Male")
    {
      $image = "MenAvatar.jpg";
    }
    else
    {
      $image = "WomenAvatar.jpg";
    }
 
    $directory2 = "../EMPimage/";
    $directory = "../EMPimage/$Employeeid/";
    
    if(!is_dir($directory2)){mkdir($directory2, 0777);}
    if(!is_dir($directory)){mkdir($directory, 0777);}
      
    $chk ="";
    $files = null;
    if(!is_dir($directory)){
   
    }
    else
    {
      foreach (new DirectoryIterator($directory) as $fileInfo) {
        if(!$fileInfo->isDot()) {
            unlink($fileInfo->getPathname());
        }
      
    }
    }
   
      
    $chk ="";
    $files = null;
    if(!is_dir($directory)){
   
    }
    // else
    // {
    //   foreach (new DirectoryIterator($directory) as $fileInfo) {
    //     if(!$fileInfo->isDot()) {
    //         unlink($fileInfo->getPathname());
    //     }
      
    // }
    // }
 
      if(!is_dir($directory)){
      mkdir($directory, 0777);
              }

              $uniquesavename=time().uniqid(rand());            
              $Logofilepath = $directory .$uniquesavename.'.jpg';
              $imageget = file_get_contents($image);
         file_put_contents($Logofilepath,$imageget);

         $AllowOt = "No";
    if($Category=="Workers")
    {
      $AllowOt ="Yes";
    }
    TestEmp($conn,$Category,$Department);
    $Employeeid =$_SESSION['Nextno'];
    $Autogerenreateid = $_SESSION['AutogenerateNo'];
    $CategoryAutogenerationno = $_SESSION['CategoryAutogenerationNo'];


         $fullname = "$Firstname $Lastname";
        $sqlsave = "INSERT IGNORE INTO indsys1017employeemaster (Clientid,Employeeid,Candidateid,Title,Firstname,
        Fullname,Lastname,Languages,Mother_tong,DOB,Age,Bloodgroup,Nationality,Country,
        Department,Emaild,Marital_status,Date_Of_Joing,Relocate,Userid,Addormodifydatetime,
        Previous_sainmarks_department,Gender,Contactno,Allow_LOP,Shift,
        Employee_CL,Salary_mode,Week_Off,Employee_Rights,Basic,
        HR_Allowance,Other_Allowance,TA,Performance_allowance,Day_allowance,
        PF_Yesandno,PF,ESI_Yesandno,ESI,TDS,Professional_tax,Net_Salary,
        Gross_Salary,Empusername,Emppassword,Designation,EmpActive,Empimage,
        Type_Of_Posistion,Expereienced,Fresher,ESIno,UANno,Aadharno,Panno,Vacinated,EmployeeType,
        PFJoindate,ESIJoindate,Bonouspercentage,Empservingnoticeperiod,PFEmployeeCompany,ESIEmployeeCompany,Highestqualification,BackgroundVerification,SalaryType,Allow_OT,Smsverified,Emailverified,EmpAutogenerationno,CatAutogenerationno)
        values('$Clientid','$Employeeid','$Candidateid','$Title','$Firstname',
        '$fullname','$Lastname',
        '$Languagesknown','$Mothertongue','$Dob','$Age','$Bloodgroup','$Nationality','$Country','$Department',
        '$Emailid','$Married','$Date_Of_Joing','$Willingtorelocate','$user_id','$date',
        '$PreviousDepartment','$Gender','$Contactno','No',NULL,
        '1.5','Bank','Sunday','General User',0,0,0,0,0,0,'Yes','0','No',0,0,0,0,
        0,'$Empid','$Empid','$Designationproposed','Active','$Logofilepath','$Category','$Expereience','$Fresher',NULL,NULL,NULL,NULL,'$Covidvacinnated','Permanent',
        NULL,NULL,0,'30',0,0,'$Qualification','No','Normal','$AllowOt','Yes','Yes','$Autogerenreateid','$CategoryAutogenerationno')";
    
        $resultsave = mysqli_query($conn,$sqlsave);
       
    
        $UpdateNextno = "Update indsys1008mastermodule set Nextno = '$CategoryAutogenerationno' where ModuleID ='$Category'";
        $resultUpdate = mysqli_query($conn,$UpdateNextno);
    
        $UpdateNextno2 = "Update indsys1008mastermodule set Nextno = '$Autogerenreateid' where ModuleID ='EMP'";
        $resultUpdate = mysqli_query($conn,$UpdateNextno2);
        $Message ="Data Saved";

try
{
        movevaccinationrecord($conn,$Candidateid,$Employeeid,$user_id,$date,$Clientid);
        moveeducationrecord($conn,$Candidateid,$Employeeid,$user_id,$date,$Clientid);
        moveempsalaryupdate($conn,$Candidateid,$Employeeid,$user_id,$date,$Clientid);
}
catch(Exception $x)
{

}
        $resultExists = "Update indsys1013candidatemaster set 
        Empid ='$Employeeid'
 
     WHERE Candidateid = ' $Candidateid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Moved";
  $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
return;

    
       
     }
    
    }
   

    else
    {
      $Message = "ChkApprove";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;

    }

  
   
     
      } 
    }








 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}

function TestEmp($conn,$Category,$Department)
{
    try
    {

     
      $EmpDepartment = $Department;
      $Un1 = "";
    $un2 ="";
      if($Category =="Category 1")
      {
        $Un1 = "CAT01";
    
      }
      if($Category =="Category 2")
      {
        $Un1 = "CAT02";
    
      }
      if($Category =="Category 3")
      {
        $Un1 = "CAT03";
    
      }
    
    
    
      $Un2=substr($EmpDepartment, 0,3);
    
    
    
        $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='$Category'  ";
    
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
           
            $EmpIDaddzero = sprintf('%06d', $data01);
            $EmpID = "$Un1$Un2$EmpIDaddzero";
    



            $GetNextnoemp = "SELECT * FROM indsys1008mastermodule where ModuleID ='EMP' ";

            $result_Nextnosss = $conn->query($GetNextnoemp);
            if (mysqli_num_rows($result_Nextnosss) > 0)
            {
                while ($row = mysqli_fetch_array($result_Nextnosss))
                {
                    $data = $row['Nextno'];
                    $data01new = $data + 1;
                }
            } 

        $_SESSION['Nextno'] =$EmpID;
        $_SESSION['CategoryAutogenerationNo'] =$Textno;
        $_SESSION['AutogenerateNo']=$data01new;

    }
    catch(Exception $e)
    {

    }

}
//////////////////////////////////////////////////////////////////

function movevaccinationrecord($conn,$Candidateid,$Employeeid,$user_id,$date,$Clientid)
{
  try
  {
    $i =0;
    $resultExists = "SELECT * FROM indsys1017candidatevaccinationinformation WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid'  LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
    while ($row = $resultExists01->fetch_assoc())
    {
      $i++;
      $Vaccinationdate = $row['Vaccinationdate'];
      $Vacinationtype =$row['Vacinationtype'];
      $Vaccinationcertificate =$row['Vaccinationcertificate'];
      $destinationfile ="";
      if($Vaccinationcertificate !=null)
      {
      $test = pathinfo($Vaccinationcertificate); 
      $last_image_path =$test['basename'];


      $directory = "../EMPVaccination/$Employeeid/$i/";
      if(!is_dir($directory)){
     
      }
      else
      {
        foreach (new DirectoryIterator($directory) as $fileInfo) {
          if(!$fileInfo->isDot()) {
              unlink($fileInfo->getPathname());
          }
        
      }
      }
   
        if(!is_dir($directory)){
        mkdir($directory, 0777, true);
                }
      $destinationfile ="$directory$last_image_path";
     // $destinationfile ="../EMPVaccination/$Employeeid/$i/$last_image_path";
      copy($Vaccinationcertificate, $destinationfile);
      }
      $sqlsave = "INSERT IGNORE INTO indsys1023employeevaccinationinformation (Clientid,Employeeid, Sno,Vaccinationdate,Vacinationtype,Vaccinationcertificate,Userid,Addormodifydatetime)
      VALUES ('$Clientid','$Employeeid','$i','$Vaccinationdate','$Vacinationtype','$destinationfile','$user_id','$date')";
         $resultsave = mysqli_query($conn, $sqlsave);

       

    }
  }
  catch(Exception $e)
  {

  }
}
/////////////////////////////////////////////
function moveeducationrecord($conn,$Candidateid,$Employeeid,$user_id,$date,$Clientid)
{
  try
  {
    $i =0;
    $resultExists = "SELECT * FROM indsys1017candidateeducationinformation WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid'  LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
    while ($row = $resultExists01->fetch_assoc())
    {
      $i++;
      $Studies = $row['Studies'];
      $Universityorschool =$row['Universityorschool'];
      $Grade =$row['Grade'];
      $Passoutyear = $row['Passoutyear'];
      $Educationdocument =$row['Candidatedocument'];
      
      $destinationfile ="";
      if($Educationdocument !=null)
      {
      $test = pathinfo($Educationdocument); 
      $last_image_path =$test['basename'];
      $directory3 = "../EMPEDUCATIONDOCUMENTNEW/";
      $directory2 = "../EMPEDUCATIONDOCUMENTNEW/$Employeeid/";
      $directory = "../EMPEDUCATIONDOCUMENTNEW/$Employeeid/$i/";
      
      if(!is_dir($directory3)){mkdir($directory3, 0777);}
      if(!is_dir($directory2)){mkdir($directory2, 0777);}
      if(!is_dir($directory)){mkdir($directory, 0777);}
      else
      {
        foreach (new DirectoryIterator($directory) as $fileInfo) {
          if(!$fileInfo->isDot()) {
              unlink($fileInfo->getPathname());
          }
        
      }
      }
   
        if(!is_dir($directory)){
        mkdir($directory, 0777, true);
                }
      $destinationfile ="$directory$last_image_path";
      copy($Educationdocument, $destinationfile);
      }
      $sqlsave = "INSERT IGNORE INTO  indsys1020employeeeducationinformation (Clientid,Employeeid,
      Studies,Universityorschool,Grade,Passoutyear,Userid,Addormodifydatetime,Sno,Educationdocument)
      VALUES ('$Clientid','$Employeeid','$Studies','$Universityorschool','$Grade','$Passoutyear','$user_id','$date','$i','$destinationfile')";
         $resultsave = mysqli_query($conn, $sqlsave);

       

    }
  }
  catch(Exception $e)
  {

  }
}
/////////////////////////////////////////////
function moveempsalaryupdate($conn,$Candidateid,$Employeeid,$user_id,$date,$Clientid)
{
  try
  {
   
    $resultExists = "SELECT * FROM indsys1017candidatefinalfitment WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid'  LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
    while ($row = mysqli_fetch_array($resultExists01))
    {
     
      $Basic =$row['CurMotBasicDA'];
      $HR_Allowance =$row['CurMotHRA'];
      $TA =0;
      $Performance_allowance =0;
      $Day_allowance =0;
      $Other_Allowance =$row['CurMotTotalAllowance'];
      $ESiC = $row['CurMotESIC'];
      if($ESiC =="0.000")
      {
        $ESI_Yesandno ="No";
      }
      else
      {
        $ESI_Yesandno ="Yes";
      }
      $PF_Yesandno ="Yes";
 
    
      if(empty($Basic))
      {
        $Basic =0;
      }
   
      if(empty($HR_Allowance))
      {
        $HR_Allowance =0;
      }
      if(empty($TA))
      {
        $TA =0;
      }
      if(empty($Performance_allowance))
      {
        $Performance_allowance =0;
      }
      if(empty($Day_allowance))
      {
        $Day_allowance =0;
      }
      if(empty($Other_Allowance))
      {
        $Other_Allowance =0;
      }
  
   
  
  
  
      $Total= $Basic+$HR_Allowance+$TA+$Performance_allowance+$Day_allowance+$Other_Allowance;
  
     $pfpercentage=(12/100);
     $esipercentage = (0.75/100);
  
     if($PF_Yesandno =='Yes')
     {
      $PF =($Basic+$Other_Allowance)*$pfpercentage;
      $PF=round($PF,0);
     }
  else
  {
    $PF =0;
  }
  if($ESI_Yesandno =='Yes')
  {
  $Esi = ($Total*$esipercentage);
  $ESI=roundup($Esi);
  $ESI = round($ESI,0);
  }
  else
  {
    $ESI=0;
  }
      
  
  $Gross_Salary = $Total;
  $Net_Salary = ($Total-$PF-$ESI);
  $resultExists = "Update indsys1017employeemaster set 
  Basic ='$Basic',
  HR_Allowance ='$HR_Allowance',
  TA='$TA',
  Performance_allowance ='$Performance_allowance',
  Day_allowance ='$Day_allowance',
  PF ='$PF',
  ESI='$ESI',
  TDS ='0',
  Professional_tax ='0',
  Net_Salary ='$Net_Salary',
  Gross_Salary='$Gross_Salary',  
  Other_Allowance = '$Other_Allowance',
  PF_Yesandno='$PF_Yesandno',  
  ESI_Yesandno = '$ESI_Yesandno',

  Addormodifydatetime ='$date',
  Userid ='$user_id'

    
     WHERE Employeeid = ' $Employeeid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Exists";

    }
  }
  catch(Exception $e)
  {

  }
}

////////////////////////////////////////////////////



if($MethodGet == 'CANEDUNEXT')
{


try
{

    $Candidateid =$form_data['Candidateid'];
   
   

    $Sno = 0;

        $resultExistsnew = "SELECT Nextno FROM vwcandidateeducationnextno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);

        if (mysqli_fetch_row($resultExists01new))
        {

            $GetChapter = "SELECT * FROM vwcandidateeducationnextno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid'  ";
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
//////////////////////////
if($MethodGet == 'CANEDUCATION')
{


try
{

    $Candidateid =$form_data['Candidateid'];
   
   
    
    $data01 =[];
   
    $GetState = "SELECT * FROM indsys1017candidateeducationinformation where Candidateid = '$Candidateid'  ORDER BY Candidateid";
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
///////////////////////////////////////////////
if ($MethodGet == 'EDUCATIONCAN')
{

  $Candidateid = $form_data['Candidateid'];
  $EduNextno = $form_data['EduNextno'];
  $Candidatestudied = $form_data['Candidatestudied'];
  $UniversityorSchool = $form_data['UniversityorSchool'];
  $GradeorPercentage = $form_data['GradeorPercentage'];
  $Passoutyear = $form_data['Passoutyear'];


  if (empty($Candidatestudied))
  {

      $Message = "Studied";

      $Display = array(
          'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
  }



  $resultExists = "SELECT Candidateid FROM indsys1017candidateeducationinformation WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' And Sno ='$EduNextno' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {
    CopyCandidateEducationData($conn, $Candidateid, $EduNextno);
      $resultExistsss = "Update indsys1017candidateeducationinformation set 
      Studies ='$Candidatestudied',
      Universityorschool ='$UniversityorSchool',
      Grade='$GradeorPercentage',
      Passoutyear='$Passoutyear',
      Addormodifydatetime ='$date',
      Userid ='$user_id'
     
  WHERE Candidateid = '$Candidateid' AND Sno ='$EduNextno'

  AND Clientid ='$Clientid'  ";
      $resultExists0New = $conn->query($resultExistsss);
      $Message = "Update";

      

  }

  else
  {
      $sqlsave = "INSERT IGNORE INTO indsys1017candidateeducationinformation (Clientid,Candidateid,
  Studies,Universityorschool,Grade,Passoutyear,Userid,Addormodifydatetime,Sno)
   VALUES ('" . $Clientid . "','" . $Candidateid . "','" . $Candidatestudied . "','" . $UniversityorSchool . "','" . $GradeorPercentage . "',
   '" . $Passoutyear . "','" . $user_id . "','" . $date . "','" . $EduNextno . "')";
      $resultsave = mysqli_query($conn, $sqlsave);

      $Message = "Update";
  }



  $Display = array(
     
      'Message' => $Message
  );

  $str = json_encode($Display);
  echo trim($str, '"');

}
///////////////////////////////////////////////////////////////////
if ($MethodGet == 'EDUCATIONCANHISTORYMAIL')
{

  $Candidateid = $form_data['Candidateid'];
  $EduNextno = $form_data['EduNextno'];




  CandidateEducationArrayDiff($conn, $Candidateid, $Clientid,$EduNextno,$domain);






  $Display = array(
     
      
  );

  $str = json_encode($Display);
  echo trim($str, '"');

}
 /////////////////////////////////////////////
 if($MethodGet == 'DeleteEDUCATION')
{




  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }


  $Candidateid =$form_data['Candidateid'];
  $Sno =$form_data['Sno'];
   $GetChapter = "SELECT * FROM indsys1017candidateeducationinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and Sno='$Sno' ORDER BY Candidateid";
   $result_Chapter = $conn->query($GetChapter );
   if(mysqli_num_rows($result_Chapter) > 0) { 


   while($row = mysqli_fetch_array($result_Chapter)) {  
  
     $Documentpath = $row['Candidatedocument'];
  
    
    
    
     } 
   }
  $resultExists = "DELETE FROM indsys1017candidateeducationinformation WHERE Candidateid = '$Candidateid' and Sno='$Sno' ";
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
/////////////////////////////////////
if($MethodGet == 'FetchStudy')
{

    try
    { 
  

      $Candidateid =$form_data['Candidateid'];
   $Sno =$form_data['Sno'];
    $GetChapter = "SELECT * FROM indsys1017candidateeducationinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and Sno='$Sno' ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Cadidatestudied =$row['Studies'];
      $UniversityorSchool =$row['Universityorschool'];
      $GradeorPercentage = $row['Grade'];
      $Passoutyear =$row['Passoutyear'];
      $Candidatedocument =$row['Candidatedocument'];
     
     
     
     
      } 
    }


 
    
    $Display=array(
      'Cadidatestudied'=>  $Cadidatestudied,
      'UniversityorSchool'=> $UniversityorSchool,
      'GradeorPercentage'=>  $GradeorPercentage,
      'Passoutyear'=> $Passoutyear,
      'Candidatedocument'=>$Candidatedocument
   
     
      
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }
 ///////////////////////////////////////////
 if($MethodGet == 'InteviewEMP')
{
   $GetState = "SELECT * FROM indsys1017employeemaster  Where EmpActive='Active' and (Type_Of_Posistion='Category 1' OR Type_Of_Posistion='Caegory 2')  ORDER BY Fullname";
    $result_Region = $conn->query($GetState);
    $data01=[];
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
        
    header('Content-Type: application/json');
    echo json_encode($data01);
 
}
/////////////////////////////////////////////////////////
if($MethodGet == 'Fetchinterviewer')
{

    try
    { 
  

      $interviewerid =$form_data['interviewerid'];
  
    $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$interviewerid' ";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Title =$row['Title'];
      $Fullname = $row['Fullname'];
      $Taken_Interview ="$Title $Fullname";
     
     
     
     
      } 
    }


 
    
    $Display=array(
      'Taken_Interview'=>  $Taken_Interview,
    
   
     
      
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }
 ///////////////////////////////////
 if($MethodGet == 'OLDEMP')
 {
    $GetState = "SELECT Employeeid,Title,Firstname,Lastname,Fullname FROM indsys1017employeemaster  Where EmpActive='Deactive' and (Type_Of_Posistion='Admin & Staff' OR Type_Of_Posistion='Marketing')  ORDER BY Fullname";
     $result_Region = $conn->query($GetState);
     $data01=[];
     if(mysqli_num_rows($result_Region) > 0) { 
     while($row = mysqli_fetch_array($result_Region)) {  
       $data01[] = $row;
       } 
     }
         
     header('Content-Type: application/json');
     echo json_encode($data01);
  
 }
 ///////////////////////////////////////
 if($MethodGet == 'ALLEDIT')
 {
    $GetState = "SELECT * FROM indsys1013candidatemaster where (Selectionstatus !='Rejected' ) AND Empid ='0' AND Clientid = '$Clientid' ORDER BY Candidateid DESC";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
    header('Content-Type: application/json');
    echo json_encode($data01);
  }

  ///////////////////////


///////////////////////
function CopyCandidateMasterData($conn, $Candidateid){

  $insertCandidateHistory = "INSERT INTO `indsys1013candidatemasterhistory` (`Clientid`, `Candidateid`, `Title`, `Firstname`, `Fullname`, `Lastname`, `Candidateimage`, `Languages`, `Mother_tong`, `DOB`, `Age`, `Bloodgroup`, `Religion`, `Currentlocation`, `Nationality`, `Country`, `Jobtitle`, `Department`, `Previous_sainmarks_emp`, `Previous_Sainmarks_designation`, `Previous_Sainmarks_salary`, `Previous_sainmarks_period`, `Releivingreason`, `Candidatephone`, `Emaild`, `Marital_status`, `Exp_salary`, `Exp_salary_nego`, `Notice_per`, `Serving_Notice_Period`, `Vaccancy_Known`, `Refrence`, `MD_Approve`, `HR_Approve`, `GM_Approve`, `DH_Approve`, `MD_Decline`, `GM_Decline`, `HR_Decline`, `DH_Decline`, `Previous_Salary`, `Type_Of_Posistion`, `Date_Of_Joing`, `HighestQualification`, `Interview_held_On`, `Reschedule_interview`, `Reschedule_interview_reason`, `Accepted_By_Candidate`, `Interviewer_Accepted_date`, `Taken_Interview`, `Previous_Organization`, `Expereienced`, `Fresher`, `Relocate`, `Userid`, `Addormodifydatetime`, `Previous_sainmarks_department`, `Gender`, `Contactno`, `MD_Approve_datetime`, `HR_Approve_datetime`, `GM_Approve_datetime`, `DH_Approve_datetime`, `Selectionstatus`, `Previousdesignation`, `Availableoninterview`, `PreviousCTC`, `ExpectedCTC`, `NegotiableCTC`, `CommitedCTC`, `MD_Approve_ID`, `HR_Approve_ID`, `DH_Approve_ID`, `GM_Approve_ID`, `Empid`, `Oldempid`, `PSworkedMDApproval`, `PSworkedMDApprovaldatetime`, `PSworkedMDApproveduserid`, `interviewerid`, `Designationproposed`, `ReportingToid`, `ReportingTo`, `Bussiness`, `Location`, `Covidvacinnated`, `Covidvaccinationcertificatepath`, `Coviddose`, `Covidlastvaccinateddate`, `PreviousEmpid`, `PreviousEmpName`, `DHinterviewdate`, `ApplicationDate`, `Address`, `Candidateofferaccepteddatetime`,`Candidateinterviewtime`) 
  SELECT `Clientid`, `Candidateid`, `Title`, `Firstname`, `Fullname`, `Lastname`, `Candidateimage`, `Languages`, `Mother_tong`, `DOB`, `Age`, `Bloodgroup`, `Religion`, `Currentlocation`, `Nationality`, `Country`, `Jobtitle`, `Department`, `Previous_sainmarks_emp`, `Previous_Sainmarks_designation`, `Previous_Sainmarks_salary`, `Previous_sainmarks_period`, `Releivingreason`, `Candidatephone`, `Emaild`, `Marital_status`, `Exp_salary`, `Exp_salary_nego`, `Notice_per`, `Serving_Notice_Period`, `Vaccancy_Known`, `Refrence`, `MD_Approve`, `HR_Approve`, `GM_Approve`, `DH_Approve`, `MD_Decline`, `GM_Decline`, `HR_Decline`, `DH_Decline`, `Previous_Salary`, `Type_Of_Posistion`, `Date_Of_Joing`, `HighestQualification`, `Interview_held_On`, `Reschedule_interview`, `Reschedule_interview_reason`, `Accepted_By_Candidate`, `Interviewer_Accepted_date`, `Taken_Interview`, `Previous_Organization`, `Expereienced`, `Fresher`, `Relocate`, `Userid`, `Addormodifydatetime`, `Previous_sainmarks_department`, `Gender`, `Contactno`, `MD_Approve_datetime`, `HR_Approve_datetime`, `GM_Approve_datetime`, `DH_Approve_datetime`, `Selectionstatus`, `Previousdesignation`, `Availableoninterview`, `PreviousCTC`, `ExpectedCTC`, `NegotiableCTC`, `CommitedCTC`, `MD_Approve_ID`, `HR_Approve_ID`, `DH_Approve_ID`, `GM_Approve_ID`, `Empid`, `Oldempid`, `PSworkedMDApproval`, `PSworkedMDApprovaldatetime`, `PSworkedMDApproveduserid`, `interviewerid`, `Designationproposed`, `ReportingToid`, `ReportingTo`, `Bussiness`, `Location`, `Covidvacinnated`, `Covidvaccinationcertificatepath`, `Coviddose`, `Covidlastvaccinateddate`, `PreviousEmpid`, `PreviousEmpName`, `DHinterviewdate`, `ApplicationDate`, `Address`, `Candidateofferaccepteddatetime`,`Candidateinterviewtime` FROM `indsys1013candidatemaster` WHERE `Candidateid`=$Candidateid";
    $resultinsertCandidateHistory = $conn->query($insertCandidateHistory); 

}



///////////////////////

function CandidateArrayDiff($conn, $Candidateid,$Clientid,$domain){

$CandidateArray1 = "SELECT * FROM indsys1013candidatemaster Where Candidateid='$Candidateid' LIMIT 1";
$result_CandidateArray1 = $conn->query($CandidateArray1);
$CandidateData1=[];
if(mysqli_num_rows($result_CandidateArray1) > 0) {
while($row = mysqli_fetch_array($result_CandidateArray1)) { 
$CandidateData1= $row;
}
}

$Sno = 0;
$resultExistsnew = "SELECT Nextno FROM vwcandidatemasterhistrymaxno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' LIMIT 1";
$resultExists01new = $conn->query($resultExistsnew);
if (mysqli_fetch_row($resultExists01new))
{

$GetChapter = "SELECT * FROM vwcandidatemasterhistrymaxno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' ";
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


$array_diff_result=array_diff($CandidateData2, $CandidateData1);
//print_r($array_diff_result);

// $newarraytest = array_unique($array_diff_result);
$i=0;

$ModifiedValue = "";
$orignalvalue ="";

$changeResult="";

foreach($array_diff_result as $key => $value){

$key_temp = $key;
$key_temp = preg_replace('/[0-9]+/', '', $key_temp);

$GetChapter = "SELECT * FROM indsys1013candidatemaster where Clientid ='$Clientid' and Candidateid = '$Candidateid' ORDER BY Candidateid";
$result_Chapter = $conn->query($GetChapter );
if(mysqli_num_rows($result_Chapter) > 0) { 

while($row = mysqli_fetch_array($result_Chapter)) { 
$ModifiedValue = $row[$key_temp];
}
}

// $changeResult="";

$GetChapterss = "SELECT * FROM indsys1013candidatemasterhistory where Clientid ='$Clientid' and Candidateid = '$Candidateid' AND Logid ='$Sno' ORDER BY Candidateid";
$result_Chapterss = $conn->query($GetChapterss );
if(mysqli_num_rows($result_Chapterss) > 0) { 
while($row = mysqli_fetch_array($result_Chapterss)) { 
$orignalvalue = $row[$key_temp];
$changeResult .="<tr><td>$key_temp</td><td>$orignalvalue</td><td>$ModifiedValue</td></tr>";
}
}
$changeResult = str_replace("<td></td>","","$changeResult");
$changeResult = str_replace("<tr></tr>","","$changeResult");

}


data_change_email($conn, $Candidateid,$Clientid, $changeResult,$domain);

}


///////////////////////
function data_change_email($conn, $Candidateid, $Clientid, $changeResultFinal,$domain){

  $username = $_SESSION['Username'];

$mail = new PHPMailer(false); 
$mail->IsSMTP();
$tstbody = "";
$Usermailid = "";
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$date = date("Y-m-d " );
$Todaydate = date('d-M-Y', strtotime($date));
$GetSuperusermail = "SELECT * FROM indsys1000adminrights where Clientid ='$Clientid' and UserType = 'Super User'  LIMIT 1";
$result_Supermail = $conn->query($GetSuperusermail );
if(mysqli_num_rows($result_Supermail) > 0) { 

  
while($row = mysqli_fetch_array($result_Supermail)) {  
  $Usermailid =$row['Usermailid'];
  
 
  } 
}
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
$Toaddress= $Usermailid;

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
        <tr> <td><center><img alt='Logo' height='80px' src='$domain/Logo/Sainmarknewlogo.png'></center></td></tr>
        <tr>

         <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
<br/>
<h1 style='text-align: center;color:#2D9A43'>Data Change Request</h1>
          <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Dear Sir,</p>
          <span style='font-size:16px;'>$username has modified the  following details<strong></strong> on <strong><span style=''>$Todaydate</span></strong></span>
  
          <h2 style='text-align: center;color:#2D9A43'>Data Modification Details</h2>
<div style='background-color:#f5f5f5;border:1px solid #888888;padding:5px'>
          <table class='change-table' style='width:100%; border-collapse: collapse;'>
          <tbody><tr align='left' style='font-weight: bold;color: #2D9A43'>
<td style='width:33%;'>Change</td><td style='width:33%;'>Orignal Value</td><td>Modified Value</td></tr>
$changeResultFinal 

</tbody>
          </table>
          </div>


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

$SubjectMail="User Data Change Alert";

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

}

catch(phpmailerException $e)
{

}


}



if($MethodGet == 'SuperUserMail')
{
try
{
$Candidateid =$form_data['Candidateid'];



CandidateArrayDiff($conn, $Candidateid,$Clientid,$domain);

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

function CopyCandidateEducationData($conn, $Candidateid, $EducationSNo){
  try
  {
  $insertCandidateEducation = "INSERT INTO `indsys1017candidateeducationinformationhistory`(`Clientid`, `Candidateid`, `Sno`, `Studies`, `Universityorschool`, `Grade`, `Addormodifydatetime`, `Passoutyear`, `Userid`, `Candidatedocument`) SELECT `Clientid`, `Candidateid`, `Sno`, `Studies`, `Universityorschool`, `Grade`, `Addormodifydatetime`, `Passoutyear`, `Userid`, `Candidatedocument` FROM `indsys1017candidateeducationinformation` WHERE `Candidateid`=$Candidateid and `Sno`=$EducationSNo";
  $resultinsertCandidateEducation = $conn->query($insertCandidateEducation); 
  }
  catch(Exception $x)
  {

  }
}
  
  
  function CandidateEducationArrayDiff($conn, $Candidateid, $Clientid,$EducationSNo,$domain){
    try
    {
  $CandidateEducationArray1 = "SELECT * FROM indsys1017candidateeducationinformation Where Candidateid='$Candidateid' and Sno='$EducationSNo' LIMIT 1";
  $result_CandidateEducationArray1 = $conn->query($CandidateEducationArray1);
  $CandidateEducationData1=[];
  if(mysqli_num_rows($result_CandidateEducationArray1) > 0) {
  while($row = mysqli_fetch_array($result_CandidateEducationArray1)) { 
  $CandidateEducationData1= $row;
  }
  }
  
  $Sno = 0;
  $resultEducationExistsnew = "SELECT Nextno FROM vwcandidateeducationhistorynextno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' AND Sno ='$EducationSNo' LIMIT 1";
  $result_resultEducationExistsnew = $conn->query($resultEducationExistsnew);
  if (mysqli_fetch_row($result_resultEducationExistsnew))
  {
  
    $GetChapter = "SELECT * FROM vwcandidateeducationhistorynextno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' AND Sno ='$EducationSNo' ";
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
  
  $CandidateEducationArray2 = "SELECT `Clientid`, `Candidateid`, `Sno`, `Studies`, `Universityorschool`, `Grade`, `Addormodifydatetime`, `Passoutyear`, `Userid`, `Candidatedocument` FROM `indsys1017candidateeducationinformationhistory` WHERE Candidateid='$Candidateid' AND Logid ='$Sno' AND Sno ='$EducationSNo'";
  $result_CandidateEducationArray2 = $conn->query($CandidateEducationArray2);
  $CandidateEducationData2=[];
  if(mysqli_num_rows($result_CandidateEducationArray2) > 0) {
  while($row = mysqli_fetch_array($result_CandidateEducationArray2)) { 
  $CandidateEducationData2 = $row;
  }
  }
  
    $CandidateEducation_array_diff=array_diff($CandidateEducationData2, $CandidateEducationData1);
    
    //$newarraytest = array_unique($CandidateEducation_array_diff);
    $i=0;
  
    $ModifiedValueEducation = "";
    $orignalvalueEducation ="";
    
    $changeResultCandidateEducation="";
  
    foreach($CandidateEducation_array_diff as $key => $value){
  
    $key_tempEducation = $key;
    $key_tempEducation = preg_replace('/[0-9]+/', '', $key_tempEducation);
  
    $GetEducation = "SELECT * FROM indsys1017candidateeducationinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and Sno ='$EducationSNo' ORDER BY Candidateid";
    $result_GetEducation = $conn->query($GetEducation );
    if(mysqli_num_rows($result_GetEducation) > 0) { 
    while($row = mysqli_fetch_array($result_GetEducation)) { 
    $ModifiedValueEducation = $row[$key_tempEducation];
    }
    }
  
  
    $GetChapterss = "SELECT * FROM indsys1017candidateeducationinformationhistory where Clientid ='$Clientid' and Candidateid = '$Candidateid' AND Logid ='$Sno' and Sno ='$EducationSNo' ORDER BY Candidateid";
    $result_Chapterss = $conn->query($GetChapterss );
    if(mysqli_num_rows($result_Chapterss) > 0) { 
    while($row = mysqli_fetch_array($result_Chapterss)) { 
    $orignalvalueEducation = $row[$key_tempEducation];
    $changeResultCandidateEducation .="<tr><td>$key_tempEducation</td><td>$orignalvalueEducation</td><td>$ModifiedValueEducation</td></tr>";
    }
    }
    $changeResultCandidateEducation = str_replace("<td></td>","","$changeResultCandidateEducation");
    $changeResultCandidateEducation = str_replace("<tr></tr>","","$changeResultCandidateEducation");
  
    }
  
    data_change_email($conn, $Candidateid, $Clientid, $changeResultCandidateEducation,$domain);
  
    }
    catch(Exception $Y)
    {

    }
    }

    //////////////////
    if($MethodGet == 'UpdatReporting')
    {
    
    
    try
    {
    
        $Reportingname =$form_data['Reportingname'];
        $ReportingToid =$form_data['ReportingToid'];
        $Candidateid =$form_data['Candidateid'];
        $Business =$form_data['Business'];
        $Designationproposed =$form_data['Designationproposed'];
        $Location =$form_data['Location'];
        $Department =$form_data['Department'];
       
    
    
        CopyCandidateMasterData($conn, $Candidateid);
    
      
      $resultExists = "Update indsys1013candidatemaster set 
      ReportingTo ='$Reportingname',
      ReportingToid ='$ReportingToid',
      Bussiness='$Business',
      Designationproposed ='$Designationproposed',
      Location='$Location',
      Department ='$Department',
      
       Addormodifydatetime ='$date',
       Userid ='$user_id'
       
         WHERE Candidateid = ' $Candidateid' ";
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
    /////////////////////////////
    if($MethodGet == 'Mailunique')
  {
  
  
  try
  {
      

      $Emailid=$form_data["Emailid"];
  
      
     
    $Message = "No";
   
      if (mysqli_connect_errno()){
        $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
      }
      $resultExists = "SELECT * FROM indsys1013candidatemaster WHERE Emaild = '$Emailid' LIMIT 1";
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
    //////////////////////////////////////////
    if($MethodGet == 'Contactnounique')
  {
  
  
  try
  {
      

      $Contactno=$form_data["Contactno"];
  
      
     
    $Message = "No";
   
      if (mysqli_connect_errno()){
        $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
      }
      $resultExists = "SELECT * FROM indsys1013candidatemaster WHERE Contactno = '$Contactno' LIMIT 1";
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
    ////////////////////
?>

