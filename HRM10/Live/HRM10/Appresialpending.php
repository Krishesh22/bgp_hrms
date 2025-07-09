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
    <title>Appraisal Peniding Details</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM10Controller">
            <div class="container-fluid">


                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <div class="container-fluid dashboard-content">
                                <div class="row">
                                    <div class="col-xl-12">

                                        <div class="card">
                                            <h5 class="card-header text-green">Employee Details</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered  table-sm table-striped">
                                                                <thead>
                                                                    <tr class="text-green">

                                                                        <th>No</th>
                                                                        <th scope="col" style="width: 100px;">
                                                                            Employee ID</th>
                                                                        <th scope="col" style="width: 200px;">Name</th>
                                                                        <th scope="col" style="width: 90px;">Gender</th>
                                                                        <th scope="col">Department</th>
                                                                        <th scope="col">Designation</th>

                                                                        <th scope="col">Contact</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="searchEmployee.Employeeid">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-search"></i></span>
                                                                                </div>
                                                                            </div>

                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="searchEmployee.Fullname">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-search"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="searchEmployee.Gender">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-search"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="searchEmployee.Department">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-search"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="searchEmployee.Designation">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-search"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </td>

                                                                        <td colspan="2">
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="searchEmployee.Contactno">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-search"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </td>


                                                                        </td>


                                                                    </tr>
                                                                    <tr dir-paginate="e in GetAPPEmployeeList |filter:searchEmployee|itemsPerPage:10 "
                                                                        pagination-id="Employeegrid"
                                                                        current-page="currentPageEmp">




                                                                        <td style="width: 50px;">
                                                                            {{$index+1 + (currentPageEmp - 1) * pageSizeEmp}}
                                                                        </td>
                                                                        <td>{{e.Employeeid}}</td>
                                                                        <td>{{e.Title}} {{e.Fullname}}</td>
                                                                        <td>{{e.Gender}}</td>
                                                                        <td>{{e.Department}}</td>
                                                                        <td>{{e.Designation}}</td>

                                                                        <td>{{e.Contactno}}</td>


                                                                        <td>
                                                                            <div class="action-btn">
                                                                                <img height="15"
                                                                                    ng-click="SendEdit(e.Employeeid);"
                                                                                    src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="float-right mt-2">
                                                    <div class="pagination ">
                                                        <dir-pagination-controls pagination-id="Employeegrid"
                                                            max-size="3" direction-links="true" boundary-links="true"
                                                            class="pagination">
                                                        </dir-pagination-controls>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="carousel-item">
                            <div class="container-fluid dashboard-content">
                                <div class="row">
                                    <div class="col-md-12">




                                        <div class="card">
                                            <h5 class="card-header text-green">Employee Details - {{LastAppresialDate2}}</h5>
                                            <div class="card-body">


                                                <div class="row">


                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Employee ID</label>
                                                        <input class="form-control" ng-model="Employeeid" readonly />

                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">First Name</label>
                                                        <div class="input-group "><span class="input-group-prepend">
                                                                <input class="form-control" ng-model="Title" readonly />
                                                                <input class="form-control" ng-model="Firstname"
                                                                    readonly />


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
                                                        <label class="col-form-label">Married</label>
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
                                                        <input class="form-control" ng-model="EmpDesignation"
                                                            readonly />


                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Qualification</label>
                                                        <input class="form-control" ng-model="Highestqualification"
                                                            readonly />


                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Father/ Spouse Name</label>
                                                        <input class="form-control" ng-model="FatherGuardianSpouseName"
                                                            readonly />

                                                    </div>


                                                    <div class="text-right mt-25">

                                                        <button class="btn btn-sm btn-warning" data-target="#myCarousel"
                                                            data-slide-to="0" ng-click="Getallvalues()"><i
                                                                class="fa fa-arrow-left"></i> Back</button>
                                                    </div>


                                                </div>

                                                <div class="alert alert-success" role="alert" ng-show="Message"
                                                    id='msg1'>
                                                    {{Message}}
                                                </div>
                                                <div class="tab-list" style="overflow-x: hidden; padding-right: 0px;">
                                                    <ul class="nav nav-pills nav-fill">
                                                        <li class="nav-item" ng-click="fnotherinfo();"><a>Personal</a>
                                                        </li>
                                                        <li class="nav-item" ng-click="fneducationinfo();">
                                                            <a>Eduction</a>
                                                        </li>
                                                        <li class="nav-item" ng-click="fnaddressinfo();">
                                                            <a>Address</a>
                                                        </li>
                                                        <li class="nav-item" ng-click="fnbankinfo();"><a>Bank
                                                                Account</a></li>
                                                        <li class="nav-item" ng-click="fnfamilyinfo();"><a>Family Info
                                                            </a></li>
                                                        <li class="nav-item" ng-click="fnrefinfo();"><a>Reference</a>
                                                        </li>
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
                                                            <input class="form-control" ng-model="Languagestest"
                                                                readonly />

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Age</label>
                                                            <input class="form-control" ng-model="Age" readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Blood Group</label>
                                                            <input class="form-control" ng-model="Bloodgroup"
                                                                readonly />


                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Expereience</label>
                                                            <input class="form-control" ng-model="Expereience"
                                                                readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Fresher</label>
                                                            <input class="form-control" ng-model="Fresher" readonly />


                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Date Of Joing</label>
                                                            <input class="form-control" ng-model="Date_Of_Joing2"
                                                                readonly />

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Shift</label>
                                                            <input class="form-control" ng-model="Shift" readonly />

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Allow_OT</label>
                                                            <input class="form-control" ng-model="AllowOT" readonly />

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Allow_LOP</label>
                                                            <input class="form-control" ng-model="AllowLOP" readonly />


                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Salary_Mode</label>
                                                            <input class="form-control" ng-model="Salary_Mode"
                                                                readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Week_Off</label>
                                                            <input class="form-control" ng-model="Weekoff" readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Employee_CL</label>
                                                            <input class="form-control" ng-model="Employee_CL"
                                                                readonly />


                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">UAN No</label>
                                                            <input class="form-control" ng-model="UANno" readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">ESI No </label>
                                                            <input class="form-control" ng-model="ESIno" readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Aadhar No</label>
                                                            <input class="form-control" ng-model="Aadharno" readonly />


                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">PAN No</label>
                                                            <input class="form-control" ng-model="Panno" readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">PF Joining Date</label>
                                                            <input class="form-control" ng-model="PFJoiningdate"
                                                                readonly />

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">ESI Joining Date </label>
                                                            <input class="form-control" ng-model="ESIJoiningdate"
                                                                readonly />


                                                        </div>




                                                    </div>

                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="card" ng-show="btnaddress">
                                        <h5 class="card-header">Permanent and Temporary Address Detail</h5>
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                        <h3>Temporary Address Detail</h3>
                                                        <table class="table table-bordered table-sm">
                                                            <tr>
                                                                <td> <label class="col-form-label">Address</label>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control"
                                                                        ng-model="CurrentAddress" readonly />


                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Country</label>
                                                                </td>
                                                                <td><input class="form-control"
                                                                        ng-model="CurrentCountry" readonly />

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
                                                                <td> <input class="form-control"
                                                                        ng-model="CurrentPincode" readonly />

                                                                </td>
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
                                                                <td><input class="form-control"
                                                                        ng-model="PermanentAddress" readonly />


                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Country</label>
                                                                </td>
                                                                <td><input class="form-control"
                                                                        ng-model="PermanentCountry" readonly />

                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">State</label>
                                                                </td>
                                                                <td><input class="form-control"
                                                                        ng-model="PermanentState" readonly />

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
                                                                    <input class="form-control"
                                                                        ng-model="PermanentPincode" readonly />

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
                                                <div class="row">

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
                                                            <dir-pagination-controls pagination-id="Educationgrid"
                                                                max-size="3" direction-links="true"
                                                                boundary-links="true" class="pagination">
                                                            </dir-pagination-controls>


                                                        </div>

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
                                                            <dir-pagination-controls pagination-id="Familygrid"
                                                                max-size="3" direction-links="true"
                                                                boundary-links="true" class="pagination">
                                                            </dir-pagination-controls>


                                                        </div>
                                                    </div>
                                                </div>

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
                                                            <input class="form-control" ng-model="Reference1name"
                                                                readonly />


                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Contactno</label>
                                                            <input class="form-control" ng-model="Reference1contactno"
                                                                readonly />


                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Address</label>
                                                            <input class="form-control" ng-model="Reference1address"
                                                                readonly />


                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <h3 class="text-green" style="margin-left: 15px;">Reference 2
                                                            Detail</h3>
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Reference_Name</label>
                                                            <input class="form-control" ng-model="Reference2name"
                                                                readonly />


                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Contactno</label>
                                                            <input class="form-control" ng-model="Reference2contactno"
                                                                readonly />


                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Address</label>
                                                            <input class="form-control" ng-model="Reference2address"
                                                                readonly />


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
                                        <h5 class="card-header text-green">Salary Information</h5>
                                        <div class="card-body">


                                            <div class="row">

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Basic+Da</label>
                                                    <span class="form-control" ng-bind="Basic"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">HR_Allowance</label>
                                                    <span class="form-control" ng-bind="HR_Allowance"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label"> Travel Allowance </label>
                                                    <span class="form-control" ng-bind="TA"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label"> Performance_allowance </label>
                                                    <span class="form-control" ng-bind="Performance_allowance"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Day_allowance</label>
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
                                                    <label class="col-form-label">Professional_tax</label>
                                                    <span class="form-control" ng-bind="Professional_tax"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Net_Salary</label>
                                                    <span class="form-control" ng-bind="Net_Salary"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Gross_Salary</label>
                                                    <span class="form-control" ng-bind="Gross_Salary"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Other_Allowance</label>
                                                    <span class="form-control" ng-bind="Other_Allowance"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">PF_Yesandno</label>
                                                    <span class="form-control" ng-bind="PF_Yesandno"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">ESI_Yesandno</label>
                                                    <span class="form-control" ng-bind="ESI_Yesandno"></span>

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
                                                                    pagination-id="Docgrid"
                                                                    current-page="currentPageDoc">




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
                                                            direction-links="true" boundary-links="true"
                                                            class="pagination">
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
                                                ng-show="Imagepath != null " class="img-thumbnail mr-3"
                                                alt="Employee_image" style="width:150px;height:150px;">
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
                                                                    pagination-id="Deptgrid"
                                                                    current-page="currentPageDept">




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
                                                            direction-links="true" boundary-links="true"
                                                            class="pagination">
                                                        </dir-pagination-controls>


                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                    </div>
                                    <div class="card" ng-show="btnbank">
                                        <h5 class="card-header text-green">Bank Account Details</h5>
                                        <div class="card-body">
                                            <div class="col-lg-12">

                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="col-form-label">Bankname</label>
                                                        <input class="form-control" ng-model="Bankname" readonly />


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




                                                    <div class="col-md-12 mt-2">

                                                        <iframe ng-src="{{Emppassbook}}"
                                                            ng-hide="Emppassbook == null || Emppassbook == '' "
                                                            ng-show="Emppassbook != null "
                                                            style="height:350px;width:100%"></iframe>
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
                                                        <dir-pagination-controls pagination-id="Vaccinationgrid"
                                                            max-size="3" direction-links="true" boundary-links="true"
                                                            class="pagination">
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmployeeDetailDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterForm34TamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEMPAttentionTamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmpDeclarationtamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmpStatingTamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmpAgreementTamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmpTrainingTamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal" data-target="#ModalCenterEmpTrainingHindiDocumentView
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmpServiceTamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmpForm2RevisedTamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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

                        </div>

                    </div>
                </div>

                <div class="modal fade" id="ModalCenter1Education" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{EduNextno}}
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
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{FamilyNextno}}
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
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{DocNextno}}
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
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee- Document
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{DocumentView}}"
                                        ng-hide="DocumentView == null || DocumentView == '' "
                                        ng-show="DocumentView != null " style="height:400px;width:100%"></iframe>
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
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee- Document
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{EmpDocumentView}}"
                                        ng-hide="EmpDocumentView == null || EmpDocumentView == '' "
                                        ng-show="EmpDocumentView != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCenter1Vaccination" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{Vaccinatedsno}}
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
                                <button class="btn btn-rounded btn-danger" ng-click="DeleteVaccination();"
                                    data-dismiss="modal">Delete</button>
                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCenter1Certificate" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Vaccination-Details
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{VaccinationView}}"
                                        ng-hide="VaccinationView == null || VaccinationView == '' "
                                        ng-show="VaccinationView != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade" id="ModalCenter1EmployeeDetailTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    தொழிலாளர் பற்றிய விபரம்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label">Employee
                                                    Details </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpDetailtamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpDetailtamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmployeeDetailDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnempdetailtamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportempdetailtamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <center>
                                                            <h4>தொழிலாளர் பற்றிய
                                                                விபரம்</h4>
                                                        </center>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }

                                                        .candidate-photo {
                                                            display: inline-block;
                                                            height: 140px;
                                                            width: 140px;
                                                            padding: 40px;
                                                            text-align: center;
                                                            position: absolute;
                                                            right: 4.8%;

                                                            border: 1px solid #888888;
                                                        }
                                                        </style>


                                                        <img ng-src="{{Imagepath}}"
                                                            ng-hide="Imagepath == null || Imagepath == '' "
                                                            ng-show="Imagepath != null " alt="Employee_image"
                                                            class="candidate-photo">

                                                        <table cellpadding="5">
                                                            <tr>
                                                                <td>பெயர்</td>
                                                                <td>:
                                                                    {{Title}}{{Firstname}}{{Lastname}}
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>தொழிலாளர் எண்
                                                                </td>
                                                                <td>: {{Employeeid}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>பதவி</td>
                                                                <td>:
                                                                    {{EmpDesignation}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>பிரிவு / துறை
                                                                </td>
                                                                <td>:
                                                                    {{EmpDepartment}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>கல்வி தகுதி</td>
                                                                <td>:
                                                                    {{Highestqualification}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>பிறந்த தேதி /
                                                                    வயது</td>
                                                                <td>:
                                                                    {{Dob2}}/{{Age}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>திருமண நிலை</td>
                                                                <td>: {{Married}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>பாலினம்</td>
                                                                <td>: {{Gender}}
                                                                </td>
                                                            </tr>
                                                        </table>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        தற்போதைய
                                                                        முகவரி<br />
                                                                    </td>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        நிரந்தர
                                                                        முகவரி<br />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{CurrentAddress}}
                                                                        <br>
                                                                        {{CurrentCountry}}
                                                                        <br>
                                                                        {{CurrentState}}
                                                                        <br>
                                                                        {{CurrentCity}}
                                                                        <br>
                                                                        {{CurrentPincode}}
                                                                    </td>
                                                                    <td>{{PermanentAddress}}
                                                                        <br>
                                                                        {{PermanentCountry}}
                                                                        <br>
                                                                        {{PermanentState}}
                                                                        <br>
                                                                        {{PermanentCity}}
                                                                        <br>
                                                                        {{PermanentPincode}}
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p>அவசரகால தொடர்புக்கு
                                                            (குடும்ப உறுப்பினர்கள்)
                                                        </p>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:250px; text-align: center;">
                                                                        பெயர்<br />
                                                                    </td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        தொலைபேசி
                                                                        எண்<br />
                                                                    </td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        உறவுமுறை<br />
                                                                    </td>
                                                                </tr>

                                                                <tr dir-paginate="e in GetFamilyList |filter:searchFamily|itemsPerPage:10 "
                                                                    pagination-id="Familygrid"
                                                                    current-page="currentPageFamily">




                                                                    <td>{{e.Name}}
                                                                    </td>
                                                                    <td>{{e.Relationship}}
                                                                    </td>

                                                                    <td>{{e.Contactno}}
                                                                    </td>





                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:250px; text-align: center;">
                                                                        நியமனதாரர்
                                                                        பெயர்<br /><br />
                                                                    </td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        <br /><br />
                                                                    </td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        உறவுமுறை<br /><br />
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>



                                                        <p>சமூக நன்மைகள்/NA</p>
                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        ESI<br /><br />0.75%
                                                                    </td>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        PF<br /><br />12%
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:766.4px;">
                                                                        சம்பளம்: RS.
                                                                        {{Net_Salary|currency:''}}
                                                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                        நாள் / மாதம்
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p style="text-align:left;">
                                                            தொழிலாளர் கையொப்பம்<span style="float:right;">நிர்வாகி
                                                                கையொப்பம்</span></p>
                                                        <p>நாள் :</p>



                                                    </div>


                                                </div>










                                            </div>
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
                <div class="modal fade" id="ModalCenterEmployeeDetailDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee-Detail-View
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{EmployeeDetailpathtamil}}"
                                        ng-hide="EmployeeDetailpathtamil == null || EmployeeDetailpathtamil == '' "
                                        ng-show="EmployeeDetailpathtamil != null "
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



                <div class="modal fade" id="ModalCenter1EmployeeDetailHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    <h4>Employee Details / कर्मचारी का विवरण
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label">Employee
                                                    Details </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpDetailhindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpDetailhindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmployeeDetailHindiDocumnetView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnempdetailHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportempdetailhindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <center>
                                                            <h4>
                                                                <h4>Employee Details / कर्मचारी का विवरण</h4>
                                                        </center>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }

                                                        .candidate-photo {
                                                            display: inline-block;
                                                            height: 140px;
                                                            width: 140px;
                                                            padding: 40px;
                                                            text-align: center;
                                                            position: absolute;
                                                            right: 4.8%;

                                                            border: 1px solid #888888;
                                                        }
                                                        </style>


                                                        <img ng-src="{{Imagepath}}"
                                                            ng-hide="Imagepath == null || Imagepath == '' "
                                                            ng-show="Imagepath != null " alt="Employee_image"
                                                            class="candidate-photo">


                                                        <table cellpadding="3">
                                                            <tr>
                                                                <td>NAME / नाम</td>
                                                                <td>: {{Title}}{{Firstname}}{{Lastname}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>EMPLOYEE NO / कर्मचारी संख्या</td>
                                                                <td>: {{Employeeid}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>DESIGNATION / पदनाम</td>
                                                                <td>: {{EmpDesignation}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>DEPARTMENT / विभाग</td>
                                                                <td>: {{EmpDepartment}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>EDUCATIONAL QUALIFICATION / शैक्षिक योग्यता
                                                                </td>
                                                                <td>: {{Highestqualification}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>DATE OF BIRTH / AGE / की तारीख</td>
                                                                <td>: {{Dob2}}/{{Age}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>MARITAL STATUS / वैवाहिक स्थिति </td>
                                                                <td>: {{Married}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>GENDER / लिंग
                                                                </td>
                                                                <td>: {{Gender}}</td>
                                                            </tr>
                                                        </table>



                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        PRESENT ADDRESS/वर्तमान पता<br />
                                                                    </td>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        PERMANENT ADDRESS / स्थाई पता<br />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{CurrentAddress}}
                                                                        <br>
                                                                        {{CurrentCountry}}
                                                                        <br>
                                                                        {{CurrentState}}
                                                                        <br>
                                                                        {{CurrentCity}}
                                                                        <br>
                                                                        {{CurrentPincode}}
                                                                    </td>
                                                                    <td>{{PermanentAddress}}
                                                                        <br>
                                                                        {{PermanentCountry}}
                                                                        <br>
                                                                        {{PermanentState}}
                                                                        <br>
                                                                        {{PermanentCity}}
                                                                        <br>
                                                                        {{PermanentPincode}}
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p>INCASE OF EMERGENCY CONTACT / आपातकालीन संपर्क की वृद्धि
                                                        </p>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:250px; text-align: center;">
                                                                        NAME/ नाम<br /><br /><br /><br /></td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        TELEPHONE NO / टेलीफ़ोन
                                                                        नंबर<br /><br /><br /><br /></td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        RELATIONSHIP/संबंध<br /><br /><br /><br />
                                                                    </td>
                                                                </tr>

                                                                <tr dir-paginate="e in GetFamilyList |filter:searchFamily|itemsPerPage:10 "
                                                                    pagination-id="Familygrid"
                                                                    current-page="currentPageFamily">




                                                                    <td>{{e.Name}}
                                                                    </td>
                                                                    <td>{{e.Relationship}}
                                                                    </td>

                                                                    <td>{{e.Contactno}}
                                                                    </td>





                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <table style="margin-left:-5px">
                                                            <tr>
                                                                <td style="width:260px; text-align: center;">NOMINEE
                                                                    NAME/नामांकित व्यक्ति का नाम<br /><br /></td>
                                                                <td style="width:250px; text-align: center;">
                                                                    <br /><br />
                                                                </td>
                                                                <td style="width:250px; text-align: center;">
                                                                    RELATIONSHIP / संबंध<br /><br /></td>
                                                            </tr>
                                                        </table>



                                                        <p>SOCIAL BENEFITS / सामाजिक लाभ</p>
                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        ESI<br /><br />0.75%</td>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        PF<br /><br />12%</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:766.4px;">WAGES / वेतन: RS.
                                                                        {{Net_Salary|currency:''}}&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PER
                                                                        MONTH / प्रति महीने</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p style="text-align:left;">EMPLOYEE SIGNATURE / कर्मचारी
                                                            हस्ताक्षर<span style="float:right;">AUTHORISED SIGNATURE
                                                                / अधिकृत हस्ताक्षर </span></p>
                                                        <br />
                                                        <p>DATE / दिनांक :</p>











                                                    </div>


                                                </div>










                                            </div>
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
                <div class="modal fade" id="ModalCenterEmployeeDetailHindiDocumnetView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee-Detail-View
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{EmployeeDetailpathhindi}}"
                                        ng-hide="EmployeeDetailpathhindi == null || EmployeeDetailpathhindi == '' "
                                        ng-show="EmployeeDetailpathhindi != null "
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



                <div class="modal fade" id="ModalCenter1FORM34Tamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM NO.34 - Nomination
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> FORM-34
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputform34tamil" name=files[] accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonform34tamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterForm34TamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnform34tamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporform34ltamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <center>
                                                            <h3>FORM NO.34 - Nomination<br />(விதி 93 C இன் கீழ்
                                                                பரிந்துரைக்கப்பட்டது)</h3>
                                                        </center>

                                                        <p>எனது இறப்பிற்கு பின்னால் கம்பெனியில் இருந்து எனக்கு சேர
                                                            வேண்டிய சம்பளம் மற்றும் இதர படிகள் அனைத்தும்
                                                            __________________________ எனது
                                                            ______________________________ அவர்களுக்கு வழங்குமாறு
                                                            கேட்டுக்கொள்கிறேன். மேலும் தற்போது அவர்கள் கீழ்க்கண்ட
                                                            விலாசத்தில் வசித்து வருகிறார்கள்.</p>

                                                        <p>முகவரி</p>
                                                        <br /><br /><br /><br />






                                                        <p>நன்றி</p>

                                                        <br /><br />
                                                        <p>தங்கள் உண்மையுள்ள</p>

                                                        <br /><br />
                                                        <p>தொழிலாளர் கையொப்பம்</p>

                                                        <p>சாட்சி</p>
                                                        <br /><br />
                                                        <p>1</p>
                                                        <br /><br />
                                                        <p>2</p>



                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterForm34TamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM-34
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Form34pathtamil}}"
                                        ng-hide="Form34pathtamil == null || Form34pathtamil == '' "
                                        ng-show="Form34pathtamil != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenter1FORM34Hindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM NO.34 - Nomination
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> FORM-34
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputform34hindi" name=files[] accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonform34hindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterForm34HindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnform34hindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporform34hindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <center>
                                                            <h4>FORM NO.34 - Nomination<br />(नियम 93 सी . के तहत
                                                                निर्धारित)</h4>
                                                        </center>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>


                                                        <p>I hereby declare that in the event of my death before
                                                            resuming work, the dues of my salary and other
                                                            settlement from the company may please be paid to
                                                            _________________ who is my ________________ and
                                                            residing at the below address.</p>


                                                        <p>मैं अनुरोध करता हूं कि मेरी मृत्यु के बाद कंपनी की ओर से
                                                            मुझे देय सभी वेतन और अन्य कदमों का ____________भुगतान
                                                            मेरे _______________________ को करें। और वर्तमान में वे
                                                            निम्न पते पर निवास कर रहे हैं।.</p>

                                                        <p>Address / पता </p>
                                                        <br /><br /><br /><br />







                                                        <p>நன்றி</p>

                                                        <br /><br />
                                                        <p>தங்கள் உண்மையுள்ள</p>

                                                        <br /><br />
                                                        <p>தொழிலாளர் கையொப்பம்</p>

                                                        <p>சாட்சி</p>
                                                        <br /><br />
                                                        <p>1</p>
                                                        <br /><br />
                                                        <p>2</p>



                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterForm34HindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM-34
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Form34pathtamilhindi}}"
                                        ng-hide="Form34pathtamilhindi == null || Form34pathtamilhindi == '' "
                                        ng-show="Form34pathtamilhindi != null "
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



                <div class="modal fade" id="ModalCenter1EMPAttentionTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    பணியாளர்களின் கவனத்திற்கு
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Attention
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpAttentiontamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpAttentiontamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEMPAttentionTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpAttentiontamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpAttentiontamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>பணியாளர்களின் கவனத்திற்கு</h4>
                                                        </center>


                                                        <p>என்னுடைய வேலைத்திறனை நிர்வாகஸ்தர்கள் ஒப்புக் கொண்டால்
                                                            மட்டுமே நிரந்தரமாக்க வேண்டியதில்லை எனவும் உறுதி
                                                            கூறுகின்றேன் (சட்டப்படி நிரந்தரமாக்கக்கூடிய கால
                                                            அளவிற்குள்)</p>

                                                        <p>தாங்கள் எனக்கு அளிக்கப்பட்ட வேலைக்கு நிர்வாகத்தின்
                                                            முழுதிருப்திக்கேற்ப பணிபுரிவேன் என உறுதி கூறுகிறேன்.</p>

                                                        <p>மேலே நிர்வாகத்தால் கூறப்பட்ட அனைத்து விதிமுறைகளுக்கும்
                                                            கட்டுப்பட்டு நடப்பேன் என உறுதி கூறுகிறேன்.</p>

                                                        <p>என்னால் நிர்வாகத்திற்கு கொடுக்கப்பட்ட விபரங்கள் யாவும்
                                                            உண்மையென கூறுகிறேன்.</p>

                                                        <p>நிர்வாகத்தின் விதிகளுக்கும், சட்டதிட்டங்களுக்கும்
                                                            கட்டுப்பட்டு நடப்பேன் என உறுதி கூறுகிறேன்.</p>

                                                        <p>நிர்வாகத்திற்கு கேடு விளைவிக்கும் பொருட்டு எவ்வித செயலும்
                                                            செய்யமாட்டேன் என உறுதி அளிக்கிறேன்.</p>

                                                        <p>நான் நிர்வாகத்தின் எந்தவிதமான வற்புறுத்தலுக்கோ,
                                                            அச்சறுத்தலுக்கோ, அபராதத்திற்கோ கட்டாயத்திற்கோ
                                                            உட்படுத்தப்படாமல் எனது விருப்பத்தில் வேலை செய்ய
                                                            ஒப்புக்கொள்கிறேன்.</p>

                                                        <p>மேலே கூறிய விவரங்கள் அனைத்தும் இருவராலும் மணப்பூர்வமாக
                                                            ஒப்புக்கொள்ளப்பட்டவை.</p>





                                                        <p style="text-align:left;">
                                                            தொழிலாளர்
                                                            <span style="float:right;">பணியாளர்</span>
                                                        </p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEMPAttentionTamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Attention
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Attentionoftheemployeepathtamil}}"
                                        ng-hide="Attentionoftheemployeepathtamil == null || Attentionoftheemployeepathtamil == '' "
                                        ng-show="Attentionoftheemployeepathtamil != null "
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



                <div class="modal fade" id="ModalCenter1EMPAttentionHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Attention of the employee
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Attention
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpAttentionhindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpAttentionhindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEMPAttentionHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpAttentionhindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpAttentionhindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>Attention of the employee/ कर्मचारी के ध्यान के लिए
                                                            </h4>
                                                        </center>


                                                        <p>मैं यह भी पुष्टि करता हूं कि मेरा रोजगार तब तक स्थायी
                                                            नहीं होगा जब तक कि प्रबंधन सहमत न हो (समय की अवधि के
                                                            भीतर जिसे कानून द्वारा स्थायी बनाया जा सकता है) ।.</p>

                                                        <p>मैं वचन देता हूँ कि मुझे जो कार्य सौंपा गया है, उसे मैं
                                                            प्रबंधन की पूर्ण संतुष्टि के अनुरूप करूँगा।.</p>

                                                        <p>मैं उपरोक्त प्रबंधन द्वारा उल्लिखित सभी नियमों का पालन
                                                            करने का वादा करता हूं।.</p>

                                                        <p>मैं घोषणा करता हूं कि मेरे द्वारा प्रबंधन को दिए गए सभी
                                                            विवरण सत्य हैं।.</p>

                                                        <p>मैं प्रशासन के नियमों और विनियमों का पालन करने का वादा
                                                            करता हूं।.</p>

                                                        <p>मैं वादा करता हूं कि मैं प्रशासन को नुकसान पहुंचाने के
                                                            लिए कुछ नहीं करूंगा।.</p>

                                                        <p>मैं प्रबंधन द्वारा किसी भी दबाव, धमकी, दंड या जबरदस्ती के
                                                            बिना अपनी मर्जी से काम करने के लिए सहमत हूं।.</p>

                                                        <p>उपरोक्त सभी विवरण दोनों के बीच वैवाहिक रूप से सहमत हैं।.
                                                        </p>







                                                        <p style="text-align:left;">
                                                            प्रशासक
                                                            <span style="float:right;">कर्मचारी</span>
                                                        </p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEMPAttentionHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Attention
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Attentionoftheemployeepathhindi}}"
                                        ng-hide="Attentionoftheemployeepathhindi == null || Attentionoftheemployeepathhindi == '' "
                                        ng-show="Attentionoftheemployeepathhindi != null "
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


                <div class="modal fade" id="ModalCenter1EmpDeclarationTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    தொழிலாளர் சுய அறிவிப்பு படிவம்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Declaration
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpDeclarationtamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpDeclarationtamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpDeclarationtamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpDeclarationTamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpDeclarationtamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>EMPLOYEE DECLARATION FORM<br />தொழிலாளர் சுய
                                                                அறிவிப்பு படிவம்</h4>
                                                        </center>


                                                        <p>SIPL will provide the food, stay and transport facilities
                                                            for employees in nominal charge.<br />SIPL
                                                            தொழிலாளர்களுக்கு குறைந்த விலையில் உணவு , தங்கும் இடம்
                                                            மற்றும் போக்குவரத்து வசதிகளை அளிக்கிறது</p>


                                                        <p>Please find the monthly charges for your reference and if
                                                            interested select the requirement.<br />கீழே
                                                            குறிப்பிட்டுள்ள மாத கட்டணங்களை படித்து நீங்கள்
                                                            விரும்பினால் உங்கள் தேவைகளை தேர்ந்தெடுங்கள்</p>
                                                        <p>Please confirm your acceptance of this declaration form
                                                            by signing.<br />தங்களது ஒப்புதலை இந்த தொழிலாளர்
                                                            அறிவிப்பு படிவத்தில் கையெழுத்து இட்டு உறுதி செய்யவும் .
                                                        </p>


                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>FACILITIES</td>
                                                                    <td>CHARGE DETAILS</td>
                                                                    <td>YES</td>
                                                                    <td>NO</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>தங்கும் இடம்/Hostel</td>
                                                                    <td>RS. 428/மாதம்</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="3">உணவு/Food </td>
                                                                    <td>
                                                                        காலை உணவு – RS.16 / நாள்/Morning
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        மதிய உணவு – RS.22 / நாள்/Lunch
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        இரவு உணவு – RS.16 / நாள்/Dinner
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        போக்குவரத்து/Transport
                                                                    </td>
                                                                    <td>
                                                                        RS.156 - மாதம்
                                                                    </td>

                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <p>குறிப்பு :</p>
                                                        <ol>
                                                            <li>Bus Route: Nallur - Muthanampalayam - Kovilvazhi -
                                                                K. Chettipalayam - SIPL.<br />
                                                                பேருந்து வழித்தடம்: நல்லூர் - முத்தனம்பாளையம் -
                                                                கோவில்வழி - கே. செட்டிபாளையம் – SIPL.</li>
                                                            <li>Food & Transport charges would be on pro - rata
                                                                basis ( consumed / utilized days ) <br />
                                                                உணவு மற்றும் போக்குவரத்துக் கட்டணங்கள் தொழிலாளர்கள்
                                                                உபயோகிக்கும் நாட்களை கொண்டு கணக்கிடப்படும்.</li>
                                                        </ol>
                                                        <p>I acknowledge the charges for list of facilities utilized
                                                            and hereby confirm my acceptance with my own free will
                                                            and shall abide by the same.<br />நான் மேலே
                                                            குறிப்பிட்டுள்ள வசதிகளையும் அதற்கான கட்டணத்தையும் எனது
                                                            சொந்த விருப்பத்துடன் ஒப்புக்கொள்கிறேன் என்பதை உறுதி
                                                            செய்கிறேன்.</p>

                                                        <p>EMPLOYEE SIGNATURE<br />
                                                            கையெழுத்து</p>
                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpDeclarationtamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Declaration Form
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeedeclarationpathtamil}}"
                                        ng-hide="Employeedeclarationpathtamil == null || Employeedeclarationpathtamil == '' "
                                        ng-show="Employeedeclarationpathtamil != null "
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

                <div class="modal fade" id="ModalCenter1EmpDeclarationHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    EMPLOYEE DECLARATION FORM
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Declaration
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpDeclarationHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpDeclarationHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpDeclarationHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpDeclarationHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpDeclarationHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>EMPLOYEE DECLARATION FORM<br />कर्मचारी घोषणा फॉर्म
                                                            </h4>
                                                        </center>

                                                        <p>SIPL will provide the food, stay and transport facilities
                                                            for employees in nominal charge.</p>
                                                        <p>एसआईपीएल नाममात्र के शुल्क पर कर्मचारियों के लिए भोजन,
                                                            ठहरने और परिवहन की सुविधा प्रदान करेगा।.</p>
                                                        <p>Please find the monthly charges for your reference and if
                                                            interested select the requirement.</p>
                                                        <p>कृपया अपने संदर्भ के लिए मासिक शुल्क खोजें और यदि इच्छुक
                                                            हैं तो आवश्यकता का चयन करें.</p>
                                                        <p>Please confirm your acceptance of this declaration form
                                                            by signing.</p>
                                                        <p>कृपया हस्ताक्षर करके इस घोषणा पत्र की स्वीकृति की पुष्टि
                                                            करें।.</p>




                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>FACILITIES सुविधाएँ</td>
                                                                    <td>CHARGE DETAILS शुल्क विवरण</td>
                                                                    <td>YES हां</td>
                                                                    <td>NO ना</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>DORMITORY MAINTENANCE
                                                                        छात्रावास
                                                                    </td>
                                                                    <td>RS. 428/ महीना</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="3">FOOD भोजन</td>
                                                                    <td>

                                                                        सुबह का नाश्ता – RS.16 / दिन
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>

                                                                        दोपहर का भोजन – RS.22 / दिन
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>

                                                                        रात का खाना – RS.16 / दिन
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        TRANSPORT
                                                                        यातायात
                                                                    </td>
                                                                    <td>

                                                                        RS.156 – महीना
                                                                    </td>

                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <p>Note :</p>
                                                        <ol>
                                                            <li>1. Bus Route: Nallur - Muthanampalayam - Kovilvazhi
                                                                - K. Chettipalayam - SIPL. <br />
                                                                बस मार्ग: नल्लूर - मुथनमपलयम - कोविल्वाज़ी - के.
                                                                चेट्टीपलायम - एसआईपीएल।.
                                                            </li>
                                                            <li>Food & Transport charges would be on pro - rata
                                                                basis ( consumed / utilized days ) <br />
                                                                खाद्य एवं परिवहन प्रभार यथानुपात आधार पर होंगे
                                                                (खपत/उपयोग किए गए दिन)
                                                            </li>
                                                        </ol>
                                                        <p>मैं उपयोग की जाने वाली सुविधाओं की सूची के लिए शुल्क
                                                            स्वीकार करता हूं और एतद्द्वारा अपनी स्वेच्छा से अपनी
                                                            स्वीकृति की पुष्टि करता हूं और उसका पालन करूंगा।.</p>

                                                        <p>SIGNATURE/हस्ताक्षर</p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpDeclarationHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Declaration Form
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeedeclarationpathhindi}}"
                                        ng-hide="Employeedeclarationpathhindi == null || Employeedeclarationpathhindi == '' "
                                        ng-show="Employeedeclarationpathhindi != null "
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

                <div class="modal fade" id="ModalCenter1EmpStatingTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    பணி நியமன விதிமுறைகள்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Stating
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpStatingTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpStatingTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpStatingTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpStatingTamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpStatingTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>பணி நியமன விதிமுறைகள்</h4>
                                                        </center>


                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <center>பணி நியமன விதிமுறைகள்</center>
                                                                    </td>
                                                                </tr>






                                                                <tr>
                                                                    <td> With reference to your application Bio -
                                                                        data from seeking an employment in our
                                                                        organization .We are pleased to issue this
                                                                        appointment letter to you on the following
                                                                        salient terms & conditions. </td>
                                                                    <td> எங்கள் நிறுவனத்தில் வேலை நாடி வந்த உங்களது
                                                                        மனு மற்றும் bio – data- வை எங்களது கவனத்தில்
                                                                        எடுத்திருக்கிறோம். கீழ்கண்ட முக்கியமான
                                                                        விதிகள் மற்றும் கட்டுப்பாடுகளின்
                                                                        அடிப்படையில் உங்களுக்கு பணி நியமனக்கடிதம்
                                                                        வழங்கியதற்கு மகிழ்ச்சி அடைகிறோம். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 1. You are presently designated as
                                                                        <U>{{EmpDesignation}}</U>.
                                                                    </td>
                                                                    <td> நீங்கள் தற்போது <U>{{EmpDesignation}}</U>
                                                                        என்ற பணியில்
                                                                        அமர்த்தப்படுகிறீர். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 2. Your date of joining is
                                                                        <u>{{Date_Of_Joing2}}</u>.
                                                                    </td>
                                                                    <td> 2. நீங்கள் பணியில் சேர்த்த தினம்
                                                                        <u>{{Date_Of_Joing2}}</u>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 3. Your age as on this date <u>{{Age}}</u>/
                                                                        D.O.B
                                                                        <u>{{Dob2}}</u>.
                                                                    </td>
                                                                    <td> 3. இன்று உங்கள் வயது<u>{{Age}}</u>/ பிறந்த
                                                                        தினம்
                                                                        <u>{{Dob2}}</u>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 4. Your weekly off shall be SUNDAY on every
                                                                        week. </td>
                                                                    <td> 4. ஒவ்வொரு வாரமும் உங்களது வார விடுமுறை
                                                                        நாள் ஞாயிறு ஆகும். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 5. Your working hours shall be S - I from
                                                                        8.30. AM to 5.30. PM / S - II 8.30 pm- 5.30
                                                                        am Every day , Office Time : 9.30 am - 6.30
                                                                        pm. (which is applicable) </td>
                                                                    <td> 5. ஒவ்வொரு நாளும், உங்களது வேலை நேரம் காலை
                                                                        8.30 am முதல் மாலை 5.30 pm (Day Shift)
                                                                        (Night Shift: 8.30 PM - 5.30am- வரை
                                                                        இருக்கும்), Office Time 9.30am - 6.30 pm.
                                                                        (இது உங்களது வேலை பொறுத்து மாறுபடும்). </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 6. Your present salary is Rs. <u>
                                                                            {{Net_Salary|currency:''}}</u> This
                                                                        salary consist of basic+DA/HRA and other
                                                                        allowances as per break up structure
                                                                        applicable to your cadre of employees and as
                                                                        per details noticed from time to time. Your
                                                                        pay slip also contains such a break up.
                                                                    </td>
                                                                    <td> D. தற்போது உங்கள் சம்பளம் ரூபாய் RS. <u>
                                                                            {{Net_Salary|currency:''}}</u>
                                                                        மட்டும் படிகள் பிரித்து வழங்கப்படும். இது
                                                                        உங்களைப் போன்ற மற்ற பணியாளர்களுக்கும்
                                                                        பொருந்தும். அது அவ்வப்போது அறிவிப்பு
                                                                        பலகையில் அறிவிக்கப்படும். உங்கள் சம்பள
                                                                        சீட்டு இத்தகைய விவரங்களை கொண்டு இருக்கும்.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 7. You are covered under the Employee State
                                                                        Insurance Corporation (ESI-0.75%) and
                                                                        Employees Provident Fund (PF-12%) schemes.
                                                                        ESI deducted from your gross earned wages.PF
                                                                        deducted from B+DA&OA earned wages. At the
                                                                        same time employer contribution (PF-12% &
                                                                        ESI-3.25) to be credited to your account in
                                                                        the concerned department. This may change if
                                                                        there is an amendment in the concerned
                                                                        department. </td>
                                                                    <td> 7. தொழிலாளர் அரசு காப்பீட்டுக் கழகம் (ESI)
                                                                        மற்றும் தொழிலாளர் வருங்கால வைப்பு நிதி (PF)
                                                                        திட்டங்களில் நீங்கள் சேர்க்கப்பட்டுள்ளீர்.
                                                                        (ESI) 0.75 %. உங்கள் மொத்த வருவாயிலிருந்து
                                                                        பிடிக்கப்படுகிறது. அதே நேரத்தில் (PF-12%)
                                                                        அடிப்படை சம்பளம் + அகவிலைப்படி மற்றும் இதர
                                                                        சலுகைகளிலிருந்து பிடித்தம் செய்து
                                                                        நிர்வாகத்தின் பங்களிப்பான ESI 3.25%/PF 12%
                                                                        உங்களது கணக்கில் சம்பத்தப்பட்ட துறையில் வரவு
                                                                        வைக்கப்படும்.. சம்பந்தபட்ட துறைகளில்
                                                                        திருத்தம் செய்யப்பட்டால் அது மாறலாம். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 8. If you commit breach of any of the terms
                                                                        and conditions of this letter or if your
                                                                        commit on act of misconduct, such as
                                                                        dishonest performance is not satisfactory
                                                                        negligence insubordination, disobedience,
                                                                        theft, misappropriation of company's funds,
                                                                        drunkenness while on duty, unruly behavior
                                                                        in attendance etc., you are liable for
                                                                        appropriate disciplinary action, which may
                                                                        also lead to termination of your service W/o
                                                                        notice as per procedures contained in the
                                                                        certified standing orders. </td>
                                                                    <td> 8. தவறான நடத்தை நேர்மையற்ற செயல், பணி
                                                                        திருப்தியின்மை. அலட்சியம், விதி மீறல்,
                                                                        கீழ்படியாமை, திருட்டு, கம்பெனி தொகை கையாடல்,
                                                                        பணிக்காலத்தில் குடித்திருத்தல், சட்டமீறி
                                                                        நடத்தல், பணிக்குவராமை. போன்ற காரணங்களால்
                                                                        இக்கடிதத்தில் கூறப்பட்டுள்ள விதிமுறைகள்
                                                                        உங்களால் மீறப்படுமானால் நீங்கள் பொருத்தமான
                                                                        நடவடிக்கைக்கு உட்படுத்தப்பட்டு பணி நீக்கம்
                                                                        செய்யப்பட்டு சான்றளிக்கப்பட்ட நிறுவை விதிகள்
                                                                        அடங்கியுள்ள செயல்முறைகளின்படி பணி நீக்கம்
                                                                        செய்யப்படுவீர்கள். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 9. If for an eight consecutive working days
                                                                        absent yourself without sanction of leave or
                                                                        overstay than sanctioned leave for eight
                                                                        consecutive days, you shall be deemed to
                                                                        have abandoned your appointment voluntarily,
                                                                        terminating your service thereby, by your
                                                                        own act. Such termination shall not to be
                                                                        deemed to be retrenchment within the purview
                                                                        of clause (bb) of section 2 (00) of the
                                                                        Industrial Disputes Act, 1947. </td>
                                                                    <td> 9.விடுப்பு அங்கீகரிக்கப்படாமல் தொடர்ந்து 8
                                                                        நாட்கள் விடுப்பு எடுத்தல், தொடர்ந்து 8
                                                                        நாட்களுக்கு உத்தரவின்றி வேலைக்கு வராமல்
                                                                        தங்குதல் போன்று செயல்பட்டால் நீங்களாகவே பணி
                                                                        நியமன உத்தரவை புறக்கணிப்பதாக
                                                                        கருதப்படுவீர்கள். பிரிவு 2 (00) தொழிற்சாலை
                                                                        வழக்கு. சட்டம் 1947 இவற்றிற்குட்பட்டு பணி
                                                                        நீக்கம் செய்யப்பட்டு ஆட்குறைப்பு செய்ததாக
                                                                        கருதப்படமாட்டாது. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 10. Your normal working hours will be 8
                                                                        (eight) hours of actual work per day or 48
                                                                        (forty eight) hours per week. </td>
                                                                    <td> 10. உங்கள் பணி நேரம் நாளுக்கு 8 மணி
                                                                        நேரங்கள். (ஒரு நாள் வேலை நேரம்) அல்லது
                                                                        வாரத்திற்கு 48 மணி நேரங்கள் ஆகும். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 11. For your overtime work (voluntarily
                                                                        basis beyond, the normal hours) overtime
                                                                        wage will be paid, to you at double the rate
                                                                        of your GROSS WAGES. </td>
                                                                    <td> 11. உங்களின் அதிக நேர வேலைக்கான (உங்கள்
                                                                        விருப்பத்தின் அடிப்படையில் பொதுவான கால
                                                                        அளவிற்கு மேல்) கூலி அடிப்படை மற்றும்
                                                                        அகவிலைப்படி/இதர சலுகைகள் மொத்த ஊதியத்தில்
                                                                        இதன் இருமடங்கு வழங்கப்படும். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 12. You are eligible for earned leave @ one
                                                                        day for every 20 days actually worked by
                                                                        you, after completion of 240 days’ work in a
                                                                        year This is credited annually on ________of
                                                                        the following years. </td>
                                                                    <td> 12. நீங்கள் ஒரு வருடத்திற்கு 240
                                                                        நாட்களுக்கு மேல் வேலை பார்த்தால் ஒவ்வொரு 20
                                                                        நாட்களுக்கும் ஒரு நாள் ஈட்டிய விடுப்புக்கு
                                                                        தகுதியுடையவர் ஆகிறீர்கள். இது வரும் வருடம்
                                                                        _______முதல் தேதியில் ஒவ்வொரு வருடமும்
                                                                        உங்கள் கணக்கில் வைக்கப்படும். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 13. National and festival Holidays :You are
                                                                        eligible for N / F holidays as required by
                                                                        the law. </td>
                                                                    <td> 13 : தேசிய மற்றும் விழாக்கால விடுமுறைகள் :
                                                                        சட்டப்படி உள்ள (குறைந்தபட்சம் வருடத்திற்கு
                                                                        ஒன்பது நாட்கள்) எல்லா தேசிய மற்றும்
                                                                        விழாக்கால வீடுமுறைக்கும் நீங்கள்
                                                                        தகுதியுள்ளவர் ஆவர். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 14. Benefits of Bonus, gratuity are
                                                                        available in our factory and are as
                                                                        determined under the respective rules of
                                                                        Payment of Bonus Act and Payment of gratuity
                                                                        Act. (Minimum Bonus 8.33%) </td>
                                                                    <td> 14. ஊக்கத்தொகை மற்றும் பணிக்கொடை: நம்
                                                                        தொழிற்சாலையில் அரசாங்கத்தின் ஊக்கத்தொகை
                                                                        மற்றும் பணிக்கொடை சட்ட விதிகளின்படி
                                                                        வழங்கப்படும் (குறைந்தபட்ச போனஸ் 8.33%).
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 15. Rules and Regulation : Employee’s
                                                                        conditions of our company are governed by
                                                                        the factories act 1948 and the certified
                                                                        standing orders of cur company. Accordingly,
                                                                        all other terms and conditions of services
                                                                        are as per the provision of the said
                                                                        standing order. </td>
                                                                    <td> 15.விதிகளும் கட்டுப்பாடுகளும் :
                                                                        தொழிற்சாலையில் ஊழியர் நிலவரங்கள் தொழிற்சாலை
                                                                        விதி 1848 ன் படியும் நிர்வகிக்கப்படும்.
                                                                        அதன்படி மற்ற நிறுவை விதிகளின்படியும்
                                                                        நிர்வகிக்கப்படும். அதன்படி மற்ற எல்லாம்
                                                                        உங்கள் பணி விதிமுறைகள் அந்த மேற்கொள்ளப்பட்ட
                                                                        சட்ட நிலுவை விதிகளின் படியே இருக்கின்றன.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16. Miscellaneous : During the period of
                                                                        Probation or continuation as the case may be
                                                                        liable and shall accept transfer to any
                                                                        whatever be the. Interest of the company are
                                                                        involved in the state of Tamilnadu or where
                                                                        in India. </td>
                                                                    <td> 16. பலதரப்பட்டவை : தமிழ்நாட்டிலோ அல்லது
                                                                        இந்தியாவில் எங்கு வேண்டுமானும் நிறுவனத்தின்
                                                                        விருப்பப்படி பணிக்காலத்தில் அல்லது நீரந்தரம்
                                                                        செய்யப்பட்ட நிலையில் கம்பெனியின் துணை
                                                                        நிறுவனங்களில் சகோதர நிறுவனங்களில் அல்லது
                                                                        கிளைகளில் நீங்கள் பணிமாற்றத்திற்கு
                                                                        உட்படுத்தப்படலாம். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16b. You shall not, at any times disclose
                                                                        to any one any information, know - how,
                                                                        knowledge, secrets, methods, plans etc., of
                                                                        the company. </td>
                                                                    <td> 16b. எக்காலத்திலும் யாருக்கும் நிறுவனத்தின்
                                                                        எந்த தகவலையோ தொழில் நுணுக்கத்தையோ. திறனையோ,
                                                                        ரகசியங்களையோ, வழி திட்டங்களையோ
                                                                        வெளியிடக்கூடாது. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16c. During the period of your service with
                                                                        the company you shall not carry on any
                                                                        business of your own but carry out your
                                                                        duties diligently. Loyally and to the best
                                                                        of your capacity. </td>
                                                                    <td> 16c. உங்கள் பணிக்காலத்தில் சொந்த தொழில்
                                                                        ஏதும் எடுத்துச் செய்யக்கூடாது, கடமைகளை
                                                                        பொறுப்புடனும், விசுவாசத்துடனும் உங்கள்
                                                                        முழுத்திறமையுடன் எடுத்துச்செய்ய வேண்டும்.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16d. This appointment / probation is made
                                                                        on the understanding that the information
                                                                        given by you in your application for
                                                                        appointment is correct, true and complete.
                                                                        If it is found at any stage that the
                                                                        information given by you is not correct /
                                                                        true / complete, or you had suppressed
                                                                        information, this appointment may be
                                                                        withdrawn before you join services with us
                                                                        or your services may be terminated at any
                                                                        time after taken up employment with us. The
                                                                        address furnished in your application for
                                                                        appointment are the basic for the
                                                                        communication of all correspondence. It is
                                                                        your bounded duty to furnish the latest
                                                                        address always, keep in touch with your
                                                                        latest address to the management. </td>
                                                                    <td> 16d. இந்தப் பணி நியமனம் பயிற்சி மனு
                                                                        உண்மையானது. முழுமையாக கொடுக்கப்பட்ட தகவல்கள்
                                                                        உண்மையானவை என்ற அடிப்படையில்
                                                                        செய்யப்படுகிறது. எந்த ஓர் காலகட்டத்திலும்
                                                                        கொடுக்கப்பட்ட தகவல் தவறானது மறைக்கப்பட்ட
                                                                        தகவல் என்றால் நீங்கள் வேலைக்கு அல்லது
                                                                        பணியில் சேர்ந்த பின்னர் நீக்கப்படுவீர்,
                                                                        உங்கள் பணி நியமன மனுவில் வழங்கப்பட்ட விலாசம்
                                                                        எதிர்காலத்தில் தகவல் அனுப்புவதற்கு
                                                                        அடிப்படையாக இருக்கிறது. உங்களுடைய கடைசியாக
                                                                        மாறியுள்ள விலாசத்தை எங்களுக்கு அளிப்பது
                                                                        உங்களுடைய பொறுப்பாகும் கடைசியாக மாற்றிய
                                                                        விலாசத்தை நிர்வாகத்திற்க அனுப்பவேண்டும்.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16e. The management reserve the right lay -
                                                                        off with compensation of retrench our
                                                                        services at its discretion for any reason
                                                                        whatsoever and will be paid compensation as
                                                                        per the provisions of the industrial
                                                                        disputes Act. 1947. </td>
                                                                    <td> 16e. பணி நீக்கம் அல்லது பணிமுடக்கம் நிர்வாக
                                                                        விருப்பப்படி எக்காரணத்திற்காக
                                                                        செய்யப்பட்டாலும் தொழிற்சாலை சட்டம் 1947 ன்
                                                                        படி நஷ்டஈடு வழங்கப்படுவீர்கள். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 17. Residential Address Your residential
                                                                        address as stated above is as furnished by
                                                                        and is deemed as the address for any
                                                                        specific communication or notice to you. You
                                                                        should keep the management information of
                                                                        any change in your address that may arise at
                                                                        your end. </td>
                                                                    <td> 17. வீட்டு விலாசம் : உங்கள் குடியிருப்பு
                                                                        விலாசம் உங்களால் மேலே கொடுக்கப்பட்டது. எந்த
                                                                        குறிப்பிட்ட தகவலும் உங்களுக்கு அறிவிப்பு
                                                                        கொடுக்கவும் சரியானதாக கருதப்படுகிறது
                                                                        நிர்வாகத்திற்கு தகவல் தெரிவிப்பதுடன் எந்த
                                                                        விலாச மாற்றத்தையும் தெரிவிக்க வேண்டும்.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 18. Any permanent workman desirous of
                                                                        leaving the service shall give one month's
                                                                        notice and return all company belongings.
                                                                    </td>
                                                                    <td> 18. எந்த நிரத்திரத் தொழிலாளியாவது தானாகவே
                                                                        வேலையை விட்டு விளக்கிக் கொள்ள விரும்பினால்
                                                                        ஒரு மாத முன்னறிவிப்பினை நிர்வாகத்திடம்
                                                                        கொடுத்து மற்றும் நிறுவனத்தின் அனைத்து
                                                                        உடைமைகளையும் நிர்வாகத்திற்க்கு திருப்பிதந்து
                                                                        வேலையிலுருந்து விலகிக் கொள்ளலாம். </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpStatingTamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Stating
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeestatingpathtamil}}"
                                        ng-hide="Employeestatingpathtamil == null || Employeestatingpathtamil == '' "
                                        ng-show="Employeestatingpathtamil != null "
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
                <div class="modal fade" id="ModalCenter1EmpStatingHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    EMPLOYEE STATING AS FOLLOWS
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Stating
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpStatingHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpStatingHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpStatingHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpStatingHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpStatingHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>THE EMPLOYEE STATING AS FOLLOWS</h4>
                                                        </center>



                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">THE EMPLOYEE STATING AS FOLLOWS
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:49.8%"> With reference to your
                                                                        application Bio - data from seeking an
                                                                        employment in our organization .We are
                                                                        pleased to issue this appointment letter to
                                                                        you on the following salient terms &
                                                                        conditions. </td>
                                                                    <td> हमने अपनी कंपनी में नौकरी के लिए आवेदन करने
                                                                        के लिए आपके आवेदन और बायोडाटा पर ध्यान दिया
                                                                        है। हमें आपको निम्नलिखित महत्वपूर्ण नियमों
                                                                        और प्रतिबंधों के अधीन नियुक्ति पत्र जारी
                                                                        करने में प्रसन्नता हो रही है।.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 1. You are presently designated as
                                                                        <u>{{EmpDesignation}}</u>.
                                                                    </td>
                                                                    <td> आप वर्तमान में <u>{{EmpDesignation}}</u>
                                                                        कार्यरत हैं।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 2. Your date of joining is
                                                                        <u>{{Date_Of_Joing2}}</u>.
                                                                    </td>
                                                                    <td> 2. आप सेवा में शामिल होने की तिथि
                                                                        <u>{{Date_Of_Joing2}}</u>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 3. Your age as on this date <u>{{Age}} </u>
                                                                        / D.O.B
                                                                        <u>{{Dob2}}</u> .
                                                                    </td>
                                                                    <td> 3. आज आपकी उम्र <u>{{Age}}</u> / जन्मदिन है
                                                                        <u>{{Dob2}}</u>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 4. Your weekly off shall be SUNDAY on every
                                                                        week. </td>
                                                                    <td> 4. रविवार आपका साप्ताहिक अवकाश है. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 5. Your working hours shall be S - I from
                                                                        8.30. AM to 5.30. PM / S - II 8.30 pm- 5.30
                                                                        am Every day , Office Time : 9.30 am - 6.30
                                                                        pm. (which is applicable) </td>
                                                                    <td> 5. हर दिन, आपके काम करने का समय सुबह 8.30am
                                                                        बजे है शाम 5.30pm बजे से शाम 8.30pm-5.30Am
                                                                        बजे (8.30 बजे से 5.30 बजे तक), कार्यालय समय
                                                                        सुबह 9.30am बजे से शाम 6.30pm बजे तक। (इस पर
                                                                        लागू होता है)। </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 6. Your present salary is Rs. <u>
                                                                            {{Net_Salary|currency:''}}</u> This
                                                                        salary consist of basic+DA/HRA and other
                                                                        allowances as per break up structure
                                                                        applicable to your cadre of employees and as
                                                                        per details noticed from time to time. Your
                                                                        pay slip also contains such a break up.
                                                                    </td>
                                                                    <td> 6. वर्तमान में आपका वेतन रु. <u>
                                                                            {{Net_Salary|currency:''}}</u> केवल कदम
                                                                        अलग से दिए जाएंगे। वही आप जैसे अन्य
                                                                        कर्मचारियों के लिए जाता है। इसकी घोषणा
                                                                        समय-समय पर नोटिस बोर्ड पर की जाएगी। आपकी
                                                                        वेतन पर्ची में ऐसे विवरण होंगे। </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 7. You are covered under the Employee State
                                                                        Insurance Corporation (ESI-0.75%) and
                                                                        Employees Provident Fund (PF-12%) schemes.
                                                                        ESI deducted from your gross earned wages.PF
                                                                        deducted from B+DA&OA earned wages. At the
                                                                        same time employer contribution (PF-12% &
                                                                        ESI-3.25) to be credited to your account in
                                                                        the concerned department. This may change if
                                                                        there is an amendment in the concerned
                                                                        department. </td>
                                                                    <td> 7. आप कर्मचारी राज्य बीमा निगम (ईएसआई) और
                                                                        कर्मचारी भविष्य निधि (पीएफ) योजनाओं के
                                                                        अंतर्गत आते हैं। (ईएसआई) 0.75%। आपकी सकल आय
                                                                        में से कटौती। साथ ही (पीएफ-12%) मूल वेतन +
                                                                        ग्रेच्युटी और अन्य भत्तों और प्रबंधन के
                                                                        योगदान से कटौती ईएसआई 3.25% / पीएफ 12%
                                                                        अर्जित क्षेत्र में आपके खाते में जमा की
                                                                        जाएगी। संबंधित क्षेत्रों में संशोधन होने पर
                                                                        यह बदल सकता है।</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 8. If you commit breach of any of the terms
                                                                        and conditions of this letter or if your
                                                                        commit on act of misconduct, such as
                                                                        dishonest performance is not satisfactory
                                                                        negligence insubordination, disobedience,
                                                                        theft, misappropriation of company's funds,
                                                                        drunkenness while on duty, unruly behavior
                                                                        in attendance etc., you are liable for
                                                                        appropriate disciplinary action, which may
                                                                        also lead to termination of your service W/o
                                                                        notice as per procedures contained in the
                                                                        certified standing orders. </td>
                                                                    <td> 8. कदाचार बेईमानी, नौकरी में असंतोष।
                                                                        लापरवाही, नियमों का उल्लंघन, अवज्ञा, चोरी,
                                                                        कंपनी के धन का दुरूपयोग, ड्यूटी पर मद्यपान,
                                                                        दुराचार, अनुपस्थिति। यदि आप इस तरह के कारणों
                                                                        से इस पत्र की शर्तों का उल्लंघन करते हैं, तो
                                                                        आप उचित कार्रवाई के अधीन होंगे और प्रमाणित
                                                                        कंपनी नियमों में निहित प्रक्रियाओं के अनुसार
                                                                        समाप्त किया जा सकता है।. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 9. If for an eight consecutive working days
                                                                        absent yourself without sanction of leave or
                                                                        overstay than sanctioned leave for eight
                                                                        consecutive days, you shall be deemed to
                                                                        have abandoned your appointment voluntarily,
                                                                        terminating your service thereby, by your
                                                                        own act. Such termination shall not to be
                                                                        deemed to be retrenchment within the purview
                                                                        of clause (bb) of section 2 (00) of the
                                                                        Industrial Disputes Act, 1947. </td>
                                                                    <td> 9.यदि आप बिना अनुमति के लगातार 8 दिनों की
                                                                        छुट्टी लेते हैं, बिना अनुमति के लगातार 8
                                                                        दिनों तक काम से अनुपस्थित रहते हैं, तो आप
                                                                        स्वयं नियुक्ति आदेश की अवहेलना करने वाले
                                                                        माने जाएंगे। धारा 2 (00) फैक्टरी सूट।
                                                                        अधिनियम 1947 को इनके अंतर्गत छँटनी या छँटनी
                                                                        नहीं समझा जाएगा.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 10. Your normal working hours will be 8
                                                                        (eight) hours of actual work per day or 48
                                                                        (forty eight) hours per week. </td>
                                                                    <td> 10. आपके काम के घंटे प्रतिदिन 8 घंटे हैं।
                                                                        प्रति दिन काम के घंटे) या प्रति सप्ताह 48
                                                                        घंटे।</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 11. For your overtime work (voluntarily
                                                                        basis beyond, the normal hours) overtime
                                                                        wage will be paid, to you at double the rate
                                                                        of your GROSS WAGES. </td>
                                                                    <td> 11. आपके ओवरटाइम काम के लिए मूल वेतन और
                                                                        ग्रेच्युटी/अन्य भत्ते (आपके विकल्प पर
                                                                        सामान्य अवधि से अधिक) का भुगतान कुल मजदूरी
                                                                        के दोगुने पर किया जाएगा।. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 12. You are eligible for earned leave @ one
                                                                        day for every 20 days actually worked by
                                                                        you, after completion of 240 days’ work in a
                                                                        year This is credited annually on ________of
                                                                        the following years. </td>
                                                                    <td> 12. यदि आप एक वर्ष में 240 दिनों से अधिक
                                                                        काम करते हैं, तो आप प्रत्येक 20 दिनों के लिए
                                                                        एक दिन की अर्जित छुट्टी के हकदार हैं। आपका
                                                                        खाता हर साल _______ तारीख को क्रेडिट किया
                                                                        जाएगा।. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 13. National and festival Holidays :You are
                                                                        eligible for N / F holidays as required by
                                                                        the law. </td>
                                                                    <td> 13. राष्ट्रीय और त्योहार की छुट्टियां:
                                                                        आप सभी वैधानिक राष्ट्रीय और अवकाश (प्रति
                                                                        वर्ष न्यूनतम नौ दिन) के हकदार हैं।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 14. Benefits of Bonus, gratuity are
                                                                        available in our factory and are as
                                                                        determined under the respective rules of
                                                                        Payment of Bonus Act and Payment of gratuity
                                                                        Act. (Minimum Bonus 8.33%) </td>
                                                                    <td>14. प्रोत्साहन और ग्रेच्युटी:
                                                                        हमारे कारखाने में, वैधानिक प्रावधानों
                                                                        (न्यूनतम बोनस 8.33%) के अनुसार सरकारी
                                                                        प्रोत्साहन और ग्रेच्युटी का भुगतान किया जाता
                                                                        है।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 15. Rules and Regulation : Employee’s
                                                                        conditions of our company are governed by
                                                                        the factories act 1948 and the certified
                                                                        standing orders of cur company. Accordingly,
                                                                        all other terms and conditions of services
                                                                        are as per the provision of the said
                                                                        standing order. </td>
                                                                    <td> 15. नियम और शर्तें:
                                                                        कारखाने में कर्मचारियों की शर्तें भी कारखाना
                                                                        अधिनियम 1848 द्वारा शासित होती हैं। तदनुसार,
                                                                        आपके रोजगार की अन्य सभी शर्तें लागू वैधानिक
                                                                        प्रावधानों के अधीन हैं।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16. Miscellaneous : During the period of
                                                                        Probation or continuation as the case may be
                                                                        liable and shall accept transfer to any
                                                                        whatever be the. Interest of the company are
                                                                        involved in the state of Tamilnadu or where
                                                                        in India. </td>
                                                                    <td>16. विविध :
                                                                        सेवा की अवधि के दौरान या स्थानांतरण पर कंपनी
                                                                        के विवेक पर आपको कंपनी की किसी भी सहायक
                                                                        कंपनी, सहयोगी कंपनियों या शाखाओं में
                                                                        स्थानांतरित किया जा सकता है।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16b. You shall not, at any times disclose
                                                                        to any one any information, know - how,
                                                                        knowledge, secrets, methods, plans etc., of
                                                                        the company. </td>
                                                                    <td>16बी. किसी भी समय कंपनी की जानकारी या
                                                                        व्यावसायिक खुफिया, क्षमताओं, रहस्यों या
                                                                        रोडमैप का खुलासा नहीं किया जा सकता है।.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16c. During the period of your service with
                                                                        the company you shall not carry on any
                                                                        business of your own but carry out your
                                                                        duties diligently. Loyally and to the best
                                                                        of your capacity. </td>
                                                                    <td>16ग. आपको अपने कार्यकाल के दौरान अपना खुद का
                                                                        कोई व्यवसाय नहीं करना चाहिए, आपको अपनी
                                                                        योग्यता के अनुसार जिम्मेदारी और निष्ठा के
                                                                        साथ कर्तव्यों का पालन करना चाहिए।</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16d. This appointment / probation is made
                                                                        on the understanding that the information
                                                                        given by you in your application for
                                                                        appointment is correct, true and complete.
                                                                        If it is found at any stage that the
                                                                        information given by you is not correct /
                                                                        true / complete, or you had suppressed
                                                                        information, this appointment may be
                                                                        withdrawn before you join services with us
                                                                        or your services may be terminated at any
                                                                        time after taken up employment with us. The
                                                                        address furnished in your application for
                                                                        appointment are the basic for the
                                                                        communication of all correspondence. It is
                                                                        your bounded duty to furnish the latest
                                                                        address always, keep in touch with your
                                                                        latest address to the management. </td>
                                                                    <td>16डी. यह भर्ती प्रशिक्षण आवेदन वास्तविक है।
                                                                        इसकी संपूर्णता में प्रदान की गई जानकारी इस
                                                                        आधार पर बनाई जाती है कि यह सत्य है। यदि किसी
                                                                        भी समय प्रदान की गई जानकारी झूठी है या
                                                                        जानकारी रोक रही है, तो आपको रोजगार या रोजगार
                                                                        से हटा दिया जाएगा, और आपके रोजगार आवेदन पत्र
                                                                        में दिया गया पता भविष्य के संचार का आधार है।
                                                                        यह आपकी जिम्मेदारी है कि आप हमें अपना पिछला
                                                                        बदला हुआ पता प्रदान करें और प्रशासन को अंतिम
                                                                        बदला हुआ पता भेजें।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16e. The management reserve the right lay -
                                                                        off with compensation of retrench our
                                                                        services at its discretion for any reason
                                                                        whatsoever and will be paid compensation as
                                                                        per the provisions of the industrial
                                                                        disputes Act. 1947. </td>
                                                                    <td>16ई. आप कारखाना अधिनियम, 1947 के अनुसार
                                                                        मुआवजे के हकदार हैं, चाहे बर्खास्तगी या
                                                                        छंटनी किसी भी कारण से प्रबंधन के विवेक पर
                                                                        हो।.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 17. Residential Address Your residential
                                                                        address as stated above is as furnished by
                                                                        and is deemed as the address for any
                                                                        specific communication or notice to you. You
                                                                        should keep the management information of
                                                                        any change in your address that may arise at
                                                                        your end. </td>
                                                                    <td>घर का पता:
                                                                        आपका आवासीय पता आपके द्वारा ऊपर दिया गया है।
                                                                        आपको सूचित करने के लिए उपयुक्त समझी जाने
                                                                        वाली कोई भी विशिष्ट जानकारी प्रबंधन और पते
                                                                        के किसी भी परिवर्तन को सूचित करना चाहिए।.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 18. Any permanent workman desirous of
                                                                        leaving the service shall give one month's
                                                                        notice and return all company belongings.
                                                                    </td>
                                                                    <td>18. कोई भी आकस्मिक कर्मचारी जो स्वेच्छा से
                                                                        इस्तीफा देना चाहता है, प्रबंधन को एक महीने
                                                                        का नोटिस देकर और कंपनी की सारी संपत्ति
                                                                        प्रबंधन को सौंपकर रोजगार से वापस ले सकता
                                                                        है।.</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpStatingHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Stating
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeestatingpathhindi}}"
                                        ng-hide="Employeestatingpathhindi == null || Employeestatingpathhindi == '' "
                                        ng-show="Employeestatingpathhindi != null "
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

                <div class="modal fade" id="ModalCenter1EmpAgreementTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    பணியாளர் நம்பகத்தன்மை மற்றும் வெளிப்படுத்தாத ஒப்பந்தம்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Agreement
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpAgreementTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpAgreementTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpAgreementTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpAgreementTamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpAgreementTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>பணியாளர் நம்பகத்தன்மை மற்றும் வெளிப்படுத்தாத
                                                                ஒப்பந்தம்</h4>
                                                        </center>



                                                        <p>நல்ல ஆலோசனையுடனும், சைன்மார்க்ஸ் இண்டஸ்ட்ரீஸ் இந்தியா
                                                            பிரைவேட் லிமிடெட் (கம்பெனி) எனது வேலைவாய்ப்பு அல்லது
                                                            தொடர்ச்சியான வேலைவாய்ப்பைக் கருத்தில் கொண்டு, அடியிற்
                                                            கையொப்பமிட்ட ஊழியர் நான் இந்த ஒப்பந்தத்தின் விதிமுறைகளை
                                                            (“ஒப்பந்தம்”) ஒப்புக்கொள்கிறேன்:</p>

                                                        <h3>1. ரகசிய தகவல்</h3>
                                                        <p><b><u>அ. நிறுவனத்தின் தகவல்:</u></b> எனது வேலைவாய்ப்பு
                                                            காலத்திலும், அதன்பிறகு மூன்று வருட காலத்திலும்,
                                                            நிறுவனத்தின் நன்மை தவிர, அல்லது எந்தவொரு நபருக்கும்,
                                                            நிறுவனத்துக்கும் அல்லது நிறுவனத்தின் எழுத்துப்பூர்வ
                                                            அங்கீகாரமின்றி இருக்கும் நிறுவனத்துக்கும், நிறுவனத்தின்
                                                            எந்த ரகசிய தகவலும் நம்பிக்கையுடன் இருப்பதற்கும், எல்லா
                                                            நேரங்களிலும் நம்பிக்கையுடன் இருக்க நான்
                                                            ஒப்புக்கொள்கிறேன். எனக்கு புரிவது என்னவென்றால் “ரகசிய
                                                            தகவல்” என்பது எந்தவொரு நிறுவனத்தின் தனியுரிம தகவல்,
                                                            தொழில்நுட்ப தரவு, வர்த்தக ரகசியங்கள் அல்லது ஆராய்ச்சி,
                                                            தயாரிப்புத் திட்டங்கள், தயாரிப்புகள், சேவைகள்,
                                                            வாடிக்கையாளர் பட்டியல்கள், சந்தைகள், மென்பொருள்,
                                                            முன்னேற்றங்கள், கண்டுபிடிப்புகள் உள்ளிட்டவற்றை
                                                            உள்ளடக்கியது, ஆனால் அவை மட்டுமல்ல. செயல்முறைகள்,
                                                            சூத்திரங்கள், தொழில்நுட்பம், வடிவமைப்புகள், வரைபடங்கள்,
                                                            பொறியியல், வன்பொருள் உள்ளமைவு தகவல், சந்தைப்படுத்தல்,
                                                            நிதி அல்லது நிறுவனம் எனக்கு நேரடியாகவோ அல்லது
                                                            மறைமுகமாகவோ வெளிப்படுத்திய பிற வணிகத் தகவல்கள்.</p>

                                                        <p><b><u>ஆ. விதிவிலக்குகள்:</u></b> நான் நிரூபிக்கக்கூடிய
                                                            ரகசிய தகவலின் பகுதிக்கு மேற்கூறிய கடமைகள் மற்றும்
                                                            கட்டுப்பாடுகள் பொருந்தாது:</p>
                                                        <ul>
                                                            <li>கிடைத்தது அல்லது பொதுவாக பொதுமக்களுக்கு கிடைத்தது
                                                                அல்லது</li>
                                                            <li>கோரப்பட்டது அல்லது சட்டப்பூர்வமாக
                                                                கட்டாயப்படுத்தப்பட்டது (வாய்வழி கேள்விகள்,
                                                                விசாரணையாளர்கள், தகவல் அல்லது ஆவணங்களுக்கான
                                                                கோரிக்கைகள், சப்போனா, சிவில் அல்லது கிரிமினல்
                                                                புலனாய்வு கோரிக்கை அல்லது ஒத்த செயல்முறை) அல்லது
                                                                தடைசெய்யப்பட்ட எந்தவொரு வெளிப்பாட்டையும் செய்ய ஒரு
                                                                ஒழுங்குமுறை அமைப்பு தேவைப்படுகிறது இல்லையெனில், இந்த
                                                                ஒப்பந்தத்தால் கட்டுப்படுத்தப்பட்டால், நான்
                                                                கட்டுப்படுவேன்.</li>
                                                            <li>அத்தகைய எந்தவொரு கோரிக்கையையும் (களை) உடனடியாக
                                                                அறிவித்து நிறுவனத்திற்கு வழங்குவதன் மூலம் நிறுவனம்
                                                                பொருத்தமான பாதுகாப்பு உத்தரவு அல்லது பிற பொருத்தமான
                                                                தீர்வுகளைத் தேடலாம் மற்றும்</li>
                                                            <li>அத்தகைய பாதுகாப்பு உத்தரவைப் பெறுவதில்
                                                                நிறுவனத்திற்கு நியாயமான உதவிகளை வழங்குதல். அத்தகைய
                                                                பாதுகாப்பு உத்தரவு அல்லது பிற தீர்வுகள்
                                                                பெறப்படாவிட்டால் அல்லது நிறுவனம் இங்கு தள்ளுபடியை
                                                                வழங்கினால், ரகசிய தகவலின் அந்த பகுதியை (மற்றும் அந்த
                                                                பகுதியை மட்டுமே) நான் வழங்கலாம், இது நிறுவனத்திற்கு
                                                                நியாயமான முறையில் ஏற்றுக்கொள்ளக்கூடிய ஆலோசனையின்
                                                                எழுத்துப்பூர்வ கருத்தில், நான் சட்டப்பூர்வமாக
                                                                கட்டாயப்படுத்தப்பட்டது அல்லது வெளிப்படுத்த
                                                                தேவைப்பட்டால்; வழங்கப்பட்டால், இரகசியத்தன்மை
                                                                வெளிப்படுத்தப்படும் எந்தவொரு ரகசிய தகவலுக்கும்
                                                                வழங்கப்படும் என்ற நம்பகமான உத்தரவாதத்தைப் பெற
                                                                நியாயமான முயற்சிகளைப் பயன்படுத்துவேன்.</li>
                                                        </ul>

                                                        <p><b><u>இ. முன்னாள் வேலைவாய்ப்பு தகவல்:</u></b>
                                                            நிறுவனத்துடனான எனது வேலையின் போது நான் ஒப்புக்கொள்வது
                                                            என்னவென்றால், முறையற்ற முறையில் பயன்படுத்தக்கூடாதுஅல்லது
                                                            எந்த தனியுரிம தகவலையும் வெளியிடவும் அல்லது எந்தவொரு
                                                            முன்னாள் அல்லது ஒரே நேரத்தில் முதலாளியின் வர்த்தக
                                                            இரகசியங்கள் அல்லது மற்ற நபர் அல்லது எந்தவொரு
                                                            வெளியிடப்படாத ஆவணத்தையும் நிறுவனத்தின் வளாகத்திற்கு
                                                            கொண்டு வரக்கூடாது அல்லது அத்தகைய எந்தவொரு முதலாளிக்கும்
                                                            சொந்தமான தனியுரிம தகவல் அல்லது அத்தகைய முதலாளி, நபர்
                                                            அல்லது நபர் அல்லது நிறுவனம் எழுத்துப்பூர்வமாக ஒப்புக்
                                                            கொள்ளாவிட்டால்.</p>

                                                        <p><u><b>ஈ. மூன்றாம் தரப்பு தகவல்:</u></b>எதிர்காலத்தில்
                                                            மூன்றாம் தரப்பினரிடமிருந்து அவர்களின் ரகசிய அல்லது
                                                            தனியுரிம தகவல்களை சில வரையறுக்கப்பட்ட நோக்கங்களுக்காக
                                                            மட்டுமே பயன்படுத்துவேன் என்பதை நான் உணர்கிறேன். இதுபோன்ற
                                                            அனைத்து ரகசிய அல்லது தனியுரிம தகவல்களையும் கடுமையான
                                                            நம்பிக்கையுடன் வைத்திருக்க ஒப்புக்கொள்கிறேன், அதை
                                                            எந்தவொரு நபருக்கும், நிறுவனத்திற்கும் அல்லது
                                                            நிறுவனத்திற்கும் வெளியிடக்கூடாது அல்லது அத்தகைய மூன்றாம்
                                                            தரப்பினருடனான நிறுவனத்தின் உடன்படிக்கைக்கு இணங்க
                                                            நிறுவனத்திற்காக எனது பணிகளை மேற்கொள்வதில் தேவையானதைத்
                                                            தவிர அதைப் பயன்படுத்தக்கூடாது.</p>

                                                        <h3>2. நிர்வாக பொருட்களை திரும்ப பெறுதல்:</h3>
                                                        <p>எனது வேலையில் இருந்து விலகும் போது, நிறுவனத்தின் வணிகம்
                                                            தொடர்பான அனைத்து ஆவணங்களும், அறிக்கைகள், சுருக்கங்கள்,
                                                            பட்டியல்கள், கடிதப் போக்குவரத்து, தகவல், கணினி
                                                            கோப்புகள், கணினி வட்டுகள் மற்றும் நிறுவனத்துடன் எனது
                                                            வேலையின் போது நான் பெற்ற மற்ற எல்லா பொருட்களும் மற்றும்
                                                            அத்தகைய பொருட்களின் அனைத்து நகல்களும் திரும்ப
                                                            ஒப்படைத்துவிடுவேன்.</p>

                                                        <h3>3. சட்டபூர்வமான மற்றும் தகுதியான தீர்வுகள்:</h3>
                                                        <p>இந்த ஒப்பந்தத்தின் எந்தவொரு விதிகளை மீறினாலும் தடை
                                                            உத்தரவைப் பெற நிறுவனத்திற்கு உரிமை உண்டு என்பதையும் நான்
                                                            உணர்கிறேன். அத்தகைய போட்டி அல்லது வெளிப்பாட்டைத் தடுக்க
                                                            ஒரு தடை உத்தரவு, குறிப்பிட்ட செயல்திறன் அல்லது பிற சமமான
                                                            தீர்வைப் பெற நிறுவனத்திற்கு உரிமை உண்டு என்பதையும், மற்ற
                                                            சட்ட தீர்வுகளுக்கு நிறுவனத்திற்கு உரிமை வழங்கலாம்
                                                            என்பதையும் நான் உணர்கிறேன். வழக்கறிஞரின் கட்டணம் மற்றும்
                                                            செலவுகள் உட்பட.</p>

                                                        <h3>4. வாரிசுகள் மற்றும் பணிகள்:</h3>
                                                        <p>இந்த ஒப்பந்தம் எனது வாரிசுகள், நிர்வாகிகள், நிர்வாகிகள்
                                                            மற்றும் பிற சட்ட பிரதிநிதிகள் மீது கட்டுப்படும், மேலும்
                                                            நிறுவனம், அதன் வாரிசுகள் மற்றும் அதன் பணியாளர்களின்
                                                            நலனுக்காக இருக்கும். இந்த ஒப்பந்தத்தின் கீழ் எனது
                                                            எந்தவொரு உரிமைகளையும் நான் ஒதுக்கவோ, அல்லது எனது கடமைகள்
                                                            எதையும் ஒப்படைக்கவோ கூடாது.</p>

                                                        <h3>5. தொடர் கடமைகள்:</h3>
                                                        <p>இந்த ஒப்பந்தத்தில் விவரிக்கப்பட்டுள்ள கடமைகள் மற்றும்
                                                            உரிமைகள் நிறுவனத்துடனான எனது வேலைவாய்ப்பு
                                                            நிறுத்தப்படுவதைத் தக்கவைக்கும்.</p>

                                                        <h3>6. சீர்திருத்தல்:</h3>
                                                        <p>எப்போது வேண்டுமானாலும், இந்த ஒப்பந்தத்தின் ஒவ்வொரு
                                                            ஏற்பாடும் பொருந்தக்கூடிய சட்டத்தின் கீழ் பயனுள்ளதாகவும்
                                                            செல்லுபடியாகும் விதமாகவும் விளக்கப்படும், ஆனால் இந்த
                                                            ஒப்பந்தத்தின் எந்தவொரு ஏற்பாடும் எந்தவொரு பொருந்தக்கூடிய
                                                            சட்டம் அல்லது விதியின் கீழ் எந்த வகையிலும் செல்லாதது,
                                                            சட்டவிரோதமானது அல்லது செயல்படுத்த முடியாதது எனக்
                                                            கருதப்பட்டால் எந்தவொரு அதிகார வரம்பும், அத்தகைய
                                                            செல்லுபடியாகாத தன்மை, சட்டவிரோதம் அல்லது செயல்படுத்த
                                                            முடியாதது வேறு எந்த விதிமுறையையும் அல்லது வேறு எந்த
                                                            அதிகார வரம்பையும் பாதிக்காது, ஆனால் இந்த ஒப்பந்தம்
                                                            சீர்திருத்தப்பட்டு, கட்டாயப்படுத்தப்பட்டு, அத்தகைய
                                                            அதிகார வரம்பில் செயல்படுத்தப்படும், இது போன்ற தவறான,
                                                            சட்டவிரோத அல்லது செயல்படுத்த முடியாத விதிகள் இங்கு
                                                            ஒருபோதும் இல்லாதது போல. </p>

                                                        <h3>7. அரசு சட்டம்:</h3>
                                                        <p>இந்த ஒப்பந்தம் சட்ட விதிகளின் முரண்பாடுகளைப்
                                                            பொருட்படுத்தாமல் தமிழக மாநிலத்தின் சட்டங்களால்
                                                            நிர்வகிக்கப்படும். </p>

                                                        <p>சாட்சி அதற்கென்றே உள்ள தரப்புகள் இந்த ஒப்பந்தத்தை
                                                            நிறைவேற்றுகின்றன</p>


                                                        <p style="text-align:left;">ஏற்றுக்கொள்வது/மற்றும்
                                                            ஒப்புக்கொள்வது<span style="float:right;">செய்ன்மார்க்ஸ்
                                                                இண்டஸ்ட்ரீஸ் (இ) பிரைவேட் லிமிடெட்</span></p>
                                                        <p style="text-align:left;">பணியாளரின் பெயர் /
                                                            கையொப்பம்<span style="float:right;">மேலளார்
                                                                கையொப்பம்</span></p>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpAgreementTamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Agreement
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeeagreemantpathtamil}}"
                                        ng-hide="Employeeagreemantpathtamil == null || Employeeagreemantpathtamil == '' "
                                        ng-show="Employeeagreemantpathtamil != null "
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


                <div class="modal fade" id="ModalCenter1EmpAgreementHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    EMPLOYEE’S CONFIDENTIALITY & NON-DISCLOSURE AGREEMENT
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Agreement
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpAgreementHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpAgreementHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpAgreementHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpAgreementHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpAgreementHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>EMPLOYEE’S CONFIDENTIALITY & NON-DISCLOSURE
                                                                AGREEMENT<br />कर्मचारी की
                                                                गोपनीयता और गैर प्रकटीकरण समझौते</h4>
                                                        </center>


                                                        <p>FOR GOOD CONSIDERATION and in consideration of my
                                                            employment or continued
                                                            employment by Sainmarks Industries India Pvt Ltd (the
                                                            Company”), I, the
                                                            undersigned employee, hereby agree to the terms of this
                                                            agreement (the
                                                            “Agreement”):</p>
                                                        <p>अच्छी सहमति के लिए और सेनमार्क्स इंडस्ट्रीज इंडिया
                                                            प्राइवेट लिमिटेड (कंपनी)
                                                            द्वारा मेरे रोजगार या निरंतर रोजगार पर विचार करते हुए,
                                                            मैं, हस्ताक्षर किया हुआ
                                                            कर्मचारी, इस समझौता ("एग्रीमेंट") की शर्तों से सहमत हैं:
                                                        </p>

                                                        <h3>1. CONFIDENTIAL INFORMATION</h3>
                                                        <p><b><u>a. Company Information :</u></b> - I agree at all
                                                            times during the term of
                                                            my employment and for a period of three years
                                                            thereafter, to hold in strictest
                                                            confidence, and not to use, except for the benefit of
                                                            the Company, or to
                                                            disclose to any person, firm or corporation without
                                                            written authorization of the
                                                            Company, any Confidential Information of the Company. I
                                                            understand that
                                                            “Confidential Information” means any Company proprietary
                                                            information, technical
                                                            data, trade secrets or know-how, including, but not
                                                            limited to, research,
                                                            product plans, products, services, customer lists,
                                                            markets, software,
                                                            developments, inventions, processes, formulas,
                                                            technology, designs, drawings,
                                                            engineering, hardware configuration information,
                                                            marketing, finances or other
                                                            business information disclosed to me by the Company
                                                            either directly or
                                                            indirectly.</p>

                                                        <h3>1. गोपनीय सूचना</h3>
                                                        <p><b><u>i. कंपनी की जानकारी </u></b> - मैं अपने रोजगार की
                                                            अवधि के दौरान और उसके बाद
                                                            तीन साल की अवधि के लिए सहमत हूँ, कंपनी के लाभ के लिए,
                                                            कंपनी के लिखित प्राधिकरण
                                                            के बिना किसी भी व्यक्ति, फर्म या निगम के किसी भी
                                                            व्यक्ति, कंपनी या निगम को प्रकट
                                                            करने के अलावा, सबसे अधिक कठोरतम विश्रंभ, और उपयोग नहीं
                                                            करना। मैं समझता हूँ कि
                                                            "गोपनीय जानकारी" का अर्थ किसी भी कंपनी के सांपातिक वाली
                                                            जानकारी, तकनीकी डेटा,
                                                            व्यापार रहस्य, लेकिन शोध, उत्पाद योजनाओं, उत्पादों,
                                                            सेवाओं, ग्राहक सूचियों,
                                                            बाजारों, सॉफ्टवेयर, विकास, आविष्कारों तक सीमित नहीं है,
                                                            प्रक्रिया, सूत्र,
                                                            प्रौद्योगिकी, डिजाइन, चित्र, इंजीनियरिंग, हार्डवेयर
                                                            कॉन्फ़िगरेशन जानकारी, विपणन,
                                                            वित्त या अन्य व्यावसायिक जानकारी कंपनी द्वारा मेरे लिए
                                                            प्रत्यक्ष या अप्रत्यक्ष
                                                            रूप से बताई गई है। </p>

                                                        <p>1. <b><u>Exceptions</u></b> - The foregoing obligations
                                                            and restrictions do not
                                                            apply to that part of the Confidential Information that
                                                            I can demonstrate:</p>

                                                        <ul type="none">
                                                            <li>i. was available or became generally available to
                                                                the public; or</li>
                                                            <li>ii. was requested or legally compelled (by oral
                                                                questions, interrogatories,
                                                                requests for information or documents, subpoena,
                                                                civil or criminal
                                                                investigative demand or similar process) or is
                                                                required by a regulatory body
                                                                to make any disclosure which is prohibited or
                                                                otherwise constrained by this
                                                                Agreement, provided, that I shall
                                                            </li>
                                                            <li>
                                                                <ul type="none">
                                                                    <li>a. provide the Company with prompt notice of
                                                                        any such request(s) so
                                                                        that the Company may seek an appropriate
                                                                        protective order or other
                                                                        appropriate remedy and </li>
                                                                    <li>b. Provide reasonable assistance to the
                                                                        Company in obtaining any
                                                                        such protective order. If such protective
                                                                        order or other remedy is
                                                                        not obtained or the Company grants a waiver
                                                                        hereunder, then I may
                                                                        furnish that portion (and only that portion)
                                                                        of the Confidential
                                                                        Information which, in the written opinion of
                                                                        counsel reasonably
                                                                        acceptable to the Company, I am legally
                                                                        compelled or am otherwise
                                                                        required to disclose; provided, that I shall
                                                                        use reasonable efforts
                                                                        to obtain reliable assurance that
                                                                        confidentiality be accorded any
                                                                        Confidential Information so disclosed.</li>
                                                                </ul>

                                                            </li>
                                                        </ul>


                                                        <p>
                                                            1. अपवाद - पूर्वगामी दायित्व और प्रतिबंध गोपनीय जानकारी
                                                            के उस हिस्से पर लागू
                                                            नहीं होते हैं जिन्हें मैं प्रदर्शित कर सकता हूं:
                                                        </p>

                                                        <ul type="none">
                                                            <li>i. आम तौर पर जनता के लिए उपलब्ध था</li>
                                                            <li>ii. मैं अनुरोध किया गया था या कानूनी रूप से मजबूर
                                                                किया गया था (मौखिक
                                                                प्रश्नों, पूछताछ, सूचना या दस्तावेजों के लिए अनुरोध,
                                                                उप-नागरिक, या आपराधिक
                                                                जांच की मांग या इसी तरह की प्रक्रिया) या किसी भी
                                                                प्रकटीकरण के लिए एक नियामक
                                                                निकाय द्वारा आवश्यक है जो इस समझौते द्वारा निषिद्ध
                                                                या अन्यथा विवश है,
                                                            </li>
                                                            <li>
                                                                <ul type="none">
                                                                    <li>a. कंपनी को ऐसे किसी भी अनुरोध (नों) की
                                                                        त्वरित सूचना प्रदान करें
                                                                        ताकि कंपनी एक उचित सुरक्षात्मक आदेश या अन्य
                                                                        उचित उपाय और खोज सके
                                                                    </li>
                                                                    <li>b. इस तरह के किसी भी सुरक्षात्मक आदेश को
                                                                        प्राप्त करने में कंपनी को
                                                                        उचित सहायता प्रदान करें। यदि इस तरह के
                                                                        सुरक्षात्मक आदेश या अन्य उपाय
                                                                        प्राप्त नहीं किए जाते हैं या कंपनी एक छूट
                                                                        प्रदान करती है, तो मैं
                                                                        गोपनीय जानकारी के उस हिस्से (और केवल उस
                                                                        हिस्से) को प्रस्तुत कर सकता
                                                                        हूं, जो कंपनी को उचित रूप से स्वीकार्य वकील
                                                                        की लिखित राय में है, मैं
                                                                        हूं। कानूनी रूप से मजबूर या अन्यथा प्रकट
                                                                        करने के लिए आवश्यक है;
                                                                        बशर्ते, मैं विश्वसनीय आश्वासन प्राप्त करने
                                                                        के लिए उचित प्रयासों का
                                                                        उपयोग करूंगा, ताकि गोपनीयता का खुलासा किया
                                                                        गया कोई भी गोपनीय जानकारी
                                                                        प्राप्त हो सके</li>
                                                                </ul>

                                                            </li>
                                                        </ul>

                                                        <p>2. <b><u>Former Employment Information </u></b> - I agree
                                                            during my employment
                                                            with the Company, not to improperly use or disclose any
                                                            proprietary information
                                                            or trade secrets of any former or concurrent employer or
                                                            other person or entity
                                                            and not bring onto the premises of the Company any
                                                            unpublished document or
                                                            proprietary information belonging to any such employer,
                                                            person or entity unless
                                                            consented to in writing by such employer, person or
                                                            entity.</b>
                                                        </p>

                                                        <p>3. <b><u>पूर्व रोजगार सूचना </u></b> - मैं कंपनी के साथ
                                                            अपने रोजगार के दौरान सहमत
                                                            हूं, किसी पूर्व या समवर्ती नियोक्ता या अन्य व्यक्ति या
                                                            इकाई के किसी भी मालिकाना
                                                            जानकारी या व्यापार रहस्यों का अनुचित रूप से उपयोग या
                                                            खुलासा करने के लिए नहीं और
                                                            कंपनी के परिसर में किसी भी अप्रकाशित दस्तावेज़ या
                                                            स्वामित्व को नहीं लाना। ऐसे
                                                            किसी भी नियोक्ता, व्यक्ति या इकाई से संबंधित जानकारी जब
                                                            तक कि ऐसे नियोक्ता,
                                                            व्यक्ति या संस्था द्वारा लिखित रूप में सहमति नहीं दी
                                                            जाती है।</b>
                                                        </p>

                                                        <p>4. <b><u>Third Party Information </u></b> - I recognize
                                                            that the Company has
                                                            received and in the future will receive from third
                                                            parties their confidential or
                                                            proprietary information to use it only for certain
                                                            limited purposes. I agree to
                                                            hold all such confidential or proprietary information in
                                                            the strictest
                                                            confidence and not to disclose it to any person, firm or
                                                            corporation or to use
                                                            it except as necessary in carrying out my work for the
                                                            Company consistent with
                                                            the Company’s agreement with such third party.</b>
                                                        </p>


                                                        <p>5. <b><u>थर्ड पार्टी इंफॉर्मेशन </u></b> - मैं मानता हूं
                                                            कि कंपनी को प्राप्त हुआ
                                                            है और भविष्य में तीसरे पक्षों से प्राप्त होगा उनकी
                                                            गोपनीय या मालिकाना जानकारी
                                                            केवल कुछ सीमित उद्देश्यों के लिए इसका उपयोग करने के लिए।
                                                            मैं इस तरह की सभी
                                                            गोपनीय या मालिकाना जानकारी को कड़े विश्वास में रखने के
                                                            लिए सहमत हूं और किसी भी
                                                            व्यक्ति, फर्म या निगम को इसका खुलासा नहीं करने या कंपनी
                                                            के लिए कंपनी के समझौते
                                                            के अनुरूप मेरे काम को पूरा करने के लिए आवश्यक के अलावा
                                                            इसका उपयोग करने के लिए
                                                            सहमत हूं।</b>
                                                        </p>


                                                        <h3>2. RETURN OF PROPERTY</h3>
                                                        <p>Upon termination of my employment, I will return to the
                                                            Company, retaining no
                                                            copies or notes, all documents relating to the Company’s
                                                            business including, but
                                                            not limited to, reports, abstracts, lists,
                                                            correspondence, information, computer
                                                            files, computer disks, and all other materials and all
                                                            copies of such material,
                                                            obtained by me during my employment with the Company.
                                                        </p>

                                                        <h3>संपत्ति का पुनर्गठन</h3>
                                                        <p>अपने रोजगार को समाप्त करने पर, मैं कंपनी में वापस आऊंगा,
                                                            कोई प्रतियां या नोट नहीं
                                                            रखूंगा, कंपनी के व्यवसाय से संबंधित सभी दस्तावेज, लेकिन
                                                            रिपोर्ट, सार, सूचियों,
                                                            पत्राचार, सूचना, कंप्यूटर फ़ाइलों, कंप्यूटर डिस्क और
                                                            अन्य सभी सामग्री और इस तरह
                                                            की सामग्री की सभी प्रतियां, कंपनी के साथ मेरे रोजगार के
                                                            दौरान मेरे द्वारा
                                                            प्राप्त की गई हैं।</p>

                                                        <h3>3. LEGAL AND EQUITABLE REMEDIES</h3>
                                                        <p>I recognize that the Company may be irreparably damaged
                                                            by any breach of this
                                                            Agreement and that the Company shall be entitled to seek
                                                            an injunction, specific
                                                            performance or other equitable remedy to prevent such
                                                            competition or disclosure,
                                                            and may entitle the Company to other legal remedies,
                                                            including attorney’s fees
                                                            and costs.</p>
                                                        <h3>3. कानूनी और योग्य उपाय</h3>
                                                        <p>मैं मानता हूं कि कंपनी इस समझौते के किसी भी उल्लंघन से
                                                            अपूरणीय रूप से क्षतिग्रस्त
                                                            हो सकती है और कंपनी इस तरह की प्रतियोगिता या प्रकटीकरण
                                                            को रोकने के लिए
                                                            निषेधाज्ञा, विशिष्ट प्रदर्शन या अन्य न्यायसंगत उपाय
                                                            खोजने की हकदार होगी और कंपनी
                                                            को अन्य कानूनी उपायों का अधिकार दे सकती है। वकील की फीस
                                                            और लागत सहित।</p>



                                                        <h3>4. SUCCESORS AND ASSIGNS</h3>
                                                        <p>This Agreement will be binding upon my heirs, executors,
                                                            administrators and other
                                                            legal representatives and will be for the benefit of the
                                                            Company, its
                                                            successors, and its assigns. I may not assign any of my
                                                            rights, or delegate any
                                                            of my obligations, under this Agreement.</p>
                                                        <h3>4. उत्तराधिकारी</h3>
                                                        <p>यह समझौता मेरे उत्तराधिकारियों, निष्पादकों, प्रशासकों और
                                                            अन्य कानूनी प्रतिनिधियों
                                                            के लिए बाध्यकारी होगा और कंपनी, इसके उत्तराधिकारियों और
                                                            इसके कार्य के लाभ के लिए
                                                            होगा। मैं इस समझौते के तहत अपने किसी भी अधिकार को सौंप
                                                            नहीं सकता हूं, या अपने
                                                            किसी भी दायित्व को सौंप सकता हूं।</p>


                                                        <h3>5. CONTINUING OBLIGATIONS</h3>
                                                        <p>The obligations and rights described in this Agreement
                                                            shall survive the
                                                            termination of my employment with the Company.</p>
                                                        <h3>5. संपर्क सामग्री</h3>
                                                        <p>इस समझौते में वर्णित दायित्वों और अधिकारों को कंपनी के
                                                            साथ मेरे रोजगार की समाप्ति
                                                            से बचाना होगा।</p>

                                                        <h3>6. SEVERABILITY</h3>
                                                        <p>Whenever possible, each provision of this Agreement will
                                                            be interpreted in such
                                                            manner as to be effective and valid under applicable
                                                            law, but if any provision
                                                            of this Agreement is held to be invalid, illegal or
                                                            unenforceable in any respect
                                                            under any applicable law or rule in any jurisdiction,
                                                            such invalidity,
                                                            illegality or unenforceability will not affect any other
                                                            provision or any other
                                                            jurisdiction, but this agreement will be reformed,
                                                            construed and enforced in
                                                            such jurisdiction as if such invalid, illegal or
                                                            unenforceable provisions had
                                                            never been contained herein.</p>
                                                        <h3>6. स्थिरता</h3>
                                                        <p>जब भी संभव हो, इस समझौते के प्रत्येक प्रावधान की व्याख्या
                                                            इस प्रकार की जाएगी, जो
                                                            लागू कानून के तहत प्रभावी और मान्य हो, लेकिन यदि इस
                                                            समझौते के किसी भी प्रावधान
                                                            को किसी भी लागू कानून या नियम के तहत किसी भी संबंध में
                                                            अमान्य, अवैध या अप्राप्य
                                                            माना जाता है। किसी भी क्षेत्राधिकार, इस तरह की अमान्यता,
                                                            अवैधता या अनियंत्रितता
                                                            किसी अन्य प्रावधान या किसी अन्य क्षेत्राधिकार को
                                                            प्रभावित नहीं करेगी, लेकिन इस
                                                            समझौते को ऐसे अधिकार क्षेत्र में सुधार, मान लिया जाएगा
                                                            और लागू किया जाएगा जैसे
                                                            कि यह अवैध, अवैध या अप्रवर्तनीय प्रावधान कभी भी यहां
                                                            निहित नहीं थे।</p>



                                                        <h3>7. GOVERNING LAW</h3>
                                                        <p>This Agreement shall be governed by the laws of the state
                                                            of Tamil Nadu without
                                                            regard to its conflicts of law provisions. </p>
                                                        <h3>7. लौटना</h3>
                                                        <p>यह समझौता कानून के प्रावधानों के टकराव के बिना तमिलनाडु
                                                            राज्य के कानूनों द्वारा
                                                            शासित होगा।
                                                            विटनेस में, नीचे दिए गए पक्ष इस समझौते को
                                                            ___________________________ पर
                                                            निष्पादित करते हैं।
                                                            स्वीकार किए जाते हैं और स्वीकार किए जाते हैं </p>


                                                        <p>IN WITNESS WHEREOF, the parties below hereby execute this
                                                            Agreement on
                                                            ____________________.</p>


                                                        <p style="text-align:left;">Accepted and Acknowledged<span
                                                                style="float:right;">Sainmarks Industries India Pvt
                                                                Ltd</span></p>
                                                        <p style="text-align:left;">Employee’s
                                                            name/signature<br />कर्मचारी का नाम /
                                                            हस्ताक्षर हस्ताक्षरकर्ता<span
                                                                style="float:right;">Signatory</span></p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpAgreementHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Agreement
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeeagreemantpathhindi}}"
                                        ng-hide="Employeeagreemantpathhindi == null || Employeeagreemantpathhindi == '' "
                                        ng-show="Employeeagreemantpathhindi != null "
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


                <div class="modal fade" id="ModalCenter1EmpTrainingTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    தொழிலாளர்களின் பயிற்சி குறித்த விபரம்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Training
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpTrainingTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpTrainingTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpTrainingTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpTrainingTamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpTrainigTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>தொழிலாளர்களின் பயிற்சி குறித்த விபரம்</h4>
                                                        </center>



                                                        <p>பெயர் : {{Title}} {{Firstname}} {{Lastname}}</p>
                                                        <p>தொழிலாளர் எண் : {{Employeeid}}</p>
                                                        <p>பிரிவு : {{EmpDepartment}}</p>
                                                        <p>பணியில் சேர்ந்த நாள் : {{Date_Of_Joing2}} </p>


                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>S.No / வ.எண்</td>

                                                                    <td>PPE பயன்பாடு / விழிப்புணர்வு</td>

                                                                    <td>பயிற்சி வகை & தேதி</td>

                                                                    <td>பயிற்சி அளித்தவர் விபரம்</td>

                                                                    <td>பயிற்சி பெற்றவர் கையொப்பம்</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>நிர்வாக கொள்கை, வேலை நேரம், பணியமர்த்தும்
                                                                        கோட்பாடுகள் குறித்த விளக்க
                                                                        பயிற்சி</td>
                                                                    <td>
                                                                        In House Training on
                                                                        ______________
                                                                    </td>
                                                                    <td>(HR -Dept)
                                                                        ______________
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>கொடுப்பனர்களின் கொள்கை மற்றும் கோட்பாடுகள்
                                                                        பற்றிய விளக்க பயிற்சி
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="4">3

                                                                    </td>
                                                                    <td>பாதுகாப்பு விழிப்புணர்வு பயிற்சி<br />a.
                                                                        முதலுதவி பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>b. அவசரகாலத்தில் வெளியேறும் பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>c. தீயனைப்பான்கள் இயக்கப் பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>d. அவசர காலத்தில் தொடர்பு கொள்ள வேண்டிய
                                                                        எண்கள்</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>தனிநபர் பாதுகாப்பு சாதனங்கள் உபயோகிக்க
                                                                        பயிற்சி மற்றும் விழிப்புணர்வு
                                                                        குறித்த பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>பொது சுகாதாரம் மற்றும் சுற்றுப்புற தூய்மை
                                                                        குறித்த பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpTrainingTamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Training
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeetrainingpathtamil}}"
                                        ng-hide="Employeetrainingpathtamil == null || Employeetrainingpathtamil == '' "
                                        ng-show="Employeetrainingpathtamil != null "
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


                <div class="modal fade" id="ModalCenter1EmpTrainingHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employees Training Details
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Training
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpTrainingHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpTrainingHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpTrainingHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpTrainingHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpTrainigHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>Employees Training Details / श्रमिकों के प्रशिक्षण
                                                                का विवरण</h4>
                                                        </center>



                                                        <p>NAME OF EMPLOYEE / कामगार का नाम :
                                                            {{Title}}{{Firstname}}{{Lastname}} </p>
                                                        <p>EMPLOYEE NO / श्रम संख्या : {{Employeeid}} </p>
                                                        <p>DEPARTMENT / अनुभाग : {{EmpDepartment}} </p>
                                                        <p>DATE OF JOINING / काम पर दिन : {{Date_Of_Joing2}}</p>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>


                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>S.No / नहीं</td>

                                                                    <td>Training Details
                                                                        प्रशिक्षण का विवरण
                                                                    </td>

                                                                    <td>Training Type(Internal/ External) & Date
                                                                        प्रशिक्षण प्रकार & दिनांक
                                                                    </td>

                                                                    <td>Trainer Details
                                                                        प्रशिक्षु प्रोफ़ाइल
                                                                    </td>

                                                                    <td>Trainee Signature
                                                                        प्रशिक्षु हस्ताक्षर
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Training - for Company Policies, Working
                                                                        Hours, Terms & Conditions
                                                                        of appointment प्रशासनिक नीति, समय और
                                                                        प्लेसमेंट सिद्धांतों पर
                                                                        प्रशिक्षण</td>
                                                                    <td>
                                                                        In House Training on
                                                                        ______________
                                                                    </td>
                                                                    <td>(HR -Dept)
                                                                        ______________
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Awareness on Buyer's Code of conduct and
                                                                        Ethics. भुगतान की नीति और
                                                                        सिद्धांतों की व्याख्या करने के लिए प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="4">3

                                                                    </td>
                                                                    <td>Safety Awareness<br />
                                                                        सुरक्षा जागरूकता प्रशिक्षण
                                                                        a. First Aid Training/
                                                                        प्राथमिक चिकित्सा प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>b. Emergency Evacuation Drill / आपातकाल में
                                                                        प्रशिक्षण से बाहर निकलें
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>c. Fire Extinguisher Operation Training /
                                                                        अग्निशामकों का प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>d. Use of Emergency Contact Numbers / आपात
                                                                        स्थिति के दौरान संपर्क
                                                                        किए जाने वाले नंबर</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>PPE Usage / Awareness
                                                                        व्यक्तिगत सुरक्षात्मक उपकरणों पर प्रशिक्षण
                                                                        और जागरूकता प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Training on general Health &
                                                                        House Keeping
                                                                        सार्वजनिक स्वास्थ्य और पर्यावरण स्वच्छता पर
                                                                        प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpTrainingHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Training
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeetrainingpathhindi}}"
                                        ng-hide="Employeetrainingpathhindi == null || Employeetrainingpathhindi == '' "
                                        ng-show="Employeetrainingpathhindi != null "
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

                <div class="modal fade" id="ModalCenter1EmpServiceTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    வேலை / சிறப்பு அம்சம் குறித்த பதிவு
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Service Improvement Record
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpServiceTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpServiceTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpServiceTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpServiceTamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportEmpServiceTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>வேலை / சிறப்பு அம்சம் குறித்த பதிவு</h4>
                                                        </center>



                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <p>பெயர் : {{Title}}{{Firstname}}{{Lastname}}</p>
                                                        <p>தொழிலாளர் எண் : {{Employeeid}}</p>
                                                        <p>பணியில் சேர்ந்த நாள் : {{Date_Of_Joing2}}</p>
                                                        <p>பிரிவு : {{EmpDepartment}}</p>
                                                        <p>பதவி : {{EmpDesignation}}</p>
                                                        <p>சம்பளம் : {{Net_Salary|currency:''}}</p>




                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>SL.NO / வ.எண். </td>
                                                                    <td>DESCRIPTION / சிறப்பு அம்சம்</td>
                                                                    <td>INCREMENT / சம்பள உயர்வு</td>
                                                                    <td>DATE / நாள் </td>
                                                                    <td>AUTHORIZED BY / நிர்வாகி</td>
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p style="text-align:left;"><span
                                                                style="float:right;">Authorized Signature</span>
                                                        </p>
                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpServiceTamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Service Improvement Record
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Serviceimprovementpathrecordtamil}}"
                                        ng-hide="Serviceimprovementpathrecordtamil == null || Serviceimprovementpathrecordtamil == '' "
                                        ng-show="Serviceimprovementpathrecordtamil != null "
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

                <div class="modal fade" id="ModalCenter1EmpServiceHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Service Improvement Record / काम/विशेष सुविधा के लिए साइन
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Service Improvement Record
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpServiceHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpServiceHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpServiceHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpServiceHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportEmpServiceHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>Service Improvement Record / काम/विशेष सुविधा के लिए
                                                                साइन</h4>
                                                        </center>


                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                            width: 100%;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>


                                                        <p>NAME / नाम: {{Title}} {{Firstname}} {{Lastname}}</p>
                                                        <p>EMPLOYEE NO / श्रम संख्या: {{Employeeid}}</p>
                                                        <p>DATE OF JOINING / काम पर दिन: {{Date_Of_Joing2}} </p>
                                                        <p>DEPARTMENT / अनुभाग: {{EmpDepartment}}</p>
                                                        <p>DESIGNATION / संवर्धन: {{EmpDesignation}}</p>
                                                        <p>WAGES / वेतन: {{Net_Salary|currency:''}}</p>



                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>SL.NO <br /> नहीं.
                                                                    </td>
                                                                    <td>DESCRIPTION<br />
                                                                        विशेष सुविधा
                                                                    </td>
                                                                    <td>INCREMENT<br />
                                                                        वेतन वृद्धि
                                                                    </td>
                                                                    <td>DATE<br />
                                                                        दिन
                                                                    </td>
                                                                    <td>AUTHORIZED BY<br />
                                                                        व्यवस्थापक
                                                                    </td>
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p style="text-align:left;"><span
                                                                style="float:right;">Authorized Signature</span>
                                                        </p>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpServiceHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Service Improvement Record
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Serviceimprovementpathrecordlhindi}}"
                                        ng-hide="Serviceimprovementpathrecordlhindi == null || Serviceimprovementpathrecordlhindi == '' "
                                        ng-show="Serviceimprovementpathrecordlhindi != null "
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


                <div class="modal fade" id="ModalCenter1EmpForm2RevisedTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    படிவம்-2(திருத்தியது)
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Form-2 Revised
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpForm2RevisedTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpForm2RevisedTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpForm2RevisedTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpForm2RevisedTamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportEmpForm2RevisedTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <center>
                                                            <h2>FORM-2(REVISED)/படிவம்-2(திருத்தியது)</h2>
                                                        </center>

                                                        <p>N0MINATION AND DECLARATION FORM/நியமனம் மற்றும்
                                                            உறுதிமொழிப்படிவம்</p>
                                                        <p>FOR UNEXEMPTED/EXEMPTED ESTABLISHMENTS/( விதிவிலக்கு
                                                            பெறாத/பெற்ற நிறுவனங்களுக்கு)</p>
                                                        <p>Declaration and Nomination Form Under the Employees'
                                                            Provident Funds & Employees'
                                                            Pension Scheme/
                                                            (நியமனம் மற்றும் உறுதிமொழி)</p>
                                                        <p>(Paragraph 33 & 61(1) of the Employees' Provident Fund
                                                            Scheme , 1952 & Paragraph 18
                                                            of the Employees' Pension Scheme,1995)/(தொழிலாளர்
                                                            வருங்கால வைப்பு நிதித் திட்டம்
                                                            1952 பாரா 33 & 61 (1) ன் படியும் தொ.ஒ.திட்ட 1995 பாரா
                                                            18ன் படியும்)</p>

                                                        <table>
                                                            <tr>
                                                                <td>1. Name (in Block Letters)/ பெயர்(தனித் தனி
                                                                    எழுத்துக்களில்) </td>
                                                                <td>: {{Title}}{{Firstname}}{{Lastname}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2. Father's / Husband's Name/(தந்தை/கணவர் பெயர்)
                                                                </td>
                                                                <td>: {{FatherGuardianSpouseName}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3. Date of Birth/(பிறந்த தேதி) </td>
                                                                <td>: {{Dob2}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4. Sex/இனம் </td>
                                                                <td>: {{Gender}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5. Marital Status/(திருமணமானவரா/இல்லையா?) </td>
                                                                <td>: {{Married}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6. Account No/(கணக்கு எண்) </td>
                                                                <td>: {{Bankname}}
                                                                    <br />
                                                                    {{Accountno}}
                                                                    <br />
                                                                    {{IFSCcode}}
                                                                    <br />
                                                                    {{Branch}}
                                                                    <br />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>7. Address/ முகவரி </td>
                                                                <td>:</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Permanent/நிரந்தரம் </td>
                                                                <td>: {{PermanentAddress}}
                                                                    <br>
                                                                    {{PermanentCountry}}
                                                                    <br>
                                                                    {{PermanentState}}
                                                                    <br>
                                                                    {{PermanentCity}}
                                                                    <br>
                                                                    {{PermanentPincode}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Temporary/தற்காலிகம் </td>
                                                                <td>: {{CurrentAddress}}
                                                                    <br>
                                                                    {{CurrentCountry}}
                                                                    <br>
                                                                    {{CurrentState}}
                                                                    <br>
                                                                    {{CurrentCity}}
                                                                    <br>
                                                                    {{CurrentPincode}}
                                                                </td>
                                                            </tr>
                                                        </table>


                                                        <center>
                                                            <h4>PART-A(EPF)/பிரிவு-அ(தொ.வை.நி)</h4>
                                                        </center>


                                                        <p><b>I hereby nominate the person (s)/cancel the nomination
                                                                made by previously and
                                                                nominate the person (s) mentioned below to receive
                                                                the amount standing to my
                                                                credit in the Employees' Provident Fund, in the
                                                                event of my death</b></p>
                                                        <p>என் இறப்புக்கு பின்னால் என் கணக்கில் உள்ள வைப்பு நிதித்
                                                            தொகையைப் பெற்றிடக்
                                                            கீழ்க்காணும் நபர்களை நியமிக்கிறேன்</p>
                                                        Name & Address of the nominee/Nominee’s Nominee's
                                                        relationship with the member Date of
                                                        Birth/ Age Total amount or Share of accumulations in
                                                        Provident Fund to be Paid to each
                                                        nominee If the Nominee is a minor, name and relationship &
                                                        address of the guardian who
                                                        may receive the amount during the minority of nominee</p>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Name & Address of the nominee/Nominee’s</td>
                                                                    <td>Nominee's relationship with the member</td>
                                                                    <td>Date of Birth/ Age</td>
                                                                    <td>Total amount or Share of accumulations in
                                                                        Provident Fund to be Paid to
                                                                        each nominee</td>
                                                                    <td>If the Nominee is a minor, name and
                                                                        relationship & address of the
                                                                        guardian who may receive the amount during
                                                                        the minority of nominee</td>
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <p>1.* Certified that I have no family as defined para 2 (g)
                                                            of the Employees' Provident
                                                            Fund Scheme 1956 and should I acquire a family hereafter
                                                            the above nomination should
                                                            be deemed as cancelled</p>
                                                        <p>2.*Certified that my father /mother is /are dependent
                                                            upon me. /என்னுடைய தந்தை / தாய்
                                                            என்னைச் சார்ந்தே இருக்கிறார்கள் என்றும் சான்று
                                                            அளிக்கிறேன்.</p>

                                                        <br /><br /><br />
                                                        <p>Signature or thumb impression of the subscriber
                                                            /<br />உறுப்பினரின்கையொப்பம்(அ) இடது
                                                            கை பெருவிரல் ரேகை</p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpForm2RevisedTamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM -2 REVISED
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Form2revisedpathtamil}}"
                                        ng-hide="Form2revisedpathtamil == null || Form2revisedpathtamil == '' "
                                        ng-show="Form2revisedpathtamil != null "
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



                <div class="modal fade" id="ModalCenter1EmpForm2RevisedHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM-2(REVISED)/ फॉर्म-2 (संशोधित)
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Form-2 Revised
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpForm2RevisedHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpForm2RevisedHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpForm2RevisedHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpForm2RevisedHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportEmpForm2RevisedHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>FORM-2(REVISED)/ फॉर्म-2 (संशोधित)</h4>
                                                        </center>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <p>N0MINATION AND DECLARATION FORM/ नामांकन और घोषणा प्रपत्र
                                                        </p>
                                                        <p>FOR UNEXEMPTED/EXEMPTED ESTABLISHMENTS/( बिना छूट/छूट
                                                            वाले प्रतिष्ठानों के लिए)
                                                        </p>
                                                        <p>Declaration and Nomination Form Under the Employees'
                                                            Provident Funds & Employees'
                                                            Pension Scheme/(नियुक्ति और शपथ)</p>
                                                        <p>(Paragraph 33 & 61(1) of the Employees' Provident Fund
                                                            Scheme , 1952 & Paragraph
                                                            18 of the Employees' Pension Scheme,1995)/( श्रम भविष्य
                                                            निधि योजना 1952 पैरा 33
                                                            और 61 (1) और टीओ </p>


                                                        और टीओ योजना 1995पैरा 18 . के अनुसार)
                                                        <table class="doc-table">
                                                            <tr>
                                                                <td>Name (in Block Letters)/ नाम (बड़े अक्षरों में)
                                                                </td>
                                                                <td>: {{Title}}{{Firstname}}{{Lastname}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Father's / Husband's Name / पिता/पति का नाम</td>
                                                                <td>: {{FatherGuardianSpouseName}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Date of Birth/( जन्म तिथि)</td>
                                                                <td>: {{Dob2}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sex/ लिंग</td>
                                                                <td>: {{Gender}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Marital Status/( वैवाहिक स्थिति)</td>
                                                                <td>: {{Married}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Account No/( खाता संख्या)</td>
                                                                <td>: {{Bankname}}
                                                                    <br />
                                                                    {{Accountno}}
                                                                    <br />
                                                                    {{IFSCcode}}
                                                                    <br />
                                                                    {{Branch}}
                                                                    <br />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address/ पता</td>
                                                                <td>:</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Permanent/ स्थायी</td>
                                                                <td>: {{PermanentAddress}}
                                                                    <br>
                                                                    {{PermanentCountry}}
                                                                    <br>
                                                                    {{PermanentState}}
                                                                    <br>
                                                                    {{PermanentCity}}
                                                                    <br>
                                                                    {{PermanentPincode}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Temporary/ अस्थायी</td>
                                                                <td>: {{CurrentAddress}}
                                                                    <br>
                                                                    {{CurrentCountry}}
                                                                    <br>
                                                                    {{CurrentState}}
                                                                    <br>
                                                                    {{CurrentCity}}
                                                                    <br>
                                                                    {{CurrentPincode}}
                                                                </td>
                                                            </tr>
                                                        </table>


                                                        <center>
                                                            <h4>PART-A(EPF)/ भाग-ए (ईपीएफ)</h4>
                                                        </center>



                                                        <p><b>I hereby nominate the person (s)/cancel the nomination
                                                                made by previously and
                                                                nominate the person (s) mentioned below to receive
                                                                the amount standing to my
                                                                credit in the Employees' Provident Fund, in the
                                                                event of my death</b></p>
                                                        <p>मैं एतद्द्वारा पूर्व में किए गए व्यक्ति
                                                            (व्यक्तियों)/नामांकन को रद्द करता/करती
                                                            हूं और मेरी मृत्यु की स्थिति में कर्मचारी भविष्य निधि
                                                            में मेरे खाते में जमा राशि
                                                            प्राप्त करने के लिए नीचे उल्लिखित व्यक्ति (व्यक्तियों)
                                                            को नामित करता हूं।.
                                                        </p>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Name & Address of the nominee/Nominee’s
                                                                        नामिती/नामितियों का नाम और
                                                                        पता</td>
                                                                    <td>Nominee's relationship with the member
                                                                        नॉमिनी का सदस्य के साथ संबंध
                                                                    </td>
                                                                    <td>Date of Birth/ Age
                                                                        जन्म तिथि / आयु
                                                                    </td>
                                                                    <td>Total amount or Share of accumulations in
                                                                        Provident Fund to be Paid
                                                                        to each nominee
                                                                        प्रत्येक नामांकित व्यक्ति को भुगतान की जाने
                                                                        वाली भविष्य निधि में कुल
                                                                        राशि या संचय का हिस्सा
                                                                    </td>
                                                                    <td>If the Nominee is a minor, name and
                                                                        relationship & address of the
                                                                        guardian who may receive the amount during
                                                                        the minority of naminee
                                                                        यदि नामिती अवयस्क है, तो उस अभिभावक का नाम
                                                                        और संबंध और पता, जिसे
                                                                        नामिनी की अवयस्कता के दौरान राशि प्राप्त हो
                                                                        सकती है
                                                                    </td>
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <p>1.* Certified that I have no family as defined para 2 (g)
                                                            of the Employees'
                                                            Provident Fund Scheme 1956 and should I acquire a family
                                                            hereafter the above
                                                            nomination should be deemed as cancelled प्रमाणित किया
                                                            जाता है कि कर्मचारी
                                                            भविष्य निधि योजना 1956 के परिभाषित पैरा 2 (जी) के अनुसार
                                                            मेरा कोई परिवार नहीं है
                                                            और क्या मुझे इसके बाद एक परिवार का अधिग्रहण करना चाहिए,
                                                            उपरोक्त नामांकन को रद्द
                                                            माना जाना चाहिए।</p>
                                                        <p>2.*Certified that my father /mother is /are dependent
                                                            upon me. / प्रमाणित किया
                                                            जाता है कि मेरे पिता/माता मुझ पर आश्रित हैं/हैं</p>
                                                        <p>Strike out whichever is not applicable. जो लागू न हो उसे
                                                            काट दें।.</p>
                                                        <br /><br /><br />
                                                        <p>Signature or thumb impression of the subscriber /बाएं
                                                            अंगूठे के सदस्य (क) अंगूठे
                                                            का निशान के हस्ताक्षर। </p>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpForm2RevisedHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM -2 REVISED
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Form2revisedpathhindi}}"
                                        ng-hide="Form2revisedpathhindi == null || Form2revisedpathhindi == '' "
                                        ng-show="Form2revisedpathhindi != null "
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
    <title>Appraisal Peniding Details</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM10Controller">
            <div class="container-fluid">


                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <div class="container-fluid dashboard-content">
                                <div class="row">
                                    <div class="col-xl-12">

                                        <div class="card">
                                            <h5 class="card-header text-green">Employee Details</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered  table-sm table-striped">
                                                                <thead>
                                                                    <tr class="text-green">

                                                                        <th>No</th>
                                                                        <th scope="col" style="width: 100px;">
                                                                            Employee ID</th>
                                                                        <th scope="col" style="width: 200px;">Name</th>
                                                                        <th scope="col" style="width: 90px;">Gender</th>
                                                                        <th scope="col">Department</th>
                                                                        <th scope="col">Designation</th>

                                                                        <th scope="col">Contact</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="searchEmployee.Employeeid">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-search"></i></span>
                                                                                </div>
                                                                            </div>

                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="searchEmployee.Fullname">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-search"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="searchEmployee.Gender">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-search"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="searchEmployee.Department">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-search"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="searchEmployee.Designation">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-search"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </td>

                                                                        <td colspan="2">
                                                                            <div class="input-group ">
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="searchEmployee.Contactno">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-search"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </td>


                                                                        </td>


                                                                    </tr>
                                                                    <tr dir-paginate="e in GetAPPEmployeeList |filter:searchEmployee|itemsPerPage:10 "
                                                                        pagination-id="Employeegrid"
                                                                        current-page="currentPageEmp">




                                                                        <td style="width: 50px;">
                                                                            {{$index+1 + (currentPageEmp - 1) * pageSizeEmp}}
                                                                        </td>
                                                                        <td>{{e.Employeeid}}</td>
                                                                        <td>{{e.Title}} {{e.Fullname}}</td>
                                                                        <td>{{e.Gender}}</td>
                                                                        <td>{{e.Department}}</td>
                                                                        <td>{{e.Designation}}</td>

                                                                        <td>{{e.Contactno}}</td>


                                                                        <td>
                                                                            <div class="action-btn">
                                                                                <img height="15"
                                                                                    ng-click="SendEdit(e.Employeeid);"
                                                                                    src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="float-right mt-2">
                                                    <div class="pagination ">
                                                        <dir-pagination-controls pagination-id="Employeegrid"
                                                            max-size="3" direction-links="true" boundary-links="true"
                                                            class="pagination">
                                                        </dir-pagination-controls>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="carousel-item">
                            <div class="container-fluid dashboard-content">
                                <div class="row">
                                    <div class="col-md-12">




                                        <div class="card">
                                            <h5 class="card-header text-green">Employee Details - {{LastAppresialDate2}}</h5>
                                            <div class="card-body">


                                                <div class="row">


                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Employee ID</label>
                                                        <input class="form-control" ng-model="Employeeid" readonly />

                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">First Name</label>
                                                        <div class="input-group "><span class="input-group-prepend">
                                                                <input class="form-control" ng-model="Title" readonly />
                                                                <input class="form-control" ng-model="Firstname"
                                                                    readonly />


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
                                                        <label class="col-form-label">Married</label>
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
                                                        <input class="form-control" ng-model="EmpDesignation"
                                                            readonly />


                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Qualification</label>
                                                        <input class="form-control" ng-model="Highestqualification"
                                                            readonly />


                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Father/ Spouse Name</label>
                                                        <input class="form-control" ng-model="FatherGuardianSpouseName"
                                                            readonly />

                                                    </div>


                                                    <div class="text-right mt-25">

                                                        <button class="btn btn-sm btn-warning" data-target="#myCarousel"
                                                            data-slide-to="0" ng-click="Getallvalues()"><i
                                                                class="fa fa-arrow-left"></i> Back</button>
                                                    </div>


                                                </div>

                                                <div class="alert alert-success" role="alert" ng-show="Message"
                                                    id='msg1'>
                                                    {{Message}}
                                                </div>
                                                <div class="tab-list" style="overflow-x: hidden; padding-right: 0px;">
                                                    <ul class="nav nav-pills nav-fill">
                                                        <li class="nav-item" ng-click="fnotherinfo();"><a>Personal</a>
                                                        </li>
                                                        <li class="nav-item" ng-click="fneducationinfo();">
                                                            <a>Eduction</a>
                                                        </li>
                                                        <li class="nav-item" ng-click="fnaddressinfo();">
                                                            <a>Address</a>
                                                        </li>
                                                        <li class="nav-item" ng-click="fnbankinfo();"><a>Bank
                                                                Account</a></li>
                                                        <li class="nav-item" ng-click="fnfamilyinfo();"><a>Family Info
                                                            </a></li>
                                                        <li class="nav-item" ng-click="fnrefinfo();"><a>Reference</a>
                                                        </li>
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
                                                            <input class="form-control" ng-model="Languagestest"
                                                                readonly />

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Age</label>
                                                            <input class="form-control" ng-model="Age" readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Blood Group</label>
                                                            <input class="form-control" ng-model="Bloodgroup"
                                                                readonly />


                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Expereience</label>
                                                            <input class="form-control" ng-model="Expereience"
                                                                readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Fresher</label>
                                                            <input class="form-control" ng-model="Fresher" readonly />


                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Date Of Joing</label>
                                                            <input class="form-control" ng-model="Date_Of_Joing2"
                                                                readonly />

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Shift</label>
                                                            <input class="form-control" ng-model="Shift" readonly />

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Allow_OT</label>
                                                            <input class="form-control" ng-model="AllowOT" readonly />

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Allow_LOP</label>
                                                            <input class="form-control" ng-model="AllowLOP" readonly />


                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Salary_Mode</label>
                                                            <input class="form-control" ng-model="Salary_Mode"
                                                                readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Week_Off</label>
                                                            <input class="form-control" ng-model="Weekoff" readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Employee_CL</label>
                                                            <input class="form-control" ng-model="Employee_CL"
                                                                readonly />


                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">UAN No</label>
                                                            <input class="form-control" ng-model="UANno" readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">ESI No </label>
                                                            <input class="form-control" ng-model="ESIno" readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">Aadhar No</label>
                                                            <input class="form-control" ng-model="Aadharno" readonly />


                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">PAN No</label>
                                                            <input class="form-control" ng-model="Panno" readonly />


                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">PF Joining Date</label>
                                                            <input class="form-control" ng-model="PFJoiningdate"
                                                                readonly />

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="col-form-label">ESI Joining Date </label>
                                                            <input class="form-control" ng-model="ESIJoiningdate"
                                                                readonly />


                                                        </div>




                                                    </div>

                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="card" ng-show="btnaddress">
                                        <h5 class="card-header">Permanent and Temporary Address Detail</h5>
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                        <h3>Temporary Address Detail</h3>
                                                        <table class="table table-bordered table-sm">
                                                            <tr>
                                                                <td> <label class="col-form-label">Address</label>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control"
                                                                        ng-model="CurrentAddress" readonly />


                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Country</label>
                                                                </td>
                                                                <td><input class="form-control"
                                                                        ng-model="CurrentCountry" readonly />

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
                                                                <td> <input class="form-control"
                                                                        ng-model="CurrentPincode" readonly />

                                                                </td>
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
                                                                <td><input class="form-control"
                                                                        ng-model="PermanentAddress" readonly />


                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Country</label>
                                                                </td>
                                                                <td><input class="form-control"
                                                                        ng-model="PermanentCountry" readonly />

                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">State</label>
                                                                </td>
                                                                <td><input class="form-control"
                                                                        ng-model="PermanentState" readonly />

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
                                                                    <input class="form-control"
                                                                        ng-model="PermanentPincode" readonly />

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
                                                <div class="row">

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
                                                            <dir-pagination-controls pagination-id="Educationgrid"
                                                                max-size="3" direction-links="true"
                                                                boundary-links="true" class="pagination">
                                                            </dir-pagination-controls>


                                                        </div>

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
                                                            <dir-pagination-controls pagination-id="Familygrid"
                                                                max-size="3" direction-links="true"
                                                                boundary-links="true" class="pagination">
                                                            </dir-pagination-controls>


                                                        </div>
                                                    </div>
                                                </div>

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
                                                            <input class="form-control" ng-model="Reference1name"
                                                                readonly />


                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Contactno</label>
                                                            <input class="form-control" ng-model="Reference1contactno"
                                                                readonly />


                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Address</label>
                                                            <input class="form-control" ng-model="Reference1address"
                                                                readonly />


                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <h3 class="text-green" style="margin-left: 15px;">Reference 2
                                                            Detail</h3>
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Reference_Name</label>
                                                            <input class="form-control" ng-model="Reference2name"
                                                                readonly />


                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Contactno</label>
                                                            <input class="form-control" ng-model="Reference2contactno"
                                                                readonly />


                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Address</label>
                                                            <input class="form-control" ng-model="Reference2address"
                                                                readonly />


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
                                        <h5 class="card-header text-green">Salary Information</h5>
                                        <div class="card-body">


                                            <div class="row">

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Basic+Da</label>
                                                    <span class="form-control" ng-bind="Basic"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">HR_Allowance</label>
                                                    <span class="form-control" ng-bind="HR_Allowance"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label"> Travel Allowance </label>
                                                    <span class="form-control" ng-bind="TA"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label"> Performance_allowance </label>
                                                    <span class="form-control" ng-bind="Performance_allowance"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Day_allowance</label>
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
                                                    <label class="col-form-label">Professional_tax</label>
                                                    <span class="form-control" ng-bind="Professional_tax"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Net_Salary</label>
                                                    <span class="form-control" ng-bind="Net_Salary"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Gross_Salary</label>
                                                    <span class="form-control" ng-bind="Gross_Salary"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Other_Allowance</label>
                                                    <span class="form-control" ng-bind="Other_Allowance"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">PF_Yesandno</label>
                                                    <span class="form-control" ng-bind="PF_Yesandno"></span>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">ESI_Yesandno</label>
                                                    <span class="form-control" ng-bind="ESI_Yesandno"></span>

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
                                                                    pagination-id="Docgrid"
                                                                    current-page="currentPageDoc">




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
                                                            direction-links="true" boundary-links="true"
                                                            class="pagination">
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
                                                ng-show="Imagepath != null " class="img-thumbnail mr-3"
                                                alt="Employee_image" style="width:150px;height:150px;">
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
                                                                    pagination-id="Deptgrid"
                                                                    current-page="currentPageDept">




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
                                                            direction-links="true" boundary-links="true"
                                                            class="pagination">
                                                        </dir-pagination-controls>


                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                    </div>
                                    <div class="card" ng-show="btnbank">
                                        <h5 class="card-header text-green">Bank Account Details</h5>
                                        <div class="card-body">
                                            <div class="col-lg-12">

                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="col-form-label">Bankname</label>
                                                        <input class="form-control" ng-model="Bankname" readonly />


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




                                                    <div class="col-md-12 mt-2">

                                                        <iframe ng-src="{{Emppassbook}}"
                                                            ng-hide="Emppassbook == null || Emppassbook == '' "
                                                            ng-show="Emppassbook != null "
                                                            style="height:350px;width:100%"></iframe>
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
                                                        <dir-pagination-controls pagination-id="Vaccinationgrid"
                                                            max-size="3" direction-links="true" boundary-links="true"
                                                            class="pagination">
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmployeeDetailDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterForm34TamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEMPAttentionTamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmpDeclarationtamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmpStatingTamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmpAgreementTamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmpTrainingTamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal" data-target="#ModalCenterEmpTrainingHindiDocumentView
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmpServiceTamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
                                                                data-target="#ModalCenterEmpForm2RevisedTamilDocumentView">
                                                                Tamil</button>
                                                            <button class="btn  btn-warning"
                                                                ng-click="FetchSIPLDocument(Employeeid);"
                                                                data-toggle="modal"
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

                        </div>

                    </div>
                </div>

                <div class="modal fade" id="ModalCenter1Education" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{EduNextno}}
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
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{FamilyNextno}}
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
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{DocNextno}}
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
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee- Document
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{DocumentView}}"
                                        ng-hide="DocumentView == null || DocumentView == '' "
                                        ng-show="DocumentView != null " style="height:400px;width:100%"></iframe>
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
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee- Document
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{EmpDocumentView}}"
                                        ng-hide="EmpDocumentView == null || EmpDocumentView == '' "
                                        ng-show="EmpDocumentView != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCenter1Vaccination" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{Vaccinatedsno}}
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
                                <button class="btn btn-rounded btn-danger" ng-click="DeleteVaccination();"
                                    data-dismiss="modal">Delete</button>
                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCenter1Certificate" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Vaccination-Details
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{VaccinationView}}"
                                        ng-hide="VaccinationView == null || VaccinationView == '' "
                                        ng-show="VaccinationView != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade" id="ModalCenter1EmployeeDetailTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    தொழிலாளர் பற்றிய விபரம்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label">Employee
                                                    Details </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpDetailtamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpDetailtamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmployeeDetailDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnempdetailtamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportempdetailtamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <center>
                                                            <h4>தொழிலாளர் பற்றிய
                                                                விபரம்</h4>
                                                        </center>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }

                                                        .candidate-photo {
                                                            display: inline-block;
                                                            height: 140px;
                                                            width: 140px;
                                                            padding: 40px;
                                                            text-align: center;
                                                            position: absolute;
                                                            right: 4.8%;

                                                            border: 1px solid #888888;
                                                        }
                                                        </style>


                                                        <img ng-src="{{Imagepath}}"
                                                            ng-hide="Imagepath == null || Imagepath == '' "
                                                            ng-show="Imagepath != null " alt="Employee_image"
                                                            class="candidate-photo">

                                                        <table cellpadding="5">
                                                            <tr>
                                                                <td>பெயர்</td>
                                                                <td>:
                                                                    {{Title}}{{Firstname}}{{Lastname}}
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>தொழிலாளர் எண்
                                                                </td>
                                                                <td>: {{Employeeid}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>பதவி</td>
                                                                <td>:
                                                                    {{EmpDesignation}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>பிரிவு / துறை
                                                                </td>
                                                                <td>:
                                                                    {{EmpDepartment}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>கல்வி தகுதி</td>
                                                                <td>:
                                                                    {{Highestqualification}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>பிறந்த தேதி /
                                                                    வயது</td>
                                                                <td>:
                                                                    {{Dob2}}/{{Age}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>திருமண நிலை</td>
                                                                <td>: {{Married}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>பாலினம்</td>
                                                                <td>: {{Gender}}
                                                                </td>
                                                            </tr>
                                                        </table>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        தற்போதைய
                                                                        முகவரி<br />
                                                                    </td>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        நிரந்தர
                                                                        முகவரி<br />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{CurrentAddress}}
                                                                        <br>
                                                                        {{CurrentCountry}}
                                                                        <br>
                                                                        {{CurrentState}}
                                                                        <br>
                                                                        {{CurrentCity}}
                                                                        <br>
                                                                        {{CurrentPincode}}
                                                                    </td>
                                                                    <td>{{PermanentAddress}}
                                                                        <br>
                                                                        {{PermanentCountry}}
                                                                        <br>
                                                                        {{PermanentState}}
                                                                        <br>
                                                                        {{PermanentCity}}
                                                                        <br>
                                                                        {{PermanentPincode}}
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p>அவசரகால தொடர்புக்கு
                                                            (குடும்ப உறுப்பினர்கள்)
                                                        </p>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:250px; text-align: center;">
                                                                        பெயர்<br />
                                                                    </td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        தொலைபேசி
                                                                        எண்<br />
                                                                    </td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        உறவுமுறை<br />
                                                                    </td>
                                                                </tr>

                                                                <tr dir-paginate="e in GetFamilyList |filter:searchFamily|itemsPerPage:10 "
                                                                    pagination-id="Familygrid"
                                                                    current-page="currentPageFamily">




                                                                    <td>{{e.Name}}
                                                                    </td>
                                                                    <td>{{e.Relationship}}
                                                                    </td>

                                                                    <td>{{e.Contactno}}
                                                                    </td>





                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:250px; text-align: center;">
                                                                        நியமனதாரர்
                                                                        பெயர்<br /><br />
                                                                    </td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        <br /><br />
                                                                    </td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        உறவுமுறை<br /><br />
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>



                                                        <p>சமூக நன்மைகள்/NA</p>
                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        ESI<br /><br />0.75%
                                                                    </td>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        PF<br /><br />12%
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:766.4px;">
                                                                        சம்பளம்: RS.
                                                                        {{Net_Salary|currency:''}}
                                                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                        நாள் / மாதம்
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p style="text-align:left;">
                                                            தொழிலாளர் கையொப்பம்<span style="float:right;">நிர்வாகி
                                                                கையொப்பம்</span></p>
                                                        <p>நாள் :</p>



                                                    </div>


                                                </div>










                                            </div>
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
                <div class="modal fade" id="ModalCenterEmployeeDetailDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee-Detail-View
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{EmployeeDetailpathtamil}}"
                                        ng-hide="EmployeeDetailpathtamil == null || EmployeeDetailpathtamil == '' "
                                        ng-show="EmployeeDetailpathtamil != null "
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



                <div class="modal fade" id="ModalCenter1EmployeeDetailHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    <h4>Employee Details / कर्मचारी का विवरण
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label">Employee
                                                    Details </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpDetailhindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpDetailhindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmployeeDetailHindiDocumnetView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnempdetailHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportempdetailhindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <center>
                                                            <h4>
                                                                <h4>Employee Details / कर्मचारी का विवरण</h4>
                                                        </center>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }

                                                        .candidate-photo {
                                                            display: inline-block;
                                                            height: 140px;
                                                            width: 140px;
                                                            padding: 40px;
                                                            text-align: center;
                                                            position: absolute;
                                                            right: 4.8%;

                                                            border: 1px solid #888888;
                                                        }
                                                        </style>


                                                        <img ng-src="{{Imagepath}}"
                                                            ng-hide="Imagepath == null || Imagepath == '' "
                                                            ng-show="Imagepath != null " alt="Employee_image"
                                                            class="candidate-photo">


                                                        <table cellpadding="3">
                                                            <tr>
                                                                <td>NAME / नाम</td>
                                                                <td>: {{Title}}{{Firstname}}{{Lastname}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>EMPLOYEE NO / कर्मचारी संख्या</td>
                                                                <td>: {{Employeeid}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>DESIGNATION / पदनाम</td>
                                                                <td>: {{EmpDesignation}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>DEPARTMENT / विभाग</td>
                                                                <td>: {{EmpDepartment}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>EDUCATIONAL QUALIFICATION / शैक्षिक योग्यता
                                                                </td>
                                                                <td>: {{Highestqualification}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>DATE OF BIRTH / AGE / की तारीख</td>
                                                                <td>: {{Dob2}}/{{Age}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>MARITAL STATUS / वैवाहिक स्थिति </td>
                                                                <td>: {{Married}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>GENDER / लिंग
                                                                </td>
                                                                <td>: {{Gender}}</td>
                                                            </tr>
                                                        </table>



                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        PRESENT ADDRESS/वर्तमान पता<br />
                                                                    </td>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        PERMANENT ADDRESS / स्थाई पता<br />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{CurrentAddress}}
                                                                        <br>
                                                                        {{CurrentCountry}}
                                                                        <br>
                                                                        {{CurrentState}}
                                                                        <br>
                                                                        {{CurrentCity}}
                                                                        <br>
                                                                        {{CurrentPincode}}
                                                                    </td>
                                                                    <td>{{PermanentAddress}}
                                                                        <br>
                                                                        {{PermanentCountry}}
                                                                        <br>
                                                                        {{PermanentState}}
                                                                        <br>
                                                                        {{PermanentCity}}
                                                                        <br>
                                                                        {{PermanentPincode}}
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p>INCASE OF EMERGENCY CONTACT / आपातकालीन संपर्क की वृद्धि
                                                        </p>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:250px; text-align: center;">
                                                                        NAME/ नाम<br /><br /><br /><br /></td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        TELEPHONE NO / टेलीफ़ोन
                                                                        नंबर<br /><br /><br /><br /></td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        RELATIONSHIP/संबंध<br /><br /><br /><br />
                                                                    </td>
                                                                </tr>

                                                                <tr dir-paginate="e in GetFamilyList |filter:searchFamily|itemsPerPage:10 "
                                                                    pagination-id="Familygrid"
                                                                    current-page="currentPageFamily">




                                                                    <td>{{e.Name}}
                                                                    </td>
                                                                    <td>{{e.Relationship}}
                                                                    </td>

                                                                    <td>{{e.Contactno}}
                                                                    </td>





                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <table style="margin-left:-5px">
                                                            <tr>
                                                                <td style="width:260px; text-align: center;">NOMINEE
                                                                    NAME/नामांकित व्यक्ति का नाम<br /><br /></td>
                                                                <td style="width:250px; text-align: center;">
                                                                    <br /><br />
                                                                </td>
                                                                <td style="width:250px; text-align: center;">
                                                                    RELATIONSHIP / संबंध<br /><br /></td>
                                                            </tr>
                                                        </table>



                                                        <p>SOCIAL BENEFITS / सामाजिक लाभ</p>
                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        ESI<br /><br />0.75%</td>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        PF<br /><br />12%</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:766.4px;">WAGES / वेतन: RS.
                                                                        {{Net_Salary|currency:''}}&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PER
                                                                        MONTH / प्रति महीने</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p style="text-align:left;">EMPLOYEE SIGNATURE / कर्मचारी
                                                            हस्ताक्षर<span style="float:right;">AUTHORISED SIGNATURE
                                                                / अधिकृत हस्ताक्षर </span></p>
                                                        <br />
                                                        <p>DATE / दिनांक :</p>











                                                    </div>


                                                </div>










                                            </div>
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
                <div class="modal fade" id="ModalCenterEmployeeDetailHindiDocumnetView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee-Detail-View
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{EmployeeDetailpathhindi}}"
                                        ng-hide="EmployeeDetailpathhindi == null || EmployeeDetailpathhindi == '' "
                                        ng-show="EmployeeDetailpathhindi != null "
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



                <div class="modal fade" id="ModalCenter1FORM34Tamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM NO.34 - Nomination
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> FORM-34
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputform34tamil" name=files[] accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonform34tamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterForm34TamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnform34tamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporform34ltamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <center>
                                                            <h3>FORM NO.34 - Nomination<br />(விதி 93 C இன் கீழ்
                                                                பரிந்துரைக்கப்பட்டது)</h3>
                                                        </center>

                                                        <p>எனது இறப்பிற்கு பின்னால் கம்பெனியில் இருந்து எனக்கு சேர
                                                            வேண்டிய சம்பளம் மற்றும் இதர படிகள் அனைத்தும்
                                                            __________________________ எனது
                                                            ______________________________ அவர்களுக்கு வழங்குமாறு
                                                            கேட்டுக்கொள்கிறேன். மேலும் தற்போது அவர்கள் கீழ்க்கண்ட
                                                            விலாசத்தில் வசித்து வருகிறார்கள்.</p>

                                                        <p>முகவரி</p>
                                                        <br /><br /><br /><br />






                                                        <p>நன்றி</p>

                                                        <br /><br />
                                                        <p>தங்கள் உண்மையுள்ள</p>

                                                        <br /><br />
                                                        <p>தொழிலாளர் கையொப்பம்</p>

                                                        <p>சாட்சி</p>
                                                        <br /><br />
                                                        <p>1</p>
                                                        <br /><br />
                                                        <p>2</p>



                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterForm34TamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM-34
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Form34pathtamil}}"
                                        ng-hide="Form34pathtamil == null || Form34pathtamil == '' "
                                        ng-show="Form34pathtamil != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenter1FORM34Hindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM NO.34 - Nomination
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> FORM-34
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputform34hindi" name=files[] accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonform34hindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterForm34HindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnform34hindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporform34hindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <center>
                                                            <h4>FORM NO.34 - Nomination<br />(नियम 93 सी . के तहत
                                                                निर्धारित)</h4>
                                                        </center>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>


                                                        <p>I hereby declare that in the event of my death before
                                                            resuming work, the dues of my salary and other
                                                            settlement from the company may please be paid to
                                                            _________________ who is my ________________ and
                                                            residing at the below address.</p>


                                                        <p>मैं अनुरोध करता हूं कि मेरी मृत्यु के बाद कंपनी की ओर से
                                                            मुझे देय सभी वेतन और अन्य कदमों का ____________भुगतान
                                                            मेरे _______________________ को करें। और वर्तमान में वे
                                                            निम्न पते पर निवास कर रहे हैं।.</p>

                                                        <p>Address / पता </p>
                                                        <br /><br /><br /><br />







                                                        <p>நன்றி</p>

                                                        <br /><br />
                                                        <p>தங்கள் உண்மையுள்ள</p>

                                                        <br /><br />
                                                        <p>தொழிலாளர் கையொப்பம்</p>

                                                        <p>சாட்சி</p>
                                                        <br /><br />
                                                        <p>1</p>
                                                        <br /><br />
                                                        <p>2</p>



                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterForm34HindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM-34
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Form34pathtamilhindi}}"
                                        ng-hide="Form34pathtamilhindi == null || Form34pathtamilhindi == '' "
                                        ng-show="Form34pathtamilhindi != null "
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



                <div class="modal fade" id="ModalCenter1EMPAttentionTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    பணியாளர்களின் கவனத்திற்கு
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Attention
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpAttentiontamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpAttentiontamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEMPAttentionTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpAttentiontamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpAttentiontamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>பணியாளர்களின் கவனத்திற்கு</h4>
                                                        </center>


                                                        <p>என்னுடைய வேலைத்திறனை நிர்வாகஸ்தர்கள் ஒப்புக் கொண்டால்
                                                            மட்டுமே நிரந்தரமாக்க வேண்டியதில்லை எனவும் உறுதி
                                                            கூறுகின்றேன் (சட்டப்படி நிரந்தரமாக்கக்கூடிய கால
                                                            அளவிற்குள்)</p>

                                                        <p>தாங்கள் எனக்கு அளிக்கப்பட்ட வேலைக்கு நிர்வாகத்தின்
                                                            முழுதிருப்திக்கேற்ப பணிபுரிவேன் என உறுதி கூறுகிறேன்.</p>

                                                        <p>மேலே நிர்வாகத்தால் கூறப்பட்ட அனைத்து விதிமுறைகளுக்கும்
                                                            கட்டுப்பட்டு நடப்பேன் என உறுதி கூறுகிறேன்.</p>

                                                        <p>என்னால் நிர்வாகத்திற்கு கொடுக்கப்பட்ட விபரங்கள் யாவும்
                                                            உண்மையென கூறுகிறேன்.</p>

                                                        <p>நிர்வாகத்தின் விதிகளுக்கும், சட்டதிட்டங்களுக்கும்
                                                            கட்டுப்பட்டு நடப்பேன் என உறுதி கூறுகிறேன்.</p>

                                                        <p>நிர்வாகத்திற்கு கேடு விளைவிக்கும் பொருட்டு எவ்வித செயலும்
                                                            செய்யமாட்டேன் என உறுதி அளிக்கிறேன்.</p>

                                                        <p>நான் நிர்வாகத்தின் எந்தவிதமான வற்புறுத்தலுக்கோ,
                                                            அச்சறுத்தலுக்கோ, அபராதத்திற்கோ கட்டாயத்திற்கோ
                                                            உட்படுத்தப்படாமல் எனது விருப்பத்தில் வேலை செய்ய
                                                            ஒப்புக்கொள்கிறேன்.</p>

                                                        <p>மேலே கூறிய விவரங்கள் அனைத்தும் இருவராலும் மணப்பூர்வமாக
                                                            ஒப்புக்கொள்ளப்பட்டவை.</p>





                                                        <p style="text-align:left;">
                                                            தொழிலாளர்
                                                            <span style="float:right;">பணியாளர்</span>
                                                        </p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEMPAttentionTamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Attention
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Attentionoftheemployeepathtamil}}"
                                        ng-hide="Attentionoftheemployeepathtamil == null || Attentionoftheemployeepathtamil == '' "
                                        ng-show="Attentionoftheemployeepathtamil != null "
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



                <div class="modal fade" id="ModalCenter1EMPAttentionHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Attention of the employee
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Attention
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpAttentionhindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpAttentionhindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEMPAttentionHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpAttentionhindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpAttentionhindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>Attention of the employee/ कर्मचारी के ध्यान के लिए
                                                            </h4>
                                                        </center>


                                                        <p>मैं यह भी पुष्टि करता हूं कि मेरा रोजगार तब तक स्थायी
                                                            नहीं होगा जब तक कि प्रबंधन सहमत न हो (समय की अवधि के
                                                            भीतर जिसे कानून द्वारा स्थायी बनाया जा सकता है) ।.</p>

                                                        <p>मैं वचन देता हूँ कि मुझे जो कार्य सौंपा गया है, उसे मैं
                                                            प्रबंधन की पूर्ण संतुष्टि के अनुरूप करूँगा।.</p>

                                                        <p>मैं उपरोक्त प्रबंधन द्वारा उल्लिखित सभी नियमों का पालन
                                                            करने का वादा करता हूं।.</p>

                                                        <p>मैं घोषणा करता हूं कि मेरे द्वारा प्रबंधन को दिए गए सभी
                                                            विवरण सत्य हैं।.</p>

                                                        <p>मैं प्रशासन के नियमों और विनियमों का पालन करने का वादा
                                                            करता हूं।.</p>

                                                        <p>मैं वादा करता हूं कि मैं प्रशासन को नुकसान पहुंचाने के
                                                            लिए कुछ नहीं करूंगा।.</p>

                                                        <p>मैं प्रबंधन द्वारा किसी भी दबाव, धमकी, दंड या जबरदस्ती के
                                                            बिना अपनी मर्जी से काम करने के लिए सहमत हूं।.</p>

                                                        <p>उपरोक्त सभी विवरण दोनों के बीच वैवाहिक रूप से सहमत हैं।.
                                                        </p>







                                                        <p style="text-align:left;">
                                                            प्रशासक
                                                            <span style="float:right;">कर्मचारी</span>
                                                        </p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEMPAttentionHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Attention
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Attentionoftheemployeepathhindi}}"
                                        ng-hide="Attentionoftheemployeepathhindi == null || Attentionoftheemployeepathhindi == '' "
                                        ng-show="Attentionoftheemployeepathhindi != null "
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


                <div class="modal fade" id="ModalCenter1EmpDeclarationTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    தொழிலாளர் சுய அறிவிப்பு படிவம்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Declaration
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpDeclarationtamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpDeclarationtamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpDeclarationtamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpDeclarationTamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpDeclarationtamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>EMPLOYEE DECLARATION FORM<br />தொழிலாளர் சுய
                                                                அறிவிப்பு படிவம்</h4>
                                                        </center>


                                                        <p>SIPL will provide the food, stay and transport facilities
                                                            for employees in nominal charge.<br />SIPL
                                                            தொழிலாளர்களுக்கு குறைந்த விலையில் உணவு , தங்கும் இடம்
                                                            மற்றும் போக்குவரத்து வசதிகளை அளிக்கிறது</p>


                                                        <p>Please find the monthly charges for your reference and if
                                                            interested select the requirement.<br />கீழே
                                                            குறிப்பிட்டுள்ள மாத கட்டணங்களை படித்து நீங்கள்
                                                            விரும்பினால் உங்கள் தேவைகளை தேர்ந்தெடுங்கள்</p>
                                                        <p>Please confirm your acceptance of this declaration form
                                                            by signing.<br />தங்களது ஒப்புதலை இந்த தொழிலாளர்
                                                            அறிவிப்பு படிவத்தில் கையெழுத்து இட்டு உறுதி செய்யவும் .
                                                        </p>


                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>FACILITIES</td>
                                                                    <td>CHARGE DETAILS</td>
                                                                    <td>YES</td>
                                                                    <td>NO</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>தங்கும் இடம்/Hostel</td>
                                                                    <td>RS. 428/மாதம்</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="3">உணவு/Food </td>
                                                                    <td>
                                                                        காலை உணவு – RS.16 / நாள்/Morning
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        மதிய உணவு – RS.22 / நாள்/Lunch
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        இரவு உணவு – RS.16 / நாள்/Dinner
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        போக்குவரத்து/Transport
                                                                    </td>
                                                                    <td>
                                                                        RS.156 - மாதம்
                                                                    </td>

                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <p>குறிப்பு :</p>
                                                        <ol>
                                                            <li>Bus Route: Nallur - Muthanampalayam - Kovilvazhi -
                                                                K. Chettipalayam - SIPL.<br />
                                                                பேருந்து வழித்தடம்: நல்லூர் - முத்தனம்பாளையம் -
                                                                கோவில்வழி - கே. செட்டிபாளையம் – SIPL.</li>
                                                            <li>Food & Transport charges would be on pro - rata
                                                                basis ( consumed / utilized days ) <br />
                                                                உணவு மற்றும் போக்குவரத்துக் கட்டணங்கள் தொழிலாளர்கள்
                                                                உபயோகிக்கும் நாட்களை கொண்டு கணக்கிடப்படும்.</li>
                                                        </ol>
                                                        <p>I acknowledge the charges for list of facilities utilized
                                                            and hereby confirm my acceptance with my own free will
                                                            and shall abide by the same.<br />நான் மேலே
                                                            குறிப்பிட்டுள்ள வசதிகளையும் அதற்கான கட்டணத்தையும் எனது
                                                            சொந்த விருப்பத்துடன் ஒப்புக்கொள்கிறேன் என்பதை உறுதி
                                                            செய்கிறேன்.</p>

                                                        <p>EMPLOYEE SIGNATURE<br />
                                                            கையெழுத்து</p>
                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpDeclarationtamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Declaration Form
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeedeclarationpathtamil}}"
                                        ng-hide="Employeedeclarationpathtamil == null || Employeedeclarationpathtamil == '' "
                                        ng-show="Employeedeclarationpathtamil != null "
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

                <div class="modal fade" id="ModalCenter1EmpDeclarationHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    EMPLOYEE DECLARATION FORM
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Declaration
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpDeclarationHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpDeclarationHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpDeclarationHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpDeclarationHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpDeclarationHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>EMPLOYEE DECLARATION FORM<br />कर्मचारी घोषणा फॉर्म
                                                            </h4>
                                                        </center>

                                                        <p>SIPL will provide the food, stay and transport facilities
                                                            for employees in nominal charge.</p>
                                                        <p>एसआईपीएल नाममात्र के शुल्क पर कर्मचारियों के लिए भोजन,
                                                            ठहरने और परिवहन की सुविधा प्रदान करेगा।.</p>
                                                        <p>Please find the monthly charges for your reference and if
                                                            interested select the requirement.</p>
                                                        <p>कृपया अपने संदर्भ के लिए मासिक शुल्क खोजें और यदि इच्छुक
                                                            हैं तो आवश्यकता का चयन करें.</p>
                                                        <p>Please confirm your acceptance of this declaration form
                                                            by signing.</p>
                                                        <p>कृपया हस्ताक्षर करके इस घोषणा पत्र की स्वीकृति की पुष्टि
                                                            करें।.</p>




                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>FACILITIES सुविधाएँ</td>
                                                                    <td>CHARGE DETAILS शुल्क विवरण</td>
                                                                    <td>YES हां</td>
                                                                    <td>NO ना</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>DORMITORY MAINTENANCE
                                                                        छात्रावास
                                                                    </td>
                                                                    <td>RS. 428/ महीना</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="3">FOOD भोजन</td>
                                                                    <td>

                                                                        सुबह का नाश्ता – RS.16 / दिन
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>

                                                                        दोपहर का भोजन – RS.22 / दिन
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>

                                                                        रात का खाना – RS.16 / दिन
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        TRANSPORT
                                                                        यातायात
                                                                    </td>
                                                                    <td>

                                                                        RS.156 – महीना
                                                                    </td>

                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <p>Note :</p>
                                                        <ol>
                                                            <li>1. Bus Route: Nallur - Muthanampalayam - Kovilvazhi
                                                                - K. Chettipalayam - SIPL. <br />
                                                                बस मार्ग: नल्लूर - मुथनमपलयम - कोविल्वाज़ी - के.
                                                                चेट्टीपलायम - एसआईपीएल।.
                                                            </li>
                                                            <li>Food & Transport charges would be on pro - rata
                                                                basis ( consumed / utilized days ) <br />
                                                                खाद्य एवं परिवहन प्रभार यथानुपात आधार पर होंगे
                                                                (खपत/उपयोग किए गए दिन)
                                                            </li>
                                                        </ol>
                                                        <p>मैं उपयोग की जाने वाली सुविधाओं की सूची के लिए शुल्क
                                                            स्वीकार करता हूं और एतद्द्वारा अपनी स्वेच्छा से अपनी
                                                            स्वीकृति की पुष्टि करता हूं और उसका पालन करूंगा।.</p>

                                                        <p>SIGNATURE/हस्ताक्षर</p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpDeclarationHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Declaration Form
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeedeclarationpathhindi}}"
                                        ng-hide="Employeedeclarationpathhindi == null || Employeedeclarationpathhindi == '' "
                                        ng-show="Employeedeclarationpathhindi != null "
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

                <div class="modal fade" id="ModalCenter1EmpStatingTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    பணி நியமன விதிமுறைகள்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Stating
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpStatingTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpStatingTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpStatingTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpStatingTamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpStatingTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>பணி நியமன விதிமுறைகள்</h4>
                                                        </center>


                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <center>பணி நியமன விதிமுறைகள்</center>
                                                                    </td>
                                                                </tr>






                                                                <tr>
                                                                    <td> With reference to your application Bio -
                                                                        data from seeking an employment in our
                                                                        organization .We are pleased to issue this
                                                                        appointment letter to you on the following
                                                                        salient terms & conditions. </td>
                                                                    <td> எங்கள் நிறுவனத்தில் வேலை நாடி வந்த உங்களது
                                                                        மனு மற்றும் bio – data- வை எங்களது கவனத்தில்
                                                                        எடுத்திருக்கிறோம். கீழ்கண்ட முக்கியமான
                                                                        விதிகள் மற்றும் கட்டுப்பாடுகளின்
                                                                        அடிப்படையில் உங்களுக்கு பணி நியமனக்கடிதம்
                                                                        வழங்கியதற்கு மகிழ்ச்சி அடைகிறோம். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 1. You are presently designated as
                                                                        <U>{{EmpDesignation}}</U>.
                                                                    </td>
                                                                    <td> நீங்கள் தற்போது <U>{{EmpDesignation}}</U>
                                                                        என்ற பணியில்
                                                                        அமர்த்தப்படுகிறீர். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 2. Your date of joining is
                                                                        <u>{{Date_Of_Joing2}}</u>.
                                                                    </td>
                                                                    <td> 2. நீங்கள் பணியில் சேர்த்த தினம்
                                                                        <u>{{Date_Of_Joing2}}</u>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 3. Your age as on this date <u>{{Age}}</u>/
                                                                        D.O.B
                                                                        <u>{{Dob2}}</u>.
                                                                    </td>
                                                                    <td> 3. இன்று உங்கள் வயது<u>{{Age}}</u>/ பிறந்த
                                                                        தினம்
                                                                        <u>{{Dob2}}</u>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 4. Your weekly off shall be SUNDAY on every
                                                                        week. </td>
                                                                    <td> 4. ஒவ்வொரு வாரமும் உங்களது வார விடுமுறை
                                                                        நாள் ஞாயிறு ஆகும். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 5. Your working hours shall be S - I from
                                                                        8.30. AM to 5.30. PM / S - II 8.30 pm- 5.30
                                                                        am Every day , Office Time : 9.30 am - 6.30
                                                                        pm. (which is applicable) </td>
                                                                    <td> 5. ஒவ்வொரு நாளும், உங்களது வேலை நேரம் காலை
                                                                        8.30 am முதல் மாலை 5.30 pm (Day Shift)
                                                                        (Night Shift: 8.30 PM - 5.30am- வரை
                                                                        இருக்கும்), Office Time 9.30am - 6.30 pm.
                                                                        (இது உங்களது வேலை பொறுத்து மாறுபடும்). </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 6. Your present salary is Rs. <u>
                                                                            {{Net_Salary|currency:''}}</u> This
                                                                        salary consist of basic+DA/HRA and other
                                                                        allowances as per break up structure
                                                                        applicable to your cadre of employees and as
                                                                        per details noticed from time to time. Your
                                                                        pay slip also contains such a break up.
                                                                    </td>
                                                                    <td> D. தற்போது உங்கள் சம்பளம் ரூபாய் RS. <u>
                                                                            {{Net_Salary|currency:''}}</u>
                                                                        மட்டும் படிகள் பிரித்து வழங்கப்படும். இது
                                                                        உங்களைப் போன்ற மற்ற பணியாளர்களுக்கும்
                                                                        பொருந்தும். அது அவ்வப்போது அறிவிப்பு
                                                                        பலகையில் அறிவிக்கப்படும். உங்கள் சம்பள
                                                                        சீட்டு இத்தகைய விவரங்களை கொண்டு இருக்கும்.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 7. You are covered under the Employee State
                                                                        Insurance Corporation (ESI-0.75%) and
                                                                        Employees Provident Fund (PF-12%) schemes.
                                                                        ESI deducted from your gross earned wages.PF
                                                                        deducted from B+DA&OA earned wages. At the
                                                                        same time employer contribution (PF-12% &
                                                                        ESI-3.25) to be credited to your account in
                                                                        the concerned department. This may change if
                                                                        there is an amendment in the concerned
                                                                        department. </td>
                                                                    <td> 7. தொழிலாளர் அரசு காப்பீட்டுக் கழகம் (ESI)
                                                                        மற்றும் தொழிலாளர் வருங்கால வைப்பு நிதி (PF)
                                                                        திட்டங்களில் நீங்கள் சேர்க்கப்பட்டுள்ளீர்.
                                                                        (ESI) 0.75 %. உங்கள் மொத்த வருவாயிலிருந்து
                                                                        பிடிக்கப்படுகிறது. அதே நேரத்தில் (PF-12%)
                                                                        அடிப்படை சம்பளம் + அகவிலைப்படி மற்றும் இதர
                                                                        சலுகைகளிலிருந்து பிடித்தம் செய்து
                                                                        நிர்வாகத்தின் பங்களிப்பான ESI 3.25%/PF 12%
                                                                        உங்களது கணக்கில் சம்பத்தப்பட்ட துறையில் வரவு
                                                                        வைக்கப்படும்.. சம்பந்தபட்ட துறைகளில்
                                                                        திருத்தம் செய்யப்பட்டால் அது மாறலாம். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 8. If you commit breach of any of the terms
                                                                        and conditions of this letter or if your
                                                                        commit on act of misconduct, such as
                                                                        dishonest performance is not satisfactory
                                                                        negligence insubordination, disobedience,
                                                                        theft, misappropriation of company's funds,
                                                                        drunkenness while on duty, unruly behavior
                                                                        in attendance etc., you are liable for
                                                                        appropriate disciplinary action, which may
                                                                        also lead to termination of your service W/o
                                                                        notice as per procedures contained in the
                                                                        certified standing orders. </td>
                                                                    <td> 8. தவறான நடத்தை நேர்மையற்ற செயல், பணி
                                                                        திருப்தியின்மை. அலட்சியம், விதி மீறல்,
                                                                        கீழ்படியாமை, திருட்டு, கம்பெனி தொகை கையாடல்,
                                                                        பணிக்காலத்தில் குடித்திருத்தல், சட்டமீறி
                                                                        நடத்தல், பணிக்குவராமை. போன்ற காரணங்களால்
                                                                        இக்கடிதத்தில் கூறப்பட்டுள்ள விதிமுறைகள்
                                                                        உங்களால் மீறப்படுமானால் நீங்கள் பொருத்தமான
                                                                        நடவடிக்கைக்கு உட்படுத்தப்பட்டு பணி நீக்கம்
                                                                        செய்யப்பட்டு சான்றளிக்கப்பட்ட நிறுவை விதிகள்
                                                                        அடங்கியுள்ள செயல்முறைகளின்படி பணி நீக்கம்
                                                                        செய்யப்படுவீர்கள். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 9. If for an eight consecutive working days
                                                                        absent yourself without sanction of leave or
                                                                        overstay than sanctioned leave for eight
                                                                        consecutive days, you shall be deemed to
                                                                        have abandoned your appointment voluntarily,
                                                                        terminating your service thereby, by your
                                                                        own act. Such termination shall not to be
                                                                        deemed to be retrenchment within the purview
                                                                        of clause (bb) of section 2 (00) of the
                                                                        Industrial Disputes Act, 1947. </td>
                                                                    <td> 9.விடுப்பு அங்கீகரிக்கப்படாமல் தொடர்ந்து 8
                                                                        நாட்கள் விடுப்பு எடுத்தல், தொடர்ந்து 8
                                                                        நாட்களுக்கு உத்தரவின்றி வேலைக்கு வராமல்
                                                                        தங்குதல் போன்று செயல்பட்டால் நீங்களாகவே பணி
                                                                        நியமன உத்தரவை புறக்கணிப்பதாக
                                                                        கருதப்படுவீர்கள். பிரிவு 2 (00) தொழிற்சாலை
                                                                        வழக்கு. சட்டம் 1947 இவற்றிற்குட்பட்டு பணி
                                                                        நீக்கம் செய்யப்பட்டு ஆட்குறைப்பு செய்ததாக
                                                                        கருதப்படமாட்டாது. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 10. Your normal working hours will be 8
                                                                        (eight) hours of actual work per day or 48
                                                                        (forty eight) hours per week. </td>
                                                                    <td> 10. உங்கள் பணி நேரம் நாளுக்கு 8 மணி
                                                                        நேரங்கள். (ஒரு நாள் வேலை நேரம்) அல்லது
                                                                        வாரத்திற்கு 48 மணி நேரங்கள் ஆகும். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 11. For your overtime work (voluntarily
                                                                        basis beyond, the normal hours) overtime
                                                                        wage will be paid, to you at double the rate
                                                                        of your GROSS WAGES. </td>
                                                                    <td> 11. உங்களின் அதிக நேர வேலைக்கான (உங்கள்
                                                                        விருப்பத்தின் அடிப்படையில் பொதுவான கால
                                                                        அளவிற்கு மேல்) கூலி அடிப்படை மற்றும்
                                                                        அகவிலைப்படி/இதர சலுகைகள் மொத்த ஊதியத்தில்
                                                                        இதன் இருமடங்கு வழங்கப்படும். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 12. You are eligible for earned leave @ one
                                                                        day for every 20 days actually worked by
                                                                        you, after completion of 240 days’ work in a
                                                                        year This is credited annually on ________of
                                                                        the following years. </td>
                                                                    <td> 12. நீங்கள் ஒரு வருடத்திற்கு 240
                                                                        நாட்களுக்கு மேல் வேலை பார்த்தால் ஒவ்வொரு 20
                                                                        நாட்களுக்கும் ஒரு நாள் ஈட்டிய விடுப்புக்கு
                                                                        தகுதியுடையவர் ஆகிறீர்கள். இது வரும் வருடம்
                                                                        _______முதல் தேதியில் ஒவ்வொரு வருடமும்
                                                                        உங்கள் கணக்கில் வைக்கப்படும். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 13. National and festival Holidays :You are
                                                                        eligible for N / F holidays as required by
                                                                        the law. </td>
                                                                    <td> 13 : தேசிய மற்றும் விழாக்கால விடுமுறைகள் :
                                                                        சட்டப்படி உள்ள (குறைந்தபட்சம் வருடத்திற்கு
                                                                        ஒன்பது நாட்கள்) எல்லா தேசிய மற்றும்
                                                                        விழாக்கால வீடுமுறைக்கும் நீங்கள்
                                                                        தகுதியுள்ளவர் ஆவர். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 14. Benefits of Bonus, gratuity are
                                                                        available in our factory and are as
                                                                        determined under the respective rules of
                                                                        Payment of Bonus Act and Payment of gratuity
                                                                        Act. (Minimum Bonus 8.33%) </td>
                                                                    <td> 14. ஊக்கத்தொகை மற்றும் பணிக்கொடை: நம்
                                                                        தொழிற்சாலையில் அரசாங்கத்தின் ஊக்கத்தொகை
                                                                        மற்றும் பணிக்கொடை சட்ட விதிகளின்படி
                                                                        வழங்கப்படும் (குறைந்தபட்ச போனஸ் 8.33%).
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 15. Rules and Regulation : Employee’s
                                                                        conditions of our company are governed by
                                                                        the factories act 1948 and the certified
                                                                        standing orders of cur company. Accordingly,
                                                                        all other terms and conditions of services
                                                                        are as per the provision of the said
                                                                        standing order. </td>
                                                                    <td> 15.விதிகளும் கட்டுப்பாடுகளும் :
                                                                        தொழிற்சாலையில் ஊழியர் நிலவரங்கள் தொழிற்சாலை
                                                                        விதி 1848 ன் படியும் நிர்வகிக்கப்படும்.
                                                                        அதன்படி மற்ற நிறுவை விதிகளின்படியும்
                                                                        நிர்வகிக்கப்படும். அதன்படி மற்ற எல்லாம்
                                                                        உங்கள் பணி விதிமுறைகள் அந்த மேற்கொள்ளப்பட்ட
                                                                        சட்ட நிலுவை விதிகளின் படியே இருக்கின்றன.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16. Miscellaneous : During the period of
                                                                        Probation or continuation as the case may be
                                                                        liable and shall accept transfer to any
                                                                        whatever be the. Interest of the company are
                                                                        involved in the state of Tamilnadu or where
                                                                        in India. </td>
                                                                    <td> 16. பலதரப்பட்டவை : தமிழ்நாட்டிலோ அல்லது
                                                                        இந்தியாவில் எங்கு வேண்டுமானும் நிறுவனத்தின்
                                                                        விருப்பப்படி பணிக்காலத்தில் அல்லது நீரந்தரம்
                                                                        செய்யப்பட்ட நிலையில் கம்பெனியின் துணை
                                                                        நிறுவனங்களில் சகோதர நிறுவனங்களில் அல்லது
                                                                        கிளைகளில் நீங்கள் பணிமாற்றத்திற்கு
                                                                        உட்படுத்தப்படலாம். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16b. You shall not, at any times disclose
                                                                        to any one any information, know - how,
                                                                        knowledge, secrets, methods, plans etc., of
                                                                        the company. </td>
                                                                    <td> 16b. எக்காலத்திலும் யாருக்கும் நிறுவனத்தின்
                                                                        எந்த தகவலையோ தொழில் நுணுக்கத்தையோ. திறனையோ,
                                                                        ரகசியங்களையோ, வழி திட்டங்களையோ
                                                                        வெளியிடக்கூடாது. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16c. During the period of your service with
                                                                        the company you shall not carry on any
                                                                        business of your own but carry out your
                                                                        duties diligently. Loyally and to the best
                                                                        of your capacity. </td>
                                                                    <td> 16c. உங்கள் பணிக்காலத்தில் சொந்த தொழில்
                                                                        ஏதும் எடுத்துச் செய்யக்கூடாது, கடமைகளை
                                                                        பொறுப்புடனும், விசுவாசத்துடனும் உங்கள்
                                                                        முழுத்திறமையுடன் எடுத்துச்செய்ய வேண்டும்.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16d. This appointment / probation is made
                                                                        on the understanding that the information
                                                                        given by you in your application for
                                                                        appointment is correct, true and complete.
                                                                        If it is found at any stage that the
                                                                        information given by you is not correct /
                                                                        true / complete, or you had suppressed
                                                                        information, this appointment may be
                                                                        withdrawn before you join services with us
                                                                        or your services may be terminated at any
                                                                        time after taken up employment with us. The
                                                                        address furnished in your application for
                                                                        appointment are the basic for the
                                                                        communication of all correspondence. It is
                                                                        your bounded duty to furnish the latest
                                                                        address always, keep in touch with your
                                                                        latest address to the management. </td>
                                                                    <td> 16d. இந்தப் பணி நியமனம் பயிற்சி மனு
                                                                        உண்மையானது. முழுமையாக கொடுக்கப்பட்ட தகவல்கள்
                                                                        உண்மையானவை என்ற அடிப்படையில்
                                                                        செய்யப்படுகிறது. எந்த ஓர் காலகட்டத்திலும்
                                                                        கொடுக்கப்பட்ட தகவல் தவறானது மறைக்கப்பட்ட
                                                                        தகவல் என்றால் நீங்கள் வேலைக்கு அல்லது
                                                                        பணியில் சேர்ந்த பின்னர் நீக்கப்படுவீர்,
                                                                        உங்கள் பணி நியமன மனுவில் வழங்கப்பட்ட விலாசம்
                                                                        எதிர்காலத்தில் தகவல் அனுப்புவதற்கு
                                                                        அடிப்படையாக இருக்கிறது. உங்களுடைய கடைசியாக
                                                                        மாறியுள்ள விலாசத்தை எங்களுக்கு அளிப்பது
                                                                        உங்களுடைய பொறுப்பாகும் கடைசியாக மாற்றிய
                                                                        விலாசத்தை நிர்வாகத்திற்க அனுப்பவேண்டும்.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16e. The management reserve the right lay -
                                                                        off with compensation of retrench our
                                                                        services at its discretion for any reason
                                                                        whatsoever and will be paid compensation as
                                                                        per the provisions of the industrial
                                                                        disputes Act. 1947. </td>
                                                                    <td> 16e. பணி நீக்கம் அல்லது பணிமுடக்கம் நிர்வாக
                                                                        விருப்பப்படி எக்காரணத்திற்காக
                                                                        செய்யப்பட்டாலும் தொழிற்சாலை சட்டம் 1947 ன்
                                                                        படி நஷ்டஈடு வழங்கப்படுவீர்கள். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 17. Residential Address Your residential
                                                                        address as stated above is as furnished by
                                                                        and is deemed as the address for any
                                                                        specific communication or notice to you. You
                                                                        should keep the management information of
                                                                        any change in your address that may arise at
                                                                        your end. </td>
                                                                    <td> 17. வீட்டு விலாசம் : உங்கள் குடியிருப்பு
                                                                        விலாசம் உங்களால் மேலே கொடுக்கப்பட்டது. எந்த
                                                                        குறிப்பிட்ட தகவலும் உங்களுக்கு அறிவிப்பு
                                                                        கொடுக்கவும் சரியானதாக கருதப்படுகிறது
                                                                        நிர்வாகத்திற்கு தகவல் தெரிவிப்பதுடன் எந்த
                                                                        விலாச மாற்றத்தையும் தெரிவிக்க வேண்டும்.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 18. Any permanent workman desirous of
                                                                        leaving the service shall give one month's
                                                                        notice and return all company belongings.
                                                                    </td>
                                                                    <td> 18. எந்த நிரத்திரத் தொழிலாளியாவது தானாகவே
                                                                        வேலையை விட்டு விளக்கிக் கொள்ள விரும்பினால்
                                                                        ஒரு மாத முன்னறிவிப்பினை நிர்வாகத்திடம்
                                                                        கொடுத்து மற்றும் நிறுவனத்தின் அனைத்து
                                                                        உடைமைகளையும் நிர்வாகத்திற்க்கு திருப்பிதந்து
                                                                        வேலையிலுருந்து விலகிக் கொள்ளலாம். </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpStatingTamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Stating
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeestatingpathtamil}}"
                                        ng-hide="Employeestatingpathtamil == null || Employeestatingpathtamil == '' "
                                        ng-show="Employeestatingpathtamil != null "
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
                <div class="modal fade" id="ModalCenter1EmpStatingHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    EMPLOYEE STATING AS FOLLOWS
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Stating
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpStatingHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpStatingHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpStatingHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpStatingHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpStatingHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>THE EMPLOYEE STATING AS FOLLOWS</h4>
                                                        </center>



                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">THE EMPLOYEE STATING AS FOLLOWS
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:49.8%"> With reference to your
                                                                        application Bio - data from seeking an
                                                                        employment in our organization .We are
                                                                        pleased to issue this appointment letter to
                                                                        you on the following salient terms &
                                                                        conditions. </td>
                                                                    <td> हमने अपनी कंपनी में नौकरी के लिए आवेदन करने
                                                                        के लिए आपके आवेदन और बायोडाटा पर ध्यान दिया
                                                                        है। हमें आपको निम्नलिखित महत्वपूर्ण नियमों
                                                                        और प्रतिबंधों के अधीन नियुक्ति पत्र जारी
                                                                        करने में प्रसन्नता हो रही है।.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 1. You are presently designated as
                                                                        <u>{{EmpDesignation}}</u>.
                                                                    </td>
                                                                    <td> आप वर्तमान में <u>{{EmpDesignation}}</u>
                                                                        कार्यरत हैं।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 2. Your date of joining is
                                                                        <u>{{Date_Of_Joing2}}</u>.
                                                                    </td>
                                                                    <td> 2. आप सेवा में शामिल होने की तिथि
                                                                        <u>{{Date_Of_Joing2}}</u>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 3. Your age as on this date <u>{{Age}} </u>
                                                                        / D.O.B
                                                                        <u>{{Dob2}}</u> .
                                                                    </td>
                                                                    <td> 3. आज आपकी उम्र <u>{{Age}}</u> / जन्मदिन है
                                                                        <u>{{Dob2}}</u>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 4. Your weekly off shall be SUNDAY on every
                                                                        week. </td>
                                                                    <td> 4. रविवार आपका साप्ताहिक अवकाश है. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 5. Your working hours shall be S - I from
                                                                        8.30. AM to 5.30. PM / S - II 8.30 pm- 5.30
                                                                        am Every day , Office Time : 9.30 am - 6.30
                                                                        pm. (which is applicable) </td>
                                                                    <td> 5. हर दिन, आपके काम करने का समय सुबह 8.30am
                                                                        बजे है शाम 5.30pm बजे से शाम 8.30pm-5.30Am
                                                                        बजे (8.30 बजे से 5.30 बजे तक), कार्यालय समय
                                                                        सुबह 9.30am बजे से शाम 6.30pm बजे तक। (इस पर
                                                                        लागू होता है)। </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 6. Your present salary is Rs. <u>
                                                                            {{Net_Salary|currency:''}}</u> This
                                                                        salary consist of basic+DA/HRA and other
                                                                        allowances as per break up structure
                                                                        applicable to your cadre of employees and as
                                                                        per details noticed from time to time. Your
                                                                        pay slip also contains such a break up.
                                                                    </td>
                                                                    <td> 6. वर्तमान में आपका वेतन रु. <u>
                                                                            {{Net_Salary|currency:''}}</u> केवल कदम
                                                                        अलग से दिए जाएंगे। वही आप जैसे अन्य
                                                                        कर्मचारियों के लिए जाता है। इसकी घोषणा
                                                                        समय-समय पर नोटिस बोर्ड पर की जाएगी। आपकी
                                                                        वेतन पर्ची में ऐसे विवरण होंगे। </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 7. You are covered under the Employee State
                                                                        Insurance Corporation (ESI-0.75%) and
                                                                        Employees Provident Fund (PF-12%) schemes.
                                                                        ESI deducted from your gross earned wages.PF
                                                                        deducted from B+DA&OA earned wages. At the
                                                                        same time employer contribution (PF-12% &
                                                                        ESI-3.25) to be credited to your account in
                                                                        the concerned department. This may change if
                                                                        there is an amendment in the concerned
                                                                        department. </td>
                                                                    <td> 7. आप कर्मचारी राज्य बीमा निगम (ईएसआई) और
                                                                        कर्मचारी भविष्य निधि (पीएफ) योजनाओं के
                                                                        अंतर्गत आते हैं। (ईएसआई) 0.75%। आपकी सकल आय
                                                                        में से कटौती। साथ ही (पीएफ-12%) मूल वेतन +
                                                                        ग्रेच्युटी और अन्य भत्तों और प्रबंधन के
                                                                        योगदान से कटौती ईएसआई 3.25% / पीएफ 12%
                                                                        अर्जित क्षेत्र में आपके खाते में जमा की
                                                                        जाएगी। संबंधित क्षेत्रों में संशोधन होने पर
                                                                        यह बदल सकता है।</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 8. If you commit breach of any of the terms
                                                                        and conditions of this letter or if your
                                                                        commit on act of misconduct, such as
                                                                        dishonest performance is not satisfactory
                                                                        negligence insubordination, disobedience,
                                                                        theft, misappropriation of company's funds,
                                                                        drunkenness while on duty, unruly behavior
                                                                        in attendance etc., you are liable for
                                                                        appropriate disciplinary action, which may
                                                                        also lead to termination of your service W/o
                                                                        notice as per procedures contained in the
                                                                        certified standing orders. </td>
                                                                    <td> 8. कदाचार बेईमानी, नौकरी में असंतोष।
                                                                        लापरवाही, नियमों का उल्लंघन, अवज्ञा, चोरी,
                                                                        कंपनी के धन का दुरूपयोग, ड्यूटी पर मद्यपान,
                                                                        दुराचार, अनुपस्थिति। यदि आप इस तरह के कारणों
                                                                        से इस पत्र की शर्तों का उल्लंघन करते हैं, तो
                                                                        आप उचित कार्रवाई के अधीन होंगे और प्रमाणित
                                                                        कंपनी नियमों में निहित प्रक्रियाओं के अनुसार
                                                                        समाप्त किया जा सकता है।. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 9. If for an eight consecutive working days
                                                                        absent yourself without sanction of leave or
                                                                        overstay than sanctioned leave for eight
                                                                        consecutive days, you shall be deemed to
                                                                        have abandoned your appointment voluntarily,
                                                                        terminating your service thereby, by your
                                                                        own act. Such termination shall not to be
                                                                        deemed to be retrenchment within the purview
                                                                        of clause (bb) of section 2 (00) of the
                                                                        Industrial Disputes Act, 1947. </td>
                                                                    <td> 9.यदि आप बिना अनुमति के लगातार 8 दिनों की
                                                                        छुट्टी लेते हैं, बिना अनुमति के लगातार 8
                                                                        दिनों तक काम से अनुपस्थित रहते हैं, तो आप
                                                                        स्वयं नियुक्ति आदेश की अवहेलना करने वाले
                                                                        माने जाएंगे। धारा 2 (00) फैक्टरी सूट।
                                                                        अधिनियम 1947 को इनके अंतर्गत छँटनी या छँटनी
                                                                        नहीं समझा जाएगा.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 10. Your normal working hours will be 8
                                                                        (eight) hours of actual work per day or 48
                                                                        (forty eight) hours per week. </td>
                                                                    <td> 10. आपके काम के घंटे प्रतिदिन 8 घंटे हैं।
                                                                        प्रति दिन काम के घंटे) या प्रति सप्ताह 48
                                                                        घंटे।</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 11. For your overtime work (voluntarily
                                                                        basis beyond, the normal hours) overtime
                                                                        wage will be paid, to you at double the rate
                                                                        of your GROSS WAGES. </td>
                                                                    <td> 11. आपके ओवरटाइम काम के लिए मूल वेतन और
                                                                        ग्रेच्युटी/अन्य भत्ते (आपके विकल्प पर
                                                                        सामान्य अवधि से अधिक) का भुगतान कुल मजदूरी
                                                                        के दोगुने पर किया जाएगा।. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 12. You are eligible for earned leave @ one
                                                                        day for every 20 days actually worked by
                                                                        you, after completion of 240 days’ work in a
                                                                        year This is credited annually on ________of
                                                                        the following years. </td>
                                                                    <td> 12. यदि आप एक वर्ष में 240 दिनों से अधिक
                                                                        काम करते हैं, तो आप प्रत्येक 20 दिनों के लिए
                                                                        एक दिन की अर्जित छुट्टी के हकदार हैं। आपका
                                                                        खाता हर साल _______ तारीख को क्रेडिट किया
                                                                        जाएगा।. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 13. National and festival Holidays :You are
                                                                        eligible for N / F holidays as required by
                                                                        the law. </td>
                                                                    <td> 13. राष्ट्रीय और त्योहार की छुट्टियां:
                                                                        आप सभी वैधानिक राष्ट्रीय और अवकाश (प्रति
                                                                        वर्ष न्यूनतम नौ दिन) के हकदार हैं।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 14. Benefits of Bonus, gratuity are
                                                                        available in our factory and are as
                                                                        determined under the respective rules of
                                                                        Payment of Bonus Act and Payment of gratuity
                                                                        Act. (Minimum Bonus 8.33%) </td>
                                                                    <td>14. प्रोत्साहन और ग्रेच्युटी:
                                                                        हमारे कारखाने में, वैधानिक प्रावधानों
                                                                        (न्यूनतम बोनस 8.33%) के अनुसार सरकारी
                                                                        प्रोत्साहन और ग्रेच्युटी का भुगतान किया जाता
                                                                        है।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 15. Rules and Regulation : Employee’s
                                                                        conditions of our company are governed by
                                                                        the factories act 1948 and the certified
                                                                        standing orders of cur company. Accordingly,
                                                                        all other terms and conditions of services
                                                                        are as per the provision of the said
                                                                        standing order. </td>
                                                                    <td> 15. नियम और शर्तें:
                                                                        कारखाने में कर्मचारियों की शर्तें भी कारखाना
                                                                        अधिनियम 1848 द्वारा शासित होती हैं। तदनुसार,
                                                                        आपके रोजगार की अन्य सभी शर्तें लागू वैधानिक
                                                                        प्रावधानों के अधीन हैं।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16. Miscellaneous : During the period of
                                                                        Probation or continuation as the case may be
                                                                        liable and shall accept transfer to any
                                                                        whatever be the. Interest of the company are
                                                                        involved in the state of Tamilnadu or where
                                                                        in India. </td>
                                                                    <td>16. विविध :
                                                                        सेवा की अवधि के दौरान या स्थानांतरण पर कंपनी
                                                                        के विवेक पर आपको कंपनी की किसी भी सहायक
                                                                        कंपनी, सहयोगी कंपनियों या शाखाओं में
                                                                        स्थानांतरित किया जा सकता है।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16b. You shall not, at any times disclose
                                                                        to any one any information, know - how,
                                                                        knowledge, secrets, methods, plans etc., of
                                                                        the company. </td>
                                                                    <td>16बी. किसी भी समय कंपनी की जानकारी या
                                                                        व्यावसायिक खुफिया, क्षमताओं, रहस्यों या
                                                                        रोडमैप का खुलासा नहीं किया जा सकता है।.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16c. During the period of your service with
                                                                        the company you shall not carry on any
                                                                        business of your own but carry out your
                                                                        duties diligently. Loyally and to the best
                                                                        of your capacity. </td>
                                                                    <td>16ग. आपको अपने कार्यकाल के दौरान अपना खुद का
                                                                        कोई व्यवसाय नहीं करना चाहिए, आपको अपनी
                                                                        योग्यता के अनुसार जिम्मेदारी और निष्ठा के
                                                                        साथ कर्तव्यों का पालन करना चाहिए।</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16d. This appointment / probation is made
                                                                        on the understanding that the information
                                                                        given by you in your application for
                                                                        appointment is correct, true and complete.
                                                                        If it is found at any stage that the
                                                                        information given by you is not correct /
                                                                        true / complete, or you had suppressed
                                                                        information, this appointment may be
                                                                        withdrawn before you join services with us
                                                                        or your services may be terminated at any
                                                                        time after taken up employment with us. The
                                                                        address furnished in your application for
                                                                        appointment are the basic for the
                                                                        communication of all correspondence. It is
                                                                        your bounded duty to furnish the latest
                                                                        address always, keep in touch with your
                                                                        latest address to the management. </td>
                                                                    <td>16डी. यह भर्ती प्रशिक्षण आवेदन वास्तविक है।
                                                                        इसकी संपूर्णता में प्रदान की गई जानकारी इस
                                                                        आधार पर बनाई जाती है कि यह सत्य है। यदि किसी
                                                                        भी समय प्रदान की गई जानकारी झूठी है या
                                                                        जानकारी रोक रही है, तो आपको रोजगार या रोजगार
                                                                        से हटा दिया जाएगा, और आपके रोजगार आवेदन पत्र
                                                                        में दिया गया पता भविष्य के संचार का आधार है।
                                                                        यह आपकी जिम्मेदारी है कि आप हमें अपना पिछला
                                                                        बदला हुआ पता प्रदान करें और प्रशासन को अंतिम
                                                                        बदला हुआ पता भेजें।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16e. The management reserve the right lay -
                                                                        off with compensation of retrench our
                                                                        services at its discretion for any reason
                                                                        whatsoever and will be paid compensation as
                                                                        per the provisions of the industrial
                                                                        disputes Act. 1947. </td>
                                                                    <td>16ई. आप कारखाना अधिनियम, 1947 के अनुसार
                                                                        मुआवजे के हकदार हैं, चाहे बर्खास्तगी या
                                                                        छंटनी किसी भी कारण से प्रबंधन के विवेक पर
                                                                        हो।.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 17. Residential Address Your residential
                                                                        address as stated above is as furnished by
                                                                        and is deemed as the address for any
                                                                        specific communication or notice to you. You
                                                                        should keep the management information of
                                                                        any change in your address that may arise at
                                                                        your end. </td>
                                                                    <td>घर का पता:
                                                                        आपका आवासीय पता आपके द्वारा ऊपर दिया गया है।
                                                                        आपको सूचित करने के लिए उपयुक्त समझी जाने
                                                                        वाली कोई भी विशिष्ट जानकारी प्रबंधन और पते
                                                                        के किसी भी परिवर्तन को सूचित करना चाहिए।.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 18. Any permanent workman desirous of
                                                                        leaving the service shall give one month's
                                                                        notice and return all company belongings.
                                                                    </td>
                                                                    <td>18. कोई भी आकस्मिक कर्मचारी जो स्वेच्छा से
                                                                        इस्तीफा देना चाहता है, प्रबंधन को एक महीने
                                                                        का नोटिस देकर और कंपनी की सारी संपत्ति
                                                                        प्रबंधन को सौंपकर रोजगार से वापस ले सकता
                                                                        है।.</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpStatingHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Stating
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeestatingpathhindi}}"
                                        ng-hide="Employeestatingpathhindi == null || Employeestatingpathhindi == '' "
                                        ng-show="Employeestatingpathhindi != null "
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

                <div class="modal fade" id="ModalCenter1EmpAgreementTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    பணியாளர் நம்பகத்தன்மை மற்றும் வெளிப்படுத்தாத ஒப்பந்தம்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Agreement
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpAgreementTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpAgreementTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpAgreementTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpAgreementTamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpAgreementTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>பணியாளர் நம்பகத்தன்மை மற்றும் வெளிப்படுத்தாத
                                                                ஒப்பந்தம்</h4>
                                                        </center>



                                                        <p>நல்ல ஆலோசனையுடனும், சைன்மார்க்ஸ் இண்டஸ்ட்ரீஸ் இந்தியா
                                                            பிரைவேட் லிமிடெட் (கம்பெனி) எனது வேலைவாய்ப்பு அல்லது
                                                            தொடர்ச்சியான வேலைவாய்ப்பைக் கருத்தில் கொண்டு, அடியிற்
                                                            கையொப்பமிட்ட ஊழியர் நான் இந்த ஒப்பந்தத்தின் விதிமுறைகளை
                                                            (“ஒப்பந்தம்”) ஒப்புக்கொள்கிறேன்:</p>

                                                        <h3>1. ரகசிய தகவல்</h3>
                                                        <p><b><u>அ. நிறுவனத்தின் தகவல்:</u></b> எனது வேலைவாய்ப்பு
                                                            காலத்திலும், அதன்பிறகு மூன்று வருட காலத்திலும்,
                                                            நிறுவனத்தின் நன்மை தவிர, அல்லது எந்தவொரு நபருக்கும்,
                                                            நிறுவனத்துக்கும் அல்லது நிறுவனத்தின் எழுத்துப்பூர்வ
                                                            அங்கீகாரமின்றி இருக்கும் நிறுவனத்துக்கும், நிறுவனத்தின்
                                                            எந்த ரகசிய தகவலும் நம்பிக்கையுடன் இருப்பதற்கும், எல்லா
                                                            நேரங்களிலும் நம்பிக்கையுடன் இருக்க நான்
                                                            ஒப்புக்கொள்கிறேன். எனக்கு புரிவது என்னவென்றால் “ரகசிய
                                                            தகவல்” என்பது எந்தவொரு நிறுவனத்தின் தனியுரிம தகவல்,
                                                            தொழில்நுட்ப தரவு, வர்த்தக ரகசியங்கள் அல்லது ஆராய்ச்சி,
                                                            தயாரிப்புத் திட்டங்கள், தயாரிப்புகள், சேவைகள்,
                                                            வாடிக்கையாளர் பட்டியல்கள், சந்தைகள், மென்பொருள்,
                                                            முன்னேற்றங்கள், கண்டுபிடிப்புகள் உள்ளிட்டவற்றை
                                                            உள்ளடக்கியது, ஆனால் அவை மட்டுமல்ல. செயல்முறைகள்,
                                                            சூத்திரங்கள், தொழில்நுட்பம், வடிவமைப்புகள், வரைபடங்கள்,
                                                            பொறியியல், வன்பொருள் உள்ளமைவு தகவல், சந்தைப்படுத்தல்,
                                                            நிதி அல்லது நிறுவனம் எனக்கு நேரடியாகவோ அல்லது
                                                            மறைமுகமாகவோ வெளிப்படுத்திய பிற வணிகத் தகவல்கள்.</p>

                                                        <p><b><u>ஆ. விதிவிலக்குகள்:</u></b> நான் நிரூபிக்கக்கூடிய
                                                            ரகசிய தகவலின் பகுதிக்கு மேற்கூறிய கடமைகள் மற்றும்
                                                            கட்டுப்பாடுகள் பொருந்தாது:</p>
                                                        <ul>
                                                            <li>கிடைத்தது அல்லது பொதுவாக பொதுமக்களுக்கு கிடைத்தது
                                                                அல்லது</li>
                                                            <li>கோரப்பட்டது அல்லது சட்டப்பூர்வமாக
                                                                கட்டாயப்படுத்தப்பட்டது (வாய்வழி கேள்விகள்,
                                                                விசாரணையாளர்கள், தகவல் அல்லது ஆவணங்களுக்கான
                                                                கோரிக்கைகள், சப்போனா, சிவில் அல்லது கிரிமினல்
                                                                புலனாய்வு கோரிக்கை அல்லது ஒத்த செயல்முறை) அல்லது
                                                                தடைசெய்யப்பட்ட எந்தவொரு வெளிப்பாட்டையும் செய்ய ஒரு
                                                                ஒழுங்குமுறை அமைப்பு தேவைப்படுகிறது இல்லையெனில், இந்த
                                                                ஒப்பந்தத்தால் கட்டுப்படுத்தப்பட்டால், நான்
                                                                கட்டுப்படுவேன்.</li>
                                                            <li>அத்தகைய எந்தவொரு கோரிக்கையையும் (களை) உடனடியாக
                                                                அறிவித்து நிறுவனத்திற்கு வழங்குவதன் மூலம் நிறுவனம்
                                                                பொருத்தமான பாதுகாப்பு உத்தரவு அல்லது பிற பொருத்தமான
                                                                தீர்வுகளைத் தேடலாம் மற்றும்</li>
                                                            <li>அத்தகைய பாதுகாப்பு உத்தரவைப் பெறுவதில்
                                                                நிறுவனத்திற்கு நியாயமான உதவிகளை வழங்குதல். அத்தகைய
                                                                பாதுகாப்பு உத்தரவு அல்லது பிற தீர்வுகள்
                                                                பெறப்படாவிட்டால் அல்லது நிறுவனம் இங்கு தள்ளுபடியை
                                                                வழங்கினால், ரகசிய தகவலின் அந்த பகுதியை (மற்றும் அந்த
                                                                பகுதியை மட்டுமே) நான் வழங்கலாம், இது நிறுவனத்திற்கு
                                                                நியாயமான முறையில் ஏற்றுக்கொள்ளக்கூடிய ஆலோசனையின்
                                                                எழுத்துப்பூர்வ கருத்தில், நான் சட்டப்பூர்வமாக
                                                                கட்டாயப்படுத்தப்பட்டது அல்லது வெளிப்படுத்த
                                                                தேவைப்பட்டால்; வழங்கப்பட்டால், இரகசியத்தன்மை
                                                                வெளிப்படுத்தப்படும் எந்தவொரு ரகசிய தகவலுக்கும்
                                                                வழங்கப்படும் என்ற நம்பகமான உத்தரவாதத்தைப் பெற
                                                                நியாயமான முயற்சிகளைப் பயன்படுத்துவேன்.</li>
                                                        </ul>

                                                        <p><b><u>இ. முன்னாள் வேலைவாய்ப்பு தகவல்:</u></b>
                                                            நிறுவனத்துடனான எனது வேலையின் போது நான் ஒப்புக்கொள்வது
                                                            என்னவென்றால், முறையற்ற முறையில் பயன்படுத்தக்கூடாதுஅல்லது
                                                            எந்த தனியுரிம தகவலையும் வெளியிடவும் அல்லது எந்தவொரு
                                                            முன்னாள் அல்லது ஒரே நேரத்தில் முதலாளியின் வர்த்தக
                                                            இரகசியங்கள் அல்லது மற்ற நபர் அல்லது எந்தவொரு
                                                            வெளியிடப்படாத ஆவணத்தையும் நிறுவனத்தின் வளாகத்திற்கு
                                                            கொண்டு வரக்கூடாது அல்லது அத்தகைய எந்தவொரு முதலாளிக்கும்
                                                            சொந்தமான தனியுரிம தகவல் அல்லது அத்தகைய முதலாளி, நபர்
                                                            அல்லது நபர் அல்லது நிறுவனம் எழுத்துப்பூர்வமாக ஒப்புக்
                                                            கொள்ளாவிட்டால்.</p>

                                                        <p><u><b>ஈ. மூன்றாம் தரப்பு தகவல்:</u></b>எதிர்காலத்தில்
                                                            மூன்றாம் தரப்பினரிடமிருந்து அவர்களின் ரகசிய அல்லது
                                                            தனியுரிம தகவல்களை சில வரையறுக்கப்பட்ட நோக்கங்களுக்காக
                                                            மட்டுமே பயன்படுத்துவேன் என்பதை நான் உணர்கிறேன். இதுபோன்ற
                                                            அனைத்து ரகசிய அல்லது தனியுரிம தகவல்களையும் கடுமையான
                                                            நம்பிக்கையுடன் வைத்திருக்க ஒப்புக்கொள்கிறேன், அதை
                                                            எந்தவொரு நபருக்கும், நிறுவனத்திற்கும் அல்லது
                                                            நிறுவனத்திற்கும் வெளியிடக்கூடாது அல்லது அத்தகைய மூன்றாம்
                                                            தரப்பினருடனான நிறுவனத்தின் உடன்படிக்கைக்கு இணங்க
                                                            நிறுவனத்திற்காக எனது பணிகளை மேற்கொள்வதில் தேவையானதைத்
                                                            தவிர அதைப் பயன்படுத்தக்கூடாது.</p>

                                                        <h3>2. நிர்வாக பொருட்களை திரும்ப பெறுதல்:</h3>
                                                        <p>எனது வேலையில் இருந்து விலகும் போது, நிறுவனத்தின் வணிகம்
                                                            தொடர்பான அனைத்து ஆவணங்களும், அறிக்கைகள், சுருக்கங்கள்,
                                                            பட்டியல்கள், கடிதப் போக்குவரத்து, தகவல், கணினி
                                                            கோப்புகள், கணினி வட்டுகள் மற்றும் நிறுவனத்துடன் எனது
                                                            வேலையின் போது நான் பெற்ற மற்ற எல்லா பொருட்களும் மற்றும்
                                                            அத்தகைய பொருட்களின் அனைத்து நகல்களும் திரும்ப
                                                            ஒப்படைத்துவிடுவேன்.</p>

                                                        <h3>3. சட்டபூர்வமான மற்றும் தகுதியான தீர்வுகள்:</h3>
                                                        <p>இந்த ஒப்பந்தத்தின் எந்தவொரு விதிகளை மீறினாலும் தடை
                                                            உத்தரவைப் பெற நிறுவனத்திற்கு உரிமை உண்டு என்பதையும் நான்
                                                            உணர்கிறேன். அத்தகைய போட்டி அல்லது வெளிப்பாட்டைத் தடுக்க
                                                            ஒரு தடை உத்தரவு, குறிப்பிட்ட செயல்திறன் அல்லது பிற சமமான
                                                            தீர்வைப் பெற நிறுவனத்திற்கு உரிமை உண்டு என்பதையும், மற்ற
                                                            சட்ட தீர்வுகளுக்கு நிறுவனத்திற்கு உரிமை வழங்கலாம்
                                                            என்பதையும் நான் உணர்கிறேன். வழக்கறிஞரின் கட்டணம் மற்றும்
                                                            செலவுகள் உட்பட.</p>

                                                        <h3>4. வாரிசுகள் மற்றும் பணிகள்:</h3>
                                                        <p>இந்த ஒப்பந்தம் எனது வாரிசுகள், நிர்வாகிகள், நிர்வாகிகள்
                                                            மற்றும் பிற சட்ட பிரதிநிதிகள் மீது கட்டுப்படும், மேலும்
                                                            நிறுவனம், அதன் வாரிசுகள் மற்றும் அதன் பணியாளர்களின்
                                                            நலனுக்காக இருக்கும். இந்த ஒப்பந்தத்தின் கீழ் எனது
                                                            எந்தவொரு உரிமைகளையும் நான் ஒதுக்கவோ, அல்லது எனது கடமைகள்
                                                            எதையும் ஒப்படைக்கவோ கூடாது.</p>

                                                        <h3>5. தொடர் கடமைகள்:</h3>
                                                        <p>இந்த ஒப்பந்தத்தில் விவரிக்கப்பட்டுள்ள கடமைகள் மற்றும்
                                                            உரிமைகள் நிறுவனத்துடனான எனது வேலைவாய்ப்பு
                                                            நிறுத்தப்படுவதைத் தக்கவைக்கும்.</p>

                                                        <h3>6. சீர்திருத்தல்:</h3>
                                                        <p>எப்போது வேண்டுமானாலும், இந்த ஒப்பந்தத்தின் ஒவ்வொரு
                                                            ஏற்பாடும் பொருந்தக்கூடிய சட்டத்தின் கீழ் பயனுள்ளதாகவும்
                                                            செல்லுபடியாகும் விதமாகவும் விளக்கப்படும், ஆனால் இந்த
                                                            ஒப்பந்தத்தின் எந்தவொரு ஏற்பாடும் எந்தவொரு பொருந்தக்கூடிய
                                                            சட்டம் அல்லது விதியின் கீழ் எந்த வகையிலும் செல்லாதது,
                                                            சட்டவிரோதமானது அல்லது செயல்படுத்த முடியாதது எனக்
                                                            கருதப்பட்டால் எந்தவொரு அதிகார வரம்பும், அத்தகைய
                                                            செல்லுபடியாகாத தன்மை, சட்டவிரோதம் அல்லது செயல்படுத்த
                                                            முடியாதது வேறு எந்த விதிமுறையையும் அல்லது வேறு எந்த
                                                            அதிகார வரம்பையும் பாதிக்காது, ஆனால் இந்த ஒப்பந்தம்
                                                            சீர்திருத்தப்பட்டு, கட்டாயப்படுத்தப்பட்டு, அத்தகைய
                                                            அதிகார வரம்பில் செயல்படுத்தப்படும், இது போன்ற தவறான,
                                                            சட்டவிரோத அல்லது செயல்படுத்த முடியாத விதிகள் இங்கு
                                                            ஒருபோதும் இல்லாதது போல. </p>

                                                        <h3>7. அரசு சட்டம்:</h3>
                                                        <p>இந்த ஒப்பந்தம் சட்ட விதிகளின் முரண்பாடுகளைப்
                                                            பொருட்படுத்தாமல் தமிழக மாநிலத்தின் சட்டங்களால்
                                                            நிர்வகிக்கப்படும். </p>

                                                        <p>சாட்சி அதற்கென்றே உள்ள தரப்புகள் இந்த ஒப்பந்தத்தை
                                                            நிறைவேற்றுகின்றன</p>


                                                        <p style="text-align:left;">ஏற்றுக்கொள்வது/மற்றும்
                                                            ஒப்புக்கொள்வது<span style="float:right;">செய்ன்மார்க்ஸ்
                                                                இண்டஸ்ட்ரீஸ் (இ) பிரைவேட் லிமிடெட்</span></p>
                                                        <p style="text-align:left;">பணியாளரின் பெயர் /
                                                            கையொப்பம்<span style="float:right;">மேலளார்
                                                                கையொப்பம்</span></p>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpAgreementTamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Agreement
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeeagreemantpathtamil}}"
                                        ng-hide="Employeeagreemantpathtamil == null || Employeeagreemantpathtamil == '' "
                                        ng-show="Employeeagreemantpathtamil != null "
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


                <div class="modal fade" id="ModalCenter1EmpAgreementHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    EMPLOYEE’S CONFIDENTIALITY & NON-DISCLOSURE AGREEMENT
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Agreement
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpAgreementHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpAgreementHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpAgreementHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpAgreementHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpAgreementHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>EMPLOYEE’S CONFIDENTIALITY & NON-DISCLOSURE
                                                                AGREEMENT<br />कर्मचारी की
                                                                गोपनीयता और गैर प्रकटीकरण समझौते</h4>
                                                        </center>


                                                        <p>FOR GOOD CONSIDERATION and in consideration of my
                                                            employment or continued
                                                            employment by Sainmarks Industries India Pvt Ltd (the
                                                            Company”), I, the
                                                            undersigned employee, hereby agree to the terms of this
                                                            agreement (the
                                                            “Agreement”):</p>
                                                        <p>अच्छी सहमति के लिए और सेनमार्क्स इंडस्ट्रीज इंडिया
                                                            प्राइवेट लिमिटेड (कंपनी)
                                                            द्वारा मेरे रोजगार या निरंतर रोजगार पर विचार करते हुए,
                                                            मैं, हस्ताक्षर किया हुआ
                                                            कर्मचारी, इस समझौता ("एग्रीमेंट") की शर्तों से सहमत हैं:
                                                        </p>

                                                        <h3>1. CONFIDENTIAL INFORMATION</h3>
                                                        <p><b><u>a. Company Information :</u></b> - I agree at all
                                                            times during the term of
                                                            my employment and for a period of three years
                                                            thereafter, to hold in strictest
                                                            confidence, and not to use, except for the benefit of
                                                            the Company, or to
                                                            disclose to any person, firm or corporation without
                                                            written authorization of the
                                                            Company, any Confidential Information of the Company. I
                                                            understand that
                                                            “Confidential Information” means any Company proprietary
                                                            information, technical
                                                            data, trade secrets or know-how, including, but not
                                                            limited to, research,
                                                            product plans, products, services, customer lists,
                                                            markets, software,
                                                            developments, inventions, processes, formulas,
                                                            technology, designs, drawings,
                                                            engineering, hardware configuration information,
                                                            marketing, finances or other
                                                            business information disclosed to me by the Company
                                                            either directly or
                                                            indirectly.</p>

                                                        <h3>1. गोपनीय सूचना</h3>
                                                        <p><b><u>i. कंपनी की जानकारी </u></b> - मैं अपने रोजगार की
                                                            अवधि के दौरान और उसके बाद
                                                            तीन साल की अवधि के लिए सहमत हूँ, कंपनी के लाभ के लिए,
                                                            कंपनी के लिखित प्राधिकरण
                                                            के बिना किसी भी व्यक्ति, फर्म या निगम के किसी भी
                                                            व्यक्ति, कंपनी या निगम को प्रकट
                                                            करने के अलावा, सबसे अधिक कठोरतम विश्रंभ, और उपयोग नहीं
                                                            करना। मैं समझता हूँ कि
                                                            "गोपनीय जानकारी" का अर्थ किसी भी कंपनी के सांपातिक वाली
                                                            जानकारी, तकनीकी डेटा,
                                                            व्यापार रहस्य, लेकिन शोध, उत्पाद योजनाओं, उत्पादों,
                                                            सेवाओं, ग्राहक सूचियों,
                                                            बाजारों, सॉफ्टवेयर, विकास, आविष्कारों तक सीमित नहीं है,
                                                            प्रक्रिया, सूत्र,
                                                            प्रौद्योगिकी, डिजाइन, चित्र, इंजीनियरिंग, हार्डवेयर
                                                            कॉन्फ़िगरेशन जानकारी, विपणन,
                                                            वित्त या अन्य व्यावसायिक जानकारी कंपनी द्वारा मेरे लिए
                                                            प्रत्यक्ष या अप्रत्यक्ष
                                                            रूप से बताई गई है। </p>

                                                        <p>1. <b><u>Exceptions</u></b> - The foregoing obligations
                                                            and restrictions do not
                                                            apply to that part of the Confidential Information that
                                                            I can demonstrate:</p>

                                                        <ul type="none">
                                                            <li>i. was available or became generally available to
                                                                the public; or</li>
                                                            <li>ii. was requested or legally compelled (by oral
                                                                questions, interrogatories,
                                                                requests for information or documents, subpoena,
                                                                civil or criminal
                                                                investigative demand or similar process) or is
                                                                required by a regulatory body
                                                                to make any disclosure which is prohibited or
                                                                otherwise constrained by this
                                                                Agreement, provided, that I shall
                                                            </li>
                                                            <li>
                                                                <ul type="none">
                                                                    <li>a. provide the Company with prompt notice of
                                                                        any such request(s) so
                                                                        that the Company may seek an appropriate
                                                                        protective order or other
                                                                        appropriate remedy and </li>
                                                                    <li>b. Provide reasonable assistance to the
                                                                        Company in obtaining any
                                                                        such protective order. If such protective
                                                                        order or other remedy is
                                                                        not obtained or the Company grants a waiver
                                                                        hereunder, then I may
                                                                        furnish that portion (and only that portion)
                                                                        of the Confidential
                                                                        Information which, in the written opinion of
                                                                        counsel reasonably
                                                                        acceptable to the Company, I am legally
                                                                        compelled or am otherwise
                                                                        required to disclose; provided, that I shall
                                                                        use reasonable efforts
                                                                        to obtain reliable assurance that
                                                                        confidentiality be accorded any
                                                                        Confidential Information so disclosed.</li>
                                                                </ul>

                                                            </li>
                                                        </ul>


                                                        <p>
                                                            1. अपवाद - पूर्वगामी दायित्व और प्रतिबंध गोपनीय जानकारी
                                                            के उस हिस्से पर लागू
                                                            नहीं होते हैं जिन्हें मैं प्रदर्शित कर सकता हूं:
                                                        </p>

                                                        <ul type="none">
                                                            <li>i. आम तौर पर जनता के लिए उपलब्ध था</li>
                                                            <li>ii. मैं अनुरोध किया गया था या कानूनी रूप से मजबूर
                                                                किया गया था (मौखिक
                                                                प्रश्नों, पूछताछ, सूचना या दस्तावेजों के लिए अनुरोध,
                                                                उप-नागरिक, या आपराधिक
                                                                जांच की मांग या इसी तरह की प्रक्रिया) या किसी भी
                                                                प्रकटीकरण के लिए एक नियामक
                                                                निकाय द्वारा आवश्यक है जो इस समझौते द्वारा निषिद्ध
                                                                या अन्यथा विवश है,
                                                            </li>
                                                            <li>
                                                                <ul type="none">
                                                                    <li>a. कंपनी को ऐसे किसी भी अनुरोध (नों) की
                                                                        त्वरित सूचना प्रदान करें
                                                                        ताकि कंपनी एक उचित सुरक्षात्मक आदेश या अन्य
                                                                        उचित उपाय और खोज सके
                                                                    </li>
                                                                    <li>b. इस तरह के किसी भी सुरक्षात्मक आदेश को
                                                                        प्राप्त करने में कंपनी को
                                                                        उचित सहायता प्रदान करें। यदि इस तरह के
                                                                        सुरक्षात्मक आदेश या अन्य उपाय
                                                                        प्राप्त नहीं किए जाते हैं या कंपनी एक छूट
                                                                        प्रदान करती है, तो मैं
                                                                        गोपनीय जानकारी के उस हिस्से (और केवल उस
                                                                        हिस्से) को प्रस्तुत कर सकता
                                                                        हूं, जो कंपनी को उचित रूप से स्वीकार्य वकील
                                                                        की लिखित राय में है, मैं
                                                                        हूं। कानूनी रूप से मजबूर या अन्यथा प्रकट
                                                                        करने के लिए आवश्यक है;
                                                                        बशर्ते, मैं विश्वसनीय आश्वासन प्राप्त करने
                                                                        के लिए उचित प्रयासों का
                                                                        उपयोग करूंगा, ताकि गोपनीयता का खुलासा किया
                                                                        गया कोई भी गोपनीय जानकारी
                                                                        प्राप्त हो सके</li>
                                                                </ul>

                                                            </li>
                                                        </ul>

                                                        <p>2. <b><u>Former Employment Information </u></b> - I agree
                                                            during my employment
                                                            with the Company, not to improperly use or disclose any
                                                            proprietary information
                                                            or trade secrets of any former or concurrent employer or
                                                            other person or entity
                                                            and not bring onto the premises of the Company any
                                                            unpublished document or
                                                            proprietary information belonging to any such employer,
                                                            person or entity unless
                                                            consented to in writing by such employer, person or
                                                            entity.</b>
                                                        </p>

                                                        <p>3. <b><u>पूर्व रोजगार सूचना </u></b> - मैं कंपनी के साथ
                                                            अपने रोजगार के दौरान सहमत
                                                            हूं, किसी पूर्व या समवर्ती नियोक्ता या अन्य व्यक्ति या
                                                            इकाई के किसी भी मालिकाना
                                                            जानकारी या व्यापार रहस्यों का अनुचित रूप से उपयोग या
                                                            खुलासा करने के लिए नहीं और
                                                            कंपनी के परिसर में किसी भी अप्रकाशित दस्तावेज़ या
                                                            स्वामित्व को नहीं लाना। ऐसे
                                                            किसी भी नियोक्ता, व्यक्ति या इकाई से संबंधित जानकारी जब
                                                            तक कि ऐसे नियोक्ता,
                                                            व्यक्ति या संस्था द्वारा लिखित रूप में सहमति नहीं दी
                                                            जाती है।</b>
                                                        </p>

                                                        <p>4. <b><u>Third Party Information </u></b> - I recognize
                                                            that the Company has
                                                            received and in the future will receive from third
                                                            parties their confidential or
                                                            proprietary information to use it only for certain
                                                            limited purposes. I agree to
                                                            hold all such confidential or proprietary information in
                                                            the strictest
                                                            confidence and not to disclose it to any person, firm or
                                                            corporation or to use
                                                            it except as necessary in carrying out my work for the
                                                            Company consistent with
                                                            the Company’s agreement with such third party.</b>
                                                        </p>


                                                        <p>5. <b><u>थर्ड पार्टी इंफॉर्मेशन </u></b> - मैं मानता हूं
                                                            कि कंपनी को प्राप्त हुआ
                                                            है और भविष्य में तीसरे पक्षों से प्राप्त होगा उनकी
                                                            गोपनीय या मालिकाना जानकारी
                                                            केवल कुछ सीमित उद्देश्यों के लिए इसका उपयोग करने के लिए।
                                                            मैं इस तरह की सभी
                                                            गोपनीय या मालिकाना जानकारी को कड़े विश्वास में रखने के
                                                            लिए सहमत हूं और किसी भी
                                                            व्यक्ति, फर्म या निगम को इसका खुलासा नहीं करने या कंपनी
                                                            के लिए कंपनी के समझौते
                                                            के अनुरूप मेरे काम को पूरा करने के लिए आवश्यक के अलावा
                                                            इसका उपयोग करने के लिए
                                                            सहमत हूं।</b>
                                                        </p>


                                                        <h3>2. RETURN OF PROPERTY</h3>
                                                        <p>Upon termination of my employment, I will return to the
                                                            Company, retaining no
                                                            copies or notes, all documents relating to the Company’s
                                                            business including, but
                                                            not limited to, reports, abstracts, lists,
                                                            correspondence, information, computer
                                                            files, computer disks, and all other materials and all
                                                            copies of such material,
                                                            obtained by me during my employment with the Company.
                                                        </p>

                                                        <h3>संपत्ति का पुनर्गठन</h3>
                                                        <p>अपने रोजगार को समाप्त करने पर, मैं कंपनी में वापस आऊंगा,
                                                            कोई प्रतियां या नोट नहीं
                                                            रखूंगा, कंपनी के व्यवसाय से संबंधित सभी दस्तावेज, लेकिन
                                                            रिपोर्ट, सार, सूचियों,
                                                            पत्राचार, सूचना, कंप्यूटर फ़ाइलों, कंप्यूटर डिस्क और
                                                            अन्य सभी सामग्री और इस तरह
                                                            की सामग्री की सभी प्रतियां, कंपनी के साथ मेरे रोजगार के
                                                            दौरान मेरे द्वारा
                                                            प्राप्त की गई हैं।</p>

                                                        <h3>3. LEGAL AND EQUITABLE REMEDIES</h3>
                                                        <p>I recognize that the Company may be irreparably damaged
                                                            by any breach of this
                                                            Agreement and that the Company shall be entitled to seek
                                                            an injunction, specific
                                                            performance or other equitable remedy to prevent such
                                                            competition or disclosure,
                                                            and may entitle the Company to other legal remedies,
                                                            including attorney’s fees
                                                            and costs.</p>
                                                        <h3>3. कानूनी और योग्य उपाय</h3>
                                                        <p>मैं मानता हूं कि कंपनी इस समझौते के किसी भी उल्लंघन से
                                                            अपूरणीय रूप से क्षतिग्रस्त
                                                            हो सकती है और कंपनी इस तरह की प्रतियोगिता या प्रकटीकरण
                                                            को रोकने के लिए
                                                            निषेधाज्ञा, विशिष्ट प्रदर्शन या अन्य न्यायसंगत उपाय
                                                            खोजने की हकदार होगी और कंपनी
                                                            को अन्य कानूनी उपायों का अधिकार दे सकती है। वकील की फीस
                                                            और लागत सहित।</p>



                                                        <h3>4. SUCCESORS AND ASSIGNS</h3>
                                                        <p>This Agreement will be binding upon my heirs, executors,
                                                            administrators and other
                                                            legal representatives and will be for the benefit of the
                                                            Company, its
                                                            successors, and its assigns. I may not assign any of my
                                                            rights, or delegate any
                                                            of my obligations, under this Agreement.</p>
                                                        <h3>4. उत्तराधिकारी</h3>
                                                        <p>यह समझौता मेरे उत्तराधिकारियों, निष्पादकों, प्रशासकों और
                                                            अन्य कानूनी प्रतिनिधियों
                                                            के लिए बाध्यकारी होगा और कंपनी, इसके उत्तराधिकारियों और
                                                            इसके कार्य के लाभ के लिए
                                                            होगा। मैं इस समझौते के तहत अपने किसी भी अधिकार को सौंप
                                                            नहीं सकता हूं, या अपने
                                                            किसी भी दायित्व को सौंप सकता हूं।</p>


                                                        <h3>5. CONTINUING OBLIGATIONS</h3>
                                                        <p>The obligations and rights described in this Agreement
                                                            shall survive the
                                                            termination of my employment with the Company.</p>
                                                        <h3>5. संपर्क सामग्री</h3>
                                                        <p>इस समझौते में वर्णित दायित्वों और अधिकारों को कंपनी के
                                                            साथ मेरे रोजगार की समाप्ति
                                                            से बचाना होगा।</p>

                                                        <h3>6. SEVERABILITY</h3>
                                                        <p>Whenever possible, each provision of this Agreement will
                                                            be interpreted in such
                                                            manner as to be effective and valid under applicable
                                                            law, but if any provision
                                                            of this Agreement is held to be invalid, illegal or
                                                            unenforceable in any respect
                                                            under any applicable law or rule in any jurisdiction,
                                                            such invalidity,
                                                            illegality or unenforceability will not affect any other
                                                            provision or any other
                                                            jurisdiction, but this agreement will be reformed,
                                                            construed and enforced in
                                                            such jurisdiction as if such invalid, illegal or
                                                            unenforceable provisions had
                                                            never been contained herein.</p>
                                                        <h3>6. स्थिरता</h3>
                                                        <p>जब भी संभव हो, इस समझौते के प्रत्येक प्रावधान की व्याख्या
                                                            इस प्रकार की जाएगी, जो
                                                            लागू कानून के तहत प्रभावी और मान्य हो, लेकिन यदि इस
                                                            समझौते के किसी भी प्रावधान
                                                            को किसी भी लागू कानून या नियम के तहत किसी भी संबंध में
                                                            अमान्य, अवैध या अप्राप्य
                                                            माना जाता है। किसी भी क्षेत्राधिकार, इस तरह की अमान्यता,
                                                            अवैधता या अनियंत्रितता
                                                            किसी अन्य प्रावधान या किसी अन्य क्षेत्राधिकार को
                                                            प्रभावित नहीं करेगी, लेकिन इस
                                                            समझौते को ऐसे अधिकार क्षेत्र में सुधार, मान लिया जाएगा
                                                            और लागू किया जाएगा जैसे
                                                            कि यह अवैध, अवैध या अप्रवर्तनीय प्रावधान कभी भी यहां
                                                            निहित नहीं थे।</p>



                                                        <h3>7. GOVERNING LAW</h3>
                                                        <p>This Agreement shall be governed by the laws of the state
                                                            of Tamil Nadu without
                                                            regard to its conflicts of law provisions. </p>
                                                        <h3>7. लौटना</h3>
                                                        <p>यह समझौता कानून के प्रावधानों के टकराव के बिना तमिलनाडु
                                                            राज्य के कानूनों द्वारा
                                                            शासित होगा।
                                                            विटनेस में, नीचे दिए गए पक्ष इस समझौते को
                                                            ___________________________ पर
                                                            निष्पादित करते हैं।
                                                            स्वीकार किए जाते हैं और स्वीकार किए जाते हैं </p>


                                                        <p>IN WITNESS WHEREOF, the parties below hereby execute this
                                                            Agreement on
                                                            ____________________.</p>


                                                        <p style="text-align:left;">Accepted and Acknowledged<span
                                                                style="float:right;">Sainmarks Industries India Pvt
                                                                Ltd</span></p>
                                                        <p style="text-align:left;">Employee’s
                                                            name/signature<br />कर्मचारी का नाम /
                                                            हस्ताक्षर हस्ताक्षरकर्ता<span
                                                                style="float:right;">Signatory</span></p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpAgreementHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Agreement
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeeagreemantpathhindi}}"
                                        ng-hide="Employeeagreemantpathhindi == null || Employeeagreemantpathhindi == '' "
                                        ng-show="Employeeagreemantpathhindi != null "
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


                <div class="modal fade" id="ModalCenter1EmpTrainingTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    தொழிலாளர்களின் பயிற்சி குறித்த விபரம்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Training
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpTrainingTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpTrainingTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpTrainingTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpTrainingTamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpTrainigTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>தொழிலாளர்களின் பயிற்சி குறித்த விபரம்</h4>
                                                        </center>



                                                        <p>பெயர் : {{Title}} {{Firstname}} {{Lastname}}</p>
                                                        <p>தொழிலாளர் எண் : {{Employeeid}}</p>
                                                        <p>பிரிவு : {{EmpDepartment}}</p>
                                                        <p>பணியில் சேர்ந்த நாள் : {{Date_Of_Joing2}} </p>


                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>S.No / வ.எண்</td>

                                                                    <td>PPE பயன்பாடு / விழிப்புணர்வு</td>

                                                                    <td>பயிற்சி வகை & தேதி</td>

                                                                    <td>பயிற்சி அளித்தவர் விபரம்</td>

                                                                    <td>பயிற்சி பெற்றவர் கையொப்பம்</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>நிர்வாக கொள்கை, வேலை நேரம், பணியமர்த்தும்
                                                                        கோட்பாடுகள் குறித்த விளக்க
                                                                        பயிற்சி</td>
                                                                    <td>
                                                                        In House Training on
                                                                        ______________
                                                                    </td>
                                                                    <td>(HR -Dept)
                                                                        ______________
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>கொடுப்பனர்களின் கொள்கை மற்றும் கோட்பாடுகள்
                                                                        பற்றிய விளக்க பயிற்சி
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="4">3

                                                                    </td>
                                                                    <td>பாதுகாப்பு விழிப்புணர்வு பயிற்சி<br />a.
                                                                        முதலுதவி பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>b. அவசரகாலத்தில் வெளியேறும் பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>c. தீயனைப்பான்கள் இயக்கப் பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>d. அவசர காலத்தில் தொடர்பு கொள்ள வேண்டிய
                                                                        எண்கள்</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>தனிநபர் பாதுகாப்பு சாதனங்கள் உபயோகிக்க
                                                                        பயிற்சி மற்றும் விழிப்புணர்வு
                                                                        குறித்த பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>பொது சுகாதாரம் மற்றும் சுற்றுப்புற தூய்மை
                                                                        குறித்த பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpTrainingTamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Training
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeetrainingpathtamil}}"
                                        ng-hide="Employeetrainingpathtamil == null || Employeetrainingpathtamil == '' "
                                        ng-show="Employeetrainingpathtamil != null "
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


                <div class="modal fade" id="ModalCenter1EmpTrainingHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employees Training Details
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Training
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpTrainingHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpTrainingHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpTrainingHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpTrainingHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpTrainigHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>Employees Training Details / श्रमिकों के प्रशिक्षण
                                                                का विवरण</h4>
                                                        </center>



                                                        <p>NAME OF EMPLOYEE / कामगार का नाम :
                                                            {{Title}}{{Firstname}}{{Lastname}} </p>
                                                        <p>EMPLOYEE NO / श्रम संख्या : {{Employeeid}} </p>
                                                        <p>DEPARTMENT / अनुभाग : {{EmpDepartment}} </p>
                                                        <p>DATE OF JOINING / काम पर दिन : {{Date_Of_Joing2}}</p>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>


                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>S.No / नहीं</td>

                                                                    <td>Training Details
                                                                        प्रशिक्षण का विवरण
                                                                    </td>

                                                                    <td>Training Type(Internal/ External) & Date
                                                                        प्रशिक्षण प्रकार & दिनांक
                                                                    </td>

                                                                    <td>Trainer Details
                                                                        प्रशिक्षु प्रोफ़ाइल
                                                                    </td>

                                                                    <td>Trainee Signature
                                                                        प्रशिक्षु हस्ताक्षर
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Training - for Company Policies, Working
                                                                        Hours, Terms & Conditions
                                                                        of appointment प्रशासनिक नीति, समय और
                                                                        प्लेसमेंट सिद्धांतों पर
                                                                        प्रशिक्षण</td>
                                                                    <td>
                                                                        In House Training on
                                                                        ______________
                                                                    </td>
                                                                    <td>(HR -Dept)
                                                                        ______________
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Awareness on Buyer's Code of conduct and
                                                                        Ethics. भुगतान की नीति और
                                                                        सिद्धांतों की व्याख्या करने के लिए प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="4">3

                                                                    </td>
                                                                    <td>Safety Awareness<br />
                                                                        सुरक्षा जागरूकता प्रशिक्षण
                                                                        a. First Aid Training/
                                                                        प्राथमिक चिकित्सा प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>b. Emergency Evacuation Drill / आपातकाल में
                                                                        प्रशिक्षण से बाहर निकलें
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>c. Fire Extinguisher Operation Training /
                                                                        अग्निशामकों का प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>d. Use of Emergency Contact Numbers / आपात
                                                                        स्थिति के दौरान संपर्क
                                                                        किए जाने वाले नंबर</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>PPE Usage / Awareness
                                                                        व्यक्तिगत सुरक्षात्मक उपकरणों पर प्रशिक्षण
                                                                        और जागरूकता प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Training on general Health &
                                                                        House Keeping
                                                                        सार्वजनिक स्वास्थ्य और पर्यावरण स्वच्छता पर
                                                                        प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpTrainingHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Training
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeetrainingpathhindi}}"
                                        ng-hide="Employeetrainingpathhindi == null || Employeetrainingpathhindi == '' "
                                        ng-show="Employeetrainingpathhindi != null "
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

                <div class="modal fade" id="ModalCenter1EmpServiceTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    வேலை / சிறப்பு அம்சம் குறித்த பதிவு
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Service Improvement Record
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpServiceTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpServiceTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpServiceTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpServiceTamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportEmpServiceTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>வேலை / சிறப்பு அம்சம் குறித்த பதிவு</h4>
                                                        </center>



                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <p>பெயர் : {{Title}}{{Firstname}}{{Lastname}}</p>
                                                        <p>தொழிலாளர் எண் : {{Employeeid}}</p>
                                                        <p>பணியில் சேர்ந்த நாள் : {{Date_Of_Joing2}}</p>
                                                        <p>பிரிவு : {{EmpDepartment}}</p>
                                                        <p>பதவி : {{EmpDesignation}}</p>
                                                        <p>சம்பளம் : {{Net_Salary|currency:''}}</p>




                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>SL.NO / வ.எண். </td>
                                                                    <td>DESCRIPTION / சிறப்பு அம்சம்</td>
                                                                    <td>INCREMENT / சம்பள உயர்வு</td>
                                                                    <td>DATE / நாள் </td>
                                                                    <td>AUTHORIZED BY / நிர்வாகி</td>
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p style="text-align:left;"><span
                                                                style="float:right;">Authorized Signature</span>
                                                        </p>
                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpServiceTamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Service Improvement Record
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Serviceimprovementpathrecordtamil}}"
                                        ng-hide="Serviceimprovementpathrecordtamil == null || Serviceimprovementpathrecordtamil == '' "
                                        ng-show="Serviceimprovementpathrecordtamil != null "
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

                <div class="modal fade" id="ModalCenter1EmpServiceHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Service Improvement Record / काम/विशेष सुविधा के लिए साइन
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Service Improvement Record
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpServiceHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpServiceHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpServiceHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpServiceHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportEmpServiceHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>Service Improvement Record / काम/विशेष सुविधा के लिए
                                                                साइन</h4>
                                                        </center>


                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                            width: 100%;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>


                                                        <p>NAME / नाम: {{Title}} {{Firstname}} {{Lastname}}</p>
                                                        <p>EMPLOYEE NO / श्रम संख्या: {{Employeeid}}</p>
                                                        <p>DATE OF JOINING / काम पर दिन: {{Date_Of_Joing2}} </p>
                                                        <p>DEPARTMENT / अनुभाग: {{EmpDepartment}}</p>
                                                        <p>DESIGNATION / संवर्धन: {{EmpDesignation}}</p>
                                                        <p>WAGES / वेतन: {{Net_Salary|currency:''}}</p>



                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>SL.NO <br /> नहीं.
                                                                    </td>
                                                                    <td>DESCRIPTION<br />
                                                                        विशेष सुविधा
                                                                    </td>
                                                                    <td>INCREMENT<br />
                                                                        वेतन वृद्धि
                                                                    </td>
                                                                    <td>DATE<br />
                                                                        दिन
                                                                    </td>
                                                                    <td>AUTHORIZED BY<br />
                                                                        व्यवस्थापक
                                                                    </td>
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p style="text-align:left;"><span
                                                                style="float:right;">Authorized Signature</span>
                                                        </p>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpServiceHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Service Improvement Record
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Serviceimprovementpathrecordlhindi}}"
                                        ng-hide="Serviceimprovementpathrecordlhindi == null || Serviceimprovementpathrecordlhindi == '' "
                                        ng-show="Serviceimprovementpathrecordlhindi != null "
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


                <div class="modal fade" id="ModalCenter1EmpForm2RevisedTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    படிவம்-2(திருத்தியது)
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Form-2 Revised
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpForm2RevisedTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpForm2RevisedTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpForm2RevisedTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpForm2RevisedTamil" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportEmpForm2RevisedTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <center>
                                                            <h2>FORM-2(REVISED)/படிவம்-2(திருத்தியது)</h2>
                                                        </center>

                                                        <p>N0MINATION AND DECLARATION FORM/நியமனம் மற்றும்
                                                            உறுதிமொழிப்படிவம்</p>
                                                        <p>FOR UNEXEMPTED/EXEMPTED ESTABLISHMENTS/( விதிவிலக்கு
                                                            பெறாத/பெற்ற நிறுவனங்களுக்கு)</p>
                                                        <p>Declaration and Nomination Form Under the Employees'
                                                            Provident Funds & Employees'
                                                            Pension Scheme/
                                                            (நியமனம் மற்றும் உறுதிமொழி)</p>
                                                        <p>(Paragraph 33 & 61(1) of the Employees' Provident Fund
                                                            Scheme , 1952 & Paragraph 18
                                                            of the Employees' Pension Scheme,1995)/(தொழிலாளர்
                                                            வருங்கால வைப்பு நிதித் திட்டம்
                                                            1952 பாரா 33 & 61 (1) ன் படியும் தொ.ஒ.திட்ட 1995 பாரா
                                                            18ன் படியும்)</p>

                                                        <table>
                                                            <tr>
                                                                <td>1. Name (in Block Letters)/ பெயர்(தனித் தனி
                                                                    எழுத்துக்களில்) </td>
                                                                <td>: {{Title}}{{Firstname}}{{Lastname}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2. Father's / Husband's Name/(தந்தை/கணவர் பெயர்)
                                                                </td>
                                                                <td>: {{FatherGuardianSpouseName}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3. Date of Birth/(பிறந்த தேதி) </td>
                                                                <td>: {{Dob2}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4. Sex/இனம் </td>
                                                                <td>: {{Gender}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5. Marital Status/(திருமணமானவரா/இல்லையா?) </td>
                                                                <td>: {{Married}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6. Account No/(கணக்கு எண்) </td>
                                                                <td>: {{Bankname}}
                                                                    <br />
                                                                    {{Accountno}}
                                                                    <br />
                                                                    {{IFSCcode}}
                                                                    <br />
                                                                    {{Branch}}
                                                                    <br />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>7. Address/ முகவரி </td>
                                                                <td>:</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Permanent/நிரந்தரம் </td>
                                                                <td>: {{PermanentAddress}}
                                                                    <br>
                                                                    {{PermanentCountry}}
                                                                    <br>
                                                                    {{PermanentState}}
                                                                    <br>
                                                                    {{PermanentCity}}
                                                                    <br>
                                                                    {{PermanentPincode}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Temporary/தற்காலிகம் </td>
                                                                <td>: {{CurrentAddress}}
                                                                    <br>
                                                                    {{CurrentCountry}}
                                                                    <br>
                                                                    {{CurrentState}}
                                                                    <br>
                                                                    {{CurrentCity}}
                                                                    <br>
                                                                    {{CurrentPincode}}
                                                                </td>
                                                            </tr>
                                                        </table>


                                                        <center>
                                                            <h4>PART-A(EPF)/பிரிவு-அ(தொ.வை.நி)</h4>
                                                        </center>


                                                        <p><b>I hereby nominate the person (s)/cancel the nomination
                                                                made by previously and
                                                                nominate the person (s) mentioned below to receive
                                                                the amount standing to my
                                                                credit in the Employees' Provident Fund, in the
                                                                event of my death</b></p>
                                                        <p>என் இறப்புக்கு பின்னால் என் கணக்கில் உள்ள வைப்பு நிதித்
                                                            தொகையைப் பெற்றிடக்
                                                            கீழ்க்காணும் நபர்களை நியமிக்கிறேன்</p>
                                                        Name & Address of the nominee/Nominee’s Nominee's
                                                        relationship with the member Date of
                                                        Birth/ Age Total amount or Share of accumulations in
                                                        Provident Fund to be Paid to each
                                                        nominee If the Nominee is a minor, name and relationship &
                                                        address of the guardian who
                                                        may receive the amount during the minority of nominee</p>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Name & Address of the nominee/Nominee’s</td>
                                                                    <td>Nominee's relationship with the member</td>
                                                                    <td>Date of Birth/ Age</td>
                                                                    <td>Total amount or Share of accumulations in
                                                                        Provident Fund to be Paid to
                                                                        each nominee</td>
                                                                    <td>If the Nominee is a minor, name and
                                                                        relationship & address of the
                                                                        guardian who may receive the amount during
                                                                        the minority of nominee</td>
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <p>1.* Certified that I have no family as defined para 2 (g)
                                                            of the Employees' Provident
                                                            Fund Scheme 1956 and should I acquire a family hereafter
                                                            the above nomination should
                                                            be deemed as cancelled</p>
                                                        <p>2.*Certified that my father /mother is /are dependent
                                                            upon me. /என்னுடைய தந்தை / தாய்
                                                            என்னைச் சார்ந்தே இருக்கிறார்கள் என்றும் சான்று
                                                            அளிக்கிறேன்.</p>

                                                        <br /><br /><br />
                                                        <p>Signature or thumb impression of the subscriber
                                                            /<br />உறுப்பினரின்கையொப்பம்(அ) இடது
                                                            கை பெருவிரல் ரேகை</p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpForm2RevisedTamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM -2 REVISED
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Form2revisedpathtamil}}"
                                        ng-hide="Form2revisedpathtamil == null || Form2revisedpathtamil == '' "
                                        ng-show="Form2revisedpathtamil != null "
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



                <div class="modal fade" id="ModalCenter1EmpForm2RevisedHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM-2(REVISED)/ फॉर्म-2 (संशोधित)
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Form-2 Revised
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpForm2RevisedHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpForm2RevisedHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpForm2RevisedHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpForm2RevisedHindi" class="btn btn-info btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportEmpForm2RevisedHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="../Logo/Sainmarknewlogo.png" width="130"
                                                                    height="50" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>Sainmarks
                                                                        Industries
                                                                        (India) Pvt
                                                                        Ltd</b><br />
                                                                    476/1b/1a, Label
                                                                    Arcade, Jothi
                                                                    Nagar,
                                                                    Palavanjipalayam,<br />
                                                                    Dharapuram Main
                                                                    Road,
                                                                    Tirupur-641 608.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>FORM-2(REVISED)/ फॉर्म-2 (संशोधित)</h4>
                                                        </center>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <p>N0MINATION AND DECLARATION FORM/ नामांकन और घोषणा प्रपत्र
                                                        </p>
                                                        <p>FOR UNEXEMPTED/EXEMPTED ESTABLISHMENTS/( बिना छूट/छूट
                                                            वाले प्रतिष्ठानों के लिए)
                                                        </p>
                                                        <p>Declaration and Nomination Form Under the Employees'
                                                            Provident Funds & Employees'
                                                            Pension Scheme/(नियुक्ति और शपथ)</p>
                                                        <p>(Paragraph 33 & 61(1) of the Employees' Provident Fund
                                                            Scheme , 1952 & Paragraph
                                                            18 of the Employees' Pension Scheme,1995)/( श्रम भविष्य
                                                            निधि योजना 1952 पैरा 33
                                                            और 61 (1) और टीओ </p>


                                                        और टीओ योजना 1995पैरा 18 . के अनुसार)
                                                        <table class="doc-table">
                                                            <tr>
                                                                <td>Name (in Block Letters)/ नाम (बड़े अक्षरों में)
                                                                </td>
                                                                <td>: {{Title}}{{Firstname}}{{Lastname}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Father's / Husband's Name / पिता/पति का नाम</td>
                                                                <td>: {{FatherGuardianSpouseName}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Date of Birth/( जन्म तिथि)</td>
                                                                <td>: {{Dob2}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sex/ लिंग</td>
                                                                <td>: {{Gender}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Marital Status/( वैवाहिक स्थिति)</td>
                                                                <td>: {{Married}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Account No/( खाता संख्या)</td>
                                                                <td>: {{Bankname}}
                                                                    <br />
                                                                    {{Accountno}}
                                                                    <br />
                                                                    {{IFSCcode}}
                                                                    <br />
                                                                    {{Branch}}
                                                                    <br />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address/ पता</td>
                                                                <td>:</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Permanent/ स्थायी</td>
                                                                <td>: {{PermanentAddress}}
                                                                    <br>
                                                                    {{PermanentCountry}}
                                                                    <br>
                                                                    {{PermanentState}}
                                                                    <br>
                                                                    {{PermanentCity}}
                                                                    <br>
                                                                    {{PermanentPincode}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Temporary/ अस्थायी</td>
                                                                <td>: {{CurrentAddress}}
                                                                    <br>
                                                                    {{CurrentCountry}}
                                                                    <br>
                                                                    {{CurrentState}}
                                                                    <br>
                                                                    {{CurrentCity}}
                                                                    <br>
                                                                    {{CurrentPincode}}
                                                                </td>
                                                            </tr>
                                                        </table>


                                                        <center>
                                                            <h4>PART-A(EPF)/ भाग-ए (ईपीएफ)</h4>
                                                        </center>



                                                        <p><b>I hereby nominate the person (s)/cancel the nomination
                                                                made by previously and
                                                                nominate the person (s) mentioned below to receive
                                                                the amount standing to my
                                                                credit in the Employees' Provident Fund, in the
                                                                event of my death</b></p>
                                                        <p>मैं एतद्द्वारा पूर्व में किए गए व्यक्ति
                                                            (व्यक्तियों)/नामांकन को रद्द करता/करती
                                                            हूं और मेरी मृत्यु की स्थिति में कर्मचारी भविष्य निधि
                                                            में मेरे खाते में जमा राशि
                                                            प्राप्त करने के लिए नीचे उल्लिखित व्यक्ति (व्यक्तियों)
                                                            को नामित करता हूं।.
                                                        </p>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Name & Address of the nominee/Nominee’s
                                                                        नामिती/नामितियों का नाम और
                                                                        पता</td>
                                                                    <td>Nominee's relationship with the member
                                                                        नॉमिनी का सदस्य के साथ संबंध
                                                                    </td>
                                                                    <td>Date of Birth/ Age
                                                                        जन्म तिथि / आयु
                                                                    </td>
                                                                    <td>Total amount or Share of accumulations in
                                                                        Provident Fund to be Paid
                                                                        to each nominee
                                                                        प्रत्येक नामांकित व्यक्ति को भुगतान की जाने
                                                                        वाली भविष्य निधि में कुल
                                                                        राशि या संचय का हिस्सा
                                                                    </td>
                                                                    <td>If the Nominee is a minor, name and
                                                                        relationship & address of the
                                                                        guardian who may receive the amount during
                                                                        the minority of naminee
                                                                        यदि नामिती अवयस्क है, तो उस अभिभावक का नाम
                                                                        और संबंध और पता, जिसे
                                                                        नामिनी की अवयस्कता के दौरान राशि प्राप्त हो
                                                                        सकती है
                                                                    </td>
                                                                </tr>
                                                                <tr>
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
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <p>1.* Certified that I have no family as defined para 2 (g)
                                                            of the Employees'
                                                            Provident Fund Scheme 1956 and should I acquire a family
                                                            hereafter the above
                                                            nomination should be deemed as cancelled प्रमाणित किया
                                                            जाता है कि कर्मचारी
                                                            भविष्य निधि योजना 1956 के परिभाषित पैरा 2 (जी) के अनुसार
                                                            मेरा कोई परिवार नहीं है
                                                            और क्या मुझे इसके बाद एक परिवार का अधिग्रहण करना चाहिए,
                                                            उपरोक्त नामांकन को रद्द
                                                            माना जाना चाहिए।</p>
                                                        <p>2.*Certified that my father /mother is /are dependent
                                                            upon me. / प्रमाणित किया
                                                            जाता है कि मेरे पिता/माता मुझ पर आश्रित हैं/हैं</p>
                                                        <p>Strike out whichever is not applicable. जो लागू न हो उसे
                                                            काट दें।.</p>
                                                        <br /><br /><br />
                                                        <p>Signature or thumb impression of the subscriber /बाएं
                                                            अंगूठे के सदस्य (क) अंगूठे
                                                            का निशान के हस्ताक्षर। </p>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalCenterEmpForm2RevisedHindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM -2 REVISED
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Form2revisedpathhindi}}"
                                        ng-hide="Form2revisedpathhindi == null || Form2revisedpathhindi == '' "
                                        ng-show="Form2revisedpathhindi != null "
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