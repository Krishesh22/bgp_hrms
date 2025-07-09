<<<<<<< HEAD
<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Daily Attendence Detail </title>
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
                        <h5 class="card-header">Daily Attendance Detail</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label class="col-form-label">Attendance Date</label>
                                    <input type="text" class="form-control" ng-model="AttendanceDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                        ng-model-options='{ debounce: 1500 }' ng-change="GetAttendanceDate();">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="col-form-label">Presents</label>
                                    <input type="text" class="form-control" ng-model="NoofPresents" autocomplete="off"
                                        readonly>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="col-form-label">Absents</label>
                                    <input type="text" class="form-control" ng-model="NoofAbsents" autocomplete="off"
                                        readonly>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="col-form-label">Leave</label>
                                    <input type="text" class="form-control" ng-model="NoofLeaves" autocomplete="off"
                                        readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="col-form-label">Employee</label>
                                    <input type="text" class="form-control" ng-model="NoofEmployee" autocomplete="off"
                                        readonly>
                                </div>

                                <div class="form-group col-md-1">
                                    <label class="col-form-label">Status</label>
                                    <input type="text" class="form-control" ng-model="Atendancestatus"
                                        autocomplete="off" readonly>
                                </div>


                                <div class="form-group text-right mt-25">

                                    <!-- <button class="btn btn-sm btn-success" ng-click="UpdateBank();">Intime
                                        Fetch</button> -->

                                    <button class="btn btn-sm btn-success" ng-click="DailyAttendanceSave();"
                                        ng-show="btnOpen">Get Attendence</button>
                                    <button class="btn btn-sm btn-success" ng-click="CloseAttendence();"
                                        ng-show="btnOpen">Close Attendence</button>

                                    <!-- 
                                    <button class="btn btn-sm btn-success" ng-click="SendMailToAdmin();">Mail <i
                                            class="fa fa-envelope"></i></button> -->
                                </div>

                                <div class="row">
                                    <span style="color:red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Note:Invalid or mismatched
                                        attendance will be highlighted in yellow color</span>


                                </div>



                            </div>



                        </div>



                        <div class="alert alert-success" role="alert" ng-show="Message">
                            {{Message}}
                        </div>


                        <div class="card">
                            <h5 class="card-header text-green">Employee Attendance Daily Detail</h5>
                            <div class="card-body" style="overflow-x:auto">
                                <div class="view">
                                    <div class="wrapper">
                                        <table class="table table-bordered  " style="width:100%;">
                                            <thead>
                                                <tr class="bg-green text-white">
                                                    <!-- <th ng-show="btnOpen">Action</th> -->
                                                    <th class="sticky-col index-col">#</th>
                                                    <th class="sticky-col first-col">Empid</th>
                                                    <th class="sticky-col second-col">Empname</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">In</th>
                                                    <th scope="col">Out</th>
                                                    <th scope="col">OT In</th>
                                                    <th scope="col">OT Out</th>
                                                    <th scope="col">Hrs</th>
                                                    <!-- <th scope="col" title="Actual Working Days">AW Days</th> -->
                                                    <th scope="col">OT</th>
                                                    <th scope="col" title="Actual OT Hrs">AW OT</th>


                                                </tr>
                                            </thead>

                                            <tr>

                                                <td colspan="2">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.Employeeid">

                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.Firstname">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.AttenStatus">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.Intime">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.Outtime">

                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.OTIntime">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.OTOuttime">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.Workinghours">

                                                    </div>
                                                </td>
                                            
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.OT_HRS">

                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.ActualOt_HRS">

                                                    </div>
                                                </td>
                                           



                                            </tr>
                                            <tbody>



                                                <tr dir-paginate="e in GetEmpDailyAttendanceList |filter:searchHoliday | itemsPerPage:10 | orderBy: 'Employeeid' track by $index  "
                                                    pagination-id="EmpAttendancegrid"
                                                    current-page="currentPageEmpAttendance"
                                                    ng-class="{ 'rowcolormissmatched': e.Mismatchedattendence === 'Yes','rowcoloreditmatched': e.OT_HRS >= 1.10,'rowcolorbreakmatched': e.Empbreakpunchfound === 'Yes'}">


                                                    <td style="width: 25px;"
                                                          >
                                                        {{$index+1 + (currentPageEmpAttendance - 1) * pageSizeEmpAttendance}}
                                                    </td>

                                                    <td ng-show="e.Enableresthours=='Yes'  "
                                                          >
                                                        {{e.Employeeid}}<img height="15"
                                                            ng-show=" e.Attentypestatus=='P'" data-toggle="modal"
                                                            data-target="#ModalbreaktimeValues"
                                                            ng-click="SendEdit02(e.Employeeid,e.Attendencedate);"
                                                            src="<?php echo "$domain"; ?>/assets/icons/clock.png"></td>
                                                    <td ng-show="e.Enableresthours!='Yes'"
                                                          >
                                                        {{e.Employeeid}}</td>
                                                    <!-- <td>{{e.Employeeid}}</td> -->
                                                    <td style="width:170px"
                                                          >
                                                        {{e.Title}}{{e.Firstname}} {{e.lastname}}
                                                    </td>
                                                    <td ng-show="btnClose">{{e.AttenStatus}}</td>

                                                    <td ng-show="btnOpen"
                                                          >


                                                        <select ng-model="e.AttenStatus" class="form-control"
                                                            style="width:70px;" ng-model-options='{ debounce: 1500 }'
                                                            ng-change="CalculateOTTimeBGP(e.Employeeid,e.Attendencedate,e.AttenStatus,e.Intime,e.Outtime,e.OTIntime,e.OTOuttime,e.Allowotyesorno,e.Permissionyesorno,$index)">
                                                            <option ng-repeat="X in GetAttenstatusmasterDelhiList "
                                                                value="{{X.AttenStatus}}">
                                                                {{X.AttenStatus}}
                                                            </option>
                                                        </select>

                                                    </td>
                                                    <td ng-show="btnClose">{{e.Intime}}</td>

                                                    <td ng-show="btnOpen"
                                                          ><input
                                                            class="form-control" onfocus="(this.type='time')" step="2"
                                                            onblur="(this.type='text')" ng-model="e.Intime"
                                                            placeholder="HH:mm:ss" style="width:120px;"
                                                            ng-model-options='{ debounce: 1500 }'
                                                            ng-change="CalculateOTTimeBGP(e.Employeeid,e.Attendencedate,e.AttenStatus,e.Intime,e.Outtime,e.OTIntime,e.OTOuttime,e.Allowotyesorno,e.Permissionyesorno,$index,'1')" />
                                                        <p ng-bind-html="e.EmpbreakinNotes"></p>


                                                    </td>
                                                    <td ng-show="btnClose">{{e.Outtime}}</td>
                                                    <td ng-show="btnOpen"
                                                          >
                                                        <input class="form-control" onfocus="(this.type='time')"
                                                            step="2" onblur="(this.type='text')" ng-model="e.Outtime"
                                                            placeholder="HH:mm:ss" style="width:120px;"
                                                            ng-model-options='{ debounce: 1500 }'
                                                            ng-change="CalculateOTTimeBGP(e.Employeeid,e.Attendencedate,e.AttenStatus,e.Intime,e.Outtime,e.OTIntime,e.OTOuttime,e.Allowotyesorno,e.Permissionyesorno,$index,'2')" />
                                                        <p ng-bind-html="e.EmpbreakoutNotes"></p>

                                                    </td>
                                                    <td ng-show="btnClose">{{e.OTIntime}}</td>
                                                    <td ng-show="btnOpen"
                                                          >
                                                        <input class="form-control" onfocus="(this.type='time')"
                                                            step="2" onblur="(this.type='text')" ng-model="e.OTIntime"
                                                            placeholder="HH:mm:ss" style="width:120px;"
                                                            ng-model-options='{ debounce:1500 }'
                                                            ng-change="CalculateOTTimeBGP(e.Employeeid,e.Attendencedate,e.AttenStatus,e.Intime,e.Outtime,e.OTIntime,e.OTOuttime,e.Allowotyesorno,e.Permissionyesorno,$index,'3')" />
                                                    </td>
                                                    <td ng-show="btnClose">{{e.OTOuttime}}</td>
                                                    <td ng-show="btnOpen"
                                                          >
                                                        <input class="form-control" onfocus="(this.type='time')"
                                                            step="2" onblur="(this.type='text')" ng-model="e.OTOuttime"
                                                            placeholder="HH:mm:ss" style="width:120px;"
                                                            ng-model-options='{ debounce: 1500 }'
                                                            ng-change="CalculateOTTimeBGP(e.Employeeid,e.Attendencedate,e.AttenStatus,e.Intime,e.Outtime,e.OTIntime,e.OTOuttime,e.Allowotyesorno,e.Permissionyesorno,$index,'4')" />
                                                    </td>

                                                    <td   >
                                                        {{e.Workinghours}}</td>
                                                    <!-- <td>{{e.Actualworkinghours}}</td> -->
                                                    <td   >{{e.OT_HRS}}
                                                    </td>
                                                    <td   >
                                                        {{e.ActualOt_HRS}}</td>

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
                            </div>
                        </div>


                        <div class="modal fade" id="ModalbreaktimeValues" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Attendence Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="alert alert-danger">
                                            <div class="row">

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Employee ID</label>
                                                    <input type="text" class="form-control" id="Employeeid"
                                                        ng-model="Employeeid" autocomplete="off" readonly>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Employee Name</label>
                                                    <input class="form-control" ng-model="Fullname" readonly />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Department</label>
                                                    <input class="form-control" ng-model="Fullname" readonly />
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">S.No</label>
                                                    <input type="text" class="form-control" id="breaksno"
                                                        ng-model="breaksno" autocomplete="off" readonly>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Attendance Date</label>
                                                    <input class="form-control" ng-model="AttendanceDate" readonly />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Attendance Status</label>
                                                    <input class="form-control" ng-model="Atendancestatus" readonly />
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Break In </label>
                                                    <input class="form-control" onfocus="(this.type='time')" step="2"
                                                        onblur="(this.type='text')" ng-model="BreakIntime"
                                                        placeholder="HH:mm:ss" ng-model-options='{ debounce: 1500 }'
                                                        ng-change="GetDurationInHours(BreakIntime,BreakOuttime,AttendanceDate,Employeeid);" />
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Break Out</label>
                                                    <input class="form-control" onfocus="(this.type='time')" step="2"
                                                        onblur="(this.type='text')" ng-model="BreakOuttime"
                                                        placeholder="HH:mm:ss" ng-model-options='{ debounce: 1500 }'
                                                        ng-change="GetDurationOutHours(BreakIntime,BreakOuttime,AttendanceDate,Employeeid);" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Duration</label>
                                                    <input class="form-control" ng-model="Takenbreakhours" readonly />
                                                </div>

                                            </div>
                                            <div class="row">


                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Notes</label>
                                                    <input class="form-control" ng-model="Notes" />
                                                </div>

                                            </div>
                                            <div class="alert alert-success" role="alert" ng-show="Message">
                                                {{Message}}
                                            </div>
                                            <div class="row">
                                                <div class="form-group text-right">
                                                    <button class="btn btn-rounded btn-success"
                                                        ng-click="UpdateBreaktime();">
                                                        <i class="fa fa-save"></i> Save </button>
                                                    <button class="btn btn-rounded btn-danger"
                                                        ng-click="Resetbreakdetail();">
                                                        <i class="fa fa-times"></i> Clear(Next) </button>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered  table-sm table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th scope="col">In</th>
                                                                <th scope="col">Out</th>
                                                                <th scope="col">Duration</th>
                                                                <th scope="col">Notes</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr dir-paginate="e in GetBreakList|filter:searchEducation|itemsPerPage:5 "
                                                                pagination-id="Educationgrid"
                                                                current-page="currentPagebreak">
                                                                <td style="width: 50px;">
                                                                    {{$index+1 + (currentPagebreak - 1) * pageSizebreak}}
                                                                </td>
                                                                <td>{{e.BreakIntime}}</td>
                                                                <td>{{e.BreakOuttime}}</td>
                                                                <td>{{e.Takenbreakhours}}</td>
                                                                <td>{{e.Notes}}</td>
                                                                <td>
                                                                    <div class="action-btn">
                                                                        <img height="15" data-toggle="modal"
                                                                            data-target="#ModalCenter1DeleteBreak"
                                                                            ng-click="FetchBreakTime(e.Employeeid,e.Sno,e.Attendencedate);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                        <!-- <img height="15"
                                                                            ng-click="FetchBreakTime(e.Employeeid,e.Sno,e.Attendencedate);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png"> -->

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="pagination">
                                                    <dir-pagination-controls pagination-id="Educationgrid" max-size="3"
                                                        direction-links="true" boundary-links="true" class="pagination">
                                                    </dir-pagination-controls>
                                                </div>
                                            </div>







                                        </div>

                                    </div>
                                    <div class="modal-footer">


                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="ModalUpdateValues" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Attendence Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="alert alert-danger" role="alert">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Employee ID</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="Employeeid" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Employee Name</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="Fullname" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Attendence Status</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <select class="form-control" ng-model="AttenStatus"
                                                        ng-model-options='{ debounce: 1500 }'
                                                        ng-change="CalculateOTTime(Employeeid,Attendencedate,AttenStatus,Intime,Outtime,OTIntime,OTOuttime,Allowotyesorno,Permissionyesorno)">
                                                        <option Value="P">Present
                                                        </option>
                                                        <option value="L">Leave
                                                        </option>
                                                        <option value="A">Absent
                                                        </option>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">In Time</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" onfocus="(this.type='time')" step="2"
                                                        onblur="(this.type='text')" ng-model="Intime"
                                                        placeholder="HH:mm:ss" ng-model-options='{ debounce: 1500 }'
                                                        ng-change="CalculateOTTime(Employeeid,Attendencedate,AttenStatus,Intime,Outtime,OTIntime,OTOuttime,Allowotyesorno,Permissionyesorno)" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Out Time</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" onfocus="(this.type='time')" step="2"
                                                        onblur="(this.type='text')" ng-model="Outtime"
                                                        placeholder="HH:mm:ss" ng-model-options='{ debounce: 1500 }'
                                                        ng-change="CalculateOTTime(Employeeid,Attendencedate,AttenStatus,Intime,Outtime,OTIntime,OTOuttime,Allowotyesorno,Permissionyesorno)" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">OT Intime</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" onfocus="(this.type='time')" step="2"
                                                        onblur="(this.type='text')" ng-model="OTIntime"
                                                        placeholder="HH:mm:ss" ng-model-options='{ debounce: 1500 }'
                                                        ng-change="CalculateOTTime(Employeeid,Attendencedate,AttenStatus,Intime,Outtime,OTIntime,OTOuttime,Allowotyesorno,Permissionyesorno)" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">OT Outtime</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" onfocus="(this.type='time')" step="2"
                                                        onblur="(this.type='text')" ng-model="OTOuttime"
                                                        placeholder="HH:mm:ss" ng-model-options='{ debounce: 1000 }'
                                                        ng-change="CalculateOTTime(Employeeid,Attendencedate,AttenStatus,Intime,Outtime,OTIntime,OTOuttime,Allowotyesorno,Permissionyesorno)" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Working Hours</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="Workinghours" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Actual Working Hrs</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="ActualOt_HRS" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">OT</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="OT_HRS" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Actual OT</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="ActualOt_HRS" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Working Days</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="Workingdays" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">OT Available</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="Allowotyesorno" readonly />
                                                </div>
                                            </div>






                                        </div>

                                    </div>
                                    <div class="modal-footer">


                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade emp-modal" id="ModalCenter1DeleteBreak" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-info">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            Delete {{breaksno}}
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
                                        <button class="btn btn-rounded btn-danger" ng-click="DeleteBreak();"
                                            data-dismiss="modal">Delete</button>
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
        <script src="../Scripts/Controller/HRM16Controller.js"></script>
        <!-- <script src="../Scripts/Controller/HRMbreaktimeController.js"></script> -->

</body>

=======
<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Daily Attendence Detail </title>
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
                        <h5 class="card-header">Daily Attendance Detail</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label class="col-form-label">Attendance Date</label>
                                    <input type="text" class="form-control" ng-model="AttendanceDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                        ng-model-options='{ debounce: 1500 }' ng-change="GetAttendanceDate();">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="col-form-label">Presents</label>
                                    <input type="text" class="form-control" ng-model="NoofPresents" autocomplete="off"
                                        readonly>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="col-form-label">Absents</label>
                                    <input type="text" class="form-control" ng-model="NoofAbsents" autocomplete="off"
                                        readonly>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="col-form-label">Leave</label>
                                    <input type="text" class="form-control" ng-model="NoofLeaves" autocomplete="off"
                                        readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="col-form-label">Employee</label>
                                    <input type="text" class="form-control" ng-model="NoofEmployee" autocomplete="off"
                                        readonly>
                                </div>

                                <div class="form-group col-md-1">
                                    <label class="col-form-label">Status</label>
                                    <input type="text" class="form-control" ng-model="Atendancestatus"
                                        autocomplete="off" readonly>
                                </div>


                                <div class="form-group text-right mt-25">

                                    <!-- <button class="btn btn-sm btn-success" ng-click="UpdateBank();">Intime
                                        Fetch</button> -->

                                    <button class="btn btn-sm btn-success" ng-click="DailyAttendanceSave();"
                                        ng-show="btnOpen">Get Attendence</button>
                                    <button class="btn btn-sm btn-success" ng-click="CloseAttendence();"
                                        ng-show="btnOpen">Close Attendence</button>

                                    <!-- 
                                    <button class="btn btn-sm btn-success" ng-click="SendMailToAdmin();">Mail <i
                                            class="fa fa-envelope"></i></button> -->
                                </div>

                                <div class="row">
                                    <span style="color:red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Note:Invalid or mismatched
                                        attendance will be highlighted in yellow color</span>


                                </div>



                            </div>



                        </div>



                        <div class="alert alert-success" role="alert" ng-show="Message">
                            {{Message}}
                        </div>


                        <div class="card">
                            <h5 class="card-header text-green">Employee Attendance Daily Detail</h5>
                            <div class="card-body" style="overflow-x:auto">
                                <div class="view">
                                    <div class="wrapper">
                                        <table class="table table-bordered  " style="width:100%;">
                                            <thead>
                                                <tr class="bg-green text-white">
                                                    <!-- <th ng-show="btnOpen">Action</th> -->
                                                    <th class="sticky-col index-col">#</th>
                                                    <th class="sticky-col first-col">Empid</th>
                                                    <th class="sticky-col second-col">Empname</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">In</th>
                                                    <th scope="col">Out</th>
                                                    <th scope="col">OT In</th>
                                                    <th scope="col">OT Out</th>
                                                    <th scope="col">Hrs</th>
                                                    <!-- <th scope="col" title="Actual Working Days">AW Days</th> -->
                                                    <th scope="col">OT</th>
                                                    <th scope="col" title="Actual OT Hrs">AW OT</th>


                                                </tr>
                                            </thead>

                                            <tr>

                                                <td colspan="2">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.Employeeid">

                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.Firstname">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.AttenStatus">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.Intime">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.Outtime">

                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.OTIntime">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.OTOuttime">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.Workinghours">

                                                    </div>
                                                </td>
                                            
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.OT_HRS">

                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.ActualOt_HRS">

                                                    </div>
                                                </td>
                                           



                                            </tr>
                                            <tbody>



                                                <tr dir-paginate="e in GetEmpDailyAttendanceList |filter:searchHoliday | itemsPerPage:10 | orderBy: 'Employeeid' track by $index  "
                                                    pagination-id="EmpAttendancegrid"
                                                    current-page="currentPageEmpAttendance"
                                                    ng-class="{ 'rowcolormissmatched': e.Mismatchedattendence === 'Yes','rowcoloreditmatched': e.OT_HRS >= 1.10,'rowcolorbreakmatched': e.Empbreakpunchfound === 'Yes'}">


                                                    <td style="width: 25px;"
                                                          >
                                                        {{$index+1 + (currentPageEmpAttendance - 1) * pageSizeEmpAttendance}}
                                                    </td>

                                                    <td ng-show="e.Enableresthours=='Yes'  "
                                                          >
                                                        {{e.Employeeid}}<img height="15"
                                                            ng-show=" e.Attentypestatus=='P'" data-toggle="modal"
                                                            data-target="#ModalbreaktimeValues"
                                                            ng-click="SendEdit02(e.Employeeid,e.Attendencedate);"
                                                            src="<?php echo "$domain"; ?>/assets/icons/clock.png"></td>
                                                    <td ng-show="e.Enableresthours!='Yes'"
                                                          >
                                                        {{e.Employeeid}}</td>
                                                    <!-- <td>{{e.Employeeid}}</td> -->
                                                    <td style="width:170px"
                                                          >
                                                        {{e.Title}}{{e.Firstname}} {{e.lastname}}
                                                    </td>
                                                    <td ng-show="btnClose">{{e.AttenStatus}}</td>

                                                    <td ng-show="btnOpen"
                                                          >


                                                        <select ng-model="e.AttenStatus" class="form-control"
                                                            style="width:70px;" ng-model-options='{ debounce: 1500 }'
                                                            ng-change="CalculateOTTimeBGP(e.Employeeid,e.Attendencedate,e.AttenStatus,e.Intime,e.Outtime,e.OTIntime,e.OTOuttime,e.Allowotyesorno,e.Permissionyesorno,$index)">
                                                            <option ng-repeat="X in GetAttenstatusmasterDelhiList "
                                                                value="{{X.AttenStatus}}">
                                                                {{X.AttenStatus}}
                                                            </option>
                                                        </select>

                                                    </td>
                                                    <td ng-show="btnClose">{{e.Intime}}</td>

                                                    <td ng-show="btnOpen"
                                                          ><input
                                                            class="form-control" onfocus="(this.type='time')" step="2"
                                                            onblur="(this.type='text')" ng-model="e.Intime"
                                                            placeholder="HH:mm:ss" style="width:120px;"
                                                            ng-model-options='{ debounce: 1500 }'
                                                            ng-change="CalculateOTTimeBGP(e.Employeeid,e.Attendencedate,e.AttenStatus,e.Intime,e.Outtime,e.OTIntime,e.OTOuttime,e.Allowotyesorno,e.Permissionyesorno,$index,'1')" />
                                                        <p ng-bind-html="e.EmpbreakinNotes"></p>


                                                    </td>
                                                    <td ng-show="btnClose">{{e.Outtime}}</td>
                                                    <td ng-show="btnOpen"
                                                          >
                                                        <input class="form-control" onfocus="(this.type='time')"
                                                            step="2" onblur="(this.type='text')" ng-model="e.Outtime"
                                                            placeholder="HH:mm:ss" style="width:120px;"
                                                            ng-model-options='{ debounce: 1500 }'
                                                            ng-change="CalculateOTTimeBGP(e.Employeeid,e.Attendencedate,e.AttenStatus,e.Intime,e.Outtime,e.OTIntime,e.OTOuttime,e.Allowotyesorno,e.Permissionyesorno,$index,'2')" />
                                                        <p ng-bind-html="e.EmpbreakoutNotes"></p>

                                                    </td>
                                                    <td ng-show="btnClose">{{e.OTIntime}}</td>
                                                    <td ng-show="btnOpen"
                                                          >
                                                        <input class="form-control" onfocus="(this.type='time')"
                                                            step="2" onblur="(this.type='text')" ng-model="e.OTIntime"
                                                            placeholder="HH:mm:ss" style="width:120px;"
                                                            ng-model-options='{ debounce:1500 }'
                                                            ng-change="CalculateOTTimeBGP(e.Employeeid,e.Attendencedate,e.AttenStatus,e.Intime,e.Outtime,e.OTIntime,e.OTOuttime,e.Allowotyesorno,e.Permissionyesorno,$index,'3')" />
                                                    </td>
                                                    <td ng-show="btnClose">{{e.OTOuttime}}</td>
                                                    <td ng-show="btnOpen"
                                                          >
                                                        <input class="form-control" onfocus="(this.type='time')"
                                                            step="2" onblur="(this.type='text')" ng-model="e.OTOuttime"
                                                            placeholder="HH:mm:ss" style="width:120px;"
                                                            ng-model-options='{ debounce: 1500 }'
                                                            ng-change="CalculateOTTimeBGP(e.Employeeid,e.Attendencedate,e.AttenStatus,e.Intime,e.Outtime,e.OTIntime,e.OTOuttime,e.Allowotyesorno,e.Permissionyesorno,$index,'4')" />
                                                    </td>

                                                    <td   >
                                                        {{e.Workinghours}}</td>
                                                    <!-- <td>{{e.Actualworkinghours}}</td> -->
                                                    <td   >{{e.OT_HRS}}
                                                    </td>
                                                    <td   >
                                                        {{e.ActualOt_HRS}}</td>

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
                            </div>
                        </div>


                        <div class="modal fade" id="ModalbreaktimeValues" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Attendence Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="alert alert-danger">
                                            <div class="row">

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Employee ID</label>
                                                    <input type="text" class="form-control" id="Employeeid"
                                                        ng-model="Employeeid" autocomplete="off" readonly>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Employee Name</label>
                                                    <input class="form-control" ng-model="Fullname" readonly />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Department</label>
                                                    <input class="form-control" ng-model="Fullname" readonly />
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">S.No</label>
                                                    <input type="text" class="form-control" id="breaksno"
                                                        ng-model="breaksno" autocomplete="off" readonly>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Attendance Date</label>
                                                    <input class="form-control" ng-model="AttendanceDate" readonly />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Attendance Status</label>
                                                    <input class="form-control" ng-model="Atendancestatus" readonly />
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Break In </label>
                                                    <input class="form-control" onfocus="(this.type='time')" step="2"
                                                        onblur="(this.type='text')" ng-model="BreakIntime"
                                                        placeholder="HH:mm:ss" ng-model-options='{ debounce: 1500 }'
                                                        ng-change="GetDurationInHours(BreakIntime,BreakOuttime,AttendanceDate,Employeeid);" />
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Break Out</label>
                                                    <input class="form-control" onfocus="(this.type='time')" step="2"
                                                        onblur="(this.type='text')" ng-model="BreakOuttime"
                                                        placeholder="HH:mm:ss" ng-model-options='{ debounce: 1500 }'
                                                        ng-change="GetDurationOutHours(BreakIntime,BreakOuttime,AttendanceDate,Employeeid);" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Duration</label>
                                                    <input class="form-control" ng-model="Takenbreakhours" readonly />
                                                </div>

                                            </div>
                                            <div class="row">


                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Notes</label>
                                                    <input class="form-control" ng-model="Notes" />
                                                </div>

                                            </div>
                                            <div class="alert alert-success" role="alert" ng-show="Message">
                                                {{Message}}
                                            </div>
                                            <div class="row">
                                                <div class="form-group text-right">
                                                    <button class="btn btn-rounded btn-success"
                                                        ng-click="UpdateBreaktime();">
                                                        <i class="fa fa-save"></i> Save </button>
                                                    <button class="btn btn-rounded btn-danger"
                                                        ng-click="Resetbreakdetail();">
                                                        <i class="fa fa-times"></i> Clear(Next) </button>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered  table-sm table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th scope="col">In</th>
                                                                <th scope="col">Out</th>
                                                                <th scope="col">Duration</th>
                                                                <th scope="col">Notes</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr dir-paginate="e in GetBreakList|filter:searchEducation|itemsPerPage:5 "
                                                                pagination-id="Educationgrid"
                                                                current-page="currentPagebreak">
                                                                <td style="width: 50px;">
                                                                    {{$index+1 + (currentPagebreak - 1) * pageSizebreak}}
                                                                </td>
                                                                <td>{{e.BreakIntime}}</td>
                                                                <td>{{e.BreakOuttime}}</td>
                                                                <td>{{e.Takenbreakhours}}</td>
                                                                <td>{{e.Notes}}</td>
                                                                <td>
                                                                    <div class="action-btn">
                                                                        <img height="15" data-toggle="modal"
                                                                            data-target="#ModalCenter1DeleteBreak"
                                                                            ng-click="FetchBreakTime(e.Employeeid,e.Sno,e.Attendencedate);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                        <!-- <img height="15"
                                                                            ng-click="FetchBreakTime(e.Employeeid,e.Sno,e.Attendencedate);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png"> -->

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="pagination">
                                                    <dir-pagination-controls pagination-id="Educationgrid" max-size="3"
                                                        direction-links="true" boundary-links="true" class="pagination">
                                                    </dir-pagination-controls>
                                                </div>
                                            </div>







                                        </div>

                                    </div>
                                    <div class="modal-footer">


                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="ModalUpdateValues" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Attendence Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="alert alert-danger" role="alert">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Employee ID</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="Employeeid" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Employee Name</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="Fullname" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Attendence Status</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <select class="form-control" ng-model="AttenStatus"
                                                        ng-model-options='{ debounce: 1500 }'
                                                        ng-change="CalculateOTTime(Employeeid,Attendencedate,AttenStatus,Intime,Outtime,OTIntime,OTOuttime,Allowotyesorno,Permissionyesorno)">
                                                        <option Value="P">Present
                                                        </option>
                                                        <option value="L">Leave
                                                        </option>
                                                        <option value="A">Absent
                                                        </option>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">In Time</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" onfocus="(this.type='time')" step="2"
                                                        onblur="(this.type='text')" ng-model="Intime"
                                                        placeholder="HH:mm:ss" ng-model-options='{ debounce: 1500 }'
                                                        ng-change="CalculateOTTime(Employeeid,Attendencedate,AttenStatus,Intime,Outtime,OTIntime,OTOuttime,Allowotyesorno,Permissionyesorno)" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Out Time</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" onfocus="(this.type='time')" step="2"
                                                        onblur="(this.type='text')" ng-model="Outtime"
                                                        placeholder="HH:mm:ss" ng-model-options='{ debounce: 1500 }'
                                                        ng-change="CalculateOTTime(Employeeid,Attendencedate,AttenStatus,Intime,Outtime,OTIntime,OTOuttime,Allowotyesorno,Permissionyesorno)" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">OT Intime</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" onfocus="(this.type='time')" step="2"
                                                        onblur="(this.type='text')" ng-model="OTIntime"
                                                        placeholder="HH:mm:ss" ng-model-options='{ debounce: 1500 }'
                                                        ng-change="CalculateOTTime(Employeeid,Attendencedate,AttenStatus,Intime,Outtime,OTIntime,OTOuttime,Allowotyesorno,Permissionyesorno)" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">OT Outtime</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" onfocus="(this.type='time')" step="2"
                                                        onblur="(this.type='text')" ng-model="OTOuttime"
                                                        placeholder="HH:mm:ss" ng-model-options='{ debounce: 1000 }'
                                                        ng-change="CalculateOTTime(Employeeid,Attendencedate,AttenStatus,Intime,Outtime,OTIntime,OTOuttime,Allowotyesorno,Permissionyesorno)" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Working Hours</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="Workinghours" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Actual Working Hrs</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="ActualOt_HRS" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">OT</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="OT_HRS" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Actual OT</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="ActualOt_HRS" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">Working Days</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="Workingdays" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <label class="col-form-label">OT Available</label>
                                                </div>
                                                <div class="col-lg-7 nopadding">
                                                    <input class="form-control" ng-model="Allowotyesorno" readonly />
                                                </div>
                                            </div>






                                        </div>

                                    </div>
                                    <div class="modal-footer">


                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade emp-modal" id="ModalCenter1DeleteBreak" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-info">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            Delete {{breaksno}}
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
                                        <button class="btn btn-rounded btn-danger" ng-click="DeleteBreak();"
                                            data-dismiss="modal">Delete</button>
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
        <script src="../Scripts/Controller/HRM16Controller.js"></script>
        <!-- <script src="../Scripts/Controller/HRMbreaktimeController.js"></script> -->

</body>

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>