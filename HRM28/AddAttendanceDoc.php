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
    <title> Attendence Document Detail </title>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>

        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM28Controller">

            <div class="container-fluid dashboard-content">
                <div class="row ">
                    <div class="col-md-12" style="width:100%">
                        <h5 class="text-green">Attendence Document Detail</h5><hr>
                        <div class="">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Attendance Date</label>
                                    <input class="form-control" id="Attendencedate" ng-model="Attendencedate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                        >
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="col-form-label">Description</label>
                                    <input class="form-control" id="Description" ng-model="Description" >
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

                                <div class="form-group col-md-4">
                                   <label class="col-form-label">Document</label>
                                   <div class="input-group">
                                             <input type="file" class="form-control"
                                                ng-model="Document"
                                                id="Document"
                                                name=files[]
                                                accept="image/png, image/gif, image/jpeg,application/pdf">
                                                <div class="input-group-append">
                                                                                        <p id="AttDocumentButton"
                                                                                            class="input-group-text">
                                                                                            <i class="fa fa-upload"></i>
                                                                                        </p>
                                                                                    </div>
                                          </div>
                                        
                                     
                                 </div>
                                 
                              
                                <div class="form-group text-right mt-25">
                                   
                                        <button  class="btn btn-sm btn-success"  ng-click="UpdateAttDoc();"><i class="fa fa-save" 
                                             ></i>
                                        Update</button>

                                        <button  class="btn btn-sm btn-danger"  ng-click="ResetAttDoc();"><i class="fa fa-times" 
                                             ></i> Clear(Next)</button>
                                   
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="alert alert-success" role="alert" ng-show="Message">
                        {{Message}}
                    </div>



                    <div class="col-md-12">
                        <h5 class="text-green">Daily Attendance Document Detail</h5><hr>
                        <div class="">
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
                                                            <input type="text" class="form-control" placeholder="Search" 
                                                                ng-model="searchAttendance.Attendencedate">
                                                           
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Search"
                                                                ng-model="searchAttendance.Description">
                                                          
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Search"
                                                                ng-model="searchAttendance.Document">
                                                           
                                                        </div>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Search"
                                                                ng-model="searchAttendance.Status">
                                                            
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

                                                  

                                    <tr dir-paginate="e in GetEmpDailyAttendanceList2|filter:searchAttendance |itemsPerPage:n"
                                        pagination-id="EmpAttendancegrid" current-page="currentPageEmpAttendance">




                                        <td>
                                            {{$index+1 + (currentPageEmpAttendance - 1) * pageSizeEmpAttendance}}
                                        </td>
                                        <td>{{e.Attendencedate}}</td>
                                        <td>{{e.Description}}</td>
                                        <td>{{e.Document}}</td>
                                        <td>{{e.Status}}</td>
                                        <td>
                                          <div class="action-btn" >
                                         
                                                                                                        <img height="15" ng-show="e.Status=='Open'"
                                                                                                            ng-click="FetchDetails(e.Attendencedate);"
                                                                                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">

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
                           <div class="modal-header alert alert-info">
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
    <title> Attendence Document Detail </title>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>

        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM28Controller">

            <div class="container-fluid dashboard-content">
                <div class="row ">
                    <div class="col-md-12" style="width:100%">
                        <h5 class="text-green">Attendence Document Detail</h5><hr>
                        <div class="">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Attendance Date</label>
                                    <input class="form-control" id="Attendencedate" ng-model="Attendencedate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                        >
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="col-form-label">Description</label>
                                    <input class="form-control" id="Description" ng-model="Description" >
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

                                <div class="form-group col-md-4">
                                   <label class="col-form-label">Document</label>
                                   <div class="input-group">
                                             <input type="file" class="form-control"
                                                ng-model="Document"
                                                id="Document"
                                                name=files[]
                                                accept="image/png, image/gif, image/jpeg,application/pdf">
                                                <div class="input-group-append">
                                                                                        <p id="AttDocumentButton"
                                                                                            class="input-group-text">
                                                                                            <i class="fa fa-upload"></i>
                                                                                        </p>
                                                                                    </div>
                                          </div>
                                        
                                     
                                 </div>
                                 
                              
                                <div class="form-group text-right mt-25">
                                   
                                        <button  class="btn btn-sm btn-success"  ng-click="UpdateAttDoc();"><i class="fa fa-save" 
                                             ></i>
                                        Update</button>

                                        <button  class="btn btn-sm btn-danger"  ng-click="ResetAttDoc();"><i class="fa fa-times" 
                                             ></i> Clear(Next)</button>
                                   
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="alert alert-success" role="alert" ng-show="Message">
                        {{Message}}
                    </div>



                    <div class="col-md-12">
                        <h5 class="text-green">Daily Attendance Document Detail</h5><hr>
                        <div class="">
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
                                                            <input type="text" class="form-control" placeholder="Search" 
                                                                ng-model="searchAttendance.Attendencedate">
                                                           
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Search"
                                                                ng-model="searchAttendance.Description">
                                                          
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Search"
                                                                ng-model="searchAttendance.Document">
                                                           
                                                        </div>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Search"
                                                                ng-model="searchAttendance.Status">
                                                            
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

                                                  

                                    <tr dir-paginate="e in GetEmpDailyAttendanceList2|filter:searchAttendance |itemsPerPage:n"
                                        pagination-id="EmpAttendancegrid" current-page="currentPageEmpAttendance">




                                        <td>
                                            {{$index+1 + (currentPageEmpAttendance - 1) * pageSizeEmpAttendance}}
                                        </td>
                                        <td>{{e.Attendencedate}}</td>
                                        <td>{{e.Description}}</td>
                                        <td>{{e.Document}}</td>
                                        <td>{{e.Status}}</td>
                                        <td>
                                          <div class="action-btn" >
                                         
                                                                                                        <img height="15" ng-show="e.Status=='Open'"
                                                                                                            ng-click="FetchDetails(e.Attendencedate);"
                                                                                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">

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
                           <div class="modal-header alert alert-info">
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