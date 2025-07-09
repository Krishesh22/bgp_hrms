<?php include '../config.php' ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php' ?>
    <title>Exit Employee(View)</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <?php include '../headerin.php' ?>
        <?php include '../Sidebarin.php' ?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM27Controller">
            <div class="container-fluid dashboard-content">
                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="mt-3">


                                <div class="">
                                    <h5 class="text-green">Exit Employee
                                        Details
                                    </h5>
                                    <hr />
                                    <div class="">

                                        <div class="table-responsive">
                                            <table class="table table-bordered  table-sm table-striped">
                                                <thead>
                                                    <tr class="text-green">
                                                        <th>No</th>
                                                        <th scope="col">
                                                            ID
                                                        </th>
                                                        <th scope="col" style="width: 150px;">Name
                                                        </th>
                                                        <!-- <th scope="col">Request Date
                                                        </th> -->
                                                        <th scope="col">Releiving Date
                                                        </th>
                                                        <th scope="col" style="width: 90px;">Gender
                                                        </th>
                                                        <th scope="col">Department</th>
                                                        <th scope="col">Designation</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control"
                                                                    ng-model="searchEmployee.Employeeid">

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control"
                                                                    ng-model="searchEmployee.Fullname">

                                                            </div>
                                                        </td>
                                                        <!-- <td>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control"
                                                                    ng-model="searchEmployee.RequestDate2">

                                                            </div>
                                                        </td> -->
                                                        <td>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control"
                                                                    ng-model="searchEmployee.Fullname">

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control"
                                                                    ng-model="searchEmployee.Gender">

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control"
                                                                    ng-model="searchEmployee.Department">

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control"
                                                                    ng-model="searchEmployee.Designation">

                                                            </div>
                                                        </td>
                                                        <td colspan="2">
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control"
                                                                    ng-model="searchEmployee.ExitStatus">

                                                            </div>
                                                        </td>
                                                        </td>
                                                    </tr>
                                                    <tr dir-paginate="e in GetEmployeeList02 |filter:searchEmployee|itemsPerPage:10"
                                                        pagination-id="Employeegrid" current-page="currentPageEmp">
                                                        <td style="width: 50px;">
                                                            {{$index+1 + (currentPageEmp - 1) * pageSizeEmp}}
                                                        </td>
                                                        <td>{{e.Employeeid}}</td>
                                                        <td>{{e.Title}} {{e.Fullname}}
                                                        </td>
                                                        <!-- <td>{{e.RequestDate2}}</td> -->
                                                        <td>{{e.ReleivingDate2}}</td>
                                                        <td>{{e.Gender}}</td>
                                                        <td>{{e.Department}}</td>
                                                        <td>{{e.Designation}}</td>
                                                        <td>{{e.ExitStatus}}</td>
                                                        <td>
                                                            <div class="action-btn">
                                                                <img height="15"
                                                                    ng-click="SendEdit_Exitemp(e.Employeeid);"
                                                                    src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="float-right mt-2">
                                        <div class="pagination ">
                                            <dir-pagination-controls pagination-id="Employeegrid" max-size="3"
                                                direction-links="true" boundary-links="true" class="pagination">
                                            </dir-pagination-controls>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="">

                                <div class="mt-3">
                                    <h5 class="text-green">Exit Employee View</h5>
                                    <hr />
                                    <div class="">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Employee
                                                    Name</label>
                                                <input type="text" class="form-control" ng-model="Employeename"
                                                    autocomplete="off" readonly>
                                            </div>
                                            <!-- <div class="form-group col-md-3">
                                                <label class="col-form-label">Request
                                                    Date</label>
                                                <input type="text" class="form-control" ng-model="RequestDate"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')">
                                            </div> -->
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Status</label>
                                                <select class="form-control" ng-model="Exitstatus">
                                                    <option Value="Initialized">Initialized
                                                    </option>
                                                    <option value="Revoked">Revoked</option>
                                                    <option value="Approved">Approved
                                                    </option>
                                                    <option value="Exited">Exited</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Releiving
                                                    Date</label>
                                                <input type="text" class="form-control" ng-model="ReleivingDate"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Gender</label>
                                                <input type="text" class="form-control" ng-model="Gender"
                                                    autocomplete="off" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Category</label>
                                                <input type="text" class="form-control" ng-model="Category"
                                                    autocomplete="off" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Department</label>
                                                <input type="text" class="form-control" ng-model="EmpDepartment"
                                                    autocomplete="off" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Designation</label>
                                                <input type="text" class="form-control" ng-model="EmpDesignation"
                                                    autocomplete="off" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Contactno</label>
                                                <input type="text" class="form-control" ng-model="Contactno"
                                                    autocomplete="off" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Hand
                                                    Overto</label>
                                                <select ng-model="Handoverid" class="form-control"
                                                    ng-change="FetchHandover(Handoverid);">
                                                    <option ng-repeat="s in GetEmployeeList " value="{{s.Employeeid}}">
                                                        {{s.Fullname}}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Approval
                                                    Status</label>
                                                <input type="text" class="form-control" ng-model="Approvalstatus"
                                                    autocomplete="off" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Meeting
                                                    Date</label>
                                                <input type="text" class="form-control" ng-model="MeetingDate"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">MeetingTime</label>
                                                <input class="form-control" type="text" onfocus="(this.type='time')"
                                                    onblur="(this.type='time')" ng-model="Meetingtime"
                                                    placeholder="HH:mm:ss" />
                                            </div>
                                            <div class="form-group col-md-9">
                                                <label class="col-form-label">Email-ID</label>
                                                <input type="text" class="form-control" ng-model="Emailid"
                                                    autocomplete="off" readonly>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Reason</label>
                                                <textarea type="text" class="form-control" ng-model="Releivingreason"
                                                    autocomplete="off"></textarea>
                                            </div>
                                            <div class="text-right col-md-12 mb-1">
                                                <button class="btn btn-sm btn-warning" data-target="#myCarousel"
                                                    data-slide-to="0" ng-click="Getallvalues()"><i
                                                        class="fa fa-arrow-left"></i> Back</button>

                                            </div>
                                        </div>
                                        <div class="alert alert-success" role="alert" ng-show="Message" id='msg1'>
                                                        {{Message}}
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="tab-list" style="overflow-x: hidden;">
                                                    <ul class="nav nav-pills nav-fill">
                                                        <li class="nav-item" ng-click="fnhandinfo();">
                                                            <a>Handover Document</a>
                                                        </li>
                                                        <li class="nav-item" ng-click="fniteminfo();">
                                                            <a>Asset</a>
                                                        </li>

                                                        <li class="nav-item" ng-click="fninterview_formatinfo();">
                                                            <a>Exit Interview Format</a>
                                                        </li>
                                                        <li class="nav-item" ng-click="fnno_dueinfo();">
                                                            <a>No Due Form</a>
                                                        </li>
                                                        <li class="nav-item" class="nav nav-pills nav-fill"><a
                                                                data-toggle="tab"
                                                                ng-click="fnno_statusinfo();">Status</a></li>
                                                        <li class="nav-item" class="nav nav-pills nav-fill"><a
                                                                data-toggle="tab"
                                                                ng-click="fnno_settlementinfo();">Settelment</a></li>
                                                        <li class="nav-item" class="nav nav-pills nav-fill"><a
                                                                data-toggle="tab" ng-click="fnno_payrollinfo();">Payroll
                                                                Settelment</a></li>
                                                        <li class="nav-item" class="nav nav-pills nav-fill"><a data-toggle="tab" ng-click="fnno_relieving();">Relieving Letter</a></li>
                                                        <li class="nav-item" class="nav nav-pills nav-fill"><a data-toggle="tab" ng-click="fnno_experience();">Experience Certificate</a></li>


                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <div class="card" ng-show="btnstatus">
                                    <h5 class="card-header">Approval Status</h5>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered  table-sm ">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th scope="col">
                                                            Type
                                                        </th>
                                                        <th scope="col">
                                                            Status
                                                        </th>
                                                        <th scope="col">
                                                            Approved/Reject
                                                            Time
                                                        </th>
                                                        <th scope="col">
                                                            Notes
                                                        </th>
                                                        <!-- <th>Send
                                                        Approval
                                                    </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1.</td>
                                                        <td>HR</td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="HR_Approve" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                ng-model="HR_Approve_date_time" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" ng-model="HR_Notes"
                                                                ng-disabled="HR_Notes"></input>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>2.</td>
                                                        <td>DH</td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="DH_Approve" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                ng-model="DH_Approve_date_time" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" ng-model="DH_Notes"
                                                                ng-disabled="DH_Notes"></input>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>3.</td>
                                                        <td>GM</td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="GM_Approve" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                ng-model="GM_Approve_date_time" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" ng-model="GM_Notes"
                                                                ng-disabled="GM_Notes"></input>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>4.</td>
                                                        <td>ADMIN</td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="ADMIN_Approve" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                ng-model="ADMIN_Approve_date_time" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                ng-model="ADMIN_Notes"
                                                                ng-disabled="ADMIN_Notes"></input>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>5.</td>
                                                        <td>Employee
                                                        </td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="EmployeeAccepted" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                ng-model="Employeeofferaccepteddatetime" readonly>
                                                        </td>
                                                        <td>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="card" ng-show="btnsettlement">
                                    <h5 class="card-header">Settlement Details</h5>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-6">

                                                <div class="row">
                                                    <div class="col-lg-6 ">
                                                        <label class="col-form-label">Settlement Date
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <!-- <input type="text" class="form-control" ng-model="Settlementdate"
                                                        onfocus="(this.type='date')" onblur="(this.type='date')"> -->

                                                        <input type="date" class="form-control" ng-model="Settlementdate" onfocus="(this.type='date')" onblur="(this.type='date')">

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 ">
                                                        <label class="col-form-label">Employee Name
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" ng-model="Employeename" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 ">
                                                        <label class="col-form-label">Employee No
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6 ">
                                                        <input type="text" class="form-control" ng-model="Employeeid" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 ">
                                                        <label class="col-form-label">Department
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6 ">
                                                        <input type="text" class="form-control" ng-model="EmpDepartment" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 ">
                                                        <label class="col-form-label">Designation
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6 ">
                                                        <input type="text" class="form-control" ng-model="EmpDesignation" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 ">
                                                        <label class="col-form-label">Date Of Joining
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6 ">
                                                        <input type="text" class="form-control" ng-model="Date_Of_Joing2" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 ">
                                                        <label class="col-form-label">Date Of Releiving
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6 ">
                                                        <input type="text" class="form-control" ng-model="ReleivingDate2" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 ">
                                                        <label class="col-form-label">Basic Wages/Day
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6 ">
                                                        <input type="text" class="form-control" ng-model="BasicDay" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 ">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label class="col-form-label">

                                                        </label>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label class="col-form-label">
                                                            Total Days
                                                        </label>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label class="col-form-label">
                                                            Amount
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-lg-4">
                                                        <label class="col-form-label">
                                                            Total worked days
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" ng-model="BonusBasicDays" autocomplete="off" readonly>

                                                    </div>

                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" ng-model="BonusBasicAmounts" autocomplete="off" readonly>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label class="col-form-label">
                                                            Leave Balance days
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" ng-model="CausalBasicDays" autocomplete="off" readonly>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" ng-model="CausalBasicAmounts" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-lg-4">
                                                        <label class="col-form-label">
                                                            Gratuity
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" ng-model="GratuityBasicDays" autocomplete="off" readonly>

                                                    </div>

                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" ng-model="GratuityBasicAmounts" autocomplete="off" readonly>

                                                    </div>


                                                </div>


                                                <div class="row">

                                                    <div class="col-lg-4">
                                                        <label class="col-form-label">
                                                            Total
                                                        </label>
                                                    </div>
                                                    <!-- <div class="col-lg-4">
                        <input type="text" class="form-control" ng-model="TotalDays" autocomplete="off" readonly>

                    </div> -->
                                                    <div class="col-lg-4"></div>

                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" ng-model="Settlementtotal" autocomplete="off" readonly>

                                                    </div>


                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-md-12">
                                                        <div class="form-group text-right">
                                                            <button class="btn btn-sm btn-rounded btn-success" ng-click="UpdateSettlementDetails();"><i class="fa fa-save"></i> Update</button>
                                                            <button class="btn btn-sm btn-rounded btn-info" ng-click="CalculateEL();"><i class="fa fa-calculator"></i> Calculate</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive mt-4">
                                            <table class="table table-bordered  table-sm table-striped">
                                                <thead>
                                                    <tr class="text-green">
                                                        <th>Month-Year</th>

                                                        <th>Worked days</th>
                                                        <th>Balance&nbsp;EL</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr dir-paginate="e in GetempSettleList |filter:searchEmployeessss|itemsPerPage:10" pagination-id="Employeegrid">
                                                        <td>{{e.SalMonth}}-{{e.Salyear}}</td>
                                                        <td>{{e.TotalWorkingdays}}</td>
                                                        <td>{{e.TotalBalanceEL}}</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>


                                <div class="card" ng-show="btnHandover">
                                    <h5 class="card-header text-green">Handover Details</h5>
                                    <div class="card-body">
                                        <div class="row">



                                            <div class="col-lg-8">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered  table-sm table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th scope="col">Description</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr dir-paginate="e in GetHandoverList|filter:searchHandover|itemsPerPage:5"
                                                                pagination-id="Handovergrid"
                                                                current-page="currentPageHandover">
                                                                <td style="width: 50px;">
                                                                    {{$index+1 + (currentPageHandover - 1) * pageSizeHandover}}
                                                                </td>
                                                                <td>{{e.description}}</td>
                                                                <td>
                                                                    <div class="action-btn">

                                                                        <img height="15" data-toggle="modal"
                                                                            data-target="#ModalCenter1HandoverView"
                                                                            ng-click="Fetchempdoc(e.Employeeid,e.Sno);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/view.png">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="pagination">
                                                    <dir-pagination-controls pagination-id="Handovergrid" max-size="3"
                                                        direction-links="true" boundary-links="true" class="pagination">
                                                    </dir-pagination-controls>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card" ng-show="btnitem">
                                    <?php include '../HRM10/Empasset/Assetview.php' ?>

                                </div>
                                <div class="card" ng-show="btninterview_format">
                                    <h5 class="card-header text-green">Exit Interview Format</h5>
                                    <div class="card-body">
                                        <a id="edit_interview_btn" class="btn btn-sm btn-info btn-nda-down"><i class="fa fa-download"></i>
                                            Download</a>
                                        <div class="card-body"> <!-- dk-->
                                            <div style="padding:20px;">
                                                <div id="pdfExport">

                                                    <div class="input-group-append">
                                                        <p ng-click="FetchEmployee(Employeeid);" data-toggle="modal">

                                                        </p>
                                                    </div>


                                                    <style type='text/css'>
                                                        h1,
                                                        h2 {
                                                            text-align: center;
                                                        }

                                                        table.data-table,
                                                        .data-table td,
                                                        .data-table th {
                                                            padding: 5px;
                                                        }

                                                        table.data-table {
                                                            margin: 20px;
                                                            width: 100%;
                                                            border-collapse: collapse;
                                                        }
                                                    </style>

                                                    <div class="pdf-data" style="padding: 25px 40px;">
                                                        <center><img class="exit-emp-logo" style="height: 80px;margin: 15px;" src='sainmarks.png'>
                                                        </center>
                                                        <h1 style="color:green;font-size: 20px;"> BRITANNIA LABELS INDIA PVT LTD</h1>
                                                        <h2 style="color:green;font-size: 20px;">Exit Interview</h2>

                                                        <p><b>Name :</b> {{Title}} {{Firstname}}{{Lastname}}</p>

                                                        <p><b>Employee Code :</b> {{Employeeid}}</p>

                                                        <p><b>Address For Correspondence:</b><br /> {{CurrentAddress}}

                                                            {{CurrentCountry}},<br />
                                                            {{CurrentState}},<br />
                                                            {{CurrentCity}},<br />
                                                        <p><b>Pincode:</b> {{CurrentPincode}}</p>

                                                        <p><b>Phone No:</b> {{Contactno}}</p>


                                                        <br /><br />
                                                        <p><b>1. Reasons for resigning (You can tick more than one):</b></p>
                                                        <p>a. Better Compensation</p>
                                                        <p>b. Better Growth Opportunities</p>
                                                        <p>c. Higher Education</p>
                                                        <p>d. Work Related Issues (Please Specify):
                                                            _______________________________________________</p>
                                                        <p>e. Personal Reasons (Please Specify):
                                                            __________________________________________________</p>
                                                        <p>f. Others (Please specify):
                                                            _______________________________________________</p>
                                                        <br /><br />
                                                        <p><b>2. During your tenure with us;</b></p>
                                                        <p>a. Did you know what was expected of you at work? Yes / No</p>
                                                        <p>b. Did you have the materials and equipment to do your work
                                                            right? Yes / No</p>
                                                        <p>c. At work, did you have the opportunity to do what you did best
                                                            every day? Yes / No</p>
                                                        <p>d. In the last seven days, have you received recognition or
                                                            praise for doing good work? Yes / No</p>
                                                        <p>e. Does your supervisor, or someone at work, seem to care about
                                                            you as a person? Yes / No</p>
                                                        <p>f. Is there someone at work who encourages your development? Yes
                                                            / No</p>
                                                        <p>g. At work, do your opinions seem to count? Yes / No</p>
                                                        <p>h. In the last six months, has someone at work talked to you
                                                            about your progress? Yes / No</p>
                                                        <p>i. In the last year, have you had opportunities to learn and
                                                            grow? Yes / No</p>
                                                        <br /><br />
                                                        <p><b>3. Describe what you liked while working with Company
                                                                Name.</b></p>

                                                        <p>________________________________________________________________________________________________________________________________________________
                                                        </p>

                                                        <br /><br />
                                                        <p style="display: none;"><br /><br /><br /><br /></p>
                                                        <br /><br />
                                                        <p> <br /><br /> <b>4. Describe what you disliked while working with Company
                                                                Name.</b></p>

                                                        <p>________________________________________________________________________________________________________________________________________________
                                                        </p>

                                                        <br /><br />
                                                        <p><b>5. What were the factors that attracted you to your next
                                                                job?</b></p>
                                                        <p>________________________________________________________________________________________________________________________________________________
                                                        </p>

                                                        <br /><br />
                                                        <p><b>6. Any other relevant information/suggestions which, you feel
                                                                will help make Company Name a better place to work.</b></p>

                                                        <p>________________________________________________________________________________________________________________________________________________
                                                        </p>

                                                        <br /><br />
                                                        <p><b>7. Comments of the interviewer</b></p>

                                                        <p>________________________________________________________________________
                                                        </p>
                                                        <p>________________________________________________________________________
                                                        </p>



                                                        <br /><br />


                                                        <table class='data-table'>
                                                            <tr>
                                                                <td>Name of the interviewer</td>
                                                                <td>Signature of the interviewer</td>
                                                                <td>Date of interview</td>
                                                            </tr>

                                                            <tr>
                                                                <td>____________________________ </td>
                                                                <td>____________________________</td>
                                                                <td>____________________________</td>
                                                            </tr>


                                                        </table>
                                                    </div>

                                                    <!-- <div class="modal-footer"> -->


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card" ng-show="handoverreport_format">
                                    <h5 class="card-header text-green">Handover Report Item</h5>
                                    <div class="card-body">
                                        <a id="edit_report_btn" class="btn btn-sm  btn-info btn-nda-down"><i
                                                class="fa fa-download"></i>
                                            Download</a>
                                        <div class="card-body">

                                            <div id="reportpdfExport">

                                                <div class="input-group-append">
                                                    <!-- <p ng-click="FetchEmployee(Employeeid);" data-toggle="modal">

                                                </p> -->
                                                </div>


                                                <style>
                                                    table {
                                                        max-width: 800px;
                                                        position: relative;
                                                    }

                                                    .settlement-data {}

                                                    .date {
                                                        position: absolute;
                                                        left: 685px;
                                                        top: 83px
                                                    }

                                                    .settlement-data table {
                                                        width: 100%;
                                                    }

                                                    .settlement-data table,
                                                    .settlement-data td,
                                                    .settlement-data th {
                                                        border: 1px solid #888888;
                                                        border-collapse: collapse;
                                                    }

                                                    table.no-border td,
                                                    table.no-border th {
                                                        border: 1px solid transparent;
                                                        border-collapse: collapse;
                                                        font-size: 1rem !important;
                                                    }

                                                    .settlement-data td,
                                                    .settlement-data th {
                                                        padding: 3px 10px;
                                                        /*width: 30px;*/
                                                        height: 25px;
                                                        font-size: 13px;
                                                    }

                                                    .settlement-data th {
                                                        background: #f0e6cc;
                                                    }

                                                    .settlement-data .even {
                                                        background: #fbf8f0;
                                                    }

                                                    .settlement-data .odd {
                                                        background: #fefcf9;
                                                    }

                                                    .settlement-data .settlement-logo {
                                                        height: 55px;
                                                        position: absolute;
                                                        margin: 6px 0 0px 5px
                                                    }

                                                    .profile {
                                                        height: 80px;
                                                        width: 80px;
                                                        background-color: #f5f5f5;
                                                        margin-bottom: 5px;
                                                    }

                                                    .profile img {
                                                        height: 80px;
                                                        width: 80px;
                                                    }
                                                </style>
                                                <div class='settlement-data'>
                                                    <!-- 	<div class='date'>Date: 17-10-2022</div> -->

                                                    <table class=''>
                                                        <tbody>

                                                            <tr>
                                                                <td colspan='6'><img class='settlement-logo'
                                                                        src='sainmarks.png'>
                                                                    <center><b>BRITANNIA GARMENT PACKAGING</b>
                                                                        <br /> 'LABEL ARCADE' 476/1B1A, Jothi
                                                                        Nagar,<br />
                                                                        K Chettipalayam,Tiruppur-641605, India
                                                                    </center>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan='6' align='center' style='font-size: 16px;'>
                                                                    <b>List of Hand Over Documents/Equipments and
                                                                        others</b>
                                                                </td>
                                                            </tr>
                                                            <tr align='center'>
                                                                <td style='width:30px'>S.NO</td>
                                                                <td>Particulars</td>
                                                                <td style='width:30px'>Qty</td>
                                                                <td style='width:120px'>Place of Stored</td>
                                                                <td style='width:120px'>Concern <br />Person Name</td>
                                                                <td style='width:120px'>Concern <br />Person Sign</td>
                                                            </tr>
                                                            <tr dir-paginate="e in GetHandoveritemList |filter:searchHandoveritem|itemsPerPage:10 "
                                                                pagination-id="Handoveritemgrid"
                                                                current-page="currentPageHandoveritem">
                                                                <td> {{$index+1 + (currentPageHandoveritem - 1) * pageSizeHandoveritem}}
                                                                </td>
                                                                <td>{{e.Particulars}}</td>
                                                                <td>{{e.Qtyitem}}</td>

                                                                <td>{{e.StoredPlace}}</td>
                                                                <td>{{e.ConcernName}}</td>

                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr align='center' valign='bottom' style='height: 100px;'>
                                                                <td colspan='2'>Employee Sign</td>
                                                                <td colspan='2'>HR Sign</td>
                                                                <td colspan='2'>Auth. Signatory Signature</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="card" ng-show="btnpayroll_format">
                                    <h5 class="card-header text-green">Payroll Settlement</h5>
                                    <div class="card-body">
                                        <a id="payroll_settle_btn" class="btn btn-sm btn-info btn-nda-down"><i class="fa fa-download"></i>
                                            Download</a>
                                        <div class="card-body">
                                            <div id="payrollExport">
                                                <div class="input-group-append">

                                                </div>

                                                <style>
                                                    table {
                                                        max-width: 794px;
                                                        position: relative;
                                                    }

                                                    .date {
                                                        left: 685px;
                                                        top: 83px
                                                    }

                                                    .settlement-data table {
                                                        width: 100%;
                                                    }

                                                    .settlement-data table,
                                                    .settlement-data td,
                                                    .settlement-data th {
                                                        border: 1px solid #888888;
                                                        border-collapse: collapse;
                                                    }

                                                    table.no-border td,
                                                    table.no-border th {
                                                        border: 1px solid transparent;
                                                        border-collapse: collapse;
                                                        font-size: 1rem !important;
                                                    }

                                                    .settlement-data td,
                                                    .settlement-data th {
                                                        padding: 3px;
                                                        width: 30px;
                                                        height: 25px;
                                                        font-size: 13px;
                                                    }

                                                    .settlement-data th {
                                                        background: #f0e6cc;
                                                    }

                                                    .settlement-data .even {
                                                        background: #fbf8f0;
                                                    }

                                                    .settlement-data .odd {
                                                        background: #fefcf9;
                                                    }

                                                    .settlement-data .settlement-logo {
                                                        height: 45px;
                                                        position: absolute;
                                                        margin: 2px 0 0px 0px
                                                    }

                                                    .settlement-data {
                                                        position: relative;
                                                    }

                                                    .date-info {
                                                        position: absolute;
                                                        right: 225px;
                                                        top: 76px
                                                    }
                                                </style>
                                                <div class='settlement-data'>
                                                    <!-- <div class='date-info'>Date: {{Settlementdate}}</div> -->
                                                    <!-- <div class='date-info'>Date: {{Settlementdate}}</div> -->
                                                    <table class=''>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan='3'>
                                                                    <img class='settlement-logo' src='sainmarks.png'>
                                                                    <center><b>{{Clientname}}</b><br />
                                                                        {{ClientAddressLine1}}<br />
                                                                        {{ClientAddressLine2}}<br />
                                                                        {{ClientAddressLine3}}<br />
                                                                        {{ClientCity}}-{{ClientZipcode}}, {{ClientCountry}}
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan='3' align='center'>
                                                                    <h3 style='margin:5px 0'>Full & Final Settlement</h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan='3' align='center'>
                                                                    <table class='no-border'>
                                                                        <tr>
                                                                            <td>NAME : {{Employeename}}</td>
                                                                            <td>EMP NO : {{Employeeid}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>DEPT : {{EmpDepartment}}</td>
                                                                            <td>DESIGNATION : {{EmpDesignation}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>DOJ : {{Date_Of_Joing2}}</td>
                                                                            <td>DOL : {{ReleivingDate2}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>BASIC WAGES/ DAY : {{BasicDay}} </td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td style='background-color: #f5f5f5;font-weight: bold;'>
                                                                    TOTAL DAYS</td>
                                                                <td style='background-color: #f5f5f5;font-weight: bold;'>
                                                                    Amount</td>
                                                            </tr>
                                                            <tr>
                                                                <td>BONUS(B+DA)</td>
                                                                <td style='text-align:right'>{{BonusBasicDays}}</td>
                                                                <td style='text-align:right'>{{BonusBasicAmounts}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>EL</td>
                                                                <td style='text-align:right'>{{CausalBasicDays}}</td>
                                                                <td style='text-align:right'>{{CausalBasicAmounts}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>GRATUITY</td>
                                                                <td style='text-align:right'>{{GratuityBasicDays}}</td>
                                                                <td style='text-align:right'>{{GratuityBasicAmounts}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>GRAND TOTAL</td>
                                                                <td></td>
                                                                <td style='text-align:right'>{{Settlementtotal}}</td>
                                                            </tr>
                                                            <tr align='center' valign='bottom' style='height:100px;'>
                                                                <td>PREPARED BY</td>
                                                                <td>APPROVED BY</td>
                                                                <td>EMPLOYEE SIGN</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" ng-show="btndue_form">
                                    <h5 class="card-header text-green">No Due Form</h5>
                                    <div class="card-body">
                                        <a id="no_due_btn" class="btn btn-sm btn-info btn-nda-down"><i class="fa fa-download"></i>
                                            Download</a>
                                        <div class="card-body">

                                            <div id="nodueExport">

                                                <div class="input-group-append">
                                                    <p ng-click="FetchEmployee(Employeeid);" data-toggle="modal">

                                                    </p>
                                                </div>


                                                <style type='text/css'>
                                                    h1,
                                                    h2 {
                                                        text-align: center;
                                                    }

                                                    .edit_emp_data_box {
                                                        padding: 0px 50px;
                                                        font-size: 16px;
                                                        margin-top: 20px;
                                                    }

                                                    /*
                                            table.data-table,
                                            .data-table td,
                                            .data-table th {
                                                border: 1px solid;
                                                padding: 5px;
                                            }

                                            table.data-table {
                                                width: 100%;
                                                border-collapse: collapse;
                                            }

                                            .data-table-no-border {
                                                width: 100%;
                                                border-collapse: collapse;
                                            }

                                            .data-table-no-border td,
                                            .data-table-no-border th {
                                                padding: 5px;
                                            }

                                            .font15 {
                                                font-size: 15px;
                                            }*/
                                                </style>



                                                <div class="edit_emp_data_box">
                                                    <center><img class="exit-emp-logo" style="height: 80px;margin: 15px;" src='sainmarks.png'>
                                                    </center>
                                                    <h1 style="color:green;font-size: 20px;">BRITANNIA LABELS INDIA PVT LTD
                                                    </h1>
                                                    <br />
                                                    <h2 style="color:green;font-size: 20px;">No Dues Certificate</h2> <br />
                                                    <table class="table table-sm table-bordered">
                                                        <tr>
                                                            <td style="width:200px">Name of the employees:</td>
                                                            <td>{{Title}} {{Firstname}}{{Lastname}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Employees Code:</td>
                                                            <td>{{Employeeid}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Department:</td>
                                                            <td>{{EmpDepartment}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Designation:</td>
                                                            <td>{{EmpDesignation}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>D.O.J:</td>
                                                            <td>{{Date_Of_Joing}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>D.O.L:</td>
                                                            <td>{{ReleivingDate}}</td>
                                                        </tr>
                                                    </table>
                                                    <br />
                                                    <br />
                                                    <table class='table table-sm table-bordered'>
                                                        <tr class="text-center">
                                                            <td style="width: 20px;">S.No</td>
                                                            <td>Department</td>
                                                            <td style="width: 22%;">No Dues</td>
                                                            <td style="width: 22%;">Dues</td>
                                                            <td style="width: 22%;">Dept Head Sign</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:10px">1.</td>
                                                            <td>Production</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:10px">2.</td>
                                                            <td>HR & Admin.</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:10px">3.</td>
                                                            <td>Accounts </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:10px">4.</td>
                                                            <td>Marketing</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:10px">5.</td>
                                                            <td>Store</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:10px">6.</td>
                                                            <td>Company Property Returned</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </table>

                                                    </br></br>

                                                    <table class='w-100'>
                                                        <tr>
                                                            <td style="width:50%">Employee Signature<br /><br /></td>
                                                            <td style="width:50%;text-align: right;">HOD Signature<br /><br /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>_____________________________ </td>
                                                            <td style="text-align: right;">_____________________________</td>
                                                        </tr>
                                                    </table>

                                                    </br></br>

                                                    <table class='w-100'>
                                                        <tr>
                                                            <td style="width:50%;">HR & Admin.Signature<br /><br /></td>
                                                            <td style="width:50%;text-align: right;">Auth.Signatory Signature<br /><br /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>_____________________________ </td>
                                                            <td style="text-align: right;">_____________________________</td>
                                                        </tr>
                                                    </table>



                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </div>




                            </div>

                        </div>
                        <?php include '../HRM10/Empasset/Assetpopup.php' ?>
                        <?php include 'Relieving.php' ?>

                        <div class="modal" id="ModalCenter1Handover" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete
                                            {{HandNextno}}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger" role="alert">
                                            Are You sure want to delete this record?
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-rounded btn-danger" ng-click="DeleteHandover();"
                                            data-dismiss="modal">Delete</button>
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="ModalCenter1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            Deactivate {{Exitempid}}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger" role="alert">
                                            Are You sure want to DEACTIVE
                                            this Employee?
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-rounded btn-danger" ng-click="Deactive();"
                                            data-dismiss="modal">Yes</button>
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">No</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="ModalCenter1HandoverView" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Handover-
                                            Document
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <iframe ng-src="{{HandoverDocumentView}}"
                                                ng-hide="HandoverDocumentView == null || HandoverDocumentView == '' "
                                                ng-show="HandoverDocumentView != null "
                                                style="height:400px;width:100%"></iframe>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="ModalCenter1item" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            Delete {{HandoveritemNextno}}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger" role="alert">
                                            Are You sure want to delete this record?
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-rounded btn-danger" ng-click="DeleteHandoveritem();"
                                            data-dismiss="modal">Delete</button>
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="modal fade" id="ModalCenter1itemView" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Handover-
                                            Items
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <h5 class="modal-title">Distributed Image
                                            </h5>
                                            <iframe ng-src="{{HandoveritemView}}"
                                                ng-hide="HandoveritemView == null || HandoveritemView == '' "
                                                ng-show="HandoveritemView != null "
                                                style="height:400px;width:100%"></iframe>
                                        </div>
                                        <div class="row">
                                            <h5 class="modal-title">Handover Image
                                            </h5>
                                            <iframe ng-src="{{HandoveritemView2}}"
                                                ng-hide="HandoveritemView2 == null || HandoveritemView2 == '' "
                                                ng-show="HandoveritemView2 != null "
                                                style="height:400px;width:100%"></iframe>
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




                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <?php include '../footerjs.php' ?>
                </div>


                <script src="../Scripts/Controller/HRM27Controller.js"></script>
                <script type="text/javascript"></script>



                <script src="../Scripts/jspdf.min.js"></script>

                <script src="../assets/libs/js/html2canvas.min.js"></script>

                <script>
                    //////////////////////////////////////////////////////


                    function Validate(event) {
                        var regex = new RegExp("^[0-9-/()]");
                        var key = String.fromCharCode(event.charCode ? event
                            .which : event.charCode);
                        if (!regex.test(key)) {
                            event.preventDefault();
                            return false;
                        }
                    }
                </script>




                <script>
                    $(function() {
                        $("#edit_report_btn").click(function() {

                            var HTML_Width = $("#reportpdfExport").width();
                            var HTML_Height = $("#reportpdfExport").height();
                            var data = document.getElementById('reportpdfExport');
                            html2canvas(data, {
                                allowTaint: true,
                                scale: 3,
                                useCORS: true
                            }).then(canvas => {


                                var contentWidth = canvas.width;
                                var contentHeight = canvas.height;
                                //One page pdf shows the canvas height generated by html pages.
                                var pageHeight = contentWidth / 592.28 * 841.89;
                                //html page height without pdf generation
                                var leftHeight = contentHeight;
                                //Page offset
                                var position = 2;
                                //a4 paper size [595.28, 841.89], html page generated canvas in pdf picture width
                                var imgWidth = 595.28;
                                var imgHeight = 592.28 / contentWidth * contentHeight;
                                var pageData = canvas.toDataURL('image/jpeg', 1.0);
                                var pdf = new jsPDF('', 'pt', 'a4');
                                //There are two heights to distinguish, one is the actual height of the html page, and the page height of the generated pdf (841.89)
                                //When the content does not exceed the range of pdf page display, there is no need to paginate
                                if (leftHeight < pageHeight) {
                                    pdf.addImage(pageData, 'JPEG', 2, 2, imgWidth, imgHeight);
                                } else {
                                    while (leftHeight > 0) {
                                        pdf.addImage(pageData, 'jpg', 2, position, imgWidth,
                                            imgHeight)
                                        leftHeight -= pageHeight;
                                        position -= 841.89;
                                        //Avoid adding blank pages
                                        if (leftHeight > 0) {
                                            pdf.addPage();
                                        }
                                    }
                                }
                                // pdf.save('content.pdf');


                                window.open(pdf.output('bloburl', {
                                    filename: 'new-file.pdf'
                                }), '_blank');
                            });

                        });
                    });
                </script>





            </div>
        </div>
</body>

</html>