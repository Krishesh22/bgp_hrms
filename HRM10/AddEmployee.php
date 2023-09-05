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
            <div class="container-fluid">


                <div class="container-fluid dashboard-content">
                    <div class="row">
                        <div class="col-md-12">




                            <div class="card">
                                <h5 class="card-header text-green">Employee Creation</h5>
                                <div class="card-body">


                                    <div class="row">


                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Employee ID</label>
                                            <input type="text" class="form-control" ng-model="Employeeid"
                                                autocomplete="off" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Category</label>

                                            <select class="form-control" ng-model="Category"
                                                ng-change="GetNextnoByCategory(Category,EmpDepartment);" ng-show="btnsave">
                                                <option value="Category 1">Category 1
                                                </option>
                                                <option value="Category 2">Category 2</option>
                                                <option value="Category 3">Category 3</option>

                                            </select>
                                            <select class="form-control" ng-model="Category"
                                                ng-change="GetAdminCategory(Category);" ng-show="btnupdate">
                                                <option value="Category 1">Category 1
                                                </option>
                                                <option value="Category 2">Category 2</option>
                                                <option value="Category 3">Category 3</option>

                                            </select>

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Department</label>



                                            <select ng-model="EmpDepartment" class="form-control" ng-show="btnsave"
                                                ng-change="GetNextnoByCategory(Category,EmpDepartment);">

                                                <option ng-repeat="s in GetDepartmentList " value="{{s.Department}}">
                                                    {{s.Department}}</option>
                                            </select>


                                            <select ng-model="EmpDepartment" class="form-control" ng-show="btnupdate"
                                                >

                                                <option ng-repeat="s in GetDepartmentList " value="{{s.Department}}">
                                                    {{s.Department}}</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">First Name</label>
                                            <div class="input-group "><span class="input-group-prepend">
                                                    <select class="input-group-text" ng-model="Title">
                                                        <option Value="Mr.">Mr.</option>
                                                        <option value="Mrs.">Mrs.</option>
                                                        <option value="Miss.">Miss.</option>
                                                        <option value="Ms.">Ms.</option>
                                                        <option value="Shri.">Shri.</option>
                                                    </select></span>
                                                <input type="text" placeholder="Firstname" class="form-control"
                                                    ng-model="Firstname">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Last Name </label>
                                            <input type="text" class="form-control" ng-model="Lastname"
                                                autocomplete="off">
                                        </div>
                                     
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Gender</label>
                                            <select class="form-control" ng-model="Gender">
                                                <option Value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>

                                   

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Married</label>
                                            <select class="form-control" ng-model="Married">
                                                <option Value="Yes">Yes</option>
                                                <option value="No">No</option>

                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">MotherTongue </label>
                                            <select ng-model="Mothertongue" class="form-control">

                                                <option ng-repeat="s in GetLanguageList " value="{{s.Languages}}">
                                                    {{s.Languages}}</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Contact No</label>
                                            <input type="text" class="form-control" ng-model="Contactno"
                                                autocomplete="off" onkeypress="return Validate(event);" maxlength="10"
                                                ng-change="GetContactnounique(Contactno)">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Nationality</label>
                                            <input type="text" class="form-control" ng-model="Nationality"
                                                autocomplete="off">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Email-ID</label>
                                            <input type="text" class="form-control" ng-model="Emailid"
                                                autocomplete="email" ng-model-options='{ debounce: 1000 }'
                                                ng-change="emailchecking02(Emailid)">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Employee Type</label>
                                            <select class="form-control" ng-model="EmployeeType">
                                                <option Value="Permanent">Permanent</option>
                                                <option value="Temporary">Temporary</option>

                                            </select>
                                        </div>
                        

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Designation</label>
                                            <select ng-model="EmpDesignation" class="form-control">

                                                <option ng-repeat="s in GetDesignationList " value="{{s.Designation}}">
                                                    {{s.Designation}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Qualification</label>
                                            <select ng-model="Highestqualification" class="form-control"
                                                id="Highestqualification">
                                                <option ng-repeat="s in GetQualififcationList" value="{{s.Degree}}">
                                                    {{s.Degree}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Father/ Spouse Name</label>
                                            <input type="text" class="form-control" ng-model="FatherGuardianSpouseName"
                                                placeholder="Enther Father / Spouse Name" autocomplete="off">
                                        </div>

                                        <div class="text-right mt-25">
                                            <button class="btn btn-rounded btn-success" ng-click="SaveEmployee();"
                                                ng-show="btnsave"  ng-disabled="btnsaveadmin">Save</button>
                                            <button class=" btn btn-rounded btn-success" ng-click="Update_Major();"
                                                ng-show="btnupdate">Update</button>
                                            <button class="btn btn-rounded  btn-primary "
                                                ng-click="Reset();">Reset</button>
                                        </div>


                                    </div>

                                    <div class="alert alert-success" role="alert" ng-show="Message" id='msg1'>
                                        {{Message}}
                                    </div>
                                    <div class="tab-list" style="overflow-x: hidden; padding-right: 0px;"
                                    ng-show="btnupdate">
                                        <ul class="nav nav-pills nav-fill">
                                            <li class="nav-item" ng-click="fnotherinfo();"><a>Personal</a>
                                            </li>
                                            <li class="nav-item" ng-click="fneducationinfo();">
                                                <a>Education</a>
                                            </li>
                                            <li class="nav-item" ng-click="fnaddressinfo();">
                                                <a>Address</a>
                                            </li>
                                            <li class="nav-item" ng-click="fnbankinfo();"><a>Bank
                                                    Ac</a></li>
                                            <li class="nav-item" ng-click="fnfamilyinfo();"><a>Family Info
                                                </a></li>
                                            <li class="nav-item" ng-click="fnrefinfo();"><a>Reference</a>
                                            </li>
                                            <li class="nav-item" ng-click="fnvaccinationinfo();">
                                                <a>Vaccination</a>
                                            </li>

                                            <li class="nav-item" ng-click="fnpropertychecklistinfo();">
                                                            <a> Asset</a>
                                            </li>
                                            <li class="nav-item" ng-click="fnsalaryinfo();"><a>Salary </a>
                                            </li>
                                            <li class="nav-item" ng-click="fndocinfo();"><a>Document</a>
                                            </li>

                                            <li class="nav-item" ng-click="fnNomineeinfo();"><a>Nominee</a>
                                            </li>
                                            <li class="nav-item" ng-click="fnimageinfo();"><a>Image</a></li>
                                            <li class="nav-item" ng-click="fnappraisalinfo();"><a>Appraisal
                                                </a></li>

                                            <li class="nav-item" ng-click="fnidcardinfo();">
                                                <a>ID Card</a>
                                            </li>

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


                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="col-form-label">Languages</label>
                                                <ul class="pl-0">
                                                    <li ng-repeat="p in GetLanguageList"
                                                        style=" list-style-type: none;">
                                                        <input type="checkbox" ng-model="selected[p.Languages]"
                                                            value="{{p.Languages}}" />
                                                        <span>{{p.Languages}}</span>
                                                </ul>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-10">

                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">DOB</label>
                                                    <input type="text" class="form-control" ng-model="Dob"
                                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                                        ng-change="Getage();">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Age</label>
                                                    <input type="text" class="form-control" ng-model="Age"
                                                        autocomplete="off" readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Blood Group</label>
                                                    <input type="text" class="form-control" ng-model="Bloodgroup"
                                                        autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Experience</label>
                                                    <input type="text" class="form-control" ng-model="Expereience"
                                                        autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Fresher</label>
                                                    <select class="form-control" ng-model="Fresher">
                                                        <option Value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Date Of Joing</label>
                                                    <input type="text" class="form-control" ng-model="Date_Of_Joing"
                                                        onfocus="(this.type='date')" onblur="(this.type='date')">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Shift</label>
                                                    <select ng-model="Shift" class="form-control">
                                                        <option ng-repeat="s in GetShiftList " value="{{s.Shift}}">
                                                            {{s.Shift}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Allow_OT</label>

                                                    <input type="text" class="form-control" ng-model="AllowOT"
                                                        autocomplete="off" readonly>

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Allow_LOP</label>
                                                    <select class="form-control" ng-model="AllowLOP">
                                                        <option Value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Salary_Mode</label>
                                                    <select class="form-control" ng-model="Salary_Mode">
                                                        <option Value="Bank">Bank</option>
                                                        <option value="Cash">Cash</option>


                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Week_Off</label>
                                                    <select class="form-control" ng-model="Weekoff">
                                                        <option Value="Sunday">Sunday</option>
                                                        <option value="Monday">Monday</option>
                                                        <option Value="Tuesday">Tuesday</option>
                                                        <option value="Wednesday">Wednesday</option>
                                                        <option Value="Thursday">Thursday</option>
                                                        <option value="Friday">Friday</option>
                                                        <option Value="Saturday">Saturday</option>



                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Employee_CL</label>
                                                    <input type="text" class="form-control" ng-model="Employee_CL"
                                                        autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">UAN No</label>
                                                    <input class="form-control" autocomplete="off" ng-model="UANno"
                                                        onkeypress="return Validate(event);" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">ESI No </label>
                                                    <input class="form-control" autocomplete="off" ng-model="ESIno" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Aadhar No</label>
                                                    <input type="text" class="form-control" ng-model="Aadharno"
                                                        autocomplete="off" onkeypress="return Validate(event);">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">PAN No</label>
                                                    <input class="form-control" autocomplete="off" ng-model="Panno" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">PF Joining Date</label>
                                                    <input type="text" class="form-control" ng-model="PFJoiningdate"
                                                        onfocus="(this.type='date')" onblur="(this.type='date')">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">ESI Joining Date </label>
                                                    <input type="text" class="form-control" ng-model="ESIJoiningdate"
                                                        onfocus="(this.type='date')" onblur="(this.type='date')">
                                                </div>

                                                <div class="form-group col-md-6" ng-show="btnverification">
                                                    <label class="col-form-label">Background Verification
                                                        Document
                                                    </label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" ng-model="clearinput"
                                                            id="fileInputBackgroundVerification" name=files[]
                                                            accept="application/pdf">
                                                        <div class="input-group-append">
                                                            <p id="fileButtonBackgrounverification"
                                                                class="input-group-text">
                                                                <i class="fa fa-upload"></i>
                                                            </p>
                                                            <p class="input-group-text"
                                                                ng-click="FetchEmployee(Employeeid);"
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
                                                    <select class="form-control" ng-model="BackgroundVerification">
                                                        <option Value="Yes">Yes</option>
                                                        <option value="No">No</option>




                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                                <label class="col-form-label">Official Mail ID </label>
                                                                <input type="email" class="form-control" ng-model="OfficemailID"
                                                autocomplete="email" ng-model-options='{ debounce: 1000 }'
                                                ng-change="emailchecking(OfficemailID)" >
                                                            </div>
                                                <div class="form-group col-md-6">

                                                    <div class="mt-25 text-right">
                                                        <button class="btn btn-sm btn-success"
                                                            ng-click="Update_Other_info();"><i class="fa fa-save"></i>
                                                            Update</button>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="card" ng-show="btnaddress">
                                <h5 class="card-header text-green">Permanent and Temporary Address Detail
                                </h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="text-green">Temporary Address Detail</h5>
                                            <div class="emp-adrbox">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Address</label>
                                                        <input class="form-control" ng-model="CurrentAddress" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Country</label>
                                                        <select ng-model="CurrentCountry" ng-change="GetCurrentState();"
                                                            class="form-control">
                                                            <option ng-repeat="s in GetCountryList "
                                                                value="{{s.Country}}">
                                                                {{s.Country}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">State</label>
                                                        <select ng-model="CurrentState" class="form-control"
                                                            ng-change="GetCurrentCity();">
                                                            <option ng-repeat="s in GetStateList " value="{{s.State}}">
                                                                {{s.State}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">City</label>
                                                        <select ng-model="CurrentCity" class="form-control">
                                                            <option ng-repeat="s in GetCityList " value="{{s.City}}">
                                                                {{s.City}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Pincode</label>
                                                        <input class="form-control" ng-model="CurrentPincode" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="text-green">Permanent Address Details</h5>
                                            <div class="emp-adrbox">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Address</label>
                                                        <input class="form-control" ng-model="PermanentAddress" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Country</label>
                                                        <select ng-model="PermanentCountry" ng-change="GetPerstate();"
                                                            class="form-control">
                                                            <option ng-repeat="s in GetCountryList "
                                                                value="{{s.Country}}">
                                                                {{s.Country}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">State</label>
                                                        <select ng-model="PermanentState" ng-change="GetPerCity();"
                                                            class="form-control">
                                                            <option ng-repeat="s in GetPerStateList "
                                                                value="{{s.State}}">
                                                                {{s.State}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">City</label>
                                                        <select ng-model="PermanentCity" class="form-control">
                                                            <option ng-repeat="s in GetPerCityList " value="{{s.City}}">
                                                                {{s.City}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Pincode</label>
                                                        <input class="form-control" ng-model="PermanentPincode" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-right mt-3">
                                        <button class="btn btn-rounded btn-success" ng-click="UpdateAddress();">
                                            <i class="fa fa-save"></i> Update </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card" ng-show="btnbank">
                                <h5 class="card-header text-green">Bank Account Details</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label">Bankname</label>
                                            <input class="form-control" ng-model="Bankname" autocomplete="off"
                                                id="Bankname" />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label">Accountno</label>
                                            <input class="form-control" ng-model="Accountno" autocomplete="off"
                                                id="Accountno" />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label">IFSCcode</label>
                                            <input class="form-control" ng-model="IFSCcode" autocomplete="off"
                                                id="IFSCcode" />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label">Branch</label>
                                            <input class="form-control" ng-model="Branch" autocomplete="off"
                                                id="Branch" />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label">Passbook</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" ng-model="clearinput"
                                                    id="fileInput03" name=files[]
                                                    accept="image/png, image/gif, image/jpeg,application/pdf">
                                                <div class="input-group-append">
                                                    <p id="fileButton03" class="input-group-text">
                                                        <i class="fa fa-upload"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <iframe ng-src="{{Emppassbook}}"
                                                ng-hide="Emppassbook == null || Emppassbook == '' "
                                                ng-show="Emppassbook != null " style="height:350px;width:100%"></iframe>
                                        </div>
                                        <div class="form-group text-right col-md-12">
                                            <button class="btn btn-sm mt-25 btn-success" ng-click="UpdateBank();">
                                                <i class="fa fa-save"></i> Update </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" ng-show="btnEducation">
                                <h5 class="card-header text-green">Employee Education Details</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="table-responsive custom-table custom-table-noborder col-lg-4">
                                            <table class="table table-bordered table-sm">
                                                <tr>
                                                    <td>
                                                        <label class="col-form-label">S.No</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" ng-model="EduNextno" id="EduNextno"
                                                            readonly />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="col-form-label">Studied</label>
                                                    </td>
                                                    <td>
                                                        <select ng-model="Employeestudied" class="form-control"
                                                            id="Employeestudied">
                                                            <option ng-repeat="s in GetQualififcationList"
                                                                value="{{s.Degree}}">
                                                                {{s.Degree}}
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="col-form-label">University/School</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" ng-model="UniversityorSchool"
                                                            id="UniversityorSchool" autocomplete="off" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="col-form-label">Grade / %</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" ng-model="GradeorPercentage"
                                                            id="GradeorPercentage" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="col-form-label">Passout-Year</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" ng-model="Passoutyear"
                                                            id="Passoutyear" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="col-form-label">Select_file</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control"
                                                                ng-model="clearinput" id="fileInput04" name=files[]
                                                                accept="image/png, image/gif, image/jpeg,application/pdf">
                                                            <div class="input-group-append">
                                                                <p id="fileButton04" class="input-group-text">
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
                                                                        ng-click="FetchStudy(e.Employeeid,e.Sno);" src="
                                                                <?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                    <img height="15"
                                                                        ng-click="FetchStudy(e.Employeeid,e.Sno);" src="
                                                    <?php echo "$domain"; ?>/assets/icons/edit.png">
                                                                    <img height="15" data-toggle="modal"
                                                                        data-target="#ModalCenter1EMPDocumentView"
                                                                        ng-click="FetchStudy(e.Employeeid,e.Sno);" src="
                                                        <?php echo "$domain"; ?>/assets/icons/view.png">
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
                                    <div class="form-group text-right">
                                        <button class="btn btn-rounded btn-success" ng-click="Update_Education();">
                                            <i class="fa fa-save"></i> Update </button>
                                        <button class="btn btn-rounded btn-danger" ng-click="ResetEducation();">
                                            <i class="fa fa-times"></i> Clear(Next) </button>
                                    </div>
                                </div>
                            </div>


                            <div class="card" ng-show="btnFamily">
                                <h5 class="card-header text-green">Employee Family Details</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Name</label>
                                                <input class="form-control" ng-model="FamilyName" />
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Relationship</label>
                                                <select ng-model="Familyrelationship" class="form-control">
                                                    <option ng-repeat="s in GetRelationshipList "
                                                        value="{{s.Relationship}}">
                                                        {{s.Relationship}}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Age</label>
                                                    <input class="form-control" ng-model="FamilyAge" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Contact No </label>
                                                    <input class="form-control" ng-model="FamilyContactno"
                                                        onkeypress="return Validate(event);" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Occupation</label>
                                                <input class="form-control" ng-model="FamilyOccupation" />
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-sm btn-success" ng-click="Update_Family();">
                                                    <i class="fa fa-save"></i> Update </button>
                                                <button class="btn btn-sm btn-danger" ng-click="ResetFamily();">
                                                    <i class="fa fa-times"></i> Clear(Next) </button>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
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
                                                                        ng-click="FetchFamily(e.Employeeid,e.Sno);" src="
                                            <?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                    <img height="15"
                                                                        ng-click="FetchFamily(e.Employeeid,e.Sno);" src="
                                                <?php echo "$domain"; ?>/assets/icons/edit.png">
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
                                </div>
                            </div>


                            <div class="card" ng-show="btnNominee">
                                <h5 class="card-header text-green">Employee Nominee Detail</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-3">
                                            <label class="col-form-label">Name</label>
                                            <input class="form-control" ng-model="NomineeName" />
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-form-label">Relationship</label>
                                            <select ng-model="NomineeRelationship" class="form-control">
                                                <option ng-repeat="s in GetRelationshipList "
                                                    value="{{s.Relationship}}">
                                                    {{s.Relationship}}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-form-label">DOB</label>
                                            <input class="form-control" ng-model="NomineeDateOfBirth"
                                                onfocus="(this.type='date')" onblur="(this.type='date')"
                                                ng-change="GetNomineeage()" />
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-form-label">Age</label>
                                            <input class="form-control" ng-model="NomineeAge" readonly />
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-form-label">Guardian Name</label>
                                            <input class="form-control" ng-model="Guardianname" />
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-form-label">Contact No</label>
                                            <input class="form-control" ng-model="RelationshipContactno"
                                                onkeypress="return Validate(event);" maxlength="10" />
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-form-label">Amount</label>
                                            <input class="form-control" ng-model="PercentageofShare"
                                                onkeypress="return Validate(event);" />
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-form-label">Address</label>
                                            <textarea class="form-control" ng-model="NomineeAddress"></textarea>
                                        </div>
                                        <div class="form-group col-lg-12 text-right">
                                            <button class="btn btn-sm btn-success" ng-click="Update_NomineeFamily();">
                                                <i class="fa fa-save"></i> Update </button>
                                            <button class="btn btn-sm btn-danger" ng-click="ResetNomineeFamily();">
                                                <i class="fa fa-times"></i> Clear(Next) </button>
                                        </div>


                                        <div class="table-responsive col-lg-12">
                                            <table class="table table-bordered  table-sm table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Relationship</th>
                                                        <th scope="col">Age</th>
                                                        <th scope="col">Contactno</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr dir-paginate="e in GetNomineeList |filter:searchFamily|itemsPerPage:10 "
                                                        pagination-id="Nomineegrid" current-page="currentPageNominee">
                                                        <td style="width: 50px;">
                                                            {{$index+1 + (currentPageNominee - 1) * pageSizeNominee}}
                                                        </td>
                                                        <td>{{e.NomineeName}}</td>
                                                        <td>{{e.NomineeRelationship}}</td>
                                                        <td>{{e.NomineeAge}}</td>
                                                        <td>{{e.RelationshipContactno}}</td>
                                                        <td>
                                                            <div class="action-btn">
                                                                <img height="15" data-toggle="modal"
                                                                    data-target="#ModalCenter1EmpNominee"
                                                                    ng-click="FetchEmpNominee(e.Employeeid,e.Sno);"
                                                                    src="                                                                         <?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                <img height="15"
                                                                    ng-click="FetchEmpNominee(e.Employeeid,e.Sno);" src="
                                            <?php echo "$domain"; ?>/assets/icons/edit.png">
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
                            </div>


                            <div class="card" ng-show="btnReference">
                                <h5 class="card-header text-green">Reference Details</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="emp-adrbox">
                                                <h5 class="text-green">Reference 1 Detail</h5>

                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Reference_Name</label>
                                                    <input class="form-control" ng-model="Reference1name" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Contactno</label>
                                                    <input class="form-control" ng-model="Reference1contactno"
                                                        onkeypress="return Validate(event);" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Address</label>
                                                    <input class="form-control" ng-model="Reference1address" />
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-6">

                                            <div class="emp-adrbox">
                                                <h5 class="text-green">Reference 2 Detail</h5>

                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Reference_Name</label>
                                                    <input class="form-control" ng-model="Reference2name" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Contactno</label>
                                                    <input class="form-control" ng-model="Reference2contactno"
                                                        onkeypress="return Validate(event);" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Address</label>
                                                    <input class="form-control" ng-model="Reference2address" />
                                                </div>

                                            </div>




                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-right" style="margin-right: 15px;">
                                                <button class="btn btn-sm btn-success" ng-click="Update_refrence();">
                                                    <i class="fa fa-save"></i> Update </button>
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

                            <div class="card" ng-show="btnvaccination">
                                <h5 class="card-header text-green">Vaccination Details</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label"> S.No </label>
                                            <input type="text" class="form-control" id="Vaccinatedsno"
                                                ng-model="Vaccinatedsno" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label"> Covid Vaccinated </label>
                                            <select class="form-control" id="Covidvaccinated"
                                                ng-model="Covidvaccinated">
                                                <option Value="1st Dose">1st Dose </option>
                                                <option value="2nd Dose">2nd Dose </option>
                                                <option value="Booster">Booster </option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label"> Vaccinated date </label>
                                            <input type="text" class="form-control" id="Vaccinateddate"
                                                ng-model="Vaccinateddate" onfocus="(this.type='date')"
                                                onblur="(this.type='date')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label">Certificate</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" ng-model="clearinput"
                                                    id="fileInput05" name=files[]
                                                    accept="image/png, image/gif, image/jpeg,application/pdf">
                                                <div class="input-group-append">
                                                    <p id="fileButton05" class="input-group-text">
                                                        <i class="fa fa-upload"></i>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-sm btn-success" ng-click="UpdateVaccination();">
                                            <i class="fa fa-save"></i> Update </button>
                                        <button class="btn btn-sm btn-success" ng-click="ResetVaccination();">
                                            <i class="fa fa-save"></i> Reset </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table   table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th scope="col"> Vaccinated </th>
                                                            <th scope="col"> Date </th>
                                                            <th scope="col">Action </th>
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
                                                                    <img height="15" data-toggle="modal"
                                                                        data-target="#ModalCenter1Vaccination"
                                                                        ng-click="FetchCovidvaccination(e.Employeeid,e.Sno);"
                                                                        src="
                                                        <?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                    <img height="15"
                                                                        ng-click="FetchCovidvaccination(e.Employeeid,e.Sno);"
                                                                        src="
                                                            <?php echo "$domain"; ?>/assets/icons/edit.png">
                                                                    <img height="15"
                                                                        ng-click="FetchCovidvaccination(e.Employeeid,e.Sno);"
                                                                        data-toggle="modal"
                                                                        data-target="#ModalCenter1Certificate" src="
                                                                <?php echo "$domain"; ?>/assets/icons/view.png">
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

                            <div class="card" ng-show="btnsalary">
                                <h5 class="card-header text-green">Salary Information</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Basic+Da</label>
                                            <input type="text" class="form-control" ng-model="Basic" autocomplete="off"
                                                ng-model-options='{ debounce: 1000 }' ng-change="Getcalvalue()"
                                                onkeypress="return Validate(event);">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">HR_Allowance</label>
                                            <input type="text" class="form-control" ng-model="HR_Allowance"
                                                autocomplete="off" onkeypress="return Validate(event);"
                                                ng-model-options='{ debounce: 1000 }' ng-change="Getcalvalue()">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label"> Conveyence </label>
                                            <input type="text" class="form-control" ng-model="TA" autocomplete="off"
                                                onkeypress="return Validate(event);"
                                                ng-model-options='{ debounce: 1000 }' ng-change="Getcalvalue()">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label"> Performance_allowance </label>
                                            <input type="text" class="form-control" ng-model="Performance_allowance"
                                                autocomplete="off" onkeypress="return Validate(event);"
                                                ng-model-options='{ debounce: 1000 }' ng-change="Getcalvalue()">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Day_allowance</label>
                                            <input type="text" class="form-control" ng-model="Day_allowance"
                                                autocomplete="off" onkeypress="return Validate(event);"
                                                ng-model-options='{ debounce: 1000 }' ng-change="Getcalvalue()"
                                                ng-disabled="btnMarketing">
                                        </div>

                                        <div class="form-group col-md-3">
                                                        <label class="col-form-label">PF_Yesandno</label>
                                                        <select class="form-control" ng-model="PF_Yesandno"
                                                            
                                                            ng-change="Getcalvalue(); GetPFFixed(PF_Yesandno);">
                                                            <option Value="Yes">Yes</option>
                                                            <option value="No">No</option>


                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3" ng-show="btnpffixed">
                                                        <label class="col-form-label">PF_Fixed</label>
                                                        <select class="form-control" id="PF_Fixed" ng-model="PF_Fixed"
                                                             
                                                            ng-change="Getcalvalue()">
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>


                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">PF</label>
                                                        <input type="text" class="form-control FIXED" ng-model="PF"
                                                            autocomplete="off" readonly>
                                                            <input type="text" ng-change="Getcalvalue()" class="form-control NOTFIXED" ng-model="PF"
                                                            autocomplete="off" >
                                                    </div>

                                             <div class="form-group col-md-3">
                                            <label class="col-form-label">ESI_Yesandno</label>
                                            <select class="form-control" ng-model="ESI_Yesandno"
                                                ng-model-options='{ debounce: 1000 }' ng-change="Getcalvalue(); GetAllowESI(ESI_Yesandno)">
                                                <option Value="Yes">Yes</option>
                                                <option value="No">No</option>


                                            </select>
                                        </div>

                                        <div class="form-group col-md-3" ng-show="btnesino">
                                            <label class="col-form-label">ESI</label>
                                            <input type="text" class="form-control" ng-model="ESI" autocomplete="off"
                                                >
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">TDS</label>
                                            <input type="text" class="form-control" ng-model="TDS" autocomplete="off">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Professional_tax</label>
                                            <input type="text" class="form-control" ng-model="Professional_tax"
                                                autocomplete="off" onkeypress="return Validate(event);">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Net_Salary</label>
                                            <input type="text" class="form-control" ng-model="Net_Salary"
                                                autocomplete="off" readonly>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Gross_Salary</label>
                                            <input type="text" class="form-control" ng-model="Gross_Salary"
                                                autocomplete="off" readonly>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Other_Allowance</label>
                                            <input type="text" class="form-control" ng-model="Other_Allowance"
                                                autocomplete="off" onkeypress="return Validate(event);">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">PF_Yesandno</label>
                                            <select class="form-control" ng-model="PF_Yesandno"
                                                ng-model-options='{ debounce: 1000 }' ng-change="Getcalvalue()">
                                                <option Value="Yes">Yes</option>
                                                <option value="No">No</option>


                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">ESI_Yesandno</label>
                                            <select class="form-control" ng-model="ESI_Yesandno"
                                                ng-model-options='{ debounce: 1000 }' ng-change="Getcalvalue()">
                                                <option Value="Yes">Yes</option>
                                                <option value="No">No</option>


                                            </select>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Type</label>
                                            <select class="form-control" ng-model="SalaryType">

                                                <option Value="Normal">Normal</option>
                                                <option value="Appraisal">Appraisal</option>


                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="text-right mt-4">
                                                <button class="btn btn-sm btn-success" ng-click="Update_Salary();"><i
                                                        class="fa fa-save"></i>
                                                    Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card" ng-show="btnimage">
                                <h5 class="card-header text-green">Employee Image Upload</h5>
                                <div class="card-body">
                                    <div class="row">

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <img ng-src="{{Imagepath}}" ng-hide="Imagepath == null || Imagepath == '' "
                                                ng-show="Imagepath != null " class="img-thumbnail mr-3"
                                                alt="Employee_image" style="width:150px;height:150px;">
                                        </div>
                                        <div class="table-responsive custom-table custom-table-noborder col-lg-4">
                                            <br>
                                            <br>

                                            <table class="table table-bordered table-sm">



                                                <tr>

                                                    <td> <label class="col-form-label">Image Upload</label>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control"
                                                                ng-model="clearinput01" id="fileInput01"
                                                                accept="image/*" name=files[] ng-model="Empimage">
                                                            <div class="input-group-append">
                                                                <p id="fileButton01" class="input-group-text"><i
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

                            <div class="card" ng-show="btndoc">
                                <h5 class="card-header text-green">Employee Document Details</h5>
                                <div class="card-body">


                                    <div class="row">
                                        <div class="col-md-4">

                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">S.No</label>
                                                <input class="form-control" ng-model="DocNextno" autocomplete="off"
                                                    id='DocNextno' readonly />
                                            </div>


                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Document_Type</label>
                                                <select ng-model="Documenttype" id='Documenttype' class="form-control">

                                                    <option ng-repeat="s in GetDoctypeList " value="{{s.Documenttype}}">
                                                        {{s.Documenttype}}</option>
                                                </select>
                                            </div>


                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Document No</label>
                                                <input class="form-control" ng-model="Documentno" autocomplete="off"
                                                    id='Documentno' />
                                            </div>


                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Select_file</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInput" name=files[]>
                                                    <div class="input-group-append">
                                                        <p id="fileButton" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                    </div>


                                                </div>
                                            </div>



                                            <div class="form-group text-right col-md-12">
                                                <button class="btn btn-sm btn-success" ng-click="Update_document();"><i
                                                        class="fa fa-save"></i>
                                                    Update</button>
                                                <button class="btn btn-sm btn-danger" ng-click="Resetdoc();"><i
                                                        class="fa fa-times"></i>
                                                    Clear(Next)</button>
                                            </div>



                                        </div>
                                        <div class="col-md-8">

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
                                </div>
                            </div>


                            <div class="card" ng-show="btnidcard">
                                <h5 class="card-header text-green">Employee Image Upload test test</h5>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card" style="margin: 30px;background-color: #3ac47d;">
                                            <h5 class="card-header" style="background-color: #3ac47d;color:#ffffff">ID
                                                Card</h5>
                                            <div class="card-body">
                                                <div id="pdfExport">
                                                    <div class="pdf-sipl">
                                                        <style>
                                                        .btn-nda-down {
                                                            position: absolute;
                                                            top: 5px;
                                                            right: 15px;
                                                        }
                                                        </style>
                                                        <div class='nda-ta-content'>
                                                            <div class="idbox">
                                                                <div class="row">
                                                                    <div class="col-lg-7" id="pdfExportidcard">
                                                                        <table>
                                                                            <tr>
                                                                                <td>
                                                                                    <div
                                                                                        class="idbox-data white-border idbox-bg">
                                                                                        <div class="id-logo ">
                                                                                            <img
                                                                                                src="../assets/images/sainmarks-white.png">
                                                                                        </div>
                                                                                        <div class="id-profile"
                                                                                            id="result_image">
                                                                                            <img id="result_image"
                                                                                                src="../assets/images/profile.png">
                                                                                        </div>
                                                                                        <div>
                                                                                            <img src="" alt="">
                                                                                        </div>
                                                                                        <div
                                                                                            class="text-center id-name">
                                                                                            <p
                                                                                                style="font-size: 16px;font-weight: bold;">
                                                                                                {{Firstname}}{{Lastname}}
                                                                                            </p>
                                                                                            <p style="font-size: 11px;">
                                                                                                {{EmpDepartment}}
                                                                                            </p>
                                                                                            <p style="font-size: 11px;">
                                                                                                {{EmpDesignation}}
                                                                                            </p>
                                                                                            <p style="font-size: 11px;">
                                                                                                ID No :
                                                                                                {{Employeeid}}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div
                                                                                        class="idbox-data idbox-green white-bg">
                                                                                        <table class="idbox-table">
                                                                                            <tr>
                                                                                                <td>Date of
                                                                                                    Birth
                                                                                                </td>
                                                                                                <td>:
                                                                                                    {{Dob2}}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Date of
                                                                                                    joining
                                                                                                </td>
                                                                                                <td>:
                                                                                                    {{Date_Of_Joing2}}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Blood
                                                                                                    Group
                                                                                                </td>
                                                                                                <td>:
                                                                                                    {{Bloodgroup}}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>In case
                                                                                                    of
                                                                                                    Emergency
                                                                                                </td>
                                                                                                <td>:
                                                                                                    {{Contactno}}
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                        <div class="id-sign">
                                                                                            <img
                                                                                                src="../assets/images/sign.png">
                                                                                        </div>
                                                                                        <div class="idbox-info">
                                                                                            <p class="idbox-return">
                                                                                                <u>If found
                                                                                                    please
                                                                                                    return
                                                                                                    to</u>
                                                                                            </p>
                                                                                            <p class="idbox-cname">
                                                                                                <b>SAINMARKS
                                                                                                    INDUSTRIES
                                                                                                    INDIA
                                                                                                    PVT
                                                                                                    LTD</b>
                                                                                            </p>
                                                                                            <p class="idbox-company">
                                                                                                476/1B1A,
                                                                                                'LABEL
                                                                                                ARCADE',
                                                                                                Jothi Nagar,
                                                                                                <br />
                                                                                                Palavanjipalayam,
                                                                                                K.
                                                                                                Chettipalayam,
                                                                                                <br />
                                                                                                Dharapuram
                                                                                                Main Road,
                                                                                                <br />
                                                                                                Tirupur-641608,
                                                                                                Tamil Nadu,
                                                                                                INDIA.
                                                                                                <br />
                                                                                                Phone: +91
                                                                                                421 3069999
                                                                                                <br />
                                                                                                Email:
                                                                                                info@sainmarks.com
                                                                                                <br /> Web:
                                                                                                www.sainmarks.com
                                                                                            </p>
                                                                                            <p class="idbox-tp">
                                                                                                TP-17460</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                        </table>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <table>
                                                                            <tr>
                                                                                <td>
                                                                                    <!-- <input class="form-control" type="file" id="avatar"> -->
                                                                                    <div class="custom-file">
                                                                                        <input type="file" id="avatar"
                                                                                            class="custom-file-input"
                                                                                            required>
                                                                                        <label
                                                                                            class="custom-file-label">Choose
                                                                                            file...</label>
                                                                                    </div>
                                                                                    <br />
                                                                                    <br />
                                                                                    <div id="croppie">
                                                                                        <img src="" alt="">
                                                                                    </div>
                                                                                    <div style="margin-left:50px">
                                                                                        <button class="btn btn-info"
                                                                                            id="upload">
                                                                                            <i class="fa fa-upload"></i>
                                                                                            Update </button>
                                                                                        <button class="btn btn-id-down"
                                                                                            id="download">
                                                                                            <i
                                                                                                class="fa fa-download"></i>
                                                                                            Download
                                                                                        </button>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
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


                            <div class="card" ng-show="btnpromotion">
                                <h5 class="card-header text-green">Department / Designation Details</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">S.no </label>
                                                <input class="form-control" ng-model="PromotionNextno"
                                                    autocomplete="off" readonly />
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Department</label>
                                                <select ng-model="Department" class="form-control">
                                                    <option ng-repeat="s in GetDepartmentList "
                                                        value="{{s.Department}}">
                                                        {{s.Department}}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Designation</label>
                                                <select ng-model="Designation" class="form-control">
                                                    <option ng-repeat="s in GetDesignationList "
                                                        value="{{s.Designation}}">
                                                        {{s.Designation}}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">From</label>
                                                <input type="text" class="form-control" ng-model="Fromperiod"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')"
                                                    ng-change="GetDeptDays();">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">To</label>
                                                <input type="text" class="form-control" ng-model="Toperiod"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')"
                                                    ng-change="GetDeptDays();">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Period</label>
                                                <input class="form-control" ng-model="Period" autocomplete="off"
                                                    readonly />
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-sm btn-success" ng-click="Update_DEPT();">
                                                    <i class="fa fa-save"></i> Update </button>
                                                <button class="btn btn-sm btn-danger" ng-click="ResetPromotion();">
                                                    <i class="fa fa-times"></i> Clear(Next) </button>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
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
                                                            pagination-id="Deptgrid" current-page="currentPageDept">
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
                                                                        src="
                                                    <?php echo "$domain"; ?>/assets/icons/edit.png">
                                                                </div>
                                                            </td>
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

                            <div class="card" id="btnsipltamil" ng-show="btnsipltamil">
                                <h5 class="card-header text-green">Application Detail In Tamil/Hindi 555
                                </h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Employee Details </label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmployeeDetailTamil">
                                                        Tamil</button>
                                                    <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmployeeDetailHindi">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Form-34 </label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1FORM34Tamil">
                                                        Tamil</button>
                                                    <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1FORM34Hindi">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-form-label">Attention Of The Employee </label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EMPAttentionTamil">
                                                        Tamil</button>
                                                    <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EMPAttentionHindi">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-form-label">Employee Declaration Form </label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmpDeclarationTamil">
                                                        Tamil</button>
                                                    <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmpDeclarationHindi">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Employee Stating </label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmpStatingTamil">
                                                        Tamil</button>
                                                    <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmpStatingHindi">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Employee Agreement </label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmpAgreementTamil">
                                                        Tamil</button>
                                                    <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmpAgreementHindi">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Employee Training </label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmpTrainingTamil">
                                                        Tamil</button>
                                                    <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmpTrainingHindi
                                                                                       "> Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-form-label">Service Improvement Record
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmpServiceTamil">
                                                        Tamil</button>
                                                    <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmpServiceHindi">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <label class="col-form-label">NDA </label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenterNDA">
                                                        English</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-form-label">GRATUITY </label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenterGRATUITY"> English</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Form-2 Revised </label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmpForm2RevisedTamil">
                                                        Tamil</button>
                                                    <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmpForm2RevisedHindi">
                                                        Hindi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col-form-label">Performance Assessment </label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                                        data-target="#ModalCenter1EmpFormAssessment">
                                                        Assessment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" ng-show="btnPropertyChecklist">
                                             <?php include 'Empasset/Assetallocation.php'?>
                                      
                           </div>













                        <div class="card" ng-show="btnsiplhindi">
                            <h5 class="card-header text-green">Application Detail In Hindi</h5>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-2">
                                        <button class="btn  btn-success" ng-click=""> Employee
                                            Details</button>
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn  btn-success" ng-click=""> Form-34</button>
                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn btn-success" ng-click=""> Attention Of The
                                            Employee</button>
                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn  btn-success" ng-click=""> Employee
                                            Declaration Form</button>
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn  btn-success" ng-click=""> Employee
                                            Contract</button>
                                    </div>


                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-lg-2">
                                        <button class="btn  btn-success" ng-click=""> Employee
                                            Stating</button>

                                    </div>

                                    <div class="col-lg-2">
                                        <button class="btn  btn-success" ng-click=""> Employee
                                            Agreement</button>

                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn  btn-success" ng-click=""> Service
                                            Improvement Record</button>

                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn  btn-success" ng-click="">Employee
                                            Training</button>

                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn  btn-success" ng-click=""> Form-2
                                            Revised</button>

                                    </div>

                                </div>

                            </div>
                        </div>




                    </div>
                </div>
          


                <?php include 'Empapp.php'?>
                <?php include 'Empasset/Assetpopup.php'?>












            </div>


            <?php include '../footer.php'?>
        </div>
    </div>

    </div>
    </div>
    <?php include '../footerjs.php'?>
    <script src="../Scripts/jspdf.min.js"></script>
    <script src="../Scripts/Croppie/croppie.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Scripts/Croppie/croppie.min.css">
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

    <script type="text/javascript">
    $('#upload').hide();
    $('#download').hide();
    let croppie;
    $('#avatar').on('change', function() {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#croppie img').attr('src', e.target.result);
                croppie = new Croppie($('#croppie img')[0], {
                    boundary: {
                        width: 200,
                        height: 200
                    },
                    viewport: {
                        width: 100,
                        height: 100,
                        type: 'circle'
                    }
                })
            }
            $('#upload').show();
            $('#upload').on('click', function() {
                $('#download').show();
                console.log('uploading...');
                croppie
                    .result({
                        type: 'base64',
                        circle: false
                    })
                    .then(function(dataImg) {
                        var data = [{
                            image: dataImg
                        }, {
                            name: 'myimgage.jpg'
                        }];
                        // use ajax to send data to php
                        $('#result_image img').attr('src', dataImg);
                    });
            });
            reader.readAsDataURL(this.files[0]);
        }
    })
    </script>
    <script>  
                                       $(document).ready(function(){
                                       $(".FIXED").show();
                                       $(".NOTFIXED").hide();
                                       $('#PF_Fixed').on('change', function() {
                                         if ( this.value == 'Yes')
                                              {
                                                $(".NOTFIXED").show();
                                                $(".FIXED").hide();
                                              }
                                            else
                                             {
                                               $(".NOTFIXED").hide();
                                               $(".FIXED").show();
                                              }
                                           });
                                         });
                                    </script>
</body>

</html>