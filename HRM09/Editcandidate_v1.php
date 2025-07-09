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
    <title>Candidate Master</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM09Controller">
            <div class="container-fluid ">






                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container-fluid dashboard-content">
                                <div class="row">
                                    <div class="col-xl-12">



                                        <div class="card">
                                            <h5 class="card-header text-green">Candidate Details</h5>
                                            <div class="card-body">
                                                <div class="alert alert-success" role="alert" ng-show="AdminMessage">
                                                    {{AdminMessage}}
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered  table-sm ">
                                                        <thead>
                                                            <tr>

                                                                <th>No</th>
                                                                <th scope="col" style="width: 100px;">
                                                                    Candidate_ID</th>
                                                                <th scope="col" style="width: 200px;">Name</th>
                                                                <th scope="col" style="width: 90px;">Gender</th>
                                                                <th scope="col">Contactno</th>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Qualification</th>
                                                                <th scope="col">Status</th>

                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.Candidateid">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>

                                                                </td>
                                                                <td>
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.Fullname">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.Gender">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.Contactno">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.Type_Of_Posistion">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.HighestQualification">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.Selectionstatus">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </td>





                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr dir-paginate="e in GetCandidateList02 |filter:searchCandidate|itemsPerPage:10 "
                                                                pagination-id="Candidategrid"
                                                                current-page="currentPageCandidate">




                                                                <td style="width: 50px;">
                                                                    {{$index+1 + (currentPageCandidate - 1) * pageSizeCandidate}}
                                                                </td>

                                                                <td>{{e.Candidateid}}</td>
                                                                <td>{{e.Title}} {{e.Fullname}}</td>
                                                                <td>{{e.Gender}}</td>
                                                                <td>{{e.Contactno}}</td>
                                                                <td>{{e.Type_Of_Posistion}}</td>
                                                                <td>{{e.HighestQualification}}</td>
                                                                <td
                                                                    ng-class="{'badge badge-warning':e.Selectionstatus=='Rejected','badge badge-success':e.Empid!='0'}">
                                                                    {{e.Selectionstatus}}

                                                                </td>


                                                                <td>
                                                                    <div class="action-btn">
                                                                        <img height="15"
                                                                            ng-click="SendEdit02(e.Candidateid,e.Selectionstatus,e.Empid);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>



                                                </div>

                                                <div class="float-right mt-2">
                                                    <div class="pagination">
                                                        <dir-pagination-controls pagination-id="Candidategrid"
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
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container-fluid dashboard-content">
                                <div class="row">
                                    <div class="col-xl-12">


                                        <div class="card">
                                            <h5 class="card-header text-green">Candidate Update</h5>
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Candidate ID</label>
                                                        <input type="text" class="form-control" ng-model="Candidateid"
                                                            autocomplete="off" readonly>
                                                    </div>

                                                    <div class="form-group col-md-9 mb-0">

                                                        <div class="row mb-0">

                                                            <div class="form-group col-md-4">
                                                                <label class="col-form-label">First Name</label>
                                                                <div class="input-group "><span
                                                                        class="input-group-prepend">
                                                                        <select class="input-group-text surname-width"
                                                                            ng-model="Title">
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

                                                            <div class="form-group col-md-4">
                                                                <label class="col-form-label">Last Name</label>
                                                                <input type="text" class="form-control"
                                                                    ng-model="Lastname" autocomplete="off">

                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label class="col-form-label">Status</label>
                                                                <select class="form-control" ng-model="Selectionstatus">
                                                                    <option Value="Appointed">Appointed</option>
                                                                    <option value="Pending">Pending</option>
                                                                    <option value="Rejected">Rejected</option>
                                                                    <option value="Offer Letter Sent">Offer Letter Sent
                                                                    </option>
                                                                    <option Value="Waiting For candidate Approval">
                                                                        Waiting For Candidate Approval</option>
                                                                    <option value="Waiting For MD Approval">Waiting For
                                                                        MD Approval</option>
                                                                    <option value="Offer Accepted By Candidate">Offer
                                                                        Accepted by Candidate
                                                                    </option>
                                                                    <option value="Offer Rejected by Candidate">Offer
                                                                        Rejected by Candidate
                                                                    </option>
                                                                    <option value="Onboarding">Onboarding</option>
                                                                    <option value="Induction">Induction</option>

                                                                </select>

                                                            </div>

                                                        </div>
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
                                                        <label class="col-form-label">Qualification</label>
                                                        <select ng-model="Qualification" class="form-control">

                                                            <option ng-repeat="s in GetQualififcationList "
                                                                value="{{s.Degree}}">
                                                                {{s.Degree}}</option>
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
                                                        <label class="col-form-label">Mother Tongue </label>
                                                        <select ng-model="Mothertongue" class="form-control">

                                                            <option ng-repeat="s in GetLanguageList "
                                                                value="{{s.Languages}}">
                                                                {{s.Languages}}</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Contact No</label>
                                                        <input type="text" class="form-control" ng-model="Contactno"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            maxlength="10">

                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Category</label>
                                                        <select class="form-control" ng-model="Category">
                                                            <option Value="Admin & Staff">Admin & Staffs
                                                            </option>
                                                            <option value="Marketing">Marketing</option>
                                                            <option value="Workers">Workers</option>

                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Email ID</label>
                                                        <input type="email" class="form-control" ng-model="Emailid"
                                                            autocomplete="email" ng-model-options='{ debounce: 1000 }'
                                                            ng-change="emailchecking(Emailid)">

                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Current Location</label>
                                                        <select ng-model="City" class="form-control">

                                                            <option ng-repeat="s in GetCityList " value="{{s.City}}">
                                                                {{s.City}}</option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="alert alert-success" role="alert" ng-show="Message">
                                                    {{Message}}
                                                </div>

                                                <div class="form-group text-right">
                                                    <button class="btn btn-sm btn-rounded btn-success"
                                                        ng-click="UpdateCandidate();"><i class="fa fa-save"></i>
                                                        Update</button>
                                                    <button class="btn btn-sm btn-rounded btn-info"
                                                        ng-click="MovetoEmp();"><i class="fa fa-save"></i>
                                                        Move To Emp</button>
                                                    <button class="btn btn-sm btn-rounded btn-warning"
                                                        data-target="#myCarousel" data-slide-to="0"><i
                                                            class="fa  fa-arrow-left"></i> Back</button>
                                                </div>

                                                <div class="tab-list">




                                                    <ul class="nav nav-pills nav-fill">
                                                        <li class="nav-item"><a data-toggle="tab" href="#menu1">Personal
                                                                Info</a></li>
                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu6">Education </a></li>
                                                        <li class="nav-item" ng-show="btnfresherno"><a data-toggle="tab"
                                                                href="#menu2">Pre(sainmarks)</a></li>
                                                        <li class="nav-item" ng-show="btnfresherno"><a data-toggle="tab"
                                                                href="#menu8">PresentWorking</a></li>
                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu10">Vaccination</a></li>

                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu3">Interview </a></li>
                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu4">Approved</a></li>
                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu9">Reporting</a></li>


                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu7">Fitment</a></li>

                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu5">Appointment </a></li>
                                                        <li class="nav-item"><a data-toggle="tab" href="#menu11">Letters
                                                            </a></li>


                                                    </ul>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tab-content" style="overflow-x: auto">

                                                            <div id="menu1" class="tab-pane fade in active">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Personal
                                                                        Information</h5>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-lg-2">
                                                                                <div class="form-group ">
                                                                                    <label
                                                                                        class="col-form-label">Languages
                                                                                        known</label>

                                                                                    <ul class="pl-0">
                                                                                        <li ng-repeat="p in GetLanguageList"
                                                                                            style=" list-style-type: none;">
                                                                                            <input type="checkbox"
                                                                                                ng-model="selected[p.Languages]"
                                                                                                value="{{p.Languages}}" />
                                                                                            <span>{{p.Languages}}</span>
                                                                                    </ul>
                                                                                    </li>


                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-10">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-3">
                                                                                        <label
                                                                                            class="col-form-label">Date
                                                                                            of
                                                                                            Birth</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Dob"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')"
                                                                                            ng-change="Getage();">
                                                                                    </div>

                                                                                    <div class="form-group col-md-3">
                                                                                        <label
                                                                                            class="col-form-label">Age</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Age"
                                                                                            autocomplete="off" readonly>
                                                                                    </div>

                                                                                    <div class="form-group col-md-3">
                                                                                        <label
                                                                                            class="col-form-label">Application
                                                                                            Date</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="ApplicationDate"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')">
                                                                                    </div>

                                                                                    <div class="form-group col-md-3">
                                                                                        <label
                                                                                            class="col-form-label">Blood
                                                                                            Group</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Bloodgroup"
                                                                                            autocomplete="off">
                                                                                    </div>
                                                                                    <div class="form-group col-md-3">
                                                                                        <label
                                                                                            class="col-form-label">Fresher</label>
                                                                                        <select class="form-control"
                                                                                            ng-model="Fresher"
                                                                                            ng-change="GetExpereience(Fresher)">
                                                                                            <option Value="Yes">Yes
                                                                                            </option>
                                                                                            <option value="No">No
                                                                                            </option>


                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group col-md-3"
                                                                                        ng-show="btnfresherno">
                                                                                        <label
                                                                                            class="col-form-label">Expereience</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Expereience"
                                                                                            autocomplete="off">
                                                                                    </div>



                                                                                    <div class="form-group col-md-3"
                                                                                        ng-show="btnfresherno">
                                                                                        <label
                                                                                            class="col-form-label">Serving
                                                                                            NP</label>
                                                                                        <select class="form-control"
                                                                                            ng-model="ServingNoticeperiod">
                                                                                            <option Value="Yes">Yes
                                                                                            </option>
                                                                                            <option value="No">No
                                                                                            </option>

                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group col-md-3"
                                                                                        ng-show="btnfresherno">
                                                                                        <label
                                                                                            class="col-form-label">Notice
                                                                                            Period</label>


                                                                                        <select class="form-control"
                                                                                            ng-model="NoticePeriod">
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
                                                                                        <label
                                                                                            class="col-form-label">Available
                                                                                            on Interview</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Availableoninterview"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')">
                                                                                    </div>


                                                                                    <div class="form-group col-md-6">
                                                                                        <label
                                                                                            class="col-form-label">Address</label>
                                                                                        <textarea class="form-control"
                                                                                            ng-model="Address"></textarea>
                                                                                    </div>



                                                                                    <div
                                                                                        class="form-group text-right col-md-9">
                                                                                        <button style="margin-top:25px"
                                                                                            class="btn btn-sm btn-success"
                                                                                            ng-click="Update_Other_info();"><i
                                                                                                class="fa fa-save"></i>
                                                                                            Update</button>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>



                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div id="menu6" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Candidate
                                                                        Education Details</h5>
                                                                    <div class="card-body">

                                                                        <div class="row">






                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">S.No
                                                                                </label>
                                                                                <input class="form-control"
                                                                                    ng-model="EduNextno" id="EduNextno"
                                                                                    readonly />
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Studied</label>
                                                                                <select ng-model="Cadidatestudied"
                                                                                    id="Candidatestudied"
                                                                                    class="form-control">

                                                                                    <option
                                                                                        ng-repeat="s in GetQualififcationList "
                                                                                        value="{{s.Degree}}">
                                                                                        {{s.Degree}}</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">University/School
                                                                                </label>
                                                                                <input class="form-control"
                                                                                    ng-model="UniversityorSchool"
                                                                                    id="UniversityorSchool" />
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Grade / %
                                                                                </label>
                                                                                <input class="form-control"
                                                                                    ng-model="GradeorPercentage"
                                                                                    id="GradeorPercentage" />
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Passout-Year
                                                                                </label>
                                                                                <select class="form-control"
                                                                                    ng-model="Passoutyear"
                                                                                    id="Passoutyear">
                                                                                    <?php 
                                                                                   for($i = 1940 ; $i <= date('Y'); $i++){
                                                                                    echo "<option>$i</option>";
                                                                                    }
                                                                                         ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Select_file</label>
                                                                                <div class="input-group">
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        ng-model="clearinput"
                                                                                        id="fileInput" name=files[]
                                                                                        accept="image/png, image/gif, image/jpeg,application/pdf">
                                                                                    <div class="input-group-append">
                                                                                        <p id="fileButton"
                                                                                            class="input-group-text">
                                                                                            <i class="fa fa-upload"></i>
                                                                                        </p>
                                                                                    </div>


                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group text-right col-md-6">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="Update_Education();"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Update</button>
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-danger"
                                                                                    ng-click="ResetEducation();"><i
                                                                                        class="fa fa-times"></i>
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



                                                                                                <th scope="col">Action
                                                                                                </th>
                                                                                            </tr>
                                                                                        </thead>


                                                                                        <tbody>
                                                                                        <tbody>



                                                                                            <tr dir-paginate="e in GetEducationList|filter:searchEducation|itemsPerPage:5 "
                                                                                                pagination-id="Educationgrid"
                                                                                                current-page="currentPageEducation">




                                                                                                <td
                                                                                                    style="width: 50px;">
                                                                                                    {{$index+1 + (currentPageEducation - 1) * pageSizeEducation}}
                                                                                                </td>
                                                                                                <td>{{e.Studies}}</td>
                                                                                                <td>{{e.Universityorschool}}
                                                                                                </td>
                                                                                                <td>{{e.Grade}}</td>
                                                                                                <td>{{e.Passoutyear}}
                                                                                                </td>




                                                                                                <td>
                                                                                                    <div
                                                                                                        class="action-btn">
                                                                                                        <img height="15"
                                                                                                            data-toggle="modal"
                                                                                                            data-target="#ModalCenter1Education"
                                                                                                            ng-click="FetchEducation(e.Candidateid,e.Sno);"
                                                                                                            src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                                                        <img height="15"
                                                                                                            ng-click="FetchEducation(e.Candidateid,e.Sno);"
                                                                                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">

                                                                                                        <img height="15"
                                                                                                            data-toggle="modal"
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
                                                                                    <dir-pagination-controls
                                                                                        pagination-id="Educationgrid"
                                                                                        max-size="3"
                                                                                        direction-links="true"
                                                                                        boundary-links="true"
                                                                                        class="pagination">
                                                                                    </dir-pagination-controls>


                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div id="menu2" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">
                                                                        Previous(Sainmark) Employee Details</h5>
                                                                    <div class="card-body">

                                                                        <div class="row">
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Worked</label>
                                                                                <select class="form-control"
                                                                                    ng-model="Previoussainmarksemployee"
                                                                                    ng-change="GetPrevioussain(Previoussainmarksemployee)">
                                                                                    <option Value="Yes">Yes</option>
                                                                                    <option value="No">No</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnpreviousworked">
                                                                                <label
                                                                                    class="col-form-label">Empid(Old)</label>
                                                                                <select ng-model="OldEmpid"
                                                                                    class="form-control"
                                                                                    ng-change="GetOldEmpName();">

                                                                                    <option ng-repeat="s in GetOldList "
                                                                                        value="{{s.Employeeid}}">
                                                                                        {{s.Title}}
                                                                                        {{s.Fullname}}-{{s.Employeeid}}
                                                                                    </option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnpreviousworked">
                                                                                <label
                                                                                    class="col-form-label">Designation</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="PreviousDesignation"
                                                                                    autocomplete="off" readonly>

                                                                            </div>
                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnpreviousworked">
                                                                                <label
                                                                                    class="col-form-label">Department</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="PreviousDepartment"
                                                                                    autocomplete="off" readonly>

                                                                            </div>
                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnpreviousworked">
                                                                                <label
                                                                                    class="col-form-label">Working_Period</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Workingperiod"
                                                                                    autocomplete="off" readonly>

                                                                            </div>
                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnpreviousworked">
                                                                                <label
                                                                                    class="col-form-label">Releiving_reason</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Releivingreason"
                                                                                    autocomplete="off" readonly>

                                                                            </div>


                                                                            <div class="form-group text-right col-md-9">
                                                                                <button class="btn btn-sm btn-success"
                                                                                    style="margin-top:25px"
                                                                                    ng-click="Update_Previous_info();"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Update</button>
                                                                            </div>
                                                                        </div>



                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div id="menu3" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Interview
                                                                        Detail</h5>
                                                                    <div class="card-body">

                                                                        <div class="row">

                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Interviewer
                                                                                </label>
                                                                                <select ng-model="interviewerid"
                                                                                    class="form-control"
                                                                                    ng-change="Getinterviewername();">

                                                                                    <option
                                                                                        ng-repeat="s in GetinterviewerList "
                                                                                        value="{{s.Employeeid}}">
                                                                                        {{s.Title}}
                                                                                        {{s.Fullname}}-{{s.Employeeid}}
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="col-form-label">HR
                                                                                    (Interview)</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Interview_held_On"
                                                                                    onfocus="(this.type='date')"
                                                                                    onblur="(this.type='date')">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="col-form-label">DH
                                                                                    (Interview)</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="DHinterviewdate"
                                                                                    onfocus="(this.type='date')"
                                                                                    onblur="(this.type='date')">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Reschedule_interview_date</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Reschedule_interview"
                                                                                    onfocus="(this.type='date')"
                                                                                    onblur="(this.type='date')">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Reschedule_interview_reason</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Reschedule_interview_reason">
                                                                            </div>

                                                                            <div class="form-group text-right col-md-8">
                                                                                <button style="margin-top:25px"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="Update_interview_info();"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Update</button>


                                                                            </div>

                                                                        </div>



                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div id="menu4" class="tab-pane fade">

                                                                <div class="card">
                                                                    <h5 class="card-header">HR/DH/GM/MD Approval</h5>
                                                                    <div class="card-body">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder">
                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Type</label>
                                                                                    </td>
                                                                                    <td><select class="form-control"
                                                                                            ng-model="ApprovedType"
                                                                                            ng-change="GetRejectedReason()">
                                                                                            <option Value="HR">HR
                                                                                            </option>
                                                                                            <option value="DH">DH
                                                                                            </option>
                                                                                            <option value="GM">GM
                                                                                            </option>
                                                                                            <option value="MD">MD
                                                                                            </option>

                                                                                        </select>
                                                                                    </td>
                                                                                    <td>

                                                                                        <label
                                                                                            class="col-form-label">Status</label>



                                                                                    </td>
                                                                                    <td>
                                                                                        <select class="form-control"
                                                                                            ng-model="Approvedstatus"
                                                                                            ng-change="GetRejectedReason()">
                                                                                            <option Value="Approved">
                                                                                                Approved</option>
                                                                                            <option value="Pending">
                                                                                                Pending
                                                                                            </option>
                                                                                            <option value="Rejected">
                                                                                                Rejected</option>


                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <button
                                                                                            class="btn btn-rounded btn-success"
                                                                                            ng-click="Update_Approval();">Update</button>
                                                                                    </td>
                                                                                    <td>
                                                                                        <button
                                                                                            class="btn btn-rounded btn-success"
                                                                                            ng-click="SendMailForMDApproval();">Sent
                                                                                            Mail For MD
                                                                                            Approval</button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">HR_Approve</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="HR_Approve"
                                                                                            readonly>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Approved/Rejected_datetime</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="HR_Approve_datetime"
                                                                                            readonly>
                                                                                    <td> <label
                                                                                            class="col-form-label">Rejected_reason</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="HR_Decline"
                                                                                            ng-disabled="HRDecline">

                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label class="col-form-label"
                                                                                            title="">DH_Approve</label>
                                                                                    </td>
                                                                                    <td><input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="DH_Approve"
                                                                                            readonly>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Approved/Rejected_datetime</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="DH_Approve_datetime"
                                                                                            readonly>
                                                                                    <td> <label
                                                                                            class="col-form-label">Rejected_reason</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="DH_Decline"
                                                                                            ng-disabled="DHDecline">
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label class="col-form-label"
                                                                                            title="">GM_Approve</label>
                                                                                    </td>
                                                                                    <td><input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="GM_Approve"
                                                                                            readonly>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Approved/Rejected_datetime</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="GM_Approve_datetime"
                                                                                            readonly>
                                                                                    <td> <label
                                                                                            class="col-form-label">Rejected_reason</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="GM_Decline"
                                                                                            ng-disabled="GMDecline">
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label class="col-form-label"
                                                                                            title="">MD_Approve</label>
                                                                                    </td>
                                                                                    <td><input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="MD_Approve"
                                                                                            readonly>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Approved/Rejected_datetime</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="MD_Approve_datetime"
                                                                                            readonly>
                                                                                    <td> <label
                                                                                            class="col-form-label">Rejected_reason</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="MD_Decline"
                                                                                            ng-disabled="MDDecline">
                                                                                </tr>

                                                                            </table>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div id="menu5" class="tab-pane fade">

                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Date Of
                                                                        Joining / Accepted Detail</h5>
                                                                    <div class="card-body">

                                                                        <div class="row">
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Offer
                                                                                    Accepted By Candidate </label>
                                                                                <select class="form-control"
                                                                                    ng-model="CandidateAccepted">
                                                                                    <option value="Offer Accepted By Candidate">Offer
                                                                        Accepted by Candidate
                                                                    </option>
                                                                    <option Value="Waiting For candidate Approval">
                                                                        Waiting For Candidate Approval</option>
                                                                        <option value="Offer Rejected by Candidate">Offer
                                                                        Rejected by Candidate
                                                                    </option>


                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Expected
                                                                                    Date Of Joining</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Date_Of_Joing"
                                                                                    onfocus="(this.type='date')"
                                                                                    onblur="(this.type='date')">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Accepted
                                                                                    CTC </label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="CommitedCTC"
                                                                                    autocomplete="off"
                                                                                    onkeypress="return Validate(event);">
                                                                            </div>



                                                                            <div
                                                                                class="form-group text-right col-md-12">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="Update_DOJ_info();"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Update</button>





                                                                            </div>
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


                                                                            <table
                                                                                class="table table-bordered  table-sm info-table can-table">
                                                                                <thead>
                                                                                    <tr align="center">
                                                                                        <th colspan="8">General
                                                                                        </th>
                                                                                        <th colspan="20">Monthly
                                                                                            Detail
                                                                                        </th>
                                                                                        <th colspan="20">Annual
                                                                                            Detail
                                                                                        </th>

                                                                                    </tr>
                                                                                    <tr class="bg-green text-white">

                                                                                        <th>#</th>
                                                                                        <th colspan="5">
                                                                                            Action</th>
                                                                                        <th>FitStatus</th>
                                                                                        <th>Approval</th>
                                                                                        <th>Basic</th>
                                                                                        <th>Hra</th>
                                                                                        <th>Special</th>
                                                                                        <th>Total</th>
                                                                                        <th>PF</th>
                                                                                        <th>Graduity</th>
                                                                                        <th>Retirals</th>
                                                                                        <th>GAC</th>
                                                                                        <th>Bonous</th>
                                                                                        <th>Other Bonous</th>
                                                                                        <th>CTC</th>
                                                                                        <th>Deductions</th>
                                                                                        <th>ESIC</th>
                                                                                        <th>PFEmployee</th>
                                                                                        <th>Canteen</th>
                                                                                        <th>Stay</th>
                                                                                        <th>Travel</th>
                                                                                        <th>Other Deductions</th>
                                                                                        <th>Deduction Total</th>
                                                                                        <th>Take Home</th>

                                                                                        <th>Basic</th>
                                                                                        <th>Hra</th>
                                                                                        <th>Special</th>
                                                                                        <th>Total</th>
                                                                                        <th>PF</th>
                                                                                        <th>Graduity</th>
                                                                                        <th>Retirals</th>
                                                                                        <th>GAC</th>
                                                                                        <th>Bonous</th>
                                                                                        <th>Other Bonous</th>
                                                                                        <th>CTC</th>
                                                                                        <th>Deductions</th>
                                                                                        <th>ESIC</th>
                                                                                        <th>PFEmployee</th>
                                                                                        <th>Canteen</th>
                                                                                        <th>Stay</th>
                                                                                        <th>Travel</th>
                                                                                        <th>Other Deductions</th>
                                                                                        <th>Deduction Total</th>
                                                                                        <th>Take Home</th>

                                                                                    </tr>
                                                                                </thead>


                                                                                <tbody>

                                                                                    <tr dir-paginate="e in GetSalaryList |filter:searchSalary|itemsPerPage:5 "
                                                                                        pagination-id="Salarygrid"
                                                                                        current-page="currentPageSalary">




                                                                                        <td>
                                                                                            {{$index+1 + (currentPageSalary - 1) * pageSizeSalary}}
                                                                                        </td>
                                                                                        <td>
                                                                                            <p>
                                                                                                <span class="pointer"
                                                                                                    ng-click="SendFitEdit(e.Candidateid,e.fitno);">
                                                                                                    <img height="15"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                                                                                </span>
                                                                                            </p>
                                                                                        </td>

                                                                                        <td> <span class="pointer">
                                                                                                <a
                                                                                                    ng-click="GetOfferletter(e.Candidateid,e.fitno);"><img
                                                                                                        height="20"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/download.png">
                                                                                            </span></a>
                                                                                        </td>

                                                                                        <td>
                                                                                            <span class="pointer"
                                                                                                ng-click="SendFitMailApprove(e.Candidateid,e.fitno);"><img
                                                                                                    height="20"
                                                                                                    src="<?php echo "$domain"; ?>/assets/icons/thumbs-up.png">
                                                                                                Mail MD</span>
                                                                                        </td>
                                                                                        <td><span class="pointer"
                                                                                                ng-click="GetMailcontent(e.Candidateid,e.fitno);"
                                                                                                data-toggle="modal"
                                                                                                data-target="#ModalMail"><img
                                                                                                    height="20"
                                                                                                    src="<?php echo "$domain"; ?>/assets/icons/mail_md.png">
                                                                                                Mail </span></td>

                                                                                        <td><span class="pointer"
                                                                                                ng-click="GetMailCANcontent(e.Candidateid,e.fitno);"
                                                                                                data-toggle="modal"
                                                                                                data-target="#ModalMail"><img
                                                                                                    height="20"
                                                                                                    src="<?php echo "$domain"; ?>/assets/icons/mail_can.png">
                                                                                                Mail (CAN)</span>

                                                                                            </p>







                                                                                        </td>
                                                                                        <td>{{e.FitStatus}}</td>
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
                                                                                    <dir-pagination-controls
                                                                                        pagination-id="Salarygrid"
                                                                                        max-size="3"
                                                                                        direction-links="true"
                                                                                        boundary-links="true"
                                                                                        class="pagination">
                                                                                    </dir-pagination-controls>
                                                                                </div>

                                                                            </div>

                                                                            <button class="btn btn-rounded btn-info"
                                                                                ng-click="FitOpen();">Add(+)</button>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div id="menu8" class="tab-pane fade">

                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Present
                                                                        Working Detail</h5>
                                                                    <div class="card-body">

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
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="PreviousPosition">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Current
                                                                                    CTC</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="CurrentCTC"
                                                                                    autocomplete="off"
                                                                                    onkeypress="return Validate(event);">
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Position
                                                                                    Applied
                                                                                    For</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="AppliedPosition">
                                                                            </div>







                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Expected
                                                                                    CTC</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="ExpectedCTC"
                                                                                    autocomplete="off"
                                                                                    onkeypress="return Validate(event);">
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Negotiable
                                                                                    CTC </label>

                                                                                <select class="form-control"
                                                                                    ng-model="NegotiableCTC">
                                                                                    <option Value="Yes">Yes</option>
                                                                                    <option value="No">No</option>

                                                                                </select>

                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Willing to
                                                                                    Relocate </label>
                                                                                <select class="form-control"
                                                                                    ng-model="Willingtorelocate">
                                                                                    <option Value="Yes">Yes</option>
                                                                                    <option value="No">No</option>

                                                                                </select>
                                                                            </div>

                                                                            <div
                                                                                class="form-group text-right col-md-12">
                                                                                <button class="btn btn-sm btn-success"
                                                                                    ng-click="Update_Present_info();"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Update</button>


                                                                            </div>



                                                                        </div>



                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div id="menu9" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Reporting
                                                                        Details and Designation</h5>
                                                                    <div class="card-body">
                                                                        <div class="row">

                                                                            <div class="form-group col-md-4">
                                                                                <label class="col-form-label">Reporting
                                                                                    To</label>
                                                                                <select ng-model="ReportingToid"
                                                                                    class="form-control"
                                                                                    ng-change="GetReporterName();">

                                                                                    <option
                                                                                        ng-repeat="s in GetinterviewerList "
                                                                                        value="{{s.Employeeid}}">
                                                                                        {{s.Title}}
                                                                                        {{s.Fullname}}-{{s.Employeeid}}
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Business</label>
                                                                                <input class="form-control"
                                                                                    ng-model="Business" />
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Designation
                                                                                    Proposed </label>
                                                                                <select ng-model="Designationproposed"
                                                                                    class="form-control">

                                                                                    <option
                                                                                        ng-repeat="s in GetDesignationList "
                                                                                        value="{{s.Designation}}">
                                                                                        {{s.Designation}}</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Location</label>
                                                                                <select ng-model="Location"
                                                                                    class="form-control">

                                                                                    <option
                                                                                        ng-repeat="s in GetCityList "
                                                                                        value="{{s.City}}">
                                                                                        {{s.City}}</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Department</label>
                                                                                <select ng-model="Department"
                                                                                    class="form-control">

                                                                                    <option
                                                                                        ng-repeat="s in GetDepartmentList "
                                                                                        value="{{s.Department}}">
                                                                                        {{s.Department}}</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-8 text-right">

                                                                                <button class="btn btn-sm btn-success"
                                                                                    style="margin-top:25px"
                                                                                    ng-click="Update_Reporting();"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Update</button>

                                                                            </div>
                                                                        </div>





                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="menu10" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Vaccination
                                                                        Details</h5>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="form-group col-md-2">
                                                                                <label class="col-form-label">
                                                                                    S.No </label>
                                                                                <input type="text" class="form-control"
                                                                                    id="Vaccinatedsno"
                                                                                    ng-model="Vaccinatedsno" readonly>
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label"> Covid
                                                                                    Vaccinated </label>
                                                                                <select class="form-control"
                                                                                    id="Covidvaccinated"
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
                                                                                <input type="text" class="form-control"
                                                                                    id="Vaccinateddate"
                                                                                    ng-model="Vaccinateddate"
                                                                                    onfocus="(this.type='date')"
                                                                                    onblur="(this.type='date')">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Certificate</label>
                                                                                <div class="input-group">
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        ng-model="clearinput"
                                                                                        id="fileInput05" name=files[]
                                                                                        accept="image/png, image/gif, image/jpeg,application/pdf">
                                                                                    <div class="input-group-append">
                                                                                        <p id="fileButton05"
                                                                                            class="input-group-text">
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
                                                                                ng-click="UpdateVaccination();"><i
                                                                                    class="fa fa-save"></i>
                                                                                Update</button>

                                                                            <button class="btn btn-sm btn-success"
                                                                                ng-click="ResetVaccination();"><i
                                                                                    class="fa fa-save"></i>
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




                                                                                                <td
                                                                                                    style="width: 50px;">
                                                                                                    {{$index+1 + (currentPageVaccination - 1) * pageSizeVaccination}}
                                                                                                </td>
                                                                                                <td>{{e.Vacinationtype}}
                                                                                                </td>
                                                                                                <td>{{e.Vaccinationdate2}}
                                                                                                </td>

                                                                                                </td>




                                                                                                <td>
                                                                                                    <div
                                                                                                        class="action-btn">
                                                                                                        <img height="15"
                                                                                                            data-toggle="modal"
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
                                                                                    <dir-pagination-controls
                                                                                        pagination-id="Vaccinationgrid"
                                                                                        max-size="3"
                                                                                        direction-links="true"
                                                                                        boundary-links="true"
                                                                                        class="pagination">
                                                                                    </dir-pagination-controls>


                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div id="menu11" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Confirmation
                                                                        and Appointment Letter</h5>
                                                                    <div class="card-body">
                                                                        <div class="row">

                                                                            <div class="form-group col-md-3">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="AppointmentTamil();"
                                                                                    data-toggle="modal"
                                                                                    data-target="#ModalCenter1AppointmentView"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Appointment(Tamil)</button>

                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="AppointmentTamil();"
                                                                                    data-toggle="modal"
                                                                                    data-target="#ModalCenter1ConfirmationView"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Confirmation(Tamil)</button>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="AppointmentTamil();"
                                                                                    data-toggle="modal"
                                                                                    data-target="#ModalCenter1AppointmentHindi"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Appointment(Hindi)</button>

                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="AppointmentTamil();"
                                                                                    data-toggle="modal"
                                                                                    data-target="#ModalCenter1ConfirmationViewHindi"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Confirmation(Hindi)</button>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="FetchFinalFit();"
                                                                                    data-toggle="modal"
                                                                                    data-target="#ModalCenter1AppointmentEnglish"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Appointment(English)</button>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="AppointmentTamil();"
                                                                                    data-toggle="modal"
                                                                                    data-target="#ModalCenter1OfferEnglish"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Offer Letter</button>
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
                                </div>
                            </div>
                        </div>




                    </div>



                    <div class="modal fade" id="ModalCenter1" tabindex="-1" role="dialog" id="" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label text-green-bold">Components</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <label class="col-form-label text-green-bold">Monthly</label>
                                            </div>
                                            <div class="col-md-1 nopadding ">
                                                <label class="col-form-label text-green-bold">Annual</label>
                                            </div>
                                            <div class="col-md-1 nopadding ">
                                                <label class="col-form-label text-green-bold">inc%</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label text-green-bold">Components</label>
                                            </div>
                                            <div class="col-md-1 nopadding ">
                                                <label class="col-form-label text-green-bold">Monthly</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <label class="col-form-label text-green-bold">Annual</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <label class="col-form-label text-green-bold">inc%</label>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Basic+DA</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotBasicDA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaBasicDA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperBasicDA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">HRA</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotHRA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaHRA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperHRA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Special
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurMotSpecialAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaSpecialAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperSpecialAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Total
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotTotalAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaTotalAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperTotalAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 nopadding">
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">

                                            <label class="col-md-12 text-green mb-2"><b>Retirals Employer
                                                    Contribution</b></label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">PF (12 %) From
                                                    Basic</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotPFemployeer"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaPFemployeer"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperPFemployeer"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">Gradutity(5%)</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotGratuity"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaGratuity"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperGratuity"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Retirals
                                                    Total</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotRetairlsTotal"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaRetairlsTotal"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperRetairlsTotal" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">GAC</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotGAC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaGAC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperGAC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Bonous @
                                                    8.33%</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotEstimatedBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaEstimatedBonous" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperEstimatedBonous" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">Other
                                                    Bonous</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotOtherBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaOtherBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperOtherBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 nopadding">
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> <label class="text-green mb-2"><b>Other
                                                        Components</b></label> </div>

                                            <div class="col-md-6">
                                                <label class="text-green mb-2"><b>Deductions</b></label>
                                            </div>


                                        </div>
                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Est.CTC</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>


                                            <div class="col-md-3">
                                                <label class="col-form-label">PF
                                                    Employee</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotPFemployee"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaPFemployee"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperPFemployee"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">ESIC</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotESIC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaESIC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperESIC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Stay
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotStayAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaStayAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperStayAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>








                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Canteen</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotCanteen"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaCanteen"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperCanteen"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Other
                                                    Deductions</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotOtherDeductions"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaOtherDeductions" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperOtherDeductions" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Travel
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotTravelAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaTravelAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperTravelAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Take
                                                    Home</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurMottakehomewithouttax" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuatakehomewithouttax" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="Curincpertakehomewithouttax" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Deductions
                                                    Total</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotDeductionTotal"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaDeductionTotal" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperDeductionTotal" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 nopadding">
                                                <hr />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Status</label>
                                                    </div>
                                                    <div class="col-md-6 nopadding">
                                                        <select class="form-control" ng-model="FitStatus"
                                                            ng-change="GetStatusAlert(FitStatus);">
                                                            <option Value="Open">Open</option>
                                                            <option value="Cancel">Cancel</option>
                                                            <option value="Final">Final</option>
                                                        </select>
                                                    </div>
                                                </div>





                                            </div>
                                            <div class="col-md-6 nopadding">
                                                <div class="form-group text-right">
                                                    <button class="btn btn-sm btn-success"
                                                        ng-click="UpdateFitement();"><i class="fa fa-save"></i>
                                                        Update</button>

                                                    <button class="btn btn-sm btn-warning"
                                                        ng-click="CalculateFitment();"><i class="fa fa-calculator"></i>
                                                        Calculate</button>

                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-dismiss="modal"><i class="fa fa-times"></i>
                                                        Close</button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                </div>



                                <div class="modal-footer">





                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalFinal" tabindex="-1" role="dialog" id="" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="card-body">


                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Components</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <label class="col-form-label">Monthly</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <label class="col-form-label">Annual</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <label class="col-form-label">inc%</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Components</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <label class="col-form-label">Monthly</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <label class="col-form-label">Annual</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <label class="col-form-label">inc%</label>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Basic+DA</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotBasicDA"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaBasicDA"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperBasicDA"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">HRA</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotHRA" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaHRA" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperHRA"
                                                    readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Special
                                                    Allowance</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurMotSpecialAllowance" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaSpecialAllowance" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperSpecialAllowance" readonly>
                                            </div>

                                            <div class="col-lg-2">
                                                <label class="col-form-label">Total
                                                    Allowance</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotTotalAllowance"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaTotalAllowance" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperTotalAllowance" readonly>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <label>Retirals Employer Contribution</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label class="col-form-label">PF (12 %) From
                                                    Basic</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotPFemployeer"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaPFemployeer"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperPFemployeer"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Gradutity(5%)</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotGratuity"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaGratuity"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperGratuity"
                                                    readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Retirals
                                                    Total</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotRetairlsTotal"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaRetairlsTotal"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperRetairlsTotal" readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">GAC</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotGAC" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaGAC" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperGAC"
                                                    readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Bonous @
                                                    8.33%</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotEstimatedBonous"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaEstimatedBonous" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperEstimatedBonous" readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Other
                                                    Bonous</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotOtherBonous"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaOtherBonous"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperOtherBonous"
                                                    readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <label>Other Components</label>
                                        </div>
                                        <div class="row">

                                            <div class="col-lg-2">
                                                <label class="col-form-label">Est.CTC</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotCTC" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaCTC" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperCTC"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Deductions</label>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-2">
                                                <label class="col-form-label">ESIC</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotESIC" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaESIC"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperESIC"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">PF
                                                    Employee</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotPFemployee"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaPFemployee"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperPFemployee"
                                                    readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-2">
                                                <label class="col-form-label">Canteen</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotCanteen"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaCanteen"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperCanteen"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Stay
                                                    Allowance</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotStayAllowance"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaStayAllowance"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperStayAllowance" readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-2">
                                                <label class="col-form-label">Travel
                                                    Allowance</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotTravelAllowance"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaTravelAllowance" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperTravelAllowance" readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Other
                                                    Deductions</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotOtherDeductions"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaOtherDeductions" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperOtherDeductions" readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-2">
                                                <label class="col-form-label">Deductions
                                                    Total</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotDeductionTotal"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaDeductionTotal" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperDeductionTotal" readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Take
                                                    Home</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurMottakehomewithouttax" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuatakehomewithouttax" autocomplete="off" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="Curincpertakehomewithouttax" autocomplete="off" readonly>
                                            </div>

                                        </div>



                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <div class="form-group text-right">


                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalCenter1s" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-lg " role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        FitMent Calculation
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalApproval" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Approval(MD)</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger" role="alert">

                                        <label class="col-form-label">Status</label>


                                        <select class="form-control" ng-model="MDApproval"
                                            ng-change="GetStatusAlert(FitStatus);">
                                            <option Value="Pending">Pending</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Cancel">Cancel</option>


                                        </select>


                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-rounded btn-success" ng-click="UpdateApprove();"
                                        data-dismiss="modal">Update</button>
                                    <button type="button" class="btn btn-rounded btn-dark"
                                        data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalMail" tabindex="-1" role="dialog" id="" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <p class="page-title text-green">Mail</p>
                                    <hr />
                                    <div class="">

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">To Address</label>
                                                <textarea type="text" class="form-control" ng-model="ToMail"></textarea>
                                            </div>


                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Subject</label>
                                                <input type="text" class="form-control" ng-model="SubjectMail">
                                            </div>
                                        </div>



                                        <p class="page-title text-green">Message</p>
                                        <table id="iif-editor" class="mb-2">
                                            <tr>
                                                <div text-angular="text-angular" name="MessageMail"
                                                    ng-model="MessageMail" ta-disabled='disabled' class="iif-editor"
                                                    style="width:100%;overflow:auto;"></div>
                                            </tr>
                                        </table>

                                        <div class="text-left mt-3">

                                        </div>
                                        <div id="msg" class="info-msg"></div>
                                        <div id="msg2" class="info-msg"></div>
                                    </div>


                                </div>
                                <div class="modal-footer">



                                    <button class="btn btn-sm btn-success" ng-click="SendNormalMail();"
                                        data-dismiss="modal"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        &nbsp;Send</button>


                                    <button class="btn btn-sm btn-danger" data-dismiss="modal"><i
                                            class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp;Close</button>


                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalCenter1Certificate" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Vaccination-Details
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
                    <div class="modal fade" id="ModalCenter1Offerletter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate Offer Letter Details
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <iframe ng-src="{{OfferletterView}}"
                                            ng-hide="OfferletterView == null || OfferletterView == '' "
                                            ng-show="OfferletterView != null " style="height:400px;width:100%"></iframe>
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
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete {{Vaccinatedsno}}
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
                    <div class="modal fade" id="ModalCenter1DocumentView" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate- Document
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <iframe ng-src="{{Candidatedocument}}"
                                            ng-hide="Candidatedocument == null || Candidatedocument == '' "
                                            ng-show="Candidatedocument != null "
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
                    <div class="modal fade" id="ModalCenter1AppointmentView" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate - Appointment - Order
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">



                                            <a id="btnAppointmentordertamil" class="btn btn-info btn-nda-down2"><i
                                                    class="fa fa-download"></i> Download</a>
                                            <div class="card-body">

                                                <div id="pdfExportAppointmentorder">

                                                    <div class="pdf-sipl">
                                                        <div class="pdf-header-sipl-modal"> <img
                                                                src="../Logo/Sainmarknewlogo.png" width="130"
                                                                height="50" />
                                                            <p><b>Sainmarks Industries (India) Pvt Ltd</b><br />
                                                                476/1b/1a, Label Arcade, Jothi Nagar,
                                                                Palavanjipalayam,<br />
                                                                Dharapuram Main Road, Tirupur-641 608.</p>
                                                        </div>
                                                        <hr />
                                                        <center>
                                                            <h4>Appointment Order - பணி நியமன உத்தரவு</h4>
                                                        </center>


                                                        <p>பெறுதல்,</p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}{{Lastname}}
                                                        </p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Address}}
                                                        </p>
                                                        <p>தேதி :</p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Appointmentsentdate}}
                                                        </p>
                                                        <br /><br /><br />

                                                        <p>உங்களது விண்ணப்பம் நாள் : </p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ApplicationDate2}}
                                                        </p>

                                                        <p>அன்புடையீர்,</p>
                                                        <p>உங்களது <b><u> {{ApplicationDate2}}</b></u> தேதியிட்ட
                                                            விண்ணப்பத்தின்
                                                            அடிப்படையில்
                                                            உங்களை எமது
                                                            நிர்வாகம் பிரிவில் பணிக்கு நியமனம் செய்வதில்
                                                            பெருமைபடுகிறோம். உங்களது பணி முதல்
                                                            தகுதிக்கான அடிப்படையில் அமர்த்துகிறோம். உங்களுக்கான வேலை
                                                            நேரம் தினசரி 8 மணி
                                                            நேரம் ஆகும். உங்களது மாத சம்பளம் ரூ.
                                                            <b><u> {{CommitedCTC|currency:''}}</b></u>
                                                            என்று
                                                            நிர்ணயிக்கப்படுகிறது.
                                                            உங்களது சம்பளம் பிரதி மாதம் <b>7- ஆம் தேதிக்குள்</b>
                                                            வழங்கப்படும்.
                                                        </p>


                                                        <p>இதில் அரசின் தொழிலாளர் நல சட்டங்களின் அடிப்படையில்
                                                            வருங்கால
                                                            வைப்பு நிதி EPF ஆனது
                                                            12 சதவிகிதமும் (12%), தொழிலாளர் அரசு காப்பிட்டு
                                                            கழகத்திற்கு
                                                            (ESI) 0.75
                                                            சதவிகிதமும், உங்களது அடிப்படை சம்பளத்தில் பிடித்தம்
                                                            செய்யப்படும். உங்களது
                                                            திறமையின் அடிப்படையிலும், செயல்பாடுகளின் அடிப்படையிலும்
                                                            உங்களை எமது
                                                            நிர்வாகத்தில் நிரந்தர பணியாளராக பணி நிரந்தரம்
                                                            செய்யப்படுவீர்கள்.</p>


                                                        <p> தங்களது உழைப்பை உண்மையுடன் நிறுவனத்திற்கு அளித்து
                                                            மென்மேலும்
                                                            வளர்ச்சியடைய
                                                            வாழ்த்துக்களை தெரிவித்து கொள்கிறோம்.
                                                            உண்மைநகல் பெற்றுக்கொண்டேன்.</p>



                                                        <p style="text-align:left;"><span
                                                                style="float:right;">இப்படிக்கு,</span></p>
                                                        <br />
                                                        <br />
                                                        <br />
                                                        <br />
                                                        <p style="text-align:left;"><span style="float:right;">நிர்வாகம்
                                                                /அங்கீகாரம் பெற்ற அதிகாரி</span></p>


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
                    <div class="modal fade" id="ModalCenter1AppointmentHindi" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate - Appointment - Order
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">



                                            <a id="btnAppointmentorderhindi" class="btn btn-info btn-nda-down2"><i
                                                    class="fa fa-download"></i> Download</a>
                                            <div class="card-body">

                                                <div id="pdfExportAppointmentorderHindi">

                                                    <div class="pdf-sipl">
                                                        <div class="pdf-header-sipl-modal"> <img
                                                                src="../Logo/Sainmarknewlogo.png" width="130"
                                                                height="50" />
                                                            <p><b>Sainmarks Industries (India) Pvt Ltd</b><br />
                                                                476/1b/1a, Label Arcade, Jothi Nagar,
                                                                Palavanjipalayam,<br />
                                                                Dharapuram Main Road, Tirupur-641 608.</p>
                                                        </div>
                                                        <hr />
                                                        <center>
                                                            <h4>APPOINMENT ORDER / भुगतान के आदेश</h4>
                                                        </center>



                                                        <p>To / मिल रहा :</p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}{{Lastname}}
                                                        </p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Address}}
                                                        </p>
                                                        <p>DATE / दिनांक :</p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Appointmentsentdate}}
                                                        </p>
                                                        <br /><br /><br />

                                                        <p>Ref : Your Application Date / आपका आवेदन दिनांकित है: </p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ApplicationDate2}}

                                                        <p>तुम्हारा,</p>

                                                        <p>दिनांकित आवेदन के आधार पर हमारा प्रशासन<b><u>
                                                                    {{ApplicationDate2}}</b></u>अनुभाग
                                                            काम हमें नियुक्ति पर गर्व है। आपका काम
                                                            पहले हमें योग्यता के आधार पर दिन के लिए नियुक्त
                                                            किया जाता है। तुम्हारा काम के घंटे के बारे में 8 घंटे दैनिक
                                                            रहे हैं <b><u> {{CommitedCTC|currency:''}}</b></u>आपका मासिक
                                                            वेतन रु.आपका वेतन महीने की
                                                            7 तारीख तक भुगतान कर दिया जाएगा.</p>

                                                        <p>EPF अबे 12 प्रतिशत (12%), श्रम सरकार (ईएसआई) के लिए प्रतिशत
                                                            और आपका 0.75% आधार वेतन पर कटौती की जाएगी। अपनी क्षमता के
                                                            आधार पर, गतिविधियों के आधार पर, आप हमारे प्रशासन के एक
                                                            स्थायी कर्मचारी हैं स्थायी कार्य उपर्युक्त समयावधि के भीतर
                                                            किया जाएगा।</p>
                                                        <p>एक वास्तविक कंपनी में अपने स्वयं के श्रम को विकसित और विकसित
                                                            करना। से नमस्ते. </p>


                                                        <p>मुझे वास्तविक प्रति प्राप्त हुई है।</p>
                                                        <p>इस प्रकार,</p>

                                                        <p>व्यवस्थापक/मान्यता प्राप्त अधिकारी</p>


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
                    <div class="modal fade" id="ModalCenter1ConfirmationView" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate - Confirmation -
                                        Order-Tamil
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">



                                            <a id="btnConfirmationordertamil" class="btn btn-info btn-nda-down2"><i
                                                    class="fa fa-download"></i> Download</a>
                                            <div class="card-body">

                                                <div id="pdfExportConfirmationorder">

                                                    <div class="pdf-sipl">
                                                        <div class="pdf-header-sipl-modal"> <img
                                                                src="../Logo/Sainmarknewlogo.png" width="130"
                                                                height="50" />
                                                            <p><b>Sainmarks Industries (India) Pvt Ltd</b><br />
                                                                476/1b/1a, Label Arcade, Jothi Nagar,
                                                                Palavanjipalayam,<br />
                                                                Dharapuram Main Road, Tirupur-641 608.</p>
                                                        </div>
                                                        <hr />
                                                        <center>
                                                            <h4>Confirmation Order / பணி நிரந்தர உத்தரவு</h4>
                                                        </center>


                                                        <p style="text-align:left;">To <br />பெறுதல்</p>
                                                        <p><span style="float:right;">DATE :
                                                                {{Appointmentsentdate}}</span></p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}{{Lastname}}
                                                        </p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Address}}
                                                        </p>
                                                        <br /><br /><br /><br /><br /><br />
                                                        <div>
                                                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;உங்களது பணி நியமன உத்தரவு
                                                                <b><u>{{ApplicationDate2}}</u></b> தேதியிட்ட
                                                                கடிதத்தை தொடர்ந்து உங்களது திறமையின் அடிப்படையிலும்
                                                                உங்களின் நன்நடத்தை,
                                                                செயல்பாடுகளின் அடிப்படையிலும் உங்களை எமது நிர்வாகம்
                                                                <b><u>{{Date_Of_Joing2}}</b></u>முதல் பணி
                                                                நிரந்தரம் செய்வதில் பெருமிதம் கொள்கிறது. உங்களது சம்பளம்
                                                                கீழ்க்கண்டவாறு
                                                                நிர்ணயிக்கபடுகிறது.
                                                            </p>
                                                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;சம்பளம் ரூ.
                                                                <b><u>{{CommitedCTC|currency:''}} </b></u>
                                                                நாள் / மாதம் மேலும்
                                                                பிடித்தங்களிலும் ஏனைய விதிமுறைகளிலும் எந்தவித மாற்றமும்
                                                                இல்லை. எனவே தொடந்து
                                                                உமது பணியை செவ்வனே செய்து நிர்வாகத்தின் வளர்ச்சியும்
                                                                தங்களின் வளர்ச்சியும்
                                                                மேம்பட வாழ்த்துகளை தெரிவித்து கொள்கிறது.
                                                            </p>
                                                        </div>
                                                        <p>இப்படிக்கு,</p>



                                                        <p style="text-align:left;">உண்மைநகல் பெற்றுக்கொண்டேன்<span
                                                                style="float:right;">நிர்வாகம் /அங்கீகாரம் பெற்ற
                                                                அதிகாரி</span></p>


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
                    <div class="modal fade" id="ModalCenter1ConfirmationViewHindi" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate - Confirmation -
                                        Order-Hindi
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">



                                            <a id="btnConfirmationorderHindi" class="btn btn-info btn-nda-down2"><i
                                                    class="fa fa-download"></i> Download</a>
                                            <div class="card-body">

                                                <div id="pdfExportConfirmationorderHindi">

                                                    <div class="pdf-sipl">
                                                        <div class="pdf-header-sipl-modal"> <img
                                                                src="../Logo/Sainmarknewlogo.png" width="130"
                                                                height="50" />
                                                            <p><b>Sainmarks Industries (India) Pvt Ltd</b><br />
                                                                476/1b/1a, Label Arcade, Jothi Nagar,
                                                                Palavanjipalayam,<br />
                                                                Dharapuram Main Road, Tirupur-641 608.</p>
                                                        </div>
                                                        <hr />
                                                        <center>
                                                            <h4>CONFIRMATION ORDER</h4>
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


                                                        <p style="text-align:left;">To / प्रति </p>

                                                        <p> <span style="float:right;">DATE / दिनांक:
                                                                {{Appointmentsentdate}}</span></p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}{{Lastname}}
                                                        </p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Address}}
                                                        </p>
                                                        <br /><br /><br /><br /><br /><br />
                                                        <div>
                                                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;आपका नियुक्ति
                                                                आदेश<b><u>{{ApplicationDate2}}</u></b> दिनांकित पत्र
                                                                आपकी जारी रखने और आचरण करने की क्षमता हमारे प्रशासन के
                                                                आधार पर <b><u>{{Date_Of_Joing2}}</b></u>
                                                                पहला कार्य स्थायी करने में गर्व लेता है. आपका वेतन
                                                                निम्नानुसार निर्धारित
                                                                होता है.</p>
                                                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;वेतन रु
                                                                <b><u>{{CommitedCTC|currency:''}} </b></u> अधिक
                                                                पसंदीदा पर दिन अन्य
                                                                शब्दों में कोई परिवर्तन नहीं हुआ है। तो तुम काम करने के
                                                                लिए जारी.
                                                            </p>
                                                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;प्रशासन के प्रबंधन और विकास
                                                                में सुधार करने के
                                                                लिए.</p>
                                                        </div>
                                                        <p>इस प्रकार,</p>



                                                        <p style="text-align:left;">मुझे वास्तविक प्रति प्राप्त हुई है।
                                                            <span style="float:right;">व्यवस्थापक/मान्यता प्राप्त
                                                                अधिकारी</span>
                                                        </p>


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

                    <div class="modal fade" id="ModalCenter1AppointmentEnglish" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Appointment Order
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">



                                            <a id="btnAppointmentorderEnglish" class="btn btn-info btn-nda-down2"><i
                                                    class="fa fa-download"></i> Download</a>
                                            <div class="card-body">

                                                <div id="pdfExportAppointmentorderEnglish">

                                                    <div class="pdf-sipl">
                                                        <div class="pdf-header-sipl-modal"> <img
                                                                src="../Logo/Sainmarknewlogo.png" width="130"
                                                                height="50" />
                                                            <p><b>Sainmarks Industries (India) Pvt Ltd</b><br />
                                                                476/1b/1a, Label Arcade, Jothi Nagar,
                                                                Palavanjipalayam,<br />
                                                                Dharapuram Main Road, Tirupur-641 608.</p>
                                                        </div>
                                                        <hr />
                                                        <style>
                                                        .btn-nda-down {
                                                            position: absolute;
                                                            top: 5px;
                                                            right: 15px;
                                                        }

                                                        p {
                                                            text-align: justify;
                                                        }

                                                        .div-table {
                                                            display: table;
                                                            width: 100%;
                                                        }

                                                        .div-table-row {
                                                            display: table-row;
                                                            width: 100%;
                                                            clear: both;
                                                        }

                                                        .div-table-col {
                                                            float: left;
                                                            /* fix for buggy browsers */
                                                            width: 50%;
                                                            display: table-column;
                                                        }

                                                        h4 {
                                                            text-align: center;
                                                            font-weight: bold;
                                                        }

                                                        .nda-ta-content p,
                                                        .nda-ta-content ul li {
                                                            font-size: 15px;
                                                        }

                                                        .nda-ta-content p u {
                                                            font-weight: bold;
                                                        }
                                                        </style>


                                                        <div class='nda-ta-content'><br />

                                                            <h4>Appointment Order</h4>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p><b>To,</b><br />
                                                                        {{Title}}{{Firstname}}{{Lastname}}<br />
                                                                        {{Address}}<br /><br /><br /><br /></p>
                                                                </div>
                                                                <div class="col-md-6 text-right"><b>Date:
                                                                        {{Appointmentsentdate}}</b></div>
                                                            </div>

                                                            <p>Dear {{Title}}{{Firstname}}{{Lastname}} </p>

                                                            <p>Sub: Appointment Order</p>


                                                            <p>We are happy to appoint you with us as
                                                                “<u>{{Designationproposed}}</u> “ w.e.f. In our
                                                                Organization on the following terms and conditions. </p>


                                                            <p class="text-bold">EMOLUMENTS PER MONTH</p>
                                                            <div class="ml-4">

                                                                <p>1. You will be paid salary comprising of the
                                                                    following,</p>

                                                                <table class="table table-bordered" style="width:500px">
                                                                    <tr>
                                                                        <td style="width:200px">BASIC+DA</td>
                                                                        <td>{{CurAnnuaBasicDA| currency:''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>HRA</td>
                                                                        <td>{{CurAnnuaHRA| currency:''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>OTHER ALLOWANCES</td>
                                                                        <td>{{CurAnnuaTotalAllowance| currency:''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>GROSS EARNING</b></td>
                                                                        <td>{{CurAnnuaGAC| currency:''}}</td>
                                                                    </tr>
                                                                </table><br />
                                                                <p>Daily Allowance:<br />

                                                                    <small>Bonus: 8.33% @ Basic + DA, applicable after
                                                                        completion of 30
                                                                        working days</small>
                                                                </p>

                                                            </div>


                                                            <p class="text-bold">NATURE OF WORK</p>
                                                            <div class="ml-4">

                                                                <p>2. You will be reporting to
                                                                    <b><u>{{Reportingname}}</u></b> directly.</p>

                                                                <p>3. You have to achieve the sales exclude its
                                                                    prevailing sales amount.</p>

                                                                <p>4. The Company and the Management expects a
                                                                    performance from you of the
                                                                    highest order and would be pleased to accord to you
                                                                    due recognition
                                                                    based on the merits of your performances.</p>

                                                                <p>5. Your overall responsibility would cover output
                                                                    quality, discipline and
                                                                    other allied matters of work assigned to you by your
                                                                    superiors from time
                                                                    to time to the best of your ability and skills.</p>

                                                                <p>6. Your nature of work and designation are liable to
                                                                    be changed as and
                                                                    when required by the Management without necessarily
                                                                    assigning any reason
                                                                    and you shall on receipt of such orders act
                                                                    accordingly with immediate
                                                                    effect.</p>

                                                            </div>


                                                            <p class="text-bold">PROBATION</p>
                                                            <div class="ml-4">
                                                                <p>7. You will be on probation for a period of 6 months.
                                                                    Your progress will
                                                                    be reviewed periodically and your absorption in our
                                                                    company on a regular
                                                                    basis will depend on the progress made by you. The
                                                                    management reserves
                                                                    the right of extending your probation in our company
                                                                    and the decision of
                                                                    the management in this regard will be final and
                                                                    binding on you.</p>

                                                                <p>8. During the probation period if we find your
                                                                    performance satisfactory
                                                                    then your service will continue otherwise it gets
                                                                    terminated.</p>
                                                            </div>
                                                            <p class="text-bold">PLACE OF WORK AND TRANSFER</p>
                                                            <div class="ml-4">
                                                                <p>9. Your present place of work is <u>{{Location}}</u>.
                                                                </p>

                                                                <p>10. You are liable to be transferred to any other
                                                                    department or branch or
                                                                    sister concern of the company anywhere in India and
                                                                    outside India at the
                                                                    discretion of the Management.</p>
                                                            </div>
                                                            <p class="text-bold">CONFLICT OF INTEREST</p>
                                                            <div class="ml-4">
                                                                <p>11. You shall always devote the whole of your time
                                                                    and services to the
                                                                    duties allotted to you and you shall not without the
                                                                    consent in writing
                                                                    of the Management be interested, employed or
                                                                    otherwise engaged directly
                                                                    or indirectly in any other business or employment.
                                                                </p>

                                                                <p>12. Non-adherence to this condition would amount to
                                                                    willful suppression
                                                                    of facts and breach of contract, and shall entail
                                                                    termination of your
                                                                    services.</p>
                                                            </div>
                                                            <p class="text-bold">TERMINATION OF SERIVCES</p>
                                                            <div class="ml-4">
                                                                <p>13. Either party may terminate the service by giving
                                                                    one-month notice to
                                                                    the other or salary in lieu of such notice.</p>

                                                                <p>14. In case at any time the management finds that the
                                                                    information
                                                                    furnished by you in your application and related
                                                                    papers is false or you
                                                                    are found to have suppressed any material
                                                                    information, the appointment
                                                                    itself will be deemed to be void and your services
                                                                    will be liable to be
                                                                    terminated without notice or compensation in lieu
                                                                    thereof.</p>

                                                                <p>15. You will abide by the rules and regulations made
                                                                    by the Company as
                                                                    are in force or as may be introduced or amended or
                                                                    extended from time to
                                                                    time.</p>

                                                                <p>16. Your services can be terminated without notice or
                                                                    salary in lieu of
                                                                    notice at the discretion of the management if it is
                                                                    found that you have
                                                                    violated the model standing laws in force or lost
                                                                    confidence of the
                                                                    management.</p>
                                                            </div>
                                                            <p class="text-bold">GENERAL</p>
                                                            <div class="ml-4">
                                                                <p>17. During the period of your employment or
                                                                    thereafter at any time, you
                                                                    shall not disclose, divulge or communicate to any
                                                                    person or persons
                                                                    whatsoever information or secret relating to any
                                                                    trade or business of
                                                                    the Company you may have acquired as an employee of
                                                                    the Company.</p>

                                                                <p>18. Subject to the statutory provisions, the
                                                                    management may require you
                                                                    to work on holidays / off days as may be necessary
                                                                    and you shall
                                                                    promptly act in accordance with the instructions in
                                                                    this behalf.</p>

                                                                <p>19. You shall be responsible for safe keeping and
                                                                    returning the property
                                                                    of the Company under your custody, if misused or
                                                                    lead to damage, the
                                                                    cost of the property may be recovered from your
                                                                    salary.</p>

                                                                <p>20. Any change in your residential address should be
                                                                    notified in writing
                                                                    to the Company immediately. All communications will
                                                                    be addressed to you
                                                                    on the last address notified by you and it will be
                                                                    Presumed that you
                                                                    have received such communications addressed to you
                                                                    within the normal
                                                                    time taken for this purpose. The management shall
                                                                    not be held
                                                                    responsible for non-receipt of such communication
                                                                    for whatever reasons.
                                                                </p>

                                                                <p>21. If required you are liable for medical check-up
                                                                    at all times by a
                                                                    Registered Medical Practitioner of the Management’s
                                                                    choice. The
                                                                    Management may terminate your employment if you are
                                                                    found to be unfit
                                                                    physically or otherwise.</p>

                                                                <p>22. All disputes will be subject to TIRUPUR
                                                                    jurisdiction only</p>
                                                            </div>

                                                            <p>If the above terms and conditions of employment are
                                                                acceptable to you, kindly
                                                                return the duplicate copy of this letter duly signed as
                                                                a token of your
                                                                acceptance.</p>

                                                            <p>We welcome you to our organization and look forward to a
                                                                long and mutual
                                                                beneficial association with us.</p>

                                                            <p>Best Wishes,</p>



                                                            <br />
                                                            <p class="text-bold">For Britannia Labels India Private
                                                                Limited,</p>
                                                            <br /><br />
                                                            <p class="text-bold">Managing Director</p>
                                                            <p>I hereby accept the above Terms and Conditions</p>
                                                            <br /><br />
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p><b>Signature
                                                                            ______________________________</b><br /><br /><br /><br /><br /><br />
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 text-right"><b> Date
                                                                        _______________ </b></div>
                                                            </div>


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

                    <div class="modal fade" id="ModalEditingReason" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Editing Reasons</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger" role="alert">

                                        <label class="col-form-label">Editing Detail</label>


                                        <textarea class="form-control" ng-model="EditingReason"></textarea>


                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn  btn-success" ng-click="UpdateEditingReason();"
                                        data-dismiss="modal">Update</button>
                                    <button class="btn  btn-warning" data-dismiss="modal" data-toggle="modal"
                                        data-target="#ModalLogin">Login</button>
                                    <button type="button" class="btn btn-rounded btn-dark"
                                        data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-success" role="alert" ng-show="LogMessage">
                                        {{LogMessage}}
                                    </div>

                                    <div class="alert alert-danger" role="alert">

                                        <label class="col-form-label">Enter Userid</label>


                                        <input class="form-control" ng-model="EditingUserid" />
                                        <label class="col-form-label">Enter Password</label>


                                        <input class="form-control" ng-model="EditingPassword" type="password" />


                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn  btn-success" ng-click="UserLogin();">Submit</button>

                                    <button type="button" class="btn btn-rounded btn-dark"
                                        data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalCenterWorkers" tabindex="-1" role="dialog" id=""
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label text-green-bold">Components</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <label class="col-form-label text-green-bold">Monthly</label>
                                            </div>
                                            <div class="col-md-1 nopadding ">
                                                <label class="col-form-label text-green-bold">Annual</label>
                                            </div>
                                            <div class="col-md-1 nopadding ">
                                                <label class="col-form-label text-green-bold">inc%</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label text-green-bold">Components</label>
                                            </div>
                                            <div class="col-md-1 nopadding ">
                                                <label class="col-form-label text-green-bold">Monthly</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <label class="col-form-label text-green-bold">Annual</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <label class="col-form-label text-green-bold">inc%</label>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Basic+DA</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotBasicDA"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaBasicDA"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperBasicDA"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">HRA</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotHRA"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaHRA"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperHRA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Special
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurMotSpecialAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaSpecialAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperSpecialAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Total
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotTotalAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaTotalAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperTotalAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 nopadding">
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">

                                            <label class="col-md-12 text-green mb-2"><b>Retirals Employer
                                                    Contribution</b></label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">PF (12 %) From
                                                    Basic</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotPFemployeer"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaPFemployeer"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperPFemployeer"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">Gradutity(5%)</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotGratuity"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaGratuity"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperGratuity"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Retirals
                                                    Total</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotRetairlsTotal"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaRetairlsTotal"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperRetairlsTotal" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">GAC</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotGAC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaGAC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperGAC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Bonous @
                                                    8.33%</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotEstimatedBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaEstimatedBonous" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperEstimatedBonous" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">Other
                                                    Bonous</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotOtherBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaOtherBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperOtherBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 nopadding">
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> <label class="text-green mb-2"><b>Other
                                                        Components</b></label> </div>

                                            <div class="col-md-6">
                                                <label class="text-green mb-2"><b>Deductions</b></label>
                                            </div>


                                        </div>
                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Est.CTC</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>


                                            <div class="col-md-3">
                                                <label class="col-form-label">PF
                                                    Employee</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotPFemployee"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaPFemployee"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperPFemployee"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">ESIC</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotESIC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaESIC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperESIC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Stay
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotStayAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaStayAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperStayAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>








                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Canteen</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotCanteen"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaCanteen"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperCanteen"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Other
                                                    Deductions</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotOtherDeductions"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaOtherDeductions" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperOtherDeductions" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Travel
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotTravelAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaTravelAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperTravelAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Take
                                                    Home</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurMottakehomewithouttax" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuatakehomewithouttax" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="Curincpertakehomewithouttax" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Deductions
                                                    Total</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotDeductionTotal"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaDeductionTotal" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperDeductionTotal" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 nopadding">
                                                <hr />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="alert alert-success" role="alert" ng-show="Message">
                                                {{Message}}
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Status</label>
                                                    </div>
                                                    <div class="col-md-6 nopadding">
                                                        <select class="form-control" ng-model="FitStatus"
                                                            ng-change="GetStatusAlert(FitStatus);">
                                                            <option Value="Open">Open</option>
                                                            <option value="Cancel">Cancel</option>
                                                            <option value="Final">Final</option>
                                                        </select>
                                                    </div>
                                                </div>





                                            </div>
                                            <div class="col-md-6 nopadding">
                                                <div class="form-group text-right">
                                                    <button class="btn btn-sm btn-success"
                                                        ng-click="UpdateFitement();"><i class="fa fa-save"></i>
                                                        Update</button>

                                                    <!-- <button class="btn btn-sm btn-warning"
                                                        ng-click="CalculateFitment();"><i class="fa fa-calculator"></i>
                                                        Calculate</button> -->

                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-dismiss="modal"><i class="fa fa-times"></i>
                                                        Close</button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                </div>



                                <div class="modal-footer">





                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalCenter1OfferEnglish" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Appointment Order
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">



                                            <a id="btnOfferLetterEnglish" class="btn btn-info btn-nda-down2"><i
                                                    class="fa fa-download"></i> Download</a>
                                            <div class="card-body">

                                                <div id="pdfExportOfferLetterEnglish">

                                                    <div class="pdf-sipl">
                                                        <div class="pdf-header-sipl-modal"> <img
                                                                src="../Logo/Sainmarknewlogo.png" width="130"
                                                                height="50" />
                                                            <p><b>Sainmarks Industries (India) Pvt Ltd</b><br />
                                                                476/1b/1a, Label Arcade, Jothi Nagar,
                                                                Palavanjipalayam,<br />
                                                                Dharapuram Main Road, Tirupur-641 608.</p>
                                                        </div>
                                                        <hr />
                                                        <style>
                                                        .btn-nda-down {
                                                            position: absolute;
                                                            top: 5px;
                                                            right: 15px;
                                                        }

                                                        p {
                                                            text-align: justify;
                                                        }

                                                        .div-table {
                                                            display: table;
                                                            width: 100%;
                                                        }

                                                        .div-table-row {
                                                            display: table-row;
                                                            width: 100%;
                                                            clear: both;
                                                        }

                                                        .div-table-col {
                                                            float: left;
                                                            /* fix for buggy browsers */
                                                            width: 50%;
                                                            display: table-column;
                                                        }

                                                        h4 {
                                                            text-align: center;
                                                            font-weight: bold;
                                                        }

                                                        .nda-ta-content p,
                                                        .nda-ta-content ul li {
                                                            font-size: 15px;
                                                        }

                                                        .nda-ta-content p u {
                                                            font-weight: bold;
                                                        }
                                                        </style>


                                                        <div class='nda-ta-content'><br />

                                                            <h4>Offer Letter</h4>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p><b>To,</b><br /><br /><br /><br /><br /><br />
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 text-right"><b>Date: {{}}</b>
                                                                </div>
                                                            </div>

                                                            <p>Sub: – Offer Letter</p>

                                                            <p class="text-bold">Dear <u>{{Title}}{{Firstname}}{{Lastname}}</u>, </p>

                                                            <p>Subsequent to your successful interview with BRITANNIA
                                                                LABELS INDIA PVT LTD, TIRUPUR. We are pleased to offer
                                                                you the position as “<u>{{Designationproposed}}</u>” in our organization. We
                                                                take pleasure to inform you that your CTC will be
                                                                {{CommitedCTC|currency:''}}</p>

                                                            <p>Our bonus policy is as per act 8.33% on BASIC + DA after
                                                                completion of 30 days attendance. There is any law
                                                                stating that in case an employee is absent without an
                                                                approved leave for more than 10 days that can be treated
                                                                as their voluntary resignation.</p>

                                                            <p>You are requested to join us on <u>{{Date_Of_Joing2}}</u> </p>


                                                            <p class="text-bold">You are requested to carry the
                                                                below-mentioned documents at the time of joining:</p>
                                                            <div class="ml-5">
                                                                <p>1. Aadhar Card.</p>

                                                                <p>2. All Educational certificates (photocopies).</p>

                                                                <p>3. Passport size photographs x 4 copies.</p>

                                                                <p>4. Documents of proof of residence (Permanent &
                                                                    Current).</p>

                                                                <p>5. Pan Card.</p>

                                                                <p>6. Savings account passbook.</p>

                                                                <p>7. Vaccination Certificate.</p>
                                                            </div>
                                                            <p>The formal letter of appointment containing details of
                                                                the terms and conditions of the employment will be
                                                                issued to you after your joining with us. Please sign
                                                                and return the duplicate copy of this letter as a token
                                                                of your acceptance to this offer.</p>

                                                            <br />
                                                            <p class="text-bold">Yours truly,</p>
                                                            <br /><br />
                                                            <p class="text-bold">General Manager</p>




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





                    </div>


                </div>
            </div>
        </div>
    </div>





    </div>



    </div>

    </div>






    <?php include '../footer.php'?>





    </div>

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
    <title>Candidate Master</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM09Controller">
            <div class="container-fluid ">






                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container-fluid dashboard-content">
                                <div class="row">
                                    <div class="col-xl-12">



                                        <div class="card">
                                            <h5 class="card-header text-green">Candidate Details</h5>
                                            <div class="card-body">
                                                <div class="alert alert-success" role="alert" ng-show="AdminMessage">
                                                    {{AdminMessage}}
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered  table-sm ">
                                                        <thead>
                                                            <tr>

                                                                <th>No</th>
                                                                <th scope="col" style="width: 100px;">
                                                                    Candidate_ID</th>
                                                                <th scope="col" style="width: 200px;">Name</th>
                                                                <th scope="col" style="width: 90px;">Gender</th>
                                                                <th scope="col">Contactno</th>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Qualification</th>
                                                                <th scope="col">Status</th>

                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.Candidateid">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>

                                                                </td>
                                                                <td>
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.Fullname">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.Gender">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.Contactno">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.Type_Of_Posistion">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.HighestQualification">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="input-group ">
                                                                        <input type="text" class="form-control"
                                                                            ng-model="searchCandidate.Selectionstatus">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fa fa-search"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </td>





                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr dir-paginate="e in GetCandidateList02 |filter:searchCandidate|itemsPerPage:10 "
                                                                pagination-id="Candidategrid"
                                                                current-page="currentPageCandidate">




                                                                <td style="width: 50px;">
                                                                    {{$index+1 + (currentPageCandidate - 1) * pageSizeCandidate}}
                                                                </td>

                                                                <td>{{e.Candidateid}}</td>
                                                                <td>{{e.Title}} {{e.Fullname}}</td>
                                                                <td>{{e.Gender}}</td>
                                                                <td>{{e.Contactno}}</td>
                                                                <td>{{e.Type_Of_Posistion}}</td>
                                                                <td>{{e.HighestQualification}}</td>
                                                                <td
                                                                    ng-class="{'badge badge-warning':e.Selectionstatus=='Rejected','badge badge-success':e.Empid!='0'}">
                                                                    {{e.Selectionstatus}}

                                                                </td>


                                                                <td>
                                                                    <div class="action-btn">
                                                                        <img height="15"
                                                                            ng-click="SendEdit02(e.Candidateid,e.Selectionstatus,e.Empid);"
                                                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>



                                                </div>

                                                <div class="float-right mt-2">
                                                    <div class="pagination">
                                                        <dir-pagination-controls pagination-id="Candidategrid"
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
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container-fluid dashboard-content">
                                <div class="row">
                                    <div class="col-xl-12">


                                        <div class="card">
                                            <h5 class="card-header text-green">Candidate Update</h5>
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Candidate ID</label>
                                                        <input type="text" class="form-control" ng-model="Candidateid"
                                                            autocomplete="off" readonly>
                                                    </div>

                                                    <div class="form-group col-md-9 mb-0">

                                                        <div class="row mb-0">

                                                            <div class="form-group col-md-4">
                                                                <label class="col-form-label">First Name</label>
                                                                <div class="input-group "><span
                                                                        class="input-group-prepend">
                                                                        <select class="input-group-text surname-width"
                                                                            ng-model="Title">
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

                                                            <div class="form-group col-md-4">
                                                                <label class="col-form-label">Last Name</label>
                                                                <input type="text" class="form-control"
                                                                    ng-model="Lastname" autocomplete="off">

                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label class="col-form-label">Status</label>
                                                                <select class="form-control" ng-model="Selectionstatus">
                                                                    <option Value="Appointed">Appointed</option>
                                                                    <option value="Pending">Pending</option>
                                                                    <option value="Rejected">Rejected</option>
                                                                    <option value="Offer Letter Sent">Offer Letter Sent
                                                                    </option>
                                                                    <option Value="Waiting For candidate Approval">
                                                                        Waiting For Candidate Approval</option>
                                                                    <option value="Waiting For MD Approval">Waiting For
                                                                        MD Approval</option>
                                                                    <option value="Offer Accepted By Candidate">Offer
                                                                        Accepted by Candidate
                                                                    </option>
                                                                    <option value="Offer Rejected by Candidate">Offer
                                                                        Rejected by Candidate
                                                                    </option>
                                                                    <option value="Onboarding">Onboarding</option>
                                                                    <option value="Induction">Induction</option>

                                                                </select>

                                                            </div>

                                                        </div>
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
                                                        <label class="col-form-label">Qualification</label>
                                                        <select ng-model="Qualification" class="form-control">

                                                            <option ng-repeat="s in GetQualififcationList "
                                                                value="{{s.Degree}}">
                                                                {{s.Degree}}</option>
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
                                                        <label class="col-form-label">Mother Tongue </label>
                                                        <select ng-model="Mothertongue" class="form-control">

                                                            <option ng-repeat="s in GetLanguageList "
                                                                value="{{s.Languages}}">
                                                                {{s.Languages}}</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Contact No</label>
                                                        <input type="text" class="form-control" ng-model="Contactno"
                                                            autocomplete="off" onkeypress="return Validate(event);"
                                                            maxlength="10">

                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Category</label>
                                                        <select class="form-control" ng-model="Category">
                                                            <option Value="Admin & Staff">Admin & Staffs
                                                            </option>
                                                            <option value="Marketing">Marketing</option>
                                                            <option value="Workers">Workers</option>

                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Email ID</label>
                                                        <input type="email" class="form-control" ng-model="Emailid"
                                                            autocomplete="email" ng-model-options='{ debounce: 1000 }'
                                                            ng-change="emailchecking(Emailid)">

                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Current Location</label>
                                                        <select ng-model="City" class="form-control">

                                                            <option ng-repeat="s in GetCityList " value="{{s.City}}">
                                                                {{s.City}}</option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="alert alert-success" role="alert" ng-show="Message">
                                                    {{Message}}
                                                </div>

                                                <div class="form-group text-right">
                                                    <button class="btn btn-sm btn-rounded btn-success"
                                                        ng-click="UpdateCandidate();"><i class="fa fa-save"></i>
                                                        Update</button>
                                                    <button class="btn btn-sm btn-rounded btn-info"
                                                        ng-click="MovetoEmp();"><i class="fa fa-save"></i>
                                                        Move To Emp</button>
                                                    <button class="btn btn-sm btn-rounded btn-warning"
                                                        data-target="#myCarousel" data-slide-to="0"><i
                                                            class="fa  fa-arrow-left"></i> Back</button>
                                                </div>

                                                <div class="tab-list">




                                                    <ul class="nav nav-pills nav-fill">
                                                        <li class="nav-item"><a data-toggle="tab" href="#menu1">Personal
                                                                Info</a></li>
                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu6">Education </a></li>
                                                        <li class="nav-item" ng-show="btnfresherno"><a data-toggle="tab"
                                                                href="#menu2">Pre(sainmarks)</a></li>
                                                        <li class="nav-item" ng-show="btnfresherno"><a data-toggle="tab"
                                                                href="#menu8">PresentWorking</a></li>
                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu10">Vaccination</a></li>

                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu3">Interview </a></li>
                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu4">Approved</a></li>
                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu9">Reporting</a></li>


                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu7">Fitment</a></li>

                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu5">Appointment </a></li>
                                                        <li class="nav-item"><a data-toggle="tab" href="#menu11">Letters
                                                            </a></li>


                                                    </ul>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tab-content" style="overflow-x: auto">

                                                            <div id="menu1" class="tab-pane fade in active">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Personal
                                                                        Information</h5>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-lg-2">
                                                                                <div class="form-group ">
                                                                                    <label
                                                                                        class="col-form-label">Languages
                                                                                        known</label>

                                                                                    <ul class="pl-0">
                                                                                        <li ng-repeat="p in GetLanguageList"
                                                                                            style=" list-style-type: none;">
                                                                                            <input type="checkbox"
                                                                                                ng-model="selected[p.Languages]"
                                                                                                value="{{p.Languages}}" />
                                                                                            <span>{{p.Languages}}</span>
                                                                                    </ul>
                                                                                    </li>


                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-10">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-3">
                                                                                        <label
                                                                                            class="col-form-label">Date
                                                                                            of
                                                                                            Birth</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Dob"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')"
                                                                                            ng-change="Getage();">
                                                                                    </div>

                                                                                    <div class="form-group col-md-3">
                                                                                        <label
                                                                                            class="col-form-label">Age</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Age"
                                                                                            autocomplete="off" readonly>
                                                                                    </div>

                                                                                    <div class="form-group col-md-3">
                                                                                        <label
                                                                                            class="col-form-label">Application
                                                                                            Date</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="ApplicationDate"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')">
                                                                                    </div>

                                                                                    <div class="form-group col-md-3">
                                                                                        <label
                                                                                            class="col-form-label">Blood
                                                                                            Group</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Bloodgroup"
                                                                                            autocomplete="off">
                                                                                    </div>
                                                                                    <div class="form-group col-md-3">
                                                                                        <label
                                                                                            class="col-form-label">Fresher</label>
                                                                                        <select class="form-control"
                                                                                            ng-model="Fresher"
                                                                                            ng-change="GetExpereience(Fresher)">
                                                                                            <option Value="Yes">Yes
                                                                                            </option>
                                                                                            <option value="No">No
                                                                                            </option>


                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group col-md-3"
                                                                                        ng-show="btnfresherno">
                                                                                        <label
                                                                                            class="col-form-label">Expereience</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Expereience"
                                                                                            autocomplete="off">
                                                                                    </div>



                                                                                    <div class="form-group col-md-3"
                                                                                        ng-show="btnfresherno">
                                                                                        <label
                                                                                            class="col-form-label">Serving
                                                                                            NP</label>
                                                                                        <select class="form-control"
                                                                                            ng-model="ServingNoticeperiod">
                                                                                            <option Value="Yes">Yes
                                                                                            </option>
                                                                                            <option value="No">No
                                                                                            </option>

                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group col-md-3"
                                                                                        ng-show="btnfresherno">
                                                                                        <label
                                                                                            class="col-form-label">Notice
                                                                                            Period</label>


                                                                                        <select class="form-control"
                                                                                            ng-model="NoticePeriod">
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
                                                                                        <label
                                                                                            class="col-form-label">Available
                                                                                            on Interview</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="Availableoninterview"
                                                                                            onfocus="(this.type='date')"
                                                                                            onblur="(this.type='date')">
                                                                                    </div>


                                                                                    <div class="form-group col-md-6">
                                                                                        <label
                                                                                            class="col-form-label">Address</label>
                                                                                        <textarea class="form-control"
                                                                                            ng-model="Address"></textarea>
                                                                                    </div>



                                                                                    <div
                                                                                        class="form-group text-right col-md-9">
                                                                                        <button style="margin-top:25px"
                                                                                            class="btn btn-sm btn-success"
                                                                                            ng-click="Update_Other_info();"><i
                                                                                                class="fa fa-save"></i>
                                                                                            Update</button>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>



                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div id="menu6" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Candidate
                                                                        Education Details</h5>
                                                                    <div class="card-body">

                                                                        <div class="row">






                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">S.No
                                                                                </label>
                                                                                <input class="form-control"
                                                                                    ng-model="EduNextno" id="EduNextno"
                                                                                    readonly />
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Studied</label>
                                                                                <select ng-model="Cadidatestudied"
                                                                                    id="Candidatestudied"
                                                                                    class="form-control">

                                                                                    <option
                                                                                        ng-repeat="s in GetQualififcationList "
                                                                                        value="{{s.Degree}}">
                                                                                        {{s.Degree}}</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">University/School
                                                                                </label>
                                                                                <input class="form-control"
                                                                                    ng-model="UniversityorSchool"
                                                                                    id="UniversityorSchool" />
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Grade / %
                                                                                </label>
                                                                                <input class="form-control"
                                                                                    ng-model="GradeorPercentage"
                                                                                    id="GradeorPercentage" />
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Passout-Year
                                                                                </label>
                                                                                <select class="form-control"
                                                                                    ng-model="Passoutyear"
                                                                                    id="Passoutyear">
                                                                                    <?php 
                                                                                   for($i = 1940 ; $i <= date('Y'); $i++){
                                                                                    echo "<option>$i</option>";
                                                                                    }
                                                                                         ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Select_file</label>
                                                                                <div class="input-group">
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        ng-model="clearinput"
                                                                                        id="fileInput" name=files[]
                                                                                        accept="image/png, image/gif, image/jpeg,application/pdf">
                                                                                    <div class="input-group-append">
                                                                                        <p id="fileButton"
                                                                                            class="input-group-text">
                                                                                            <i class="fa fa-upload"></i>
                                                                                        </p>
                                                                                    </div>


                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group text-right col-md-6">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="Update_Education();"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Update</button>
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-danger"
                                                                                    ng-click="ResetEducation();"><i
                                                                                        class="fa fa-times"></i>
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



                                                                                                <th scope="col">Action
                                                                                                </th>
                                                                                            </tr>
                                                                                        </thead>


                                                                                        <tbody>
                                                                                        <tbody>



                                                                                            <tr dir-paginate="e in GetEducationList|filter:searchEducation|itemsPerPage:5 "
                                                                                                pagination-id="Educationgrid"
                                                                                                current-page="currentPageEducation">




                                                                                                <td
                                                                                                    style="width: 50px;">
                                                                                                    {{$index+1 + (currentPageEducation - 1) * pageSizeEducation}}
                                                                                                </td>
                                                                                                <td>{{e.Studies}}</td>
                                                                                                <td>{{e.Universityorschool}}
                                                                                                </td>
                                                                                                <td>{{e.Grade}}</td>
                                                                                                <td>{{e.Passoutyear}}
                                                                                                </td>




                                                                                                <td>
                                                                                                    <div
                                                                                                        class="action-btn">
                                                                                                        <img height="15"
                                                                                                            data-toggle="modal"
                                                                                                            data-target="#ModalCenter1Education"
                                                                                                            ng-click="FetchEducation(e.Candidateid,e.Sno);"
                                                                                                            src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                                                                        <img height="15"
                                                                                                            ng-click="FetchEducation(e.Candidateid,e.Sno);"
                                                                                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">

                                                                                                        <img height="15"
                                                                                                            data-toggle="modal"
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
                                                                                    <dir-pagination-controls
                                                                                        pagination-id="Educationgrid"
                                                                                        max-size="3"
                                                                                        direction-links="true"
                                                                                        boundary-links="true"
                                                                                        class="pagination">
                                                                                    </dir-pagination-controls>


                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div id="menu2" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">
                                                                        Previous(Sainmark) Employee Details</h5>
                                                                    <div class="card-body">

                                                                        <div class="row">
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Worked</label>
                                                                                <select class="form-control"
                                                                                    ng-model="Previoussainmarksemployee"
                                                                                    ng-change="GetPrevioussain(Previoussainmarksemployee)">
                                                                                    <option Value="Yes">Yes</option>
                                                                                    <option value="No">No</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnpreviousworked">
                                                                                <label
                                                                                    class="col-form-label">Empid(Old)</label>
                                                                                <select ng-model="OldEmpid"
                                                                                    class="form-control"
                                                                                    ng-change="GetOldEmpName();">

                                                                                    <option ng-repeat="s in GetOldList "
                                                                                        value="{{s.Employeeid}}">
                                                                                        {{s.Title}}
                                                                                        {{s.Fullname}}-{{s.Employeeid}}
                                                                                    </option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnpreviousworked">
                                                                                <label
                                                                                    class="col-form-label">Designation</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="PreviousDesignation"
                                                                                    autocomplete="off" readonly>

                                                                            </div>
                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnpreviousworked">
                                                                                <label
                                                                                    class="col-form-label">Department</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="PreviousDepartment"
                                                                                    autocomplete="off" readonly>

                                                                            </div>
                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnpreviousworked">
                                                                                <label
                                                                                    class="col-form-label">Working_Period</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Workingperiod"
                                                                                    autocomplete="off" readonly>

                                                                            </div>
                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnpreviousworked">
                                                                                <label
                                                                                    class="col-form-label">Releiving_reason</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Releivingreason"
                                                                                    autocomplete="off" readonly>

                                                                            </div>


                                                                            <div class="form-group text-right col-md-9">
                                                                                <button class="btn btn-sm btn-success"
                                                                                    style="margin-top:25px"
                                                                                    ng-click="Update_Previous_info();"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Update</button>
                                                                            </div>
                                                                        </div>



                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div id="menu3" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Interview
                                                                        Detail</h5>
                                                                    <div class="card-body">

                                                                        <div class="row">

                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Interviewer
                                                                                </label>
                                                                                <select ng-model="interviewerid"
                                                                                    class="form-control"
                                                                                    ng-change="Getinterviewername();">

                                                                                    <option
                                                                                        ng-repeat="s in GetinterviewerList "
                                                                                        value="{{s.Employeeid}}">
                                                                                        {{s.Title}}
                                                                                        {{s.Fullname}}-{{s.Employeeid}}
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="col-form-label">HR
                                                                                    (Interview)</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Interview_held_On"
                                                                                    onfocus="(this.type='date')"
                                                                                    onblur="(this.type='date')">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="col-form-label">DH
                                                                                    (Interview)</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="DHinterviewdate"
                                                                                    onfocus="(this.type='date')"
                                                                                    onblur="(this.type='date')">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Reschedule_interview_date</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Reschedule_interview"
                                                                                    onfocus="(this.type='date')"
                                                                                    onblur="(this.type='date')">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Reschedule_interview_reason</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Reschedule_interview_reason">
                                                                            </div>

                                                                            <div class="form-group text-right col-md-8">
                                                                                <button style="margin-top:25px"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="Update_interview_info();"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Update</button>


                                                                            </div>

                                                                        </div>



                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div id="menu4" class="tab-pane fade">

                                                                <div class="card">
                                                                    <h5 class="card-header">HR/DH/GM/MD Approval</h5>
                                                                    <div class="card-body">
                                                                        <div
                                                                            class="table-responsive custom-table custom-table-noborder">
                                                                            <table
                                                                                class="table table-bordered table-sm">
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">Type</label>
                                                                                    </td>
                                                                                    <td><select class="form-control"
                                                                                            ng-model="ApprovedType"
                                                                                            ng-change="GetRejectedReason()">
                                                                                            <option Value="HR">HR
                                                                                            </option>
                                                                                            <option value="DH">DH
                                                                                            </option>
                                                                                            <option value="GM">GM
                                                                                            </option>
                                                                                            <option value="MD">MD
                                                                                            </option>

                                                                                        </select>
                                                                                    </td>
                                                                                    <td>

                                                                                        <label
                                                                                            class="col-form-label">Status</label>



                                                                                    </td>
                                                                                    <td>
                                                                                        <select class="form-control"
                                                                                            ng-model="Approvedstatus"
                                                                                            ng-change="GetRejectedReason()">
                                                                                            <option Value="Approved">
                                                                                                Approved</option>
                                                                                            <option value="Pending">
                                                                                                Pending
                                                                                            </option>
                                                                                            <option value="Rejected">
                                                                                                Rejected</option>


                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <button
                                                                                            class="btn btn-rounded btn-success"
                                                                                            ng-click="Update_Approval();">Update</button>
                                                                                    </td>
                                                                                    <td>
                                                                                        <button
                                                                                            class="btn btn-rounded btn-success"
                                                                                            ng-click="SendMailForMDApproval();">Sent
                                                                                            Mail For MD
                                                                                            Approval</button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label
                                                                                            class="col-form-label">HR_Approve</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="HR_Approve"
                                                                                            readonly>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Approved/Rejected_datetime</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="HR_Approve_datetime"
                                                                                            readonly>
                                                                                    <td> <label
                                                                                            class="col-form-label">Rejected_reason</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="HR_Decline"
                                                                                            ng-disabled="HRDecline">

                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label class="col-form-label"
                                                                                            title="">DH_Approve</label>
                                                                                    </td>
                                                                                    <td><input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="DH_Approve"
                                                                                            readonly>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Approved/Rejected_datetime</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="DH_Approve_datetime"
                                                                                            readonly>
                                                                                    <td> <label
                                                                                            class="col-form-label">Rejected_reason</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="DH_Decline"
                                                                                            ng-disabled="DHDecline">
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label class="col-form-label"
                                                                                            title="">GM_Approve</label>
                                                                                    </td>
                                                                                    <td><input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="GM_Approve"
                                                                                            readonly>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Approved/Rejected_datetime</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="GM_Approve_datetime"
                                                                                            readonly>
                                                                                    <td> <label
                                                                                            class="col-form-label">Rejected_reason</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="GM_Decline"
                                                                                            ng-disabled="GMDecline">
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <label class="col-form-label"
                                                                                            title="">MD_Approve</label>
                                                                                    </td>
                                                                                    <td><input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="MD_Approve"
                                                                                            readonly>
                                                                                    </td>
                                                                                    <td> <label
                                                                                            class="col-form-label">Approved/Rejected_datetime</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="MD_Approve_datetime"
                                                                                            readonly>
                                                                                    <td> <label
                                                                                            class="col-form-label">Rejected_reason</label>
                                                                                    </td>
                                                                                    <td> <input type="text"
                                                                                            class="form-control"
                                                                                            ng-model="MD_Decline"
                                                                                            ng-disabled="MDDecline">
                                                                                </tr>

                                                                            </table>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div id="menu5" class="tab-pane fade">

                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Date Of
                                                                        Joining / Accepted Detail</h5>
                                                                    <div class="card-body">

                                                                        <div class="row">
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Offer
                                                                                    Accepted By Candidate </label>
                                                                                <select class="form-control"
                                                                                    ng-model="CandidateAccepted">
                                                                                    <option value="Offer Accepted By Candidate">Offer
                                                                        Accepted by Candidate
                                                                    </option>
                                                                    <option Value="Waiting For candidate Approval">
                                                                        Waiting For Candidate Approval</option>
                                                                        <option value="Offer Rejected by Candidate">Offer
                                                                        Rejected by Candidate
                                                                    </option>


                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Expected
                                                                                    Date Of Joining</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Date_Of_Joing"
                                                                                    onfocus="(this.type='date')"
                                                                                    onblur="(this.type='date')">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Accepted
                                                                                    CTC </label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="CommitedCTC"
                                                                                    autocomplete="off"
                                                                                    onkeypress="return Validate(event);">
                                                                            </div>



                                                                            <div
                                                                                class="form-group text-right col-md-12">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="Update_DOJ_info();"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Update</button>





                                                                            </div>
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


                                                                            <table
                                                                                class="table table-bordered  table-sm info-table can-table">
                                                                                <thead>
                                                                                    <tr align="center">
                                                                                        <th colspan="8">General
                                                                                        </th>
                                                                                        <th colspan="20">Monthly
                                                                                            Detail
                                                                                        </th>
                                                                                        <th colspan="20">Annual
                                                                                            Detail
                                                                                        </th>

                                                                                    </tr>
                                                                                    <tr class="bg-green text-white">

                                                                                        <th>#</th>
                                                                                        <th colspan="5">
                                                                                            Action</th>
                                                                                        <th>FitStatus</th>
                                                                                        <th>Approval</th>
                                                                                        <th>Basic</th>
                                                                                        <th>Hra</th>
                                                                                        <th>Special</th>
                                                                                        <th>Total</th>
                                                                                        <th>PF</th>
                                                                                        <th>Graduity</th>
                                                                                        <th>Retirals</th>
                                                                                        <th>GAC</th>
                                                                                        <th>Bonous</th>
                                                                                        <th>Other Bonous</th>
                                                                                        <th>CTC</th>
                                                                                        <th>Deductions</th>
                                                                                        <th>ESIC</th>
                                                                                        <th>PFEmployee</th>
                                                                                        <th>Canteen</th>
                                                                                        <th>Stay</th>
                                                                                        <th>Travel</th>
                                                                                        <th>Other Deductions</th>
                                                                                        <th>Deduction Total</th>
                                                                                        <th>Take Home</th>

                                                                                        <th>Basic</th>
                                                                                        <th>Hra</th>
                                                                                        <th>Special</th>
                                                                                        <th>Total</th>
                                                                                        <th>PF</th>
                                                                                        <th>Graduity</th>
                                                                                        <th>Retirals</th>
                                                                                        <th>GAC</th>
                                                                                        <th>Bonous</th>
                                                                                        <th>Other Bonous</th>
                                                                                        <th>CTC</th>
                                                                                        <th>Deductions</th>
                                                                                        <th>ESIC</th>
                                                                                        <th>PFEmployee</th>
                                                                                        <th>Canteen</th>
                                                                                        <th>Stay</th>
                                                                                        <th>Travel</th>
                                                                                        <th>Other Deductions</th>
                                                                                        <th>Deduction Total</th>
                                                                                        <th>Take Home</th>

                                                                                    </tr>
                                                                                </thead>


                                                                                <tbody>

                                                                                    <tr dir-paginate="e in GetSalaryList |filter:searchSalary|itemsPerPage:5 "
                                                                                        pagination-id="Salarygrid"
                                                                                        current-page="currentPageSalary">




                                                                                        <td>
                                                                                            {{$index+1 + (currentPageSalary - 1) * pageSizeSalary}}
                                                                                        </td>
                                                                                        <td>
                                                                                            <p>
                                                                                                <span class="pointer"
                                                                                                    ng-click="SendFitEdit(e.Candidateid,e.fitno);">
                                                                                                    <img height="15"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                                                                                </span>
                                                                                            </p>
                                                                                        </td>

                                                                                        <td> <span class="pointer">
                                                                                                <a
                                                                                                    ng-click="GetOfferletter(e.Candidateid,e.fitno);"><img
                                                                                                        height="20"
                                                                                                        src="<?php echo "$domain"; ?>/assets/icons/download.png">
                                                                                            </span></a>
                                                                                        </td>

                                                                                        <td>
                                                                                            <span class="pointer"
                                                                                                ng-click="SendFitMailApprove(e.Candidateid,e.fitno);"><img
                                                                                                    height="20"
                                                                                                    src="<?php echo "$domain"; ?>/assets/icons/thumbs-up.png">
                                                                                                Mail MD</span>
                                                                                        </td>
                                                                                        <td><span class="pointer"
                                                                                                ng-click="GetMailcontent(e.Candidateid,e.fitno);"
                                                                                                data-toggle="modal"
                                                                                                data-target="#ModalMail"><img
                                                                                                    height="20"
                                                                                                    src="<?php echo "$domain"; ?>/assets/icons/mail_md.png">
                                                                                                Mail </span></td>

                                                                                        <td><span class="pointer"
                                                                                                ng-click="GetMailCANcontent(e.Candidateid,e.fitno);"
                                                                                                data-toggle="modal"
                                                                                                data-target="#ModalMail"><img
                                                                                                    height="20"
                                                                                                    src="<?php echo "$domain"; ?>/assets/icons/mail_can.png">
                                                                                                Mail (CAN)</span>

                                                                                            </p>







                                                                                        </td>
                                                                                        <td>{{e.FitStatus}}</td>
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
                                                                                    <dir-pagination-controls
                                                                                        pagination-id="Salarygrid"
                                                                                        max-size="3"
                                                                                        direction-links="true"
                                                                                        boundary-links="true"
                                                                                        class="pagination">
                                                                                    </dir-pagination-controls>
                                                                                </div>

                                                                            </div>

                                                                            <button class="btn btn-rounded btn-info"
                                                                                ng-click="FitOpen();">Add(+)</button>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div id="menu8" class="tab-pane fade">

                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Present
                                                                        Working Detail</h5>
                                                                    <div class="card-body">

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
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="PreviousPosition">
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Current
                                                                                    CTC</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="CurrentCTC"
                                                                                    autocomplete="off"
                                                                                    onkeypress="return Validate(event);">
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Position
                                                                                    Applied
                                                                                    For</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="AppliedPosition">
                                                                            </div>







                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Expected
                                                                                    CTC</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="ExpectedCTC"
                                                                                    autocomplete="off"
                                                                                    onkeypress="return Validate(event);">
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Negotiable
                                                                                    CTC </label>

                                                                                <select class="form-control"
                                                                                    ng-model="NegotiableCTC">
                                                                                    <option Value="Yes">Yes</option>
                                                                                    <option value="No">No</option>

                                                                                </select>

                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Willing to
                                                                                    Relocate </label>
                                                                                <select class="form-control"
                                                                                    ng-model="Willingtorelocate">
                                                                                    <option Value="Yes">Yes</option>
                                                                                    <option value="No">No</option>

                                                                                </select>
                                                                            </div>

                                                                            <div
                                                                                class="form-group text-right col-md-12">
                                                                                <button class="btn btn-sm btn-success"
                                                                                    ng-click="Update_Present_info();"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Update</button>


                                                                            </div>



                                                                        </div>



                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div id="menu9" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Reporting
                                                                        Details and Designation</h5>
                                                                    <div class="card-body">
                                                                        <div class="row">

                                                                            <div class="form-group col-md-4">
                                                                                <label class="col-form-label">Reporting
                                                                                    To</label>
                                                                                <select ng-model="ReportingToid"
                                                                                    class="form-control"
                                                                                    ng-change="GetReporterName();">

                                                                                    <option
                                                                                        ng-repeat="s in GetinterviewerList "
                                                                                        value="{{s.Employeeid}}">
                                                                                        {{s.Title}}
                                                                                        {{s.Fullname}}-{{s.Employeeid}}
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Business</label>
                                                                                <input class="form-control"
                                                                                    ng-model="Business" />
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Designation
                                                                                    Proposed </label>
                                                                                <select ng-model="Designationproposed"
                                                                                    class="form-control">

                                                                                    <option
                                                                                        ng-repeat="s in GetDesignationList "
                                                                                        value="{{s.Designation}}">
                                                                                        {{s.Designation}}</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Location</label>
                                                                                <select ng-model="Location"
                                                                                    class="form-control">

                                                                                    <option
                                                                                        ng-repeat="s in GetCityList "
                                                                                        value="{{s.City}}">
                                                                                        {{s.City}}</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Department</label>
                                                                                <select ng-model="Department"
                                                                                    class="form-control">

                                                                                    <option
                                                                                        ng-repeat="s in GetDepartmentList "
                                                                                        value="{{s.Department}}">
                                                                                        {{s.Department}}</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-8 text-right">

                                                                                <button class="btn btn-sm btn-success"
                                                                                    style="margin-top:25px"
                                                                                    ng-click="Update_Reporting();"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Update</button>

                                                                            </div>
                                                                        </div>





                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="menu10" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Vaccination
                                                                        Details</h5>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="form-group col-md-2">
                                                                                <label class="col-form-label">
                                                                                    S.No </label>
                                                                                <input type="text" class="form-control"
                                                                                    id="Vaccinatedsno"
                                                                                    ng-model="Vaccinatedsno" readonly>
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label"> Covid
                                                                                    Vaccinated </label>
                                                                                <select class="form-control"
                                                                                    id="Covidvaccinated"
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
                                                                                <input type="text" class="form-control"
                                                                                    id="Vaccinateddate"
                                                                                    ng-model="Vaccinateddate"
                                                                                    onfocus="(this.type='date')"
                                                                                    onblur="(this.type='date')">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Certificate</label>
                                                                                <div class="input-group">
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        ng-model="clearinput"
                                                                                        id="fileInput05" name=files[]
                                                                                        accept="image/png, image/gif, image/jpeg,application/pdf">
                                                                                    <div class="input-group-append">
                                                                                        <p id="fileButton05"
                                                                                            class="input-group-text">
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
                                                                                ng-click="UpdateVaccination();"><i
                                                                                    class="fa fa-save"></i>
                                                                                Update</button>

                                                                            <button class="btn btn-sm btn-success"
                                                                                ng-click="ResetVaccination();"><i
                                                                                    class="fa fa-save"></i>
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




                                                                                                <td
                                                                                                    style="width: 50px;">
                                                                                                    {{$index+1 + (currentPageVaccination - 1) * pageSizeVaccination}}
                                                                                                </td>
                                                                                                <td>{{e.Vacinationtype}}
                                                                                                </td>
                                                                                                <td>{{e.Vaccinationdate2}}
                                                                                                </td>

                                                                                                </td>




                                                                                                <td>
                                                                                                    <div
                                                                                                        class="action-btn">
                                                                                                        <img height="15"
                                                                                                            data-toggle="modal"
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
                                                                                    <dir-pagination-controls
                                                                                        pagination-id="Vaccinationgrid"
                                                                                        max-size="3"
                                                                                        direction-links="true"
                                                                                        boundary-links="true"
                                                                                        class="pagination">
                                                                                    </dir-pagination-controls>


                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div id="menu11" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">Confirmation
                                                                        and Appointment Letter</h5>
                                                                    <div class="card-body">
                                                                        <div class="row">

                                                                            <div class="form-group col-md-3">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="AppointmentTamil();"
                                                                                    data-toggle="modal"
                                                                                    data-target="#ModalCenter1AppointmentView"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Appointment(Tamil)</button>

                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="AppointmentTamil();"
                                                                                    data-toggle="modal"
                                                                                    data-target="#ModalCenter1ConfirmationView"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Confirmation(Tamil)</button>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="AppointmentTamil();"
                                                                                    data-toggle="modal"
                                                                                    data-target="#ModalCenter1AppointmentHindi"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Appointment(Hindi)</button>

                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="AppointmentTamil();"
                                                                                    data-toggle="modal"
                                                                                    data-target="#ModalCenter1ConfirmationViewHindi"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Confirmation(Hindi)</button>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="FetchFinalFit();"
                                                                                    data-toggle="modal"
                                                                                    data-target="#ModalCenter1AppointmentEnglish"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Appointment(English)</button>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <button style="margin-top: 25px;"
                                                                                    class="btn btn-sm btn-success"
                                                                                    ng-click="AppointmentTamil();"
                                                                                    data-toggle="modal"
                                                                                    data-target="#ModalCenter1OfferEnglish"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Offer Letter</button>
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
                                </div>
                            </div>
                        </div>




                    </div>



                    <div class="modal fade" id="ModalCenter1" tabindex="-1" role="dialog" id="" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label text-green-bold">Components</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <label class="col-form-label text-green-bold">Monthly</label>
                                            </div>
                                            <div class="col-md-1 nopadding ">
                                                <label class="col-form-label text-green-bold">Annual</label>
                                            </div>
                                            <div class="col-md-1 nopadding ">
                                                <label class="col-form-label text-green-bold">inc%</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label text-green-bold">Components</label>
                                            </div>
                                            <div class="col-md-1 nopadding ">
                                                <label class="col-form-label text-green-bold">Monthly</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <label class="col-form-label text-green-bold">Annual</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <label class="col-form-label text-green-bold">inc%</label>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Basic+DA</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotBasicDA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaBasicDA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperBasicDA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">HRA</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotHRA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaHRA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperHRA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Special
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurMotSpecialAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaSpecialAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperSpecialAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Total
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotTotalAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaTotalAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperTotalAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 nopadding">
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">

                                            <label class="col-md-12 text-green mb-2"><b>Retirals Employer
                                                    Contribution</b></label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">PF (12 %) From
                                                    Basic</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotPFemployeer"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaPFemployeer"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperPFemployeer"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">Gradutity(5%)</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotGratuity"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaGratuity"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperGratuity"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Retirals
                                                    Total</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotRetairlsTotal"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaRetairlsTotal"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperRetairlsTotal" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">GAC</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotGAC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaGAC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperGAC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Bonous @
                                                    8.33%</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotEstimatedBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaEstimatedBonous" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperEstimatedBonous" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">Other
                                                    Bonous</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotOtherBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaOtherBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperOtherBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 nopadding">
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> <label class="text-green mb-2"><b>Other
                                                        Components</b></label> </div>

                                            <div class="col-md-6">
                                                <label class="text-green mb-2"><b>Deductions</b></label>
                                            </div>


                                        </div>
                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Est.CTC</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>


                                            <div class="col-md-3">
                                                <label class="col-form-label">PF
                                                    Employee</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotPFemployee"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaPFemployee"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperPFemployee"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">ESIC</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotESIC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaESIC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperESIC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Stay
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotStayAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaStayAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperStayAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>








                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Canteen</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotCanteen"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaCanteen"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperCanteen"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Other
                                                    Deductions</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotOtherDeductions"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaOtherDeductions" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperOtherDeductions" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Travel
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotTravelAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaTravelAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperTravelAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Take
                                                    Home</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurMottakehomewithouttax" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuatakehomewithouttax" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="Curincpertakehomewithouttax" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Deductions
                                                    Total</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotDeductionTotal"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaDeductionTotal" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperDeductionTotal" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 nopadding">
                                                <hr />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Status</label>
                                                    </div>
                                                    <div class="col-md-6 nopadding">
                                                        <select class="form-control" ng-model="FitStatus"
                                                            ng-change="GetStatusAlert(FitStatus);">
                                                            <option Value="Open">Open</option>
                                                            <option value="Cancel">Cancel</option>
                                                            <option value="Final">Final</option>
                                                        </select>
                                                    </div>
                                                </div>





                                            </div>
                                            <div class="col-md-6 nopadding">
                                                <div class="form-group text-right">
                                                    <button class="btn btn-sm btn-success"
                                                        ng-click="UpdateFitement();"><i class="fa fa-save"></i>
                                                        Update</button>

                                                    <button class="btn btn-sm btn-warning"
                                                        ng-click="CalculateFitment();"><i class="fa fa-calculator"></i>
                                                        Calculate</button>

                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-dismiss="modal"><i class="fa fa-times"></i>
                                                        Close</button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                </div>



                                <div class="modal-footer">





                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalFinal" tabindex="-1" role="dialog" id="" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="card-body">


                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Components</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <label class="col-form-label">Monthly</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <label class="col-form-label">Annual</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <label class="col-form-label">inc%</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Components</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <label class="col-form-label">Monthly</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <label class="col-form-label">Annual</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <label class="col-form-label">inc%</label>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Basic+DA</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotBasicDA"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaBasicDA"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperBasicDA"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">HRA</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotHRA" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaHRA" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperHRA"
                                                    readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Special
                                                    Allowance</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurMotSpecialAllowance" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaSpecialAllowance" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperSpecialAllowance" readonly>
                                            </div>

                                            <div class="col-lg-2">
                                                <label class="col-form-label">Total
                                                    Allowance</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotTotalAllowance"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaTotalAllowance" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperTotalAllowance" readonly>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <label>Retirals Employer Contribution</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label class="col-form-label">PF (12 %) From
                                                    Basic</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotPFemployeer"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaPFemployeer"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperPFemployeer"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Gradutity(5%)</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotGratuity"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaGratuity"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperGratuity"
                                                    readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Retirals
                                                    Total</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotRetairlsTotal"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaRetairlsTotal"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperRetairlsTotal" readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">GAC</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotGAC" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaGAC" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperGAC"
                                                    readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Bonous @
                                                    8.33%</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotEstimatedBonous"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaEstimatedBonous" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperEstimatedBonous" readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Other
                                                    Bonous</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotOtherBonous"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaOtherBonous"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperOtherBonous"
                                                    readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <label>Other Components</label>
                                        </div>
                                        <div class="row">

                                            <div class="col-lg-2">
                                                <label class="col-form-label">Est.CTC</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotCTC" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaCTC" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperCTC"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Deductions</label>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-2">
                                                <label class="col-form-label">ESIC</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotESIC" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaESIC"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperESIC"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">PF
                                                    Employee</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotPFemployee"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaPFemployee"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperPFemployee"
                                                    readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-2">
                                                <label class="col-form-label">Canteen</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotCanteen"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaCanteen"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperCanteen"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Stay
                                                    Allowance</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotStayAllowance"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaStayAllowance"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperStayAllowance" readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-2">
                                                <label class="col-form-label">Travel
                                                    Allowance</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotTravelAllowance"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaTravelAllowance" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperTravelAllowance" readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Other
                                                    Deductions</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotOtherDeductions"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaOtherDeductions" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperOtherDeductions" readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-2">
                                                <label class="col-form-label">Deductions
                                                    Total</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotDeductionTotal"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaDeductionTotal" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperDeductionTotal" readonly>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-form-label">Take
                                                    Home</label>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurMottakehomewithouttax" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuatakehomewithouttax" autocomplete="off" readonly>
                                            </div>
                                            <div class="col-lg-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="Curincpertakehomewithouttax" autocomplete="off" readonly>
                                            </div>

                                        </div>



                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <div class="form-group text-right">


                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalCenter1s" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-lg " role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        FitMent Calculation
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalApproval" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Approval(MD)</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger" role="alert">

                                        <label class="col-form-label">Status</label>


                                        <select class="form-control" ng-model="MDApproval"
                                            ng-change="GetStatusAlert(FitStatus);">
                                            <option Value="Pending">Pending</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Cancel">Cancel</option>


                                        </select>


                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-rounded btn-success" ng-click="UpdateApprove();"
                                        data-dismiss="modal">Update</button>
                                    <button type="button" class="btn btn-rounded btn-dark"
                                        data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalMail" tabindex="-1" role="dialog" id="" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <p class="page-title text-green">Mail</p>
                                    <hr />
                                    <div class="">

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">To Address</label>
                                                <textarea type="text" class="form-control" ng-model="ToMail"></textarea>
                                            </div>


                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Subject</label>
                                                <input type="text" class="form-control" ng-model="SubjectMail">
                                            </div>
                                        </div>



                                        <p class="page-title text-green">Message</p>
                                        <table id="iif-editor" class="mb-2">
                                            <tr>
                                                <div text-angular="text-angular" name="MessageMail"
                                                    ng-model="MessageMail" ta-disabled='disabled' class="iif-editor"
                                                    style="width:100%;overflow:auto;"></div>
                                            </tr>
                                        </table>

                                        <div class="text-left mt-3">

                                        </div>
                                        <div id="msg" class="info-msg"></div>
                                        <div id="msg2" class="info-msg"></div>
                                    </div>


                                </div>
                                <div class="modal-footer">



                                    <button class="btn btn-sm btn-success" ng-click="SendNormalMail();"
                                        data-dismiss="modal"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        &nbsp;Send</button>


                                    <button class="btn btn-sm btn-danger" data-dismiss="modal"><i
                                            class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp;Close</button>


                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalCenter1Certificate" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Vaccination-Details
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
                    <div class="modal fade" id="ModalCenter1Offerletter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate Offer Letter Details
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <iframe ng-src="{{OfferletterView}}"
                                            ng-hide="OfferletterView == null || OfferletterView == '' "
                                            ng-show="OfferletterView != null " style="height:400px;width:100%"></iframe>
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
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete {{Vaccinatedsno}}
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
                    <div class="modal fade" id="ModalCenter1DocumentView" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate- Document
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <iframe ng-src="{{Candidatedocument}}"
                                            ng-hide="Candidatedocument == null || Candidatedocument == '' "
                                            ng-show="Candidatedocument != null "
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
                    <div class="modal fade" id="ModalCenter1AppointmentView" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate - Appointment - Order
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">



                                            <a id="btnAppointmentordertamil" class="btn btn-info btn-nda-down2"><i
                                                    class="fa fa-download"></i> Download</a>
                                            <div class="card-body">

                                                <div id="pdfExportAppointmentorder">

                                                    <div class="pdf-sipl">
                                                        <div class="pdf-header-sipl-modal"> <img
                                                                src="../Logo/Sainmarknewlogo.png" width="130"
                                                                height="50" />
                                                            <p><b>Sainmarks Industries (India) Pvt Ltd</b><br />
                                                                476/1b/1a, Label Arcade, Jothi Nagar,
                                                                Palavanjipalayam,<br />
                                                                Dharapuram Main Road, Tirupur-641 608.</p>
                                                        </div>
                                                        <hr />
                                                        <center>
                                                            <h4>Appointment Order - பணி நியமன உத்தரவு</h4>
                                                        </center>


                                                        <p>பெறுதல்,</p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}{{Lastname}}
                                                        </p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Address}}
                                                        </p>
                                                        <p>தேதி :</p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Appointmentsentdate}}
                                                        </p>
                                                        <br /><br /><br />

                                                        <p>உங்களது விண்ணப்பம் நாள் : </p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ApplicationDate2}}
                                                        </p>

                                                        <p>அன்புடையீர்,</p>
                                                        <p>உங்களது <b><u> {{ApplicationDate2}}</b></u> தேதியிட்ட
                                                            விண்ணப்பத்தின்
                                                            அடிப்படையில்
                                                            உங்களை எமது
                                                            நிர்வாகம் பிரிவில் பணிக்கு நியமனம் செய்வதில்
                                                            பெருமைபடுகிறோம். உங்களது பணி முதல்
                                                            தகுதிக்கான அடிப்படையில் அமர்த்துகிறோம். உங்களுக்கான வேலை
                                                            நேரம் தினசரி 8 மணி
                                                            நேரம் ஆகும். உங்களது மாத சம்பளம் ரூ.
                                                            <b><u> {{CommitedCTC|currency:''}}</b></u>
                                                            என்று
                                                            நிர்ணயிக்கப்படுகிறது.
                                                            உங்களது சம்பளம் பிரதி மாதம் <b>7- ஆம் தேதிக்குள்</b>
                                                            வழங்கப்படும்.
                                                        </p>


                                                        <p>இதில் அரசின் தொழிலாளர் நல சட்டங்களின் அடிப்படையில்
                                                            வருங்கால
                                                            வைப்பு நிதி EPF ஆனது
                                                            12 சதவிகிதமும் (12%), தொழிலாளர் அரசு காப்பிட்டு
                                                            கழகத்திற்கு
                                                            (ESI) 0.75
                                                            சதவிகிதமும், உங்களது அடிப்படை சம்பளத்தில் பிடித்தம்
                                                            செய்யப்படும். உங்களது
                                                            திறமையின் அடிப்படையிலும், செயல்பாடுகளின் அடிப்படையிலும்
                                                            உங்களை எமது
                                                            நிர்வாகத்தில் நிரந்தர பணியாளராக பணி நிரந்தரம்
                                                            செய்யப்படுவீர்கள்.</p>


                                                        <p> தங்களது உழைப்பை உண்மையுடன் நிறுவனத்திற்கு அளித்து
                                                            மென்மேலும்
                                                            வளர்ச்சியடைய
                                                            வாழ்த்துக்களை தெரிவித்து கொள்கிறோம்.
                                                            உண்மைநகல் பெற்றுக்கொண்டேன்.</p>



                                                        <p style="text-align:left;"><span
                                                                style="float:right;">இப்படிக்கு,</span></p>
                                                        <br />
                                                        <br />
                                                        <br />
                                                        <br />
                                                        <p style="text-align:left;"><span style="float:right;">நிர்வாகம்
                                                                /அங்கீகாரம் பெற்ற அதிகாரி</span></p>


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
                    <div class="modal fade" id="ModalCenter1AppointmentHindi" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate - Appointment - Order
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">



                                            <a id="btnAppointmentorderhindi" class="btn btn-info btn-nda-down2"><i
                                                    class="fa fa-download"></i> Download</a>
                                            <div class="card-body">

                                                <div id="pdfExportAppointmentorderHindi">

                                                    <div class="pdf-sipl">
                                                        <div class="pdf-header-sipl-modal"> <img
                                                                src="../Logo/Sainmarknewlogo.png" width="130"
                                                                height="50" />
                                                            <p><b>Sainmarks Industries (India) Pvt Ltd</b><br />
                                                                476/1b/1a, Label Arcade, Jothi Nagar,
                                                                Palavanjipalayam,<br />
                                                                Dharapuram Main Road, Tirupur-641 608.</p>
                                                        </div>
                                                        <hr />
                                                        <center>
                                                            <h4>APPOINMENT ORDER / भुगतान के आदेश</h4>
                                                        </center>



                                                        <p>To / मिल रहा :</p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}{{Lastname}}
                                                        </p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Address}}
                                                        </p>
                                                        <p>DATE / दिनांक :</p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Appointmentsentdate}}
                                                        </p>
                                                        <br /><br /><br />

                                                        <p>Ref : Your Application Date / आपका आवेदन दिनांकित है: </p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ApplicationDate2}}

                                                        <p>तुम्हारा,</p>

                                                        <p>दिनांकित आवेदन के आधार पर हमारा प्रशासन<b><u>
                                                                    {{ApplicationDate2}}</b></u>अनुभाग
                                                            काम हमें नियुक्ति पर गर्व है। आपका काम
                                                            पहले हमें योग्यता के आधार पर दिन के लिए नियुक्त
                                                            किया जाता है। तुम्हारा काम के घंटे के बारे में 8 घंटे दैनिक
                                                            रहे हैं <b><u> {{CommitedCTC|currency:''}}</b></u>आपका मासिक
                                                            वेतन रु.आपका वेतन महीने की
                                                            7 तारीख तक भुगतान कर दिया जाएगा.</p>

                                                        <p>EPF अबे 12 प्रतिशत (12%), श्रम सरकार (ईएसआई) के लिए प्रतिशत
                                                            और आपका 0.75% आधार वेतन पर कटौती की जाएगी। अपनी क्षमता के
                                                            आधार पर, गतिविधियों के आधार पर, आप हमारे प्रशासन के एक
                                                            स्थायी कर्मचारी हैं स्थायी कार्य उपर्युक्त समयावधि के भीतर
                                                            किया जाएगा।</p>
                                                        <p>एक वास्तविक कंपनी में अपने स्वयं के श्रम को विकसित और विकसित
                                                            करना। से नमस्ते. </p>


                                                        <p>मुझे वास्तविक प्रति प्राप्त हुई है।</p>
                                                        <p>इस प्रकार,</p>

                                                        <p>व्यवस्थापक/मान्यता प्राप्त अधिकारी</p>


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
                    <div class="modal fade" id="ModalCenter1ConfirmationView" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate - Confirmation -
                                        Order-Tamil
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">



                                            <a id="btnConfirmationordertamil" class="btn btn-info btn-nda-down2"><i
                                                    class="fa fa-download"></i> Download</a>
                                            <div class="card-body">

                                                <div id="pdfExportConfirmationorder">

                                                    <div class="pdf-sipl">
                                                        <div class="pdf-header-sipl-modal"> <img
                                                                src="../Logo/Sainmarknewlogo.png" width="130"
                                                                height="50" />
                                                            <p><b>Sainmarks Industries (India) Pvt Ltd</b><br />
                                                                476/1b/1a, Label Arcade, Jothi Nagar,
                                                                Palavanjipalayam,<br />
                                                                Dharapuram Main Road, Tirupur-641 608.</p>
                                                        </div>
                                                        <hr />
                                                        <center>
                                                            <h4>Confirmation Order / பணி நிரந்தர உத்தரவு</h4>
                                                        </center>


                                                        <p style="text-align:left;">To <br />பெறுதல்</p>
                                                        <p><span style="float:right;">DATE :
                                                                {{Appointmentsentdate}}</span></p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}{{Lastname}}
                                                        </p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Address}}
                                                        </p>
                                                        <br /><br /><br /><br /><br /><br />
                                                        <div>
                                                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;உங்களது பணி நியமன உத்தரவு
                                                                <b><u>{{ApplicationDate2}}</u></b> தேதியிட்ட
                                                                கடிதத்தை தொடர்ந்து உங்களது திறமையின் அடிப்படையிலும்
                                                                உங்களின் நன்நடத்தை,
                                                                செயல்பாடுகளின் அடிப்படையிலும் உங்களை எமது நிர்வாகம்
                                                                <b><u>{{Date_Of_Joing2}}</b></u>முதல் பணி
                                                                நிரந்தரம் செய்வதில் பெருமிதம் கொள்கிறது. உங்களது சம்பளம்
                                                                கீழ்க்கண்டவாறு
                                                                நிர்ணயிக்கபடுகிறது.
                                                            </p>
                                                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;சம்பளம் ரூ.
                                                                <b><u>{{CommitedCTC|currency:''}} </b></u>
                                                                நாள் / மாதம் மேலும்
                                                                பிடித்தங்களிலும் ஏனைய விதிமுறைகளிலும் எந்தவித மாற்றமும்
                                                                இல்லை. எனவே தொடந்து
                                                                உமது பணியை செவ்வனே செய்து நிர்வாகத்தின் வளர்ச்சியும்
                                                                தங்களின் வளர்ச்சியும்
                                                                மேம்பட வாழ்த்துகளை தெரிவித்து கொள்கிறது.
                                                            </p>
                                                        </div>
                                                        <p>இப்படிக்கு,</p>



                                                        <p style="text-align:left;">உண்மைநகல் பெற்றுக்கொண்டேன்<span
                                                                style="float:right;">நிர்வாகம் /அங்கீகாரம் பெற்ற
                                                                அதிகாரி</span></p>


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
                    <div class="modal fade" id="ModalCenter1ConfirmationViewHindi" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate - Confirmation -
                                        Order-Hindi
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">



                                            <a id="btnConfirmationorderHindi" class="btn btn-info btn-nda-down2"><i
                                                    class="fa fa-download"></i> Download</a>
                                            <div class="card-body">

                                                <div id="pdfExportConfirmationorderHindi">

                                                    <div class="pdf-sipl">
                                                        <div class="pdf-header-sipl-modal"> <img
                                                                src="../Logo/Sainmarknewlogo.png" width="130"
                                                                height="50" />
                                                            <p><b>Sainmarks Industries (India) Pvt Ltd</b><br />
                                                                476/1b/1a, Label Arcade, Jothi Nagar,
                                                                Palavanjipalayam,<br />
                                                                Dharapuram Main Road, Tirupur-641 608.</p>
                                                        </div>
                                                        <hr />
                                                        <center>
                                                            <h4>CONFIRMATION ORDER</h4>
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


                                                        <p style="text-align:left;">To / प्रति </p>

                                                        <p> <span style="float:right;">DATE / दिनांक:
                                                                {{Appointmentsentdate}}</span></p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}{{Lastname}}
                                                        </p>
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Address}}
                                                        </p>
                                                        <br /><br /><br /><br /><br /><br />
                                                        <div>
                                                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;आपका नियुक्ति
                                                                आदेश<b><u>{{ApplicationDate2}}</u></b> दिनांकित पत्र
                                                                आपकी जारी रखने और आचरण करने की क्षमता हमारे प्रशासन के
                                                                आधार पर <b><u>{{Date_Of_Joing2}}</b></u>
                                                                पहला कार्य स्थायी करने में गर्व लेता है. आपका वेतन
                                                                निम्नानुसार निर्धारित
                                                                होता है.</p>
                                                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;वेतन रु
                                                                <b><u>{{CommitedCTC|currency:''}} </b></u> अधिक
                                                                पसंदीदा पर दिन अन्य
                                                                शब्दों में कोई परिवर्तन नहीं हुआ है। तो तुम काम करने के
                                                                लिए जारी.
                                                            </p>
                                                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;प्रशासन के प्रबंधन और विकास
                                                                में सुधार करने के
                                                                लिए.</p>
                                                        </div>
                                                        <p>इस प्रकार,</p>



                                                        <p style="text-align:left;">मुझे वास्तविक प्रति प्राप्त हुई है।
                                                            <span style="float:right;">व्यवस्थापक/मान्यता प्राप्त
                                                                अधिकारी</span>
                                                        </p>


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

                    <div class="modal fade" id="ModalCenter1AppointmentEnglish" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Appointment Order
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">



                                            <a id="btnAppointmentorderEnglish" class="btn btn-info btn-nda-down2"><i
                                                    class="fa fa-download"></i> Download</a>
                                            <div class="card-body">

                                                <div id="pdfExportAppointmentorderEnglish">

                                                    <div class="pdf-sipl">
                                                        <div class="pdf-header-sipl-modal"> <img
                                                                src="../Logo/Sainmarknewlogo.png" width="130"
                                                                height="50" />
                                                            <p><b>Sainmarks Industries (India) Pvt Ltd</b><br />
                                                                476/1b/1a, Label Arcade, Jothi Nagar,
                                                                Palavanjipalayam,<br />
                                                                Dharapuram Main Road, Tirupur-641 608.</p>
                                                        </div>
                                                        <hr />
                                                        <style>
                                                        .btn-nda-down {
                                                            position: absolute;
                                                            top: 5px;
                                                            right: 15px;
                                                        }

                                                        p {
                                                            text-align: justify;
                                                        }

                                                        .div-table {
                                                            display: table;
                                                            width: 100%;
                                                        }

                                                        .div-table-row {
                                                            display: table-row;
                                                            width: 100%;
                                                            clear: both;
                                                        }

                                                        .div-table-col {
                                                            float: left;
                                                            /* fix for buggy browsers */
                                                            width: 50%;
                                                            display: table-column;
                                                        }

                                                        h4 {
                                                            text-align: center;
                                                            font-weight: bold;
                                                        }

                                                        .nda-ta-content p,
                                                        .nda-ta-content ul li {
                                                            font-size: 15px;
                                                        }

                                                        .nda-ta-content p u {
                                                            font-weight: bold;
                                                        }
                                                        </style>


                                                        <div class='nda-ta-content'><br />

                                                            <h4>Appointment Order</h4>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p><b>To,</b><br />
                                                                        {{Title}}{{Firstname}}{{Lastname}}<br />
                                                                        {{Address}}<br /><br /><br /><br /></p>
                                                                </div>
                                                                <div class="col-md-6 text-right"><b>Date:
                                                                        {{Appointmentsentdate}}</b></div>
                                                            </div>

                                                            <p>Dear {{Title}}{{Firstname}}{{Lastname}} </p>

                                                            <p>Sub: Appointment Order</p>


                                                            <p>We are happy to appoint you with us as
                                                                “<u>{{Designationproposed}}</u> “ w.e.f. In our
                                                                Organization on the following terms and conditions. </p>


                                                            <p class="text-bold">EMOLUMENTS PER MONTH</p>
                                                            <div class="ml-4">

                                                                <p>1. You will be paid salary comprising of the
                                                                    following,</p>

                                                                <table class="table table-bordered" style="width:500px">
                                                                    <tr>
                                                                        <td style="width:200px">BASIC+DA</td>
                                                                        <td>{{CurAnnuaBasicDA| currency:''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>HRA</td>
                                                                        <td>{{CurAnnuaHRA| currency:''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>OTHER ALLOWANCES</td>
                                                                        <td>{{CurAnnuaTotalAllowance| currency:''}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>GROSS EARNING</b></td>
                                                                        <td>{{CurAnnuaGAC| currency:''}}</td>
                                                                    </tr>
                                                                </table><br />
                                                                <p>Daily Allowance:<br />

                                                                    <small>Bonus: 8.33% @ Basic + DA, applicable after
                                                                        completion of 30
                                                                        working days</small>
                                                                </p>

                                                            </div>


                                                            <p class="text-bold">NATURE OF WORK</p>
                                                            <div class="ml-4">

                                                                <p>2. You will be reporting to
                                                                    <b><u>{{Reportingname}}</u></b> directly.</p>

                                                                <p>3. You have to achieve the sales exclude its
                                                                    prevailing sales amount.</p>

                                                                <p>4. The Company and the Management expects a
                                                                    performance from you of the
                                                                    highest order and would be pleased to accord to you
                                                                    due recognition
                                                                    based on the merits of your performances.</p>

                                                                <p>5. Your overall responsibility would cover output
                                                                    quality, discipline and
                                                                    other allied matters of work assigned to you by your
                                                                    superiors from time
                                                                    to time to the best of your ability and skills.</p>

                                                                <p>6. Your nature of work and designation are liable to
                                                                    be changed as and
                                                                    when required by the Management without necessarily
                                                                    assigning any reason
                                                                    and you shall on receipt of such orders act
                                                                    accordingly with immediate
                                                                    effect.</p>

                                                            </div>


                                                            <p class="text-bold">PROBATION</p>
                                                            <div class="ml-4">
                                                                <p>7. You will be on probation for a period of 6 months.
                                                                    Your progress will
                                                                    be reviewed periodically and your absorption in our
                                                                    company on a regular
                                                                    basis will depend on the progress made by you. The
                                                                    management reserves
                                                                    the right of extending your probation in our company
                                                                    and the decision of
                                                                    the management in this regard will be final and
                                                                    binding on you.</p>

                                                                <p>8. During the probation period if we find your
                                                                    performance satisfactory
                                                                    then your service will continue otherwise it gets
                                                                    terminated.</p>
                                                            </div>
                                                            <p class="text-bold">PLACE OF WORK AND TRANSFER</p>
                                                            <div class="ml-4">
                                                                <p>9. Your present place of work is <u>{{Location}}</u>.
                                                                </p>

                                                                <p>10. You are liable to be transferred to any other
                                                                    department or branch or
                                                                    sister concern of the company anywhere in India and
                                                                    outside India at the
                                                                    discretion of the Management.</p>
                                                            </div>
                                                            <p class="text-bold">CONFLICT OF INTEREST</p>
                                                            <div class="ml-4">
                                                                <p>11. You shall always devote the whole of your time
                                                                    and services to the
                                                                    duties allotted to you and you shall not without the
                                                                    consent in writing
                                                                    of the Management be interested, employed or
                                                                    otherwise engaged directly
                                                                    or indirectly in any other business or employment.
                                                                </p>

                                                                <p>12. Non-adherence to this condition would amount to
                                                                    willful suppression
                                                                    of facts and breach of contract, and shall entail
                                                                    termination of your
                                                                    services.</p>
                                                            </div>
                                                            <p class="text-bold">TERMINATION OF SERIVCES</p>
                                                            <div class="ml-4">
                                                                <p>13. Either party may terminate the service by giving
                                                                    one-month notice to
                                                                    the other or salary in lieu of such notice.</p>

                                                                <p>14. In case at any time the management finds that the
                                                                    information
                                                                    furnished by you in your application and related
                                                                    papers is false or you
                                                                    are found to have suppressed any material
                                                                    information, the appointment
                                                                    itself will be deemed to be void and your services
                                                                    will be liable to be
                                                                    terminated without notice or compensation in lieu
                                                                    thereof.</p>

                                                                <p>15. You will abide by the rules and regulations made
                                                                    by the Company as
                                                                    are in force or as may be introduced or amended or
                                                                    extended from time to
                                                                    time.</p>

                                                                <p>16. Your services can be terminated without notice or
                                                                    salary in lieu of
                                                                    notice at the discretion of the management if it is
                                                                    found that you have
                                                                    violated the model standing laws in force or lost
                                                                    confidence of the
                                                                    management.</p>
                                                            </div>
                                                            <p class="text-bold">GENERAL</p>
                                                            <div class="ml-4">
                                                                <p>17. During the period of your employment or
                                                                    thereafter at any time, you
                                                                    shall not disclose, divulge or communicate to any
                                                                    person or persons
                                                                    whatsoever information or secret relating to any
                                                                    trade or business of
                                                                    the Company you may have acquired as an employee of
                                                                    the Company.</p>

                                                                <p>18. Subject to the statutory provisions, the
                                                                    management may require you
                                                                    to work on holidays / off days as may be necessary
                                                                    and you shall
                                                                    promptly act in accordance with the instructions in
                                                                    this behalf.</p>

                                                                <p>19. You shall be responsible for safe keeping and
                                                                    returning the property
                                                                    of the Company under your custody, if misused or
                                                                    lead to damage, the
                                                                    cost of the property may be recovered from your
                                                                    salary.</p>

                                                                <p>20. Any change in your residential address should be
                                                                    notified in writing
                                                                    to the Company immediately. All communications will
                                                                    be addressed to you
                                                                    on the last address notified by you and it will be
                                                                    Presumed that you
                                                                    have received such communications addressed to you
                                                                    within the normal
                                                                    time taken for this purpose. The management shall
                                                                    not be held
                                                                    responsible for non-receipt of such communication
                                                                    for whatever reasons.
                                                                </p>

                                                                <p>21. If required you are liable for medical check-up
                                                                    at all times by a
                                                                    Registered Medical Practitioner of the Management’s
                                                                    choice. The
                                                                    Management may terminate your employment if you are
                                                                    found to be unfit
                                                                    physically or otherwise.</p>

                                                                <p>22. All disputes will be subject to TIRUPUR
                                                                    jurisdiction only</p>
                                                            </div>

                                                            <p>If the above terms and conditions of employment are
                                                                acceptable to you, kindly
                                                                return the duplicate copy of this letter duly signed as
                                                                a token of your
                                                                acceptance.</p>

                                                            <p>We welcome you to our organization and look forward to a
                                                                long and mutual
                                                                beneficial association with us.</p>

                                                            <p>Best Wishes,</p>



                                                            <br />
                                                            <p class="text-bold">For Britannia Labels India Private
                                                                Limited,</p>
                                                            <br /><br />
                                                            <p class="text-bold">Managing Director</p>
                                                            <p>I hereby accept the above Terms and Conditions</p>
                                                            <br /><br />
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p><b>Signature
                                                                            ______________________________</b><br /><br /><br /><br /><br /><br />
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 text-right"><b> Date
                                                                        _______________ </b></div>
                                                            </div>


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

                    <div class="modal fade" id="ModalEditingReason" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Editing Reasons</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger" role="alert">

                                        <label class="col-form-label">Editing Detail</label>


                                        <textarea class="form-control" ng-model="EditingReason"></textarea>


                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn  btn-success" ng-click="UpdateEditingReason();"
                                        data-dismiss="modal">Update</button>
                                    <button class="btn  btn-warning" data-dismiss="modal" data-toggle="modal"
                                        data-target="#ModalLogin">Login</button>
                                    <button type="button" class="btn btn-rounded btn-dark"
                                        data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-success" role="alert" ng-show="LogMessage">
                                        {{LogMessage}}
                                    </div>

                                    <div class="alert alert-danger" role="alert">

                                        <label class="col-form-label">Enter Userid</label>


                                        <input class="form-control" ng-model="EditingUserid" />
                                        <label class="col-form-label">Enter Password</label>


                                        <input class="form-control" ng-model="EditingPassword" type="password" />


                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn  btn-success" ng-click="UserLogin();">Submit</button>

                                    <button type="button" class="btn btn-rounded btn-dark"
                                        data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalCenterWorkers" tabindex="-1" role="dialog" id=""
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label text-green-bold">Components</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <label class="col-form-label text-green-bold">Monthly</label>
                                            </div>
                                            <div class="col-md-1 nopadding ">
                                                <label class="col-form-label text-green-bold">Annual</label>
                                            </div>
                                            <div class="col-md-1 nopadding ">
                                                <label class="col-form-label text-green-bold">inc%</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label text-green-bold">Components</label>
                                            </div>
                                            <div class="col-md-1 nopadding ">
                                                <label class="col-form-label text-green-bold">Monthly</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <label class="col-form-label text-green-bold">Annual</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <label class="col-form-label text-green-bold">inc%</label>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Basic+DA</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotBasicDA"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaBasicDA"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperBasicDA"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">HRA</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotHRA"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaHRA"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperHRA"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Special
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurMotSpecialAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaSpecialAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperSpecialAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Total
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotTotalAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaTotalAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperTotalAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 nopadding">
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">

                                            <label class="col-md-12 text-green mb-2"><b>Retirals Employer
                                                    Contribution</b></label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">PF (12 %) From
                                                    Basic</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotPFemployeer"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaPFemployeer"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperPFemployeer"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">Gradutity(5%)</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotGratuity"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaGratuity"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperGratuity"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Retirals
                                                    Total</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotRetairlsTotal"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaRetairlsTotal"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperRetairlsTotal" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">GAC</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotGAC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaGAC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperGAC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Bonous @
                                                    8.33%</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotEstimatedBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaEstimatedBonous" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperEstimatedBonous" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">Other
                                                    Bonous</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotOtherBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaOtherBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperOtherBonous"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 nopadding">
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> <label class="text-green mb-2"><b>Other
                                                        Components</b></label> </div>

                                            <div class="col-md-6">
                                                <label class="text-green mb-2"><b>Deductions</b></label>
                                            </div>


                                        </div>
                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Est.CTC</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperCTC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>


                                            <div class="col-md-3">
                                                <label class="col-form-label">PF
                                                    Employee</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotPFemployee"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaPFemployee"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperPFemployee"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">ESIC</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotESIC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaESIC"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperESIC"
                                                    autocomplete="off" onkeypress="return Validate(event);" readonly>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Stay
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotStayAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaStayAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperStayAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>








                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Canteen</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotCanteen"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurAnnuaCanteen"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurincperCanteen"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Other
                                                    Deductions</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotOtherDeductions"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaOtherDeductions" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperOtherDeductions" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Travel
                                                    Allowance</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotTravelAllowance"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaTravelAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperTravelAllowance" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="col-form-label">Take
                                                    Home</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurMottakehomewithouttax" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuatakehomewithouttax" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="Curincpertakehomewithouttax" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="col-form-label">Deductions
                                                    Total</label>
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control" ng-model="CurMotDeductionTotal"
                                                    autocomplete="off" onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurAnnuaDeductionTotal" autocomplete="off"
                                                    onkeypress="return Validate(event);">
                                            </div>
                                            <div class="col-md-1 nopadding">
                                                <input type="text" class="form-control"
                                                    ng-model="CurincperDeductionTotal" autocomplete="off"
                                                    onkeypress="return Validate(event);" readonly>
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 nopadding">
                                                <hr />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="alert alert-success" role="alert" ng-show="Message">
                                                {{Message}}
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Status</label>
                                                    </div>
                                                    <div class="col-md-6 nopadding">
                                                        <select class="form-control" ng-model="FitStatus"
                                                            ng-change="GetStatusAlert(FitStatus);">
                                                            <option Value="Open">Open</option>
                                                            <option value="Cancel">Cancel</option>
                                                            <option value="Final">Final</option>
                                                        </select>
                                                    </div>
                                                </div>





                                            </div>
                                            <div class="col-md-6 nopadding">
                                                <div class="form-group text-right">
                                                    <button class="btn btn-sm btn-success"
                                                        ng-click="UpdateFitement();"><i class="fa fa-save"></i>
                                                        Update</button>

                                                    <!-- <button class="btn btn-sm btn-warning"
                                                        ng-click="CalculateFitment();"><i class="fa fa-calculator"></i>
                                                        Calculate</button> -->

                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-dismiss="modal"><i class="fa fa-times"></i>
                                                        Close</button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                </div>



                                <div class="modal-footer">





                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalCenter1OfferEnglish" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Appointment Order
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">



                                            <a id="btnOfferLetterEnglish" class="btn btn-info btn-nda-down2"><i
                                                    class="fa fa-download"></i> Download</a>
                                            <div class="card-body">

                                                <div id="pdfExportOfferLetterEnglish">

                                                    <div class="pdf-sipl">
                                                        <div class="pdf-header-sipl-modal"> <img
                                                                src="../Logo/Sainmarknewlogo.png" width="130"
                                                                height="50" />
                                                            <p><b>Sainmarks Industries (India) Pvt Ltd</b><br />
                                                                476/1b/1a, Label Arcade, Jothi Nagar,
                                                                Palavanjipalayam,<br />
                                                                Dharapuram Main Road, Tirupur-641 608.</p>
                                                        </div>
                                                        <hr />
                                                        <style>
                                                        .btn-nda-down {
                                                            position: absolute;
                                                            top: 5px;
                                                            right: 15px;
                                                        }

                                                        p {
                                                            text-align: justify;
                                                        }

                                                        .div-table {
                                                            display: table;
                                                            width: 100%;
                                                        }

                                                        .div-table-row {
                                                            display: table-row;
                                                            width: 100%;
                                                            clear: both;
                                                        }

                                                        .div-table-col {
                                                            float: left;
                                                            /* fix for buggy browsers */
                                                            width: 50%;
                                                            display: table-column;
                                                        }

                                                        h4 {
                                                            text-align: center;
                                                            font-weight: bold;
                                                        }

                                                        .nda-ta-content p,
                                                        .nda-ta-content ul li {
                                                            font-size: 15px;
                                                        }

                                                        .nda-ta-content p u {
                                                            font-weight: bold;
                                                        }
                                                        </style>


                                                        <div class='nda-ta-content'><br />

                                                            <h4>Offer Letter</h4>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p><b>To,</b><br /><br /><br /><br /><br /><br />
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 text-right"><b>Date: {{}}</b>
                                                                </div>
                                                            </div>

                                                            <p>Sub: – Offer Letter</p>

                                                            <p class="text-bold">Dear <u>{{Title}}{{Firstname}}{{Lastname}}</u>, </p>

                                                            <p>Subsequent to your successful interview with BRITANNIA
                                                                LABELS INDIA PVT LTD, TIRUPUR. We are pleased to offer
                                                                you the position as “<u>{{Designationproposed}}</u>” in our organization. We
                                                                take pleasure to inform you that your CTC will be
                                                                {{CommitedCTC|currency:''}}</p>

                                                            <p>Our bonus policy is as per act 8.33% on BASIC + DA after
                                                                completion of 30 days attendance. There is any law
                                                                stating that in case an employee is absent without an
                                                                approved leave for more than 10 days that can be treated
                                                                as their voluntary resignation.</p>

                                                            <p>You are requested to join us on <u>{{Date_Of_Joing2}}</u> </p>


                                                            <p class="text-bold">You are requested to carry the
                                                                below-mentioned documents at the time of joining:</p>
                                                            <div class="ml-5">
                                                                <p>1. Aadhar Card.</p>

                                                                <p>2. All Educational certificates (photocopies).</p>

                                                                <p>3. Passport size photographs x 4 copies.</p>

                                                                <p>4. Documents of proof of residence (Permanent &
                                                                    Current).</p>

                                                                <p>5. Pan Card.</p>

                                                                <p>6. Savings account passbook.</p>

                                                                <p>7. Vaccination Certificate.</p>
                                                            </div>
                                                            <p>The formal letter of appointment containing details of
                                                                the terms and conditions of the employment will be
                                                                issued to you after your joining with us. Please sign
                                                                and return the duplicate copy of this letter as a token
                                                                of your acceptance to this offer.</p>

                                                            <br />
                                                            <p class="text-bold">Yours truly,</p>
                                                            <br /><br />
                                                            <p class="text-bold">General Manager</p>




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





                    </div>


                </div>
            </div>
        </div>
    </div>





    </div>



    </div>

    </div>






    <?php include '../footer.php'?>





    </div>

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

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>