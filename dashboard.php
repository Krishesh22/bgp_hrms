<?php include 'config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>HRM-Dashboard</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include 'header.php'?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include 'Sidebarin.php'?>

        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="DASHBOARDController">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Dashboard</h2>

                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>


                    <table class="status-table">
                        <tr>
                            <td><label>Date&nbsp;</label></td>
                            <td> <input type="text" class="form-control" ng-model="AttendanceDate"
                                    onfocus="(this.type='date')" onblur="(this.type='date')"
                                    ng-change="GetAttendanceDate();"></td>

                        </tr>
                    </table>





                    <div class="ecommerce-widget">




                        <div class="row">





                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">





                                    <div class="card-body">
                                        <h5 class="text-muted">Total Present</h5>
                                        <center>
                                            <div class="metric-value d-inline-block">
                                                <a href="HRM19/presentattendance.php"> <img height="64px"
                                                        src="assets/icons/present.png">
                                                    <h1 class="mb-1" style="margin-top:15px;color:#7e549e">
                                                        {{NoofPresent}}</h1>
                                                </a>
                                            </div>
                                        </center>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Leave</h5>
                                        <center>
                                            <div class="metric-value d-inline-block">
                                                <a href="HRM21 /leaveattendance.php">
                                                    <img height="64px" src="assets/icons/leave.png">
                                                    <h1 class="mb-1" style="margin-top:15px;color:#c2549d">
                                                        {{Noofleave}}</h1>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Absent</h5>
                                        <center>
                                            <div class="metric-value d-inline-block">
                                                <a href="HRM20/absentattendance.php">
                                                    <img height="64px" src="assets/icons/absent.png">
                                                    <h1 class="mb-1" style="margin-top:15px;color:#fc8370">
                                                        {{NoofAbsents}}</h1>
                                                </a>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total No Employees</h5>
                                        <center>
                                            <div class="metric-value d-inline-block">
                                                <img height="64px" src="assets/icons/permission.png">
                                                <h1 class="mb-1" style="margin-top:15px;color:#fecb3e">
                                                    {{NoofEmployee}}</h1>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end total orders  -->
                            <!-- ============================================================== -->
                        </div>

                        <div class="row">
                        
                            <div class="col-md-12" >
                            <h5>Category Wise Present / Absent Summary</h5>
                                <table class="table table-bordered  ">
                                    <thead>
                                        <tr class="bg-green text-white">
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Present</th>
                                            <th>Absent</th>
                                            <th>Leave</th>
                                            <th>Employees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Category 1</td>
                                            <td>{{Cat1Present}}</td>
                                            <td>{{Cat1Absent}}</td>
                                            <td>{{Cat1Leave}}</td>
                                            <td>{{Cat1Employee}}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Category 2</td>
                                            <td>{{Cat2Present}}</td>
                                            <td>{{Cat2Absent}}</td>
                                            <td>{{Cat2Leave}}</td>
                                            <td>{{Cat2Employee}}</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Category 3</td>
                                            <td>{{Cat3Present}}</td>
                                            <td>{{Cat3Absent}}</td>
                                            <td>{{Cat3Leave}}</td>
                                            <td>{{Cat3Employee}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="alert alert-success" role="alert" ng-show="Message" id='msg1'>
                            {{Message}}
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12" style="margin-top: 30px;">
                        <h5>Department Wise Present / Absent Summary</h5>
                            <table class="table table-bordered  table-sm info-table">
                                <thead>
                                    <tr class="bg-green text-white">

                                        <th>#</th>
                                        <th>Department</th>
                                        <!-- <th>Dept Head ID</th> -->
                                        <th>Department Head </th>

                                        <th>Present</th>
                                        <th>Absent</th>
                                        <th>Leave</th>
                                        <th>Total</th>
                                        <th>Mail</th>


                                    </tr>
                                </thead>
                                <tbody>


                                    <tr dir-paginate="e in GetDepartmentEmployeeList |filter:searchDepartment|itemsPerPage:n "
                                        pagination-id="DeparmentGrid" current-page="currentPageDepartment">


                                        <td style="width: 50px;">
                                            {{$index+1 + (currentPageDepartment - 1) * pageSizeDepartment}}
                                        </td>
                                        <td>{{e.Department}}</td>
                                        <!-- <td>{{e.Employeeid}}</td> -->
                                        <td>{{e.Fullname}}</td>
                                        <td>{{e.NoofPresent}}</td>
                                        <td>{{e.NoofAbsents}}</td>
                                        <td>{{e.Noofleave}}</td>
                                        <td>{{e.NoofEmployee}}</td>
                                        <td> <a style="padding:5px 10px;color:#3ac47d;cursor: pointer;" 
                                               ><i class="fa fa-envelope" title="Send Mail To Department Head"  ng-click="SendMailToDepartmenthead(e.Employeeid,e.Department,e.Attendencedate);"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'footer.php'?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>


        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>

    <?php include 'footerjsout.php'?>
    <script src="Scripts/Controller/DASHBOARDController.js"></script>




</body>

</html>