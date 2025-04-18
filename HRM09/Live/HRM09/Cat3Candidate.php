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
      <div class="">
         <div class="">
            <div class="">
               <div class="">
                  <div class="" id="basicform">
                     <div id="myCarousel" class="carousel slide" data-interval="false">
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <div class="">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <h5 class="text-green">Candidate Details
                                       </h5>
                                       <hr/>
                                       <div class="">
                                          <div class="">
                                             <div class="table-responsive">
                                                <table class="table table-bordered  table-sm ">
                                                   <thead>
                                                      <tr>
                                                         <th>No</th>
                                                         <th scope="col"
                                                            style="width: 100px;">
                                                            Candidate_ID
                                                         </th>
                                                         <th scope="col"
                                                            style="width: 200px;">Name</th>
                                                         <th scope="col"
                                                            style="width: 90px;">Gender</th>
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
                                                               <input type="text"
                                                                  class="form-control" placeholder="Search" 
                                                                  ng-model="searchCandidate.Fullname">
                                                            </div>
                                                         </td>
                                                         <td>
                                                            <div class="input-group ">
                                                               <input type="text"
                                                                  class="form-control" placeholder="Search" 
                                                                  ng-model="searchCandidate.Gender">
                                                            </div>
                                                         </td>
                                                         <td>
                                                            <div class="input-group ">
                                                               <input type="text"
                                                                  class="form-control" placeholder="Search" 
                                                                  ng-model="searchCandidate.Contactno">
                                                            </div>
                                                         </td>
                                                         <td>
                                                            <div class="input-group ">
                                                               <input type="text"
                                                                  class="form-control" placeholder="Search" 
                                                                  ng-model="searchCandidate.Type_Of_Posistion">
                                                            </div>
                                                         </td>
                                                         <td>
                                                            <div class="input-group ">
                                                               <input type="text"
                                                                  class="form-control" placeholder="Search" 
                                                                  ng-model="searchCandidate.HighestQualification">
                                                            </div>
                                                         </td>
                                                         <td colspan="2">
                                                            <div class="input-group ">
                                                               <input type="text"
                                                                  class="form-control" placeholder="Search" 
                                                                  ng-model="searchCandidate.Selectionstatus">
                                                            </div>
                                                         </td>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      <tr dir-paginate="e in Getcat3CandidateList |filter:searchCandidate|itemsPerPage:10 "
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
                                                               <img height="15"
                                                                  ng-click="SendEdit(e.Candidateid);"
                                                                  src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                                            </div>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </div>
                                             <div class="float-right mt-2">
                                                <div class="pagination">
                                                   <dir-pagination-controls
                                                      pagination-id="Candidategrid"
                                                      max-size="3" direction-links="true"
                                                      boundary-links="true"
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
                                          <h5 class="card-header text-green">Candidate Details
                                          </h5>
                                          <div class="card-body">
                                             <div class="row">
                                                <div class="form-group col-md-3">
                                                   <label class="col-form-label">Candidate
                                                   ID</label>
                                                   <input type="text" class="form-control"
                                                      ng-model="Candidateid"
                                                      autocomplete="off" readonly>
                                                </div>
                                                <div class="form-group col-md-9 mb-0">
                                                   <div class="row mb-0">
                                                      <div class="form-group col-md-4">
                                                         <label class="col-form-label">First
                                                         Name</label>
                                                         <div class="input-group "><span
                                                            class="input-group-prepend">
                                                            <input type="text"
                                                               placeholder="Firstname"
                                                               class="form-control"
                                                               ng-model="Title"
                                                               readonly>
                                                            <input type="text"
                                                               placeholder="Firstname"
                                                               class="form-control"
                                                               ng-model="Firstname"
                                                               readonly>
                                                         </div>
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                         <label class="col-form-label">Last
                                                         Name</label>
                                                         <input type="text"
                                                            class="form-control"
                                                            ng-model="Lastname"
                                                            autocomplete="off" readonly>
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                         <label
                                                            class="col-form-label">Status</label>
                                                         <input type="text"
                                                            class="form-control"
                                                            ng-model="Selectionstatus"
                                                            autocomplete="off" readonly>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                   <label class="col-form-label">Gender</label>
                                                   <input type="text" class="form-control"
                                                      ng-model="Gender" autocomplete="off"
                                                      readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                   <label
                                                      class="col-form-label">Qualification</label>
                                                   <input type="text" class="form-control"
                                                      ng-model="Qualification"
                                                      autocomplete="off" readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                   <label
                                                      class="col-form-label">Married</label>
                                                   <input type="text" class="form-control"
                                                      ng-model="Married" autocomplete="off"
                                                      readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                   <label class="col-form-label">Mother Tongue
                                                   </label>
                                                   <input type="text" class="form-control"
                                                      ng-model="Mothertongue"
                                                      autocomplete="off" readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                   <label class="col-form-label">Contact
                                                   No</label>
                                                   <input type="text" class="form-control"
                                                      ng-model="Contactno" autocomplete="off"
                                                      readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                   <label
                                                      class="col-form-label">Category</label>
                                                   <input type="text" class="form-control"
                                                      ng-model="Category" autocomplete="off"
                                                      readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                   <label class="col-form-label">Email
                                                   ID</label>
                                                   <input type="text" class="form-control"
                                                      ng-model="Emailid" autocomplete="off"
                                                      readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                   <label class="col-form-label">Current
                                                   Location</label>
                                                   <input type="text" class="form-control"
                                                      ng-model="City" autocomplete="off"
                                                      readonly>
                                                </div>
                                             </div>
                                             <div class="alert alert-success" role="alert"
                                                ng-show="Message">
                                                {{Message}}
                                             </div>
                                             <div class="form-group text-right">
                                                <button
                                                   class="btn btn-sm btn-rounded btn-warning"
                                                   data-target="#myCarousel"
                                                   data-slide-to="0"><i
                                                   class="fa  fa-arrow-left"></i>
                                                Back</button>
                                             </div>
                                             <div class="tab-list">
                                                <ul class="nav nav-pills nav-fill">
                                                   <li class="nav-item"><a data-toggle="tab"
                                                      href="#menu1">Personal
                                                      Information</a>
                                                   </li>
                                                   <li class="nav-item"><a data-toggle="tab"
                                                      href="#menu6">Education </a></li>
                                                   <li class="nav-item" ng-show="btnfresherno">
                                                      <a data-toggle="tab"
                                                         href="#menu2">Previous_sainmarks</a>
                                                   </li>
                                                   <li class="nav-item" ng-show="btnfresherno">
                                                      <a data-toggle="tab"
                                                         href="#menu8">PresentWorking</a>
                                                   </li>
                                                   <li class="nav-item"><a data-toggle="tab"
                                                      href="#menu10">Vaccination</a></li>
                                                   <li class="nav-item"><a data-toggle="tab"
                                                      href="#menu3">Interview </a></li>
                                                   <li class="nav-item"><a data-toggle="tab"
                                                      href="#menu4">Status</a></li>
                                                   <li class="nav-item"><a data-toggle="tab"
                                                      href="#menu9">Reporting</a></li>
                                                   <li class="nav-item"><a data-toggle="tab"
                                                      href="#menu7">Fitment</a></li>
                                                   <li class="nav-item"><a data-toggle="tab"
                                                      href="#menu5">Appointment </a></li>
                                                   <li class="nav-item"><a data-toggle="tab"
                                                      href="#menu11">Letters
                                                      </a>
                                                   </li>
                                                </ul>
                                             </div>
                                             <div class="row">
                                                <div class="col-lg-12">
                                                   <div class="tab-content"
                                                      style="overflow-x: auto">
                                                      <div id="menu1"
                                                         class="tab-pane fade in active">
                                                         <div class="card noshadow">
                                                            <h5
                                                               class="card-header text-green pl-0">
                                                               Personal
                                                               Information
                                                            </h5>
                                                            <div class="card-body">
                                                               <div class="row">
                                                                  <div class="col-lg-2">
                                                                     <div
                                                                        class="form-group ">
                                                                        <label
                                                                           class="col-form-label">Languages
                                                                        known</label>
                                                                        <input
                                                                           type="text"
                                                                           class="form-control"
                                                                           ng-model="Languages"
                                                                           autocomplete="off"
                                                                           readonly>
                                                                        </li>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-lg-10">
                                                                     <div class="row">
                                                                        <div
                                                                           class="form-group col-md-3">
                                                                           <label
                                                                              class="col-form-label">Date
                                                                           of
                                                                           Birth</label>
                                                                           <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="Dob"
                                                                              readonly>
                                                                        </div>
                                                                        <div
                                                                           class="form-group col-md-3">
                                                                           <label
                                                                              class="col-form-label">Age</label>
                                                                           <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="Age"
                                                                              autocomplete="off"
                                                                              readonly>
                                                                        </div>
                                                                        <div
                                                                           class="form-group col-md-3">
                                                                           <label
                                                                              class="col-form-label">Application
                                                                           Date</label>
                                                                           <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="ApplicationDate"
                                                                              readonly>
                                                                        </div>
                                                                        <div
                                                                           class="form-group col-md-3">
                                                                           <label
                                                                              class="col-form-label">Blood
                                                                           Group</label>
                                                                           <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="Bloodgroup"
                                                                              autocomplete="off"
                                                                              readonly>
                                                                        </div>
                                                                        <div
                                                                           class="form-group col-md-3">
                                                                           <label
                                                                              class="col-form-label">Fresher</label>
                                                                           <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="Fresher"
                                                                              autocomplete="off"
                                                                              readonly>
                                                                        </div>
                                                                        <div class="form-group col-md-3"
                                                                           ng-show="btnfresherno">
                                                                           <label
                                                                              class="col-form-label">Expereience</label>
                                                                           <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="Expereience"
                                                                              autocomplete="off"
                                                                              readonly>
                                                                        </div>
                                                                        <div class="form-group col-md-3"
                                                                           ng-show="btnfresherno">
                                                                           <label
                                                                              class="col-form-label">Serving
                                                                           NP</label>
                                                                           <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="ServingNoticeperiod"
                                                                              autocomplete="off"
                                                                              readonly>
                                                                        </div>
                                                                        <div class="form-group col-md-3"
                                                                           ng-show="btnfresherno">
                                                                           <label
                                                                              class="col-form-label">Notice
                                                                           Period</label>
                                                                           <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="NoticePeriod"
                                                                              autocomplete="off"
                                                                              readonly>
                                                                        </div>
                                                                        <div
                                                                           class="form-group col-md-3">
                                                                           <label
                                                                              class="col-form-label">Available
                                                                           on
                                                                           Interview</label>
                                                                           <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="Availableoninterview"
                                                                              readonly>
                                                                        </div>
                                                                        <div
                                                                           class="form-group col-md-6">
                                                                           <label
                                                                              class="col-form-label">Address</label>
                                                                           <textarea
                                                                              class="form-control"
                                                                              ng-model="Address"
                                                                              readonly></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div id="menu6" class="tab-pane fade">
                                                         <div class="card noshadow">
                                                            <h5
                                                               class="card-header text-green pl-0">
                                                               Candidate
                                                               Education Details
                                                            </h5>
                                                            <div class="card-body">
                                                               <div
                                                                  class="table-responsive">
                                                                  <table
                                                                     class="table   table-sm">
                                                                     <thead>
                                                                        <tr>
                                                                           <th>No
                                                                           </th>
                                                                           <th
                                                                              scope="col">
                                                                              Studies
                                                                           </th>
                                                                           <th
                                                                              scope="col">
                                                                              University
                                                                           </th>
                                                                           <th
                                                                              scope="col">
                                                                              Grade
                                                                           </th>
                                                                           <th
                                                                              scope="col">
                                                                              Year
                                                                           </th>
                                                                           <th
                                                                              scope="col">
                                                                              Action
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
                                                                           <td>{{e.Studies}}
                                                                           </td>
                                                                           <td>{{e.Universityorschool}}
                                                                           </td>
                                                                           <td>{{e.Grade}}
                                                                           </td>
                                                                           <td>{{e.Passoutyear}}
                                                                           </td>
                                                                           <td>
                                                                              <div
                                                                                 class="action-btn">
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
                                                      <div id="menu2" class="tab-pane fade">
                                                         <div class="card noshadow">
                                                            <h5
                                                               class="card-header text-green pl-0">
                                                               Previous(Sainmark) Employee
                                                               Details
                                                            </h5>
                                                            <div class="card-body">
                                                               <div class="row">
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <label
                                                                        class="col-form-label">Worked</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="Previoussainmarksemployee"
                                                                        readonly>
                                                                  </div>
                                                                  <div class="form-group col-md-3"
                                                                     ng-show="btnpreviousworked">
                                                                     <label
                                                                        class="col-form-label">Empid(Old)</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="OldEmpName"
                                                                        readonly>
                                                                  </div>
                                                                  <div class="form-group col-md-3"
                                                                     ng-show="btnpreviousworked">
                                                                     <label
                                                                        class="col-form-label">Designation</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="PreviousDesignation"
                                                                        autocomplete="off"
                                                                        readonly>
                                                                  </div>
                                                                  <div class="form-group col-md-3"
                                                                     ng-show="btnpreviousworked">
                                                                     <label
                                                                        class="col-form-label">Department</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="PreviousDepartment"
                                                                        autocomplete="off"
                                                                        readonly>
                                                                  </div>
                                                                  <div class="form-group col-md-3"
                                                                     ng-show="btnpreviousworked">
                                                                     <label
                                                                        class="col-form-label">Working_Period</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="Workingperiod"
                                                                        autocomplete="off"
                                                                        readonly>
                                                                  </div>
                                                                  <div class="form-group col-md-3"
                                                                     ng-show="btnpreviousworked">
                                                                     <label
                                                                        class="col-form-label">Releiving_reason</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="Releivingreason"
                                                                        autocomplete="off"
                                                                        readonly>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div id="menu3" class="tab-pane fade">
                                                         <div class="card noshadow">
                                                            <h5
                                                               class="card-header text-green pl-0">
                                                               Interview
                                                               Detail
                                                            </h5>
                                                            <div class="card-body">
                                                               <div class="row">
                                                                  <div
                                                                     class="form-group col-md-4">
                                                                     <label
                                                                        class="col-form-label">Interviewer
                                                                     </label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="Taken_Interview"
                                                                        autocomplete="off"
                                                                        readonly>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-4">
                                                                     <label
                                                                        class="col-form-label">HR
                                                                     (Interview)</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="Interview_held_On"
                                                                        readonly>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-4">
                                                                     <label
                                                                        class="col-form-label">DH
                                                                     (Interview)</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="DHinterviewdate"
                                                                        readonly>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-4">
                                                                     <label
                                                                        class="col-form-label">Reschedule_interview_date</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="Reschedule_interview"
                                                                        readonly>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-4">
                                                                     <label
                                                                        class="col-form-label">Reschedule_interview_reason</label>
                                                                     <input type="text"
                                                                        class="form-control"
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
                                                               Status
                                                            </h5>
                                                            <div class="card-body">
                                                               <div
                                                                  class="table-responsive">
                                                                  <table
                                                                     class="table table-bordered  table-sm ">
                                                                     <thead>
                                                                        <tr>
                                                                           <th>No</th>
                                                                           <th
                                                                              scope="col">
                                                                              Type
                                                                           </th>
                                                                           <th
                                                                              scope="col">
                                                                              Status
                                                                           </th>
                                                                           <th
                                                                              scope="col">
                                                                              Approved/Reject
                                                                              Time
                                                                           </th>
                                                                           <th
                                                                              scope="col">
                                                                              Notes
                                                                           </th>
                                                                           <th>Send
                                                                              Approval
                                                                           </th>
                                                                        </tr>
                                                                     </thead>
                                                                     <tbody>
                                                                        <tr>
                                                                           <td>1.</td>
                                                                           <td>HR</td>
                                                                           <td> <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="HR_Approve"
                                                                              readonly>
                                                                           </td>
                                                                           <td><input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="HR_Approve_datetime"
                                                                              readonly>
                                                                           </td>
                                                                           <td><input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="HRinterviewnotes"
                                                                              ng-disabled="HRinterviewnotes"></input>
                                                                           </td>
                                                                           <td> <button
                                                                              class="btn btn-sm btn-rounded btn-info"
                                                                              ng-disabled="btnHR"
                                                                              ng-click="SendMailToHRNEW();">Send</button>
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td>2.</td>
                                                                           <td>DH</td>
                                                                           <td> <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="DH_Approve"
                                                                              readonly>
                                                                           </td>
                                                                           <td><input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="DH_Approve_datetime"
                                                                              readonly>
                                                                           </td>
                                                                           <td><input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="DHinterviewnotes"
                                                                              ng-disabled="DHinterviewnotes"></input>
                                                                           </td>
                                                                           <td> <button
                                                                              class="btn btn-sm btn-rounded btn-info"
                                                                              ng-disabled="btnDH"
                                                                              ng-click="SendMailToDepartmentHead();">Send</button>
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td>3.</td>
                                                                           <td>GM</td>
                                                                           <td> <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="GM_Approve"
                                                                              readonly>
                                                                           </td>
                                                                           <td><input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="GM_Approve_datetime"
                                                                              readonly>
                                                                           </td>
                                                                           <td><input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="GMinterviewnotes"
                                                                              ng-disabled="GMinterviewnotes"></input>
                                                                           </td>
                                                                           <td> <button
                                                                              class="btn btn-sm btn-rounded btn-info"
                                                                              ng-disabled="btnGM"
                                                                              ng-click="UpdateFitmentApprovedMail()">Send</button>
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td>4.</td>
                                                                           <td>MD</td>
                                                                           <td> <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="MD_Approve"
                                                                              readonly>
                                                                           </td>
                                                                           <td><input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="MD_Approve_datetime"
                                                                              readonly>
                                                                           </td>
                                                                           <td><input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="MDinterviewnotes"
                                                                              ng-disabled="MDInterviewnotes"></input>
                                                                           </td>
                                                                           <td> <button
                                                                              class="btn btn-sm btn-rounded btn-info"
                                                                              ng-disabled="btnMD"
                                                                              ng-click="UpdateFitmentGMApprovedMail()">Send</button>
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td>5.</td>
                                                                           <td>Candidate
                                                                           </td>
                                                                           <td> <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="CandidateAccepted"
                                                                              readonly>
                                                                           </td>
                                                                           <td><input
                                                                              type="text"
                                                                              class="form-control"
                                                                              ng-model="Candidateofferaccepteddatetime"
                                                                              readonly>
                                                                           </td>
                                                                           <td>
                                                                           </td>
                                                                           <td> <button
                                                                              class="btn btn-sm btn-rounded btn-info"
                                                                              ng-disabled="btnCandidate"
                                                                              ng-click="SendMailToCandidate();">Send</button>
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
                                                            <h5
                                                               class="card-header text-green pl-0">
                                                               Date Of
                                                               Joining / Accepted Detail
                                                            </h5>
                                                            <div class="card-body">
                                                               <div class="row">
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <label
                                                                        class="col-form-label">Offer
                                                                     Accepted By
                                                                     Candidate
                                                                     </label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="CandidateAccepted"
                                                                        readonly>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <label
                                                                        class="col-form-label">Expected
                                                                     Date Of
                                                                     Joining</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="Date_Of_Joing"
                                                                        readonly>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <label
                                                                        class="col-form-label">Accepted
                                                                     CTC </label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="CommitedCTC"
                                                                        autocomplete="off"
                                                                        readonly>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div id="menu7" class="tab-pane fade">
                                                         <div class="card">
                                                            <h4
                                                               class="card-header text-green pl-0">
                                                               Salary
                                                               Details
                                                            </h4>
                                                            <div class="row">
                                                               <div class="col-md-12">
                                                                  <table
                                                                     class="table table-bordered  table-sm info-table can-table">
                                                                     <thead>
                                                                        <tr
                                                                           align="center">
                                                                           <th
                                                                              colspan="7">
                                                                              General
                                                                           </th>
                                                                           <th
                                                                              colspan="20">
                                                                              Monthly
                                                                              Detail
                                                                           </th>
                                                                           <th
                                                                              colspan="20">
                                                                              Annual
                                                                              Detail
                                                                           </th>
                                                                        </tr>
                                                                        <tr
                                                                           class="bg-green text-white">
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
                                                                  <div
                                                                     class="float-right mt-2">
                                                                     <div
                                                                        class="pagination ">
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
                                                            <h5
                                                               class="card-header text-green pl-0">
                                                               Present
                                                               Working Detail
                                                            </h5>
                                                            <div class="card-body">
                                                               <div class="row">
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <label
                                                                        class="col-form-label">Current
                                                                     Organization</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="CurrentOrganization"
                                                                        readonly>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <label
                                                                        class="col-form-label">Current
                                                                     Position</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="PreviousPosition"
                                                                        readonly>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <label
                                                                        class="col-form-label">Current
                                                                     CTC</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="CurrentCTC"
                                                                        autocomplete="off"
                                                                        readonly>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <label
                                                                        class="col-form-label">Position
                                                                     Applied
                                                                     For</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="AppliedPosition"
                                                                        readonly>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <label
                                                                        class="col-form-label">Expected
                                                                     CTC</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="ExpectedCTC"
                                                                        autocomplete="off"
                                                                        readonly>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <label
                                                                        class="col-form-label">Negotiable
                                                                     CTC </label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="NegotiableCTC"
                                                                        autocomplete="off"
                                                                        readonly>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <label
                                                                        class="col-form-label">Willing
                                                                     to
                                                                     Relocate
                                                                     </label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="Willingtorelocate"
                                                                        autocomplete="off"
                                                                        readonly>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div id="menu9" class="tab-pane fade">
                                                         <div class="card noshadow">
                                                            <h5
                                                               class="card-header text-green pl-0">
                                                               Reporting
                                                               Details and Designation
                                                            </h5>
                                                            <div class="card-body">
                                                               <div class="row">
                                                                  <div
                                                                     class="form-group col-md-4">
                                                                     <label
                                                                        class="col-form-label">Reporting
                                                                     To</label>
                                                                     <input type="text"
                                                                        class="form-control"
                                                                        ng-model="Reportingname"
                                                                        autocomplete="off"
                                                                        readonly>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-4">
                                                                     <label
                                                                        class="col-form-label">Business</label>
                                                                     <input
                                                                        class="form-control"
                                                                        ng-model="Business"
                                                                        readonly />
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-4">
                                                                     <label
                                                                        class="col-form-label">Designation
                                                                     Proposed
                                                                     </label>
                                                                     <input
                                                                        class="form-control"
                                                                        ng-model="Designationproposed"
                                                                        readonly />
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-4">
                                                                     <label
                                                                        class="col-form-label">Location</label>
                                                                     <input
                                                                        class="form-control"
                                                                        ng-model="Location"
                                                                        readonly />
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-4">
                                                                     <label
                                                                        class="col-form-label">Department</label>
                                                                     <input
                                                                        class="form-control"
                                                                        ng-model="Department"
                                                                        readonly />
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div id="menu10" class="tab-pane fade">
                                                         <div class="card noshadow">
                                                            <h5
                                                               class="card-header text-green pl-0">
                                                               Vaccination
                                                               Details
                                                            </h5>
                                                            <div class="card-body">
                                                               <div class="row">
                                                                  <div class="col-lg-12">
                                                                     <div
                                                                        class="table-responsive">
                                                                        <table
                                                                           class="table   table-sm">
                                                                           <thead>
                                                                              <tr>
                                                                                 <th>No
                                                                                 </th>
                                                                                 <th
                                                                                    scope="col">
                                                                                    Vaccinated
                                                                                 </th>
                                                                                 <th
                                                                                    scope="col">
                                                                                    Date
                                                                                 </th>
                                                                                 <th
                                                                                    scope="col">
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
                                                                     <div
                                                                        class="pagination">
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
                                                            <h5
                                                               class="card-header text-green pl-0">
                                                               Confirmation
                                                               and Appointment Letter
                                                            </h5>
                                                            <div class="card-body">
                                                               <div class="row">
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <button
                                                                        style="margin-top: 25px;"
                                                                        class="btn btn-sm btn-success"
                                                                        ng-click="AppointmentTamil();"
                                                                        data-toggle="modal"
                                                                        data-target="#ModalCenter1AppointmentView"><i
                                                                        class="fa fa-save"></i>
                                                                     Appointment(Tamil)</button>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <button
                                                                        style="margin-top: 25px;"
                                                                        class="btn btn-sm btn-success"
                                                                        ng-click="AppointmentTamil();"
                                                                        data-toggle="modal"
                                                                        data-target="#ModalCenter1ConfirmationView"><i
                                                                        class="fa fa-save"></i>
                                                                     Confirmation(Tamil)</button>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <button
                                                                        style="margin-top: 25px;"
                                                                        class="btn btn-sm btn-success"
                                                                        ng-click="AppointmentTamil();"
                                                                        data-toggle="modal"
                                                                        data-target="#ModalCenter1AppointmentHindi"><i
                                                                        class="fa fa-save"></i>
                                                                     Appointment(Hindi)</button>
                                                                  </div>
                                                                  <div
                                                                     class="form-group col-md-3">
                                                                     <button
                                                                        style="margin-top: 25px;"
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
                        <div class="modal fade" id="ModalCenter1" tabindex="-1" role="dialog" id=""
                           aria-hidden="true">
                           <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-body">
                                    <div class="card-body">
                                       <div class="row">
                                          <div class="col-md-3">
                                             <label
                                                class="col-form-label text-green-bold">Components</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <label
                                                class="col-form-label text-green-bold">Monthly</label>
                                          </div>
                                          <div class="col-md-1 nopadding ">
                                             <label
                                                class="col-form-label text-green-bold">Annual</label>
                                          </div>
                                          <div class="col-md-1 nopadding ">
                                             <label
                                                class="col-form-label text-green-bold">inc%</label>
                                          </div>
                                          <div class="col-md-3">
                                             <label
                                                class="col-form-label text-green-bold">Components</label>
                                          </div>
                                          <div class="col-md-1 nopadding ">
                                             <label
                                                class="col-form-label text-green-bold">Monthly</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <label
                                                class="col-form-label text-green-bold">Annual</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <label
                                                class="col-form-label text-green-bold">inc%</label>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-3">
                                             <label class="col-form-label">Basic+DA</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotBasicDA" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaBasicDA" autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperBasicDA" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-3">
                                             <label class="col-form-label">HRA</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotHRA" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaHRA" autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperHRA" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-3">
                                             <label class="col-form-label">Special
                                             Allowance</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotSpecialAllowance"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaSpecialAllowance"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperSpecialAllowance"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-3">
                                             <label class="col-form-label">Total
                                             Allowance</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotTotalAllowance"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaTotalAllowance"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperTotalAllowance"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12 nopadding">
                                             <hr />
                                          </div>
                                       </div>
                                       <div class="row">
                                          <label class="col-md-12 text-green mb-2"><b>Retirals
                                          Employer
                                          Contribution</b></label>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-3">
                                             <label class="col-form-label">PF (12 %) From
                                             Basic</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotPFemployeer" autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaPFemployeer"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperPFemployeer"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-3">
                                             <label class="col-form-label">Gradutity(5%)</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotGratuity" autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaGratuity" autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperGratuity" autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-3">
                                             <label class="col-form-label">Retirals
                                             Total</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotRetairlsTotal"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaRetairlsTotal"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperRetairlsTotal"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-3">
                                             <label class="col-form-label">GAC</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotGAC" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaGAC" autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperGAC" autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-3">
                                             <label class="col-form-label">Bonous @
                                             8.33%</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotEstimatedBonous"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaEstimatedBonous"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperEstimatedBonous"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-3">
                                             <label class="col-form-label">Other
                                             Bonous</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotOtherBonous" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaOtherBonous"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperOtherBonous"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12 nopadding">
                                             <hr />
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-6"> <label
                                             class="text-green mb-2"><b>Other
                                             Components</b></label> 
                                          </div>
                                          <div class="col-md-6">
                                             <label
                                                class="text-green mb-2"><b>Deductions</b></label>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-3">
                                             <label class="col-form-label">Est.CTC</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotCTC" autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaCTC" autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperCTC" autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-3">
                                             <label class="col-form-label">PF
                                             Employee</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotPFemployee" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaPFemployee" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperPFemployee"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-3">
                                             <label class="col-form-label">ESIC</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotESIC" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaESIC" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperESIC" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-3">
                                             <label class="col-form-label">Stay
                                             Allowance</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotStayAllowance"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaStayAllowance"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperStayAllowance"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-3">
                                             <label class="col-form-label">Canteen</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotCanteen" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaCanteen" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperCanteen" autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-3">
                                             <label class="col-form-label">Other
                                             Deductions</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotOtherDeductions"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaOtherDeductions"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperOtherDeductions"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-3">
                                             <label class="col-form-label">Travel
                                             Allowance</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotTravelAllowance"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaTravelAllowance"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperTravelAllowance"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);">
                                          </div>
                                          <div class="col-md-3">
                                             <label class="col-form-label">Take
                                             Home</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMottakehomewithouttax"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuatakehomewithouttax"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="Curincpertakehomewithouttax"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-3">
                                             <label class="col-form-label">Deductions
                                             Total</label>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotDeductionTotal"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaDeductionTotal"
                                                autocomplete="off"
                                                onkeypress="return Validate(event);" readonly>
                                          </div>
                                          <div class="col-md-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperDeductionTotal"
                                                autocomplete="off"
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
                                                   <select class="form-control"
                                                      ng-model="FitStatus"
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
                                                   ng-click="UpdateFitement();"><i
                                                   class="fa fa-save"></i>
                                                Update</button>
                                                <button class="btn btn-sm btn-warning"
                                                   ng-click="CalculateFitment();"><i
                                                   class="fa fa-calculator"></i>
                                                Calculate</button>
                                                <button type="button"
                                                   class="btn btn-sm btn-danger"
                                                   data-dismiss="modal"><i
                                                   class="fa fa-times"></i>
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
                        <div class="modal fade" id="ModalFinal" tabindex="-1" role="dialog" id=""
                           aria-hidden="true">
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
                                             <input type="text" class="form-control"
                                                ng-model="CurMotBasicDA" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaBasicDA" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperBasicDA" readonly>
                                          </div>
                                          <div class="col-lg-2">
                                             <label class="col-form-label">HRA</label>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotHRA" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaHRA" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperHRA" readonly>
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
                                             <input type="text" class="form-control"
                                                ng-model="CurMotTotalAllowance" readonly>
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
                                             <input type="text" class="form-control"
                                                ng-model="CurMotPFemployeer" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaPFemployeer" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperPFemployeer" readonly>
                                          </div>
                                          <div class="col-lg-2">
                                             <label class="col-form-label">Gradutity(5%)</label>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotGratuity" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaGratuity" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperGratuity" readonly>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-lg-2">
                                             <label class="col-form-label">Retirals
                                             Total</label>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotRetairlsTotal" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaRetairlsTotal" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperRetairlsTotal" readonly>
                                          </div>
                                          <div class="col-lg-2">
                                             <label class="col-form-label">GAC</label>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotGAC" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaGAC" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperGAC" readonly>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-lg-2">
                                             <label class="col-form-label">Bonous @
                                             8.33%</label>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotEstimatedBonous" readonly>
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
                                             <input type="text" class="form-control"
                                                ng-model="CurMotOtherBonous" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaOtherBonous" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperOtherBonous" readonly>
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
                                             <input type="text" class="form-control"
                                                ng-model="CurMotCTC" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaCTC" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperCTC" readonly>
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
                                             <input type="text" class="form-control"
                                                ng-model="CurMotESIC" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaESIC" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperESIC" readonly>
                                          </div>
                                          <div class="col-lg-2">
                                             <label class="col-form-label">PF
                                             Employee</label>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotPFemployee" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaPFemployee" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperPFemployee" readonly>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-lg-2">
                                             <label class="col-form-label">Canteen</label>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotCanteen" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaCanteen" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurincperCanteen" readonly>
                                          </div>
                                          <div class="col-lg-2">
                                             <label class="col-form-label">Stay
                                             Allowance</label>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurMotStayAllowance" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="CurAnnuaStayAllowance" readonly>
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
                                             <input type="text" class="form-control"
                                                ng-model="CurMotTravelAllowance" readonly>
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
                                             <input type="text" class="form-control"
                                                ng-model="CurMotOtherDeductions" readonly>
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
                                             <input type="text" class="form-control"
                                                ng-model="CurMotDeductionTotal" readonly>
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
                                                ng-model="CurAnnuatakehomewithouttax"
                                                autocomplete="off" readonly>
                                          </div>
                                          <div class="col-lg-1 nopadding">
                                             <input type="text" class="form-control"
                                                ng-model="Curincpertakehomewithouttax"
                                                autocomplete="off" readonly>
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
                                    <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
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
                                    <h5 class="modal-title" id="exampleModalLongTitle">Approval(MD)
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
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
                                    <button class="btn btn-rounded btn-success"
                                       ng-click="UpdateApprove();"
                                       data-dismiss="modal">Update</button>
                                    <button type="button" class="btn btn-rounded btn-dark"
                                       data-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal fade" id="ModalMail" tabindex="-1" role="dialog" id=""
                           aria-hidden="true">
                           <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-body">
                                    <p class="page-title text-green">Mail</p>
                                    <hr />
                                    <div class="">
                                       <div class="row">
                                          <div class="form-group col-md-12">
                                             <label class="col-form-label">To Address</label>
                                             <textarea type="text" class="form-control"
                                                ng-model="ToMail"></textarea>
                                          </div>
                                          <div class="form-group col-md-12">
                                             <label class="col-form-label">Subject</label>
                                             <input type="text" class="form-control"
                                                ng-model="SubjectMail">
                                          </div>
                                       </div>
                                       <p class="page-title text-green">Message</p>
                                       <table id="iif-editor" class="mb-2">
                                          <tr>
                                             <div text-angular="text-angular" name="MessageMail"
                                                ng-model="MessageMail" ta-disabled='disabled'
                                                class="iif-editor"
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
                                    <button class="btn btn-sm btn-success"
                                       ng-click="SendNormalMail();"><i class="fa fa-paper-plane"
                                       aria-hidden="true"></i> &nbsp;Send</button>
                                    <button class="btn btn-sm btn-warning" data-target="#myCarousel"
                                       data-slide-to="1"><i class="fa fa-arrow-left"
                                       aria-hidden="true"></i>
                                    &nbsp;Back</button>
                                    <button class="btn btn-sm btn-danger" data-dismiss="modal"><i
                                       class="fa fa-paper-plane" aria-hidden="true"></i>
                                    &nbsp;Close</button>
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
                                    <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="row">
                                       <iframe ng-src="{{VaccinationView}}"
                                          ng-hide="VaccinationView == null || VaccinationView == '' "
                                          ng-show="VaccinationView != null "
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
                        <div class="modal fade" id="ModalCenter1Offerletter" tabindex="-1" role="dialog"
                           aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate
                                       Offer Letter Details
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="row">
                                       <iframe ng-src="{{OfferletterView}}"
                                          ng-hide="OfferletterView == null || OfferletterView == '' "
                                          ng-show="OfferletterView != null "
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
                        <div class="modal fade" id="ModalCenter1Vaccination" tabindex="-1" role="dialog"
                           aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                 <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete
                                       {{Vaccinatedsno}}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="alert alert-danger" role="alert">
                                       Are You sure want to delete this record?
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button class="btn btn-rounded btn-danger"
                                       ng-click="DeleteVaccination();"
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
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete
                                       {{EduNextno}}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="alert alert-danger" role="alert">
                                       Are You sure want to delete this record?
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button class="btn btn-rounded btn-danger"
                                       ng-click="DeleteEducation();"
                                       data-dismiss="modal">Delete</button>
                                    <button type="button" class="btn btn-rounded btn-dark"
                                       data-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal fade" id="ModalCenter1DocumentView" tabindex="-1"
                           role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                 <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate-
                                       Document
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
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
                        <div class="modal fade" id="ModalCenter1AppointmentView" tabindex="-1"
                           role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                 <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate -
                                       Appointment - Order
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <a id="btnAppointmentordertamil"
                                             class="btn btn-info btn-nda-down2"><i
                                             class="fa fa-download"></i> Download</a>
                                          <div class="card-body">
                                             <div id="pdfExportAppointmentorder">
                                                <div class="pdf-sipl">
                                                   <div class="pdf-header-sipl-modal">
                                                      <img
                                                         src="../Logo/Sainmarknewlogo.png"
                                                         width="130" height="50" />
                                                      <p><b>Sainmarks Industries (India) Pvt
                                                         Ltd</b><br />
                                                         476/1b/1a, Label Arcade, Jothi
                                                         Nagar,
                                                         Palavanjipalayam,<br />
                                                         Dharapuram Main Road, Tirupur-641
                                                         608.
                                                      </p>
                                                   </div>
                                                   <hr />
                                                   <center>
                                                      <h4>Appointment Order - பணி நியமன
                                                         உத்தரவு
                                                      </h4>
                                                   </center>
                                                   <p>பெறுதல்,</p>
                                                   <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}{{Lastname}}
                                                   </p>
                                                   <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Address}}
                                                   </p>
                                                   <p>தேதி :</p>
                                                   <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Date_Of_Joing2}}
                                                   </p>
                                                   <br /><br /><br />
                                                   <p>உங்களது விண்ணப்பம் நாள் : </p>
                                                   <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ApplicationDate2}}
                                                   </p>
                                                   <p>அன்புடையீர்,</p>
                                                   <p>உங்களது <b><u>
                                                      {{ApplicationDate2}}</b></u>
                                                      தேதியிட்ட
                                                      விண்ணப்பத்தின்
                                                      அடிப்படையில்
                                                      உங்களை எமது
                                                      நிர்வாகம் பிரிவில் பணிக்கு நியமனம்
                                                      செய்வதில்
                                                      பெருமைபடுகிறோம். உங்களது பணி முதல்
                                                      தகுதிக்கான அடிப்படையில் அமர்த்துகிறோம்.
                                                      உங்களுக்கான வேலை
                                                      நேரம் தினசரி 8 மணி
                                                      நேரம் ஆகும். உங்களது மாத சம்பளம் ரூ.
                                                      <b><u>
                                                      {{CommitedCTC|currency:''}}</b></u>
                                                      என்று
                                                      நிர்ணயிக்கப்படுகிறது.
                                                      உங்களது சம்பளம் பிரதி மாதம் <b>7- ஆம்
                                                      தேதிக்குள்</b>
                                                      வழங்கப்படும்.
                                                   </p>
                                                   <p>இதில் அரசின் தொழிலாளர் நல சட்டங்களின்
                                                      அடிப்படையில்
                                                      வருங்கால
                                                      வைப்பு நிதி EPF ஆனது
                                                      12 சதவிகிதமும் (12%), தொழிலாளர் அரசு
                                                      காப்பிட்டு
                                                      கழகத்திற்கு
                                                      (ESI) 0.75
                                                      சதவிகிதமும், உங்களது அடிப்படை
                                                      சம்பளத்தில் பிடித்தம்
                                                      செய்யப்படும். உங்களது
                                                      திறமையின் அடிப்படையிலும், செயல்பாடுகளின்
                                                      அடிப்படையிலும்
                                                      உங்களை எமது
                                                      நிர்வாகத்தில் நிரந்தர பணியாளராக பணி
                                                      நிரந்தரம்
                                                      செய்யப்படுவீர்கள்.
                                                   </p>
                                                   <p> தங்களது உழைப்பை உண்மையுடன்
                                                      நிறுவனத்திற்கு அளித்து
                                                      மென்மேலும்
                                                      வளர்ச்சியடைய
                                                      வாழ்த்துக்களை தெரிவித்து கொள்கிறோம்.
                                                      உண்மைநகல் பெற்றுக்கொண்டேன்.
                                                   </p>
                                                   <p style="text-align:left;"><span
                                                      style="float:right;">இப்படிக்கு,</span>
                                                   </p>
                                                   <br />
                                                   <br />
                                                   <br />
                                                   <br />
                                                   <p style="text-align:left;"><span
                                                      style="float:right;">நிர்வாகம்
                                                      /அங்கீகாரம் பெற்ற அதிகாரி</span>
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
                        <div class="modal fade" id="ModalCenter1AppointmentHindi" tabindex="-1"
                           role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                 <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate -
                                       Appointment - Order
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <a id="btnAppointmentorderhindi"
                                             class="btn btn-info btn-nda-down2"><i
                                             class="fa fa-download"></i> Download</a>
                                          <div class="card-body">
                                             <div id="pdfExportAppointmentorderHindi">
                                                <div class="pdf-sipl">
                                                   <div class="pdf-header-sipl-modal">
                                                      <img
                                                         src="../Logo/Sainmarknewlogo.png"
                                                         width="130" height="50" />
                                                      <p><b>Sainmarks Industries (India) Pvt
                                                         Ltd</b><br />
                                                         476/1b/1a, Label Arcade, Jothi
                                                         Nagar,
                                                         Palavanjipalayam,<br />
                                                         Dharapuram Main Road, Tirupur-641
                                                         608.
                                                      </p>
                                                   </div>
                                                   <hr />
                                                   <center>
                                                      <h4>APPOINMENT ORDER / भुगतान के आदेश
                                                      </h4>
                                                   </center>
                                                   <p>To / मिल रहा :</p>
                                                   <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}{{Lastname}}
                                                   </p>
                                                   <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Address}}
                                                   </p>
                                                   <p>DATE / दिनांक :</p>
                                                   <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Date_Of_Joing2}}
                                                   </p>
                                                   <br /><br /><br />
                                                   <p>Ref : Your Application Date / आपका आवेदन
                                                      दिनांकित है: 
                                                   </p>
                                                   <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ApplicationDate2}}
                                                   <p>तुम्हारा,</p>
                                                   <p>दिनांकित आवेदन के आधार पर हमारा
                                                      प्रशासन<b><u>
                                                      {{ApplicationDate2}}</b></u>अनुभाग
                                                      काम हमें नियुक्ति पर गर्व है। आपका काम
                                                      पहले हमें योग्यता के आधार पर दिन के लिए
                                                      नियुक्त
                                                      किया जाता है। तुम्हारा काम के घंटे के
                                                      बारे में 8 घंटे दैनिक
                                                      रहे हैं <b><u>
                                                      {{CommitedCTC|currency:''}}</b></u>आपका
                                                      मासिक
                                                      वेतन रु.आपका वेतन महीने की
                                                      7 तारीख तक भुगतान कर दिया जाएगा.
                                                   </p>
                                                   <p>EPF अबे 12 प्रतिशत (12%), श्रम सरकार
                                                      (ईएसआई) के लिए प्रतिशत
                                                      और आपका 0.75% आधार वेतन पर कटौती की
                                                      जाएगी। अपनी क्षमता के
                                                      आधार पर, गतिविधियों के आधार पर, आप हमारे
                                                      प्रशासन के एक
                                                      स्थायी कर्मचारी हैं स्थायी कार्य
                                                      उपर्युक्त समयावधि के भीतर
                                                      किया जाएगा।
                                                   </p>
                                                   <p>एक वास्तविक कंपनी में अपने स्वयं के श्रम
                                                      को विकसित और विकसित
                                                      करना। से नमस्ते. 
                                                   </p>
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
                        <div class="modal fade" id="ModalCenter1ConfirmationView" tabindex="-1"
                           role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                 <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate -
                                       Confirmation -
                                       Order-Tamil
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <a id="btnConfirmationordertamil"
                                             class="btn btn-info btn-nda-down2"><i
                                             class="fa fa-download"></i> Download</a>
                                          <div class="card-body">
                                             <div id="pdfExportConfirmationorder">
                                                <div class="pdf-sipl">
                                                   <div class="pdf-header-sipl-modal">
                                                      <img
                                                         src="../Logo/Sainmarknewlogo.png"
                                                         width="130" height="50" />
                                                      <p><b>Sainmarks Industries (India) Pvt
                                                         Ltd</b><br />
                                                         476/1b/1a, Label Arcade, Jothi
                                                         Nagar,
                                                         Palavanjipalayam,<br />
                                                         Dharapuram Main Road, Tirupur-641
                                                         608.
                                                      </p>
                                                   </div>
                                                   <hr />
                                                   <center>
                                                      <h4>Confirmation Order / பணி நிரந்தர
                                                         உத்தரவு
                                                      </h4>
                                                   </center>
                                                   <p style="text-align:left;">To <br />பெறுதல்
                                                   </p>
                                                   <p><span style="float:right;">DATE :
                                                      {{Date_Of_Joing2}}</span>
                                                   </p>
                                                   <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}{{Lastname}}
                                                   </p>
                                                   <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Address}}
                                                   </p>
                                                   <br /><br /><br /><br /><br /><br />
                                                   <div>
                                                      <p>&emsp;&emsp;&emsp;&emsp;&emsp;உங்களது
                                                         பணி நியமன உத்தரவு
                                                         <b><u>{{ApplicationDate2}}</u></b>
                                                         தேதியிட்ட
                                                         கடிதத்தை தொடர்ந்து உங்களது திறமையின்
                                                         அடிப்படையிலும்
                                                         உங்களின் நன்நடத்தை,
                                                         செயல்பாடுகளின் அடிப்படையிலும் உங்களை
                                                         எமது நிர்வாகம்
                                                         <b><u>{{Date_Of_Joing2}}</b></u>முதல்
                                                         பணி
                                                         நிரந்தரம் செய்வதில் பெருமிதம்
                                                         கொள்கிறது. உங்களது சம்பளம்
                                                         கீழ்க்கண்டவாறு
                                                         நிர்ணயிக்கபடுகிறது.
                                                      </p>
                                                      <p>&emsp;&emsp;&emsp;&emsp;&emsp;சம்பளம்
                                                         ரூ.
                                                         <b><u>{{CommitedCTC|currency:''}}
                                                         </b></u>
                                                         நாள் / மாதம் மேலும்
                                                         பிடித்தங்களிலும் ஏனைய
                                                         விதிமுறைகளிலும் எந்தவித மாற்றமும்
                                                         இல்லை. எனவே தொடந்து
                                                         உமது பணியை செவ்வனே செய்து
                                                         நிர்வாகத்தின் வளர்ச்சியும்
                                                         தங்களின் வளர்ச்சியும்
                                                         மேம்பட வாழ்த்துகளை தெரிவித்து
                                                         கொள்கிறது.
                                                      </p>
                                                   </div>
                                                   <p>இப்படிக்கு,</p>
                                                   <p style="text-align:left;">உண்மைநகல்
                                                      பெற்றுக்கொண்டேன்<span
                                                         style="float:right;">நிர்வாகம்
                                                      /அங்கீகாரம் பெற்ற
                                                      அதிகாரி</span>
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
                        <div class="modal fade" id="ModalCenter1ConfirmationViewHindi" tabindex="-1"
                           role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                 <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Candidate -
                                       Confirmation -
                                       Order-Hindi
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <a id="btnConfirmationorderHindi"
                                             class="btn btn-info btn-nda-down2"><i
                                             class="fa fa-download"></i> Download</a>
                                          <div class="card-body">
                                             <div id="pdfExportConfirmationorderHindi">
                                                <div class="pdf-sipl">
                                                   <div class="pdf-header-sipl-modal">
                                                      <img
                                                         src="../Logo/Sainmarknewlogo.png"
                                                         width="130" height="50" />
                                                      <p><b>Sainmarks Industries (India) Pvt
                                                         Ltd</b><br />
                                                         476/1b/1a, Label Arcade, Jothi
                                                         Nagar,
                                                         Palavanjipalayam,<br />
                                                         Dharapuram Main Road, Tirupur-641
                                                         608.
                                                      </p>
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
                                                   <p> <span style="float:right;">DATE /
                                                      दिनांक:
                                                      {{Date_Of_Joing2}}</span>
                                                   </p>
                                                   <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}{{Lastname}}
                                                   </p>
                                                   <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Address}}
                                                   </p>
                                                   <br /><br /><br /><br /><br /><br />
                                                   <div>
                                                      <p>&emsp;&emsp;&emsp;&emsp;&emsp;आपका
                                                         नियुक्ति
                                                         आदेश<b><u>{{ApplicationDate2}}</u></b>
                                                         दिनांकित पत्र
                                                         आपकी जारी रखने और आचरण करने की
                                                         क्षमता हमारे प्रशासन के
                                                         आधार पर
                                                         <b><u>{{Date_Of_Joing2}}</b></u>
                                                         पहला कार्य स्थायी करने में गर्व लेता
                                                         है. आपका वेतन
                                                         निम्नानुसार निर्धारित
                                                         होता है.
                                                      </p>
                                                      <p>&emsp;&emsp;&emsp;&emsp;&emsp;वेतन रु
                                                         <b><u>{{CommitedCTC|currency:''}}
                                                         </b></u> अधिक
                                                         पसंदीदा पर दिन अन्य
                                                         शब्दों में कोई परिवर्तन नहीं हुआ है।
                                                         तो तुम काम करने के
                                                         लिए जारी.
                                                      </p>
                                                      <p>&emsp;&emsp;&emsp;&emsp;&emsp;प्रशासन
                                                         के प्रबंधन और विकास
                                                         में सुधार करने के
                                                         लिए.
                                                      </p>
                                                   </div>
                                                   <p>इस प्रकार,</p>
                                                   <p style="text-align:left;">मुझे वास्तविक
                                                      प्रति प्राप्त हुई है।
                                                      <span
                                                         style="float:right;">व्यवस्थापक/मान्यता
                                                      प्राप्त
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