<?php 
include '../config.php';
session_start();

$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$Clientid =$_SESSION["Clientid"];

if (!isset($_SESSION['Userid'])) {

   session_destroy();
    //$Message ="SessionNo";
   $Url = "$domain/Sessionexpiredpage.php";
   header("refresh:0;url=$Url");
   return;

   }

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Employee leave details Upload</title>
</head>

<body>


    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM39Controller">
            <div class="container-fluid">


                <div class="container-fluid dashboard-content">

                    <div id="overlay">
                        <div class="cv-spinner">
                            <span class="spinner"></span>
                        </div>
</div>
                        <div class="row">
                            <div class="col-md-12">



                                <h5 class="card-header text-green">Employee details Upload</h5>
                                <div class="card-body">


                                    <div class="row">

                                        <div class="card-body">

                                            <h5>Select the Excel file to upload Employee leave Details</h5>

                                            <!-- <input type="file" name="import_file" class="form-control col-md-5" />
                                                    <button type="submit" name="submit" class="btn btn-sm btn btn-success mt-3">Import</button> -->
                                            <div class="form-group col-md-6">

                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputBulkEmpLeave" name=files[]
                                                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">


                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">

                                                <div class="mt-25">
                                                    <button class="btn btn-sm btn-success" id="fileButtonEmpLeave"><i
                                                            class="fa fa-table"></i>
                                                        Upload
                                                    </button>

                                                    <a class="btn btn-warning btn-sm"
                                                        href="Employeeleavesummarytemp.php"><i
                                                            class="fa fa-download"></i>
                                                        Download</a>



                                                </div>

                                            </div>



                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <?php include '../footerjs.php'?>

        <script src="../Scripts/Controller/HRM39Controller.js"></script>
</body>

</html>