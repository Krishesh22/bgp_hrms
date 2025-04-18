<?php 
include '../config.php';

// $conn = new mysqli('localhost', 'root', '', 'hrm') OR die("Faild to connect");
// $domain = "http://192.168.1.49:8080/Krish/IndsysHRM";

if (isset($_POST['submit'])) {


$Approvedstatus = $_POST["Approvedstatus"];
  

    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d H:i:s" );

 
  $Candidateid = $_GET['Candidateid'];
  $FitNextno = $_GET['FitNextno'];
 

  

  $CandidateMDAprroveQry = "Update indsys1017candidatefitmentinformation set  MDApprovaldatetime ='$date',  MDApproval='$Approvedstatus' WHERE Candidateid = '$Candidateid' and fitno='$FitNextno' ";  
  $resultCandidateMDAprroveQry = $conn->query($CandidateMDAprroveQry);
  if($resultCandidateMDAprroveQry)
  {

if($Approvedstatus  =="Approved")
  
   {


    
    $CandidateMDAprroveQrynew = "Update indsys1017candidatefitmentinformation set  FitStatus='Final' WHERE Candidateid = '$Candidateid' and fitno='$FitNextno' ";  
    $resultCandidateMDAprroveQrynewwww = $conn->query($CandidateMDAprroveQrynew);

    
  $GetChapter = "SELECT * FROM indsys1017candidatefitmentinformation where  Candidateid = '$Candidateid' and fitno='$FitNextno' ORDER BY Candidateid";
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
    CurincAmtCanteen,CurincAmtStayAllowance,CurincAmtTravelAllowance,CurincAmtOtherDeductions,CurincAmtDeductionTotal,CurincAmttakehomewithouttax,Userid,Addormodifydatetime)
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
     '$CurincperDeductionTotal ','$Curincpertakehomewithouttax ',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'$user_id','$date')";
        $resultsave = mysqli_query($conn, $sqlsave);
        $resultExists = "Update indsys1013candidatemaster set        
        Addormodifydatetime ='$date',
        Userid ='$user_id',
        CommitedCTC ='$CurMottakehomewithouttax'     
          WHERE Candidateid = ' $Candidateid' ";
       $resultExists01 = $conn->query($resultExists);


        $Message = "Update";
   
   
    } 
  }
  }


    
    header("Location: $domain/HRM09/TYPage.php");
  }


}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">


    <title>MD Approval API</title>
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