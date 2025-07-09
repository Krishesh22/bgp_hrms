<?php 
include '../config.php';
error_reporting(0);
require_once ('class.phpmailer.php');
include ("class.smtp.php");
require_once('../Tcpdf/examples/tcpdf_include.php');
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


 if($MethodGet == 'FITNEXT')
{


try
{

    $Candidateid =$form_data['Candidateid'];
   
   

    $Sno = 0;

        $resultExistsnew = "SELECT Nextno FROM vwcandidatefitmentnextno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);

        if (mysqli_fetch_row($resultExists01new))
        {

            $GetChapter = "SELECT * FROM vwcandidatefitmentnextno WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid'  ";
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


if($MethodGet == 'SaveUpdateFitment')
{
    $Candidateid =$form_data['Candidateid'];
    $FitNextno =$form_data['FitNextno'];
    $CurMotBasicDA =$form_data['CurMotBasicDA'];
    $CurMotHRA =$form_data['CurMotHRA'];
    $CurMotSpecialAllowance =$form_data['CurMotSpecialAllowance'];
    $CurMotTotalAllowance =$form_data['CurMotTotalAllowance'];
    $CurMotPFemployeer =$form_data['CurMotPFemployeer'];
    $CurMotGratuity =$form_data['CurMotGratuity'];
    $CurMotRetairlsTotal =$form_data['CurMotRetairlsTotal'];
    $CurMotGAC =$form_data['CurMotGAC'];
    $CurMotEstimatedBonous =$form_data['CurMotEstimatedBonous'];
    $CurMotOtherBonous =$form_data['CurMotOtherBonous'];
    $CurMotCTC =$form_data['CurMotCTC'];
    $CurMotDeductions =$form_data['CurMotDeductions'];
    $CurMotESIC =$form_data['CurMotESIC'];
    $CurMotPFemployee =$form_data['CurMotPFemployee'];
    $CurMotCanteen =$form_data['CurMotCanteen'];
    $CurMotStayAllowance =$form_data['CurMotStayAllowance'];
    $CurMotTravelAllowance =$form_data['CurMotTravelAllowance'];
    $CurMotOtherDeductions =$form_data['CurMotOtherDeductions'];
    $CurMotDeductionTotal =$form_data['CurMotDeductionTotal'];
    $CurMottakehomewithouttax =$form_data['CurMottakehomewithouttax'];
    $CurAnnuaBasicDA =$form_data['CurAnnuaBasicDA'];
    $CurAnnuaHRA =$form_data['CurAnnuaHRA'];
    $CurAnnuaSpecialAllowance =$form_data['CurAnnuaSpecialAllowance'];
    $CurAnnuaTotalAllowance =$form_data['CurAnnuaTotalAllowance'];
    $CurAnnuaPFemployeer =$form_data['CurAnnuaPFemployeer'];
    $CurAnnuaGratuity =$form_data['CurAnnuaGratuity'];
    $CurAnnuaRetairlsTotal =$form_data['CurAnnuaRetairlsTotal'];
    $CurAnnuaGAC =$form_data['CurAnnuaGAC'];
    $CurAnnuaEstimatedBonous =$form_data['CurAnnuaEstimatedBonous'];
    $CurAnnuaOtherBonous =$form_data['CurAnnuaOtherBonous'];
    $CurAnnuaCTC =$form_data['CurAnnuaCTC'];
    $CurAnnuaDeductions =$form_data['CurAnnuaDeductions'];
    $CurAnnuaESIC =$form_data['CurAnnuaESIC'];
    $CurAnnuaPFemployee =$form_data['CurAnnuaPFemployee'];
    $CurAnnuaCanteen =$form_data['CurAnnuaCanteen'];
    $CurAnnuaStayAllowance =$form_data['CurAnnuaStayAllowance'];
    $CurAnnuaTravelAllowance =$form_data['CurAnnuaTravelAllowance'];
    $CurAnnuaOtherDeductions =$form_data['CurAnnuaOtherDeductions'];
    $CurAnnuaDeductionTotal =$form_data['CurAnnuaDeductionTotal'];
    $CurAnnuatakehomewithouttax =$form_data['CurAnnuatakehomewithouttax'];
    $CurincperBasicDA =$form_data['CurincperBasicDA'];
    $CurincperHRA =$form_data['CurincperHRA'];
    $CurincperSpecialAllowance =$form_data['CurincperSpecialAllowance'];
    $CurincperTotalAllowance =$form_data['CurincperTotalAllowance'];
    $CurincperPFemployeer =$form_data['CurincperPFemployeer'];
    $CurincperGratuity =$form_data['CurincperGratuity'];
    $CurincperRetairlsTotal =$form_data['CurincperRetairlsTotal'];
    $CurincperGAC =$form_data['CurincperGAC'];
    $CurincperEstimatedBonous =$form_data['CurincperEstimatedBonous'];
    $CurincperOtherBonous =$form_data['CurincperOtherBonous'];
    $CurincperCTC =$form_data['CurincperCTC'];
    $CurincperDeductions =$form_data['CurincperDeductions'];
    $CurincperESIC =$form_data['CurincperESIC'];
    $CurincperPFemployee =$form_data['CurincperPFemployee'];
    $CurincperCanteen =$form_data['CurincperCanteen'];
    $CurincperStayAllowance =$form_data['CurincperStayAllowance'];
    $CurincperTravelAllowance =$form_data['CurincperTravelAllowance'];
    $CurincperOtherDeductions =$form_data['CurincperOtherDeductions'];
    $CurincperDeductionTotal =$form_data['CurincperDeductionTotal'];
    $Curincpertakehomewithouttax =$form_data['Curincpertakehomewithouttax'];
    $FitStatus =$form_data['FitStatus'];
    $FitType = $form_data['FitType'];
    $Performanceallowancemonthly =$form_data['Performanceallowancemonthly'];
    $Performanceallowanceyearly =$form_data['Performanceallowanceyearly'];
    
    if (empty($Performanceallowancemonthly) )
    {
      $Performanceallowancemonthly = 0;
    }
    if (empty($Performanceallowanceyearly) )
    {
      $Performanceallowanceyearly = 0;
    }
    if(empty($CurMotRetairlsTotal))
    {
      $CurMotRetairlsTotal=0;
    }
    if(empty($CurMotOtherBonous))
    {
      $CurMotOtherBonous=0;
    }
    if(empty($CurAnnuaOtherBonous))
    {
      $CurAnnuaOtherBonous=0;
    }

    // if (empty($CurMotHRA) || $CurMotHRA==0)
    // {
  
    //     $Message = "Monthly HRA";
  
    //     $Display = array(
    //         'Message' => $Message
    //     );
  
    //     $str = json_encode($Display);
    //     echo trim($str, '"');
    //     return;
    // }

    if (empty($FitType) )
    {
  
        $Message = "FitType";
  
        $Display = array(
            'Message' => $Message
        );
  
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }

    if (empty($CurMotBasicDA) || $CurMotBasicDA==0)
    {
  
        $Message = "Monthly Basic";
  
        $Display = array(
            'Message' => $Message
        );
  
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    if (empty($CurAnnuaBasicDA) || $CurAnnuaBasicDA==0)
    {
  
        $Message = "Annual Basic";
  
        $Display = array(
            'Message' => $Message
        );
  
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    // if (empty($CurAnnuaHRA) || $CurAnnuaHRA==0)
    // {
  
    //     $Message = "Annual HRA";
  
    //     $Display = array(
    //         'Message' => $Message
    //     );
  
    //     $str = json_encode($Display);
    //     echo trim($str, '"');
    //     return;
    // }
  
    if (empty($CurAnnuaGAC) || $CurAnnuaGAC==0)
    {
  
        $Message = "Annual GAC";
  
        $Display = array(
            'Message' => $Message
        );
  
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
  
    if (empty($CurMotGAC) || $CurMotGAC==0)
    {
  
        $Message = "Month GAC";
  
        $Display = array(
            'Message' => $Message
        );
  
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    if (empty($CurMotSpecialAllowance) )
    {
      $CurMotSpecialAllowance =0;
        // $Message = "Month Special Allowance";
  
        // $Display = array(
        //     'Message' => $Message
        // );
  
        // $str = json_encode($Display);
        // echo trim($str, '"');
        // return;
    }
    if (empty($CurAnnuaSpecialAllowance) )
    {
      $CurAnnuaSpecialAllowance = 0;
  
        $Message = "Annua Special Allowance";
  
        // $Display = array(
        //     'Message' => $Message
        // );
  
        // $str = json_encode($Display);
        // echo trim($str, '"');
        // return;
    }
  
    if (empty($CurMottakehomewithouttax) )
    {
  
        $Message = "Monthly Take Home";
  
        $Display = array(
            'Message' => $Message
        );
  
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }



    if (empty($CurAnnuaCTC) || $CurAnnuaCTC==0)
    {
  
        $Message = "Annua CTC";
  
        $Display = array(
            'Message' => $Message
        );
  
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
    if (empty($CurMotCTC) )
    {
      $CurMotCTC=0;
        // $Message = "Month CTC";
  
        // $Display = array(
        //     'Message' => $Message
        // );
  
        // $str = json_encode($Display);
        // echo trim($str, '"');
        // return;
    }
    if (empty($CurAnnuaPFemployee) )
    {
  
      $CurAnnuaPFemployee=0;
    }


    if (empty($CurMotPFemployee) )
    {
  
      $CurMotPFemployee=0;
    }
    
    if (empty($CurMotESIC) )
    {
  
      $CurMotESIC=0;
    }
    if (empty($CurAnnuaESIC) )
    {
  
      $CurAnnuaESIC=0;
    }
    if (empty($CurAnnuaPFemployeer) )
    {
  
      $CurAnnuaPFemployeer=0;
    }
    if (empty($CurMotPFemployeer) )
    {
  
      $CurMotPFemployeer=0;
    }
    if (empty($CurAnnuaDeductions) )
    {
  
      $CurAnnuaDeductions=0;
    }
    if (empty($CurMotDeductions) )
    {
  
      $CurMotDeductions=0;
    }
    if(empty($CurAnnuaOtherBonous))
    {
      $CurAnnuaOtherBonous=0;
    }


    $resultExists = "SELECT Candidateid FROM indsys1017candidatefitmentinformation WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' And Fitmenttype ='$FitType' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
  
    if (mysqli_fetch_row($resultExists01))
    {
  
        $resultExistsss = "Update indsys1017candidatefitmentinformation set 
        CurMotBasicDA ='$CurMotBasicDA',
        CurMotHRA ='$CurMotHRA',
        CurMotSpecialAllowance='$CurMotSpecialAllowance',
        CurMotTotalAllowance='$CurMotTotalAllowance',
        CurMotPFemployeer ='$CurMotPFemployeer',
        CurMotGratuity ='$CurMotGratuity',
        CurMotRetairlsTotal ='$CurMotRetairlsTotal',
        CurMotGAC='$CurMotGAC',
        CurMotEstimatedBonous='$CurMotEstimatedBonous',
        CurMotOtherBonous ='$CurMotOtherBonous',
        CurMotCTC ='$CurMotCTC',
        CurMotDeductions ='$CurMotDeductions',
        CurMotESIC='$CurMotESIC',
        CurMotPFemployee='$CurMotPFemployee',
        CurMotCanteen ='$CurMotCanteen',
        CurMotStayAllowance ='$CurMotStayAllowance',
        CurMotTravelAllowance ='$CurMotTravelAllowance',
        CurMotOtherDeductions='$CurMotOtherDeductions',
        CurMotDeductionTotal='$CurMotDeductionTotal',
        CurMottakehomewithouttax ='$CurMottakehomewithouttax',
        CurAnnuaBasicDA ='$CurAnnuaBasicDA',
        CurAnnuaHRA ='$CurAnnuaHRA',
        CurAnnuaSpecialAllowance='$CurAnnuaSpecialAllowance',
        CurAnnuaTotalAllowance='$CurAnnuaTotalAllowance',
        CurAnnuaPFemployeer ='$CurAnnuaPFemployeer',
        CurAnnuaGratuity ='$CurAnnuaGratuity',
        CurAnnuaRetairlsTotal ='$CurAnnuaRetairlsTotal',
        CurAnnuaGAC='$CurAnnuaGAC',
        CurAnnuaEstimatedBonous='$CurAnnuaEstimatedBonous',
        CurAnnuaOtherBonous ='$CurAnnuaOtherBonous',
        CurAnnuaCTC ='$CurAnnuaCTC',
        CurAnnuaDeductions ='$CurAnnuaDeductions',
        CurAnnuaESIC='$CurAnnuaESIC',
        CurAnnuaPFemployee='$CurAnnuaPFemployee',
        CurAnnuaCanteen ='$CurAnnuaCanteen',
        CurAnnuaStayAllowance ='$CurAnnuaStayAllowance',
        CurAnnuaTravelAllowance ='$CurAnnuaTravelAllowance',
        CurAnnuaOtherDeductions='$CurAnnuaOtherDeductions',
        CurAnnuaDeductionTotal='$CurAnnuaDeductionTotal',
        CurAnnuatakehomewithouttax ='$CurAnnuatakehomewithouttax',
        CurincperBasicDA ='$CurincperBasicDA',
        CurincperHRA ='$CurincperHRA',
        CurincperSpecialAllowance='$CurincperSpecialAllowance',
        CurincperTotalAllowance='$CurincperTotalAllowance',
        CurincperPFemployeer ='$CurincperPFemployeer',
        CurincperGratuity ='$CurincperGratuity',
        CurincperRetairlsTotal ='$CurincperRetairlsTotal',
        CurincperGAC='$CurincperGAC',
        CurincperEstimatedBonous='$CurincperEstimatedBonous',
        CurincperOtherBonous ='$CurincperOtherBonous',
        CurincperCTC='$CurincperCTC',
        CurincperDeductions='$CurincperDeductions',
        CurincperESIC ='$CurincperESIC',
        CurincperPFemployee ='$CurincperPFemployee',
        CurincperCanteen ='$CurincperCanteen',
        CurincperStayAllowance='$CurincperStayAllowance',
        CurincperTravelAllowance='$CurincperTravelAllowance',
        CurincperOtherDeductions ='$CurincperOtherDeductions',
        CurincperDeductionTotal ='$CurincperDeductionTotal',
        Curincpertakehomewithouttax='$Curincpertakehomewithouttax',
        FitStatus='$FitStatus',
        CurincperOtherDeductions ='$CurincperOtherDeductions',    
        Performanceallowanceyearly ='$Performanceallowanceyearly',
        Performanceallowancemonthly ='$Performanceallowancemonthly'
     
       
    WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' And Fitmenttype ='$FitType'  ";
        $resultExists0New = $conn->query($resultExistsss);
        $resultExists = "Update indsys1013candidatemaster set 
       
        Addormodifydatetime ='$date',
        Userid ='$user_id',
        CommitedCTC ='$CurMotGAC'
     
          WHERE Candidateid = ' $Candidateid' AND Clientid = '$Clientid' ";
       $resultExists01 = $conn->query($resultExists);
        $Message = "FitUpdate";
  
    }

    else
    {
        $sqlsave = "INSERT IGNORE INTO indsys1017candidatefitmentinformation (
    Clientid,Candidateid,CurMotBasicDA,CurMotHRA,CurMotSpecialAllowance,CurMotTotalAllowance,
    CurMotPFemployeer,CurMotGratuity,CurMotRetairlsTotal,CurMotGAC,CurMotEstimatedBonous,CurMotOtherBonous,CurMotCTC,CurMotDeductions,
    CurMotESIC,CurMotPFemployee,CurMotCanteen,CurMotStayAllowance,CurMotTravelAllowance,CurMotOtherDeductions,CurMotDeductionTotal,CurMottakehomewithouttax,
    CurAnnuaBasicDA,CurAnnuaHRA,CurAnnuaSpecialAllowance,CurAnnuaTotalAllowance,CurAnnuaPFemployeer,CurAnnuaGratuity,CurAnnuaRetairlsTotal,CurAnnuaGAC,
    CurAnnuaEstimatedBonous,CurAnnuaOtherBonous,CurAnnuaCTC,CurAnnuaDeductions,CurAnnuaESIC,CurAnnuaPFemployee,CurAnnuaCanteen,CurAnnuaStayAllowance,
    CurAnnuaTravelAllowance,CurAnnuaOtherDeductions,CurAnnuaDeductionTotal,CurAnnuatakehomewithouttax,CurincperBasicDA,CurincperHRA,CurincperSpecialAllowance,CurincperTotalAllowance,
    CurincperPFemployeer,CurincperGratuity,CurincperRetairlsTotal,CurincperGAC,CurincperEstimatedBonous,CurincperOtherBonous,CurincperCTC,CurincperDeductions,
    CurincperESIC,CurincperPFemployee,CurincperCanteen,CurincperStayAllowance,CurincperTravelAllowance,CurincperOtherDeductions,CurincperDeductionTotal,Curincpertakehomewithouttax,
    FitStatus,fitno,CurincAmtBasicDA,CurincAmtHRA,CurincAmtSpecialAllowance,CurincAmtTotalAllowance,CurincAmtPFemployeer,CurincAmtGratuity,
    CurincAmtRetairlsTotal,CurincAmtGAC,CurincAmtEstimatedBonous,CurincAmtOtherBonous,CurincAmtCTC,CurincAmtDeductions,CurincAmtESIC,CurincAmtPFemployee,
    CurincAmtCanteen,CurincAmtStayAllowance,CurincAmtTravelAllowance,CurincAmtOtherDeductions,CurincAmtDeductionTotal,CurincAmttakehomewithouttax,Userid,Addormodifydatetime,MDApproval,Fitmenttype,DeptHeadApprovalStatus,GMApprovalStatus,HRApprovalStatus,Performanceallowancemonthly,Performanceallowanceyearly)
     VALUES (
    '$Clientid ','$Candidateid ','$CurMotBasicDA ','$CurMotHRA ','$CurMotSpecialAllowance',
     '$CurMotTotalAllowance ','$CurMotPFemployeer ','$CurMotGratuity ','$CurMotRetairlsTotal ','$CurMotGAC',
     '$CurMotEstimatedBonous ','$CurMotOtherBonous ','$CurMotCTC ','$CurMotDeductions ','$CurMotESIC',
     '$CurMotPFemployee ','$CurMotCanteen ','$CurMotStayAllowance ','$CurMotTravelAllowance ','$CurMotOtherDeductions',
     '$CurMotDeductionTotal ','$CurMottakehomewithouttax ','$CurAnnuaBasicDA ','$CurAnnuaHRA ','$CurAnnuaSpecialAllowance',
     '$CurAnnuaTotalAllowance ','$CurAnnuaPFemployeer ','$CurAnnuaGratuity ','$CurAnnuaRetairlsTotal ','$CurAnnuaGAC',
     '$CurAnnuaEstimatedBonous ','$CurAnnuaOtherBonous ','$CurAnnuaCTC ','$CurAnnuaDeductions ','$CurAnnuaESIC',
     '$CurAnnuaPFemployee ','$CurAnnuaCanteen ','$CurAnnuaStayAllowance ','$CurAnnuaTravelAllowance ','$CurAnnuaOtherDeductions',
     '$CurAnnuaDeductionTotal ','$CurAnnuatakehomewithouttax ','$CurincperBasicDA ','$CurincperHRA ','$CurincperSpecialAllowance',
     '$CurincperTotalAllowance ','$CurincperPFemployeer ','$CurincperGratuity ','$CurincperRetairlsTotal ','$CurincperGAC',
     '$CurincperEstimatedBonous ','$CurincperOtherBonous ','$CurincperCTC ','$CurincperDeductions ','$CurincperESIC',
     '$CurincperPFemployee ','$CurincperCanteen ','$CurincperStayAllowance ','$CurincperTravelAllowance ','$CurincperOtherDeductions',
     '$CurincperDeductionTotal ','$Curincpertakehomewithouttax ','$FitStatus','$FitNextno ',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'$user_id','$date','Pending','$FitType','Pending','Pending','Pending','$Performanceallowancemonthly','$Performanceallowanceyearly')";
        $resultsave = mysqli_query($conn, $sqlsave);
        $resultExists = "Update indsys1013candidatemaster set 
       
         Addormodifydatetime ='$date',
         Userid ='$user_id',
         CommitedCTC ='$CurMotGAC'
      
           WHERE Candidateid = ' $Candidateid' AND Clientid = '$Clientid' ";
        $resultExists01 = $conn->query($resultExists);
     
        $Message = "FitUpdate";
    }
  
  
  
    $Display = array(
       
        'Message' => $Message
    );
  
    $str = json_encode($Display);
    echo trim($str, '"');
   
}


if($MethodGet == 'FetchFIT')
{

    try
    { 
  

      $Candidateid =$form_data['Candidateid'];
      
      $FitNextno =$form_data['FitNextno'];
      $FitType = $form_data['FitType'];
      $_SESSION["Candidateid"] = $Candidateid;
    $GetChapter = "SELECT * FROM indsys1017candidatefitmentinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and Fitmenttype='$FitType' ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $CurMotBasicDA =$row['CurMotBasicDA'];
      $CurMotHRA =$row['CurMotHRA'];
      $CurMotSpecialAllowance = $row['CurMotSpecialAllowance'];
      $CurMotTotalAllowance =$row['CurMotTotalAllowance'];
      $CurMotPFemployeer = $row['CurMotPFemployeer'];
      $CurMotGratuity =$row['CurMotGratuity'];
      $CurMotGAC = $row['CurMotGAC'];
      $CurMotEstimatedBonous =$row['CurMotEstimatedBonous'];
      $CurMotOtherBonous = $row['CurMotOtherBonous'];
      $CurMotCTC = $row['CurMotCTC'];
      $CurMotDeductions =$row['CurMotDeductions'];
      $CurMotESIC = $row['CurMotESIC'];
      $CurMotPFemployee =$row['CurMotPFemployee'];
      $CurMotCanteen =$row['CurMotCanteen'];
      $CurMotStayAllowance =$row['CurMotStayAllowance'];
      $CurMotTravelAllowance = $row['CurMotTravelAllowance'];
      $CurMotOtherDeductions =$row['CurMotOtherDeductions'];
      $CurMotDeductionTotal = $row['CurMotDeductionTotal'];
      $CurMottakehomewithouttax =$row['CurMottakehomewithouttax'];
      $CurAnnuaBasicDA =$row['CurAnnuaBasicDA'];
      $CurAnnuaHRA =$row['CurAnnuaHRA'];
      $CurAnnuaSpecialAllowance =$row['CurAnnuaSpecialAllowance'];
      $CurAnnuaTotalAllowance =$row['CurAnnuaTotalAllowance'];
      $CurAnnuaPFemployeer =$row['CurAnnuaPFemployeer'];
      $CurAnnuaGratuity =$row['CurAnnuaGratuity'];
      $CurAnnuaRetairlsTotal =$row['CurAnnuaRetairlsTotal'];
      $CurAnnuaGAC =$row['CurAnnuaGAC'];
      $CurAnnuaEstimatedBonous = $row['CurAnnuaEstimatedBonous'];
      $CurAnnuaOtherBonous = $row['CurAnnuaOtherBonous'];
      $CurAnnuaCTC =$row['CurAnnuaCTC'];
      $CurAnnuaDeductions =$row['CurAnnuaDeductions'];
      $CurAnnuaESIC =$row['CurAnnuaESIC'];
      $CurAnnuaPFemployee =$row['CurAnnuaPFemployee'];
      $CurAnnuaCanteen =$row['CurAnnuaCanteen'];
      $CurAnnuaStayAllowance = $row['CurAnnuaStayAllowance'];
      $CurAnnuaTravelAllowance =$row['CurAnnuaTravelAllowance'];
      $CurAnnuaOtherDeductions = $row['CurAnnuaOtherDeductions'];
      $CurAnnuaDeductionTotal =$row['CurAnnuaDeductionTotal'];
      $CurAnnuatakehomewithouttax =$row['CurAnnuatakehomewithouttax'];
      $CurincperBasicDA =$row['CurincperBasicDA'];
      $CurincperHRA = $row['CurincperHRA'];
      $CurincperSpecialAllowance =$row['CurincperSpecialAllowance'];
      $CurincperTotalAllowance =$row['CurincperTotalAllowance'];
      $CurincperPFemployeer = $row['CurincperPFemployeer'];
      $CurincperGratuity = $row['CurincperGratuity'];
      $CurincperRetairlsTotal =$row['CurincperRetairlsTotal'];
      $CurincperGAC = $row['CurincperGAC'];
     $CurincperEstimatedBonous=$row['CurincperEstimatedBonous'];
     $CurincperOtherBonous=$row['CurincperOtherBonous'];
     $CurincperCTC=$row['CurincperCTC'];
     $CurincperDeductions=$row['CurincperDeductions'];
     $CurincperESIC=$row['CurincperESIC'];
     $CurincperPFemployee=$row['CurincperPFemployee'];
     $CurincperCanteen=$row['CurincperCanteen'];
     $CurincperStayAllowance=$row['CurincperStayAllowance'];
     $CurincperTravelAllowance =$row['CurincperTravelAllowance'];
     $CurincperOtherDeductions = $row['CurincperOtherDeductions'];
     $CurincperDeductionTotal=$row['CurincperDeductionTotal'];
     $Curincpertakehomewithouttax=$row['Curincpertakehomewithouttax'];
     $FitStatus=$row['FitStatus'];
     $CurMotRetairlsTotal = $row['CurMotRetairlsTotal'];
     $Performanceallowancemonthly=$row['Performanceallowancemonthly'];
     $Performanceallowanceyearly = $row['Performanceallowanceyearly'];
    
     
     
      } 
    }
if(empty($Performanceallowancemonthly))
{
  $Performanceallowancemonthly=0;
}
if(empty($Performanceallowanceyearly))
{
  $Performanceallowanceyearly=0;
}

    $GetChapternew = "SELECT Candidateid  FROM indsys1017candidatefinalfitment WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' ";
    $result_Chapternew = $conn->query($GetChapternew);
    if (mysqli_num_rows($result_Chapternew) > 0)
    {
        while ($row = mysqli_fetch_array($result_Chapternew))
        {
            $FitStatus ='Final';
           
        }
        
    }
    
    $Display=array(
      'CurMotBasicDA'=>  $CurMotBasicDA,
      'CurMotHRA'=> $CurMotHRA,
      'CurMotSpecialAllowance'=>  $CurMotSpecialAllowance,
      'CurMotTotalAllowance'=> $CurMotTotalAllowance,
      'CurMotPFemployeer'=> $CurMotPFemployeer,
      'CurMotGratuity'=> $CurMotGratuity,
      'CurMotEstimatedBonous'=>  $CurMotEstimatedBonous,
      'CurMotGAC'=> $CurMotGAC,
      'CurMotOtherBonous'=>  $CurMotOtherBonous,
      'CurMotCTC'=>  $CurMotCTC,
      'CurMotDeductions'=> $CurMotDeductions,
      'CurMotESIC'=> $CurMotESIC,
      'CurMotPFemployee'=> $CurMotPFemployee,
      'CurMotCanteen'=> $CurMotCanteen,
      'CurMotStayAllowance'=>$CurMotStayAllowance,
      'CurMotTravelAllowance'=> $CurMotTravelAllowance,
      'CurMotDeductionTotal'=> $CurMotDeductionTotal,
      'CurMotOtherDeductions'=> $CurMotOtherDeductions,
      'CurMottakehomewithouttax'=> $CurMottakehomewithouttax,
      'CurAnnuaBasicDA'=>$CurAnnuaBasicDA,
      'CurAnnuaHRA'=>$CurAnnuaHRA,
      'CurAnnuaSpecialAllowance'=>$CurAnnuaSpecialAllowance,
      'CurAnnuaTotalAllowance'=>$CurAnnuaTotalAllowance,
      'CurAnnuaPFemployeer'=>$CurAnnuaPFemployeer,
      'CurAnnuaGratuity'=>$CurAnnuaGratuity,     
      'CurAnnuaRetairlsTotal'=>$CurAnnuaRetairlsTotal,
      'CurAnnuaGAC'=> $CurAnnuaGAC,
      'CurAnnuaEstimatedBonous'=> $CurAnnuaEstimatedBonous,
      'CurAnnuaOtherBonous'=>$CurAnnuaOtherBonous,
      'CurAnnuaCTC'=>$CurAnnuaCTC,
     'CurAnnuaDeductions'=>$CurAnnuaDeductions,
      'CurAnnuaESIC'=>$CurAnnuaESIC,
      'CurAnnuaPFemployee'=>$CurAnnuaPFemployee,
      'CurAnnuaCanteen'=> $CurAnnuaCanteen,
      'CurAnnuaStayAllowance'=>$CurAnnuaStayAllowance,
      'CurAnnuaTravelAllowance'=> $CurAnnuaTravelAllowance,
      'CurAnnuaOtherDeductions'=>$CurAnnuaOtherDeductions,
      'CurAnnuaDeductionTotal'=>$CurAnnuaDeductionTotal,
      'CurAnnuatakehomewithouttax'=>$CurAnnuatakehomewithouttax,
     'CurincperBasicDA'=> $CurincperBasicDA,
      'CurincperHRA'=>$CurincperHRA,
    'CurincperSpecialAllowance'=>$CurincperSpecialAllowance,
     'CurincperTotalAllowance'=> $CurincperTotalAllowance,
     'CurincperPFemployeer'=> $CurincperPFemployeer,
     'CurincperGratuity'=>$CurincperGratuity,
     'CurincperGAC'=> $CurincperGAC,
    'CurincperEstimatedBonous'=>$CurincperEstimatedBonous,
    'CurincperOtherBonous'=>$CurincperOtherBonous,
   'CurincperCTC'=>$CurincperCTC,
    'CurincperDeductions'=>$CurincperDeductions,
    'CurincperESIC' =>$CurincperESIC,
    'CurincperPFemployee' =>$CurincperPFemployee,
    'CurincperCanteen' =>$CurincperCanteen,
    'CurincperStayAllowance' =>$CurincperStayAllowance,
    'CurincperTravelAllowance' =>$CurincperTravelAllowance,
    'CurincperOtherDeductions'=> $CurincperOtherDeductions,
    'CurincperDeductionTotal'=>$CurincperDeductionTotal,
    'CurincperDeductionTotal'=> $CurincperDeductionTotal,
   'Curincpertakehomewithouttax'=>$Curincpertakehomewithouttax,
   'CurincperRetairlsTotal'=>$CurincperRetairlsTotal,
   'FitStatus'=>$FitStatus,
   'CurMotRetairlsTotal' =>$CurMotRetairlsTotal,
   'Performanceallowancemonthly' =>$Performanceallowancemonthly,
   'Performanceallowanceyearly' =>$Performanceallowanceyearly
 
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }

 //////////////////////////////////////////////////
 if($MethodGet == 'FITDISPLAY')
{


try
{

    $Candidateid =$form_data['Candidateid'];
   
   
    
    $data01 =[];
   
    $GetState = "SELECT * FROM indsys1017candidatefitmentinformation where Candidateid = '$Candidateid' AND Clientid = '$Clientid' ORDER BY Candidateid";
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

////////////////////////////////////////////
if($MethodGet == 'FITCALCULATION')
{

    try
    { 
  

      $CurAnnuaGAC =$form_data['CurAnnuaGAC'];
      $Performanceallowancemonthly =$form_data['Performanceallowancemonthly'];
      $CurMotCanteen =0;
      $CurMotStayAllowance =0;
      $CurMotTravelAllowance =0;
      $CurMotOtherDeductions =0;
      $CurMotOtherBonous =0;
      $CurMotGAC =0;
      $CurAnnuaTravelAllowance = 0;

     if(empty($CurMotGAC))
     {
      $CurMotGAC =0;
     }
     if(empty($Performanceallowancemonthly))
     {
      $Performanceallowancemonthly =0;
     }

     $Performanceallowanceyearly = $Performanceallowancemonthly*12;
     //$CurAnnuaGAC = $CurAnnuaGAC+ $Performanceallowanceyearly;



if(empty($CurMotStayAllowance))
{
  $CurMotStayAllowance=0;
}
if(empty($CurMotTravelAllowance))
{
 $CurMotTravelAllowance =0;
}
if(empty($CurMotCanteen))
{
 $CurMotCanteen =0;
}
if(empty($CurMotOtherDeductions))
{
 $CurMotOtherDeductions =0;
}
if(empty($CurMotOtherBonous))
{
 $CurMotOtherBonous =0;
}
if(empty($CurAnnuaOtherBonous))
{
 $CurAnnuaOtherBonous =0;
}
/////////////////DELHI BGP FITMENT
if($Clientid==4)
{
  $CurAnnuaBasicDA = ($CurAnnuaGAC*(60/100));
  $CurMotBasicDA =round($CurAnnuaBasicDA/12);
  $CurAnnuaHRA = ($CurAnnuaBasicDA*(30/100));
  $CurMotHRA =round($CurAnnuaHRA/12);
  $CurAnnuaSpecialAllowance = ($CurAnnuaGAC-($CurAnnuaBasicDA+$CurAnnuaHRA));
  $CurMotSpecialAllowance = round($CurAnnuaSpecialAllowance/12);
  $CurMotTotalAllowance = $CurMotSpecialAllowance+ $Performanceallowancemonthly;
  $CurAnnuaTotalAllowance = $CurAnnuaSpecialAllowance+$Performanceallowanceyearly;
  $CurMotGAC = $CurMotBasicDA+$CurMotHRA+$CurMotTotalAllowance;
  $CurMotTotalAllowance = round($CurAnnuaTotalAllowance/12) ;
  $CurAnnuaPFemployeer =(($CurAnnuaBasicDA+$CurAnnuaSpecialAllowance)*(12/100));
  $CurMotPFemployeer = 0;
  
  $CurMotPFemployee = ($CurAnnuaPFemployeer/12 );
  $CurAnnuaPFemployee =0;
  $CurAnnuaGratuity = round(($CurAnnuaBasicDA)*(5/100));
  $CurMotGratuity = 0;
  
  $CurMotRetairlsTotal = $CurMotGratuity +$CurMotPFemployeer;
  $CurAnnuaRetairlsTotal = $CurAnnuaPFemployeer+$CurAnnuaGratuity;
  if($CurMotGAC<21000)
  {
    $CurMotESIC=ROUND(0.0075*($CurMotGAC));
    $CurAnnuaESIC = 0;
  
  }
      
  else
  {
    $CurMotESIC = 0;
    $CurAnnuaESIC =0;
  }
  $CurMotDeductionTotal = $CurMotCanteen+$CurMotOtherDeductions+$CurMotESIC+$CurMotOtherBonous+$CurMotTravelAllowance+$CurMotPFemployee;
  
  $CurAnnuaDeductionTotal = 0;
  $CurMottakehomewithouttax =$CurMotGAC-$CurMotDeductionTotal;
  $CurAnnuatakehomewithouttax = 0;
  $CurMotEstimatedBonous = 0;
  $CurAnnuaEstimatedBonous = round(0.0833*$CurAnnuaBasicDA);
  $CurMotCTC =0;
  
  $CurAnnuaCTC = $CurAnnuaEstimatedBonous+$CurAnnuaGAC;
}
/////////////////////OtherClients
else
{
  $CurAnnuaBasicDA = ($CurAnnuaGAC*(70/100));
$CurMotBasicDA =round($CurAnnuaBasicDA/12);
$CurAnnuaHRA = ($CurAnnuaBasicDA*(40/100));
$CurMotHRA =round($CurAnnuaHRA/12);
$CurAnnuaSpecialAllowance = ($CurAnnuaGAC-($CurAnnuaBasicDA+$CurAnnuaHRA));
$CurMotSpecialAllowance = round($CurAnnuaSpecialAllowance/12);
$CurMotTotalAllowance = $CurMotSpecialAllowance+ $Performanceallowancemonthly;
$CurAnnuaTotalAllowance = $CurAnnuaSpecialAllowance+$Performanceallowanceyearly;
$CurMotGAC = $CurMotBasicDA+$CurMotHRA+$CurMotTotalAllowance;
$CurMotTotalAllowance = round($CurAnnuaTotalAllowance/12) ;
$CurAnnuaPFemployeer =(($CurAnnuaBasicDA+$CurAnnuaSpecialAllowance)*(12/100));
$CurMotPFemployeer = 0;

$CurMotPFemployee = ($CurAnnuaPFemployeer/12 );
$CurAnnuaPFemployee =0;
$CurAnnuaGratuity = round(($CurAnnuaBasicDA)*(5/100));
$CurMotGratuity = 0;

$CurMotRetairlsTotal = $CurMotGratuity +$CurMotPFemployeer;
$CurAnnuaRetairlsTotal = $CurAnnuaPFemployeer+$CurAnnuaGratuity;
if($CurMotGAC<21000)
{
  $CurMotESIC=ROUND(0.0075*($CurMotGAC));
  $CurAnnuaESIC = 0;

}
    
else
{
  $CurMotESIC = 0;
  $CurAnnuaESIC =0;
}
$CurMotDeductionTotal = $CurMotCanteen+$CurMotOtherDeductions+$CurMotESIC+$CurMotOtherBonous+$CurMotTravelAllowance+$CurMotPFemployee;

$CurAnnuaDeductionTotal = 0;
$CurMottakehomewithouttax =$CurMotGAC-$CurMotDeductionTotal;
$CurAnnuatakehomewithouttax = 0;
$CurMotEstimatedBonous = 0;
$CurAnnuaEstimatedBonous = round(0.0833*$CurAnnuaBasicDA);
$CurMotCTC =0;

$CurAnnuaCTC = $CurAnnuaEstimatedBonous+$CurAnnuaGAC;
}

    $Display=array(
     
 'CurMotBasicDA' =>$CurMotBasicDA,
 'CurAnnuaBasicDA' =>$CurAnnuaBasicDA,
 'CurMotHRA' =>$CurMotHRA,
 'CurAnnuaHRA' =>$CurAnnuaHRA,
 'CurMotSpecialAllowance' =>$CurMotSpecialAllowance,
 'CurAnnuaSpecialAllowance' =>$CurAnnuaSpecialAllowance,
 'CurAnnuaGAC' =>$CurAnnuaGAC,
 'CurMotTotalAllowance' =>$CurMotTotalAllowance,
 'CurAnnuaTotalAllowance' =>$CurAnnuaTotalAllowance,
 'CurMotPFemployeer' =>$CurMotPFemployeer,
 'CurAnnuaPFemployeer' =>$CurAnnuaPFemployeer,
 'CurMotGratuity' =>$CurMotGratuity,
 'CurAnnuaGratuity' =>$CurAnnuaGratuity,
 'CurMotRetairlsTotal' =>$CurMotRetairlsTotal,
 'CurAnnuaRetairlsTotal' =>$CurAnnuaRetairlsTotal,
 'CurMotDeductionTotal' =>$CurMotDeductionTotal,
 'CurAnnuaDeductionTotal' =>$CurAnnuaDeductionTotal,
 'CurMottakehomewithouttax' =>$CurMottakehomewithouttax,
 'CurAnnuatakehomewithouttax' =>$CurAnnuatakehomewithouttax,
 'CurMotEstimatedBonous' =>$CurMotEstimatedBonous,
 'CurAnnuaEstimatedBonous' =>$CurAnnuaEstimatedBonous,
 'CurMotCTC' =>$CurMotCTC,
 'CurAnnuaCTC' =>$CurAnnuaCTC,
 'CurMotESIC' =>$CurMotESIC,
 'CurAnnuaESIC' =>$CurAnnuaESIC,
 'CurMotCTC' =>$CurMotCTC,
 'CurMotPFemployee' =>$CurMotPFemployee,
 'CurAnnuaPFemployee' =>$CurAnnuaPFemployee,
 'CurMotGAC' =>$CurMotGAC,
 'Performanceallowanceyearly' =>$Performanceallowanceyearly,
 'CurAnnuaOtherBonous' =>$CurAnnuaOtherBonous,
 'CurAnnuaTravelAllowance' =>$CurAnnuaTravelAllowance
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }
///////////////////
if($MethodGet == 'FITOPEN')
{


try
{

    $Candidateid =$form_data['Candidateid'];
   
   

   $Message="No";
$Maxno =0;
      
$GetChapternew = "SELECT Candidateid  FROM indsys1017candidatefinalfitment WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid'";
$result_Chapternew = $conn->query($GetChapternew);
if (mysqli_num_rows($result_Chapternew) > 0)
{
    while ($row = mysqli_fetch_array($result_Chapternew))
    {
        $FitStatus ='Final';
        $Message =$FitStatus;
    }
    
}

            // $GetChapter = "SELECT MAX(fitno) as FitMax  FROM indsys1017candidatefitmentinformation WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid'  ";
            // $result_Chapter = $conn->query($GetChapter);
            // if (mysqli_num_rows($result_Chapter) > 0)
            // {
            //     while ($row = mysqli_fetch_array($result_Chapter))
            //     {
            //         $Maxno = $row['FitMax'];

            //     }
            
            // $GetChapternew = "SELECT FitStatus  FROM indsys1017candidatefitmentinformation WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' and   fitno ='$Maxno'";
            // $result_Chapternew = $conn->query($GetChapternew);
            // if (mysqli_num_rows($result_Chapternew) > 0)
            // {
            //     while ($row = mysqli_fetch_array($result_Chapternew))
            //     {
            //         $FitStatus = $row['FitStatus'];
            //         $Message =$FitStatus;
            //     }
                
            // }
          

        
        else
        {
          $Message ="No";
        }





 

 $Display=array('Message' => $Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
////////////////////////
if($MethodGet == 'FinalMove')
{

  try
  { 


    $Candidateid =$form_data['Candidateid'];
    
    $FitNextno =$form_data['FitNextno'];
   
  $GetChapter = "SELECT * FROM indsys1017candidatefitmentinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and fitno='$FitNextno' ORDER BY Candidateid";
  $result_Chapter = $conn->query($GetChapter );
  if(mysqli_num_rows($result_Chapter) > 0) { 
    
  while($row = mysqli_fetch_array($result_Chapter)) {  
    $CurMotBasicDA =$row['CurMotBasicDA'];
    $CurMotHRA =$row['CurMotHRA'];
    $CurMotSpecialAllowance = $row['CurMotSpecialAllowance'];
    $CurMotTotalAllowance =$row['CurMotTotalAllowance'];
    $CurMotPFemployeer = $row['CurMotPFemployeer'];
    $CurMotGratuity =$row['CurMotGratuity'];
    $CurMotGAC = $row['CurMotGAC'];
    $CurMotEstimatedBonous =$row['CurMotEstimatedBonous'];
    $CurMotOtherBonous = $row['CurMotOtherBonous'];
    $CurMotCTC = $row['CurMotCTC'];
    $CurMotDeductions =$row['CurMotDeductions'];
    $CurMotESIC = $row['CurMotESIC'];
    $CurMotPFemployee =$row['CurMotPFemployee'];
    $CurMotCanteen =$row['CurMotCanteen'];
    $CurMotStayAllowance =$row['CurMotStayAllowance'];
    $CurMotTravelAllowance = $row['CurMotTravelAllowance'];
    $CurMotOtherDeductions =$row['CurMotOtherDeductions'];
    $CurMotDeductionTotal = $row['CurMotDeductionTotal'];
    $CurMottakehomewithouttax =$row['CurMottakehomewithouttax'];
    $CurAnnuaBasicDA =$row['CurAnnuaBasicDA'];
    $CurAnnuaHRA =$row['CurAnnuaHRA'];
    $CurAnnuaSpecialAllowance =$row['CurAnnuaSpecialAllowance'];
    $CurAnnuaTotalAllowance =$row['CurAnnuaTotalAllowance'];
    $CurAnnuaPFemployeer =$row['CurAnnuaPFemployeer'];
    $CurAnnuaGratuity =$row['CurAnnuaGratuity'];
    $CurAnnuaRetairlsTotal =$row['CurAnnuaRetairlsTotal'];
    $CurAnnuaGAC =$row['CurAnnuaGAC'];
    $CurAnnuaEstimatedBonous = $row['CurAnnuaEstimatedBonous'];
    $CurAnnuaOtherBonous = $row['CurAnnuaOtherBonous'];
    $CurAnnuaCTC =$row['CurAnnuaCTC'];
    $CurAnnuaDeductions =$row['CurAnnuaDeductions'];
    $CurAnnuaESIC =$row['CurAnnuaESIC'];
    $CurAnnuaPFemployee =$row['CurAnnuaPFemployee'];
    $CurAnnuaCanteen =$row['CurAnnuaCanteen'];
    $CurAnnuaStayAllowance = $row['CurAnnuaStayAllowance'];
    $CurAnnuaTravelAllowance =$row['CurAnnuaTravelAllowance'];
    $CurAnnuaOtherDeductions = $row['CurAnnuaOtherDeductions'];
    $CurAnnuaDeductionTotal =$row['CurAnnuaDeductionTotal'];
    $CurAnnuatakehomewithouttax =$row['CurAnnuatakehomewithouttax'];
    $CurincperBasicDA =$row['CurincperBasicDA'];
    $CurincperHRA = $row['CurincperHRA'];
    $CurincperSpecialAllowance =$row['CurincperSpecialAllowance'];
    $CurincperTotalAllowance =$row['CurincperTotalAllowance'];
    $CurincperPFemployeer = $row['CurincperPFemployeer'];
    $CurincperGratuity = $row['CurincperGratuity'];
    $CurincperRetairlsTotal =$row['CurincperRetairlsTotal'];
    $CurincperGAC = $row['CurincperGAC'];
   $CurincperEstimatedBonous=$row['CurincperEstimatedBonous'];
   $CurincperOtherBonous=$row['CurincperOtherBonous'];
   $CurincperCTC=$row['CurincperCTC'];
   $CurincperDeductions=$row['CurincperDeductions'];
   $CurincperESIC=$row['CurincperESIC'];
   $CurincperPFemployee=$row['CurincperPFemployee'];
   $CurincperCanteen=$row['CurincperCanteen'];
   $CurincperStayAllowance=$row['CurincperStayAllowance'];
   $CurincperTravelAllowance =$row['CurincperTravelAllowance'];
   $CurincperOtherDeductions = $row['CurincperOtherDeductions'];
   $CurincperDeductionTotal=$row['CurincperDeductionTotal'];
   $Curincpertakehomewithouttax=$row['Curincpertakehomewithouttax'];
   $Performanceallowancemonthly=$row['Performanceallowancemonthly'];
   $Performanceallowanceyearly=$row['Performanceallowanceyearly'];

   if(empty($Performanceallowancemonthly))
   {
     $Performanceallowancemonthly =0;
   }
   if(empty($Performanceallowanceyearly))
   {
     $Performanceallowanceyearly =0;
   }
   $FitStatus=$row['FitStatus'];
   $CurMotRetairlsTotal = $row['CurMotRetairlsTotal'];
   $sqlsave = "INSERT IGNORE INTO indsys1017candidatefinalfitment (
    Clientid,Candidateid,CurMotBasicDA,CurMotHRA,CurMotSpecialAllowance,CurMotTotalAllowance,
    CurMotPFemployeer,CurMotGratuity,CurMotRetairlsTotal,CurMotGAC,CurMotEstimatedBonous,CurMotOtherBonous,CurMotCTC,CurMotDeductions,
    CurMotESIC,CurMotPFemployee,CurMotCanteen,CurMotStayAllowance,CurMotTravelAllowance,CurMotOtherDeductions,CurMotDeductionTotal,CurMottakehomewithouttax,
    CurAnnuaBasicDA,CurAnnuaHRA,CurAnnuaSpecialAllowance,CurAnnuaTotalAllowance,CurAnnuaPFemployeer,CurAnnuaGratuity,CurAnnuaRetairlsTotal,CurAnnuaGAC,
    CurAnnuaEstimatedBonous,CurAnnuaOtherBonous,CurAnnuaCTC,CurAnnuaDeductions,CurAnnuaESIC,CurAnnuaPFemployee,CurAnnuaCanteen,CurAnnuaStayAllowance,
    CurAnnuaTravelAllowance,CurAnnuaOtherDeductions,CurAnnuaDeductionTotal,CurAnnuatakehomewithouttax,CurincperBasicDA,CurincperHRA,CurincperSpecialAllowance,CurincperTotalAllowance,
    CurincperPFemployeer,CurincperGratuity,CurincperRetairlsTotal,CurincperGAC,CurincperEstimatedBonous,CurincperOtherBonous,CurincperCTC,CurincperDeductions,
    CurincperESIC,CurincperPFemployee,CurincperCanteen,CurincperStayAllowance,CurincperTravelAllowance,CurincperOtherDeductions,CurincperDeductionTotal,Curincpertakehomewithouttax,
   CurincAmtBasicDA,CurincAmtHRA,CurincAmtSpecialAllowance,CurincAmtTotalAllowance,CurincAmtPFemployeer,CurincAmtGratuity,
    CurincAmtRetairlsTotal,CurincAmtGAC,CurincAmtEstimatedBonous,CurincAmtOtherBonous,CurincAmtCTC,CurincAmtDeductions,CurincAmtESIC,CurincAmtPFemployee,
    CurincAmtCanteen,CurincAmtStayAllowance,CurincAmtTravelAllowance,CurincAmtOtherDeductions,CurincAmtDeductionTotal,CurincAmttakehomewithouttax,Userid,Addormodifydatetime,Performanceallowanceyearly,Performanceallowancemonthly)
     VALUES (
    '$Clientid ','$Candidateid ','$CurMotBasicDA ','$CurMotHRA ','$CurMotSpecialAllowance',
     '$CurMotTotalAllowance','$CurMotPFemployeer ','$CurMotGratuity ','$CurMotRetairlsTotal ','$CurMotGAC',
     '$CurMotEstimatedBonous ','$CurMotOtherBonous ','$CurMotCTC ','$CurMotDeductions ','$CurMotESIC',
     '$CurMotPFemployee ','$CurMotCanteen ','$CurMotStayAllowance ','$CurMotTravelAllowance ','$CurMotOtherDeductions',
     '$CurMotDeductionTotal ','$CurMottakehomewithouttax ','$CurAnnuaBasicDA ','$CurAnnuaHRA ','$CurAnnuaSpecialAllowance',
     '$CurAnnuaTotalAllowance ','$CurAnnuaPFemployeer ','$CurAnnuaGratuity ','$CurAnnuaRetairlsTotal ','$CurAnnuaGAC',
     '$CurAnnuaEstimatedBonous ','$CurAnnuaOtherBonous ','$CurAnnuaCTC ','$CurAnnuaDeductions ','$CurAnnuaESIC',
     '$CurAnnuaPFemployee ','$CurAnnuaCanteen ','$CurAnnuaStayAllowance ','$CurAnnuaTravelAllowance ','$CurAnnuaOtherDeductions',
     '$CurAnnuaDeductionTotal ','$CurAnnuatakehomewithouttax ','$CurincperBasicDA ','$CurincperHRA ','$CurincperSpecialAllowance',
     '$CurincperTotalAllowance ','$CurincperPFemployeer ','$CurincperGratuity ','$CurincperRetairlsTotal ','$CurincperGAC',
     '$CurincperEstimatedBonous ','$CurincperOtherBonous ','$CurincperCTC ','$CurincperDeductions ','$CurincperESIC',
     '$CurincperPFemployee ','$CurincperCanteen ','$CurincperStayAllowance ','$CurincperTravelAllowance ','$CurincperOtherDeductions',
     '$CurincperDeductionTotal ','$Curincpertakehomewithouttax ',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'$user_id','$date','$Performanceallowanceyearly','$Performanceallowancemonthly')";
        $resultsave = mysqli_query($conn, $sqlsave);
        $resultExists = "Update indsys1013candidatemaster set        
        Addormodifydatetime ='$date',
        Userid ='$user_id',
        CommitedCTC ='$CurMotGAC'     
          WHERE Candidateid = ' $Candidateid' ";
       $resultExists01 = $conn->query($resultExists);
        $Message = "Update";
   
   
    } 
  }



  
  $Display=array(
    


);
 
$str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}


 
}
////////////////////
if($MethodGet == 'FetchApprove')
{

    try
    { 
  

      $Candidateid =$form_data['Candidateid'];
      
      $FitNextno =$form_data['FitNextno'];
      $_SESSION["Candidateid"] = $Candidateid;
    $GetChapter = "SELECT * FROM indsys1017candidatefitmentinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and fitno='$FitNextno' ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $FitStatus =$row['FitStatus'];
      $MDApproval =$row['MDApproval'];
      
    
     
     
      } 
    }


 
    
    $Display=array(
      'FitStatus'=>  $FitStatus,
      'MDApproval'=> $MDApproval,
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }

 ///////////////////////////
 if($MethodGet == 'UpdateApprove')
{
    $Candidateid =$form_data['Candidateid'];
    $FitNextno =$form_data['FitNextno'];
    $MDApproval =$form_data['MDApproval'];
    $FitStatus =$form_data['FitStatus'];
    if($MDApproval=="Cancel")
    {
      $FitStatus="Cancel";
    }
   

 
  
  
  
    $resultExists = "SELECT Candidateid FROM indsys1017candidatefitmentinformation WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' And fitno ='$FitNextno' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
  
    if (mysqli_fetch_row($resultExists01))
    {
  
        $resultExistsss = "Update indsys1017candidatefitmentinformation set 
        MDApproval ='$MDApproval',
        FitStatus='$FitStatus',
        MDApprovalID ='$user_id',
        CurMotSpecialAllowance='$CurMotSpecialAllowance',
        MDApprovaldatetime='$date',
        MDApprovalname ='$username',
        Addormodifydatetime='$date',
        Userid ='$user_id'
       
    WHERE Candidateid = '$Candidateid' AND fitno ='$FitNextno'
  
    AND Clientid ='$Clientid'  ";
        $resultExists0New = $conn->query($resultExistsss);
        $Message = "FitUpdate";
  
    }

  
  
  
  
    $Display = array(
       
        'Message' => $Message
    );
  
    $str = json_encode($Display);
    echo trim($str, '"');
   
}
/////////////////////////////////////////
/////////////////////////////////////////////////////////
if($MethodGet == 'FetchReport')
{

try
{ 

$ReportingToid =$form_data['ReportingToid'];  
$GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$ReportingToid' ";
$result_Chapter = $conn->query($GetChapter );
if(mysqli_num_rows($result_Chapter) > 0) { 
while($row = mysqli_fetch_array($result_Chapter)) {  
  $Title =$row['Title'];
  $Fullname = $row['Fullname'];
  $Reportingname ="$Title $Fullname";    
  } 
}
$Display=array('Reportingname'=>  $Reportingname );   
$str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
}

if($MethodGet == 'FetchReportCat')
{

try
{ 

$ReportingToid =$form_data['ReportingToid'];  
$GetChapter = "SELECT * FROM indsys1000useradmin where Clientid ='$Clientid' and Userid = '$ReportingToid' ";
$result_Chapter = $conn->query($GetChapter );
if(mysqli_num_rows($result_Chapter) > 0) { 
while($row = mysqli_fetch_array($result_Chapter)) {  
  $Title =$row['Title'];
  $Fullname = $row['Usename'];
  $Reportingname ="$Title $Fullname";    
  } 
}
$Display=array('Reportingname'=>  $Reportingname );   
$str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
}
 /////////////////////////////////


////////////////////////////////////////

 /////////////////////////////////
 if($MethodGet == 'MailContent')
{


try
{

  $Candidateid =$form_data['Candidateid'];
  $FitNextno =$form_data['FitNextno'];
  
    $Reportingname ="";
    $ReportingToid ="";   
    $Business ="";
    $Designationproposed ="";
    $Department ="";
    $Location ="";
    $Title ="";
    $Firstname ="";
    $Lastname ="";
    $CurMotBasicDA ="";
    $CurMotHRA ="";
    $CurMotSpecialAllowance = "";
    $CurMotTotalAllowance ="";
    $CurMotPFemployeer = "";
    $CurMotGratuity ="";
    $CurMotGAC = "";
    $CurMotEstimatedBonous ="";
    $CurMotOtherBonous = "";
    $CurMotCTC ="";
    $CurMotDeductions ="";
    $CurMotESIC ="";
    $CurMotPFemployee ="";
    $CurMotCanteen ="";
    $CurMotStayAllowance ="";
    $CurMotTravelAllowance = "";
    $CurMotOtherDeductions ="";
    $CurMotDeductionTotal = "";
    $CurMottakehomewithouttax ="";
    $CurAnnuaBasicDA ="";
    $CurAnnuaHRA ="";
    $CurAnnuaSpecialAllowance ="";
    $CurAnnuaTotalAllowance ="";
    $CurAnnuaPFemployeer ="";
    $CurAnnuaGratuity ="";
    $CurAnnuaRetairlsTotal ="";
    $CurAnnuaGAC ="";
    $CurAnnuaEstimatedBonous = "";
    $CurAnnuaOtherBonous = "";
    $CurAnnuaCTC ="";
    $CurAnnuaDeductions ="";
    $CurAnnuaESIC ="";
    $CurAnnuaPFemployee ="";
    $CurAnnuaCanteen ="";
    $CurAnnuaStayAllowance = "";
    $CurAnnuaTravelAllowance ="";
    $CurAnnuaOtherDeductions = "";
    $CurAnnuaDeductionTotal ="";
    $CurAnnuatakehomewithouttax ="";
    $CurincperBasicDA ="";
    $CurincperHRA = "";
    $CurincperSpecialAllowance ="";
    $CurincperTotalAllowance ="";
    $CurincperPFemployeer = "";
    $CurincperGratuity ="";
    $CurincperRetairlsTotal ="";
    $CurincperGAC = "";
   $CurincperEstimatedBonous="";
   $CurincperOtherBonous="";
   $CurincperCTC="";
   $CurincperDeductions="";
   $CurincperESIC="";
   $CurincperPFemployee="";
   $CurincperCanteen="";
   $CurincperStayAllowance="";
   $CurincperTravelAllowance ="";
   $CurincperOtherDeductions = "";
   $CurincperDeductionTotal="";
   $Curincpertakehomewithouttax="";
   $DOJ ="";
   $FitStatus="";
  
    $GetChapter = "SELECT * FROM indsys1013candidatemaster where Clientid ='$Clientid' and Candidateid = '$Candidateid'  ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Title =$row['Title'];
      $Firstname =$row['Firstname'];
      $Lastname = $row['Lastname'];     
     $Reportingname=$row['ReportingTo'];
     $ReportingToid=$row['ReportingToid'];
     $Business=$row['Bussiness'];
     $Designationproposed =$row['Designationproposed'];
     $Location = $row['Location'];
     $Department = $row['Department'];
     $DOJ=$row['Date_Of_Joing'];
     
      } 
    }
    $Usermailid = "";

    $GetSuperusermail = "SELECT * FROM indsys1000adminrights where Clientid ='$Clientid' and UserType = 'Super User'  LIMIT 1";
    $result_Supermail = $conn->query($GetSuperusermail );
    if(mysqli_num_rows($result_Supermail) > 0) { 

      
    while($row = mysqli_fetch_array($result_Supermail)) {  
      $Usermailid =$row['Usermailid'];
      
     
      } 
    }
    $DOJ = date("d-M-Y", strtotime( $DOJ));

    $GetChapter02 = "SELECT * FROM indsys1017candidatefitmentinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and fitno='$FitNextno' ORDER BY Candidateid";
    $result_Chapter02 = $conn->query($GetChapter02 );
    if(mysqli_num_rows($result_Chapter02) > 0) { 
      
    while($row = mysqli_fetch_array($result_Chapter02)) {  
      $CurMotBasicDA =$row['CurMotBasicDA'];
      $CurMotHRA =$row['CurMotHRA'];
      $CurMotSpecialAllowance = $row['CurMotSpecialAllowance'];
      $CurMotTotalAllowance =$row['CurMotTotalAllowance'];
      $CurMotPFemployeer = $row['CurMotPFemployeer'];
      $CurMotGratuity =$row['CurMotGratuity'];
      $CurMotGAC = $row['CurMotGAC'];
      $CurMotEstimatedBonous =$row['CurMotEstimatedBonous'];
      $CurMotOtherBonous = $row['CurMotOtherBonous'];
      $CurMotCTC = $row['CurMotCTC'];
      $CurMotDeductions =$row['CurMotDeductions'];
      $CurMotESIC = $row['CurMotESIC'];
      $CurMotPFemployee =$row['CurMotPFemployee'];
      $CurMotCanteen =$row['CurMotCanteen'];
      $CurMotStayAllowance =$row['CurMotStayAllowance'];
      $CurMotTravelAllowance = $row['CurMotTravelAllowance'];
      $CurMotOtherDeductions =$row['CurMotOtherDeductions'];
      $CurMotDeductionTotal = $row['CurMotDeductionTotal'];
      $CurMottakehomewithouttax =$row['CurMottakehomewithouttax'];
      $CurAnnuaBasicDA =$row['CurAnnuaBasicDA'];
      $CurAnnuaHRA =$row['CurAnnuaHRA'];
      $CurAnnuaSpecialAllowance =$row['CurAnnuaSpecialAllowance'];
      $CurAnnuaTotalAllowance =$row['CurAnnuaTotalAllowance'];
      $CurAnnuaPFemployeer =$row['CurAnnuaPFemployeer'];
      $CurAnnuaGratuity =$row['CurAnnuaGratuity'];
      $CurAnnuaRetairlsTotal =$row['CurAnnuaRetairlsTotal'];
      $CurAnnuaGAC =$row['CurAnnuaGAC'];
      $CurAnnuaEstimatedBonous = $row['CurAnnuaEstimatedBonous'];
      $CurAnnuaOtherBonous = $row['CurAnnuaOtherBonous'];
      $CurAnnuaCTC =$row['CurAnnuaCTC'];
      $CurAnnuaDeductions =$row['CurAnnuaDeductions'];
      $CurAnnuaESIC =$row['CurAnnuaESIC'];
      $CurAnnuaPFemployee =$row['CurAnnuaPFemployee'];
      $CurAnnuaCanteen =$row['CurAnnuaCanteen'];
      $CurAnnuaStayAllowance = $row['CurAnnuaStayAllowance'];
      $CurAnnuaTravelAllowance =$row['CurAnnuaTravelAllowance'];
      $CurAnnuaOtherDeductions = $row['CurAnnuaOtherDeductions'];
      $CurAnnuaDeductionTotal =$row['CurAnnuaDeductionTotal'];
      $CurAnnuatakehomewithouttax =$row['CurAnnuatakehomewithouttax'];
      $CurincperBasicDA =$row['CurincperBasicDA'];
      $CurincperHRA = $row['CurincperHRA'];
      $CurincperSpecialAllowance =$row['CurincperSpecialAllowance'];
      $CurincperTotalAllowance =$row['CurincperTotalAllowance'];
      $CurincperPFemployeer = $row['CurincperPFemployeer'];
      $CurincperGratuity = $row['CurincperGratuity'];
      $CurincperRetairlsTotal =$row['CurincperRetairlsTotal'];
      $CurincperGAC = $row['CurincperGAC'];
     $CurincperEstimatedBonous=$row['CurincperEstimatedBonous'];
     $CurincperOtherBonous=$row['CurincperOtherBonous'];
     $CurincperCTC=$row['CurincperCTC'];
     $CurincperDeductions=$row['CurincperDeductions'];
     $CurincperESIC=$row['CurincperESIC'];
     $CurincperPFemployee=$row['CurincperPFemployee'];
     $CurincperCanteen=$row['CurincperCanteen'];
     $CurincperStayAllowance=$row['CurincperStayAllowance'];
     $CurincperTravelAllowance =$row['CurincperTravelAllowance'];
     $CurincperOtherDeductions = $row['CurincperOtherDeductions'];
     $CurincperDeductionTotal=$row['CurincperDeductionTotal'];
     $Curincpertakehomewithouttax=$row['Curincpertakehomewithouttax'];
     $FitStatus=$row['FitStatus'];
    
     
     
      } 
    }

    // $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
$Basic = number_format((float)$CurAnnuaBasicDA,2);
$HRA=number_format((float)$CurAnnuaHRA,2);
$Special=number_format((float)$CurAnnuaSpecialAllowance,2);
$TotalAllowance=number_format((float)$CurAnnuaTotalAllowance,2);
$PF=number_format((float)$CurAnnuaPFemployeer,2);
$Gratuity=number_format((float)$CurAnnuaGratuity,2);
$RetairalsTotal=number_format((float)$CurAnnuaRetairlsTotal,2);
$GAC=number_format((float)$CurAnnuaGAC,2);
$EstimatedBonous = number_format((float)$CurAnnuaEstimatedBonous,2);
$CTC=number_format((float)$CurAnnuaCTC,2);

$htmlcontent = '
    <center><img src ="../assets/images/logo/logo.png" style="height:110px"/><p style="font-size:16px;color:green;"><i>Together forward</i></p></center>
    
    <p style="font-size:15px;font-weight:bold;margin-bottom:0px"><u>OFFER</u></p>
    
    
    <table>
    <tbody>
    <tr><td style="width:150px">Name</td><td style="width:10px">:</td><td>'."$Title$Firstname $Lastname".'</td></tr>
    <tr><td>Business & Location</td><td>:</td><td>'."$Business & $Location".'</td></tr>
    <tr><td>Department</td><td>:</td><td>'."$Department".'</td></tr>
    <tr><td>Offered Designation</td><td>:</td><td>'."$Designationproposed".'</td></tr>
    <tr><td>Reporting To</td><td>:</td><td>'."$Reportingname".'</td></tr>
    </tbody>
    </table>
    <br/></br>
    
    <style>
    .data-table table, 
    .data-table td, 
    .data-table th {
      border: 0.2px solid #000000;
    }
    .data-table table {
      width: 100%;
      border-collapse: collapse;
    }
    </style>
    
    <div class="data-table">
    <table style="font-size:10px;padding:5px 3px">
    <tbody>
    <tr  align="center" bgcolor="#daeef3" style="font-weight:bold"><td  style="width:260px">Components</td><td  style="width:140px">Amount (Rs.)</td><td>Reference No.  for Notes</td></tr>
    
    <tr bgcolor="#d9d9d9" ><td>Basic &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(A)</td><td align="right">'."$Basic".'</td><td>-</td></tr>
    
    <tr  bgcolor="#d9d9d9"><td>HRA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(B)</td><td align="right">'."$HRA".'</td><td>-</td></tr>
    
    <tr><td  bgcolor="#d9d9d9"><u>Total Allowances</u></td><td></td><td></td></tr>
    <tr><td>Special Allowance</td><td align="right">'."$Special".'</td><td></td></tr>
    <tr  bgcolor="#d9d9d9"><td>Total Allowances Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(C)</td><td align="right">'."$TotalAllowance".'</td><td>-</td></tr> 
    <tr><td  bgcolor="#d9d9d9"><u>Retirals</u></td><td></td><td></td></tr>  
    <tr><td>PF @ 12% of Basic (A)</td><td align="right">'."$PF".'</td><td></td></tr>   
    <tr><td>Gratuity @ 5% of Basic (A)</td><td align="right">'."$Gratuity".'</td><td></td></tr>
    <tr  bgcolor="#d9d9d9"><td>Retirals Total  (D)</td><td align="right">'."$RetairalsTotal".'</td><td>-</td></tr>
    <tr  bgcolor="#60497a" color="#ffffff"><td>"Gross Annual Compensation<br/>(A+B+C+D)"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(E)</td><td align="right">'."$GAC".'</td><td>-</td></tr>
    <tr  bgcolor="#ffffcc"><td>Estimated Variable Bonus @ 8.33% of GAC (A)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(F)</td><td align="right">'."$EstimatedBonous".'</td><td>-</td></tr>
    <tr  bgcolor="#00b050"  color="#ffffff"><td>Estimated CTC (E+F) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(G)</td><td align="right">'."$CTC".'</td><td>-</td></tr>
    </tbody>
    </table>
    
    <br/>
    <p><b><u>Note:</u></b></p>
    
    <div class="data-table">
    <table style="font-size:10px;padding:10px 5px">
    <tbody>
    <tr><td  style="width:565px">
    Bonus has been estimated @ 8.33% of Individual basic considering the Incentive Trend in the last 3 years for budgeted Individual and Business performance and variable pay has been estimated considering the 100% target achievement. The actual incentive will be calculated based on Individual and Business performance for the given year and can be variable as per management decision. The bonus amount is paid annually.
    </td>
                   
    
    </tr>
    </tbody>
    </table>
    
    
    </div>
    
    
    
    
      
    
    
    
    
    
    
    ';
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
                        <p>Please find attached, Offer Letter of the candidate $Title$Firstname $Lastname for the position $Designationproposed .

Kindly check and provide your approval to release the offer letter to the respective candidate.</p>

$htmlcontent

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
              <td align='center' class='content-block'><br/>
              <small><span class='apple-link'>Britannia Garment Packaging Pvt Ltd</span></small>
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



 $Display=array('htmlcontent' =>$Mailcontent);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
//////////////////////////////////////////
if($MethodGet=="MAIL")
{
  $ToMail = $form_data['ToMail'];
  $SubjectMail = $form_data['SubjectMail'];
  $htmlContent = $form_data['MessageMail'];
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
      $mail->SetFrom('indsystesting@gmail.com', 'BRITANNIA');
      $mail->AddReplyTo('indsystesting@gmail.com', 'BRITANNIA');
      $mail->Subject =  $SubjectMail ;
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
  catch(Exception $e)
  {

  }

}

/////////////////////////////
if($MethodGet == 'MailContentCAN')
{


try
{

  $Candidateid =$form_data['Candidateid'];
  $FitNextno =$form_data['FitNextno'];
  
    $Reportingname ="";
    $ReportingToid ="";   
    $Business ="";
    $Designationproposed ="";
    $Department ="";
    $Location ="";
    $Title ="";
    $Firstname ="";
    $Lastname ="";
    $CurMotBasicDA ="";
    $CurMotHRA ="";
    $CurMotSpecialAllowance = "";
    $CurMotTotalAllowance ="";
    $CurMotPFemployeer = "";
    $CurMotGratuity ="";
    $CurMotGAC = "";
    $CurMotEstimatedBonous ="";
    $CurMotOtherBonous = "";
    $CurMotCTC ="";
    $CurMotDeductions ="";
    $CurMotESIC ="";
    $CurMotPFemployee ="";
    $CurMotCanteen ="";
    $CurMotStayAllowance ="";
    $CurMotTravelAllowance = "";
    $CurMotOtherDeductions ="";
    $CurMotDeductionTotal = "";
    $CurMottakehomewithouttax ="";
    $CurAnnuaBasicDA ="";
    $CurAnnuaHRA ="";
    $CurAnnuaSpecialAllowance ="";
    $CurAnnuaTotalAllowance ="";
    $CurAnnuaPFemployeer ="";
    $CurAnnuaGratuity ="";
    $CurAnnuaRetairlsTotal ="";
    $CurAnnuaGAC ="";
    $CurAnnuaEstimatedBonous = "";
    $CurAnnuaOtherBonous = "";
    $CurAnnuaCTC ="";
    $CurAnnuaDeductions ="";
    $CurAnnuaESIC ="";
    $CurAnnuaPFemployee ="";
    $CurAnnuaCanteen ="";
    $CurAnnuaStayAllowance = "";
    $CurAnnuaTravelAllowance ="";
    $CurAnnuaOtherDeductions = "";
    $CurAnnuaDeductionTotal ="";
    $CurAnnuatakehomewithouttax ="";
    $CurincperBasicDA ="";
    $CurincperHRA = "";
    $CurincperSpecialAllowance ="";
    $CurincperTotalAllowance ="";
    $CurincperPFemployeer = "";
    $CurincperGratuity ="";
    $CurincperRetairlsTotal ="";
    $CurincperGAC = "";
   $CurincperEstimatedBonous="";
   $CurincperOtherBonous="";
   $CurincperCTC="";
   $CurincperDeductions="";
   $CurincperESIC="";
   $CurincperPFemployee="";
   $CurincperCanteen="";
   $CurincperStayAllowance="";
   $CurincperTravelAllowance ="";
   $CurincperOtherDeductions = "";
   $CurincperDeductionTotal="";
   $Curincpertakehomewithouttax="";
   $DOJ ="";
   $FitStatus="";
  
    $GetChapter = "SELECT * FROM indsys1013candidatemaster where Clientid ='$Clientid' and Candidateid = '$Candidateid'  ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Title =$row['Title'];
      $Firstname =$row['Firstname'];
      $Lastname = $row['Lastname'];     
     $Reportingname=$row['ReportingTo'];
     $ReportingToid=$row['ReportingToid'];
     $Business=$row['Bussiness'];
     $Designationproposed =$row['Designationproposed'];
     $Location = $row['Location'];
     $Department = $row['Department'];
     $DOJ=$row['Date_Of_Joing'];
     
      } 
    }

    $DOJ = date("d-M-Y", strtotime( $DOJ));

    $GetChapter02 = "SELECT * FROM indsys1017candidatefitmentinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and fitno='$FitNextno' ORDER BY Candidateid";
    $result_Chapter02 = $conn->query($GetChapter02 );
    if(mysqli_num_rows($result_Chapter02) > 0) { 
      
    while($row = mysqli_fetch_array($result_Chapter02)) {  
      $CurMotBasicDA =$row['CurMotBasicDA'];
      $CurMotHRA =$row['CurMotHRA'];
      $CurMotSpecialAllowance = $row['CurMotSpecialAllowance'];
      $CurMotTotalAllowance =$row['CurMotTotalAllowance'];
      $CurMotPFemployeer = $row['CurMotPFemployeer'];
      $CurMotGratuity =$row['CurMotGratuity'];
      $CurMotGAC = $row['CurMotGAC'];
      $CurMotEstimatedBonous =$row['CurMotEstimatedBonous'];
      $CurMotOtherBonous = $row['CurMotOtherBonous'];
      $CurMotCTC = $row['CurMotCTC'];
      $CurMotDeductions =$row['CurMotDeductions'];
      $CurMotESIC = $row['CurMotESIC'];
      $CurMotPFemployee =$row['CurMotPFemployee'];
      $CurMotCanteen =$row['CurMotCanteen'];
      $CurMotStayAllowance =$row['CurMotStayAllowance'];
      $CurMotTravelAllowance = $row['CurMotTravelAllowance'];
      $CurMotOtherDeductions =$row['CurMotOtherDeductions'];
      $CurMotDeductionTotal = $row['CurMotDeductionTotal'];
      $CurMottakehomewithouttax =$row['CurMottakehomewithouttax'];
      $CurAnnuaBasicDA =$row['CurAnnuaBasicDA'];
      $CurAnnuaHRA =$row['CurAnnuaHRA'];
      $CurAnnuaSpecialAllowance =$row['CurAnnuaSpecialAllowance'];
      $CurAnnuaTotalAllowance =$row['CurAnnuaTotalAllowance'];
      $CurAnnuaPFemployeer =$row['CurAnnuaPFemployeer'];
      $CurAnnuaGratuity =$row['CurAnnuaGratuity'];
      $CurAnnuaRetairlsTotal =$row['CurAnnuaRetairlsTotal'];
      $CurAnnuaGAC =$row['CurAnnuaGAC'];
      $CurAnnuaEstimatedBonous = $row['CurAnnuaEstimatedBonous'];
      $CurAnnuaOtherBonous = $row['CurAnnuaOtherBonous'];
      $CurAnnuaCTC =$row['CurAnnuaCTC'];
      $CurAnnuaDeductions =$row['CurAnnuaDeductions'];
      $CurAnnuaESIC =$row['CurAnnuaESIC'];
      $CurAnnuaPFemployee =$row['CurAnnuaPFemployee'];
      $CurAnnuaCanteen =$row['CurAnnuaCanteen'];
      $CurAnnuaStayAllowance = $row['CurAnnuaStayAllowance'];
      $CurAnnuaTravelAllowance =$row['CurAnnuaTravelAllowance'];
      $CurAnnuaOtherDeductions = $row['CurAnnuaOtherDeductions'];
      $CurAnnuaDeductionTotal =$row['CurAnnuaDeductionTotal'];
      $CurAnnuatakehomewithouttax =$row['CurAnnuatakehomewithouttax'];
      $CurincperBasicDA =$row['CurincperBasicDA'];
      $CurincperHRA = $row['CurincperHRA'];
      $CurincperSpecialAllowance =$row['CurincperSpecialAllowance'];
      $CurincperTotalAllowance =$row['CurincperTotalAllowance'];
      $CurincperPFemployeer = $row['CurincperPFemployeer'];
      $CurincperGratuity = $row['CurincperGratuity'];
      $CurincperRetairlsTotal =$row['CurincperRetairlsTotal'];
      $CurincperGAC = $row['CurincperGAC'];
     $CurincperEstimatedBonous=$row['CurincperEstimatedBonous'];
     $CurincperOtherBonous=$row['CurincperOtherBonous'];
     $CurincperCTC=$row['CurincperCTC'];
     $CurincperDeductions=$row['CurincperDeductions'];
     $CurincperESIC=$row['CurincperESIC'];
     $CurincperPFemployee=$row['CurincperPFemployee'];
     $CurincperCanteen=$row['CurincperCanteen'];
     $CurincperStayAllowance=$row['CurincperStayAllowance'];
     $CurincperTravelAllowance =$row['CurincperTravelAllowance'];
     $CurincperOtherDeductions = $row['CurincperOtherDeductions'];
     $CurincperDeductionTotal=$row['CurincperDeductionTotal'];
     $Curincpertakehomewithouttax=$row['Curincpertakehomewithouttax'];
     $FitStatus=$row['FitStatus'];
    
     
     
      } 
    }

    // $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
$Basic = number_format((float)$CurAnnuaBasicDA,2);
$HRA=number_format((float)$CurAnnuaHRA,2);
$Special=number_format((float)$CurAnnuaSpecialAllowance,2);
$TotalAllowance=number_format((float)$CurAnnuaTotalAllowance,2);
$PF=number_format((float)$CurAnnuaPFemployeer,2);
$Gratuity=number_format((float)$CurAnnuaGratuity,2);
$RetairalsTotal=number_format((float)$CurAnnuaRetairlsTotal,2);
$GAC=number_format((float)$CurAnnuaGAC,2);
$EstimatedBonous = number_format((float)$CurAnnuaEstimatedBonous,2);
$CTC=number_format((float)$CurAnnuaCTC,2);
$htmlcontent = '
    <center><img src ="../assets/images/logo/logo.jpg" style="height:110px"/><p style="font-size:16px;color:green;"><i>Together forward</i></p></center>
    
    <p style="font-size:15px;font-weight:bold;margin-bottom:0px"><u>OFFER</u></p>
    
    
    <table>
    <tbody>
    <tr><td style="width:150px">Name</td><td style="width:10px">:</td><td>'."$Title$Firstname $Lastname".'</td></tr>
    <tr><td>Business & Location</td><td>:</td><td>'."$Business & $Location".'</td></tr>
    <tr><td>Department</td><td>:</td><td>'."$Department".'</td></tr>
    <tr><td>Offered Designation</td><td>:</td><td>'."$Designationproposed".'</td></tr>
    <tr><td>Reporting To</td><td>:</td><td>'."$Reportingname".'</td></tr>
    </tbody>
    </table>
    <br/></br>
    
    <style>
    .data-table table, 
    .data-table td, 
    .data-table th {
      border: 0.2px solid #000000;
    }
    .data-table table {
      width: 100%;
      border-collapse: collapse;
    }
    </style>
    
    <div class="data-table">
    <table style="font-size:10px;padding:5px 3px">
    <tbody>
    <tr  align="center" bgcolor="#daeef3" style="font-weight:bold"><td  style="width:260px">Components</td><td  style="width:140px">Amount (Rs.)</td><td>Reference No.  for Notes</td></tr>
    
    <tr bgcolor="#d9d9d9" ><td>Basic &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(A)</td><td align="right">'."$Basic".'</td><td>-</td></tr>
    
    <tr  bgcolor="#d9d9d9"><td>HRA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(B)</td><td align="right">'."$HRA".'</td><td>-</td></tr>
    
    <tr><td  bgcolor="#d9d9d9"><u>Total Allowances</u></td><td></td><td></td></tr>
    <tr><td>Special Allowance</td><td align="right">'."$Special".'</td><td></td></tr>
    <tr  bgcolor="#d9d9d9"><td>Total Allowances Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(C)</td><td align="right">'."$TotalAllowance".'</td><td>-</td></tr> 
    <tr><td  bgcolor="#d9d9d9"><u>Retirals</u></td><td></td><td></td></tr>  
    <tr><td>PF @ 12% of Basic (A)</td><td align="right">'."$PF".'</td><td></td></tr>   
    <tr><td>Gratuity @ 5% of Basic (A)</td><td align="right">'."$Gratuity".'</td><td></td></tr>
    <tr  bgcolor="#d9d9d9"><td>Retirals Total  (D)</td><td align="right">'."$RetairalsTotal".'</td><td>-</td></tr>
    <tr  bgcolor="#60497a" color="#ffffff"><td>"Gross Annual Compensation<br/>(A+B+C+D)"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(E)</td><td align="right">'."$GAC".'</td><td>-</td></tr>
    <tr  bgcolor="#ffffcc"><td>Estimated Variable Bonus @ 8.33% of GAC (A)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(F)</td><td align="right">'."$EstimatedBonous".'</td><td>-</td></tr>
    <tr  bgcolor="#00b050"  color="#ffffff"><td>Estimated CTC (E+F) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(G)</td><td align="right">'."$CTC".'</td><td>-</td></tr>
    </tbody>
    </table>
    
    <br/>
    <p><b><u>Note:</u></b></p>
    
    <div class="data-table">
    <table style="font-size:10px;padding:10px 5px">
    <tbody>
    <tr><td  style="width:565px">
    Bonus has been estimated @ 8.33% of Individual basic considering the Incentive Trend in the last 3 years for budgeted Individual and Business performance and variable pay has been estimated considering the 100% target achievement. The actual incentive will be calculated based on Individual and Business performance for the given year and can be variable as per management decision. The bonus amount is paid annually.
    </td>
                   
    
    </tr>
    </tbody>
    </table>
    
    
    </div>
    
    
    
    
      
    
    
    
    
    
    
    ';
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
                      <p>Greetings from Britannia Garment Packaging Private Limited.</p>
                      <p>With respect to the interviews held with us previously, we’re glad to present to you an offer for the position of <b>$Designationproposed</b></p>
                      <p>Kindly find attached, Offer letter for your acceptance.</p>
                      <p>Kindly confirm your Date of Joining by replying to this email.</p>
                      <p>Once again, Welcome to Britannia Garment Packaging Private Limited. Hope to see you grow along with our company.</p>


                                           $htmlcontent



                 
                      </td>
                    </tr>
                    <tr>
                    <td>Click<a target='_blank' href='$domain/HRM09/AppoinmentApproval.php?Candidateid=$Candidateid&Clientid=$Clientid'> Here </a>For Confirmation</td>
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

<span class='apple-link'>Britannia Garment Packaging Pvt Ltd</span></small>
              
              
              
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
    

 $Display=array('htmlcontent' =>$Mailcontent);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
/////////////////////////


/////////////////////////////
if($MethodGet == 'FetchOLDEMP')
{

    try
    { 
  

      $OldEmpid =$form_data['OldEmpid'];
  
    $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$OldEmpid' ";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 


    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Title =$row['Title'];
      $Fullname = $row['Fullname'];
      $OldEmpName ="$Title $Fullname";
      $PreviousDesignation =$row['Designation'];
      $PreviousDepartment =$row['Department'];
      $Date_Of_Joing = $row['Date_Of_Joing'];
      $LeftDate  =$row['Leftdate'] ;
      $Workingperiod ="$Date_Of_Joing to $LeftDate ";
      $Releivingreason =$row['Leftreason'];
     
     
     
     
     
      } 
    }


 
    
    $Display=array(
      'OldEmpName'=>  $OldEmpName,
      'PreviousDesignation' =>$PreviousDesignation,
      'PreviousDepartment' =>$PreviousDepartment,
      'Workingperiod' =>$Workingperiod,
      'Releivingreason' =>$Releivingreason
    
   
     
      
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }
 //////////////////////
 if($MethodGet == 'Report')
{


try
{

  $Candidateid =$form_data['Candidateid'];
  $FitNextno =$form_data['FitNextno'];
  
    $Reportingname ="";
    $ReportingToid ="";   
    $Business ="";
    $Designationproposed ="";
    $Department ="";
    $Location ="";
    $Title ="";
    $Firstname ="";
    $Lastname ="";
    $CurMotBasicDA ="";
    $CurMotHRA ="";
    $CurMotSpecialAllowance = "";
    $CurMotTotalAllowance ="";
    $CurMotPFemployeer = "";
    $CurMotGratuity ="";
    $CurMotGAC = "";
    $CurMotEstimatedBonous ="";
    $CurMotOtherBonous = "";
    $CurMotCTC ="";
    $CurMotDeductions ="";
    $CurMotESIC ="";
    $CurMotPFemployee ="";
    $CurMotCanteen ="";
    $CurMotStayAllowance ="";
    $CurMotTravelAllowance = "";
    $CurMotOtherDeductions ="";
    $CurMotDeductionTotal = "";
    $CurMottakehomewithouttax ="";
    $CurAnnuaBasicDA ="";
    $CurAnnuaHRA ="";
    $CurAnnuaSpecialAllowance ="";
    $CurAnnuaTotalAllowance ="";
    $CurAnnuaPFemployeer ="";
    $CurAnnuaGratuity ="";
    $CurAnnuaRetairlsTotal ="";
    $CurAnnuaGAC ="";
    $CurAnnuaEstimatedBonous = "";
    $CurAnnuaOtherBonous = "";
    $CurAnnuaCTC ="";
    $CurAnnuaDeductions ="";
    $CurAnnuaESIC ="";
    $CurAnnuaPFemployee ="";
    $CurAnnuaCanteen ="";
    $CurAnnuaStayAllowance = "";
    $CurAnnuaTravelAllowance ="";
    $CurAnnuaOtherDeductions = "";
    $CurAnnuaDeductionTotal ="";
    $CurAnnuatakehomewithouttax ="";
    $CurincperBasicDA ="";
    $CurincperHRA = "";
    $CurincperSpecialAllowance ="";
    $CurincperTotalAllowance ="";
    $CurincperPFemployeer = "";
    $CurincperGratuity ="";
    $CurincperRetairlsTotal ="";
    $CurincperGAC = "";
   $CurincperEstimatedBonous="";
   $CurincperOtherBonous="";
   $CurincperCTC="";
   $CurincperDeductions="";
   $CurincperESIC="";
   $CurincperPFemployee="";
   $CurincperCanteen="";
   $CurincperStayAllowance="";
   $CurincperTravelAllowance ="";
   $CurincperOtherDeductions = "";
   $CurincperDeductionTotal="";
   $Curincpertakehomewithouttax="";
   $DOJ ="";
   $FitStatus="";
  
    $GetChapter = "SELECT * FROM indsys1013candidatemaster where Clientid ='$Clientid' and Candidateid = '$Candidateid'  ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Title =$row['Title'];
      $Firstname =$row['Firstname'];
      $Lastname = $row['Lastname'];     
     $Reportingname=$row['ReportingTo'];
     $ReportingToid=$row['ReportingToid'];
     $Business=$row['Bussiness'];
     $Designationproposed =$row['Designationproposed'];
     $Location = $row['Location'];
     $Department = $row['Department'];
     $DOJ=$row['Date_Of_Joing'];
     
      } 
    }

    $DOJ = date("d-M-Y", strtotime( $DOJ));

    $GetChapter02 = "SELECT * FROM indsys1017candidatefitmentinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and fitno='$FitNextno' ORDER BY Candidateid";
    $result_Chapter02 = $conn->query($GetChapter02 );
    if(mysqli_num_rows($result_Chapter02) > 0) { 
      
    while($row = mysqli_fetch_array($result_Chapter02)) {  
      $CurMotBasicDA =$row['CurMotBasicDA'];
      $CurMotHRA =$row['CurMotHRA'];
      $CurMotSpecialAllowance = $row['CurMotSpecialAllowance'];
      $CurMotTotalAllowance =$row['CurMotTotalAllowance'];
      $CurMotPFemployeer = $row['CurMotPFemployeer'];
      $CurMotGratuity =$row['CurMotGratuity'];
      $CurMotGAC = $row['CurMotGAC'];
      $CurMotEstimatedBonous =$row['CurMotEstimatedBonous'];
      $CurMotOtherBonous = $row['CurMotOtherBonous'];
      $CurMotCTC = $row['CurMotCTC'];
      $CurMotDeductions =$row['CurMotDeductions'];
      $CurMotESIC = $row['CurMotESIC'];
      $CurMotPFemployee =$row['CurMotPFemployee'];
      $CurMotCanteen =$row['CurMotCanteen'];
      $CurMotStayAllowance =$row['CurMotStayAllowance'];
      $CurMotTravelAllowance = $row['CurMotTravelAllowance'];
      $CurMotOtherDeductions =$row['CurMotOtherDeductions'];
      $CurMotDeductionTotal = $row['CurMotDeductionTotal'];
      $CurMottakehomewithouttax =$row['CurMottakehomewithouttax'];
      $CurAnnuaBasicDA =$row['CurAnnuaBasicDA'];
      $CurAnnuaHRA =$row['CurAnnuaHRA'];
      $CurAnnuaSpecialAllowance =$row['CurAnnuaSpecialAllowance'];
      $CurAnnuaTotalAllowance =$row['CurAnnuaTotalAllowance'];
      $CurAnnuaPFemployeer =$row['CurAnnuaPFemployeer'];
      $CurAnnuaGratuity =$row['CurAnnuaGratuity'];
      $CurAnnuaRetairlsTotal =$row['CurAnnuaRetairlsTotal'];
      $CurAnnuaGAC =$row['CurAnnuaGAC'];
      $CurAnnuaEstimatedBonous = $row['CurAnnuaEstimatedBonous'];
      $CurAnnuaOtherBonous = $row['CurAnnuaOtherBonous'];
      $CurAnnuaCTC =$row['CurAnnuaCTC'];
      $CurAnnuaDeductions =$row['CurAnnuaDeductions'];
      $CurAnnuaESIC =$row['CurAnnuaESIC'];
      $CurAnnuaPFemployee =$row['CurAnnuaPFemployee'];
      $CurAnnuaCanteen =$row['CurAnnuaCanteen'];
      $CurAnnuaStayAllowance = $row['CurAnnuaStayAllowance'];
      $CurAnnuaTravelAllowance =$row['CurAnnuaTravelAllowance'];
      $CurAnnuaOtherDeductions = $row['CurAnnuaOtherDeductions'];
      $CurAnnuaDeductionTotal =$row['CurAnnuaDeductionTotal'];
      $CurAnnuatakehomewithouttax =$row['CurAnnuatakehomewithouttax'];
      $CurincperBasicDA =$row['CurincperBasicDA'];
      $CurincperHRA = $row['CurincperHRA'];
      $CurincperSpecialAllowance =$row['CurincperSpecialAllowance'];
      $CurincperTotalAllowance =$row['CurincperTotalAllowance'];
      $CurincperPFemployeer = $row['CurincperPFemployeer'];
      $CurincperGratuity = $row['CurincperGratuity'];
      $CurincperRetairlsTotal =$row['CurincperRetairlsTotal'];
      $CurincperGAC = $row['CurincperGAC'];
     $CurincperEstimatedBonous=$row['CurincperEstimatedBonous'];
     $CurincperOtherBonous=$row['CurincperOtherBonous'];
     $CurincperCTC=$row['CurincperCTC'];
     $CurincperDeductions=$row['CurincperDeductions'];
     $CurincperESIC=$row['CurincperESIC'];
     $CurincperPFemployee=$row['CurincperPFemployee'];
     $CurincperCanteen=$row['CurincperCanteen'];
     $CurincperStayAllowance=$row['CurincperStayAllowance'];
     $CurincperTravelAllowance =$row['CurincperTravelAllowance'];
     $CurincperOtherDeductions = $row['CurincperOtherDeductions'];
     $CurincperDeductionTotal=$row['CurincperDeductionTotal'];
     $Curincpertakehomewithouttax=$row['Curincpertakehomewithouttax'];
     $FitStatus=$row['FitStatus'];
    
     
     
      } 
    }

    // $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
$Basic = number_format((float)$CurAnnuaBasicDA,2);
$HRA=number_format((float)$CurAnnuaHRA,2);
$Special=number_format((float)$CurAnnuaSpecialAllowance,2);
$TotalAllowance=number_format((float)$CurAnnuaTotalAllowance,2);
$PF=number_format((float)$CurAnnuaPFemployeer,2);
$Gratuity=number_format((float)$CurAnnuaGratuity,2);
$RetairalsTotal=number_format((float)$CurAnnuaRetairlsTotal,2);
$GAC=number_format((float)$CurAnnuaGAC,2);
$EstimatedBonous = number_format((float)$CurAnnuaEstimatedBonous,2);
$CTC=number_format((float)$CurAnnuaCTC,2);
$htmlcontent = '
    <center><img src ="../assets/images/logo/logo.jpg" style="height:110px"/><p style="font-size:16px;color:green;"><i>Together forward</i></p></center>
    
    <p style="font-size:15px;font-weight:bold;margin-bottom:0px"><u>OFFER</u></p>
    
    
    <table>
    <tbody>
    <tr><td style="width:150px">Name</td><td style="width:10px">:</td><td>'."$Title$Firstname $Lastname".'</td></tr>
    <tr><td>Business & Location</td><td>:</td><td>'."$Business & $Location".'</td></tr>
    <tr><td>Department</td><td>:</td><td>'."$Department".'</td></tr>
    <tr><td>Offered Designation</td><td>:</td><td>'."$Designationproposed".'</td></tr>
    <tr><td>Reporting To</td><td>:</td><td>'."$Reportingname".'</td></tr>
    </tbody>
    </table>
    <br/></br>
    
    <style>
    .data-table table, 
    .data-table td, 
    .data-table th {
      border: 0.2px solid #000000;
    }
    .data-table table {
      width: 100%;
      border-collapse: collapse;
    }
    </style>
    
    <div class="data-table">
    <table style="font-size:10px;padding:5px 3px">
    <tbody>
    <tr  align="center" bgcolor="#daeef3" style="font-weight:bold"><td  style="width:260px">Components</td><td  style="width:140px">Amount (Rs.)</td><td>Reference No.  for Notes</td></tr>
    
    <tr bgcolor="#d9d9d9" ><td>Basic &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(A)</td><td align="right">'."$Basic".'</td><td>-</td></tr>
    
    <tr  bgcolor="#d9d9d9"><td>HRA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(B)</td><td align="right">'."$HRA".'</td><td>-</td></tr>
    
    <tr><td  bgcolor="#d9d9d9"><u>Total Allowances</u></td><td></td><td></td></tr>
    <tr><td>Special Allowance</td><td align="right">'."$Special".'</td><td></td></tr>
    <tr  bgcolor="#d9d9d9"><td>Total Allowances Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(C)</td><td align="right">'."$TotalAllowance".'</td><td>-</td></tr> 
    <tr><td  bgcolor="#d9d9d9"><u>Retirals</u></td><td></td><td></td></tr>  
    <tr><td>PF @ 12% of Basic (A)</td><td align="right">'."$PF".'</td><td></td></tr>   
    <tr><td>Gratuity @ 5% of Basic (A)</td><td align="right">'."$Gratuity".'</td><td></td></tr>
    <tr  bgcolor="#d9d9d9"><td>Retirals Total  (D)</td><td align="right">'."$RetairalsTotal".'</td><td>-</td></tr>
    <tr  bgcolor="#60497a" color="#ffffff"><td>"Gross Annual Compensation<br/>(A+B+C+D)"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(E)</td><td align="right">'."$GAC".'</td><td>-</td></tr>
    <tr  bgcolor="#ffffcc"><td>Estimated Variable Bonus @ 8.33% of GAC (A)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(F)</td><td align="right">'."$EstimatedBonous".'</td><td>-</td></tr>
    <tr  bgcolor="#00b050"  color="#ffffff"><td>Estimated CTC (E+F) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(G)</td><td align="right">'."$CTC".'</td><td>-</td></tr>
    </tbody>
    </table>
    
    <br/>
    <p><b><u>Note:</u></b></p>
    
    <div class="data-table">
    <table style="font-size:10px;padding:10px 5px">
    <tbody>
    <tr><td  style="width:565px">
    Bonus has been estimated @ 8.33% of Individual basic considering the Incentive Trend in the last 3 years for budgeted Individual and Business performance and variable pay has been estimated considering the 100% target achievement. The actual incentive will be calculated based on Individual and Business performance for the given year and can be variable as per management decision. The bonus amount is paid annually.
    </td>
                   
    
    </tr>
    </tbody>
    </table>
    
    
    </div> 
      
    
    
    
    
    
    
    ';
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// create new PDF document


// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('');
$pdf->setTitle('OfferLetter');
$pdf->setSubject('');
$pdf->setKeywords('');

// set default header data

$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));



$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font

$pdf->setFontSubsetting(true);
 //$pdf->SetFont('freeserif', '', 10);
$pdf->setFont('pdfahelvetica', '', 10);

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

// add a page
$pdf->AddPage();
$pdf->writeHTML($htmlcontent, true, false, true, false, '');


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------
$directory = "../OfferLetter/";
if(!is_dir($directory)){
  mkdir($directory);
}
//Close and output PDF document
$filename = "$Candidateid-$Firstname.pdf";
//$pdf->Output("$Candidateid-$Firstname.pdf", 'D'); 
$pdf->Output(dirname(__DIR__, 1)."$directory$filename", 'F'  );


$OfferletterView = "$directory$filename";
 
$Display=array(
  'OfferletterView'=>  $OfferletterView,


 
  
 

);

$str = json_encode($Display);
echo trim($str, '"');

}
catch(Exception $e)
{

}
 
     
}
/////////////////////////////////////////////////////////////
if($MethodGet == 'FetchFIT02')
{

    try
    { 
  

      $Candidateid =$form_data['Candidateid'];
      
      $FitNextno =$form_data['FitNextno'];
      $_SESSION["Candidateid"] = $Candidateid;
    $GetChapter = "SELECT * FROM indsys1017candidatefitmentinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and fitno='$FitNextno' ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $CurMotBasicDA =$row['CurMotBasicDA'];
      $CurMotHRA =$row['CurMotHRA'];
      $CurMotSpecialAllowance = $row['CurMotSpecialAllowance'];
      $CurMotTotalAllowance =$row['CurMotTotalAllowance'];
      $CurMotPFemployeer = $row['CurMotPFemployeer'];
      $CurMotGratuity =$row['CurMotGratuity'];
      $CurMotGAC = $row['CurMotGAC'];
      $CurMotEstimatedBonous =$row['CurMotEstimatedBonous'];
      $CurMotOtherBonous = $row['CurMotOtherBonous'];
      $CurMotCTC = $row['CurMotCTC'];
      $CurMotDeductions =$row['CurMotDeductions'];
      $CurMotESIC = $row['CurMotESIC'];
      $CurMotPFemployee =$row['CurMotPFemployee'];
      $CurMotCanteen =$row['CurMotCanteen'];
      $CurMotStayAllowance =$row['CurMotStayAllowance'];
      $CurMotTravelAllowance = $row['CurMotTravelAllowance'];
      $CurMotOtherDeductions =$row['CurMotOtherDeductions'];
      $CurMotDeductionTotal = $row['CurMotDeductionTotal'];
      $CurMottakehomewithouttax =$row['CurMottakehomewithouttax'];
      $CurAnnuaBasicDA =$row['CurAnnuaBasicDA'];
      $CurAnnuaHRA =$row['CurAnnuaHRA'];
      $CurAnnuaSpecialAllowance =$row['CurAnnuaSpecialAllowance'];
      $CurAnnuaTotalAllowance =$row['CurAnnuaTotalAllowance'];
      $CurAnnuaPFemployeer =$row['CurAnnuaPFemployeer'];
      $CurAnnuaGratuity =$row['CurAnnuaGratuity'];
      $CurAnnuaRetairlsTotal =$row['CurAnnuaRetairlsTotal'];
      $CurAnnuaGAC =$row['CurAnnuaGAC'];
      $CurAnnuaEstimatedBonous = $row['CurAnnuaEstimatedBonous'];
      $CurAnnuaOtherBonous = $row['CurAnnuaOtherBonous'];
      $CurAnnuaCTC =$row['CurAnnuaCTC'];
      $CurAnnuaDeductions =$row['CurAnnuaDeductions'];
      $CurAnnuaESIC =$row['CurAnnuaESIC'];
      $CurAnnuaPFemployee =$row['CurAnnuaPFemployee'];
      $CurAnnuaCanteen =$row['CurAnnuaCanteen'];
      $CurAnnuaStayAllowance = $row['CurAnnuaStayAllowance'];
      $CurAnnuaTravelAllowance =$row['CurAnnuaTravelAllowance'];
      $CurAnnuaOtherDeductions = $row['CurAnnuaOtherDeductions'];
      $CurAnnuaDeductionTotal =$row['CurAnnuaDeductionTotal'];
      $CurAnnuatakehomewithouttax =$row['CurAnnuatakehomewithouttax'];
      $CurincperBasicDA =$row['CurincperBasicDA'];
      $CurincperHRA = $row['CurincperHRA'];
      $CurincperSpecialAllowance =$row['CurincperSpecialAllowance'];
      $CurincperTotalAllowance =$row['CurincperTotalAllowance'];
      $CurincperPFemployeer = $row['CurincperPFemployeer'];
      $CurincperGratuity = $row['CurincperGratuity'];
      $CurincperRetairlsTotal =$row['CurincperRetairlsTotal'];
      $CurincperGAC = $row['CurincperGAC'];
     $CurincperEstimatedBonous=$row['CurincperEstimatedBonous'];
     $CurincperOtherBonous=$row['CurincperOtherBonous'];
     $CurincperCTC=$row['CurincperCTC'];
     $CurincperDeductions=$row['CurincperDeductions'];
     $CurincperESIC=$row['CurincperESIC'];
     $CurincperPFemployee=$row['CurincperPFemployee'];
     $CurincperCanteen=$row['CurincperCanteen'];
     $CurincperStayAllowance=$row['CurincperStayAllowance'];
     $CurincperTravelAllowance =$row['CurincperTravelAllowance'];
     $CurincperOtherDeductions = $row['CurincperOtherDeductions'];
     $CurincperDeductionTotal=$row['CurincperDeductionTotal'];
     $Curincpertakehomewithouttax=$row['Curincpertakehomewithouttax'];
     $Performanceallowanceyearly =$row['Performanceallowanceyearly'];
     $Performanceallowancemonthly =$row['Performanceallowancemonthly'];
     $FitStatus=$row['FitStatus'];
    
     
     
      } 
    }


 
    
    $Display=array(
      'CurMotBasicDA'=>  $CurMotBasicDA,
      'CurMotHRA'=> $CurMotHRA,
      'CurMotSpecialAllowance'=>  $CurMotSpecialAllowance,
      'CurMotTotalAllowance'=> $CurMotTotalAllowance,
      'CurMotPFemployeer'=> $CurMotPFemployeer,
      'CurMotGratuity'=> $CurMotGratuity,
      'CurMotEstimatedBonous'=>  $CurMotEstimatedBonous,
      'CurMotGAC'=> $CurMotGAC,
      'CurMotOtherBonous'=>  $CurMotOtherBonous,
      'CurMotCTC'=>  $CurMotCTC,
      'CurMotDeductions'=> $CurMotDeductions,
      'CurMotESIC'=> $CurMotESIC,
      'CurMotPFemployee'=> $CurMotPFemployee,
      'CurMotCanteen'=> $CurMotCanteen,
      'CurMotStayAllowance'=>$CurMotStayAllowance,
      'CurMotTravelAllowance'=> $CurMotTravelAllowance,
      'CurMotDeductionTotal'=> $CurMotDeductionTotal,
      'CurMotOtherDeductions'=> $CurMotOtherDeductions,
      'CurMottakehomewithouttax'=> $CurMottakehomewithouttax,
      'CurAnnuaBasicDA'=>$CurAnnuaBasicDA,
      'CurAnnuaHRA'=>$CurAnnuaHRA,
      'CurAnnuaSpecialAllowance'=>$CurAnnuaSpecialAllowance,
      'CurAnnuaTotalAllowance'=>$CurAnnuaTotalAllowance,
      'CurAnnuaPFemployeer'=>$CurAnnuaPFemployeer,
      'CurAnnuaGratuity'=>$CurAnnuaGratuity,     
      'CurAnnuaRetairlsTotal'=>$CurAnnuaRetairlsTotal,
      'CurAnnuaGAC'=> $CurAnnuaGAC,
      'CurAnnuaEstimatedBonous'=> $CurAnnuaEstimatedBonous,
      'CurAnnuaOtherBonous'=>$CurAnnuaOtherBonous,
      'CurAnnuaCTC'=>$CurAnnuaCTC,
     'CurAnnuaDeductions'=>$CurAnnuaDeductions,
      'CurAnnuaESIC'=>$CurAnnuaESIC,
      'CurAnnuaPFemployee'=>$CurAnnuaPFemployee,
      'CurAnnuaCanteen'=> $CurAnnuaCanteen,
      'CurAnnuaStayAllowance'=>$CurAnnuaStayAllowance,
      'CurAnnuaTravelAllowance'=> $CurAnnuaTravelAllowance,
      'CurAnnuaOtherDeductions'=>$CurAnnuaOtherDeductions,
      'CurAnnuaDeductionTotal'=>$CurAnnuaDeductionTotal,
      'CurAnnuatakehomewithouttax'=>$CurAnnuatakehomewithouttax,
     'CurincperBasicDA'=> $CurincperBasicDA,
      'CurincperHRA'=>$CurincperHRA,
    'CurincperSpecialAllowance'=>$CurincperSpecialAllowance,
     'CurincperTotalAllowance'=> $CurincperTotalAllowance,
     'CurincperPFemployeer'=> $CurincperPFemployeer,
     'CurincperGratuity'=>$CurincperGratuity,
     'CurincperGAC'=> $CurincperGAC,
    'CurincperEstimatedBonous'=>$CurincperEstimatedBonous,
    'CurincperOtherBonous'=>$CurincperOtherBonous,
   'CurincperCTC'=>$CurincperCTC,
    'CurincperDeductions'=>$CurincperDeductions,
    'CurincperESIC' =>$CurincperESIC,
    'CurincperPFemployee' =>$CurincperPFemployee,
    'CurincperCanteen' =>$CurincperCanteen,
    'CurincperStayAllowance' =>$CurincperStayAllowance,
    'CurincperTravelAllowance' =>$CurincperTravelAllowance,
    'CurincperOtherDeductions'=> $CurincperOtherDeductions,
    'CurincperDeductionTotal'=>$CurincperDeductionTotal,
    'CurincperDeductionTotal'=> $CurincperDeductionTotal,
   'Curincpertakehomewithouttax'=>$Curincpertakehomewithouttax,
   'CurincperRetairlsTotal'=>$CurincperRetairlsTotal,
   'FitStatus'=>$FitStatus,
   'Performanceallowanceyearly' =>$Performanceallowanceyearly,
   'Performanceallowancemonthly' =>$Performanceallowancemonthly,
 
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }
 ///////////////////////////////////////////////////////////////////

 if($MethodGet == 'SendMailForMDApproval')
{


try
{

  $Candidateid =$form_data['Candidateid'];
  
  
    $Reportingname ="";
    $ReportingToid ="";   
    $Business ="";
    $Designationproposed ="";
    $Department ="";
    $Location ="";
    $Title ="";
    $Firstname ="";
    $Lastname ="";
    $Languages ="";
    $Mother_tong = "";
    $DOB ="";
    $Age = "";
    $Gender = "";
    $HR_Approve ="";
    $GM_Approve ="";
    $DH_Approve ="";
    $HighestQualification = "";
    
   
   $DOJ ="";
   $FitStatus="";
  
    $GetChapter = "SELECT * FROM indsys1013candidatemaster where Clientid ='$Clientid' and Candidateid = '$Candidateid'  ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Title =$row['Title'];
      $Firstname =$row['Firstname'];
      $Lastname = $row['Lastname'];     
     $Reportingname=$row['ReportingTo'];
     $ReportingToid=$row['ReportingToid'];
     $Business=$row['Bussiness'];
     $Designationproposed =$row['Designationproposed'];
     $Location = $row['Location'];
     $Department = $row['Department'];
     $Languages=$row['Languages'];
     $Mother_tong=$row['Mother_tong'];
     $DOB=$row['DOB'];
     $Age=$row['Age'];
     $Gender=$row['Gender'];
     $HR_Approve =$row['HR_Approve'];
     $GM_Approve =$row['GM_Approve'];
     $DH_Approve =$row['DH_Approve'];
     $HighestQualification = $row['HighestQualification'];
     
      } 
    }

$Usermailid = "";

    $GetSuperusermail = "SELECT * FROM indsys1000adminrights where Clientid ='$Clientid' and UserType = 'Super User'  LIMIT 1";
    $result_Supermail = $conn->query($GetSuperusermail );
    if(mysqli_num_rows($result_Supermail) > 0) { 

      
    while($row = mysqli_fetch_array($result_Supermail)) {  
      $Usermailid =$row['Usermailid'];
      
     
      } 
    }


    $DOJ = date("d-M-Y", strtotime( $DOJ));

    
$htmlcontent = '
    <center><img src ="../assets/images/logo/logo.jpg" style="height:110px"/><p style="font-size:16px;color:green;"><i>Together forward</i></p></center>
    
    <p style="font-size:15px;font-weight:bold;margin-bottom:0px"><u>Waiting For Approval</u></p>
    
    
    <table>
    <tbody>
    <tr><td style="width:150px">Name</td><td style="width:10px">:</td><td>'."$Title$Firstname $Lastname".'</td></tr>
    <tr><td>Qualification</td><td>:</td><td>'."$HighestQualification".'</td></tr>
    <tr><td>Department</td><td>:</td><td>'."$Department".'</td></tr>
    <tr><td>Offered Designation</td><td>:</td><td>'."$Designationproposed".'</td></tr>
    <tr><td>Mother Tongue</td><td>:</td><td>'."$Mother_tong".'</td></tr>
    <tr><td>Gender</td><td>:</td><td>'."$Gender".'</td></tr>
    <tr><td>Age</td><td>:</td><td>'."$Age".'</td></tr>
    <tr><td>Langugages Known</td><td>:</td><td>'."$Languages".'</td></tr>
    <tr><td>HR Approved Status</td><td>:</td><td>'."$HR_Approve".'</td></tr>
    <tr><td>Department Head Approved Status</td><td>:</td><td>'."$DH_Approve".'</td></tr>
    <tr><td>GM Approved Status</td><td>:</td><td>'."$GM_Approve".'</td></tr>
    </tbody>
    </table>
 
    
   
 
    

    
  
    
    
    </div>
    
    
    
    
      
    
    
    
    
    
    
    ';
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
                      <p>Kindly find the following candidate waiting for your approval</p>                    


                                           $htmlcontent



                 
                      </td>
                    </tr>
                    <tr>
                    <td>Click<a target='_blank' href='$domain/HRM09/ApprovedMD.php?Candidateid=$Candidateid&Clientid=$Clientid'> Here </a>For Approval</td>
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

<span class='apple-link'>Britannia Garment Packaging Pvt Ltd</span></small>
              
              
              
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
    

$ToMail = $Usermailid;
$SubjectMail = "Waiting For Approval";

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
    $mail->SetFrom('indsystesting@gmail.com', 'BRITANNIA');
    $mail->AddReplyTo('indsystesting@gmail.com', 'BRITANNIA');
    $mail->Subject =  $SubjectMail ;
    // $mail->Body = $tstbody;
    $mail->MsgHTML($Mailcontent);
    // optional - MsgHTML will create an alternate automatically
    

   
    // attachment
    $mail->Send();
    $Message = "Mail Send Successfully";
   // $str = json_encode("E-Mail Sent Succesfully");
    //echo trim($str, '"');







 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(phpmailerException $e)
{

}
catch(Exception $e)
{

}

}
catch(Exception $e)
{

}
 
     
}

////////////////////////
if($MethodGet == 'MAILMDAPPROVAL')
{


try
{

  $Candidateid =$form_data['Candidateid'];
  $FitNextno =$form_data['FitNextno'];
  
    $Reportingname ="";
    $ReportingToid ="";   
    $Business ="";
    $Designationproposed ="";
    $Department ="";
    $Location ="";
    $Title ="";
    $Firstname ="";
    $Lastname ="";
    $CurMotBasicDA ="";
    $CurMotHRA ="";
    $CurMotSpecialAllowance = "";
    $CurMotTotalAllowance ="";
    $CurMotPFemployeer = "";
    $CurMotGratuity ="";
    $CurMotGAC = "";
    $CurMotEstimatedBonous ="";
    $CurMotOtherBonous = "";
    $CurMotCTC ="";
    $CurMotDeductions ="";
    $CurMotESIC ="";
    $CurMotPFemployee ="";
    $CurMotCanteen ="";
    $CurMotStayAllowance ="";
    $CurMotTravelAllowance = "";
    $CurMotOtherDeductions ="";
    $CurMotDeductionTotal = "";
    $CurMottakehomewithouttax ="";
    $CurAnnuaBasicDA ="";
    $CurAnnuaHRA ="";
    $CurAnnuaSpecialAllowance ="";
    $CurAnnuaTotalAllowance ="";
    $CurAnnuaPFemployeer ="";
    $CurAnnuaGratuity ="";
    $CurAnnuaRetairlsTotal ="";
    $CurAnnuaGAC ="";
    $CurAnnuaEstimatedBonous = "";
    $CurAnnuaOtherBonous = "";
    $CurAnnuaCTC ="";
    $CurAnnuaDeductions ="";
    $CurAnnuaESIC ="";
    $CurAnnuaPFemployee ="";
    $CurAnnuaCanteen ="";
    $CurAnnuaStayAllowance = "";
    $CurAnnuaTravelAllowance ="";
    $CurAnnuaOtherDeductions = "";
    $CurAnnuaDeductionTotal ="";
    $CurAnnuatakehomewithouttax ="";
    $CurincperBasicDA ="";
    $CurincperHRA = "";
    $CurincperSpecialAllowance ="";
    $CurincperTotalAllowance ="";
    $CurincperPFemployeer = "";
    $CurincperGratuity ="";
    $CurincperRetairlsTotal ="";
    $CurincperGAC = "";
   $CurincperEstimatedBonous="";
   $CurincperOtherBonous="";
   $CurincperCTC="";
   $CurincperDeductions="";
   $CurincperESIC="";
   $CurincperPFemployee="";
   $CurincperCanteen="";
   $CurincperStayAllowance="";
   $CurincperTravelAllowance ="";
   $CurincperOtherDeductions = "";
   $CurincperDeductionTotal="";
   $Curincpertakehomewithouttax="";
   $DOJ ="";
   $FitStatus="";
  
    $GetChapter = "SELECT * FROM indsys1013candidatemaster where Clientid ='$Clientid' and Candidateid = '$Candidateid'  ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $Title =$row['Title'];
      $Firstname =$row['Firstname'];
      $Lastname = $row['Lastname'];     
     $Reportingname=$row['ReportingTo'];
     $ReportingToid=$row['ReportingToid'];
     $Business=$row['Bussiness'];
     $Designationproposed =$row['Designationproposed'];
     $Location = $row['Location'];
     $Department = $row['Department'];
     $DOJ=$row['Date_Of_Joing'];
     
      } 
    }
    $Usermailid = "";

    $GetSuperusermail = "SELECT * FROM indsys1000adminrights where Clientid ='$Clientid' and UserType = 'Super User'  LIMIT 1";
    $result_Supermail = $conn->query($GetSuperusermail );
    if(mysqli_num_rows($result_Supermail) > 0) { 

      
    while($row = mysqli_fetch_array($result_Supermail)) {  
      $Usermailid =$row['Usermailid'];
      
     
      } 
    }
    $DOJ = date("d-M-Y", strtotime( $DOJ));

    $GetChapter02 = "SELECT * FROM indsys1017candidatefitmentinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and fitno='$FitNextno' ORDER BY Candidateid";
    $result_Chapter02 = $conn->query($GetChapter02 );
    if(mysqli_num_rows($result_Chapter02) > 0) { 
      
    while($row = mysqli_fetch_array($result_Chapter02)) {  
      $CurMotBasicDA =$row['CurMotBasicDA'];
      $CurMotHRA =$row['CurMotHRA'];
      $CurMotSpecialAllowance = $row['CurMotSpecialAllowance'];
      $CurMotTotalAllowance =$row['CurMotTotalAllowance'];
      $CurMotPFemployeer = $row['CurMotPFemployeer'];
      $CurMotGratuity =$row['CurMotGratuity'];
      $CurMotGAC = $row['CurMotGAC'];
      $CurMotEstimatedBonous =$row['CurMotEstimatedBonous'];
      $CurMotOtherBonous = $row['CurMotOtherBonous'];
      $CurMotCTC = $row['CurMotCTC'];
      $CurMotDeductions =$row['CurMotDeductions'];
      $CurMotESIC = $row['CurMotESIC'];
      $CurMotPFemployee =$row['CurMotPFemployee'];
      $CurMotCanteen =$row['CurMotCanteen'];
      $CurMotStayAllowance =$row['CurMotStayAllowance'];
      $CurMotTravelAllowance = $row['CurMotTravelAllowance'];
      $CurMotOtherDeductions =$row['CurMotOtherDeductions'];
      $CurMotDeductionTotal = $row['CurMotDeductionTotal'];
      $CurMottakehomewithouttax =$row['CurMottakehomewithouttax'];
      $CurAnnuaBasicDA =$row['CurAnnuaBasicDA'];
      $CurAnnuaHRA =$row['CurAnnuaHRA'];
      $CurAnnuaSpecialAllowance =$row['CurAnnuaSpecialAllowance'];
      $CurAnnuaTotalAllowance =$row['CurAnnuaTotalAllowance'];
      $CurAnnuaPFemployeer =$row['CurAnnuaPFemployeer'];
      $CurAnnuaGratuity =$row['CurAnnuaGratuity'];
      $CurAnnuaRetairlsTotal =$row['CurAnnuaRetairlsTotal'];
      $CurAnnuaGAC =$row['CurAnnuaGAC'];
      $CurAnnuaEstimatedBonous = $row['CurAnnuaEstimatedBonous'];
      $CurAnnuaOtherBonous = $row['CurAnnuaOtherBonous'];
      $CurAnnuaCTC =$row['CurAnnuaCTC'];
      $CurAnnuaDeductions =$row['CurAnnuaDeductions'];
      $CurAnnuaESIC =$row['CurAnnuaESIC'];
      $CurAnnuaPFemployee =$row['CurAnnuaPFemployee'];
      $CurAnnuaCanteen =$row['CurAnnuaCanteen'];
      $CurAnnuaStayAllowance = $row['CurAnnuaStayAllowance'];
      $CurAnnuaTravelAllowance =$row['CurAnnuaTravelAllowance'];
      $CurAnnuaOtherDeductions = $row['CurAnnuaOtherDeductions'];
      $CurAnnuaDeductionTotal =$row['CurAnnuaDeductionTotal'];
      $CurAnnuatakehomewithouttax =$row['CurAnnuatakehomewithouttax'];
      $CurincperBasicDA =$row['CurincperBasicDA'];
      $CurincperHRA = $row['CurincperHRA'];
      $CurincperSpecialAllowance =$row['CurincperSpecialAllowance'];
      $CurincperTotalAllowance =$row['CurincperTotalAllowance'];
      $CurincperPFemployeer = $row['CurincperPFemployeer'];
      $CurincperGratuity = $row['CurincperGratuity'];
      $CurincperRetairlsTotal =$row['CurincperRetairlsTotal'];
      $CurincperGAC = $row['CurincperGAC'];
     $CurincperEstimatedBonous=$row['CurincperEstimatedBonous'];
     $CurincperOtherBonous=$row['CurincperOtherBonous'];
     $CurincperCTC=$row['CurincperCTC'];
     $CurincperDeductions=$row['CurincperDeductions'];
     $CurincperESIC=$row['CurincperESIC'];
     $CurincperPFemployee=$row['CurincperPFemployee'];
     $CurincperCanteen=$row['CurincperCanteen'];
     $CurincperStayAllowance=$row['CurincperStayAllowance'];
     $CurincperTravelAllowance =$row['CurincperTravelAllowance'];
     $CurincperOtherDeductions = $row['CurincperOtherDeductions'];
     $CurincperDeductionTotal=$row['CurincperDeductionTotal'];
     $Curincpertakehomewithouttax=$row['Curincpertakehomewithouttax'];
     $FitStatus=$row['FitStatus'];
    
     
     
      } 
    }

    // $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
$Basic = number_format((float)$CurAnnuaBasicDA,2);
$HRA=number_format((float)$CurAnnuaHRA,2);
$Special=number_format((float)$CurAnnuaSpecialAllowance,2);
$TotalAllowance=number_format((float)$CurAnnuaTotalAllowance,2);
$PF=number_format((float)$CurAnnuaPFemployeer,2);
$Gratuity=number_format((float)$CurAnnuaGratuity,2);
$RetairalsTotal=number_format((float)$CurAnnuaRetairlsTotal,2);
$GAC=number_format((float)$CurAnnuaGAC,2);
$EstimatedBonous = number_format((float)$CurAnnuaEstimatedBonous,2);
$CTC=number_format((float)$CurAnnuaCTC,2);

$htmlcontent = '
    <center><img src ="../assets/images/logo/logo.jpg" style="height:110px"/><p style="font-size:16px;color:green;"><i>Together forward</i></p></center>
    
    <p style="font-size:15px;font-weight:bold;margin-bottom:0px"><u>OFFER</u></p>
    
    
    <table>
    <tbody>
    <tr><td style="width:150px">Name</td><td style="width:10px">:</td><td>'."$Title$Firstname $Lastname".'</td></tr>
    <tr><td>Business & Location</td><td>:</td><td>'."$Business & $Location".'</td></tr>
    <tr><td>Department</td><td>:</td><td>'."$Department".'</td></tr>
    <tr><td>Offered Designation</td><td>:</td><td>'."$Designationproposed".'</td></tr>
    <tr><td>Reporting To</td><td>:</td><td>'."$Reportingname".'</td></tr>
    </tbody>
    </table>
    <br/></br>
    
    <style>
    .data-table table, 
    .data-table td, 
    .data-table th {
      border: 0.2px solid #000000;
    }
    .data-table table {
      width: 100%;
      border-collapse: collapse;
    }
    </style>
    
    <div class="data-table">
    <table style="font-size:10px;padding:5px 3px">
    <tbody>
    <tr  align="center" bgcolor="#daeef3" style="font-weight:bold"><td  style="width:260px">Components</td><td  style="width:140px">Amount (Rs.)</td><td>Reference No.  for Notes</td></tr>
    
    <tr bgcolor="#d9d9d9" ><td>Basic &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(A)</td><td align="right">'."$Basic".'</td><td>-</td></tr>
    
    <tr  bgcolor="#d9d9d9"><td>HRA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(B)</td><td align="right">'."$HRA".'</td><td>-</td></tr>
    
    <tr><td  bgcolor="#d9d9d9"><u>Total Allowances</u></td><td></td><td></td></tr>
    <tr><td>Special Allowance</td><td align="right">'."$Special".'</td><td></td></tr>
    <tr  bgcolor="#d9d9d9"><td>Total Allowances Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(C)</td><td align="right">'."$TotalAllowance".'</td><td>-</td></tr> 
    <tr><td  bgcolor="#d9d9d9"><u>Retirals</u></td><td></td><td></td></tr>  
    <tr><td>PF @ 12% of Basic (A)</td><td align="right">'."$PF".'</td><td></td></tr>   
    <tr><td>Gratuity @ 5% of Basic (A)</td><td align="right">'."$Gratuity".'</td><td></td></tr>
    <tr  bgcolor="#d9d9d9"><td>Retirals Total  (D)</td><td align="right">'."$RetairalsTotal".'</td><td>-</td></tr>
    <tr  bgcolor="#60497a" color="#ffffff"><td>"Gross Annual Compensation<br/>(A+B+C+D)"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(E)</td><td align="right">'."$GAC".'</td><td>-</td></tr>
    <tr  bgcolor="#ffffcc"><td>Estimated Variable Bonus @ 8.33% of GAC (A)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(F)</td><td align="right">'."$EstimatedBonous".'</td><td>-</td></tr>
    <tr  bgcolor="#00b050"  color="#ffffff"><td>Estimated CTC (E+F) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(G)</td><td align="right">'."$CTC".'</td><td>-</td></tr>
    </tbody>
    </table>
    
    <br/>
    <p><b><u>Note:</u></b></p>
    
    <div class="data-table">
    <table style="font-size:10px;padding:10px 5px">
    <tbody>
    <tr><td  style="width:565px">
    Bonus has been estimated @ 8.33% of Individual basic considering the Incentive Trend in the last 3 years for budgeted Individual and Business performance and variable pay has been estimated considering the 100% target achievement. The actual incentive will be calculated based on Individual and Business performance for the given year and can be variable as per management decision. The bonus amount is paid annually.
    </td>
                   
    
    </tr>
    </tbody>
    </table>
    
    
    </div>
    
    
    
    
      
    
    
    
    
    
    
    ';
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
                        <p>Please find attached, Offer Letter of the candidate $Title$Firstname $Lastname for the position $Designationproposed .

Kindly check and provide your approval to release the offer letter to the respective candidate.</p>

$htmlcontent

<tr>
<td>Click<a target='_blank' href='$domain/HRM09/ApprovedFitmentMD.php?Candidateid=$Candidateid&FitNextno=$FitNextno'> Here </a>For Approval</td>
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
              <td align='center' class='content-block'><br/>
              <small><span class='apple-link'>Britannia Garment Packaging Pvt Ltd</span></small>
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
$ToMail = $Usermailid;
$SubjectMail = "Waiting For Candidate Fitment Approval";

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
    $mail->SetFrom('indsystesting@gmail.com', 'BRITANNIA');
    $mail->AddReplyTo('indsystesting@gmail.com', 'BRITANNIA');
    $mail->Subject =  $SubjectMail ;
    // $mail->Body = $tstbody;
    $mail->MsgHTML($Mailcontent);
    // optional - MsgHTML will create an alternate automatically
    

   
    // attachment
    $mail->Send();
    $Message = "Mail Send Successfully";
   // $str = json_encode("E-Mail Sent Succesfully");
    //echo trim($str, '"');

    $resultExists = "Update indsys1013candidatemaster set 
    Selectionstatus ='Waiting For MD Approval'

 WHERE Candidateid = ' $Candidateid' AND Clientid='$Clientid' ";
 $resultExists01 = $conn->query($resultExists);




 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(phpmailerException $e)
{

}
catch(Exception $e)
{

}


//  $Display=array('htmlcontent' =>$Mailcontent);

//   $str = json_encode($Display);
// echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
/////////////////////////////////

if($MethodGet == 'FetchFinalFIT')
{

    try
    { 
  

      $Candidateid =$form_data['Candidateid'];
      
 
      $_SESSION["Candidateid"] = $Candidateid;
    $GetChapter = "SELECT * FROM indsys1017candidatefinalfitment where Clientid ='$Clientid' and Candidateid = '$Candidateid'  ORDER BY Candidateid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $CurMotBasicDA =$row['CurMotBasicDA'];
      $CurMotHRA =$row['CurMotHRA'];
      $CurMotSpecialAllowance = $row['CurMotSpecialAllowance'];
      $CurMotTotalAllowance =$row['CurMotTotalAllowance'];
      $CurMotPFemployeer = $row['CurMotPFemployeer'];
      $CurMotGratuity =$row['CurMotGratuity'];
      $CurMotGAC = $row['CurMotGAC'];
      $CurMotEstimatedBonous =$row['CurMotEstimatedBonous'];
      $CurMotOtherBonous = $row['CurMotOtherBonous'];
      $CurMotCTC = $row['CurMotCTC'];
      $CurMotDeductions =$row['CurMotDeductions'];
      $CurMotESIC = $row['CurMotESIC'];
      $CurMotPFemployee =$row['CurMotPFemployee'];
      $CurMotCanteen =$row['CurMotCanteen'];
      $CurMotStayAllowance =$row['CurMotStayAllowance'];
      $CurMotTravelAllowance = $row['CurMotTravelAllowance'];
      $CurMotOtherDeductions =$row['CurMotOtherDeductions'];
      $CurMotDeductionTotal = $row['CurMotDeductionTotal'];
      $CurMottakehomewithouttax =$row['CurMottakehomewithouttax'];
      $CurAnnuaBasicDA =$row['CurAnnuaBasicDA'];
      $CurAnnuaHRA =$row['CurAnnuaHRA'];
      $CurAnnuaSpecialAllowance =$row['CurAnnuaSpecialAllowance'];
      $CurAnnuaTotalAllowance =$row['CurAnnuaTotalAllowance'];
      $CurAnnuaPFemployeer =$row['CurAnnuaPFemployeer'];
      $CurAnnuaGratuity =$row['CurAnnuaGratuity'];
      $CurAnnuaRetairlsTotal =$row['CurAnnuaRetairlsTotal'];
      $CurAnnuaGAC =$row['CurAnnuaGAC'];
      $CurAnnuaEstimatedBonous = $row['CurAnnuaEstimatedBonous'];
      $CurAnnuaOtherBonous = $row['CurAnnuaOtherBonous'];
      $CurAnnuaCTC =$row['CurAnnuaCTC'];
      $CurAnnuaDeductions =$row['CurAnnuaDeductions'];
      $CurAnnuaESIC =$row['CurAnnuaESIC'];
      $CurAnnuaPFemployee =$row['CurAnnuaPFemployee'];
      $CurAnnuaCanteen =$row['CurAnnuaCanteen'];
      $CurAnnuaStayAllowance = $row['CurAnnuaStayAllowance'];
      $CurAnnuaTravelAllowance =$row['CurAnnuaTravelAllowance'];
      $CurAnnuaOtherDeductions = $row['CurAnnuaOtherDeductions'];
      $CurAnnuaDeductionTotal =$row['CurAnnuaDeductionTotal'];
      $CurAnnuatakehomewithouttax =$row['CurAnnuatakehomewithouttax'];
      $CurincperBasicDA =$row['CurincperBasicDA'];
      $CurincperHRA = $row['CurincperHRA'];
      $CurincperSpecialAllowance =$row['CurincperSpecialAllowance'];
      $CurincperTotalAllowance =$row['CurincperTotalAllowance'];
      $CurincperPFemployeer = $row['CurincperPFemployeer'];
      $CurincperGratuity = $row['CurincperGratuity'];
      $CurincperRetairlsTotal =$row['CurincperRetairlsTotal'];
      $CurincperGAC = $row['CurincperGAC'];
     $CurincperEstimatedBonous=$row['CurincperEstimatedBonous'];
     $CurincperOtherBonous=$row['CurincperOtherBonous'];
     $CurincperCTC=$row['CurincperCTC'];
     $CurincperDeductions=$row['CurincperDeductions'];
     $CurincperESIC=$row['CurincperESIC'];
     $CurincperPFemployee=$row['CurincperPFemployee'];
     $CurincperCanteen=$row['CurincperCanteen'];
     $CurincperStayAllowance=$row['CurincperStayAllowance'];
     $CurincperTravelAllowance =$row['CurincperTravelAllowance'];
     $CurincperOtherDeductions = $row['CurincperOtherDeductions'];
     $CurincperDeductionTotal=$row['CurincperDeductionTotal'];
     $Curincpertakehomewithouttax=$row['Curincpertakehomewithouttax'];
 
    
     
     
      } 
    }


 
    
    $Display=array(
      'CurMotBasicDA'=>  $CurMotBasicDA,
      'CurMotHRA'=> $CurMotHRA,
      'CurMotSpecialAllowance'=>  $CurMotSpecialAllowance,
      'CurMotTotalAllowance'=> $CurMotTotalAllowance,
      'CurMotPFemployeer'=> $CurMotPFemployeer,
      'CurMotGratuity'=> $CurMotGratuity,
      'CurMotEstimatedBonous'=>  $CurMotEstimatedBonous,
      'CurMotGAC'=> $CurMotGAC,
      'CurMotOtherBonous'=>  $CurMotOtherBonous,
      'CurMotCTC'=>  $CurMotCTC,
      'CurMotDeductions'=> $CurMotDeductions,
      'CurMotESIC'=> $CurMotESIC,
      'CurMotPFemployee'=> $CurMotPFemployee,
      'CurMotCanteen'=> $CurMotCanteen,
      'CurMotStayAllowance'=>$CurMotStayAllowance,
      'CurMotTravelAllowance'=> $CurMotTravelAllowance,
      'CurMotDeductionTotal'=> $CurMotDeductionTotal,
      'CurMotOtherDeductions'=> $CurMotOtherDeductions,
      'CurMottakehomewithouttax'=> $CurMottakehomewithouttax,
      'CurAnnuaBasicDA'=>$CurAnnuaBasicDA,
      'CurAnnuaHRA'=>$CurAnnuaHRA,
      'CurAnnuaSpecialAllowance'=>$CurAnnuaSpecialAllowance,
      'CurAnnuaTotalAllowance'=>$CurAnnuaTotalAllowance,
      'CurAnnuaPFemployeer'=>$CurAnnuaPFemployeer,
      'CurAnnuaGratuity'=>$CurAnnuaGratuity,     
      'CurAnnuaRetairlsTotal'=>$CurAnnuaRetairlsTotal,
      'CurAnnuaGAC'=> $CurAnnuaGAC,
      'CurAnnuaEstimatedBonous'=> $CurAnnuaEstimatedBonous,
      'CurAnnuaOtherBonous'=>$CurAnnuaOtherBonous,
      'CurAnnuaCTC'=>$CurAnnuaCTC,
     'CurAnnuaDeductions'=>$CurAnnuaDeductions,
      'CurAnnuaESIC'=>$CurAnnuaESIC,
      'CurAnnuaPFemployee'=>$CurAnnuaPFemployee,
      'CurAnnuaCanteen'=> $CurAnnuaCanteen,
      'CurAnnuaStayAllowance'=>$CurAnnuaStayAllowance,
      'CurAnnuaTravelAllowance'=> $CurAnnuaTravelAllowance,
      'CurAnnuaOtherDeductions'=>$CurAnnuaOtherDeductions,
      'CurAnnuaDeductionTotal'=>$CurAnnuaDeductionTotal,
      'CurAnnuatakehomewithouttax'=>$CurAnnuatakehomewithouttax,
     'CurincperBasicDA'=> $CurincperBasicDA,
      'CurincperHRA'=>$CurincperHRA,
    'CurincperSpecialAllowance'=>$CurincperSpecialAllowance,
     'CurincperTotalAllowance'=> $CurincperTotalAllowance,
     'CurincperPFemployeer'=> $CurincperPFemployeer,
     'CurincperGratuity'=>$CurincperGratuity,
     'CurincperGAC'=> $CurincperGAC,
    'CurincperEstimatedBonous'=>$CurincperEstimatedBonous,
    'CurincperOtherBonous'=>$CurincperOtherBonous,
   'CurincperCTC'=>$CurincperCTC,
    'CurincperDeductions'=>$CurincperDeductions,
    'CurincperESIC' =>$CurincperESIC,
    'CurincperPFemployee' =>$CurincperPFemployee,
    'CurincperCanteen' =>$CurincperCanteen,
    'CurincperStayAllowance' =>$CurincperStayAllowance,
    'CurincperTravelAllowance' =>$CurincperTravelAllowance,
    'CurincperOtherDeductions'=> $CurincperOtherDeductions,
    'CurincperDeductionTotal'=>$CurincperDeductionTotal,
    'CurincperDeductionTotal'=> $CurincperDeductionTotal,
   'Curincpertakehomewithouttax'=>$Curincpertakehomewithouttax,
   'CurincperRetairlsTotal'=>$CurincperRetairlsTotal,

 
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }
 //////////////////////////////////////////


 if($MethodGet == 'FITDISPLAYSESSION')
 {
 
 
 try
 {

  // $get_clientid =mysqli_real_escape_string($conn, $_POST['Candidateid']);
 
    //  $Candidateid =$_POST['Candidateid'];
    
    //$Candidateid =1029;
     
     $data01 =[];
    
     $GetState = "SELECT * FROM indsys1017candidatefitmentinformation where Candidateid = '$Candidateid'  ORDER BY Candidateid";
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
 //////////////////////////////////////
 if($MethodGet == 'SendMailToHR')
 {
  $Candidateid =$form_data['Candidateid'];
  $interviewerid =$form_data['interviewerid'];
  $Interview_held_On =$form_data['Interview_held_On'];
  $DHinterviewdate =$form_data['DHinterviewdate'];
  $Candidateinterviewtime =$form_data['Candidateinterviewtime'];



  if (empty($Candidateinterviewtime))
  {

      $Message = "Candidateinterviewtime";

      $Display = array(
          'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
  }

  if (empty($interviewerid))
  {

      $Message = "interviewerid";

      $Display = array(
          'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
  }

  
  if (empty($Interview_held_On))
  {

      $Message = "Interview_held_On";

      $Display = array(
          'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;
  }
  $GetChapter = "SELECT * FROM indsys1013candidatemaster where Clientid ='$Clientid' and Candidateid = '$Candidateid'  ORDER BY Candidateid";
  $result_Chapter = $conn->query($GetChapter );
  if(mysqli_num_rows($result_Chapter) > 0) { 

    
  while($row = mysqli_fetch_array($result_Chapter)) {  
    $Title =$row['Title'];
    $Firstname =$row['Firstname'];
    $Lastname = $row['Lastname'];     
   $Gender=$row['Gender'];
   $Contactno=$row['Contactno'];
   $HighestQualification=$row['HighestQualification'];

   
    } 
  }


$Interviewername = "";
  $Getinterviewdetail = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$interviewerid'  ORDER BY Employeeid";
  $result_Chapter01 = $conn->query($Getinterviewdetail );
  if(mysqli_num_rows($result_Chapter01) > 0) { 

    
  while($row = mysqli_fetch_array($result_Chapter01)) {  
    $Title01 =$row['Title'];
    $Firstname01 =$row['Firstname'];
    $Lastname01 = $row['Lastname'];     
    $Interviewername= "$Title01 $Firstname01 $Lastname01";
    $InterviewMailID = $row['Emaild'];

   
    } 
  }


  $mail = new PHPMailer(false); 
$mail->IsSMTP();
$tstbody = "";
$Usermailid = "";
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$date = date("Y-m-d " );
$Todaydate = date('d-M-Y', strtotime($date));

$Interview_held_On2 = date('d-M-Y',strtotime($Interview_held_On));

$DHinterviewdate2 = date('d-M-Y',strtotime($DHinterviewdate));



$MailTo = "";
$GetSuperusermail = "SELECT * FROM indsys1000useradmin where Clientid ='$Clientid' and Authorizedtype = 'HR Manager'  ";
$result_Supermail = $conn->query($GetSuperusermail );
if(mysqli_num_rows($result_Supermail) > 0) { 

  
while($row = $result_Supermail->fetch_assoc()) {  
  $Usermailid =$row['Emailid'];
  
  $MailTo .= "$Usermailid,";
  } 
}

// if ($MailTo == "")
// {
// }
// else
// {

//     $MailTo = substr($MailTo, 0, -1);
// }
$MailTo.= $InterviewMailID;
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
        <tr> <td><center><img alt='Logo' height='80px' src='$domain/assets/images/logo/logo.jpg'></center></td></tr>
        <tr>

         <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
<br/>
<h1 style='text-align: center;color:#2D9A43'>Candidate Fitment Approval</h1>
          <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Dear Sir,</p>
          <span style='font-size:16px;'><span><strong>Dear Sir/Madam,</strong> </span><br/>
          </td>
          </tr>
          <tr>
          <td>
          $Title$Firstname  $Lastname has an interview scheduled on $Interview_held_On2 at  $Candidateinterviewtime and Department Head Interview date on $DHinterviewdate2.
</td>
          </tr>
          <tr>
          <td>
          We kindly request you to interview the candidate on the scheduled Date and Time. 
          </td>
          </tr>  
   
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

  $SubjectMail="Candidate Fitment Approval";

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
$Message = "Mail Sent";

$Display = array(
    'Message' => $Message
);

$str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}



 }
 /////////////////////////////////////

 if($MethodGet =="UpdateFitmentApproved")
 {
$Candidateid = $form_data['Candidateid'];
$FitNextno =$form_data['FitNextno'];
$FitType = $form_data['FitType'];
$DHinterviewnotes = $form_data['DHinterviewnotes'];
if (empty($DHinterviewnotes))
{

    $Message = "DHinterviewnotes";

    $Display = array(
        'Message' => $Message
    );

    $str = json_encode($Display);
    echo trim($str, '"');
    return;
}

  $resultExistsss = "Update indsys1017candidatefitmentinformation set 
  DeptHeadApprovalStatus ='Approved',
  DeptHeadApprovalDateTime ='$date',
  Addormodifydatetime='$date' 
WHERE Candidateid = '$Candidateid' AND Fitmenttype ='$FitType'

AND Clientid ='$Clientid'  ";
  $resultExists0New = $conn->query($resultExistsss);
  $resultExists = "Update indsys1013candidatemaster set 
  DH_Approve ='Approved',
  DH_Approve_datetime ='$date',
  DHinterviewnotes ='$DHinterviewnotes',
  Addormodifydatetime ='$date' 

    WHERE Candidateid = ' $Candidateid' AND Clientid='$Clientid' ";
 $resultExists01 = $conn->query($resultExists);
 $Message = "Thankyou";

$url = "$domain/HRM09/TYPage.php";
  
  $Display = array(
    'Message' => $Message
);

$str = json_encode($Display);
echo trim($str, '"');

//SendMailToGM($conn,$domain,$Candidateid,$FitType);


 }


 if($MethodGet =="UpdateFitmentApprovedMail")
 {
$Candidateid = $form_data['Candidateid'];





SendMailToGM($conn,$domain,$Candidateid,$Clientid);

$Message="Mail Sent";
$Display = array(
  'Message' => $Message
);

$str = json_encode($Display);
echo trim($str, '"');


 }
 function SendMailToGM($conn,$domain,$Candidateid,$Clientid)
 {


  $MailTo = "";

  $GetChapter = "SELECT * FROM indsys1013candidatemaster where Candidateid = '$Candidateid' AND Clientid='$Clientid' ORDER BY Candidateid";
  $result_Chapter = $conn->query($GetChapter );
  if(mysqli_num_rows($result_Chapter) > 0) { 

    
  while($row = mysqli_fetch_array($result_Chapter)) {  
    $Title =$row['Title'];
    $Firstname =$row['Firstname'];
    $Lastname = $row['Lastname'];     

    $Designationproposed =$row['Designationproposed'];
   
    } 
  }


  $resultExists = "Update indsys1013candidatemaster set 
  Selectionstatus ='Waiting For GM Approval'
    WHERE Candidateid = '$Candidateid'  AND Clientid='$Clientid' ";
 $resultExists01 = $conn->query($resultExists);
$GetSuperusermail = "SELECT * FROM indsys1000useradmin where  Authorizedtype = 'General Manager'  AND Clientid='$Clientid'  ";
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

$mail = new PHPMailer(false); 
$mail->IsSMTP();
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
                        <p>Kindly Approve $Title$Firstname $Lastname for the position $Designationproposed .

Kindly check and provide your approval to select the respective candidate.</p>



<tr>
<td>Click<a target='_blank' href='$domain/HRM09/GMApprovedFit.php?Candidateid=$Candidateid&Clientid=$Clientid'> Here </a>For Approval</td>
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
              <td align='center' class='content-block'><br/>
              <small><span class='apple-link'>Britannia Garment Packaging) Pvt Ltd</span></small>
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

  $SubjectMail="Waiting For Fitment Approval - CandidateId:$Candidateid";

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
//header("Location: $domain/HRM09/TYPage.php");
 }
 catch(Exception $e)
 {

 }
 }
////////////////////

if($MethodGet =="UpdateFitmentRejected")
{
$Candidateid = $form_data['Candidateid'];
$FitNextno =$form_data['FitNextno'];
$FitType = $form_data['FitType'];
$DHinterviewnotes = $form_data['DHinterviewnotes'];
if (empty($DHinterviewnotes))
{

   $Message = "DHinterviewnotes";

   $Display = array(
       'Message' => $Message
   );

   $str = json_encode($Display);
   echo trim($str, '"');
   return;
}

 $resultExistsss = "Update indsys1017candidatefitmentinformation set 
 DeptHeadApprovalStatus ='Rejected',
 DeptHeadApprovalDateTime ='$date',
 Addormodifydatetime='$date' 
WHERE Candidateid = '$Candidateid' AND Fitmenttype ='$FitType'

AND Clientid ='$Clientid'  ";
 $resultExists0New = $conn->query($resultExistsss);
 $resultExists = "Update indsys1013candidatemaster set 
 DH_Approve ='Rejected',
 HR_Approve ='Rejected',
 GM_Approve ='Rejected',
 MD_Approve ='Rejected',
 Selectionstatus ='Rejected',
 DH_Approve_datetime ='$date',
 DHinterviewnotes ='$DHinterviewnotes',
 Addormodifydatetime ='$date' 

   WHERE Candidateid = ' $Candidateid' AND Clientid='$Clientid' ";
$resultExists01 = $conn->query($resultExists);
$Message = "Thankyou";

$url = "$domain/HRM09/TYPage.php";
 
 $Display = array(
   'Message' => $Message
);

$str = json_encode($Display);
echo trim($str, '"');




}
///////////////////

if($MethodGet =="UpdateFitmentGMApproved")
{
$Candidateid = $form_data['Candidateid'];
$FitNextno =$form_data['FitNextno'];
$FitType = $form_data['FitType'];
$GMinterviewnotes = $form_data['GMinterviewnotes'];
// if (empty($GMinterviewnotes))
// {

//    $Message = "GMinterviewnotes";

//    $Display = array(
//        'Message' => $Message
//    );

//    $str = json_encode($Display);
//    echo trim($str, '"');
//    return;
// }


if (empty($FitNextno))
{

   $Message = "FitNextno";

   $Display = array(
       'Message' => $Message
   );

   $str = json_encode($Display);
   echo trim($str, '"');
   return;
}

$GetChapter = "SELECT * FROM indsys1013candidatemaster where Candidateid = '$Candidateid' AND Clientid='$Clientid'  ORDER BY Candidateid";
$result_Chapter = $conn->query($GetChapter );
if(mysqli_num_rows($result_Chapter) > 0) { 

  
while($row = mysqli_fetch_array($result_Chapter)) {  
  $Title =$row['Title'];
  $Firstname =$row['Firstname'];
  $Lastname = $row['Lastname'];
  $Type_Of_Posistion = $row['Type_Of_Posistion']  ;   

  $Designationproposed =$row['Designationproposed'];
 
  } 
}
// if($Type_Of_Posistion =="Category 3")
// {
//   $Selectedstatus = "Appointed";
//  $resultExistsss = "Update indsys1017candidatefitmentinformation set 
//  GMApprovalStatus ='Approved',
//  GMApprovalDatetime ='$date',
//  MDApproval ='Approved',
//  MDApprovaldatetime ='$date',
//  FitStatus ='Final',
//  Addormodifydatetime='$date' 
// WHERE Candidateid = '$Candidateid' AND Fitmenttype ='$FitType'

//   ";
//  $resultExists0New = $conn->query($resultExistsss);


//  $GetChapter = "SELECT * FROM indsys1017candidatefitmentinformation where  Candidateid = '$Candidateid' and Fitmenttype='$FitType' ORDER BY Candidateid";
//  $result_Chapter = $conn->query($GetChapter );
//  if(mysqli_num_rows($result_Chapter) > 0) { 
   
//  while($row = mysqli_fetch_array($result_Chapter)) {  
//    $CurMotBasicDA =$row['CurMotBasicDA'];
//    $CurMotHRA =$row['CurMotHRA'];
//    $CurMotSpecialAllowance = $row['CurMotSpecialAllowance'];
//    $CurMotTotalAllowance =$row['CurMotTotalAllowance'];
//    $CurMotPFemployeer = $row['CurMotPFemployeer'];
//    $CurMotGratuity =$row['CurMotGratuity'];
//    $CurMotGAC = $row['CurMotGAC'];
//    $CurMotEstimatedBonous =$row['CurMotEstimatedBonous'];
//    $CurMotOtherBonous = $row['CurMotOtherBonous'];
//    $CurMotCTC = $row['CurMotCTC'];
//    $CurMotDeductions =$row['CurMotDeductions'];
//    $CurMotESIC = $row['CurMotESIC'];
//    $CurMotPFemployee =$row['CurMotPFemployee'];
//    $CurMotCanteen =$row['CurMotCanteen'];
//    $CurMotStayAllowance =$row['CurMotStayAllowance'];
//    $CurMotTravelAllowance = $row['CurMotTravelAllowance'];
//    $CurMotOtherDeductions =$row['CurMotOtherDeductions'];
//    $CurMotDeductionTotal = $row['CurMotDeductionTotal'];
//    $CurMottakehomewithouttax =$row['CurMottakehomewithouttax'];
//    $CurAnnuaBasicDA =$row['CurAnnuaBasicDA'];
//    $CurAnnuaHRA =$row['CurAnnuaHRA'];
//    $CurAnnuaSpecialAllowance =$row['CurAnnuaSpecialAllowance'];
//    $CurAnnuaTotalAllowance =$row['CurAnnuaTotalAllowance'];
//    $CurAnnuaPFemployeer =$row['CurAnnuaPFemployeer'];
//    $CurAnnuaGratuity =$row['CurAnnuaGratuity'];
//    $CurAnnuaRetairlsTotal =$row['CurAnnuaRetairlsTotal'];
//    $CurAnnuaGAC =$row['CurAnnuaGAC'];
//    $CurAnnuaEstimatedBonous = $row['CurAnnuaEstimatedBonous'];
//    $CurAnnuaOtherBonous = $row['CurAnnuaOtherBonous'];
//    $CurAnnuaCTC =$row['CurAnnuaCTC'];
//    $CurAnnuaDeductions =$row['CurAnnuaDeductions'];
//    $CurAnnuaESIC =$row['CurAnnuaESIC'];
//    $CurAnnuaPFemployee =$row['CurAnnuaPFemployee'];
//    $CurAnnuaCanteen =$row['CurAnnuaCanteen'];
//    $CurAnnuaStayAllowance = $row['CurAnnuaStayAllowance'];
//    $CurAnnuaTravelAllowance =$row['CurAnnuaTravelAllowance'];
//    $CurAnnuaOtherDeductions = $row['CurAnnuaOtherDeductions'];
//    $CurAnnuaDeductionTotal =$row['CurAnnuaDeductionTotal'];
//    $CurAnnuatakehomewithouttax =$row['CurAnnuatakehomewithouttax'];
//    $CurincperBasicDA =$row['CurincperBasicDA'];
//    $CurincperHRA = $row['CurincperHRA'];
//    $CurincperSpecialAllowance =$row['CurincperSpecialAllowance'];
//    $CurincperTotalAllowance =$row['CurincperTotalAllowance'];
//    $CurincperPFemployeer = $row['CurincperPFemployeer'];
//    $CurincperGratuity = $row['CurincperGratuity'];
//    $CurincperRetairlsTotal =$row['CurincperRetairlsTotal'];
//    $CurincperGAC = $row['CurincperGAC'];
//   $CurincperEstimatedBonous=$row['CurincperEstimatedBonous'];
//   $CurincperOtherBonous=$row['CurincperOtherBonous'];
//   $CurincperCTC=$row['CurincperCTC'];
//   $CurincperDeductions=$row['CurincperDeductions'];
//   $CurincperESIC=$row['CurincperESIC'];
//   $CurincperPFemployee=$row['CurincperPFemployee'];
//   $CurincperCanteen=$row['CurincperCanteen'];
//   $CurincperStayAllowance=$row['CurincperStayAllowance'];
//   $CurincperTravelAllowance =$row['CurincperTravelAllowance'];
//   $CurincperOtherDeductions = $row['CurincperOtherDeductions'];
//   $CurincperDeductionTotal=$row['CurincperDeductionTotal'];
//   $Curincpertakehomewithouttax=$row['Curincpertakehomewithouttax'];
//   $FitStatus=$row['FitStatus'];
//   $CurMotRetairlsTotal = $row['CurMotRetairlsTotal'];
//   $sqlsave = "INSERT IGNORE INTO indsys1017candidatefinalfitment (
//    Clientid,Candidateid,CurMotBasicDA,CurMotHRA,CurMotSpecialAllowance,CurMotTotalAllowance,
//    CurMotPFemployeer,CurMotGratuity,CurMotRetairlsTotal,CurMotGAC,CurMotEstimatedBonous,CurMotOtherBonous,CurMotCTC,CurMotDeductions,
//    CurMotESIC,CurMotPFemployee,CurMotCanteen,CurMotStayAllowance,CurMotTravelAllowance,CurMotOtherDeductions,CurMotDeductionTotal,CurMottakehomewithouttax,
//    CurAnnuaBasicDA,CurAnnuaHRA,CurAnnuaSpecialAllowance,CurAnnuaTotalAllowance,CurAnnuaPFemployeer,CurAnnuaGratuity,CurAnnuaRetairlsTotal,CurAnnuaGAC,
//    CurAnnuaEstimatedBonous,CurAnnuaOtherBonous,CurAnnuaCTC,CurAnnuaDeductions,CurAnnuaESIC,CurAnnuaPFemployee,CurAnnuaCanteen,CurAnnuaStayAllowance,
//    CurAnnuaTravelAllowance,CurAnnuaOtherDeductions,CurAnnuaDeductionTotal,CurAnnuatakehomewithouttax,CurincperBasicDA,CurincperHRA,CurincperSpecialAllowance,CurincperTotalAllowance,
//    CurincperPFemployeer,CurincperGratuity,CurincperRetairlsTotal,CurincperGAC,CurincperEstimatedBonous,CurincperOtherBonous,CurincperCTC,CurincperDeductions,
//    CurincperESIC,CurincperPFemployee,CurincperCanteen,CurincperStayAllowance,CurincperTravelAllowance,CurincperOtherDeductions,CurincperDeductionTotal,Curincpertakehomewithouttax,
//   CurincAmtBasicDA,CurincAmtHRA,CurincAmtSpecialAllowance,CurincAmtTotalAllowance,CurincAmtPFemployeer,CurincAmtGratuity,
//    CurincAmtRetairlsTotal,CurincAmtGAC,CurincAmtEstimatedBonous,CurincAmtOtherBonous,CurincAmtCTC,CurincAmtDeductions,CurincAmtESIC,CurincAmtPFemployee,
//    CurincAmtCanteen,CurincAmtStayAllowance,CurincAmtTravelAllowance,CurincAmtOtherDeductions,CurincAmtDeductionTotal,CurincAmttakehomewithouttax,Userid,Addormodifydatetime)
//     VALUES (
//    '$Clientid ','$Candidateid ','$CurMotBasicDA ','$CurMotHRA ','$CurMotSpecialAllowance',
//     '$CurMotTotalAllowance','$CurMotPFemployeer ','$CurMotGratuity ','$CurMotRetairlsTotal ','$CurMotGAC',
//     '$CurMotEstimatedBonous ','$CurMotOtherBonous ','$CurMotCTC ','$CurMotDeductions ','$CurMotESIC',
//     '$CurMotPFemployee ','$CurMotCanteen ','$CurMotStayAllowance ','$CurMotTravelAllowance ','$CurMotOtherDeductions',
//     '$CurMotDeductionTotal ','$CurMottakehomewithouttax ','$CurAnnuaBasicDA ','$CurAnnuaHRA ','$CurAnnuaSpecialAllowance',
//     '$CurAnnuaTotalAllowance ','$CurAnnuaPFemployeer ','$CurAnnuaGratuity ','$CurAnnuaRetairlsTotal ','$CurAnnuaGAC',
//     '$CurAnnuaEstimatedBonous ','$CurAnnuaOtherBonous ','$CurAnnuaCTC ','$CurAnnuaDeductions ','$CurAnnuaESIC',
//     '$CurAnnuaPFemployee ','$CurAnnuaCanteen ','$CurAnnuaStayAllowance ','$CurAnnuaTravelAllowance ','$CurAnnuaOtherDeductions',
//     '$CurAnnuaDeductionTotal ','$CurAnnuatakehomewithouttax ','$CurincperBasicDA ','$CurincperHRA ','$CurincperSpecialAllowance',
//     '$CurincperTotalAllowance ','$CurincperPFemployeer ','$CurincperGratuity ','$CurincperRetairlsTotal ','$CurincperGAC',
//     '$CurincperEstimatedBonous ','$CurincperOtherBonous ','$CurincperCTC ','$CurincperDeductions ','$CurincperESIC',
//     '$CurincperPFemployee ','$CurincperCanteen ','$CurincperStayAllowance ','$CurincperTravelAllowance ','$CurincperOtherDeductions',
//     '$CurincperDeductionTotal ','$Curincpertakehomewithouttax ',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'$user_id','$date')";
//        $resultsave = mysqli_query($conn, $sqlsave);
//        $resultExists = "Update indsys1013candidatemaster set        
//        Addormodifydatetime ='$date',
//        Userid ='$user_id',
//        CommitedCTC ='$CurMottakehomewithouttax',  
//        MDinterviewnotes ='Approved By General Manager',

//        GM_Approve ='Approved',
//        GM_Approve_datetime ='$date',
//        GMinterviewnotes ='$GMinterviewnotes',
//        Selectionstatus ='$Selectedstatus'
//          WHERE Candidateid = ' $Candidateid' ";
//       $resultExists01 = $conn->query($resultExists);


//        $Message = "Update";
  
  
//    } 
//  }




//  $resultExists = "Update indsys1013candidatemaster set 
//  MD_Approve ='Approved',
//  MD_Approve_datetime ='$date',
//  MDinterviewnotes ='Approved By General Manager',
//  Addormodifydatetime ='$date' 

//    WHERE Candidateid = ' $Candidateid' ";
// $resultExists01 = $conn->query($resultExists);
// $Message = "Thankyou";

// }

 $resultExistsss = "Update indsys1017candidatefitmentinformation set 
 GMApprovalStatus ='Approved',
 GMApprovalDatetime ='$date',
 Addormodifydatetime='$date' 
WHERE Candidateid = '$Candidateid' AND Fitmenttype ='$FitType'

AND Clientid ='$Clientid'  ";
 $resultExists0New = $conn->query($resultExistsss);
 $resultExists = "Update indsys1013candidatemaster set 
 GM_Approve ='Approved',
 GM_Approve_datetime ='$date',
 GMinterviewnotes ='$GMinterviewnotes',
 Selectionstatus ='Waiting For MD Approval',
 Addormodifydatetime ='$date' 

   WHERE Candidateid = ' $Candidateid' AND Clientid='$Clientid' ";
$resultExists01 = $conn->query($resultExists);
$Message = "Thankyou";





$Display = array(
    'Message' => $Message
);

$str = json_encode($Display);
echo trim($str, '"');




}
//////////////////

if($MethodGet =="UpdateFitmentGMApprovedMail")
{
$Candidateid = $form_data['Candidateid'];

$GetChapter = "SELECT * FROM indsys1013candidatemaster where Candidateid = '$Candidateid' AND Clientid='$Clientid'  ORDER BY Candidateid";
$result_Chapter = $conn->query($GetChapter );
if(mysqli_num_rows($result_Chapter) > 0) { 

  
while($row = mysqli_fetch_array($result_Chapter)) {  
  $Title =$row['Title'];
  $Firstname =$row['Firstname'];
  $Lastname = $row['Lastname'];
  $Type_Of_Posistion = $row['Type_Of_Posistion']  ;   

  $Designationproposed =$row['Designationproposed'];
  $Selectionstatus =$row['Selectionstatus'];
  $GMApprovalStatus = $row['GM_Approve'];
 
  } 
}

// if($Type_Of_Posistion =="Category 3")
// {
// if($Selectedstatus =="Appointed")
// {
//   SendMailToCandidate($conn,$domain,$Candidateid);
// }
// }
// else
// {
  // if($GMApprovalStatus =="Approved")
  // {
SendMailToMD($conn,$domain,$Candidateid,$Clientid);
 // }
//}

$Message="Mail Sent";
$Display = array(
 'Message' => $Message
);

$str = json_encode($Display);
echo trim($str, '"');


}
//////////////////////////////////
function SendMailToMD($conn,$domain,$Candidateid,$Clientid)
 {


  $MailTo = "";

  $resultExists = "Update indsys1013candidatemaster set 
  Selectionstatus ='Waiting For MD Approval'
    WHERE Candidateid = '$Candidateid' AND Clientid='$Clientid' ";
 $resultExists01 = $conn->query($resultExists);



  $GetChapter = "SELECT * FROM indsys1013candidatemaster where Candidateid = '$Candidateid' AND Clientid='$Clientid'  ORDER BY Candidateid";
  $result_Chapter = $conn->query($GetChapter );
  if(mysqli_num_rows($result_Chapter) > 0) { 

    
  while($row = mysqli_fetch_array($result_Chapter)) {  
    $Title =$row['Title'];
    $Firstname =$row['Firstname'];
    $Lastname = $row['Lastname'];     

    $Designationproposed =$row['Designationproposed'];
   
    } 
  }
  
$GetSuperusermail = "SELECT * FROM indsys1000useradmin where  Authorizedtype = 'ADMIN' AND Clientid='$Clientid' ";
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
$mail = new PHPMailer(false); 
$mail->IsSMTP();
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
                        <p>Kindly Approve $Title$Firstname $Lastname for the position $Designationproposed .

Kindly check and provide your approval to select the respective candidate.</p>



<tr>
<td>Click<a target='_blank' href='$domain/HRM09/SuperUserApprovedFit.php?Candidateid=$Candidateid&Clientid=$Clientid'> Here </a>For Approval</td>
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
              <td align='center' class='content-block'><br/>
              <small><span class='apple-link'>Britannia Garment Packaging Pvt Ltd</span></small>
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

  $SubjectMail="Waiting For Fitment Approval - CandidateId:$Candidateid";

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
 }

 if($MethodGet == 'FetchFitApproved')
{

    try
    { 
  

      $Candidateid =$form_data['Candidateid'];
      
    
      $_SESSION["Candidateid"] = $Candidateid;
    $GetChapter = "SELECT * FROM indsys1017candidatefitmentinformation where Clientid ='$Clientid' and Candidateid = '$Candidateid' and DeptHeadApprovalStatus='Approved'   ORDER BY Candidateid LIMIT 1";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $CurMotBasicDA =$row['CurMotBasicDA'];
      $CurMotHRA =$row['CurMotHRA'];
      $CurMotSpecialAllowance = $row['CurMotSpecialAllowance'];
      $CurMotTotalAllowance =$row['CurMotTotalAllowance'];
      $CurMotPFemployeer = $row['CurMotPFemployeer'];
      $CurMotGratuity =$row['CurMotGratuity'];
      $CurMotGAC = $row['CurMotGAC'];
      $CurMotEstimatedBonous =$row['CurMotEstimatedBonous'];
      $CurMotOtherBonous = $row['CurMotOtherBonous'];
      $CurMotCTC = $row['CurMotCTC'];
      $CurMotDeductions =$row['CurMotDeductions'];
      $CurMotESIC = $row['CurMotESIC'];
      $CurMotPFemployee =$row['CurMotPFemployee'];
      $CurMotCanteen =$row['CurMotCanteen'];
      $CurMotStayAllowance =$row['CurMotStayAllowance'];
      $CurMotTravelAllowance = $row['CurMotTravelAllowance'];
      $CurMotOtherDeductions =$row['CurMotOtherDeductions'];
      $CurMotDeductionTotal = $row['CurMotDeductionTotal'];
      $CurMottakehomewithouttax =$row['CurMottakehomewithouttax'];
      $CurAnnuaBasicDA =$row['CurAnnuaBasicDA'];
      $CurAnnuaHRA =$row['CurAnnuaHRA'];
      $CurAnnuaSpecialAllowance =$row['CurAnnuaSpecialAllowance'];
      $CurAnnuaTotalAllowance =$row['CurAnnuaTotalAllowance'];
      $CurAnnuaPFemployeer =$row['CurAnnuaPFemployeer'];
      $CurAnnuaGratuity =$row['CurAnnuaGratuity'];
      $CurAnnuaRetairlsTotal =$row['CurAnnuaRetairlsTotal'];
      $CurAnnuaGAC =$row['CurAnnuaGAC'];
      $CurAnnuaEstimatedBonous = $row['CurAnnuaEstimatedBonous'];
      $CurAnnuaOtherBonous = $row['CurAnnuaOtherBonous'];
      $CurAnnuaCTC =$row['CurAnnuaCTC'];
      $CurAnnuaDeductions =$row['CurAnnuaDeductions'];
      $CurAnnuaESIC =$row['CurAnnuaESIC'];
      $CurAnnuaPFemployee =$row['CurAnnuaPFemployee'];
      $CurAnnuaCanteen =$row['CurAnnuaCanteen'];
      $CurAnnuaStayAllowance = $row['CurAnnuaStayAllowance'];
      $CurAnnuaTravelAllowance =$row['CurAnnuaTravelAllowance'];
      $CurAnnuaOtherDeductions = $row['CurAnnuaOtherDeductions'];
      $CurAnnuaDeductionTotal =$row['CurAnnuaDeductionTotal'];
      $CurAnnuatakehomewithouttax =$row['CurAnnuatakehomewithouttax'];
      $CurincperBasicDA =$row['CurincperBasicDA'];
      $CurincperHRA = $row['CurincperHRA'];
      $CurincperSpecialAllowance =$row['CurincperSpecialAllowance'];
      $CurincperTotalAllowance =$row['CurincperTotalAllowance'];
      $CurincperPFemployeer = $row['CurincperPFemployeer'];
      $CurincperGratuity = $row['CurincperGratuity'];
      $CurincperRetairlsTotal =$row['CurincperRetairlsTotal'];
      $CurincperGAC = $row['CurincperGAC'];
     $CurincperEstimatedBonous=$row['CurincperEstimatedBonous'];
     $CurincperOtherBonous=$row['CurincperOtherBonous'];
     $CurincperCTC=$row['CurincperCTC'];
     $CurincperDeductions=$row['CurincperDeductions'];
     $CurincperESIC=$row['CurincperESIC'];
     $CurincperPFemployee=$row['CurincperPFemployee'];
     $CurincperCanteen=$row['CurincperCanteen'];
     $CurincperStayAllowance=$row['CurincperStayAllowance'];
     $CurincperTravelAllowance =$row['CurincperTravelAllowance'];
     $CurincperOtherDeductions = $row['CurincperOtherDeductions'];
     $CurincperDeductionTotal=$row['CurincperDeductionTotal'];
     $Curincpertakehomewithouttax=$row['Curincpertakehomewithouttax'];
     $FitStatus=$row['FitStatus'];
     $CurMotRetairlsTotal = $row['CurMotRetairlsTotal'];
     $FitType = $row['Fitmenttype'];
     $FitNextno = $row['fitno'];
     $Performanceallowancemonthly=$row['Performanceallowancemonthly'];
     $Performanceallowanceyearly = $row['Performanceallowanceyearly'];
    
     
     
      } 
    }


 
    
    $Display=array(
      'CurMotBasicDA'=>  $CurMotBasicDA,
      'CurMotHRA'=> $CurMotHRA,
      'CurMotSpecialAllowance'=>  $CurMotSpecialAllowance,
      'CurMotTotalAllowance'=> $CurMotTotalAllowance,
      'CurMotPFemployeer'=> $CurMotPFemployeer,
      'CurMotGratuity'=> $CurMotGratuity,
      'CurMotEstimatedBonous'=>  $CurMotEstimatedBonous,
      'CurMotGAC'=> $CurMotGAC,
      'CurMotOtherBonous'=>  $CurMotOtherBonous,
      'CurMotCTC'=>  $CurMotCTC,
      'CurMotDeductions'=> $CurMotDeductions,
      'CurMotESIC'=> $CurMotESIC,
      'CurMotPFemployee'=> $CurMotPFemployee,
      'CurMotCanteen'=> $CurMotCanteen,
      'CurMotStayAllowance'=>$CurMotStayAllowance,
      'CurMotTravelAllowance'=> $CurMotTravelAllowance,
      'CurMotDeductionTotal'=> $CurMotDeductionTotal,
      'CurMotOtherDeductions'=> $CurMotOtherDeductions,
      'CurMottakehomewithouttax'=> $CurMottakehomewithouttax,
      'CurAnnuaBasicDA'=>$CurAnnuaBasicDA,
      'CurAnnuaHRA'=>$CurAnnuaHRA,
      'CurAnnuaSpecialAllowance'=>$CurAnnuaSpecialAllowance,
      'CurAnnuaTotalAllowance'=>$CurAnnuaTotalAllowance,
      'CurAnnuaPFemployeer'=>$CurAnnuaPFemployeer,
      'CurAnnuaGratuity'=>$CurAnnuaGratuity,     
      'CurAnnuaRetairlsTotal'=>$CurAnnuaRetairlsTotal,
      'CurAnnuaGAC'=> $CurAnnuaGAC,
      'CurAnnuaEstimatedBonous'=> $CurAnnuaEstimatedBonous,
      'CurAnnuaOtherBonous'=>$CurAnnuaOtherBonous,
      'CurAnnuaCTC'=>$CurAnnuaCTC,
     'CurAnnuaDeductions'=>$CurAnnuaDeductions,
      'CurAnnuaESIC'=>$CurAnnuaESIC,
      'CurAnnuaPFemployee'=>$CurAnnuaPFemployee,
      'CurAnnuaCanteen'=> $CurAnnuaCanteen,
      'CurAnnuaStayAllowance'=>$CurAnnuaStayAllowance,
      'CurAnnuaTravelAllowance'=> $CurAnnuaTravelAllowance,
      'CurAnnuaOtherDeductions'=>$CurAnnuaOtherDeductions,
      'CurAnnuaDeductionTotal'=>$CurAnnuaDeductionTotal,
      'CurAnnuatakehomewithouttax'=>$CurAnnuatakehomewithouttax,
     'CurincperBasicDA'=> $CurincperBasicDA,
      'CurincperHRA'=>$CurincperHRA,
    'CurincperSpecialAllowance'=>$CurincperSpecialAllowance,
     'CurincperTotalAllowance'=> $CurincperTotalAllowance,
     'CurincperPFemployeer'=> $CurincperPFemployeer,
     'CurincperGratuity'=>$CurincperGratuity,
     'CurincperGAC'=> $CurincperGAC,
    'CurincperEstimatedBonous'=>$CurincperEstimatedBonous,
    'CurincperOtherBonous'=>$CurincperOtherBonous,
   'CurincperCTC'=>$CurincperCTC,
    'CurincperDeductions'=>$CurincperDeductions,
    'CurincperESIC' =>$CurincperESIC,
    'CurincperPFemployee' =>$CurincperPFemployee,
    'CurincperCanteen' =>$CurincperCanteen,
    'CurincperStayAllowance' =>$CurincperStayAllowance,
    'CurincperTravelAllowance' =>$CurincperTravelAllowance,
    'CurincperOtherDeductions'=> $CurincperOtherDeductions,
    'CurincperDeductionTotal'=>$CurincperDeductionTotal,
    'CurincperDeductionTotal'=> $CurincperDeductionTotal,
   'Curincpertakehomewithouttax'=>$Curincpertakehomewithouttax,
   'CurincperRetairlsTotal'=>$CurincperRetairlsTotal,
   'FitStatus'=>$FitStatus,
   'CurMotRetairlsTotal' =>$CurMotRetairlsTotal,
   'FitType' =>$FitType,
   'FitNextno' =>$FitNextno,
   'Performanceallowancemonthly' =>$Performanceallowancemonthly,
   'Performanceallowanceyearly' =>$Performanceallowanceyearly
 
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }
 ////////////////////////////////

 if($MethodGet =="UpdateFitmentGMRejected")
{
$Candidateid = $form_data['Candidateid'];
$FitNextno =$form_data['FitNextno'];
$FitType = $form_data['FitType'];
$GMinterviewnotes = $form_data['GMinterviewnotes'];
if (empty($GMinterviewnotes))
{

   $Message = "GMinterviewnotes";

   $Display = array(
       'Message' => $Message
   );

   $str = json_encode($Display);
   echo trim($str, '"');
   return;
}

 $resultExistsss = "Update indsys1017candidatefitmentinformation set 
 GMApprovalStatus ='Rejected',
 GMApprovalDatetime ='$date',
 Addormodifydatetime='$date' 
WHERE Candidateid = '$Candidateid' AND Fitmenttype ='$FitType'

AND Clientid ='$Clientid'  ";
 $resultExists0New = $conn->query($resultExistsss);
 $resultExists = "Update indsys1013candidatemaster set 
 DH_Approve ='Rejected',
 HR_Approve ='Rejected',
 GM_Approve ='Rejected',
 MD_Approve ='Rejected',
 Selectionstatus ='Rejected',
 GM_Approve_datetime ='$date',
 GMinterviewnotes ='$GMinterviewnotes',
 Addormodifydatetime ='$date' 

   WHERE Candidateid = ' $Candidateid' AND Clientid ='$Clientid' ";
$resultExists01 = $conn->query($resultExists);
 $Message = "Thankyou";

$url = "$domain/HRM09/TYPage.php";
 
 $Display = array(
   'Message' => $Message,'url' =>$url
);

$str = json_encode($Display);
echo trim($str, '"');




}
///////////////////////////////////////////////////
if($MethodGet =="UpdateFitmentMDApproved")
{
$Candidateid = $form_data['Candidateid'];
$FitNextno =$form_data['FitNextno'];
$FitType = $form_data['FitType'];
$MDinterviewnotes = $form_data['MDinterviewnotes'];
// if (empty($MDinterviewnotes))
// {

//    $Message = "MDinterviewnotes";

//    $Display = array(
//        'Message' => $Message
//    );

//    $str = json_encode($Display);
//    echo trim($str, '"');
//    return;
// }
if (empty($FitNextno))
{

   $Message = "FitNextno";

   $Display = array(
       'Message' => $Message
   );

   $str = json_encode($Display);
   echo trim($str, '"');
   return;
}

$Selectedstatus = "Appointed";
 $resultExistsss = "Update indsys1017candidatefitmentinformation set 
 MDApproval ='Approved',
 MDApprovaldatetime ='$date',
 FitStatus ='Final',
 Addormodifydatetime='$date' 
WHERE Candidateid = '$Candidateid' AND Fitmenttype ='$FitType' AND Clientid ='$Clientid'

  ";
 $resultExists0New = $conn->query($resultExistsss);


 $GetChapter = "SELECT * FROM indsys1017candidatefitmentinformation where  Candidateid = '$Candidateid' and Fitmenttype='$FitType' AND Clientid ='$Clientid' ORDER BY Candidateid";
 $result_Chapter = $conn->query($GetChapter );
 if(mysqli_num_rows($result_Chapter) > 0) { 
   
 while($row = mysqli_fetch_array($result_Chapter)) {  
   $CurMotBasicDA =$row['CurMotBasicDA'];
   $CurMotHRA =$row['CurMotHRA'];
   $CurMotSpecialAllowance = $row['CurMotSpecialAllowance'];
   $CurMotTotalAllowance =$row['CurMotTotalAllowance'];
   $CurMotPFemployeer = $row['CurMotPFemployeer'];
   $CurMotGratuity =$row['CurMotGratuity'];
   $CurMotGAC = $row['CurMotGAC'];
   $CurMotEstimatedBonous =$row['CurMotEstimatedBonous'];
   $CurMotOtherBonous = $row['CurMotOtherBonous'];
   $CurMotCTC = $row['CurMotCTC'];
   $CurMotDeductions =$row['CurMotDeductions'];
   $CurMotESIC = $row['CurMotESIC'];
   $CurMotPFemployee =$row['CurMotPFemployee'];
   $CurMotCanteen =$row['CurMotCanteen'];
   $CurMotStayAllowance =$row['CurMotStayAllowance'];
   $CurMotTravelAllowance = $row['CurMotTravelAllowance'];
   $CurMotOtherDeductions =$row['CurMotOtherDeductions'];
   $CurMotDeductionTotal = $row['CurMotDeductionTotal'];
   $CurMottakehomewithouttax =$row['CurMottakehomewithouttax'];
   $CurAnnuaBasicDA =$row['CurAnnuaBasicDA'];
   $CurAnnuaHRA =$row['CurAnnuaHRA'];
   $CurAnnuaSpecialAllowance =$row['CurAnnuaSpecialAllowance'];
   $CurAnnuaTotalAllowance =$row['CurAnnuaTotalAllowance'];
   $CurAnnuaPFemployeer =$row['CurAnnuaPFemployeer'];
   $CurAnnuaGratuity =$row['CurAnnuaGratuity'];
   $CurAnnuaRetairlsTotal =$row['CurAnnuaRetairlsTotal'];
   $CurAnnuaGAC =$row['CurAnnuaGAC'];
   $CurAnnuaEstimatedBonous = $row['CurAnnuaEstimatedBonous'];
   $CurAnnuaOtherBonous = $row['CurAnnuaOtherBonous'];
   $CurAnnuaCTC =$row['CurAnnuaCTC'];
   $CurAnnuaDeductions =$row['CurAnnuaDeductions'];
   $CurAnnuaESIC =$row['CurAnnuaESIC'];
   $CurAnnuaPFemployee =$row['CurAnnuaPFemployee'];
   $CurAnnuaCanteen =$row['CurAnnuaCanteen'];
   $CurAnnuaStayAllowance = $row['CurAnnuaStayAllowance'];
   $CurAnnuaTravelAllowance =$row['CurAnnuaTravelAllowance'];
   $CurAnnuaOtherDeductions = $row['CurAnnuaOtherDeductions'];
   $CurAnnuaDeductionTotal =$row['CurAnnuaDeductionTotal'];
   $CurAnnuatakehomewithouttax =$row['CurAnnuatakehomewithouttax'];
   $CurincperBasicDA =$row['CurincperBasicDA'];
   $CurincperHRA = $row['CurincperHRA'];
   $CurincperSpecialAllowance =$row['CurincperSpecialAllowance'];
   $CurincperTotalAllowance =$row['CurincperTotalAllowance'];
   $CurincperPFemployeer = $row['CurincperPFemployeer'];
   $CurincperGratuity = $row['CurincperGratuity'];
   $CurincperRetairlsTotal =$row['CurincperRetairlsTotal'];
   $CurincperGAC = $row['CurincperGAC'];
  $CurincperEstimatedBonous=$row['CurincperEstimatedBonous'];
  $CurincperOtherBonous=$row['CurincperOtherBonous'];
  $CurincperCTC=$row['CurincperCTC'];
  $CurincperDeductions=$row['CurincperDeductions'];
  $CurincperESIC=$row['CurincperESIC'];
  $CurincperPFemployee=$row['CurincperPFemployee'];
  $CurincperCanteen=$row['CurincperCanteen'];
  $CurincperStayAllowance=$row['CurincperStayAllowance'];
  $CurincperTravelAllowance =$row['CurincperTravelAllowance'];
  $CurincperOtherDeductions = $row['CurincperOtherDeductions'];
  $CurincperDeductionTotal=$row['CurincperDeductionTotal'];
  $Curincpertakehomewithouttax=$row['Curincpertakehomewithouttax'];
  $FitStatus=$row['FitStatus'];
  $CurMotRetairlsTotal = $row['CurMotRetairlsTotal'];
  $Performanceallowancemonthly=$row['Performanceallowancemonthly'];
  $Performanceallowanceyearly=$row['Performanceallowanceyearly'];

  if(empty($Performanceallowancemonthly))
  {
    $Performanceallowancemonthly =0;
  }
  if(empty($Performanceallowanceyearly))
  {
    $Performanceallowanceyearly =0;
  }
  $sqlsave = "INSERT IGNORE INTO indsys1017candidatefinalfitment (
   Clientid,Candidateid,CurMotBasicDA,CurMotHRA,CurMotSpecialAllowance,CurMotTotalAllowance,
   CurMotPFemployeer,CurMotGratuity,CurMotRetairlsTotal,CurMotGAC,CurMotEstimatedBonous,CurMotOtherBonous,CurMotCTC,CurMotDeductions,
   CurMotESIC,CurMotPFemployee,CurMotCanteen,CurMotStayAllowance,CurMotTravelAllowance,CurMotOtherDeductions,CurMotDeductionTotal,CurMottakehomewithouttax,
   CurAnnuaBasicDA,CurAnnuaHRA,CurAnnuaSpecialAllowance,CurAnnuaTotalAllowance,CurAnnuaPFemployeer,CurAnnuaGratuity,CurAnnuaRetairlsTotal,CurAnnuaGAC,
   CurAnnuaEstimatedBonous,CurAnnuaOtherBonous,CurAnnuaCTC,CurAnnuaDeductions,CurAnnuaESIC,CurAnnuaPFemployee,CurAnnuaCanteen,CurAnnuaStayAllowance,
   CurAnnuaTravelAllowance,CurAnnuaOtherDeductions,CurAnnuaDeductionTotal,CurAnnuatakehomewithouttax,CurincperBasicDA,CurincperHRA,CurincperSpecialAllowance,CurincperTotalAllowance,
   CurincperPFemployeer,CurincperGratuity,CurincperRetairlsTotal,CurincperGAC,CurincperEstimatedBonous,CurincperOtherBonous,CurincperCTC,CurincperDeductions,
   CurincperESIC,CurincperPFemployee,CurincperCanteen,CurincperStayAllowance,CurincperTravelAllowance,CurincperOtherDeductions,CurincperDeductionTotal,Curincpertakehomewithouttax,
  CurincAmtBasicDA,CurincAmtHRA,CurincAmtSpecialAllowance,CurincAmtTotalAllowance,CurincAmtPFemployeer,CurincAmtGratuity,
   CurincAmtRetairlsTotal,CurincAmtGAC,CurincAmtEstimatedBonous,CurincAmtOtherBonous,CurincAmtCTC,CurincAmtDeductions,CurincAmtESIC,CurincAmtPFemployee,
   CurincAmtCanteen,CurincAmtStayAllowance,CurincAmtTravelAllowance,CurincAmtOtherDeductions,CurincAmtDeductionTotal,CurincAmttakehomewithouttax,Userid,Addormodifydatetime,Performanceallowancemonthly,Performanceallowanceyearly)
    VALUES (
   '$Clientid ','$Candidateid ','$CurMotBasicDA ','$CurMotHRA ','$CurMotSpecialAllowance',
    '$CurMotTotalAllowance','$CurMotPFemployeer ','$CurMotGratuity ','$CurMotRetairlsTotal ','$CurMotGAC',
    '$CurMotEstimatedBonous ','$CurMotOtherBonous ','$CurMotCTC ','$CurMotDeductions ','$CurMotESIC',
    '$CurMotPFemployee ','$CurMotCanteen ','$CurMotStayAllowance ','$CurMotTravelAllowance ','$CurMotOtherDeductions',
    '$CurMotDeductionTotal ','$CurMottakehomewithouttax ','$CurAnnuaBasicDA ','$CurAnnuaHRA ','$CurAnnuaSpecialAllowance',
    '$CurAnnuaTotalAllowance ','$CurAnnuaPFemployeer ','$CurAnnuaGratuity ','$CurAnnuaRetairlsTotal ','$CurAnnuaGAC',
    '$CurAnnuaEstimatedBonous ','$CurAnnuaOtherBonous ','$CurAnnuaCTC ','$CurAnnuaDeductions ','$CurAnnuaESIC',
    '$CurAnnuaPFemployee ','$CurAnnuaCanteen ','$CurAnnuaStayAllowance ','$CurAnnuaTravelAllowance ','$CurAnnuaOtherDeductions',
    '$CurAnnuaDeductionTotal ','$CurAnnuatakehomewithouttax ','$CurincperBasicDA ','$CurincperHRA ','$CurincperSpecialAllowance',
    '$CurincperTotalAllowance ','$CurincperPFemployeer ','$CurincperGratuity ','$CurincperRetairlsTotal ','$CurincperGAC',
    '$CurincperEstimatedBonous ','$CurincperOtherBonous ','$CurincperCTC ','$CurincperDeductions ','$CurincperESIC',
    '$CurincperPFemployee ','$CurincperCanteen ','$CurincperStayAllowance ','$CurincperTravelAllowance ','$CurincperOtherDeductions',
    '$CurincperDeductionTotal ','$Curincpertakehomewithouttax ',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'$user_id','$date','$Performanceallowancemonthly','$Performanceallowanceyearly')";
       $resultsave = mysqli_query($conn, $sqlsave);
       $resultExists = "Update indsys1013candidatemaster set        
       Addormodifydatetime ='$date',
       Userid ='$user_id',
       CommitedCTC ='$CurMotGAC',  
       MDinterviewnotes ='$MDinterviewnotes',
       Selectionstatus ='$Selectedstatus'
         WHERE Candidateid = ' $Candidateid' AND Clientid ='$Clientid' ";
      $resultExists01 = $conn->query($resultExists);


       $Message = "Update";
  
  
   } 
 }




 $resultExists = "Update indsys1013candidatemaster set 
 MD_Approve ='Approved',
 MD_Approve_datetime ='$date',
 MDinterviewnotes ='$MDinterviewnotes',
 GMinterviewnotes ='Approved By Super User',
 DHinterviewnotes ='Approved By Super User',
 GM_Approve='Approved',
 DH_Approve ='Approved',
 GM_Approve_datetime ='$date',
 DH_Approve_datetime ='$date',
 Addormodifydatetime ='$date' 

   WHERE Candidateid = ' $Candidateid' AND Clientid ='$Clientid'";
$resultExists01 = $conn->query($resultExists);
$Message = "Thankyou";


 


$Display = array(
    'Message' => $Message
);

$str = json_encode($Display);
echo trim($str, '"');




}
///////////////////////////
if($MethodGet =="UpdateFitmentMDRejected")
{
$Candidateid = $form_data['Candidateid'];
$FitNextno =$form_data['FitNextno'];
$FitType = $form_data['FitType'];
$MDinterviewnotes = $form_data['MDinterviewnotes'];
if (empty($MDinterviewnotes))
{

   $Message = "MDinterviewnotes";

   $Display = array(
       'Message' => $Message
   );

   $str = json_encode($Display);
   echo trim($str, '"');
   return;
}

 $resultExistsss = "Update indsys1017candidatefitmentinformation set 
 MDApproval ='Rejected',
 MDApprovaldatetime ='$date',
 Addormodifydatetime='$date' 
WHERE Candidateid = '$Candidateid' AND Fitmenttype ='$FitType'

AND Clientid ='$Clientid'  ";
 $resultExists0New = $conn->query($resultExistsss);
 $resultExists = "Update indsys1013candidatemaster set 
 DH_Approve ='Rejected',
 HR_Approve ='Rejected',
 GM_Approve ='Rejected',
 MD_Approve ='Rejected',
 Selectionstatus ='Rejected',
 MD_Approve_datetime ='$date',
 MDinterviewnotes ='$MDinterviewnotes',
 Addormodifydatetime ='$date' 

   WHERE Candidateid = ' $Candidateid' AND Clientid ='$Clientid' ";
$resultExists01 = $conn->query($resultExists);
 $Message = "Thankyou";

$url = "$domain/HRM09/TYPage.php";
 
 $Display = array(
   'Message' => $Message,'url' =>$url
);

$str = json_encode($Display);
echo trim($str, '"');




}
/////////////////////////////////////

if($MethodGet =="UpdatedHRRejected")
{
$Candidateid = $form_data['Candidateid'];

$HRinterviewnotes = $form_data['HRinterviewnotes'];
if (empty($HRinterviewnotes))
{

   $Message = "HRinterviewnotes";

   $Display = array(
       'Message' => $Message
   );

   $str = json_encode($Display);
   echo trim($str, '"');
   return;
}

 $resultExists = "Update indsys1013candidatemaster set 
 DH_Approve ='Rejected',
 HR_Approve ='Rejected',
 GM_Approve ='Rejected',
 MD_Approve ='Rejected',
 Selectionstatus ='Rejected',
 HR_Approve ='$date',
 HRinterviewnotes ='$HRinterviewnotes',
 Addormodifydatetime ='$date' 
   WHERE Candidateid = ' $Candidateid' AND Clientid ='$Clientid' ";
$resultExists01 = $conn->query($resultExists);
$Message = "Thankyou";

$url = "$domain/HRM09/TYPage.php";
 
 $Display = array(
   'Message' => $Message
);

$str = json_encode($Display);
echo trim($str, '"');




}
///////////////////////////////////////
if($MethodGet =="UpdateHRApproved")
{
$Candidateid = $form_data['Candidateid'];

$HRinterviewnotes = $form_data['HRinterviewnotes'];
// if (empty($HRinterviewnotes))
// {

//    $Message = "HRinterviewnotes";

//    $Display = array(
//        'Message' => $Message
//    );

//    $str = json_encode($Display);
//    echo trim($str, '"');
//    return;
// }

 $resultExists = "Update indsys1013candidatemaster set 

 HR_Approve ='Approved',
 HR_Approve_datetime ='$date',
 HRinterviewnotes ='$HRinterviewnotes',
 Addormodifydatetime ='$date' 

   WHERE Candidateid = ' $Candidateid' AND Clientid ='$Clientid' ";
$resultExists01 = $conn->query($resultExists);
$Message = "HRApproved";


 
 $Display = array(
   'Message' => $Message
);

$str = json_encode($Display);
echo trim($str, '"');




}
////////////////////////////////////
if($MethodGet =="SendMailToDeptHead")
{
try
{
  $Candidateid = $form_data['Candidateid'];

$interviewerid ="";

  $GetChapter = "SELECT * FROM indsys1013candidatemaster where Candidateid = '$Candidateid' AND Clientid ='$Clientid'  ORDER BY Candidateid";
  $result_Chapter = $conn->query($GetChapter );
  if(mysqli_num_rows($result_Chapter) > 0) { 

    
  while($row = mysqli_fetch_array($result_Chapter)) {  
    $Title =$row['Title'];
    $Firstname =$row['Firstname'];
    $Lastname = $row['Lastname'];  
    $Type_Of_Posistion = $row['Type_Of_Posistion'];
       

    $interviewerid = $row['interviewerid'];
   
    } 
  }


  if (empty($interviewerid))
{

  //  $Message = "interviewerid";

  //  $Display = array(
  //      'Message' => $Message
  //  );

  //  $str = json_encode($Display);
  //  echo trim($str, '"');
  //  return;

}
$i=0;
$resultExists = "SELECT * FROM indsys1017candidatefitmentinformation WHERE Candidateid = '$Candidateid' AND Clientid ='$Clientid'  LIMIT 1";
$resultExists01 = $conn->query($resultExists);
while ($row = $resultExists01->fetch_assoc())
{
  $i++;
 
 

   

}
if ($i==0)
{

   $Message = "FitmentCreate";

   $Display = array(
       'Message' => $Message
   );

   $str = json_encode($Display);
   echo trim($str, '"');
   return;

}





// if($Type_Of_Posistion =="Category 1")
// {
//   SendMailToGM($conn,$domain,$Candidateid);
// }

//
//SendMailToGM($conn,$domain,$Candidateid,$Clientid);
SendMailToMD($conn,$domain,$Candidateid,$Clientid);
// else
// {
// SendMailToDH($conn,$domain,$Candidateid,$interviewerid,$Clientid);
// }

$Message = "Thankyou";

$url = "$domain/HRM09/TYPage.php";
 
 $Display = array(
   'Message' => $Message
);

$str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}

}


function SendMailToDH($conn,$domain,$Candidateid,$interviewerid,$Clientid)
 {


  $MailTo = "";

  $GetChapter = "SELECT * FROM indsys1013candidatemaster where Candidateid = '$Candidateid' AND Clientid ='$Clientid'  ORDER BY Candidateid";
  $result_Chapter = $conn->query($GetChapter );
  if(mysqli_num_rows($result_Chapter) > 0) { 

    
  while($row = mysqli_fetch_array($result_Chapter)) {  
    $Title =$row['Title'];
    $Firstname =$row['Firstname'];
    $Lastname = $row['Lastname'];     

    $Designationproposed =$row['Designationproposed'];
   
    } 
  }

  $resultExists = "Update indsys1013candidatemaster set 
  Selectionstatus ='Waiting For DH Approval'
    WHERE Candidateid = '$Candidateid'AND Clientid ='$Clientid' ";
 $resultExists01 = $conn->query($resultExists);

$GetSuperusermail = "SELECT * FROM indsys1017employeemaster where  Employeeid = '$interviewerid' AND Clientid ='$Clientid' ";
$result_Supermail = $conn->query($GetSuperusermail );
if(mysqli_num_rows($result_Supermail) > 0) { 

  
while($row = mysqli_fetch_array($result_Supermail)) {  
  $Usermailid =$row['Emaild'];
  

  } 
}

$MailTo = $Usermailid;

$mail = new PHPMailer(false); 
$mail->IsSMTP();
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
                        <p>Kindly Approve $Title$Firstname $Lastname for the position $Designationproposed .

Kindly check and provide your approval to select the respective candidate.</p>



<tr>
<td>Click<a target='_blank' href='$domain/HRM09/DepartmentHeadFitApi.php?Candidateid=$Candidateid&Clientid=$Clientid'> Here </a>For Approval</td>
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
              <td align='center' class='content-block'><br/>
              <small><span class='apple-link'>Britannia Garment Packaging Pvt Ltd</span></small>
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

  $SubjectMail="Waiting For Fitment Approval - CandidateId:$Candidateid";

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
//header("Location: $domain/HRM09/TYPage.php");
 }
 catch(Exception $e)
 {

 }
 }


 //////////////////////////////////
 function SendMailHRApprove($conn,$domain,$Candidateid,$Clientid)
 {


  $MailTo = "";

  $GetChapter = "SELECT * FROM indsys1013candidatemaster where Candidateid = '$Candidateid' AND Clientid='$Clientid'  ORDER BY Candidateid";
  $result_Chapter = $conn->query($GetChapter );
  if(mysqli_num_rows($result_Chapter) > 0) { 

    
  while($row = mysqli_fetch_array($result_Chapter)) {  
    $Title =$row['Title'];
    $Firstname =$row['Firstname'];
    $Lastname = $row['Lastname'];     

    $Designationproposed =$row['Designationproposed'];
   
    } 
  }
  $resultExists = "Update indsys1013candidatemaster set 
  Selectionstatus ='Waiting For HR Approval'
    WHERE Candidateid = '$Candidateid' AND Clientid='$Clientid' ";
 $resultExists01 = $conn->query($resultExists);
$GetSuperusermail = "SELECT * FROM indsys1000useradmin where  Authorizedtype = 'HR Manager'  AND Clientid='$Clientid' ";
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

$mail = new PHPMailer(false); 
$mail->IsSMTP();
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
                        <p>Kindly Approve $Title$Firstname $Lastname for the position $Designationproposed .

Kindly check and provide your approval to select the respective candidate.</p>



<tr>
<td>Click<a target='_blank' href='$domain/HRM09/HRApprovedFit.php?Candidateid=$Candidateid&Clientid=$Clientid'> Here </a>For Approval</td>
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
              <td align='center' class='content-block'><br/>
              <small><span class='apple-link'>Britannia Garment Packaging Pvt Ltd</span></small>
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

  $SubjectMail="Waiting For Fitment Approval - CandidateId:$Candidateid";

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
//header("Location: $domain/HRM09/TYPage.php");
 }
 catch(Exception $e)
 {

 }
 }
 ///////////////////////////////////
 if($MethodGet =="SendMailToHRNEW")
{
try
{
  $Candidateid = $form_data['Candidateid'];


SendMailHRApprove($conn,$domain,$Candidateid,$Clientid);

$Message = "Mail Sent";


 
 $Display = array(
   'Message' => $Message
);

$str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}

}
/////////////////////////////////////////////////////
function SendMailToCandidate($conn,$domain, $Candidateid,$Clientid)
{
  try
  {
  

    
      $Reportingname ="";
      $ReportingToid ="";   
      $Business ="";
      $Designationproposed ="";
      $Department ="";
      $Location ="";
      $Title ="";
      $Firstname ="";
      $Lastname ="";
      $CurMotBasicDA ="";
      $CurMotHRA ="";
      $CurMotSpecialAllowance = "";
      $CurMotTotalAllowance ="";
      $CurMotPFemployeer = "";
      $CurMotGratuity ="";
      $CurMotGAC = "";
      $CurMotEstimatedBonous ="";
      $CurMotOtherBonous = "";
      $CurMotCTC ="";
      $CurMotDeductions ="";
      $CurMotESIC ="";
      $CurMotPFemployee ="";
      $CurMotCanteen ="";
      $CurMotStayAllowance ="";
      $CurMotTravelAllowance = "";
      $CurMotOtherDeductions ="";
      $CurMotDeductionTotal = "";
      $CurMottakehomewithouttax ="";
      $CurAnnuaBasicDA ="";
      $CurAnnuaHRA ="";
      $CurAnnuaSpecialAllowance ="";
      $CurAnnuaTotalAllowance ="";
      $CurAnnuaPFemployeer ="";
      $CurAnnuaGratuity ="";
      $CurAnnuaRetairlsTotal ="";
      $CurAnnuaGAC ="";
      $CurAnnuaEstimatedBonous = "";
      $CurAnnuaOtherBonous = "";
      $CurAnnuaCTC ="";
      $CurAnnuaDeductions ="";
      $CurAnnuaESIC ="";
      $CurAnnuaPFemployee ="";
      $CurAnnuaCanteen ="";
      $CurAnnuaStayAllowance = "";
      $CurAnnuaTravelAllowance ="";
      $CurAnnuaOtherDeductions = "";
      $CurAnnuaDeductionTotal ="";
      $CurAnnuatakehomewithouttax ="";
      $CurincperBasicDA ="";
      $CurincperHRA = "";
      $CurincperSpecialAllowance ="";
      $CurincperTotalAllowance ="";
      $CurincperPFemployeer = "";
      $CurincperGratuity ="";
      $CurincperRetairlsTotal ="";
      $CurincperGAC = "";
     $CurincperEstimatedBonous="";
     $CurincperOtherBonous="";
     $CurincperCTC="";
     $CurincperDeductions="";
     $CurincperESIC="";
     $CurincperPFemployee="";
     $CurincperCanteen="";
     $CurincperStayAllowance="";
     $CurincperTravelAllowance ="";
     $CurincperOtherDeductions = "";
     $CurincperDeductionTotal="";
     $Curincpertakehomewithouttax="";
     $DOJ ="";
     $FitStatus="";
    
      $GetChapter = "SELECT * FROM indsys1013candidatemaster where  Candidateid = '$Candidateid' AND Clientid=$Clientid  ORDER BY Candidateid";
      $result_Chapter = $conn->query($GetChapter );
      if(mysqli_num_rows($result_Chapter) > 0) { 
  
        
      while($row = mysqli_fetch_array($result_Chapter)) {  
        $Title =$row['Title'];
        $Firstname =$row['Firstname'];
        $Lastname = $row['Lastname'];     
       $Reportingname=$row['ReportingTo'];
       $ReportingToid=$row['ReportingToid'];
       $Business=$row['Bussiness'];
       $Designationproposed =$row['Designationproposed'];
       $Location = $row['Location'];
       $Department = $row['Department'];
       $DOJ=$row['Date_Of_Joing'];
       $CandidateEmailid = $row['Emaild'];
       
        } 
      }
  
      $DOJ = date("d-M-Y", strtotime( $DOJ));
  
      $GetChapter02 = "SELECT * FROM indsys1017candidatefinalfitment where  Candidateid = '$Candidateid' AND Clientid=$Clientid  ORDER BY Candidateid";
      $result_Chapter02 = $conn->query($GetChapter02 );
      if(mysqli_num_rows($result_Chapter02) > 0) { 
        
      while($row = mysqli_fetch_array($result_Chapter02)) {  
        $CurMotBasicDA =$row['CurMotBasicDA'];
        $CurMotHRA =$row['CurMotHRA'];
        $CurMotSpecialAllowance = $row['CurMotSpecialAllowance'];
        $CurMotTotalAllowance =$row['CurMotTotalAllowance'];
        $CurMotPFemployeer = $row['CurMotPFemployeer'];
        $CurMotGratuity =$row['CurMotGratuity'];
        $CurMotGAC = $row['CurMotGAC'];
        $CurMotEstimatedBonous =$row['CurMotEstimatedBonous'];
        $CurMotOtherBonous = $row['CurMotOtherBonous'];
        $CurMotCTC = $row['CurMotCTC'];
        $CurMotDeductions =$row['CurMotDeductions'];
        $CurMotESIC = $row['CurMotESIC'];
        $CurMotPFemployee =$row['CurMotPFemployee'];
        $CurMotCanteen =$row['CurMotCanteen'];
        $CurMotStayAllowance =$row['CurMotStayAllowance'];
        $CurMotTravelAllowance = $row['CurMotTravelAllowance'];
        $CurMotOtherDeductions =$row['CurMotOtherDeductions'];
        $CurMotDeductionTotal = $row['CurMotDeductionTotal'];
        $CurMottakehomewithouttax =$row['CurMottakehomewithouttax'];
        $CurAnnuaBasicDA =$row['CurAnnuaBasicDA'];
        $CurAnnuaHRA =$row['CurAnnuaHRA'];
        $CurAnnuaSpecialAllowance =$row['CurAnnuaSpecialAllowance'];
        $CurAnnuaTotalAllowance =$row['CurAnnuaTotalAllowance'];
        $CurAnnuaPFemployeer =$row['CurAnnuaPFemployeer'];
        $CurAnnuaGratuity =$row['CurAnnuaGratuity'];
        $CurAnnuaRetairlsTotal =$row['CurAnnuaRetairlsTotal'];
        $CurAnnuaGAC =$row['CurAnnuaGAC'];
        $CurAnnuaEstimatedBonous = $row['CurAnnuaEstimatedBonous'];
        $CurAnnuaOtherBonous = $row['CurAnnuaOtherBonous'];
        $CurAnnuaCTC =$row['CurAnnuaCTC'];
        $CurAnnuaDeductions =$row['CurAnnuaDeductions'];
        $CurAnnuaESIC =$row['CurAnnuaESIC'];
        $CurAnnuaPFemployee =$row['CurAnnuaPFemployee'];
        $CurAnnuaCanteen =$row['CurAnnuaCanteen'];
        $CurAnnuaStayAllowance = $row['CurAnnuaStayAllowance'];
        $CurAnnuaTravelAllowance =$row['CurAnnuaTravelAllowance'];
        $CurAnnuaOtherDeductions = $row['CurAnnuaOtherDeductions'];
        $CurAnnuaDeductionTotal =$row['CurAnnuaDeductionTotal'];
        $CurAnnuatakehomewithouttax =$row['CurAnnuatakehomewithouttax'];
        $CurincperBasicDA =$row['CurincperBasicDA'];
        $CurincperHRA = $row['CurincperHRA'];
        $CurincperSpecialAllowance =$row['CurincperSpecialAllowance'];
        $CurincperTotalAllowance =$row['CurincperTotalAllowance'];
        $CurincperPFemployeer = $row['CurincperPFemployeer'];
        $CurincperGratuity = $row['CurincperGratuity'];
        $CurincperRetairlsTotal =$row['CurincperRetairlsTotal'];
        $CurincperGAC = $row['CurincperGAC'];
       $CurincperEstimatedBonous=$row['CurincperEstimatedBonous'];
       $CurincperOtherBonous=$row['CurincperOtherBonous'];
       $CurincperCTC=$row['CurincperCTC'];
       $CurincperDeductions=$row['CurincperDeductions'];
       $CurincperESIC=$row['CurincperESIC'];
       $CurincperPFemployee=$row['CurincperPFemployee'];
       $CurincperCanteen=$row['CurincperCanteen'];
       $CurincperStayAllowance=$row['CurincperStayAllowance'];
       $CurincperTravelAllowance =$row['CurincperTravelAllowance'];
       $CurincperOtherDeductions = $row['CurincperOtherDeductions'];
       $CurincperDeductionTotal=$row['CurincperDeductionTotal'];
       $Curincpertakehomewithouttax=$row['Curincpertakehomewithouttax'];
       $FitStatus=$row['FitStatus'];
      
       
       
        } 
      }
  
      // $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
  $Basic = number_format((float)$CurAnnuaBasicDA,2);
  $HRA=number_format((float)$CurAnnuaHRA,2);
  $Special=number_format((float)$CurAnnuaSpecialAllowance,2);
  $TotalAllowance=number_format((float)$CurAnnuaTotalAllowance,2);
  $PF=number_format((float)$CurAnnuaPFemployeer,2);
  $Gratuity=number_format((float)$CurAnnuaGratuity,2);
  $RetairalsTotal=number_format((float)$CurAnnuaRetairlsTotal,2);
  $GAC=number_format((float)$CurAnnuaGAC,2);
  $EstimatedBonous = number_format((float)$CurAnnuaEstimatedBonous,2);
  $CTC=number_format((float)$CurAnnuaCTC,2);
  $htmlcontent = '
      <center><img src ="../assets/images/logo/logo.jpg" style="height:110px"/><p style="font-size:16px;color:green;"><i>Together forward</i></p></center>
      
      <p style="font-size:15px;font-weight:bold;margin-bottom:0px"><u>OFFER</u></p>
      
      
      <table>
      <tbody>
      <tr><td style="width:150px">Name</td><td style="width:10px">:</td><td>'."$Title$Firstname $Lastname".'</td></tr>
      <tr><td>Business & Location</td><td>:</td><td>'."$Business & $Location".'</td></tr>
      <tr><td>Department</td><td>:</td><td>'."$Department".'</td></tr>
      <tr><td>Offered Designation</td><td>:</td><td>'."$Designationproposed".'</td></tr>
      <tr><td>Reporting To</td><td>:</td><td>'."$Reportingname".'</td></tr>
      </tbody>
      </table>
      <br/></br>
      
      <style>
      .data-table table, 
      .data-table td, 
      .data-table th {
        border: 0.2px solid #000000;
      }
      .data-table table {
        width: 100%;
        border-collapse: collapse;
      }
      </style>
      
      <div class="data-table">
      <table style="font-size:10px;padding:5px 3px">
      <tbody>
      <tr  align="center" bgcolor="#daeef3" style="font-weight:bold"><td  style="width:260px">Components</td><td  style="width:140px">Amount (Rs.)</td><td>Reference No.  for Notes</td></tr>
      
      <tr bgcolor="#d9d9d9" ><td>Basic &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(A)</td><td align="right">'."$Basic".'</td><td></td></tr>
      
      <tr  bgcolor="#d9d9d9"><td>HRA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(B)</td><td align="right">'."$HRA".'</td><td></td></tr>
      
      <tr><td  bgcolor="#d9d9d9"><u>Total Allowances</u></td><td></td><td></td></tr>
      <tr><td>Special Allowance</td><td align="right">'."$Special".'</td><td></td></tr>
      <tr  bgcolor="#d9d9d9"><td>Total Allowances Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(C)</td><td align="right">'."$TotalAllowance".'</td><td></td></tr> 
      <tr><td  bgcolor="#d9d9d9"><u>Retirals</u></td><td></td><td></td></tr>  
      <tr><td>PF @ 12% of Basic (A)</td><td align="right">'."$PF".'</td><td></td></tr>   
      <tr><td>Gratuity @ 5% of Basic (A)</td><td align="right">'."$Gratuity".'</td><td></td></tr>
      <tr  bgcolor="#d9d9d9"><td>Retirals Total  (D)</td><td align="right">'."$RetairalsTotal".'</td><td>-</td></tr>
      <tr  bgcolor="#60497a" color="#ffffff"><td>"Gross Annual Compensation<br/>(A+B+C+D)"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(E)</td><td align="right">'."$GAC".'</td><td></td></tr>
      <tr  bgcolor="#ffffcc"><td>Estimated Variable Bonus @ 8.33% of GAC (A)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(F)</td><td align="right">'."$EstimatedBonous".'</td><td></td></tr>
      <tr  bgcolor="#00b050"  color="#ffffff"><td>Estimated CTC (E+F) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(G)</td><td align="right">'."$CTC".'</td><td></td></tr>
      </tbody>
      </table>
      
      <br/>
      <p><b><u>Note:</u></b></p>
      
      <div class="data-table">
      <table style="font-size:10px;padding:10px 5px">
      <tbody>
      <tr><td  style="width:565px">
      Bonus has been estimated @ 8.33% of Individual basic considering the Incentive Trend in the last 3 years for budgeted Individual and Business performance and variable pay has been estimated considering the 100% target achievement. The actual incentive will be calculated based on Individual and Business performance for the given year and can be variable as per management decision. The bonus amount is paid annually.
      </td>
                     
      
      </tr>
      </tbody>
      </table>
      
      
      </div>
      
      
      
      
        
      
      
      
      
      
      
      ';
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
                        <p>Greetings from Britannia Garment Packaging Private Limited.</p>
                        <p>With respect to the interviews held with us previously, we’re glad to present to you an offer for the position of <b>$Designationproposed</b> </p>
                        <p>Kindly find attached, Offer letter for your acceptance.</p>
                        <p>Kindly confirm your Date of Joining by replying to this email.</p>
                        <p>Once again, Welcome to Britannia Garment Packaging Private Limited. Hope to see you grow along with our company.</p>
  
  
                                             $htmlcontent
  
  
  
                   
                        </td>
                      </tr>
                      <tr>
                      <td>Click<a target='_blank' href='$domain/HRM09/AppoinmentApproval.php?Candidateid=$Candidateid&Clientid=$Clientid'> Here </a>For Confirmation</td>
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
  
  <span class='apple-link'>Britannia Garment Packaging Pvt Ltd</span></small>
                
                
                
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
    $Toaddress= $CandidateEmailid;
  
    $SubjectMail="Offer Letter";
  
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
  //header("Location: $domain/HRM09/TYPage.php");
   }
   catch(Exception $e)
   {
  
   }
  
  
  }
  catch(Exception $e)
  {
  
  }
   
}


//////////////////////
if($MethodGet =="MailToCandidateNew")
{
try
{
  $Candidateid = $form_data['Candidateid'];


//SendMailToCandidate($conn,$domain,$Candidateid,$Clientid);

$Message = "Mail Sent";


 
 $Display = array(
   'Message' => $Message
);

$str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}

}
//////////////////////




if($MethodGet == 'FITCALCULATIONCATEGORY3')
{

    try
    { 
  

      $CurMotBasicDA =$form_data['CurMotBasicDA'];
      $CurMotHRA =$form_data['CurMotHRA'];
      $CurMotSpecialAllowance =$form_data['CurMotSpecialAllowance'];
      $Performanceallowancemonthly =$form_data['Performanceallowancemonthly'];
      $CurMotTravelAllowance =$form_data['CurMotTravelAllowance'];

      $CurMotCanteen =0;
      $CurMotStayAllowance =0;
   
      $CurMotOtherDeductions =0;
      $CurMotOtherBonous =0;
      $CurMotGAC =0;
      if(empty($CurMotTravelAllowance))
      {
        $CurMotTravelAllowance =0;
      }
      if(empty($Performanceallowancemonthly))
      {
       $Performanceallowancemonthly =0;
      }

      $Performanceallowanceyearly = $Performanceallowancemonthly*12;

if(empty($CurMotGAC))
{
$CurMotGAC =0;
}
if(empty($CurMotStayAllowance))
{
  $CurMotStayAllowance=0;
}
if(empty($CurMotTravelAllowance))
{
 $CurMotTravelAllowance =0;
}
if(empty($CurMotCanteen))
{
 $CurMotCanteen =0;
}
if(empty($CurMotOtherDeductions))
{
 $CurMotOtherDeductions =0;
}
if(empty($CurMotOtherBonous))
{
 $CurMotOtherBonous =0;
}
if(empty($CurAnnuaOtherBonous))
{
  $CurAnnuaOtherBonous=0;
}
////////////////BGP DELHI CLIENTS
if($Clientid=="4")
{

  $CurAnnuaBasicDA = ($CurMotBasicDA*12);
$CurAnnuaTravelAllowance = $CurMotTravelAllowance*12;
//$CurMotBasicDA =round($CurAnnuaBasicDA/12);
$CurAnnuaHRA = ($CurMotHRA*12);
//$CurMotHRA =round($CurAnnuaHRA/12);
$CurAnnuaSpecialAllowance = ($CurMotSpecialAllowance*12);
$CurMotSpecialAllowance = round($CurAnnuaSpecialAllowance/12);
$CurMotTotalAllowance = $CurMotSpecialAllowance+$Performanceallowancemonthly+$CurMotTravelAllowance;
$CurAnnuaTotalAllowance = $CurAnnuaSpecialAllowance + $Performanceallowanceyearly+$CurAnnuaTravelAllowance;
$CurMotGAC = $CurMotBasicDA+$CurMotHRA+$CurMotTotalAllowance;
$CurAnnuaGAC = round($CurMotGAC*12);
$CurMotTotalAllowance = round($CurAnnuaTotalAllowance/12) ;
if($CurMotBasicDA<=15000)
{
$CurAnnuaPFemployeer =round($CurAnnuaBasicDA*(12/100),0)+ round($CurAnnuaSpecialAllowance*(12/100),0);
$CurMotPFemployeer = 0;
$CurMotPFemployee = round($CurMotBasicDA*(12/100),0)+ round($CurMotSpecialAllowance*(12/100),0);
}
else
{
  $CurAnnuaPFemployeer =0;
  $CurMotPFemployeer = 0;
  $CurMotPFemployee = 0;
}


$CurAnnuaPFemployee =0;
$CurAnnuaGratuity = round(($CurAnnuaBasicDA)*(5/100));
$CurMotGratuity = 0;

$CurMotRetairlsTotal = $CurMotGratuity +$CurMotPFemployeer;
$CurAnnuaRetairlsTotal = $CurAnnuaPFemployeer+$CurAnnuaGratuity;
if($CurMotGAC<21000)
{
  $CurMotESIC=(0.0075*($CurMotGAC));
  $CurAnnuaESIC = 0;

  $CurMotESIC=ceil($CurMotESIC);
$CurMotESIC = round($CurMotESIC,0);

}
    
else
{
  $CurMotESIC = 0;
  $CurAnnuaESIC =0;
}
$CurMotDeductionTotal = $CurMotCanteen+$CurMotOtherDeductions+$CurMotESIC+$CurMotOtherBonous+$CurMotTravelAllowance+$CurMotPFemployee;

$CurAnnuaDeductionTotal = 0;
$CurMottakehomewithouttax =$CurMotGAC-$CurMotDeductionTotal;
$CurAnnuatakehomewithouttax = 0;
$CurMotEstimatedBonous = 0;
$CurAnnuaEstimatedBonous = round(0.0833*$CurAnnuaBasicDA);
$CurMotCTC =0;

$CurAnnuaCTC = $CurAnnuaEstimatedBonous+$CurAnnuaGAC;
}

 //////////////Sainmarks and BGP Tirupur Clients   
else
{
  $CurAnnuaBasicDA = ($CurMotBasicDA*12);
//$CurMotBasicDA =round($CurAnnuaBasicDA/12);
$CurAnnuaHRA = ($CurMotHRA*12);
//$CurMotHRA =round($CurAnnuaHRA/12);
$CurAnnuaSpecialAllowance = ($CurMotSpecialAllowance*12);
$CurMotSpecialAllowance = round($CurAnnuaSpecialAllowance/12);
$CurMotTotalAllowance = $CurMotSpecialAllowance+$Performanceallowancemonthly;
$CurAnnuaTotalAllowance = $CurAnnuaSpecialAllowance + $Performanceallowanceyearly;
$CurMotGAC = $CurMotBasicDA+$CurMotHRA+$CurMotTotalAllowance;
$CurAnnuaGAC = round($CurMotGAC*12);
$CurMotTotalAllowance = round($CurAnnuaTotalAllowance/12) ;
$CurAnnuaPFemployeer =(($CurAnnuaBasicDA+$CurAnnuaSpecialAllowance)*(12/100));
$CurMotPFemployeer = 0;

$CurMotPFemployee = round($CurAnnuaPFemployeer/12 );
$CurAnnuaPFemployee =0;
$CurAnnuaGratuity = round(($CurAnnuaBasicDA)*(5/100));
$CurMotGratuity = 0;

$CurMotRetairlsTotal = $CurMotGratuity +$CurMotPFemployeer;
$CurAnnuaRetairlsTotal = $CurAnnuaPFemployeer+$CurAnnuaGratuity;
if($CurMotGAC<21000)
{
  $CurMotESIC=(0.0075*($CurMotGAC));
  $CurAnnuaESIC = 0;

  $CurMotESIC=ceil($CurMotESIC);
$CurMotESIC = round($CurMotESIC,0);

}

else
{
  $CurMotESIC = 0;
  $CurAnnuaESIC =0;
}
$CurMotDeductionTotal = $CurMotCanteen+$CurMotOtherDeductions+$CurMotESIC+$CurMotOtherBonous+$CurMotTravelAllowance+$CurMotPFemployee;

$CurAnnuaDeductionTotal = 0;
$CurMottakehomewithouttax =$CurMotGAC-$CurMotDeductionTotal;
$CurAnnuatakehomewithouttax = 0;
$CurMotEstimatedBonous = 0;
$CurAnnuaEstimatedBonous = round(0.0833*$CurAnnuaBasicDA);
$CurMotCTC =0;

$CurAnnuaCTC = $CurAnnuaEstimatedBonous+$CurAnnuaGAC;
}

    $Display=array(
     
 'CurMotBasicDA' =>$CurMotBasicDA,
 'CurAnnuaBasicDA' =>$CurAnnuaBasicDA,
 'CurMotHRA' =>$CurMotHRA,
 'CurAnnuaHRA' =>$CurAnnuaHRA,
 'CurMotSpecialAllowance' =>$CurMotSpecialAllowance,
 'CurAnnuaSpecialAllowance' =>$CurAnnuaSpecialAllowance,
 'CurAnnuaGAC' =>$CurAnnuaGAC,
 'CurMotTotalAllowance' =>$CurMotTotalAllowance,
 'CurAnnuaTotalAllowance' =>$CurAnnuaTotalAllowance,
 'CurMotPFemployeer' =>$CurMotPFemployeer,
 'CurAnnuaPFemployeer' =>$CurAnnuaPFemployeer,
 'CurMotGratuity' =>$CurMotGratuity,
 'CurAnnuaGratuity' =>$CurAnnuaGratuity,
 'CurMotRetairlsTotal' =>$CurMotRetairlsTotal,
 'CurAnnuaRetairlsTotal' =>$CurAnnuaRetairlsTotal,
 'CurMotDeductionTotal' =>$CurMotDeductionTotal,
 'CurAnnuaDeductionTotal' =>$CurAnnuaDeductionTotal,
 'CurMottakehomewithouttax' =>$CurMottakehomewithouttax,
 'CurAnnuatakehomewithouttax' =>$CurAnnuatakehomewithouttax,
 'CurMotEstimatedBonous' =>$CurMotEstimatedBonous,
 'CurAnnuaEstimatedBonous' =>$CurAnnuaEstimatedBonous,
 'CurMotCTC' =>$CurMotCTC,
 'CurAnnuaCTC' =>$CurAnnuaCTC,
 'CurMotESIC' =>$CurMotESIC,
 'CurAnnuaESIC' =>$CurAnnuaESIC,
 'CurMotCTC' =>$CurMotCTC,
 'CurMotPFemployee' =>$CurMotPFemployee,
 'CurAnnuaPFemployee' =>$CurAnnuaPFemployee,
 'CurMotGAC' =>$CurMotGAC,
 'Performanceallowanceyearly' =>$Performanceallowanceyearly,
 'CurAnnuaOtherBonous' =>$CurAnnuaOtherBonous,
 'CurAnnuaTravelAllowance' =>$CurAnnuaTravelAllowance
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }
 ////////////////////////
 function roundup($float, $dec = 2){
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

 ?>