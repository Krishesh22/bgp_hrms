<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Monthly Leave </title>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>

        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM16Controller">

            <div class="container-fluid dashboard-content">

                <div id="overlay">
                    <div class="cv-spinner">
                        <span class="spinner"></span>
                    </div>
                </div>
                <div class="row col-lg-12">
                    <div class="card">
                        <h5 class="card-header">Attendance Month Leave Close</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Month</label>
                                    <select ng-model="Attendancemonth" class="form-control" ng-change="GetLeaveDetails();">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="col-form-label">Year</label>
                                    <?php 
                                                                  $year_start  =2021;
                                                                   $year_end = date('Y'); // current Year
                                

                                                               echo '<select   ng-model="Attendanceyear" class="form-control" ng-change="GetLeaveDetails();" >'."\n";
                                                                for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {
                                                                  $selected = ($user_selected_year == $i_year ? ' selected' : '');
                                                                   echo '<option value="'.$i_year.'"'.$selected.'>'.$i_year.'</option>'."\n";
                                                                      }
                                                                           echo '</select>'."\n";
                                                                               ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="col-form-label">Status</label>
                                    <input type="text" class="form-control" ng-model="Leavestatus" autocomplete="off"
                                        readonly>
                                </div>



                                <div class="form-group col-md-5 text-right mt-25">

                                    <!-- <button class="btn btn-sm btn-success" ng-click="UpdateBank();">Intime
                                        Fetch</button> -->

                                    <button class="btn btn-sm btn-success" ng-click="GetLeaveDetails();">Get Leave
                                        Details</button>
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalClose"
                                        ng-show="btnMonthOpen">Close Leave</button>

                                    <!-- 
                                    <button class="btn btn-sm btn-success" ng-click="SendMailToAdmin();">Mail <i
                                            class="fa fa-envelope"></i></button> -->
                                </div>


                            </div>

                            <div class="row">
                                <div class="alert alert-success" role="alert" ng-show="Message">
                                    {{Message}}
                                </div>

                            </div>

                            <div class="card">







                                <div class=" col-lg-12 table-responsive custom-table custom-table-noborder">
                                    <table class="table table-bordered  table-sm table-striped" style="width: 100%;">
                                        <thead>


                                            <tr class="tablethrow">
                                                <th style="width: 50px;">S.No</th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>CasualLeave</th>
                                                <th>UsedCL</th>
                                                <th>BalanceCL</th>
                                                <th>SickLeave</th>
                                                <th>UsedSL</th>
                                                <th>BalanceSL</th>


                                            </tr>
                                        </thead>

                                        <tr>
                                            <td colspan="2"><input type="text" class="form-control"
                                                    ng-model="searchPayroll.Employeeid"></td>
                                            <td><input type="text" class="form-control"
                                                    ng-model="searchPayroll.Firstname"></td>
                                            <td><input type="text" class="form-control"
                                                    ng-model="searchPayroll.TotalCausalLeave">
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    ng-model="searchPayroll.TakenCausalLeave">
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    ng-model="searchPayroll.BalanceCausalLeave">
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    ng-model="searchPayroll.TotalSickLeave">
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    ng-model="searchPayroll.TakenSickLeave"></td>
                                            <td><input type="text" class="form-control"
                                                    ng-model="searchPayroll.BalanceSickLeave"></td>

                                        </tr>


                                        <tr dir-paginate="e in GetMonthLeaveSummaryList |orderBy:sortKeyCustomer:reverseCustomer|filter:searchPayroll|itemsPerPage:10"
                                            current-page="currentPageMonthLeave" pagination-id="MonthLeavepagination">

                                            <td>
                                                {{$index+1+(currentPageMonthLeave - 1) * pageSizeMonthPayroll}}

                                            </td>
                                            <td> {{e.Employeeid}}</td>
                                            <td>{{e.Title}}{{e.Firstname}}{{e.lastname}}</td>
                                            <td>{{e.TotalCausalLeave}}</td>
                                            <td>{{e.TakenCausalLeave}}</td>
                                            <td> {{e.BalanceCausalLeave }}</td>
                                            <td>{{e.TotalSickLeave }}</td>
                                            <td> {{e.TakenSickLeave}}</td>
                                            <td> {{e.BalanceSickLeave}}</td>


                                        </tr>


                                    </table>
                                    <dir-pagination-controls pagination-id="MonthLeavepagination" max-size="3"
                                        direction-links="true" boundary-links="true" class="pagination">
                                    </dir-pagination-controls>
                                </div>







                            </div>

                            <div class="modal fade" id="ModalClose" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-danger">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Close</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger" role="alert">
                                                Are You sure want to Close this record?
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-rounded btn-danger" ng-click="MonthClose();"
                                                data-dismiss="modal">Yes</button>
                                            <button type="button" class="btn btn-rounded btn-dark"
                                                data-dismiss="modal">No</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>








                </div>
            </div>

        </div>
        <?php include '../footer.php'?>



    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM16Controller.js"></script>
    <!-- <script src="../Scripts/Controller/HRMbreaktimeController.js"></script> -->

</body>

</html>