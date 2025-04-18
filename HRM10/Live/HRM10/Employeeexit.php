<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Exit Employee </title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM10Controller">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12">




                        <div id="myCarousel" class="carousel slide" data-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">


                                    <div class="card">
                                        <h5 class="card-header">Employee Details <input type="text"
                                                placeholder="Search..." class="form-control" ng-model="searchEmployee">
                                        </h5>
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-lg-3"
                                                    ng-repeat="e in GetExitEmployeeList |filter:searchEmployee">
                                                    <div class="empstyle">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <img ng-src='{{e.Empimage}}'
                                                                        ng-hide="e.Empimage == null || e.Empimage == '' "
                                                                        ng-show="e.Empimage != null "
                                                                        class="img-thumbnail mr-3" alt="Employee_image"
                                                                        style="width:70px;height:70px;"
                                                                        ng-click="SendEdit(e.Employeeid);" />
                                                                </td>
                                                                <td>
                                                                    <p ng-click="SendEdit(e.Employeeid);">
                                                                        {{e.Title}}{{e.Fullname}}<br />


                                                                        <span
                                                                            style="font-size: 90%;">{{e.Department}}</span>
                                                                        <br />

                                                                        <span
                                                                            style="font-size: 70%;">{{e.Designation}}</span>
                                                                    </p>
                                                                </td>
                                                            </tr>

                                                        </table>

                                                    </div>






                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============================================================== -->
                                    <!-- basic table  -->
                                    <!-- ============================================================== -->

                                </div>
                                <div class="carousel-item">
                                    <div class="card">
                                        <h5 class="card-header">Employee Details</h5>
                                        <div class="card-body">
                                            <div class="table-responsive custom-table custom-table-noborder">
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <td> <label class="col-form-label">Employee_ID</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="Employeeid" autocomplete="off" readonly></td>
                                                        <td> <label class="col-form-label">First
                                                                Name</label></td>
                                                        <td>

                                                            <input type="text" placeholder="Firstname"
                                                                class="form-control" ng-model="Firstname" readonly>

                                                        </td>
                                                        <td> <label class="col-form-label">Last Name</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control" ng-model="Lastname"
                                                                autocomplete="off" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Gender</label>
                                                        </td>
                                                        <td><input type="text" class="form-control" ng-model="Gender"
                                                                autocomplete="off" readonly>


                                                        </td>
                                                        <td> <label class="col-form-label">Category</label>
                                                        </td>
                                                        <td><input type="text" class="form-control" ng-model="Category"
                                                                autocomplete="off" readonly>
                                                        </td>
                                                        <td> <label class="col-form-label">Married</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" ng-model="Married"
                                                                autocomplete="off" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Mother_Tongue</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                ng-model="Mothertongue" autocomplete="off" readonly>

                                                        </td>
                                                        <td> <label class="col-form-label">Contact_No</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" ng-model="Contactno"
                                                                autocomplete="off" readonly>

                                                        </td>
                                                        <td> <label class="col-form-label">Nationality</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                ng-model="Nationality" autocomplete="off" readonly>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td> <label class="col-form-label">Email-ID</label>
                                                        </td>
                                                        <td colspan="5"> <input type="text" class="form-control"
                                                                ng-model="Emailid" autocomplete="off" readonly></td>
                                                        </td>

                                                        <td>
                                                            <button class="btn btn-rounded btn-primary"
                                                                data-target="#myCarousel" data-slide-to="0"
                                                                ng-click="Getallvalues()">Back</button>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <table>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-brand active"
                                                                ng-click="fnotherinfo();">Other_info</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-brand active"
                                                                ng-click="fneducationinfo();">Eduction</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-brand active"
                                                                ng-click="fnbankinfo();">Bank_Account</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn  btn-brand active"
                                                                ng-click="fnfamilyinfo();">Family_Info</button>
                                                        </td>
                                                        <td>

                                                            <button class="btn  btn-brand active"
                                                                ng-click="fnrefinfo();">Reference</button>
                                                        </td>
                                                        <td>

                                                            <button class="btn  btn-brand active"
                                                                ng-click="fnsalaryinfo();">
                                                                Salary</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn  btn-brand active"
                                                                ng-click="fndocinfo();">Doc_info</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn  btn-brand active"
                                                                ng-click="fnimageinfo();">Image</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn  btn-brand active"
                                                                ng-click="fnappraisalinfo();">Appraisal</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn  btn-brand active"
                                                                ng-click="fnpromotioninfo();">Promotion</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="alert alert-success" role="alert" ng-show="Message" id='msg1'>
                                        {{Message}}
                                    </div>
                                    <div class="card" ng-show="btnotherinformation">
                                        <h5 class="card-header">Other Information</h5>
                                        <div class="card-body">
                                            <div class="table-responsive custom-table custom-table-noborder">
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <td> <label class="col-form-label"
                                                                title="Date Of Birth">DOB</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control" ng-model="Dob"
                                                                onfocus="(this.type='date')" onblur="(this.type='date')"
                                                                readonly>
                                                        </td>
                                                        <td> <label class="col-form-label">Age</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control" ng-model="Age"
                                                                autocomplete="off" readonly>
                                                        </td>
                                                        <td> <label class="col-form-label">Blood_Group
                                                            </label></td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="Bloodgroup" autocomplete="off" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Expereience</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="Expereience" autocomplete="off" readonly>
                                                        </td>
                                                        <td> <label class="col-form-label">Fresher</label>
                                                        </td>
                                                        <td><input type="text" class="form-control" ng-model="Fresher"
                                                                autocomplete="off" readonly>



                                                        </td>
                                                        <td> <label class="col-form-label">Religion</label>
                                                        </td>
                                                        <td><input type="text" class="form-control" ng-model="Religion"
                                                                autocomplete="off" readonly>

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Shift</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" ng-model="Shift"
                                                                autocomplete="off" readonly>

                                                        </td>
                                                        <td> <label class="col-form-label">Allow_OT</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" ng-model="AllowOT"
                                                                autocomplete="off" readonly>



                                                        </td>
                                                        <td> <label class="col-form-label">Allow_LOP</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" ng-model="AllowLOP"
                                                                autocomplete="off" readonly>

                                                        </td>

                                                    </tr>
                                                    <tr>

                                                        <td> <label class="col-form-label">Salary_Mode</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                ng-model="Salary_Mode" autocomplete="off" readonly>



                                                        </td>
                                                        <td> <label class="col-form-label">Week_Off</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" ng-model="Weekoff"
                                                                autocomplete="off" readonly>

                                                        </td>
                                                        <td> <label class="col-form-label">Employee_CL</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="Employee_CL" autocomplete="off" readonly>
                                                    </tr>
                                                    <tr>

                                                        <td> <label class="col-form-label">UAN No</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" autocomplete="off"
                                                                ng-model="UANno" readonly />


                                                        </td>
                                                        <td> <label class="col-form-label">ESI No</label>
                                                        </td>
                                                        <td> <input class="form-control" autocomplete="off"
                                                                ng-model="ESIno" readonly />
                                                        </td>
                                                        <td> <label class="col-form-label">Aadhar No</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control" ng-model="Aadharno"
                                                                autocomplete="off" readonly>
                                                    </tr>

                                                    <tr>

                                                        <td> <label class="col-form-label">Panno</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" autocomplete="off"
                                                                ng-model="Panno" readonly />


                                                        </td>
                                                        <td> <label class="col-form-label">PF Joining Date</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="PFJoiningdate" readonly>
                                                        </td>
                                                        <td> <label class="col-form-label">ESI Joining Date</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="ESIJoiningdate" readonly>
                                                    </tr>
                                                    <tr>
                                                        <td>Languages</td>
                                                        <td colspan="5"><input type="text" class="form-control"
                                                                ng-model="Languagestest" autocomplete="off" readonly>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="card" ng-show="btnaddress">
                                        <h5 class="card-header">Permanent and Temporary Address Detail</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div
                                                    class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                    <h3>Temporary Address Detail</h3>
                                                    <table class="table table-bordered table-sm">
                                                        <tr>
                                                            <td> <label class="col-form-label">Address</label>
                                                            </td>
                                                            <td> <input class="form-control" ng-model="CurrentAddress"
                                                                    readonly />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label class="col-form-label">Country</label>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" ng-model="CurrentCountry"
                                                                    readonly />
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td> <label class="col-form-label">State</label>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" ng-model="CurrentState"
                                                                    readonly />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label class="col-form-label">City</label>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" ng-model="CurrentCity"
                                                                    readonly />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label class="col-form-label">Pincode</label>
                                                            </td>
                                                            <td> <input class="form-control" ng-model="CurrentPincode"
                                                                    readonly /></td>
                                                        </tr>
                                                    </table>

                                                </div>
                                                <div
                                                    class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                    <h3>Permanent Address Details</h3>
                                                    <table class="table table-bordered table-sm">
                                                        <tr>
                                                            <td> <label class="col-form-label">Address</label>
                                                            </td>
                                                            <td> <input class="form-control" ng-model="PermanentAddress"
                                                                    readonly />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label class="col-form-label">Country</label>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" ng-model="PermanentCountry"
                                                                    readonly />
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td> <label class="col-form-label">State</label>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" ng-model="PermanentState"
                                                                    readonly />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label class="col-form-label">City</label>
                                                            </td>
                                                            <td>

                                                                <input class="form-control" ng-model="PermanentCity"
                                                                    readonly />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label class="col-form-label">Pincode</label>
                                                            </td>
                                                            <td> <input class="form-control" ng-model="PermanentPincode"
                                                                    readonly /></td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card" ng-show="btnEducation">
                                        <h5 class="card-header">Employee Education Details</h5>
                                        <div class="card-body">
                                            <div class="row">


                                                <div class="table-responsive">
                                                    <table class="table table-bordered  table-sm table-striped">
                                                        <thead>
                                                            <tr>

                                                                <th>No</th>
                                                                <th scope="col">Studies</th>
                                                                <th scope="col">University</th>
                                                                <th scope="col">Grade</th>
                                                                <th scope="col">Year</th>
                                                                <th>Action</th>




                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                        <tbody>



                                                            <tr dir-paginate="e in GetEducationList|filter:searchEducation|itemsPerPage:5 "
                                                                pagination-id="Educationgrid"
                                                                current-page="currentPageEducation">




                                                                <td style="width: 50px;">
                                                                    {{$index+1 + (currentPageEducation - 1) * pageSizeEducation}}
                                                                </td>
                                                                <td>{{e.Studies}}</td>
                                                                <td>{{e.Universityorschool}}</td>
                                                                <td>{{e.Grade}}</td>
                                                                <td>{{e.Passoutyear}}</td>

                                                                <td>
                                                                    <div class="action-btn">


                                                                        <img height="15" data-toggle="modal"
                                                                            data-target="#ModalCenter1EMPDocumentView"
                                                                            ng-click="FetchStudy(e.Employeeid,e.Sno);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/view.png">

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
                                    <div class="card" ng-show="btnFamily">
                                        <h5 class="card-header">Employee Family Details</h5>
                                        <div class="card-body">



                                            <div class="table-responsive">
                                                <table class="table table-bordered  table-sm table-striped">
                                                    <thead>
                                                        <tr>

                                                            <th>No</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Relationship</th>
                                                            <th scope="col">Age</th>
                                                            <th scope="col">Contactno</th>
                                                            <th scope="col">Occupation</th>


                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>

                                                        <tr dir-paginate="e in GetFamilyList |filter:searchFamily|itemsPerPage:10 "
                                                            pagination-id="Familygrid" current-page="currentPageFamily">




                                                            <td style="width: 50px;">
                                                                {{$index+1 + (currentPageFamily - 1) * pageSizeFamily}}
                                                            </td>
                                                            <td>{{e.Name}}</td>
                                                            <td>{{e.Relationship}}</td>
                                                            <td>{{e.Age}}</td>
                                                            <td>{{e.Contactno}}</td>
                                                            <td>{{e.Occupation}}</td>



                                                            <td>
                                                                <div class="action-btn">
                                                                    <img height="15" data-toggle="modal"
                                                                        data-target="#ModalCenter1Family"
                                                                        ng-click="FetchFamily(e.Employeeid,e.Sno);"
                                                                        src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                    <img height="15"
                                                                        ng-click="FetchFamily(e.Employeeid,e.Sno);"
                                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="pagination">
                                                <dir-pagination-controls pagination-id="Familygrid" max-size="3"
                                                    direction-links="true" boundary-links="true" class="pagination">
                                                </dir-pagination-controls>


                                            </div>



                                        </div>

                                    </div>

                                    <div class="card" ng-show="btnReference">
                                        <h5 class="card-header">Reference Details</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div
                                                    class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                    <h3>Reference 1 Detail</h3>
                                                    <table class="table table-bordered table-sm">
                                                        <tr>
                                                            <td> <label class="col-form-label">Reference_Name</label>
                                                            </td>
                                                            <td> <input class="form-control" ng-model="Reference1name"
                                                                    readonly />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label class="col-form-label">Contactno</label>
                                                            </td>
                                                            <td> <input class="form-control"
                                                                    ng-model="Reference1contactno" readonly />
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td> <label class="col-form-label">Address</label>
                                                            </td>
                                                            <td> <input class="form-control"
                                                                    ng-model="Reference1address" readonly />
                                                            </td>
                                                        </tr>

                                                    </table>

                                                </div>
                                                <div
                                                    class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                    <h3>Reference 2 Detail</h3>
                                                    <table class="table table-bordered table-sm">
                                                        <tr>
                                                            <td> <label class="col-form-label">Reference_Name</label>
                                                            </td>
                                                            <td> <input class="form-control" ng-model="Reference2name"
                                                                    readonly />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label class="col-form-label">Contactno</label>
                                                            </td>
                                                            <td> <input class="form-control"
                                                                    ng-model="Reference2contactno"
                                                                    onkeypress="return Validate(event);" readonly />
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td> <label class="col-form-label">Address</label>
                                                            </td>
                                                            <td> <input class="form-control"
                                                                    ng-model="Reference2address" readonly />
                                                            </td>
                                                        </tr>

                                                    </table>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card" ng-show="btnappraisal">
                                        <h5 class="card-header">Appraisal Details</h5>
                                        <div class="card-body">



                                            <div class="table-responsive">
                                                <table class="table table-bordered  table-sm table-striped">
                                                    <thead>
                                                        <tr>

                                                            <th>No</th>
                                                            <th scope="col">Basic</th>
                                                            <th scope="col">HR_Allowance</th>
                                                            <th scope="col">TA</th>
                                                            <th scope="col">Performance_allowance</th>
                                                            <th scope="col">Day_allowance</th>
                                                            <th>PF</th>
                                                            <th>ESI</th>
                                                            <th>TDS</th>
                                                            <th>Professional_tax</th>
                                                            <th>Net_Salary</th>
                                                            <th>Gross_Salary</th>
                                                            <th>PF_Yesandno</th>
                                                            <th>ESI_Yesandno</th>
                                                            <th>Other_Allowance</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>

                                                        <tr dir-paginate="e in GetAppList |filter:searchApp|itemsPerPage:10 "
                                                            pagination-id="Apperesialgrid"
                                                            current-page="currentPageApp">




                                                            <td style="width: 50px;">
                                                                {{$index+1 + (currentPageApp - 1) * pageSizeApp}}
                                                            </td>
                                                            <td>{{e.Basic}}</td>
                                                            <td>{{e.HR_Allowance}}</td>
                                                            <td>{{e.TA}}</td>
                                                            <td>{{e.Performance_allowance}}</td>
                                                            <td>{{e.Day_allowance}}</td>
                                                            <td>{{e.PF}}</td>
                                                            <td>{{e.ESI}}</td>
                                                            <td>{{e.TDS}}</td>
                                                            <td>{{e.Professional_tax}}</td>
                                                            <td>{{e.Net_Salary}}</td>
                                                            <td>{{e.Gross_Salary}}</td>
                                                            <td>{{e.PF_Yesandno}}</td>
                                                            <td>{{e.ESI_Yesandno}}</td>
                                                            <td>{{e.Other_Allowance}}</td>





                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="pagination">
                                                <dir-pagination-controls pagination-id="Apperesialgrid" max-size="3"
                                                    direction-links="true" boundary-links="true" class="pagination">
                                                </dir-pagination-controls>


                                            </div>



                                        </div>

                                    </div>
                                    <div class="card" ng-show="btnsalary">
                                        <h5 class="card-header">Salary Information</h5>
                                        <div class="card-body">
                                            <div class="table-responsive custom-table custom-table-noborder">
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <td> <label class="col-form-label">Basic</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control" ng-model="Basic"
                                                                autocomplete="off" readonly>
                                                        </td>
                                                        <td> <label class="col-form-label">HR_Allowance</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="HR_Allowance" autocomplete="off" readonly>
                                                        </td>
                                                        <td> <label class="col-form-label">TA
                                                            </label></td>
                                                        <td> <input type="text" class="form-control" ng-model="TA"
                                                                autocomplete="off" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Performance_allowance</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="Performance_allowance" autocomplete="off"
                                                                readonly>
                                                        </td>
                                                        <td> <label class="col-form-label">Day_allowance</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="Day_allowance" autocomplete="off" readonly>
                                                        </td>
                                                        <td> <label class="col-form-label">PF
                                                            </label></td>
                                                        <td> <input type="text" class="form-control" ng-model="PF"
                                                                autocomplete="off" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">ESI</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control" ng-model="ESI"
                                                                autocomplete="off" readonly>
                                                        </td>
                                                        <td> <label class="col-form-label">TDS</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control" ng-model="TDS"
                                                                autocomplete="off" readonly>
                                                        </td>
                                                        <td> <label class="col-form-label">Professional_tax
                                                            </label></td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="Professional_tax" autocomplete="off" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Net_Salary</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="Net_Salary" autocomplete="off" readonly>
                                                        </td>
                                                        <td> <label class="col-form-label">Gross_Salary</label>
                                                        </td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="Gross_Salary" autocomplete="off" readonly>
                                                        </td>
                                                        <td> <label class="col-form-label">Other_Allowance
                                                            </label></td>
                                                        <td> <input type="text" class="form-control"
                                                                ng-model="Other_Allowance" autocomplete="off" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">PF_Yesandno</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                ng-model="PF_Yesandno" autocomplete="off" readonly>



                                                        </td>
                                                        <td> <label class="col-form-label">ESI_Yesandno</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                ng-model="ESI_Yesandno" autocomplete="off" readonly>



                                                        </td>


                                                    </tr>

                                                </table>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="card" ng-show="btndoc">
                                        <h5 class="card-header">Employee Document Details</h5>
                                        <div class="card-body">

                                            <div class="table-responsive">
                                                <table class="table table-bordered  table-sm table-striped">
                                                    <thead>
                                                        <tr>

                                                            <th>No</th>
                                                            <th scope="col">Doctype</th>
                                                            <th scope="col">Document_No</th>




                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>

                                                        <tr dir-paginate="e in GetDOCUMENTList |filter:searchFamily|itemsPerPage:10 "
                                                            pagination-id="Docgrid" current-page="currentPageDoc">




                                                            <td style="width: 50px;">
                                                                {{$index+1 + (currentPageDoc - 1) * pageSizeDoc}}
                                                            </td>
                                                            <td>{{e.Doctype}}</td>
                                                            <td>{{e.Documentno}}</td>
                                                            <!-- <td>{{e.Documentpath}}</td> -->




                                                            <td>
                                                                <div class="action-btn">
                                                                    <img height="15" data-toggle="modal"
                                                                        data-target="#ModalCenter1Doc"
                                                                        ng-click="FetchDOC(e.Employeeid,e.Sno);"
                                                                        src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                    <img height="15"
                                                                        ng-click="FetchDOC(e.Employeeid,e.Sno);"
                                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                                                    <img height="15" data-toggle="modal"
                                                                        data-target="#ModalCenter1DocumentView"
                                                                        ng-click="FetchDOC(e.Employeeid,e.Sno);"
                                                                        src="<?php echo "$domain"; ?>/assets/icons/view.png">



                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="pagination">
                                                <dir-pagination-controls pagination-id="Docgrid" max-size="3"
                                                    direction-links="true" boundary-links="true" class="pagination">
                                                </dir-pagination-controls>


                                            </div>


                                        </div>

                                    </div>

                                    <div class="card" ng-show="btnpromotion">
                                        <h5 class="card-header">Department / Designation Details</h5>
                                        <div class="card-body">

                                            <div class="table-responsive">
                                                <table class="table table-bordered  table-sm table-striped">
                                                    <thead>
                                                        <tr>

                                                            <th>No</th>
                                                            <th scope="col">Department</th>
                                                            <th scope="col">Designation</th>

                                                            <th scope="col">From_Date</th>
                                                            <th scope="col">To_Date</th>
                                                            <th scope="col">Period</th>

                                                        </tr>
                                                    </thead>


                                                    <tbody>

                                                        <tr dir-paginate="e in GetPromoList |filter:searchFamily|itemsPerPage:10 "
                                                            pagination-id="Deptgrid" current-page="currentPageDept">




                                                            <td style="width: 50px;">
                                                                {{$index+1 + (currentPageDept - 1) * pageSizeDept}}
                                                            </td>
                                                            <td>{{e.Department}}</td>
                                                            <td>{{e.Designation}}</td>
                                                            <td>{{e.Fromperiod}}</td>
                                                            <td>{{e.Toperiod}}</td>
                                                            <td>{{e.Period}}</td>




                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="pagination">
                                                <dir-pagination-controls pagination-id="Deptgrid" max-size="3"
                                                    direction-links="true" boundary-links="true" class="pagination">
                                                </dir-pagination-controls>


                                            </div>

                                        </div>

                                    </div>
                                    <div class="card" ng-show="btnbank">
                                        <h5 class="card-header">Bank Account Details</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div
                                                    class="table-responsive custom-table custom-table-noborder col-lg-5">

                                                    <table class="table table-bordered table-sm">
                                                        <tr>
                                                            <td> <label class="col-form-label">Bankname</label>
                                                            </td>
                                                            <td> <input class="form-control" ng-model="Bankname"
                                                                    autocomplete="off" readonly />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label class="col-form-label">Accountno</label>
                                                            </td>
                                                            <td> <input class="form-control" ng-model="Accountno"
                                                                    autocomplete="off" readonly />
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td> <label class="col-form-label">IFSCcode</label>
                                                            </td>
                                                            <td> <input class="form-control" ng-model="IFSCcode"
                                                                    autocomplete="off" readonly />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label class="col-form-label">Branch</label>
                                                            </td>
                                                            <td> <input class="form-control" ng-model="Branch"
                                                                    autocomplete="off" readonly />
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                                <div class="col-lg-7">
                                                    <iframe ng-src="{{Emppassbook}}"
                                                        ng-hide="Emppassbook == null || Emppassbook == '' "
                                                        ng-show="Emppassbook != null "
                                                        style="height:250px;width:100%"></iframe>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="carousel-item">
                                <div class="row">
                    <div class="col-xl-12">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Employee Relieving Formalities</h3>

                                </div>
                                <div class="card">
                                    <h5 class="card-header">Employee Exit</h5>
                                    <div class="card-body">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label>Employee_Name</label>
                                                </div>
                                                <div class="col-lg-4 nopadding">
                                                    <select ng-model="Exitempid" class="form-control"
                                                        ng-change="GetExitempname();">

                                                        <option ng-repeat="s in GetEmployeeList "
                                                            value="{{s.Employeeid}}">
                                                            {{s.Title}} {{s.Fullname}}-{{s.Employeeid}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2">
                                                    <label>Gender</label>
                                                </div>
                                                <div class="col-lg-4 nopadding">
                                                    <input class="form-control" ng-model="ExitGender" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label>Category</label>
                                                </div>
                                                <div class="col-lg-4 nopadding">
                                                    <input class="form-control" ng-model="ExitCategory" readonly />
                                                </div>
                                                <div class="col-lg-2">
                                                    <label> Designation</label>
                                                </div>
                                                <div class="col-lg-4 nopadding">
                                                    <input class="form-control" ng-model="ExitDesignation" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label>Type</label>
                                                </div>
                                                <div class="col-lg-4 nopadding">
                                                    <input class="form-control" ng-model="ExitEmployeetype" readonly />
                                                </div>
                                                <div class="col-lg-2">
                                                    <label> Contactno</label>
                                                </div>
                                                <div class="col-lg-4 nopadding">
                                                    <input class="form-control" ng-model="ExitContactno" readonly />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label>Department</label>
                                                </div>
                                                <div class="col-lg-4 nopadding">
                                                    <input class="form-control" ng-model="ExitDepartment" readonly />
                                                </div>
                                                <div class="col-lg-2">
                                                    <label>Request Date</label>
                                                </div>
                                                <div class="col-lg-4 nopadding">
                                                <input type="text" class="form-control"
                                                                        ng-model="Relievingrequestdate" onfocus="(this.type='date')"
                                                                        onblur="(this.type='date')"
                                                                        >
                                                   
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label>Relieving Date</label>
                                                </div>
                                                <div class="col-lg-4 nopadding">
                                                <input type="text" class="form-control"
                                                                        ng-model="RelievingDate" onfocus="(this.type='date')"
                                                                        onblur="(this.type='date')"
                                                                        >
                                                  
                                                </div>
                                                <div class="col-lg-2">
                                                    <label>Handover To</label>
                                                </div>
                                                <div class="col-lg-4 nopadding">
                                                    <input class="form-control" ng-model="Handoverto"  />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label>Relieving Reason</label>
                                                </div>
                                                <div class="col-lg-10 nopadding">
                                                    <input class="form-control" ng-model="Relievingreason" autocomplete="off" />
                                                </div>

                                            </div>
                                            <div class=" form-group text-right">
                                            <button class="btn  btn-success"
                                                    ng-click="Update_Relieving();">Update</button>
                                                <button class="btn  btn-danger"
                                                data-toggle="modal"
                                                            data-target="#ModalCenter1" >Exit</button>
                                                <button class="btn btn-warning"  data-target="#myCarousel" data-slide-to="0" ng-click ="GetExitallvalues()">Back</button>
                                              
                                            </div>

                                        </div>
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
                            </div>
                        </div>




                        <div class="modal fade" id="ModalCenter1Education" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete {{EduNextno}}
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
                                        <button class="btn btn-rounded btn-danger" ng-click="DeleteEducation();"
                                            data-dismiss="modal">Delete</button>
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="ModalCenter1Family" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete {{FamilyNextno}}
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
                                        <button class="btn btn-rounded btn-danger" ng-click="DeleteFamily();"
                                            data-dismiss="modal">Delete</button>
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="ModalCenter1Doc" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete {{DocNextno}}
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
                                        <button class="btn btn-rounded btn-danger" ng-click="DeleteDoc();"
                                            data-dismiss="modal">Delete</button>
                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="ModalCenter1DocumentView" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Employee- Document
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <iframe ng-src="{{DocumentView}}"
                                                ng-hide="DocumentView == null || DocumentView == '' "
                                                ng-show="DocumentView != null "
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
                        <div class="modal fade" id="ModalCenter1EMPDocumentView" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Employee- Document
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <iframe ng-src="{{EmpDocumentView}}"
                                                ng-hide="EmpDocumentView == null || EmpDocumentView == '' "
                                                ng-show="EmpDocumentView != null "
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
                        <div class="modal fade" id="ModalCenter1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Deactivate {{Exitempid}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger" role="alert">
                                            Are You sure want to DEACTIVE this Employee?
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
                        <div class="Addiconxy">
                                <img height="50" src="<?php echo "$domain"; ?>/assets/icons/plus.png"  data-target="#myCarousel" data-slide-to="2" ng-click="Resetexitemp()">
                            </div>
                        <?php include '../footer.php'?>
                    </div>




                </div>

                <?php include '../footerjs.php'?>
                <script src="../Scripts/Controller/HRM10Controller.js"></script>
                <script type="text/javascript">
                function Validate(event) {
                    var regex = new RegExp("^[0-9-/()]");
                    var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
                    if (!regex.test(key)) {
                        event.preventDefault();
                        return false;
                    }
                }
                </script>

                <script type="text/javascript">
                function Validateamt(event) {
                    var regex = new RegExp("^[0-9-/.()]");
                    var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
                    if (!regex.test(key)) {
                        event.preventDefault();
                        return false;
                    }
                }
                </script>
</body>

</html>