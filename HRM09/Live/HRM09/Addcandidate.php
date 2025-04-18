<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Candidate Master Creation</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM09Controller">
                <div class="container-fluid dashboard-content">
                    <div class="row">


                        <div class="col-md-12">
                            <h5 class="text-green">Candidate Addition</h5>
                            <hr />
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Candidate ID</label>
                            <input type="text" class="form-control" ng-model="Candidateid" autocomplete="off" id="Candidateid" name ="Candidateid" readonly>
                        </div>

                        <div class="form-group col-md-9 mb-0">

                            <div class="row mb-0">

                                <div class="form-group col-md-4">
                                    <label class="col-form-label">First Name<span class="required">*</span></label>
                                    <div class="input-group "><span class="input-group-prepend">
                                            <select class="input-group-text surname-width" ng-model="Title">
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

                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Last Name</label>
                                    <input type="text" class="form-control" ng-model="Lastname" autocomplete="off">

                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Status</label>

                                    <input type="text" class="form-control" ng-model="Selectionstatus"
                                        autocomplete="off" readonly>


                                </div>

                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Gender<span class="required">*</span></label>
                            <select class="form-control" ng-model="Gender">
                                <option Value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Qualification<span class="required">*</span></label>
                            <select ng-model="Qualification" class="form-control">

                                <option ng-repeat="s in GetQualififcationList " value="{{s.Degree}}">
                                    {{s.Degree}}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Marital Status</label>
                            <select class="form-control" ng-model="Married">
                                <option ng-repeat="s in GetMaritalstatusList " value="{{s.Maritalstatus}}">
                                    {{s.Maritalstatus}}</option>

                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Mother Tongue </label>
                            <select ng-model="Mothertongue" class="form-control">

                                <option ng-repeat="s in GetLanguageList " value="{{s.Languages}}">
                                    {{s.Languages}}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Contact No<span class="required">*</span></label>
                            <input type="text" class="form-control" ng-model="Contactno" autocomplete="off"
                                onkeypress="return Validate(event);" maxlength="10"
                                ng-change="GetContactnounique(Contactno)">

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Category<span class="required">*</span></label>
                            <select class="form-control" ng-model="Category">
                                <option value="Category 1">Category 1
                                </option>
                                <option value="Category 2">Category 2</option>
                                <option value="Category 3">Category 3</option>

                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Email ID<span class="required">*</span></label>
                            <input type="email" class="form-control" ng-model="Emailid" autocomplete="email"
                                ng-model-options='{ debounce: 1000 }' ng-change="emailchecking02(Emailid)">

                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Current Location</label>
                            <select ng-model="City" class="form-control">

                                <option ng-repeat="s in GetCurrentcityList " value="{{s.City}}">
                                    {{s.City}}</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert" ng-show="Message">
                                {{Message}}
                            </div>
                        </div>

                        <div class="col-md-12 text-right">

                            <button class="btn btn-sm btn-rounded btn-success" ng-click="SaveCandidate();"
                                ng-show="btnsave"><i class="fa fa-save"></i>
                                Save</button>
                            <button class="btn btn-sm btn-rounded btn-success" ng-click="UpdateCandidate();"
                                ng-show="btnupdate"><i class="fa fa-save"></i>
                                Update</button>
                            <button class="btn btn-sm btn-rounded btn-success" ng-click="FetchCandidate(Candidateid);"
                                ng-show="btnupdate"><i class="fa fa-save"></i>
                                Refresh</button>
                            <button class="btn btn-sm btn-rounded btn-info" ng-click="MovetoEmp();"
                            ng-show="btnMoveToEmp"><i class="fa fa-save"></i>
                                Move To Emp</button>
                            <button class="btn btn-sm btn-rounded btn-danger" ng-click="Reset();"><i
                                    class="fa fa-times"></i>
                                Reset</button>
                        </div>

                        <div class="col-md-12">

                            <div class="tab-list mt-3">
                                <ul class="nav nav-pills nav-fill" ng-show="btnupdate">
                                <li class="nav-item"><a data-toggle="tab" href="#menu1">Personal
                                                    Info</a></li>
                                            <li class="nav-item"><a data-toggle="tab" href="#menu6">Education </a>
                                            </li>
                                            <li class="nav-item" ng-show="btnfresherno"><a data-toggle="tab"
                                                    href="#menu2">Pre(sainmarks)</a></li>
                                            <li class="nav-item" ng-show="btnfresherno"><a data-toggle="tab"
                                                    href="#menu8">Work Expereience</a></li>
                                            <li class="nav-item"><a data-toggle="tab" href="#menu10"  ng-click="ResetVaccination();">Vaccination</a>
                                            </li>

                                            <li class="nav-item"><a data-toggle="tab" href="#menu12"
                                                    ng-click="FetchAddress(Candidateid)">Address</li>
                                            <li class="nav-item"><a data-toggle="tab" href="#menu4"  ng-click="FetchCandidate(Candidateid);">Status</a></li>
                                            <li class="nav-item"><a data-toggle="tab" href="#menu13">Image</a></li>

                                            <li class="nav-item"><a data-toggle="tab" href="#menu7">Fitment</a></li>

                                            <li class="nav-item"><a data-toggle="tab" href="#menu5">Appointment </a>
                                            </li>



                                </ul>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="tab-content" ng-show="btnupdate">

                                <div id="menu1" class="tab-pane fade in active">
                                    <div class="noshadow">
                                        <h5 class="text-green mt-2 pl-0">Personal
                                            Information</h5>
                                        <hr />

                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="form-group ">
                                                    <label class="col-form-label">Languages
                                                        known</label>

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
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Date
                                                            of
                                                            Birth</label>
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
                                                        <label class="col-form-label">Application
                                                            Date</label>
                                                        <input type="text" class="form-control"
                                                            ng-model="ApplicationDate" onfocus="(this.type='date')"
                                                            onblur="(this.type='date')">
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Blood
                                                            Group</label>

                                                        <select class="form-control" ng-model="Bloodgroup">
                                                            <option ng-repeat="s in GetBloodGroupList "
                                                                value="{{s.BloodGroup}}">
                                                                {{s.BloodGroup}}</option>

                                                        </select>

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Fresher</label>
                                                        <select class="form-control" ng-model="Fresher"
                                                            ng-change="GetExpereience(Fresher)">
                                                            <option Value="Yes">Yes
                                                            </option>
                                                            <option value="No">No
                                                            </option>


                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3" ng-show="btnfresherno">
                                                        <label class="col-form-label">Experience</label>
                                                        <input type="text" class="form-control" ng-model="Expereience"
                                                            autocomplete="off">
                                                    </div>



                                                    <div class="form-group col-md-3" ng-show="btnfresherno">
                                                        <label class="col-form-label">Serving
                                                            NP</label>
                                                        <select class="form-control" ng-model="ServingNoticeperiod">
                                                            <option Value="Yes">Yes
                                                            </option>
                                                            <option value="No">No
                                                            </option>

                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3" ng-show="btnfresherno">
                                                        <label class="col-form-label">Notice
                                                            Period</label>


                                                        <select class="form-control" ng-model="NoticePeriod">
                                                            <option Value="Immediate">
                                                                Immediate
                                                            </option>
                                                            <option value="15 Days">15
                                                                Days
                                                            </option>
                                                            <option value="20 Days">20
                                                                Days
                                                            </option>
                                                            <option value="30 Days">30
                                                                Days
                                                            </option>
                                                            <option value="45 Days">45
                                                                Days
                                                            </option>
                                                            <option value="60 Days">60
                                                                Days
                                                            </option>


                                                        </select>

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Reporting
                                                            To</label>
                                                        <select ng-model="ReportingToid" class="form-control"
                                                            ng-change="GetReporterName();">

                                                            <option ng-repeat="s in GetinterviewerList "
                                                                value="{{s.Employeeid}}">
                                                                {{s.Title}}
                                                                {{s.Fullname}}-{{s.Employeeid}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Business</label>
                                                        <input class="form-control" ng-model="Business" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Designation
                                                            Proposed </label>
                                                        <select ng-model="Designationproposed" class="form-control">

                                                            <option ng-repeat="s in GetDesignationList "
                                                                value="{{s.Designation}}">
                                                                {{s.Designation}}</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Location</label>
                                                        <select ng-model="Location" class="form-control">

                                                            <option ng-repeat="s in GetCityListLocation " value="{{s.City}}">
                                                                {{s.City}}</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Department</label>
                                                        <select ng-model="Department" class="form-control">

                                                            <option ng-repeat="s in GetDepartmentList "
                                                                value="{{s.Department}}">
                                                                {{s.Department}}</option>
                                                        </select>
                                                    </div>
                                                  


                                                    <div class="form-group text-right col-md-12">
                                                        <button style="margin-top:25px" class="btn btn-sm btn-success"
                                                            ng-click="Update_Other_info();"><i class="fa fa-save"></i>
                                                            Update</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>

                                <div id="menu6" class="tab-pane fade">
                                    <div class="noshadow">

                                        <h5 class="text-green mt-2 pl-0">Candidate
                                            Education Details</h5>
                                        <hr />



                                        <div class="row">






                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">S.No
                                                </label>
                                                <input class="form-control" ng-model="EduNextno" id="EduNextno"
                                                    readonly />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Studied</label>
                                                <select ng-model="Cadidatestudied" id="Candidatestudied"
                                                    class="form-control">

                                                    <option ng-repeat="s in GetQualififcationList "
                                                        value="{{s.Degree}}">
                                                        {{s.Degree}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">University/School
                                                </label>
                                                <input class="form-control" ng-model="UniversityorSchool"
                                                    id="UniversityorSchool" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Grade / %
                                                </label>
                                                <input class="form-control" ng-model="GradeorPercentage"
                                                    id="GradeorPercentage" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Passout Year
                                                </label>
                                                <select class="form-control" ng-model="Passoutyear" id="Passoutyear">
                                                    <?php 
                                                                                   for($i = 1940 ; $i <= date('Y'); $i++){
                                                                                    echo "<option>$i</option>";
                                                                                    }
                                                                                         ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Education Mode</label>
                                                <select ng-model="EducationMode" id="EducationMode"
                                                    class="form-control">

                                                    <option ng-repeat="s in GetEducationModeList "
                                                        value="{{s.EducationMode}}">
                                                        {{s.EducationMode}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Specialization</label>
                                                <select ng-model="Specialization" id="Specialization"
                                                    class="form-control">

                                                    <option ng-repeat="s in GetSpecializationList "
                                                        value="{{s.Specialization}}">
                                                        {{s.Specialization}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Select file</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInput" name=files[]
                                                        accept="image/png, image/gif, image/jpeg,application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButton" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="form-group text-right col-md-12">
                                                <button style="margin-top: 25px;" class="btn btn-sm btn-success"
                                                    ng-click="Update_Education();"><i class="fa fa-save"></i>
                                                    Update</button>
                                                <button style="margin-top: 25px;" class="btn btn-sm btn-danger"
                                                    ng-click="ResetEducation();"><i class="fa fa-times"></i>
                                                    Clear(Next)</button>
                                            </div>



                                            <div class="col-lg-12">

                                                <div class="table-responsive">
                                                    <table class="table   table-sm">
                                                        <thead>
                                                            <tr>

                                                                <th>No</th>
                                                                <th scope="col">Studies
                                                                </th>
                                                                <th scope="col">
                                                                    University
                                                                </th>
                                                                <th scope="col">Grade
                                                                </th>
                                                                <th scope="col">Year
                                                                </th>
                                                                <th scope="col">Education Mode
                                                                </th>
                                                                <th scope="col">Specialization
                                                                </th>


                                                                <th scope="col">Action
                                                                </th>
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
                                                                <td>{{e.Passoutyear}}
                                                                </td>
                                                                <td>{{e.EducationMode}}
                                                                </td>
                                                                <td>{{e.Specialization}}
                                                                </td>




                                                                <td>
                                                                    <div class="action-btn">
                                                                        <img height="15" data-toggle="modal"
                                                                            data-target="#ModalCenter1Education"
                                                                            ng-click="FetchEducation(e.Candidateid,e.Sno);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                        <img height="15"
                                                                            ng-click="FetchEducation(e.Candidateid,e.Sno);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">

                                                                        <img height="15" data-toggle="modal"
                                                                            data-target="#ModalCenter1DocumentView"
                                                                            ng-click="FetchEducation(e.Candidateid,e.Sno);"
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
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <div class="noshadow">

                                        <h5 class="text-green mt-2 pl-0">Previous(Sainmark) Employee Details
                                        </h5>
                                        <hr />




                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Worked</label>
                                                <select class="form-control" ng-model="Previoussainmarksemployee"
                                                    ng-change="GetPrevioussain(Previoussainmarksemployee)">
                                                    <option Value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-md-3" ng-show="btnpreviousworked">
                                                <label class="col-form-label">Empid(Old)</label>
                                                <select ng-model="OldEmpid" class="form-control"
                                                    ng-change="GetOldEmpName();">

                                                    <option ng-repeat="s in GetOldList " value="{{s.Employeeid}}">
                                                        {{s.Title}}
                                                        {{s.Fullname}}-{{s.Employeeid}}
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3" ng-show="btnpreviousworked">
                                                <label class="col-form-label">Designation</label>
                                                <input type="text" class="form-control" ng-model="PreviousDesignation"
                                                    autocomplete="off" readonly>

                                            </div>
                                            <div class="form-group col-md-3" ng-show="btnpreviousworked">
                                                <label class="col-form-label">Department</label>
                                                <input type="text" class="form-control" ng-model="PreviousDepartment"
                                                    autocomplete="off" readonly>

                                            </div>
                                            <div class="form-group col-md-3" ng-show="btnpreviousworked">
                                                <label class="col-form-label">Working Period</label>
                                                <input type="text" class="form-control" ng-model="Workingperiod"
                                                    autocomplete="off" readonly>

                                            </div>
                                            <div class="form-group col-md-3" ng-show="btnpreviousworked">
                                                <label class="col-form-label">Relieving reason</label>
                                                <input type="text" class="form-control" ng-model="Releivingreason"
                                                    autocomplete="off" readonly>

                                            </div>


                                            <div class="form-group col-md-3">
                                                <button class="btn btn-sm btn-success" style="margin-top:25px"
                                                    ng-click="Update_Previous_info();"><i class="fa fa-save"></i>
                                                    Update</button>
                                            </div>
                                        </div>





                                    </div>
                                </div>

                                <div id="menu3" class="tab-pane fade">
                                    <div class="noshadow">

                                        <h5 class="text-green mt-2 pl-0">Interview Detail</h5>
                                        <hr />


                                        <div class="row">

                                            <div class="form-group col-md-4">
                                                <label class="col-form-label">Interviewer
                                                </label>
                                                <select ng-model="interviewerid" class="form-control"
                                                    ng-change="Getinterviewername();">

                                                    <option ng-repeat="s in GetinterviewerList "
                                                        value="{{s.Employeeid}}">
                                                        {{s.Title}}
                                                        {{s.Fullname}}-{{s.Employeeid}}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-form-label">HR
                                                    (Interview)</label>
                                                <input type="text" class="form-control" ng-model="Interview_held_On"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-form-label">DH
                                                    (Interview)</label>
                                                <input type="text" class="form-control" ng-model="DHinterviewdate"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="col-form-label">Interview
                                                    Time</label>
                                                <input type="text" class="form-control"
                                                    ng-model="Candidateinterviewtime" onfocus="(this.type='time')"
                                                    onblur="(this.type='time')">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-form-label">Reschedule interview
                                                    date</label>
                                                <input type="text" class="form-control" ng-model="Reschedule_interview"
                                                    onfocus="(this.type='date')" onblur="(this.type='date')">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-form-label">Reschedule interview
                                                    reason</label>
                                                <input type="text" class="form-control"
                                                    ng-model="Reschedule_interview_reason">
                                            </div>

                                            <div class="form-group text-right col-md-12">
                                                <button class="btn btn-sm btn-success"
                                                    ng-click="Update_interview_info();"><i class="fa fa-save"></i>
                                                    Update</button>

                                                <button class="btn btn-sm btn-info" ng-click="SendRemindertoHR();"><i
                                                        class="fa fa-clock-o"></i>
                                                    Send Reminder</button>


                                            </div>




                                        </div>





                                    </div>
                                </div>
                                <div id="menu4" class="tab-pane fade">


                                    <h5 class="text-green mt-2 pl-0">Approval Status</h5>
                                    <hr />


                                    <div class="table-responsive">
                                        <table class="table table-bordered  table-sm ">
                                            <thead>
                                                <tr>

                                                    <th>No</th>
                                                    <th scope="col">
                                                        Type</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Approved/Reject
                                                        Time</th>
                                                    <th scope="col">Notes</th>
                                                    <th>Send Approval</th>

                                                </tr>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>HR</td>
                                                    <td> <input type="text" class="form-control" ng-model="HR_Approve"
                                                            readonly></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="HR_Approve_datetime" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="HRinterviewnotes"
                                                            ng-disabled="HRinterviewnotes"></input>
                                                    </td>
                                                    <td> <button class="btn btn-sm btn-rounded btn-info"
                                                            ng-disabled="btnHR" ng-click="SendMailToHRNEW();"><i
                                                                class="fa fa-envelope"></i>
                                                            Send</button>
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td>DH</td>
                                                    <td> <input type="text" class="form-control" ng-model="DH_Approve"
                                                            readonly></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="DH_Approve_datetime" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="DHinterviewnotes"
                                                            ng-disabled="DHinterviewnotes"></input>
                                                    </td>
                                                    <td> <button class="btn btn-sm btn-rounded btn-info"
                                                            ng-disabled="btnDH"
                                                            ng-click="SendMailToDepartmentHead();"><i
                                                                class="fa fa-envelope"></i>
                                                            Send</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td>GM</td>
                                                    <td> <input type="text" class="form-control" ng-model="GM_Approve"
                                                            readonly></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="GM_Approve_datetime" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="GMinterviewnotes"
                                                            ng-disabled="GMinterviewnotes"></input>
                                                    </td>

                                                    <td> <button class="btn btn-sm btn-rounded btn-info"
                                                            ng-disabled="btnGM"
                                                            ng-click="UpdateFitmentApprovedMail()"><i
                                                                class="fa fa-envelope"></i>
                                                            Send</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>MD</td>
                                                    <td> <input type="text" class="form-control" ng-model="MD_Approve"
                                                            readonly></td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="MD_Approve_datetime" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="MDinterviewnotes"
                                                            ng-disabled="MDInterviewnotes"></input>
                                                    </td>
                                                    <td> <button class="btn btn-sm btn-rounded btn-info"
                                                            ng-disabled="btnMD"
                                                            ng-click="UpdateFitmentGMApprovedMail()"><i
                                                                class="fa fa-envelope"></i>
                                                            Send</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>5.</td>
                                                    <td>Candidate </td>
                                                    <td> <input type="text" class="form-control"
                                                            ng-model="CandidateAccepted" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            ng-model="Candidateofferaccepteddatetime" readonly>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td> <button class="btn btn-sm btn-rounded btn-info"
                                                            ng-disabled="btnCandidate"
                                                            ng-click="SendMailToCandidate();"><i
                                                                class="fa fa-envelope"></i>
                                                            Send</button>
                                                    </td>


                                                </tr>





                                            </tbody>
                                        </table>



                                    </div>




                                </div>
                                <div id="menu5" class="tab-pane fade">


                                    <h5 class="text-green mt-2 pl-0">Date Of Joining & Confirmation
                                        Letters
                                    </h5>
                                    <hr />


                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Offer
                                                Accepted By Candidate </label>
                                            <select class="form-control" ng-model="CandidateAccepted">
                                                <option value="Offer Accepted By Candidate">✔️
                                                    Accepted</option>
                                                <option value="Waiting For candidate Approval">🕑
                                                    Waiting</option>
                                                <option value="Offer Rejected by Candidate">❌
                                                    Rejected</option>


                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Expected
                                                Date Of Joining</label>
                                            <input type="text" class="form-control" ng-model="Date_Of_Joing"
                                                onfocus="(this.type='date')" onblur="(this.type='date')">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Accepted
                                                CTC </label>
                                            <input type="text" class="form-control" ng-model="CommitedCTC"
                                                autocomplete="off" onkeypress="return Validate(event);">
                                        </div>



                                        <div class="form-group">
                                            <button style="margin-top: 25px;" class="btn btn-sm btn-success"
                                                ng-click="Update_DOJ_info();"><i class="fa fa-save"></i>
                                                Update</button>





                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6"> <button style="margin-top: 5px;"
                                                        class="btn btn-sm btn-success w-100"
                                                        ng-click="AppointmentTamil();" data-toggle="modal"
                                                        data-target="#ModalCenter1AppointmentView"><i
                                                            class="fa fa-file-pdf"></i>
                                                        Appointment(Tamil)</button>
                                                </div>
                                                <div class="col-md-6"><button style="margin-top: 5px;"
                                                        class="btn btn-sm btn-success btn-fluid w-100"
                                                        ng-click="AppointmentTamil();" data-toggle="modal"
                                                        data-target="#ModalCenter1ConfirmationView"><i
                                                            class="fa fa-file-pdf"></i>
                                                        Confirmation(Tamil)</button>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6"><button style="margin-top: 5px;"
                                                        class="btn btn-sm btn-success w-100"
                                                        ng-click="AppointmentTamil();" data-toggle="modal"
                                                        data-target="#ModalCenter1AppointmentHindi"><i
                                                            class="fa fa-file-pdf"></i>
                                                        Appointment(Hindi)</button>
                                                </div>
                                                <div class="col-md-6"> <button style="margin-top: 5px;"
                                                        class="btn btn-sm btn-success w-100"
                                                        ng-click="AppointmentTamil();" data-toggle="modal"
                                                        data-target="#ModalCenter1ConfirmationViewHindi"><i
                                                            class="fa fa-file-pdf"></i>
                                                        Confirmation(Hindi)</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6"><button style="margin-top: 5px;"
                                                        class="btn btn-sm btn-success w-100" ng-click="FetchFinalFit();"
                                                        data-toggle="modal"
                                                        data-target="#ModalCenter1AppointmentEnglish"><i
                                                            class="fa fa-file-pdf"></i>
                                                        Appointment(English)</button>
                                                </div>
                                                <div class="col-md-6"> <button style="margin-top: 5px;"
                                                        class="btn btn-sm btn-success w-100"
                                                        ng-click="AppointmentTamil();" data-toggle="modal"
                                                        data-target="#ModalCenter1OfferEnglish"><i
                                                            class="fa fa-file-pdf"></i>
                                                        Offer Letter</button></div>
                                            </div>
                                        </div>






                                    </div>








                                </div>
                                <div id="menu7" class="tab-pane fade">
                                    <div class="card">
                                        <h4 class="card-header text-green pl-0">Salary
                                            Details</h4>



                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="table-responsive">
                                                    <table class="table table-bordered  table-sm info-table can-table">
                                                        <thead>
                                                            <tr align="center">
                                                                <th colspan="10">General
                                                                </th>
                                                                <th colspan="21">Monthly
                                                                    Detail
                                                                </th>
                                                                <th colspan="21">Annual
                                                                    Detail
                                                                </th>

                                                            </tr>
                                                            <tr class="bg-green text-white">

                                                                <th>#</th>
                                                                <!-- <th>Action</th> -->
                                                                <th>Status</th>
                                                                <th>Type</th>
                                                                <th>DH</th>
                                                                <th>GM</th>
                                                                <th>MD</th>
                                                                <th>Basic</th>
                                                                <th>Hra</th>
                                                                <th>Special</th>
                                                                <th>Total</th>
                                                                <th>PF</th>
                                                                <th>Graduity</th>
                                                                <th>Retirals</th>
                                                                <th>GAC</th>
                                                                <th>Bonous</th>
                                                                <th style="min-width: 100px;">Other Bonous
                                                                </th>
                                                                <th>CTC</th>
                                                                <th>Deductions</th>
                                                                <th>ESIC</th>
                                                                <th>PFEmployee</th>
                                                                <th>Canteen</th>
                                                                <th>Stay</th>
                                                                <th>Travel</th>
                                                                <th>Performance</th>
                                                                <th style="min-width: 140px;">Other
                                                                    Deductions</th>
                                                                <th style="min-width: 140px;">Deduction
                                                                    Total</th>
                                                                <th style="min-width: 100px;">Take Home</th>

                                                                <th>Basic</th>
                                                                <th>Hra</th>
                                                                <th>Special</th>
                                                                <th>Total</th>
                                                                <th>PF</th>
                                                                <th>Graduity</th>
                                                                <th>Retirals</th>
                                                                <th>GAC</th>
                                                                <th>Bonous</th>
                                                                <th style="min-width: 140px;">Other Bonous
                                                                </th>
                                                                <th>CTC</th>
                                                                <th>Deductions</th>
                                                                <th>ESIC</th>
                                                                <th>PFEmployee</th>
                                                                <th>Canteen</th>
                                                                <th>Stay</th>
                                                                <th>Travel</th>
                                                                <th>Performance</th>
                                                                <th style="min-width: 140px;">Other
                                                                    Deductions</th>
                                                                <th style="min-width: 140px;">Deduction
                                                                    Total</th>
                                                                <th style="min-width: 100px;">Take Home</th>

                                                            </tr>
                                                        </thead>


                                                        <tbody>

                                                            <tr dir-paginate="e in GetSalaryList |filter:searchSalary|itemsPerPage:5 "
                                                                pagination-id="Salarygrid"
                                                                current-page="currentPageSalary">




                                                                <td>
                                                                    {{$index+1 + (currentPageSalary - 1) * pageSizeSalary}}
                                                                </td>
                                                                <!-- <td>
                                                                                <p>
                                                                                    <span class="pointer"
                                                                                        ng-click="SendFitEdit(e.Candidateid,e.fitno,e.Fitmenttype);">
                                                                                        <img height="15"
                                                                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                                                                    </span>
                                                                                </p>
                                                                            </td> -->




                                                                <td>{{e.Fitmenttype}}</td>


                                                                <td>{{e.FitStatus}}</td>
                                                                <td>{{e.DeptHeadApprovalStatus}}
                                                                </td>
                                                                <td>{{e.GMApprovalStatus}}</td>
                                                                <td>{{e.MDApproval}}</td>
                                                                <td>{{e.CurMotBasicDA|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotHRA|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotSpecialAllowance|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotTotalAllowance|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotPFemployeer|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotGratuity|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotRetairlsTotal|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotGAC|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotEstimatedBonous|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotOtherBonous|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotCTC|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotDeductions|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotESIC|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotPFemployee|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotCanteen|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotStayAllowance|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotTravelAllowance|currency:''}}
                                                                </td>
                                                                </td>
                                                                <td>{{e.Performanceallowancemonthly|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotOtherDeductions|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMotDeductionTotal|currency:''}}
                                                                </td>
                                                                <td>{{e.CurMottakehomewithouttax|currency:''}}
                                                                </td>

                                                                <td>{{e.CurAnnuaBasicDA|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaHRA|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaSpecialAllowance|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaTotalAllowance|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaPFemployeer|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaGratuity|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaRetairlsTotal|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaGAC|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaEstimatedBonous|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaOtherBonous|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaCTC|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaDeductions|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaESIC|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaPFemployee|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaCanteen|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaStayAllowance|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaTravelAllowance|currency:''}}
                                                                </td>
                                                                <td>{{e.Performanceallowanceyearly|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaDeductionTotal|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuaDeductionTotal|currency:''}}
                                                                </td>
                                                                <td>{{e.CurAnnuatakehomewithouttax|currency:''}}
                                                                </td>


                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="float-right mt-2">
                                                        <div class="pagination ">
                                                            <dir-pagination-controls pagination-id="Salarygrid"
                                                                max-size="3" direction-links="true"
                                                                boundary-links="true" class="pagination">
                                                            </dir-pagination-controls>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div id="menu8" class="tab-pane fade">

                                    <div class="noshadow">
                                        <h5 class="text-green mt-2 pl-0">Present Working Detail</h5>
                                        <hr />
                                        <div class="">

                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Current
                                                        Organization</label>
                                                    <input type="text" class="form-control"
                                                        ng-model="CurrentOrganization">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Current
                                                        Position</label>
                                                    <input type="text" class="form-control" ng-model="PreviousPosition">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Current
                                                        CTC</label>
                                                    <input type="text" class="form-control" ng-model="CurrentCTC"
                                                        autocomplete="off" onkeypress="return Validate(event);">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Position Applied
                                                        For</label>
                                                    <input type="text" class="form-control" ng-model="AppliedPosition">
                                                </div>







                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Expected
                                                        CTC</label>
                                                    <input type="text" class="form-control" ng-model="ExpectedCTC"
                                                        autocomplete="off" onkeypress="return Validate(event);">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Negotiable
                                                        CTC </label>

                                                    <select class="form-control" ng-model="NegotiableCTC">
                                                        <option Value="Yes">Yes</option>
                                                        <option value="No">No</option>

                                                    </select>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Willing to
                                                        Relocate </label>
                                                    <select class="form-control" ng-model="Willingtorelocate">
                                                        <option Value="Yes">Yes</option>
                                                        <option value="No">No</option>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Industrial Type</label>
                                                    <select ng-model="Industrialtype" class="form-control">

                                                        <option ng-repeat="s in GetIndustrialtypeList "
                                                            value="{{s.Industrialtype}}">
                                                            {{s.Industrialtype}}</option>
                                                    </select>
                                                </div>


                                                <div class="form-group col-md-9">
                                                    <label class="col-form-label">Relieving reasons</label>
                                                    <input type="text" class="form-control"
                                                        ng-model="Currentreleivingreason" autocomplete="off">
                                                </div>

                                                <div class="form-group text-right col-md-12">
                                                    <button class="btn btn-sm btn-success"
                                                        ng-click="Update_Present_info();"><i class="fa fa-save"></i>
                                                        Update</button>


                                                </div>



                                            </div>



                                        </div>

                                    </div>
                                </div>


                                <div id="menu10" class="tab-pane fade">
                                    <div class="noshadow">
                                        <h5 class="text-green mt-2 pl-0">Vaccination Details</h5>
                                        <hr />
                                        <div class="">
                                            <div class="row">
                                                <div class="form-group col-md-2">
                                                    <label class="col-form-label">
                                                        S.No </label>
                                                    <input type="text" class="form-control" id="Vaccinatedsno"
                                                        ng-model="Vaccinatedsno" readonly>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label"> Covid
                                                        Vaccinated </label>
                                                    <select class="form-control" id="Covidvaccinated"
                                                        ng-model="Covidvaccinated">
                                                        <option Value="1st Dose">1st Dose
                                                        </option>
                                                        <option value="2nd Dose">2nd Dose
                                                        </option>
                                                        <option value="Booster">Booster
                                                        </option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">
                                                        Vaccinated date </label>
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
                                                            <!-- <p class="input-group-text" ng-click="FetchCovidvaccination();" data-toggle="modal"
                                                                            data-target="#ModalCenter1Certificate"> <i
                                                                                class="fa fa-file"></i></p> -->
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-sm btn-success"
                                                    ng-click="UpdateVaccination();"><i class="fa fa-save"></i>
                                                    Update</button>

                                                <button class="btn btn-sm btn-danger" ng-click="ResetVaccination();"><i
                                                        class="fa fa-times"></i>
                                                    Reset</button>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div class="table-responsive">
                                                        <table class="table   table-sm">
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
                                                                            <img height="15" data-toggle="modal"
                                                                                data-target="#ModalCenter1Vaccination"
                                                                                ng-click="FetchCovidvaccination(e.Candidateid,e.Sno);"
                                                                                src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                            <img height="15"
                                                                                ng-click="FetchCovidvaccination(e.Candidateid,e.Sno);"
                                                                                src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                                                            <img height="15"
                                                                                ng-click="FetchCovidvaccination(e.Candidateid,e.Sno);"
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
                                </div>




                                <div id="menu12" class="tab-pane fade">
                                    <div class="noshadow">
                                        <h5 class="text-green mt-2 pl-0">Address Information
                                        </h5>
                                        <hr />
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
                                                            <select ng-model="CurrentCountry"
                                                                ng-change="GetCurrentState();" class="form-control">
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
                                                                <option ng-repeat="s in GetStateList "
                                                                    value="{{s.State}}">
                                                                    {{s.State}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">City</label>
                                                            <select ng-model="CurrentCity" class="form-control">
                                                                <option ng-repeat="s in GetCityList "
                                                                    value="{{s.City}}">
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
                                                <div class="form-group  text-right mt-3">
                                                    <button class="btn btn-sm btn-warning"
                                                        ng-click="CopyTempAddress();">
                                                        <i class="fa fa-copy"></i> Copy Address </button>
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
                                                            <select ng-model="PermanentCountry"
                                                                ng-change="GetPerstate();" class="form-control">
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
                                                                <option ng-repeat="s in GetPerCityList "
                                                                    value="{{s.City}}">
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
                                                <div class="form-group text-right mt-3">
                                                    <button class="btn btn-sm btn-success" ng-click="UpdateAddress();">
                                                        <i class="fa fa-save"></i> Update </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div id="menu13" class="tab-pane fade">
                                    <div class="noshadow">
                                        <h5 class="text-green mt-2 pl-0">Candidate Image
                                        </h5>
                                        <hr />
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <img ng-src="{{Candidatephoto}}"
                                                    ng-hide="Candidatephoto == null || Candidatephoto == '' "
                                                    ng-show="Candidatephoto != null " class="img-thumbnail mr-3"
                                                    alt="Candidate_Image" style="width:150px;height:150px;">
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



                            </div>
                        </div>




                    </div>
                </div>
                <?php include 'Candidatepopup.php';?>

        </div>
    </div>
 





   






    <?php include '../footer.php'?>







    <?php include '../footerjs.php'?>
    <script src="../Scripts/jspdf.min.js"></script>

    <script src="../Scripts/html2canvas/html2canvas.min.js"></script>
    <script src="../Scripts/Controller/HRM09Controller.js"></script>
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
    <script type="text/javascript">
    $(".tab-list ul").on('click', 'li', function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });
    </script>
</body>

</html>