<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Exit Employee</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" ng-App="MyApp" ng-controller="HRM27Controller">
            <div class="container-fluid dashboard-content">



                <div class="row">


                    <div class="card">
                        <h5 class="card-header text-green">Exit Employee</h5>


                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Employee Name</label>



                                    <select ng-model="Employeeid" class="form-control"
                                        ng-change="FetchEmployee(Employeeid)">

                                        <option ng-repeat="s in GetEmployeeList " value="{{s.Employeeid}}">
                                            {{s.Fullname}}</option>
                                    </select>

                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Request Date</label>
                                    <input type="text" class="form-control" ng-model="RequestDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')">

                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Status</label>
                                    <select class="form-control" ng-model="Exitstatus">
                                        <option Value="Initialized">Initialized</option>
                                        <option value="Revoked">Revoked</option>
                                        <option value="Confirmed">Confirmed</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Releiving Date</label>
                                    <input type="text" class="form-control" ng-model="ReleivingDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')">

                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Gender</label>
                                    <input type="text" class="form-control" ng-model="Gender" autocomplete="off"
                                        readonly>

                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Category</label>
                                    <input type="text" class="form-control" ng-model="Category" autocomplete="off"
                                        readonly>

                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Department</label>
                                    <input type="text" class="form-control" ng-model="EmpDepartment" autocomplete="off"
                                        readonly>

                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Designation</label>
                                    <input type="text" class="form-control" ng-model="EmpDesignation" autocomplete="off"
                                        readonly>

                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Contactno</label>
                                    <input type="text" class="form-control" ng-model="Contactno" autocomplete="off"
                                        readonly>

                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Hand Overto</label>



                                    <select ng-model="Handoverid" class="form-control"
                                        ng-change="FetchHandover(Handoverid);">

                                        <option ng-repeat="s in GetEmployeeList " value="{{s.Employeeid}}">
                                            {{s.Fullname}}</option>
                                    </select>

                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Approval Status</label>



                                    <input type="text" class="form-control" ng-model="Approvalstatus" autocomplete="off"
                                        readonly>

                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Meeting Date</label>
                                    <input type="text" class="form-control" ng-model="MeetingDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')">

                                </div>
                                <div class="form-group col-md-3">
                                <label class="col-form-label">MeetingTime</label>
                                    <input class="form-control"
                                            onfocus="(this.type='time')" onblur="(this.type='time')"
                                            ng-model="Meetingtime" placeholder="HH:mm:ss" />
                                </div>

                                <div class="form-group col-md-9">
                                    <label class="col-form-label">Email-ID</label>
                                    <input type="text" class="form-control" ng-model="Emailid" autocomplete="off"
                                        readonly>

                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Reason</label>
                                    <textarea type="text" class="form-control" ng-model="Releivingreason"
                                        autocomplete="off"></textarea>

                                </div>
                                <div class="text-right  col-md-12">
                                    <button class="btn btn-rounded btn-success" ng-click="SaveExit();"
                                        ng-show="btnsave"><i class="fa fa-save"></i> Save</button>
                                        <button class="btn btn-rounded btn-success" ng-click="Sendmail();"
                                        ng-show="btnupdate"   ><i class="fa fa-envelope"></i> Emailsend</button>
                                    <button class="btn btn-rounded  btn-primary "  ng-click="Reset();"><i class="fa fa-times"></i> Reset</button>
                                </div>

                            </div>
                            </div>
                            </div>
                            <div class="alert alert-success" role="alert" ng-show="Message"
                        id='msg2'>
                        {{Message}}
                     </div>


                     <div class="col-md-12">
                     <div class="tab-list" style="overflow-x: hidden; padding-right: 0px;"
                                        ng-show="btnupdate">

                     <div class="tab-list" style="overflow-x: hidden; padding-right: 0px;">
                        <ul class="nav nav-pills nav-fill">
                           <li class="nav-item" ng-click="fnhandinfo();">
                              <a>Handover_Document</a>
                           </li>
                           <li class="nav-item" ng-click="fniteminfo();">
                              <a>Handover_Item</a>
                           </li>
                           <li class="nav-item" ng-click="fninterview_formatinfo();">
                              <a>Exit_Interview_Format</a>
                           </li>
                           <li class="nav-item" ng-click="fnno_dueinfo();">
                              <a>No_Due_Form</a>
                           </li>
                        </ul>
                     </div>
                     </div>
                      </div>

                     <div class="card" ng-show="btnHandover">
                        <h5 class="card-header text-green">Handover Details</h5>
                        <div class="card-body">
                           <div class="row">
                              <div
                                 class="table-responsive custom-table custom-table-noborder col-lg-4">
                                 <table class="table table-bordered table-sm">
                                    <tr>
                                       <td> <label class="col-form-label">S.No</label>
                                       </td>
                                       <td> <input class="form-control"
                                          ng-model="HandNextno" id="HandNextno"
                                          readonly /> </td>
                                    </tr>
                                    <tr>
                                       <td> <label
                                          class="col-form-label">Description</label>
                                       </td>
                                       <td> <input class="form-control"
                                          ng-model="description" id="description"
                                          autocomplete="off" />
                                       </td>
                                    </tr>
                                    <tr>
                                       <td> <label
                                          class="col-form-label">Select_file</label>
                                       </td>
                                       <td>
                                          <div class="input-group">
                                             <input type="file" class="form-control"
                                                ng-model="handoverDoc"
                                                id="filehandoverInput04"
                                                name=files[]
                                                accept="image/png, image/gif, image/jpeg,application/pdf">
                                             <div class="input-group-append">
                                                <p id="filehandoverButton04"
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
                                    <table
                                       class="table table-bordered  table-sm table-striped">
                                       <thead>
                                          <tr>
                                             <th>No</th>
                                             <th scope="col">Description</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr dir-paginate="e in GetHandoverList|filter:searchHandover|itemsPerPage:5 "
                                             pagination-id="Handovergrid"
                                             current-page="currentPageHandover">
                                             <td style="width: 50px;">
                                                {{$index+1 + (currentPageHandover - 1) * pageSizeHandover}}
                                             </td>
                                             <td>{{e.description}}</td>
                                             <td>
                                                <div class="action-btn">
                                                   <img height="15"
                                                      data-toggle="modal"
                                                      data-target="#ModalCenter1Handover"
                                                      ng-click="Fetchempdoc(e.Employeeid,e.Sno);"
                                                      src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                   <img height="15"
                                                      ng-click="Fetchempdoc(e.Employeeid,e.Sno);"
                                                      src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                                   <img height="15"
                                                      data-toggle="modal"
                                                      data-target="#ModalCenter1HandoverView"
                                                      ng-click="Fetchempdoc(e.Employeeid,e.Sno);"
                                                      src="<?php echo "$domain"; ?>/assets/icons/view.png">
                                                </div>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 <div class="pagination">
                                    <dir-pagination-controls
                                       pagination-id="Handovergrid" max-size="3"
                                       direction-links="true" boundary-links="true"
                                       class="pagination">
                                    </dir-pagination-controls>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group text-right">
                           <button class="btn btn-rounded btn-success"
                              ng-click="Update_Handoveremp();">Update</button>
                           <button class="btn btn-rounded btn-info"
                              ng-click="ResetHandover();">Clear(Next)</button>
                        </div>
                     </div>


                     <div class="card" ng-show="btnitem">
                     <h5 class="card-header text-green">Handover_Items</h5>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group col-md-12">
                                 <label class="col-form-label">S.No</label>
                                 <input class="form-control"
                                    ng-model="HandoveritemNextno" autocomplete="off"
                                    id='HandoveritemNextno' readonly />
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="col-form-label">Particular</label>
                                 <input class="form-control" ng-model="Handoveritem"
                                    autocomplete="off" id='Handoveritem' />
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="col-form-label">Qty</label>
                                 <input class="form-control" ng-model="Qtyitem"
                                    autocomplete="off" id='Qtyitem' />
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="col-form-label">Place Of Stored</label>
                                 <input class="form-control" ng-model="Storeditem"
                                    autocomplete="off" id='Storeditem' />
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="col-form-label">Concern Person
                                 Name</label>
                                 <input class="form-control" ng-model="Nameitem"
                                    autocomplete="off" id='Nameitem' />
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="col-form-label">Select_file</label>
                                 <div class="input-group">
                                    <input type="file" class="form-control"
                                       ng-model="item_image" id="fileitemInput"
                                       name=files[]>
                                    <div class="input-group-append">
                                       <p id="fileitemButton" class="input-group-text">
                                          <i class="fa fa-upload"></i>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group text-right col-md-12">
                                 <button class="btn btn-sm btn-success"
                                    ng-click="Update_handoveritem();"><i
                                    class="fa fa-save"></i>
                                 Update</button>
                                 <button class="btn btn-sm btn-danger"
                                    ng-click="Resetitem();"><i class="fa fa-times"></i>
                                 Clear(Next)</button>
                              </div>
                           </div>
                           <div class="col-md-8">
                              <div class="table-responsive">
                                 <table
                                    class="table table-bordered  table-sm table-striped">
                                    <thead>
                                       <tr>
                                          <th>No</th>
                                          <th scope="col">Particular</th>
                                          <th scope="col">Qty</th>
                                          <th scope="col">Place Of Stored</th>
                                          <th scope="col">Concern Person Name</th>
               
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr dir-paginate="e in GetHandoveritemList |filter:searchHandoveritem|itemsPerPage:10 "
                                          pagination-id="Handoveritemgrid"
                                          current-page="currentPageHandoveritem">
                                          <td style="width: 50px;">
                                             {{$index+1 + (currentPageHandoveritem - 1) * pageSizeHandoveritem}}
                                          </td>
                                          <td>{{e.Handoveritem}}</td>
                                          <td>{{e.Qtyitem}}</td>
                                          <td>{{e.Storeditem}}</td>
                                          <td>{{e.Nameitem}}</td>
                                         
                                          <td>
                                             <div class="action-btn">
                                                <img height="15" data-toggle="modal"
                                                   data-target="#ModalCenter1item"
                                                   ng-click="Fetchitem(e.Employeeid,e.Sno);"
                                                   src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                                <img height="15"
                                                   ng-click="Fetchitem(e.Employeeid,e.Sno);"
                                                   src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                                <img height="15" data-toggle="modal"
                                                   data-target="#ModalCenter1itemView"
                                                   ng-click="Fetchitem(e.Employeeid,e.Sno);"
                                                   src="<?php echo "$domain"; ?>/assets/icons/view.png">
                                             </div>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="pagination">
                                 <dir-pagination-controls
                                    pagination-id="Handoveritemgrid" max-size="3"
                                    direction-links="true" boundary-links="true"
                                    class="pagination">
                                 </dir-pagination-controls>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>


                  <div class="card" ng-show="btninterview_format">
                     <h5 class="card-header text-green">Exit Interview Format</h5>
                     <div class="card-body">
                     <a id="edit_interview_btn" class="btn btn-info btn-nda-down"><i class="fa fa-download"></i>
                                Download</a>
                        <div class="card-body">

                            <div id="pdfExport">
                            
                            <div class="input-group-append">                  
                              <p 
                              ng-click="FetchEmployee(Employeeid);"
                              data-toggle="modal">
                              
                              </p>
                              </div>
                             
                              <html>
  <style type='text/css'>
    h1,
    h2 {
      text-align: center;
    }

    table.data-table,
    .data-table td,
    .data-table th {
      padding: 5px;
    }

    table.data-table {
      width: 100%;
      border-collapse: collapse;
    }
  </style>
  <body>
    <h1>SAINMARKS INDUSTRIES INDIA PVT LTD, TIRUPUR</h1>
    <h2>EXIT INTERVIEW</h2>


<p>Name  :{{Title}} {{Firstname}}{{Lastname}} </p>
   
<p>Employee Code :{{Employeeid}}</p>
  
<p>Address For Correspondence:<p> {{CurrentAddress}}
</p>
<p> {{CurrentCountry}},</p>
<p> {{CurrentState}},</p>
<p> {{CurrentCity}},</p>
<p>Pincode:{{CurrentPincode}}</p>

<p>Phone No: {{Contactno}}</p>


<br/><br/>
<p><b>1.  Reasons for resigning (You can tick more than one):</b></p>
<p>a.  Better Compensation</p>
<p>b.  Better Growth Opportunities</p>
<p>c.  Higher Education</p>
<p>d.  Work Related Issues (Please Specify): _______________________________________________</p>
<p>e.  Personal Reasons (Please Specify): __________________________________________________</p>
<p>f.  Others (Please specify): _______________________________________________</p>
<br/><br/>
<p><b>2.  During your tenure with us;</b></p>
<p>a.  Did you know what was expected of you at work?  Yes / No</p>
<p>b.  Did you have the materials and equipment to do your work right? Yes / No</p>
<p>c.  At work, did you have the opportunity to do what you did best every day?  Yes / No</p>
<p>d.  In the last seven days, have you received recognition or praise for doing good work?  Yes / No</p>
<p>e.  Does your supervisor, or someone at work, seem to care about you as a person? Yes / No</p>
<p>f.  Is there someone at work who encourages your development? Yes / No</p>
<p>g.  At work, do your opinions seem to count?  Yes / No</p>
<p>h.  In the last six months, has someone at work talked to you about your progress?  Yes / No</p>
<p>i.  In the last year, have you had opportunities to learn and grow? Yes / No</p>
<br/><br/>
<p><b>3.  Describe what you liked while working with Company Name.</b></p>

<p>________________________________________________________________________________________________________________________________________________</p>

<br/><br/>
<p><b>4.  Describe what you disliked while working with Company Name.</b></p>

<p>________________________________________________________________________________________________________________________________________________</p>

<br/><br/>
<p><b>5.  What were the factors that attracted you to your next job?</b></p>
<p>________________________________________________________________________________________________________________________________________________</p>

<br/><br/>
<p><b>6.  Any other relevant information/suggestions which, you feel will help make Company Name a better place to work.</b></p>

<p>________________________________________________________________________________________________________________________________________________</p>

<br/><br/>
<p><b>7.  Comments of the interviewer</b></p>

<p>________________________________________________________________________</p>
<p>________________________________________________________________________</p>



<br/><br/>


    <table class='data-table'>
      <tr><td>Name of the interviewer</td>    <td>Signature of the interviewer</td>        <td>Date of interview</td> </tr>

<tr><td>____________________ </td>     <td>______________________</td>     <td>_______________________</td> </tr>


    </table>
    </body>
</html>
</div>
                     </div>
                  </div>
                  </div>

                  <div class="card" ng-show="btndue_form">
                     <h5 class="card-header text-green">No Due Form</h5>
                     <div class="card-body">
                     <a id="no_due_btn" class="btn btn-info btn-nda-down"><i class="fa fa-download"></i>
                                Download</a>
                        <div class="card-body">

                            <div id="nodueExport">
                            
                            <div class="input-group-append">                  
                              <p 
                              ng-click="FetchEmployee(Employeeid);"
                              data-toggle="modal">
                              
                              </p>
                              </div>
                             
                              <html>
                              <style type='text/css'>
    h1,
    h2 {
      text-align: center;
    }

    table.data-table,
    .data-table td,
    .data-table th {
      border: 1px solid;
      padding: 5px;
    }

    table.data-table {
      width: 100%;
      border-collapse: collapse;
    }
  </style>
  <body>
    <h1> SAINMARKS INDUSTRIES INDIA PVT LTD, TIRUPUR</h1>
    <h2>No Dues Certificate</h2>
    <table>
      <tr>
        <td>Name of the employees:</td>
        <td>{{Title}} {{Firstname}}{{Lastname}}</td>
      </tr>
      <tr>
        <td>Employees Code:</td>
        <td>{{Employeeid}}</td>
      </tr>
      <tr>
        <td>Department:</td>
        <td>{{EmpDepartment}}</td>
      </tr>
      <tr>
        <td>Designation:</td>
        <td>{{EmpDesignation}}</td>
      </tr>
      <tr>
        <td>D.O.J:</td>
        <td>{{Date_Of_Joing}}</td>
      </tr>
      <tr>
        <td>D.O.L:</td>
        <td>{{ReleivingDate}}</td>
      </tr>
    </table>
    <br />
    <br />
    <table class='data-table'>
      <tr>
        <td style="width: 20px;">S.No</td>
        <td>Department</td>
        <td>No Dues</td>
        <td>Dues</td>
        <td>Dept Head Sign</td>
      </tr>
      <tr>
        <td>1.</td>
        <td>Production</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>2.</td>
        <td>HR & Admin.</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>3.</td>
        <td>Accounts </td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>4.</td>
        <td>Marketing</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>5.</td>
        <td>Store</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>6.</td>
        <td>Company property returned</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>

</br></br>

     <table class=''>

<tr>
<td>Employee Signature</td> <td>HOD Signature</td> <td>HR & Admin.Signature</td> <td>Auth.Signatory Signature</td>
<tr><td>____________________ </td> <td>______________________</td> <td>_______________________</td> <td>_______________________</td> </tr>     
   </tr>                         



     </table>

    </table>
    </body>
</html>
</div>
                     </div>
                  </div>
                  </div>
                        
                    
                </div>
                <div class="modal" id="ModalCenter1Handover" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header alert alert-danger">
                              <h5 class="modal-title" id="exampleModalLongTitle">Delete
                                 {{HandNextno}}
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
                                 ng-click="DeleteHandover();"
                                 data-dismiss="modal">Delete</button>
                              <button type="button" class="btn btn-rounded btn-dark"
                                 data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="modal fade" id="ModalCenter1HandoverView" tabindex="-1"
                     role="dialog" aria-labelledby="exampleModalCenterTitle"
                     aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header alert alert-danger">
                              <h5 class="modal-title" id="exampleModalLongTitle">Handover-
                                 Document
                              </h5>
                              <button type="button" class="close" data-dismiss="modal"
                                 aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <div class="row">
                                 <iframe ng-src="{{HandoverDocumentView}}"
                                    ng-hide="HandoverDocumentView == null || HandoverDocumentView == '' "
                                    ng-show="HandoverDocumentView != null "
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
                  <div class="modal fade" id="ModalCenter1item" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header alert alert-danger">
                              <h5 class="modal-title" id="exampleModalLongTitle">
                                 Delete {{HandoveritemNextno}}
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
                                 ng-click="DeleteHandoveritem();"
                                 data-dismiss="modal">Delete</button>
                              <button type="button" class="btn btn-rounded btn-dark"
                                 data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal fade" id="ModalCenter1itemView" tabindex="-1"
                     role="dialog" aria-labelledby="exampleModalCenterTitle"
                     aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header alert alert-danger">
                              <h5 class="modal-title" id="exampleModalLongTitle">Handover-
                                 Items
                              </h5>
                              <button type="button" class="close" data-dismiss="modal"
                                 aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <div class="row">
                                 <iframe ng-src="{{HandoveritemView}}"
                                    ng-hide="HandoveritemView == null || HandoveritemView == '' "
                                    ng-show="HandoveritemView != null "
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
    

                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                  <?php include '../footerjs.php'?> 
                

                  <script src="../Scripts/Controller/HRM27Controller.js"></script>
                  <script type="text/javascript"></script>

            </div>

        </div>
    </div>


    <script src="../Scripts/jspdf.min.js"></script>
   
    <script src="../assets/libs/js/html2canvas.min.js"></script>

    <script>            
    $(function() {
        $("#edit_interview_btn").click(function() {

            var HTML_Width = $("#pdfExport").width();
            var HTML_Height = $("#pdfExport").height();
            var data = document.getElementById('pdfExport');
            html2canvas(data,{ allowTaint: true, scale :3,useCORS : true }).then(canvas => {
             

                var contentWidth = canvas.width;
      var contentHeight = canvas.height;
      //One page pdf shows the canvas height generated by html pages.
      var pageHeight = contentWidth / 592.28 * 841.89;
      //html page height without pdf generation
      var leftHeight = contentHeight;
      //Page offset
      var position = 2;
      //a4 paper size [595.28, 841.89], html page generated canvas in pdf picture width
      var imgWidth = 595.28;
      var imgHeight = 592.28/contentWidth * contentHeight;
      var pageData = canvas.toDataURL('image/jpeg', 1.0);
      var pdf = new jsPDF('', 'pt', 'a4');
      //There are two heights to distinguish, one is the actual height of the html page, and the page height of the generated pdf (841.89)
      //When the content does not exceed the range of pdf page display, there is no need to paginate
      if (leftHeight < pageHeight) {
      pdf.addImage(pageData, 'JPEG', 2, 2, imgWidth, imgHeight );
      } else {
          while(leftHeight > 0) {
              pdf.addImage(pageData, 'jpg', 2, position, imgWidth, imgHeight)
              leftHeight -= pageHeight;
              position -= 841.89;
              //Avoid adding blank pages
              if(leftHeight > 0) {
                pdf.addPage();
              }
          }
      }
     // pdf.save('content.pdf');


      window.open(pdf.output('bloburl', {
                    filename: 'new-file.pdf'
                }), '_blank');
            });

        });
    });

    //////////////////////////////////////////////////////
    

    function Validate(event) {
                         var regex = new RegExp("^[0-9-/()]");
                         var key = String.fromCharCode(event.charCode ? event
                             .which : event.charCode);
                         if (!regex.test(key)) {
                             event.preventDefault();
                             return false;
                         }
                     } 
    </script> 


    <script>            
    $(function() {
        $("#no_due_btn").click(function() {

            var HTML_Width = $("#nodueExport").width();
            var HTML_Height = $("#nodueExport").height();
            var data = document.getElementById('nodueExport');
            html2canvas(data,{ allowTaint: true, scale :3,useCORS : true }).then(canvas => {
             

                var contentWidth = canvas.width;
      var contentHeight = canvas.height;
      //One page pdf shows the canvas height generated by html pages.
      var pageHeight = contentWidth / 592.28 * 841.89;
      //html page height without pdf generation
      var leftHeight = contentHeight;
      //Page offset
      var position = 2;
      //a4 paper size [595.28, 841.89], html page generated canvas in pdf picture width
      var imgWidth = 595.28;
      var imgHeight = 592.28/contentWidth * contentHeight;
      var pageData = canvas.toDataURL('image/jpeg', 1.0);
      var pdf = new jsPDF('', 'pt', 'a4');
      //There are two heights to distinguish, one is the actual height of the html page, and the page height of the generated pdf (841.89)
      //When the content does not exceed the range of pdf page display, there is no need to paginate
      if (leftHeight < pageHeight) {
      pdf.addImage(pageData, 'JPEG', 2, 2, imgWidth, imgHeight );
      } else {
          while(leftHeight > 0) {
              pdf.addImage(pageData, 'jpg', 2, position, imgWidth, imgHeight)
              leftHeight -= pageHeight;
              position -= 841.89;
              //Avoid adding blank pages
              if(leftHeight > 0) {
                pdf.addPage();
              }
          }
      }
     // pdf.save('content.pdf');


      window.open(pdf.output('bloburl', {
                    filename: 'new-file.pdf'
                }), '_blank');
            });

        });
    });


    </script>         
</body>

</html>