<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Daily Attendence Report </title>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>

        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM42Controller">

            <div class="container-fluid dashboard-content">

            <div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
</div>
                <div class="row col-lg-12">
                    <div class="card">
                        <h5 class="card-header">Daily Attendance Detail Report</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label class="col-form-label">Attendance Date</label>
                                    <input type="text" class="form-control" ng-model="AttendanceDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                          >
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

                                 

                                    <button class="btn btn-sm btn-success" ng-click="GetAttendancedetails(AttendanceDate);"
                                      >Get Details</button>
                                 

                                 
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
                                            <tr >
                                                <th colspan="4"> Basic Information</th>
                                                <th colspan="7" > Actual Attendance</th>
                                                <th colspan="7" > Edited Attendance</th>
                                            </tr>
                                                <tr >
                                                    <!-- <th ng-show="btnOpen">Action</th> -->
                                                    <th class="sticky-col index-col">#</th>
                                                    <th class="sticky-col first-col">Empid</th>
                                                    <th class="sticky-col second-col">Empname</th>
                                                    <th scope="col">Status</th>
                                                    <th >In</th>
                                                    <th >Out</th>
                                                    <th >OT In</th>
                                                    <th>OT Out</th>
                                                    <th >Hrs</th>                                                  
                                                    <th >OT</th>
                                                    <th >LOP</th>
                                                    <th >In</th>
                                                    <th >Out</th>
                                                    <th >OT In</th>
                                                    <th >OT Out</th>
                                                    <th >Hrs</th>                                                  
                                                    <th>OT</th>
                                                    <th >LOP</th>
                                                  
                                     

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
                                                            ng-model="searchHoliday.ActualIntime">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.ActualOuttime">

                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.ActualOTIntime">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.ActualOTOuttime">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.Actualaudithrs">

                                                    </div>
                                                </td>
                                               
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.ActualOt_HRSNew">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchHoliday.Auctualaditlop">

                                                    </div>
                                                </td>

                                                 <!-- ///////////////Edited Atten Status -->
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
                                                            ng-model="searchHoliday.Lophrs">

                                                    </div>
                                                </td>




                                            </tr>
                                            <tbody>



                                                <tr dir-paginate="e in GetEmpDailyAttendanceList |filter:searchHoliday | itemsPerPage:10 | orderBy: 'Employeeid' track by $index  "
                                                    pagination-id="EmpAttendancegrid"
                                                    current-page="currentPageEmpAttendance" >


                                                    <td style="width: 25px;" >
                                                        {{$index+1 + (currentPageEmpAttendance - 1) * pageSizeEmpAttendance}}
                                                    </td>

                                                  
                                                    <td>{{e.Employeeid}}</td>
                                                    <td style="width:170px" >{{e.Title}}{{e.Firstname}} {{e.lastname}}
                                                    </td>
                                                    <td >{{e.AttenStatus}}</td>
                                                   <td class="tabletotalrow">{{e.ActualIntime}}</td>
                                                   <td class="tabletotalrow">{{e.ActualOuttime}}</td>
                                                   <td class="tabletotalrow">{{e.ActualOTIntime}}</td>
                                                   <td class="tabletotalrow">{{e.ActualOTOuttime}}</td>
                                                   <td class="tabletotalrow">{{e.Actualaudithrs}}</td>
                                                   <td class="tabletotalrow" ng-show="e.Type_Of_Posistion!='Category 3'">0.00</td>
                                                   <td class="tabletotalrow" ng-show="e.Type_Of_Posistion!='Category 3'">0.00</td>
                                                   <td class="tabletotalrow" ng-show="e.Type_Of_Posistion=='Category 3'">{{e.ActualOt_HRSNew}}</td>
                                                   <td class="tabletotalrow" ng-show="e.Type_Of_Posistion=='Category 3'">{{e.Auctualaditlop}}</td>
                                         
                                                   <td class="rowcoloreditmatched">{{e.Intime}}</td>
                                                   <td class="rowcoloreditmatched">{{e.Outtime}}</td>
                                                   <td class="rowcoloreditmatched">{{e.OTIntime}}</td>
                                                   <td class="rowcoloreditmatched">{{e.OTOuttime}}</td>
                                                   <td class="rowcoloreditmatched">{{e.Workinghours}}</td>
                                                   <td class="rowcoloreditmatched" ng-show="e.Type_Of_Posistion=='Category 3'">{{e.OT_HRS}}</td>
                                                   <td class="rowcoloreditmatched" ng-show="e.Type_Of_Posistion=='Category 3'">{{e.Lophrs}}</td>
                                                   <td class="tabletotalrow" ng-show="e.Type_Of_Posistion!='Category 3'">0.00</td>
                                                   <td class="tabletotalrow" ng-show="e.Type_Of_Posistion!='Category 3'">0.00</td>


                                                 
                                               





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

                    </div>
                </div>

            </div>
            <?php include '../footer.php'?>



        </div>

        <?php include '../footerjs.php'?>
        <script src="../Scripts/Controller/HRM42Controller.js"></script>
        <!-- <script src="../Scripts/Controller/HRMbreaktimeController.js"></script> -->

</body>

</html>