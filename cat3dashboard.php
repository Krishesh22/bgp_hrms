<?php 
   include 'config.php';
   include 'session.php';
   
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
         <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="Cat3DashboardController">
            <div class="dashboard-ecommerce">
               <div class="container-fluid dashboard-content ">
                  <!-- ============================================================== -->
                  <!-- pageheader  -->
                  <!-- ============================================================== -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-header">
                           <h2 class="pageheader-title">Dashboard</h2>
                           <div class="page-breadcrumb mt-3">
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
                           ng-change="GetCat3AttendanceDate();"></td>
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
                                       <a href="HRM47/Cat3attendances.php">
                                          <img height="64px" src="assets/icons/present.png">
                                          <h1 class="mb-1" style="margin-top:15px;color:#7e549e">
                                             {{CountPresentDays}}
                                          </h1>
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
                                       <a href="HRM49 /Cat3leaveattendances.php">
                                          <img height="64px" src="assets/icons/leave.png">
                                          <h1 class="mb-1" style="margin-top:15px;color:#c2549d">
                                            {{CountLeaveDays}}
                                          </h1>
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
                        <a href="HRM48/Cat3attendances_abs.php"> 
                        <img height="64px" src="assets/icons/absent.png">
                        <h1 class="mb-1" style="margin-top:15px;color:#fc8370">
                       {{CountAbsentDays}} </h1>
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
                                             {{CountOfemp}} </h1>
                                       </div>
                                   </center>
                               </div>
                           </div>
                           </div>
                        <!-- ============================================================== -->
                        <!-- end total orders  -->
                        <!-- ============================================================== -->
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
      <script src="Scripts/Controller/Cat3DashboardController.js"></script>
   </body>
</html>