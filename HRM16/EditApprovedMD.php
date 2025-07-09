<?php 
include '../config.php';


if (isset($_POST['submit'])) {


$Approvedstatus = $_POST["Approvedstatus"];




    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d H:i:s" );

 
  $AttendanceDate = $_GET['AttendanceDate'];
  $Clientid = $_GET['Clientid'];

 
  $resultExists = "Update indsys1029empdailyattendancemaster set 
  Adminapproval ='$Approvedstatus'

   WHERE   Attendencedate='$AttendanceDate' AND Clientid='$Clientid'  ";
$resultExists01 = $conn->query($resultExists);
header("Location: $domain/HRM09/TYPage.php");
  
  }
   






?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Edit Approved API</title>
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
<option value="No">🕑 Pending</option>

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