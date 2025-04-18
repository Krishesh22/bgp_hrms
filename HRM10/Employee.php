<?php
error_reporting(0);
include '../config.php';
require_once ('class.phpmailer.php');
include ("class.smtp.php");
//$domain = "http://192.168.1.49:8080/Krish/IndsysHRM";
session_start();
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
// $MethodGet = 'EMPAPPRAISAL';
// $Employeeid ='1001';
function Test($conn, $Category, $Department, $Clientid) {
    try {
        $EmpDepartment = $Department;
        $Un1 = "";
        $un2 = "";
        if ($Category == "Category 1") {
            $Un1 = "CAT01";
        }
        if ($Category == "Category 2") {
            $Un1 = "CAT02";
        }
        if ($Category == "Category 3") {
            $Un1 = "CAT03";
        }
        $Un2 = substr($EmpDepartment, 0, 3);
        $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='$Category' AND Clientid ='$Clientid'  ";
        $result_Nextno = $conn->query($GetNextno);
        if (mysqli_num_rows($result_Nextno) > 0) {
            while ($row = mysqli_fetch_array($result_Nextno)) {
                $data = $row['Nextno'];
                $data01 = $data + 1;
            }
        }
        $Textno = $data01;
        $EmpIDaddzero = sprintf('%06d', $data01);
        $EmpID = "B$Un1$Un2$EmpIDaddzero";
        $GetNextnoemp = "SELECT * FROM indsys1008mastermodule where ModuleID ='EMP' AND Clientid ='$Clientid' ";
        $result_Nextnosss = $conn->query($GetNextnoemp);
        if (mysqli_num_rows($result_Nextnosss) > 0) {
            while ($row = mysqli_fetch_array($result_Nextnosss)) {
                $data = $row['Nextno'];
                $data01new = $data + 1;
            }
        }
        $_SESSION['Nextno'] = $EmpID;
        $_SESSION['CategoryAutogenerationNo'] = $Textno;
        $_SESSION['AutogenerateNo'] = $data01new;
    }
    catch(Exception $e) {
    }
}
if ($MethodGet == 'Dept') {
    $GetState = "SELECT * FROM indsys1003departmentmaster Where  Clientid ='$Clientid'  ORDER BY Department";
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
if ($MethodGet == 'DOCTYPE') {
    $GetState = "SELECT * FROM indsys1006documenttype where  Clientid ='$Clientid'  ORDER BY Documenttype";
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
if ($MethodGet == 'SHIFT') {
    $GetState = "SELECT * FROM indsys1009shiftmaster where  Clientid ='$Clientid'  ORDER BY Shift";
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
///////////////////////////////////////////
if ($MethodGet == 'Religion') {
    $GetState = "SELECT * FROM indsys1002religionmaster where  Clientid ='$Clientid'   ORDER BY Religion";
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
if ($MethodGet == 'Dest') {
    $GetState = "SELECT * FROM indsys1004designationmaster where  Clientid ='$Clientid'  ORDER BY Designation";
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
if ($MethodGet == 'Lang') {
    $GetState = "SELECT * FROM indsys1015languagesmaster where  Clientid ='$Clientid'  ORDER BY Languages";
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
///////////////////////////////////////////////
if ($MethodGet == 'Country') {
    $GetState = "SELECT * FROM indsys1010countrymaster where  Clientid ='$Clientid'   ORDER BY Country";
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
///////////////////////////////////////
if ($MethodGet == 'Qualifi') {
    $GetState = "SELECT * FROM indsys1014qualificationmaster where  Clientid ='$Clientid'  ORDER BY Degree";
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
if ($MethodGet == 'ModuleNext') {
    $Category = $form_data['Category'];
    $EmpDepartment = $form_data['EmpDepartment'];
    $Un1 = "";
    $un2 = "";
    if ($Category == "Category 1") {
        $Un1 = "CAT01";
    }
    if ($Category == "Category 2") {
        $Un1 = "CAT02";
    }
    if ($Category == "Category 3") {
        $Un1 = "CAT03";
    }
    $Un2 = substr($EmpDepartment, 0, 3);
    $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='$Category' AND Clientid ='$Clientid'  ";
    $result_Nextno = $conn->query($GetNextno);
    if (mysqli_num_rows($result_Nextno) > 0) {
        while ($row = mysqli_fetch_array($result_Nextno)) {
            $data = $row['Nextno'];
            $data01 = $data + 1;
        }
    }
    $Textno = $data01;
    $EmpIDaddzero = sprintf('%06d', $data01);
    $EmpID = "B$Un1$Un2$EmpIDaddzero";
    $GetNextnoemp = "SELECT * FROM indsys1008mastermodule where ModuleID ='EMP' AND Clientid ='$Clientid' ";
    $result_Nextnosss = $conn->query($GetNextnoemp);
    if (mysqli_num_rows($result_Nextnosss) > 0) {
        while ($row = mysqli_fetch_array($result_Nextnosss)) {
            $data = $row['Nextno'];
            $data01new = $data + 1;
        }
    }
    $EmpAutoGenerate = $data01new;
    $Display = array('CategoryAutoGeneratno' => $Textno, 'Employeeidvarchar' => $EmpID, 'EmpAutoGenerate' => $EmpAutoGenerate);
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
}
////////////////////////////////////////
if ($MethodGet == 'APPPENDING') {
    $GetState = "SELECT * FROM indsys1017employeemaster where EmpActive ='Active'  AND LastAppresialDate<=CURDATE() - INTERVAL 90 DAY  AND Clientid ='$Clientid' ORDER BY Employeeid";
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
////////////////////////////////////
if ($MethodGet == 'BACKPENDING') {
    $GetState = "SELECT * FROM indsys1017employeemaster where EmpActive ='Active'  AND Gross_Salary >30000 AND  (BackgroundVerification='No' OR BackgroundVerification is null)  AND Clientid ='$Clientid' ORDER BY Employeeid";
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
///////////////////////////////////
if ($MethodGet == 'ALL') {
    $GetState = "SELECT * FROM indsys1017employeemaster where EmpActive ='Active' AND Clientid ='$Clientid'  ORDER BY EmpAutogenerationno";
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
////////////////////////////////////////////////////////////////////////
if ($MethodGet == 'Save') {
    try {
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
        $fullname = " $Firstname  $Lastname ";
        $EmployeeType = $form_data['EmployeeType'];
        $Department = $form_data['Department'];
        $Highestqualification = $form_data['Highestqualification'];
        $Designation = $form_data['Designation'];
        $FatherGuardianSpouseName = $form_data['FatherGuardianSpouseName'];
        $Autogerenreateid = 0;
        $CategoryAutogenerationno = 0;
        if (empty($Emailid)) {
            $Message = "Emailid";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        if (empty($Category)) {
            $Message = "Category";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        if (empty($Firstname)) {
            $Message = "FNAME";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        /*------------------*/
        if (empty($Contactno)) {
            $Message = "Contact";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        if (empty($Department)) {
            $Message = "Department";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        /*
         $testfn =              */
        Test($conn, $Category, $Department, $Clientid);
        $AllowOt = "No";
        if ($Category == "Category 3") {
            $AllowOt = "Yes";
        }
        $Employeeid = $_SESSION['Nextno'];
        $Autogerenreateid = $_SESSION['AutogenerateNo'];
        $CategoryAutogenerationno = $_SESSION['CategoryAutogenerationNo'];
        if (mysqli_connect_errno()) {
            $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
        $resultExists = "SELECT * FROM indsys1017employeemaster WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' LIMIT 1";
        $resultExists01 = $conn->query($resultExists);
        if (mysqli_fetch_row($resultExists01)) {
            $Message = "Exists";
        } else {
            if ($Gender == "Male") {
                $image = "MenAvatar.jpg";
            } else {
                $image = "WomenAvatar.jpg";
            }
            $Folderid ="bgp-$Clientid";
            $directory3 = "../$Clientid/";
            $directory2 = "../$Clientid/EMPimage/";
            $directory = "../$Clientid/EMPimage/$Employeeid/";
            if (!is_dir($directory3)) {
                mkdir($directory3, 0777);
            }
            if (!is_dir($directory2)) {
                mkdir($directory2, 0777);
            }
            if (!is_dir($directory)) {
                mkdir($directory, 0777);
            }
            $chk = "";
            $files = null;
            if (!is_dir($directory)) {
            } else {
                foreach (new DirectoryIterator($directory) as $fileInfo) {
                    if (!$fileInfo->isDot()) {
                        unlink($fileInfo->getPathname());
                    }
                }
            }
            $uniquesavename = time() . uniqid(rand());
            $Logofilepath = $directory . $uniquesavename . '.jpg';
            $imageget = file_get_contents($image);
            file_put_contents($Logofilepath, $imageget);
            $sqlsave = "INSERT IGNORE INTO indsys1017employeemaster (Clientid,Employeeid,Title,Firstname,Fullname,Lastname,Mother_tong,Gender,Contactno,Userid,Addormodifydatetime,Type_Of_Posistion,Emaild,Nationality,Marital_status,EmpActive,Empusername,Emppassword,Allow_LOP,Basic,HR_Allowance,Other_Allowance,TA,Performance_allowance,Day_allowance,PF_Yesandno,PF,ESI_Yesandno,ESI,TDS,Professional_tax,Net_Salary,Gross_Salary,Empimage,EmployeeType,Designation,Department,Highestqualification,FatherGuardianSpouseName,SalaryType,BackgroundVerification,Allow_OT,Smsverified,Emailverified,EmpAutogenerationno,CatAutogenerationno)
    values('$Clientid','$Employeeid','$Title','$Firstname','$fullname','$Lastname','$Mothertongue','$Gender','$Contactno','$user_id','$date','$Category','$Emailid','$Nationality','$Married','Active','$Employeeid','$Employeeid','No',0,0,0,0,0,0,'No',0,'No',0,0,0,0,0,'$Logofilepath','$EmployeeType','$Designation','$Department','$Highestqualification','$FatherGuardianSpouseName','Normal','No','$AllowOt','No','No','$Autogerenreateid','$CategoryAutogenerationno')";
            // $Department = $form_data['Department'];
            // $Highestqualification =$form_data['Highestqualification'];
            // $Designation =$form_data['Designation'];
            $resultsave = mysqli_query($conn, $sqlsave);
            if ($resultsave === TRUE) {
                $UpdateNextno = "Update indsys1008mastermodule set Nextno = '$CategoryAutogenerationno' where ModuleID ='$Category' AND Clientid ='$Clientid'";
                $resultUpdate = mysqli_query($conn, $UpdateNextno);
                $UpdateNextno2 = "Update indsys1008mastermodule set Nextno = '$Autogerenreateid' where ModuleID ='EMP' AND Clientid ='$Clientid'";
                $resultUpdate = mysqli_query($conn, $UpdateNextno2);
                $Message = "Data Saved";
            } else {
                $Message = "Error";
            }
            $_SESSION["Employeeid"] = $Employeeid;
        }
        $Nextno["Nextno"] = $Employeeid;
        $Display = array('Nextno' => $Nextno["Nextno"], 'Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////////////////////////////
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
                $Fresher = $row['Fresher'];
                $Expereience = $row['Expereienced'];
                $PF_Yesandno = $row['PF_Yesandno'];
                $PF_Fixed = $row['PF_Fixed'];
                $OfficemailID = $row['OfficemailID'];
                $Smsverified = $row['Smsverified'];
                $Emailverified = $row['Emailverified'];
                $Old_Empid = $Employeeid;
                if ($Clientid == 4) {
                    $Old_Empid = $row['Old_Empid'];
                }
            }
        }
        // $Dob = date("d-m-Y", strtotime( $Dob));
        // $Date_Of_Joing = date("d-m-Y", strtotime( $Date_Of_Joing));
        // $PFJoiningdate = date("d-m-Y", strtotime( $PFJoiningdate));
        // $ESIJoiningdate = date("d-m-Y", strtotime( $ESIJoiningdate));
        $Display = array('Title' => $Title, 'Firstname' => $Firstname, 'Lastname' => $Lastname, 'Gender' => $Gender, 'Married' => $Married, 'Mothertongue' => $Mothertongue, 'Contactno' => $Contactno, 'Category' => $Category, 'Emailid' => $Emailid, 'Dob' => $Dob, 'Age' => $Age, 'Bloodgroup' => $Bloodgroup, 'Religion' => $Religion, 'Imagepath' => $Imagepath, 'Shift' => $Shift, 'AllowOT' => $AllowOT, 'AllowLOP' => $AllowLOP, 'Salary_Mode' => $Salary_Mode, 'Weekoff' => $Weekoff, 'Employee_CL' => $Employee_CL, 'Nationality' => $Nationality, 'Languages' => $Languages, 'UANno' => $UANno, 'ESIno' => $ESIno, 'Aadharno' => $Aadharno, 'Panno' => $Panno, 'PFJoiningdate' => $PFJoiningdate, 'ESIJoiningdate' => $ESIJoiningdate, 'EmpDepartment' => $EmpDepartment, 'Highestqualification' => $Highestqualification, 'EmpDesignation' => $EmpDesignation, 'Date_Of_Joing' => $Date_Of_Joing, 'Date_Of_Joing2' => $Date_Of_Joing2, 'Dob2' => $Dob2, 'FatherGuardianSpouseName' => $FatherGuardianSpouseName, 'LastAppresialDate' => $LastAppresialDate, 'LastAppresialDate2' => $LastAppresialDate2, 'BackgroundVerificationpath' => $BackgroundVerificationpath, 'BackgroundVerification' => $BackgroundVerification, 'Fresher' => $Fresher, 'Expereience' => $Expereience, 'PF_Yesandno' => $PF_Yesandno, 'PF_Fixed' => $PF_Fixed, 'OfficemailID' => $OfficemailID, 'Smsverified' => $Smsverified, 'Emailverified' => $Emailverified, 'Old_Empid' => $Old_Empid);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////////////////////
if ($MethodGet == 'FetchSalary') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $_SESSION["Employeeid"] = $Employeeid;
        $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
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
                $LWF = $row['LWF'];
                $ESIOverlimit = $row['ESIOverlimit'];
                $DayallowanceincludedESI = $row['DayallowanceincludedESI'];
            }
        }
        $Authorizedno = $_SESSION["Authorizedno"];
        $Display = array('Basic' => $Basic, 'HR_Allowance' => $HR_Allowance, 'TA' => $TA, 'Performance_allowance' => $Performance_allowance, 'Day_allowance' => $Day_allowance, 'PF' => $PF, 'ESI' => $ESI, 'TDS' => $TDS, 'Professional_tax' => $Professional_tax, 'Net_Salary' => $Net_Salary, 'Gross_Salary' => $Gross_Salary, 'Other_Allowance' => $Other_Allowance, 'PF_Yesandno' => $PF_Yesandno, 'ESI_Yesandno' => $ESI_Yesandno, 'LWF' => $LWF, 'ESIOverlimit' => $ESIOverlimit, 'Authorizedno' => $Authorizedno,'DayallowanceincludedESI' =>$DayallowanceincludedESI);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////////////
if ($MethodGet == 'FetchAddress') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $_SESSION["Employeeid"] = $Employeeid;
        $CurrentAddress = "";
        $CurrentCountry = "";
        $CurrentState = "";
        $CurrentCity = "";
        $CurrentPincode = "";
        $PermanentAddress = "";
        $PermanentCountry = "";
        $PermanentState = "";
        $PermanentCity = "";
        $Permanantpincode = "";
        $GetChapter = "SELECT * FROM indsys1018employeeaddressinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $CurrentAddress = $row['Currentaddress'];
                $CurrentCountry = $row['Currentcountry'];
                $CurrentState = $row['Currentstate'];
                $CurrentCity = $row['Currentcity'];
                $CurrentPincode = $row['Current_pincode'];
                $PermanentAddress = $row['Permanantaddress'];
                $PermanentCountry = $row['Permanantcountry'];
                $PermanentState = $row['Peremenantstate'];
                $PermanentCity = $row['Permanantcity'];
                $Permanantpincode = $row['Permanantpincode'];
            }
        }
        $Display = array('CurrentAddress' => $CurrentAddress, 'CurrentCountry' => $CurrentCountry, 'CurrentState' => $CurrentState, 'CurrentCity' => $CurrentCity, 'CurrentPincode' => $CurrentPincode, 'PermanentAddress' => $PermanentAddress, 'PermanentCountry' => $PermanentCountry, 'PermanentState' => $PermanentState, 'PermanentCity' => $PermanentCity, 'Permanantpincode' => $Permanantpincode,);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
//////////////////////////////////
if ($MethodGet == 'FetchReference') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $_SESSION["Employeeid"] = $Employeeid;
        $GetChapter = "SELECT * FROM indsys1021employeereferenceinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Reference1name = $row['Reference1'];
                $Reference1contactno = $row['Ref1Contactno'];
                $Reference1address = $row['Ref1address'];
                $Reference2name = $row['Reference2'];
                $Reference2contactno = $row['Ref2Contactno'];
                $Reference2address = $row['Ref2address'];
                $Ref2relationship = $row['Ref2relationship'];
                $Ref1relationship = $row['Ref1relationship'];
            }
        }
        $Display = array('Reference1name' => $Reference1name, 'Reference1contactno' => $Reference1contactno, 'Reference1address' => $Reference1address, 'Reference2name' => $Reference2name, 'Reference2contactno' => $Reference2contactno, 'Reference2address' => $Reference2address, 'Ref2relationship' => $Ref2relationship, 'Ref1relationship' => $Ref1relationship);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
///////////////////////////////////////////////
if ($MethodGet == 'FetchStudy') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $Sno = $form_data['Sno'];
        $GetChapter = "SELECT * FROM indsys1020employeeeducationinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$Sno' ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Employeestudied = $row['Studies'];
                $UniversityorSchool = $row['Universityorschool'];
                $GradeorPercentage = $row['Grade'];
                $Passoutyear = $row['Passoutyear'];
                $EmpDocumentView = $row['Educationdocument'];
            }
        }
        $Display = array('Employeestudied' => $Employeestudied, 'UniversityorSchool' => $UniversityorSchool, 'GradeorPercentage' => $GradeorPercentage, 'Passoutyear' => $Passoutyear, 'EmpDocumentView' => $EmpDocumentView,);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
/////////////////////////////////////////////
if ($MethodGet == 'FetchFamily') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $Sno = $form_data['Sno'];
        $GetChapter = "SELECT * FROM indsys1019employeefamilyinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$Sno' ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $FamilyName = $row['Name'];
                $Familyrelationship = $row['Relationship'];
                $FamilyAge = $row['Age'];
                $FamilyContactno = $row['Contactno'];
                $FamilyOccupation = $row['Occupation'];
            }
        }
        $Display = array('FamilyName' => $FamilyName, 'Familyrelationship' => $Familyrelationship, 'FamilyAge' => $FamilyAge, 'FamilyContactno' => $FamilyContactno, 'FamilyOccupation' => $FamilyOccupation,);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////////////////
if ($MethodGet == 'FetchBank') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $_SESSION["Employeeid"] = $Employeeid;
        $GetChapter = "SELECT * FROM indsys1016employeeaccountinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Bankname = $row['Bankname'];
                $Accountno = $row['Accountno'];
                $IFSCcode = $row['IFSCcode'];
                $Branch = $row['Branch'];
                $Emppassbook = $row['Bankpassbookdoc'];
                // $Emppassbook = $Emppassbook +"&output=embed";
                $Empnameaspassbook = $row['Empnameaspassbook'];
            }
        }
        $Display = array('Bankname' => $Bankname, 'Accountno' => $Accountno, 'IFSCcode' => $IFSCcode, 'Branch' => $Branch, 'Emppassbook' => $Emppassbook, 'Empnameaspassbook' => $Empnameaspassbook);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
///////////////////
//////////////////////////////////////////
if ($MethodGet == 'EMPEDUCATION') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $data01 = [];
        $GetState = "SELECT * FROM indsys1020employeeeducationinformation where Employeeid = '$Employeeid' AND Clientid ='$Clientid' ORDER BY Employeeid";
        $result_Region = $conn->query($GetState);
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $data01[] = $row;
            }
        }
        header('Content-Type: application/json');
        echo json_encode($data01);
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////////////////////////////
if ($MethodGet == 'EMPFAMILY') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $data01 = [];
        $GetState = "SELECT * FROM indsys1019employeefamilyinformation where Employeeid='$Employeeid' AND Clientid ='$Clientid'   ORDER BY Employeeid";
        $result_Region = $conn->query($GetState);
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $data01[] = $row;
            }
        }
        $mytbl["Test"] = $data01;
        $Display = array('data01' => $mytbl["Test"]);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////////
if ($MethodGet == 'EMPAPPRAISAL') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $data01 = [];
        $GetState = "SELECT * FROM indsys1023employeeappreseialinformation where Employeeid='$Employeeid' AND Clientid ='$Clientid' ORDER BY Employeeid";
        $result_Region = $conn->query($GetState);
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $data01[] = $row;
            }
        }
        $mytbl["Test"] = $data01;
        $Display = array('data01' => $mytbl["Test"]);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
//////////////////////////////////////
if ($MethodGet == 'EMPPromotion') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $data01 = [];
        $GetState = "SELECT * FROM indsys1022employeepromotioninformation where Employeeid='$Employeeid' AND Clientid ='$Clientid'  ORDER BY Employeeid";
        $result_Region = $conn->query($GetState);
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $data01[] = $row;
            }
        }
        $mytbl["Test"] = $data01;
        $Display = array('data01' => $mytbl["Test"]);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
/////////////////////////////////////////////////
if ($MethodGet == 'EMPDOC') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $data01 = [];
        $GetState = "SELECT * FROM indsys1023employeedocinformation where Employeeid='$Employeeid'  AND Clientid ='$Clientid'  ORDER BY Employeeid";
        $result_Region = $conn->query($GetState);
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $data01[] = $row;
            }
        }
        $mytbl["Test"] = $data01;
        $Display = array('data01' => $mytbl["Test"]);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
//////////////////////////////////////////////////////////////////
if ($MethodGet == 'EMPDOCNEXT') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwemployeedocno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new)) {
            $GetChapter = "SELECT * FROM vwemployeedocno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
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
    }
    catch(Exception $e) {
    }
}
//////////////////////////////////////////////////
if ($MethodGet == 'EMPFAMILYNEXT') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwemployeefamilynextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new)) {
            $GetChapter = "SELECT * FROM vwemployeefamilynextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
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
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////////////////////////////
if ($MethodGet == 'EMPPROMOTIONNEXT') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwemployeepromotionnextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new)) {
            $GetChapter = "SELECT * FROM vwemployeepromotionnextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
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
    }
    catch(Exception $e) {
    }
}
/////////////////////////////////////////////////////
if ($MethodGet == 'EMPEDUNEXT') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwemployeeeducationnnextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new)) {
            $GetChapter = "SELECT * FROM vwemployeeeducationnnextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
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
    }
    catch(Exception $e) {
    }
}
///////////////////////////////////
if ($MethodGet == 'BankEMP') {
    $Employeeid = $form_data['Employeeid'];
    $Accountno = $form_data['Accountno'];
    $Bankname = $form_data['Bankname'];
    $IFSCcode = $form_data['IFSCcode'];
    $Branch = $form_data['Branch'];
    $Empnameaspassbook = $form_data['Empnameaspassbook'];
    if (empty($Bankname)) {
        $Message = "Bankname";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    if (empty($Accountno)) {
        $Message = "Accountno";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    $json = @file_get_contents("https://ifsc.razorpay.com/" . $IFSCcode);
    $arr = json_decode($json);
    $IFSCStatus = "Verified";
    if (isset($arr->BRANCH)) {
        $IFSCStatus = "Verified";
    } else {
        $IFSCStatus = "Not Verified";
    }
    $resultExists = "SELECT Employeeid FROM indsys1016employeeaccountinformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
    //echo $resultExists;
    if (mysqli_fetch_row($resultExists01)) {
        CopyEmpAccountInformation($conn, $Employeeid, $Clientid);
        $resultExistsss = "Update indsys1016employeeaccountinformation set 
Bankname ='$Bankname',
Accountno ='$Accountno',
IFSCcode='$IFSCcode',
Branch='$Branch',
Empnameaspassbook='$Empnameaspassbook',
Addormodifydatetime ='$date',
IFSCStatus='$IFSCStatus',
Userid ='$user_id'
WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid'  ";
        $resultExists0New = $conn->query($resultExistsss);
        if ($resultExists0New === TRUE) {
            $Message = "Update";
        } else {
            echo "$resultExistsss <br/>";
            $Message = "Error";
        }
    } else {
        $sqlsave = "INSERT IGNORE INTO indsys1016employeeaccountinformation (Clientid,Employeeid,
Bankname,Accountno,IFSCcode,Branch,Userid,Addormodifydatetime,Empnameaspassbook,IFSCStatus)
VALUES ('$Clientid','$Employeeid','$Bankname','$Accountno','$IFSCcode',
'$Branch','$user_id','$date','$Empnameaspassbook','$IFSCStatus')";
        $resultsave = mysqli_query($conn, $sqlsave);
        if ($resultsave === TRUE) {
            $Message = "Update";
        } else {
            echo "$resultsave <br/>";
            $Message = "Error";
        }
    }
    $Display = array('Message' => $Message);
    $str = json_encode($Display);
    echo trim($str, '"');
}
//////////////////////////////////////////
if ($MethodGet == 'CSTATE') {
    try {
        $CurrentCountry = $form_data['CurrentCountry'];
        $GetState = "SELECT * FROM indsys1011statemaster where Country='$CurrentCountry' AND Clientid ='$Clientid'  ORDER BY State";
        $result_Region = $conn->query($GetState);
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $data01[] = $row;
            }
        }
        $Display = array('data01' => $data01);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
/////////////////////////////////////////////////////////////////
if ($MethodGet == 'CCITY') {
    try {
        $CurrentCountry = $form_data['CurrentCountry'];
        $CurrentState = $form_data['CurrentState'];
        $GetState = "SELECT * FROM indsys1008citymaster where Country='$CurrentCountry' and State = '$CurrentState' AND Clientid ='$Clientid' ORDER BY City";
        $result_Region = $conn->query($GetState);
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $data01[] = $row;
            }
        }
        $Display = array('data01' => $data01);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
///////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////
if ($MethodGet == 'PERSTATE') {
    try {
        $PermanentCountry = $form_data['PermanentCountry'];
        $GetState = "SELECT * FROM indsys1011statemaster where Country='$PermanentCountry' AND Clientid ='$Clientid'  ORDER BY State";
        $result_Region = $conn->query($GetState);
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $data01[] = $row;
            }
        }
        $Display = array('data01' => $data01);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
///////////////////////////////////////////////////////////////////////
if ($MethodGet == 'PERCITY') {
    try {
        $PermanentCountry = $form_data['PermanentCountry'];
        $PermanentState = $form_data['PermanentState'];
        $GetState = "SELECT * FROM indsys1008citymaster where Country='$PermanentCountry' and State = '$PermanentState' AND Clientid ='$Clientid' ORDER BY City";
        $result_Region = $conn->query($GetState);
        if (mysqli_num_rows($result_Region) > 0) {
            while ($row = mysqli_fetch_array($result_Region)) {
                $data01[] = $row;
            }
        }
        $Display = array('data01' => $data01);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
///////////////////////////////////////////////////////////////
if ($MethodGet == 'ADDRESSEMP') {
    $Employeeid = $form_data['Employeeid'];
    $CurrentAddress = $form_data['CurrentAddress'];
    $CurrentCountry = $form_data['CurrentCountry'];
    $CurrentState = $form_data['CurrentState'];
    $CurrentCity = $form_data['CurrentCity'];
    $CurrentPincode = $form_data['CurrentPincode'];
    $PermanentAddress = $form_data['PermanentAddress'];
    $PermanentCountry = $form_data['PermanentCountry'];
    $PermanentState = $form_data['PermanentState'];
    $PermanentCity = $form_data['PermanentCity'];
    $PermanentPincode = $form_data['PermanentPincode'];
    $resultExists = "SELECT Employeeid FROM indsys1018employeeaddressinformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
    if (mysqli_fetch_row($resultExists01)) {
        CopyEmployeeAddress($conn, $Employeeid, $Clientid);
        $resultExistsss = "Update indsys1018employeeaddressinformation set 
      Currentaddress ='$CurrentAddress',
      Currentcountry ='$CurrentCountry',
      Currentcity='$CurrentCity',
      Currentstate='$CurrentState',
      Current_pincode ='$CurrentPincode',
      Permanantaddress ='$PermanentAddress',
      Permanantcountry ='$PermanentCountry',
      Peremenantstate ='$PermanentState',
      Permanantcity='$PermanentCity',
      Permanantpincode='$PermanentPincode',
      Addormodifydatetime ='$date',
      Userid ='$user_id'
  WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid'  ";
        $resultExists0New = $conn->query($resultExistsss);
        if ($resultExists0New === TRUE) {
            $Message = "Update";
        } else {
            $Message = "Error";
        }
    } else {
        $sqlsave = "INSERT IGNORE INTO indsys1018employeeaddressinformation (Clientid,Employeeid,
  Currentaddress,Currentcountry,Currentcity,Currentstate,Userid,Addormodifydatetime,Current_pincode,Permanantaddress,Permanantcountry,Peremenantstate,Permanantcity,Permanantpincode)
   VALUES ('$Clientid','$Employeeid','$CurrentAddress','$CurrentCountry','$CurrentCity',
   '$CurrentState','$user_id','$date','$CurrentPincode',
   '$PermanentAddress','$PermanentCountry','$PermanentState','$PermanentCity','$PermanentPincode')";
        $resultsave = mysqli_query($conn, $sqlsave);
        if ($resultsave === TRUE) {
            $Message = "Update";
        } else {
            $Message = "Error";
        }
    }
    $Display = array('Message' => $Message);
    $str = json_encode($Display);
    echo trim($str, '"');
}
////////////////////////
if ($MethodGet == 'EDUCATIONEMP') {
    $Employeeid = $form_data['Employeeid'];
    $EduNextno = $form_data['EduNextno'];
    $Employeestudied = $form_data['Employeestudied'];
    $UniversityorSchool = $form_data['UniversityorSchool'];
    $GradeorPercentage = $form_data['GradeorPercentage'];
    $Passoutyear = $form_data['Passoutyear'];
    $EducationMode = $form_data['EducationMode'];
    $Specialization = $form_data['Specialization'];
    if (empty($Employeestudied)) {
        $Message = "Studied";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    $resultExists = "SELECT Employeeid FROM indsys1020employeeeducationinformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' And Sno ='$EduNextno' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
    if (mysqli_fetch_row($resultExists01)) {
        $resultExistsss = "Update indsys1020employeeeducationinformation set 
      Studies ='$Employeestudied',
      Universityorschool ='$UniversityorSchool',
      Grade='$GradeorPercentage',
      Passoutyear='$Passoutyear',
      Addormodifydatetime ='$date',
      EducationMode='$EducationMode',
      Specialization='$Specialization',
      Userid ='$user_id'
     
  WHERE Employeeid = '$Employeeid' AND Sno ='$EduNextno'

  AND Clientid ='$Clientid'  ";
        $resultExists0New = $conn->query($resultExistsss);
        if ($resultExists0New === TRUE) {
            $Message = "Update";
        } else {
            $Message = "Error";
        }
    } else {
        $sqlsave = "INSERT IGNORE INTO indsys1020employeeeducationinformation (Clientid,Employeeid,
Studies,Universityorschool,Grade,Passoutyear,Userid,Addormodifydatetime,Sno,EducationMode,Specialization)
VALUES ('$Clientid','$Employeeid','$Employeestudied','$UniversityorSchool','$GradeorPercentage',
'$Passoutyear','$user_id','$date','$EduNextno','$EducationMode','$Specialization')";
        $resultsave = mysqli_query($conn, $sqlsave);
        if ($resultsave === TRUE) {
            $Message = "Update";
        } else {
            $Message = "Error";
        }
    }
    $Display = array('Message' => $Message);
    $str = json_encode($Display);
    echo trim($str, '"');
}
//////////////////////////////////////////////////////////////////
if ($MethodGet == 'FAMILYUPDATEEMP') {
    $Employeeid = $form_data['Employeeid'];
    $FamilyNextno = $form_data['FamilyNextno'];
    $FamilyName = $form_data['FamilyName'];
    $Familyrelationship = $form_data['Familyrelationship'];
    $FamilyAge = $form_data['FamilyAge'];
    $FamilyContactno = $form_data['FamilyContactno'];
    $FamilyOccupation = $form_data['FamilyOccupation'];
    if (empty($FamilyName)) {
        $Message = "Familyname";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    if (empty($Familyrelationship)) {
        $Message = "Familyrelationship";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    $resultExists = "SELECT Employeeid FROM indsys1019employeefamilyinformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' And Sno ='$FamilyNextno' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
    if (mysqli_fetch_row($resultExists01)) {
        $resultExistsss = "Update indsys1019employeefamilyinformation set 
      Name ='$FamilyName',
      Relationship ='$Familyrelationship',
      Age='$FamilyAge',
      Contactno='$FamilyContactno',
      Occupation ='$FamilyOccupation',
      Addormodifydatetime ='$date',
      Userid ='$user_id'
     
     
  WHERE Employeeid = '$Employeeid' AND Sno ='$FamilyNextno'

  AND Clientid ='$Clientid'  ";
        $resultExists0New = $conn->query($resultExistsss);
        if ($resultExists0New === TRUE) {
            $Message = "Update";
        } else {
            $Message = "Error";
        }
    } else {
        $sqlsave = "INSERT IGNORE INTO indsys1019employeefamilyinformation (Clientid,Employeeid,
  Name,Relationship,Age,Contactno,Userid,Addormodifydatetime,Sno,Occupation)
   VALUES ('" . $Clientid . "','" . $Employeeid . "','" . $FamilyName . "','" . $Familyrelationship . "','" . $FamilyAge . "',
   '" . $FamilyContactno . "','" . $user_id . "','" . $date . "','" . $FamilyNextno . "','" . $FamilyOccupation . "')";
        $resultsave = mysqli_query($conn, $sqlsave);
        if ($resultsave === TRUE) {
            $Message = "Update";
        } else {
            $Message = "Error";
        }
    }
    $Display = array('Message' => $Message);
    $str = json_encode($Display);
    echo trim($str, '"');
}
///////////////////////////////////////////////////////
if ($MethodGet == 'REFEMPUPDATE') {
    $Employeeid = $form_data['Employeeid'];
    $Reference1name = $form_data['Reference1name'];
    $Reference1contactno = $form_data['Reference1contactno'];
    $Reference1address = $form_data['Reference1address'];
    $Reference2name = $form_data['Reference2name'];
    $Reference2contactno = $form_data['Reference2contactno'];
    $Reference2address = $form_data['Reference2address'];
    $Ref1relationship = $form_data['Ref1relationship'];
    $Ref2relationship = $form_data['Ref2relationship'];
    $Message = "";
    $resultExists = "SELECT Employeeid FROM indsys1021employeereferenceinformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
    if (mysqli_fetch_row($resultExists01)) {
        CopyEmployeeRefrence($conn, $Employeeid, $Clientid);
        $resultExistsss = "Update indsys1021employeereferenceinformation set 
  Reference1 ='$Reference1name',
  Ref1Contactno ='$Reference1contactno',
  Reference2='$Reference2name',
  Ref2Contactno='$Reference2contactno',
  Ref1address ='$Reference1address',
  Ref2address='$Reference2address',
  Addormodifydatetime ='$date',
  Ref1relationship='$Ref1relationship',
  Ref2relationship='$Ref2relationship',
  Userid ='$user_id' 
 
  WHERE Employeeid = '$Employeeid'   AND Clientid ='$Clientid'  ";
        $resultExists0New = $conn->query($resultExistsss);
        if ($resultExists0New === TRUE) {
            $Message = "Update";
        } else {
            $Message = "Error";
        }
    } else {
        $sqlsave = "INSERT IGNORE INTO indsys1021employeereferenceinformation (Clientid,Employeeid,
Reference1,Ref1Contactno,Reference2,Ref2Contactno,Userid,Addormodifydatetime,Ref1address,Ref2address,Ref1relationship,Ref2relationship)
VALUES ('$Clientid','$Employeeid','$Reference1name','$Reference1contactno','$Reference2name',
'$Reference2contactno','$user_id','$date','$Reference1address','$Reference2address','$Ref1relationship','$Ref2relationship')";
        $resultsave = mysqli_query($conn, $sqlsave);
        if ($resultsave === TRUE) {
            $Message = "Update";
        } else {
            $Message = "Error";
        }
    }
    $Display = array('Message' => $Message);
    $str = json_encode($Display);
    echo trim($str, '"');
}
//////////////////////////////////////////////////////////
if ($MethodGet == 'UpdateSalary') {
    try {
        $Authorizedno = $_SESSION["Authorizedno"];
        $Employeeid = $form_data['Employeeid'];
        $Basic = $form_data['Basic'];
        $HR_Allowance = $form_data['HR_Allowance'];
        $TA = $form_data['TA'];
        $Performance_allowance = $form_data['Performance_allowance'];
        $Day_allowance = $form_data['Day_allowance'];
        $PF = $form_data['PF'];
        $ESI = $form_data['ESI'];
        $TDS = $form_data['TDS'];
        $Professional_tax = $form_data['Professional_tax'];
        $Net_Salary = $form_data['Net_Salary'];
        $Gross_Salary = $form_data['Gross_Salary'];
        $Other_Allowance = $form_data['Other_Allowance'];
        $PF_Yesandno = $form_data['PF_Yesandno'];
        $PF_Fixed = $form_data['PF_Fixed'];
        $ESI_Yesandno = $form_data['ESI_Yesandno'];
        $SalaryType = $form_data['SalaryType'];
        $LWF = $form_data['LWF'];
        $ESIOverlimit = $form_data['ESIOverlimit'];
        $Authorizedno = $_SESSION["Authorizedno"];
        $DayallowanceincludedESI = $form_data['DayallowanceincludedESI'];
        if ($Authorizedno == 1) {
        } else {
            $Message = "ADMINRIGHTS";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        if (empty($Basic)) {
            $Message = "Basic";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        if ($Clientid == 4) {
            if (empty($LWF)) {
                $LWF = 0;
            }
        } else {
            $LWF = 0;
        }
        /*------------------*/
        /*
         $testfn =              */
        if (mysqli_connect_errno()) {
            $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
        CopyEmployeemaster($conn, $Employeeid, $Clientid);
        $resultExists = "Update indsys1017employeemaster set 
  Basic ='$Basic',
  HR_Allowance ='$HR_Allowance',
  TA='$TA',
  Performance_allowance ='$Performance_allowance',
  Day_allowance ='$Day_allowance',
  PF ='$PF',
  ESI='$ESI',
  TDS ='$TDS',
  Professional_tax ='$Professional_tax',
  Net_Salary ='$Net_Salary',
  Gross_Salary='$Gross_Salary',  
  Other_Allowance = '$Other_Allowance',
  PF_Yesandno='$PF_Yesandno',  
  PF_Fixed='$PF_Fixed',  
  ESI_Yesandno = '$ESI_Yesandno',
  SalaryType ='$SalaryType',
  LWF='$LWF',
  ESIOverlimit='$ESIOverlimit',
  DayallowanceincludedESI='$DayallowanceincludedESI',

  Addormodifydatetime ='$date',
  Userid ='$user_id'

    
     WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid'";
        $resultExists01 = $conn->query($resultExists);
        if ($resultExists01 === TRUE) {
            $Message = "Update";
        } else {
            $Message = "Error";
        }
        if ($SalaryType == "Appraisal") {
            $resultExists = "Update indsys1017employeemaster set 

  LastAppresialDate ='$date',
  Userid ='$user_id'

    
     WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' ";
            $resultExists01 = $conn->query($resultExists);
            $Message = "Exists";
        }
        $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwemployeeappraisalnextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new)) {
            $GetChapter = "SELECT * FROM vwemployeeappraisalnextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'  ";
            $result_Chapter = $conn->query($GetChapter);
            if (mysqli_num_rows($result_Chapter) > 0) {
                while ($row = mysqli_fetch_array($result_Chapter)) {
                    $Sno = $row['Nextno'];
                }
            }
        } else {
            $Sno = 1;
        }
        $sqlsave = "INSERT IGNORE INTO indsys1023employeeappreseialinformation (Clientid,Employeeid,Sno,Basic,HR_Allowance,TA,Performance_allowance,Day_allowance,PF,Userid,Addormodifydatetime,ESI,TDS,Professional_tax,Net_Salary,Gross_Salary,PF_Yesandno,ESI_Yesandno,Other_Allowance,Appresialtype)
  values('$Clientid','$Employeeid','$Sno','$Basic','$HR_Allowance','$TA','$Performance_allowance','$Day_allowance','$PF','$user_id','$date','$ESI','$TDS','$Professional_tax','$Net_Salary','$Gross_Salary','$PF_Yesandno','$ESI_Yesandno','$Other_Allowance','$SalaryType')";
        $resultsave = mysqli_query($conn, $sqlsave);
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
/////////////////////////////////////////////////////////////
if ($MethodGet == 'DeleteEDUCATION') {
    $Employeeid = $form_data['Employeeid'];
    $Sno = $form_data['Sno'];
    if (mysqli_connect_errno()) {
        $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }
    $resultExists = "DELETE FROM indsys1020employeeeducationinformation WHERE Employeeid = '$Employeeid' and Sno='$Sno'  AND Clientid ='$Clientid' ";
    $resultExists01 = $conn->query($resultExists);
    if ($resultExists01 === TRUE) {
        $Message = "Delete";
    } else {
        $Message = "Error";
    }
    $Display = array('Message' => $Message);
    $str = json_encode($Display);
    echo trim($str, '"');
}
////////////////////////////////////////////////////////
if ($MethodGet == 'Relationship') {
    $GetState = "SELECT * FROM indsys1024relationshipmaster where  Clientid ='$Clientid'   ORDER BY Relationship";
    $result_Region = $conn->query($GetState);
    if (mysqli_num_rows($result_Region) > 0) {
        while ($row = mysqli_fetch_array($result_Region)) {
            $data01[] = $row;
        }
    }
    header('Content-Type: application/json');
    echo json_encode($data01);
}
///////////////////////////////////
if ($MethodGet == 'DeleteFamily') {
    $Employeeid = $form_data['Employeeid'];
    $Sno = $form_data['Sno'];
    if (mysqli_connect_errno()) {
        $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }
    $resultExists = "DELETE FROM indsys1019employeefamilyinformation WHERE Employeeid = '$Employeeid' and Sno='$Sno' AND Clientid ='$Clientid' ";
    $resultExists01 = $conn->query($resultExists);
    $Message = "Delete";
    $Display = array('Message' => $Message);
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
}
//////////////////////////////////////////////////////////
if ($MethodGet == 'UpdatOtherInfo') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $Dob = $form_data['Dob'];
        $Age = $form_data['Age'];
        $Bloodgroup = $form_data['Bloodgroup'];
        $Expereience = $form_data['Expereience'];
        $Fresher = $form_data['Fresher'];
        $Shift = $form_data['Shift'];
        $AllowOT = $form_data['AllowOT'];
        $AllowLOP = $form_data['AllowLOP'];
        $Salary_Mode = $form_data['Salary_Mode'];
        $Weekoff = $form_data['Weekoff'];
        $Employee_CL = $form_data['Employee_CL'];
        $Languages = $form_data['Languages'];
        $UANno = $form_data['UANno'];
        $ESIno = $form_data['ESIno'];
        $Aadharno = $form_data['Aadharno'];
        $Panno = $form_data['Panno'];
        $PFJoiningdate = $form_data['PFJoiningdate'];
        $ESIJoiningdate = $form_data['ESIJoiningdate'];
        $Date_Of_Joing = $form_data['Date_Of_Joing'];
        $BackgroundVerification = $form_data['BackgroundVerification'];
        $OfficemailID = $form_data['OfficemailID'];
        $Old_Empid = $form_data['Old_Empid'];
        $Languages = implode(",", $Languages);
        /*------------------*/
        /*
         $testfn =              */
        if (empty($PFJoiningdate)) {
            $PFJoiningdate = "0000-00-00";
        }
        if (empty($Date_Of_Joing)) {
            $Date_Of_Joing = "0000-00-00";
        }
        if (empty($ESIJoiningdate)) {
            $ESIJoiningdate = "0000-00-00";
        }
        if (empty($Dob)) {
            $Dob = "0000-00-00";
        }
        if (empty($Employee_CL)) {
            $Employee_CL = 1.5;
        }
        if (mysqli_connect_errno()) {
            $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
       // CopyEmployeemaster($conn, $Employeeid, $Clientid);
        $resultExists = "Update indsys1017employeemaster set 
  DOB ='$Dob',
  Age ='$Age',
  Bloodgroup='$Bloodgroup',
  Expereienced ='$Expereience',
  Fresher ='$Fresher',  
  Shift ='$Shift',
  Allow_OT ='$AllowOT',
  Allow_LOP='$AllowLOP',
  Salary_mode='$Salary_Mode',
  Week_Off ='$Weekoff',
  Employee_CL='$Employee_CL',
  Languages='$Languages',
  UANno ='$UANno',
  ESIno='$ESIno',
  Aadharno='$Aadharno',
  Panno ='$Panno',
  PFJoindate='$PFJoiningdate',
  ESIJoindate='$ESIJoiningdate',
  Addormodifydatetime ='$date',
  Date_Of_Joing ='$Date_Of_Joing',
  BackgroundVerification ='$BackgroundVerification',
  OfficemailID ='$OfficemailID',
  Old_Empid ='$Old_Empid',

  Userid ='$user_id'

    
     WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid'";
        $resultExists01 = $conn->query($resultExists);
        if ($resultExists01 === TRUE) {
            $Message = "Exists";
        } else {
            // print_r(   $resultExists);
            $Message = "Error";
        }
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////////////////////////
//////////////////
if ($MethodGet == 'DOCEMP') {
    $Employeeid = $form_data['Employeeid'];
    $Sno = $form_data['Sno'];
    $Documenttype = $form_data['Documenttype'];
    $Documentno = $form_data['Documentno'];
    if (empty($Documenttype)) {
        $Message = "Documenttype";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    $resultExists = "SELECT Employeeid FROM indsys1023employeedocinformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' And Sno ='$Sno' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
    if (mysqli_fetch_row($resultExists01)) {
        $resultExistsss = "Update indsys1023employeedocinformation set 
      Doctype ='$Documenttype',
      Documentno ='$Documentno',   
      Addormodifydatetime ='$date',
      Userid ='$user_id'
     
     
  WHERE Employeeid = '$Employeeid' AND Sno ='$Sno'

  AND Clientid ='$Clientid'  ";
        $resultExists0New = $conn->query($resultExistsss);
        if ($resultExists0New === TRUE) {
            $Message = "Exists";
        } else {
            $Message = "Error";
        }
    } else {
        $sqlsave = "INSERT IGNORE INTO indsys1023employeedocinformation (Clientid,Employeeid,Sno,
  Doctype,Documentno,Userid,Addormodifydatetime)
   VALUES ('" . $Clientid . "','" . $Employeeid . "','" . $Sno . "','" . $Documenttype . "','" . $Documentno . "',
   '" . $user_id . "','" . $date . "')";
        $resultsave = mysqli_query($conn, $sqlsave);
        if ($resultsave === TRUE) {
            $Message = "Exists";
        } else {
            $Message = "Error";
        }
    }
    $Display = array('Message' => $Message);
    $str = json_encode($Display);
    echo trim($str, '"');
}
/////////////////////////////////////////
if ($MethodGet == 'FetchDOC') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $Sno = $form_data['Sno'];
        $GetChapter = "SELECT * FROM indsys1023employeedocinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$Sno' ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Documenttype = $row['Doctype'];
                $Documentno = $row['Documentno'];
                $Documentpath = $row['Documentpath'];
            }
        }
        $Display = array('Documenttype' => $Documenttype, 'Documentno' => $Documentno, 'Documentpath' => $Documentpath,);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
/////////////////////////////////////////////
if ($MethodGet == 'DeleteDoc') {
    $Employeeid = $form_data['Employeeid'];
    $Sno = $form_data['Sno'];
    if (mysqli_connect_errno()) {
        $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }
    $Employeeid = $form_data['Employeeid'];
    $Sno = $form_data['Sno'];
    $GetChapter = "SELECT * FROM indsys1023employeedocinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$Sno' ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter);
    if (mysqli_num_rows($result_Chapter) > 0) {
        while ($row = mysqli_fetch_array($result_Chapter)) {
            $Documenttype = $row['Doctype'];
            $Documentno = $row['Documentno'];
            $Documentpath = $row['Documentpath'];
        }
    }
    $resultExists = "DELETE FROM indsys1023employeedocinformation WHERE Employeeid = '$Employeeid' and Sno='$Sno' AND Clientid ='$Clientid' ";
    $resultExists01 = $conn->query($resultExists);
    if ($resultExists01 === TRUE) {
        $Message = "Delete";
    } else {
        $Message = "Error";
    }
    if (empty($Documentpath)) {
    } else {
        unlink($Documentpath);
    }
    $Display = array('Message' => $Message);
    $str = json_encode($Display);
    echo trim($str, '"');
}
//////////////////////////////////////////////////////////////
if ($MethodGet == 'DEPTEMP') {
    $Employeeid = $form_data['Employeeid'];
    $PromotionNextno = $form_data['PromotionNextno'];
    $Department = $form_data['Department'];
    $Designation = $form_data['Designation'];
    $Period = $form_data['Period'];
    $Postingyear = $form_data['Postingyear'];
    $Postingmonth = $form_data['Postingmonth'];
    $Postingdays = $form_data['Postingdays'];
    $Fromperiod = $form_data['Fromperiod'];
    $Toperiod = $form_data['Toperiod'];
    if (empty($Department)) {
        $Message = "Department";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    if (empty($Designation)) {
        $Message = "Designation";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    $resultExists = "SELECT Employeeid FROM indsys1022employeepromotioninformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' And Sno ='$PromotionNextno' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
    if (mysqli_fetch_row($resultExists01)) {
        $resultExistsss = "Update indsys1022employeepromotioninformation set 
      Department ='$Department',
      Designation ='$Designation',
      Period ='$Period',
      Postingyear ='$Postingyear',
      Postingmonth ='$Postingmonth',
      Postingdays ='$Postingdays',
      Fromperiod ='$Fromperiod',
      Toperiod ='$Toperiod',
      Addormodifydatetime ='$date',
      Userid ='$user_id'
     
     
  WHERE Employeeid = '$Employeeid' AND Sno ='$PromotionNextno'

  AND Clientid ='$Clientid'  ";
        $resultExists0New = $conn->query($resultExistsss);
        if ($resultExists0New === TRUE) {
            $Message = "Exists";
        } else {
            $Message = "Error";
        }
        $resultExists = "Update indsys1017employeemaster set 
      Department ='$Department',
      Designation ='$Designation',
     
      Addormodifydatetime ='$date',
      Userid ='$user_id'
    
        
         WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid'";
        $resultExists01 = $conn->query($resultExists);
    } else {
        $sqlsave = "INSERT IGNORE INTO indsys1022employeepromotioninformation (Clientid,Employeeid,
  Sno,Department,Designation,Period,Userid,Addormodifydatetime,Postingyear,Postingmonth,Postingdays,Fromperiod,Toperiod)
   VALUES ('$Clientid','$Employeeid','$PromotionNextno ','$Department','$Designation ',
   '$Period','$user_id ','$date','$Postingyear','$Postingmonth','$Postingdays','$Fromperiod','$Toperiod')";
        $resultsave = mysqli_query($conn, $sqlsave);
        $Message = "Exists";
        $resultExists = "Update indsys1017employeemaster set 
      Department ='$Department',
      Designation ='$Designation',
     
      Addormodifydatetime ='$date',
      Userid ='$user_id'
    
        
         WHERE Employeeid = '$Employeeid'  AND Clientid ='$Clientid'";
        $resultExists01 = $conn->query($resultExists);
        if ($resultExists01 === TRUE) {
            $Message = "Exists";
        } else {
            $Message = "Error";
        }
    }
    $Display = array('Message' => $Message);
    $str = json_encode($Display);
    echo trim($str, '"');
}
///////////////////////////////////////////
if ($MethodGet == 'FetchPromotion') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $Sno = $form_data['Sno'];
        $GetChapter = "SELECT * FROM indsys1022employeepromotioninformation where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$Sno' ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Department = $row['Department'];
                $Designation = $row['Designation'];
                $Period = $row['Period'];
                $Postingdays = $row['Postingdays'];
                $Postingyear = $row['Postingyear'];
                $Postingmonth = $row['Postingmonth'];
                $Fromperiod = $row['Fromperiod'];
                $Toperiod = $row['Toperiod'];
            }
        }
        $Display = array('Department' => $Department, 'Designation' => $Designation, 'Period' => $Period, 'Postingdays' => $Postingdays, 'Postingyear' => $Postingyear, 'Postingmonth' => $Postingmonth, 'Fromperiod' => $Fromperiod, 'Toperiod' => $Toperiod);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
/////////////////////////////////////
if ($MethodGet == 'UpdateMajor') {
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
        $Designation = $form_data['Designation'];
        $FatherGuardianSpouseName = $form_data['FatherGuardianSpouseName'];
        if (empty($Emailid)) {
            $Message = "Emailid";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        if (empty($Category)) {
            $Message = "Category";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        if (empty($Firstname)) {
            $Message = "FNAME";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        /*------------------*/
        if (empty($Contactno)) {
            $Message = "Contact";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        if (empty($Department)) {
            $Message = "Department";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        if($Clientid !=4)
        {
        $AllowOt = "No";
        if ($Category == "Category 3") {
            $AllowOt = "Yes";
        }
       }
        /*------------------*/
        /*
         $testfn =              */
        if (mysqli_connect_errno()) {
            $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
       // CopyEmployeemaster($conn, $Employeeid, $Clientid);
        $resultExists = "Update indsys1017employeemaster set 
  Title ='$Title',
  Firstname ='$Firstname',
  Lastname='$Lastname',
  Gender ='$Gender',
  Nationality ='$Nationality',
  Marital_status='$Married',
  Mother_tong ='$Mothertongue',
  Contactno ='$Contactno',
  Type_Of_Posistion='$Category',
  Emaild='$Emailid',
  Fullname ='$fullname',
  EmployeeType='$EmployeeType',
  Department ='$Department',
  Highestqualification ='$Highestqualification',
  Designation='$Designation',
  FatherGuardianSpouseName='$FatherGuardianSpouseName',
  Allow_OT ='$AllowOt',
  Addormodifydatetime ='$date',
  Userid ='$user_id'    
     WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' ";
        $resultExists01 = $conn->query($resultExists);
        if ($resultExists01 === TRUE) {
            $Message = "Exists";
        } else {
            $Message = "Error";
        }
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////////////////////////
if ($MethodGet == 'GetAge') {
    try {
        $Dob = $form_data['Dob'];
        $dateOfBirth = $Dob;
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $Age = $diff->format('%y');
        $Display = array('Age' => $Age);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
/////////////////////////
if ($MethodGet == 'CALCULAT') {
    try {
        $Basic = $form_data['Basic'];
        $HR_Allowance = $form_data['HR_Allowance'];
        $TA = $form_data['TA'];
        $Performance_allowance = $form_data['Performance_allowance'];
        $Day_allowance = $form_data['Day_allowance'];
        $Other_Allowance = $form_data['Other_Allowance'];
        $PF_Yesandno = $form_data['PF_Yesandno'];
        $PF_Fixed = $form_data['PF_Fixed'];
        $PFnew = $form_data['PF'];
        $ESI_Yesandno = $form_data['ESI_Yesandno'];
        if (empty($Basic)) {
            $Basic = 0;
        }
        if (empty($HR_Allowance)) {
            $HR_Allowance = 0;
        }
        if (empty($TA)) {
            $TA = 0;
        }
        if (empty($Performance_allowance)) {
            $Performance_allowance = 0;
        }
        if (empty($Day_allowance)) {
            $Day_allowance = 0;
        }
        if (empty($Other_Allowance)) {
            $Other_Allowance = 0;
        }
        $GetChapter = "SELECT * FROM indsys1025pfandesilimitmaster where Clientid ='$Clientid' ";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $PFLimit = $row['PFLimit'];
                $ESILimit = $row['ESILimit'];
                $PFemployeepercentage = $row['PFemployeepercentage'];
                $PFemployeerpercentage = $row['PFemployeerpercentage'];
                $ESIemployeepercentage = $row['ESIemployeepercentage'];
                $ESIemployeerpercentange = $row['ESIemployeerpercentange'];
            }
        }
        $Total = $Basic + $HR_Allowance + $TA + $Performance_allowance + $Other_Allowance;
        $pfpercentage = (12 / 100);
        $esipercentage = (0.75 / 100);
        //    if($Basic<15000)
        //    {
        //     if($PF_Yesandno =='Yes' && $PF_Fixed =='Yes')
        //     {
        //      $PF =$PFnew;
        //     }
        //      elseif ($PF_Yesandno == 'Yes' && $PF_Fixed =='No')
        //      {
        //        $PF =($Basic+$Other_Allowance)*$pfpercentage;
        //        $PF=round($PF,0);
        //      }
        //      else
        //      {
        //        $PF =0;
        //      }
        //   }
        //   else
        //   {
        //     $PF_Yesandno ="No";
        //     $PF =0;
        //   }
        // if($Total<21000)
        // {
        // if($ESI_Yesandno =='Yes')
        // {
        // $Esi = ($Total*$esipercentage);
        // $ESI=roundup($Esi);
        // $ESI = round($ESI,0);
        // }
        // }
        // else
        // {
        //   $ESI_Yesandno="No";
        //   $ESI=0;
        // }
        if ($PF_Yesandno == 'Yes' && $PF_Fixed == 'Yes') {
            $PF = $PFnew;
        } elseif ($PF_Yesandno == 'Yes' && $PF_Fixed == 'No') {
            $PF = ($Basic + $Other_Allowance) * $pfpercentage;
            $PF = round($PF, 0);
        } else {
            $PF = 0;
        }
        if ($ESI_Yesandno == 'Yes') {
            $Esi = ($Total * $esipercentage);
            $ESI = roundup($Esi);
            $ESI = round($ESI, 0);
        } else {
            $ESI = 0;
        }
        if ($Clientid == 4) {
            $LWF = $Total * (0.2 / 100);
            if ($LWF > 31) {
                $LWF = 31;
            }
        } 
        else {
            $LWF = 0;
        }
        $Gross_Salary = $Total;
        $Net_Salary = ($Total - $PF - $ESI);
        $Display = array('Gross_Salary' => $Gross_Salary, 'Net_Salary' => $Net_Salary, 'ESI' => $ESI, 'PF' => $PF, 'PF_Yesandno' => $PF_Yesandno, 'ESI_Yesandno' => $ESI_Yesandno, 'LWF' => $LWF);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////////////////
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
/**
 * Round down to specified number of decimal places
 * @param float $float The number to round down
 * @param int $dec How many decimals
 */
function rounddown($float, $dec = 2) {
    if ($dec == 0) {
        if ($float < 0) {
            return ceil($float);
        } else {
            return floor($float);
        }
    } else {
        $d = pow(10, $dec);
        if ($float < 0) {
            return ceil($float * $d) / $d;
        } else {
            return floor($float * $d) / $d;
        }
    }
}
////////////////////////////////
if ($MethodGet == 'GetDEPTDAYS') {
    try {
        $Fromperiod = $form_data['Fromperiod'];
        $Toperiod = $form_data['Toperiod'];
        $d1 = new DateTime($Fromperiod);
        $d2 = new DateTime($Toperiod);
        $interval = $d2->diff($d1);
        $Postingdays = $interval->d; //21
        $Postingmonth = $interval->m; //4
        $Postingyear = $interval->y;
        $Period = "$Postingyear Years $Postingmonth Months $Postingdays Days";
        $Display = array('Postingdays' => $Postingdays, 'Postingyear' => $Postingyear, 'Postingmonth' => $Postingmonth, 'Period' => $Period);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
/////////////////////////
if ($MethodGet == 'ExitEmp') {
    try {
        $Employeeid = $form_data['Exitempid'];
        $_SESSION["Employeeid"] = $Employeeid;
        $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $ExitGender = $row['Gender'];
                $ExitCategory = $row['Type_Of_Posistion'];
                $ExitDesignation = $row['Designation'];
                $ExitEmployeetype = $row['EmployeeType'];
                $ExitContactno = $row['Contactno'];
                $ExitDepartment = $row['Department'];
                $Relievingrequestdate = $row['Emprequestresignationdate'];
                $RelievingDate = $row['Leftdate'];
                $Handoverto = $row['Handoverto'];
                $Relievingreason = $row['Leftreason'];
            }
        }
        $Display = array('ExitGender' => $ExitGender, 'ExitCategory' => $ExitCategory, 'ExitDesignation' => $ExitDesignation, 'ExitEmployeetype' => $ExitEmployeetype, 'ExitContactno' => $ExitContactno, 'ExitDepartment' => $ExitDepartment, 'Relievingrequestdate' => $Relievingrequestdate, 'RelievingDate' => $RelievingDate, 'Handoverto' => $Handoverto, 'Relievingreason' => $Relievingreason,);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
///////////////////////
if ($MethodGet == 'ExitUpdate') {
    try {
        $Employeeid = $form_data['Exitempid'];
        $ExitGender = $form_data['ExitGender'];
        $ExitCategory = $form_data['ExitCategory'];
        $ExitDesignation = $form_data['ExitDesignation'];
        $ExitContactno = $form_data['ExitContactno'];
        $ExitDepartment = $form_data['ExitDepartment'];
        $Relievingrequestdate = $form_data['Relievingrequestdate'];
        $RelievingDate = $form_data['RelievingDate'];
        $Handoverto = $form_data['Handoverto'];
        $Relievingreason = $form_data['Relievingreason'];
        if (mysqli_connect_errno()) {
            $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
        $resultExists = "Update indsys1017employeemaster set 
  Emprequestresignationdate ='$Relievingrequestdate',
  Handoverto ='$Handoverto',
  Leftreason='$Relievingreason',
  Leftdate ='$RelievingDate', 
  Addormodifydatetime ='$date',
  Userid ='$user_id'

    
     WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' ";
        $resultExists01 = $conn->query($resultExists);
        $Message = "Update";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
//////////////////////////////////////////////
if ($MethodGet == 'ExitDeactive') {
    try {
        $Employeeid = $form_data['Exitempid'];
        $Relievingrequestdate = $form_data['Relievingrequestdate'];
        $RelievingDate = $form_data['RelievingDate'];
        $Handoverto = $form_data['Handoverto'];
        $Relievingreason = $form_data['Relievingreason'];
        if (empty($Relievingreason)) {
            $Message = "Relievingreason";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        if (empty($RelievingDate)) {
            $Message = "RelievingDate";
            $Display = array('Message' => $Message);
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
        }
        if (mysqli_connect_errno()) {
            $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
        $resultExists = "Update indsys1017employeemaster set 
  EmpActive ='Deactive',
  Emprequestresignationdate ='$Relievingrequestdate',
  Handoverto ='$Handoverto',
  Leftreason='$Relievingreason',
  Leftdate ='$RelievingDate', 
  
  Addormodifydatetime ='$date',
  Userid ='$user_id'

    
     WHERE Employeeid = '$Employeeid' ";
        $resultExists01 = $conn->query($resultExists);
        $Message = "Deactive";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
////////////////////////////////////////////
if ($MethodGet == 'ExitALL') {
    $GetState = "SELECT * FROM indsys1017employeemaster where EmpActive ='Deactive' AND Clientid ='$Clientid'  ORDER BY Employeeid";
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
////////////////////////////
if ($MethodGet == 'Fetchvaccination') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $_SESSION["Employeeid"] = $Employeeid;
        $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $VaccinationView = $row['Covidvaccinationcertificatepath'];
                $Vaccinateddate = $row['Covidlastvaccinateddate'];
                $Covidvaccinated = $row['Covidvacinnated'];
            }
        }
        $Display = array('VaccinationView' => $VaccinationView, 'Vaccinateddate' => $Vaccinateddate, 'Covidvaccinated' => $Covidvaccinated);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
///////////////////////////////////////
if ($MethodGet == 'Vaccinationupdate') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $Vaccinateddate = $form_data['Vaccinateddate'];
        $Covidvaccinated = $form_data['Covidvaccinated'];
        if (mysqli_connect_errno()) {
            $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
        $resultExists = "Update indsys1017employeemaster set 

  Covidvacinnated ='$Covidvaccinated',
  Covidlastvaccinateddate ='$Vaccinateddate',
 
  Addormodifydatetime ='$date',
  Userid ='$user_id'

    
     WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' ";
        $resultExists01 = $conn->query($resultExists);
        $Message = "Update";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
//////////////////////////////////////////////////
if ($MethodGet == 'FetchSIPLDOC') {
    try {
        $Employeeid = $form_data['Employeeid'];
        $_SESSION["Employeeid"] = $Employeeid;
        $EmployeeDetailpathtamil = "";
        $Form34pathtamil = "";
        $Attentionoftheemployeepathtamil = "";
        $Employeedeclarationpathtamil = "";
        $Employeecontractpathtamil = "";
        $Employeestatingpathtamil = "";
        $Employeeagreemantpathtamil = "";
        $Serviceimprovementpathrecordtamil = "";
        $Employeetrainingpathtamil = "";
        $Form2revisedpathtamil = "";
        $EmployeeDetailpathhindi = "";
        $Form34pathtamilhindi = "";
        $Attentionoftheemployeepathhindi = "";
        $Employeedeclarationpathhindi = "";
        $Employeecontractpathhindi = "";
        $Employeestatingpathhindi = "";
        $Employeeagreemantpathhindi = "";
        $Serviceimprovementpathrecordlhindi = "";
        $Employeetrainingpathhindi = "";
        $Form2revisedpathhindi = "";
        $Employee_NDA_Path = "";
        $GratutityPath = "";
        $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $EmployeeDetailpathtamil = $row['EmployeeDetailpathtamil'];
                $Form34pathtamil = $row['Form34pathtamil'];
                $Attentionoftheemployeepathtamil = $row['Attentionoftheemployeepathtamil'];
                $Employeedeclarationpathtamil = $row['Employeedeclarationpathtamil'];
                $Employeecontractpathtamil = $row['Employeecontractpathtamil'];
                $Employeestatingpathtamil = $row['Employeestatingpathtamil'];
                $Employeeagreemantpathtamil = $row['Employeeagreemantpathtamil'];
                $Serviceimprovementpathrecordtamil = $row['Serviceimprovementpathrecordtamil'];
                $Employeetrainingpathtamil = $row['Employeetrainingpathtamil'];
                $Form2revisedpathtamil = $row['Form2revisedpathtamil'];
                $EmployeeDetailpathhindi = $row['EmployeeDetailpathhindi'];
                $Form34pathtamilhindi = $row['Form34pathtamilhindi'];
                $Attentionoftheemployeepathhindi = $row['Attentionoftheemployeepathhindi'];
                $Employeedeclarationpathhindi = $row['Employeedeclarationpathhindi'];
                $Employeecontractpathhindi = $row['Employeecontractpathhindi'];
                $Employeestatingpathhindi = $row['Employeestatingpathhindi'];
                $Employeeagreemantpathhindi = $row['Employeeagreemantpathhindi'];
                $Serviceimprovementpathrecordlhindi = $row['Serviceimprovementpathrecordlhindi'];
                $Employeetrainingpathhindi = $row['Employeetrainingpathhindi'];
                $Form2revisedpathhindi = $row['Form2revisedpathhindi'];
                $Employee_NDA_Path = $row['Employee_NDA_Path'];
                $GratutityPath = $row['GratutityPath'];
            }
        }
        $Display = array('EmployeeDetailpathtamil' => $EmployeeDetailpathtamil, 'Form34pathtamil' => $Form34pathtamil, 'Attentionoftheemployeepathtamil' => $Attentionoftheemployeepathtamil, 'Employeedeclarationpathtamil' => $Employeedeclarationpathtamil, 'Employeecontractpathtamil' => $Employeecontractpathtamil, 'Employeestatingpathtamil' => $Employeestatingpathtamil, 'Employeeagreemantpathtamil' => $Employeeagreemantpathtamil, 'Serviceimprovementpathrecordtamil' => $Serviceimprovementpathrecordtamil, 'Employeetrainingpathtamil' => $Employeetrainingpathtamil, 'Form2revisedpathtamil' => $Form2revisedpathtamil, 'EmployeeDetailpathhindi' => $EmployeeDetailpathhindi, 'Form34pathtamilhindi' => $Form34pathtamilhindi, 'Attentionoftheemployeepathhindi' => $Attentionoftheemployeepathhindi, 'Employeedeclarationpathhindi' => $Employeedeclarationpathhindi, 'Employeecontractpathhindi' => $Employeecontractpathhindi, 'Employeestatingpathhindi' => $Employeestatingpathhindi, 'Employeeagreemantpathhindi' => $Employeeagreemantpathhindi, 'Serviceimprovementpathrecordlhindi' => $Serviceimprovementpathrecordlhindi, 'Employeetrainingpathhindi' => $Employeetrainingpathhindi, 'Form2revisedpathhindi' => $Form2revisedpathhindi, 'Employee_NDA_Path' => $Employee_NDA_Path, 'GratutityPath' => $GratutityPath);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
/////////////////////////////////////////////////////
if ($MethodGet == 'Mailunique') {
    try {
        $Emailid = $form_data["Emailid"];
        $Message = "No";
        if (mysqli_connect_errno()) {
            $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
        $resultExists = "SELECT * FROM indsys1017employeemaster WHERE Emaild = '$Emailid' LIMIT 1";
        $resultExists01 = $conn->query($resultExists);
        if (mysqli_fetch_row($resultExists01)) {
            $Message = "MailYes";
        } else {
        }
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
/////////////////////////////////////////////
if ($MethodGet == 'Contactnounique') {
    try {
        $Contactno = $form_data["Contactno"];
        $Message = "No";
        if (mysqli_connect_errno()) {
            $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
        $resultExists = "SELECT * FROM indsys1017employeemaster WHERE Contactno = '$Contactno' LIMIT 1";
        $resultExists01 = $conn->query($resultExists);
        if (mysqli_fetch_row($resultExists01)) {
            $Message = "ContactYes";
        } else {
        }
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
///////////////////
if ($MethodGet == 'Emailverification01') {
    $ApplicationidVerify = $form_data['Employeeid'];
    $EmailidVerify = $form_data['Emailid'];
    $FirstnameVerify = $form_data['Firstname'];
    $VerifyHash = md5("$ApplicationidVerify$EmailidVerify");
    //echo "mail info | $FirstnameVerify | $ApplicationidVerify | $EmailidVerify | $VerifyHash";
    $mail = new PHPMailer(false);
    $mail->IsSMTP();
    $tstbody = "";
    try {
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
        $Toaddress = $EmailidVerify;
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
<h1 style='text-align: center;color:#2D9A43'>Thanks for Applying Britannia!</h1>
          <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'><b>Hi $FirstnameVerify</b>,</p>
          <span style='font-size:16px;'>We're happy you're here. Let's get your email address verified:</span>
  <br/>  <br/>
 </td>
 </tr>
 <tr>
 <td> <a target='_blank' href='$domain/HRM10/EmailVerify.php?e=$EmailidVerify&h=$VerifyHash&a=$ApplicationidVerify'>Click Here for Email Verification</a></td></tr>
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
        $SubjectMail = "Welcome to Britannia";
        $email_array = explode(',', $Toaddress);
        for ($i = 0;$i < count($email_array);$i++) {
            $mail->AddAddress($email_array[$i]);
        }
        $mail->SetFrom('indsystesting@gmail.com', 'BRITANNIA');
        $mail->AddReplyTo('indsystesting@gmail.com', 'BRITANNIA');
        $mail->Subject = $SubjectMail;
        $mail->IsHTML(true);
        // $mail->Body = $tstbody;
        $mail->MsgHTML($htmlContent);
        $mail->Send();
        $Message = "Mail Sent";
        $Display = array('Message' => $Message,);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(phpmailerException $e) {
    }
}
//////////////////////////////////////////
function CopyEmployeemaster($conn, $Employeeid, $Clientid) {
    $Historynotification = time() . uniqid(rand());
    $resultExists = "Update indsys1017employeemaster set 
    Historynotification ='$Historynotification'          
    WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' ";
    $resultExists01 = $conn->query($resultExists);
    $Message = "Update";
    $insertCandidateHistory = "INSERT INTO indsys1017employeemasterhistory (
        Clientid, Employeeid, Candidateid, Title, Firstname, Fullname, Lastname, Languages, Mother_tong, DOB, Age, Bloodgroup, Nationality, Country,
        Department, Emaild, Marital_status, Date_Of_Joing, Relocate, Previous_sainmarks_department, Gender, Contactno, Allow_OT, Allow_LOP, Shift, Employee_CL, Salary_mode, Week_Off,
        Employee_Rights, Basic, HR_Allowance, Other_Allowance, TA, Performance_allowance, Day_allowance, PF_Yesandno, PF, ESI_Yesandno, ESI, TDS, Professional_tax,
        Net_Salary, Gross_Salary,LWF, Empusername, Emppassword, Designation, EmpActive, Empimage, Type_Of_Posistion, Expereienced, Fresher, ESIno, UANno, Aadharno, Panno,
        Vacinated, EmployeeType, PFJoindate, ESIJoindate, Bonouspercentage, Leftreason, Leftdate, Covidvacinnated, Covidvaccinationcertificatepath, Coviddose,
        Covidlastvaccinateddate, Handoverthedocument, Handoverto, Empservingnoticeperiod, Emprequestresignationdate, PFEmployeeCompany, ESIEmployeeCompany,
        Highestqualification, EmployeeDetailpathtamil, Form34pathtamil, Attentionoftheemployeepathtamil, Employeedeclarationpathtamil, Employeecontractpathtamil, Employeestatingpathtamil, Employeeagreemantpathtamil,
        Serviceimprovementpathrecordtamil, Employeetrainingpathtamil, Form2revisedpathtamil, EmployeeDetailpathhindi, Form34pathtamilhindi, Attentionoftheemployeepathhindi, Employeedeclarationpathhindi, Employeecontractpathhindi, Employeestatingpathhindi,
        Employeeagreemantpathhindi, Serviceimprovementpathrecordlhindi, Employeetrainingpathhindi, Form2revisedpathhindi, FatherGuardianSpouseName, LastAppresialDate, SalaryType, BackgroundVerification, BackgroundVerificationpath, Employee_NDA_Path, GratutityPath, Smsverified, Emailverified, Historynotification
    ) 
    SELECT 
        Clientid, Employeeid, Candidateid, Title, Firstname, Fullname, Lastname, Languages, Mother_tong, DOB, Age, Bloodgroup, Nationality, Country,
        Department, Emaild, Marital_status, Date_Of_Joing, Relocate, Previous_sainmarks_department, Gender, Contactno, Allow_OT, Allow_LOP, Shift, Employee_CL, Salary_mode, Week_Off,
        Employee_Rights, Basic, HR_Allowance, Other_Allowance, TA, Performance_allowance, Day_allowance, PF_Yesandno, PF, ESI_Yesandno, ESI, TDS, Professional_tax,
        Net_Salary, Gross_Salary,LWF, Empusername, Emppassword, Designation, EmpActive, Empimage, Type_Of_Posistion, Expereienced, Fresher, ESIno, UANno, Aadharno, Panno,
        Vacinated, EmployeeType, PFJoindate, ESIJoindate, Bonouspercentage, Leftreason, Leftdate, Covidvacinnated, Covidvaccinationcertificatepath, Coviddose,
        Covidlastvaccinateddate, Handoverthedocument, Handoverto, Empservingnoticeperiod, Emprequestresignationdate, PFEmployeeCompany, ESIEmployeeCompany,
        Highestqualification, EmployeeDetailpathtamil, Form34pathtamil, Attentionoftheemployeepathtamil, Employeedeclarationpathtamil, Employeecontractpathtamil, Employeestatingpathtamil, Employeeagreemantpathtamil,
        Serviceimprovementpathrecordtamil, Employeetrainingpathtamil, Form2revisedpathtamil, EmployeeDetailpathhindi, Form34pathtamilhindi, Attentionoftheemployeepathhindi, Employeedeclarationpathhindi, Employeecontractpathhindi, Employeestatingpathhindi,
        Employeeagreemantpathhindi, Serviceimprovementpathrecordlhindi, Employeetrainingpathhindi, Form2revisedpathhindi, FatherGuardianSpouseName, LastAppresialDate, SalaryType, BackgroundVerification, BackgroundVerificationpath, Employee_NDA_Path, GratutityPath, Smsverified, Emailverified, Historynotification 
    FROM indsys1017employeemaster 
    WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid'";
    $resultinsertCandidateHistory = $conn->query($insertCandidateHistory);
}
//////////////////////////////////////////
function CopyEmployeeRefrence($conn, $Employeeid, $Clientid) {
    $Historynotification = time() . uniqid(rand());
    $resultExists = "Update indsys1021employeereferenceinformation set 
    Historynotification ='$Historynotification'          
           WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' ";
    $resultExists01 = $conn->query($resultExists);
    $Message = "Update";
    $insertCandidateHistory = "INSERT INTO indsys1021employeereferencehistoryinformation (Clientid,Employeeid,Reference1,Ref1Contactno,Reference2,Ref2Contactno,Ref1address,Ref2address,Historynotification) 
    SELECT Clientid,Employeeid,Reference1,Ref1Contactno,Reference2,Ref2Contactno,Ref1address,Ref2address,Historynotification FROM indsys1021employeereferenceinformation WHERE Employeeid ='$Employeeid' AND Clientid='$Clientid'";
    $resultinsertCandidateHistory = $conn->query($insertCandidateHistory);
}
/////////////////////////////////
function CopyEmpAccountInformation($conn, $Employeeid, $Clientid) {
    $Historynotification = time() . uniqid(rand());
    $resultExists = "Update indsys1016employeeaccountinformation set 
    Historynotification ='$Historynotification'          
           WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' ";
    $resultExists01 = $conn->query($resultExists);
    if ($resultExists01 === TRUE) {
        $insertCandidateHistory = "INSERT INTO indsys1016employeeaccountinformationhistory (Clientid,Employeeid,Bankname,Accountno,IFSCcode,Branch,Bankpassbookdoc,Historynotification) 
        SELECT Clientid,Employeeid,Bankname,Accountno,IFSCcode,Branch,Bankpassbookdoc,Historynotification FROM indsys1016employeeaccountinformation WHERE Employeeid ='$Employeeid' AND Clientid='$Clientid'";
        $resultinsertCandidateHistory = $conn->query($insertCandidateHistory);
        if ($resultinsertCandidateHistory === TRUE) {
        } else {
            echo $conn->error;
        }
    }
}
////////////////////////////////////////////////////
function EmployeeReferenceArrayDiff($conn, $Employeeid, $Clientid, $domain) {
    $testin = 1;
    $Sno = 0;
    $resultExistsnew = "SELECT Historynotification FROM indsys1021employeereferenceinformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
    $resultExists01new = $conn->query($resultExistsnew);
    if (mysqli_fetch_row($resultExists01new)) {
        $GetChapter = "SELECT Historynotification FROM indsys1021employeereferenceinformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' ";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Historynotification = $row['Historynotification'];
            }
        }
        $CandidateArray1 = "SELECT Clientid,Employeeid,Reference1,Ref1Contactno,Reference2,Ref2Contactno,Ref1address,Ref2address FROM indsys1021employeereferenceinformation Where Employeeid='$Employeeid' AND Historynotification ='$Historynotification' AND Clientid = '$Clientid'";
        $result_CandidateArray1 = $conn->query($CandidateArray1);
        $CandidateData1 = [];
        if (mysqli_num_rows($result_CandidateArray1) > 0) {
            while ($row = mysqli_fetch_array($result_CandidateArray1)) {
                $CandidateData1 = $row;
            }
        }
        $CandidateArray2 = "SELECT Clientid,Employeeid,Reference1,Ref1Contactno,Reference2,Ref2Contactno,Ref1address,Ref2address FROM indsys1021employeereferencehistoryinformation Where Employeeid='$Employeeid' AND Historynotification ='$Historynotification' AND Clientid = '$Clientid'";
        $result_CandidateArray2 = $conn->query($CandidateArray2);
        $CandidateData2 = [];
        if (mysqli_num_rows($result_CandidateArray2) > 0) {
            while ($row = mysqli_fetch_array($result_CandidateArray2)) {
                $CandidateData2 = $row;
            }
        }
        $array_diff_result = array_diff($CandidateData2, $CandidateData1);
        //print_r($array_diff_result);
        // $newarraytest = array_unique($array_diff_result);
        $i = 0;
        $ModifiedValue = "";
        $orignalvalue = "";
        $changeResult = "";
        foreach ($array_diff_result as $key => $value) {
            $testin = 2;
            $key_temp = $key;
            $key_temp = preg_replace('/[0-9]+/', '', $key_temp);
            $GetChapter = "SELECT Clientid,Employeeid,Reference1,Ref1Contactno,Reference2,Ref2Contactno,Ref1address,Ref2address FROM indsys1021employeereferenceinformation where Employeeid = '$Employeeid' and Historynotification='$Historynotification' AND Clientid = '$Clientid' ORDER BY Employeeid ";
            $result_Chapter = $conn->query($GetChapter);
            if (mysqli_num_rows($result_Chapter) > 0) {
                while ($row = mysqli_fetch_array($result_Chapter)) {
                    $ModifiedValue = $row[$key_temp];
                }
            }
            // $changeResult="";
            $GetChapterss = "SELECT Clientid,Employeeid,Reference1,Ref1Contactno,Reference2,Ref2Contactno,Ref1address,Ref2address FROM indsys1021employeereferencehistoryinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid'  AND Historynotification ='$Historynotification' ORDER BY Employeeid";
            $result_Chapterss = $conn->query($GetChapterss);
            if (mysqli_num_rows($result_Chapterss) > 0) {
                while ($row = mysqli_fetch_array($result_Chapterss)) {
                    $orignalvalue = $row[$key_temp];
                    $changeResult.= "<tr><td>$key_temp</td><td>$orignalvalue</td><td>$ModifiedValue</td></tr>";
                }
            }
            $changeResult = str_replace("<td></td>", "", "$changeResult");
            $changeResult = str_replace("<tr></tr>", "", "$changeResult");
        }
        if ($testin == 2) {
            data_change_email($conn, $Clientid, $changeResult, $domain, $Employeeid);
        }
    }
}
////////////////////////////////
function EmployeeAccountsArrayDiff($conn, $Employeeid, $Clientid, $domain) {
    $testin = 1;
    $Sno = 0;
    $resultExistsnew = "SELECT Historynotification FROM indsys1016employeeaccountinformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
    $resultExists01new = $conn->query($resultExistsnew);
    if (mysqli_fetch_row($resultExists01new)) {
        $GetChapter = "SELECT Historynotification FROM indsys1016employeeaccountinformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' ";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Historynotification = $row['Historynotification'];
            }
        }
        $CandidateArray1 = "SELECT Clientid,Employeeid,Bankname,Accountno,IFSCcode,Branch,Bankpassbookdoc FROM indsys1016employeeaccountinformation Where Employeeid='$Employeeid' AND Historynotification ='$Historynotification' AND Clientid = '$Clientid'";
        $result_CandidateArray1 = $conn->query($CandidateArray1);
        $CandidateData1 = [];
        if (mysqli_num_rows($result_CandidateArray1) > 0) {
            while ($row = mysqli_fetch_array($result_CandidateArray1)) {
                $CandidateData1 = $row;
            }
        }
        $CandidateArray2 = "SELECT Clientid,Employeeid,Bankname,Accountno,IFSCcode,Branch,Bankpassbookdoc FROM indsys1016employeeaccountinformation Where Employeeid='$Employeeid' AND Historynotification ='$Historynotification' AND Clientid = '$Clientid'";
        $result_CandidateArray2 = $conn->query($CandidateArray2);
        $CandidateData2 = [];
        if (mysqli_num_rows($result_CandidateArray2) > 0) {
            while ($row = mysqli_fetch_array($result_CandidateArray2)) {
                $CandidateData2 = $row;
            }
        }
        $array_diff_result = array_diff($CandidateData2, $CandidateData1);
        //print_r($array_diff_result);
        // $newarraytest = array_unique($array_diff_result);
        $i = 0;
        $ModifiedValue = "";
        $orignalvalue = "";
        $changeResult = "";
        foreach ($array_diff_result as $key => $value) {
            $testin = 2;
            $key_temp = $key;
            $key_temp = preg_replace('/[0-9]+/', '', $key_temp);
            $GetChapter = "SELECT Clientid,Employeeid,Bankname,Accountno,IFSCcode,Branch,Bankpassbookdoc FROM indsys1016employeeaccountinformation where Employeeid = '$Employeeid' and Historynotification='$Historynotification' AND Clientid = '$Clientid' ORDER BY Candidateid";
            $result_Chapter = $conn->query($GetChapter);
            if (mysqli_num_rows($result_Chapter) > 0) {
                while ($row = mysqli_fetch_array($result_Chapter)) {
                    $ModifiedValue = $row[$key_temp];
                }
            }
            // $changeResult="";
            $GetChapterss = "SELECT Clientid,Employeeid,Bankname,Accountno,IFSCcode,Branch,Bankpassbookdoc FROM indsys1016employeeaccountinformationhistory where Clientid ='$Clientid' and Employeeid = '$Employeeid'  AND Historynotification ='$Historynotification' ORDER BY Employeeid";
            $result_Chapterss = $conn->query($GetChapterss);
            if (mysqli_num_rows($result_Chapterss) > 0) {
                while ($row = mysqli_fetch_array($result_Chapterss)) {
                    $orignalvalue = $row[$key_temp];
                    $changeResult.= "<tr><td>$key_temp</td><td>$orignalvalue</td><td>$ModifiedValue</td></tr>";
                }
            }
            $changeResult = str_replace("<td></td>", "", "$changeResult");
            $changeResult = str_replace("<tr></tr>", "", "$changeResult");
        }
        if ($testin == 2) {
            data_change_email($conn, $Clientid, $changeResult, $domain, $Employeeid);
        }
    }
}
///////////////////////////////
function CopyEmployeeAddress($conn, $Employeeid, $Clientid) {
    $Historynotification = time() . uniqid(rand());
    $resultExists = "Update indsys1018employeeaddressinformation set 
    Historynotification ='$Historynotification'          
           WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' ";
    $resultExists01 = $conn->query($resultExists);
    $Message = "Update";
    $insertCandidateHistory = "INSERT INTO indsys1018employeehistoryaddressinformation (Clientid,Employeeid,Currentaddress,Currentcountry,Currentcity,Currentstate,Current_pincode,Permanantaddress,Permanantcountry,Peremenantstate,Permanantcity,Permanantpincode,Historynotification) 
    SELECT Clientid,Employeeid,Currentaddress,Currentcountry,Currentcity,Currentstate,Current_pincode,Permanantaddress,Permanantcountry,Peremenantstate,Permanantcity,Permanantpincode,Historynotification FROM indsys1018employeeaddressinformation WHERE Employeeid ='$Employeeid' AND Clientid='$Clientid'";
    $resultinsertCandidateHistory = $conn->query($insertCandidateHistory);
}
///////////////////////////////////////////////
function EmployeeAddressArrayDiff($conn, $Employeeid, $Clientid, $domain) {
    $testin = 1;
    $Sno = 0;
    $resultExistsnew = "SELECT Historynotification FROM indsys1018employeeaddressinformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
    $resultExists01new = $conn->query($resultExistsnew);
    if (mysqli_fetch_row($resultExists01new)) {
        $GetChapter = "SELECT Historynotification FROM indsys1018employeeaddressinformation WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' ";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Historynotification = $row['Historynotification'];
            }
        }
        $CandidateArray1 = "SELECT Clientid,Employeeid,Currentaddress,Currentcountry,Currentcity,Currentstate,Current_pincode,Permanantaddress,Permanantcountry,Peremenantstate,Permanantcity,Permanantpincode FROM indsys1018employeeaddressinformation Where Employeeid='$Employeeid' AND Historynotification ='$Historynotification' AND Clientid = '$Clientid'";
        $result_CandidateArray1 = $conn->query($CandidateArray1);
        $CandidateData1 = [];
        if (mysqli_num_rows($result_CandidateArray1) > 0) {
            while ($row = mysqli_fetch_array($result_CandidateArray1)) {
                $CandidateData1 = $row;
            }
        }
        $CandidateArray2 = "SELECT Clientid,Employeeid,Currentaddress,Currentcountry,Currentcity,Currentstate,Current_pincode,Permanantaddress,Permanantcountry,Peremenantstate,Permanantcity,Permanantpincode FROM indsys1018employeehistoryaddressinformation Where Employeeid='$Employeeid' AND Historynotification ='$Historynotification' AND Clientid = '$Clientid'";
        $result_CandidateArray2 = $conn->query($CandidateArray2);
        $CandidateData2 = [];
        if (mysqli_num_rows($result_CandidateArray2) > 0) {
            while ($row = mysqli_fetch_array($result_CandidateArray2)) {
                $CandidateData2 = $row;
            }
        }
        $array_diff_result = array_diff($CandidateData2, $CandidateData1);
        //print_r($array_diff_result);
        // $newarraytest = array_unique($array_diff_result);
        $i = 0;
        $ModifiedValue = "";
        $orignalvalue = "";
        $changeResult = "";
        foreach ($array_diff_result as $key => $value) {
            $testin = 2;
            $key_temp = $key;
            $key_temp = preg_replace('/[0-9]+/', '', $key_temp);
            $GetChapter = "SELECT Clientid,Employeeid,Currentaddress,Currentcountry,Currentcity,Currentstate,Current_pincode,Permanantaddress,Permanantcountry,Peremenantstate,Permanantcity,Permanantpincode FROM indsys1018employeeaddressinformation where Employeeid = '$Employeeid' and Historynotification='$Historynotification' AND Clientid = '$Clientid' ORDER BY Employeeid";
            $result_Chapter = $conn->query($GetChapter);
            if (mysqli_num_rows($result_Chapter) > 0) {
                while ($row = mysqli_fetch_array($result_Chapter)) {
                    $ModifiedValue = $row[$key_temp];
                }
            }
            // $changeResult="";
            $GetChapterss = "SELECT Clientid,Employeeid,Currentaddress,Currentcountry,Currentcity,Currentstate,Current_pincode,Permanantaddress,Permanantcountry,Peremenantstate,Permanantcity,Permanantpincode FROM indsys1018employeehistoryaddressinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid'  AND Historynotification ='$Historynotification' ORDER BY Employeeid";
            $result_Chapterss = $conn->query($GetChapterss);
            if (mysqli_num_rows($result_Chapterss) > 0) {
                while ($row = mysqli_fetch_array($result_Chapterss)) {
                    $orignalvalue = $row[$key_temp];
                    $changeResult.= "<tr><td>$key_temp</td><td>$orignalvalue</td><td>$ModifiedValue</td></tr>";
                }
            }
            $changeResult = str_replace("<td></td>", "", "$changeResult");
            $changeResult = str_replace("<tr></tr>", "", "$changeResult");
        }
        if ($testin == 2) {
            data_change_email($conn, $Clientid, $changeResult, $domain, $Employeeid);
        }
    }
}
//////////////////////////////////////////////////////
if ($MethodGet == 'SuperUserEmpRefrenceMail') {
    try {
        $Employeeid = $form_data['Employeeid'];
        EmployeeReferenceArrayDiff($conn, $Employeeid, $Clientid, $domain);
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
        $Message = "";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
}
//////////////////////
if ($MethodGet == 'SuperUserAddressMail') {
    try {
        $Employeeid = $form_data['Employeeid'];
        EmployeeAddressArrayDiff($conn, $Employeeid, $Clientid, $domain);
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
        $Message = "";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
}
/////////////////////////////////////////////
if ($MethodGet == 'SuperUserBankAccountsMail') {
    try {
        $Employeeid = $form_data['Employeeid'];
        EmployeeAccountsArrayDiff($conn, $Employeeid, $Clientid, $domain);
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
        $Message = "";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
}
/////////////////////////////////
if ($MethodGet == 'SuperUserMail') {
    try {
        $Employeeid = $form_data['Employeeid'];
        CandidateArrayDiff($conn, $Employeeid, $Clientid, $domain);
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
        $Message = "";
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
}
///////////////////////
function CandidateArrayDiff($conn, $Employeeid, $Clientid, $domain) {
    $testin = 1;
    $Sno = 0;
    $resultExistsnew = "SELECT Historynotification FROM indsys1017employeemaster WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' LIMIT 1";
    $resultExists01new = $conn->query($resultExistsnew);
    if (mysqli_fetch_row($resultExists01new)) {
        $GetChapter = "SELECT Historynotification FROM indsys1017employeemaster WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' ";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Historynotification = $row['Historynotification'];
            }
        }
        $CandidateArray1 = "SELECT Clientid,Employeeid,Candidateid,Title,Firstname,Fullname,Lastname,Languages,Mother_tong,DOB,Age,Bloodgroup,Nationality,Country,
  Department,Emaild,Marital_status,Date_Of_Joing,Relocate,Previous_sainmarks_department,Gender,Contactno,Allow_OT,Allow_LOP,Shift,Employee_CL,Salary_mode,Week_Off,
  Employee_Rights,Basic,HR_Allowance,Other_Allowance,TA,Performance_allowance,Day_allowance,PF_Yesandno,PF,ESI_Yesandno,ESI,TDS,Professional_tax,
   Net_Salary,Gross_Salary,Empusername,Emppassword,Designation,EmpActive,Empimage,Type_Of_Posistion,Expereienced,Fresher,ESIno,UANno,Aadharno,Panno,
   Vacinated,EmployeeType,PFJoindate,ESIJoindate,Bonouspercentage,Leftreason,Leftdate,Covidvacinnated,Covidvaccinationcertificatepath,Coviddose,
   Covidlastvaccinateddate,Handoverthedocument,Handoverto,Empservingnoticeperiod,Emprequestresignationdate,PFEmployeeCompany,ESIEmployeeCompany,
   Highestqualification,EmployeeDetailpathtamil,Form34pathtamil,Attentionoftheemployeepathtamil,Employeedeclarationpathtamil,Employeecontractpathtamil,Employeestatingpathtamil,Employeeagreemantpathtamil,
   Serviceimprovementpathrecordtamil,Employeetrainingpathtamil,Form2revisedpathtamil,EmployeeDetailpathhindi,Form34pathtamilhindi,Attentionoftheemployeepathhindi,Employeedeclarationpathhindi,Employeecontractpathhindi,Employeestatingpathhindi,
   Employeeagreemantpathhindi,Serviceimprovementpathrecordlhindi,Employeetrainingpathhindi,Form2revisedpathhindi,FatherGuardianSpouseName,LastAppresialDate,SalaryType,BackgroundVerification,BackgroundVerificationpath,Employee_NDA_Path,GratutityPath,Smsverified,Emailverified FROM indsys1017employeemaster Where Employeeid='$Employeeid' AND Historynotification ='$Historynotification' AND Clientid = '$Clientid'";
        $result_CandidateArray1 = $conn->query($CandidateArray1);
        $CandidateData1 = [];
        if (mysqli_num_rows($result_CandidateArray1) > 0) {
            while ($row = mysqli_fetch_array($result_CandidateArray1)) {
                $CandidateData1 = $row;
            }
        }
        $CandidateArray2 = "SELECT Clientid,Employeeid,Candidateid,Title,Firstname,Fullname,Lastname,Languages,Mother_tong,DOB,Age,Bloodgroup,Nationality,Country,
  Department,Emaild,Marital_status,Date_Of_Joing,Relocate,Previous_sainmarks_department,Gender,Contactno,Allow_OT,Allow_LOP,Shift,Employee_CL,Salary_mode,Week_Off,
  Employee_Rights,Basic,HR_Allowance,Other_Allowance,TA,Performance_allowance,Day_allowance,PF_Yesandno,PF,ESI_Yesandno,ESI,TDS,Professional_tax,
   Net_Salary,Gross_Salary,Empusername,Emppassword,Designation,EmpActive,Empimage,Type_Of_Posistion,Expereienced,Fresher,ESIno,UANno,Aadharno,Panno,
   Vacinated,EmployeeType,PFJoindate,ESIJoindate,Bonouspercentage,Leftreason,Leftdate,Covidvacinnated,Covidvaccinationcertificatepath,Coviddose,
   Covidlastvaccinateddate,Handoverthedocument,Handoverto,Empservingnoticeperiod,Emprequestresignationdate,PFEmployeeCompany,ESIEmployeeCompany,
   Highestqualification,EmployeeDetailpathtamil,Form34pathtamil,Attentionoftheemployeepathtamil,Employeedeclarationpathtamil,Employeecontractpathtamil,Employeestatingpathtamil,Employeeagreemantpathtamil,
   Serviceimprovementpathrecordtamil,Employeetrainingpathtamil,Form2revisedpathtamil,EmployeeDetailpathhindi,Form34pathtamilhindi,Attentionoftheemployeepathhindi,Employeedeclarationpathhindi,Employeecontractpathhindi,Employeestatingpathhindi,
   Employeeagreemantpathhindi,Serviceimprovementpathrecordlhindi,Employeetrainingpathhindi,Form2revisedpathhindi,FatherGuardianSpouseName,LastAppresialDate,SalaryType,BackgroundVerification,BackgroundVerificationpath,Employee_NDA_Path,GratutityPath,Smsverified,Emailverified FROM indsys1017employeemasterhistory Where Employeeid='$Employeeid' AND Historynotification ='$Historynotification' AND Clientid = '$Clientid'";
        $result_CandidateArray2 = $conn->query($CandidateArray2);
        $CandidateData2 = [];
        if (mysqli_num_rows($result_CandidateArray2) > 0) {
            while ($row = mysqli_fetch_array($result_CandidateArray2)) {
                $CandidateData2 = $row;
            }
        }
        $array_diff_result = array_diff($CandidateData2, $CandidateData1);
        //print_r($array_diff_result);
        // $newarraytest = array_unique($array_diff_result);
        $i = 0;
        $ModifiedValue = "";
        $orignalvalue = "";
        $changeResult = "";
        foreach ($array_diff_result as $key => $value) {
            $testin = 2;
            $key_temp = $key;
            $key_temp = preg_replace('/[0-9]+/', '', $key_temp);
            $GetChapter = "SELECT Clientid,Employeeid,Candidateid,Title,Firstname,Fullname,Lastname,Languages,Mother_tong,DOB,Age,Bloodgroup,Nationality,Country,
  Department,Emaild,Marital_status,Date_Of_Joing,Relocate,Previous_sainmarks_department,Gender,Contactno,Allow_OT,Allow_LOP,Shift,Employee_CL,Salary_mode,Week_Off,
  Employee_Rights,Basic,HR_Allowance,Other_Allowance,TA,Performance_allowance,Day_allowance,PF_Yesandno,PF,ESI_Yesandno,ESI,TDS,Professional_tax,
   Net_Salary,Gross_Salary,Empusername,Emppassword,Designation,EmpActive,Empimage,Type_Of_Posistion,Expereienced,Fresher,ESIno,UANno,Aadharno,Panno,
   Vacinated,EmployeeType,PFJoindate,ESIJoindate,Bonouspercentage,Leftreason,Leftdate,Covidvacinnated,Covidvaccinationcertificatepath,Coviddose,
   Covidlastvaccinateddate,Handoverthedocument,Handoverto,Empservingnoticeperiod,Emprequestresignationdate,PFEmployeeCompany,ESIEmployeeCompany,
   Highestqualification,EmployeeDetailpathtamil,Form34pathtamil,Attentionoftheemployeepathtamil,Employeedeclarationpathtamil,Employeecontractpathtamil,Employeestatingpathtamil,Employeeagreemantpathtamil,
   Serviceimprovementpathrecordtamil,Employeetrainingpathtamil,Form2revisedpathtamil,EmployeeDetailpathhindi,Form34pathtamilhindi,Attentionoftheemployeepathhindi,Employeedeclarationpathhindi,Employeecontractpathhindi,Employeestatingpathhindi,
   Employeeagreemantpathhindi,Serviceimprovementpathrecordlhindi,Employeetrainingpathhindi,Form2revisedpathhindi,FatherGuardianSpouseName,LastAppresialDate,SalaryType,BackgroundVerification,BackgroundVerificationpath,Employee_NDA_Path,GratutityPath,Smsverified,Emailverified FROM indsys1017employeemaster where Employeeid = '$Employeeid' and Historynotification='$Historynotification' AND Clientid = '$Clientid' ORDER BY Candidateid";
            $result_Chapter = $conn->query($GetChapter);
            if (mysqli_num_rows($result_Chapter) > 0) {
                while ($row = mysqli_fetch_array($result_Chapter)) {
                    $ModifiedValue = $row[$key_temp];
                }
            }
            // $changeResult="";
            $GetChapterss = "SELECT Clientid,Employeeid,Candidateid,Title,Firstname,Fullname,Lastname,Languages,Mother_tong,DOB,Age,Bloodgroup,Nationality,Country,
  Department,Emaild,Marital_status,Date_Of_Joing,Relocate,Previous_sainmarks_department,Gender,Contactno,Allow_OT,Allow_LOP,Shift,Employee_CL,Salary_mode,Week_Off,
  Employee_Rights,Basic,HR_Allowance,Other_Allowance,TA,Performance_allowance,Day_allowance,PF_Yesandno,PF,ESI_Yesandno,ESI,TDS,Professional_tax,
   Net_Salary,Gross_Salary,Empusername,Emppassword,Designation,EmpActive,Empimage,Type_Of_Posistion,Expereienced,Fresher,ESIno,UANno,Aadharno,Panno,
   Vacinated,EmployeeType,PFJoindate,ESIJoindate,Bonouspercentage,Leftreason,Leftdate,Covidvacinnated,Covidvaccinationcertificatepath,Coviddose,
   Covidlastvaccinateddate,Handoverthedocument,Handoverto,Empservingnoticeperiod,Emprequestresignationdate,PFEmployeeCompany,ESIEmployeeCompany,
   Highestqualification,EmployeeDetailpathtamil,Form34pathtamil,Attentionoftheemployeepathtamil,Employeedeclarationpathtamil,Employeecontractpathtamil,Employeestatingpathtamil,Employeeagreemantpathtamil,
   Serviceimprovementpathrecordtamil,Employeetrainingpathtamil,Form2revisedpathtamil,EmployeeDetailpathhindi,Form34pathtamilhindi,Attentionoftheemployeepathhindi,Employeedeclarationpathhindi,Employeecontractpathhindi,Employeestatingpathhindi,
   Employeeagreemantpathhindi,Serviceimprovementpathrecordlhindi,Employeetrainingpathhindi,Form2revisedpathhindi,FatherGuardianSpouseName,LastAppresialDate,SalaryType,BackgroundVerification,BackgroundVerificationpath,Employee_NDA_Path,GratutityPath,Smsverified,Emailverified FROM indsys1017employeemasterhistory where Clientid ='$Clientid' and Employeeid = '$Employeeid'  AND Historynotification ='$Historynotification' ORDER BY Employeeid";
            $result_Chapterss = $conn->query($GetChapterss);
            if (mysqli_num_rows($result_Chapterss) > 0) {
                while ($row = mysqli_fetch_array($result_Chapterss)) {
                    $orignalvalue = $row[$key_temp];
                    $changeResult.= "<tr><td>$key_temp</td><td>$orignalvalue</td><td>$ModifiedValue</td></tr>";
                }
            }
            $changeResult = str_replace("<td></td>", "", "$changeResult");
            $changeResult = str_replace("<tr></tr>", "", "$changeResult");
        }
        if ($testin == 2) {
            data_change_email($conn, $Clientid, $changeResult, $domain, $Employeeid);
        }
    }
}
/////////////////////
function data_change_email($conn,  $Clientid, $changeResultFinal,$domain,$Employeeid){
  $username = $_SESSION['Username'];
$mail = new PHPMailer(false);
$mail->IsSMTP();
$tstbody = "";
$Usermailid = "";
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$date = date("Y-m-d " );
$Todaydate = date('d-M-Y', strtotime($date));
$MailTo = "";
$GetSuperusermail = "SELECT * FROM indsys1000useradmin where Clientid ='$Clientid' and Authorizedno = 1 ";
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
$Toaddress= $MailTo;
//$Toaddress="krishnaveni@indsys.holdings";
$htmlContent="<!doctype html>
<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<title>Employee Update</title>
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
<td style='width:33%;'>Change</td><td style='width:33%;'>Original Value</td><td>Modified Value</td></tr>
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
$SubjectMail="User Data Change Alert - Employee Id - $Employeeid";
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
$str = json_encode("E-Mail Sent Succesfully");
echo trim($str, '"');
}
catch(phpmailerException $e)
{
}
}
/////////////////////
if ($MethodGet == "EMPNOMINEEPERCENTAGE") {
    try {
        $Employeeid = $form_data['Employeeid'];
        $PercentageofShare = $form_data['PercentageofShare'];
        $Totalpercentageofshare = 0;
        $NomineeSno = $form_data['NomineeSno'];
        $PercentageofShare01 = 0;
        $GetChapter = "SELECT * FROM indsys1019employeenomineeinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$NomineeSno' ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $PercentageofShare01 = $row['PercentageofShare'];
            }
        }
        $Balancepercentageshare = 0;
        $sql = "SELECT  SUM(PercentageofShare) from indsys1019employeenomineeinformation where Clientid='$Clientid' and Employeeid='$Employeeid'";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_array($result)) {
            $Totalpercentageofshare = $row['SUM(PercentageofShare)'];
        }
        if (empty($Totalpercentageofshare)) {
            $Totalpercentageofshare = 0;
        }
        if ($Totalpercentageofshare > $PercentageofShare01) {
            $Balancepercentageshare = $Totalpercentageofshare - $PercentageofShare01;
        } else {
            $Balancepercentageshare = $PercentageofShare01 - $Totalpercentageofshare;
        }
        $calculatedpercentage = 100 - $Balancepercentageshare;
        $Message = "";
        if ($PercentageofShare > $calculatedpercentage) {
            $Message = "PercentageHigh";
        }
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
if ($MethodGet == "EMERGENCYCONTACT") {
    try {
        $Employeeid = $form_data['Employeeid'];
        $GetChapter = "SELECT * FROM indsys1019employeenomineeinformation where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Sno LIMIT 1";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $EmergencyContactno = $row['RelationshipContactno'];
            }
        }
        $Display = array('EmergencyContactno' => $EmergencyContactno);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
if ($MethodGet == "UpdateCATEGORYOT") {
    if (mysqli_connect_errno()) {
        $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }
    $Employeeid = $form_data['Employeeid'];
    $Category = $form_data['Category'];
    $AllowOT = $form_data['AllowOT'];
    // CopyEmployeemaster($conn,$Employeeid,$Clientid);
    $resultExists = "Update indsys1017employeemaster set 
     Allow_OT ='$AllowOT',
     Userid ='$user_id'    
     WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' ";
    $resultExists01 = $conn->query($resultExists);
    $Message = "Exists";
    $Display = array('Message' => $Message);
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
}
if ($MethodGet == "ADMINAUTHORIZATION") {
    try {
        $Authorizedno = $_SESSION["Authorizedno"];
        $Display = array('Authorizedno' => $Authorizedno);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
if ($MethodGet == 'FETCHCLIENT') {
    try {
        $Clientid = $_SESSION['Clientid'];
        $GetChapter = "SELECT * FROM indsys1001clientmaster where Clientid ='$Clientid'  ORDER BY Clientid";
        $result_Chapter = $conn->query($GetChapter);
        if (mysqli_num_rows($result_Chapter) > 0) {
            while ($row = mysqli_fetch_array($result_Chapter)) {
                $Clientname = $row['Clientname'];
                $Location = $row['Location'];
                $Phoneno = $row['Phoneno'];
                $Emailid = $row['Emailid'];
                $GSTN = $row['GSTN'];
                $Tin = $row['Tin'];
                $Emailpassword = $row['Emailpassword'];
                $Regnno = $row['Regnno'];
                $Panno = $row['Panno'];
                $AddressLine1 = $row['AddressLine1'];
                $AddressLine2 = $row['AddressLine2'];
                $AddressLine3 = $row['AddressLine3'];
                $Country = $row['Country'];
                $City = $row['City'];
                $Zipcode = $row['Zipcode'];
                $Website = $row['Website'];
                $ClientnameTamil = $row['ClientnameTamil'];
                $ClientnameHindi = $row['ClientnameHindi'];
                $ClientLogo = $row['ClientLogo'];
                $Place = $row['Place'];
                $Busroute = $row['Busroute'];
            }
        }
        $Display = array('Clientname' => $Clientname, 'Location' => $Location, 'Phoneno' => $Phoneno, 'Emailid' => $Emailid, 'GSTN' => $GSTN, 'Tin' => $Tin, 'Emailpassword' => $Emailpassword, 'Regnno' => $Regnno, 'Panno' => $Panno, 'AddressLine1' => $AddressLine1, 'AddressLine2' => $AddressLine2, 'AddressLine3' => $AddressLine3, 'Country' => $Country, 'City' => $City, 'Zipcode' => $Zipcode, 'Website' => $Website, 'ClientnameTamil' => $ClientnameTamil, 'ClientnameHindi' => $ClientnameHindi, 'ClientLogo' => $ClientLogo, 'Place' => $Place, 'Clientid' => $Clientid, 'Busroute' =>$Busroute);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
if ($MethodGet == 'PageSession') {
    $Message = $Sessionid;
    $Display = array('Message' => $Message,);
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
}
if ($MethodGet == 'cat3emp') {
    $GetState = "SELECT * FROM indsys1017employeemaster where Type_Of_Posistion='Category 3' and EmpActive ='Active' AND Clientid ='$Clientid'  ORDER BY EmpAutogenerationno";
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
if ($MethodGet == "fetchTamilHindi") {
    $Employeeid = $form_data["Employeeid"];
    $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid LIMIT 1";
    $result_Chapter = $conn->query($GetChapter);
    if (mysqli_num_rows($result_Chapter) > 0) {
        while ($row = mysqli_fetch_array($result_Chapter)) {
            $Empformstamilpath = $row['Empformstamilpath'];
            $Empformshindipath = $row['Empformshindipath'];
        }
    }
    $Display = array('Empformstamilpath' => $Empformstamilpath, 'Empformshindipath' => $Empformshindipath);
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
}

// DK EDIT  leave count
if ($MethodGet == "LEAVECOUNT") {
 
    $current_year = date("Y");
    $previous_year = $current_year-1;

    $Employeeid = $form_data["Employeeid"];
    $EmpDepartment = $form_data["EmpDepartment"];
    $DepartmentHeadid=''; $ReportToEmpName=''; $ReportToPosistion='';

    $ReportToQry = "SELECT * FROM indsys1017employeemaster WHERE Clientid ='$Clientid' AND Employeeid ='$Employeeid' LIMIT 1";
    $result_ReportToQry = $conn->query($ReportToQry);
    if (mysqli_num_rows($result_ReportToQry) > 0) {
        while ($row = mysqli_fetch_array($result_ReportToQry)) {
            $ReportToPosistion = $row['Type_Of_Posistion'];
            $ReportToFirstTitle = $row['Title'];
            $ReportToFullname = $row['Fullname'];
        }
    }
    if($ReportToPosistion=='Category 1'){
        $GMQry = "SELECT * FROM indsys1000useradmin WHERE Clientid ='$Clientid' AND Authorizedtype='General Manager' LIMIT 1";
        $result_GMQry = $conn->query($GMQry);
        if (mysqli_num_rows($result_GMQry) > 0) {
            while ($row = mysqli_fetch_array($result_GMQry)) {
                $ReportToEmpName_t = $row['Username'];
            }
        }
        $ReportToEmpName = "Mr. $ReportToEmpName_t";
    }
    else{

        $DeptHeadQry = "SELECT * FROM indsys1017departmentheaddetail WHERE Clientid ='$Clientid' AND Department ='$EmpDepartment' LIMIT 1";
        $result_DeptHeadQry = $conn->query($DeptHeadQry);
        if (mysqli_num_rows($result_DeptHeadQry) > 0) {
            while ($row = mysqli_fetch_array($result_DeptHeadQry)) {
                $DepartmentHeadid = $row['Employeeid'];
            }
        }

        $ReportToQry2 = "SELECT * FROM indsys1017employeemaster WHERE Clientid ='$Clientid' AND Employeeid ='$DepartmentHeadid' LIMIT 1";
        $result_ReportToQry2 = $conn->query($ReportToQry2);
        if (mysqli_num_rows($result_ReportToQry2) > 0) {
            while ($row = mysqli_fetch_array($result_ReportToQry2)
            ) {
                $ReportToFirstTitle = $row['Title'];
                $ReportToFullname = $row['Fullname'];
            }
        }

        $ReportToEmpName = "$ReportToFirstTitle $ReportToFullname";
    }
        

    $GetLeaveCount = "SELECT SUM(Workeddays) AS TotalWorkingdays, SUM(TakenEL) AS TotalTakenEL, SUM(LOP) AS TotalLOPdays FROM indsys1026employeepayrolltempmasterdetail WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' AND Salyear IN ('$previous_year','$current_year') AND ( (Salyear = '$previous_year' AND SalMonth IN ('March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')) OR (Salyear = '$current_year' AND SalMonth IN ('January', 'February', 'March')) ) ORDER BY FIELD(SalMonth, 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'January', 'February', 'March')";
    $result_GetLeaveCount = $conn->query($GetLeaveCount);
    if (mysqli_num_rows($result_GetLeaveCount) > 0) {
        while ($row = mysqli_fetch_array($result_GetLeaveCount)) {
            $TotalWorkingdays = $row['TotalWorkingdays'];
            $TotalTakenEL = $row['TotalTakenEL'];
            $TotalLOPdays = $row['TotalLOPdays'];
        }
    }



    $Display = array('ReportToEmpName' => $ReportToEmpName, 'TotalWorkingdays' => $TotalWorkingdays, 'TotalTakenEL' => $TotalTakenEL, 'TotalLOPdays' => $TotalLOPdays, 'current_year' => $current_year, 'previous_year' => $previous_year);
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
}   //DK EDIT

if ($MethodGet == 'FETCHAUTHORIZATION') {
    try {
        $Authorizedno = $_SESSION["Authorizedno"];
        $Display = array('Authorization' => $Authorizedno,);
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    catch(Exception $e) {
    }
}
if ($MethodGet == 'EsslUnique') {
    try {
        $Old_Empid = $form_data["Old_Empid"];
        $Message = "No";
        if (mysqli_connect_errno()) {
            $Message = "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
        $resultExists = "SELECT * FROM indsys1017employeemaster WHERE Old_Empid = '$Old_Empid' AND Clientid='$Clientid' LIMIT 1";
        $resultExists01 = $conn->query($resultExists);
        if (mysqli_num_rows($resultExists01) > 0) {
            $Message = "NOTUNIQUE";
        } else {
            $Message = "No";
        }
        $Display = array('Message' => $Message);
        $str = json_encode($Display);
        echo trim($str, '"');
    }
    catch(Exception $e) {
    }
}
if ($MethodGet == "BANKIFSC") {
  $IFSCcode = $form_data['IFSCcode'];
  $json = @file_get_contents("https://ifsc.razorpay.com/" . $IFSCcode);
  $arr = json_decode($json);
  $Message = "NVerified";
  if (isset($arr->BRANCH)) {
      $Message = "IFSCVerified";
      $Display = array('Message' => $Message,);
      $str = json_encode($Display);
      echo trim($str, '"');
      return;
  } else {
      $Message = "NotValid";
      $Display = array('Message' => $Message,);
      $str = json_encode($Display);
      echo trim($str, '"');
      return;
  }
}
?>