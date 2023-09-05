<?php
include '../config.php';

error_reporting(0);
session_start();

$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail = $_SESSION["Mailid"];
$Clientid = $_SESSION["Clientid"];
$Emailid = $_SESSION["Emailid"];
$Sessionid = $_SESSION["SESSIONID"];

$_SESSION["Tittle"] = "Daily Attendance Detail";
$Message = '';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");

$form_data = json_decode(file_get_contents("php://input"));
$form_data = json_decode(json_encode($form_data), true);
$MethodGet = $form_data['Method'];

if ($MethodGet == 'ExitEmp') {

    try {

        $Employeeid = $form_data['Exitempid'];
        $_SESSION["Employeeid"] = $Employeeid;
        //echo $Employeeid;
        $GetChapter = "SELECT * FROM indsys1017employeemaster WHERE Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {

            while ($row = mysqli_fetch_array($result_Chapter)) {

                $Designation = $row['Designation'];
                $Contactno = $row['Contactno'];
                $Emailid = $row['Emaild'];
                $Employeeid = $row['Employeeid'];
                // echo $Employeeid;
                
            }
        }

        $Display = array(

        'Designation' => $Designation, 'Contactno' => $Contactno, 'Emailid' => $Emailid, 'Employeeid' => $Employeeid,
);

        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {

    }
}

/////////////////////////////////////////////


if ($MethodGet == 'ALL') {
    $Department = $form_data['Department'];
    $_SESSION["Department"] = $Department;
    $GetState = "SELECT * FROM indsys1017employeemaster WHERE Clientid ='$Clientid' AND   Department = '$Department' ORDER BY Employeeid";
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

/////////////////////////////////////////////
if ($MethodGet == 'Dept') {
    $GetState = "SELECT * FROM indsys1003departmentmaster WHERE Clientid ='$Clientid' ORDER BY Department";
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

/////////////////////////////////////////////
if ($MethodGet == 'Desig') {
    $GetState = "SELECT * FROM indsys1004designationmaster WHERE Clientid ='$Clientid' ORDER BY Designation";
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

/////////////////////////////////////////////
if ($MethodGet == 'Save') {

    $Userpassword = $form_data['Userpassword'];
    if (empty($Userpassword)) {
        $Message = "Empty";
        $Display = array('Message' => $Message);

        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }

    $Emailid = $form_data['Emailid'];
   
    if (empty($Emailid)) {
        $Message = "Emailid Empty";
        $Display = array('Message' => $Message);

        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }

    $Contactno = $form_data['Contactno'];
    if (empty($Contactno)) {
        $Message = "Contactno";
        $Display = array('Message' => $Message);

        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }

    $Employeeid = $form_data['Employeeid'];
    $Authorisedtype = $form_data['EmployeeType'];
    $Department = $form_data['Department'];
    $Designation = $form_data['Designation'];
    $username = $form_data['username'];
    // $Autogerenreateid =0;
    $CategoryAutoGeneratno = 0;

    $GetChapter2 = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid' ";
    $result_Chapter = $conn->query($GetChapter2);
    if (mysqli_num_rows($result_Chapter) > 0) {

        while ($row = mysqli_fetch_array($result_Chapter)) {

            $Fullname = $row['Fullname'];

            $Emailid = $row['Emaild'];
            $Employeeid = $row['Employeeid'];

        }
    }

    if ($Authorisedtype == 'ADMIN') {
        $name = $username;
        $Authorizedno = '1';
    }
    else if ($Authorisedtype == 'General Manager') {
        $name = $Fullname;
        $Authorizedno = '2';
    }
    else if ($Authorisedtype == 'Dept Head') {
        $name = $Fullname;
        $Authorizedno = '3';
    }
    else if ($Authorisedtype == 'HR Manager') {
        $name = $Fullname;
        $Authorizedno = '4';
    }
    else if ($Authorisedtype == 'HR Assistant') {
        $name = $Fullname;
        $Authorizedno = '5';
    }
    else {
        $name = $Fullname;
        $Authorizedno = '10';
    }

    if (mysqli_connect_errno()) {
        $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;

    }

    $resultExists = "SELECT * FROM indsys1000useradmin WHERE Clientid ='$Clientid' AND Department='$Department' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);

    if (mysqli_fetch_row($resultExists01)) {

        $Message = "Exists";

    }

    else {

        $sqlsave = "INSERT IGNORE INTO indsys1000useradmin (Clientid,Userid,Username,Emailid,Contactno,Authorizedtype,Userpassword,Memberactive,Userinfo,UserType,Department,Designation,Authorizedno) 
      VALUES ('$Clientid','$Employeeid','$name','$Emailid','$Contactno','$Authorisedtype','$Userpassword','Active','','','$Department','$Designation','$Authorizedno')";
        $resultsave = mysqli_query($conn, $sqlsave);

        $Message = "Data Saved";

    }

    $GetNextnoemp = "SELECT * FROM indsys1008mastermodule WHERE Clientid ='$Clientid' AND ModuleID ='AUTHORISED ID' ";

    $result_Nextnosss = $conn->query($GetNextnoemp);
    if (mysqli_num_rows($result_Nextnosss) > 0) {
        while ($row = mysqli_fetch_array($result_Nextnosss)) {
            $data = $row['Nextno'];
            $data01new = $data + 1;
        }
    }

    $EmpAutoGenerate = $data01new;

    $UpdateNextno2 = "Update indsys1008mastermodule set Nextno = '$EmpAutoGenerate' where Clientid ='$Clientid' and ModuleID ='AUTHORISED ID'";
    $resultUpdate = mysqli_query($conn, $UpdateNextno2);

    $Display = array('Message' => $Message);

    $str = json_encode($Display);
    echo trim($str, '"');

}

/////////////////////////////////////////////
if ($MethodGet == 'FETCH') {
    $GetState = "SELECT * FROM indsys1000useradmin WHERE Clientid ='$Clientid' AND Memberactive ='Active'   ORDER BY Userid";
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

/////////////////////////////////////////////


if ($MethodGet == 'FetchEmployee') {

    try {

        $Userid = $form_data['Userid'];

        $GetChapter = "SELECT * FROM indsys1000useradmin WHERE Clientid ='$Clientid' AND Userid ='$Userid' ";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {

            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Userid = $row['Userid'];
                $Username = $row['Username'];
                $Emailid = $row['Emailid'];

                $Authorizedtype = $row['Authorizedtype'];
                $Userpassword = $row['Userpassword'];
                $Contactno = $row['Contactno'];
                $Memberactive = $row['Memberactive'];
                $Department = $row['Department'];
                $Designation = $row['Designation'];

            }
        }

        $Display = array('Userid' => $Userid, 'Username' => $Username, 'Emailid' => $Emailid, 'Contactno' => $Contactno, 'Authorizedtype' => $Authorizedtype, 'Userpassword' => $Userpassword,

        'Memberactive' => $Memberactive, 'Department' => $Department, 'Designation' => $Designation
          );

        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {

    }
}

/////////////////////////////////////////////


if ($MethodGet == 'UpdateEmp') {

    $Userpassword = $form_data['Userpassword'];
    if (empty($Userpassword)) {
        $Message = "Empty";
        $Display = array('Message' => $Message);

        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }

    $Contactno = $form_data['Contactno'];
    if (empty($Contactno)) {
        $Message = "Contactno";
        $Display = array('Message' => $Message);

        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }

    try {

        $Userid = $form_data['Userid'];
        $Username = $form_data['Username'];
        $Emailid = $form_data['Emailid'];
        $Authorizedtype = $form_data['EmployeeType'];
        $Userpassword = $form_data['Userpassword'];
        $Contactno = $form_data['Contactno'];
        $Memberactive = $form_data['Memberactive'];
        $Department = $form_data['Department'];
        $Designation = $form_data['Designation'];

        if (mysqli_connect_errno()) {
            $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
        $resultExists = "Update indsys1000useradmin set 
  
  Username ='$Username',
  Emailid='$Emailid',
  Contactno ='$Contactno',
  Authorizedtype ='$Authorizedtype',
  Userpassword='$Userpassword',
  Memberactive ='$Memberactive',
  Department='$Department',
  Designation='$Designation',
  Userinfo='$Userinfo',
  UserType='$UserType'

    
  where Clientid ='$Clientid' and Userid = '$Userid' ";
        $resultExists01 = $conn->query($resultExists);
        $Message = "Updated";

        AuthUpdate($conn, $Userid, $Authorizedtype, $Clientid);

        $Display = array('Message' => $Message);

        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {

    }

}

//////////////////////////////////////////////
function AuthUpdate($conn, $Userid, $Authorizedtype, $Clientid) {

    if ($Authorizedtype == 'ADMIN') {
        $Authorizedno = '1';
    }
    else if ($Authorizedtype == 'General Manager') {
        $Authorizedno = '2';

    }
    else if ($Authorizedtype == 'Dept Head') {
        $Authorizedno = '3';
    }
    else if ($Authorizedtype == 'HR Manager') {
        $Authorizedno = '4';
    }
    else if ($Authorizedtype == 'HR Assistant') {
        $Authorizedno = '5';
    }
    else {
        $Authorizedno = '10';
    }

    if (mysqli_connect_errno()) {
        $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    $resultExists = "Update indsys1000useradmin set 
     Authorizedno ='$Authorizedno'
  
     WHERE Userid = '$Userid' and Clientid = '$Clientid'";
    $resultExists01 = $conn->query($resultExists);

}
////////////////////////////////////////////
if ($MethodGet == 'Mailcheck') {

    try {

        $Emailid = $form_data["Emailid"];

        $Message = "No";

        if (mysqli_connect_errno()) {
            $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
        $resultExists = "SELECT * FROM indsys1000useradmin WHERE Clientid ='$Clientid' AND Emailid = '$Emailid' LIMIT 1";
        $resultExists01 = $conn->query($resultExists);

        if (mysqli_fetch_row($resultExists01)) {

            $Message = "MailYes";

        }

        else {

        }

        $Display = array('Message' => $Message);

        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {

    }

}

////////////////////////////////////


if ($MethodGet == 'Contactcheck') {

    try {

        $Contactno = $form_data["Contactno"];

        $Message = "No";

        if (mysqli_connect_errno()) {
            $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
        $resultExists = "SELECT * FROM indsys1000useradmin WHERE Clientid ='$Clientid' AND Contactno = '$Contactno' LIMIT 1";
        $resultExists01 = $conn->query($resultExists);

        if (mysqli_fetch_row($resultExists01)) {

            $Message = "ContactYes";

        }

        else {

        }

        $Display = array('Message' => $Message);

        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {

    }

}

///////////////////////////////////////
if ($MethodGet == 'ModuleAuthNext') {

    $EmployeeType = $form_data['EmployeeType'];

    $Un1 = "";
    $un2 = "";
    if ($EmployeeType == "ADMIN") {
        $Un1 = "ADM";

    }
    // if($EmployeeType =="General Manager")
    // {
    //   $Un1 = "GM";
    // }
    // if($EmployeeType =="Dept Head")
    // {
    //   $Un1 = "DH";
    // }
    // if($EmployeeType =="HR Manager")
    // {
    //   $Un1 = "HRM";
    // }
    // if($EmployeeType =="HR Assistant")
    // {
    //   $Un1 = "HRA";
    // }
    // if($EmployeeType =="Cash Voucher")
    // {
    //   $Un1 = "CAS";
    // }
    

    $Un2 = substr($EmpDepartment, 0, 3);

    $GetNextno = "SELECT * FROM indsys1008mastermodule WHERE Clientid ='$Clientid' AND ModuleID ='AUTHORISED ID'  ";

    $result_Nextno = $conn->query($GetNextno);
    if (mysqli_num_rows($result_Nextno) > 0) {
        while ($row = mysqli_fetch_array($result_Nextno)) {
            $data = $row['Nextno'];
            $data01 = $data + 1;
        }
    }

    $Textno = $data01;
    //echo "$Textno test";
    $EmpIDaddzero = sprintf('%06d', $data01);
    $EmpID = "$Un1$Un2$EmpIDaddzero";

    $GetNextnoemp = "SELECT * FROM indsys1008mastermodule WHERE Clientid ='$Clientid' AND ModuleID ='AUTHORISED ID' ";

    $result_Nextnosss = $conn->query($GetNextnoemp);
    if (mysqli_num_rows($result_Nextnosss) > 0) {
        while ($row = mysqli_fetch_array($result_Nextnosss)) {
            $data = $row['Nextno'];
            $data01new = $data + 1;
        }
    }

    $EmpAutoGenerate = $data01new;

    if ($EmployeeType == "ADMIN") {
        $EmpID = "$Un1$Un2$EmpIDaddzero";
    }
    else {
        $EmpID = "";
    }

    $Display = array('CategoryAutoGeneratno' => $Textno, 'Userid' => $EmpID, 'EmpAutoGenerate' => $EmpAutoGenerate);

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
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

?>
