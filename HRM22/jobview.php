<<<<<<< HEAD
<?php include '../config.php' ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php' ?>
    <title>Application Master</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php' ?>
        <?php include '../Sidebarin.php' ?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM22Controller">
            <div class="container-fluid dashboard-content">
                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="">
                                <h5 class="text-green">Application Details
                                </h5>
                                <hr/>
                                <div class="">

                                    <div class="table-responsive">
                                        <table class="table table-bordered  table-sm ">
                                            <thead>
                                                <tr>

                                                    <th>No</th>
                                                    <th scope="col" style="width: 100px;">
                                                        Application_ID</th>
                                                    <th scope="col" style="width: 200px;">Name</th>
                                                    <th scope="col" style="width: 90px;">Gender</th>
                                                    <th scope="col">Contactno</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Qualification</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Mobile</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Applicationid">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Fullname">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Gender">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Contactno">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Type_Of_Posistion">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.HighestQualification">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Selectionstatus">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>
                                                    </td>





                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr dir-paginate="e in GetApplicationList |filter:searchApplication|itemsPerPage:10 "
                                                    pagination-id="Applicationgrid"
                                                    current-page="currentPageApplication">




                                                    <td style="width: 50px;">
                                                        {{$index+1 + (currentPageApplication - 1) * pageSizeApplication}}
                                                    </td>

                                                    <td>{{e.Applicationid}}</td>
                                                    <td>{{e.Title}} {{e.Fullname}}</td>
                                                    <td>{{e.Gender}}</td>
                                                    <td>{{e.Contactno}}</td>
                                                    <td>{{e.Type_Of_Posistion}}</td>
                                                    <td>{{e.HighestQualification}}</td>
                                                    <td>{{e.Selectionstatus}}</td>
                                                    <td ng-show="e.Smsverified=='Yes'">
                                                        <img height="15"
                                                            src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                                    </td>
                                                    <td ng-show="e.Smsverified!='Yes'">
                                                        <img height="15"
                                                            src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                                    </td>
                                                    <td ng-show="e.Emailverified=='Yes'">
                                                        <img height="15"
                                                            src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                                    </td>
                                                    <td ng-show="e.Emailverified!='Yes'">
                                                        <img height="15"
                                                            src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                                    </td>
                                                    <td>
                                                        <div class="action-btn">
                                                            <img height="15" ng-click="SendEdit(e.Applicationid);"
                                                                src="<?php echo "$domain"; ?>/assets/icons/edit.png">

                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>



                                    </div>

                                    <div class="float-right mt-2">
                                        <div class="pagination">
                                            <dir-pagination-controls pagination-id="Applicationgrid" max-size="3"
                                                direction-links="true" boundary-links="true" class="pagination">
                                            </dir-pagination-controls>
                                        </div>
                                    </div>


                                </div>
                            </div>




                        </div>
                        <div class="carousel-item">

                            <div class="">
                                <div class="">
                                    <h5 class="text-green">Application View</h5>
                                    <hr/>

                                    <div class="form-group verify-btn-group">
                                        <span>Mail</span>
                                        <img ng-show="Emailverified!='Yes'" height="15"
                                            src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />

                                        <img ng-show="Emailverified=='Yes'" height="15"
                                            src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                        <span>Mobile No</span>
                                        <img ng-show="Smsverified!='Yes'" height="15"
                                            src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                        <img ng-show="Smsverified=='Yes'" height="15"
                                            src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                    </div>
                                </div>
                                <div class="" style="">

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Application
                                                ID</label>
                                            <input type="text" class="form-control" ng-model="Applicationid"
                                                autocomplete="off" readonly>
                                        </div>

                                        <div class="form-group col-md-9 mb-0">

                                            <div class="row mb-0">

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">First
                                                        Name</label>
                                                    <div class="input-group row " style="margin: 0px"><span
                                                            class="input-group-prepend">

                                                            <input type="text" placeholder="Firstname"
                                                                class="form-control col-3" ng-model="Title" readonly>

                                                            <input type="text" placeholder="Firstname"
                                                                class="form-control col-9" ng-model="Firstname"
                                                                readonly>
                                                    </div>

                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Last
                                                        Name</label>
                                                    <input type="text" class="form-control" ng-model="Lastname"
                                                        autocomplete="off" readonly>

                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Status</label>
                                                    <input type="text" class="form-control" ng-model="Selectionstatus"
                                                        autocomplete="off" readonly>


                                                </div>



                                            </div>
                                        </div>



                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Gender</label>
                                            <input type="text" class="form-control" ng-model="Gender" autocomplete="off"
                                                readonly>


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Qualification</label>
                                            <input type="text" class="form-control" ng-model="Qualification"
                                                autocomplete="off" readonly>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Marital
                                                Status</label>
                                            <input type="text" class="form-control" ng-model="Married"
                                                autocomplete="off" readonly>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Mother Tongue
                                            </label>
                                            <input type="text" class="form-control" ng-model="Mothertongue"
                                                autocomplete="off" readonly>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Contact
                                                No</label>
                                            <input type="text" class="form-control" ng-model="Contactno"
                                                autocomplete="off" readonly>


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Category</label>
                                            <input type="text" class="form-control" ng-model="Category"
                                                autocomplete="off" readonly>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Application
                                                Date</label>
                                            <input type="text" class="form-control" ng-model="ApplicationDate"
                                                autocomplete="off" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Interview
                                                schedule Date</label>
                                            <input type="text" class="form-control" ng-model="InterviewDate"
                                                autocomplete="off" readonly>


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Interview
                                                Timing</label>
                                            <input type="text" class="form-control" ng-model="Interviewtime"
                                                autocomplete="off" readonly>


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Fresher</label>
                                            <input type="text" class="form-control" ng-model="Fresher"
                                                autocomplete="off" readonly>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Current
                                                Salary</label>
                                            <input type="text" class="form-control" ng-model="PreviousCTC"
                                                autocomplete="off" readonly>

                                        </div>


                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Expected
                                                Salary</label>
                                            <input type="text" class="form-control" ng-model="ExpectedCTC"
                                                autocomplete="off" readonly>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Other
                                                Allowance</label>
                                            <input type="text" class="form-control" ng-model="Otherallowance"
                                                autocomplete="off" onkeypress="return Validate(event);" readonly>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Experience</label>
                                            <input type="text" class="form-control" ng-model="Experience"
                                                autocomplete="off" ng-disabled="btnPrevious" readonly>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-form-label">Email
                                                ID</label>
                                            <input type="text" class="form-control" ng-model="Emailid"
                                                autocomplete="off" readonly>


                                        </div>

                                        <div class="col-md-12">
                                            <div class="text-right" style="margin-top:25px">
                                                <button class="btn btn-sm  btn-primary" data-toggle="modal"
                                                    data-target="#ModalCenterUpload"><i class="fa fa-user"></i>
                                                    View Image</button>
                                                <button class="btn btn-sm btn-rounded btn-warning"
                                                    data-target="#myCarousel" data-slide-to="0"><i
                                                        class="fa  fa-arrow-left"></i>
                                                    Back</button>
                                            </div>
                                        </div>

                                    </div>



                                </div>

                                <div class="alert alert-success" role="alert" ng-show="Message">
                                    {{Message}}
                                </div>

                            </div>



                        </div>
                    </div>
                    <?php include 'Viewphoto.php'?>
                </div>
            </div>
        </div>
        <?php include '../footerjs.php' ?>
        <script src="../Scripts/Controller/HRM22Controller.js"></script>

</body>

=======
<?php include '../config.php' ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php' ?>
    <title>Application Master</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php' ?>
        <?php include '../Sidebarin.php' ?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM22Controller">
            <div class="container-fluid dashboard-content">
                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="">
                                <h5 class="text-green">Application Details
                                </h5>
                                <hr/>
                                <div class="">

                                    <div class="table-responsive">
                                        <table class="table table-bordered  table-sm ">
                                            <thead>
                                                <tr>

                                                    <th>No</th>
                                                    <th scope="col" style="width: 100px;">
                                                        Application_ID</th>
                                                    <th scope="col" style="width: 200px;">Name</th>
                                                    <th scope="col" style="width: 90px;">Gender</th>
                                                    <th scope="col">Contactno</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Qualification</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Mobile</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Applicationid">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Fullname">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Gender">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Contactno">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Type_Of_Posistion">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.HighestQualification">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <div class="input-group ">
                                                            <input type="text" class="form-control"
                                                                ng-model="searchApplication.Selectionstatus">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-search"></i></span>
                                                            </div>
                                                        </div>
                                                    </td>





                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr dir-paginate="e in GetApplicationList |filter:searchApplication|itemsPerPage:10 "
                                                    pagination-id="Applicationgrid"
                                                    current-page="currentPageApplication">




                                                    <td style="width: 50px;">
                                                        {{$index+1 + (currentPageApplication - 1) * pageSizeApplication}}
                                                    </td>

                                                    <td>{{e.Applicationid}}</td>
                                                    <td>{{e.Title}} {{e.Fullname}}</td>
                                                    <td>{{e.Gender}}</td>
                                                    <td>{{e.Contactno}}</td>
                                                    <td>{{e.Type_Of_Posistion}}</td>
                                                    <td>{{e.HighestQualification}}</td>
                                                    <td>{{e.Selectionstatus}}</td>
                                                    <td ng-show="e.Smsverified=='Yes'">
                                                        <img height="15"
                                                            src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                                    </td>
                                                    <td ng-show="e.Smsverified!='Yes'">
                                                        <img height="15"
                                                            src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                                    </td>
                                                    <td ng-show="e.Emailverified=='Yes'">
                                                        <img height="15"
                                                            src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                                    </td>
                                                    <td ng-show="e.Emailverified!='Yes'">
                                                        <img height="15"
                                                            src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                                    </td>
                                                    <td>
                                                        <div class="action-btn">
                                                            <img height="15" ng-click="SendEdit(e.Applicationid);"
                                                                src="<?php echo "$domain"; ?>/assets/icons/edit.png">

                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>



                                    </div>

                                    <div class="float-right mt-2">
                                        <div class="pagination">
                                            <dir-pagination-controls pagination-id="Applicationgrid" max-size="3"
                                                direction-links="true" boundary-links="true" class="pagination">
                                            </dir-pagination-controls>
                                        </div>
                                    </div>


                                </div>
                            </div>




                        </div>
                        <div class="carousel-item">

                            <div class="">
                                <div class="">
                                    <h5 class="text-green">Application View</h5>
                                    <hr/>

                                    <div class="form-group verify-btn-group">
                                        <span>Mail</span>
                                        <img ng-show="Emailverified!='Yes'" height="15"
                                            src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />

                                        <img ng-show="Emailverified=='Yes'" height="15"
                                            src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                        <span>Mobile No</span>
                                        <img ng-show="Smsverified!='Yes'" height="15"
                                            src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                        <img ng-show="Smsverified=='Yes'" height="15"
                                            src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                    </div>
                                </div>
                                <div class="" style="">

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Application
                                                ID</label>
                                            <input type="text" class="form-control" ng-model="Applicationid"
                                                autocomplete="off" readonly>
                                        </div>

                                        <div class="form-group col-md-9 mb-0">

                                            <div class="row mb-0">

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">First
                                                        Name</label>
                                                    <div class="input-group row " style="margin: 0px"><span
                                                            class="input-group-prepend">

                                                            <input type="text" placeholder="Firstname"
                                                                class="form-control col-3" ng-model="Title" readonly>

                                                            <input type="text" placeholder="Firstname"
                                                                class="form-control col-9" ng-model="Firstname"
                                                                readonly>
                                                    </div>

                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Last
                                                        Name</label>
                                                    <input type="text" class="form-control" ng-model="Lastname"
                                                        autocomplete="off" readonly>

                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="col-form-label">Status</label>
                                                    <input type="text" class="form-control" ng-model="Selectionstatus"
                                                        autocomplete="off" readonly>


                                                </div>



                                            </div>
                                        </div>



                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Gender</label>
                                            <input type="text" class="form-control" ng-model="Gender" autocomplete="off"
                                                readonly>


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Qualification</label>
                                            <input type="text" class="form-control" ng-model="Qualification"
                                                autocomplete="off" readonly>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Marital
                                                Status</label>
                                            <input type="text" class="form-control" ng-model="Married"
                                                autocomplete="off" readonly>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Mother Tongue
                                            </label>
                                            <input type="text" class="form-control" ng-model="Mothertongue"
                                                autocomplete="off" readonly>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Contact
                                                No</label>
                                            <input type="text" class="form-control" ng-model="Contactno"
                                                autocomplete="off" readonly>


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Category</label>
                                            <input type="text" class="form-control" ng-model="Category"
                                                autocomplete="off" readonly>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Application
                                                Date</label>
                                            <input type="text" class="form-control" ng-model="ApplicationDate"
                                                autocomplete="off" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Interview
                                                schedule Date</label>
                                            <input type="text" class="form-control" ng-model="InterviewDate"
                                                autocomplete="off" readonly>


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Interview
                                                Timing</label>
                                            <input type="text" class="form-control" ng-model="Interviewtime"
                                                autocomplete="off" readonly>


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Fresher</label>
                                            <input type="text" class="form-control" ng-model="Fresher"
                                                autocomplete="off" readonly>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Current
                                                Salary</label>
                                            <input type="text" class="form-control" ng-model="PreviousCTC"
                                                autocomplete="off" readonly>

                                        </div>


                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Expected
                                                Salary</label>
                                            <input type="text" class="form-control" ng-model="ExpectedCTC"
                                                autocomplete="off" readonly>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Other
                                                Allowance</label>
                                            <input type="text" class="form-control" ng-model="Otherallowance"
                                                autocomplete="off" onkeypress="return Validate(event);" readonly>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Experience</label>
                                            <input type="text" class="form-control" ng-model="Experience"
                                                autocomplete="off" ng-disabled="btnPrevious" readonly>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-form-label">Email
                                                ID</label>
                                            <input type="text" class="form-control" ng-model="Emailid"
                                                autocomplete="off" readonly>


                                        </div>

                                        <div class="col-md-12">
                                            <div class="text-right" style="margin-top:25px">
                                                <button class="btn btn-sm  btn-primary" data-toggle="modal"
                                                    data-target="#ModalCenterUpload"><i class="fa fa-user"></i>
                                                    View Image</button>
                                                <button class="btn btn-sm btn-rounded btn-warning"
                                                    data-target="#myCarousel" data-slide-to="0"><i
                                                        class="fa  fa-arrow-left"></i>
                                                    Back</button>
                                            </div>
                                        </div>

                                    </div>



                                </div>

                                <div class="alert alert-success" role="alert" ng-show="Message">
                                    {{Message}}
                                </div>

                            </div>



                        </div>
                    </div>
                    <?php include 'Viewphoto.php'?>
                </div>
            </div>
        </div>
        <?php include '../footerjs.php' ?>
        <script src="../Scripts/Controller/HRM22Controller.js"></script>

</body>

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>