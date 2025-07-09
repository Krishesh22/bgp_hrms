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
    <title> Attendence P/A/L Details Fetch </title>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>

        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM28Controller">

            <div class="container-fluid dashboard-content">
                <div class="row col-lg-12">
                    <div class="card" style="width:100%">
                        <h5 class="card-header text-green">Attendence P/A/L Details</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">From Date</label>
                                    <input class="form-control" id="Fromdate" ng-model="Fromdate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                        >
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">To Date</label>
                                    <input class="form-control" id="Todate" ng-model="Todate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                        >
                                </div>
                               

                               
                                 
                              
                                <div class="form-group text-right mt-25">
                                    
                                   
                                        <button  class="btn btn-sm btn-success"  ng-click="FetchAttDetails();">
                                       Get Details</button>

                                    
                                   
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="alert alert-success" role="alert" ng-show="Message">
                        {{Message}}
                    </div>



                    <div class="card">
                        <h5 class="card-header text-green">Daily Attendance P/A/L Details</h5>
                        <div class="card-body">
                            <table class="table table-bordered  " style="width:100%">
                                <thead>
                                    <tr class="bg-green text-white">

                                        <th>#</th>
                                        <!-- <th scope="col">User ID</th> -->
                                        <th scope="col">Attendance Date</th>
                                        <th scope="col">Present</th>
                                        <th scope="col">Absent</th>
                                        <th scope="col">Leave</th>
                                        <th scope="col">Status</th>
                                       
                                    

                                    </tr>
                                </thead>


                                <tbody>
                                <tr>
                                                    <td colspan="2">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchAttendance.Attendencedate">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchAttendance.NoofPresent">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchAttendance.NoofAbsents">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchAttendance.Noofleave">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchAttendance.Empattendencestatus">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                  

                                                  

                                    <tr dir-paginate="e in GetAttDetailList|filter:searchAttendance |itemsPerPage:n"
                                        pagination-id="EmpAttendancegrid" current-page="currentPageEmpAttendance">




                                        <td style="width: 50px;">
                                            {{$index+1 + (currentPageEmpAttendance - 1) * pageSizeEmpAttendance}}
                                        </td>
                                        <!-- <td>{{e.Userid}}</td> -->
                                        <td>{{e.Attendencedate}}</td>
                                        <td>{{e.NoofPresent}}</td>
                                        <td>{{e.NoofAbsents}}</td>
                                        <td>{{e.Noofleave}}</td>
                                        <td>{{e.Empattendencestatus}}</td>
                                        
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
            <div class="modal fade" id="ModalCenter1DocumentView" tabindex="-1"
                     role="dialog" aria-labelledby="exampleModalCenterTitle"
                     aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header alert alert-danger">
                              <h5 class="modal-title" id="exampleModalLongTitle">Daily Attendance Document
                              </h5>
                              <button type="button" class="close" data-dismiss="modal"
                                 aria-label="Close">
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
        </div>
        
        <?php include '../footer.php'?>



    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM28Controller.js"></script>

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
    <title> Attendence P/A/L Details Fetch </title>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>

        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM28Controller">

            <div class="container-fluid dashboard-content">
                <div class="row col-lg-12">
                    <div class="card" style="width:100%">
                        <h5 class="card-header text-green">Attendence P/A/L Details</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">From Date</label>
                                    <input class="form-control" id="Fromdate" ng-model="Fromdate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                        >
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">To Date</label>
                                    <input class="form-control" id="Todate" ng-model="Todate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                        >
                                </div>
                               

                               
                                 
                              
                                <div class="form-group text-right mt-25">
                                    
                                   
                                        <button  class="btn btn-sm btn-success"  ng-click="FetchAttDetails();">
                                       Get Details</button>

                                    
                                   
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="alert alert-success" role="alert" ng-show="Message">
                        {{Message}}
                    </div>



                    <div class="card">
                        <h5 class="card-header text-green">Daily Attendance P/A/L Details</h5>
                        <div class="card-body">
                            <table class="table table-bordered  " style="width:100%">
                                <thead>
                                    <tr class="bg-green text-white">

                                        <th>#</th>
                                        <!-- <th scope="col">User ID</th> -->
                                        <th scope="col">Attendance Date</th>
                                        <th scope="col">Present</th>
                                        <th scope="col">Absent</th>
                                        <th scope="col">Leave</th>
                                        <th scope="col">Status</th>
                                       
                                    

                                    </tr>
                                </thead>


                                <tbody>
                                <tr>
                                                    <td colspan="2">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchAttendance.Attendencedate">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchAttendance.NoofPresent">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchAttendance.NoofAbsents">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchAttendance.Noofleave">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchAttendance.Empattendencestatus">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                  

                                                  

                                    <tr dir-paginate="e in GetAttDetailList|filter:searchAttendance |itemsPerPage:n"
                                        pagination-id="EmpAttendancegrid" current-page="currentPageEmpAttendance">




                                        <td style="width: 50px;">
                                            {{$index+1 + (currentPageEmpAttendance - 1) * pageSizeEmpAttendance}}
                                        </td>
                                        <!-- <td>{{e.Userid}}</td> -->
                                        <td>{{e.Attendencedate}}</td>
                                        <td>{{e.NoofPresent}}</td>
                                        <td>{{e.NoofAbsents}}</td>
                                        <td>{{e.Noofleave}}</td>
                                        <td>{{e.Empattendencestatus}}</td>
                                        
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
            <div class="modal fade" id="ModalCenter1DocumentView" tabindex="-1"
                     role="dialog" aria-labelledby="exampleModalCenterTitle"
                     aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header alert alert-danger">
                              <h5 class="modal-title" id="exampleModalLongTitle">Daily Attendance Document
                              </h5>
                              <button type="button" class="close" data-dismiss="modal"
                                 aria-label="Close">
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
        </div>
        
        <?php include '../footer.php'?>



    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/Controller/HRM28Controller.js"></script>

</body>

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>