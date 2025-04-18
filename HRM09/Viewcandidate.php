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
            <div class="container-fluid dashboard-content">



                <div id="myCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <div class="row">
                                <div class="col-md-12">

                                    <h5 class="text-green">Candidate Details
                                    </h5>
                                    <hr />

                                    <div class="">




                                        <div class="">

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
                                                        <tr class="searchin">
                                                            <td colspan="2">
                                                                <div class="input-group ">
                                                                    <input type="text" placeholder="Search"
                                                                        class="form-control"
                                                                        ng-model="searchCandidate.Candidateid">

                                                                </div>

                                                            </td>
                                                            <td>
                                                                <div class="input-group ">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Search"
                                                                        ng-model="searchCandidate.Fullname">

                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group ">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Search"
                                                                        ng-model="searchCandidate.Gender">

                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group ">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Search"
                                                                        ng-model="searchCandidate.Contactno">

                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group ">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Search"
                                                                        ng-model="searchCandidate.Type_Of_Posistion">

                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group ">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Search"
                                                                        ng-model="searchCandidate.HighestQualification">

                                                                </div>
                                                            </td>
                                                            <td colspan="2">
                                                                <div class="input-group ">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Search"
                                                                        ng-model="searchCandidate.Selectionstatus">

                                                                </div>
                                                            </td>





                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr dir-paginate="e in GetCandidateList |filter:searchCandidate|itemsPerPage:10 "
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
                                                            <td>
                                                                {{e.Selectionstatus}}

                                                            </td>


                                                            <td>
                                                                <div class="action-btn">
                                                                    <img height="15" ng-click="SendEdit(e.Candidateid);"
                                                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">




                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>



                                            </div>

                                            <div class="float-right mt-2">
                                                <div class="pagination">
                                                    <dir-pagination-controls pagination-id="Candidategrid" max-size="3"
                                                        direction-links="true" boundary-links="true" class="pagination">
                                                    </dir-pagination-controls>
                                                </div>
                                            </div>


                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                        <div class="carousel-item">
                            <div class="">
                                <div class="row">
                                    <div class="col-xl-12">


                                        <div class="">
                                            <h5 class="text-green">Candidate Details
                                            </h5>
                                            <hr/>
                                            <div class="">

                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Candidate
                                                            ID</label>
                                                        <input type="text" class="form-control" ng-model="Candidateid"
                                                            autocomplete="off" readonly>
                                                    </div>

                                                    <div class="form-group col-md-9 mb-0">

                                                        <div class="row mb-0">

                                                            <div class="form-group col-md-4">
                                                                <label class="col-form-label">First
                                                                    Name</label>
                                                                <div class="input-group "><span
                                                                        class="input-group-prepend">

                                                                        <input type="text" placeholder="Firstname"
                                                                            class="form-control" ng-model="Title"
                                                                            readonly>

                                                                        <input type="text" placeholder="Firstname"
                                                                            class="form-control" ng-model="Firstname"
                                                                            readonly>
                                                                </div>

                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label class="col-form-label">Last
                                                                    Name</label>
                                                                <input type="text" class="form-control"
                                                                    ng-model="Lastname" autocomplete="off" readonly>

                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label class="col-form-label">Status</label>
                                                                <input type="text" class="form-control"
                                                                    ng-model="Selectionstatus" autocomplete="off"
                                                                    readonly>


                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Gender</label>
                                                        <input type="text" class="form-control" ng-model="Gender"
                                                            autocomplete="off" readonly>


                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Qualification</label>
                                                        <input type="text" class="form-control" ng-model="Qualification"
                                                            autocomplete="off" readonly>

                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Marital Status</label>
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
                                                        <label class="col-form-label">Email
                                                            ID</label>
                                                        <input type="text" class="form-control" ng-model="Emailid"
                                                            autocomplete="off" readonly>


                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="col-form-label">Current
                                                            Location</label>
                                                        <input type="text" class="form-control" ng-model="City"
                                                            autocomplete="off" readonly>

                                                    </div>

                                                </div>

                                                <div class="alert alert-success" role="alert" ng-show="Message">
                                                    {{Message}}
                                                </div>

                                                <div class="form-group text-right">

                                                    <button class="btn btn-sm btn-rounded btn-warning"
                                                        data-target="#myCarousel" data-slide-to="0"><i
                                                            class="fa  fa-arrow-left"></i>
                                                        Back</button>
                                                </div>

                                                <div class="tab-list">




                                                    <ul class="nav nav-pills nav-fill">
                                                        <li class="nav-item"><a data-toggle="tab" href="#menu1">Personal
                                                                Information</a></li>
                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu6">Education </a></li>
                                                        <li class="nav-item" ng-show="btnfresherno">
                                                            <a data-toggle="tab" href="#menu2">Pre(britannia)</a>
                                                        </li>
                                                        <li class="nav-item" ng-show="btnfresherno">
                                                            <a data-toggle="tab" href="#menu8">Work Expereience</a>
                                                        </li>
                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu10">Vaccination</a></li>
                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu12">Address</a></li>

                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu4">Status</a></li>



                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu7">Fitment</a></li>

                                                        <li class="nav-item"><a data-toggle="tab"
                                                                href="#menu5">Appointment </a></li>



                                                    </ul>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tab-content" style="overflow-x: auto">

                                                            <div id="menu1" class="tab-pane fade in active">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">
                                                                        Personal
                                                                        Information</h5>
                                                                    <div class="card-body">



                                                                        <div class="row">
                                                                            <div class="form-group col-lg-3">
                                                                                <label class="col-form-label">Languages
                                                                                    known</label>

                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Languages"
                                                                                    autocomplete="off" readonly>


                                                                                </li>


                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Date
                                                                                    of
                                                                                    Birth</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Dob" readonly>
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Age</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Age" autocomplete="off"
                                                                                    readonly>
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Application
                                                                                    Date</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="ApplicationDate" readonly>
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Blood
                                                                                    Group</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Bloodgroup"
                                                                                    autocomplete="off" readonly>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Fresher</label>

                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Fresher"
                                                                                    autocomplete="off" readonly>

                                                                            </div>

                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnfresherno">
                                                                                <label
                                                                                    class="col-form-label">Expereience</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Expereience"
                                                                                    autocomplete="off" readonly>
                                                                            </div>



                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnfresherno">
                                                                                <label class="col-form-label">Serving
                                                                                    NP</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="ServingNoticeperiod"
                                                                                    autocomplete="off" readonly>

                                                                            </div>

                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnfresherno">
                                                                                <label class="col-form-label">Notice
                                                                                    Period</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="NoticePeriod"
                                                                                    autocomplete="off" readonly>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Available
                                                                                    on
                                                                                    Interview</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Availableoninterview"
                                                                                    readonly>
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Reporting
                                                                                    To</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Reportingname"
                                                                                    autocomplete="off" readonly>

                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Business</label>
                                                                                <input class="form-control"
                                                                                    ng-model="Business" readonly />
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Designation
                                                                                    Proposed
                                                                                </label>
                                                                                <input class="form-control"
                                                                                    ng-model="Designationproposed"
                                                                                    readonly />

                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Location</label>
                                                                                <input class="form-control"
                                                                                    ng-model="Location" readonly />

                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Department</label>
                                                                                <input class="form-control"
                                                                                    ng-model="Department" readonly />

                                                                            </div>





                                                                        </div>

                                                                    </div>



                                                                </div>

                                                            </div>

                                                            <div id="menu6" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">
                                                                        Candidate
                                                                        Education Details</h5>
                                                                    <div class="card-body">







                                                                        <div class="table-responsive">
                                                                            <table class="table   table-sm">
                                                                                <thead>
                                                                                    <tr>

                                                                                        <th>No
                                                                                        </th>
                                                                                        <th scope="col">
                                                                                            Studies
                                                                                        </th>
                                                                                        <th scope="col">
                                                                                            University
                                                                                        </th>
                                                                                        <th scope="col">
                                                                                            Grade
                                                                                        </th>
                                                                                        <th scope="col">
                                                                                            Year
                                                                                        </th>
                                                                                        <th>Education Mode</th>
                                                                                        <th>Specialization</th>



                                                                                        <th scope="col">
                                                                                            Action
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
                                                                                        <td>{{e.Studies}}
                                                                                        </td>
                                                                                        <td>{{e.Universityorschool}}
                                                                                        </td>
                                                                                        <td>{{e.Grade}}
                                                                                        </td>
                                                                                        <td>{{e.Passoutyear}}
                                                                                        </td>
                                                                                        <td>{{e.EducationMode}}</td>
                                                                                        <td>{{e.Specialization}}</td>




                                                                                        <td>
                                                                                            <div class="action-btn">



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
                                                                                max-size="3" direction-links="true"
                                                                                boundary-links="true"
                                                                                class="pagination">
                                                                            </dir-pagination-controls>


                                                                        </div>

                                                                    </div>


                                                                </div>

                                                            </div>


                                                            <div id="menu2" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">
                                                                        Previous(Sainmark) Employee
                                                                        Details</h5>
                                                                    <div class="card-body">

                                                                        <div class="row">
                                                                            <div class="form-group col-md-3">
                                                                                <label
                                                                                    class="col-form-label">Worked</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Previoussainmarksemployee"
                                                                                    readonly>

                                                                            </div>
                                                                            <div class="form-group col-md-3"
                                                                                ng-show="btnpreviousworked">
                                                                                <label
                                                                                    class="col-form-label">Empid(Old)</label>

                                                                                <input type="text" class="form-control"
                                                                                    ng-model="OldEmpName" readonly>

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



                                                                        </div>



                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div id="menu3" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">
                                                                        Interview
                                                                        Detail</h5>
                                                                    <div class="card-body">

                                                                        <div class="row">

                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Interviewer
                                                                                </label>


                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Taken_Interview"
                                                                                    autocomplete="off" readonly>

                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="col-form-label">HR
                                                                                    (Interview)</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Interview_held_On"
                                                                                    readonly>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label class="col-form-label">DH
                                                                                    (Interview)</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="DHinterviewdate" readonly>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Reschedule_interview_date</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Reschedule_interview"
                                                                                    readonly>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    class="col-form-label">Reschedule_interview_reason</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Reschedule_interview_reason"
                                                                                    readonly>
                                                                            </div>



                                                                        </div>



                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div id="menu4" class="tab-pane fade">

                                                                <div class="card">
                                                                    <h5 class="card-header">Approval
                                                                        Status</h5>
                                                                    <div class="card-body">
                                                                        <div class="table-responsive">
                                                                            <table
                                                                                class="table table-bordered  table-sm ">
                                                                                <thead>
                                                                                    <tr>

                                                                                        <th>No</th>
                                                                                        <th scope="col">
                                                                                            Type
                                                                                        </th>
                                                                                        <th scope="col">
                                                                                            Status
                                                                                        </th>
                                                                                        <th scope="col">
                                                                                            Approved/Reject
                                                                                            Time
                                                                                        </th>
                                                                                        <th scope="col">
                                                                                            Notes
                                                                                        </th>
                                                                                        

                                                                                    </tr>

                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>1.</td>
                                                                                        <td>HR</td>
                                                                                        <td> <input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="HR_Approve"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td><input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="HR_Approve_datetime"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td><input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="HRinterviewnotes"
                                                                                                ng-disabled="HRinterviewnotes"></input>
                                                                                        </td>
                                                                                     


                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>2.</td>
                                                                                        <td>DH</td>
                                                                                        <td> <input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="DH_Approve"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td><input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="DH_Approve_datetime"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td><input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="DHinterviewnotes"
                                                                                                ng-disabled="DHinterviewnotes"></input>
                                                                                        </td>
                                                                                       

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>3.</td>
                                                                                        <td>GM</td>
                                                                                        <td> <input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="GM_Approve"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td><input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="GM_Approve_datetime"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td><input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="GMinterviewnotes"
                                                                                                ng-disabled="GMinterviewnotes"></input>
                                                                                        </td>

                                                                                       
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>4.</td>
                                                                                        <td>MD</td>
                                                                                        <td> <input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="MD_Approve"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td><input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="MD_Approve_datetime"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td><input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="MDinterviewnotes"
                                                                                                ng-disabled="MDInterviewnotes"></input>
                                                                                        </td>
                                                                                       
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td>5.</td>
                                                                                        <td>Candidate
                                                                                        </td>
                                                                                        <td> <input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="CandidateAccepted"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td><input type="text"
                                                                                                class="form-control"
                                                                                                ng-model="Candidateofferaccepteddatetime"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td>
                                                                                        </td>
                                                                                       

                                                                                    </tr>





                                                                                </tbody>
                                                                            </table>



                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div id="menu5" class="tab-pane fade">

                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">
                                                                        Date Of
                                                                        Joining & Confirmation Letter Details
                                                                    </h5>
                                                                    <div class="card-body">

                                                                        <div class="row">
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Offer
                                                                                    Accepted By
                                                                                    Candidate
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="CandidateAccepted"
                                                                                    readonly>

                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Expected
                                                                                    Date Of
                                                                                    Joining</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Date_Of_Joing" readonly>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Accepted
                                                                                    CTC </label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="CommitedCTC"
                                                                                    autocomplete="off" readonly>
                                                                            </div>




                                                                        </div>
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
                                                                                    data-target="#ModalCenter1AppointmentHindi"><i
                                                                                        class="fa fa-save"></i>
                                                                                    Confirmation(Hindi)</button>
                                                                            </div>


                                                                        </div>

                                                                    </div>




                                                                </div>

                                                            </div>


                                                            <div id="menu7" class="tab-pane fade">
                                                                <div class="card">
                                                                    <h4 class="card-header text-green pl-0">
                                                                        Salary
                                                                        Details</h4>



                                                                    <div class="row">
                                                                        <div class="col-md-12">


                                                                            <table
                                                                                class="table table-bordered  table-sm info-table can-table">
                                                                                <thead>
                                                                                    <tr align="center">
                                                                                        <th colspan="7">
                                                                                            General
                                                                                        </th>
                                                                                        <th colspan="20">
                                                                                            Monthly
                                                                                            Detail
                                                                                        </th>
                                                                                        <th colspan="20">
                                                                                            Annual
                                                                                            Detail
                                                                                        </th>

                                                                                    </tr>
                                                                                    <tr class="bg-green text-white">

                                                                                        <th>#</th>

                                                                                        <th>FitStatus
                                                                                        </th>
                                                                                        <th>Approval
                                                                                        </th>
                                                                                        <th>Basic
                                                                                        </th>
                                                                                        <th>Hra</th>
                                                                                        <th>Special
                                                                                        </th>
                                                                                        <th>Total
                                                                                        </th>
                                                                                        <th>PF</th>
                                                                                        <th>Graduity
                                                                                        </th>
                                                                                        <th>Retirals
                                                                                        </th>
                                                                                        <th>GAC</th>
                                                                                        <th>Bonous
                                                                                        </th>
                                                                                        <th>Other
                                                                                            Bonous
                                                                                        </th>
                                                                                        <th>CTC</th>
                                                                                        <th>Deductions
                                                                                        </th>
                                                                                        <th>ESIC
                                                                                        </th>
                                                                                        <th>PFEmployee
                                                                                        </th>
                                                                                        <th>Canteen
                                                                                        </th>
                                                                                        <th>Stay
                                                                                        </th>
                                                                                        <th>Travel
                                                                                        </th>
                                                                                        <th>Other
                                                                                            Deductions
                                                                                        </th>
                                                                                        <th>Deduction
                                                                                            Total
                                                                                        </th>
                                                                                        <th>Take
                                                                                            Home
                                                                                        </th>

                                                                                        <th>Basic
                                                                                        </th>
                                                                                        <th>Hra</th>
                                                                                        <th>Special
                                                                                        </th>
                                                                                        <th>Total
                                                                                        </th>
                                                                                        <th>PF</th>
                                                                                        <th>Graduity
                                                                                        </th>
                                                                                        <th>Retirals
                                                                                        </th>
                                                                                        <th>GAC</th>
                                                                                        <th>Bonous
                                                                                        </th>
                                                                                        <th>Other
                                                                                            Bonous
                                                                                        </th>
                                                                                        <th>CTC</th>
                                                                                        <th>Deductions
                                                                                        </th>
                                                                                        <th>ESIC
                                                                                        </th>
                                                                                        <th>PFEmployee
                                                                                        </th>
                                                                                        <th>Canteen
                                                                                        </th>
                                                                                        <th>Stay
                                                                                        </th>
                                                                                        <th>Travel
                                                                                        </th>
                                                                                        <th>Other
                                                                                            Deductions
                                                                                        </th>
                                                                                        <th>Deduction
                                                                                            Total
                                                                                        </th>
                                                                                        <th>Take
                                                                                            Home
                                                                                        </th>

                                                                                    </tr>
                                                                                </thead>


                                                                                <tbody>

                                                                                    <tr dir-paginate="e in GetSalaryList |filter:searchSalary|itemsPerPage:5 "
                                                                                        pagination-id="Salarygrid"
                                                                                        current-page="currentPageSalary">




                                                                                        <td>
                                                                                            {{$index+1 + (currentPageSalary - 1) * pageSizeSalary}}
                                                                                        </td>








                                                                                        <td>{{e.FitStatus}}
                                                                                        </td>
                                                                                        <td>{{e.MDApproval}}
                                                                                        </td>
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



                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div id="menu8" class="tab-pane fade">

                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">
                                                                        Present
                                                                        Working Detail</h5>
                                                                    <div class="card-body">

                                                                        <div class="row">
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Current
                                                                                    Organization</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="CurrentOrganization"
                                                                                    readonly>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Current
                                                                                    Position</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="PreviousPosition"
                                                                                    readonly>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Current
                                                                                    CTC</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="CurrentCTC"
                                                                                    autocomplete="off" readonly>
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Position
                                                                                    Applied
                                                                                    For</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="AppliedPosition" readonly>
                                                                            </div>







                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Expected
                                                                                    CTC</label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="ExpectedCTC"
                                                                                    autocomplete="off" readonly>
                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Negotiable
                                                                                    CTC </label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="NegotiableCTC"
                                                                                    autocomplete="off" readonly>



                                                                            </div>

                                                                            <div class="form-group col-md-3">
                                                                                <label class="col-form-label">Willing
                                                                                    to
                                                                                    Relocate
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    ng-model="Willingtorelocate"
                                                                                    autocomplete="off" readonly>

                                                                            </div>





                                                                        </div>



                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div id="menu10" class="tab-pane fade">
                                                                <div class="card noshadow">
                                                                    <h5 class="card-header text-green pl-0">
                                                                        Vaccination
                                                                        Details</h5>
                                                                    <div class="card-body">






                                                                        <div class="row">
                                                                            <div class="col-lg-12">

                                                                                <div class="table-responsive">
                                                                                    <table class="table   table-sm">
                                                                                        <thead>
                                                                                            <tr>

                                                                                                <th>No
                                                                                                </th>
                                                                                                <th scope="col">
                                                                                                    Vaccinated
                                                                                                </th>
                                                                                                <th scope="col">
                                                                                                    Date
                                                                                                </th>



                                                                                                <th scope="col">
                                                                                                    Action
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




                                                            <div id="menu12" class="tab-pane fade">
                                                                <div class="noshadow">
                                                                    <h5 class="text-green mt-2 pl-0">Address Information
                                                                    </h5>
                                                                    <hr />
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h5 class="text-green">Temporary Address
                                                                                Detail</h5>
                                                                            <div class="emp-adrbox">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-6">
                                                                                        <label
                                                                                            class="col-form-label">Address</label>
                                                                                        <input class="form-control"
                                                                                            ng-model="CurrentAddress"
                                                                                            readonly />
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label
                                                                                            class="col-form-label">Country</label>
                                                                                        <input class="form-control"
                                                                                            ng-model="CurrentCountry"
                                                                                            readonly />

                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label
                                                                                            class="col-form-label">State</label>
                                                                                        <input class="form-control"
                                                                                            ng-model="CurrentState"
                                                                                            readonly />

                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label
                                                                                            class="col-form-label">City</label>
                                                                                        <input class="form-control"
                                                                                            ng-model="CurrentCity"
                                                                                            readonly />

                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label
                                                                                            class="col-form-label">Pincode</label>
                                                                                        <input class="form-control"
                                                                                            ng-model="CurrentPincode" />
                                                                                    </div>

                                                                                </div>

                                                                            </div>


                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <h5 class="text-green">Permanent Address
                                                                                Details</h5>
                                                                            <div class="emp-adrbox">
                                                                                <div class="row">
                                                                                    <div class="form-group col-md-6">
                                                                                        <label
                                                                                            class="col-form-label">Address</label>
                                                                                        <input class="form-control"
                                                                                            ng-model="PermanentAddress"
                                                                                            readonly />
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label
                                                                                            class="col-form-label">Country</label>
                                                                                        <input class="form-control"
                                                                                            ng-model="PermanentCountry"
                                                                                            readonly />

                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label
                                                                                            class="col-form-label">State</label>
                                                                                        <input class="form-control"
                                                                                            ng-model="PermanentState"
                                                                                            readonly />

                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label
                                                                                            class="col-form-label">City</label>
                                                                                        <input class="form-control"
                                                                                            ng-model="PermanentCity"
                                                                                            readonly />

                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label
                                                                                            class="col-form-label">Pincode</label>
                                                                                        <input class="form-control"
                                                                                            ng-model="PermanentPincode"
                                                                                            readonly />
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
                        </div>
                        <?php include 'Candidatepopup.php';?>




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

</html>