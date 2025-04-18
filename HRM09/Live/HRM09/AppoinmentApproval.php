<?php 
include '../config.php';

// $conn = new mysqli('localhost', 'root', '', 'hrm') OR die("Faild to connect");
// $domain = "http://192.168.1.49:8080/Krish/IndsysHRM";
if (isset($_POST['submit'])) {


  $Candidateid=$_GET['Candidateid'];
 
  date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
  

  $CandidateAccepted = $_POST["Accepted_By_Candidate"];
  $Date_Of_Joing = $_POST["Date_Of_Joing"];
 
  $Selectionstatus=  $CandidateAccepted ;
  if(empty($Date_Of_Joing))
  {
    $Date_Of_Joing ="0000:00:00";
  }


  $UpdateCandidateStatus ="Update indsys1013candidatemaster set Accepted_By_Candidate ='$CandidateAccepted', Date_Of_Joing='$Date_Of_Joing',   Candidateofferaccepteddatetime ='$date' WHERE Candidateid = ' $Candidateid'";
  $resultUpdateCandidateStatus = $conn->query($UpdateCandidateStatus);
  if($resultUpdateCandidateStatus)
  {
    
    header("Location: $domain/HRM09/TYPage.php");
  }

}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Appoinment Approval API</title>
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
.col-form-label{font-weight: bold;}
    </style>
  </head>
  <body>




  <div class="container">



    <div class="row"><div class="col-md-3">&nbsp;</div>
      <div class="col-md-6">
        <p class="text-center mb-0"><img height="100px" class="mb-5" src="../Logo/Sainmarknewlogo.png"></p>
        <div class="ApprovalApiBox">
                  <h1>Appoinment Approval</h1>

                  <form action="" method="POST">
    <div class="form-group">
    <label class="col-form-label">Offer
    Accepted By Candidate </label>
    <select class="form-control" name="Accepted_By_Candidate">

    <option value="Offer Accepted By Candidate">✔️ Accepted</option>
    <option value="Waiting For candidate Approval">🕑 Waiting</option>
    <option value="Offer Rejected by Candidate">❌ Rejected</option>

    </select>
    </div>

    <div class="form-group">
    <label class="col-form-label">Expected Date Of Joining</label>
    <input type="date" class="form-control" name="Date_Of_Joing" onfocus="(this.type='date')" onblur="(this.type='date')">
    </div>


    <div class="form-group text-right">
    <button style="margin-top: 25px;" class="btn btn-sm btn-success" name="submit" type="submit">Update</button>
    </div>

  </form>

        </div>
      </div>
    </div>










 
  </body>
</html>