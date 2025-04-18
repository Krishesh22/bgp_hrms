<?php include 'config.php';
session_start();
$Clientid =$_SESSION["Clientid"];
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/indsyscustom.css">
    <title>HRM-Dashboard</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper custom-card">

        <?php include 'header.php'?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include 'Sidebarin.php'?>

        <div class="dashboard-wrapper " ng-App="MyApp" ng-controller="DASHBOARDController">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content " >
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Dashboard</h2>


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
                    <div class="row" >

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary custom-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">

                                            <a href="HRM19/presentattendance.php"> <img height="54px"
                                                    src="assets/icons/present.png">

                                            </a>


                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class=" text-green Dashboardhead">Total Present</h5>
                                            <h1 class="mb-1 Dashboardhead" style="color:#7e549e;">
                                                {{NoofPresent}}</h1>
                                        </div>

                                    </div>






                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary custom-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <a href="HRM21/leaveattendance.php">
                                                <img height="54px" src="assets/icons/leave.png">

                                            </a>
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class=" text-green Dashboardhead">Total Leave</h5>
                                            <h1 class="mb-1 Dashboardhead" style="color:#7e549e;">
                                                {{Noofleave}}</h1>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary custom-card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <a href="HRM20/absentattendance.php">
                                                <img height="54px" src="assets/icons/absent.png"></a>
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class=" text-green Dashboardhead">Total Absent</h5>
                                            <h1 class="mb-1 Dashboardhead" style="color:#7e549e;">
                                                {{NoofAbsents}}</h1>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary custom-card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img height="54px" src="assets/icons/permission.png">
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class=" text-green Dashboardhead">Total  Employees</h5>
                                            <h1 class="mb-1 Dashboardhead" style="color:#7e549e;">
                                                {{NoofEmployee}}</h1>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>



                </div>




            </div>


           
            
                  <?php if($Clientid!=4) { ?>
                     <div class="card custom-card" >
                        <h5 class="card-header text-green">On Roll & Migrant Present / Absent Summary </h5>
                        <div class="card-body">

                            <table class=" table table-bordered ">
                                <tr class="tableheadrow">
                                    <td class="tabletotalrow"></td>
                                    <td colspan="3" class="tabletotalrow">Local  </td>
                                    <td colspan="3" class="tabletotalrow" style="text-align: center;">Present </td>
                                    <td colspan="3" class="tabletotalrow" style="text-align: center;">Absent </td>
                                    <td colspan="3" class="tabletotalrow" style="text-align: center;">Leave </td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>Male</td>
                                    <td>Female</td>
                                    <td class="tabletotalrow">Total</td>
                                    <td>Male</td>
                                    <td>Female</td>
                                    <td class="tabletotalrow">Total</td>
                                    <td>Male</td>
                                    <td>Female</td>
                                    <td class="tabletotalrow">Total</td>
                                    <td>Male</td>
                                    <td>Female</td>
                                    <td class="tabletotalrow">Total</td>

                                </tr>
                                <tr>
                                    <td>Category 1</td>
                                    <td>{{Cat1onrollmale}}</td>
                                    <td>{{Cat1onrollfemale}}</td>
                                    <td class="tabletotalrow">{{Cat1onrolltotal}}</td>
                                    <td>{{Cat1onrollmalepresent}}</td>
                                    <td>{{Cat1onrollfemalepresent}}</td>
                                    <td class="tabletotalrow">{{Cat1onrollpresent}}</td>
                                    <td>{{Cat1onrollmaleabsent}}</td>
                                    <td>{{Cat1onrollfemaleabsent}}</td>
                                    <td class="tabletotalrow">{{Cat1onrollabsent}}</td>
                                    <td>{{Cat1onrollmaleleave}}</td>
                                    <td>{{Cat1onrollfemaleleave}}</td>
                                    <td class="tabletotalrow">{{Cat1onrollleave}}</td>

                                </tr>
                                <tr>
                                    <td>Category 2</td>

                                    <td>{{Cat2onrollmale}}</td>
                                    <td>{{Cat2onrollfemale}}</td>
                                    <td class="tabletotalrow">{{Cat2onrolltotal}}</td>
                                    <td>{{Cat2onrollmalepresent}}</td>
                                    <td>{{Cat2onrollfemalepresent}}</td>
                                    <td class="tabletotalrow">{{Cat2onrollpresent}}</td>
                                    <td>{{Cat2onrollmaleabsent}}</td>
                                    <td>{{Cat2onrollfemaleabsent}}</td>
                                    <td class="tabletotalrow">{{Cat2onrollabsent}}</td>
                                    <td>{{Cat2onrollmaleleave}}</td>
                                    <td>{{Cat2onrollfemaleleave}}</td>
                                    <td class="tabletotalrow">{{Cat2onrollleave}}</td>


                                </tr>
                                <tr>
                                    <td>Category 3</td>
                                    <td>{{Cat3onrollmale}}</td>
                                    <td>{{Cat3onrollfemale}}</td>
                                    <td class="tabletotalrow">{{Cat3onrolltotal}}</td>
                                    <td>{{Cat3onrollmalepresent}}</td>
                                    <td>{{Cat3onrollfemalepresent}}</td>
                                    <td class="tabletotalrow">{{Cat3onrollpresent}}</td>
                                    <td>{{Cat3onrollmaleabsent}}</td>
                                    <td>{{Cat3onrollfemaleabsent}}</td>
                                    <td class="tabletotalrow">{{Cat3onrollabsent}}</td>
                                    <td>{{Cat3onrollmaleleave}}</td>
                                    <td>{{Cat3onrollfemaleleave}}</td>
                                    <td class="tabletotalrow">{{Cat3onrollleave}}</td>

                                </tr>
                                <tr>
                                    <td class="tabletotalrow"></td>
                                    <td colspan="3" class="tabletotalrow">Migrant </td>
                                    <td colspan="3" class="tabletotalrow" style="text-align: center;">Present </td>
                                    <td colspan="3" class="tabletotalrow" style="text-align: center;">Absent </td>
                                    <td colspan="3" class="tabletotalrow" style="text-align: center;">Leave </td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>Male</td>
                                    <td>Female</td>
                                    <td class="tabletotalrow">Total</td>
                                    <td>Male</td>
                                    <td>Female</td>
                                    <td class="tabletotalrow">Total</td>
                                    <td>Male</td>
                                    <td>Female</td>
                                    <td class="tabletotalrow">Total</td>
                                    <td>Male</td>
                                    <td>Female</td>
                                    <td class="tabletotalrow">Total</td>

                                </tr>
                                <tr>
                                    <td>Category 1</td>
                                    <td>{{Cat1migrantmale}}</td>
                                    <td>{{Cat1migrantfemale}}</td>
                                    <td class="tabletotalrow">{{Cat1migranttotal}}</td>
                                    <td>{{Cat1migrantmalepresent}}</td>
                                    <td>{{Cat1migrantfemalepresent}}</td>
                                    <td class="tabletotalrow">{{Cat1migrantpresent}}</td>
                                    <td>{{Cat1migrantmaleabsent}}</td>
                                    <td>{{Cat1migrantfemaleabsent}}</td>
                                    <td class="tabletotalrow">{{Cat1migrantabsent}}</td>
                                    <td>{{Cat1migrantmaleleave}}</td>
                                    <td>{{Cat1migrantfemaleleave}}</td>
                                    <td class="tabletotalrow">{{Cat1migrantleave}}</td>

                                </tr>
                                <tr>
                                    <td>Category 2</td>
                                    <td>{{Cat2migrantmale}}</td>
                                    <td>{{Cat2migrantfemale}}</td>
                                    <td class="tabletotalrow">{{Cat2migranttotal}}</td>
                                    <td>{{Cat2migrantmalepresent}}</td>
                                    <td>{{Cat2migrantfemalepresent}}</td>
                                    <td class="tabletotalrow">{{Cat2migrantpresent}}</td>
                                    <td>{{Cat2migrantmaleabsent}}</td>
                                    <td>{{Cat2migrantfemaleabsent}}</td>
                                    <td class="tabletotalrow">{{Cat2migrantabsent}}</td>
                                    <td>{{Cat2migrantmaleleave}}</td>
                                    <td>{{Cat2migrantfemaleleave}}</td>
                                    <td class="tabletotalrow">{{Cat2migrantleave}}</td>


                                </tr>
                                <tr>
                                    <td>Category 3</td>
                                    <td>{{Cat3migrantmale}}</td>
                                    <td>{{Cat3migrantfemale}}</td>
                                    <td class="tabletotalrow">{{Cat3migranttotal}}</td>
                                    <td>{{Cat3migrantmalepresent}}</td>
                                    <td>{{Cat3migrantfemalepresent}}</td>
                                    <td class="tabletotalrow">{{Cat3migrantpresent}}</td>
                                    <td>{{Cat3migrantmaleabsent}}</td>
                                    <td>{{Cat3migrantfemaleabsent}}</td>
                                    <td class="tabletotalrow">{{Cat3migrantabsent}}</td>
                                    <td>{{Cat3migrantmaleleave}}</td>
                                    <td>{{Cat3migrantfemaleleave}}</td>
                                    <td class="tabletotalrow">{{Cat3migrantleave}}</td>


                                </tr>
                            </table>

                        </div>
                    </div>
                    <?php }?>
            
           

            <div class="row">
                <div class="alert alert-success" role="alert" ng-show="Message" id='msg1'>
                    {{Message}}
                </div>
            </div>
         
            <div class="row" style="overflow-y: auto;">
                <div class="col-lg-5">
                    <div class="card" >
                        <h5 class="card-header text-green">Category Wise Present / Absent Summary </h5>
                        <div class="card-body">
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
                <div class="col-lg-7">
                    <div class="card">
                        <h5 class="card-header text-green">Department Wise Present / Absent Summary</h5>
                        <div class="card-body">
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
                                        <td> <a style="padding:5px 10px;color:#3ac47d;cursor: pointer;"><i
                                                    class="fa fa-envelope" title="Send Mail To Department Head"
                                                    ng-click="SendMailToDepartmenthead(e.Employeeid,e.Department,e.Attendencedate);"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

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