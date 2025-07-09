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
    <title>View Employee Details</title>
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


                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <div class="mt-3">
                                <h5 class="text-green " style="margin-top:10px">View Employee Details</h5>
                                <hr />

                                <div class="table-responsive">
                                    <table class="table table-bordered  table-sm table-striped">
                                        <thead>
                                            <tr class="text-green">

                                                <th>No</th>
                                                <th scope="col" style="width: 100px;">
                                                    Employee ID</th>
                                                <th scope="col" style="width: 200px;">Name</th>
                                                <th scope="col" style="width: 60px;">Gender</th>
                                                <th scope="col">Department</th>
                                                <th scope="col">Designation</th>

                                                <th scope="col" style="width: 100px;">Contact</th>
                                                <th scope="col" style="width: 50px;">Mobile</th>
                                                <th scope="col" style="width: 50px;">Mail</th>
                                                <th scope="col" style="width: 50px;">Action</th>
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



                                                <td>
                                                    <div class="input-group ">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchEmployee.Contactno">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group ">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchEmployee.Smsverified">

                                                    </div>
                                                </td>
                                                <td colspan="2">
                                                    <div class="input-group ">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchEmployeessss.Emailverified"
                                                            autocomplete="off">

                                                    </div>
                                                </td>


                                                </td>


                                            </tr>
                                            <tr dir-paginate="e in GetEmployeeList |filter:searchEmployee|itemsPerPage:10 "
                                                pagination-id="Employeegrid" current-page="currentPageEmp">




                                                <td style="width: 50px;">
                                                    {{$index+1 + (currentPageEmp - 1) * pageSizeEmp}}
                                                </td>
                                                <td>{{e.Employeeid}}</td>
                                                <td>{{e.Title}} {{e.Fullname}}</td>
                                                <td>{{e.Gender}}</td>
                                                <td>{{e.Department}}</td>
                                                <td>{{e.Designation}}</td>

                                                <td>{{e.Contactno}}</td>

                                                <td align="center" ng-show="e.Smsverified=='Yes'">
                                                    <img title="Mobile Verified" height="15"
                                                        src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                                </td>
                                                <td align="center" ng-show="e.Smsverified!='Yes'"
                                                    title="Mobile Not Verified">
                                                    <img height="15"
                                                        src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                                </td>
                                                <td align="center" ng-show="e.Emailverified=='Yes'"
                                                    title="Email Verified">
                                                    <img height="15"
                                                        src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                                </td>
                                                <td align="center" ng-show="e.Emailverified!='Yes'"
                                                    title="Email Not Verified">
                                                    <img height="15"
                                                        src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                                </td>
                                                <td>
                                                    <div class="action-btn">
                                                        <img height="15" ng-click="SendEdit02(e.Employeeid);"
                                                            src="<?php echo "$domain"; ?>/assets/icons/view.png">




                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>

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


                        <div class="carousel-item">
                            <div class="mt-3">
                                <h5 class="text-green">Employee Details</h5>
                                <hr />

                                <div class="">

                                    <div class="row">


                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Employee ID</label>
                                            <input class="form-control" ng-model="Employeeid" readonly />

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">First Name</label>
                                            <div class="input-group "><span class="input-group-prepend">
                                                    <input class="form-control" ng-model="Title" readonly />
                                                    <input class="form-control" ng-model="Firstname" readonly />


                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Last Name </label>
                                            <input class="form-control" ng-model="Lastname" readonly />



                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Gender</label>
                                            <input class="form-control" ng-model="Gender" readonly />


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Category</label>
                                            <input class="form-control" ng-model="Category" readonly />


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Marital Status</label>
                                            <input class="form-control" ng-model="Married" readonly />


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">MotherTongue </label>
                                            <input class="form-control" ng-model="Mothertongue" readonly />


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Contact No</label>
                                            <input class="form-control" ng-model="Contactno" readonly />


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Nationality</label>
                                            <input class="form-control" ng-model="Nationality" readonly />

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Email-ID</label>
                                            <input class="form-control" ng-model="Emailid" readonly />

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Employee Type</label>
                                            <input class="form-control" ng-model="EmployeeType" readonly />


                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Department</label>
                                            <input class="form-control" ng-model="EmpDepartment" readonly />

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Designation</label>
                                            <input class="form-control" ng-model="EmpDesignation" readonly />


                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Qualification</label>
                                            <input class="form-control" ng-model="Highestqualification" readonly />


                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Father/ Spouse Name</label>
                                            <input class="form-control" ng-model="FatherGuardianSpouseName" readonly />

                                        </div>


                                        <div class="text-right" style="margin-top:19px">

                                            <button class="btn btn-sm btn-warning" data-target="#myCarousel"
                                                data-slide-to="0"><i class="fa fa-arrow-left"></i>
                                                Back</button>
                                        </div>


                                    </div>

                                    <div class="alert alert-success" role="alert" ng-show="Message" id='msg1'>
                                        {{Message}}
                                    </div>
                                    <div class="tab-list" style="overflow-x: hidden; padding-right: 0px;">
                                        <ul class="nav nav-pills nav-fill">
                                            <li class="nav-item" ng-click="fnotherinfo();"><a>Personal</a>
                                            </li>
                                            <li class="nav-item" ng-click="fneducationinfo();">
                                                <a>Education & Address</a>
                                            </li>

                                            <li class="nav-item" ng-click="fnpropertychecklistinfo();">
                                                <a>Asset</a>
                                            </li>
                                            <li class="nav-item" ng-click="fnbankinfo();"><a>Bank Info & Reference
                                                </a></li>
                                            <li class="nav-item" ng-click="fnfamilyinfo();"><a>Family Info
                                                </a></li>

                                            <li class="nav-item" ng-click="fnvaccinationinfo();">
                                                <a>Vaccination</a>
                                            </li>
                                            <li class="nav-item" ng-click="fnsalaryinfo();"><a>Salary </a>
                                            </li>
                                            <li class="nav-item" ng-click="fndocinfo();"><a>Doc info</a>
                                            </li>
                                            <li class="nav-item" ng-click="fnimageinfo();"><a>Image</a></li>
                                            <li class="nav-item" ng-click="fnappraisalinfo();"><a>Appraisal
                                                </a></li>
                                            <li class="nav-item" ng-click="fnpromotioninfo();">
                                                <a>Promotion</a>
                                            </li>

                                            <li class="nav-item" ng-click="fnsiplTamil();">
                                                <a>Application</a>
                                            </li>





                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card" ng-show="btnotherinformation">
                                <h5 class="card-header text-green">Personal Information</h5>
                                <div class="card-body">



                                    <div class="col-md-12">

                                        <div class="row">


                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">DOB</label>
                                                <input class="form-control" ng-model="Dob" readonly />


                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Languages</label>
                                                <input class="form-control" ng-model="Languagestest" readonly />

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Age</label>
                                                <input class="form-control" ng-model="Age" readonly />


                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Blood Group</label>
                                                <input class="form-control" ng-model="Bloodgroup" readonly />


                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Experience</label>
                                                <input class="form-control" ng-model="Expereience" readonly />


                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Fresher</label>
                                                <input class="form-control" ng-model="Fresher" readonly />


                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Date Of Joining</label>
                                                <input class="form-control" ng-model="Date_Of_Joing2" readonly />

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Shift Pattern</label>
                                                <input class="form-control" ng-model="Shift" readonly />

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">OT Applicability</label>
                                                <input class="form-control" ng-model="AllowOT" readonly />

                                            </div>
                                            <!-- <div class="form-group col-md-3">
                                                            <label class="col-form-label">Allow LOP</label>
                                                            <input class="form-control" ng-model="AllowLOP" readonly />


                                                        </div> -->

                                            <!-- <div class="form-group col-md-3">
                                                            <label class="col-form-label">Salary Mode</label>
                                                            <input class="form-control" ng-model="Salary_Mode"
                                                                readonly />


                                                        </div> -->
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Weekly Off</label>
                                                <input class="form-control" ng-model="Weekoff" readonly />


                                            </div>
                                            <!-- <div class="form-group col-md-3">
                                                            <label class="col-form-label">Employee CL</label>
                                                            <input class="form-control" ng-model="Employee_CL"
                                                                readonly />


                                                        </div> -->

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">UAN No</label>
                                                <input class="form-control" ng-model="UANno" readonly />


                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">ESI No </label>
                                                <input class="form-control" ng-model="ESIno" readonly />


                                            </div>
                                            <!-- <div class="form-group col-md-3">
                                                            <label class="col-form-label">Aadhar No</label>
                                                            <input class="form-control" ng-model="Aadharno" readonly />


                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">PAN No</label>
                                                            <input class="form-control" ng-model="Panno" readonly />


                                                        </div> -->
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">PF Joining Date</label>
                                                <input class="form-control" ng-model="PFJoiningdate" readonly />

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">ESI Joining Date </label>
                                                <input class="form-control" ng-model="ESIJoiningdate" readonly />


                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Official Mail ID </label>
                                                <input type="email" class="form-control" ng-model="OfficemailID"
                                                    readonly>
                                            </div>
                                            <div class="form-group col-md-6" ng-show="btnverification">
                                                <label class="col-form-label">Background Verification
                                                    Document
                                                </label>
                                                <div class="input-group">

                                                    <p class="input-group-text" ng-click="FetchEmployee(Employeeid);"
                                                        data-toggle="modal"
                                                        data-target="#ModalCenter1EMPBackgroundView">
                                                        <i class="fa fa-file"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-3" ng-show="btnverification">
                                            <label class="col-form-label">Background Verification
                                                Completed</label>

                                            <input class="form-control" ng-model="BackgroundVerification" readonly />

                                        </div>



                                    </div>

                                </div>
                            </div>





                            <div class="card" ng-show="btnPropertyChecklist">
                                <?php include 'Empasset/Assetview.php' ?>
                            </div>

                            <div class="card" ng-show="btnaddress">
                                <h5 class="card-header">Permanent and Temporary Address Detail</h5>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                <h3>Temporary Address Detail</h3>
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <td> <label class="col-form-label">Address</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" ng-model="CurrentAddress"
                                                                readonly />


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Country</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="CurrentCountry"
                                                                readonly />

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> <label class="col-form-label">State</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="CurrentState"
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
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                            <div class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                <h3>Permanent Address Details</h3>
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <td> <label class="col-form-label">Address</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentAddress"
                                                                readonly />


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Country</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentCountry"
                                                                readonly />

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> <label class="col-form-label">State</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentState"
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">City</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentCity"
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Pincode</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" ng-model="PermanentPincode"
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card" ng-show="btnEducation">
                                <h5 class="card-header text-green">Employee Education Details</h5>
                                <div class="card-body">


                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered  table-sm table-striped"
                                                style="width: 100%">
                                                <thead>
                                                    <tr>

                                                        <th>No</th>
                                                        <th scope="col">Studies</th>
                                                        <th scope="col">University</th>
                                                        <th scope="col">Grade</th>
                                                        <th scope="col">Year</th>
                                                        <th>Education Mode</th>
                                                        <th>Specialization</th>
                                                        <th scope="col">Action</th>
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
                                                        <td>{{e.EducationMode}}</td>
                                                        <td>{{e.Specialization}}</td>




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
                                <h5 class="card-header">Permanent and Temporary Address Detail</h5>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                <h3>Temporary Address Detail</h3>
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <td> <label class="col-form-label">Address</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" ng-model="CurrentAddress"
                                                                readonly />


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Country</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="CurrentCountry"
                                                                readonly />

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> <label class="col-form-label">State</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="CurrentState"
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
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                            <div class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                <h3>Permanent Address Details</h3>
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <td> <label class="col-form-label">Address</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentAddress"
                                                                readonly />


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Country</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentCountry"
                                                                readonly />

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> <label class="col-form-label">State</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentState"
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">City</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentCity"
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Pincode</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" ng-model="PermanentPincode"
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card" ng-show="btnFamily">
                                <h5 class="card-header text-green">Employee Family Details</h5>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="table-responsive">
                                                    <table class="table table-bordered  table-sm table-striped"
                                                        style="width: 100%">
                                                        <thead>
                                                            <tr>

                                                                <th>No</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Relationship</th>
                                                                <th scope="col">Age</th>
                                                                <th scope="col">Contactno</th>
                                                                <th scope="col">Occupation</th>



                                                            </tr>
                                                        </thead>


                                                        <tbody>

                                                            <tr dir-paginate="e in GetFamilyList |filter:searchFamily|itemsPerPage:10 "
                                                                pagination-id="Familygrid"
                                                                current-page="currentPageFamily">




                                                                <td style="width: 50px;">
                                                                    {{$index+1 + (currentPageFamily - 1) * pageSizeFamily}}
                                                                </td>
                                                                <td>{{e.Name}}</td>
                                                                <td>{{e.Relationship}}</td>
                                                                <td>{{e.Age}}</td>
                                                                <td>{{e.Contactno}}</td>
                                                                <td>{{e.Occupation}}</td>





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

                                    </div>

                                </div>

                            </div>

                            <div class="card" ng-show="btnappraisal">
                                <h5 class="card-header text-green">Appraisal Details</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered  table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Type</th>
                                                    <th scope="col">Basic</th>
                                                    <th scope="col">HR Allowance</th>
                                                    <th scope="col">TA</th>
                                                    <th scope="col">Performance allowance</th>
                                                    <th scope="col">Day allowance</th>
                                                    <th>PF</th>
                                                    <th>ESI</th>
                                                    <th>TDS</th>
                                                    <th>Professional tax</th>
                                                    <th>Net Salary</th>
                                                    <th>Gross Salary</th>
                                                    <th>PF Yes/no</th>
                                                    <th>ESI Yes/no</th>
                                                    <th>Other Allowance</th>
                                                    <th>PF Employeer</th>
                                                    <th>ESI Employeer</th>
                                                    <th>Bonus</th>
                                                    <th>CTC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr dir-paginate="e in GetAppList |filter:searchApp|itemsPerPage:10 "
                                                    pagination-id="Apperesialgrid" current-page="currentPageApp">
                                                    <td style="width: 50px;">
                                                        {{$index+1 + (currentPageApp - 1) * pageSizeApp}}
                                                    </td>
                                                    <td>{{e.Appresialtype}}</td>
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
                                                    <td>{{e.PF_Employeer_contribution}}</td>
                                                    <td>{{e.ESI_Employeer_contribution}}</td>
                                                    <td>{{e.Bonus}}</td>
                                                    <td>{{e.CTC}}</td>
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
                            <div class="card" ng-show="btnReference">
                                <h5 class="card-header text-green">Reference Details</h5>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="text-green" style="margin-left: 15px;">Reference 1
                                                    Detail</h3>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Reference_Name</label>
                                                    <input class="form-control" ng-model="Reference1name" readonly />


                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Contactno</label>
                                                    <input class="form-control" ng-model="Reference1contactno"
                                                        readonly />


                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Address</label>
                                                    <input class="form-control" ng-model="Reference1address" readonly />


                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <h3 class="text-green" style="margin-left: 15px;">Reference 2
                                                    Detail</h3>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Reference_Name</label>
                                                    <input class="form-control" ng-model="Reference2name" readonly />


                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Contactno</label>
                                                    <input class="form-control" ng-model="Reference2contactno"
                                                        readonly />


                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Address</label>
                                                    <input class="form-control" ng-model="Reference2address" readonly />


                                                </div>
                                            </div>




                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="card" ng-show="btnsalary">
                                <h5 class="card-header text-green">Salary Information</h5>
                                <div class="card-body">


                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Basic+Da</label>
                                            <span class="form-control" ng-bind="Basic"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">HR Allowance</label>
                                            <span class="form-control" ng-bind="HR_Allowance"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label"> Conveyence </label>
                                            <span class="form-control" ng-bind="TA"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label"> Performance allowance </label>
                                            <span class="form-control" ng-bind="Performance_allowance"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Day allowance</label>
                                            <span class="form-control" ng-bind="Day_allowance"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">PF</label>
                                            <span class="form-control" ng-bind="PF"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">ESI</label>
                                            <span class="form-control" ng-bind="ESI"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">TDS</label>
                                            <span class="form-control" ng-bind="TDS"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Professional tax</label>
                                            <span class="form-control" ng-bind="Professional_tax"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Net Salary</label>
                                            <span class="form-control" ng-bind="Net_Salary"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Gross Salary</label>
                                            <span class="form-control" ng-bind="Gross_Salary"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Other Allowance</label>
                                            <span class="form-control" ng-bind="Other_Allowance"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">PF Yes/no</label>
                                            <span class="form-control" ng-bind="PF_Yesandno"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">ESI Yes/no</label>
                                            <span class="form-control" ng-bind="ESI_Yesandno"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">ESI Over limit</label>
                                            <span class="form-control" ng-bind="ESIOverlimit"></span>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">PF Employeer Yes/No </label>
                                            <span class="form-control" ng-bind="Employeer_contribution_yes_no"></span>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label" >PF Employeer</label>
                                            <span class="form-control" ng-bind="PF_Employeer_contribution"></span>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">ESI Employeer</label>
                                            <span class="form-control" ng-bind="ESI_Employeer_contribution"></span>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Bonus</label>
                                            <span class="form-control" ng-bind="Bonus"></span>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">CTC</label>
                                            <span class="form-control" ng-bind="CTC"></span>

                                        </div>









                                    </div>



                                </div>

                            </div>
                            <div class="card" ng-show="btndoc">
                                <h5 class="card-header text-green">Employee Document Details</h5>
                                <div class="card-body">


                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class="table-responsive">
                                                <table class="table table-bordered  table-sm table-striped">
                                                    <thead>
                                                        <tr>

                                                            <th>No</th>
                                                            <th scope="col">Doctype</th>
                                                            <th scope="col">Document_No</th>
                                                            <!-- <th scope="col">Document_Path</th> -->



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

                                </div>

                            </div>
                            <div class="card" ng-show="btnimage">
                                <h5 class="card-header text-green">Employee Image </h5>
                                <div class="card-body">

                                    <img ng-src="{{Imagepath}}" ng-hide="Imagepath == null || Imagepath == '' "
                                        ng-show="Imagepath != null " class="img-thumbnail mr-3" alt="Employee_image"
                                        style="width:150px;height:150px;">
                                </div>

                            </div>
                            <div class="card" ng-show="btnpromotion">
                                <h5 class="card-header text-green">Department / Designation Details</h5>
                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered  table-sm table-striped">
                                                    <thead>
                                                        <tr>

                                                            <th>No</th>
                                                            <th scope="col">Department</th>
                                                            <th scope="col">Designation</th>

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



                                </div>

                            </div>
                            <div class="card" ng-show="btnbank">
                                <h5 class="card-header text-green">Bank Account Details</h5>
                                <div class="card-body">


                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label">Bankname</label>
                                            <input class="form-control" ng-model="Bankname" readonly />


                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label">Account Holder Name</label>
                                            <input class="form-control" ng-model="Empnameaspassbook" readonly />


                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="col-form-label">Accountno</label>
                                            <input class="form-control" ng-model="Accountno" readonly />


                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="col-form-label">IFSCcode</label>
                                            <input class="form-control" ng-model="IFSCcode" readonly />


                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="col-form-label">Branch</label>
                                            <input class="form-control" ng-model="Branch" readonly />


                                        </div>



                                        <div class="form-group col-md-12">
                                            <span class="required">NOTE : {{BankMessage}}</span>
                                        </div>
                                        <div class="col-md-12 mt-2">

                                            <iframe ng-src="{{Emppassbook}}"
                                                ng-hide="Emppassbook == null || Emppassbook == '' "
                                                ng-show="Emppassbook != null " style="height:350px;width:100%"></iframe>
                                        </div>






                                    </div>


                                </div>
                                <h5 class="card-header text-green">Reference Details</h5>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3 class="text-green" style="margin-left: 15px;">Reference 1
                                                Detail</h3>
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Reference Name</label>
                                                <input class="form-control" ng-model="Reference1name" readonly />


                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Relationship</label>
                                                <input class="form-control" ng-model="Ref1relationship" readonly />


                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Contactno</label>
                                                <input class="form-control" ng-model="Reference1contactno" readonly />


                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Address</label>
                                                <input class="form-control" ng-model="Reference1address" readonly />


                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <h3 class="text-green" style="margin-left: 15px;">Reference 2
                                                Detail</h3>
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Reference Name</label>
                                                <input class="form-control" ng-model="Reference2name" readonly />


                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Relationship</label>
                                                <input class="form-control" ng-model="Ref2relationship" readonly />


                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Contactno</label>
                                                <input class="form-control" ng-model="Reference2contactno" readonly />


                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Address</label>
                                                <input class="form-control" ng-model="Reference2address" readonly />


                                            </div>
                                        </div>




                                    </div>


                                </div>

                            </div>




                            <div class="card" ng-show="btnvaccination">
                                <h5 class="card-header text-green pl-0">Vaccination Details</h5>

                                <div class="card-body">


                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="table-responsive">
                                                <table class="table   table-sm" style="width: 100%;">
                                                    <thead>
                                                        <tr>

                                                            <th>No</th>
                                                            <th scope="col">
                                                                Vaccinated
                                                            </th>
                                                            <th scope="col">
                                                                Date
                                                            </th>



                                                            <th scope="col">Action
                                                            </th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                    <tbody>



                                                        <tr dir-paginate="e in GetVaccinationList|filter:searchVaccination|itemsPerPage:5 "
                                                            pagination-id="Vaccinationgrid"
                                                            current-page="currentPageVaccination">




                                                            <td style="width: 50px;">
                                                                {{$index+1 + (currentPageVaccination - 1) * pageSizeVaccination}}
                                                            </td>
                                                            <td>{{e.Vacinationtype}}
                                                            </td>
                                                            <td>{{e.Vaccinationdate2}}
                                                            </td>

                                                            </td>




                                                            <td>
                                                                <div class="action-btn">

                                                                    <img height="15"
                                                                        ng-click="FetchCovidvaccination(e.Employeeid,e.Sno);"
                                                                        data-toggle="modal"
                                                                        data-target="#ModalCenter1Certificate"
                                                                        src="<?php echo "$domain"; ?>/assets/icons/view.png">



                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="pagination">
                                                <dir-pagination-controls pagination-id="Vaccinationgrid" max-size="3"
                                                    direction-links="true" boundary-links="true" class="pagination">
                                                </dir-pagination-controls>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card" ng-show="btnsipltamil">
                                <h5 class="card-header text-green">Application Detail In Tamil/Hindi</h5>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Employee Details </label>
                                            <div class="input-group">

                                                <div class="input-group-append">
                                                    <button class="btn  btn-success"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmployeeDetailDocumentView">
                                                        Tamil</button>
                                                    <button class="btn  btn-warning"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmployeeDetailHindiDocumnetView">
                                                        Hindi</button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Form-34 </label>
                                            <div class="input-group">

                                                <div class="input-group-append">
                                                    <button class="btn  btn-success"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterForm34TamilDocumentView">
                                                        Tamil</button>
                                                    <button class="btn  btn-warning"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterForm34HindiDocumentView">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-form-label">Attention Of The Employee
                                            </label>
                                            <div class="input-group">

                                                <div class="input-group-append">
                                                    <button class="btn  btn-success"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEMPAttentionTamilDocumentView">
                                                        Tamil</button>
                                                    <button class="btn  btn-warning"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEMPAttentionHindiDocumentView">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-form-label">Employee Declaration Form
                                            </label>
                                            <div class="input-group">

                                                <div class="input-group-append">
                                                    <button class="btn  btn-success"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmpDeclarationtamilDocumentView">
                                                        Tamil</button>
                                                    <button class="btn  btn-warning"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmpDeclarationHindiDocumentView">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Employee Stating
                                            </label>
                                            <div class="input-group">

                                                <div class="input-group-append">
                                                    <button class="btn  btn-success"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmpStatingTamilDocumentView">
                                                        Tamil</button>
                                                    <button class="btn  btn-warning"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmpStatingHindiDocumentView">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Employee Agreement
                                            </label>
                                            <div class="input-group">

                                                <div class="input-group-append">
                                                    <button class="btn  btn-success"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmpAgreementTamilDocumentView">
                                                        Tamil</button>
                                                    <button class="btn  btn-warning"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmpAgreementHindiDocumentView">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <label class="col-form-label">Employee
                                                Training </label>
                                            <div class="input-group">

                                                <div class="input-group-append">
                                                    <button class="btn  btn-success"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmpTrainingTamilDocumentView">
                                                        Tamil</button>
                                                    <button class="btn  btn-warning"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmpTrainingHindiDocumentView
                                                                    ">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-form-label">Service
                                                Improvement Record </label>
                                            <div class="input-group">

                                                <div class="input-group-append">
                                                    <button class="btn  btn-success"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmpServiceTamilDocumentView">
                                                        Tamil</button>
                                                    <button class="btn  btn-warning"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmpServiceHindiDocumentView">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Form-2
                                                Revised </label>
                                            <div class="input-group">

                                                <div class="input-group-append">
                                                    <button class="btn  btn-success"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmpForm2RevisedTamilDocumentView">
                                                        Tamil</button>
                                                    <button class="btn  btn-warning"
                                                        ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                        data-target="#ModalCenterEmpForm2RevisedHindiDocumentView">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                    <?php include 'Empapp.php'?>
                    <?php include 'Empasset/Assetpopup.php'?>

                </div>

            </div>
        </div>























        <?php include '../footer.php'?>
    </div>




    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/jspdf.min.js"></script>

    <script src="../Scripts/html2canvas/html2canvas.min.js"></script>
    <script src="../Scripts/Controller/HRM10Controller.js"></script>
    <script type="text/javascript">
    function Validate(event) {
        var regex = new RegExp("^[0-9-/()]");
        var key = String.fromCharCode(event.charCode ? event.which : event
            .charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
    </script>

    <script type="text/javascript">
    function Validateamt(event) {
        var regex = new RegExp("^[0-9-/.()]");
        var key = String.fromCharCode(event.charCode ? event.which : event
            .charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
    </script>

    <script type="text/javascript">
    $(".tab-list ul").on('click', 'li', function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });
    </script>
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
    <title>View Employee Details</title>
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


                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <div class="mt-3">
                                <h5 class="text-green " style="margin-top:10px">View Employee Details</h5>
                                <hr/>

                                <div class="table-responsive">
                                    <table class="table table-bordered  table-sm table-striped">
                                        <thead>
                                            <tr class="text-green">

                                                <th>No</th>
                                                <th scope="col" style="width: 100px;">
                                                    Employee ID</th>
                                                <th scope="col" style="width: 200px;">Name</th>
                                                <th scope="col" style="width: 60px;">Gender</th>
                                                <th scope="col">Department</th>
                                                <th scope="col">Designation</th>

                                                <th scope="col" style="width: 100px;">Contact</th>
                                                <th scope="col" style="width: 50px;">Mobile</th>
                                                <th scope="col" style="width: 50px;">Mail</th>
                                                <th scope="col" style="width: 50px;">Action</th>
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



                                                <td>
                                                    <div class="input-group ">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchEmployee.Contactno">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group ">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchEmployee.Smsverified">

                                                    </div>
                                                </td>
                                                <td colspan="2">
                                                    <div class="input-group ">
                                                        <input type="text" class="form-control"
                                                            ng-model="searchEmployeessss.Emailverified"
                                                            autocomplete="off">

                                                    </div>
                                                </td>


                                                </td>


                                            </tr>
                                            <tr dir-paginate="e in GetEmployeeList |filter:searchEmployee|itemsPerPage:10 "
                                                pagination-id="Employeegrid" current-page="currentPageEmp">




                                                <td style="width: 50px;">
                                                    {{$index+1 + (currentPageEmp - 1) * pageSizeEmp}}
                                                </td>
                                                <td>{{e.Employeeid}}</td>
                                                <td>{{e.Title}} {{e.Fullname}}</td>
                                                <td>{{e.Gender}}</td>
                                                <td>{{e.Department}}</td>
                                                <td>{{e.Designation}}</td>

                                                <td>{{e.Contactno}}</td>

                                                <td align="center" ng-show="e.Smsverified=='Yes'">
                                                    <img title="Mobile Verified" height="15"
                                                        src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                                </td>
                                                <td align="center" ng-show="e.Smsverified!='Yes'"
                                                    title="Mobile Not Verified">
                                                    <img height="15"
                                                        src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                                </td>
                                                <td align="center" ng-show="e.Emailverified=='Yes'"
                                                    title="Email Verified">
                                                    <img height="15"
                                                        src="<?php echo "$domain"; ?>/assets/images/verified.png" />
                                                </td>
                                                <td align="center" ng-show="e.Emailverified!='Yes'"
                                                    title="Email Not Verified">
                                                    <img height="15"
                                                        src="<?php echo "$domain"; ?>/assets/images/Notverified.png" />
                                                </td>
                                                <td>
                                                    <div class="action-btn">
                                                        <img height="15" ng-click="SendEdit02(e.Employeeid);"
                                                            src="<?php echo "$domain"; ?>/assets/icons/view.png">




                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>

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


                        <div class="carousel-item">
                            <div class="mt-3">
                                <h5 class="text-green">Employee Details</h5>
                                    <hr/>

                                <div class="">

                                    <div class="row">


                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Employee ID</label>
                                            <input class="form-control" ng-model="Employeeid" readonly />

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">First Name</label>
                                            <div class="input-group "><span class="input-group-prepend">
                                                    <input class="form-control" ng-model="Title" readonly />
                                                    <input class="form-control" ng-model="Firstname" readonly />


                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Last Name </label>
                                            <input class="form-control" ng-model="Lastname" readonly />



                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Gender</label>
                                            <input class="form-control" ng-model="Gender" readonly />


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Category</label>
                                            <input class="form-control" ng-model="Category" readonly />


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Marital Status</label>
                                            <input class="form-control" ng-model="Married" readonly />


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">MotherTongue </label>
                                            <input class="form-control" ng-model="Mothertongue" readonly />


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Contact No</label>
                                            <input class="form-control" ng-model="Contactno" readonly />


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Nationality</label>
                                            <input class="form-control" ng-model="Nationality" readonly />

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Email-ID</label>
                                            <input class="form-control" ng-model="Emailid" readonly />

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Employee Type</label>
                                            <input class="form-control" ng-model="EmployeeType" readonly />


                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Department</label>
                                            <input class="form-control" ng-model="EmpDepartment" readonly />

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Designation</label>
                                            <input class="form-control" ng-model="EmpDesignation" readonly />


                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Qualification</label>
                                            <input class="form-control" ng-model="Highestqualification" readonly />


                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Father/ Spouse Name</label>
                                            <input class="form-control" ng-model="FatherGuardianSpouseName" readonly />

                                        </div>


                                        <div class="text-right" style="margin-top:19px">

                                            <button class="btn btn-sm btn-warning" data-target="#myCarousel"
                                                data-slide-to="0"><i class="fa fa-arrow-left"></i>
                                                Back</button>
                                        </div>


                                    </div>

                                    <div class="alert alert-success" role="alert" ng-show="Message" id='msg1'>
                                        {{Message}}
                                    </div>
                                    <div class="tab-list" style="overflow-x: hidden; padding-right: 0px;">
                                        <ul class="nav nav-pills nav-fill">
                                            <li class="nav-item" ng-click="fnotherinfo();"><a>Personal</a>
                                            </li>
                                            <li class="nav-item" ng-click="fneducationinfo();">
                                                <a>Education & Address</a>
                                            </li>

                                            <li class="nav-item" ng-click="fnpropertychecklistinfo();">
                                                <a>Asset</a>
                                            </li>
                                            <li class="nav-item" ng-click="fnbankinfo();"><a>Bank Info & Reference
                                                </a></li>
                                            <li class="nav-item" ng-click="fnfamilyinfo();"><a>Family Info
                                                </a></li>

                                            <li class="nav-item" ng-click="fnvaccinationinfo();">
                                                <a>Vaccination</a>
                                            </li>
                                            <li class="nav-item" ng-click="fnsalaryinfo();"><a>Salary </a>
                                            </li>
                                            <li class="nav-item" ng-click="fndocinfo();"><a>Doc info</a>
                                            </li>
                                            <li class="nav-item" ng-click="fnimageinfo();"><a>Image</a></li>
                                            <li class="nav-item" ng-click="fnappraisalinfo();"><a>Appraisal
                                                </a></li>
                                            <li class="nav-item" ng-click="fnpromotioninfo();">
                                                <a>Promotion</a>
                                            </li>

                                            <li class="nav-item" ng-click="fnsiplTamil();">
                                                <a>Application</a>
                                            </li>





                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card" ng-show="btnotherinformation">
                                <h5 class="card-header text-green">Personal Information</h5>
                                <div class="card-body">



                                    <div class="col-md-12">

                                        <div class="row">


                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">DOB</label>
                                                <input class="form-control" ng-model="Dob" readonly />


                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Languages</label>
                                                <input class="form-control" ng-model="Languagestest" readonly />

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Age</label>
                                                <input class="form-control" ng-model="Age" readonly />


                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Blood Group</label>
                                                <input class="form-control" ng-model="Bloodgroup" readonly />


                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Experience</label>
                                                <input class="form-control" ng-model="Expereience" readonly />


                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Fresher</label>
                                                <input class="form-control" ng-model="Fresher" readonly />


                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Date Of Joining</label>
                                                <input class="form-control" ng-model="Date_Of_Joing2" readonly />

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Shift Pattern</label>
                                                <input class="form-control" ng-model="Shift" readonly />

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">OT Applicability</label>
                                                <input class="form-control" ng-model="AllowOT" readonly />

                                            </div>
                                            <!-- <div class="form-group col-md-3">
                                                            <label class="col-form-label">Allow LOP</label>
                                                            <input class="form-control" ng-model="AllowLOP" readonly />


                                                        </div> -->

                                            <!-- <div class="form-group col-md-3">
                                                            <label class="col-form-label">Salary Mode</label>
                                                            <input class="form-control" ng-model="Salary_Mode"
                                                                readonly />


                                                        </div> -->
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Weekly Off</label>
                                                <input class="form-control" ng-model="Weekoff" readonly />


                                            </div>
                                            <!-- <div class="form-group col-md-3">
                                                            <label class="col-form-label">Employee CL</label>
                                                            <input class="form-control" ng-model="Employee_CL"
                                                                readonly />


                                                        </div> -->

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">UAN No</label>
                                                <input class="form-control" ng-model="UANno" readonly />


                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">ESI No </label>
                                                <input class="form-control" ng-model="ESIno" readonly />


                                            </div>
                                            <!-- <div class="form-group col-md-3">
                                                            <label class="col-form-label">Aadhar No</label>
                                                            <input class="form-control" ng-model="Aadharno" readonly />


                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">PAN No</label>
                                                            <input class="form-control" ng-model="Panno" readonly />


                                                        </div> -->
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">PF Joining Date</label>
                                                <input class="form-control" ng-model="PFJoiningdate" readonly />

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">ESI Joining Date </label>
                                                <input class="form-control" ng-model="ESIJoiningdate" readonly />


                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Official Mail ID </label>
                                                <input type="email" class="form-control" ng-model="OfficemailID"
                                                    readonly>
                                            </div>
                                            <div class="form-group col-md-6" ng-show="btnverification">
                                                <label class="col-form-label">Background Verification
                                                    Document
                                                </label>
                                                <div class="input-group">

                                                    <p class="input-group-text" ng-click="FetchEmployee(Employeeid);"
                                                        data-toggle="modal"
                                                        data-target="#ModalCenter1EMPBackgroundView">
                                                        <i class="fa fa-file"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-3" ng-show="btnverification">
                                            <label class="col-form-label">Background Verification
                                                Completed</label>

                                            <input class="form-control" ng-model="BackgroundVerification" readonly />

                                        </div>



                                    </div>

                                </div>
                            </div>





                            <div class="card" ng-show="btnPropertyChecklist">
                                <?php include 'Empasset/Assetview.php' ?>
                            </div>

                            <div class="card" ng-show="btnaddress">
                                <h5 class="card-header">Permanent and Temporary Address Detail</h5>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                <h3>Temporary Address Detail</h3>
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <td> <label class="col-form-label">Address</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" ng-model="CurrentAddress"
                                                                readonly />


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Country</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="CurrentCountry"
                                                                readonly />

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> <label class="col-form-label">State</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="CurrentState"
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
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                            <div class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                <h3>Permanent Address Details</h3>
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <td> <label class="col-form-label">Address</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentAddress"
                                                                readonly />


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Country</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentCountry"
                                                                readonly />

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> <label class="col-form-label">State</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentState"
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">City</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentCity"
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Pincode</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" ng-model="PermanentPincode"
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card" ng-show="btnEducation">
                                <h5 class="card-header text-green">Employee Education Details</h5>
                                <div class="card-body">


                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered  table-sm table-striped"
                                                style="width: 100%">
                                                <thead>
                                                    <tr>

                                                        <th>No</th>
                                                        <th scope="col">Studies</th>
                                                        <th scope="col">University</th>
                                                        <th scope="col">Grade</th>
                                                        <th scope="col">Year</th>
                                                        <th>Education Mode</th>
                                                        <th>Specialization</th>
                                                        <th scope="col">Action</th>
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
                                                        <td>{{e.EducationMode}}</td>
                                                        <td>{{e.Specialization}}</td>




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
                                <h5 class="card-header">Permanent and Temporary Address Detail</h5>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                <h3>Temporary Address Detail</h3>
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <td> <label class="col-form-label">Address</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" ng-model="CurrentAddress"
                                                                readonly />


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Country</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="CurrentCountry"
                                                                readonly />

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> <label class="col-form-label">State</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="CurrentState"
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
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                            <div class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                <h3>Permanent Address Details</h3>
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <td> <label class="col-form-label">Address</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentAddress"
                                                                readonly />


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Country</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentCountry"
                                                                readonly />

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> <label class="col-form-label">State</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentState"
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">City</label>
                                                        </td>
                                                        <td><input class="form-control" ng-model="PermanentCity"
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="col-form-label">Pincode</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" ng-model="PermanentPincode"
                                                                readonly />

                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card" ng-show="btnFamily">
                                <h5 class="card-header text-green">Employee Family Details</h5>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="table-responsive">
                                                    <table class="table table-bordered  table-sm table-striped"
                                                        style="width: 100%">
                                                        <thead>
                                                            <tr>

                                                                <th>No</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Relationship</th>
                                                                <th scope="col">Age</th>
                                                                <th scope="col">Contactno</th>
                                                                <th scope="col">Occupation</th>



                                                            </tr>
                                                        </thead>


                                                        <tbody>

                                                            <tr dir-paginate="e in GetFamilyList |filter:searchFamily|itemsPerPage:10 "
                                                                pagination-id="Familygrid"
                                                                current-page="currentPageFamily">




                                                                <td style="width: 50px;">
                                                                    {{$index+1 + (currentPageFamily - 1) * pageSizeFamily}}
                                                                </td>
                                                                <td>{{e.Name}}</td>
                                                                <td>{{e.Relationship}}</td>
                                                                <td>{{e.Age}}</td>
                                                                <td>{{e.Contactno}}</td>
                                                                <td>{{e.Occupation}}</td>





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

                                    </div>

                                </div>

                            </div>

                            <div class="card" ng-show="btnappraisal">
                                <h5 class="card-header text-green">Appraisal Details</h5>
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
                                                    pagination-id="Apperesialgrid" current-page="currentPageApp">




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
                            <div class="card" ng-show="btnReference">
                                <h5 class="card-header text-green">Reference Details</h5>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="text-green" style="margin-left: 15px;">Reference 1
                                                    Detail</h3>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Reference_Name</label>
                                                    <input class="form-control" ng-model="Reference1name" readonly />


                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Contactno</label>
                                                    <input class="form-control" ng-model="Reference1contactno"
                                                        readonly />


                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Address</label>
                                                    <input class="form-control" ng-model="Reference1address" readonly />


                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <h3 class="text-green" style="margin-left: 15px;">Reference 2
                                                    Detail</h3>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Reference_Name</label>
                                                    <input class="form-control" ng-model="Reference2name" readonly />


                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Contactno</label>
                                                    <input class="form-control" ng-model="Reference2contactno"
                                                        readonly />


                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Address</label>
                                                    <input class="form-control" ng-model="Reference2address" readonly />


                                                </div>
                                            </div>




                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="card" ng-show="btnsalary">
                                <h5 class="card-header text-green">Salary Information</h5>
                                <div class="card-body">


                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Basic+Da</label>
                                            <span class="form-control" ng-bind="Basic"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">HR Allowance</label>
                                            <span class="form-control" ng-bind="HR_Allowance"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label"> Conveyence </label>
                                            <span class="form-control" ng-bind="TA"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label"> Performance allowance </label>
                                            <span class="form-control" ng-bind="Performance_allowance"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Day allowance</label>
                                            <span class="form-control" ng-bind="Day_allowance"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">PF</label>
                                            <span class="form-control" ng-bind="PF"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">ESI</label>
                                            <span class="form-control" ng-bind="ESI"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">TDS</label>
                                            <span class="form-control" ng-bind="TDS"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Professional tax</label>
                                            <span class="form-control" ng-bind="Professional_tax"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Net Salary</label>
                                            <span class="form-control" ng-bind="Net_Salary"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Gross Salary</label>
                                            <span class="form-control" ng-bind="Gross_Salary"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Other Allowance</label>
                                            <span class="form-control" ng-bind="Other_Allowance"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">PF Yes/no</label>
                                            <span class="form-control" ng-bind="PF_Yesandno"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">ESI Yes/no</label>
                                            <span class="form-control" ng-bind="ESI_Yesandno"></span>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">ESI Over limit</label>
                                            <span class="form-control" ng-bind="ESIOverlimit"></span>

                                        </div>



                                    </div>



                                </div>

                            </div>
                            <div class="card" ng-show="btndoc">
                            <h5 class="card-header text-green">Employee Document Details</h5>
                            <div class="card-body">


                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="table-responsive">
                                            <table class="table table-bordered  table-sm table-striped">
                                                <thead>
                                                    <tr>

                                                        <th>No</th>
                                                        <th scope="col">Doctype</th>
                                                        <th scope="col">Document_No</th>
                                                        <!-- <th scope="col">Document_Path</th> -->



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

                            </div>

                        </div>
                        <div class="card" ng-show="btnimage">
                            <h5 class="card-header text-green">Employee Image </h5>
                            <div class="card-body">

                                <img ng-src="{{Imagepath}}" ng-hide="Imagepath == null || Imagepath == '' "
                                    ng-show="Imagepath != null " class="img-thumbnail mr-3" alt="Employee_image"
                                    style="width:150px;height:150px;">
                            </div>

                        </div>
                        <div class="card" ng-show="btnpromotion">
                            <h5 class="card-header text-green">Department / Designation Details</h5>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered  table-sm table-striped">
                                                <thead>
                                                    <tr>

                                                        <th>No</th>
                                                        <th scope="col">Department</th>
                                                        <th scope="col">Designation</th>

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



                            </div>

                        </div>
                        <div class="card" ng-show="btnbank">
                            <h5 class="card-header text-green">Bank Account Details</h5>
                            <div class="card-body">


                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-form-label">Bankname</label>
                                        <input class="form-control" ng-model="Bankname" readonly />


                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-form-label">Account Holder Name</label>
                                        <input class="form-control" ng-model="Empnameaspassbook" readonly />


                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="col-form-label">Accountno</label>
                                        <input class="form-control" ng-model="Accountno" readonly />


                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="col-form-label">IFSCcode</label>
                                        <input class="form-control" ng-model="IFSCcode" readonly />


                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="col-form-label">Branch</label>
                                        <input class="form-control" ng-model="Branch" readonly />


                                    </div>



                                    <div class="form-group col-md-12">
                                        <span class="required">NOTE : {{BankMessage}}</span>
                                    </div>
                                    <div class="col-md-12 mt-2">

                                        <iframe ng-src="{{Emppassbook}}"
                                            ng-hide="Emppassbook == null || Emppassbook == '' "
                                            ng-show="Emppassbook != null " style="height:350px;width:100%"></iframe>
                                    </div>






                                </div>


                            </div>
                            <h5 class="card-header text-green">Reference Details</h5>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="text-green" style="margin-left: 15px;">Reference 1
                                            Detail</h3>
                                        <div class="form-group col-md-12">
                                            <label class="col-form-label">Reference Name</label>
                                            <input class="form-control" ng-model="Reference1name" readonly />


                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-form-label">Relationship</label>
                                            <input class="form-control" ng-model="Ref1relationship" readonly />


                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-form-label">Contactno</label>
                                            <input class="form-control" ng-model="Reference1contactno" readonly />


                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-form-label">Address</label>
                                            <input class="form-control" ng-model="Reference1address" readonly />


                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <h3 class="text-green" style="margin-left: 15px;">Reference 2
                                            Detail</h3>
                                        <div class="form-group col-md-12">
                                            <label class="col-form-label">Reference Name</label>
                                            <input class="form-control" ng-model="Reference2name" readonly />


                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-form-label">Relationship</label>
                                            <input class="form-control" ng-model="Ref2relationship" readonly />


                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-form-label">Contactno</label>
                                            <input class="form-control" ng-model="Reference2contactno" readonly />


                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-form-label">Address</label>
                                            <input class="form-control" ng-model="Reference2address" readonly />


                                        </div>
                                    </div>




                                </div>


                            </div>

                        </div>



                           
                        <div class="card" ng-show="btnvaccination">
                            <h5 class="card-header text-green pl-0">Vaccination Details</h5>

                            <div class="card-body">


                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="table-responsive">
                                            <table class="table   table-sm" style="width: 100%;">
                                                <thead>
                                                    <tr>

                                                        <th>No</th>
                                                        <th scope="col">
                                                            Vaccinated
                                                        </th>
                                                        <th scope="col">
                                                            Date
                                                        </th>



                                                        <th scope="col">Action
                                                        </th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                <tbody>



                                                    <tr dir-paginate="e in GetVaccinationList|filter:searchVaccination|itemsPerPage:5 "
                                                        pagination-id="Vaccinationgrid"
                                                        current-page="currentPageVaccination">




                                                        <td style="width: 50px;">
                                                            {{$index+1 + (currentPageVaccination - 1) * pageSizeVaccination}}
                                                        </td>
                                                        <td>{{e.Vacinationtype}}
                                                        </td>
                                                        <td>{{e.Vaccinationdate2}}
                                                        </td>

                                                        </td>




                                                        <td>
                                                            <div class="action-btn">

                                                                <img height="15"
                                                                    ng-click="FetchCovidvaccination(e.Employeeid,e.Sno);"
                                                                    data-toggle="modal"
                                                                    data-target="#ModalCenter1Certificate"
                                                                    src="<?php echo "$domain"; ?>/assets/icons/view.png">



                                                            </div>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="pagination">
                                            <dir-pagination-controls pagination-id="Vaccinationgrid" max-size="3"
                                                direction-links="true" boundary-links="true" class="pagination">
                                            </dir-pagination-controls>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card" ng-show="btnsipltamil">
                            <h5 class="card-header text-green">Application Detail In Tamil/Hindi</h5>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="col-form-label">Employee Details </label>
                                        <div class="input-group">

                                            <div class="input-group-append">
                                                <button class="btn  btn-success"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmployeeDetailDocumentView">
                                                    Tamil</button>
                                                <button class="btn  btn-warning"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmployeeDetailHindiDocumnetView">
                                                    Hindi</button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-2">
                                        <label class="col-form-label">Form-34 </label>
                                        <div class="input-group">

                                            <div class="input-group-append">
                                                <button class="btn  btn-success"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterForm34TamilDocumentView">
                                                    Tamil</button>
                                                <button class="btn  btn-warning"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterForm34HindiDocumentView">
                                                    Hindi</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Attention Of The Employee
                                        </label>
                                        <div class="input-group">

                                            <div class="input-group-append">
                                                <button class="btn  btn-success"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEMPAttentionTamilDocumentView">
                                                    Tamil</button>
                                                <button class="btn  btn-warning"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEMPAttentionHindiDocumentView">
                                                    Hindi</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Employee Declaration Form
                                        </label>
                                        <div class="input-group">

                                            <div class="input-group-append">
                                                <button class="btn  btn-success"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmpDeclarationtamilDocumentView">
                                                    Tamil</button>
                                                <button class="btn  btn-warning"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmpDeclarationHindiDocumentView">
                                                    Hindi</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="col-form-label">Employee Stating
                                        </label>
                                        <div class="input-group">

                                            <div class="input-group-append">
                                                <button class="btn  btn-success"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmpStatingTamilDocumentView">
                                                    Tamil</button>
                                                <button class="btn  btn-warning"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmpStatingHindiDocumentView">
                                                    Hindi</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="col-form-label">Employee Agreement
                                        </label>
                                        <div class="input-group">

                                            <div class="input-group-append">
                                                <button class="btn  btn-success"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmpAgreementTamilDocumentView">
                                                    Tamil</button>
                                                <button class="btn  btn-warning"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmpAgreementHindiDocumentView">
                                                    Hindi</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <label class="col-form-label">Employee
                                            Training </label>
                                        <div class="input-group">

                                            <div class="input-group-append">
                                                <button class="btn  btn-success"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmpTrainingTamilDocumentView">
                                                    Tamil</button>
                                                <button class="btn  btn-warning"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmpTrainingHindiDocumentView
                                                                    ">
                                                    Hindi</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Service
                                            Improvement Record </label>
                                        <div class="input-group">

                                            <div class="input-group-append">
                                                <button class="btn  btn-success"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmpServiceTamilDocumentView">
                                                    Tamil</button>
                                                <button class="btn  btn-warning"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmpServiceHindiDocumentView">
                                                    Hindi</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="col-form-label">Form-2
                                            Revised </label>
                                        <div class="input-group">

                                            <div class="input-group-append">
                                                <button class="btn  btn-success"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmpForm2RevisedTamilDocumentView">
                                                    Tamil</button>
                                                <button class="btn  btn-warning"
                                                    ng-click="FetchSIPLDocument(Employeeid);" data-toggle="modal"
                                                    data-target="#ModalCenterEmpForm2RevisedHindiDocumentView">
                                                    Hindi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                        </div>
                    </div>
                    <?php include 'Empapp.php'?>
                    <?php include 'Empasset/Assetpopup.php'?>

                </div>

            </div>
        </div>























        <?php include '../footer.php'?>
    </div>




    </div>

    <?php include '../footerjs.php'?>
    <script src="../Scripts/jspdf.min.js"></script>

    <script src="../Scripts/html2canvas/html2canvas.min.js"></script>
    <script src="../Scripts/Controller/HRM10Controller.js"></script>
    <script type="text/javascript">
    function Validate(event) {
        var regex = new RegExp("^[0-9-/()]");
        var key = String.fromCharCode(event.charCode ? event.which : event
            .charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
    </script>

    <script type="text/javascript">
    function Validateamt(event) {
        var regex = new RegExp("^[0-9-/.()]");
        var key = String.fromCharCode(event.charCode ? event.which : event
            .charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
    </script>

    <script type="text/javascript">
    $(".tab-list ul").on('click', 'li', function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });
    </script>
</body>

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>