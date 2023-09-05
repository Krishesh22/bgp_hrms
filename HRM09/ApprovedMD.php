<?php 
include '../config.php';

// $conn = new mysqli('localhost', 'root', '', 'hrm') OR die("Faild to connect");
// $domain = "http://192.168.1.49:8080/Krish/IndsysHRM";

if (isset($_POST['submit'])) {


$Approvedstatus = $_POST["Approvedstatus"];

$MD_Decline ="";
    if($Approvedstatus=="Rejected")
    {
      $MD_Decline = $_POST["RejectedReason"];
      $Selectedstatus = "Rejected";
    }
    if($Approvedstatus=="Approved")
    {
     
      $Selectedstatus = "Appointed";
    }

    if($Approvedstatus=="Pending")
    {
    
      $Selectedstatus = "Waiting For MD Approval";
    }

    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d H:i:s" );

 
  $Candidateid = $_GET['Candidateid'];
 

  $CandidateMDAprroveQry = "Update indsys1013candidatemaster set  MD_Approve_datetime ='$date',  MD_Approve='$Approvedstatus', Addormodifydatetime ='$date',
  MD_Decline ='$MD_Decline', Selectionstatus ='$Selectedstatus' WHERE Candidateid = '$Candidateid' ";  
  $resultCandidateMDAprroveQry = $conn->query($CandidateMDAprroveQry);
  if($resultCandidateMDAprroveQry)
  {
    
    header("Location: $domain/HRM09/TYPage.php");
  }


}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >


    <title>MD Approval</title>
         <style>
      body{margin-top: 3rem;}
      h1{font-size: 1.3rem;margin-bottom: 15px;color: #2D9B43;}

      .col-form-label{font-weight: bold;}

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



<div class="row">
  <div class="col-md-3">&nbsp;</div>
      <div class="col-md-6">
        <p class="text-center mb-0"><img height="100px" class="mb-5" src="../Logo/Sainmarknewlogo.png"></p>
        <div class="ApprovalApiBox">
                            <h1>MD Approval</h1>

          <form action="" method="POST">

            <div class="form-group">
    <label class="col-form-label">Status</label>
    <select class="form-control" name="Approvedstatus">
    <option value="Approved">Approved</option>
    <option value="Pending">Pending</option>
    <option value="Rejected">Rejected</option>
    </select>
    </div>

<div class="form-group">
    <label class="col-form-label">Rejected reason</label>
    <textarea class="form-control" name="RejectedReason"></textarea>
    </div>

      <div class="form-group text-right">
    <button style="margin-top: 25px;" class="btn btn-sm btn-success" name="submit" type="submit">Update</button>
    </div>


          </form>
        </div>
</div>
</div>






    <form action="" method="POST">
    <div class="row">


    

      

    </div>

</form>
   </div>

  </body>
</html>