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

        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM37Controller">

            <div class="container-fluid dashboard-content">
             
                    <div class="card">
                        <h5 class="card-header">Selected Employee Attendance Details</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">From Date</label>
                                    <input type="text" class="form-control" ng-model="FromDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                        ng-change="GetAttendanceDate();">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">To Date</label>
                                    <input type="text" class="form-control" ng-model="ToDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                        ng-change="GetAttendanceDate();">
                                </div>
                                <div class="form-group col-md-3">

                                    <label class="col-form-label">Employee Name</label>
                                    <div class="input-group ">
                                        <input type="text" placeholder="Employeename" class="form-control"
                                            ng-model="Employeename" readonly>


                                        <button class="btn btn-info input-group-prepend" data-toggle="modal"
                                            data-target="#ModalEmployee"> <i class="fa fa-user-circle"></i></button>
                                    </div>


                                </div>

                                <div class="form-group text-right mt-25">


                                 
                                    <a class="btn btn-warning btn-sm" href="ExportExcel.php" ng-click="GETREPORT()"><i
                                            class="fa fa-download"></i>
                                        Download</a>


                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="alert alert-success" role="alert" ng-show="Message">
                        {{Message}}
                    </div>




                    <div class="card">
                        <h5 class="card-header text-green">Employee Attendance Daily Detail</h5>
                        <div class="card-body" style="overflow-x:auto">
                            <table class="table table-bordered  " style="width:100%;">
                                <thead>
                                    <tr class="bg-green text-white">
                                        <!-- <th  ng-show="btnOpen">Action</th> -->
                                        <th>#</th>
                                        <th>Date</th>
                                        <th scope="col">Empid</th>
                                        <th scope="col">Empname</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">In</th>
                                        <th scope="col">Out</th>
                                        <th scope="col">OT In</th>
                                        <th scope="col">OT Out</th>
                                        <th scope="col">Hrs</th>
                                        <!-- <th scope="col" title="Actual Working Days">AW Days</th> -->
                                        <th scope="col">OT</th>
                                        <th scope="col" title="Actual OT Hrs">AW OT</th>
                                        <!-- <th scope="col">Days</th> -->


                                    </tr>
                                </thead>

                             
                                <tbody>



                                    <tr dir-paginate="e in GetEmpDailyAttendanceList |filter:searchHoliday | itemsPerPage:10 | orderBy: 'Employeeid' track by $index  "
                                        pagination-id="EmpAttendancegrid" current-page="currentPageEmpAttendance"
                                        ng-class="{'rowcolormissmatched':e.Mismatchedattendence=='Yes'}">




                                        <td style="width: 25px;">
                                            {{$index+1 + (currentPageEmpAttendance - 1) * pageSizeEmpAttendance}}
                                        </td>
                                        <td>{{e.Attendencedate}}</td>
                                        <td>{{e.Employeeid}}</td>
                                        <td style="width:170px">{{e.Title}}{{e.Fullname}}</td>
                                        <td>{{e.AttenStatus}}</td>

                                        <td>{{e.Intime}}</td>




                                        <td>{{e.Outtime}}</td>

                                        <td>{{e.OTIntime}}</td>

                                        <td>{{e.OTOuttime}}</td>

                                        <td>{{e.Workinghours}}</td>
                                        <!-- <td>{{e.Actualworkinghours}}</td> -->
                                        <td>{{e.OT_HRS}}</td>
                                        <td>{{e.ActualOt_HRS}}</td>

                                        <!-- <td>{{e.Workingdays}}</td> -->


                                    </tr>
                                </tbody>
                            </table>
                            <div class="float-right mt-2">
                                <div class="pagination ">
                                    <dir-pagination-controls pagination-id="EmpAttendancegrid" max-size="3"
                                        direction-links="true" boundary-links="true" class="pagination">
                                    </dir-pagination-controls>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalEmployee" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Select Employee</h5>

                                </div>
                                <div class="col-lg-12">
                                    <div class=" row">

                                        <table class="table table-bordered  table-sm table-striped"
                                            style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Action</th>
                                                    <th>No</th>
                                                    <th scope="col">
                                                        Emp_ID</th>
                                                    <th scope="col" style="width: 200px;">Name</th>
                                                    <th scope="col" style="width: 90px;">Gender</th>
                                                    <th scope="col">Department</th>
                                                    <th scope="col">Designation</th>


                                                </tr>
                                            </thead>


                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchEmployee.Employeeid">

                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            ng-model="searchEmployee.Fullname">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            ng-model="searchEmployee.Gender">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            ng-model="searchEmployee.Department">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            ng-model="searchEmployee.Designation">
                                                    </td>



                                                    </td>


                                                </tr>
                                                <tr dir-paginate="e in GetEmployeeList |filter:searchEmployee|itemsPerPage:10 "
                                                    pagination-id="Employeegrid" current-page="currentPageEmp">



                                                    <td>
                                                        <div class="action-btn">
                                                            <img height="15" ng-click="SendEdit02(e.Employeeid);"
                                                                data-dismiss="modal"
                                                                src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                        </div>
                                                    </td>

                                                    <td style="width: 50px;">
                                                        {{$index+1 + (currentPageEmp - 1) * pageSizeEmp}}
                                                    </td>
                                                    <td>{{e.Employeeid}}</td>
                                                    <td>{{e.Title}} {{e.Fullname}}</td>
                                                    <td>{{e.Gender}}</td>
                                                    <td>{{e.Department}}</td>
                                                    <td>{{e.Designation}}</td>




                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="pagination">
                                            <dir-pagination-controls pagination-id="Employeegrid" max-size="3"
                                                direction-links="true" boundary-links="true" class="pagination">
                                            </dir-pagination-controls>


                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

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
    <script src="../Scripts/Controller/HRM37Controller.js"></script>

</body>

</html>