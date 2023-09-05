<?php 
include '../config.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Employee details Upload</title>
</head>

<body>


    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM59Controller">
            <div class="container-fluid">


                <div class="container-fluid dashboard-content">
                    <div class="row">
                        <div class="col-md-12">



                            <h5 class="card-header text-green">Employee Leave Upload</h5>
                            <div class="card-body">


                                <div class="row">

                                    <div class="card-body">

                                        <h5>Select the Excel file to upload Employee Details</h5>

                                        <!-- <input type="file" name="import_file" class="form-control col-md-5" />
                                                    <button type="submit" name="submit" class="btn btn-sm btn btn-success mt-3">Import</button> -->
                                        <div class="form-group col-md-3">

                                            <div class="input-group">
                                                <input type="file" class="form-control" ng-model="clearinput"
                                                    id="fileInputBulkEmp" name=files[]
                                                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">


                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">

                                            <div class="mt-25">
                                                <button class="btn btn-sm btn-success" id="fileButtonEmp"><i
                                                        class="fa fa-table"></i>
                                                    Upload
                                                </button>


                                            </div>

                                        </div>
                                        <!-- </form> -->
                                        <br><br>

                                        <?php
                                               
                                                 if(isset($_SESSION['message']))
                                                 {
                                                     echo "<h4>".$_SESSION['message']."</h4>";
                                                     unset($_SESSION['message']);
                                                 }
                                              
                                                
                                             
                                                ?>
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

    <script src="../Scripts/Controller/HRM59Controller.js"></script>
    
</body>

</html>