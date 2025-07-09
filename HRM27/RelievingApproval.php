<?php 
include '../config.php';


  $GetEmployeeid=$_GET['EId'];
  $date = date("Y-m-d H:i:s" );

if (isset($_POST['submit'])) {
 
$RelievingStatus = $_POST["RelievingStatus"];
$Employeeid = $_POST["Employeeid"];

  $UpdateEmpStatus ="Update indsys1017exitemployee SET SuperUserApproval ='$RelievingStatus' , SuperUserApproveddatetime='$date' WHERE Employeeid = '$Employeeid' and Clientid ='$Clientid'";
  $resultUpdateEmpStatus = $conn->query($UpdateEmpStatus);
  if($resultUpdateEmpStatus)
  {
    header("Location: TYPage.php");
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
                  <h1>Relieving Approval</h1>

                  <form action="" method="POST">
    <div class="form-group">
    <label class="col-form-label">Update Relieving Status</label>
    <select class="form-control" name="RelievingStatus">
    <option value="Approved">✔️ Approved</option>
    <option value="Waiting">🕑 Waiting</option>
    <option value="Rejected">❌ Rejected</option>
    </select>
    </div>
    <input value="<?php echo "$GetEmployeeid"; ?>" type="hidden" name="Employeeid">
    <div class="form-group text-right">
    <button style="margin-top: 10px;" class="btn btn-sm btn-success" name="submit" type="submit">Update</button>
    </div>

  </form>

        </div>
      </div>
    </div>










 
  </body>
</html>