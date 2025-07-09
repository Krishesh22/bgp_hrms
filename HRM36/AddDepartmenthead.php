<?php 
include '../config.php';
include '../session.php';

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Department Head Details</title>
    <style type="text/css">
    .CityTable {
        position: absolute;
        right: 15px;
    }

    .col-form-label {
        padding-top: 0px !important;
        padding-bottom: 0px !important
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM36Controller">
            <div class="container-fluid dashboard-content">
                <div class="row">

                    <div class="col-md-5">
                        <h5 class="text-green">Department Head List</h5>
                        <div class="alert alert-success" role="alert" ng-show="Message">
                            {{Message}}
                        </div>
                    </div>
                    <div class="col-md-7">
                        <table class="CityTable">
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="col-form-label">Department</label>
                                        <select ng-model="DeptHead" class="form-control" style="width:200px"
                                            ng-change="GetDeptHead()">

                                            <option ng-repeat="s in GetDeptList " value="{{s.Department}}">
                                                {{s.Department}}</option>
                                        </select>
                                    </div>
                                </td>
                                <td>

                                    <div class="form-group">
                                        <label class="col-form-label">Department Head</label>
                                        <div class="input-group ">
                                            <input type="text" placeholder="Employeename" class="form-control"
                                                ng-model="Employeename" readonly>


                                            <button class="btn btn-warning input-group-prepend" data-toggle="modal"
                                                data-target="#ModalEmployee"> <i class="fa fa-user-circle"></i></button>
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="form-btn-sm" style="margin-top: 6px">&nbsp;
                                        <button class="btn btn-success" ng-click="SaveDeptHead();">Save <i
                                                class="fa fa-plus"></i></button>
                                        <button class="btn btn-danger" ng-click="Reset();">Clear <i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>

                        </table>


                    </div>



                    <div class="col-md-12" style="margin-top: 30px;">

                        <table class="table table-bordered  table-sm info-table">
                            <thead>
                                <tr class="bg-green text-white">

                                    <th>#</th>
                                    <th>Department</th>
                                    <th>Employeeid</th>
                                    <th>Employee Name</th>
                                    <th>Designation</th>
                                    <th>Category</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <div class="input-group">
                                            <input placeholder="Search" type="text" class="form-control"
                                                ng-model="searchDepartment.Department">
                                            <div class="input-group-append"><span
                                                    class="input-group-text input-group-green"><i
                                                        class="fa fa-search"></i></span></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input placeholder="Search" type="text" class="form-control"
                                                ng-model="searchDepartment.Employeeid">
                                            <div class="input-group-append"><span
                                                    class="input-group-text input-group-green"><i
                                                        class="fa fa-search"></i></span></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input placeholder="Search" type="text" class="form-control"
                                                ng-model="searchDepartment.Fullname">
                                            <div class="input-group-append"><span
                                                    class="input-group-text input-group-green"><i
                                                        class="fa fa-search"></i></span></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input placeholder="Search" type="text" class="form-control"
                                                ng-model="searchDepartment.Designation">
                                            <div class="input-group-append"><span
                                                    class="input-group-text input-group-green"><i
                                                        class="fa fa-search"></i></span></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input placeholder="Search" type="text" class="form-control"
                                                ng-model="searchDepartment.Type_Of_Posistion">
                                            <div class="input-group-append"><span
                                                    class="input-group-text input-group-green"><i
                                                        class="fa fa-search"></i></span></div>
                                        </div>
                                    </td>

                                    </td>


                                </tr>

                                <tr dir-paginate="e in GetDepartmentEmployeeList |filter:searchDepartment|itemsPerPage:n "
                                    pagination-id="DeparmentGrid" current-page="currentPageDepartment">


                                    <td style="width: 50px;">
                                        {{$index+1 + (currentPageDepartment - 1) * pageSizeDepartment}}
                                    </td>
                                    <td>{{e.Department}}</td>
                                    <td>{{e.Employeeid}}</td>
                                    <td>{{e.Fullname}}</td>
                                    <td>{{e.Designation}}</td>
                                    <td>{{e.Type_Of_Posistion}}</td>

                                </tr>
                            </tbody>
                        </table>


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

                                <table class="table table-bordered  table-sm table-striped" style="width: 100%;">
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

            <?php include '../footer.php'?>
        </div>




    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM36Controller.js"></script>
</body>

</html>