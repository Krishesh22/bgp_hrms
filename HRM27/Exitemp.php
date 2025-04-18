<?php
include '../config.php';
session_start();
require_once('class.phpmailer.php');
include("class.smtp.php");
// require 'vendor/autoload.php';
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;


$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail = $_SESSION["Mailid"];
$Clientid = $_SESSION["Clientid"];
$Sessionid = $_SESSION["SESSIONID"];

$_SESSION["Tittle"] = "Employee";
$Message = '';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");


$form_data = json_decode(file_get_contents("php://input"));
$form_data = json_decode(json_encode($form_data), true);
$MethodGet = $form_data['Method'];


if ($MethodGet == 'FetchEmployee') {

  try {


    $Employeeid = $form_data['Employeeid'];
    $_SESSION["Employeeid"] = $Employeeid;
    $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter);
    if (mysqli_num_rows($result_Chapter) > 0) {


      while ($row = mysqli_fetch_array($result_Chapter)) {
        $Title = $row['Title'];
        $Firstname = $row['Firstname'];
        $Lastname = $row['Lastname'];
        $Gender = $row['Gender'];

        $Married = $row['Marital_status'];
        $Mothertongue = $row['Mother_tong'];
        $Contactno = $row['Contactno'];
        $Category = $row['Type_Of_Posistion'];
        $Emailid = $row['Emaild'];
        $Dob = $row['DOB'];
        $Age = $row['Age'];
        $Bloodgroup = $row['Bloodgroup'];

        $Religion = $row['Religion'];
        $Imagepath = $row['Empimage'];

        $Shift = $row['Shift'];
        $AllowOT = $row['Allow_OT'];
        $AllowLOP = $row['Allow_LOP'];
        $Salary_Mode = $row['Salary_mode'];
        $Weekoff = $row['Week_Off'];
        $Employee_CL = $row['Employee_CL'];
        $Nationality = $row['Nationality'];
        $Languages = $row['Languages'];
        $ESIno = $row['ESIno'];
        $UANno = $row['UANno'];
        $Aadharno = $row['Aadharno'];
        $Panno = $row['Panno'];
        $PFJoiningdate = $row['PFJoindate'];
        $ESIJoiningdate = $row['ESIJoindate'];
        $EmpDepartment = $row['Department'];
        $Highestqualification = $row['Highestqualification'];
        $EmpDesignation = $row['Designation'];
        $Date_Of_Joing = $row['Date_Of_Joing'];
        $Date_Of_Joing2 = date('d-M-Y', strtotime($Date_Of_Joing));
        $Dob2 = date('d-M-Y', strtotime($Dob));
        $FatherGuardianSpouseName = $row['FatherGuardianSpouseName'];
        $LastAppresialDate = $row['LastAppresialDate'];
        $LastAppresialDate2 = date('d-M-Y', strtotime($LastAppresialDate));
        $BackgroundVerificationpath = $row['BackgroundVerificationpath'];
        $BackgroundVerification = $row['BackgroundVerification'];
      }
    }

    $Display = array(
      'Title' =>  $Title,
      'Firstname' => $Firstname,
      'Lastname' =>  $Lastname,
      'Gender' => $Gender,
      'Married' => $Married,
      'Mothertongue' =>  $Mothertongue,
      'Contactno' => $Contactno,
      'Category' =>  $Category,
      'Emailid' =>  $Emailid,
      'Dob' => $Dob,
      'Age' => $Age,
      'Bloodgroup' => $Bloodgroup,
      'Religion' => $Religion,
      'Imagepath' => $Imagepath,
      'Shift' =>  $Shift,
      'AllowOT' => $AllowOT,
      'AllowLOP' =>  $AllowLOP,
      'Salary_Mode' =>  $Salary_Mode,
      'Weekoff' => $Weekoff,
      'Employee_CL' => $Employee_CL,
      'Nationality' => $Nationality,
      'Languages' => $Languages,
      'UANno' =>  $UANno,
      'ESIno' =>  $ESIno,
      'Aadharno' => $Aadharno,
      'Panno' => $Panno,
      'PFJoiningdate' => $PFJoiningdate,
      'ESIJoiningdate' => $ESIJoiningdate,
      'EmpDepartment' => $EmpDepartment,
      'Highestqualification' => $Highestqualification,
      'EmpDesignation' => $EmpDesignation,
      'Date_Of_Joing' => $Date_Of_Joing,
      'Date_Of_Joing2' => $Date_Of_Joing2,
      'Dob2' => $Dob2,
      'FatherGuardianSpouseName' => $FatherGuardianSpouseName,
      'LastAppresialDate' => $LastAppresialDate,
      'LastAppresialDate2' => $LastAppresialDate2,
      'BackgroundVerificationpath' => $BackgroundVerificationpath,
      'BackgroundVerification' => $BackgroundVerification,


    );


    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  } catch (Exception $e) {
  }
}
///////////////////////////////
if ($MethodGet == 'FetcheditEmp') {

  try {


    $Employeeid = $form_data['Employeeid'];
    $_SESSION["Employeeid"] = $Employeeid;
    $GetChapter = "SELECT * FROM indsys1017exitemployee where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter);
    if (mysqli_num_rows($result_Chapter) > 0) {
      while ($row = mysqli_fetch_array($result_Chapter)) {
        //  $EmployeeName=$row['EmployeeName'];



        $EmpDepartment = $row['Department'];
        $ExitStatus = $row['ExitStatus'];
        $EmpDesignation = $row['Designation'];
        $ReleivingDate = $row['ReleivingDate'];
        $RequestDate = $row['RequestDate'];
        $Handovername = $row['Handoverto'];
        $HandoverID = $row['HandoverID'];
        $Approvalstatus = $row['SuperUserApproval'];
        $MeetingDate = $row['Superuseroneandonemeetingdate'];
        $Meetingtime = $row['MeetingTime'];
        $Releivingreason = $row['ReleivingReason'];
        $HR_Approve = $row['HR_Approve'];
        $DH_Approve = $row['DH_Approve'];
        $GM_Approve = $row['GM_Approve'];
        $ADMIN_Approve = $row['ADMIN_Approve'];
        $HR_Approve_date_time = $row['HR_Approve_date_time'];
        $DH_Approve_date_time = $row['DH_Approve_date_time'];
        $GM_Approve_date_time = $row['GM_Approve_date_time'];
        $ADMIN_Approve_date_time = $row['ADMIN_Approve_date_time'];
        $HR_Notes = $row['HR_Notes'];
        $DH_Notes = $row['DH_Notes'];
        $GM_Notes = $row['GM_Notes'];
        $ADMIN_Notes = $row['ADMIN_Notes'];

        $MeetingDate2 = date('d-M-Y', strtotime($MeetingDate));
        $RequestDate2 = date('d-M-Y', strtotime($RequestDate));

        $ReleivingDate2 = date('d-M-Y', strtotime($ReleivingDate));
      }
    }

    $Display = array(


      'EmpDepartment' => $EmpDepartment,
      'ExitStatus' => $ExitStatus,
      'EmpDesignation' => $EmpDesignation,
      'ReleivingDate' => $ReleivingDate,
      'RequestDate' =>  $RequestDate,
      'Handovername' => $Handovername,
      'HandoverID' => $HandoverID,
      'Approvalstatus' => $Approvalstatus,
      'MeetingDate' => $MeetingDate,
      'Meetingtime' => $Meetingtime,
      'Releivingreason' => $Releivingreason,
      'HR_Approve' => $HR_Approve,
      'DH_Approve' => $DH_Approve,
      'GM_Approve' => $GM_Approve,
      'ADMIN_Approve' => $ADMIN_Approve,
      'HR_Approve_date_time' => $HR_Approve_date_time,
      'DH_Approve_date_time' => $DH_Approve_date_time,
      'GM_Approve_date_time' => $GM_Approve_date_time,
      'ADMIN_Approve_date_time' => $ADMIN_Approve_date_time,
      'HR_Notes' => $HR_Notes,
      'DH_Notes' => $DH_Notes,
      'GM_Notes' => $GM_Notes,
      'ADMIN_Notes' => $ADMIN_Notes,
      'MeetingDate2' => $MeetingDate2,
      'RequestDate2' => $RequestDate,
      'ReleivingDate2' => $ReleivingDate2


    );

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  } catch (Exception $e) {
  }
}

//////////////////////////////
if($MethodGet == 'FetchAddress')
{

    try
    { 
  

      $Employeeid =$form_data['Employeeid'];
      $_SESSION["Employeeid"] = $Employeeid;
      $CurrentAddress ="";
      $CurrentCountry ="";
      $CurrentState ="";
      $CurrentCity ="";
      $CurrentPincode ="";
      
    $GetChapter = "SELECT * FROM indsys1018employeeaddressinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $CurrentAddress =$row['Currentaddress'];
      $CurrentCountry =$row['Currentcountry'];
      $CurrentState = $row['Currentstate'];
      $CurrentCity =$row['Currentcity'];
      $CurrentPincode =$row['Current_pincode'];
      $Permanantaddress =$row['Permanantaddress'];
      $Permanantcountry =$row['Permanantcountry'];
      $Peremenantstate = $row['Peremenantstate'];
      $Permanantcity =$row['Permanantcity'];
      $Permanantpincode =$row['Permanantpincode'];
      
     
      } 
    }


 
    
    $Display=array(
      'CurrentAddress'=>$CurrentAddress,
      'CurrentCountry'=>$CurrentCountry,
      'CurrentState'=>$CurrentState,
      'CurrentCity'=> $CurrentCity,
      'CurrentPincode'=> $CurrentPincode,
      'Permanantaddress' =>$Permanantaddress,
      'Permanantcountry' =>$Permanantcountry,
      'Peremenantstate' =>$Peremenantstate,
      'Permanantcity' =>$Permanantcity,
      'Permanantpincode' =>$Permanantpincode
     
      

  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
 return;
}
catch(Exception $e)
{

}

 }

//////////////////////////////////////////////

if ($MethodGet == 'ALL') {
  $GetState = "SELECT * FROM indsys1017employeemaster WHERE Clientid ='$Clientid' AND EmpActive ='Active' ORDER BY Employeeid";
  $result_Region = $conn->query($GetState);

  if (mysqli_num_rows($result_Region) > 0) {
    while ($row = mysqli_fetch_array($result_Region)) {
      $data01[] = $row;
    }
  }


  header('Content-Type: application/json');
  echo json_encode($data01);
  return;
}


/////////////////////////////////
if ($MethodGet == 'FetchHandover') {

  try {


    $Employeeid = $form_data['Employeeid'];
    //$_SESSION["Employeeid"] = $Employeeid;
    $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid ='$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter);
    if (mysqli_num_rows($result_Chapter) > 0) {


      while ($row = mysqli_fetch_array($result_Chapter)) {
        $Title = $row['Title'];
        $Firstname = $row['Firstname'];
        $Lastname = $row['Lastname'];
      }
    }

    $Display = array(
      'Title' =>  $Title,
      'Firstname' => $Firstname,
      'Lastname' =>  $Lastname,



    );


    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  } catch (Exception $e) {
  }
}
/////////////////////////////////////////////////////
if ($MethodGet == 'Fetchtime_reason') {

  try {


    $Employeeid = $form_data['Employeeid'];
    //$_SESSION["Employeeid"] = $Employeeid;
    $GetChapter = "SELECT * FROM indsys1017exitemployee where Clientid ='$Clientid' and Employeeid ='$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter);
    if (mysqli_num_rows($result_Chapter) > 0) {


      while ($row = mysqli_fetch_array($result_Chapter)) {
        $Meetingtime = $row['MeetingTime'];
        $Releivingreason = $row['ReleivingReason'];
        // $Lastname = $row['Lastname'];


      }
    }




    $Display = array(
      'Meetingtime' =>  $Meetingtime,
      'Releivingreason' => $Releivingreason,
      // 'Lastname'=>  $Lastname,



    );

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  } catch (Exception $e) {
  }
}
///////////////////////////////////////////////////////////
if ($MethodGet == 'FetchDate') {
  $date = date("Y-m-d ");
  header('Content-Type: application/json');
  echo json_encode($date);
  return;
}
///////////////////////////////

if ($MethodGet == 'Save') {
  $Employeeid = $form_data['Employeeid'];
  $EmployeeName = $form_data['EmployeeName'];
  $RequestDate = $form_data['RequestDate'];
  $Status = $form_data['Exitstatus'];
  $Gender = $form_data['Gender'];
  $Category = $form_data['Category'];
  $date = $form_data['Addormodifydatetime'];
  $Designation = $form_data['EmpDesignation'];
  $Contactno = $form_data['Contactno'];
  $Department = $form_data['EmpDepartment'];
  $ReleivingDate = $form_data['ReleivingDate'];
  $Handovername = $form_data['Handovername'];
  $HandoverID = $form_data['Handoverid'];
  $Releivingreason = $form_data['Releivingreason'];
  $Approvalstatus = $form_data['Approvalstatus'];
  $MeetingDate = $form_data['MeetingDate'];
  $Meetingtime = $form_data['Meetingtime'];

  if (empty($ReleivingDate)) {

    $Message = "Empty";

    $Display = array('Message' => $Message);

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  }

  if (empty($Releivingreason)) {

    $Message = "Releiving Reason";

    $Display = array('Message' => $Message);

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  }

  if (empty($MeetingDate)) {

    $Message = "Meeting Date";

    $Display = array('Message' => $Message);

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  }

  if (empty($Meetingtime)) {

    $Message = "Meeting Time";

    $Display = array('Message' => $Message);

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  }

  if (empty($Handovername)) {

    $Message = "Hand Over Name";

    $Display = array('Message' => $Message);

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  }


  if (empty($RequestDate)) {

    $Message = "Request DATE";

    $Display = array('Message' => $Message);

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  }


  if (mysqli_connect_errno()) {
    $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
  }



  $getempname = "SELECT * FROM indsys1017employeemaster where  Clientid ='$Clientid' and Employeeid = '$Employeeid' Limit 1";
  $result_Chapter = $conn->query($getempname);
  if (mysqli_num_rows($result_Chapter) > 0) {

    while ($row = mysqli_fetch_array($result_Chapter)) {

      $EmployeeName = $row['Fullname'];
    }
  }


  $resultExists = "SELECT * FROM indsys1017exitemployee WHERE  Clientid ='$Clientid' and Employeeid ='$Employeeid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01)) {

    $resultExists = "Update indsys1017exitemployee set 
  EmployeeName='$EmployeeName',
  Department ='$Department',
  Userid='$user_id',
  Addormodifydatetime='$date',
  HandoverID='$HandoverID',
  Handoverto='$Handovername',
  RequestDate='$RequestDate',
  ReleivingDate='$ReleivingDate',
  SuperUserApproval='$Approvalstatus',
  Exitstatus='$Status',
  ReleivingReason='$Releivingreason',
  Superuseroneandonemeetingdate='$MeetingDate',
  MeetingTime='$Meetingtime',
  Handoverto='$Handovername',
  Designation='$Designation'    
     WHERE Employeeid ='$Employeeid' and  Clientid ='$Clientid' ";
    $resultExists01 = $conn->query($resultExists);
    $Message = "Update";
  } else {

    //echo "hello";
    $resultExists1 = "INSERT IGNORE INTO `indsys1017exitemployee`(`Clientid`, `Employeeid`, `EmployeeName`, `Userid`, `Addormodifydatetime`, `SuperUserApproval`, `SuperUserApproveddatetime`, `RequestDate`, `ReleivingDate`, `ExitStatus`, `ReleivingReason`, `Superuseroneandonemeetingdate`, `MeetingTime`, `HandoverID`, `Handoverto`, `Department`, `Designation` ,`HR_Approve`, `DH_Approve`, `GM_Approve`, `ADMIN_Approve`) VALUES 
('$Clientid','$Employeeid','$EmployeeName','$user_id','$date',' $Approvalstatus',' $SuperUserApproveddatetime',' $RequestDate','$ReleivingDate','$Status','$Releivingreason','$MeetingDate','$Meetingtime','$HandoverID','$Handovername','$Department','$Designation','Pending','Pending','Pending','Pending')";
    $resultExists01 = $conn->query($resultExists1);
    $Message = "Data Saved";
  }



  try {
    handoverdata($conn, $Employeeid, $user_id, $date, $Clientid);
  } catch (Exception $x) {
  }

  $Display = array('Message' => $Message);

  $str = json_encode($Display);
  echo trim($str, '"');
  return;
}



///////////////////////////////////////////////////////////



function handoverdata($conn, $Employeeid, $user_id, $date, $Clientid)
{
  try {
    $i = 0;
    //echo "hello";
    $resultExists = "SELECT * FROM indsys1034employeeitemchecklist WHERE Clientid = '$Clientid' AND Employeeid = '$Employeeid' ";
    $resultExists01 = $conn->query($resultExists);
    while ($row = $resultExists01->fetch_assoc()) {
      $i++;

      $Particulars = $row['Particulars'];
      $Propertychecklistitemimage = $row['Propertychecklistitemimage'];
      $Qtyitem = $row['Qtyitem'];
      $Distributeddate = $row['Distributeddate'];
      $Propertychecklistitemimage = $row['Propertychecklistitemimage'];
      $destinationfile = "";
      if ($Propertychecklistitemimage != null) {
        $test = pathinfo($Propertychecklistitemimage);
        $last_image_path = $test['basename'];

        $directory3 = "../EMPHANDITEM/";
        $directory2 = "../EMPHANDITEM/$Employeeid/";


        $directory = "../EMPHANDITEM/$Employeeid/$i/";
        if (!is_dir($directory3)) {
          mkdir($directory3, 0777);
        }
        if (!is_dir($directory2)) {
          mkdir($directory2, 0777);
        }
        if (!is_dir($directory)) {
          mkdir($directory, 0777);
        }

        if (!is_dir($directory)) {
        } else {
          foreach (new DirectoryIterator($directory) as $fileInfo) {
            if (!$fileInfo->isDot()) {
              unlink($fileInfo->getPathname());
            }
          }
        }

        if (!is_dir($directory)) {
          mkdir($directory, 0777, true);
        }
        $destinationfile = "$directory$last_image_path";
        copy($Propertychecklistitemimage, $destinationfile);
      }
      $sqlsave = "INSERT IGNORE INTO indsys1034handoveritems(`Clientid`, `Employeeid`, `Sno`, `Particulars`, `Userid`, `Addormodifydatetime`, `Propertychecklistitemimage`, `Qtyitem`, `Distributeddate`, `Handoverdate`, `Notes`, `StoredPlace`, `ConcernName`, `HandoverImage`)
      VALUES ('$Clientid','$Employeeid','$i','$Particulars','$user_id','$date','$Propertychecklistitemimage','$Qtyitem','$Distributeddate','','','','','')";
      $resultsave = mysqli_query($conn, $sqlsave);
    }
  } catch (Exception $e) {
  }
}
///////////////////////////////////////////
if ($MethodGet == 'Updateedit') {


  try {

    $Employeeid = $form_data['Employeeid'];
    $Title = $form_data['Title'];
    $Firstname = $form_data['Firstname'];
    $Lastname = $form_data['Lastname'];
    $Gender = $form_data['Gender'];
    $Nationality = $form_data['Nationality'];
    $Married = $form_data['Married'];
    $Mothertongue = $form_data['Mothertongue'];
    $Contactno = $form_data['Contactno'];
    $Category = $form_data['Category'];
    $Emailid = $form_data['Emailid'];
    $fullname = "$Firstname $Lastname";
    $EmployeeType = $form_data['EmployeeType'];
    $Department = $form_data['Department'];
    $Highestqualification = $form_data['Highestqualification'];
    $Releivingreason = $form_data['Releivingreason'];
    $Approvalstatus = $form_data['Approvalstatus'];
    $Designation = $form_data['Designation'];
    $Status = $form_data['Exitstatus'];
    $ReleivingDate = $form_data['ReleivingDate'];
    $Handovername = $form_data['Handovername'];
    $HandoverID = $form_data['Handoverid'];
    $RequestDate = $form_data['RequestDate'];
    $Meetingtime = $form_data['Meetingtime'];





    if (mysqli_connect_errno()) {
      $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
      exit;
    }
    $resultExists = "Update vwexitemployee set 
  Title ='$Title',
  Firstname ='$Firstname',
  Lastname='$Lastname',
  Gender ='$Gender',
  Contactno ='$Contactno',
  Type_Of_Posistion='$Category',
  Emaild='$Emailid',
  Fullname ='$fullname',
  EmployeeType='$EmployeeType',
  Department ='$Department',
  HandoverID='$HandoverID',
  Handoverto='$Handovername',
  RequestDate='$RequestDate',
  ReleivingDate='$ReleivingDate',
  SuperUserApproval='$Approvalstatus',
  MeetingTime='$Meetingtime',
  ReleivingReason='$Releivingreason',
  Exitstatus='$Status',

 
    
     WHERE Employeeid ='$Employeeid' and Clientid ='$Clientid' ";
    $resultExists01 = $conn->query($resultExists);
    $Message = "Exists";


    $Display = array('Message' => $Message);

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  } catch (Exception $e) {
  }
}
/////////////////////////////////////////////
if ($MethodGet == 'HandoverEmpdisplay') {


  try {

    $Employeeid = $form_data['Employeeid'];


    $data01 = [];


    $GetState = "SELECT * FROM indsys1034handover where  Clientid ='$Clientid' and Employeeid='$Employeeid'  ORDER BY Employeeid";
    $result_Region = $conn->query($GetState);

    if (mysqli_num_rows($result_Region) > 0) {
      while ($row = mysqli_fetch_array($result_Region)) {
        $data01[] = $row;
      }
    }


    header('Content-Type: application/json');
    echo json_encode($data01);
  } catch (Exception $e) {
  }
}
/////////////////////////////////////////////
if ($MethodGet == 'DeleteHandover') {
  $Employeeid = $form_data['Employeeid'];
  $Sno = $form_data['Sno'];



  if (mysqli_connect_errno()) {
    $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
  }
  $resultExists = "DELETE FROM indsys1034handover WHERE  Clientid ='$Clientid' and Employeeid ='$Employeeid' and Sno='$Sno' ";
  $resultExists01 = $conn->query($resultExists);


  $Message = "Delete";




  $Display = array('Message' => $Message);

  $str = json_encode($Display);
  echo trim($str, '"');
}
/////////////////////////////////////////////////////
if ($MethodGet == 'DeleteHandoveritem') {
  $Employeeid = $form_data['Employeeid'];
  $Sno = $form_data['Sno'];



  if (mysqli_connect_errno()) {
    $Message = "Failed to connect to MySQL:" . mysqli_connect_error();
    exit;
  }
  $resultExists = "DELETE FROM indsys1034handoveritems WHERE Clientid ='$Clientid' and  Employeeid ='$Employeeid' and Sno='$Sno' ";
  $resultExists01 = $conn->query($resultExists);


  $Message = "Delete";




  $Display = array('Message' => $Message);

  $str = json_encode($Display);
  echo trim($str, '"');
}

//////////////////////////////////////////////////
if ($MethodGet == 'EMPHANDNEXT') {


  try {

    $Employeeid = $form_data['Employeeid'];



    $Sno = 0;

    $resultExistsnew = "SELECT Nextno FROM vwemployeehandoverdoc WHERE Employeeid ='$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
    $resultExists01new = $conn->query($resultExistsnew);

    if (mysqli_fetch_row($resultExists01new)) {

      $GetChapter = "SELECT * FROM vwemployeehandoverdoc WHERE Employeeid ='$Employeeid' AND Clientid = '$Clientid'  ";
      $result_Chapter = $conn->query($GetChapter);
      if (mysqli_num_rows($result_Chapter) > 0) {
        while ($row = mysqli_fetch_array($result_Chapter)) {
          $Sno = $row['Nextno'];
        }
      }
    } else {
      $Sno = 1;
    }






    $Handoverdate = $date;



    $Display = array(
      'Sno' => $Sno,
      'Handoverdate' => $Handoverdate
    );

    $str = json_encode($Display);
    echo trim($str, '"');
  } catch (Exception $e) {
  }
}

///////////////////////////////////////////////////
if ($MethodGet == 'EMPITEMNEXT') {


  try {

    $Employeeid = $form_data['Employeeid'];



    $Sno = 0;

    $resultExistsnew = "SELECT Nextno FROM vwemployeehandoveritem WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
    $resultExists01new = $conn->query($resultExistsnew);

    if (mysqli_fetch_row($resultExists01new)) {

      $GetChapter = "SELECT * FROM vwemployeehandoveritem WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
      $result_Chapter = $conn->query($GetChapter);
      if (mysqli_num_rows($result_Chapter) > 0) {
        while ($row = mysqli_fetch_array($result_Chapter)) {
          $Sno = $row['Nextno'];
        }
      }
    } else {
      $Sno = 1;
    }







    $Display = array('Sno' => $Sno);

    $str = json_encode($Display);
    echo trim($str, '"');
  } catch (Exception $e) {
  }
}

/////////////////////////////////////////////////////////////////
if ($MethodGet == 'HANDOVEREMP') {

  $Employeeid = $form_data['Employeeid'];

  $HandNextno = $form_data['HandNextno'];
  $description = $form_data['description'];



  if (empty($description)) {

    $Message = "description";

    $Display = array(
      'Message' => $Message
    );

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  }



  $resultExists = "SELECT Employeeid FROM indsys1034handover WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' And Sno ='$HandNextno' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01)) {

    $resultExistsss = "Update indsys1034handover set 
      description ='$description',
      Addormodifydatetime ='$date',
      Userid ='$user_id'
     
  WHERE Employeeid = '$Employeeid' AND Sno ='$HandNextno'

  AND Clientid ='$Clientid'  ";
    $resultExists0New = $conn->query($resultExistsss);
    $Message = "Exists";
  } else {
    $sqlsave = "INSERT IGNORE INTO indsys1034handover (`Clientid`, `Employeeid`, `Sno`, `description`, `Userid`, `Addormodifydatetime`, `Handoverdocument`)
   VALUES ('" . $Clientid . "','" . $Employeeid . "','" . $HandNextno . "','" . $description . "',
   '" . $user_id . "','" . $date . "','" . $Handoverdocument . "')";
    $resultsave = mysqli_query($conn, $sqlsave);

    $Message = "Update";
  }



  $Display = array(

    'Message' => $Message
  );

  $str = json_encode($Display);
  echo trim($str, '"');
}
////////////////////////////////////////////////////
if ($MethodGet == 'Fetchempdoc') {

  try {


    $Employeeid = $form_data['Employeeid'];
    $Sno = $form_data['Sno'];
    $GetChapter = "SELECT * FROM indsys1034handover where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$Sno' ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter);
    if (mysqli_num_rows($result_Chapter) > 0) {


      while ($row = mysqli_fetch_array($result_Chapter)) {
        $description = $row['description'];
        $Handoverdocument = $row['Handoverdocument'];
      }
    }




    $Display = array(
      'description' => $description,

      'Handoverdocument' => $Handoverdocument,





    );

    $str = json_encode($Display);
    echo trim($str, '"');
  } catch (Exception $e) {
  }
}
///////////////////////////////////////////////
if ($MethodGet == 'Handitem') {


  try {

    $Employeeid = $form_data['Employeeid'];


    $data01 = [];


    $GetState = "SELECT * FROM indsys1034handoveritems where  Clientid ='$Clientid' and Employeeid='$Employeeid'  ORDER BY Employeeid";
    $result_Region = $conn->query($GetState);

    if (mysqli_num_rows($result_Region) > 0) {
      while ($row = mysqli_fetch_array($result_Region)) {
        $data01[] = $row;
      }
    }


    header('Content-Type: application/json');
    echo json_encode($data01);
  } catch (Exception $e) {
  }
}
///////////////////////////////////////////////////////////
if ($MethodGet == 'Fetchitem') {

  try {
    $Employeeid = $form_data['Employeeid'];
    $Sno = $form_data['Sno'];
    $GetChapter = "SELECT * FROM indsys1034handoveritems  WHERE Clientid ='$Clientid' AND Employeeid ='$Employeeid' AND Sno='$Sno'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter);
    if (mysqli_num_rows($result_Chapter) > 0) {


      while ($row = mysqli_fetch_array($result_Chapter)) {

        $Particulars = $row['Particulars'];
        $Qtyitem = $row['Qtyitem'];
        $Distributeddate = $row['Distributeddate'];
        $Handoverdate = $row['Handoverdate'];
        $Notes = $row['Notes'];
        $StoredPlace = $row['StoredPlace'];
        $ConcernName = $row['ConcernName'];
        $HandoverImage = $row['HandoverImage'];
        $Propertychecklistitemimage = $row['Propertychecklistitemimage'];
      }
    }


    $Display = array(

      'Particulars' => $Particulars,
      'Qtyitem' => $Qtyitem,
      'Distributeddate' => $Distributeddate,
      'Handoverdate' => $Handoverdate,
      'Notes' => $Notes,
      'StoredPlace' => $StoredPlace,
      'ConcernName' => $ConcernName,
      'HandoverImage' => $HandoverImage,

      'Propertychecklistitemimage' => $Propertychecklistitemimage,





    );

    $str = json_encode($Display);
    echo trim($str, '"');
  } catch (Exception $e) {
  }
}
///////////////////////////////////////////////////////////////////
if ($MethodGet == 'upload_item') {

  $Employeeid = $form_data['Employeeid'];
  $HandoveritemNextno = $form_data['HandoveritemNextno'];
  $Particulars = $form_data['Handoveritem'];
  $Qtyitem = $form_data['Qtyitem'];
  $Distributeddate = $form_data['Distributeddate'];
  $Handoverdate = $form_data['Handoverdate'];
  $Notes = $form_data['Notes'];
  $StoredPlace = $form_data['StoredPlace'];
  $ConcernName = $form_data['ConcernName'];




  if (empty($Particulars)) {

    $Message = "Particulars";

    $Display = array(
      'Message' => $Message
    );

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  }
  if (empty($Distributeddate)) {
    $Distributeddate = "0000-00-00";
  }

  if (empty($Handoverdate)) {
    $Handoverdate = "0000-00-00";
  }

  if (empty($Qtyitem)) {

    $Message = "Qtyitem";

    $Display = array(
      'Message' => $Message
    );

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  }
  if (empty($Handoverdate)) {

    $Message = "Handoverdate";

    $Display = array(
      'Message' => $Message
    );

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  }






  $resultExists = "SELECT * FROM indsys1034handoveritems WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' And Sno ='$HandoveritemNextno' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01)) {

    $resultExistsss = "Update indsys1034handoveritems set 
      Particulars ='$Particulars',
      Qtyitem ='$Qtyitem',   
     
      Distributeddate ='$Distributeddate', 
      Handoverdate ='$Handoverdate',
      Notes ='$Notes',   
      StoredPlace ='$StoredPlace',
      ConcernName ='$ConcernName',
           
      Addormodifydatetime ='$date',
      Userid ='$user_id'
     
     
  WHERE Employeeid = '$Employeeid' AND Sno ='$HandoveritemNextno'

  AND Clientid ='$Clientid'  ";
    $resultExists0New = $conn->query($resultExistsss);
    $Message = "Update";
  } else {
    $sqlsave = "INSERT IGNORE INTO indsys1034handoveritems (Clientid,Employeeid,Sno,Particulars,Userid,Addormodifydatetime,Qtyitem,Distributeddate,Handoverdate, Notes, StoredPlace,ConcernName)
   VALUES ('$Clientid','$Employeeid','$HandoveritemNextno','$Particulars','$user_id','$date','$Qtyitem','$Distributeddate','$Handoverdate','$Notes','$StoredPlace','$ConcernName')";
    $resultsave = mysqli_query($conn, $sqlsave);

    $Message = "Update";
  }



  $Display = array(

    'Message' => $Message
  );

  $str = json_encode($Display);
  echo trim($str, '"');
}
/////////////////////////////////////////////////////////////////////




if ($MethodGet == 'Emailsend') {


  $GetChapter = "SELECT Emailid  FROM indsys1000useradmin where Clientid ='$Clientid' and  Authorizedtype ='ADMIN' ";
  $result_Chapter = $conn->query($GetChapter);
  $Message = "mail";
  if (mysqli_num_rows($result_Chapter) > 0) {
    while ($row = mysqli_fetch_array($result_Chapter)) {

      $Emailid = $row['Emailid'];

      $MailTo .= "$Emailid,";
    }
  }



  if ($MailTo == "") {
  } else {
    $MailTo = substr($MailTo, 0, -1);
  }


  $Employeeid = $form_data['Employeeid'];
  $EmployeeName = $form_data['EmployeeName'];
  $RequestDate = $form_data['RequestDate'];
  $ReleivingDate = $form_data['ReleivingDate'];

  $_SESSION["Employeeid"] = $Employeeid;

  $GetChapter01 = "SELECT * FROM indsys1017exitemployee  where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
  $result_Chapter01 = $conn->query($GetChapter01);

  if (mysqli_num_rows($result_Chapter01) > 0) {
    while ($row = mysqli_fetch_array($result_Chapter01)) {

      $Employeeid = $row['Employeeid'];
      $EmployeeName = $row['EmployeeName'];
      $RequestDate = $row['RequestDate'];
      $ReleivingDate = $row['ReleivingDate'];
    }
  }


  $Employeeid = $form_data['Employeeid'];
  $Designation = $form_data['Designation'];
  $Department = $form_data['Department'];

  $GetChapter02 = "SELECT * FROM indsys1017employeemaster  where Clientid ='$Clientid' and Employeeid ='$Employeeid'  ORDER BY Employeeid";
  $result_Chapter02 = $conn->query($GetChapter02);

  if (mysqli_num_rows($result_Chapter02) > 0) {
    while ($row = mysqli_fetch_array($result_Chapter02)) {

      $Designation = $row['Designation'];
      $Department = $row['Department'];
    }
  }

  $mail = new PHPMailer(false);
  $mail->IsSMTP();
  $tstbody = "";
  //echo " $ReleivingDate test";

  try {
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
    $Toaddress = $MailTo;

    $htmlContent = "<!doctype html>
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

  a.approve-btn{
    background-color: #2D9A43;
    padding: 10px;
    text-decoration: none;
    color:#ffffff
   
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
  <body style='background-color: #f6f6f6;'>
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
                    <tr> <td><center><img alt='Logo' height='80px' src='$domain/assets/images/logo/logo.png'></center></td></tr>
                    <tr>

                      <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
<br/>
<h1 style='text-align: center;color:#2D9A43'>Request for Relieving Letter</h1>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Dear Sir/Madam,</p>
                        
                        <span style='font-size:0.9rem;line-height: 1.5;'>
                            I am $EmployeeName and I work as $Designation in the $Department department.

                        This is to bring to your attention that with reference to my resignation submitted on $RequestDate, I am getting relieved from my responsibilities at the companies from $ReleivingDate.
                        
                        Since my clearance process at the company is done and I have completed all my exit formalities, I request you to release my relieving letter at the earliest.
                                </span>                                                                                                                                                                                                                                                                                                                    

                       <p>Thanks and regards,<br/>
                       $EmployeeName<br/>
                       Emp.Id - $Employeeid</p>

                      </td>
                    </tr>
                    <tr><td>   <center><a class='approve-btn' style='background-color:#06B6EA;color:#ffffff;padding:5px;text-decoration:none' href='$domain/HRM27/RelievingApproval.php?EId=$Employeeid&Clientid=$Clientid'>Update Status</a></center></td></tr>
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

    $SubjectMail = "Relieving Letter";

    $email_array = explode(',', $Toaddress);
    for ($i = 0; $i < count($email_array); $i++) {
      $mail->AddAddress($email_array[$i]);
    }
    $mail->SetFrom($HRMEmailAddress, $HRMSenderName);
    $mail->AddReplyTo($HRMEmailAddress, $HRMSenderName);
    $mail->Subject = $SubjectMail;
    // $mail->Body = $tstbody;
    $mail->MsgHTML($htmlContent);
    // optional - MsgHTML will create an alternate automatically

    // attachment
    $mail->Send();
    $str = json_encode("E-Mail Sent Succesfully");
    echo trim($str, '"');

    $Display = array('Message' => $Message);

    $str = json_encode($Display);
    echo trim($str, '"');
  } catch (phpmailerException $e) {
  }
}


///////////////////
if ($MethodGet == 'EXITALL') {
  $GetState = "SELECT * FROM vwexitemployee WHERE Clientid ='$Clientid'  ORDER BY Employeeid";
  $result_Region = $conn->query($GetState);

  if (mysqli_num_rows($result_Region) > 0) {
    while ($row = mysqli_fetch_array($result_Region)) {
      $data01[] = $row;
    }
  }


  header('Content-Type: application/json');
  echo json_encode($data01);
}

////////////////////////////////////
if ($MethodGet == 'EDITALL') {
  $GetState = "SELECT * FROM vwexitemployee  WHERE Clientid ='$Clientid' and EmpActive ='Active' ORDER BY Employeeid";
  $result_Region = $conn->query($GetState);

  if (mysqli_num_rows($result_Region) > 0) {
    while ($row = mysqli_fetch_array($result_Region)) {
      $data01[] = $row;
    }
  }
  header('Content-Type: application/json');
  echo json_encode($data01);
}
//////////////////////////

if ($MethodGet == 'ExitDeactive') {


  try {

    $Employeeid = $form_data['Exitempid'];
    $Relievingrequestdate = $form_data['Relievingrequestdate'];
    $RelievingDate = $form_data['RelievingDate'];
    $Handoverto = $form_data['Handoverto'];
    $Relievingreason = $form_data['Relievingreason'];




    if (empty($Relievingreason)) {

      $Message = "Relievingreason";

      $Display = array(
        'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
    }

    if (empty($RelievingDate)) {

      $Message = "RelievingDate";

      $Display = array(
        'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
    }

    $resultExists = "SELECT * FROM indsys1034employeeitemchecklist WHERE Employeeid = '$Employeeid' AND Clientid='$Clientid' AND Status='Allocated' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);


    if (mysqli_fetch_row($resultExists01)) {

      $Message = "ReturnNo";
      $Display = array(
        'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
    }



    if (mysqli_connect_errno()) {
      $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
      exit;
    }
    $resultExists = "Update indsys1017employeemaster set EmpActive ='Deactive',
   Emprequestresignationdate ='$Relievingrequestdate',
   Handoverto ='$Handoverto',
   Leftreason='$Relievingreason',
   Leftdate ='$RelievingDate',    
   Addormodifydatetime ='$date',
   Userid ='$user_id'
  
  
     
      WHERE Employeeid ='$Employeeid' AND Clientid ='$Clientid'";
    $resultExists01 = $conn->query($resultExists);
    $Message = "Deactive";

    $resultExists02 = "Update indsys1017exitemployee set ExitStatus ='Exited'
   
     
      WHERE Clientid ='$Clientid' and Employeeid ='$Employeeid' ";
    $resultExists01 = $conn->query($resultExists02);
    $Message = "Exit";




    $Display = array('Message' => $Message);

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  } catch (Exception $e) {
  }
}


////////////////////////////////////////////////
if ($MethodGet == 'SendMAILGM_Approve2') {
  try {
    $Employeeid = $form_data['Employeeid'];


    SendMAILadminApprove3($conn, $domain, $Employeeid, $Clientid);

    $Message = "Mail Sent";

    $url = "$domain/HRM27/TYPage.php";

    $Display = array(
      'Message' => $Message
    );

    $str = json_encode($Display);
    echo trim($str, '"');
  } catch (Exception $e) {
  }
}


function SendMAILadminApprove3($conn, $domain, $Employeeid, $Clientid)
{


  $MailTo = "";

  $GetChapter = "SELECT * FROM indsys1017exitemployee where  Clientid ='$Clientid' and Employeeid ='$Employeeid'  ORDER BY Employeeid";
  $result_Chapter = $conn->query($GetChapter);
  if (mysqli_num_rows($result_Chapter) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter)) {
      $EmployeeName = $row['EmployeeName'];
      $Employeeid = $row['Employeeid'];
      $ReleivingDate = $row['ReleivingDate'];
      $RequestDate = $row['RequestDate'];
      $Releivingreason = $row['ReleivingReason'];
    }
  }
  $GetSuperusermailnew = "SELECT * FROM indsys1000useradmin where  Clientid ='$Clientid' and Authorizedtype ='ADMIN'";
  $result_Supermailnew = $conn->query($GetSuperusermailnew);
  if (mysqli_num_rows($result_Supermailnew) > 0) {


    while ($row = $result_Supermailnew->fetch_assoc()) {

      $Useradminid = $row['Userid'];
      $Useradminname = $row['Username'];
    }
  }
  $GetSuperusermail = "SELECT * FROM indsys1000useradmin where  Clientid ='$Clientid' and Authorizedno ='2'";
  $result_Supermail = $conn->query($GetSuperusermail);
  if (mysqli_num_rows($result_Supermail) > 0) {


    while ($row = $result_Supermail->fetch_assoc()) {
      $Usermailid = $row['Emailid'];
      $Usergeneralid = $row['Userid'];
      $Usergeneralname = $row['Username'];

      $MailTo .= "$Usermailid,";
    }
  }

  if ($MailTo == "") {
  } else {

    $MailTo = substr($MailTo, 0, -1);
  }
  $mail = new PHPMailer(false);
  $mail->IsSMTP();
  $Mailcontent = "<!doctype html>
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
  
    a.approve-btn{
      background-color: #2D9A43;
      padding: 10px;
      text-decoration: none;
      color:#ffffff
     
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
    <body style='background-color: #f6f6f6;'>
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
                      <tr> <td><center><img alt='Logo' height='80px' src='$domain/assets/images/logo/logo.png'></center></td></tr>
                      <tr>
  
                        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
  <br/>
  <h1 style='text-align: center;color:#2D9A43'>BRITANNIA GARMENT PACKAGING</h1>
                           <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'> <p>Dear[Sir/Madam],</br>
                           </p>
                       
                          
                          <span style='font-size:0.9rem;line-height: 1.5;'>
                         
                         
                          <p> I would like to inform you that Mr/Mrs. $EmployeeName [$Employeeid]
                           has intimidated on $RequestDate regarding his/her resignation on $ReleivingDate due to the following Reason given as '$Releivingreason'.
                           So kindly consider his/her reason for relieving from the office and approve it.</p>

                           <p> Click<a target='_blank' href='$domain/HRM27/GMApprovalApi.php?Employeeid=$Employeeid&Clientid=$Clientid'> Here </a>For Confirmation</p>
   
                          
                          </span>    
                          <p>Thank you</br>
                           .</p>                                                                                                                                                                                                                                                                                                                                      
  
                         
  
                        </td>
                      </tr>
                      <tr><td>   
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


  try {

    $HRMEmailAddress = $_SESSION["HRMEmailAddress"];
    $HRM16DigitPassword = $_SESSION["HRM16DigitPassword"];
    $HRMSenderName = $_SESSION["HRMSenderName"];

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
    $Toaddress = $MailTo;

    $SubjectMail = "Request for Relieving Letter";

    $email_array = explode(',', $Toaddress);
    for ($i = 0; $i < count($email_array); $i++) {
      $mail->AddAddress($email_array[$i]);
    }
    $mail->SetFrom($HRMEmailAddress, $HRMSenderName);
    $mail->AddReplyTo($HRMEmailAddress, $HRMSenderName);
    $mail->Subject = $SubjectMail;
    // $mail->Body = $tstbody;
    $mail->MsgHTML($Mailcontent);
    // optional - MsgHTML will create an alternate automatically


    // attachment
    $mail->Send();
    $Message = "Mail Sent";
    //header("Location: $domain/HRM09/TYPage.php");
  } catch (Exception $e) {
  }
}

/////////////////////////////////////////////////////

if ($MethodGet == "SendMAILDH_Approve") {
  try {
    $Employeeid = $form_data['Employeeid'];


    SendMAILGENERAL_MANGERApprove($conn, $domain, $Employeeid, $Clientid);

    $Message = "Mail Sent";


    $Display = array(
      'Message' => $Message
    );

    $str = json_encode($Display);
    echo trim($str, '"');
  } catch (Exception $e) {
  }
}


function SendMAILGENERAL_MANGERApprove($conn, $domain, $Employeeid, $Clientid)
{


  $MailTo = "";

  $GetChapter = "SELECT * FROM indsys1017exitemployee where Employeeid = '$Employeeid' and Clientid ='$Clientid'  ORDER BY Employeeid";
  $result_Chapter = $conn->query($GetChapter);
  if (mysqli_num_rows($result_Chapter) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter)) {
      $EmployeeName = $row['EmployeeName'];
      $Employeeid = $row['Employeeid'];
      $ReleivingDate = $row['ReleivingDate'];
      $RequestDate = $row['RequestDate'];
      $Releivingreason = $row['ReleivingReason'];
      $HandoverID = $row['HandoverID'];
    }
  }
  $GetSuperusermail05 = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and  Employeeid ='$HandoverID' ";
  $result_Supermail05 = $conn->query($GetSuperusermail05);
  if (mysqli_num_rows($result_Supermail05) > 0) {
    while ($row = mysqli_fetch_array($result_Supermail05)) {

      $Handoverto = $row['Fullname'];
      $HandoverID2 = $row['Employeeid'];
    }
  }

  $GetSuperusermail04 = "SELECT * FROM indsys1000useradmin where Clientid ='$Clientid' AND  Authorizedno ='2'";
  $result_Supermail04 = $conn->query($GetSuperusermail04);
  if (mysqli_num_rows($result_Supermail04) > 0) {


    while ($row = mysqli_fetch_array($result_Supermail04)) {
      $Usermailid = $row['Emailid'];
      $general_manager = $row['Username'];
      $general_manager_id = $row['Userid'];



      $MailTo .= "$Usermailid,";
    }
  }

  if ($MailTo == "") {
  } else {

    $MailTo = substr($MailTo, 0, -1);
  }

  // echo $MailTo;
  // exit();

  $mail = new PHPMailer(false);
  $mail->IsSMTP();


  $Mailcontent = "<!doctype html>
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
  
    a.approve-btn{
      background-color: #2D9A43;
      padding: 10px;
      text-decoration: none;
      color:#ffffff
     
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
    <body style='background-color: #f6f6f6;'>
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
                      <tr> <td><center><img alt='Logo' height='80px' src='$domain/assets/images/logo/logo.png'></center></td></tr>
                      <tr>
  
                        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
  <br/>
  <h1 style='text-align: center;color:#2D9A43'>BRITANNIA GARMENT PACKAGING</h1>
                          <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'><p> Dear[Sir/Madam],<br/>
                            </p>
                            
                          <span style='font-size:0.9rem;line-height: 1.5;'>
                              <p>I would like to inform you that Mr/Mrs.$EmployeeName [$Employeeid] of our department has requested for resignation from the office. 
                                  The employee has informed on $RequestDate regarding His/Her resignation with the relieving reason given as '$Releivingreason'. 
                                  The relieving date requested by the employee is $ReleivingDate. So kindly forward this information to our Administration department.</p>
                                
                                  <p> Click<a target='_blank' style='background-color:#06B6EA;color:#ffffff;padding:5px;text-decoration:none' href='$domain/HRM27/GMApprovalApi.php?Employeeid=$Employeeid&Clientid=$Clientid'> Here </a>For Confirmation</p>
                                  </span>                                                                                                                                                                                                                                                                                                                    
  
                                  <p>Thank You<br/>
                                </p>
  
                        </td>
                      </tr>
                      <tr><td>  
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

  try {

    $HRMEmailAddress = "indsystesting@gmail.com";
    $HRM16DigitPassword  = "mdpswobfoltlloza";
    $HRMSenderName = "Britannia";
    // $HRMEmailAddress = $_SESSION["HRMEmailAddress"];
    // $HRM16DigitPassword = $_SESSION["HRM16DigitPassword"];
    // $HRMSenderName = $_SESSION["HRMSenderName"];

    $mail->Host = "smtp.gmail.com"; // SMTP server
    $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
    $mail->isSMTP();
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "tls"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 587; // set the SMTP port for the GMAIL server
    $mail->Username = $HRMEmailAddress; // GMAIL username
    $mail->Password = $HRM16DigitPassword; // GMAIL password
    // $mail->Username = "indsystesting@gmail.com"; // GMAIL username
    // $mail->Password = "mdpswobfoltlloza"; // GMAIL password

    // $to = str_replace(";",",",$to);
    $Toaddress = $MailTo;
    //$Toaddress="Krishnaveni@indsys.holdings";
    // echo"$Toaddress";
    $SubjectMail = "Request for Relieving Letter";

    $email_array = explode(',', $Toaddress);
    for ($i = 0; $i < count($email_array); $i++) {
      $mail->AddAddress($email_array[$i]);
    }
    $mail->SetFrom($HRMEmailAddress, $HRMSenderName);
    $mail->AddReplyTo($HRMEmailAddress, $HRMSenderName);
    // $mail->SetFrom('indsystesting@gmail.com', 'INDSYS');
    //   $mail->AddReplyTo('indsystesting@gmail.com', 'INDSYS');
    $mail->Subject = $SubjectMail;
    // $mail->Body = $tstbody;
    $mail->MsgHTML($Mailcontent);
    // optional - MsgHTML will create an alternate automatically


    // attachment
    $mail->Send();
    $Message = "Mail Sent";
    //header("Location: $domain/HRM09/TYPage.php");
  } catch (Exception $e) {
  }
}

///////////////////////////////////////////////////
if ($MethodGet == "SendMAILDH_Approve2") {
  try {
    $Employeeid = $form_data['Employeeid'];


    SendMAILDEPT_HEADApprove($conn, $domain, $Employeeid, $Clientid);

    $Message = "Mail Sent";


    $Display = array(
      'Message' => $Message
    );

    $str = json_encode($Display);
    echo trim($str, '"');
  } catch (Exception $e) {
  }
}


function SendMAILGENERAL_MANGERApprove2($conn, $domain, $Employeeid, $Clientid)
{


  $MailTo = "";

  $GetChapter = "SELECT * FROM indsys1017exitemployee where Employeeid = '$Employeeid' and Clientid ='$Clientid'  ORDER BY Employeeid";
  $result_Chapter = $conn->query($GetChapter);
  if (mysqli_num_rows($result_Chapter) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter)) {
      $EmployeeName = $row['EmployeeName'];
      $Employeeid = $row['Employeeid'];
      $ReleivingDate = $row['ReleivingDate'];
      $RequestDate = $row['RequestDate'];
      $Releivingreason = $row['ReleivingReason'];
      $HandoverID = $row['HandoverID'];
    }
  }
  $GetSuperusermail05 = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and  Employeeid ='$HandoverID' ";
  $result_Supermail05 = $conn->query($GetSuperusermail05);
  if (mysqli_num_rows($result_Supermail05) > 0) {
    while ($row = mysqli_fetch_array($result_Supermail05)) {

      $Handoverto = $row['Fullname'];
      $HandoverID2 = $row['Employeeid'];
    }
  }

  $GetSuperusermail04 = "SELECT * FROM indsys1000useradmin where Clientid ='$Clientid' and Authorizedno ='2'";
  $result_Supermail04 = $conn->query($GetSuperusermail04);
  if (mysqli_num_rows($result_Supermail04) > 0) {


    while ($row = mysqli_fetch_array($result_Supermail04)) {
      $Usermailid = $row['Emailid'];
      $general_manager = $row['Username'];
      $general_manager_id = $row['Userid'];



      $MailTo .= $Usermailid;
    }
  }

  if ($MailTo == "") {
  } else {

    $MailTo = substr($MailTo, 0, -1);
  }


  $mail = new PHPMailer(false);
  $mail->IsSMTP();


  $Mailcontent = "<!doctype html>
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
  
    a.approve-btn{
      background-color: #2D9A43;
      padding: 10px;
      text-decoration: none;
      color:#ffffff
     
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
    <body style='background-color: #f6f6f6;'>
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
                      <tr> <td><center><img alt='Logo' height='80px' src='$domain/assets/images/logo/logo.png'></center></td></tr>
                      <tr>
  
                        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
  <br/>
  <h1 style='text-align: center;color:#2D9A43'>BRITANNIA GARMENT PACKAGING</h1>
                          <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'><p> Dear[Sir/Madam],<br/>
                             </p>
                            
                          <span style='font-size:0.9rem;line-height: 1.5;'>
                              <p>I would like to inform you that Mr/Mrs.$EmployeeName [$Employeeid] of our department has requested for resignation from the office. 
                                  The employee has informed on $RequestDate regarding His/Her resignation with the relieving reason given as '$Releivingreason'. 
                                  The relieving date requested by the employee is $ReleivingDate. So kindly forward this information to our Administration department.</p>
                                
                                  <p> Click<a target='_blank' style='background-color:#06B6EA;color:#ffffff;padding:5px;text-decoration:none' href='$domain/HRM27/DHApprovalApi.php?Employeeid=$Employeeid&Clientid=$Clientid'> Here </a>For Confirmation</p>
                                  </span>                                                                                                                                                                                                                                                                                                                    
  
                                  <p>Thank You<br/>
                                  </p>
  
                        </td>
                      </tr>
                      <tr><td>  
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

  try {


    $HRMEmailAddress = $_SESSION["HRMEmailAddress"];
    $HRM16DigitPassword = $_SESSION["HRM16DigitPassword"];
    $HRMSenderName = $_SESSION["HRMSenderName"];

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
    $Toaddress = $MailTo;

    $SubjectMail = "Request for Relieving Letter";

    $email_array = explode(',', $Toaddress);
    for ($i = 0; $i < count($email_array); $i++) {
      $mail->AddAddress($email_array[$i]);
    }
    $mail->SetFrom($HRMEmailAddress, $HRMSenderName);
    $mail->AddReplyTo($HRMEmailAddress, $HRMSenderName);
    $mail->Subject = $SubjectMail;
    // $mail->Body = $tstbody;
    $mail->MsgHTML($Mailcontent);
    // optional - MsgHTML will create an alternate automatically


    // attachment
    $mail->Send();
    $Message = "Mail Sent";
    //header("Location: $domain/HRM09/TYPage.php");
  } catch (Exception $e) {
  }
}




/////////////////////////////////////////////////////

if ($MethodGet == "SendMAILHR_Approve2") {
  try {
    $Employeeid = $form_data['Employeeid'];


    SendMAILDEPT_HEADApprove2($conn, $domain, $Employeeid, $Clientid);

    $Message = "Mail Sent";



    $Display = array(
      'Message' => $Message
    );

    $str = json_encode($Display);
    echo trim($str, '"');
  } catch (Exception $e) {
  }
}


//////////////////////////////////////////////////////
function SendMAILDEPT_HEADApprove2($conn, $domain, $Employeeid, $Clientid)
{



  $MailTo = "";
  $GetChapter = "SELECT * FROM indsys1017exitemployee where Employeeid ='$Employeeid' and Clientid ='$Clientid' ORDER BY Employeeid";
  $result_Chapter = $conn->query($GetChapter);
  if (mysqli_num_rows($result_Chapter) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter)) {
      $EmployeeName = $row['EmployeeName'];
      $Employeeid = $row['Employeeid'];
      $ReleivingDate = $row['ReleivingDate'];
      $RequestDate = $row['RequestDate'];
      $Releivingreason = $row['ReleivingReason'];
    }
  }


  $GetSuperusermail03 = "SELECT * FROM indsys1000useradmin WHERE Clientid ='$Clientid' AND Authorizedtype='HR Manager'";
  //echo "test $GetSuperusermail03 ";
  $result_Supermail03 = $conn->query($GetSuperusermail03);
  if (mysqli_num_rows($result_Supermail03) > 0) {


    while ($row = mysqli_fetch_array($result_Supermail03)) {
      $Useremailid = $row['Emailid'];
      $useridhr = $row['Userid'];
      $usernamehr = $row['Username'];
      //  echo("$MailTo");  

      $MailTo .= "$Useremailid,";
    }
  }

  if ($MailTo == "") {
  } else {

    $MailTo = substr($MailTo, 0, -1);
  }
  $mail = new PHPMailer(false);
  $mail->IsSMTP();

  $Mailcontent = "<!doctype html>
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
 
    a.approve-btn{
      background-color: #2D9A43;
      padding: 10px;
      text-decoration: none;
      color:#ffffff
     
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
    <body style='background-color: #f6f6f6;'>
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
                      <tr> <td><center><img alt='Logo' height='80px' src='$domain/assets/images/logo/logo.png'></center></td></tr>
                      <tr>
 
                        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
  <br/>
  <h1 style='text-align: center;color:#2D9A43'>BRITANNIA GARMENT PACKAGING</h1>
                          <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'><p>Dear[Sir/Madam],<br/>
                         </p>
                         </p>
                         
                          <span style='font-size:0.9rem;line-height: 1.5;'>
                         
                          <p>I would like to inform you that Mr/Mrs.$EmployeeName [$Employeeid] is going to relieve from the office.
                          The employee has informed on $RequestDate regarding His/Her resignation with the relieving reason given as '$Releivingreason'.
                          The relieving date given by the employee is $ReleivingDate. So, kindly verify and approve the employee.
                          </p>
                          Thank You.
            
                          <p> Click<a target='_blank' style='background-color:#06B6EA;color:#ffffff;padding:5px;text-decoration:none' href='$domain/HRM27/HRApprovalApi.php?Employeeid=$Employeeid&Clientid=$Clientid'> Here </a>For Confirmation</p>
                          </span>    
                          
                         
 
                        </td>
                      </tr>
                      <tr><td>  
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
  // echo"$Mailcontent";

  try {
    $HRMEmailAddress = $_SESSION["HRMEmailAddress"];
    $HRM16DigitPassword = $_SESSION["HRM16DigitPassword"];
    $HRMSenderName = $_SESSION["HRMSenderName"];

    $mail->Host = "smtp.gmail.com"; // SMTP server
    $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
    $mail->isSMTP();
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "tls"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 587; // set the SMTP port for the GMAIL server
    $mail->Username = $HRMEmailAddress; // GMAIL username
    $mail->Password = $HRM16DigitPassword; // GMAIL password
    // $mail->Username = "indsystesting@gmail.com"; // GMAIL username
    // $mail->Password = "mdpswobfoltlloza"; // GMAIL password

    // $to = str_replace(";",",",$to);
    $Toaddress = $MailTo;
    // echo"$Toaddress";
    $SubjectMail = "Request for Relieving Letter";

    $email_array = explode(',', $Toaddress);
    for ($i = 0; $i < count($email_array); $i++) {
      $mail->AddAddress($email_array[$i]);
    }
    $mail->SetFrom($HRMEmailAddress, $HRMSenderName);
    $mail->AddReplyTo($HRMEmailAddress, $HRMSenderName);
    // $mail->SetFrom('indsystesting@gmail.com', 'INDSYS');
    //   $mail->AddReplyTo('indsystesting@gmail.com', 'INDSYS');
    $mail->Subject = $SubjectMail;
    // $mail->Body = $tstbody;
    $mail->MsgHTML($Mailcontent);
    // optional - MsgHTML will create an alternate automatically


    // attachment
    $mail->Send();
    $Message = "Mail Sent";
    //header("Location: $domain/HRM09/TYPage.php");
  } catch (Exception $e) {
  }
}

////////////////////////////////////////////////
if ($MethodGet == "SendMAILHR_Approve") {
  try {
    $Employeeid = $form_data['Employeeid'];


    SendMAILDEPT_HEADApprove($conn, $domain, $Employeeid, $Clientid);

    $Message = "Mail Sent";



    $Display = array(
      'Message' => $Message
    );

    $str = json_encode($Display);
    echo trim($str, '"');
  } catch (Exception $e) {
  }
}
//////////////////////////////////////////////////////
function SendMAILDEPT_HEADApprove($conn, $domain, $Employeeid, $Clientid)
{


  $MailTo = "";

  $GetChapter = "SELECT * FROM indsys1017exitemployee where Employeeid ='$Employeeid' and Clientid ='$Clientid' ORDER BY Employeeid";
  $result_Chapter = $conn->query($GetChapter);
  if (mysqli_num_rows($result_Chapter) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter)) {
      $EmployeeName = $row['EmployeeName'];
      $Employeeid = $row['Employeeid'];
      $ReleivingDate = $row['ReleivingDate'];
      $RequestDate = $row['RequestDate'];
      $Releivingreason = $row['ReleivingReason'];
      $HandoverID = $row['HandoverID'];
    }
  }


  $Gethandover = "SELECT * FROM indsys1017employeemaster where  Clientid ='$Clientid' and  Employeeid ='$HandoverID'";
  $result_handover = $conn->query($Gethandover);
  if (mysqli_num_rows($result_handover) > 0) {
    while ($row = mysqli_fetch_array($result_handover)) {

      $Handoverto = $row['Fullname'];
    }
  }


  $GetDept = "SELECT * FROM indsys1017employeemaster where  Clientid ='$Clientid' and  Employeeid ='$Employeeid'";
  $result_handdept = $conn->query($GetDept);
  if (mysqli_num_rows($result_handdept) > 0) {
    while ($row = mysqli_fetch_array($result_handdept)) {

      $Department = $row['Department'];
    }
  }

  $GetDepartmentHead = "SELECT * FROM indsys1017departmentheaddetail where Department ='$Department' and Clientid ='$Clientid' ";
  $result_DepartmentHead = $conn->query($GetDepartmentHead);
  if (mysqli_num_rows($result_DepartmentHead) > 0) {


    while ($row = mysqli_fetch_array($result_DepartmentHead)) {

      $DepartmentHeadID = $row['Employeeid'];
    }
  }


  $GetSuperusermail = "SELECT * FROM indsys1017employeemaster where  Clientid ='$Clientid' and  Employeeid ='$DepartmentHeadID'";
  $result_Supermail = $conn->query($GetSuperusermail);
  if (mysqli_num_rows($result_Supermail) > 0) {
    while ($row = mysqli_fetch_array($result_Supermail)) {
      $Usermailid = $row['OfficemailID'];



      $MailTo = $Usermailid;
    }
  }



  // if ($MailTo == "")

  // {

  // }

  // else

  // {

  //   $MailTo = substr($MailTo, 0, -1);

  // }

  $GetChapter3 = "SELECT * FROM indsys1000useradmin where  Clientid ='$Clientid' and Authorizedtype ='HR Manager'";
  $result_Chapter3 = $conn->query($GetChapter3);
  if (mysqli_num_rows($result_Chapter3) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter3)) {
      $HRName = $row['Username'];
      $HRid = $row['Userid'];
    }
  }

  $mail = new PHPMailer(false);
  $mail->IsSMTP();

  $Mailcontent = "<!doctype html>
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
  
    a.approve-btn{
      background-color: #2D9A43;
      padding: 10px;
      text-decoration: none;
      color:#ffffff
     
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
    <body style='background-color: #f6f6f6;'>
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
                      <tr> <td><center><img alt='Logo' height='80px' src='$domain/assets/images/logo/logo.png'></center></td></tr>
                      <tr>
  
                        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
  <br/>
  <h1 style='text-align: center;color:#2D9A43'>BRITANNIA GARMENT PACKAGING</h1>
                          <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'><p>Dear[Sir/Madam],<br/>
                         </p>
                         </p>
                          
                          <span style='font-size:0.9rem;line-height: 1.5;'>
                          
                          <p>I would like to inform you that in your department Mr/Mrs.$EmployeeName [$Employeeid] is going to relieve from the office. 
                          The employee has informed on $RequestDate regarding His/Her resignation with the relieving reason given as '$Releivingreason'. 
                          The relieving date given by the employee is $ReleivingDate.so kindly verify and approve the employee.</p> 
                          <p> Click<a target='_blank' style='background-color:#06B6EA;color:#ffffff;padding:5px;text-decoration:none' href='$domain/HRM27/DHApprovalApi.php?Employeeid=$Employeeid&Clientid=$Clientid'> Here </a>For Confirmation</p>
                          </span>    
                          <p>Thank You<br/>
                          </p>                                                                                                                                                                                                                                                                                                                                        
  
                         
  
                        </td>
                      </tr>
                      <tr><td>   
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
  // echo"$Mailcontent";

  try {
    $HRMEmailAddress = "indsystesting@gmail.com";
    $HRM16DigitPassword = "mdpswobfoltlloza";
    $HRMSenderName = "Britannia";

    $mail->Host = "smtp.gmail.com"; // SMTP server
    $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
    $mail->isSMTP();
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "tls"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 587; // set the SMTP port for the GMAIL server
    $mail->Username = $HRMEmailAddress; // GMAIL username
    $mail->Password = $HRM16DigitPassword; // GMAIL password
    // $mail->Username = "indsystesting@gmail.com"; // GMAIL username
    // $mail->Password = "mdpswobfoltlloza"; // GMAIL password

    // $to = str_replace(";",",",$to);
    $Toaddress = $MailTo;
    // echo"$Toaddress";
    $SubjectMail = "Request for Relieving Letter";
    $mail->AddAddress($MailTo);
    // $email_array = explode(',', $Toaddress);
    // for ($i = 0;$i < count($email_array);$i++)
    // {
    // $mail->AddAddress($email_array[$i]);
    // }
    $mail->SetFrom($HRMEmailAddress, $HRMSenderName);
    $mail->AddReplyTo($HRMEmailAddress, $HRMSenderName);
    // $mail->SetFrom('indsystesting@gmail.com', 'INDSYS');
    //   $mail->AddReplyTo('indsystesting@gmail.com', 'INDSYS');
    $mail->Subject = $SubjectMail;
    // $mail->Body = $tstbody;
    $mail->MsgHTML($Mailcontent);
    // optional - MsgHTML will create an alternate automatically


    // attachment
    $mail->Send();
    $Message = "Mail Sent";
    //header("Location: $domain/HRM09/TYPage.php");
  } catch (Exception $e) {
  }
}
//////////////////////////////////////////////////////
if ($MethodGet == "SendMAILGM_Approve") {
  try {
    $Employeeid = $form_data['Employeeid'];


    SendMAILadminApprove($conn, $domain, $Employeeid, $Clientid);

    $Message = "Mail Sent";

    $url = "$domain/HRM27/TYPage.php";

    $Display = array(
      'Message' => $Message
    );

    $str = json_encode($Display);
    echo trim($str, '"');
  } catch (Exception $e) {
  }
}


function SendMAILadminApprove($conn, $domain, $Employeeid, $Clientid)
{


  $MailTo = "";

  $GetChapter = "SELECT * FROM indsys1017exitemployee where  Clientid ='$Clientid' and Employeeid ='$Employeeid'  ORDER BY Employeeid";
  $result_Chapter = $conn->query($GetChapter);
  if (mysqli_num_rows($result_Chapter) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter)) {
      $EmployeeName = $row['EmployeeName'];
      $Employeeid = $row['Employeeid'];
      $ReleivingDate = $row['ReleivingDate'];
      $RequestDate = $row['RequestDate'];
      $Releivingreason = $row['ReleivingReason'];
    }
  }

  $GetSuperusermail = "SELECT * FROM indsys1000useradmin where  Clientid ='$Clientid' and Authorizedno ='2'";
  $result_Supermail = $conn->query($GetSuperusermail);
  if (mysqli_num_rows($result_Supermail) > 0) {


    while ($row = $result_Supermail->fetch_assoc()) {

      // $Usermailid =$row['Emailid'];
      $Usergeneralid = $row['Userid'];
      $Usergeneralname = $row['Username'];
    }
  }

  $GetSuperusermailnew = "SELECT * FROM indsys1000useradmin where  Clientid ='$Clientid' and Authorizedtype ='ADMIN'";
  $result_Supermailnew = $conn->query($GetSuperusermailnew);
  if (mysqli_num_rows($result_Supermailnew) > 0) {


    while ($row = $result_Supermailnew->fetch_assoc()) {
      $Usermailid = $row['Emailid'];
      $Useradminid = $row['Userid'];
      $Useradminname = $row['Username'];

      $MailTo .= "$Usermailid,";
    }
  }

  if ($MailTo == "") {
  } else {

    $MailTo = substr($MailTo, 0, -1);
  }
  $mail = new PHPMailer(false);
  $mail->IsSMTP();
  $Mailcontent = "<!doctype html>
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
  
    a.approve-btn{
      background-color: #2D9A43;
      padding: 10px;
      text-decoration: none;
      color:#ffffff
     
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
    <body style='background-color: #f6f6f6;'>
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
                      <tr> <td><center><img alt='Logo' height='80px' src='$domain/assets/images/logo/logo.png'></center></td></tr>
                      <tr>
  
                        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
  <br/>
  <h1 style='text-align: center;color:#2D9A43'>BRITANNIA GARMENT PACKAGING</h1>
                           <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'> <p>Dear[Sir/Madam],</br>
                           </p>
                       
                          
                          <span style='font-size:0.9rem;line-height: 1.5;'>
                         
                         
                          <p>I would like to inform you that Mr/Mrs. $EmployeeName [$Employeeid]
                           has intimidated on $RequestDate regarding his/her resignation on $ReleivingDate due to the following Reason given as '$Releivingreason'.
                           So kindly consider his/her reason for relieving from the office and approve it.</p>

                           <p> Click<a target='_blank' href='$domain/HRM27/SuperUserApprovalApi.php?Employeeid=$Employeeid&Clientid=$Clientid'> Here </a>For Confirmation</p>
   
                          
                          </span>    
                          <p>Thank You,</br>
                          </p>                                                                                                                                                                                                                                                                                                                                      
  
                         
  
                        </td>
                      </tr>
                      <tr><td>   
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


  try {

    $HRMEmailAddress = "indsystesting@gmail.com";
    $HRM16DigitPassword  = "mdpswobfoltlloza";
    $HRMSenderName = "Britannia";

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
    $Toaddress = $MailTo;

    $SubjectMail = "Request for Relieving Letter";

    $email_array = explode(',', $Toaddress);
    for ($i = 0; $i < count($email_array); $i++) {
      $mail->AddAddress($email_array[$i]);
    }
    $mail->SetFrom($HRMEmailAddress, $HRMSenderName);
    $mail->AddReplyTo($HRMEmailAddress, $HRMSenderName);
    $mail->Subject = $SubjectMail;
    // $mail->Body = $tstbody;
    $mail->MsgHTML($Mailcontent);
    // optional - MsgHTML will create an alternate automatically


    // attachment
    $mail->Send();
    $Message = "Mail Sent";
    //header("Location: $domain/HRM09/TYPage.php");
  } catch (Exception $e) {
  }
}

//////////////////////////////////////////////////////
if ($MethodGet == "SendMAILADMIN_Approve") {

  $Employeeid = $form_data['Employeeid'];

  $GetChapter = "SELECT * FROM indsys1017employeemaster where Employeeid = '$Employeeid' and Clientid ='$Clientid'  ORDER BY Employeeid";
  $result_Chapter = $conn->query($GetChapter);
  if (mysqli_num_rows($result_Chapter) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter)) {

      $Emailid = $row['Emaild'];
    }
  }

  $GetChapter01 = "SELECT * FROM indsys1017exitemployee where Employeeid = '$Employeeid' and Clientid ='$Clientid' ORDER BY Employeeid";
  $result_Chapter01 = $conn->query($GetChapter01);
  if (mysqli_num_rows($result_Chapter01) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter01)) {
      $EmployeeName = $row['EmployeeName'];
      $Employeeid = $row['Employeeid'];
      $ReleivingDate = $row['ReleivingDate'];
      $RequestDate = $row['RequestDate'];
    }
  }
  //   $mail = new PHPMailer(false); 
  //   $mail->IsSMTP();
  //   $Mailcontent= "<!doctype html>
  //   <html>
  //     <head>
  //       <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  //       <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
  //       <title>Email Template</title>
  //       <style>
  //   @media only screen and (max-width: 620px) {
  //     table.body h1 {
  //       font-size: 28px !important;
  //       margin-bottom: 10px !important;
  //     }

  //     table.body p,
  //   table.body ul,
  //   table.body ol,
  //   table.body td,
  //   table.body span,
  //   table.body a {
  //       font-size: 16px !important;
  //     }

  //     table.body .wrapper,
  //   table.body .article {
  //       padding: 10px !important;
  //     }

  //     table.body .content {
  //       padding: 0 !important;
  //     }

  //     table.body .container {
  //       padding: 0 !important;
  //       width: 100% !important;
  //     }

  //     table.body .main {
  //       border-left-width: 0 !important;
  //       border-radius: 0 !important;
  //       border-right-width: 0 !important;
  //     }

  //     table.body .btn table {
  //       width: 100% !important;
  //     }

  //     table.body .btn a {
  //       width: 100% !important;
  //     }

  //     table.body .img-responsive {
  //       height: auto !important;
  //       max-width: 100% !important;
  //       width: auto !important;
  //     }
  //   }
  //   @media all {
  //     .ExternalClass {
  //       width: 100%;
  //     }

  //     a.approve-btn{
  //       background-color: #2D9A43;
  //       padding: 10px;
  //       text-decoration: none;
  //       color:#ffffff

  //     }

  //     .ExternalClass,
  //   .ExternalClass p,
  //   .ExternalClass span,
  //   .ExternalClass font,
  //   .ExternalClass td,
  //   .ExternalClass div {
  //       line-height: 100%;
  //     }

  //     .apple-link a {
  //       color: inherit !important;
  //       font-family: inherit !important;
  //       font-size: inherit !important;
  //       font-weight: inherit !important;
  //       line-height: inherit !important;
  //       text-decoration: none !important;
  //     }

  //     #MessageViewBody a {
  //       color: inherit;
  //       text-decoration: none;
  //       font-size: inherit;
  //       font-family: inherit;
  //       font-weight: inherit;
  //       line-height: inherit;
  //     }

  //     .btn-primary table td:hover {
  //       background-color: #34495e !important;
  //     }

  //     .btn-primary a:hover {
  //       background-color: #34495e !important;
  //       border-color: #34495e !important;
  //     }
  //   }
  //   </style>

  //     </head>
  //     <body style='background-color: #f6f6f6;'>
  //       <span class='preheader' style='color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;'>This is preheader text. Some clients will show this text as a preview.</span>
  //       <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;' width='100%' bgcolor='#f6f6f6'>
  //         <tr>
  //           <td>
  //           <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>

  //           <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 620px; padding: 10px; width: 620px; margin: 0 auto;' width='620' valign='top'>
  //             <div class='content' style='box-sizing: border-box; display: block; margin: 0 auto; max-width: 620px; padding: 10px;'>

  //               <table role='presentation' class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;' width='100%'>

  //                 <tr>
  //                   <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
  //                     <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
  //                       <tr> <td><center><img alt='Logo' height='80px' src='$domain/assets/images/logo/logo.png'></center></td></tr>
  //                       <tr>

  //                         <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
  //   <br/>
  //   <h1 style='text-align: center;color:#2D9A43'>BRITANNIA GARMENT PACKAGING</h1>
  //                            <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'> 


  //                           <span style='font-size:0.9rem;line-height: 1.5;'>


  //                             <p> Mr/Mrs. $EmployeeName [$Employeeid] your request has been accepted. You can relieve from
  //                                 the office from  $ReleivingDate. Kindly ensure that you abide with all the company relieving formalities before
  //                                 leaving the office.</p>




  //                           </span>    
  //                           <p>Thank you,</br>
  //                             ALL THE BEST FOR YOUR CARRER!</br>
  //                             <strong>ADMINISTRATION DEPARTMENT.</strong></p>



  //                         </td>
  //                       </tr>
  //                       <tr><td>   
  //                     </table>
  //                   </td>
  //                 </tr>

  //               </table>


  //             </div>
  //           </td>
  //           <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
  //         </tr>
  //       </table>
  //     </body>
  //   </html>

  // ";

  // try
  // {

  // $HRMEmailAddress = $_SESSION["HRMEmailAddress"];
  // $HRM16DigitPassword = $_SESSION["HRM16DigitPassword"];
  // $HRMSenderName = $_SESSION["HRMSenderName"];

  // $mail->Host = "smtp.gmail.com"; // SMTP server
  // $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
  // $mail->isSMTP();
  // $mail->SMTPAuth = true; // enable SMTP authentication
  // $mail->SMTPSecure = "tls"; // sets the prefix to the servier
  // $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
  // $mail->Port = 587; // set the SMTP port for the GMAIL server
  // $mail->Username = $HRMEmailAddress; // GMAIL username
  // $mail->Password = $HRM16DigitPassword; // GMAIL password

  // // $to = str_replace(";",",",$to);
  // $Toaddress=$Emailid;


  // $SubjectMail="Request for Relieving Letter";

  // $email_array = explode(',', $Toaddress);
  // for ($i = 0;$i < count($email_array);$i++)
  // {
  // $mail->AddAddress($email_array[$i]);
  // }
  // $mail->SetFrom($HRMEmailAddress, $HRMSenderName);
  // $mail->AddReplyTo($HRMEmailAddress, $HRMSenderName);
  // $mail->Subject = $SubjectMail ;
  // // $mail->Body = $tstbody;
  // $mail->MsgHTML($Mailcontent);
  // // optional - MsgHTML will create an alternate automatically



  // // attachment
  // $mail->Send();
  // $Message="Mail Sent";
  // $Display=array(

  //   'Message'=>  $Message,


  // );


  //   $str = json_encode($Display);
  // echo trim($str, '"');

  // }

  // catch(phpmailerException $e)
  // {

  // }

}
///////////////////////////////////////////////////

if ($MethodGet == "SendMAILADMIN_Approve2") {

  $Employeeid = $form_data['Employeeid'];

  $GetChapter = "SELECT * FROM indsys1017employeemaster where Employeeid = '$Employeeid' and Clientid ='$Clientid'  ORDER BY Employeeid";
  $result_Chapter = $conn->query($GetChapter);
  if (mysqli_num_rows($result_Chapter) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter)) {

      $Emailid = $row['Emaild'];
    }
  }

  $GetChapter01 = "SELECT * FROM indsys1017exitemployee where Employeeid = '$Employeeid' and Clientid ='$Clientid' ORDER BY Employeeid";
  $result_Chapter01 = $conn->query($GetChapter01);
  if (mysqli_num_rows($result_Chapter01) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter01)) {
      $EmployeeName = $row['EmployeeName'];
      $Employeeid = $row['Employeeid'];
      $ReleivingDate = $row['ReleivingDate'];
      $RequestDate = $row['RequestDate'];
    }
  }
  //   $mail = new PHPMailer(false); 
  //   $mail->IsSMTP();
  //   $Mailcontent= "<!doctype html>
  //   <html>
  //     <head>
  //       <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  //       <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
  //       <title>Email Template</title>
  //       <style>
  //   @media only screen and (max-width: 620px) {
  //     table.body h1 {
  //       font-size: 28px !important;
  //       margin-bottom: 10px !important;
  //     }

  //     table.body p,
  //   table.body ul,
  //   table.body ol,
  //   table.body td,
  //   table.body span,
  //   table.body a {
  //       font-size: 16px !important;
  //     }

  //     table.body .wrapper,
  //   table.body .article {
  //       padding: 10px !important;
  //     }

  //     table.body .content {
  //       padding: 0 !important;
  //     }

  //     table.body .container {
  //       padding: 0 !important;
  //       width: 100% !important;
  //     }

  //     table.body .main {
  //       border-left-width: 0 !important;
  //       border-radius: 0 !important;
  //       border-right-width: 0 !important;
  //     }

  //     table.body .btn table {
  //       width: 100% !important;
  //     }

  //     table.body .btn a {
  //       width: 100% !important;
  //     }

  //     table.body .img-responsive {
  //       height: auto !important;
  //       max-width: 100% !important;
  //       width: auto !important;
  //     }
  //   }
  //   @media all {
  //     .ExternalClass {
  //       width: 100%;
  //     }

  //     a.approve-btn{
  //       background-color: #2D9A43;
  //       padding: 10px;
  //       text-decoration: none;
  //       color:#ffffff

  //     }

  //     .ExternalClass,
  //   .ExternalClass p,
  //   .ExternalClass span,
  //   .ExternalClass font,
  //   .ExternalClass td,
  //   .ExternalClass div {
  //       line-height: 100%;
  //     }

  //     .apple-link a {
  //       color: inherit !important;
  //       font-family: inherit !important;
  //       font-size: inherit !important;
  //       font-weight: inherit !important;
  //       line-height: inherit !important;
  //       text-decoration: none !important;
  //     }

  //     #MessageViewBody a {
  //       color: inherit;
  //       text-decoration: none;
  //       font-size: inherit;
  //       font-family: inherit;
  //       font-weight: inherit;
  //       line-height: inherit;
  //     }

  //     .btn-primary table td:hover {
  //       background-color: #34495e !important;
  //     }

  //     .btn-primary a:hover {
  //       background-color: #34495e !important;
  //       border-color: #34495e !important;
  //     }
  //   }
  //   </style>

  //     </head>
  //     <body style='background-color: #f6f6f6;'>
  //       <span class='preheader' style='color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;'>This is preheader text. Some clients will show this text as a preview.</span>
  //       <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;' width='100%' bgcolor='#f6f6f6'>
  //         <tr>
  //           <td>
  //           <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>

  //           <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 620px; padding: 10px; width: 620px; margin: 0 auto;' width='620' valign='top'>
  //             <div class='content' style='box-sizing: border-box; display: block; margin: 0 auto; max-width: 620px; padding: 10px;'>

  //               <table role='presentation' class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;' width='100%'>

  //                 <tr>
  //                   <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
  //                     <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
  //                       <tr> <td><center><img alt='Logo' height='80px' src='$domain/assets/images/logo/logo.png'></center></td></tr>
  //                       <tr>

  //                         <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
  //   <br/>
  //   <h1 style='text-align: center;color:#2D9A43'>BRITANNIA GARMENT PACKAGING</h1>
  //                            <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'> 


  //                           <span style='font-size:0.9rem;line-height: 1.5;'>


  //                             <p> Mr/Mrs. $EmployeeName [$Employeeid] your request has been accepted. You can relieve from
  //                                 the office from  $ReleivingDate. Kindly ensure that you abide with all the company relieving formalities before
  //                                 leaving the office.</p>

  //                                 <p> Click<a target='_blank' style='background-color:#06B6EA;color:#ffffff;padding:5px;text-decoration:none' href='$domain/HRM27/SuperUserApprovalApi.php?Employeeid=$Employeeid&Clientid=$Clientid'> Here </a>For Confirmation</p>


  //                           </span>    
  //                           <p>Thank you,</br>
  //                             ALL THE BEST FOR YOUR CARRER!</br>
  //                             <strong>ADMINISTRATION DEPARTMENT.</strong></p>



  //                         </td>
  //                       </tr>
  //                       <tr><td>   
  //                     </table>
  //                   </td>
  //                 </tr>

  //               </table>


  //             </div>
  //           </td>
  //           <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
  //         </tr>
  //       </table>
  //     </body>
  //   </html>

  // ";

  // try
  // {


  // $mail->Host = "smtp.gmail.com"; // SMTP server
  // $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
  // $mail->isSMTP();
  // $mail->SMTPAuth = true; // enable SMTP authentication
  // $mail->SMTPSecure = "tls"; // sets the prefix to the servier
  // $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
  // $mail->Port = 587; // set the SMTP port for the GMAIL server
  // $mail->Username = $HRMEmailAddress; // GMAIL username
  // $mail->Password = $HRM16DigitPassword; // GMAIL password

  // // $to = str_replace(";",",",$to);
  // $Toaddress=$Emailid;


  // $SubjectMail="Request for Relieving Letter";

  // $email_array = explode(',', $Toaddress);
  // for ($i = 0;$i < count($email_array);$i++)
  // {
  // $mail->AddAddress($email_array[$i]);
  // }
  // $mail->SetFrom($HRMEmailAddress, $HRMSenderName);
  // $mail->AddReplyTo($HRMEmailAddress, $HRMSenderName);
  // $mail->Subject = $SubjectMail ;
  // // $mail->Body = $tstbody;
  // $mail->MsgHTML($Mailcontent);
  // // optional - MsgHTML will create an alternate automatically



  // // attachment
  // $mail->Send();
  // $Message="Mail Sent";
  // $Display=array(

  //   'Message'=>  $Message,


  // );


  //   $str = json_encode($Display);
  // echo trim($str, '"');

  // }

  // catch(phpmailerException $e)
  // {

  // }

}
//////////////////////////////////
if ($MethodGet == 'FetchSalary') {

  try {


    $Employeeid = $form_data['Employeeid'];
    $_SESSION["Employeeid"] = $Employeeid;
    $Basic = 0;
    $BasicDay = 0;
    $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid ='$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter);
    if (mysqli_num_rows($result_Chapter) > 0) {


      while ($row = mysqli_fetch_array($result_Chapter)) {
        $Basic = $row['Basic'];
        $HR_Allowance = $row['HR_Allowance'];
        $TA = $row['TA'];
        $Performance_allowance = $row['Performance_allowance'];
        $Day_allowance = $row['Day_allowance'];
        $PF = $row['PF'];
        $ESI = $row['ESI'];
        $TDS = $row['TDS'];
        $Professional_tax = $row['Professional_tax'];
        $Net_Salary = $row['Net_Salary'];
        $Gross_Salary = $row['Gross_Salary'];
        $Other_Allowance = $row['Other_Allowance'];
        $PF_Yesandno = $row['PF_Yesandno'];
        $ESI_Yesandno = $row['ESI_Yesandno'];
      }
    }
    $BasicDay = round($Basic / 26);
    // $BasicDay= number_format($BasicDay,2);



    $Display = array(
      'Basic' =>  $Basic,
      'HR_Allowance' => $HR_Allowance,
      'TA' =>  $TA,
      'Performance_allowance' => $Performance_allowance,
      'Day_allowance' => $Day_allowance,
      'PF' => $PF,
      'ESI' =>  $ESI,
      'TDS' => $TDS,
      'Professional_tax' =>  $Professional_tax,
      'Net_Salary' =>  $Net_Salary,
      'Gross_Salary' => $Gross_Salary,
      'Other_Allowance' => $Other_Allowance,
      'PF_Yesandno' => $PF_Yesandno,
      'ESI_Yesandno' => $ESI_Yesandno,
      'BasicDay' => $BasicDay



    );

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  } catch (Exception $e) {
  }
}
//////////////////////////////////////
function roundup($float, $dec = 2) {
  if ($dec == 0) {
      if ($float < 0) {
          return floor($float);
      } else {
          return ceil($float);
      }
  } else {
      $d = pow(10, $dec);
      if ($float < 0) {
          return floor($float * $d) / $d;
      } else {
          return ceil($float * $d) / $d;
      }
  }
}

//////////////////////////

if ($MethodGet == "HRAPPROVED") {
  $Employeeid = $form_data['Employeeid'];
  $HR_Notes = $form_data['HR_Notes'];

  $GetChapter = "SELECT * FROM indsys1017employeemaster where Employeeid ='$Employeeid' and Clientid ='$Clientid'  ORDER BY Employeeid";
  $result_Chapter = $conn->query($GetChapter);
  if (mysqli_num_rows($result_Chapter) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter)) {
      $EmployeeName = $row['Fullname'];
      $Category = $row['Type_Of_Posistion'];
    }
  }



  if (empty($HR_Notes)) {

    $Message = "HR_Notes";
    $Display = array(

      'Message' =>  $Message,

    );


    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  }

  $date = date("Y-m-d H:i:s");



  $resultExists = "Update indsys1017exitemployee set 
HR_Notes='$HR_Notes',
HR_Approve_date_time='$date',
HR_Approve='Approved'    
   WHERE Employeeid = '$Employeeid' and Clientid ='$Clientid'";
  $resultExists01 = $conn->query($resultExists);
  $Message = "Thankyou";
  $TYPE = "HR";


  $Display = array(

    'Message' =>  $Message,
    'Category' => $Category,
    'TYPE' => $TYPE

  );


  $str = json_encode($Display);
  echo trim($str, '"');
  return;
}

//////////////////////////////////////////

if ($MethodGet == "HRREJECT") {
  $Employeeid = $form_data['Employeeid'];
  $HR_Notes = $form_data['HR_Notes'];


  if (empty($HR_Notes)) {

    $Message = "HR_Notes";
    $Display = array(

      'Message' =>  $Message,

    );


    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  }

  $date = date("Y-m-d H:i:s");



  $resultExists = "Update indsys1017exitemployee set 
HR_Notes='$HR_Notes',
HR_Approve_date_time='$date',
HR_Approve='Reject',
ExitStatus ='Revoked'    
   WHERE Employeeid = '$Employeeid' and Clientid ='$Clientid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message = "Thankyou";



  $Display = array(

    'Message' =>  $Message,


  );


  $str = json_encode($Display);
  echo trim($str, '"');
  return;
}

if ($MethodGet == "DHAPPROVED") {
  $Employeeid = $form_data['Employeeid'];
  $DH_Notes = $form_data['DH_Notes'];
  $GetChapter = "SELECT * FROM indsys1017employeemaster where Employeeid ='$Employeeid' and Clientid ='$Clientid' ORDER BY Employeeid";
  $result_Chapter = $conn->query($GetChapter);
  if (mysqli_num_rows($result_Chapter) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter)) {
      $EmployeeName = $row['Fullname'];
      $Category = $row['Type_Of_Posistion'];
    }
  }

  if (empty($DH_Notes)) {
    $DH_Notes = "Relieving Approved";

    // $Message ="DH_Notes";
    // $Display=array(

    //   'Message'=>  $Message,

    // );


    //   $str = json_encode($Display);
    // echo trim($str, '"');
    // return;
  }

  $date = date("Y-m-d H:i:s");



  $resultExists = "Update indsys1017exitemployee set 
DH_Notes='$DH_Notes',
DH_Approve_date_time='$date',
DH_Approve='Approved'    
   WHERE Employeeid ='$Employeeid' and Clientid ='$Clientid' ";
  $resultExists01 = $conn->query($resultExists);


  //SendMAILGENERAL_MANGERApprove($conn,$domain,$Employeeid,$Clientid);
  $Message = "Thankyou";



  $Display = array(

    'Message' =>  $Message,


  );


  $str = json_encode($Display);
  echo trim($str, '"');
  return;
}

if ($MethodGet == "DHREJECT") {
  $Employeeid = $form_data['Employeeid'];
  $DH_Notes = $form_data['DH_Notes'];


  if (empty($DH_Notes)) {
    $DH_Notes = "Rejected";

    // $Message ="DH_Notes";
    // $Display=array(

    //   'Message'=>  $Message,

    // );


    //   $str = json_encode($Display);
    // echo trim($str, '"');
    // return;
  }

  $date = date("Y-m-d H:i:s");



  $resultExists = "Update indsys1017exitemployee set 
DH_Notes='$DH_Notes',
DH_Approve_date_time='$date',
DH_Approve='Reject',
ExitStatus ='Revoked'    
   WHERE Employeeid = '$Employeeid' and Clientid ='$Clientid'";
  $resultExists01 = $conn->query($resultExists);
  $Message = "Thankyou";



  $Display = array(

    'Message' =>  $Message,


  );


  $str = json_encode($Display);
  echo trim($str, '"');
  return;
}



if ($MethodGet == "GMAPPROVED") {
  $Employeeid = $form_data['Employeeid'];
  $GM_Notes = $form_data['GM_Notes'];
  $GetChapter = "SELECT * FROM indsys1017employeemaster where Employeeid ='$Employeeid' and Clientid ='$Clientid'  ORDER BY Employeeid";
  $result_Chapter = $conn->query($GetChapter);
  if (mysqli_num_rows($result_Chapter) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter)) {
      $EmployeeName = $row['Fullname'];
      $Category = $row['Type_Of_Posistion'];
    }
  }

  $GetChapterExit = "SELECT * FROM indsys1017exitemployee where Employeeid ='$Employeeid' and Clientid ='$Clientid' ORDER BY Employeeid";
  $result_ChapterExit = $conn->query($GetChapterExit);
  if (mysqli_num_rows($result_ChapterExit) > 0) {


    while ($row = mysqli_fetch_array($result_ChapterExit)) {
      $ExitStatus = $row['ExitStatus'];
    }
  }

  if (empty($GM_Notes)) {

    $GM_Notes = "Relieving Approved";
  }

  if ($Category == "Category 3") {
    $ExitStatus = "Approved";
    $Approvalstatus = "Approved";
  }
  $date = date("Y-m-d H:i:s");



  $resultExists = "Update indsys1017exitemployee set 
GM_Notes='$GM_Notes',
GM_Approve_date_time='$date',
GM_Approve='Approved',
ExitStatus='$ExitStatus',
SuperUserApproval='$Approvalstatus'


   WHERE Employeeid ='$Employeeid' and Clientid ='$Clientid'";
  $resultExists01 = $conn->query($resultExists);
  $Message = "Thankyou";
  $TYPE = "GM";


  $Display = array(

    'Message' =>  $Message,
    'Category' => $Category,
    'TYPE' => $TYPE

  );


  $str = json_encode($Display);
  echo trim($str, '"');
  return;
}

if ($MethodGet == "GMREJECT") {
  $Employeeid = $form_data['Employeeid'];
  $GM_Notes = $form_data['GM_Notes'];


  if (empty($GM_Notes)) {
    $GM_Notes = "Rejected";
  }

  $date = date("Y-m-d H:i:s");



  $resultExists = "Update indsys1017exitemployee set 
GM_Notes='$GM_Notes',
GM_Approve_date_time='$date',
GM_Approve='Reject',
ExitStatus ='Revoked'    
   WHERE Employeeid ='$Employeeid' and Clientid ='$Clientid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message = "Thankyou";



  $Display = array(

    'Message' =>  $Message,


  );


  $str = json_encode($Display);
  echo trim($str, '"');
  return;
}



if ($MethodGet == "MDAPPROVED") {
  $Employeeid = $form_data['Employeeid'];
  $ADMIN_Notes = $form_data['ADMIN_Notes'];




  $date = date("Y-m-d H:i:s");



  $resultExists = "Update indsys1017exitemployee set 
ADMIN_Notes='$ADMIN_Notes',
ADMIN_Approve_date_time='$date',
ADMIN_Approve='Approved',
SuperUserApproval ='Approved',
SuperUserApproveddatetime='$date',
ExitStatus ='Approved' 
   
   WHERE Employeeid ='$Employeeid' and Clientid ='$Clientid'";
  $resultExists01 = $conn->query($resultExists);




  $Message = "Thankyou";



  $Display = array(

    'Message' =>  $Message,


  );


  $str = json_encode($Display);
  echo trim($str, '"');
  return;
}



if ($MethodGet == "MDREJECT") {
  $Employeeid = $form_data['Employeeid'];
  $ADMIN_Notes = $form_data['ADMIN_Notes'];




  $date = date("Y-m-d H:i:s");



  $resultExists = "Update indsys1017exitemployee set 
ADMIN_Notes='$ADMIN_Notes',
ADMIN_Approve_date_time='$date',
ADMIN_Approve='Reject',
SuperUserApproval ='Reject',
SuperUserApproveddatetime='$date',
ExitStatus ='Revoked'    
   WHERE Employeeid ='$Employeeid' and Clientid ='$Clientid' ";
  $resultExists01 = $conn->query($resultExists);


  $Message = "Thankyou";



  $Display = array(

    'Message' =>  $Message,


  );


  $str = json_encode($Display);
  echo trim($str, '"');
  return;
}
///////////////////////////
if ($MethodGet == 'FetchSettlement') {

  try {


    $Employeeid = $form_data['Employeeid'];

    $Settlementdate = "";
    $BasicDay = 0;
    $BonusBasicDays = 0;
    $BonusBasicAmounts = 0;
    $CausalBasicDays = 0;
    $CausalBasicAmounts = 0;
    $GratuityBasicDays = 0;
    $GratuityBasicAmounts = 0;
    $Settlementtotal = 0;
    $TotalDays = 0;
    $GetChapter = "SELECT * FROM indsys1017exitemployeesettlement where Clientid ='$Clientid' and Employeeid = '$Employeeid' ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter);
    if (mysqli_num_rows($result_Chapter) > 0) {


      while ($row = mysqli_fetch_array($result_Chapter)) {
        $Settlementdate = $row['Settlementdate'];
        $BasicDay = $row['Basicwagesperday'];
        $BonusBasicDays = $row['Bonousdays'];
        $BonusBasicAmounts = $row['Bonousamount'];
        $CausalBasicDays = $row['CLdays'];
        $CausalBasicAmounts = $row['CLAmount'];
        $GratuityBasicAmounts = $row['Gratuityamt'];
        $Settlementtotal = $row['Settlementtotal'];
        $TotalDays = $row['Totaldays'];
      }
    }



    $Display = array(
      'Settlementdate' =>  $Settlementdate,
      'BasicDay' => $BasicDay,
      'BonusBasicDays' =>  $BonusBasicDays,
      'BonusBasicAmounts' => $BonusBasicAmounts,
      'CausalBasicDays' => $CausalBasicDays,
      'CausalBasicAmounts' => $CausalBasicAmounts,
      'GratuityBasicDays' =>  $GratuityBasicDays,
      'GratuityBasicAmounts' => $GratuityBasicAmounts,
      'Settlementtotal' =>  $Settlementtotal,
      'TotalDays' =>  $TotalDays,



    );

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  } catch (Exception $e) {
  }
}
///////////////////////////////

if ($MethodGet == 'UpdateSettlement') {

  $Employeeid = $form_data['Employeeid'];

  $Settlementdate = $form_data['Settlementdate'];
  $BasicDay = $form_data['BasicDay'];

  $BonusBasicDays = $form_data['BonusBasicDays'];
  $BonusBasicAmounts = $form_data['BonusBasicAmounts'];
  $CausalBasicDays = $form_data['CausalBasicDays'];
  $CausalBasicAmounts = $form_data['CausalBasicAmounts'];

  $GratuityBasicAmounts = $form_data['GratuityBasicAmounts'];
  $Settlementtotal = $form_data['Settlementtotal'];
  $GratuityBasicDays = $form_data['GratuityBasicDays'];

  $TotalDays = $form_data['TotalDays'];

  if (empty($BonusBasicDays)) {
    $BonusBasicDays = 0;
  }
  if (empty($Settlementdate)) {
    $Settlementdate = date("Y-m-d H:i:s");
  }
  if (empty($BonusBasicAmounts)) {
    $BonusBasicAmounts = 0;
  }
  if (empty($CausalBasicDays)) {
    $CausalBasicDays = 0;
  }
  if(empty($GratuityBasicDays))
  {
    $GratuityBasicDays =0;
  }

  $resultExists = "SELECT Employeeid FROM indsys1017exitemployeesettlement WHERE Employeeid ='$Employeeid' AND Clientid ='$Clientid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01)) {

    $resultExistsss = "Update indsys1017exitemployeesettlement set 
      Basicwagesperday ='$BasicDay',
      Bonousdays ='$BonusBasicDays',
      Bonousamount='$BonusBasicAmounts',
      CLdays='$CausalBasicDays',
      CLAmount ='$CausalBasicAmounts',
      Gratuityamt ='$GratuityBasicAmounts',
      Settlementdate ='$Settlementdate',
      Settlementtotal ='$Settlementtotal',
      Totaldays ='$TotalDays',
      Gratuityyears='$GratuityBasicDays',
     Addormodifydatetime ='$date',
      Userid ='$user_id'
      WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid'";
    $resultExists0New = $conn->query($resultExistsss);
    $Message = "Update";
  } else {
    $sqlsave = "INSERT IGNORE INTO indsys1017exitemployeesettlement (Clientid,Employeeid,
  Basicwagesperday,Bonousdays,Bonousamount,CLdays,Userid,Addormodifydatetime,CLAmount,Gratuityamt,Settlementdate,Settlementtotal,Totaldays,Gratuityyears)
   VALUES ('$Clientid','$Employeeid','$BasicDay','$BonusBasicDays','$BonusBasicAmounts',
   '$CausalBasicDays','$user_id','$date','$CausalBasicAmounts',
   '$GratuityBasicAmounts','$Settlementdate','$Settlementtotal','$TotalDays','$GratuityBasicDays')";
    $resultsave = mysqli_query($conn, $sqlsave);

    $Message = "Update";
  }



  $Display = array(

    'Message' => $Message
  );

  $str = json_encode($Display);
  echo trim($str, '"');
}
//////////////////////////////////
if ($MethodGet == "CalculateEL") {
  $Employeeid = $form_data['Employeeid'];
  $ReleivingDate = $form_data['ReleivingDate'];
  $Date_Of_Joing = $form_data['Date_Of_Joing'];
  $Basic = $form_data['Basic'];
  $BasicDay = $form_data['BasicDay'];


  $dt = date_create($ReleivingDate);
  $Currentmonth = $dt->format('m');
  $Currentyear = $dt->format('Y');

  $Previousyear = $Currentyear - 1;

//   if ($Currentmonth >= 10) {

 
 
//     $currmonth=date("m");
//     if($currmonth==01)
//     {
//       $Currentyear = $Currentyear - 1;
       

//     }
//     $Currentyear = $Currentyear + 1;
//     $Previousyear = $Currentyear - 1;
  
// }
$Basichr=0;
$Getemp = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
$result_emp = $conn->query($Getemp);
if (mysqli_num_rows($result_emp) > 0) {


  while ($rowemp = mysqli_fetch_array($result_emp)) {
    $Basic = $rowemp['Basic'];
    $Basic = $rowemp['Basic'];
    $HR_Allowance = $rowemp['HR_Allowance'];
    $TA = $rowemp['TA'];
    $Performance_allowance = $rowemp['Performance_allowance'];
    $Day_allowance = $rowemp['Day_allowance'];
    $PF = $rowemp['PF'];
    $ESI = $rowemp['ESI'];
    $TDS = $rowemp['TDS'];
    $Professional_tax = $rowemp['Professional_tax'];
    $Net_Salary = $rowemp['Net_Salary'];
    $Gross_Salary = $rowemp['Gross_Salary'];
    $Other_Allowance = $rowemp['Other_Allowance'];
    $PF_Yesandno = $rowemp['PF_Yesandno'];
    $ESI_Yesandno = $rowemp['ESI_Yesandno'];
  }
}
$Basichr=($Basic+$HR_Allowance+$Other_Allowance)/26;
$BasicDay = ($Basic / 26);
  $GetChapter = "SELECT * FROM indsys1034payrollsettlemonth where  Givenmonthno = '$Currentmonth'  ";

  $result_Chapter = $conn->query($GetChapter);
  if (mysqli_num_rows($result_Chapter) > 0) {


    while ($row = mysqli_fetch_array($result_Chapter)) {


      $financialMonthsArray =  $row['MonthsAddedList'];
      $Currentyearmonths = $row['Currentyearmonths'];
      $Previousyearsmonths = $row['Previousyearsmonths'];
    }
  }


$financialMonthsArray_t = str_replace(",","','","$financialMonthsArray");
$financialMonthsArray_f = "'".$financialMonthsArray_t."'";

$CurrentyearmonthsArray_t = str_replace(",","','","$Currentyearmonths");
$CurrentyearmonthsArray_f = "'".$CurrentyearmonthsArray_t."'";

$PreviousyearsmonthsArray_t = str_replace(",","','","$Previousyearsmonths");
$PreviousyearsmonthsArray_f = "'".$PreviousyearsmonthsArray_t."'";

//echo "<br/>FM $financialMonthsArray_f</br>";


$Totalworkedays = 0;
$total_worked_days = 0;
$BalanceEL = 0;
$Workingdays=0;
$Nationholidays=0;
$TakenEL = 0;
$Currentyearmonths_array = explode(',',  $Currentyearmonths);
$Financialmonthlist = implode(',', $financialMonthsArray);

$sql = "SELECT 
  SUM(Workeddays) AS TotalWorkingdays, 
  SUM(BalanceEL) AS TotalBalanceEL, 
  SUM(Nationalholidays) AS TotalNationalholidays, 
  SUM(TakenEL) AS TotalTakenEL
  FROM indsys1026employeepayrolltempmasterdetail 
WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' AND Salyear BETWEEN '$Previousyear' AND '$Currentyear' AND (
        (Salyear = '$Previousyear' AND SalMonth IN ($PreviousyearsmonthsArray_f))
        OR
        (Salyear = '$Currentyear' AND SalMonth IN ($CurrentyearmonthsArray_f))
    )
ORDER BY FIELD(SalMonth, $financialMonthsArray_f)";

// $sql = "SELECT 
// SUM(Workeddays) AS TotalWorkingdays, 
// SUM(BalanceEL) AS TotalBalanceEL, 
// SUM(Nationalholidays) AS TotalNationalholidays, 
// SUM(TakenEL) AS TotalTakenEL
// FROM indsys1026employeepayrolltempmasterdetail 
// WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' AND Salyear BETWEEN '$Previousyear' AND '$Currentyear' AND (
//         (Salyear = '$Previousyear' AND SalMonth IN ($CurrentyearmonthsArray_f))
//         OR
//         (Salyear = '$Currentyear' AND SalMonth IN ($PreviousyearsmonthsArray_f))
//     )
// ORDER BY FIELD(SalMonth, 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'January', 'February', 'March')";

  $result = $conn->query($sql);  
  if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
          // Sum the worked days
          $total_worked_days = $row['TotalWorkingdays'];
          $BalanceCL =$row['TotalBalanceEL'];
          $Workingdays =$row['Workingdays'];
          $Nationholidays =$row['TotalNationalholidays'];
          $TakenEL =$row['TotalTakenEL'];
      }
  } else {
      //echo "No results found for the given employee and years.";
  }

  
  $Date1 = new DateTime($Date_Of_Joing);
  $Date2 = new DateTime($ReleivingDate);
  $Years = $Date2->diff($Date1);
  $Graduatityyear = $Years->y;
  $Months = $Years->m;
  $Graduatityyearandmonths= $Graduatityyear . "." . $Months;

//   $TotalMonths = $Years->y * 12 + $Years->m;
// $Graduatityyear = floor($TotalMonths / 12);
// $Months = $TotalMonths % 12;
// $Graduatityyearandmonthsnew = "$Graduatityyear.$Months";
// $tolerance = 0.001;
//echo " $Graduatityyearandmonthsnew";

  $GratuityBasicAmounts = 0;
  $GratuityBasicDays=0;
  if ($Graduatityyear >= 4) {
    if($Months>=6)
    {
   // echo"cursor in";
    $GratuityBasicAmounts = round($Basic / 26 * 15 * $Graduatityyearandmonths);
    $GratuityBasicDays =  $Graduatityyearandmonths;
    }
  } else {
    $GratuityBasicAmounts = 0;
    //echo"cursor out";
  }
  $Bonuspercentage = 0.0833;
  $BonusBasicDays =   $total_worked_days;
  $CausalBasicDays =  $BalanceCL;
  $BonusBasicAmounts = round(round($BasicDay) *  $total_worked_days * $Bonuspercentage);
  $CausalBasicAmounts = round( $BalanceCL* $Basichr);

  $Settlementtotal = $BonusBasicAmounts + $CausalBasicAmounts + $GratuityBasicAmounts;
  $TotalDays = $BonusBasicDays + $CausalBasicDays;


  if (empty($BonusBasicDays)) {
    $BonusBasicDays = 0;
  }
  if (empty($CausalBasicDays)) {
    $CausalBasicDays = 0;
  }


//   $sqlList = "SELECT 
//   SalMonth,
//   Salyear,
// Workeddays AS TotalWorkingdays, 
// BalanceEL AS TotalBalanceEL, 
// Nationalholidays AS TotalNationalholidays, 
// TakenEL AS TotalTakenEL
// FROM indsys1026employeepayrolltempmasterdetail 
// WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'
// AND Salyear BETWEEN '$Previousyear'AND '$Currentyear' AND SalMonth IN ($financialMonthsArray_f)";

$sqlList = "SELECT  SalMonth, Salyear, Workeddays AS TotalWorkingdays, 
BalanceEL AS TotalBalanceEL, 
Nationalholidays AS TotalNationalholidays, 
TakenEL AS TotalTakenEL
FROM indsys1026employeepayrolltempmasterdetail 
WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' AND Salyear BETWEEN '$Previousyear' AND '$Currentyear' AND (
        (Salyear = '$Previousyear' AND SalMonth IN ($PreviousyearsmonthsArray_f))
        OR
        (Salyear = '$Currentyear' AND SalMonth IN ($CurrentyearmonthsArray_f))
    )
ORDER BY FIELD(SalMonth, $financialMonthsArray_f)";
//echo "$sqlList";
  $result_Region = $conn->query($sqlList);
$data=null;
  if (mysqli_num_rows($result_Region) > 0) {
    while ($rowlist = mysqli_fetch_array($result_Region)) {
      $data01[] = $rowlist;
    }
  }

  $Display = array(
    'BonusBasicDays' => $BonusBasicDays,
    'CausalBasicDays' => $CausalBasicDays,
    'BonusBasicAmounts' => round($BonusBasicAmounts, 2),
    'CausalBasicAmounts' => round($CausalBasicAmounts, 2),
    'Settlementtotal' => round($Settlementtotal, 2),
    'TotalDays' => $TotalDays,
    'GratuityBasicDays'=>$GratuityBasicDays,
    'GratuityBasicAmounts' => round($GratuityBasicAmounts, 2),
    'dataList' =>$data01
  );

  $str = json_encode($Display);
  echo trim($str, '"');
}



if ($MethodGet == 'PageSession') {

  $Message = $Sessionid;


  $Display = array(
    'Message' =>  $Message,

  );
  $str = json_encode($Display);
  echo trim($str, '"');
  return;
}
if ($MethodGet == 'PageSession') {

  $Message = $Sessionid;


  $Display = array(
    'Message' =>  $Message,

  );
  $str = json_encode($Display);
  echo trim($str, '"');
  return;
}

if ($MethodGet == 'ExitAsset') {


  try {

    $Employeeid = $form_data['Exitempid'];



    $resultExists = "SELECT * FROM indsys1034employeeitemchecklist WHERE Employeeid = '$Employeeid' AND Clientid='$Clientid' AND Status='Allocated' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);


    if (mysqli_fetch_row($resultExists01)) {

      $Message = "ReturnNo";
      $Display = array(
        'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
    }



    $Message = 'AssetClear';



    $Display = array('Message' => $Message);

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
  } catch (Exception $e) {
  }
}
