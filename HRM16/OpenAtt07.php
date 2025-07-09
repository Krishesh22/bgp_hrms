<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title> Attendance Detail </title>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>

        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM16Controller">

            <div class="container-fluid dashboard-content">
             
                    <div class="card">
                        <h5 class="card-header">Open Daily Attendance</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">From Date</label>
                                    <input type="text" class="form-control" ng-model="FromDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                        >
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">To Date</label>
                                    <input type="text" class="form-control" ng-model="ToDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                       >
                                </div>
                               

                                <div class="form-group col-md-3" style="padding:17px">

                                    <a class="btn btn-warning btn-sm" ng-click="OpenAttendance()"><i
                                            ></i>
                                        Open Attendance Details</a>


                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="alert alert-success" role="alert" ng-show="Message">
                        {{Message}}
                    </div>




                   

           
            </div>

        </div>
        <?php include '../footer.php'?>



    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM16Controller.js"></script>

</body>

</html>