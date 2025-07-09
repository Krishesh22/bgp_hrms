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
    <title>Edit Employee Master</title>
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

                        <div class="row">



                            <div id="myCarousel" class="carousel slide" data-interval="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">


                                        <div class="card">
                                            <h5 class="card-header">Employee Details</h5>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered  table-sm table-striped">
                                                        <thead>
                                                            <tr>

                                                                <th>No</th>
                                                                <th scope="col" style="width: 100px;">
                                                                    Employee_ID</th>
                                                                <th scope="col" style="width: 200px;">Name</th>
                                                                <th scope="col" style="width: 90px;">Gender</th>
                                                                <th scope="col">Department</th>
                                                                <th scope="col">Designation</th>
                                                                <th scope="col">Qualification</th>
                                                                <th scope="col">Contact</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2">


                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            nng-model="searchEmployee.Employeeid"
                                                                            class="form-control">
                                                                    </div>


                                                                </td>
                                                                <td>
                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            ng-model="searchEmployee.Fullname"
                                                                            class="form-control">
                                                                    </div>


                                                                </td>
                                                                <td style="min-width:120px">


                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            nng-model="searchEmployee.Gender"
                                                                            class="form-control">
                                                                    </div>


                                                                </td>
                                                                <td>


                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            nng-model="searchEmployee.Department"
                                                                            class="form-control">
                                                                    </div>



                                                                </td>
                                                                <td>


                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            nng-model="searchEmployee.Designation"
                                                                            class="form-control">
                                                                    </div>



                                                                </td>
                                                                <td>


                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            nng-model="searchEmployee.HighestQualification"
                                                                            class="form-control">
                                                                    </div>




                                                                </td>
                                                                <td colspan="2">


                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            nng-model="searchEmployee.Contactno"
                                                                            class="form-control">
                                                                    </div>



                                                                </td>


                                                                </td>


                                                            </tr>
                                                            <tr dir-paginate="e in GetEmployeeList |filter:searchEmployee|itemsPerPage:10 "
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
                                                                <td>{{e.HighestQualification}}</td>
                                                                <td>{{e.Contactno}}</td>


                                                                <td>
                                                                    <div class="action-btn hover">
                                                                        <img height="15"
                                                                            ng-click="SendEdit(e.Employeeid);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">

                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="float-right mt-2">
                                                    <div class="pagination">
                                                        <dir-pagination-controls pagination-id="Employeegrid"
                                                            max-size="3" direction-links="true" boundary-links="true"
                                                            class="pagination">
                                                        </dir-pagination-controls>

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
                                            <h5 class="card-header">Employee Modification</h5>
                                            <div class="card-body">

                                                <div class="row">

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Employee_ID</label>
                                                            <input type="text" class="form-control"
                                                                ng-model="Employeeid" autocomplete="off" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label> First Name</label>
                                                            <div class="input-group "><span class="input-group-prepend">
                                                                    <select class="input-group-text" ng-model="Title">
                                                                        <option Value="Mr.">Mr.</option>
                                                                        <option value="Mrs.">Mrs.</option>
                                                                        <option value="Miss.">Miss.</option>
                                                                        <option value="Ms.">Ms.</option>
                                                                        <option value="Shri.">Shri.</option>
                                                                    </select></span>
                                                                <input type="text" placeholder="Firstname"
                                                                    class="form-control" ng-model="Firstname">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Last Name </label>
                                                            <input type="text" class="form-control" ng-model="Lastname"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Gender</label>
                                                            <select class="form-control" ng-model="Gender">
                                                                <option Value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Category</label>
                                                            <select class="form-control" ng-model="Category">
                                                                <option Value="Admin & Staff">Admin & Staff
                                                                </option>
                                                                <option value="Marketing">Marketing</option>
                                                                <option value="Workers">Workers</option>

                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Married</label>
                                                            <select class="form-control" ng-model="Married">
                                                                <option Value="Yes">Yes</option>
                                                                <option value="No">No</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Mother Tongue</label>
                                                            <select ng-model="Mothertongue" class="form-control">

                                                                <option ng-repeat="s in GetLanguageList "
                                                                    value="{{s.Languages}}">
                                                                    {{s.Languages}}</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Contact No</label>
                                                            <input type="text" class="form-control" ng-model="Contactno"
                                                                autocomplete="off" onkeypress="return Validate(event);">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Nationality</label>
                                                            <input type="text" class="form-control"
                                                                ng-model="Nationality" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Email-ID </label>
                                                            <input type="text" class="form-control" ng-model="Emailid"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="btn-row text-right">
                                                    <button class="btn btn-rounded btn-success"
                                                        ng-click="Update_Major();">Update</button>

                                                    <button class="btn btn-rounded btn-danger" data-target="#myCarousel"
                                                        data-slide-to="0" ng-click="Getallvalues()">Back</button>
                                                </div>

                                                <hr />
                                                <div class="data-tabs">
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#Basic"
                                                                role="tab">Basic</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Eduction"
                                                                role="tab">Eduction</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Bank_Account"
                                                                role="tab">Bank Account</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Family_Info"
                                                                role="tab">Family Info</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Reference"
                                                                role="tab">Reference</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Salary"
                                                                role="tab">Salary</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Doc_info"
                                                                role="tab">Doc_info</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Image"
                                                                role="tab">Image</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Appraisal"
                                                                role="tab">Appraisal</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Promotion"
                                                                role="tab">Promotion</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Vaccination"
                                                                role="tab">Vaccination</a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="Basic">
                                                            <div class="card">
                                                                <h5 class="card-header">Other Information</h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-2 ">
                                                                            <table>
                                                                                <tr>
                                                                                    <td>Languages</td>
                                                                                </tr>
                                                                                <tr>

                                                                                    <td>
                                                                                        <li ng-repeat="p in GetLanguageList"
                                                                                            style=" list-style-type: none;">
                                                                                            <input type="checkbox"
                                                                                                ng-model="selected[p.Languages]"
                                                                                                value="{{p.Languages}}" />
                                                                                            <span>{{p.Languages}}</span>
                                                                                        </li>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder  col-lg-10 nopadding">
                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label class="col-form-label"
                                                                                            title="Date Of Birth">DOB</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Dob"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')"
                                                                                            ng-change="Getage();">
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Age</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Age"
                                                                                            autocomplete="off" readonly>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Blood_Group
                                                                                        </label></td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Bloodgroup"
                                                                                            autocomplete="off">
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Expereience</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Expereience"
                                                                                            autocomplete="off">
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Fresher</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select class="form-control"
                                                                                            ng-model="Fresher">
                                                                                            <option Value="Yes">Yes
                                                                                            </option>
                                                                                            <option value="No">No
                                                                                            </option>


                                                                                        </select>


                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Religion</label>
                                                                                    </td>
                                                                                    <td> <select ng-model="Religion"
                                                                                            class="form-control">

                                                                                            <option
                                                                                                ng-repeat="s in GetReligionList "
                                                                                                value="{{s.Religion}}">
                                                                                                {{s.Religion}}</option>
                                                                                        </select></td>



                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Shift</label>
                                                                                    </td>
                                                                                    <td><select ng-model="Shift"
                                                                                            class="form-control">

                                                                                            <option
                                                                                                ng-repeat="s in GetShiftList "
                                                                                                value="{{s.Shift}}">
                                                                                                {{s.Shift}}</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Allow_OT</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select class="form-control"
                                                                                            ng-model="AllowOT">
                                                                                            <option Value="Yes">Yes
                                                                                            </option>
                                                                                            <option value="No">No
                                                                                            </option>


                                                                                        </select>


                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Allow_LOP</label>
                                                                                    </td>
                                                                                    <td> <select class="form-control"
                                                                                            ng-model="AllowLOP">
                                                                                            <option Value="Yes">Yes
                                                                                            </option>
                                                                                            <option value="No">No
                                                                                            </option>


                                                                                        </select>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>

                                                                                    <td> <label
                                                                                            class="col-form-label">Salary_Mode</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select class="form-control"
                                                                                            ng-model="Salary_Mode">
                                                                                            <option Value="Bank">Bank
                                                                                            </option>
                                                                                            <option value="Cash">Cash
                                                                                            </option>


                                                                                        </select>


                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Week_Off</label>
                                                                                    </td>
                                                                                    <td> <select class="form-control"
                                                                                            ng-model="Weekoff">
                                                                                            <option Value="Sunday">
                                                                                                Sunday</option>
                                                                                            <option value="Monday">
                                                                                                Monday</option>
                                                                                            <option Value="Tuesday">
                                                                                                Tuesday</option>
                                                                                            <option value="Wednesday">
                                                                                                Wednesday</option>
                                                                                            <option Value="Thursday">
                                                                                                Thursday</option>
                                                                                            <option value="Friday">
                                                                                                Friday</option>
                                                                                            <option Value="Saturday">
                                                                                                Saturday</option>



                                                                                        </select>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Employee_CL</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Employee_CL"
                                                                                            autocomplete="off">
                                                                                </tr>
                                                                                <tr>

                                                                                    <td> <label
                                                                                            class="col-form-label">UAN
                                                                                            No</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control"
                                                                                            autocomplete="off"
                                                                                            ng-model="UANno"
                                                                                            onkeypress="return Validate(event);" />


                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">ESI
                                                                                            No</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            autocomplete="off"
                                                                                            ng-model="ESIno" />
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Aadhar
                                                                                            No</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Aadharno"
                                                                                            autocomplete="off"
                                                                                            onkeypress="return Validate(event);">
                                                                                </tr>

                                                                                <tr>

                                                                                    <td> <label
                                                                                            class="col-form-label">Panno</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control"
                                                                                            autocomplete="off"
                                                                                            ng-model="Panno" />


                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">PF
                                                                                            Joining Date</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="PFJoiningdate"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')">
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">ESI
                                                                                            Joining Date</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="ESIJoiningdate"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')">
                                                                                </tr>
                                                                            </table>


                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_Other_info();">Update</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Eduction">
                                                            <div class="card">
                                                                <h5 class="card-header">Employee Education Details</h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-4">

                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">S.No</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="EduNextno"
                                                                                            id="EduNextno" readonly />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Studied</label>
                                                                                    </td>
                                                                                    <td> <select
                                                                                            ng-model="Employeestudied"
                                                                                            class="form-control"
                                                                                            id="Employeestudied">
                                                                                            <option
                                                                                                ng-repeat="s in GetQualififcationList"
                                                                                                value="{{s.Degree}}">
                                                                                                {{s.Degree}}</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">University/School</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="UniversityorSchool"
                                                                                            id="UniversityorSchool"
                                                                                            autocomplete="off" />
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Grade
                                                                                            /
                                                                                            %</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="GradeorPercentage"
                                                                                            id="GradeorPercentage" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Passout-Year</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Passoutyear"
                                                                                            id="Passoutyear" /></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Select_file</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <input type="file"
                                                                                                class="form-control"
                                                                                                ng-model="clearinput"
                                                                                                id="fileInput04"
                                                                                                name=files[]
                                                                                                accept="image/png, image/gif, image/jpeg,application/pdf">
                                                                                            <div
                                                                                                class="input-group-append">
                                                                                                <p id="fileButton04"
                                                                                                    class="input-group-text">
                                                                                                    <i
                                                                                                        class="fa fa-upload"></i>
                                                                                                </p>
                                                                                            </div>


                                                                                        </div>




                                                                                    </td>
                                                                                </tr>

                                                                            </table>

                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <div class="table-responsive">
                                                                                <table
                                                                                    class="table table-bordered  table-sm table-striped">
                                                                                    <thead>
                                                                                        <tr>

                                                                                            <th>No</th>
                                                                                            <th scope="col">Studies</th>
                                                                                            <th scope="col">University
                                                                                            </th>
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
                                                                                            <td>{{e.Universityorschool}}
                                                                                            </td>
                                                                                            <td>{{e.Grade}}</td>
                                                                                            <td>{{e.Passoutyear}}</td>




                                                                                            <td>
                                                                                                <div class="action-btn">
                                                                                                    <img height="15"
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#ModalCenter1Education"
                                                                                                        ng-click="FetchStudy(e.Employeeid,e.Sno);"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                                                    <img height="15"
                                                                                                        ng-click="FetchStudy(e.Employeeid,e.Sno);"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">

                                                                                                    <img height="15"
                                                                                                        data-toggle="modal"
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
                                                                                <dir-pagination-controls
                                                                                    pagination-id="Educationgrid"
                                                                                    max-size="3" direction-links="true"
                                                                                    boundary-links="true"
                                                                                    class="pagination">
                                                                                </dir-pagination-controls>


                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_Education();">Update</button>
                                                                    <button class="btn btn-rounded btn-info"
                                                                        ng-click="ResetEducation();">Clear(Next)</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Bank_Account">
                                                            <div class="card">
                                                                <h5 class="card-header">Bank Account Details</h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-5">

                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Bankname</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Bankname"
                                                                                            autocomplete="off"
                                                                                            id="Bankname" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Accountno</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Accountno"
                                                                                            autocomplete="off"
                                                                                            id="Accountno" />
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">IFSCcode</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="IFSCcode"
                                                                                            autocomplete="off"
                                                                                            id="IFSCcode" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Branch</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Branch"
                                                                                            autocomplete="off"
                                                                                            id="Branch" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Select_file</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <input type="file"
                                                                                                class="form-control"
                                                                                                ng-model="clearinput"
                                                                                                id="fileInput03"
                                                                                                name=files[]
                                                                                                accept="image/png, image/gif, image/jpeg,application/pdf">
                                                                                            <div
                                                                                                class="input-group-append">
                                                                                                <p id="fileButton03"
                                                                                                    class="input-group-text">
                                                                                                    <i
                                                                                                        class="fa fa-upload"></i>
                                                                                                </p>
                                                                                            </div>


                                                                                        </div>




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
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="UpdateBank();">Update</button>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="Family_Info">
                                                            <div class="card">
                                                                <h5 class="card-header">Employee Family Details</h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-4">

                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Name</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="FamilyName" />
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Relationship</label>
                                                                                    </td>
                                                                                    <td> <select
                                                                                            ng-model="Familyrelationship"
                                                                                            class="form-control">

                                                                                            <option
                                                                                                ng-repeat="s in GetRelationshipList "
                                                                                                value="{{s.Relationship}}">
                                                                                                {{s.Relationship}}
                                                                                            </option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Age</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="FamilyAge" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Contact
                                                                                            No</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="FamilyContactno"
                                                                                            onkeypress="return Validate(event);" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Occupation</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="FamilyOccupation" />
                                                                                    </td>
                                                                                </tr>

                                                                            </table>

                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <div class="table-responsive">
                                                                                <table
                                                                                    class="table table-bordered  table-sm table-striped">
                                                                                    <thead>
                                                                                        <tr>

                                                                                            <th>No</th>
                                                                                            <th scope="col">Name</th>
                                                                                            <th scope="col">Relationship
                                                                                            </th>
                                                                                            <th scope="col">Age</th>
                                                                                            <th scope="col">Contactno
                                                                                            </th>
                                                                                            <th scope="col">Occupation
                                                                                            </th>


                                                                                            <th scope="col">Action</th>
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



                                                                                            <td>
                                                                                                <div class="action-btn">
                                                                                                    <img height="15"
                                                                                                        data-toggle="modal"
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
                                                                                <dir-pagination-controls
                                                                                    pagination-id="Familygrid"
                                                                                    max-size="3" direction-links="true"
                                                                                    boundary-links="true"
                                                                                    class="pagination">
                                                                                </dir-pagination-controls>


                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_Family();">Update</button>
                                                                    <button class="btn btn-rounded btn-info"
                                                                        ng-click="ResetFamily();">Clear(Next)</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Reference">
                                                            <div class="card">
                                                                <h5 class="card-header">Reference Details</h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                                            <h3>Reference 1 Detail</h3>
                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Reference_Name</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Reference1name" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Contactno</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Reference1contactno"
                                                                                            onkeypress="return Validate(event);" />
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Address</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Reference1address" />
                                                                                    </td>
                                                                                </tr>

                                                                            </table>

                                                                        </div>
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                                            <h3>Reference 2 Detail</h3>
                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Reference_Name</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Reference2name" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Contactno</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Reference2contactno"
                                                                                            onkeypress="return Validate(event);" />
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Address</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Reference2address" />
                                                                                    </td>
                                                                                </tr>

                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_refrence();">Update</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Salary">
                                                            <div class="card">
                                                                <h5 class="card-header">Salary Information</h5>
                                                                <div class="card-body">
                                                                    <div
                                                                        class="table-responsive custom-table custom-table-noborder">
                                                                        <table class="table table-bordered table-sm">
                                                                            <tr>
                                                                                <td> <label
                                                                                        class="col-form-label">Basic+Da</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Basic"
                                                                                        autocomplete="off"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()"
                                                                                        onkeypress="return Validate(event);">
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">HR_Allowance</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="HR_Allowance"
                                                                                        autocomplete="off"
                                                                                        onkeypress="return Validate(event);"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()">
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">Travel
                                                                                        Allowance
                                                                                    </label></td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="TA" autocomplete="off"
                                                                                        onkeypress="return Validate(event);"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td> <label
                                                                                        class="col-form-label">Performance_allowance</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Performance_allowance"
                                                                                        autocomplete="off"
                                                                                        onkeypress="return Validate(event);"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()">
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">Day_allowance</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Day_allowance"
                                                                                        autocomplete="off"
                                                                                        onkeypress="return Validate(event);"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()">
                                                                                </td>
                                                                                <td> <label class="col-form-label">PF
                                                                                    </label></td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="PF" autocomplete="off"
                                                                                        readonly>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td> <label
                                                                                        class="col-form-label">ESI</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="ESI"
                                                                                        autocomplete="off" readonly>
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">TDS</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="TDS"
                                                                                        autocomplete="off">
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">Professional_tax
                                                                                    </label></td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Professional_tax"
                                                                                        autocomplete="off"
                                                                                        onkeypress="return Validate(event);">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td> <label
                                                                                        class="col-form-label">Net_Salary</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Net_Salary"
                                                                                        autocomplete="off" readonly>
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">Gross_Salary</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Gross_Salary"
                                                                                        autocomplete="off" readonly>
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">Other_Allowance
                                                                                    </label></td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Other_Allowance"
                                                                                        autocomplete="off"
                                                                                        onkeypress="return Validate(event);">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td> <label
                                                                                        class="col-form-label">PF_Yesandno</label>
                                                                                </td>
                                                                                <td>
                                                                                    <select class="form-control"
                                                                                        ng-model="PF_Yesandno"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()">
                                                                                        <option Value="Yes">Yes</option>
                                                                                        <option value="No">No</option>


                                                                                    </select>


                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">ESI_Yesandno</label>
                                                                                </td>
                                                                                <td>
                                                                                    <select class="form-control"
                                                                                        ng-model="ESI_Yesandno"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()">
                                                                                        <option Value="Yes">Yes</option>
                                                                                        <option value="No">No</option>


                                                                                    </select>


                                                                                </td>


                                                                            </tr>

                                                                        </table>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_Salary();">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="Doc_info">
                                                            <div class="card">
                                                                <h5 class="card-header">Employee Document Details</h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-5">

                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">S.No</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control"
                                                                                            ng-model="DocNextno"
                                                                                            autocomplete="off"
                                                                                            id='DocNextno' readonly />

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Document_Type</label>
                                                                                    </td>
                                                                                    <td>

                                                                                        <select ng-model="Documenttype"
                                                                                            id='Documenttype'
                                                                                            class="form-control">

                                                                                            <option
                                                                                                ng-repeat="s in GetDoctypeList "
                                                                                                value="{{s.Documenttype}}">
                                                                                                {{s.Documenttype}}
                                                                                            </option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Documentno</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Documentno"
                                                                                            autocomplete="off"
                                                                                            id='Documentno' />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Select_file</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <input type="file"
                                                                                                class="form-control"
                                                                                                ng-model="clearinput"
                                                                                                id="fileInput"
                                                                                                name=files[]>
                                                                                            <div
                                                                                                class="input-group-append">
                                                                                                <p id="fileButton"
                                                                                                    class="input-group-text">
                                                                                                    <i
                                                                                                        class="fa fa-upload"></i>
                                                                                                </p>
                                                                                            </div>


                                                                                        </div>




                                                                                    </td>
                                                                                </tr>


                                                                            </table>

                                                                        </div>
                                                                        <div class="col-lg-7">
                                                                            <div class="table-responsive">
                                                                                <table
                                                                                    class="table table-bordered  table-sm table-striped">
                                                                                    <thead>
                                                                                        <tr>

                                                                                            <th>No</th>
                                                                                            <th scope="col">Doctype</th>
                                                                                            <th scope="col">Document_No
                                                                                            </th>
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
                                                                                                    <img height="15"
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#ModalCenter1Doc"
                                                                                                        ng-click="FetchDOC(e.Employeeid,e.Sno);"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                                                    <img height="15"
                                                                                                        ng-click="FetchDOC(e.Employeeid,e.Sno);"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">


                                                                                                    <img height="15"
                                                                                                        data-toggle="modal"
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
                                                                                <dir-pagination-controls
                                                                                    pagination-id="Docgrid" max-size="3"
                                                                                    direction-links="true"
                                                                                    boundary-links="true"
                                                                                    class="pagination">
                                                                                </dir-pagination-controls>


                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_document();">Update</button>
                                                                    <button class="btn btn-rounded btn-info"
                                                                        ng-click="Resetdoc();">Clear(Next)</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Image">
                                                            <div class="card">
                                                                <h5 class="card-header">Employee Image Upload</h5>
                                                                <div class="card-body">
                                                                    <div class="row">

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-2">
                                                                            <img ng-src="{{Imagepath}}"
                                                                                ng-hide="Imagepath == null || Imagepath == '' "
                                                                                ng-show="Imagepath != null "
                                                                                class="img-thumbnail mr-3"
                                                                                alt="Employee_image"
                                                                                style="width:150px;height:150px;">
                                                                        </div>
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-7">
                                                                            <br>
                                                                            <br>

                                                                            <table
                                                                                class="table table-bordered table-sm">



                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Image_Upload</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <input type="file"
                                                                                                class="form-control"
                                                                                                ng-model="clearinput01"
                                                                                                id="fileInput01"
                                                                                                accept="image/*"
                                                                                                name=files[]
                                                                                                ng-model="Empimage">
                                                                                            <div
                                                                                                class="input-group-append">
                                                                                                <p id="fileButton01"
                                                                                                    class="input-group-text">
                                                                                                    <i
                                                                                                        class="fa fa-upload"></i>
                                                                                                </p>
                                                                                            </div>


                                                                                        </div>




                                                                                    </td>

                                                                                </tr>


                                                                            </table>

                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Appraisal">
                                                            <div class="card">
                                                                <h5 class="card-header">Appraisal Details</h5>
                                                                <div class="card-body">



                                                                    <div class="table-responsive">
                                                                        <table
                                                                            class="table table-bordered  table-sm table-striped">
                                                                            <thead>
                                                                                <tr>

                                                                                    <th>No</th>
                                                                                    <th scope="col">Basic</th>
                                                                                    <th scope="col">HR_Allowance</th>
                                                                                    <th scope="col">TA</th>
                                                                                    <th scope="col">
                                                                                        Performance_allowance</th>
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
                                                                        <dir-pagination-controls
                                                                            pagination-id="Apperesialgrid" max-size="3"
                                                                            direction-links="true" boundary-links="true"
                                                                            class="pagination">
                                                                        </dir-pagination-controls>


                                                                    </div>



                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="Promotion">
                                                            <div class="card">
                                                                <h5 class="card-header">Department / Designation Details
                                                                </h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-4">

                                                                            <table
                                                                                class="table table-bordered table-sm">

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">S.no</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="PromotionNextno"
                                                                                            autocomplete="off"
                                                                                            readonly />
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Department</label>
                                                                                    </td>
                                                                                    <td> <select ng-model="Department"
                                                                                            class="form-control">

                                                                                            <option
                                                                                                ng-repeat="s in GetDepartmentList "
                                                                                                value="{{s.Department}}">
                                                                                                {{s.Department}}
                                                                                            </option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Designation</label>
                                                                                    </td>
                                                                                    <td> <select ng-model="Designation"
                                                                                            class="form-control">

                                                                                            <option
                                                                                                ng-repeat="s in GetDesignationList "
                                                                                                value="{{s.Designation}}">
                                                                                                {{s.Designation}}
                                                                                            </option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label class="col-form-label"
                                                                                            title="From_Date">From</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Fromperiod"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')"
                                                                                            ng-change="GetDeptDays();">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label class="col-form-label"
                                                                                            title="To_Date">To</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Toperiod"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')"
                                                                                            ng-change="GetDeptDays();">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Period</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Period"
                                                                                            autocomplete="off"
                                                                                            readonly />
                                                                                    </td>
                                                                                </tr>
                                                                                <!-- <tr>
                                                                <td> <label class="col-form-label">Years</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Postingyear"
                                                                        autocomplete="off" readonly/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Month</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Postingmonth"
                                                                        autocomplete="off" readonly/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Days</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Postingdays"
                                                                        autocomplete="off" readonly/>
                                                                </td>
                                                            </tr> -->
                                                                            </table>

                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <div class="table-responsive">
                                                                                <table
                                                                                    class="table table-bordered  table-sm table-striped">
                                                                                    <thead>
                                                                                        <tr>

                                                                                            <th>No</th>
                                                                                            <th scope="col">Department
                                                                                            </th>
                                                                                            <th scope="col">Designation
                                                                                            </th>

                                                                                            <th scope="col">Period</th>

                                                                                            <th scope="col">Action</th>
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


                                                                                            <td>
                                                                                                <div class="action-btn">
                                                                                                    <img height="15"
                                                                                                        ng-click="FetchPromotion(e.Employeeid,e.Sno);"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                                                                </div>
                                                                                            </td>

                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="pagination">
                                                                                <dir-pagination-controls
                                                                                    pagination-id="Deptgrid"
                                                                                    max-size="3" direction-links="true"
                                                                                    boundary-links="true"
                                                                                    class="pagination">
                                                                                </dir-pagination-controls>


                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_DEPT();">Update</button>
                                                                    <button class="btn btn-rounded btn-info"
                                                                        ng-click="ResetPromotion();">Clear(Next)</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Vaccination">11</div>
                                                    </div>
                                                </div>



                                                <br /><br />
                                                <br />



                                                <div class="table-responsive custom-table custom-table-noborder">

                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <button class="btn btn-brand active"
                                                                    ng-click="fnotherinfo();">Basic</button>
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
                                                            <td>
                                                                <button class="btn btn-brand active"
                                                                    ng-click="fnotherinfo();">Vaccination</button>
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
                                                <div class="row">
                                                    <div class="col-lg-2 ">
                                                        <table>
                                                            <tr>
                                                                <td>Languages</td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    <li ng-repeat="p in GetLanguageList"
                                                                        style=" list-style-type: none;">
                                                                        <input type="checkbox"
                                                                            ng-model="selected[p.Languages]"
                                                                            value="{{p.Languages}}" />
                                                                        <span>{{p.Languages}}</span>
                                                                    </li>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder  col-lg-10 nopadding">
                                                        <table class="table table-bordered table-sm">
                                                            <tr>
                                                                <td> <label class="col-form-label"
                                                                        title="Date Of Birth">DOB</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Dob" onfocus="(this.type='date')"
                                                                        onblur="(this.type='date')"
                                                                        ng-change="Getage();">
                                                                </td>
                                                                <td> <label class="col-form-label">Age</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Age" autocomplete="off" readonly>
                                                                </td>
                                                                <td> <label class="col-form-label">Blood_Group
                                                                    </label></td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Bloodgroup" autocomplete="off">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Expereience</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Expereience" autocomplete="off">
                                                                </td>
                                                                <td> <label class="col-form-label">Fresher</label>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" ng-model="Fresher">
                                                                        <option Value="Yes">Yes</option>
                                                                        <option value="No">No</option>


                                                                    </select>


                                                                </td>
                                                                <td> <label class="col-form-label">Religion</label>
                                                                </td>
                                                                <td> <select ng-model="Religion" class="form-control">

                                                                        <option ng-repeat="s in GetReligionList "
                                                                            value="{{s.Religion}}">
                                                                            {{s.Religion}}</option>
                                                                    </select></td>



                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Shift</label>
                                                                </td>
                                                                <td><select ng-model="Shift" class="form-control">

                                                                        <option ng-repeat="s in GetShiftList "
                                                                            value="{{s.Shift}}">
                                                                            {{s.Shift}}</option>
                                                                    </select>
                                                                </td>
                                                                <td> <label class="col-form-label">Allow_OT</label>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" ng-model="AllowOT">
                                                                        <option Value="Yes">Yes</option>
                                                                        <option value="No">No</option>


                                                                    </select>


                                                                </td>
                                                                <td> <label class="col-form-label">Allow_LOP</label>
                                                                </td>
                                                                <td> <select class="form-control" ng-model="AllowLOP">
                                                                        <option Value="Yes">Yes</option>
                                                                        <option value="No">No</option>


                                                                    </select>
                                                                </td>

                                                            </tr>
                                                            <tr>

                                                                <td> <label class="col-form-label">Salary_Mode</label>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" ng-model="Salary_Mode">
                                                                        <option Value="Bank">Bank</option>
                                                                        <option value="Cash">Cash</option>


                                                                    </select>


                                                                </td>
                                                                <td> <label class="col-form-label">Week_Off</label>
                                                                </td>
                                                                <td> <select class="form-control" ng-model="Weekoff">
                                                                        <option Value="Sunday">Sunday</option>
                                                                        <option value="Monday">Monday</option>
                                                                        <option Value="Tuesday">Tuesday</option>
                                                                        <option value="Wednesday">Wednesday</option>
                                                                        <option Value="Thursday">Thursday</option>
                                                                        <option value="Friday">Friday</option>
                                                                        <option Value="Saturday">Saturday</option>



                                                                    </select>
                                                                </td>
                                                                <td> <label class="col-form-label">Employee_CL</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Employee_CL" autocomplete="off">
                                                            </tr>
                                                            <tr>

                                                                <td> <label class="col-form-label">UAN No</label>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" autocomplete="off"
                                                                        ng-model="UANno"
                                                                        onkeypress="return Validate(event);" />


                                                                </td>
                                                                <td> <label class="col-form-label">ESI No</label>
                                                                </td>
                                                                <td> <input class="form-control" autocomplete="off"
                                                                        ng-model="ESIno" />
                                                                </td>
                                                                <td> <label class="col-form-label">Aadhar No</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Aadharno" autocomplete="off"
                                                                        onkeypress="return Validate(event);">
                                                            </tr>

                                                            <tr>

                                                                <td> <label class="col-form-label">Panno</label>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" autocomplete="off"
                                                                        ng-model="Panno" />


                                                                </td>
                                                                <td> <label class="col-form-label">PF Joining
                                                                        Date</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="PFJoiningdate"
                                                                        onfocus="(this.type='date')"
                                                                        onblur="(this.type='date')">
                                                                </td>
                                                                <td> <label class="col-form-label">ESI Joining
                                                                        Date</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="ESIJoiningdate"
                                                                        onfocus="(this.type='date')"
                                                                        onblur="(this.type='date')">
                                                            </tr>
                                                        </table>


                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_Other_info();">Update</button>

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
                                                                <td> <input class="form-control"
                                                                        ng-model="CurrentAddress" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Country</label>
                                                                </td>
                                                                <td> <select ng-model="CurrentCountry"
                                                                        ng-change="GetCurrentState();"
                                                                        class="form-control">

                                                                        <option ng-repeat="s in GetCountryList "
                                                                            value="{{s.Country}}">
                                                                            {{s.Country}}</option>
                                                                    </select></td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">State</label>
                                                                </td>
                                                                <td> <select ng-model="CurrentState"
                                                                        class="form-control"
                                                                        ng-change="GetCurrentCity();">

                                                                        <option ng-repeat="s in GetStateList "
                                                                            value="{{s.State}}">
                                                                            {{s.State}}</option>
                                                                    </select></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">City</label>
                                                                </td>
                                                                <td> <select ng-model="CurrentCity"
                                                                        class="form-control">

                                                                        <option ng-repeat="s in GetCityList "
                                                                            value="{{s.City}}">
                                                                            {{s.City}}</option>
                                                                    </select></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Pincode</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="CurrentPincode" /></td>
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
                                                                <td> <input class="form-control"
                                                                        ng-model="PermanentAddress" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Country</label>
                                                                </td>
                                                                <td> <select ng-model="PermanentCountry"
                                                                        ng-change="GetPerstate();" class="form-control">

                                                                        <option ng-repeat="s in GetCountryList "
                                                                            value="{{s.Country}}">
                                                                            {{s.Country}}</option>
                                                                    </select></td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">State</label>
                                                                </td>
                                                                <td> <select ng-model="PermanentState"
                                                                        ng-change="GetPerCity();" class="form-control">

                                                                        <option ng-repeat="s in GetPerStateList "
                                                                            value="{{s.State}}">
                                                                            {{s.State}}</option>
                                                                    </select></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">City</label>
                                                                </td>
                                                                <td> <select ng-model="PermanentCity"
                                                                        class="form-control">

                                                                        <option ng-repeat="s in GetPerCityList "
                                                                            value="{{s.City}}">
                                                                            {{s.City}}</option>
                                                                    </select></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Pincode</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="PermanentPincode" /></td>
                                                            </tr>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="UpdateAddress();">Update</button>

                                            </div>
                                        </div>
                                        <div class="card" ng-show="btnEducation">
                                            <h5 class="card-header">Employee Education Details</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-4">

                                                        <table class="table table-bordered table-sm">
                                                            <tr>
                                                                <td> <label class="col-form-label">S.No</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="EduNextno"
                                                                        id="EduNextno" readonly /> </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Studied</label>
                                                                </td>
                                                                <td> <select ng-model="Employeestudied"
                                                                        class="form-control" id="Employeestudied">
                                                                        <option ng-repeat="s in GetQualififcationList"
                                                                            value="{{s.Degree}}">
                                                                            {{s.Degree}}</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label
                                                                        class="col-form-label">University/School</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="UniversityorSchool"
                                                                        id="UniversityorSchool" autocomplete="off" />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Grade /
                                                                        %</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="GradeorPercentage"
                                                                        id="GradeorPercentage" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Passout-Year</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Passoutyear"
                                                                        id="Passoutyear" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Select_file</label>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input type="file" class="form-control"
                                                                            ng-model="clearinput" id="fileInput04"
                                                                            name=files[]
                                                                            accept="image/png, image/gif, image/jpeg,application/pdf">
                                                                        <div class="input-group-append">
                                                                            <p id="fileButton04"
                                                                                class="input-group-text">
                                                                                <i class="fa fa-upload"></i>
                                                                            </p>
                                                                        </div>


                                                                    </div>




                                                                </td>
                                                            </tr>

                                                        </table>

                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered  table-sm table-striped">
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
                                                                                    data-target="#ModalCenter1Education"
                                                                                    ng-click="FetchStudy(e.Employeeid,e.Sno);"
                                                                                    src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                                <img height="15"
                                                                                    ng-click="FetchStudy(e.Employeeid,e.Sno);"
                                                                                    src="<?php echo "$domain"; ?>/assets/icons/edit.png">

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
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_Education();">Update</button>
                                                <button class="btn btn-rounded btn-info"
                                                    ng-click="ResetEducation();">Clear(Next)</button>
                                            </div>
                                        </div>
                                        <div class="card" ng-show="btnFamily">
                                            <h5 class="card-header">Employee Family Details</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-4">

                                                        <table class="table table-bordered table-sm">
                                                            <tr>
                                                                <td> <label class="col-form-label">Name</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="FamilyName" />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Relationship</label>
                                                                </td>
                                                                <td> <select ng-model="Familyrelationship"
                                                                        class="form-control">

                                                                        <option ng-repeat="s in GetRelationshipList "
                                                                            value="{{s.Relationship}}">
                                                                            {{s.Relationship}}</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Age</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="FamilyAge" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Contact
                                                                        No</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="FamilyContactno"
                                                                        onkeypress="return Validate(event);" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Occupation</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="FamilyOccupation" />
                                                                </td>
                                                            </tr>

                                                        </table>

                                                    </div>
                                                    <div class="col-lg-8">
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
                                                            <dir-pagination-controls pagination-id="Familygrid"
                                                                max-size="3" direction-links="true"
                                                                boundary-links="true" class="pagination">
                                                            </dir-pagination-controls>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_Family();">Update</button>
                                                <button class="btn btn-rounded btn-info"
                                                    ng-click="ResetFamily();">Clear(Next)</button>
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
                                                                <td> <label
                                                                        class="col-form-label">Reference_Name</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="Reference1name" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Contactno</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="Reference1contactno"
                                                                        onkeypress="return Validate(event);" />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Address</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="Reference1address" />
                                                                </td>
                                                            </tr>

                                                        </table>

                                                    </div>
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                        <h3>Reference 2 Detail</h3>
                                                        <table class="table table-bordered table-sm">
                                                            <tr>
                                                                <td> <label
                                                                        class="col-form-label">Reference_Name</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="Reference2name" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Contactno</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="Reference2contactno"
                                                                        onkeypress="return Validate(event);" />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Address</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="Reference2address" />
                                                                </td>
                                                            </tr>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_refrence();">Update</button>

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
                                                            <td> <label class="col-form-label">Basic+Da</label>
                                                            </td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="Basic" autocomplete="off"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()"
                                                                    onkeypress="return Validate(event);">
                                                            </td>
                                                            <td> <label class="col-form-label">HR_Allowance</label>
                                                            </td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="HR_Allowance" autocomplete="off"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()">
                                                            </td>
                                                            <td> <label class="col-form-label">Travel Allowance
                                                                </label></td>
                                                            <td> <input type="text" class="form-control" ng-model="TA"
                                                                    autocomplete="off"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label
                                                                    class="col-form-label">Performance_allowance</label>
                                                            </td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="Performance_allowance" autocomplete="off"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()">
                                                            </td>
                                                            <td> <label class="col-form-label">Day_allowance</label>
                                                            </td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="Day_allowance" autocomplete="off"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()">
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
                                                                    autocomplete="off">
                                                            </td>
                                                            <td> <label class="col-form-label">Professional_tax
                                                                </label></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="Professional_tax" autocomplete="off"
                                                                    onkeypress="return Validate(event);">
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
                                                                    ng-model="Other_Allowance" autocomplete="off"
                                                                    onkeypress="return Validate(event);">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label class="col-form-label">PF_Yesandno</label>
                                                            </td>
                                                            <td>
                                                                <select class="form-control" ng-model="PF_Yesandno"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()">
                                                                    <option Value="Yes">Yes</option>
                                                                    <option value="No">No</option>


                                                                </select>


                                                            </td>
                                                            <td> <label class="col-form-label">ESI_Yesandno</label>
                                                            </td>
                                                            <td>
                                                                <select class="form-control" ng-model="ESI_Yesandno"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()">
                                                                    <option Value="Yes">Yes</option>
                                                                    <option value="No">No</option>


                                                                </select>


                                                            </td>


                                                        </tr>

                                                    </table>

                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_Salary();">Update</button>
                                            </div>
                                        </div>
                                        <div class="card" ng-show="btndoc">
                                            <h5 class="card-header">Employee Document Details</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-5">

                                                        <table class="table table-bordered table-sm">
                                                            <tr>
                                                                <td> <label class="col-form-label">S.No</label>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" ng-model="DocNextno"
                                                                        autocomplete="off" id='DocNextno' readonly />

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Document_Type</label>
                                                                </td>
                                                                <td>

                                                                    <select ng-model="Documenttype" id='Documenttype'
                                                                        class="form-control">

                                                                        <option ng-repeat="s in GetDoctypeList "
                                                                            value="{{s.Documenttype}}">
                                                                            {{s.Documenttype}}</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Documentno</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Documentno"
                                                                        autocomplete="off" id='Documentno' />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Select_file</label>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input type="file" class="form-control"
                                                                            ng-model="clearinput" id="fileInput"
                                                                            name=files[]>
                                                                        <div class="input-group-append">
                                                                            <p id="fileButton" class="input-group-text">
                                                                                <i class="fa fa-upload"></i>
                                                                            </p>
                                                                        </div>


                                                                    </div>




                                                                </td>
                                                            </tr>


                                                        </table>

                                                    </div>
                                                    <div class="col-lg-7">
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
                                                            <dir-pagination-controls pagination-id="Docgrid"
                                                                max-size="3" direction-links="true"
                                                                boundary-links="true" class="pagination">
                                                            </dir-pagination-controls>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_document();">Update</button>
                                                <button class="btn btn-rounded btn-info"
                                                    ng-click="Resetdoc();">Clear(Next)</button>
                                            </div>
                                        </div>
                                        <div class="card" ng-show="btnimage">
                                            <h5 class="card-header">Employee Image Upload</h5>
                                            <div class="card-body">
                                                <div class="row">

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <img ng-src="{{Imagepath}}"
                                                            ng-hide="Imagepath == null || Imagepath == '' "
                                                            ng-show="Imagepath != null " class="img-thumbnail mr-3"
                                                            alt="Employee_image" style="width:150px;height:150px;">
                                                    </div>
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-7">
                                                        <br>
                                                        <br>

                                                        <table class="table table-bordered table-sm">



                                                            <tr>
                                                                <td> <label class="col-form-label">Image_Upload</label>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input type="file" class="form-control"
                                                                            ng-model="clearinput01" id="fileInput01"
                                                                            accept="image/*" name=files[]
                                                                            ng-model="Empimage">
                                                                        <div class="input-group-append">
                                                                            <p id="fileButton01"
                                                                                class="input-group-text"><i
                                                                                    class="fa fa-upload"></i>
                                                                            </p>
                                                                        </div>


                                                                    </div>




                                                                </td>

                                                            </tr>


                                                        </table>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="card" ng-show="btnpromotion">
                                            <h5 class="card-header">Department / Designation Details</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-4">

                                                        <table class="table table-bordered table-sm">

                                                            <tr>
                                                                <td> <label class="col-form-label">S.no</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="PromotionNextno" autocomplete="off"
                                                                        readonly />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Department</label>
                                                                </td>
                                                                <td> <select ng-model="Department" class="form-control">

                                                                        <option ng-repeat="s in GetDepartmentList "
                                                                            value="{{s.Department}}">
                                                                            {{s.Department}}</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Designation</label>
                                                                </td>
                                                                <td> <select ng-model="Designation"
                                                                        class="form-control">

                                                                        <option ng-repeat="s in GetDesignationList "
                                                                            value="{{s.Designation}}">
                                                                            {{s.Designation}}</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label"
                                                                        title="From_Date">From</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Fromperiod"
                                                                        onfocus="(this.type='date')"
                                                                        onblur="(this.type='date')"
                                                                        ng-change="GetDeptDays();">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label"
                                                                        title="To_Date">To</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Toperiod" onfocus="(this.type='date')"
                                                                        onblur="(this.type='date')"
                                                                        ng-change="GetDeptDays();">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Period</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Period"
                                                                        autocomplete="off" readonly />
                                                                </td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td> <label class="col-form-label">Years</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Postingyear"
                                                                        autocomplete="off" readonly/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Month</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Postingmonth"
                                                                        autocomplete="off" readonly/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Days</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Postingdays"
                                                                        autocomplete="off" readonly/>
                                                                </td>
                                                            </tr> -->
                                                        </table>

                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered  table-sm table-striped">
                                                                <thead>
                                                                    <tr>

                                                                        <th>No</th>
                                                                        <th scope="col">Department</th>
                                                                        <th scope="col">Designation</th>

                                                                        <th scope="col">Period</th>

                                                                        <th scope="col">Action</th>
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


                                                                        <td>
                                                                            <div class="action-btn">
                                                                                <img height="15"
                                                                                    ng-click="FetchPromotion(e.Employeeid,e.Sno);"
                                                                                    src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="pagination">
                                                            <dir-pagination-controls pagination-id="Deptgrid"
                                                                max-size="3" direction-links="true"
                                                                boundary-links="true" class="pagination">
                                                            </dir-pagination-controls>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_DEPT();">Update</button>
                                                <button class="btn btn-rounded btn-info"
                                                    ng-click="ResetPromotion();">Clear(Next)</button>
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
                                                                        autocomplete="off" id="Bankname" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Accountno</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Accountno"
                                                                        autocomplete="off" id="Accountno" />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">IFSCcode</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="IFSCcode"
                                                                        autocomplete="off" id="IFSCcode" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Branch</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Branch"
                                                                        autocomplete="off" id="Branch" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Select_file</label>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input type="file" class="form-control"
                                                                            ng-model="clearinput" id="fileInput03"
                                                                            name=files[]
                                                                            accept="image/png, image/gif, image/jpeg,application/pdf">
                                                                        <div class="input-group-append">
                                                                            <p id="fileButton03"
                                                                                class="input-group-text">
                                                                                <i class="fa fa-upload"></i>
                                                                            </p>
                                                                        </div>


                                                                    </div>




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
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="UpdateBank();">Update</button>

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
    <title>Edit Employee Master</title>
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

                        <div class="row">



                            <div id="myCarousel" class="carousel slide" data-interval="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">


                                        <div class="card">
                                            <h5 class="card-header">Employee Details</h5>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered  table-sm table-striped">
                                                        <thead>
                                                            <tr>

                                                                <th>No</th>
                                                                <th scope="col" style="width: 100px;">
                                                                    Employee_ID</th>
                                                                <th scope="col" style="width: 200px;">Name</th>
                                                                <th scope="col" style="width: 90px;">Gender</th>
                                                                <th scope="col">Department</th>
                                                                <th scope="col">Designation</th>
                                                                <th scope="col">Qualification</th>
                                                                <th scope="col">Contact</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2">


                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            nng-model="searchEmployee.Employeeid"
                                                                            class="form-control">
                                                                    </div>


                                                                </td>
                                                                <td>
                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            ng-model="searchEmployee.Fullname"
                                                                            class="form-control">
                                                                    </div>


                                                                </td>
                                                                <td style="min-width:120px">


                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            nng-model="searchEmployee.Gender"
                                                                            class="form-control">
                                                                    </div>


                                                                </td>
                                                                <td>


                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            nng-model="searchEmployee.Department"
                                                                            class="form-control">
                                                                    </div>



                                                                </td>
                                                                <td>


                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            nng-model="searchEmployee.Designation"
                                                                            class="form-control">
                                                                    </div>



                                                                </td>
                                                                <td>


                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            nng-model="searchEmployee.HighestQualification"
                                                                            class="form-control">
                                                                    </div>




                                                                </td>
                                                                <td colspan="2">


                                                                    <div class="input-search">
                                                                        <span class="fa fa-search"></span>
                                                                        <input placeholder="Search"
                                                                            nng-model="searchEmployee.Contactno"
                                                                            class="form-control">
                                                                    </div>



                                                                </td>


                                                                </td>


                                                            </tr>
                                                            <tr dir-paginate="e in GetEmployeeList |filter:searchEmployee|itemsPerPage:10 "
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
                                                                <td>{{e.HighestQualification}}</td>
                                                                <td>{{e.Contactno}}</td>


                                                                <td>
                                                                    <div class="action-btn hover">
                                                                        <img height="15"
                                                                            ng-click="SendEdit(e.Employeeid);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">

                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="float-right mt-2">
                                                    <div class="pagination">
                                                        <dir-pagination-controls pagination-id="Employeegrid"
                                                            max-size="3" direction-links="true" boundary-links="true"
                                                            class="pagination">
                                                        </dir-pagination-controls>

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
                                            <h5 class="card-header">Employee Modification</h5>
                                            <div class="card-body">

                                                <div class="row">

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Employee_ID</label>
                                                            <input type="text" class="form-control"
                                                                ng-model="Employeeid" autocomplete="off" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label> First Name</label>
                                                            <div class="input-group "><span class="input-group-prepend">
                                                                    <select class="input-group-text" ng-model="Title">
                                                                        <option Value="Mr.">Mr.</option>
                                                                        <option value="Mrs.">Mrs.</option>
                                                                        <option value="Miss.">Miss.</option>
                                                                        <option value="Ms.">Ms.</option>
                                                                        <option value="Shri.">Shri.</option>
                                                                    </select></span>
                                                                <input type="text" placeholder="Firstname"
                                                                    class="form-control" ng-model="Firstname">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Last Name </label>
                                                            <input type="text" class="form-control" ng-model="Lastname"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Gender</label>
                                                            <select class="form-control" ng-model="Gender">
                                                                <option Value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Category</label>
                                                            <select class="form-control" ng-model="Category">
                                                                <option Value="Admin & Staff">Admin & Staff
                                                                </option>
                                                                <option value="Marketing">Marketing</option>
                                                                <option value="Workers">Workers</option>

                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Married</label>
                                                            <select class="form-control" ng-model="Married">
                                                                <option Value="Yes">Yes</option>
                                                                <option value="No">No</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Mother Tongue</label>
                                                            <select ng-model="Mothertongue" class="form-control">

                                                                <option ng-repeat="s in GetLanguageList "
                                                                    value="{{s.Languages}}">
                                                                    {{s.Languages}}</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Contact No</label>
                                                            <input type="text" class="form-control" ng-model="Contactno"
                                                                autocomplete="off" onkeypress="return Validate(event);">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Nationality</label>
                                                            <input type="text" class="form-control"
                                                                ng-model="Nationality" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group form-data">
                                                            <label>Email-ID </label>
                                                            <input type="text" class="form-control" ng-model="Emailid"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="btn-row text-right">
                                                    <button class="btn btn-rounded btn-success"
                                                        ng-click="Update_Major();">Update</button>

                                                    <button class="btn btn-rounded btn-danger" data-target="#myCarousel"
                                                        data-slide-to="0" ng-click="Getallvalues()">Back</button>
                                                </div>

                                                <hr />
                                                <div class="data-tabs">
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#Basic"
                                                                role="tab">Basic</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Eduction"
                                                                role="tab">Eduction</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Bank_Account"
                                                                role="tab">Bank Account</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Family_Info"
                                                                role="tab">Family Info</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Reference"
                                                                role="tab">Reference</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Salary"
                                                                role="tab">Salary</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Doc_info"
                                                                role="tab">Doc_info</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Image"
                                                                role="tab">Image</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Appraisal"
                                                                role="tab">Appraisal</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Promotion"
                                                                role="tab">Promotion</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Vaccination"
                                                                role="tab">Vaccination</a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="Basic">
                                                            <div class="card">
                                                                <h5 class="card-header">Other Information</h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-2 ">
                                                                            <table>
                                                                                <tr>
                                                                                    <td>Languages</td>
                                                                                </tr>
                                                                                <tr>

                                                                                    <td>
                                                                                        <li ng-repeat="p in GetLanguageList"
                                                                                            style=" list-style-type: none;">
                                                                                            <input type="checkbox"
                                                                                                ng-model="selected[p.Languages]"
                                                                                                value="{{p.Languages}}" />
                                                                                            <span>{{p.Languages}}</span>
                                                                                        </li>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder  col-lg-10 nopadding">
                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label class="col-form-label"
                                                                                            title="Date Of Birth">DOB</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Dob"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')"
                                                                                            ng-change="Getage();">
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Age</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Age"
                                                                                            autocomplete="off" readonly>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Blood_Group
                                                                                        </label></td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Bloodgroup"
                                                                                            autocomplete="off">
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Expereience</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Expereience"
                                                                                            autocomplete="off">
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Fresher</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select class="form-control"
                                                                                            ng-model="Fresher">
                                                                                            <option Value="Yes">Yes
                                                                                            </option>
                                                                                            <option value="No">No
                                                                                            </option>


                                                                                        </select>


                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Religion</label>
                                                                                    </td>
                                                                                    <td> <select ng-model="Religion"
                                                                                            class="form-control">

                                                                                            <option
                                                                                                ng-repeat="s in GetReligionList "
                                                                                                value="{{s.Religion}}">
                                                                                                {{s.Religion}}</option>
                                                                                        </select></td>



                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Shift</label>
                                                                                    </td>
                                                                                    <td><select ng-model="Shift"
                                                                                            class="form-control">

                                                                                            <option
                                                                                                ng-repeat="s in GetShiftList "
                                                                                                value="{{s.Shift}}">
                                                                                                {{s.Shift}}</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Allow_OT</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select class="form-control"
                                                                                            ng-model="AllowOT">
                                                                                            <option Value="Yes">Yes
                                                                                            </option>
                                                                                            <option value="No">No
                                                                                            </option>


                                                                                        </select>


                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Allow_LOP</label>
                                                                                    </td>
                                                                                    <td> <select class="form-control"
                                                                                            ng-model="AllowLOP">
                                                                                            <option Value="Yes">Yes
                                                                                            </option>
                                                                                            <option value="No">No
                                                                                            </option>


                                                                                        </select>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>

                                                                                    <td> <label
                                                                                            class="col-form-label">Salary_Mode</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select class="form-control"
                                                                                            ng-model="Salary_Mode">
                                                                                            <option Value="Bank">Bank
                                                                                            </option>
                                                                                            <option value="Cash">Cash
                                                                                            </option>


                                                                                        </select>


                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Week_Off</label>
                                                                                    </td>
                                                                                    <td> <select class="form-control"
                                                                                            ng-model="Weekoff">
                                                                                            <option Value="Sunday">
                                                                                                Sunday</option>
                                                                                            <option value="Monday">
                                                                                                Monday</option>
                                                                                            <option Value="Tuesday">
                                                                                                Tuesday</option>
                                                                                            <option value="Wednesday">
                                                                                                Wednesday</option>
                                                                                            <option Value="Thursday">
                                                                                                Thursday</option>
                                                                                            <option value="Friday">
                                                                                                Friday</option>
                                                                                            <option Value="Saturday">
                                                                                                Saturday</option>



                                                                                        </select>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Employee_CL</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Employee_CL"
                                                                                            autocomplete="off">
                                                                                </tr>
                                                                                <tr>

                                                                                    <td> <label
                                                                                            class="col-form-label">UAN
                                                                                            No</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control"
                                                                                            autocomplete="off"
                                                                                            ng-model="UANno"
                                                                                            onkeypress="return Validate(event);" />


                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">ESI
                                                                                            No</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            autocomplete="off"
                                                                                            ng-model="ESIno" />
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Aadhar
                                                                                            No</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Aadharno"
                                                                                            autocomplete="off"
                                                                                            onkeypress="return Validate(event);">
                                                                                </tr>

                                                                                <tr>

                                                                                    <td> <label
                                                                                            class="col-form-label">Panno</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control"
                                                                                            autocomplete="off"
                                                                                            ng-model="Panno" />


                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">PF
                                                                                            Joining Date</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="PFJoiningdate"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')">
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">ESI
                                                                                            Joining Date</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="ESIJoiningdate"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')">
                                                                                </tr>
                                                                            </table>


                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_Other_info();">Update</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Eduction">
                                                            <div class="card">
                                                                <h5 class="card-header">Employee Education Details</h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-4">

                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">S.No</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="EduNextno"
                                                                                            id="EduNextno" readonly />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Studied</label>
                                                                                    </td>
                                                                                    <td> <select
                                                                                            ng-model="Employeestudied"
                                                                                            class="form-control"
                                                                                            id="Employeestudied">
                                                                                            <option
                                                                                                ng-repeat="s in GetQualififcationList"
                                                                                                value="{{s.Degree}}">
                                                                                                {{s.Degree}}</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">University/School</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="UniversityorSchool"
                                                                                            id="UniversityorSchool"
                                                                                            autocomplete="off" />
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Grade
                                                                                            /
                                                                                            %</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="GradeorPercentage"
                                                                                            id="GradeorPercentage" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Passout-Year</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Passoutyear"
                                                                                            id="Passoutyear" /></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Select_file</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <input type="file"
                                                                                                class="form-control"
                                                                                                ng-model="clearinput"
                                                                                                id="fileInput04"
                                                                                                name=files[]
                                                                                                accept="image/png, image/gif, image/jpeg,application/pdf">
                                                                                            <div
                                                                                                class="input-group-append">
                                                                                                <p id="fileButton04"
                                                                                                    class="input-group-text">
                                                                                                    <i
                                                                                                        class="fa fa-upload"></i>
                                                                                                </p>
                                                                                            </div>


                                                                                        </div>




                                                                                    </td>
                                                                                </tr>

                                                                            </table>

                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <div class="table-responsive">
                                                                                <table
                                                                                    class="table table-bordered  table-sm table-striped">
                                                                                    <thead>
                                                                                        <tr>

                                                                                            <th>No</th>
                                                                                            <th scope="col">Studies</th>
                                                                                            <th scope="col">University
                                                                                            </th>
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
                                                                                            <td>{{e.Universityorschool}}
                                                                                            </td>
                                                                                            <td>{{e.Grade}}</td>
                                                                                            <td>{{e.Passoutyear}}</td>




                                                                                            <td>
                                                                                                <div class="action-btn">
                                                                                                    <img height="15"
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#ModalCenter1Education"
                                                                                                        ng-click="FetchStudy(e.Employeeid,e.Sno);"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                                                    <img height="15"
                                                                                                        ng-click="FetchStudy(e.Employeeid,e.Sno);"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">

                                                                                                    <img height="15"
                                                                                                        data-toggle="modal"
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
                                                                                <dir-pagination-controls
                                                                                    pagination-id="Educationgrid"
                                                                                    max-size="3" direction-links="true"
                                                                                    boundary-links="true"
                                                                                    class="pagination">
                                                                                </dir-pagination-controls>


                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_Education();">Update</button>
                                                                    <button class="btn btn-rounded btn-info"
                                                                        ng-click="ResetEducation();">Clear(Next)</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Bank_Account">
                                                            <div class="card">
                                                                <h5 class="card-header">Bank Account Details</h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-5">

                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Bankname</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Bankname"
                                                                                            autocomplete="off"
                                                                                            id="Bankname" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Accountno</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Accountno"
                                                                                            autocomplete="off"
                                                                                            id="Accountno" />
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">IFSCcode</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="IFSCcode"
                                                                                            autocomplete="off"
                                                                                            id="IFSCcode" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Branch</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Branch"
                                                                                            autocomplete="off"
                                                                                            id="Branch" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Select_file</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <input type="file"
                                                                                                class="form-control"
                                                                                                ng-model="clearinput"
                                                                                                id="fileInput03"
                                                                                                name=files[]
                                                                                                accept="image/png, image/gif, image/jpeg,application/pdf">
                                                                                            <div
                                                                                                class="input-group-append">
                                                                                                <p id="fileButton03"
                                                                                                    class="input-group-text">
                                                                                                    <i
                                                                                                        class="fa fa-upload"></i>
                                                                                                </p>
                                                                                            </div>


                                                                                        </div>




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
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="UpdateBank();">Update</button>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="Family_Info">
                                                            <div class="card">
                                                                <h5 class="card-header">Employee Family Details</h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-4">

                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Name</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="FamilyName" />
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Relationship</label>
                                                                                    </td>
                                                                                    <td> <select
                                                                                            ng-model="Familyrelationship"
                                                                                            class="form-control">

                                                                                            <option
                                                                                                ng-repeat="s in GetRelationshipList "
                                                                                                value="{{s.Relationship}}">
                                                                                                {{s.Relationship}}
                                                                                            </option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Age</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="FamilyAge" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Contact
                                                                                            No</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="FamilyContactno"
                                                                                            onkeypress="return Validate(event);" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Occupation</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="FamilyOccupation" />
                                                                                    </td>
                                                                                </tr>

                                                                            </table>

                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <div class="table-responsive">
                                                                                <table
                                                                                    class="table table-bordered  table-sm table-striped">
                                                                                    <thead>
                                                                                        <tr>

                                                                                            <th>No</th>
                                                                                            <th scope="col">Name</th>
                                                                                            <th scope="col">Relationship
                                                                                            </th>
                                                                                            <th scope="col">Age</th>
                                                                                            <th scope="col">Contactno
                                                                                            </th>
                                                                                            <th scope="col">Occupation
                                                                                            </th>


                                                                                            <th scope="col">Action</th>
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



                                                                                            <td>
                                                                                                <div class="action-btn">
                                                                                                    <img height="15"
                                                                                                        data-toggle="modal"
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
                                                                                <dir-pagination-controls
                                                                                    pagination-id="Familygrid"
                                                                                    max-size="3" direction-links="true"
                                                                                    boundary-links="true"
                                                                                    class="pagination">
                                                                                </dir-pagination-controls>


                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_Family();">Update</button>
                                                                    <button class="btn btn-rounded btn-info"
                                                                        ng-click="ResetFamily();">Clear(Next)</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Reference">
                                                            <div class="card">
                                                                <h5 class="card-header">Reference Details</h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                                            <h3>Reference 1 Detail</h3>
                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Reference_Name</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Reference1name" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Contactno</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Reference1contactno"
                                                                                            onkeypress="return Validate(event);" />
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Address</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Reference1address" />
                                                                                    </td>
                                                                                </tr>

                                                                            </table>

                                                                        </div>
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                                            <h3>Reference 2 Detail</h3>
                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Reference_Name</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Reference2name" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Contactno</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Reference2contactno"
                                                                                            onkeypress="return Validate(event);" />
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Address</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Reference2address" />
                                                                                    </td>
                                                                                </tr>

                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_refrence();">Update</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Salary">
                                                            <div class="card">
                                                                <h5 class="card-header">Salary Information</h5>
                                                                <div class="card-body">
                                                                    <div
                                                                        class="table-responsive custom-table custom-table-noborder">
                                                                        <table class="table table-bordered table-sm">
                                                                            <tr>
                                                                                <td> <label
                                                                                        class="col-form-label">Basic+Da</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Basic"
                                                                                        autocomplete="off"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()"
                                                                                        onkeypress="return Validate(event);">
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">HR_Allowance</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="HR_Allowance"
                                                                                        autocomplete="off"
                                                                                        onkeypress="return Validate(event);"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()">
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">Travel
                                                                                        Allowance
                                                                                    </label></td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="TA" autocomplete="off"
                                                                                        onkeypress="return Validate(event);"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td> <label
                                                                                        class="col-form-label">Performance_allowance</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Performance_allowance"
                                                                                        autocomplete="off"
                                                                                        onkeypress="return Validate(event);"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()">
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">Day_allowance</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Day_allowance"
                                                                                        autocomplete="off"
                                                                                        onkeypress="return Validate(event);"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()">
                                                                                </td>
                                                                                <td> <label class="col-form-label">PF
                                                                                    </label></td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="PF" autocomplete="off"
                                                                                        readonly>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td> <label
                                                                                        class="col-form-label">ESI</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="ESI"
                                                                                        autocomplete="off" readonly>
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">TDS</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="TDS"
                                                                                        autocomplete="off">
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">Professional_tax
                                                                                    </label></td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Professional_tax"
                                                                                        autocomplete="off"
                                                                                        onkeypress="return Validate(event);">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td> <label
                                                                                        class="col-form-label">Net_Salary</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Net_Salary"
                                                                                        autocomplete="off" readonly>
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">Gross_Salary</label>
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Gross_Salary"
                                                                                        autocomplete="off" readonly>
                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">Other_Allowance
                                                                                    </label></td>
                                                                                <td> <input type="text"
                                                                                        class="form-control"
                                                                                        ng-model="Other_Allowance"
                                                                                        autocomplete="off"
                                                                                        onkeypress="return Validate(event);">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td> <label
                                                                                        class="col-form-label">PF_Yesandno</label>
                                                                                </td>
                                                                                <td>
                                                                                    <select class="form-control"
                                                                                        ng-model="PF_Yesandno"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()">
                                                                                        <option Value="Yes">Yes</option>
                                                                                        <option value="No">No</option>


                                                                                    </select>


                                                                                </td>
                                                                                <td> <label
                                                                                        class="col-form-label">ESI_Yesandno</label>
                                                                                </td>
                                                                                <td>
                                                                                    <select class="form-control"
                                                                                        ng-model="ESI_Yesandno"
                                                                                        ng-model-options='{ debounce: 1000 }'
                                                                                        ng-change="Getcalvalue()">
                                                                                        <option Value="Yes">Yes</option>
                                                                                        <option value="No">No</option>


                                                                                    </select>


                                                                                </td>


                                                                            </tr>

                                                                        </table>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_Salary();">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="Doc_info">
                                                            <div class="card">
                                                                <h5 class="card-header">Employee Document Details</h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-5">

                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">S.No</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control"
                                                                                            ng-model="DocNextno"
                                                                                            autocomplete="off"
                                                                                            id='DocNextno' readonly />

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Document_Type</label>
                                                                                    </td>
                                                                                    <td>

                                                                                        <select ng-model="Documenttype"
                                                                                            id='Documenttype'
                                                                                            class="form-control">

                                                                                            <option
                                                                                                ng-repeat="s in GetDoctypeList "
                                                                                                value="{{s.Documenttype}}">
                                                                                                {{s.Documenttype}}
                                                                                            </option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Documentno</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Documentno"
                                                                                            autocomplete="off"
                                                                                            id='Documentno' />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Select_file</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <input type="file"
                                                                                                class="form-control"
                                                                                                ng-model="clearinput"
                                                                                                id="fileInput"
                                                                                                name=files[]>
                                                                                            <div
                                                                                                class="input-group-append">
                                                                                                <p id="fileButton"
                                                                                                    class="input-group-text">
                                                                                                    <i
                                                                                                        class="fa fa-upload"></i>
                                                                                                </p>
                                                                                            </div>


                                                                                        </div>




                                                                                    </td>
                                                                                </tr>


                                                                            </table>

                                                                        </div>
                                                                        <div class="col-lg-7">
                                                                            <div class="table-responsive">
                                                                                <table
                                                                                    class="table table-bordered  table-sm table-striped">
                                                                                    <thead>
                                                                                        <tr>

                                                                                            <th>No</th>
                                                                                            <th scope="col">Doctype</th>
                                                                                            <th scope="col">Document_No
                                                                                            </th>
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
                                                                                                    <img height="15"
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#ModalCenter1Doc"
                                                                                                        ng-click="FetchDOC(e.Employeeid,e.Sno);"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                                                    <img height="15"
                                                                                                        ng-click="FetchDOC(e.Employeeid,e.Sno);"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">


                                                                                                    <img height="15"
                                                                                                        data-toggle="modal"
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
                                                                                <dir-pagination-controls
                                                                                    pagination-id="Docgrid" max-size="3"
                                                                                    direction-links="true"
                                                                                    boundary-links="true"
                                                                                    class="pagination">
                                                                                </dir-pagination-controls>


                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_document();">Update</button>
                                                                    <button class="btn btn-rounded btn-info"
                                                                        ng-click="Resetdoc();">Clear(Next)</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Image">
                                                            <div class="card">
                                                                <h5 class="card-header">Employee Image Upload</h5>
                                                                <div class="card-body">
                                                                    <div class="row">

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-2">
                                                                            <img ng-src="{{Imagepath}}"
                                                                                ng-hide="Imagepath == null || Imagepath == '' "
                                                                                ng-show="Imagepath != null "
                                                                                class="img-thumbnail mr-3"
                                                                                alt="Employee_image"
                                                                                style="width:150px;height:150px;">
                                                                        </div>
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-7">
                                                                            <br>
                                                                            <br>

                                                                            <table
                                                                                class="table table-bordered table-sm">



                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Image_Upload</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <input type="file"
                                                                                                class="form-control"
                                                                                                ng-model="clearinput01"
                                                                                                id="fileInput01"
                                                                                                accept="image/*"
                                                                                                name=files[]
                                                                                                ng-model="Empimage">
                                                                                            <div
                                                                                                class="input-group-append">
                                                                                                <p id="fileButton01"
                                                                                                    class="input-group-text">
                                                                                                    <i
                                                                                                        class="fa fa-upload"></i>
                                                                                                </p>
                                                                                            </div>


                                                                                        </div>




                                                                                    </td>

                                                                                </tr>


                                                                            </table>

                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Appraisal">
                                                            <div class="card">
                                                                <h5 class="card-header">Appraisal Details</h5>
                                                                <div class="card-body">



                                                                    <div class="table-responsive">
                                                                        <table
                                                                            class="table table-bordered  table-sm table-striped">
                                                                            <thead>
                                                                                <tr>

                                                                                    <th>No</th>
                                                                                    <th scope="col">Basic</th>
                                                                                    <th scope="col">HR_Allowance</th>
                                                                                    <th scope="col">TA</th>
                                                                                    <th scope="col">
                                                                                        Performance_allowance</th>
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
                                                                        <dir-pagination-controls
                                                                            pagination-id="Apperesialgrid" max-size="3"
                                                                            direction-links="true" boundary-links="true"
                                                                            class="pagination">
                                                                        </dir-pagination-controls>


                                                                    </div>



                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="Promotion">
                                                            <div class="card">
                                                                <h5 class="card-header">Department / Designation Details
                                                                </h5>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder col-lg-4">

                                                                            <table
                                                                                class="table table-bordered table-sm">

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">S.no</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="PromotionNextno"
                                                                                            autocomplete="off"
                                                                                            readonly />
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Department</label>
                                                                                    </td>
                                                                                    <td> <select ng-model="Department"
                                                                                            class="form-control">

                                                                                            <option
                                                                                                ng-repeat="s in GetDepartmentList "
                                                                                                value="{{s.Department}}">
                                                                                                {{s.Department}}
                                                                                            </option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Designation</label>
                                                                                    </td>
                                                                                    <td> <select ng-model="Designation"
                                                                                            class="form-control">

                                                                                            <option
                                                                                                ng-repeat="s in GetDesignationList "
                                                                                                value="{{s.Designation}}">
                                                                                                {{s.Designation}}
                                                                                            </option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td> <label class="col-form-label"
                                                                                            title="From_Date">From</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Fromperiod"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')"
                                                                                            ng-change="GetDeptDays();">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label class="col-form-label"
                                                                                            title="To_Date">To</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Toperiod"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')"
                                                                                            ng-change="GetDeptDays();">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Period</label>
                                                                                    </td>
                                                                                    <td> <input class="form-control"
                                                                                            ng-model="Period"
                                                                                            autocomplete="off"
                                                                                            readonly />
                                                                                    </td>
                                                                                </tr>
                                                                                <!-- <tr>
                                                                <td> <label class="col-form-label">Years</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Postingyear"
                                                                        autocomplete="off" readonly/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Month</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Postingmonth"
                                                                        autocomplete="off" readonly/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Days</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Postingdays"
                                                                        autocomplete="off" readonly/>
                                                                </td>
                                                            </tr> -->
                                                                            </table>

                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <div class="table-responsive">
                                                                                <table
                                                                                    class="table table-bordered  table-sm table-striped">
                                                                                    <thead>
                                                                                        <tr>

                                                                                            <th>No</th>
                                                                                            <th scope="col">Department
                                                                                            </th>
                                                                                            <th scope="col">Designation
                                                                                            </th>

                                                                                            <th scope="col">Period</th>

                                                                                            <th scope="col">Action</th>
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


                                                                                            <td>
                                                                                                <div class="action-btn">
                                                                                                    <img height="15"
                                                                                                        ng-click="FetchPromotion(e.Employeeid,e.Sno);"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                                                                </div>
                                                                                            </td>

                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="pagination">
                                                                                <dir-pagination-controls
                                                                                    pagination-id="Deptgrid"
                                                                                    max-size="3" direction-links="true"
                                                                                    boundary-links="true"
                                                                                    class="pagination">
                                                                                </dir-pagination-controls>


                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-rounded btn-success"
                                                                        ng-click="Update_DEPT();">Update</button>
                                                                    <button class="btn btn-rounded btn-info"
                                                                        ng-click="ResetPromotion();">Clear(Next)</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="Vaccination">11</div>
                                                    </div>
                                                </div>



                                                <br /><br />
                                                <br />



                                                <div class="table-responsive custom-table custom-table-noborder">

                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <button class="btn btn-brand active"
                                                                    ng-click="fnotherinfo();">Basic</button>
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
                                                            <td>
                                                                <button class="btn btn-brand active"
                                                                    ng-click="fnotherinfo();">Vaccination</button>
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
                                                <div class="row">
                                                    <div class="col-lg-2 ">
                                                        <table>
                                                            <tr>
                                                                <td>Languages</td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    <li ng-repeat="p in GetLanguageList"
                                                                        style=" list-style-type: none;">
                                                                        <input type="checkbox"
                                                                            ng-model="selected[p.Languages]"
                                                                            value="{{p.Languages}}" />
                                                                        <span>{{p.Languages}}</span>
                                                                    </li>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder  col-lg-10 nopadding">
                                                        <table class="table table-bordered table-sm">
                                                            <tr>
                                                                <td> <label class="col-form-label"
                                                                        title="Date Of Birth">DOB</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Dob" onfocus="(this.type='date')"
                                                                        onblur="(this.type='date')"
                                                                        ng-change="Getage();">
                                                                </td>
                                                                <td> <label class="col-form-label">Age</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Age" autocomplete="off" readonly>
                                                                </td>
                                                                <td> <label class="col-form-label">Blood_Group
                                                                    </label></td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Bloodgroup" autocomplete="off">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Expereience</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Expereience" autocomplete="off">
                                                                </td>
                                                                <td> <label class="col-form-label">Fresher</label>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" ng-model="Fresher">
                                                                        <option Value="Yes">Yes</option>
                                                                        <option value="No">No</option>


                                                                    </select>


                                                                </td>
                                                                <td> <label class="col-form-label">Religion</label>
                                                                </td>
                                                                <td> <select ng-model="Religion" class="form-control">

                                                                        <option ng-repeat="s in GetReligionList "
                                                                            value="{{s.Religion}}">
                                                                            {{s.Religion}}</option>
                                                                    </select></td>



                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Shift</label>
                                                                </td>
                                                                <td><select ng-model="Shift" class="form-control">

                                                                        <option ng-repeat="s in GetShiftList "
                                                                            value="{{s.Shift}}">
                                                                            {{s.Shift}}</option>
                                                                    </select>
                                                                </td>
                                                                <td> <label class="col-form-label">Allow_OT</label>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" ng-model="AllowOT">
                                                                        <option Value="Yes">Yes</option>
                                                                        <option value="No">No</option>


                                                                    </select>


                                                                </td>
                                                                <td> <label class="col-form-label">Allow_LOP</label>
                                                                </td>
                                                                <td> <select class="form-control" ng-model="AllowLOP">
                                                                        <option Value="Yes">Yes</option>
                                                                        <option value="No">No</option>


                                                                    </select>
                                                                </td>

                                                            </tr>
                                                            <tr>

                                                                <td> <label class="col-form-label">Salary_Mode</label>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" ng-model="Salary_Mode">
                                                                        <option Value="Bank">Bank</option>
                                                                        <option value="Cash">Cash</option>


                                                                    </select>


                                                                </td>
                                                                <td> <label class="col-form-label">Week_Off</label>
                                                                </td>
                                                                <td> <select class="form-control" ng-model="Weekoff">
                                                                        <option Value="Sunday">Sunday</option>
                                                                        <option value="Monday">Monday</option>
                                                                        <option Value="Tuesday">Tuesday</option>
                                                                        <option value="Wednesday">Wednesday</option>
                                                                        <option Value="Thursday">Thursday</option>
                                                                        <option value="Friday">Friday</option>
                                                                        <option Value="Saturday">Saturday</option>



                                                                    </select>
                                                                </td>
                                                                <td> <label class="col-form-label">Employee_CL</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Employee_CL" autocomplete="off">
                                                            </tr>
                                                            <tr>

                                                                <td> <label class="col-form-label">UAN No</label>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" autocomplete="off"
                                                                        ng-model="UANno"
                                                                        onkeypress="return Validate(event);" />


                                                                </td>
                                                                <td> <label class="col-form-label">ESI No</label>
                                                                </td>
                                                                <td> <input class="form-control" autocomplete="off"
                                                                        ng-model="ESIno" />
                                                                </td>
                                                                <td> <label class="col-form-label">Aadhar No</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Aadharno" autocomplete="off"
                                                                        onkeypress="return Validate(event);">
                                                            </tr>

                                                            <tr>

                                                                <td> <label class="col-form-label">Panno</label>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" autocomplete="off"
                                                                        ng-model="Panno" />


                                                                </td>
                                                                <td> <label class="col-form-label">PF Joining
                                                                        Date</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="PFJoiningdate"
                                                                        onfocus="(this.type='date')"
                                                                        onblur="(this.type='date')">
                                                                </td>
                                                                <td> <label class="col-form-label">ESI Joining
                                                                        Date</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="ESIJoiningdate"
                                                                        onfocus="(this.type='date')"
                                                                        onblur="(this.type='date')">
                                                            </tr>
                                                        </table>


                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_Other_info();">Update</button>

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
                                                                <td> <input class="form-control"
                                                                        ng-model="CurrentAddress" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Country</label>
                                                                </td>
                                                                <td> <select ng-model="CurrentCountry"
                                                                        ng-change="GetCurrentState();"
                                                                        class="form-control">

                                                                        <option ng-repeat="s in GetCountryList "
                                                                            value="{{s.Country}}">
                                                                            {{s.Country}}</option>
                                                                    </select></td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">State</label>
                                                                </td>
                                                                <td> <select ng-model="CurrentState"
                                                                        class="form-control"
                                                                        ng-change="GetCurrentCity();">

                                                                        <option ng-repeat="s in GetStateList "
                                                                            value="{{s.State}}">
                                                                            {{s.State}}</option>
                                                                    </select></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">City</label>
                                                                </td>
                                                                <td> <select ng-model="CurrentCity"
                                                                        class="form-control">

                                                                        <option ng-repeat="s in GetCityList "
                                                                            value="{{s.City}}">
                                                                            {{s.City}}</option>
                                                                    </select></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Pincode</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="CurrentPincode" /></td>
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
                                                                <td> <input class="form-control"
                                                                        ng-model="PermanentAddress" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Country</label>
                                                                </td>
                                                                <td> <select ng-model="PermanentCountry"
                                                                        ng-change="GetPerstate();" class="form-control">

                                                                        <option ng-repeat="s in GetCountryList "
                                                                            value="{{s.Country}}">
                                                                            {{s.Country}}</option>
                                                                    </select></td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">State</label>
                                                                </td>
                                                                <td> <select ng-model="PermanentState"
                                                                        ng-change="GetPerCity();" class="form-control">

                                                                        <option ng-repeat="s in GetPerStateList "
                                                                            value="{{s.State}}">
                                                                            {{s.State}}</option>
                                                                    </select></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">City</label>
                                                                </td>
                                                                <td> <select ng-model="PermanentCity"
                                                                        class="form-control">

                                                                        <option ng-repeat="s in GetPerCityList "
                                                                            value="{{s.City}}">
                                                                            {{s.City}}</option>
                                                                    </select></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Pincode</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="PermanentPincode" /></td>
                                                            </tr>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="UpdateAddress();">Update</button>

                                            </div>
                                        </div>
                                        <div class="card" ng-show="btnEducation">
                                            <h5 class="card-header">Employee Education Details</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-4">

                                                        <table class="table table-bordered table-sm">
                                                            <tr>
                                                                <td> <label class="col-form-label">S.No</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="EduNextno"
                                                                        id="EduNextno" readonly /> </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Studied</label>
                                                                </td>
                                                                <td> <select ng-model="Employeestudied"
                                                                        class="form-control" id="Employeestudied">
                                                                        <option ng-repeat="s in GetQualififcationList"
                                                                            value="{{s.Degree}}">
                                                                            {{s.Degree}}</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label
                                                                        class="col-form-label">University/School</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="UniversityorSchool"
                                                                        id="UniversityorSchool" autocomplete="off" />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Grade /
                                                                        %</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="GradeorPercentage"
                                                                        id="GradeorPercentage" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Passout-Year</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Passoutyear"
                                                                        id="Passoutyear" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Select_file</label>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input type="file" class="form-control"
                                                                            ng-model="clearinput" id="fileInput04"
                                                                            name=files[]
                                                                            accept="image/png, image/gif, image/jpeg,application/pdf">
                                                                        <div class="input-group-append">
                                                                            <p id="fileButton04"
                                                                                class="input-group-text">
                                                                                <i class="fa fa-upload"></i>
                                                                            </p>
                                                                        </div>


                                                                    </div>




                                                                </td>
                                                            </tr>

                                                        </table>

                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered  table-sm table-striped">
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
                                                                                    data-target="#ModalCenter1Education"
                                                                                    ng-click="FetchStudy(e.Employeeid,e.Sno);"
                                                                                    src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                                <img height="15"
                                                                                    ng-click="FetchStudy(e.Employeeid,e.Sno);"
                                                                                    src="<?php echo "$domain"; ?>/assets/icons/edit.png">

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
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_Education();">Update</button>
                                                <button class="btn btn-rounded btn-info"
                                                    ng-click="ResetEducation();">Clear(Next)</button>
                                            </div>
                                        </div>
                                        <div class="card" ng-show="btnFamily">
                                            <h5 class="card-header">Employee Family Details</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-4">

                                                        <table class="table table-bordered table-sm">
                                                            <tr>
                                                                <td> <label class="col-form-label">Name</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="FamilyName" />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Relationship</label>
                                                                </td>
                                                                <td> <select ng-model="Familyrelationship"
                                                                        class="form-control">

                                                                        <option ng-repeat="s in GetRelationshipList "
                                                                            value="{{s.Relationship}}">
                                                                            {{s.Relationship}}</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Age</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="FamilyAge" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Contact
                                                                        No</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="FamilyContactno"
                                                                        onkeypress="return Validate(event);" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Occupation</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="FamilyOccupation" />
                                                                </td>
                                                            </tr>

                                                        </table>

                                                    </div>
                                                    <div class="col-lg-8">
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
                                                            <dir-pagination-controls pagination-id="Familygrid"
                                                                max-size="3" direction-links="true"
                                                                boundary-links="true" class="pagination">
                                                            </dir-pagination-controls>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_Family();">Update</button>
                                                <button class="btn btn-rounded btn-info"
                                                    ng-click="ResetFamily();">Clear(Next)</button>
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
                                                                <td> <label
                                                                        class="col-form-label">Reference_Name</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="Reference1name" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Contactno</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="Reference1contactno"
                                                                        onkeypress="return Validate(event);" />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Address</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="Reference1address" />
                                                                </td>
                                                            </tr>

                                                        </table>

                                                    </div>
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-6">
                                                        <h3>Reference 2 Detail</h3>
                                                        <table class="table table-bordered table-sm">
                                                            <tr>
                                                                <td> <label
                                                                        class="col-form-label">Reference_Name</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="Reference2name" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Contactno</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="Reference2contactno"
                                                                        onkeypress="return Validate(event);" />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Address</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="Reference2address" />
                                                                </td>
                                                            </tr>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_refrence();">Update</button>

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
                                                            <td> <label class="col-form-label">Basic+Da</label>
                                                            </td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="Basic" autocomplete="off"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()"
                                                                    onkeypress="return Validate(event);">
                                                            </td>
                                                            <td> <label class="col-form-label">HR_Allowance</label>
                                                            </td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="HR_Allowance" autocomplete="off"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()">
                                                            </td>
                                                            <td> <label class="col-form-label">Travel Allowance
                                                                </label></td>
                                                            <td> <input type="text" class="form-control" ng-model="TA"
                                                                    autocomplete="off"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label
                                                                    class="col-form-label">Performance_allowance</label>
                                                            </td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="Performance_allowance" autocomplete="off"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()">
                                                            </td>
                                                            <td> <label class="col-form-label">Day_allowance</label>
                                                            </td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="Day_allowance" autocomplete="off"
                                                                    onkeypress="return Validate(event);"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()">
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
                                                                    autocomplete="off">
                                                            </td>
                                                            <td> <label class="col-form-label">Professional_tax
                                                                </label></td>
                                                            <td> <input type="text" class="form-control"
                                                                    ng-model="Professional_tax" autocomplete="off"
                                                                    onkeypress="return Validate(event);">
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
                                                                    ng-model="Other_Allowance" autocomplete="off"
                                                                    onkeypress="return Validate(event);">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label class="col-form-label">PF_Yesandno</label>
                                                            </td>
                                                            <td>
                                                                <select class="form-control" ng-model="PF_Yesandno"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()">
                                                                    <option Value="Yes">Yes</option>
                                                                    <option value="No">No</option>


                                                                </select>


                                                            </td>
                                                            <td> <label class="col-form-label">ESI_Yesandno</label>
                                                            </td>
                                                            <td>
                                                                <select class="form-control" ng-model="ESI_Yesandno"
                                                                    ng-model-options='{ debounce: 1000 }'
                                                                    ng-change="Getcalvalue()">
                                                                    <option Value="Yes">Yes</option>
                                                                    <option value="No">No</option>


                                                                </select>


                                                            </td>


                                                        </tr>

                                                    </table>

                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_Salary();">Update</button>
                                            </div>
                                        </div>
                                        <div class="card" ng-show="btndoc">
                                            <h5 class="card-header">Employee Document Details</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-5">

                                                        <table class="table table-bordered table-sm">
                                                            <tr>
                                                                <td> <label class="col-form-label">S.No</label>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" ng-model="DocNextno"
                                                                        autocomplete="off" id='DocNextno' readonly />

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Document_Type</label>
                                                                </td>
                                                                <td>

                                                                    <select ng-model="Documenttype" id='Documenttype'
                                                                        class="form-control">

                                                                        <option ng-repeat="s in GetDoctypeList "
                                                                            value="{{s.Documenttype}}">
                                                                            {{s.Documenttype}}</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Documentno</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Documentno"
                                                                        autocomplete="off" id='Documentno' />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Select_file</label>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input type="file" class="form-control"
                                                                            ng-model="clearinput" id="fileInput"
                                                                            name=files[]>
                                                                        <div class="input-group-append">
                                                                            <p id="fileButton" class="input-group-text">
                                                                                <i class="fa fa-upload"></i>
                                                                            </p>
                                                                        </div>


                                                                    </div>




                                                                </td>
                                                            </tr>


                                                        </table>

                                                    </div>
                                                    <div class="col-lg-7">
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
                                                            <dir-pagination-controls pagination-id="Docgrid"
                                                                max-size="3" direction-links="true"
                                                                boundary-links="true" class="pagination">
                                                            </dir-pagination-controls>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_document();">Update</button>
                                                <button class="btn btn-rounded btn-info"
                                                    ng-click="Resetdoc();">Clear(Next)</button>
                                            </div>
                                        </div>
                                        <div class="card" ng-show="btnimage">
                                            <h5 class="card-header">Employee Image Upload</h5>
                                            <div class="card-body">
                                                <div class="row">

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <img ng-src="{{Imagepath}}"
                                                            ng-hide="Imagepath == null || Imagepath == '' "
                                                            ng-show="Imagepath != null " class="img-thumbnail mr-3"
                                                            alt="Employee_image" style="width:150px;height:150px;">
                                                    </div>
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-7">
                                                        <br>
                                                        <br>

                                                        <table class="table table-bordered table-sm">



                                                            <tr>
                                                                <td> <label class="col-form-label">Image_Upload</label>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input type="file" class="form-control"
                                                                            ng-model="clearinput01" id="fileInput01"
                                                                            accept="image/*" name=files[]
                                                                            ng-model="Empimage">
                                                                        <div class="input-group-append">
                                                                            <p id="fileButton01"
                                                                                class="input-group-text"><i
                                                                                    class="fa fa-upload"></i>
                                                                            </p>
                                                                        </div>


                                                                    </div>




                                                                </td>

                                                            </tr>


                                                        </table>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="card" ng-show="btnpromotion">
                                            <h5 class="card-header">Department / Designation Details</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="table-responsive custom-table custom-table-noborder col-lg-4">

                                                        <table class="table table-bordered table-sm">

                                                            <tr>
                                                                <td> <label class="col-form-label">S.no</label>
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        ng-model="PromotionNextno" autocomplete="off"
                                                                        readonly />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Department</label>
                                                                </td>
                                                                <td> <select ng-model="Department" class="form-control">

                                                                        <option ng-repeat="s in GetDepartmentList "
                                                                            value="{{s.Department}}">
                                                                            {{s.Department}}</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">Designation</label>
                                                                </td>
                                                                <td> <select ng-model="Designation"
                                                                        class="form-control">

                                                                        <option ng-repeat="s in GetDesignationList "
                                                                            value="{{s.Designation}}">
                                                                            {{s.Designation}}</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label"
                                                                        title="From_Date">From</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Fromperiod"
                                                                        onfocus="(this.type='date')"
                                                                        onblur="(this.type='date')"
                                                                        ng-change="GetDeptDays();">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label"
                                                                        title="To_Date">To</label>
                                                                </td>
                                                                <td> <input type="text" class="form-control"
                                                                        ng-model="Toperiod" onfocus="(this.type='date')"
                                                                        onblur="(this.type='date')"
                                                                        ng-change="GetDeptDays();">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Period</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Period"
                                                                        autocomplete="off" readonly />
                                                                </td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td> <label class="col-form-label">Years</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Postingyear"
                                                                        autocomplete="off" readonly/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Month</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Postingmonth"
                                                                        autocomplete="off" readonly/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Days</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Postingdays"
                                                                        autocomplete="off" readonly/>
                                                                </td>
                                                            </tr> -->
                                                        </table>

                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered  table-sm table-striped">
                                                                <thead>
                                                                    <tr>

                                                                        <th>No</th>
                                                                        <th scope="col">Department</th>
                                                                        <th scope="col">Designation</th>

                                                                        <th scope="col">Period</th>

                                                                        <th scope="col">Action</th>
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


                                                                        <td>
                                                                            <div class="action-btn">
                                                                                <img height="15"
                                                                                    ng-click="FetchPromotion(e.Employeeid,e.Sno);"
                                                                                    src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="pagination">
                                                            <dir-pagination-controls pagination-id="Deptgrid"
                                                                max-size="3" direction-links="true"
                                                                boundary-links="true" class="pagination">
                                                            </dir-pagination-controls>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="Update_DEPT();">Update</button>
                                                <button class="btn btn-rounded btn-info"
                                                    ng-click="ResetPromotion();">Clear(Next)</button>
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
                                                                        autocomplete="off" id="Bankname" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Accountno</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Accountno"
                                                                        autocomplete="off" id="Accountno" />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td> <label class="col-form-label">IFSCcode</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="IFSCcode"
                                                                        autocomplete="off" id="IFSCcode" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Branch</label>
                                                                </td>
                                                                <td> <input class="form-control" ng-model="Branch"
                                                                        autocomplete="off" id="Branch" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> <label class="col-form-label">Select_file</label>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input type="file" class="form-control"
                                                                            ng-model="clearinput" id="fileInput03"
                                                                            name=files[]
                                                                            accept="image/png, image/gif, image/jpeg,application/pdf">
                                                                        <div class="input-group-append">
                                                                            <p id="fileButton03"
                                                                                class="input-group-text">
                                                                                <i class="fa fa-upload"></i>
                                                                            </p>
                                                                        </div>


                                                                    </div>




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
                                            <div class="form-group text-right">
                                                <button class="btn btn-rounded btn-success"
                                                    ng-click="UpdateBank();">Update</button>

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

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>