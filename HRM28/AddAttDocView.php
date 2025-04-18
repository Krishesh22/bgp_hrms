<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title> Attendence Document Detail Fetch </title>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>

        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM28Controller">

            <div class="container-fluid dashboard-content">
                <div class="row col-lg-12">
                    <div class="card" style="width:100%">
                        <h5 class="card-header text-green">Attendence Document Fetch</h5>
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
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Status</label>
                                    <select class="form-control" id="Status"  ng-model="Status">
                                        <option Value="Open">Open
                                        </option>
                                        <option value="Close">Close
                                        </option>
                                        <option value="Cancel">Cancel
                                        </option>


                                    </select>
                                </div>

                               
                                 
                              
                                <div class="form-group text-right mt-25">
                                    
                                   
                                        <button  class="btn btn-sm btn-success"  ng-click="FetchAttDoc();">
                                        Fetch Details</button>

                                    
                                   
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="alert alert-success" role="alert" ng-show="Message">
                        {{Message}}
                    </div>



                    <div class="card">
                        <h5 class="card-header text-green">Daily Attendance Document Detail</h5>
                        <div class="card-body">
                            <table class="table table-bordered  " style="width:100%">
                                <thead>
                                    <tr class="bg-green text-white">

                                        <th>#</th>
                                        <!-- <th scope="col">User ID</th> -->
                                        <th scope="col">Attendance Date</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Document</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                       
                                    

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
                                                                ng-model="searchAttendance.Description">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchAttendance.Document">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchAttendance.Status">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                    <!-- <td >
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchAttendance.Outtime">
                                                            <div class="input-group-append"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-search"></i></span></div>
                                                        </div>
                                                    </td>
                                                   -->

                                                  

                                    <tr dir-paginate="e in GetAttDocList|filter:searchAttendance |itemsPerPage:n"
                                        pagination-id="EmpAttendancegrid" current-page="currentPageEmpAttendance">




                                        <td style="width: 50px;">
                                            {{$index+1 + (currentPageEmpAttendance - 1) * pageSizeEmpAttendance}}
                                        </td>
                                        <!-- <td>{{e.Userid}}</td> -->
                                        <td>{{e.Attendencedate}}</td>
                                        <td>{{e.Description}}</td>
                                        <td>{{e.Document}}</td>
                                        <td>{{e.Status}}</td>
                                        <td>
                                          <div class="action-btn">
                                         

                                                                                                        <img height="15"
                                                                                                            data-toggle="modal"
                                                                                                            data-target="#ModalCenter1DocumentView"
                                                                                                            ng-click="FetchDetails(e.Attendencedate);"
                                                                                                            src="<?php echo "$domain"; ?>/assets/icons/view.png">
                                            </div>
                                       </td>
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

</html>