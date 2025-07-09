<?php
include '../config.php';

session_start();

  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Candidate";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$Candidateid = 1004;

    $CandidateArray1 = "SELECT * FROM indsys1013candidatemaster  Where Candidateid='$Candidateid' LIMIT 1";
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


//  print_r($CandidateData1);
//  echo "<br/><br/>";

//           print_r($CandidateData2);

//  echo "<br/><br/>";

 $array_diff_result=array_diff($CandidateData2, $CandidateData1);



 print_r($array_diff_result);
 echo "<br/><br/>";


//  $value = current($array_diff_result);

// //  $key = key($array_diff_result);

// foreach($myArray as $key=>$value)
// {
//    echo $Key;
//    echo "<br/><br/>";
// }
$newarraytest = array_unique($array_diff_result);
$i=0;

$ModifiedValue = "";
$orignalvalue ="";
foreach($array_diff_result as $key => $value){
 
    //echo $key . " : " . $value . "<br>";
    // $removeduplicate = array_unique($value);

    //  echo $key . " : " . $removeduplicate . "<br>";
 $key_temp = $key;
    $key_temp = preg_replace('/[0-9]+/', '', $key_temp);
      
      $GetChapter = "SELECT * FROM indsys1013candidatemaster where Clientid ='$Clientid' and Candidateid = '$Candidateid'  ORDER BY Candidateid";
      $result_Chapter = $conn->query($GetChapter );
      if(mysqli_num_rows($result_Chapter) > 0) { 
  
        
      while($row = mysqli_fetch_array($result_Chapter)) {  
    $ModifiedValue = $row[$key_temp];
    // echo $key_temp . " : " . $ModifiedValue . "<br>";

      }
    }


    $GetChapterss = "SELECT * FROM indsys1013candidatemasterhistory where Clientid ='$Clientid' and Candidateid = '1004' AND Logid ='$Sno' ORDER BY Candidateid";
    $result_Chapterss = $conn->query($GetChapterss );
    if(mysqli_num_rows($result_Chapterss) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapterss)) {  
  $orignalvalue = $row[$key_temp];
   echo $key_temp . " : " . $ModifiedValue . " : "  .$orignalvalue .  "<br>";

    }
  }



//echo  implode(' ',array_unique(explode(' ', $value))) . "<br>";
    //echo $key . "<br>";
}

// foreach($newarraytest as $key => $value){
//     echo  $value . "<br>";
//  }





 echo "<br/><br/>";






?>

